<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Mail\ForgetPassword;
use App\Mail\VerifyEmail;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EditProfileController extends Controller {

    public function __invoke(Request $request) {

        $client = auth()->guard('clients')->user();

        return view('profile.edit_profile', compact('client'));
    }

    public function edit(Request $request) {

        Validator::make($request->all(),
            [
            'name' => ['required'],
            'email' => ['required'],
            'phone' => ['required' , 'ir_mobile'],
        ], [
            'name.required' => "لطفا نام خود را وارد کنید",
            'email.required' => "لطفا ایمیل خود را وارد کنید ",
            'phone.required' => "لطفا شماره موبایل خود را وارد کنید",
            'phone.ir_mobile' => "لطفا شماره موبایل خود را به درستی وارد کنید",
        ])->validate();

        $client = auth()->guard('clients')->user();

        $verify_link = $this->generateRandomString();

        if($client->email != $request->email){
            Mail::to(["email" => $client->email])->send(new VerifyEmail($verify_link));
            $client->status = false;
            $client->verify_link = $verify_link;
        }

        $client->phone = $request->phone;
        $client->email = $request->email;
        $client->name = $request->name;
        $client->save();

        return redirect()->route('edit_profile');
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

    public function avatar_submit(Request $request)
    {
        $file = $request->avatarPicture;
        $fileName = time() . '-' . rand() . '.' . $file->getClientOriginalExtension();
        Storage::put('files/' . $fileName, file_get_contents($file));
        $client = Client::query()->findOrFail(auth()->guard('clients')->user()->id);
        $client->avatar = 'files/' . $fileName;
        $client->save();

        return response('ok');

    }
}
