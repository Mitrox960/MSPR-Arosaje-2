<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="css/userProfile.css" rel="stylesheet" />
</head>
<body class="antialiased">
    <?php include '../resources/views/headerHome.blade.php'; ?>
    <?php include '../resources/views/footer.blade.php'; ?>
    <main>
        <h1>Les informations de compte</h1>
        <ul>
            <li><label class="info">Nom :</label><label>{{ $utilisateur->nom }}</label></li>
            <li><label class="info">Prénom :</label><label>{{ $utilisateur->prenom }}</label></li>
            <li><label class="info">Date de naissance :</label><label>{{ $utilisateur->date_de_naissance }}</label></li>
            <li><label class="info">Email :</label><label>{{ $utilisateur->adresse_mail }}</label></li>
            <li><label class="info">Téléphone :</label><label>{{ $utilisateur->telephone }}</label></li>

           
            <!-- Ajoutez cette partie dans votre vue userProfile.blade.php -->
            <li><label class="info">Ville :</label><label>{{ $utilisateur->adresse->ville}}</label></li>
            <li><label class="info">Code postal :</label><label>{{ $utilisateur->adresse->code_postal}}</label></li>
            <li><label class="info">Nom de la voie :</label><label>{{ $utilisateur->adresse->nom_voie}}</label></li>
            <li><label class="info">Numéro de la voie :</label><label>{{ $utilisateur->adresse->numero_voie}}</label></li>



            <!-- Assurez-vous d'ajuster le champ adresse_complete en fonction de votre modèle Adresse -->

            

        </ul>
    </main>
</body>
</html>
