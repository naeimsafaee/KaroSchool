@extends('index')
@section('content')
    @if($is_success)
        <div class="error-message error-style">
            پاسخ شما با موفقیت ثبت شد
        </div>
    @endif
    <div class="col-lg-12 col-md-12 col-sm-12">
        <section class="container">
            <div class=" row margin content">
                <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class=" history-title">
                        <a class="flex-box" href="{{ route('home') }}">
                            <img src="{{asset('assets/icon/Home.svg')}}">
                            مدرسه کارو
                        </a>
                        <a>
                            <img src="{{asset('assets/icon/Left%20Arrow.svg')}}">
                        </a>
                        <a class="flex-box" href="{{ route('topics' , 'new') }}">
                            <img src="{{asset('assets/icon/question.svg')}}">
                            پرسش و پاسخ
                        </a>
                        <a>
                            <img src="{{asset('assets/icon/Left%20Arrow.svg')}}">
                        </a>
                        <a>
                            {{ $topic->title }}
                        </a>
                    </div>
                </div>
                @include('profile.navbar_topic')

                <div class=" col-lg-9 col-md-8 col-sm-6 col-12">
                    <div class="row">
                        <div class="padding-item reply-row col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="inner-div">
                                <div class="row reply-items">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class=" flex-box question-category-items-details">
                                            <div class="image-box">
                                                <img src="{{ $topic->client->image }}">
                                            </div>
                                            <div>
                                                <h5>
                                                    {{ $topic->client->name }}
                                                </h5>
                                                <p class="date">
                                                    {{ $topic->time }}
                                                </p>


                                            </div>

                                        </div>
                                    </div>
                                    <div class="view-row col-lg-6 col-md-12 col-sm-12 col-12">
                                        {{--                                        <a class="course new-name">--}}
                                        {{--                                            دوره ها--}}
                                        {{--                                        </a>--}}
                                        <a class="illstrator new-name">
                                            {{ $topic->tool->name }}
                                        </a>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                        <h1>
                                            {{ $topic->title }}
                                        </h1>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                        <p class="reply-text">
                                            {{ $topic->content }}
                                        </p>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                        @foreach($topic->files as $file)
                                            <div class='RearangeBox imgThumbContainer'>
                                                <div class='IMGthumbnail'>
                                                    @if($file->is_file)
                                                        <img src="{{ Voyager::image($file->file) }}">
                                                    @else
                                                        <img src="{{ asset('assets/photo/file_placeholder.svg') }}">

                                                    @endif
                                                </div>
                                                <div class='imgName'>{{ $file->name }}</div>
                                                <a class="download-files" href="{{ get_image($file->file) }}"
                                                   target="_blank">
                                                    <img src="{{asset('assets/icon/Download-file.svg')}}">
                                                </a>

                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="flex-box like-row">
                                            @if(auth()->guard('clients')->check())
                                                <div class="like flex-box @if($topic->client_like) active @endif"
                                                     onclick="submit_like_topic()">
                                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                              d="M13.8601 1.61719C17.0351 1.61719 19.1641 4.59719 19.1641 7.37219C19.1641 13.0052 10.3251 17.6172 10.1641 17.6172C10.0031 17.6172 1.16406 13.0052 1.16406 7.37219C1.16406 4.59719 3.29306 1.61719 6.46806 1.61719C8.28306 1.61719 9.47506 2.52219 10.1641 3.32819C10.8531 2.52219 12.0451 1.61719 13.8601 1.61719Z"
                                                              stroke="#F84263" stroke-width="1.5" stroke-linecap="round"
                                                              stroke-linejoin="round"/>
                                                    </svg>
                                                </div>
                                            @endif
                                            <a class="reply flex-box" href="#answer">
                                                پاسخ
                                                <img src="{{asset('assets/icon/Reply.svg')}}">

                                            </a>
                                        </div>
                                    </div>
                                    <div class="view-row flex-box col-lg-6 col-md-12 col-sm-12 col-12">
                                        <ul class="reply-list flex-box">
                                            @foreach($topic->like_image as $img)
                                                @if($loop->index == 4)
                                                    @break
                                                @endif
                                                <li class="image-box flex-box">
                                                    <img src="{{ $img->image }}">
                                                </li>
                                            @endforeach
                                            @if($topic->likes > 0)
                                                <li class="image-box flex-box">
                                                    +{{ fa_number($topic->likes)}}
                                                </li>
                                            @endif

                                        </ul>
                                    </div>

                                </div>
                                {{--
                                                                <div class="answer-row row">
                                                                    <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                                                                        <div class="comment-row comment-item flex-box">
                                                                            <div class="persone-details flex-box">
                                                                                <div class="image-box">
                                                                                    <img src="assets/photo/man.png">
                                                                                </div>
                                                                            </div>
                                                                            <form class="massage-form">
                                                                                <div class="input-row">
                                                                                    <textarea
                                                                                        placeholder="شما در حال پاسخ به مارال جمشیدی هستید"></textarea>

                                                                                </div>
                                                                                <button class=" shrink yellow-btn flex-box ">
                                                                                    ارسال پاسخ
                                                                                </button>
                                                                            </form>

                                                                        </div>
                                                                    </div>

                                                                </div>
                                --}}
                                <div class="outer-div" ></div>
                            </div>
                        </div >
                        @each('components.topic_comment' , $topic->answers , 'answer')
                        @if(auth()->guard('clients')->check())
                            <div class="padding-item margin col-lg-12 col-md-12 col-sm-12 col-12" id="answer">
                                <div class="row">
                                    <div class="courses-details padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                                        <h2>
                                            پاسخ دهید
                                        </h2>

                                    </div>
                                    <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="comment-row comment-item flex-box">
                                            <div class="persone-details flex-box">
                                                <div class="image-box">
                                                    <img src="{{ auth()->guard('clients')->user()->image }}">
                                                </div>
                                            </div>
                                            <form class="massage-form" method="post"
                                                  action="{{ route('answer_profile') }}">
                                                @csrf
                                                <input type="hidden" name="topic_id" value="{{ $topic->id }}">

                                                <div class="input-row">
                                                    <textarea name="text"
                                                              placeholder="پاسخ خود را بنویسید ">{{ old('text') }}</textarea>

                                                </div>
                                                @error('text')
                                                <span style="color: red">
                                                {{ $message }}
                                            </span>
                                                @enderror
                                                <button class=" shrink yellow-btn flex-box ">ارسال
                                                    پاسخ
                                                </button>
                                            </form>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        @else
                            <div class="padding-item margin col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="row">
                                    <div class="courses-details padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                                        <h2>
                                            پاسخ دهید
                                        </h2>

                                    </div>
                                    <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="comment-row comment-item flex-box">
                                            <form class="massage-form"
                                                  action="{{ route('login') }}">
                                                @csrf
                                                <input type="hidden" name="topic_id" value="{{ $topic->id }}">

                                                <div class="input-row">
                                                    <textarea style="cursor: pointer"
                                                              onclick="window.location = '{{ route('login') }}'"
                                                              name="text"
                                                              placeholder="دیدگاه خود را بنویسید">{{ old('text') }}</textarea>

                                                </div>
                                                @error('text')
                                                <span style="color: red">
                                                {{ $message }}
                                            </span>
                                                @enderror
                                                <button class=" shrink yellow-btn flex-box ">ارسال
                                                    پاسخ
                                                </button>
                                            </form>

                                        </div>
                                    </div>

                                </div>

                            </div>

                        @endif


                    </div>
                </div>

            </div>

        </section>
    </div>

