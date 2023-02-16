<header class="header">
    <span>Title</span>
    <ul class="header-nav">
        @foreach($links as $link)
            <li class="header-nav-item">
                <a href=".{{ $link->route }}">{{ $link->name }}</a>
            </li>
        @endforeach
    </ul>
{{--    <div>--}}
{{--        <a>Dashboard</a>--}}
{{--    </div>--}}
</header>
