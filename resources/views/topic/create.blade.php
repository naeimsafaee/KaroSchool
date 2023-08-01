@extends('index')
@section('content')
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
                        <a class="flex-box">
                            <img src="{{asset('assets/icon/Topic.svg')}}">
                            ایجاد سوال جدید
                        </a>
                    </div>
                </div>
                @include('profile.navbar_topic')
                <div class=" col-lg-9 col-md-6 col-sm-6 col-12">
                    <div class="row ">
                        <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                            <h2 class="title-item">
                                ایجاد سوال جدید
                            </h2>

                        </div>
                        <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="border-box topic-row">
                                <form method="post" action="{{ route('topic_submit') }}" id="topic_form"
                                      enctype='multipart/form-data'>
                                    @csrf
                                    <div class="row">
                                        <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="input-row">
                                                <label>عنوان تاپیک</label>
                                                <input value="{{ old('title') }}" name="title" type="text"
                                                       placeholder="عنوان تاپیک را وارد کنید">
                                                @error('title')
                                                <p class="show error-masage" style="display: block">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class=" col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="row">
                                                <div class="padding-item col-lg-7 col-md-6 col-sm-12 col-12">
                                                    <div class="dropdown-row input-row">
                                                        <label>
                                                            دسته بندی
                                                        </label>
                                                        <div class="custom-selects">
                                                            <select name="category">
                                                                <option value="0">دسته بندی را وارد کنید</option>
                                                                @foreach($categories as $category)
                                                                    <option
                                                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        @error('category')
                                                        <p class="show error-masage" style="display: block">
                                                            {{ $message }}
                                                        </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="padding-item col-lg-5 col-md-6 col-sm-12 col-12">
                                                    <div class="dropdown-row input-row">
                                                        <label>
                                                            ابزار
                                                        </label>
                                                        <img class="grey-arrow"
                                                             src="{{asset('assets/icon/grey-arrow.svg')}}">

                                                        <div class="flex-box abzar-item">
                                                            ابزار را وارد کنید

                                                        </div>
                                                        <input type="hidden" id="input_of_tool" name="tool"
                                                               value="{{ old('tool') }}">

                                                        <ul class="abzar-list">
                                                            @foreach($tools as $tool)
                                                                <li class="flex-box"
                                                                    onclick="set_tool_to_input({{ $tool->id }})">
                                                                    <img src="{{ Voyager::image($tool->image) }}">
                                                                    {{ $tool->name }}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                        <script>
                                                            function set_tool_to_input(id) {
                                                                document.getElementById('input_of_tool').value = id;
                                                            }
                                                        </script>
                                                        @error('tool')
                                                        <p class="show error-masage" style="display: block">
                                                            {{ $message }}
                                                        </p>
                                                        @enderror

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="input-row">
                                                <label>محتوا تاپیک</label>
                                                <textarea type="text" placeholder="محتوا تاپیک را وارد کنید"
                                                          name="text">{{ old('text') }}</textarea>
                                                @error('text')
                                                <p class="show error-masage" style="display: block">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="space flex-box">
                                                <img src="{{asset('assets/icon/space.svg')}}">
                                                حجم مجاز برای آپلود عکس یا فایل نهایتا 5 مگابایت می باشد
                                            </div>
                                        </div>
                                        <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="input-row">
                                                <div class="upload-row">
                                                    <h6 class="side-padding">
                                                        آپلود فایل
                                                    </h6>
                                                    <form>
                                                        <label class="upload-image flex-box" for="files">
                                                            <div class="flex-box upload-text">
                                                                فایل مورد نظر برای آپلود را انتخاب کنید
                                                            </div>
                                                            <div>
                                                                آپلود فایل
                                                            </div>

                                                        </label>
                                                        <input hidden id="files" type="file" name="files[]"
                                                               multiple="multiple"/>
                                                    </form>

                                                    <div id="div_of_inputs"></div>

                                                </div>
                                                <div>
                                                    <div id="sortableImgThumbnailPreview">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                                            <button type="button" class="new-topic shrink yellow-btn flex-box "
                                                    onclick="document.getElementById('topic_form').submit()">
                                                ایجاد سوال
                                            </button>
                                            @if($errors->any())
                                                <div id="alert-success" class=" alert-success " style="display: block">
                                                    لطفا فیلد هارو به درستی پر کنید
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </form>
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

        var documentPicture = [];

        var documentIndex = -1;
        const e2p = s => s.replace(/\d/g, d => '۰۱۲۳۴۵۶۷۸۹'[d]);
        const p2e = s => s.replace(/[۰-۹]/g, d => '۰۱۲۳۴۵۶۷۸۹'.indexOf(d));

        $(function () {
            $("#sortableImgThumbnailPreview").sortable({
                connectWith: ".RearangeBox",


                start: function (event, ui) {
                    $(ui.item).addClass("dragElemThumbnail");
                    ui.placeholder.height(ui.item.height());

                },
                stop: function (event, ui) {
                    $(ui.item).removeClass("dragElemThumbnail");
                }
            });
            $("#sortableImgThumbnailPreview-code").sortable({
                connectWith: ".RearangeBox",


                start: function (event, ui) {
                    $(ui.item).addClass("dragElemThumbnail");
                    ui.placeholder.height(ui.item.height());

                },
                stop: function (event, ui) {
                    $(ui.item).removeClass("dragElemThumbnail");
                }
            });

            $("#sortableImgThumbnailPreview-code").disableSelection();
        });

        document.getElementById('files').addEventListener('change', handleFileSelect, false);

        // document.getElementById('files-code').addEventListener('change', handleFileSelectcode, false);


        function handleFileSelect(evt) {

            var files = evt.target.files;
            var output = document.getElementById("sortableImgThumbnailPreview");

            // Loop through the FileList and render image files as thumbnails.
            for (var i = 0; i < files.length; i++) {


                let f = files[i];
                // Only process image files.
                // if (!f.type.match('image.*')) {
                //     continue;
                // }

                var reader = new FileReader();

                // Closure to capture the file information.
                reader.onload = (function (theFile) {
                    return function (e) {
                        // Render thumbnail.
                        {{--var imgThumbnailElem = `<div class='RearangeBox imgThumbContainer'><div class='upload-pencent'>0٪</div><i class='material-icons imgRemoveBtn' onclick="removeThumbnailIMG(this , 'M${documentPicture.length}')"><img src='{{asset("assets/icon/file-close-item.svg")}}'></i><div class='IMGthumbnail' ><img  src='${e.target.result}' title=' ${theFile.name}'/></div><div class='imgName'>${theFile.name}</div></div>`;--}}
                        var imgThumbnailElem = "<div class='RearangeBox imgThumbContainer'><div class='upload-pencent'>0٪</div><div class='IMGthumbnail' ><img  src='" + e.target.result + "'" + "title='" + theFile.name + "'/></div><div class='imgName'>" + theFile.name + "</div><i class='material-icons imgRemoveBtn' onclick='removeThumbnailIMG(this)'><img src='{{asset('assets/icon/file-close-item.svg')}}'></i></div>";

                        output.innerHTML = output.innerHTML + imgThumbnailElem;

                        // documentPicture.push(e.target.result);
                        UploadStep2Profile("document", theFile);

                        documentIndex++;

                    };
                })(f);

                // Read in the image file as a data URL.
                reader.readAsDataURL(f);
            }
        }


        function removeThumbnailIMG(elm) {
            elm.parentNode.outerHTML = '';
        }

        function UploadStep2Profile(typeOfpic, input) {

            var _token = $("input[name='_token']").val();
            var typeofUpload; // 0 = meli code Picture , 1 = first page picture

            console.log(_token);

            var data = new FormData();
            var formdataLength = 0;


            const myUploadProgress = (progress) => {

                // for(var pair of data.entries()){
                // console.log(pair[0] +":"+pair[1]);

                console.log("progress");
                console.log(progress);


                let percentage = Math.floor((progress.loaded * 100) / progress.total);

                console.log(progress.loaded);

                if (typeOfpic == "document") {
                    var documentBox = $("#sortableImgThumbnailPreview").children(".RearangeBox").eq(documentIndex);
                    console.log("documentBox");
                    console.log(documentBox);
                    $(documentBox).children(".upload-pencent").html(`${percentage}%`)
                } else {
                    var firstPageBox = $("#sortableImgThumbnailPreview-code").children(".RearangeBox").eq(firstPageIndex);
                    console.log("firstPageBox");
                    console.log(firstPageBox);
                    $(firstPageBox).children(".upload-pencent").html(`${percentage}%`)
                }
            }


            var form = new FormData();
            // form.append("documentPicture", input);
            form.append("_token", _token);
            var settings;

            if (typeOfpic == "document") {
                form.append('documentPicture', input);


                settings = {
                    "async": true,
                    "crossDomain": true,
                    "url": "{{ route('document_submit') }}",
                    "method": "POST",
                    "headers": {
                        "cache-control": "no-cache",
                        "postman-token": "80e649ca-23ec-24a6-39d2-362604a29551"
                    },
                    // "uploadProgress":myUploadProgress(input),

                    xhr: function () {
                        var xhr = new window.XMLHttpRequest();

                        xhr.upload.addEventListener("progress", function (evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = evt.loaded / evt.total;
                                percentage = parseInt(percentComplete * 100);
                                console.log(percentage);

                                if (typeOfpic == "document") {
                                    var documentBox = $("#sortableImgThumbnailPreview").children(".RearangeBox").eq(documentIndex);
                                    console.log(input);
                                    $(documentBox).children(".upload-pencent").html(`${e2p(percentage.toString())}%`);
                                } else {
                                    var firstPageBox = $("#sortableImgThumbnailPreview-code").children(".RearangeBox").eq(firstPageIndex);
                                    console.log("firstPageBox");
                                    console.log(firstPageBox);
                                    $(firstPageBox).children(".upload-pencent").html(`${percentage}%`)
                                }


                                // if (percentComplete === 100) {
                                //
                                // }

                            }
                        }, false);

                        return xhr;
                    },


                    "processData": false,
                    "contentType": false,
                    "mimeType": "multipart/form-data",
                    "data": form
                }

            }

            for (var pair of data.entries()) {
                console.log(pair[0] + ":" + pair[1]);
            }

            $.ajax(settings).done(function (response) {
                console.log(response);
            }).fail(function (jqXHR) {

            });
        }


    </script>
    <script>

        // abzar-dropdown
        (function ($) { // Begin jQuery
            $(function () { // DOM ready
                // If a link has a dropdown, add sub menu toggle.
                $('.abzar-item').click(function (e) {
                    $('.abzar-list').show();
                    $(this).parent().addClass("active");
                    e.stopPropagation();
                });
                $(".abzar-list li").click(function () {
                    var title = $(this).html();
                    $('.abzar-item').html(title).parent().removeClass("active");
                    $('.abzar-list').hide();
                });
                // Clicking away from dropdown will remove the dropdown class
                $('.abzar-list').click(function (e) {
                    e.stopPropagation();
                });
                $('html').click(function () {
                    $('.abzar-list').hide();
                    $(".abzar-item").parent().removeClass("active");
                });

            }); // end DOM ready
        })(jQuery); // end jQuery

    </script>
    <script>
        $(document).ready(function () {
            // alert('hiiiii');
            $("#submit").click(function () {
                $(".alert-success").slideToggle("slow").delay(2000).slideToggle("slow");
                $(".error-masage").slideToggle("slow").delay(2000).slideToggle("slow");

            });
        });

    </script>
    <script src="{{asset('assets/js/dropdown.js')}}"></script>


@endsection