@endsection


@section('optional_footer')
    <script src="{{ asset('assets/js/error.js') }}"></script>
    <script>
        $(".like").click(function () {
            $(this).toggleClass("active")
        });
        $(".inner-div .reply").click(function () {
            $(this).parent().parent().parent().parent().find(".answer-row .comment-row").css("display", "flex")
        });
    </script>


    <script>
        @if(auth()->guard('clients')->check())

        function submit_like_topic() {

            $.ajax(
                {
                    @if($topic->client_like == true)
                    "url": "{{ route('dis_like_topic') }}",
                    @else
                    "url": "{{ route('like_topic') }}",
                    @endif

                    "method": "POST",
                    "data": {
                        "_token": "{{ csrf_token() }}",
                        "topic_id": {{ $topic->id }},

                    }
                }
            ).done(function (response) {
                console.log(response);
                // location.reload();
            });

        }
        @endif

    </script>
    <script>
        @if(auth()->guard('clients')->check())

        function submit_like(id) {

            $.ajax(
                {

                    "url": "{{ route('like') }}",


                    "method": "POST",
                    "data": {
                        "_token": "{{ csrf_token() }}",
                        "answer_id": id,

                    }
                }
            ).done(function (response) {
                console.log(response);
                // location.reload();
            });

        }

        @endif
    </script>
@endsection
