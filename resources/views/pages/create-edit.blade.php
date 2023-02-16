@extends('dashboard')

@section('dashboard-content')
    <form method="POST" action="{{ isset($page) ? route('pages.update', $page) : route('pages.store') }}">
        @csrf

        @if(isset($page))
            @method('PATCH')
        @endif

        <label>Slug</label>
        <input type="text" name="slug" value="{{ $page->slug ?? old('slug') }}">

        <label>Name</label>
        <input type="text" name="name" value="{{ $page->name  ?? old('name')}}">

        <label>Route</label>
        <input type="text" name="route" value="{{ $page->route ?? old('route') }}">

        @if($page)
            <a href="{{ route('pages.editor', $page) }}">Open Editor</a>
        @endif

        <button type="submit">Enregistrer</button>
    </form>
@endsection
