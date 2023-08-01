<div class="col-lg-12 col-md-12 col-sm-12">
    <a class="blog-search-box prerequisite-items" href="{{ route('single_blog' , $blog->slug) }}">
        <div class="row">
            <div class=" col-lg-2 col-md-2 col-sm-4 col-12">
                <div class="image-box">
                    <img src="{{ Voyager::image($blog->image) }}">
                </div>
            </div>
            <div class="blog-title flex-box col-lg-5 col-md-5 col-sm-4 col-12">
                <h4 >
                    {{ $blog->title }}
                </h4>

            </div>
            <div class="flex-box col-lg-5 col-md-5 col-sm-4 col-12">
                <div class="date">
                    {{ $blog->time }}
                </div>
            </div>
        </div>
    </a>
</div>
