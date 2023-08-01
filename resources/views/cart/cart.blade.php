@extends('cart.index')
@section('content')

    <div class="col-lg-12 col-md-12 col-sm-12">
        <h1 class="text-center">
            صورت حساب شما
        </h1>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="border-box">
            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12">
                    @foreach($client->cart as $cart)

                        <div class="flex-box">
                            <p>
                                {{ $cart->course->title }}
                            </p>
                        </div>
                        <div class="flex-box">
                            <p>
                                قیمت واحد
                            </p>
                            @if($cart->course->discount_price)
                                <p>
                                    {{ fa_number(number_format($cart->course->discount_price)) }}
                                </p>
                            @else
                                <p>
                                    {{ fa_number(number_format($cart->course->price)) }}
                                </p>
                            @endif
                        </div>
                    @endforeach

                    <div class="flex-box">
                        <p>
                            تخفیف
                        </p>
                        <p>
                            {{ $discount_price != 0 ? fa_number(number_format($discount_price)) : "ندارید" }}
                        </p>
                    </div>
                    <div class="flex-box">
                        <p>
                            مبلغ قابل پرداخت
                        </p>
                        <p>
                            {{ fa_number(number_format($sum - $discount_price)) }}
                        </p>
                    </div>
                </div>

                @if($discount_price <= 0)
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <form class="offer-code" method="post" action="{{ route('discount_cart') }}">
                        @csrf

                        @error('discount')
                        @if($message)
                            <div class="input-row active">
                                <label>کد تخفیف</label>
                                <input class="with-masage padding-right active" type="text"
                                       placeholder="کد تخفیف را وارد کنید" name="discount" value="{{ $discount }}">
                                <button class="offer-btn">
                                    اعمال کد تخفیف
                                </button>
                                <p class="error-masage"> {{ $message }} </p>
                            </div>
                            @enderror
                        @else
                            <div class="input-row ">
                                <label>
                                    کد تخفیف
                                </label>
                                <input placeholder="کد تخفیف را وارد کنید" name="discount" value="{{ $discount }}">
                                <button class="offer-btn">
                                    اعمال کد تخفیف
                                </button>
                            </div>
                        @endif

                    </form>

                </div>
                @else
                    <div class="offer-submit-row col-lg-12 col-md-12 col-sm-12">
                        <div class=" buy-courses-box">
                            <h6>
                                کد تخفیف با موفقیت اعمال شد
                            </h6>
                            <div class="offer-value">
                                مبلغ کسر شده:
                                <span>
                                  {{fa_number(number_format($discount_price))}}
                                    تومان
                                </span>

                                <p class="error-masage">مبلغ {{ fa_number(number_format($discount_price)) }} تومان از سبد خرید شما کسر شد!</p>

                            </div>

                        </div>
                       {{-- <a class="delet-offer-code">
                            حذف کد تخفیف
                        </a>--}}
                    </div>

                @endif
{{--
                <div class="darghah-row col-lg-10 col-md-10 col-sm-12">
                    <div class="row">
                        <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                            <p>
                                انتخاب درگاه
                            </p>
                        </div>
                        <div class="padding-item col-lg-4 col-md-4 col-sm-4 col-6">
                            <a class="pay-item flex-box">
                                <img class="bank" src="{{asset('assets/photo/Shahr.png')}}">
                                <div class="checked flex-box">
                                    <img src="{{asset('assets/icon/check.svg')}}">
                                </div>

                            </a>
                        </div>
                        <div class="padding-item col-lg-4 col-md-4 col-sm-4 col-6">
                            <a class="pay-item flex-box">
                                <img class="bank" src="{{asset('assets/photo/Dey.png')}}">
                                <div class="checked flex-box">
                                    <img src="{{asset('assets/icon/check.svg')}}">
                                </div>

                            </a>
                        </div>
                        <div class="padding-item col-lg-4 col-md-4 col-sm-4 col-6">
                            <a class="pay-item flex-box">
                                <img class="bank" src="{{asset('assets/photo/sarmayeh.png')}}">
                                <div class="checked flex-box">
                                    <img src="{{asset('assets/icon/check.svg')}}">
                                </div>

                            </a>
                        </div>

                    </div>
                </div>
--}}
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <a class="shrink yellow-btn" href="{{ route('payment') }}">
                        پرداخت
                    </a>
                </div>
            </div>


        </div>
    </div>

    <script>

        $(".pay-item").click(function () {
            $(".pay-item").removeClass("active")
            $(this).addClass("active")
        });
    </script>
@endsection
