@extends('layouts.app')

@section('content')

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="email" name="email">
        <input type="password" name="password">
        <button type="submit">Login</button>
    </form>

@endsection
