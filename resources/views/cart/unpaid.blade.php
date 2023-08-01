@extends('cart.index')
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="border-box">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <img class="pau-Result" src="{{asset('assets/icon/pay-error.svg')}}">
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h1 class="text-center red">
                        عملیات پرداخت نا موفق بود!
                    </h1>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <p  class="text-center error-massage">
                        مشکلی در پرداخت پیش آمده لطفا دوباره تلاش نمایید
                    </p>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <a class="shrink yellow-btn" href="{{ route('course') }}">
                        بازگشت به دوره ها
                    </a>
                </div>
            </div>



        </div>
    </div>

@endsection
