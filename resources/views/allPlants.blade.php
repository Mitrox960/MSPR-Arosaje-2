<!-- resources/views/allPlants.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toutes les plantes</title>
</head>
<body>

    <h1>Toutes les plantes</h1>

    @if($plantes->isEmpty())
        <p>Aucune plante disponible.</p>
    @else
        <ul>
            @foreach($plantes as $plante)
                <li>
                    <strong>Nom de la plante:</strong> {{ $plante->nom }}<br>
                    
                    <!-- Afficher l'image encodée en base64 -->
                    <strong>Image:</strong>
                    <img src="data:image/jpeg;base64,{{ $plante->image }}" alt="Image de la plante"><br>

                    <strong>Description:</strong> {{ $plante->description }}<br>
                    <strong>Conseil d'entretien:</strong> {{ $plante->conseil_entretien }}<br>
                    <strong>Email de l'utilisateur:</strong> {{ $plante->utilisateur->adresse_mail }}<br>
                    <strong>Nom de l'utilisateur:</strong> {{ $plante->utilisateur->nom }}<br>

                    @if(Auth::user() && $plante->utilisateur->id === Auth::user()->id)
                        <form action="{{ route('removePlant', ['plante' => $plante->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit">Retirer ma plante</button>
                        </form>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif

</body>
</html>
