<li >
    <a class="flex-box @if(Request::has('category') && ($category->id == Request::input('category'))) active @endif" href="{{ route('course', array_merge(request()->query->all(), ["category" => $category->id]))  }}">
        <span class=" outer flex-box">
            <span class="inner"></span>
        </span>
        {{ $category->name }}
    </a>
</li>
