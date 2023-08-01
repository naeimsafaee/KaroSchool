@extends('index')
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12">
        <section class="container">
            <div class=" row margin content">

                @include('profile.navbar_topic')

                <div class=" col-lg-9 col-md-6 col-sm-6 col-12">
                    <div class="row ">
                        <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                            <h2 class="title-item">
                                پروفایل
                            </h2>

                        </div>
                        <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="topic-row Edit-profile border-box">
                                <div class="login-form">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <img class="change-profile-image" src="{{ $client->image }}"/>
                                            <h2 class="name-item text-center">
                                                {{ $client->name }}
                                            </h2>
                                        </div>
                                        @if(count($client->medals) > 0)
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="row modal-row">
                                                <div class="text-center col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <p class="margin-top">
                                                        مدال ها
                                                    </p>
                                                </div>
                                                <div class="text-center col-lg-12 col-md-12 col-sm-12 col-12">
                                        @each('components.medal' , $client->medals , 'medal')
                                                </div>
                                            </div>

                                        </div>
                                        @endif
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
    <script src="{{asset('assets/js/dropdown.js')}}"></script>
@endsection
