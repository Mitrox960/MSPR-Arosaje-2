<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="css/headerHome.css" rel="stylesheet" />
</head>
<body>
    <header>
        <div>
            <a href="/accueil" class="back-button">&#8249; Accueil</a>

        </div>
        <div>
            <h1>A'rosa-je</h1>
        </div>
        <div onclick="userProfile()">
            <p>Ton profil</p>
            <img src="assets/logo_profile.png" height="45px" width="45px" />
        </div>

        <script>
            function userProfile() {
                // Utilisez la fonction url de PHP pour générer l'URL complète
                var userProfileUrl = "<?php echo url('userProfile'); ?>";
                document.location.href = userProfileUrl;
            }
        </script>
    </header>
</body>
</html>
