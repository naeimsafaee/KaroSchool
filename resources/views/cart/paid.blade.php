
@extends('cart.index')
@section('content')
<div class="col-lg-12 col-md-12 col-sm-12">
    <div class="border-box">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <img class="pau-Result" src="{{asset('assets/icon/pay-done.svg')}}">
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h1 class="text-center">
                    پرداخت با موفقیت انجام شد
                </h1>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <table>
                    <thead>
                    <tr>
                        <th scope="col">دروازه پرداخت</th>
                        <th scope="col">کد تراکنش</th>
                        <th scope="col">تاریخ تراکنش</th>
                        <th scope="col">مبلغ</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td data-label="دروازه پرداخت">درگاه بانک تست</td>
                        <td data-label="کد تراکنش">{{ fa_number($transactions->first()->wallet_transaction_id) }}</td>
                        <td data-label="تاریخ تراکنش">{{ fa_number($transactions->first()->shamsi_date) }}</td>
                        <td data-label="مبلغ"> {{ fa_number(number_format($transactions->first()->amount * 10)) }} تومان</td>
                    </tr>
                    </tbody>
                </table>
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
