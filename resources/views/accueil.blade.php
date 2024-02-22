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
        <!-- Ajoutez vos boutons ici -->
        <a href="{{ route('showPlanteCreationForm') }}"><button>Aller vers Plante</button></a>
        <a href="{{ route('user.plantes') }}"><button>Aller vers Mes Plantes</button></a>
        <a href="{{ route('allPlants') }}"><button>Toutes les plantes</button></a>

    </main>
</body>
</html>
