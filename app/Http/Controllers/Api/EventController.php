<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FileRequest;
use App\Http\Resources\EventCollection;
use App\Http\Resources\EventResource;
use App\Models\Client;
use App\Models\ClientToCourse;
use App\Models\Event;
use App\Models\EventFile;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller {

    /**
     * @OA\Get(
     *      path="/api/event",
     *      summary="user events",
     *      description="Show All events for user ",
     *      operationId="event",
     *      tags={"Event"},
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
    public function index() {
        $client = auth()->guard('api')->user();
        $courses = $client->course;
        $events = collect();
        foreach ($courses as $course) {
            $t = $course->event;
            foreach ($t as $even) {
                $events->push($even);
            }
        }

        return _response(new EventCollection($events));
    }


    /**
     * @OA\Post (
     *      path="/api/event/{event_id}",
     *      summary="store file for event",
     *      description="store file for even",
     *      operationId="eventFile",
     *      tags={"Event"},
     *      security={
     *          {"bearerAuth": {}}
     *      },
     *     @OA\Parameter(
     *          name="event_id",
     *          in="path",
     *          required=true,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="file",
     *          in="query",
     *          required=true,
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
     *      )
     * )
     */
    public function store(FileRequest $request) {

        $client = Client::query()->find(auth()->guard('api')->user()->id);

        $event_id = $request->event_id;
        $event = Event::query()->findOrFail($event_id);


        if (ClientToCourse::query()->where('client_id', $client->id)->where('course_id', $event->course->id)->count() > 0)
        {

            $file = $request->file;
            $fileName = time() . '-' . rand() . '.' . $file->getClientOriginalExtension();
            Storage::put('files/' . $fileName, file_get_contents($file));

            EventFile::query()->create([
                'event_id' => $event_id,
                'client_id' => $client->id,
                'file' => 'files/' . $fileName,
                'vote' => 0,
            ]);

            return _response("", "ok");

        }
        else
            return _response("", "user doesnt have access" , false);

    }


    /**
     * @OA\Get  (
     *      path="/api/event/{id}",
     *      summary="show one event",
     *      description="show one event",
     *      operationId="showEvent",
     *      tags={"Event"},
     *      security={
     *          {"bearerAuth": {}}
     *      },
     *     @OA\Parameter(
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
     * )
     */

    public function show($id) {
        $event = Event::query()->find($id);
        if (!$event)
            return _response([], 'not found', 404);
        return _response(new EventResource($event));

    }

    /**
     * @OA\Post (
     *      path="/api/event/like",
     *      summary="like a file ",
     *      description="like a file ",
     *      operationId="eventFileLike",
     *      tags={"Event"},
     *      security={
     *          {"bearerAuth": {}}
     *      },
     *     @OA\Parameter(
     *          name="file_id",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="integer"
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

    public function like(Request $request) {
        $file = EventFile::query()->where('id', $request->file_id)->firstOrFail();
        $file->vote += 1;
        $file->save();

        Vote::query()->create([
            'file_id' => $request->file_id,
            'client_id' => auth()->guard('api')->user()->id,
        ]);

        return _response("", "ok");
    }

    /**
     * @OA\Post (
     *      path="/api/event/dislike",
     *      summary="dislike a file ",
     *      description="dislike a file ",
     *      operationId="eventFileDisLike",
     *      tags={"Event"},
     *      security={
     *          {"bearerAuth": {}}
     *      },
     *     @OA\Parameter(
     *          name="file_id",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="integer"
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

    public function dislike(Request $request) {
        $file = EventFile::query()->where('id', $request->file_id)->firstOrFail();
        $file->vote -= 1;
        $file->save();

        $like = Vote::query()->where('client_id', auth()->guard('api')->user()->id)
            ->where('file_id', $request->file_id)->firstOrFail();

        $like->delete();


        return _response("", "ok");
    }
}
