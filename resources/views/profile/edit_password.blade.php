@extends('index')
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12">
        <section class="container ">
            <div class=" row margin content">

                @include('profile.navbar')

                <div class=" colum-lg-9 col-md-8 col-sm-6 col-12">
                    <div class="row ">
                        <img class="profile-circle circle-grey web-item" src="{{asset('assets/photo/circle-grey.svg')}}">

                        <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                            <h1 class="title-item ">
                                ویرایش رمز عبور
                            </h1>
                        </div>
                        <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                            <div class="Edit-profile border-box">
                                <div class="login-form">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <form method="post" action="{{ route('password_submit_profile') }}">
                                                @csrf
                                                <div class="row">
                                                    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                                                        <div class="input-row">
                                                            <label>رمز عبور فعلی</label>
                                                            @error('password')
                                                            <p class="password-error">{{ $message }}</p>
                                                            @enderror

                                                            <input class="padding-right pass" type="password" placeholder="رمز عبور فعلی را وارد کنید" name="password">
                                                            <img src="{{asset('assets/icon/Password.svg')}}">
                                                        </div>
                                                    </div>
                                                    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                                                        <div class="input-row">
                                                            <label>رمز عبور جدید</label>
                                                            <span class="message "></span>
                                                            @error('new_password')
                                                            <p class="password-error" id="error_next_line">{{ $message }}</p>

                                                            @enderror
                                                            <input class="pass1 padding-right pass" type="password" placeholder="رمز عبور جدید را وارد کنید" name="new_password">
                                                            <img src="{{asset('assets/icon/Password.svg')}}">
                                                        </div>
                                                    </div>
                                                    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                                                        <div class="input-row">
                                                            <label>تکرار رمز عبور جدید</label>
                                                            <p class="confirm-pass" >رمز تطابق ندارد</p>
                                                            @error('re_new_password')
                                                            <p class="password-error" id="error_next_line2">{{ $message }}</p>
                                                            @enderror
                                                            <input class="pass2 padding-right pass" type="password" placeholder="تکرار رمز عبور جدید را وارد کنید" name="re_new_password">
                                                            <img src="{{asset('assets/icon/Password.svg')}}">
                                                        </div>
                                                    </div>
                                                    <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <button  class="sing-up-btn shrink yellow-btn flex-box ">
                                                            بروزرسانی رمز عبور
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </section>
    </div>

@endsection


@section('optional_footer')
    <script>


        $('.pass1').keyup(function(){
            let len = this.value.length;
            const pbText = $('.input-row .message');

            document.getElementById('error_next_line').style.display = "none" ;
            document.getElementById('error_next_line2').style.display = "none" ;
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
