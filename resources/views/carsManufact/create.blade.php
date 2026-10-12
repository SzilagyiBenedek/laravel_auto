<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Új autógyártó</title>
</head>
<body>

    <h1>Új autógyártó hozzáadása</h1>

    <form action="{{ route('carsManufact.store') }}" method="POST">
        @csrf

        <label for="name">Autógyártó neve:</label>

        <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name') }}"
            required
            maxlength="255"
        >

        @error('name')
            <p>{{ $message }}</p>
        @enderror

        <button type="submit">Mentés</button>
    </form>

    <a href="{{ route('carsManufact.index') }}">Vissza a listához</a>

</body>
</html>