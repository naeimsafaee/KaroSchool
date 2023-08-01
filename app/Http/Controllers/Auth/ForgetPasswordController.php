<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ForgetPassword;
use App\Models\Client;
use App\Models\Employer;
use App\Notifications\SendSMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ForgetPasswordController extends Controller {
    public function __invoke(Request $request) {
        return view('auth.forget_password');
    }

    public function step_2() {
        return view('auth.forget2');
    }

    public function step_3($reset_link) {


        return view('auth.change_password', compact('reset_link'));

    }

    public function submit(Request $request) {
        Validator::make($request->all(), [
            'username' => [
                'required',
                function ($attribute, $value, $fail) {

                    $client = Client::query()->where('phone', $value)->get();
                    $client2 = Client::query()->where('email', $value)->get();
                    if ($client->count() > 0 || $client2->count() > 0)
                        return;
                    else
                        return $fail('ایمیل یا موبایل  وجود ندارد');

                },
            ],

        ], [
            'username.required' => "لطفا موبایل  یا ایمیل خود را وارد کنید",
        ])->validate();


        if (Client::query()->where('phone', $request->username)->get()->count() > 0) {
            $client = Client::query()->where('phone', $request->username)->firstOrFail();

            $reset_link = $this->generateRandomString();
            $client->reset_link = $reset_link;
            $client->save();

            $message = 'برای بازیابی رمز عبور وارد لینک زیر شوید :' . PHP_EOL . route('forget_code', $reset_link);

            $client->notify(new SendSMS($client->phone, $message, true));

        } elseif (Client::query()->where('email', $request->username)->get()->count() > 0) {
            $client = Client::query()->where('email', $request->username)->firstOrFail();

            $reset_link = $this->generateRandomString();
            $client->reset_link = $reset_link;
            $client->save();

            Mail::to(["email" => $client->email])->send(new ForgetPassword($reset_link));
        }


//        session(['email' => $client->email]);


        return redirect()->route('forget2');
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

    public function change_submit(Request $request) {
        Validator::make($request->all(), [
                'reset_link' => ['required'],

                'password' => ['required', 'min:8'],
                'password2' => ['required', 'same:password'],
            ]
            , [
                'password.required' => "لطفا رمز خود را وارد کنید",
                'password.min' => "رمز عبور حداقل باید هشت حرف باشد ",
                'password2.required' => "لطفا تکرار رمز خود را وارد کنید",
                'password2.same' => "تکرار رمز عبور و رمز عبور با یک دیگر مطابقت ندارد ",
            ])->validate();


        $client = Client::query()->where('reset_link', $request->reset_link)->first();

        if ($client) {
            $client->password = Hash::make($request->password);
            $client->reset_link = null;
            $client->save();
        } else {
            return abort(404);
        }

        return redirect()->route('login');

    }

}
