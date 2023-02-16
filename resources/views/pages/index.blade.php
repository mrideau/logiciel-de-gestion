@extends('dashboard')

@section('dashboard-content')
    <h1>Pages</h1>
    <a href="{{ route('pages.create') }}">Nouvelle Page</a>

    <table>
        <thead>
            <tr>
                <th>Slug</th>
                <th>Name</th>
                <th>Route</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($pages as $page)
                <tr>
                    <td>{{ $page->slug }}</td>
                    <td>{{ $page->name }}</td>
                    <td>{{ $page->route }}</td>
                    <td>
                        <a href="{{ route('pages.edit', $page) }}">Editer</a>
                        <a href="{{ route('pages.editor', $page) }}">Ouvrir Editeur</a>
                        <a href="{{ $page->route }}">Voir</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
