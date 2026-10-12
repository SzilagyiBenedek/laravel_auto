<h1>Autómodell szerkesztése</h1>

<form
    action="{{ route('carsModell.update', $carsModell) }}"
    method="POST"
>
    @csrf
    @method('PUT')

    <label for="name">Modell neve:</label>
    <input
        type="text"
        id="name"
        name="name"
        value="{{ old('name', $carsModell->name) }}"
        required
    >
    @error('name')
        <p>{{ $message }}</p>
    @enderror

    <br>

    <label for="year">Évjárat:</label>
    <input
        type="number"
        id="year"
        name="year"
        value="{{ old('year', $carsModell->year) }}"
        required
    >
    @error('year')
        <p>{{ $message }}</p>
    @enderror

    <br>

    <label for="carsManufact_id">Autógyártó:</label>
    <select id="carsManufact_id" name="carsManufact_id" required>
        @foreach ($carsManufacts as $carsManufact)
            <option
                value="{{ $carsManufact->id }}"
                @selected(
                    old('carsManufact_id', $carsModell->carsManufact_id)
                    == $carsManufact->id
                )
            >
                {{ $carsManufact->name }}
            </option>
        @endforeach
    </select>
    @error('carsManufact_id')
        <p>{{ $message }}</p>
    @enderror

    <br>

    <button type="submit">Módosítás mentése</button>
</form>

<a href="{{ route('carsModell.index') }}">Vissza a listához</a>