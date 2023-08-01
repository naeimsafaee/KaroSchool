<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\DiscountCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CartController extends Controller{

    public function __invoke(Request $request){
        $client = auth()->guard('clients')->user();
        $sum = 0;

        $carts = Cart::query()->where('client_id' , auth()->guard('clients')->user()->id)->get();

        $discount = "";
        $discount_price = 0;
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

                    $discount = $discount_c->code;
                }
            }

            $sum += $price;

        }

        if($discount_c){
            if(strlen($discount_c->max_price) > 0){
                $discount_price = min($discount_c->max_price , $discount_price);
                $sum -= $discount_price;
            }
        }

        return view('cart.cart', compact('client', 'sum' , 'discount' , 'discount_price'));
    }

    public function add($id){

        Cart::query()->updateOrCreate([
            'client_id' => auth()->guard('clients')->user()->id,
        ], [
            'client_id' => auth()->guard('clients')->user()->id,
            'course_id' => $id,
        ]);

        return redirect()->route('cart');
    }

    public function discount(Request $request){
        Validator::make($request->all(), [
            'discount' => ['exists:discount_codes,code', 'required'],
        ], [
            'discount.exists' => "کد تخفیف وجود ندارد ",
        ])->validate();

        $discount = DiscountCode::query()->where('code', $request->discount)->firstOrFail();

        if(strlen($discount->expiry_at) > 0){
            if($discount->expiry_at < Carbon::now()){
                throw ValidationException::withMessages(['discount' => 'تاریخ انقضای این کد تخفیف گذشته است!']);
            }
        }

        $clients = $discount->clients;
        if($clients->count() > 0){
            $has_permission = false;
            foreach($clients as $client){
                if($client->id === auth()->guard('clients')->user()->id)
                    $has_permission = true;
            }

            if(!$has_permission)
                throw ValidationException::withMessages(['discount' => 'این کد تخفیف متعلق به شما نیست!']);
        }

        Cart::query()->where('client_id', auth()->guard('clients')->user()->id)->update([
            'discount_code_id' => $discount->id,
        ]);

        return redirect(url()->previous());
    }
}
