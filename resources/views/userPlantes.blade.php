<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mes Plantes</title>
</head>
<body>

    <h1>Mes Plantes</h1>

    @if($plantes->isEmpty())
        <p>Aucune plante disponible.</p>
    @else
        <ul>
            @foreach($plantes as $plante)
                <li>
                    <strong>Nom:</strong> {{ $plante->nom }}<br />
                    <strong>Description:</strong> {{ $plante->description }}<br />
                    
                    <img src="data:image/jpeg;base64,{{ $plante->image }}" alt="Image de la plante">

                    <br />
                    
                    <strong>Conseil d'entretien:</strong> {{ $plante->conseil_entretien }}<br />
                    
                    <form action="{{ route('postPlant', ['plante' => $plante->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit">Poster ma plante</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif

</body>
</html>
