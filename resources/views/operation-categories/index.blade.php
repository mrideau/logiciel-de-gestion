@extends('dashboard')

@section('dashboard-content')
    <form method="POST" action="{{route('operation-categories.store')}}" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name">
        <button type="submit">Ajouter</button>
    </form>

    <table>
        <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($operationCategories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <form method="POST" action="{{ route('operation-categories.destroy', $category) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
