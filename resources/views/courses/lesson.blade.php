@extends('index')

@section('content')
    @if($is_success)
        <div class="error-message error-style">
            کامنت شما با موفقیت ثبت شد و پس از تایید نمایش داده خواهد شد
        </div>
    @endif

    <div class="col-lg-12 col-md-12 col-sm-12">
        <section class="container">
            <div class=" row margin content">
                <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class=" history-title">
                        <a class="flex-box" href="{{ route('home') }}">
                            <img src="{{asset('assets/icon/Home.svg')}}">
                            مدرسه کارو
                        </a>
                        <a>
                            <img src="{{asset('assets/icon/Left%20Arrow.svg')}}">
                        </a>
                        <a class="flex-box" href="{{ route('course') }}">
                            <img src="{{asset('assets/icon/SingleCourse.svg')}}">
                            دروه ها
                        </a>
                        <a>
                            <img src="{{asset('assets/icon/Left%20Arrow.svg')}}">
                        </a>
                        <a>
                            {{ $course->title }}
                        </a>

                    </div>
                </div>
                <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="title">
                        <h2>{{ $course->title }}</h2>
                    </div>
                </div>

                <div class="content padding-item col-lg-3 col-md-4 col-sm-6 col-12">
                    <img class="strock-karo web-item" src="{{asset('assets/icon/karo.svg')}}">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="inner-div right-item">
                            <ul class="category-list lesson-list">
                                @foreach($course->lessons as $heading)
                                    <li>
                                        <a class="flex-box @if(url()->current() ==  route('lesson' , [$course->slug , $heading->id])) active @endif "
                                           href="{{ route('lesson' , [$course->slug , $heading->id]) }}">
                                                <span class=" outer flex-box">
                                                    <span class="inner"></span>
                                                </span>
                                            <p>
                                                {{ $heading->title }}
                                            </p>
                                            <div class="flex-box time-item">
                                                <img src="{{asset('assets/icon/Time.svg')}}">
                                                {{ fa_number($heading->time) }}
                                            </div>
                                        </a>
                                    </li>

                                @endforeach

                            </ul>
                            <div class="outer-div"></div>
                        </div>

                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="inner-div right-item buy-courses">
                            <div class="progress-row">
                                <h5>
                                    {{ fa_number(number_format($percent , 0)) . "%" }} این دوره را گذرانده اید
                                </h5>
                                <div class="progress-bar-line">
                                    <div style="width:{{ $percent }}%"></div>
                                </div>
                            </div>
                            @if($course->practice_file)
                            <h6>
                                تمرین:
                            </h6>
                            <a class="download-btn shrink buy-course-btn" href="{{Storage::url(json_decode($course->practice_file)[0]->download_link)}}}">
                                <img src="{{asset('assets/icon/Checklist.svg')}}">
                                دانلود فایل تمرین
                            </a>
                            <div class="outer-div"></div>
                            @endif
                        </div>

                    </div>
                </div>
                <div class=" col-lg-9 col-md-6 col-sm-6 col-12">
                    <div class="row ">
                        <img class="grey-bean circle-grey web-item" src="{{asset('assets/photo/circle-grey.svg')}}">

                        <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="single-image-box">
                                <div id="player"></div>
                            </div>
                        </div>
                        <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-lg-6 col-md-16 col-sm-6 col-12">
                                    <div class="flex-box button-row">
                                        @if($next)
                                            <a href="{{ route('lesson' , [$course->slug , $next->id]) }}" class="flex-box shrink prev">
                                                <img src="{{asset('assets/icon/course-Arrow-Left.svg')}}">
                                                قسمت بعدی

                                            </a>
                                        @endif
                                        @if($previous)
                                            <a href="{{ route('lesson' , [$course->slug , $previous->id]) }}"
                                               class="flex-box shrink next">

                                                قسمت قبلی
                                                <img src="{{asset('assets/icon/courseArrow-right.svg')}}">

                                            </a>
                                        @endif

                                    </div>
                                </div>
                                <div class="margin-top col-lg-6 col-md-16 col-sm-6 col-12">
                                    <a class="Download flex-box shrink yellow-btn" href="{{Storage::url(json_decode($lesson->file)[0]->download_link)}}">
                                        <img src="{{asset('assets/icon/Download.svg')}}">
                                        دانلود این قسمت
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="courses-details padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                            <h2>
                                {{ $lesson->title }}
                            </h2>
                            <p>
                                {!! $lesson->description !!}
                            </p>


                        </div>

                        @if(count($course->lessons)>0)
                            <div class="margin col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="row">
                                    <div class="courses-details padding-item col-lg-12 col-md-12 col-sm-12 col-12"
                                         id="lesson">
                                        <h2>
                                            جلسات دوره
                                        </h2>
                                    </div>
                                    @foreach($course->lessons as $lesson1)
                                        <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">

