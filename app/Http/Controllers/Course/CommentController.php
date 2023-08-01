<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\CourseComment;
use Illuminate\Http\Request;
use Session;


class CommentController extends Controller
{
    public function __invoke(Request $request)
    {
        CourseComment::query()->create([
            'client_id' => auth()->guard('clients')->user()->id ,
            'course_id' => $request->course ,
            'content' =>$request->text
        ]);
        Session::put('success' , true);


        return redirect()->back();
    }
}
