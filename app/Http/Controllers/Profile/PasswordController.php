<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class PasswordController extends Controller {
    public function __invoke(Request $request) {
        $client = auth()->guard('clients')->user();

        return view('profile.edit_password', compact('client'));
    }

    public function submit(Request $request) {
        Validator::make($request->all(), [
            'password' => ['required'],
            'new_password' => ['required', 'min:8'],
            're_new_password' => ['required', 'same:new_password']
        ], [
            'password.required' => "لطفا رمز فعلی را وارد کنید",
            'new_password.required' => "لطفا رمز جدید را وارد کنید",
            'new_password.min' => "رمز جدید باید حداقل هشت کاراکتر باشد",
            're_new_password.required' => "لطفا تکرار رمز جدید را وارد کنید",
            're_new_password.same' => "تکرار رمز و رمز با یکدیگر تطابق ندارند",
        ])->validate();

        $client = auth()->guard('clients')->user();
        if (password_verify($request->password, $client->password)) {
            $client->password = Hash::make($request->new_password);
            $client->save();
            return redirect()->route('profile');
        } else {
            throw ValidationException::withMessages(['password' => 'رمز فعلی اشتباه است']);
        }
    }

    public function new_password(Request $request) {
        Validator::make($request->all(), [
            'new_password' => ['required', 'min:8'],
            're_new_password' => ['required', 'same:new_password']
        ], [
            'new_password.required' => "لطفا رمز جدید را وارد کنید",
            'new_password.min' => "رمز جدید باید حداقل هشت کاراکتر باشد",
            're_new_password.required' => "لطفا تکرار رمز جدید را وارد کنید",
            're_new_password.same' => "تکرار رمز و رمز با یکدیگر تطابق ندارند",
        ])->validate();

        $client = auth()->guard('clients')->user();
        if ($client->password == null) {
            $client->password = Hash::make($request->new_password);
            $client->save();
            return redirect()->route('profile');
        } else {
            throw ValidationException::withMessages(['password' => 'امکان عوض کردن رمز برای شما وجود ندارد ']);
        }
    }
}
