<?php require_once('../controller/membreAdminController.php'); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membres</title>
</head>

<body>
    <!-- FORMULAIRE DE SAISIE D'AJOUT D'UN MEMBRE PAR ADMIN -->
    <h1>Ajouter un nouveau membre :</h1>
    <form method="POST">

        <label for="pseudo">Pseudo :</label> 
        <input type="text" placeholder="Saisir le pseudo" name="pseudo"><br>

        <label for="mdp">Mot de passe :</label> 
        <input type="password" placeholder="Saisir le mot de passe provisoire" name="mdp"><br>

        <label for="nom">Nom :</label> 
        <input type="text" placeholder="Saisir le nom" name="nom"><br>

        <label for="prenom">Prénom :</label> 
        <input type="text" placeholder="Saisir le prénom" name="prenom"><br>

        <label for="email">E-mail :</label> 
        <input type="text" placeholder="Saisir le mail" name="email"><br>

        <label for="civilite">Civilité :</label> 
        <select name="civilite" id="civilite">
            <option value="">Choix civilité</option>
            <option value="Mr">Monsieur</option>
            <option value="Mme">Madame</option>
        </select><br>

        <label for="statut">Statut :</label> 
        <select name="statut" id="statut">
            <option value="">Choix statut</option>
            <option value="admin">Admin</option>
            <option value="membre">Membre</option>
        </select><br>

        <button name="ajouterMembre">Ajouter</button>

    </form>

    <h1>Tous nos membres :</h1>
    <hr>

<!-- AFFICHAGE DES MEMBRES DANS UN TABLEAU (sans le champ mdp) -->
    <table>
        <tr>
            <th>Id membre</th>
            <th>Pseudo</th>
            <th>mdp</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Civilité</th>
            <th>Statut</th>
            <th>Date d'enregistrement</th>
            <th>Actions</th>
        </tr>

        <?php foreach ($arrayMembres as $values): ?>
        <tr class="tableau">    
            <td> <?= $values['id_membre']; ?> </td>     
            <td> <?= $values['pseudo']; ?> </td>
            <td> <?= $values['mdp']; ?> </td>
            <td> <?= $values['nom']; ?> </td>
            <td> <?= $values['prenom']; ?> </td>
            <td> <?= $values['email']; ?> </td>
            <td> <?= $values['civilite']; ?> </td>
            <td> <?= $values['statut']; ?> </td>
            <td> <?= $values['date_enregistrement']; ?> </td>
            <td>
                <a href="membreAdminDetail.php?actions=detail&id=<?= $values['id_membre']; ?> ">Détail</a>
                <a href="?actions=delete&id=<?= $values['id_membre']; ?> ">Supprimer</a>
            </td> 
        </tr>
        <?php endforeach; ?>

    </table>

</body>

</html>