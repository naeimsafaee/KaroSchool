<div class="padding-item col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
    <a class="news-item" href="{{ route('single_blog' , $blog->slug) }}">
        <div class="content">
            <div class="flex-box">
                <div class="image-box">
                    <img src="{{ Voyager::image($blog->image) }}">
                </div>
                <div class="content-item">
                    <div class=" new-name" style="color: {{ $blog->category->color }}; background-color: {{ $blog->category->background_color }}">
                        {{ $blog->category->name }}
                    </div>
                    <div class="time flex-box">
                        <img src="{{asset('assets/icon/Time.svg')}}">
                        {{ fa_number($blog->hour) }}
                    </div>
                    <div class="date flex-box">
                        <img src="{{asset('assets/icon/Calendar.svg')}}">
                        {{ $blog->time }}
                    </div>
                </div>


            </div>
            <div class="highlight" style="font-weight: 900;">
                {{ $blog->title }}
            </div>
        </div>
        <div class="more-lesson">
            ادامه آموزش
        </div>
        <div class="in-hover">
            <div class="inner-div ">

                <div class="outer-div"></div>
            </div>
        </div>
    </a>


</div>
