<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;
use App\Models\Client;
use App\Notifications\SendSMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller{

    public function __invoke(Request $request){
        return view('auth.login');
    }

    public function password(Request $request){
        Validator::make($request->all(), [
            'phone' => [
                'required',
                function($attribute, $value, $fail){

                    $client = Client::query()->where('phone', $value)->get();
                    $client2 = Client::query()->where('email', $value)->get();

                    if($client2->count() > 0){
                        if($client2->firstOrFail()->status == false){
                            $verify_link = $this->generateRandomString();
                            Mail::to(["email" => $client2->firstOrFail()->email])->send(new VerifyEmail($verify_link));

                            $client2->firstOrFail()->verify_link = $verify_link;
                            $client2->firstOrFail()->save();
                            return $fail('تایید ایمیل برای شما ارسال شد.لطفا آن را تایید کنید.');
                        }
                    }

                    if($client->count() > 0 || $client2->count() > 0)
                        return;
                    else
                        return $fail('شماره تماس  یا ایمیل وجود ندارد');
                },
            ],
        ], [
            'phone.required' => "لطفا ایمیل  یا شماره تماس خود را وارد کنید",
        ])->validate();

        session(['phone' => $request->phone]);

        return redirect()->route('login_password_2');
    }

    public function password_2(){
        return view('auth.login_step2');
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function password_submit(Request $request){

        $phone = Session('phone');
        //        die(json_encode($phone));
        if(Client::query()->where('phone', $phone)->get()->count() > 0)
            $client = Client::query()->where('phone', $phone)->firstOrFail();

        elseif(Client::query()->where('email', $phone)->get()->count() > 0)
            $client = Client::query()->where('email', $phone)->firstOrFail();

        if(password_verify($request->password, $client->password)){

            auth()->guard('clients')->login($client, true);
            return redirect()->route('profile');
        } else {
            throw ValidationException::withMessages(['password' => 'اطلاعات وارد شده اشتباه است']);
        }

    }

    public function disposable2(){

        $phone = Session('phone');
        if(Client::query()->where('phone', $phone)->get()->count() > 0)
            $client = Client::query()->where('phone', $phone)->firstOrFail();

        elseif(Client::query()->where('email', $phone)->get()->count() > 0)
            $client = Client::query()->where('email', $phone)->firstOrFail();

        $code = rand(1000, 9999);
        $client->password_code = $code;
        $client->notify(new SendSMS($client->phone, $code));
        $client->save();

        return redirect()->route('disposable');
    }

    public function disposable(){

        $phone = Session('phone');
        if(Client::query()->where('phone', $phone)->get()->count() > 0)
            $client = Client::query()->where('phone', $phone)->firstOrFail();

        elseif(Client::query()->where('email', $phone)->get()->count() > 0)
            $client = Client::query()->where('email', $phone)->firstOrFail();

        return view('auth.disposable', compact('client'));

    }

    public function disposable_submit(Request $request){

        $phone = Session('phone');
        if(Client::query()->where('phone', $phone)->get()->count() > 0)
            $client = Client::query()->where('phone', $phone)->firstOrFail();

        elseif(Client::query()->where('email', $phone)->get()->count() > 0)
            $client = Client::query()->where('email', $phone)->firstOrFail();

        Validator::make($request->all(), [
            'code' => [
                'required',
                function($attribute, $value, $fail) use ($client){
                    $value = implode('', $value);

                    if(!$client)
                        return $fail('کاربر وجود ندارد.');

                    if($value != $client->password_code)
                        return $fail('کد صحیح نیست');

                },
            ],
        ], [
            'code.required' => "لطفا کد تایید  خود را وارد کنید ",

        ])->validate();


        $client->password_code = null;
        $client->save();

        Auth::guard('clients')->loginUsingId($client->id, true);
        return redirect()->route('profile');

    }

    public function logout(Request $request){

        auth()->guard('clients')->logout();
        $request->session()->regenerate();
        return redirect()->route('home');
    }
}
