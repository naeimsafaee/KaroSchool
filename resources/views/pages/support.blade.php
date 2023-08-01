@extends('index')
@section('content')

    <div class="col-lg-12 col-md-12 col-sm-12">
        <section class="container">
            <div class=" row margin content">


                <div class="center-item col-lg-9 col-md-9 col-sm-12 col-12">
                    <div class="row ">
                        <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class=" history-title">
                                <a class="flex-box" href="{{ route('home') }}">
                                    <img src="{{asset('assets/icon/Home.svg')}}">
                                    مدرسه کارو
                                </a>
                                <a>
                                    <img src="{{asset('assets/icon/Left%20Arrow.svg')}}">
                                </a>
                                <a class="flex-box">
                                    <img src="{{asset('assets/icon/Privacy.svg')}}">
                                    پشتیبانی نداریم ...
                                </a>

                            </div>
                        </div>
                        <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                            <h2 class="title-item margin-bottom"> پشتیبانی نداریم ...</h2>

                        </div>
                            <div class="courses-details padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                             {{--   <h2>
                                    {{ $term->title }}
                                </h2>--}}
                                <p>
                                    شما می‌تونید خیلی راحت با دانلود اپلیکیشن مدرسه کارو، به دنیایی از ویژگی و کاربرهای دیگه‌ی مدرسه کارو متصل بشید. می‌تونید تو انجمن سوالاتتون رو مطرح کنید و از کاربرای دیگه‌ی مدرسه کارو برای پیدا کردن جواب کمک بگیرید یا بین موضوعاتی که تا الان مطرح شده جست‌وجو کنید شاید موضوع مدنظر شما رو هم قبلا بهش پرداخته باشن.
                                    از طرفی امکان چت کردن، ویس دادن و ارسال فایل رو داری تا بتونی با باقی دانشجوها در ارتباط باشی و تو چالش‌های حرفه‌ای شدن مدرسه‌ی کارو شرکت کنی تا علاوه‌بر آموزش‌های موجود تو سایت، با تمرین کردن با بقیه تو کار رشد کنی.
                                </p>

                            </div>

                        <a class="creat-new-topic shrink  buy-course-btn flex-box "
                           href="{{ route('topics' , 'new') }}" style="margin: auto">
                            پرسش و پاسخ
                        </a>
                        <a class="creat-new-topic shrink  buy-course-btn flex-box "
                           href="{{ route('faq') }}" style="margin: auto">
                            سوالات متدوال
                        </a>
                        <img class="strock-karo web-item" src="{{asset('assets/icon/karo.svg')}}">
                        <img class="circle-grey web-item" src="{{asset('assets/photo/circle-grey.svg')}}">

                    </div>
                </div>

            </div>

        </section>
    </div>
@endsection
