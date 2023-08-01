<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Session;


class SingleBlogController extends Controller
{

    public function __invoke($slug)
    {
        $is_success = Session::has('success');
        Session::forget('success');
        $blog = Blog::query()->where('title' , str_replace('_', ' ', $slug))->firstOrFail();
        $related = Blog::query()->where('blog_category_id' , $blog->blog_category_id)
            ->orderByDesc('created_at')->take(4)->get();
        return view('blog.single_blog' , compact('blog' , 'related' , 'is_success'));

    }
}
