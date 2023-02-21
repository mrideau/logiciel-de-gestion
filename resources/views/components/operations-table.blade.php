<table>
    <thead>
    <tr>
        <th>Date</th>
        <th>Nature opération</th>
        <th>Catégorie opération</th>
        <th>Débit</th>
        <th>Crédit</th>
        @if(isset($showActions))
            <th></th>
        @endif
    </tr>
    </thead>
    <tbody>
    @foreach($operations as $operation)
        <tr>
            <td>{{ $operation->date }}</td>
            <td>{{ $operation->label }}</td>
            <td>{{ $operation->category->name }}</td>

            @if($operation->value > 0)
                <td></td>
                <td>{{ $operation->value }}</td>
            @else
                <td>{{ abs($operation->value) }}</td>
                <td></td>
            @endif

            @if(isset($showActions))
                <td>
                    <a class="btn" href="{{ route('operations.edit', $operation) }}">Editer</a>
                </td>
            @endif
        </tr>
    @endforeach
    <tr>
        <td colspan="2"></td>
        <td>Total</td>
        <td class="{{ $total > 0 ? 'text-success' : 'text-danger' }}" colspan="2" align="center">{{ $total }}</td>
    </tr>
    </tbody>
</table>
