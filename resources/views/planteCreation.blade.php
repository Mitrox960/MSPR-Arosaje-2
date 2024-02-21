<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/accountCreateOrConnexion.css" rel="stylesheet">

</head>
    <body class="antialiased">
        <?php include '../resources/views/headerHome.blade.php';?>
        <?php include '../resources/views/footer.blade.php';?>
        <main>
        <form method="POST" action="{{ route('planteCreation') }}">
            @csrf
                <div>
                    <label>Nom</label><br />
                    <input name="nom" placeholder="Nom" type="text" /><br />
                    <label>Image</label><br />
                    <input name="image" placeholder="Prenom" type="text" /><br />
                    <label>Description</label><br />
                    <input name="description" placeholder="Adresse Email" type='mail' /><br />
                    <label>Conseil_entretien</label><br />
                    <input name="conseil_entretien" placeholder="Conseil sur l'entretien" type="password" /><br />
                </div>
                <input type='submit' value='Enregistrer les modifications' class="buttonPostCreateAcccount" />
            </form>
        </main>
        
    </body>
</html>
