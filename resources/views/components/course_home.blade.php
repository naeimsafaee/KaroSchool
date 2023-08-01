<div class="position-relative padding-item col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
    <a class="inner-div classes-item" href="{{ route('single_course' , $course->slug) }}">
        <div class="image-box">
            <img src="{{ Voyager::image($course->image) }}">
        </div>
        <div class="content-div">
            <div class="flex-box">
                @if(count($course->category)>0)
                    <div class="class-name">
                        {{ $course->category->first()->name }}
                    </div>
                @endif
                <div class="flex-box time">
                    {{ fa_number($course->hour) }}
                    <img src="{{asset('assets/icon/Time.svg')}}">
                </div>

            </div>
            <div class="highlight">
                {{ $course->title }}
            </div>
            <div class="flex-box">
                @if($course->price == 0)
                    <h6>
                        رایگان
                    </h6>
                @elseif($course->discount_price > 0)
                    <div>
                        <h6 class="new-price">
                            {{ fa_number(number_format($course->discount_price)) }}
                            تومان
                        </h6>
                        <p class="old-price">
                            {{ fa_number(number_format($course->price)) }}
                            تومان
                        </p>

                    </div>
                @else
                    <h6>
                        {{ fa_number(number_format($course->price)) }}
                        تومان
                    </h6>


                @endif
                <div class="flex-box">
                    <h6>
                        مشاهده دوره
                    </h6>
                    <div class="flex-box more">
                        <img src="{{asset('assets/icon/Arrow%20Left.svg')}}">

                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="polygon-hover"
                                  d="M7.5 2.00962C12.141 -0.669873 17.859 -0.669873 22.5 2.00962V2.00962C27.141 4.68911 30 9.64102 30 15V15C30 20.359 27.141 25.3109 22.5 27.9904V27.9904C17.859 30.6699 12.141 30.6699 7.5 27.9904V27.9904C2.85898 25.3109 0 20.359 0 15V15C0 9.64102 2.85898 4.68911 7.5 2.00962V2.00962Z"
                                  fill="#241953"/>
                        </svg>

                    </div>
                </div>
            </div>
        </div>


        <div class="outer-div"></div>
    </a>

    @if($seconds)
        <div class="offer-row flex-box justify-content-between">
            <h6>
                تخفیفی شده
            </h6>
            <div class="flex-box">
                <div class="offer-time">
                    <span id="hours"></span>
                    <span>ساعت</span>
                </div>
                <div class="offer-time">
                    <span id="minutes"></span>
                    <span>دقیقه</span>
                </div>
                <div class="offer-time">
                    <span id="seconds"></span>
                    <span>ثانیه</span>
                </div>


            </div>

        </div>

    @endif

</div>
