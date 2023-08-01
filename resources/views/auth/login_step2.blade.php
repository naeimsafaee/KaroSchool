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
                        رمز عبور
                    </h1>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="inner-div">
                        <form method="post" action="{{ route('password_submit') }}" >
                            @csrf
                            <div class="row">
                                <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                                    @error('password')
                                    @if($message)
                                        <div class="input-row active">
                                            <label>رمز عبور</label>
                                            <a href="{{ route('forget_password') }}" class="forget-password">
                                                بازیابی رمز عبور
                                            </a>
                                            <input name="password" class="padding-right pass active" type="password"
                                                   placeholder="رمز عبور را وارد کنید">
                                            <img src="{{asset('assets/icon/Password.svg')}}">
                                            <p class="error-masage"> {{ $message }} </p>

                                        </div>
                                        @enderror
                                    @else
                                        <div class="input-row">
                                            <label>رمز عبور</label>
                                            <a href="{{ route('forget_password') }}" class="forget-password">
                                                بازیابی رمز عبور
                                            </a>
                                            <input name="password" class="padding-right pass" type="password"
                                                   placeholder="رمز عبور را وارد کنید">
                                            <img src="{{asset('assets/icon/Password.svg')}}">
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
                                    <a class="flex-box shrink border-btn" href="{{ route('disposable2') }}">
                                        <img src="{{asset('assets/icon/Login%20Mode.svg')}}">
                                        ورود با رمز یک بار مصرف
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
