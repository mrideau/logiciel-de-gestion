@extends('dashboard')

@section('dashboard-content')
    <h1 class="dashboard-content-title">Pages</h1>
    <a class="btn success" href="{{ route('pages.create') }}">Nouvelle Page</a>

    <table class="mt-5">
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
                        <a class="btn" href="{{ route('pages.edit', $page) }}">Editer</a>
                        <a class="btn success" href="{{ $page->route }}">Voir</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
