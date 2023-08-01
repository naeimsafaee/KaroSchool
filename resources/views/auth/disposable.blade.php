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
                        کد تایید
                    </h1>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="inner-div">


                        <form class="verify-inputs" method="post" action="{{ route('disposable_submit') }}" id="contact_form">
                            @csrf
                            <div class="row">
                                <div class=" col-lg-12 col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="dirction padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                                            <h6>
                                                کد ارسالی را به شماره {{ fa_number($client->phone) }}  ارسال شده را وارد کنید
                                            </h6>
                                            <a class="flex-box edit" href="{{ route('login') }}">
                                                <img src="{{asset('assets/icon/edit.svg')}}">
                                                ویرایش
                                            </a>
                                        </div>

                                        <div class="padding-item col-lg-3 col-md-3 col-sm-3 col-3">
                                            <input name="code[]" class=" code-1" tabindex="0" type="number" maxlength="1" size="1" min="0" max="9" />

                                        </div>
                                        <div class="padding-item col-lg-3 col-md-3 col-sm-3 col-3">
                                            <input name="code[]" class=" code-2" tabindex="1" type="number" maxlength="1" size="1" min="0" max="9" />

                                        </div>
                                        <div class="padding-item col-lg-3 col-md-3 col-sm-3 col-3">
                                            <input name="code[]" class=" code-3" tabindex="2" type="number" maxlength="1" size="1" min="0" max="9" />

                                        </div>
                                        <div class="padding-item col-lg-3 col-md-3 col-sm-3 col-3">
                                            <input name="code[]" class=" code-4" tabindex="3" type="number" maxlength="1" size="1" min="0" max="9" />

                                        </div>
                                        @error('code')
                                        <span style="color: red">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                        <div class="content padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                                            <button  type="button"  class="shrink yellow-btn flex-box " onclick="document.getElementById('contact_form').submit()">
                                                ورود به حساب
                                            </button>
                                            <div class="verify-count count-down flex-box">
                                                <div>
                                                    00:
                                                </div>
                                                <div class="count">
                                                    30
                                                </div>

                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                                    <div class="line">
                                        <div>یا ورود با</div>
                                    </div>

                                </div>
                                <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                                    <a class="flex-box shrink border-btn" href="{{ route('login_password_2') }}">
                                        <img src="{{asset('assets/icon/Password.svg')}}">
                                        ورود با رمز عبور
                                    </a>
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
    <script src="{{asset('assets/js/verify.js')}}"></script>


@endsection
