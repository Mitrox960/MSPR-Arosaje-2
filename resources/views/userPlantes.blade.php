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
            <strong>Description:</strong> {{ $plante->description }}
            <strong>Image:</strong> {{ $plante->image }}
            <strong>conseil_entretien:</strong> {{ $plante->conseil_entretien }}
        </li>
        @endforeach
    </ul>
    @endif

</body>
</html>
