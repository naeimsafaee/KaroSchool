<div class="col-lg-12 col-md-12 col-sm-12">
    <div class="inner-div search-result">
        <div class=" prerequisite-items col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="row">
                <div class="padding-item  col-lg-3 col-md-3 col-sm-4 col-12">
                    <div class="image-box">
                        <img src="{{Voyager::image($course->image)}}">
                    </div>
                </div>
                <div class="padding-item col-lg-4 col-md-3 col-sm-4 col-12">
                    <h3 >
                        {{ $course->title }}
                    </h3>
                    @if($course->discount_price > 0)
                    <h6>
                        {{ fa_number(number_format($course->discount_price)) }}
                        تومان
                    </h6>
                    @elseif($course->price>0)
                        {{ fa_number(number_format($course->price)) }}
                        تومان
                    @else
                        <h6>
                            رایگان
                        </h6>

                    @endif
                </div>
                <div class="see-row flex-box padding-item col-lg-5 col-md-6 col-sm-4 col-12">
                    <a class="flex-box" href="{{ route('single_course' , $course->slug) }}">
                        <h6>
                            مشاهده دوره
                        </h6>
                        <div class="flex-box more">
                            <img src="{{asset('assets/icon/Arrow%20Left.svg')}}">

                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path class="polygon-hover" d="M7.5 2.00962C12.141 -0.669873 17.859 -0.669873 22.5 2.00962V2.00962C27.141 4.68911 30 9.64102 30 15V15C30 20.359 27.141 25.3109 22.5 27.9904V27.9904C17.859 30.6699 12.141 30.6699 7.5 27.9904V27.9904C2.85898 25.3109 0 20.359 0 15V15C0 9.64102 2.85898 4.68911 7.5 2.00962V2.00962Z" fill="#241953"/>
                            </svg>

                        </div>

                    </a>
                </div>
            </div>
        </div>
        <div class="outer-div"></div>
    </div>
</div>
