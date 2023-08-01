<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function __invoke(Request $request)
    {
        $client = auth()->guard('clients')->user();

        if ($client->password == null )
            return view('profile.new_password' , compact('client'));

        return view('profile.dashboard' , compact('client'));
    }


    public function edit(Request $request)
    {
        $client = auth()->guard('clients')->user();

        Validator::make($request->all(), [

            'name' => ['required'],
            'email' => ['required' , 'iran_phone'],
            'phone' => ['required'],
        ], [
            'name.required' => "لطفا نام خود را وارد کنید",
            'email.required' => "لطفا ایمیل خود را وارد کنید ",
            'phone.required' => "لطفا شماره موبایل خود را وارد کنید",
        ])->validate();

        $client = auth()->guard('clients')->user();
        $client->phone = $request->phone;
        $client->email = $request->email;
        $client->name = $request->name;
        $client->save();

        return redirect()->route('profile');
    }

}
