<header class="flex items-center justify-between shadow-md px-8 py-6">
    <ul class="header-nav">
        @foreach($links as $link)
            <li class="header-nav-item">
                <a class="{{ Request::url() == url($link->route) ? 'font-bold' : '' }}" href=".{{ $link->route }}">{{ $link->name }}</a>
            </li>
        @endforeach
    </ul>
    @auth()
        <a class="btn" href="{{ route('dashboard') }}">Dashboard</a>
    @endauth
</header>
