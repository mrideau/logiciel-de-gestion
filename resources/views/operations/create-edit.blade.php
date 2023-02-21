@extends('dashboard')

@section('dashboard-content')

    @if(isset($operation))
        <h1 class="dashboard-content-title">Modification opération</h1>
        <form method="POST" action="{{ route('operations.destroy', $operation) }}">
            @csrf
            @method('DELETE')
        </form>
    @endif

    <form method="POST"
          action="{{ isset($operation) ? route('operations.update', $operation) : route('operations.store') }}"
    >
        @if(isset($operation)) @method('PATCH') @endif

        @csrf

        <div class="form-field">
            <label>Date</label>
            <input type="date" name="date" value="{{ $operation->date ?? old('date') }}">
        </div>

        <div class="form-field">
            <label>Type</label>
            <select name="type">
                @foreach(['add' => 'Crédit', 'subtract' => 'Débit'] as $key => $type)
                    <option value="{{ $key }}" @if(($operation?->value > 0 && $key == 'add') || ($operation?->value < 0 && $key == 'subtract')) selected @endif>{{ $type }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-field">
            <label>Nature</label>
            <input type="text" name="label" value="{{ $operation->label ?? old('label') }}">
        </div>

        <div class="form-field">
            <label>Montant</label>
            <input type="number" step=".01" min="0.01" name="value" value="{{ abs($operation?->value) ?? old('value') }}">
        </div>

        <div class="form-field">
            <label>Catégorie</label>
            <select name="category_id">
                <option disabled>Sélectionner Catégorie</option>
                @foreach($operationCategories as $category)
                    <option value="{{ $category->id }}" @if($operation?->category->id == $category->id) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="float-right">
            @if(isset($operation))
                <button class="btn danger" type="submit">Supprimer</button>
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
