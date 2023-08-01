<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseToCategory;
use App\Models\sale_date;
use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class CourseController extends Controller
{

    public function __invoke(Request $request, $slug = false)
    {
        $categories = CourseCategory::all();
        $tools = Tool::all();
        $courses = Course::query()->orderByDesc('created_at');

        $sale = sale_date::query()->orderByDesc('created_at')->first();
        $seconds = false;
        if ($sale && today() >= $sale->start_date && today() <= $sale->end_date)
            $seconds = $sale->end_date;

        if ($request->has('category')) {

            $courses->whereHas('category', function (Builder $query) use ($request) {
                $query->where('course_categories.id', '=', $request->category);
            });
        }
        if ($request->has('tool')) {

            $courses->whereHas('tool', function (Builder $query) use ($request) {
                $query->where('tools.id', '=', $request->tool);
            });
        }

        if ($request->has('licence')) {
            if ($request->licence == 'free')
                $courses->where('price', 0);
            if ($request->licence == 'premium')
                $courses->where('price', '>', 0);

        }

        $courses = $courses->paginate(12);
        return view('courses.courses', compact('courses', 'categories', 'tools', 'seconds'));
    }
}
