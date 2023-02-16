@extends('dashboard')

@section('dashboard-content')
    <h1>Opérations</h1>

    <a href="{{ route('operations.create') }}">Ajouter</a>

    <form method="GET" action="">
        <label>Année</label>
        <select name="year">
            <option value="">Aucun</option>
            @foreach($years as $year)
                <option value="{{ $year }}" @if(Request::get('year') == $year) selected @endif>{{ $year }}</option>
            @endforeach
        </select>

        <label>Mois</label>
        <select name="month">
            <option value="">Aucun</option>

            @foreach(['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'] as $key => $month)
                <option value="{{ $key + 1 }}"
                        @if(Request::get('month') == $key + 1) selected @endif>{{ $month }}</option>
            @endforeach
        </select>
        <button type="submit">Filter</button>
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

    @if($operations->count() > 0)
        <x-operations-table :operations="$operations" :total="$total"></x-operations-table>
    @else
        <p>Aucun résultats.</p>
    @endif

    <a href="{{ route('operations.index', ['format' => 'pdf', 'year' => request()-> year, 'month' => request()-> month]) }}">PDF</a>

@endsection
