@extends('index')
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12">
        <section class="container">
            <div class=" row margin content">


                <div class="search-row center-item col-lg-9 col-md-9 col-sm-12 col-12">
                    <div class="row padding-item">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h1 class="title-item margin-bottom">
                                جستجو برای " {{ $search }} "
                            </h1>
                        </div>
                        @if($search_count > 0)
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <p class="margin-bottom">
                                    {{ fa_number($search_count) }} نتیجه یافت شد
                                </p>
                            </div>
                            @if($courses->count() > 0)
                                <div class="courses-details col-lg-12 col-md-12 col-sm-12">
                                    <h2>
                                        دوره ها
                                    </h2>
                                </div>
                                @each('components.search_course' , $courses , 'course')
                            @endif
                            @if($blogs->count() > 0)
                                <div class="margin-top courses-details col-lg-12 col-md-12 col-sm-12">
                                    <h2>
                                        مقالات
                                    </h2>
                                </div>

                                @each('components.search_blog' , $blogs , 'blog')
                            @endif

                            <div class=" col-lg-12 col-md-12 col-sm-12">
                                @if($is_paginate)

                                    {{ $blogs->onEachSide(3)->links('components.page_numbers') }}
                                @else
                                    {{ $courses->onEachSide(3)->links('components.page_numbers') }}

                                @endif

                            </div>
                            <img class="strock-karo web-item" src="{{asset('assets/icon/karo.svg')}}">
                            <img class="circle-grey web-item" src="{{asset('assets/photo/circle-grey.svg')}}">

                        @else
                            <div class=" col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="not-found">
                                    <h2>چیزی یافت نشد</h2>
                                    <h6>
                                        مجدد جستجو کنید
                                    </h6>
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
    <script src="{{asset('assets/js/dropdown.js')}}"></script>

@endsection
