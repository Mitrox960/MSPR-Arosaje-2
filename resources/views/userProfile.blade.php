<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/userProfile.css" rel="stylesheet">

</head>
    <body class="antialiased">
        <?php include '../resources/views/headerHome.blade.php';?>
        <?php include '../resources/views/footer.blade.php';?>
        <main>
            <h1>Les informations de compte</h1>
            <ul>
                <li><label class="info">Nom:</label><label>**Nom**</label></li>  
                <li><label class="info">Prénom:</label><label>**Prénom**</label></li>  
                <li><label class="info">Indentifiant:</label><label>**Nom.Prenom OU clé primaire**</label></li>
                <li><label class="info">Email:</label><label>**Email**</label></li>                 
            </ul>
        </main>
    </body>
</html>
