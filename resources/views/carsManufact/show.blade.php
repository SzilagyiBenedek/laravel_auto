<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Autógyártó adatai</title>
</head>
<body>

    <h1>Autógyártó adatai</h1>

    <p>
        <strong>Azonosító:</strong>
        {{ $carsManufact->id }}
    </p>

    <p>
        <strong>Gyártó neve:</strong>
        {{ $carsManufact->name }}
    </p>

    <a href="{{ route('carsManufact.edit', $carsManufact) }}">
        Szerkesztés
    </a>

    <a href="{{ route('carsManufact.index') }}">
        Vissza a listához
    </a>

</body>
</html>