
@extends('auth.index')
@section('content')
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
                    بازیابی رمز عبور
                </h1>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="inner-div">
                    <form method="post" action="{{ route('forget_password') }}">
                        @csrf
                        <div class="row">
                            <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                                <div class="input-row">
                                    <label>ایمیل یا شماره موبایل</label>
                                    <input name="username" class="padding-right" type="text" placeholder="  ایمیل یا شماره موبایل را وارد کنید ">
                                  @error('username')
                                    <span style="color: red">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                    <img src="{{asset('assets/icon/User.svg')}}">
                                </div>
                            </div>

                            <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                                <button   class="sing-up-btn shrink yellow-btn flex-box ">
                                    بازیابی رمز عبور
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="outer-div">
                    </div>
                </div>
            </div>
            <div class=" col-lg-12 col-md-12 col-sm-12">
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
