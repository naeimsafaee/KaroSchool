@extends('auth.index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="login-form">
                    <img class="web bean-1" src="{{asset('assets/photo/bean.svg')}}">
                    <img class="web Union" src="{{asset('assets/photo/Union.svg')}}">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <a href="#" class="login-logo">
                                <img src="{{ asset('assets/photo/logo.svg') }}">
                            </a>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h1 class="text-center">
                                تایید ایمیل
                            </h1>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="inner-div" style="text-align: center;">
                               ایمیل شما با موفقیت تایید شد

                                <div class="outer-div">
                                </div>
                            </div>
                        </div>
                        <div class=" col-lg-12 col-md-12 col-sm-12">
                            <a class="inner-div sing-up  flex-box" href="{{ route('login') }}">
                            <span>
                              ورود به حساب کاربری
                               </span>

                                <div class="outer-div">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('assets/js/verify.js')}}"></script>


@endsection
