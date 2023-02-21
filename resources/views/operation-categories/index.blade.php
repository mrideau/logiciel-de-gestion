@extends('dashboard')

@section('dashboard-content')
    <h1 class="dashboard-content-title">Catégories Opérations</h1>

    <a class="btn success" href="{{ route('operation-categories.create') }}">Nouvelle catégorie</a>

    <table class="mt-5">
        <thead>
        <tr>
            <th>Nom</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($operationCategories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>
                    <a class="btn" href="{{ route('operation-categories.edit', $category) }}">Editer</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
