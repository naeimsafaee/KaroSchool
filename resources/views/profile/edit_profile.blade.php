@extends('index')
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12">
        <section class="container ">
            <div class=" row margin content">
                @include('profile.navbar')
                <div class=" colum-lg-9 col-md-8 col-sm-6 col-12">
                    <div class="row ">
                        <img class="profile-circle circle-grey web-item"
                             src="{{asset('assets/photo/circle-grey.svg')}}">

                        <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                            <h1 class="title-item ">
                                ویرایش اطلاعات
                            </h1>
                        </div>
                        <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                            <div class="Edit-profile border-box">
                                <div class="login-form">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <form method="post" action="{{ route('edit_profile_submit') }}">
                                                @csrf
                                                <div class="row">
                                                    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                                                        <img class="change-profile-image" src="{{ $client->image }}">
                                                        <button type="button" class="shrink file-upload">
                                                            <input type="file" class="file-input" id="imageUpload"
                                                                   name="avatarPicture">
                                                            آپلود عکس پروفایل
                                                        </button>


                                                    </div>
                                                    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                                                        <div class="input-row">
                                                            <label>نام شما</label>
                                                            <input class="padding-right" type="text"
                                                                   placeholder=" نام را وارد کنید" name="name"
                                                                   value="{{$client->name}}">
                                                            <img src="{{asset('assets/icon/User.svg')}}">
                                                        </div>
                                                        @error('name')
                                                        <div class="Email-massage" style="color: red">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                                                        <div class="input-row">
                                                            <label>آدرس ایمیل </label>
                                                            <input class="padding-right" type="text"
                                                                   placeholder=" آدرس ایمیل را وارد کنید" name="email"
                                                                   value="{{ $client->email }}">
                                                            <img src="{{asset('assets/icon/Email.svg')}}">

                                                        </div>
                                                        @error('email')
                                                        <div class="Email-massage" style="color: red">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                        @if($client->status)
                                                        <div class="Email-massage">
                                                            در صورتی که شما این ایمیل خود را تغییر دهید یک ایمیل تایید
                                                            به ایمیل جدیدتان ارسال میشود ایمیل جدید تا زمان تایید فعال
                                                            نخواهد شد
                                                        </div>
                                                        @else
                                                            <div class="Email-massage">
                                                              ایمیل شما منتظر تایید برای
                                                                {{ $client->email }}
                                                                است
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                                                        <div class="input-row">
                                                            <label> شماره موبایل</label>
                                                            <input class="padding-right" type="text"
                                                                   placeholder="   شماره موبایل را وارد کنید "
                                                                   name="phone" value="{{ $client->phone }}">
                                                            <img src="{{asset('assets/icon/Phone.svg')}}">
                                                        </div>
                                                        @error('phone')
                                                        <div class="Email-massage" style="color: red">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>

                                                    <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <button class="sing-up-btn shrink yellow-btn flex-box ">
                                                            بروزرسانی حساب کاربری
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </section>
    </div>

@endsection


@section('optional_footer')
    <script>
        $('.file-input').change(function () {
            var curElement = $('.change-profile-image');
            console.log(curElement);
            var reader = new FileReader();

            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                curElement.attr('src', e.target.result);
            };

            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });

    </script>

    <script>

        document.getElementById('imageUpload').addEventListener('change', upload_file, false);

        function upload_file(evt) {

            var files = evt.target.files;

            // Loop through the FileList and render image files as thumbnails.
            for (var i = 0, f; f = files[i]; i++) {

                // Only process image files.
                if (!f.type.match('image.*')) {
                    continue;
                }

                var reader = new FileReader();

                // Closure to capture the file information.
                reader.onload = (function (theFile) {
                    return function (e) {
                        // Render thumbnail.

                        $("#profile_image").attr("src", e.target.result).css("width", "100%");

                        var form = new FormData();

                        const token = "{{ csrf_token() }}";

                        form.append("_token", token);

                        form.append(evt.target.name, theFile);

                        console.log(form.get('_token'));

                        var settings = {
                            "async": true,
                            "crossDomain": true,
                            "url": "{{ route('avatar_submit') }}",
                            "method": "POST",
                            "headers": {
                                "cache-control": "no-cache",
                            },
                            "processData": false,
                            "contentType": false,
                            "mimeType": "multipart/form-data",
                            "data": form
                        }

                        $.ajax(settings).done(function (response) {
                            console.log(response);
                            // location.reload();
                        });

                    };
                })(f);

                // Read in the image file as a data URL.
                reader.readAsDataURL(f);
            }

        }

        $(document).ajaxStop(function(){
            window.location.reload();
        });

    </script>


@endsection
