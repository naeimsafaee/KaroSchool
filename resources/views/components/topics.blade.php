<div class="question-category-items col-lg-12 col-md-12 col-sm-12 col-12"
     onclick="window.location='{{ route('single_topic' , $topic->id) }}'">

    <div class="row" >
        <div class="col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="flex-box question-category-items-details">
                <div class="image-box">
                    <img src="{{ $topic->client->image }}">
                </div>
                <div>
                    <h5>
                        {{ $topic->title }}
                    </h5>
{{--                    <a class="course new-name">--}}
{{--                        دوره ها--}}
{{--                    </a>--}}
                    <a class=" new-name"  style="color: {{ $topic->category->color }}; background-color: {{ $topic->category->background_color }}">
                        {{ $topic->category->name }}
                    </a>

                </div>

            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="view-row">
                <div class="view-item flex-box">
                    <p>
                        {{ fa_number($topic->answers_count) }}
                    </p>
                    <p>
                        پاسخ
                    </p>

                </div>
                <div class="view-item flex-box">
                    <p>
                        {{ fa_number($topic->views) }}
                    </p>
                    <p>
                        بازدید
                    </p>

                </div>

            </div>
        </div>
    </div>

</div>


