<li >
    <a class="flex-box @if(Request::has('tool') && ($tool->id == Request::input('category'))) active @endif" href="{{ route('course', array_merge(request()->query->all(), ["tool" => $tool->id]))  }}">
        <span class=" outer flex-box">
            <span class="inner"></span>
        </span>
        {{ $tool->name }}
    </a>
</li>
