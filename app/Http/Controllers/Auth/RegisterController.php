<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ForgetPassword;
use App\Mail\VerifyEmail;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('auth.register');

    }

    public function submit(Request $request)
    {
        Validator::make($request->all(), [

            'name' => ['required'],
            'email' => ['required' , 'unique:clients,email' ],
            'phone' => ['required' , 'unique:clients,phone'],
            'password' => ['required', 'min:8'],
            're_try_Password' => ['required' , 'same:password'],

        ], [
            'name.required' => "لطفا نام خود را وارد کنید",
            'email.required' => "لطفا ایمیل خود را وارد کنید ",
            'email.unique' => "ایمیل وجود دارد",
            'phone.required' => "لطفا شماره موبایل خود را وارد کنید",
            'phone.unique' => "شماره موبایل وجود دارد",
            'password.required' => "لطفا رمزعبور خود را وارد کنید",
            're_try_Password.required' => "لطفا رمزعبور خود را وارد کنید",
            'password.min' => "رمز عبور باید حداقل هشت کاراکتر باشد",
            're_try_Password.same' => "تکرار رمز عبور با رمز عبور تطابق ندارد ",
        ])->validate();


        $client = Client::query()->create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => false,
        ]);

        auth()->guard('clients')->login($client , true);

        $verify_link = $this->generateRandomString();
        $client->verify_link = $verify_link;
        $client->save();
        Mail::to(["email" => $client->email])->send(new VerifyEmail($verify_link));


        return redirect()->route('profile');
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


}
