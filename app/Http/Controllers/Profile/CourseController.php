<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function __invoke(Request $request)
    {
        $client = auth()->guard('clients')->user();
        return view('profile.course' , compact('client'));
    }
}
