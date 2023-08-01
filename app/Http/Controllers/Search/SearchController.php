<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Course;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function __invoke(Request $request)
    {
        if($request->has('search'))
            $search = $request->search;
        else
            $search = "";

        $courses = Course::query()->where('title', 'LIKE', "%$search%")->orWhere('short_description', 'LIKE', "%$search%")->orWhere('description', 'LIKE', "%$search%")->paginate(3);

        $blogs = Blog::query()->where('title', "LIKE", "%$search%")->orWhere('description', 'LIKE', "%$search%")->paginate(6);

        $search_count = $courses->total() + $blogs->total();

        $is_paginate = true;

        if ($courses->total()> $blogs->total())
            $is_paginate =false;

        return view('search.search', compact('search', 'courses' , 'blogs' , 'search_count' , 'is_paginate'));
    }
}
