<li>
    <a class="flex-box @if(url()->current() == route('blog' , $category->slug)) active @endif" href="{{ route('blog' , $category->slug) }}">
        <span class=" outer flex-box">
            <span class="inner"></span>
        </span>
        {{ $category->name }}
    </a>
</li>
