@extends('auth.index')
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="login-form">
            <img class="web bean-1" src="{{asset('assets/photo/bean.svg')}}">
            <img class="web Union" src="{{asset('assets/photo/Union.svg')}}">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <a href="{{ route('home') }}" class="login-logo">
                        <img src="{{ asset('assets/photo/logo.svg') }}">
                    </a>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h1 class="text-center">
                        ورود به حساب
                    </h1>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="inner-div">
                        <form method="post" action="{{ route('login_password') }}">
                            @csrf
                            <div class="row">
                                <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                                    @error('phone')
                                    @if($message)
                                        <div class="input-row active">
                                            <label>ایمیل یا شماره موبایل</label>
                                            <input class="padding-right active" type="text"
                                                   placeholder="ایمیل یا شماره موبایل را وارد کنید" name="phone">
                                            <img src="{{asset('assets/icon/User.svg')}}">
                                            <p class="error-masage"> {{ $message }} </p>
                                        </div>

                                        @enderror
                                    @else
                                        <div class="input-row">
                                            <label>ایمیل یا شماره موبایل</label>
                                            <input class="padding-right" type="text"
                                                   placeholder="ایمیل یا شماره موبایل را وارد کنید" name="phone">
                                            <img src="{{asset('assets/icon/User.svg')}}">
{{--                                            <p class="error-masage"> {{ $message }} </p>--}}
                                        </div>
                                    @endif
                                </div>
                                <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                                    <button class="more-padding flex-box shrink yellow-btn">
                                        ورود به حساب
                                    </button>
                                </div>

                                <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                                    <div class="line">
                                        <div>یا ورود با</div>
                                    </div>

                                </div>
                                <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                                    <a class="flex-box shrink blue-btn" href="{{ route('login_with_google') }}">
                                        <img src="{{asset('assets/icon/Google.svg')}}">
                                        ورود با گوگل
                                    </a>
                                </div>
                            </div>
                        </form>
                        <div class="outer-div">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <a class="inner-div sing-up  flex-box" href="{{ route('register') }}">
                        حساب کاربری نداری؟
                        <span>
                                ثبت نام
                               </span>

                        <div class="outer-div">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
