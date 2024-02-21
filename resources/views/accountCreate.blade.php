<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/accountCreate.css" rel="stylesheet">

    <title>Créer ton Compte</title>
</head>
<body>
        <?php include '../resources/views/headerHome.blade.php';?>
        <?php include '../resources/views/footer.blade.php';?>
        <main>
            <div>
            <form type="POST">
                <div>
                    <label>Nom</label> <br> 
                <input placeholder="Nom"type="text"> <br>
                <label>Prenom</label> <br>
                <input placeholder="Prenom" type="text">  <br>
                <label>Email</label> <br>
                <input placeholder="Adresse Email" type='mail'> <br> 
                <label>Mot de passe</label> <br>
                <input placeholder="Mot de passe" type="text">  <br>
                <label>Confirmation du mot de passe</label> <br>
                <input placeholder="Confirmation mot de passe" type="text"> <br>
                </div>
                <input type='button' value='Enregistrer les modifications' class="buttonPostCreateAcccount">
                <a href="/accountLogin">Se connecter</a>
            </form>
            </div>
        </main>
        
</body>
</html>