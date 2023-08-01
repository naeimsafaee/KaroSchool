<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>یلدای کارو اسکولی</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/yalda_assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/yalda_assets/css/jquery-ui.min.css" rel="stylesheet">
    <link href="assets/yalda_assets/css/master.css" rel="stylesheet">
    <script src="assets/yalda_assets/js/JQUERY.js"></script>
    <script src="assets/yalda_assets/js/BOOTSTRAP.js"></script>
    <script src="assets/yalda_assets/js/ajax.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>

</head>
<body>

<div class="container-fluid">

    <div id="star-container">
        <div>
        </div>
    </div>
    <div class="h-bg">
        <div class="pattern flex-box">
            <div class="flex-box">
                <img src="assets/yalda_assets/icon/pattern1.svg">
                <img src="assets/yalda_assets/icon/pattern2.svg">
                <img src="assets/yalda_assets/icon/pattern1.svg">
                <img src="assets/yalda_assets/icon/pattern2.svg">
            </div>
            <div class="flex-box">
                <img src="assets/yalda_assets/icon/pattern1.svg">
                <img src="assets/yalda_assets/icon/pattern2.svg">
                <img src="assets/yalda_assets/icon/pattern1.svg">
                <img src="assets/yalda_assets/icon/pattern2.svg">
            </div>
            <div class="flex-box">
                <img src="assets/yalda_assets/icon/pattern1.svg">
                <img src="assets/yalda_assets/icon/pattern2.svg">
                <img src="assets/yalda_assets/icon/pattern1.svg">
                <img src="assets/yalda_assets/icon/pattern2.svg">
            </div>
            <div class="flex-box">
                <img src="assets/yalda_assets/icon/pattern1.svg">
                <img src="assets/yalda_assets/icon/pattern2.svg">
                <img src="assets/yalda_assets/icon/pattern1.svg">
                <img src="assets/yalda_assets/icon/pattern2.svg">
            </div>
            <div class="flex-box">
                <img src="assets/yalda_assets/icon/pattern1.svg">
                <img src="assets/yalda_assets/icon/pattern2.svg">
                <img src="assets/yalda_assets/icon/pattern1.svg">
                <img src="assets/yalda_assets/icon/pattern2.svg">
            </div>
            <div class="flex-box">
                <img src="assets/yalda_assets/icon/pattern1.svg">
                <img src="assets/yalda_assets/icon/pattern2.svg">
                <img src="assets/yalda_assets/icon/pattern1.svg">
                <img src="assets/yalda_assets/icon/pattern2.svg">
            </div>


        </div>

    </div>

    <div id="home" class="page active row max-height">
        <div class="col-lg-12">
            <div class="center-box">
                <div class="row ">
                    <div class="col-lg-12">
                        <a class="logo">
                            <img src="assets/yalda_assets/icon/logo.svg">
                        </a>
                    </div>
                    <div class="col-lg-12">
                        <h1 class="text-center">
                            مدرسه خلاقیت کارو
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <h2 lass="text-center">
                            به کهکشان یلدایی خوش آمدید
                        </h2>
                    </div>
                    <div class="col-lg-12">
                        <h3 class="text-center">
                            امیداوریم تو این شب زیبا شما
                            </br>
                            و خانواده تان حال کنید و خوراکی
                            </br>
                            موراکی بخورید تو خونه خودتونم
                            </br>
                            بمونید و تو این اوضاع خیت نرید
                            </br>
                            بچپید توخونه عمه و خاله و ننه
                            </br>
                            جون ایناتون
                        </h3>
                    </div>
                    <div class="col-lg-12">
                        @if(auth()->guard('clients')->check())
                            <a href="#" title="" target="_self" data-page-toggler data-toggle="game"
                               data-action="start_game" class="button">
                        @else
                            <a href="#" title="" target="phone-number" data-page-toggler
                               data-toggle="phone-number"
                               class="button">
                        @endif
                                <p>
                                    بزن بریم
                                </p>
                                <span class="chid1"></span>
                                <span class="chid2"></span>
                                <span class="chid3"> </span>
                                <span class="chid4"></span>

                            </a>

                    </div>
                </div>
            </div>
            <img class="big-h" src="assets/yalda_assets/icon/big-h.svg">
            <img class="small-h small-h-1" src="assets/yalda_assets/icon/small-h.svg">
            <img class="small-h small-h-2" src="assets/yalda_assets/icon/small-h.svg">
            <img class="small-h small-h-3" src="assets/yalda_assets/icon/small-h.svg">
        </div>
    </div>
    <div class="page" id="phone-number">
        <div class="row max-height">
            <div class="col-lg-12">
                <div class="center-box">
                    <div class="row max-height">
                        <div class="col-lg-12">
                            <img class="title-big-h" src="assets/yalda_assets/photo/big-h.png">
                            <h1 class="text-center">
                                به کهکشان یلدایی خوش اومدید
                            </h1>
                        </div>
                        <div class="col-lg-12">
                            <form class="position-relative">
                                <input id="phone_number_yalda_input" placeholder="شماره موبایلتون؟ ">
                                <img src="assets/yalda_assets/icon/phone-svgrepo-com.svg">
                            </form>
                        </div>
                        <div class="col-lg-12">

                        </div>
                        <div class="col-lg-12">
                            <a href="#" title="" target="verify-code" data-page-toggler data-toggle="verify-code"
                               class="button">
                                <p>
                                    ارسال کد
                                </p>
                                <span class="chid1"></span>
                                <span class="chid2"></span>
                                <span class="chid3"> </span>
                                <span class="chid4"></span>

                            </a>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="page" id="verify-code">
        <div class="row max-height">
            <div class="col-lg-12">
                <div class="center-box">
                    <div class="row max-height">
                        <div class="col-lg-12">
                            <img class="title-big-h" src="assets/yalda_assets/photo/big-h.png">

                            <h1 class="text-center">
                                به کهکشان یلدایی خوش اومدید
                            </h1>
                        </div>
                        <div class="col-lg-12">
                            <form class="position-relative">
                                <input id="verify_code_yalda_input"
                                       oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                       maxlength="4" placeholder="کدتون؟ ">
                                <img src="assets/yalda_assets/icon/password-svgrepo-com.svg">
                            </form>
                        </div>
                        <div class="col-lg-12">

                        </div>
                        <div class="col-lg-12">
                            <a href="#" title="" target="_self" data-page-toggler data-toggle="game" class="button">
                                <p>
                                    شروع کن
                                </p>
                                <span class="chid1"></span>
                                <span class="chid2"></span>
                                <span class="chid3"> </span>
                                <span class="chid4"></span>

                            </a>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="game" class="page row max-height">
        <div class="col-lg-12">
            <div class="center-box">
                <div class="row max-height">
                    <div class="col-lg-12">
                        <header class="flex-box justify-content-between">
                            <div class="user-profile flex-box">
                                <div class="image-box">
                                    @if(auth()->guard('clients')->check())
                                        <img class="avatar_img" src="{{ auth()->guard('clients')->user()->image }}">
                                    @else
                                        <img class="avatar_img" src="assets/yalda_assets/photo/Mask Group 35.jpg">
                                    @endif                                </div>
                                <div id="name_div">
                                    @if(auth()->guard('clients')->check())
                                        {{ auth()->guard('clients')->user()->name }}
                                    @endif
                                </div>

                            </div>
                            <div class="flex-box life">

                                <img class="heart_one" src="assets/yalda_assets/icon/Heart.svg">
                                <img class="heart_two" src="assets/yalda_assets/icon/Heart.svg">
                                <img class="heart_three" src="assets/yalda_assets/icon/Heart.svg">
                            </div>
                        </header>
                    </div>
                    <div class="col-lg-12">
                        <h4 class="text-center">

                            ننه سرما برات چندتا هندونه آورده، حالا تو یکی رو
                            </br>
                            ننه سرما برات چندتا هندونه آورده، حالا تو یکی رو
                            </br>
                            انتخاب کن و بازش کن تا جایزه رو بگیری.
                            </br>
                            راستی میتونی با ضربه زدن ببینی هندونه پوچه یا نه ولی
                            </br>
                            فقط میتونی بین دوتا هندونه این کارو انجام بدی.
                            </br>
                        </h4>
                    </div>

                    <div class="col-lg-12 text-center card-row">
                        <div class="scene scene--card">
                            <div class="card" data-index="0">
                                <div class="card__face card__face--front">
                                    <img src="assets/yalda_assets/icon/hen.png">
                                </div>
                                <div class="card__face card__face--back back-h">
                                    <img src="assets/yalda_assets/icon/back-h.svg">
                                    <div class="text">
                                        <!-- ۵۰ هزار تومان تخفیف -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="scene scene--card">
                            <div class="card" data-index="1">
                                <div class="card__face card__face--front">
                                    <img src="assets/yalda_assets/icon/hen.png">
                                </div>
                                <div class="card__face card__face--back back-h">
                                    <img src="assets/yalda_assets/icon/back-h.svg">
                                    <div class="text">
                                        <!-- ۵۰ هزار تومان تخفیف -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="scene scene--card">
                            <div class="card" data-index="2">
                                <div class="card__face card__face--front">
                                    <img src="assets/yalda_assets/icon/hen.png">
                                </div>
                                <div class="card__face card__face--back back-h">
                                    <img src="assets/yalda_assets/icon/back-h.svg">
                                    <div class="text">
                                        <!-- ۵۰ هزار تومان تخفیف -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="scene scene--card">
                            <div class="card" data-index="3">
                                <div class="card__face card__face--front">
                                    <img src="assets/yalda_assets/icon/hen.png">
                                </div>
                                <div class="card__face card__face--back poch-item back-h">
                                    <img src="assets/yalda_assets/icon/poch.svg">
                                    <div class="text">
                                        <!-- <span> پوچ شد </span> دوباره امتحان کن -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="scene scene--card">
                            <div class="card" data-index="4">
                                <div class="card__face card__face--front">
                                    <img src="assets/yalda_assets/icon/hen.png">
                                </div>
                                <div class="card__face card__face--back back-h">
                                    <img src="assets/yalda_assets/icon/back-h.svg">
                                    <div class="text">
                                        <!-- ۵۰ هزار تومان تخفیف -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <h2 class="hide text-center no-margin-bottom" id="text_of_discount">

                        </h2>
                        <h2 class="show-card hide my_hide_class">
                            بازش کن
                        </h2>
                    </div>
                    <div class="col-lg-12">
                        <a href="#" data-action="start_game" title="" target="_self" data-page-toggler
                           data-toggle="fall-cards" class="flex-box next-page">
                            <img src="assets/yalda_assets/icon/Arrow - Right.svg">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="fall-cards" class="page row max-height">
        <div class="col-lg-12">
            <div class="center-box">
                <div class="row max-height">
                    <div class="col-lg-12">
                        <header class="flex-box justify-content-between">
                            <div class="user-profile flex-box">
                                <div class="image-box">
                                    @if(auth()->guard('clients')->check())
                                        <img class="avatar_img" src="{{ auth()->guard('clients')->user()->image }}">
                                    @else
                                        <img class="avatar_img" src="assets/yalda_assets/photo/Mask Group 35.jpg">
                                    @endif
                                </div>

                                <div id="name_div">
                                    @if(auth()->guard('clients')->check())
                                        {{ auth()->guard('clients')->user()->name }}
                                    @endif
                                </div>

                            </div>
                            <div class="flex-box life">

                                <img class="heart_one" src="assets/yalda_assets/icon/Heart.svg">
                                <img class="heart_two" src="assets/yalda_assets/icon/Heart.svg">
                                <img class="heart_three" src="assets/yalda_assets/icon/Heart.svg">
                            </div>
                        </header>
                    </div>
                    <div class="col-lg-12">
                        <h4 class="text-center">
                            حالا وقتشه که فالت رو بگیروم عزیزم، کافیه یکی
                            </br>
                            از این کارت های زیر رو به دلخواه انتخاب کنی تا بریم
                            </br>
                            ببینم باید چیکار کنیم
                            </br>
                        </h4>
                    </div>

                    <div class="col-lg-12 text-center card-row">
                        <a href="#" title="" data-index="0" target="fall-game" data-page-toggler data-toggle="fall-game"
                           class="cards red">

                        </a>
                        <a href="#" title="" data-index="1" target="fall-game" data-page-toggler data-toggle="fall-game"
                           class="cards green">

                        </a>
                        <a href="#" title="" data-index="2" target="fall-game" data-page-toggler data-toggle="fall-game"
                           class="cards red">

                        </a>
                        <a href="#" title="" data-index="3" target="fall-game" data-page-toggler data-toggle="fall-game"
                           class="cards green">

                        </a>
                        <a href="#" title="" data-index="4" target="fall-game" data-page-toggler data-toggle="fall-game"
                           class="cards red">

                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div id="fall-game" class="page row max-height">
        <div class="col-lg-12">
            <div class="center-box">
                <div class="row max-height">
                    <div class="col-lg-12">
                        <header class="flex-box justify-content-between">
                            <div class="user-profile flex-box">
                                <div class="image-box">
                                    @if(auth()->guard('clients')->check())
                                        <img class="avatar_img" src="{{ auth()->guard('clients')->user()->image }}">
                                    @else
                                        <img class="avatar_img" src="assets/yalda_assets/photo/Mask Group 35.jpg">
                                    @endif
                                </div>
                                <div id="name_div">
                                    @if(auth()->guard('clients')->check())
                                        {{ auth()->guard('clients')->user()->name }}
                                    @endif
                                </div>

                            </div>
                            <div class="flex-box life">

                                <img class="heart_one" src="assets/yalda_assets/icon/Heart.svg">
                                <img class="heart_two" src="assets/yalda_assets/icon/Heart.svg">
                                <img class="heart_three" src="assets/yalda_assets/icon/Heart.svg">
                            </div>
                        </header>
                    </div>
                    <div class="col-lg-12">
                        <h4 class="text-center">
                            ای وای دیدی چی شد؟ فالت بهم ریخته!
                            </br>
                            اصلا اشکال نداره نگران نباش، چون میدونم خیلی
                            </br>
                            باهوشی و میتونی فالت رو مرتب کنی
                            </br>
                            کافیه این یه بیت شعرو با کلمات داده شده درست کنی
                            </br>
                        </h4>
                    </div>

                    <div class="col-lg-12 text-center card-row">
                        <div class="row">
                            <div class=" col-lg-6 col-md-6 col-sm-12">
                                <div class="box flex-box justify-content-start">
                                    <div class="senntece-box fall-placeholder" data-placeholder-id="1"><span></span>
                                    </div>
                                    <div class="senntece-box fall-placeholder" data-placeholder-id="2"><span></span>
                                    </div>
                                    <div class="senntece-box fall-placeholder" data-placeholder-id="3"><span></span>
                                    </div>
                                    <div class="senntece-box fall-placeholder" data-placeholder-id="4"><span></span>
                                    </div>
                                    <div class="senntece-box fall-placeholder" data-placeholder-id="5"><span></span>
                                    </div>

                                </div>
                            </div>
                            <div class=" col-lg-6 col-md-6 col-sm-12">
                                <div class="box flex-box justify-content-end">
                                    <div class="senntece-box fall-placeholder" data-placeholder-id="6"><span></span>
                                    </div>
                                    <div class="senntece-box fall-placeholder" data-placeholder-id="7"><span></span>
                                    </div>
                                    <div class="senntece-box fall-placeholder" data-placeholder-id="8"><span></span>
                                    </div>
                                    <div class="senntece-box fall-placeholder" data-placeholder-id="9"><span></span>
                                    </div>
                                    <div class="senntece-box fall-placeholder" data-placeholder-id="10"><span></span>
                                    </div>
                                    <div class="senntece-box fall-placeholder" data-placeholder-id="11"><span></span>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="circle-box box" id="middleBox">

                        <section class="words emblem " id="words">
                            <!--
                                <span id="word6" class="fall-item">بدخویی</span>
                                <span id="word7" class="fall-item">تو</span>
                                <span id="word8" class="fall-item">بر</span>
                                <span id="word1" class="fall-item">عشاق</span>
                                <span id="word2" class="fall-item">به</span>
                                <span id="word3" class="fall-item">درگهت</span>
                                <span id="word4" class="fall-item">اسیرند</span>
                                <span id="word5" class="fall-item">بیا</span>
                                <span id="word9" class="fall-item">تو </span>
                                <span id="word10" class="fall-item">نگیرند</span>
                                <span id="word11" class="fall-item">بیا</span>
                            -->

                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  /* vaghti miad ke ghlat beghe*/-->
    <div id="fail-game" class="page row max-height">
        <div class="col-lg-12">
            <div class="center-box">
                <div class="row ">
                    <div class="col-lg-12">
                        <a class="logo">
                            <img src="assets/yalda_assets/icon/logo.svg">
                        </a>
                    </div>
                    <div class="col-lg-12">
                        <h1 class="text-center">
                            ﻣﺪرﺳﻪ ﺧﻠﺎﻗﯿﺖ ﮐﺎرو
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <h2 lass="text-center">
                            اشکال نداره ایشالله سال دیگه
                        </h2>
                    </div>
                    <div class="col-lg-12">
                        <a class="button min-width" href="{{ route('course') }}">
                            <p>
                                مشاهده لیست دوره ها
                            </p>
                            <span class="chid1"></span>
                            <span class="chid2"></span>
                            <span class="chid3"> </span>
                            <span class="chid4"></span>

                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  /* vaghti miad ke dorost beghe*/-->
    <div id="Success-game" class="page row max-height">
        <div class="col-lg-12">
            <div class="center-box">
                <div class="row ">
                    <div class="col-lg-12">
                        <a class="logo">
                            <img src="assets/yalda_assets/icon/logo.svg">
                        </a>
                    </div>

                    <div class="col-lg-12">
                        <h2 lass="text-center" id="text_of_last_discount">
                        </h2>
                    </div>
                    <div class="col-lg-12">
                        <a class="button min-width" href="{{ route('course') }}">
                            <p>
                                مشاهده لیست دوره ها
                            </p>
                            <span class="chid1"></span>
                            <span class="chid2"></span>
                            <span class="chid3"> </span>
                            <span class="chid4"></span>

                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="assets/yalda_assets/js/socail-hover.js"></script>
