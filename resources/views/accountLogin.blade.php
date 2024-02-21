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
        <form method="POST" action="{{ route('sendLogin') }}">
            @csrf
            <div>
                <label>Identifiant</label> <br>
                <input name="identifiant" placeholder="Email ou nom d'utilisateur" type="text"> <br>
                <label>Mot de passe</label> <br>
                <input name="mot_de_passe" placeholder="Mot de passe" type="password"> <br>
            </div>
            <input type='submit' value='Se connecter' class="buttonPostCreateAcccount">
            <a href="{{ route('accountCreate') }}">Créer mon compte</a>
        </form>
    </main>

    @include('footer') <!-- Inclure le footer -->
</body>
</html>