{{--                                            <a class="courses-items inner-div" @if ($is_buy || $course->price==0 )href="{{ route('lesson' , [$course->slug , $lesson->id]) }}" @endif>--}}
                                            <a class="courses-items inner-div" >

                                                <div class="flex-box courses-items-title">
                                                    <div class="flex-box">
                                            <span class="outer flex-box">
                                                <span class="inner flex-box">{{ fa_number($loop->index +1) }}</span>
                                            </span>
                                                        <h6>{{ $lesson1->title }}</h6>
                                                    </div>
                                                    <img class="arrow-active"
                                                         src="{{asset('assets/icon/arrow-active.svg')}}">

                                                </div>
                                                <p>
                                                    {!! $lesson1->description !!}
                                                </p>
                                                <div class="outer-div"></div>
                                            </a>
                                        </div>
                                    @endforeach

                                </div>

                            </div>
                        @endif

                        @if(count($pre_course)>0)
                            <div class=" margin col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="row">
                                    <div class="courses-details padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                                        <h2>
                                            پیش نیاز های این دوره
                                        </h2>
                                    </div>
                                    @each('components.pre_courses' , $pre_course , 'course')

                                </div>

                            </div>
                        @endif
                        @if(count($related) > 0)
                            <div class=" margin col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="row">
                                    <div class="courses-details padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                                        <h2>
                                            دوره های پیشنهادی
                                        </h2>
                                    </div>
                                    @foreach($related as $rlt)
                                        <div class="position-relative padding-item col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">

                                            <a class="inner-div classes-item" href="{{ route('single_course' , $rlt->slug) }}">
                                                <div class="image-box">
                                                    <img src="{{ Voyager::image($rlt->image) }}">
                                                </div>
                                                <div class="content-div">
                                                    <div class="flex-box">
                                                        @if(count($rlt->category)>0)
                                                            <div class="class-name">
                                                                {{ $rlt->category->first()->name }}
                                                            </div>
                                                        @endif
                                                        <div class="flex-box time">
                                                            {{ fa_number($rlt->hour) }}
                                                            <img src="{{asset('assets/icon/Time.svg')}}">
                                                        </div>

                                                    </div>
                                                    <div class="highlight">
                                                        {{ $rlt->title }}
                                                    </div>
                                                    <div class="flex-box">
                                                        @if($rlt->price == 0)
                                                            <h6>
                                                                رایگان
                                                            </h6>
                                                        @elseif($rlt->discount_price > 0)
                                                            <div>
                                                                <h6 class="new-price">
                                                                    {{ fa_number(number_format($rlt->discount_price)) }}
                                                                    تومان
                                                                </h6>
                                                                <p class="old-price">
                                                                    {{ fa_number(number_format($rlt->price)) }}
                                                                    تومان
                                                                </p>

                                                            </div>
                                                        @else
                                                            <h6>
                                                                {{ fa_number(number_format($rlt->price)) }}
                                                                تومان
                                                            </h6>
                                                        @endif
                                                        <div class="flex-box">
                                                            <h6>
                                                                مشاهده دوره
                                                            </h6>
                                                            <div class="flex-box more">
                                                                <img src="{{asset('assets/icon/Arrow%20Left.svg')}}">

                                                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path class="polygon-hover" d="M7.5 2.00962C12.141 -0.669873 17.859 -0.669873 22.5 2.00962V2.00962C27.141 4.68911 30 9.64102 30 15V15C30 20.359 27.141 25.3109 22.5 27.9904V27.9904C17.859 30.6699 12.141 30.6699 7.5 27.9904V27.9904C2.85898 25.3109 0 20.359 0 15V15C0 9.64102 2.85898 4.68911 7.5 2.00962V2.00962Z" fill="#241953"/>
                                                                </svg>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="outer-div"></div>
                                            </a>
                                            @if($seconds && $rlt->discount_price)
                                                <div class="offer-row flex-box justify-content-between">
                                                    <h6>
                                                        تخفیفی شده
                                                    </h6>
                                                    <div class="flex-box sale_date">
                                                        <div class="offer-time">
                                                            <span id="hours"></span>
                                                            <span>ساعت</span>
                                                        </div>
                                                        <div class="offer-time">
                                                            <span id="minutes"></span>
                                                            <span>دقیقه</span>
                                                        </div>
                                                        <div class="offer-time">
                                                            <span id="seconds"></span>
                                                            <span>ثانیه</span>
                                                        </div>


                                                    </div>

                                                </div>

                                            @endif


                                        </div>

                                    @endforeach


                                </div>

                            </div>
                        @endif
                        @if(count($course->comments)>0)
                        <div class=" margin col-lg-12 col-md-12 col-sm-12 col-12" id="comment">
                            <div class="row">
                                <div class="courses-details padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h2>
                                        دیدگاه ها
                                    </h2>

                                </div>
                                {{--                                @each('components.course_comment' , $course->comments , 'comment' )--}}
                                @foreach($course->comments as $comment)
                                    @if($comment->course_comment_id == null)
                                        <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="comment-item flex-box">
                                                <div class="persone-details flex-box">
                                                    <div class="image-box">
                                                        <img src="{{ $comment->client->image }}">
                                                    </div>
                                                    @if($is_buy)
                                                        <div class="customer-item">
                                                            خریدار دوره
                                                        </div>
                                                    @else
                                                        <div class="Ordinary-customer">
                                                            کاربر عادی
                                                        </div>
                                                    @endif

                                                </div>
                                                <div class="border-box massage-text">
                                                    <div class="flex-box">
                                                        <h4>
                                                            {{ $comment->client->name }}
                                                        </h4>
                                                        <div class="date">
                                                            {{ $comment->time }}
                                                        </div>

                                                    </div>
                                                    <p>
                                                        {{ $comment->content }}
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        @if($comment->reply)
                                            <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="admin-row comment-item flex-box">
                                                    <div class="persone-details flex-box">
                                                        <div class="image-box">
                                                            <img class="admin"
                                                                 src="{{asset('assets/photo/admin.svg')}}">
                                                        </div>
                                                        <div class="admin-item">
                                                            ادمین
                                                        </div>

                                                    </div>
                                                    <div class="border-box massage-text">
                                                        <div class="flex-box">
                                                            <h4>
                                                                ادمین
                                                            </h4>
                                                            <div class="date">
                                                                {{ $comment->reply->time }}
                                                            </div>

                                                        </div>
                                                        <p>
                                                            {{ $comment->reply->content }}
                                                        </p>
                                                    </div>

                                                </div>
                                            </div>
                                        @endif
                                    @endif

                                @endforeach

                            </div>

                        </div>
                        @endif
                        <div class=" margin col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <div class="courses-details padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h2>
                                        ارسال دیدگاه ها
                                    </h2>

                                </div>
                                <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                                    @if(auth()->guard('clients')->check())
                                        <div class="comment-row comment-item flex-box">
                                            <div class="persone-details flex-box">
                                                <div class="image-box">
                                                    <img class="admin" src="{{ auth()->guard('clients')->user()->image }}">
                                                </div>
                                            </div>
                                            <form class="massage-form" method="post"
                                                  action="{{ route('course_comment') }}">
                                                @csrf
                                                <div class="input-row">
                                                    <input type="hidden" name="course" value="{{ $course->id }}">
                                                    <textarea name="text" @if(count($course->comments) > 0) placeholder="دیدگاه خود را بنویسید" @else placeholder="اولین نفری باشید که نظر میدهید ! " @endif></textarea>

                                                </div>
                                                <button class=" shrink yellow-btn flex-box ">ارسال
                                                    دیدگاه
                                                </button>
                                            </form>

                                        </div>
                                    @else
                                        <div class="comment-row comment-item flex-box">
                                            <div class="persone-details flex-box">
                                                {{--<div class="image-box">
                                                    <img src="{{ auth()->guard('clients')->user()->image }}">
                                                </div>--}}
                                            </div>
                                            <form class="massage-form"  action="{{ route('login') }}">
                                                @csrf
                                                <div class="input-row">
                                                    <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                                    <textarea style="cursor: pointer" onclick="window.location = '{{ route('login') }}'" name="text" placeholder="در بحث شرکت کنید "></textarea>

                                                </div>
                                                <button class=" shrink yellow-btn flex-box ">ارسال
                                                    دیدگاه
                                                </button>
                                            </form>

                                        </div>

                                    @endif
                                </div>

                            </div>

                        </div>


                    </div>
                </div>

            </div>

        </section>
    </div>

