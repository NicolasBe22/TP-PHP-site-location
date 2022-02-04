<?php require_once('../controller/agenceController.php'); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agences</title>
</head>

<body>
    <!-- FORMULAIRE DE SAISIE AJOUT D'AGENCE -->
    <h1>Ajouter une nouvelle agence :</h1>
    <form method="POST">

        <label for="titre">Nom de l'agence :</label> 
        <input type="text" placeholder="Saisir le nom de l'agence" name="titre"><br>

        <label for="adresse">Adresse :</label> 
        <input type="text" placeholder="Saisir l'adresse" name="adresse"><br>

        <label for="ville">Ville :</label> 
        <input type="text" placeholder="Saisir la ville" name="ville"><br>

        <label for="cp">Code postal :</label> 
        <input type="text" placeholder="Saisir le CP" name="cp"><br>

        <label for="description">Description :</label> 
        <input type="text" placeholder="Saisir la description" name="description"><br>

        <label for="photo">Photo :</label> 
        <input type="text" placeholder="Saisir URL de la photo" name="photo"><br>

        <button name="ajouterAgence">Ajouter</button>

    </form>

    <h1>Nos agences :</h1>
    <hr>

<!-- AFFICHAGE DES AGENCES DANS UN TABLEAU -->
    <table>
        <tr>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Ville</th>
            <th>CP</th>
            <th>Description</th>
            <th>Photo</th>
            <th>Actions</th>
        </tr>

        <?php foreach ($arrayAgences as $values): ?>
        <tr class="agence">
            
            
            <td> <?= $values['titre']; ?> </td>
            <td> <?= $values['adresse']; ?> </td>
            <td> <?= $values['ville']; ?> </td>
            <td> <?= $values['cp']; ?> </td>
            <td> <?= $values['description']; ?> </td>
            <td> <img src="<?= $values['photo']; ?>" alt="<?= $values['titre']; ?>" height="80px" width="190px"/> </td>
            <td>
                <a href="agenceDetail.php?actions=detail&id=<?= $values['id_agence']; ?> ">Détail</a>
                <a href="?actions=delete&id=<?= $values['id_agence']; ?> ">Supprimer</a>
            </td> 
        </tr>
        <?php endforeach; ?>

    </table>

</body>

</html>