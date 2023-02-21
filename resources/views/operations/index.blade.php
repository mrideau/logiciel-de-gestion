@extends('dashboard')

@section('dashboard-content')
    <h1 class="dashboard-content-title">Opérations</h1>

    <div class="flex gap-3">
        <a class="btn success" href="{{ route('operations.create') }}">Nouvelle opération</a>
        <a class="btn" href="{{ route('operations.index', ['format' => 'pdf', 'year' => request()-> year, 'month' => request()-> month, 'page' => request()-> page]) }}">Exporter en PDF</a>
    </div>

    <form class="mt-5" method="GET" action="" id="filters-form">
        <label>Année</label>
        <select name="year">
            <option value="">-</option>
            @foreach($years as $year)
                <option value="{{ $year }}" @if(Request::get('year') == $year) selected @endif>{{ $year }}</option>
            @endforeach
        </select>

        <label>Mois</label>
        <select name="month">
            <option value="">-</option>

            @foreach(['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'] as $key => $month)
                <option value="{{ $key + 1 }}"
                        @if(Request::get('month') == $key + 1) selected @endif>{{ $month }}</option>
            @endforeach
        </select>
        <button class="btn" type="submit">Appliquer</button>
    </form>

    <div class="my-5">
        @if($operations->count() > 0)
            <x-operations-table :operations="$operations" :total="$total"></x-operations-table>
        @else
            <p>Aucun résultats.</p>
        @endif
    </div>

    {{ $operations->withQueryString()->links() }}

@endsection

@push('scripts')

    <script>
        const form = document.querySelector('#filters-form');

        form.addEventListener('formdata', (event) => {
            let formData = event.formData;
            for (let [name, value] of Array.from(formData.entries())) {
                if (value === '') {
                    formData.delete(name)
                }
            }
        });
    </script>

@endpush
