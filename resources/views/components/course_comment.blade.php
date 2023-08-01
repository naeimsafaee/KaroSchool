@if($comment->course_comment_id == null)
    <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="comment-item flex-box">
            <div class="persone-details flex-box">
                <div class="image-box">
                    <img src="{{ $comment->client->image }}">
                </div>

                    <div class="Ordinary-customer">
                        کاربر عادی
                    </div>

            </div>
            <div class="border-box massage-text">
                <div class="flex-box">
                    <h4>
                        {{ $comment->client->name }}
                    </h4>
                    <div class="date">
                        {{ $comment->time }}
                    </div>

                </div>
                <p>
                    {{ $comment->content }}
                </p>
            </div>

        </div>
    </div>
    @if($comment->reply)
        <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="admin-row comment-item flex-box">
                <div class="persone-details flex-box">
                    <div class="image-box">
                        <img class="admin" src="{{asset('assets/photo/admin.svg')}}">
                    </div>
                    <div class="admin-item">
                        ادمین
                    </div>

                </div>
                <div class="border-box massage-text">
                    <div class="flex-box">
                        <h4>
                            ادمین
                        </h4>
                        <div class="date">
                            {{ $comment->reply->time }}
                        </div>

                    </div>
                    <p>
                        {{ $comment->reply->content }}
                    </p>
                </div>

            </div>
        </div>
    @endif
@endif
