<h1>Autómodellek</h1>

<a href="{{ route('carsModell.create') }}">Új autómodell</a>

<form method="GET" action="{{ route('carsModell.index') }}">
    <input
        type="text"
        name="needle"
        placeholder="Keresés modellnév alapján..."
        value="{{ $needle ?? '' }}"
    >
    <button type="submit">Keresés</button>
</form>

@if (session('status'))
    <p>{{ session('status') }}</p>
@endif

<table border="1" cellpadding="8">
    <thead>
        <tr>
            <th>ID</th>
            <th>Modell neve</th>
            <th>Évjárat</th>
            <th>Gyártó</th>
            <th>Műveletek</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($carsModells as $carsModell)
            <tr>
                <td>{{ $carsModell->id }}</td>
                <td>{{ $carsModell->name }}</td>
                <td>{{ $carsModell->year }}</td>
                <td>{{ $carsModell->carsManufact?->name ?? 'Nincs megadva' }}</td>
                <td>
                    <a href="{{ route('carsModell.show', $carsModell) }}">
                        Megtekintés
                    </a>

                    <a href="{{ route('carsModell.edit', $carsModell) }}">
                        Szerkesztés
                    </a>

                    <form
                        action="{{ route('carsModell.destroy', $carsModell) }}"
                        method="POST"
                        style="display:inline"
                    >
                        @csrf
                        @method('DELETE')
                        <button type="submit">Törlés</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Nincs megjeleníthető autómodell.</td>
            </tr>
        @endforelse
    </tbody>
</table>