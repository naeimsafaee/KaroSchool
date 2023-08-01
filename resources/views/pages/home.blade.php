@extends('index')
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12">
        <section class="container">
            <div class="row margin">
                <div class="content padding-item col-lg-7 col-md-6 col-sm-12 col-12">
                    <img class="web-item star" src="{{asset('assets/icon/Star%201.svg')}}">
                    <img class="web-item karo" src="{{asset('assets/icon/karo.svg')}}">
                    <div class="top-image web-item">
                        <img src="{{asset('assets/icon/green-circle.svg')}}">
                        <img src="{{asset('assets/icon/grey-border.svg')}}">
                    </div>

                    <h1 class="main-text">
                        {{ setting('home.title') }}
                    </h1>
                    <h6>
                        {{ setting('home.text') }}
                    </h6>
                    <a class="web-item flex-box scroll">
                        <img src="{{asset('assets/icon/Scroll.svg')}}">
                        اسکرول کنید
                    </a>
                </div>
                <div class="web-item padding-item col-lg-5 col-md-6 col-sm-12 col-12">

                    <img class="main-image" src="{{ Voyager::image(setting('home.image')) }}">
                </div>

            </div>
            {{--
                        <div class="row margin">
                            <div class="padding-item col-lg-4 col-md-6 col-sm-6 col-12">
                                <a class="inner-div items">
                                    <div class="flex-box">
                                        <img src="{{asset('assets/icon/item1.svg')}}">
                                        <div>
                                            <h2>
                                                هر سوالی داری بپرس
                                            </h2>
                                            <h6>
                                                ۴۳۱۱ سوال و ۹۴۲۱۳ پاسخ ثبت شده
                                            </h6>
                                        </div>

                                    </div>
                                    <div class="outer-div"></div>
                                </a>

                            </div>
                            <div class="padding-item col-lg-4 col-md-6 col-sm-6 col-12">
                                <a class="inner-div items">
                                    <div class="flex-box">
                                        <img src="{{asset('assets/icon/item-2.svg')}}">
                                        <div>
                                            <h2>
                                                نمونه کار دانشجو ها
                                            </h2>
                                            <h6>
                                                در این لحظه 3,454 نمونه ثبت شده
                                            </h6>
                                        </div>

                                    </div>
                                    <div class="outer-div"></div>
                                </a>

                            </div>
                            <div class="padding-item col-lg-4 col-md-6 col-sm-6 col-12">
                                <a class="inner-div items">
                                    <div class="flex-box">
                                        <img class="item3" src="{{asset('assets/icon/item3.svg')}}">
                                        <div>
                                            <h2>
                                                سفارش پروژه
                                            </h2>
                                            <h6>
                                                با میزبانی هنرجویان برتر مدرسه کارو
                                            </h6>
                                        </div>

                                    </div>
                                    <div class="outer-div"></div>
                                </a>

                            </div>
                        </div>
            --}}
            <div class=" row margin content">
                <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="flex-box title">
                        <h2>
                           دوره های ویژه
                        </h2>
                        <a class="flex-box see-more" href="{{ route('course') }}">
                            <p>آرشیو دوره ها</p>
                            <svg viewBox="0 0 160 50" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path class="ticket-hover"
                                      d="M0 11C0 4.92487 4.95584 0 11.0692 0H148.931C155.044 0 160 4.92487 160 11V39C160 45.0751 155.044 50 148.931 50H11.0692C4.95584 50 0 45.0751 0 39V11Z"
                                      fill="#18E884"/>
                            </svg>

                        </a>
                    </div>
                </div>

                <div class=" col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row ">
                        @foreach($courses_price as $course)
                            <div class="position-relative padding-item col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
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

                                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path class="polygon-hover"
                                                              d="M7.5 2.00962C12.141 -0.669873 17.859 -0.669873 22.5 2.00962V2.00962C27.141 4.68911 30 9.64102 30 15V15C30 20.359 27.141 25.3109 22.5 27.9904V27.9904C17.859 30.6699 12.141 30.6699 7.5 27.9904V27.9904C2.85898 25.3109 0 20.359 0 15V15C0 9.64102 2.85898 4.68911 7.5 2.00962V2.00962Z"
                                                              fill="#241953"/>
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

                    </div>
                </div>


                {{-- <img class="web-item red-star" src="{{asset('assets/icon/red-star.svg')}}">
                 <img class="web-item bookmark" src="{{asset('assets/icon/bookmark.svg')}}">--}}
            </div>

            <div class=" row margin content" @if($seconds)style="margin-top: 80px" @endif>
                <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="flex-box title">
                        <h2>
                            تازه ترین دوره ها
                        </h2>
                        <a class="flex-box see-more" href="{{ route('course') }}">
                            <p>آرشیو دوره ها</p>
                            <svg viewBox="0 0 160 50" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path class="ticket-hover"
                                      d="M0 11C0 4.92487 4.95584 0 11.0692 0H148.931C155.044 0 160 4.92487 160 11V39C160 45.0751 155.044 50 148.931 50H11.0692C4.95584 50 0 45.0751 0 39V11Z"
                                      fill="#18E884"/>
                            </svg>

                        </a>
                    </div>
                </div>




                <div class=" col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row ">
                        {{--                        @each('components.course_home' , $courses , 'course')--}}
                        @foreach($courses as $course)
                            <div class="position-relative padding-item col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
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

                                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path class="polygon-hover"
                                                              d="M7.5 2.00962C12.141 -0.669873 17.859 -0.669873 22.5 2.00962V2.00962C27.141 4.68911 30 9.64102 30 15V15C30 20.359 27.141 25.3109 22.5 27.9904V27.9904C17.859 30.6699 12.141 30.6699 7.5 27.9904V27.9904C2.85898 25.3109 0 20.359 0 15V15C0 9.64102 2.85898 4.68911 7.5 2.00962V2.00962Z"
                                                              fill="#241953"/>
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

                    </div>
                </div>


                {{-- <img class="web-item red-star" src="{{asset('assets/icon/red-star.svg')}}">
                 <img class="web-item bookmark" src="{{asset('assets/icon/bookmark.svg')}}">--}}
            </div>


            <div class="row margin ">
                <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                    <div class="center-div">
                        <img class="fill-karo web-item" src="{{asset('assets/icon/fill-karo.svg')}}">
                        <img class="grey-circle web-item" src="{{asset('assets/icon/grey-circle.svg')}}">
                        <h3 class="text-center">
                            علاقمند به یادگیری چه ابزاری هستید
                        </h3>
                        <div class="abza-row">

                            @each('components.tools' , $tools , 'tool')


                        </div>

                    </div>
                </div>
            </div>
            <div class="row margin content ">
                <img class="electric web-item" src="{{asset('assets/photo/electric.svg')}}">
                <img class="orange-bookmark web-item" src="{{asset('assets/photo/orange-bookmark.svg')}}">
                <img class="pepepr-star web-item" src="{{asset('assets/photo/pepepr-star.svg')}}">
                <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="flex-box title">
                        <h2>
                            تازه ترین ترفند ها
                        </h2>


                        <a class="flex-box see-more" href="{{ route('blog') }}">
                            <p>مشاهده همه ترفند ها</p>

                            <svg viewBox="0 0 160 50" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path class="ticket-hover"
                                      d="M0 11C0 4.92487 4.95584 0 11.0692 0H148.931C155.044 0 160 4.92487 160 11V39C160 45.0751 155.044 50 148.931 50H11.0692C4.95584 50 0 45.0751 0 39V11Z"
                                      fill="#18E884"/>
                            </svg>

                        </a>

                    </div>

                </div>
                <div class=" col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="less-row2  row  ">

                        @each('components.blog_home' , $blogs , 'blog')


                    </div>
                </div>

            </div>
            <div class="row margin ">
                <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                    <div class="flex-box  login-row">
                        <div>
                            <h1>
                                همین حالا به جمع {{ fa_number(number_format($clients)) }} دانشجوی مدرسه کارو بپیوندید
                            </h1>
                            <h6>
                                {{ fa_number(number_format($free_course)) }} آموزش رایگان
                                و {{ fa_number(number_format($course_count)) }} آموزش حرفه ای برای بازار کار
                            </h6>
                            <h6>
                                در کمتر از ۳۰ ثانیه ثبت نام کنید
                            </h6>
                        </div>
                        <a href="{{ route('register') }}" class="flex-box">
                            ثبت نام
                            <img src="assets/icon/Arrow%20Left.svg">
                            <svg class="green-Polygo" width="185" height="198" viewBox="0 0 185 198" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M66.2173 19.7172C72.7856 14.2057 81.7954 12.6171 89.8527 15.5497L148.383 36.8531C156.441 39.7858 162.321 46.7941 163.81 55.2382L174.626 116.579C176.115 125.023 172.986 133.62 166.418 139.132L118.703 179.169C112.135 184.681 103.125 186.269 95.0678 183.337L36.537 162.033C28.4797 159.101 22.599 152.092 21.1101 143.648L10.2941 82.3073C8.80513 73.8632 11.9342 65.2662 18.5025 59.7547L66.2173 19.7172Z"/>
                            </svg>
                        </a>
                    </div>

                </div>
            </div>
        </section>
    </div>

@endsection
@section('optional_footer')
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


