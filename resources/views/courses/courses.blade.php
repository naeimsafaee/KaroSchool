@extends('index')
@section('content')

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
                    </div>
                </div>

                <div class="padding-item col-lg-3 col-md-4 col-sm-6 col-12">
                    @if( Request::has('licence'))
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <h2 class="category-title-item">
                                لایسنس
                            </h2>

                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="border-box">
                                <div>
                                    <label class="checkbox-container" style="text-align: right">همه دوره ها
                                        <input type="radio" name="licenceRadio" onclick="window.location='{{ route('course', array_merge(request()->query->all(), ["licence" => 'all'])) }}'"
                                               @if(Request::has('licence') && ('all' == Request::input('licence'))) checked @endif>
                                        <span class="checkmark">
                                    </span>
                                    </label>

                                    <label class="checkbox-container" style="text-align: right">پرمیوم
                                        <input type="radio" name="licenceRadio" onclick="window.location='{{ route('course', array_merge(request()->query->all(), ["licence" => 'premium'])) }}'"
                                               @if(Request::has('licence') && ('premium' == Request::input('licence'))) checked @endif>

                                        <span class="checkmark"></span>
                                    </label>

                                    <label class="checkbox-container" style="text-align: right">رایگان
                                        <input type="radio" name="licenceRadio" onclick="window.location='{{ route('course', array_merge(request()->query->all(), ["licence" => 'free'])) }}'"
                                               @if(Request::has('licence') && ('free' == Request::input('licence'))) checked @endif>

                                        <span class="checkmark"></span>
                                    </label>

                                </div>
                            </div>

                        </div>
                    @endif
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <h2 class="category-title-item">
                            دسته بندی ها
                        </h2>

                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="border-box">
                            <ul class="category-list">
                                @each('components.course_categories' , $categories , 'category')

                            </ul>
                        </div>

                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <h2 class="category-title-item">
                            ابزار ها
                        </h2>

                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="border-box">
                            <ul class="category-list">
                                @each('components.course_tools' , $tools , 'tool')

                            </ul>
                        </div>

                    </div>


                    @if(! Request::has('licence'))
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <h2 class="category-title-item">
                             لایسنس
                        </h2>

                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="border-box">
                            <div>
                                <label class="checkbox-container" style="text-align: right">همه دوره ها
                                    <input type="radio" name="licenceRadio" onclick="window.location='{{ route('course', array_merge(request()->query->all(), ["licence" => 'all'])) }}'"
                                    @if(Request::has('licence') && ('all' == Request::input('licence'))) checked @endif>
                                    <span class="checkmark">
                                    </span>
                                </label>

                                <label class="checkbox-container" style="text-align: right">پرمیوم
                                    <input type="radio" name="licenceRadio" onclick="window.location='{{ route('course', array_merge(request()->query->all(), ["licence" => 'premium'])) }}'"
                                           @if(Request::has('licence') && ('premium' == Request::input('licence'))) checked @endif>

                                    <span class="checkmark"></span>
                                </label>


                                <label class="checkbox-container" style="text-align: right">رایگان
                                    <input type="radio" name="licenceRadio" onclick="window.location='{{ route('course', array_merge(request()->query->all(), ["licence" => 'free'])) }}'"
                                           @if(Request::has('licence') && ('free' == Request::input('licence'))) checked @endif>

                                    <span class="checkmark"></span>
                                </label>

                            </div>
                        </div>

                    </div>
                    @endif
                </div>


                <div class=" col-lg-9 col-md-6 col-sm-6 col-12">
                    <div class="row ">
                        <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                            <h2 class="title-item">
                                دوره ها
                            </h2>

                        </div>

{{--                        @each('components.course' , $courses , 'course')--}}
                        @foreach($courses as $course)
                            <div class="position-relative padding-item col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12" >

                                <a class="inner-div classes-item" href="{{ route('single_course' , $course->slug) }}">
                                    <div class="image-box">
                                        <img src="{{ Voyager::image($course->image) }}">
                                    </div>
                                    <div class="content-div">
                                        <div class="flex-box">
                                            @if(count($course->category)>0)
                                                <div class="class-name">
                                                    {{ $course->category->first()->name }}
                                                </div>
                                            @endif
                                            <div class="flex-box time">
                                                {{ fa_number($course->hour) }}
                                                <img src="{{asset('assets/icon/Time.svg')}}">
                                            </div>

                                        </div>
                                        <div class="highlight">
                                            {{ $course->title }}
                                        </div>
                                        <div class="flex-box">
                                            @if($course->price == 0)
                                                <h6>
                                                    رایگان
                                                </h6>
                                            @elseif($course->discount_price > 0)
                                                <div>
                                                    <h6 class="new-price">
                                                        {{ fa_number(number_format($course->discount_price)) }}
                                                        تومان
                                                    </h6>
                                                    <p class="old-price">
                                                        {{ fa_number(number_format($course->price)) }}
                                                        تومان
                                                    </p>

                                                </div>
                                            @else
                                                <h6>
                                                    {{ fa_number(number_format($course->price)) }}
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

                                @if($seconds && $course->discount_price)
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

                        <div class=" col-lg-12 col-md-12 col-sm-12">

                            {{ $courses->onEachSide(3)->links('components.page_numbers') }}
                        </div>
                    </div>
                </div>

            </div>

        </section>
    </div>

@endsection

@section('optional_footer')
    <script src="{{asset('assets/js/dropdown.js')}}"></script>

    <script>
        $(".animated-progress span").each(function () {
            $(this).animate(
                {
                    width: $(this).attr("data-progress") + "%",
                },
                1000
            );
        });
    </script>


    <script>


        var countDownDate = new Date("{{ $seconds }}").getTime();

        // Update the count down every 1 second
        var x = setInterval(function () {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            hours = hours + days*24 ;

            $('.sale_date #hours').text(hours);
            $('.sale_date #minutes').text(minutes);
            $('.sale_date #seconds').text(seconds);

            if (distance < 0) {
                clearInterval(x);
            }

        }, 1000);

    </script>

@endsection
