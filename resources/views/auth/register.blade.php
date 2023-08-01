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
                        <form method="post" action="{{ route('register_submit') }}">
                            @csrf
                            <div class="row">
                                <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                                    @error('name')
                                    @if($message)
                                    <div class="input-row active">
                                        <label>نام شما</label>
                                        <input class="with-masage padding-right active" type="text" placeholder=" نام را وارد کنید" name="name" value="{{ old('name')}}">
                                        <img src="{{asset('assets/icon/User.svg')}}">
                                        <p class="error-masage"> {{ $message }} </p>
                                    </div>
                                        @enderror
                                    @else
                                        <div class="input-row">
                                            <label>نام شما</label>
                                            <input class="with-masage padding-right" type="text" placeholder=" نام را وارد کنید" name="name" value="{{ old('name') }}">
                                            <img src="{{asset('assets/icon/User.svg')}}">
                                            <p class="error-masage"> پر کردن این فیلد ضروری است </p>
                                        </div>
                                    @endif
                                </div>
                                <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                                    @error('email')
                                    @if($message)
                                    <div class="input-row active">
                                        <label>آدرس ایمیل </label>
                                        <input class="with-masage padding-right active" type="text" placeholder=" آدرس ایمیل را وارد کنید" name="email" value="{{ old('email') }}">
                                        <img src="{{asset('assets/icon/Email.svg')}}">
                                        <p class="error-masage">{{ $message }}</p>
                                    </div>
                                        @enderror
                                    @else
                                        <div class="input-row">
                                            <label>آدرس ایمیل </label>
                                            <input class="with-masage padding-right" type="text" placeholder=" آدرس ایمیل را وارد کنید" name="email" value="{{ old('email') }}">
                                            <img src="{{asset('assets/icon/Email.svg')}}">
                                            <p class="error-masage"> پر کردن این فیلد ضروری است </p>
                                        </div>
                                    @endif
                                </div>
                                <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                                    @error('phone')
                                    @if($message)
                                    <div class="input-row active">
                                        <label>شماره موبایل</label>
                                        <input class="with-masage padding-right active" type="text" placeholder="  شماره موبایل را وارد کنید " name="phone" value="{{ old('phone') }}">
                                        <img src="{{asset('assets/icon/Phone.svg')}}">
                                        <p class="error-masage">{{ $message }}</p>
                                    </div>
                                        @enderror
                                    @else
                                        <div class="input-row">
                                            <label>شماره موبایل</label>
                                            <input class="with-masage padding-right" type="text" placeholder="  شماره موبایل را وارد کنید " name="phone" value="{{ old('phone') }}">
                                            <img src="{{asset('assets/icon/Phone.svg')}}">
                                            <p class="error-masage"> پر کردن این فیلد ضروری است </p>
                                        </div>
                                    @endif
                                </div>
                                <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                                    @error('password')
                                    @if($message)
                                    <div class="input-row active">
                                        <label>رمز عبور</label>
                                        <span class="message "></span>
                                        <input class="pass1 padding-right pass active" type="password" placeholder="رمز عبور را وارد کنید" name="password" >
                                        <img src="{{asset('assets/icon/Password.svg')}}">
                                        <p class="error-masage">{{ $message }}</p>

                                    </div>
                                        @enderror
                                    @else
                                        <div class="input-row">
                                            <label>رمز عبور</label>
                                            <span class="message "></span>
                                            <input class="pass1 padding-right pass" type="password" placeholder="رمز عبور را وارد کنید" name="password" >
                                            <img src="{{asset('assets/icon/Password.svg')}}">
                                        </div>
                                    @endif
                                </div>
                                <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                                    @error('re_try_Password')
                                    @if($message)
                                    <div class="input-row active">
                                        <label>تکرار رمز عبور</label>
                                        <p class="confirm-pass">رمز تطابق ندارد</p>
                                        <input class="pass2 padding-right pass active" type="password" placeholder="رمز عبور را وارد کنید" name="re_try_Password">
                                        <img src="{{asset('assets/icon/Password.svg')}}">
                                        <p class="error-masage">{{ $message }}</p>

                                    </div>
                                        @enderror
                                    @else
                                        <div class="input-row">
                                            <label>تکرار رمز عبور</label>
                                            <p class="confirm-pass">رمز تطابق ندارد</p>
                                            <input class="pass2 padding-right pass" type="password" placeholder="رمز عبور را وارد کنید" name="re_try_Password">
                                            <img src="{{asset('assets/icon/Password.svg')}}">
                                        </div>
                                    @endif
                                </div>
                                <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                                    <button   class="sing-up-btn shrink yellow-btn flex-box ">
                                        ثبت نام
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="outer-div">
                        </div>
                    </div>
                </div>
                <div class=" col-lg-12 col-md-12 col-sm-12">
                    <a class="inner-div sing-up  flex-box" href="{{ route('login') }}">
                        عضو هستید ؟
                        <span>
                              ورود به حساب
                               </span>

                        <div class="outer-div">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
{{--
    <script>
        $( ".with-masage" ).blur(function() {
            var inputVal =  $( this ).val();
            if (inputVal == '') {
                $( this ).parent().addClass("active")
                $( this ).addClass("active")
            }else{
                $( this ).parent().removeClass("active")
                $( this ).removeClass("active")

            }
        });

    </script>
--}}
    <script>


        $('.pass1').keyup(function(){
            let len = this.value.length;
            const pbText = $('.input-row .message');

            if (len === 0) {
                pbText.text("").css("color" , "#fff");
            } else if (len > 0 && len <= 4) {
                pbText.text("ضعیف").css("color" , "#F84263");
            } else if (len > 4 && len <= 8) {
                pbText.text("معمولی").css("color" , "#FFA700");
            } else {
                pbText.text("قوی").css("color" , "#18E884");
            }
        });
        $(document).ready(function(){
            $('.pass2').on('keyup', function() {

                var password = $(".pass1").val()
                var password1 = $(".pass2").val()

                if (password == password1) {
                    $('.confirm-pass').hide()
                }
                else {
                    $('.confirm-pass').show()
                }
            });
        });

    </script>
@endsection
