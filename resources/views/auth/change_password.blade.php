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
                        <form action="{{ route('change_submit') }}" method="post">
                            @csrf
                            <input type="hidden" name="reset_link" value="{{ $reset_link }}"/>

                            <div class="row">
                                <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                                    <div class="input-row">
                                        <label>رمز عبور جدید</label>
                                        <span class="message "></span>
                                        <input name="password" class="pass1 padding-right pass" type="password"
                                               placeholder="رمز عبور جدید را وارد کنید">
                                        <img src="{{asset('assets/icon/Password.svg')}}">
                                    </div>
                                    @error('password')
                                    <span style="color: red">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                                    <div class="input-row">
                                        <label>تکرار رمز عبورجدید </label>
                                        <p class="confirm-pass">رمز تطابق ندارد</p>
                                        <input name="password2" class="pass2 padding-right pass" type="password"
                                               placeholder="رمز عبور جدید را وارد کنید">
                                        <img src="{{asset('assets/icon/Password.svg')}}">
                                    </div>
                                    @error('password2')
                                    <span style="color: red">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                                    <button class="sing-up-btn shrink yellow-btn flex-box ">
                                        ثبت و تایید
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="outer-div">
                        </div>
                    </div>
                </div>
                <div class=" col-lg-12 col-md-12 col-sm-12">
                    <a class="inner-div sing-up  flex-box" href="{{ route('home') }}">
                            <span>
                               بازشکت به صفحه اصلی
                               </span>

                        <div class="outer-div">
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <script>


        $('.pass1').keyup(function () {
            let len = this.value.length;
            const pbText = $('.input-row .message');

            if (len === 0) {
                pbText.text("").css("color", "#fff");
            } else if (len > 0 && len <= 4) {
                pbText.text("ضعیف").css("color", "#F84263");
            } else if (len > 4 && len <= 8) {
                pbText.text("معمولی").css("color", "#FFA700");
            } else {
                pbText.text("قوی").css("color", "#18E884");
            }
        });
        $(document).ready(function () {
            $('.pass2').on('keyup', function () {

                var password = $(".pass1").val()
                var password1 = $(".pass2").val()

                if (password == password1) {
                    $('.confirm-pass').hide()
                } else {
                    $('.confirm-pass').show()
                }
            });
        });

    </script>


@endsection
