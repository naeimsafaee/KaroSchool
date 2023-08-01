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
                                قوانین و مقررات
                            </a>

                        </div>
                    </div>
                    <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                        <h2 class="title-item margin-bottom"> قوانین و مقررات</h2>

                    </div>
                    @foreach($terms as $term)
                    <div class="courses-details padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                        <h2>
                            {{ $term->title }}
                        </h2>
                        <p>
                            {!! $term->content !!}
                        </p>

                    </div>
                    @endforeach

                    <img class="strock-karo web-item" src="{{asset('assets/icon/karo.svg')}}">
                    <img class="circle-grey web-item" src="{{asset('assets/photo/circle-grey.svg')}}">

                </div>
            </div>

        </div>

    </section>
</div>
@endsection
