<aside class="menu__news--left">
    <h2 class="title__menu--left">
        Danh mục tin tức
    </h2>
    <ul>
        @foreach ($category as $value)
            @if (count($value->Subcategory) > 0)
            <li class="menu_sub" data-category="{!! strtolower(str_replace(' ', '-', $value['sort_name'])) !!}">
                <a href="/category/{!! $value['id'] !!}_{!! $value['sort_name'] !!}.html" class="item-links">{!! $value['name'] !!}</a>
                <div class="submenu">
                    <ul>
                        @foreach ($value['Subcategory'] as $valueSub)
                        <li><a class="item-links" href="/subcategory/{!! $valueSub['id'] !!}_{!! $valueSub['sort_name'] !!}.html">{!! $valueSub['name'] !!}</a></li>
                        @endforeach
                    </ul>
                </div>
            </li>        
            @else
            <li><a href="/category/{!! $value['id'] !!}_{!! $value['sort_name'] !!}.html" class="item-links">{!! $value['name'] !!}</a></li>
            @endif
        @endforeach
    </ul>
</aside>