<script src="assets/yalda_assets/js/master.js"></script>
<script src="assets/yalda_assets/js/jquery-ui.min.js"></script>
<script src="assets/yalda_assets/js/jqueryui-touchpunch.min.js"></script>

<script>

    window.onload = init();

    let poem = [];
    function init() {
        $("#home").addClass("active");
        initPages();
    }

    function initPages() {
        $(document).on("click touch", "[data-page-toggler]", function (e) {
            e.preventDefault();

            const target = $(this).data("toggle");

            if (target == "phone-number") {

                $(".h-bg").addClass("active");
                setTimeout(function () {
                    $(".page.active").addClass("out");
                    $("#" + target).addClass("active");
                    $(".page.out").removeClass("active").removeClass("out");
                }, 200);

            } else if (target == "verify-code") {

                const phone_number = $("#phone_number_yalda_input").val();
                if (phone_number.length === 0)
                    return;


                $.ajax({
                    type: "POST",
                    url: "{{ route('yalde_code') }}",
                    data: {"_token": "{{ csrf_token() }}", 'phone': phone_number},
                    success: function () {
                        setTimeout(function () {
                            $(".page.active").addClass("out");
                            $("#" + target).addClass("active");
                            $(".page.out").removeClass("active").removeClass("out");
                        }, 350);

                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                    }
                });

            } else if (target == "fall-game") {

                initFallGame()
                setTimeout(function () {
                    $(".page.active").addClass("out");
                    $("#" + target).addClass("active");
                    $(".page.out").removeClass("active").removeClass("out");
                }, 350);


                $.ajax({
                    type: "POST",
                    url: "{{ route('poem') }}",
                    data: {"_token": "{{ csrf_token() }}", 'index': $(this).data('index')},
                    success: function (data) {

                        $("#words").empty();
                        for (let i = 0; i < data.length; i++) {
                            poem[data[i].index] = data[i].text;
                            $("#words").append(`
                            <span id="word${data[i].index}" class="fall-item">${data[i].text}</span>
                        `);
                        }

                        initFallGame()

                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {

                    }
                });


            } else {
                if ($(this).data("action") == "start_game") {

                    $(".page.active").addClass("out");

                    setTimeout(function () {
                        $(".h-bg").hide(200);
                        $("#" + target).addClass("active");
                        $(".page.out").removeClass("active").removeClass("out");
                    }, 350);

                } else {
                    const verufy_code = $("#verify_code_yalda_input").val();
                    if (verufy_code.length === 0)
                        return;

                    const phone_number = $("#phone_number_yalda_input").val();

                    $.ajax({
                        type: "POST",
                        url: "{{ route('yalde_submit') }}",
                        data: {"_token": "{{ csrf_token() }}", 'phone': phone_number, 'verufy_code': verufy_code},
                        success: function (data) {

                            $("#name_div").text(data.name);
                            $("#avatar_img").attr('src' , data.image);

                            $(".page.active").addClass("out");

                            setTimeout(function () {
                                $(".h-bg").hide(200);
                                $("#" + target).addClass("active");
                                $(".page.out").removeClass("active").removeClass("out");
                            }, 350);
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {

                        }
                    });
                }

            }

        });
    }



    let heart_number = 3;
    let can_select_again = true;

    let show_text = "";
    let loss_heart = false;

    $(document).ready(function () {

        $(".card").click(function () {
            if(!can_select_again)
                return;
            $("#text_of_discount").hide();


            $.ajax({
                type: "POST",
                url: "{{ route('yalda_watermelon') }}",
                data: {"_token": "{{ csrf_token() }}", 'index': $(this).data('index')},
                success: function (data) {

                    // $(this).find(".text").text(data);
                    if(data == ""){
                        $("#text_of_discount").text("پوچ");

                        loss_heart = true;
                        show_text = "پوچ";

                    } else {
                        $("#text_of_discount").text(data);
                        // can_select_again = false;

                        show_text = data;
                    }

                    $(".my_hide_class").removeClass("hide");
                    $(this).addClass("hide");
                    // $(".card.active").addClass("is-flipped");

                   /* $(".page.active").addClass("out");

                    setTimeout(function () {
                        $(".h-bg").hide(200);
                        $("#fall-cards").addClass("active");
                        $(".page.out").removeClass("active").removeClass("out");
                    }, 350);*/
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {

                }
            });


            $(".card").removeClass("active");
            $(this).addClass("active");
            // $(".show-card").removeClass("hide");

        });
        $(".show-card").click(function () {
            $("#text_of_discount").show();

            if(loss_heart){
                 if(heart_number === 3)
                      $(".heart_three").addClass("diactive");
                  else if(heart_number === 2)
                      $(".heart_two").addClass("diactive");
                  else if(heart_number === 1)
                      $(".heart_one").addClass("diactive");

                heart_number--;
                if(heart_number == 0)
                    can_select_again = false;

                $(".card.active").find('.card__face--back img').attr('src' , 'assets/yalda_assets/icon/poch.svg');

            } else {
                can_select_again = false;

                $(".card.active").find('.card__face--back img').attr('src' , 'assets/yalda_assets/icon/back-h.svg')
            }

            $(".hide").removeClass("hide");
            $(this).addClass("hide");
            $(".card.active").addClass("is-flipped");

        });
    });


    function initFallGame() {
        $('.fall-item').draggable({
            snap: '.fall-placeholder',
            snapMode: 'inner',
            revert: 'invalid',
        });
        $('#middleBox').droppable({
            drop: function (event, ui) {
                var $this = $(this);
                $('.fall-placeholder[data-value="' + ui.draggable.innerText + '"]').data('value', '');
            }
        });
        $(".fall-placeholder span").droppable({
            drop: function (event, ui) {
                $(this).droppable('option', 'accept', ui.draggable);

                var $this = $(this);

                $this.attr('data-value', ui.draggable[0].innerText);
                ui.draggable.position({
                    my: "center",
                    at: "center",
                    of: $this,
                    using: function (pos) {
                        $(this).animate(pos, "slow", "linear");
                    }
                });

                if ($('.fall-placeholder span[data-value]').length == $('.fall-item').length) {
                    const valuesArray = [];
                    for (var i = 0; i < $('.fall-placeholder span[data-value]').length; i++) {
                        valuesArray.push($('.fall-placeholder span[data-value]')[i].getAttribute('data-value'));
                    }

                    console.log(poem + " / " + valuesArray.join(' '));

                    if (valuesArray.join(' ') == poem.join(' ')) {
                        setTimeout(function () {
                            $(".page.active").addClass("out");
                            $("#Success-game").addClass("active");
                            $(".page.out").removeClass("active").removeClass("out");
                        }, 350);

                        $.ajax({
                            type: "POST",
                            url: "{{ route('submit_poem') }}",
                            data: {"_token": "{{ csrf_token() }}", 'index': $(this).data('index')},
                            success: function (data) {

                                $("#text_of_last_discount").text(data);
                            },
                            error: function (XMLHttpRequest, textStatus, errorThrown) {

                            }
                        });


                    } else {
                        setTimeout(function () {
                            $(".page.active").addClass("out");
                            $("#fail-game").addClass("active");
                            $(".page.out").removeClass("active").removeClass("out");
                        }, 350);
                    }
                }

            },
            out: function (event, ui) {
                $(this).attr('data-value', '');
                $(this).droppable('option', 'accept', '.fall-item');
            }
        });
    }
</script>

</body>

</html>
