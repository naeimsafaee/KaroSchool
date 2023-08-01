<div class="padding-item colum-lg-3 col-md-4 col-sm-6 col-12">
    <div class="content col-lg-12 col-md-12 col-sm-12 col-12">
        <img class="web-item bean2" src="{{asset('assets/photo/bean2.svg')}}">
        <div class="inner-div profile-box">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <p>
                        حساب کاربری
                    </p>
                    <a class=" @if(url()->current() == route('edit_profile')) active @endif flex-box Edit-item" href="{{ route('edit_profile') }}">
                        <img src="{{asset('assets/icon/Edit%20Profile.svg')}}">
                        ویرایش اطلاعات
                    </a>
                    <a class="@if(url()->current() == route('course_profile' )) active @endif flex-box Edit-item" href="{{ route('course_profile') }}">
                        <img src="{{asset('assets/icon/Course.svg')}}">
                        دوره های من
                    </a>
                    <a class="@if(url()->current() == route('password_profile')) active @endif flex-box Edit-item" href="{{ route('password_profile') }}">
                        <img src="{{asset('assets/icon/Password.svg')}}">
                        ویرایش رمز عبور
                    </a>
                </div>
                @if(count($client->medals) > 0)
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <p class="margin-top">
                                مدال ها
                            </p>
                        </div>
                       @foreach($client->medals as $medal)
                        <div class="padding col-xl-4 col-lg-6 col-md-6 col-sm-6 col-4">
                            <div class="modal-items">
                                <div class="flex-box">
                                    <img width="50" src="{{ Voyager::image($medal->medal->image) }}">
                                    <p>
                                        {{ $medal->medal->title }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>


                </div>
                @endif
            </div>
            <div class="outer-div"></div>
        </div>
    </div>
</div>
