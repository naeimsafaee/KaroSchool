<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\CodeEmail;
use App\Mail\ForgetPassword;
use App\Notifications\SendSMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VerifyController extends Controller {
    /**
     * @OA\Post (
     *      path="/api/sendMobileVerifyCode",
     *      summary="sendMobileVerifyCode",
     *      description="sendMobileVerifyCode",
     *      operationId="verify",
     *      tags={"verify"},
     *      security={
     *          {"bearerAuth": {}}
     *      },
     *
     *      @OA\Response(
     *          response=200,
     *          description="ok",
     *          @OA\JsonContent(
     *            @OA\Property(property="message", type="string", example="ok")
     *          )
     *      )
     * )
     */

    public function send_phone() {
        $client = auth()->guard('api')->user();
        $client->phone_code = rand(1000, 9999);
        $client->save();
        $message = 'کد تایید شما در کارو اسکول : ' . PHP_EOL . $client->phone_code;
        $client->notify(new SendSMS($client->phone, $message, true));


        return _response('', 'code sent', true);
    }

    /**
     * @OA\Post (
     *      path="/api/sendEmailVerifyCode",
     *      summary="sendEmailVerifyCode",
     *      description="sendEmailVerifyCode",
     *      operationId="verify2",
     *      tags={"verify"},
     *      security={
     *          {"bearerAuth": {}}
     *      },
     *
     *      @OA\Response(
     *          response=200,
     *          description="ok",
     *          @OA\JsonContent(
     *            @OA\Property(property="message", type="string", example="ok")
     *          )
     *      )
     * )
     */

    public function send_email(Request $request) {
        $client = auth()->guard('api')->user();
        $client->email_code = rand(1000, 9999);
        $client->save();

        Mail::to(["email" => $client->email])->send(new CodeEmail($client->email_code));


        return _response('', 'code sent', true);
    }

    /**
     * @OA\Post (
     *      path="/api/SubmitMobileVerifyCode",
     *      summary="SubmitMobileVerifyCode",
     *      description="SubmitMobileVerifyCode",
     *      operationId="verify3",
     *      tags={"verify"},
     *      security={
     *          {"bearerAuth": {}}
     *      },
     *
     *      @OA\Parameter(
     *          name="phone_code",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="ok",
     *          @OA\JsonContent(
     *            @OA\Property(property="message", type="string", example="ok")
     *          )
     *      )
     * )
     */

    public function verify_phone(Request $request) {
        $client = auth()->guard('api')->user();
        if ($request->phone_code == $client->phone_code){
            $client->is_phone_verified = true;
            $client->save();
            return _response('' , 'verify successfully' , true);
        }
        else
            return _response('' , 'wrong code' , false);

    }

    /**
     * @OA\Post (
     *      path="/api/submitEmailVerifyCode",
     *      summary="submitEmailVerifyCode",
     *      description="submitEmailVerifyCode",
     *      operationId="verify4",
     *      tags={"verify"},
     *      security={
     *          {"bearerAuth": {}}
     *      },
     *
     *      @OA\Parameter(
     *          name="email_code",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="ok",
     *          @OA\JsonContent(
     *            @OA\Property(property="message", type="string", example="ok")
     *          )
     *      )
     * )
     */

    public function verify_email(Request $request) {

        $client = auth()->guard('api')->user();
        if ($request->email_code == $client->email_code){
            $client->is_email_verified = true;
            $client->save();
            return _response('' , 'verify successfully' , true);
        }
        else
            return _response('' , 'wrong code' , false);

    }
}
