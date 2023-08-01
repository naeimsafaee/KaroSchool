<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\ClientLesson;
use App\Models\ClientToCourse;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\sale_date;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Session;


class LessonController extends Controller{

    public function __invoke($slug, $lesson_id){
        $is_success = Session::has('success');
        Session::forget('success');
        $course = Course::query()->where('title', str_replace('_', ' ', $slug))
            ->firstOrFail();

        $sale = sale_date::query()->orderByDesc('created_at')->first();
        $seconds = false;
        if ($sale && today() >= $sale->start_date && today() <= $sale->end_date)
            $seconds = $sale->end_date;

        $lesson = Lesson::query()->findOrFail($lesson_id);

        $pre_course = $course->pre_courses;

        $related = Course::whereHas('category', function (Builder $query) use ($course) {
            $query->where('course_categories.id', '=', $course->id);
        })->take(3)->get();

        if ($related->count() <= 0)
            $related = Course::all()->shuffle()->take(4);

        $is_buy = false;

        $order = $lesson->order;

        $next = Lesson::query()->where('course_id' , $course->id)->where('order' ,'=' ,$order+1)->first();
        $previous = Lesson::query()->where('course_id' , $course->id)->where('order' , '=',$order-1)->first();

        if(auth()->guard('clients')->check()){
            $buy = ClientToCourse::query()->where('client_id', auth()->guard('clients')->user()->id)->where('course_id', $course->id)->get();

            if($buy->count() > 0)
                $is_buy = true;
            if($course->price == 0)
                $is_buy = true;

        }

        $seen_lesson_count = ClientLesson::query()->where([
            'course_id' => $course->id,
            'client_id' => auth()->guard('clients')->user()->id
        ])->count();

        $all_lesson_count = $course->lessons->count();

        $percent = $seen_lesson_count * 100 / $all_lesson_count;
//        die(json_encode(json_decode($lesson->file)[0]->download_link));
        if($is_buy)
            return view('courses.lesson', compact('course', 'lesson', 'is_buy', 'pre_course',
                'related' , 'percent' , 'next' , 'previous' , 'is_success' , 'seconds' ));
        else
            return redirect()->route('add_to_cart', $course->id);
    }

    public function see_lesson($lesson_id , $course_id){
        $client_id = auth()->guard('clients')->user()->id;

        Lesson::query()->findOrFail($lesson_id);

        ClientLesson::query()->updateOrCreate([
            'lesson_id' => $lesson_id,
            'client_id' => $client_id,
            'course_id' => $course_id
        ]);
        return response("ok");
    }

}
