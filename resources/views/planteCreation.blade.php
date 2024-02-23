<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="css/planteCreation.css" rel="stylesheet" />

</head>
<body class="antialiased">
    <?php include '../resources/views/headerHome.blade.php'; ?>
    <main>
        <form method="POST" action="{{ route('planteCreation') }}" enctype="multipart/form-data">
            @csrf
            <div>
                <label>Nom</label><br />
                <input name="nom" placeholder="Nom" type="text" required /><br />
                <label>Image</label><br />
                <input name="image" type="file" accept="image/*" required /><br />
                <label>Description</label><br />
                <input name="description" placeholder="Description" type="text" required /><br />
                <label>Conseil_entretien</label><br />
                <input name="conseil_entretien" placeholder="Conseil sur l'entretien" type="text" required /><br />
            </div>
            <input type='submit' value='Enregistrer les modifications' class="buttonPostCreateAcccount" />
        </form>
    </main>
</body>
</html>
