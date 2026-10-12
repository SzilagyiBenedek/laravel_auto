<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Autógyártó szerkesztése</title>
</head>
<body>

    <h1>Autógyártó szerkesztése</h1>

    <form
        action="{{ route('carsManufact.update', $carsManufact) }}"
        method="POST"
    >
        @csrf
        @method('PUT')

        <label for="name">Autógyártó neve:</label>

        <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name', $carsManufact->name) }}"
            required
            maxlength="255"
        >

        @error('name')
            <p>{{ $message }}</p>
        @enderror

        <button type="submit">Módosítás mentése</button>
    </form>

    <a href="{{ route('carsManufact.index') }}">Vissza a listához</a>

</body>
</html>