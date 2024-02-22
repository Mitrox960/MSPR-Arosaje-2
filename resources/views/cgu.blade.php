<!-- resources/views/cgu.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/cgu.css" rel="stylesheet">
    <title>CGU Arosaje</title>
</head>
<body>
   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conditions Générales d'Utilisation - AroSaje</title>
</head>
<body>

    <h1>Conditions Generales d'Utilisation (CGU) de l'application AroSaje</h1>

    <p><strong>Date d'effet :</strong> 22/02/2024</p>

    <p>Bienvenue sur l'application AroSaje ! Avant d'utiliser nos services, veuillez lire attentivement les presentes Conditions Generales d'Utilisation. En utilisant notre application, vous acceptez de vous conformer a ces conditions.</p>

    <h2>1. Description du Service</h2>
    <p>AroSaje offre une plateforme permettant aux utilisateurs de partager et de faire garder leurs plantes par d'autres membres de la communaute. En postant une plante sur l'application, vous consentez a partager certaines informations, y compris votre adresse email, avec d'autres utilisateurs.</p>

    <h2>2. Donnees Collectees et Utilisation</h2>

    <h3>2.1 Donnees Personnelles</h3>
    <p>En utilisant AroSaje, vous consentez a la collecte et a l'utilisation de vos donnees personnelles, notamment votre nom, prenom, adresse, date de naissance, adresse email, mot de passe, et numero de telephone. Ces informations sont necessaires pour creer et gerer votre compte utilisateur.</p>

    <h3>2.2 Donnees de Localisation</h3>
    <p>Lorsque vous postez une plante sur l'application, votre adresse physique est partagee avec d'autres utilisateurs. Cela permet de faciliter la garde de plantes entre membres de la communaute. Nous ne divulguons pas vos coordonnees exactes, mais seulement des informations generales telles que la ville et le code postal.</p>

    <h3>2.3 Contenu Partage</h3>
    <p>En postant une plante sur AroSaje, vous consentez a partager des informations telles que le nom de la plante, une image, une description, des conseils d'entretien, ainsi que votre adresse mail, nom et prenom pour que les autres utilisateurs puissent vous contacter. Ces informations seront accessibles a d'autres utilisateurs de l'application.</p>

    <h2>3. Securite des Donnees</h2>
    <p>Nous prenons des mesures de securite pour proteger vos donnees, mais aucune transmission sur Internet ou stockage electronique n'est totalement securisee. En utilisant notre service, vous comprenez et acceptez les risques lies a la securite des donnees.</p>

    <h2>4. Partage d'Informations avec des Tiers</h2>
    <p>Nous ne partageons pas vos informations personnelles avec des tiers sans votre consentement, sauf si requis par la loi.</p>

    <h2>5. Droits de Propriete Intellectuelle</h2>
    <p>L'ensemble du contenu present sur AroSaje, y compris les textes, images, logos, etc., est protege par des droits de propriete intellectuelle. A l'exception des plantes que vous publiez. Vous vous engagez a respecter ces droits.</p>

    <h2>6. Modifications des CGU</h2>
    <p>Nous nous reservons le droit de modifier ces CGU a tout moment. Les modifications seront effectives des leur publication sur l'application. Il est de votre responsabilite de consulter regulierement les CGU.</p>

    <h2>7. Consentement et Retrait</h2>
    <p>En utilisant AroSaje, vous consentez aux conditions enoncees dans ces CGU. Si vous n'acceptez pas ces conditions, veuillez ne pas utiliser notre service. Vous pouvez retirer votre consentement en supprimant votre compte utilisateur.</p>

    <h2>8. Contact</h2>
    <p>Si vous avez des questions ou des preoccupations concernant ces CGU, veuillez nous contacter a equipearosaje@gmail.com.</p>

    <p>En acceptant ces CGU, vous comprenez et acceptez les conditions enoncees ci-dessus.</p>

    <p>Merci d'utiliser AroSaje !</p>

</body>
</html>


    <form method="GET" action="{{ route('accountForm') }}">
        @csrf
        <!-- Vos autres champs du formulaire -->
        <button type="submit" class="buttonPostCreateAcccount">J'ai bien lu les CGU</button>
    </form>
</body>
</html>