<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Client;
use App\Models\ClientToCourse;
use App\Models\ContactUs;
use App\Models\Course;
use App\Models\Faq;
use App\Models\Lesson;
use App\Models\sale;
use App\Models\sale_date;
use App\Models\Term;
use App\Models\Tool;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Session;
use TCG\Voyager\Models\Transaction;

class HomeController extends Controller
{

    public function __invoke(Request $request)
    {
        $sale = sale_date::query()->orderByDesc('created_at')->first();
        $sale_course = sale::all();
        $seconds = false;

        if ($sale && (Carbon::now('Asia/Tehran')->addHours(3)->addMinute(30) ) >= $sale->start_date && (Carbon::now('Asia/Tehran')->addHours(3)->addMinute(30) ) <= $sale->end_date) {
            $seconds = $sale->end_date;

            if ($sale_course->count() > 0) {
                foreach ($sale_course as $course_id) {
                    $course = Course::query()->findOrFail($course_id->course_id);
                    $course->discount_price = $course->price - ($course->price * ($sale->percent) / 100);
//                    die(json_encode($course->discount_price));
                    $course->save();
                }

            } elseif ($sale_course->count() <= 0) {
                $sale_course = Course::all();
                foreach ($sale_course as $course) {
                    $course->discount_price = $course->price - ($course->price * ($sale->percent) / 100);
                    $course->save();
                }
            }

        }
        elseif ($sale != null && $sale->count() > 0 && (Carbon::now('Asia/Tehran')->addHours(3)->addMinute(30) ) > $sale->end_date) {
            $sale->delete();
            $sale_course = Course::all();
            foreach ($sale_course as $course) {
                $course->discount_price = 0;
                $course->save();
            }

        }

        $blogs = Blog::query()->orderByDesc('created_at')->take(3)->get();
        $tools = Tool::all();
        $courses = Course::query()->orderByDesc('created_at')->where('price' , '=' , 0)->take(4)->get();
        $courses_price = Course::query()->orderByDesc('created_at')->where('price' , '>' , 0)->take(4)->get();
        $free_course = Course::query()->where('price', 0)->get()->count();
        $course_count = Course::all()->count();
        $clients = Client::all()->count();
//        die(json_encode($courses->select("discount_price")->get()));

        return view('pages.home', compact('blogs', 'tools', 'courses', 'free_course', 'course_count', 'clients', 'seconds' , 'courses_price'));
    }

    public function contact_us(Request $request)
    {
        $is_success = Session::has('success');
        Session::forget('success');
        return view('pages.contact_us', compact('is_success'));
    }

    public function contact_us_submit(Request $request)
    {
        Validator::make($request->all(), [

            'name' => ['required'],
            'email' => ['required'],
            'description' => ['required'],

        ], [
            'name.required' => "لطفا نام خود را وارد کنید",
            'email.required' => "لطفا ایمیل خود را وارد کنید ",
            'description.required' => "لطفا توضیحات خود را وارد کنید",

        ])->validate();


        ContactUs::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'content' => $request->description,
        ]);

        Session::put('success', true);

        return redirect()->route('contact_us');
    }

    public function faq(Request $request)
    {
        $faqs = Faq::all();
        return view('pages.faq', compact('faqs'));
    }

    public function term(Request $request)
    {
        $terms = Term::all();
        return view('pages.terms', compact('terms'));
    }

    public function support()
    {
        return view('pages.support');
    }
/*
    public function hjhj()
    {
        $courses = ClientToCourse::query()->whereDate('created_at', '>=', Carbon::now()->subDays(7))->get();
        foreach ($courses as $course){
            if (ClientToCourse::query()->where('client_id' , $course->client_id)
                    ->where('course_id' , $course->course_id)->count() > 1)
                $course->delete();
        }
        return redirect()->route('home');
    }*/

    /*    public function database() {
    //        $old_courses = DB::table('products')->get();
            $buys = DB::table('user_products')->get();
    //        $old_users = DB::table('user_products')->get();

            /* $users = DB::table('users')->where('id' , '>' , '1533')->get();

             foreach ($users as $user){
                 Client::query()->create([
                     'id' => $user->id,
                     'name' => $user->name,
                     'email' => $user->email,
                     'phone' => $user->phone,
                     'password' => $user->password,
                 ]);
             }*/

    /*  $i = 1;
      foreach ($old_users as $user){
          ClientToCourse::query()->create([
             'course_id'=>$user->products_id,
             'client_id'=>$user->user_id,
              'id' => $i
          ]);
          $i++;
      }*/

    /*    foreach ($old_courses as $old){
            Course::query()->create([
                'id' =>$old->id,
                'title' =>$old->name,
                'image' =>$old->picture,
                'description' =>$old->info,
                'hour' =>$old->duration,
                'price' =>$old->price,
                'file' =>$old->practice_file,
                'teacher_id' => 1 ,
                'course_category_id' => 1 ,
            ]);
        }*/

    /*        foreach ($old_lessons as $lesson){
            Lesson::query()->create([
                'id' =>$lesson->id,
                'title' =>$lesson->title,
                'description' =>$lesson->content,
                'file' =>$lesson->video,
                'time' =>$lesson->duration,
                'course_id' =>$lesson->product_id,
                'order' =>$lesson->sort,
            ]);
        }*/

    /*       foreach ($buys as $buy) {
               ClientToCourse::query()->create([
                   'id' => $buy->id,
                   'course_id' => $buy->products_id,
                   'client_id' => $buy->user_id,
               ]);
           }
           return redirect()->route('home');

       }*/

}
