@extends('layouts.app')

@section('content')
    <div class="dashboard">
        <div class="dashboard-sidebar">
            <p>Title</p>
            <ul>
                <li>
                    <a href="{{route('operations.index')}}">Operations</a>
                </li>
                <li>
                    <a href="{{route('operation-categories.index')}}">Operation Categories</a>
                </li>
                <li>
                    <a href="{{route('pages.index')}}">Pages</a>
                </li>
            </ul>
            <div class="dashboard-footer">
                <a href="{{ route('logout') }}">Logout</a>
            </div>
        </div>

        <div>
            @yield('dashboard-content')
        </div>
    </div>
@endsection
