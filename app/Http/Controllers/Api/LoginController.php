<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Mail\CodeEmail;
use App\Mail\VerifyEmail;
use App\Models\Client;
use App\Notifications\SendSMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller {

    /**
     * @OA\Get (
     *      path="/api/update",
     *      summary="update api",
     *      description="update api",
     *      operationId="sendCode",
     *      tags={"update"},
     *
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successfull",
     *          @OA\JsonContent(
     *            @OA\Property(property="message", type="string", example="Login is successfull or code send")
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

    public function index() {

        $update = [
            "min_allowed_version" => setting('api.min_allowed_version'),
            "latest_version" => setting('api.latest_version'),
            "force_update_title" => setting('api.force_update_title'),
            "force_update_button" => setting('api.force_update_button'),
            "optional_update_title" => setting('api.optional_update_title'),
            "optional_update_button" => setting('api.optional_update_button'),
            "update_link_android" => setting('api.update_link_android'),
            "update_link_ios" => setting('api.update_link_ios'),

        ];

        return _response($update);
    }

    /**
     * @OA\Post(
     *      path="/api/login/phone/send",
     *      summary="send code",
     *      description="login with code",
     *      operationId="sendCode",
     *      tags={"auth"},
     *      @OA\Parameter(
     *          name="phone",
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
     *            @OA\Property(property="message", type="string", example="Login is successfull or code send")
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

    public function store(LoginRequest $request) {

        $is_email = false;
        if (Client::query()->where('phone', $request->phone)->get()->count() > 0)
            $client = Client::query()->where('phone', $request->phone)->first();

        elseif (Client::query()->where('email', $request->phone)->get()->count() > 0) {
            $client = Client::query()->where('email', $request->phone)->first();
            $is_email = true;
        }

        if (!$client)
            return _response("", 'شماره تماس  یا ایمیل وجود ندارد', false);


        $code = rand(1000, 9999);
        $client->password_code = $code;
        if ($is_email)
            Mail::to(["email" => $request->phone])->send(new CodeEmail($code));

        else
            $client->notify(new SendSMS($client->phone, $code));

        $client->save();


        return _response("", "code sent!");
    }


    /**
     * @OA\Post(
     *      path="/api/google",
     *      summary="login with google",
     *      description="login with google",
     *      operationId="loginwithgoogle",
     *      tags={"auth"},
     *      @OA\Parameter(
     *          name="token",
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
     *            @OA\Property(property="message", type="string", example="Login is successfull or code send")
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

    public function google(Request $request) {
        $token = $request->token;
        $user = Socialite::driver('google')->userFromToken($token);

        $user = Socialite::driver('google')->user();

        $client = Client::query()->where('google_id', $user->id)->first();

        if(!$client) {

            $client = Client::query()->create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'google_id' => $user->getId(),
            ]);


        }
        $token = $client->createToken('Ziz')->accessToken;

        return _response($token);
    }



}
