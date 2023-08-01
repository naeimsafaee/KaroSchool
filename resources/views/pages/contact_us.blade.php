@extends('index')
@section('content')

    @if($is_success)
        <div class="error-message error-style">
            درخواست شما با موفقیت ثبت شد.
        </div>
    @endif
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
                                <a class="flex-box" href="{{ route('contact_us') }}">
                                    <img src="{{asset('assets/icon/Contact%20US.svg')}}">
                                    تماس با ما
                                </a>

                            </div>
                        </div>
                        <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                            <h2 class="title-item Quesion-title"> تماس با ما</h2>
                        </div>
                        <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="inner-div">
                                <img class="contact-us-image" src="{{asset('assets/photo/contact-us.svg')}}">
                                <form class="contact-us" method="post" action="{{ route('contact_us_submit') }}"
                                      id="contact_form">
                                    @csrf
                                    <div class="row">
                                        <div class="padding-item col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="input-row">
                                                <label>
                                                    نام شما
                                                </label>
                                                <input type="text" placeholder="نام را وارد کنید" name="name"
                                                       value="{{ old('name') }}">
                                                @error('name')
                                                <span style="color: red">
                                                    {{ $message }}
                                                </span>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="padding-item col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="input-row">
                                                <label>
                                                    ایمیل
                                                </label>
                                                <input type="text" placeholder="آدرس ایمیل را وارد کنید" name="email"
                                                       value="{{ old('email') }}">
                                                @error('email')
                                                <span style="color: red">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="input-row">
                                                <label>
                                                    توضیحات
                                                </label>
                                                <textarea name="description"
                                                          placeholder="دیدگاه خود را بنویسید">{{ old('description') }}</textarea>
                                                @error('description')
                                                <span style="color: red">
                                                    {{ $message }}
                                                </span>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class=" padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                                            <button type="button" class=" shrink yellow-btn flex-box "
                                                    onclick="document.getElementById('contact_form').submit()">
                                                ارسال پیام
                                            </button>
                                            <div class="alert-success ">
                                                پیام شما با موفقیت ارسال شد
                                            </div>
                                        </div>
                                    </div>


                                </form>
                                <div class="outer-div"></div>
                            </div>
                        </div>
                    </div>
                    <div style="height: 100px"></div>
                </div>

            </div>

        </section>
    </div>

@endsection


@section('optional_footer')
    <script src="{{ asset('assets/js/error.js') }}"></script>

    <script>
        $(document).ready(function () {
            $("#submit").click(function () {
                $("body").find("#submit").html("\t <div class=\"loading\">\t\n" +
                    "\t\t<span class=\"circles\"></span>\n" +
                    "\t\t<span class=\"circles\"></span>\n" +
                    "\t\t<span class=\"circles\"></span>\n" +
                    "\t</div>");
                const secondtimeout = setTimeout(function() {
                    $("#submit").html("  پیام ارسال شد");
                    $(".alert-success").slideToggle("slow").delay(1500).slideToggle("slow");
                }, 2500);
                secondtimeout();

                clearTimeout(secondtimeout);
            });
        });

    </script>

@endsection
