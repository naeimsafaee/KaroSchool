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
                                    <img src="{{asset('assets/icon/Quesion.svg')}}">
                                    سوالات متداول
                                </a>

                            </div>
                        </div>
                        <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                            <h2 class="title-item Quesion-title"> سوالات متداول دوره ها</h2>
                        </div>

                        @foreach($faqs as $faq)
                        <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="courses-items inner-div Quesion-item" >
                                <div class="flex-box courses-items-title Quesion-details">
                                    <h6>
                                        {{ $faq->title }}
                                    </h6>
                                    <img src="{{asset('assets/icon/minus.svg')}}">
                                    <img class="minus" src="{{asset('assets/icon/minus.svg')}}">

                                </div>
                                <p >
                                    {!! $faq->content !!}
                                </p>
                                <div class="outer-div"></div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

            </div>

        </section>
    </div>

@endsection


@section('optional_footer')
    <script>

        $(".courses-items-title").click(function(){
            $(this).parent().toggleClass("active")
            $(this).parent().children("p").slideToggle()
        });
    </script>

@endsection

