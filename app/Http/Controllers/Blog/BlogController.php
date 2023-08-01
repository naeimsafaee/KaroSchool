<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __invoke($slug = false)
    {
        $categories = BlogCategory::all();

        if ($slug) {
            $category = BlogCategory::query()->where('name', str_replace('_', ' ', $slug))->firstOrFail();
            $blogs = Blog::query()->where('blog_category_id', $category->id)->orderByDesc('created_at')->paginate(8);
        }

        else
            $blogs = Blog::query()->orderByDesc('created_at')->paginate(8);

        return view('blog.blogs' , compact('categories' , 'blogs'));
    }
}
