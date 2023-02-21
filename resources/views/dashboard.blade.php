@extends('layouts.app')

@section('content')
    <div class="dashboard-wrapper">
        <header class="dashboard-header">
            <a href="{{ route('dashboard') }}">
                <h1 class="text-2xl font-bold">Dashboard</h1>
            </a>
            <label id="sidenav-toggle-label" for="sidenav-toggle">toggle</label>
        </header>
        <div class="dashboard">
            <div class="dashboard-sidebar">
                <ul class="mt-5">
                    @foreach(['Opérations' => route('operations.index'), 'Categories' => route('operation-categories.index'), 'Pages' => route('pages.index')] as $name => $url)
                        <li class="">
                            <a class="px-4 py-2 block" href="{{ $url }}">{{ $name }}</a>
                        </li>
                    @endforeach
                </ul>

                <div class="dashboard-nav-footer">
                    <a class="btn block" href="{{ route('logout') }}">Logout</a>
                </div>
            </div>

            <div class="dashboard-mobile-nav-wrapper">
                <input type="checkbox" id="mobile-nav-toggle">
                <div class="dashboard-mobile-nav-container">
                    <ul class="mt-5">
                        @foreach(['Opérations' => route('operations.index'), 'Categories' => route('operation-categories.index'), 'Pages' => route('pages.index')] as $name => $url)
                            <li class="">
                                <a class="px-4 py-2 block" href="{{ $url }}">{{ $name }}</a>
                            </li>
                        @endforeach
                    </ul>

                    <div class="dashboard-nav-footer">
                        <a class="btn block" href="{{ route('logout') }}">Logout</a>
                    </div>
                </div>
            </div>

            <div class="dashboard-content-wrapper">
                <div class="dashboard-content-container">
                    @hasSection('dashboard-content')
                        @yield('dashboard-content')
                    @else
                        <p class="text-xl font-bold">Bonjour !</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
