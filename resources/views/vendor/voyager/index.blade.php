@extends('voyager::master')

@section('content')
    @if (session('status'))
        <div class="alert dashboardalert @if(session('success')==true) success @else error @endif">
            {{ session('status') }}
        </div>
    @endif

    @php
        $transaction = \TCG\Voyager\Models\Transaction::query()->where('paid' , 1)->sum('amount');
        $copartner = \App\Models\Copartner::query()->where('user_id' , auth()->guard(app('VoyagerGuard'))->user()->id)->first();
    @endphp
{{--    $model = Auth::guard(app('VoyagerGuard'))->getProvider()->getModel();--}}


    <div class="alert dashboardalert success">
        @if($copartner)
            سهم شما تا این لحظه :
            {{ fa_number(number_format($transaction * $copartner->percent / 100)) }}
        <br>
            @if($copartner->check_date)
                تاریخ تسویه :
                {{  fa_number(\Morilog\Jalali\Jalalian::forge($copartner->check_date)->format('%d  %B  %Y')) }}
            @endif
        @else
            مبلغ فروش تا این لحظه :
            {{ fa_number(number_format($transaction)) }}
        @endif
    </div>



    @if (\TCG\Voyager\Models\Sms::first()->stock<=30)
        <div class="alert dashboardalert">
            {{__('voyager::hotdesk.lowsms')}}
        </div>
    @endif
    <div class="dashboard">
        @if(Auth::user()->unreadsupport()->exists())
            <div class="notifications">
                <h3>{{__('voyager::hotdesk.notifications')}}</h3>
                <a href="{{route('voyager.supports.index')}}" title=""
                   class="messages">{{Auth::user()->unreadsupport()->count()}} {{__('voyager::hotdesk.notifications_unreadmessage')}}</a>
            </div>
        @endif
        <div class="chart">
            <h3>{{__('voyager::hotdesk.chart')}}</h3>
            <div class="box">
                <ul>
                    <li class="active" data-id="users"
                        data-info="{{Auth::user()->locale=='fa' ? fa_number(\App\Models\User::count()) : \App\Models\User::count()}} {{__('voyager::hotdesk.user')}}">{{__('voyager::hotdesk.users')}}</li>
                    <li data-id="orders"
                        data-info="{{Auth::user()->locale=='fa' ? fa_number(\TCG\Voyager\Models\Transaction::where([['product_id','!=','0'],['status','=','success']])->count()) : \TCG\Voyager\Models\Transaction::where([['product_id','!=','0'],['status','=','success']])->count()}} {{__('voyager::hotdesk.sells')}}">{{__('voyager::hotdesk.sells')}}</li>
                </ul>
                <span>{{Auth::user()->locale=='fa' ? fa_number(\App\Models\User::count()) : \App\Models\User::count()}} {{__('voyager::hotdesk.user')}}</span>
                <canvas id="userchart" width="100%" height="160px"></canvas>
            </div>
        </div>
        <div class="clear"></div>
        <div class="tools">
            @include('voyager::dashboard.smspack')
            @include('voyager::dashboard.personalizemenus')
        </div>
    </div>
@stop
