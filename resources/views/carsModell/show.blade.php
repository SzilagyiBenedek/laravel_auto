<h1>Autómodell adatai</h1>

<p><strong>ID:</strong> {{ $carsModell->id }}</p>
<p><strong>Modell neve:</strong> {{ $carsModell->name }}</p>
<p><strong>Évjárat:</strong> {{ $carsModell->year }}</p>
<p>
    <strong>Gyártó:</strong>
    {{ $carsModell->carsManufact?->name ?? 'Nincs megadva' }}
</p>

<a href="{{ route('carsModell.edit', $carsModell) }}">
    Szerkesztés
</a>

<a href="{{ route('carsModell.index') }}">
    Vissza a listához
</a>