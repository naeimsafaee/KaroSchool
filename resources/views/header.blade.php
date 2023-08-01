@php
    $client = auth()->guard('clients')->user();
@endphp
<div class="col-lg-12 col-md-12 col-sm-12">
    <section class="navigation">
        @if(setting('banner.text'))
            <div href="{{ setting('banner.link') }}" class=" top-header" id="download_box" style="display: none">
                <img class="pattern" src="{{asset('assets/icon/pattern.svg')}}">
                <div class="nav-container flex-box">
                    <a class="flex-box Competition">
                        {{ setting('banner.text') }}
                        <img src="{{asset('assets/icon/arrow.svg')}}">

                    </a>
                    <img class="close-top-nav" src="{{asset('assets/icon/close.svg')}}" onclick="save_in_cookie()">
                </div>
            </div>
        @endif
        <div class="bottom-header">
            <div class="nav-container flex-box">
                <nav>
                    <a id="nav-toggle"><span></span></a>
                    <ul class="nav-list">
                        @if(auth()->guard('clients')->check())
                            <li>
                                <div class=" drop-btn flex-box profile-detail">

                                    @if($client->avatar)
                                        <img class="profile-image" src="{{  Voyager::image($client->avatar) }}">
                                    @else
                                        <img class="profile-image" src="{{ asset('assets/photo/avatar.png') }}">
                                    @endif

                                    <h6>{{ $client->name }}</h6>
                                    <img src="{{asset('assets/icon/bottom-arrow.svg')}}">

                                </div>
                                <ul class="nav-dropdown profile-items-box">
                                    <li>
                                        <a class="flex-box" href="{{ route('edit_profile') }}">
                                            <img src="{{asset('assets/icon/Edit%20Profile.svg')}}">

                                            ویرایش اطلاعات
                                        </a>
                                    </li>
                                    <li>
                                        <a class="flex-box" href="{{ route('course_profile') }}">
                                            <img src="{{asset('assets/icon/Course.svg')}}">

                                            دوره ها
                                        </a>
                                    </li>
                                    <li>

                                        <a class="flex-box" href="{{ route('password_profile') }}">
                                            <img src="{{asset('assets/icon/profile-Password.svg')}}">
                                            ویرایش رمز عبور

                                        </a>
                                    </li>
                                    <li>
                                        <a class="flex-box" href="{{ route('logout') }}">
                                            <img src="{{asset('assets/icon/LogOut.svg')}}">
                                            خروج از حساب

                                        </a>
                                    </li>


                                </ul>
                            </li>

                        @else
                            <li>
                                <a class="shrink yellow-btn flex-box" href="{{ route('login') }}">
                                    حساب کاربری
                                </a>
                            </li>
                        @endif
                        <li>
                            <span></span>
                            <a class="nav-items flex-box drop-btn">
                                دروه ها
                                <img class="arrow" src="{{asset('assets/icon/bottom-arrow.svg')}}">

                            </a>

                            <ul class="nav-dropdown">
                                @foreach($categories as $category)
                                    <li>
                                        <a class="flex-box"
                                           href="{{  route('course', array_merge(request()->query->all(), ["category" => $category->id]))  }}">
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>

                        {{ menu('header' , 'components.header') }}
                        <li>
                            <span></span>
                            <a class="nav-items flex-box" href="{{ route('topics' , 'new') }}">
                                <img src="{{asset('assets/icon/Sofa.svg')}}">
                                پرسش و پاسخ
                            </a>
                        </li>
                        <li>
                            <span></span>
                            <a class="nav-items flex-box" href="{{ route('contact_us') }}">
                                <img src="{{asset('assets/icon/contact.svg')}}">
                                تماس با ما
                            </a>
                        </li>
                    </ul>

                </nav>
                <div class="flex-box">
                    <div class=" input-row header-search">
                        <form class="row" action="{{ route('search') }}" method="GET" id="search_form">
                            <input type="search" placeholder="جستجو درباره دوره ها" name="search"
                                   value="{{ $search ?? "" }}">
                            <img src="{{asset('assets/icon/search.svg')}}"
                                 onclick="document.getElementById('search_form').submit()" style="cursor: pointer">
                        </form>
                    </div>
                    <a href="{{ route('home') }}" class="brand">
                        <img class="web" src="{{ asset('assets/photo/logo.svg') }}">
                        <img class="mobile" src="{{asset('assets/photo/logo2.svg')}}">
                    </a>
                </div>

            </div>
        </div>
        <div class="bottom-search-box input-row header-search">

            <form class="row" action="{{ route('search') }}" method="GET">
                <input type="search" placeholder="جستجو درباره دوره ها" name="search" value="{{ $search ?? "" }}">
                <img src="{{asset('assets/icon/search.svg')}}">
            </form>
        </div>
    </section>

</div>
