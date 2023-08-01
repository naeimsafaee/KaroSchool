@php
    $categories = \App\Models\TopicCategory::all();
@endphp

<div class="padding-item col-lg-3 col-md-4 col-sm-6 col-12">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <h2 class="category-title-item">
            دسته بندی ها پرسش
        </h2>

    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="border-box">
            <ul class="category-list">
                @foreach($categories as $category)
                <li>
                    <a class="flex-box @if(Request::has('category') && ($category->id == Request::input('category'))) active @endif"
                    href="{{ route("search_topic" , array_merge(request()->query->all(), ["category" => $category->id])) }}">
                        <span class=" outer flex-box">
                            <span class="inner"></span>
                        </span>
                        {{ $category->name }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>

    </div>
</div>
