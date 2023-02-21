@extends('dashboard')

@section('dashboard-content')
    <div class="container mx-auto">
    @if(isset($page))
        <form class="inline" method="POST" action="{{ route('pages.destroy', $page) }}" id="delete">
            @csrf
            @method('DELETE')
        </form>

        <h1 class="dashboard-content-title">Modification page</h1>
        <a class="btn primary" href="{{ route('pages.editor', $page) }}">Open Editor</a>
    @endif

        <form class="mt-5" method="POST" action="{{ isset($page) ? route('pages.update', $page) : route('pages.store') }}">
            @csrf

            @if(isset($page))
                @method('PATCH')
            @endif

            <div class="form-field">
                <label>Slug</label>
                <input type="text" name="slug" value="{{ $page->slug ?? old('slug') }}">
            </div>

            <div class="form-field">
                <label>Name</label>
                <input type="text" name="name" value="{{ $page->name  ?? old('name')}}">
            </div>

            <div class="form-field">
                <label>Route</label>
                <input type="text" name="route" value="{{ $page->route ?? old('route') }}">
            </div>

            <div class="mt-5 flex justify-between">
                @if($page)
                    <div>
                        <button class="btn danger" type="submit" form="delete">Supprimer</button>
                    </div>
                @endif

                <button class="btn success" type="submit">Enregistrer</button>
            </div>
        </form>
    </div>
@endsection
