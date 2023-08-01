<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller{

    /**
     * @OA\Get  (
     *      path="/api/client",
     *      summary="get profile",
     *      description="get profile",
     *      operationId="get_profile",
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
     *      ),
     * )
     */

    public function index(Request $request){

        $client = Client::query()->find(auth()->guard('api')->user()->id);

        return _response(new ClientResource($client));
    }

    /**
     * @OA\Post (
     *      path="/api/client",
     *      summary="change name or avatar",
     *      description="change name or avatar",
     *      operationId="avatar",
     *      tags={"profile"},
     *      security={
     *          {"bearerAuth": {}}
     *      },
     *      @OA\Parameter(
     *          name="name",
     *          in="query",
     *          required=false,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="avatar",
     *          in="query",
     *          required=false,
     *          @OA\Schema(
     *              type="file"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="ok",
     *          @OA\JsonContent(
     *            @OA\Property(property="message", type="string", example="ok")
     *          )
     *      ),
     * )
     */

    public function store(Request $request){


        $client = Client::query()->find( auth()->guard('api')->user()->id);

        if($request->has('name')){
            $client->name = $request->name;
        }

        if($request->avatar){
            $file = $request->avatar;
            $fileName = time() . '-' . rand() . '.' . $file->getClientOriginalExtension();
            Storage::put('files/' . $fileName, file_get_contents($file));

            $client->avatar = 'files/' . $fileName;
        }

        $client->save();

        return _response("" , "ok");
    }


    /**
     * @OA\Post    (
     *      path="/api/client/deleteavatar",
     *      summary="delete avatar",
     *      description="delete avatar",
     *      operationId="avatar1",
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
     *      ),
     * )
     */

    public function delete_avatar() {
        $client = Client::query()->find( auth()->guard('api')->user()->id);
        $client->avatar = null ;
        $client->save();
        return _response('' , 'ok' , true);
    }
}








