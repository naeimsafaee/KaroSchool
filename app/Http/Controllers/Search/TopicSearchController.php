<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicSearchController extends Controller {
    public function __invoke(Request $request) {
        $tools = Tool::all();
        $topics = Topic::query();
        $tool = false;
        if ($request->has('search')) {
            $topics->where('title', 'LIKE', "%" . $request->search . "%")
                ->orWhere('content', 'LIKE', "%" . $request->search . "%");
        }
        if ($request->has('category')) {
            $topics->where('topic_category_id', $request->category);
        }

        if ($request->has('tool')) {
            $topics->where('tool_id', $request->tool);
            $tool = Tool::query()->findOrFail($request->tool);
        }

        $topics = $topics->active()->paginate(10);

        return view('topic.topics', compact('tools', 'topics', 'tool'));
    }
}
