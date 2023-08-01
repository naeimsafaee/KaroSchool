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
                                <a class="flex-box" href="{{ route('blog') }}">
                                    <img src=""{{asset('assets/icon/Trick.svg')}}"">
                                    ترفند ها
                                </a>
                                <a>
                                    <img src="{{asset('assets/icon/Left%20Arrow.svg')}}">
                                </a>
                                <a >
                                    {{ $blog->title }}
                                </a>

                            </div>
                        </div>
                        <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                            <h2 class="title-item">{{ $blog->title }}</h2>

                        </div>
                        <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="single-image-box">
                                <div id="player"></div>
                            </div>
                        </div>
                        <div class="courses-details padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                            {!! $blog->description !!}
                        </div>

                        <div class="date flex-box" style="text-align: left; display: block">
                            <img src="{{asset('assets/icon/Calendar.svg')}}">
                            {{ $blog->time }}
                        </div>
                        <img class="strock-karo web-item" src="{{asset('assets/icon/karo.svg')}}">
                        <img class="circle-grey web-item" src="{{asset('assets/photo/circle-grey.svg')}}">

                        <div class=" margin col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <div class="courses-details padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h2 class="margin-bottom">
                                        ترفند های مرتبط
                                    </h2>
                                </div>

                                @each('components.blogs' , $related , 'blog')


                            </div>

                        </div>
                        @if(count($blog->comments) > 0)
                        <div class=" margin col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <div class="courses-details padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h2>
                                        دیدگاه ها
                                    </h2>

                                </div>

                                @each('components.course_comment' , $blog->comments , 'comment')

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
                                            <form class="massage-form" method="post" action="{{ route('blog_comment') }}">
                                                @csrf
                                                <div class="input-row">
                                                    <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                                    <textarea name="text" @if(count($blog->comments) > 0) placeholder="دیدگاه خود را بنویسید" @else placeholder="اولین نفری باشید که نظر میدهید ! " @endif></textarea>


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
                id:"player",
                file: "{{Storage::url(json_decode($blog->file)[0]->download_link)}}",
                poster:"url(assets/photo/sample.png)"
            }
        );
    </script>
    <script src="{{asset('assets/js/morph-inline-code.js')}}"></script>
    <script src="{{ asset('assets/js/error.js') }}"></script>

    <script>
        $(document).ready(function () {
            $("#submit").click(function () {
                $(".alert-success").slideToggle("slow").delay(2000).slideToggle("slow");
            });
        });

    </script>
@endsection
