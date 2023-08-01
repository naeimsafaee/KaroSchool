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
                        <a class="flex-box">
                            <img src="{{asset('assets/icon/question.svg')}}">
                            پرسش و پاسخ
                        </a>
                    </div>
                </div>

                @include('profile.navbar_topic')

                <div class=" col-lg-9 col-md-8 col-sm-6 col-12">
                    <div class="row">
                        <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                            <h2 class="title-item margin-bottom">
                                پرسش و پاسخ
                            </h2>
                        </div>
                        <div class=" col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="row margin-bottom">
                                <div class="padding-item col-lg-7 col-md-6 col-sm-12 col-12">
                                    <div class="input-row">
                                        @if(! Request::has('search'))
                                            <img class="search-text web-item" src="{{asset('assets/icon/search-text.svg')}}">
                                        @endif
                                        <img src="{{asset('assets/icon/search-icon.svg')}}">

                                        <form action="{{ route('search_topic') }}" method="GET">
                                            <input name="search" class="padding-right" type="text"
                                                   placeholder="جستجو کنید" value="{{ request()->search ?? "" }}">

                                        </form>
                                    </div>
                                </div>
                                <div class="padding-item col-lg-5 col-md-6 col-sm-12 col-12">
                                    <a class="creat-new-topic shrink yellow-btn flex-box "
                                       href="{{ route('topic_create') }}">
                                        ایجاد سوال جدید
                                    </a>
                                </div>

                                @if(Request::has('search'))
                                    <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                                        <p class="search-result-massage">
                                            {{ fa_number($topics->total()) }}
                                            نتیجه

                                            @if(Request::has('tool'))
                                            با ابزار "{{ $tool->name }}"
                                            @endif
                                            یافت شد
                                        </p>
                                    </div>
                                    @endif
                            </div>
                        </div>
                        @if($topics->total() > 0)

                            <div class=" col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="row ">
                                    <div class="q-row flex-box padding-item col-lg-8 col-md-12 col-sm-12 col-12">
                                        <div class="q-menu flex-box">
                                            <p class="q-menu-items flex-box">
                                                مرتب سازی بر اساس:
                                            </p>
                                            <a class="q-menu-items flex-box"
                                               href="{{ route('topics' , 'new') }}">
                                                <img class="grey-Polygon"
                                                     src="{{asset('assets/icon/grey-Polygon.svg')}}"
                                                     @if(url()->current() == route('topics' , 'new'))style="opacity: 1;" @endif>
                                                تازه ترین ها</a>
                                            <a class="q-menu-items flex-box"
                                               href="{{ route('topics' , 'controversial') }}">
                                                <img class="grey-Polygon" src="{{asset('assets/icon/grey-Polygon.svg')}}"
                                                     @if(url()->current() == route('topics' , 'controversial'))style="opacity: 1;" @endif>
                                                پر بحث ترین ها
                                            </a>

                                            @if(auth()->guard('clients')->check())
                                                <a class="q-menu-items flex-box active"
                                                   href="{{ route('topics' , 'me') }}">
                                                    <img class="grey-Polygon" src="{{asset('assets/icon/grey-Polygon.svg')}}"
                                                         @if(url()->current() == route('topics' , 'me'))style="opacity: 1;" @endif>


                                                    <img src="{{asset('assets/icon/my-topic.svg')}}">
                                                    تاپیک های من
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="padding-item col-lg-4 col-md-12 col-sm-12 col-12">
                                        <div class="dropdown-row input-row">
                                            <img class="grey-arrow" src="{{asset('assets/icon/grey-arrow.svg')}}">

                                            @if(Request::has('tool'))
                                                <div class="flex-box abzar-item">
                                                    <img src="{{ Voyager::image($tool->image) }}">
                                                    {{ $tool->name }}

                                                </div>
                                            @else
                                                <div class="flex-box abzar-item">
                                                    همه ابزار ها

                                                </div>
                                            @endif
                                            <ul class="abzar-list">
                                                @foreach($tools as $tool)
                                                    <li class="flex-box"
                                                        onclick="(() => { window.location = '{{ route("search_topic" , array_merge(request()->query->all(), ["tool" => $tool->id])) }}'})()">
                                                        <img src="{{ Voyager::image($tool->image) }}">
                                                        {{ $tool->name }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="question-category border-box">
                                    <div class="row">
                                        {{--                                @each('components.topics' , $topics , 'topic')--}}
                                        @foreach($topics as $topic)
                                            <div @if($loop->last)style="border-bottom:none;"
                                                 @endif class="question-category-items col-lg-12 col-md-12 col-sm-12 col-12"
                                                 onclick="window.location='{{ route('single_topic' , $topic->id) }}'">

                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                                        <div class="flex-box question-category-items-details">
                                                            <div class="image-box">
                                                                <img src="{{ $topic->client->image }}">
                                                            </div>
                                                            <div>
                                                                <h5>
                                                                    {{ $topic->title }}
                                                                </h5>
                                                                <a class=" new-name"  style="color: {{ $topic->category->color }}; background-color: {{ $topic->category->background_color }}">

                                                                {{ $topic->category->name }}
                                                                </a>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                                        <div class="view-row">
                                                            <div class="view-item flex-box">
                                                                <p>
                                                                    {{ fa_number($topic->answers_count) }}
                                                                </p>
                                                                <p>
                                                                    پاسخ
                                                                </p>

                                                            </div>
                                                            <div class="view-item flex-box">
                                                                <p>
                                                                    {{ fa_number($topic->views) }}
                                                                </p>
                                                                <p>
                                                                    بازدید
                                                                </p>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>



                                        @endforeach
                                        <div class=" col-lg-12 col-md-12 col-sm-12">

                                            {{ $topics->onEachSide(3)->links('components.page_numbers') }}
                                        </div>

                                    </div>

                                </div>
                            </div>
                        @else
                            <div class=" col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="not-found">

                                    <h2>چیزی یافت نشد</h2>
                                    <h6>
                                        مجدد جستجو کنید
                                    </h6>
                                    @if(url()->current() == route('topics' , 'me'))
                                    <a class="creat-new-topic shrink yellow-btn flex-box "
                                       href="{{ route('topic_create') }}" style="margin: auto">
                                        ایجاد سوال جدید
                                    </a>
                                    @endif
                                    <img src="{{asset('assets/icon/not%20found.svg')}}">
                                </div>
                            </div>

                        @endif

                    </div>
                </div>

            </div>

        </section>
    </div>
@endsection



@section('optional_footer')
    <script>

        // abzar-dropdown
        (function ($) { // Begin jQuery
            $(function () { // DOM ready
// If a link has a dropdown, add sub menu toggle.
                $('.abzar-item').click(function (e) {
                    $('.abzar-list').toggle();
                    $(this).parent().toggleClass("active");

                    e.stopPropagation();
                });
                $(".abzar-list li").click(function () {
                    var title = $(this).html();
                    $('.abzar-item').html(title).parent().removeClass("active");
                    $('.abzar-list').hide();
                });
// Clicking away from dropdown will remove the dropdown class
                $('.abzar-list').click(function (e) {
                    e.stopPropagation();
                });
                $('html').click(function () {
                    $('.abzar-list').hide();
                    $(".abzar-item").parent().removeClass("active");
                });

            }); // end DOM ready
        })(jQuery); // end jQuery

    </script>
    <script>
        $(".input-row input").focusout(function () {
            $(".search-text").show()
        });
        $(".input-row input").focus(function () {
            $(".search-text").hide()
        });
    </script>
    <script src="{{asset('assets/js/dropdown.js')}}"></script>
@endsection