@endsection

@section('optional_footer')
    <script>
        var player = new Playerjs(
            {
                id: "player",
                file: "{{ Storage::url(json_decode($lesson->file)[0]->download_link)}}",
                poster: "url(assets/photo/sample.png)"

            }
        );
    </script>

    <script src="{{asset('assets/js/morph-inline-code.js')}}"></script>

    <script src="{{asset('client/js/player.js')}}"></script>

    <script>

        let duration = 0;
        let has_submitted_seen = false;

        function PlayerjsEvents(event, id, data) {

            if (event == "duration") {
                duration = data;
            }
            if (event == "init") {
                player.api("volume", 1);
            }
            if (event == "time") {

                let percent = ((data * 100) / duration)

                if (percent > 80 && has_submitted_seen == false) {
                    $.ajax({
                        url: "{{ route('see_lesson' , [$lesson->id , $course->id]) }}",
                        method: 'GET',
                        data: {_token: "{{ csrf_token() }}"},
                        success: function (resposne) {
                            has_submitted_seen = true
                        },
                    });
                }
            }
        }
    </script>

    <script src="{{ asset('assets/js/error.js') }}"></script>

    <script>
        $(document).ready(function () {
            $("#submit").click(function () {
                $(".alert-success").slideToggle("slow").delay(2000).slideToggle("slow");
            });
        });

    </script>

    <script>

        $(".courses-items-title").click(function () {
            $(this).parent().toggleClass("active")
            $(this).parent().children("p").slideToggle()
        });
    </script>

@endsection

