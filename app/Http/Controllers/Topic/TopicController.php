<?php

namespace App\Http\Controllers\Topic;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\LikeToTopic;
use App\Models\Tool;
use App\Models\Topic;
use Illuminate\Http\Request;
use Session;

class TopicController extends Controller
{
    public function __invoke($slug)
    {
        $tools = Tool::all();
        if($slug == 'new')
            $topics = Topic::query()->active()->orderByDesc('created_at')->paginate(10);

        elseif($slug == 'me')
            $topics = Topic::query()->active()->where('client_id', auth()->guard('clients')->user()->id)->paginate(10);

        elseif($slug == 'controversial') {
            $topics = Topic::query()->active()->get()->sortByDesc('answers_count')->pluck('id')->toArray();

            $orderedIds = implode(',', $topics);

            $topics = Topic::query()->active()->orderByRaw(Topic::query()->raw("FIELD(id, " . $orderedIds . " )"))->paginate(10);
        }
        return view('topic.topics' , compact('tools' , 'topics'));
    }

    public function single($id){

        $topic = Topic::query()->active()->where('id', $id)->firstOrFail();
        $topic->views += 1;
        $topic->save();
        $answers = Answer::query()->where('topic_id' , $topic->id)->orderByDesc('created_at')->active()->get();

        $is_success = Session::has('success');
        Session::forget('success');
        return view('topic.single', compact('topic' , 'answers' , 'is_success'));
    }

    public function like_topic(Request $request){
        $topic = Topic::query()->where('id', $request->topic_id)->firstOrFail();
        $topic->likes += 1;
        $topic->save();

        LikeToTopic::query()->create([
            'topic_id' => $request->topic_id,
            'client_id' => auth()->guard('clients')->user()->id,
        ]);

        return response()->json('ok');
    }

    public function dis_like_topic(Request $request){
        $topic = Topic::query()->where('id', $request->topic_id)->firstOrFail();
        $topic->likes -= 1;
        $topic->save();

        $like = LikeToTopic::query()->where('client_id', auth()->guard('clients')->user()->id)->where('topic_id', $request->topic_id)->firstOrFail();

        $like->delete();

        return response()->json('ok');
    }

}
