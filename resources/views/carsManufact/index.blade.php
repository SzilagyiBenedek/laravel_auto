<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Autógyártók</title>
</head>
<body>

    <h1>Autógyártók listája</h1>

    {{-- Sikeres művelet visszajelzése --}}
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif

    {{-- Új elemek hozzáadása --}}
    <p>
        <a href="{{ route('carsManufact.create') }}">
            Új autógyártó hozzáadása
        </a>
    </p>

    <p>
        <a href="{{ route('carsModell.create') }}">
            Új autómodell hozzáadása
        </a>
    </p>

    <p>
        <a href="{{ route('carsModell.index') }}">
            Autómodellek listája
        </a>
    </p>

    {{-- Keresés gyártó neve alapján --}}
    <form method="GET" action="{{ route('carsManufact.index') }}">

        <input
            type="text"
            name="needle"
            placeholder="Keresés név alapján..."
            value="{{ $needle ?? '' }}"
        >

        <button type="submit">Keresés</button>

        <a href="{{ route('carsManufact.index') }}">
            Összes megjelenítése
        </a>

    </form>

    <br>

    {{-- Autógyártók táblázata --}}
    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>ID</th>
                <th>Gyártó neve</th>
                <th>Műveletek</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($carsManufacts as $carsManufact)

                <tr>
                    <td>{{ $carsManufact->id }}</td>

                    <td>{{ $carsManufact->name }}</td>

                    <td>
                        <a href="{{ route('carsManufact.show', $carsManufact) }}">
                            Megtekintés
                        </a>

                        |

                        <a href="{{ route('carsManufact.edit', $carsManufact) }}">
                            Szerkesztés
                        </a>

                        |

                        <form
                            action="{{ route('carsManufact.destroy', $carsManufact) }}"
                            method="POST"
                            style="display: inline;"
                            onsubmit="return confirm('Biztosan törlöd ezt a gyártót?')"
                        >
                            @csrf
                            @method('DELETE')

                            <button type="submit">
                                Törlés
                            </button>
                        </form>
                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="3">
                        Nincs megjeleníthető autógyártó.
                    </td>
                </tr>

            @endforelse
        </tbody>
    </table>

</body>
</html>