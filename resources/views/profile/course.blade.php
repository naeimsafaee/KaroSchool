@extends('index')
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12">
        <section class="container ">
            <div class=" row margin content">
                @include('profile.navbar')
                <div class=" colum-lg-9 col-md-8 col-sm-6 col-12">
                    <div class="row ">
                        <img class="profile-circle circle-grey web-item" src="{{asset('assets/photo/circle-grey.svg')}}">

                        <div class="padding-item col-lg-12 col-md-12 col-sm-12">
                            <h1 class="title-item">
                                دوره ها
                            </h1>
                        </div>

                        @each('components.client_courses' , $client->course , 'course')

                    </div>
                </div>

            </div>

        </section>
    </div>

@endsection

