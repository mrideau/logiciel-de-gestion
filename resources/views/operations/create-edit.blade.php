@extends('dashboard')

@section('dashboard-content')

    <form method="POST"
          action="{{ isset($operation) ? route('operations.update', $operation) : route('operations.store') }}"
    >
        @if(isset($operation)) @method('PATCH') @endif

        @csrf

        <label>Date</label>
        <input type="date" name="date" value="{{ $operation->date ?? old('date') }}">

        <label>Type</label>
        <select name="type">
            @foreach(['add' => 'Crédit', 'subtract' => 'Débit'] as $key => $type)
                <option value="{{ $key }}" @if(($operation?->value > 0 && $key == 'add') || ($operation?->value < 0 && $key == 'subtract')) selected @endif>{{ $type }}</option>
            @endforeach
        </select>

        <label>Nature</label>
        <input type="text" name="label" value="{{ $operation->label ?? old('label') }}">

        <label>Montant</label>
        <input type="number" step=".01" min="0.01" name="value" value="{{ abs($operation?->value) ?? old('value') }}">

        <label>Catégorie</label>
        <select name="category_id">
            <option disabled>Sélectionner Catégorie</option>
            @foreach($operationCategories as $category)
                <option value="{{ $category->id }}" @if($operation?->category->id == $category->id) selected @endif>{{ $category->name }}</option>
            @endforeach
        </select>
        <button type="submit">Enregistrer</button>
    </form>

@endsection
