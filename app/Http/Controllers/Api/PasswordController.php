<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Http\Resources\ClientResource;
use App\Mail\ForgetPassword;
use App\Models\Client;
use App\Notifications\SendSMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class PasswordController extends Controller {


    /**
     * @OA\Post(
     *      path="/api/login/userpass",
     *      summary="verify with password",
     *      description="Login by email or username, password",
     *      operationId="authLogin",
     *      tags={"auth"},
     *      @OA\Parameter(
     *          name="phone",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="password",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successfull",
     *          @OA\JsonContent(
     *            @OA\Property(property="message", type="string", example="Login has successfull")
     *          )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Wrong credentials response",
     *          @OA\JsonContent(
     *            @OA\Property(property="message", type="string", example="Sorry, wrong email address, user_name or password. Please try again")
     *          )
     *      )
     * )
     */

    public function store(PasswordRequest $request) {

        $client = Client::query()->where('phone', $request->phone)
            ->orWhere('email', $request->phone)->firstOrFail();


        if (password_verify($request->password, $client->password)) {
            //it's password
            $token = $client->createToken('Ziz')->accessToken;

            return _response($token, new ClientResource($client));
        } else {
            //it's wrong
            return _response("", "Wrong" , false);
        }

    }

    /**
     * @OA\Post(
     *      path="/api/login/phone/verify",
     *      summary="verify with code",
     *      description="Login by email or username, code",
     *      operationId="authLogin1",
     *      tags={"auth"},
     *      @OA\Parameter(
     *          name="phone",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="password",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successfull",
     *          @OA\JsonContent(
     *            @OA\Property(property="message", type="string", example="Login has successfull")
     *          )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Wrong credentials response",
     *          @OA\JsonContent(
     *            @OA\Property(property="message", type="string", example="Sorry, wrong email address, user_name or password. Please try again")
     *          )
     *      )
     * )
     */

    public function code(PasswordRequest $request) {

        $client = Client::query()->where('phone', $request->phone)
            ->orWhere('email', $request->phone)->first();



//        $client = Client::query()->where('password_code' , $request->password)->first();

        if ($client->password_code === $request->password) {
            //it's code

            $token = $client->createToken('Ziz')->accessToken;

            $client->password_code = null;
            $client->save();

            return _response($token, new ClientResource($client));
        } else {
            //it's wrong
            return _response("", "Wrong" , false);
        }

    }



    /**
     * @OA\Post(
     *      path="/api/forget_password",
     *      summary="forget password with",
     *      description="forget password by email or username, code",
     *      operationId="authLogin2",
     *      tags={"auth"},
     *      @OA\Parameter(
     *          name="username",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successfull",
     *          @OA\JsonContent(
     *            @OA\Property(property="message", type="string", example="code sent")
     *          )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Wrong credentials response",
     *          @OA\JsonContent(
     *            @OA\Property(property="message", type="string", example="Sorry, wrong email address, user_name or password. Please try again")
     *          )
     *      )
     * )
     */

    public function forget(Request $request) {

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

        return _response('' , 'code sent' , true);
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
