<!-- resources/views/registration.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="css/accountCreate.css" rel="stylesheet" />

    <title>Créer ton Compte</title>
</head>
<body>
    <?php include '../resources/views/headerCreateAccount.blade.php'; ?>
    <main>
        <div>
            <form method="POST" action="{{ route('accountCreate') }}">
                @csrf
                <div>
                    <label>Nom</label><br />
                    <input name="nom" placeholder="Nom" type="text" /><br />
                    <label>Prenom</label><br />
                    <input name="prenom" placeholder="Prenom" type="text" /><br />
                    <label>Email</label><br />
                    <input name="email" placeholder="Adresse Email" type='mail' /><br />
                    <label>Mot de passe</label><br />
                    <input name="password" placeholder="Mot de passe" type="password" /><br />
                    <label>Confirmation du mot de passe</label><br />
                    <input name="password_confirmation" placeholder="Confirmation mot de passe" type="password" /><br />
                    <label>Date de naissance</label><br />
                    <input name="date_de_naissance" placeholder="Date de naissance" type="date" /><br />

                    <label>Numéro de téléphone</label><br />
                    <input name="telephone" placeholder="Numéro de téléphone" type="text" /><br />

                    <!-- Champs liés à l'adresse -->
                    <label>Ville</label><br />
                    <input name="ville" placeholder="Ville" type="text" /><br />
                    <label>Code postal</label><br />
                    <input name="code_postal" placeholder="Code postal" type="text" /><br />
                    <label>Nom de la voie</label><br />
                    <input name="nom_voie" placeholder="Nom de la voie" type="text" /><br />
                    <label>Numéro de la voie</label><br />
                    <input name="numero_voie" placeholder="Numéro de la voie" type="text" /><br />

                    <!-- Champs liés au rôle -->
                    <label>Rôle</label><br />
                    <select name="role" id="role">
                        <!-- Ajoutez ici les options pour les rôles -->
                        <option value="botaniste">Botaniste</option>
                        <option value="utilisateur">Utilisateur</option>
                    </select><br />

                    <!-- Lien vers la page CGU externe -->
                    <a href="/cgu" target="_blank">Consulter les CGU</a><br />

                    <!-- Case à cocher pour accepter les CGU -->
                    <label for="accepter_cgu">
                        J'accepte les CGU
                        <input type="checkbox" id="accepter_cgu" name="accepter_cgu" required />
                    </label>
                </div>

                <!-- Bouton pour soumettre le formulaire -->
                <input type='submit' value='Creer mon compte' class="buttonPostCreateAcccount" />
            </form>
        </div>
    </main>

    <!-- ... Votre code existant ... -->
</body>
</html>
