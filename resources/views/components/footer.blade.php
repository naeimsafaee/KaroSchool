@foreach($items as $menu_item)


    <li>
        <a class="flex-box" href="{{ $menu_item->link() }}">
                                                <span class=" outer flex-box">
                                                    <span class="inner"></span>
                                                </span>
            {{ $menu_item->title }}
        </a>
    </li>
@endforeach
