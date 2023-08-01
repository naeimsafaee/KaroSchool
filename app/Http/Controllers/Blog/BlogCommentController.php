<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use Session;


class BlogCommentController extends Controller
{
    public function __invoke(Request $request)
    {
        BlogComment::query()->create([
            'client_id' => auth()->guard('clients')->user()->id ,
            'blog_id' => $request->blog_id ,
            'content' =>$request->text
        ]);
        Session::put('success' , true);


        return redirect()->back();
    }
}
