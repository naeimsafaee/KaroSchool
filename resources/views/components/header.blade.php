


@foreach($items as $menu_item)


    <li>
        <span></span>
        <a class="nav-items" href="{{ $menu_item->link() }}">
            {{ $menu_item->title }}
        </a>
    </li>

@endforeach
