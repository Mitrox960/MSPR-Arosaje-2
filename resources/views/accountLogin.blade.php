<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
    <link href="css/accountLogin.css" rel="stylesheet">
</head>
<body>  
        <?php include '../resources/views/headerHome.blade.php';?>
        <?php include '../resources/views/footer.blade.php';?>
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
        
</body>
</html>