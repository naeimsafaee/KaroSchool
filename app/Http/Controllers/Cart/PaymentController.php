<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\ClientToCourse;
use App\Models\DiscountCode;
use Illuminate\Http\Request;
use SaeedVaziry\Payir\Exceptions\SendException;
use SaeedVaziry\Payir\Exceptions\VerifyException;
use SaeedVaziry\Payir\PayirPG;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;
use TCG\Voyager\Models\Transaction;

class PaymentController extends Controller{

    public function pay(Request $request){

        $carts = Cart::query()->where('client_id', '=', auth()->guard('clients')->user()->id)->get();

        $discount_price = 0;
        $sum = 0;
        $discount_c = 0;

        foreach($carts as $item){

            if($item->course->discount_price)
                $price = $item->course->discount_price;
            else
                $price = $item->course->price;

            if(strlen($item->discount_code_id) > 0){
                $discount_c = DiscountCode::query()->find($item->discount_code_id);
                if($discount_c){
                    $discount_price += $price * $discount_c->percent / 100;
                }
            }

            $sum += $price;
        }

        if($discount_c){
            if(strlen($discount_c->max_price) > 0){
                $discount_price = min($discount_c->max_price , $discount_price);
            }
        }

        $sum -= $discount_price;


        $invoice = new Invoice;
        $invoice->amount($sum);
        $invoice->detail(['detailName' =>setting('cart.gate_description')]);

        return Payment::callbackUrl(route('callback'))->purchase($invoice, function ($driver, $transactionId) use ($carts, $sum) {

            foreach($carts as $item){

                Transaction::query()->create([
                    'wallet_transaction_id' => $transactionId,
                    "amount" => $sum ,
                    "paid" => false,
                    "client_id" => auth()->guard('clients')->user()->id,
                    'product_id' => $item->course_id,
                ]);
            }

        })-> pay()->render();

    }
    public function verify(Request $request)
    {
//        die(json_encode($request->all()));

        $auth = $request->trackId;
//        $auth = $request->Authority;

        $transactions = Transaction::query()->where('wallet_transaction_id', '=', $request->trackId)->get();
//        die(json_encode($auth));
        if($transactions->count() === 0)
            return view('cart.unpaid');
        try {
            $receipt = Payment::transactionId($request->trackId)->verify();

            foreach ($transactions as $transaction) {
                $transaction->status = config('Constants.SEND_STATUS.Registered');
                $transaction->paid = true;
                $transaction->transaction_date = now();
                $transaction->save();
                $transaction->course;
                $transaction->amount /= 10;


                ClientToCourse::query()->create([
                    'client_id' => auth()->guard('clients')->user()->id,
                    'course_id' => $transaction->product_id,
                ]);

            }

            $carts = Cart::query()->where('client_id', '=', auth()->guard('clients')->user()->id)->get();

            foreach($carts as $cart)
                $cart->delete();


            $max_send_price = setting('cart.max_send_price');
            $send_price = setting('cart.send_price');

            if ($transactions->first()->amount - $send_price > $max_send_price)
                $send_price = 0;

            return view('cart.paid', compact('transactions', 'send_price'));

        } catch (InvalidPaymentException $exception) {
            return view('cart.unpaid');
//            echo $exception->getMessage();
        }
    }


}
