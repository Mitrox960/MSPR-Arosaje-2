<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mes Plantes</title>
</head>
<body>
    <?php include '../resources/views/headerHome.blade.php'; ?>
    <?php include '../resources/views/footer.blade.php'; ?>

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
                    
                    @if($plante->postee)
                        <!-- Si la plante a été postée, afficher le bouton "Retirer plante" -->
                        <form action="{{ route('removePlant', ['plante' => $plante->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit">Retirer ma plante</button>
                        </form>
                    @else
                        <!-- Sinon, afficher le bouton "Ajouter plante" -->
                        <form action="{{ route('postPlant', ['plante' => $plante->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit">Poster ma plante</button>
                        </form>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif

</body>
</html>
