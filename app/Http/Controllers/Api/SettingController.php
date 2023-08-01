<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\ClientSetting;
use Illuminate\Http\Request;

class SettingController extends Controller {

    /**
     * @OA\Post (
     *      path="/api/setting",
     *      summary="user setiings",
     *      description="profile settings",
     *      operationId="setting",
     *      tags={"profile"},
     *      security={
     *          {"bearerAuth": {}}
     *      },
     *
     *     @OA\Parameter(
     *          name="value",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
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

    public function store(Request $request) {


        foreach ($request->all() as $key => $req) {

            $settings = ClientSetting::query()->updateOrCreate([
                'client_id' => auth()->guard('api')->user()->id,
                'key' => $key,
            ],
                [
                    'client_id' => auth()->guard('api')->user()->id,
                    'key' => $key,
                    'value' => $req
                ]);
//            $setting->value = $request->{$setting->key};
//            $setting->save();
        }

        return _response("ok");
    }


    /**
     * @OA\Get  (
     *      path="/api/setting",
     *      summary="get setiings",
     *      description="get all settings",
     *      operationId="setting1",
     *      tags={"profile"},
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

    public function index(Request $request) {
        $settings = ClientSetting::query()->where('client_id', auth()->guard('api')->user()->id)->get();
        return _response($settings, 'ok', true);

    }


}
