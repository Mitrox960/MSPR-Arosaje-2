<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
    <link href="css/accountLogin.css" rel="stylesheet">
</head>
<body>  
        <header>
            <iframe src="/header" width="100%" height="100"></iframe>
        </header>
        <main>
        <form type="POST">
                <div>
                <label>Identifiant</label> <br>
                <input placeholder="Email ou nom d'utilisateur"type="text"> <br>
                <label>Mot de passe</label> <br>
                <input placeholder="Mot de passe" type="text"> <br>
                
                </div>
                <input type='button' value='Enregistrer les modifications' class="buttonPostCreateAcccount">
                <a href="/accountCreate">Créer mon compte</a>
            </form>
        </main>
        <footer>
            <iframe src="/footer" width="100%" height="100"></iframe>
        </footer>
</body>
</html>