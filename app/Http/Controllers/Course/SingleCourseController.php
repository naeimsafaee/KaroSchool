<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\ClientToCourse;
use App\Models\Course;
use App\Models\sale_date;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Session;


class SingleCourseController extends Controller
{
    public function __invoke($slug)
    {
        $is_success = Session::has('success');
        Session::forget('success');
        $course = Course::query()->where('title', str_replace('_', ' ', $slug))->firstOrFail();

        $sale = sale_date::query()->orderByDesc('created_at')->first();
        $seconds = false;
        if ($sale && today() >= $sale->start_date && today() <= $sale->end_date)
            $seconds = $sale->end_date;



//        $related = Course::query()->where('course_category_id' , $course->id)
//            ->orderByDesc('created_at')->take(3)->get();


        $related = Course::whereHas('category', function (Builder $query) use ($course) {
            $query->where('course_categories.id', '=', $course->id);
        })->take(3)->get();

        if ($related->count() <= 0)
            $related = Course::all()->shuffle()->take(4);

        $pre_course = $course->pre_courses;

        $is_buy = false;

        if (auth()->guard('clients')->check()) {
            $buy = ClientToCourse::query()->where('client_id', auth()->guard('clients')->user()->id)
                ->where('course_id', $course->id)->get();

            if ($buy->count() > 0)
                $is_buy = true;


        }
        if ($is_buy)
            return redirect()->route('lesson', [$course->slug, $course->lessons->first()->id]);
        else
            return view('courses.single_course', compact('course', 'related', 'pre_course',
                'is_buy', 'is_success', 'seconds'));
    }

    public function free($id)
    {
        $course = Course::query()->findOrFail($id);
        if ($course->price == 0) {

            ClientToCourse::query()->create([
                'client_id' => auth()->guard('clients')->id(),
                'course_id' => $id
            ]);
        } else
            abort(404);

        return redirect()->route('lesson', [$course->slug, $course->lessons->first()->id]);

    }
}
