<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/accountCreate.css" rel="stylesheet">

    <title>Créer ton Compte</title>
</head>
<body>
        <header>
            <iframe src="/header" width="100%" height="100"></iframe>
        </header>
        <main>
            <div>
            <form type="POST">
                <div>
                <input value="Nom"type="text"> <br>
                <input value="Prenom" type="text"> <br>
                <input value="Adresse Email" type='mail'> <br>
                <input value="Mot de passe" type="text"> <br>
                <input value="Confirmation mot de passe" type="text"> <br>
                </div>
                <input type='button' value='Enregistrer les modifications' class="buttonPostCreateAcccount">
            </form>
            </div>
        </main>
        <footer>
        <iframe src="/footer" width="100%" height="100"></iframe>

        </footer>
</body>
</html>