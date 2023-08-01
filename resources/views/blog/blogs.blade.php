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
                            <img src=""{{asset('assets/icon/Trick.svg')}}"">
                            ترفند ها
                        </a>
                    </div>
                </div>
                <div class="padding-item col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <h2 class="category-title-item">
                            دسته بندی ها
                        </h2>

                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="border-box">
                            <ul class="category-list">
                                @each('components.blog_categories' , $categories , 'category')

                            </ul>
                        </div>

                    </div>
                </div>
                <div class=" col-lg-9 col-md-6 col-sm-6 col-12">
                    <div class="row ">
                        <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                            <h2 class="title-item margin-bottom">
                                ترفند ها
                            </h2>

                        </div>

                        @each('components.blogs' , $blogs , 'blog')

                        <div class=" col-lg-12 col-md-12 col-sm-12">

                            {{ $blogs->onEachSide(3)->links('components.page_numbers') }}
                        </div>
                    </div>
                </div>

            </div>

        </section>
    </div>

@endsection


@section('optional_footer')

    <script src="{{asset('assets/js/dropdown.js')}}"></script>

@endsection
