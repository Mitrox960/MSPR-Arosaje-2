<!-- resources/views/allPlants.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/allPlants.css" rel="stylesheet" />
    <title>Toutes les plantes</title>
</head>
<body>
    <?php include '../resources/views/headerHome.blade.php'; ?>
    <h1>Toutes les plantes</h1>

    @if($plantes->isEmpty())
        <p>Aucune plante disponible.</p>
    @else
        <ul>
            @foreach($plantes as $plante)
                <li>
                    <strong>Nom de la plante:</strong> {{ $plante->nom }}<br>
                    
                    <!-- Afficher l'image encod�e en base64 -->
                    <img src="data:image/jpeg;base64,{{ $plante->image }}" alt="Image de la plante"><br>

                    <strong>Description:</strong> {{ $plante->description }}<br>
                    <strong>Conseil d'entretien:</strong> {{ $plante->conseil_entretien }}<br>

                    <div class="contact-info">
                        <h2>Contact du propriétaire</h2>
                        <strong>Nom du propriétaire:</strong> {{ $plante->utilisateur->nom }}<br />
                        <strong>Prénom du propriétaire:</strong> {{ $plante->utilisateur->prenom }}<br />
                        <strong>Email du propriétaire:</strong> {{ $plante->utilisateur->adresse_mail }}<br />
                        <strong>Téléphone du propriétaire:</strong> {{ $plante->utilisateur->telephone }}<br />
                    </div>

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
