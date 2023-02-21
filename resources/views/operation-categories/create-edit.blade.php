@extends('dashboard')

@section('dashboard-content')

    @if(isset($operationCategory))
        <h1 class="dashboard-content-title">Modification catégorie</h1>

        <form id="delete_category" method="POST" action="{{ route('operation-categories.destroy', $operationCategory) }}">
            @csrf
            @method('DELETE')
        </form>
    @endif

    <form method="POST"
          action="{{ isset($operationCategory) ? route('operation-categories.update', $operationCategory) : route('operation-categories.store') }}"
    >
        @if(isset($operationCategory)) @method('PATCH') @endif

        @csrf

        <div class="form-field">
            <label>Nom</label>
            <input type="text" name="name" value="{{ $operationCategory->name ?? old('name') }}">
        </div>

        <div class="float-right">
            @if(isset($operationCategory))
                <button class="btn danger" type="submit" form="delete_category">Supprimer</button>
            @endif

            <button class="btn submit" type="submit">Enregistrer</button>
        </div>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection
