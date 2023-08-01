<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlockUserCollection;
use App\Models\BlockUser;
use App\Models\Client;
use Illuminate\Http\Request;

class BlockController extends Controller {

    /**
     * @OA\Get(
     *      path="/api/block",
     *      summary="Show Blocked User",
     *      description="Show Blocked Users ",
     *      operationId="block",
     *      tags={"Block"},
     *      security={
     *          {"bearerAuth": {}}
     *      },
     *      @OA\Response(
     *          response=200,
     *          description="",
     *          @OA\JsonContent(
     *            @OA\Property(property="message", type="string", example="")
     *          )
     *      )
     * )
     */
    public function index() {

        $block = BlockUser::query()->where('client_id', auth()->guard('api')->user()->id)->get();

        return _response(new BlockUserCollection($block));
    }


    /**
     * @OA\Post (
     *      path="/api/block",
     *      summary="Block User With ID",
     *      description="Block User With ID",
     *      operationId="blockStore",
     *      tags={"Block"},
     *      security={
     *          {"bearerAuth": {}}
     *      },
     *      @OA\Parameter(
     *          name="client_id",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
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
    public function store(Request $request) {

        $client = Client::query()->find($request->client_id);
        if (!$client)
            return _response("", "not found", false);

        BlockUser::query()->create([
            'client_id' => auth()->guard('api')->user()->id,
            'banned_client_id' => $client->id
        ]);
        return _response("", "ok");
    }


    /**
     * @OA\Delete (
     *      path="/api/block/{id}",
     *      summary="Unblock User",
     *      description="UnBlock User",
     *      operationId="blockDelete",
     *      tags={"Block"},
     *      security={
     *          {"bearerAuth": {}}
     *      },
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
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
     *
     * )
     */
    public function destroy($id) {

        BlockUser::query()->where([
            'client_id' => auth()->guard('api')->user()->id,
            'banned_client_id' => $id
        ])->firstOrFail()->delete();

        return _response("", "ok");
    }

}
