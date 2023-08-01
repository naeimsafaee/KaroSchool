<?php

namespace App\Http\Controllers\Topic;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\LikeToAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Session;


class AnswerController extends Controller
{
    public function answer(Request $request){
        Validator::make($request->all(), [
            'text' => ['required'],
        ], [
            'text.required' => "لطفا متن پیام  خود را وارد کنید",

        ])->validate();

        Answer::query()->create([
            'client_id' => auth()->guard('clients')->user()->id,
            'topic_id' => $request->topic_id,
            'content' => $request->text,
        ]);

        Session::put('success' , true);

        return redirect()->back();
    }

    public function like(Request $request){
        $answer = Answer::query()->active()->where('id', $request->answer_id)->firstOrFail();
        if($answer->client_like == false){
            $answer->likes += 1;
            $answer->save();

            LikeToAnswer::query()->create([
                'answer_id' => $request->answer_id,
                'client_id' => auth()->guard('clients')->user()->id,
            ]);

            return response()->json('ok');
        }
        else{
            $answer->likes -= 1;
            $answer->save();

            $like = LikeToAnswer::query()->where('client_id', auth()->guard('clients')->user()->id)->where('answer_id', $request->answer_id)->firstOrFail();

            $like->delete();

            return response()->json('ok');
        }

    }

    public function dis_like(Request $request){
        $answer = Answer::query()->where('id', $request->answer_id)->firstOrFail();
        $answer->likes -= 1;
        $answer->save();

        $like = LikeToAnswer::query()->where('client_id', auth()->guard('clients')->user()->id)->where('answer_id', $request->answer_id)->firstOrFail();

        $like->delete();

        return response()->json('ok');
    }

    public function reply(Request $request) {
        Validator::make($request->all(), [
            'text2' => ['required'],
        ], [
            'text2.required' => "لطفا متن پیام  خود را وارد کنید",

        ])->validate();

        Answer::query()->create([
            'client_id' => auth()->guard('clients')->user()->id,
            'topic_id' => $request->topic2_id,
            'content' => $request->text2,
            'answer_id'=>$request->answer2_id

        ]);

        return redirect()->route('profile');
    }

}
