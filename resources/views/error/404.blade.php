@extends('index')
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12">
        <section class="container">
            <div class=" row margin content">


                <div class="error-box center-item col-lg-9 col-md-9 col-sm-12 col-12">
                    <div class="row ">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <img class="error" src="{{asset('assets/photo/error.svg')}}">
                            <h1 class="title-item text-center">
                                صفحه مورد نظر پیدا نشد
                            </h1>
                            <h5 class="error-result text-center">
                                متاسفانه در این دسته و آرشیو نوشته ای درج نشده است
                            </h5>
                            <h5 class="error-result text-center">

                                ممکن است شما دسترسی لازم را برای این بخش نداشته باشید
                            </h5>
                            <h5 class="error-result text-center">
                                ممکن است تاریخ انقضای مطالب این بخش سر رسیده باشد
                            </h5>
                            <a href="{{ route('home') }}" class="back-home flex-box yellow-btn shrink">
                                بازگشت به صفحه اصلی
                            </a>
                        </div>

                        <img class="strock-karo web-item" src="{{asset('assets/icon/karo.svg')}}">
                        <img class="circle-grey web-item" src="{{asset('assets/photo/circle-grey.svg')}}">

                    </div>
                </div>

            </div>

        </section>
    </div>

@endsection




