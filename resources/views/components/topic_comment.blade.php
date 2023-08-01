<div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="inner-div">
        <div class="row reply-items">
            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                <div class=" flex-box question-category-items-details">
                    <div class="image-box">
                        <img  src="{{ $answer->client->image }}">
                    </div>
                    <div>
                        <h5>
                            {{ $answer->client->name }}
                        </h5>
                        <p class="date">
                            {{ $answer->time }}
                        </p>


                    </div>
                    @if($answer->is_best)
                    <div class="best-answer flex-box">
                        <img src="{{asset('assets/icon/pin.svg')}}">
                        بهترین پاسخ
                    </div>
                    @endif

                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <p class="reply-text">
                    {{ $answer->content }}
                </p>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
{{--                <div class='RearangeBox imgThumbContainer'>--}}
{{--                    <div class='IMGthumbnail' >--}}
{{--                        <img src="assets/photo/sample.png">--}}
{{--                    </div>--}}
{{--                    <div class='imgName'>AlirezaSinaei.jpg</div>--}}
{{--                    <a class="download-files">--}}
{{--                        <img src="assets/icon/Download-file.svg">--}}
{{--                    </a>--}}

{{--                </div>--}}
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="flex-box like-row">
                    @if(auth()->guard('clients')->check())
                    <div class="like flex-box @if($answer->client_like) active  @endif" onclick="submit_like({{ $answer->id }})">
                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.8601 1.61719C17.0351 1.61719 19.1641 4.59719 19.1641 7.37219C19.1641 13.0052 10.3251 17.6172 10.1641 17.6172C10.0031 17.6172 1.16406 13.0052 1.16406 7.37219C1.16406 4.59719 3.29306 1.61719 6.46806 1.61719C8.28306 1.61719 9.47506 2.52219 10.1641 3.32819C10.8531 2.52219 12.0451 1.61719 13.8601 1.61719Z" stroke="#F84263" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    @endif
                        <a class="reply flex-box"
                        @if(!auth()->guard('clients')->check()) href="{{ route('login') }}" @endif>
                            پاسخ
                            <img src="{{asset('assets/icon/Reply.svg')}}">

                        </a>

                </div>

            </div>
        </div>

    @if(auth()->guard('clients')->check())
        <div class="answer-row row">
            <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="comment-row comment-item flex-box">
                    <div class="persone-details flex-box">
                        <div class="image-box">
                            <img src="{{ auth()->guard('clients')->user()->image }}">
                        </div>
                    </div>
                    <form class="massage-form" method="post" action="{{ route('reply') }}">
                        @csrf
                        <input type="hidden" name="topic2_id" value="{{ $answer->topic_id }}">
                        <input type="hidden" name="answer2_id" value="{{ $answer->id }}">
                        <div class="input-row">
                            <textarea placeholder="شما در حال پاسخ به  {{ $answer->client->name }} هستید" name="text2"></textarea>
                        </div>
                        @error('text2')
                        <span style="color: red">
                            {{ $message }}
                        </span>
                        @enderror
                        <button  class=" shrink yellow-btn flex-box ">
                            ارسال پاسخ
                        </button>
                    </form>

                </div>
            </div>

        </div>
        <div class="outer-div"></div>
        @endif

            <ul class="reply-list flex-box">
                @foreach($answer->like_image as $img)
                    @if($loop->index == 4)
                        @break
                    @endif
                    <li class="image-box flex-box">
                        <img src="{{ $img->image }}">
                    </li>
                @endforeach
                @if($answer->likes > 0)
                    <li class="image-box flex-box">
                        +{{ fa_number($answer->likes)}}
                    </li>
                @endif

            </ul>


    @if($answer->reply)
            @foreach($answer->reply as $reply)
        <div class="reply-massage row reply-items">
            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                <div class=" flex-box question-category-items-details">
                    <div class="image-box">
                        <img src="{{ $reply->client->image }}">
                    </div>
                    <div>
                        <h5>
                            {{ $reply->client->name }}
                        </h5>
                        <p class="date">
                              {{ $reply->time }}
                        </p>


                    </div>

                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <p class="reply-text">
                    {{ $reply->content }}
                </p>
            </div>
{{--            <div class="col-lg-6 col-md-12 col-sm-12 col-12">--}}
{{--                <div class="flex-box like-row">--}}
{{--                    <div class="like flex-box">--}}
{{--                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.8601 1.61719C17.0351 1.61719 19.1641 4.59719 19.1641 7.37219C19.1641 13.0052 10.3251 17.6172 10.1641 17.6172C10.0031 17.6172 1.16406 13.0052 1.16406 7.37219C1.16406 4.59719 3.29306 1.61719 6.46806 1.61719C8.28306 1.61719 9.47506 2.52219 10.1641 3.32819C10.8531 2.52219 12.0451 1.61719 13.8601 1.61719Z" stroke="#F84263" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                        </svg>--}}
{{--                    </div>--}}
{{--                    <a class="reply flex-box">--}}
{{--                        پاسخ--}}
{{--                        <img src="assets/icon/Reply.svg">--}}

{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="view-row flex-box col-lg-6 col-md-12 col-sm-12 col-12">--}}
{{--                <ul class="reply-list flex-box">--}}
{{--                    <li class="image-box flex-box">--}}
{{--                        <img src="assets/photo/sample4.png">--}}
{{--                    </li>--}}
{{--                    <li class="image-box flex-box">--}}
{{--                        <img src="assets/photo/sample4.png">--}}
{{--                    </li>--}}
{{--                    <li class="image-box flex-box">--}}
{{--                        +۱۲--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}
        </div>
        <div class="outer-div"></div>
            @endforeach
        @endif
    </div>
</div>

