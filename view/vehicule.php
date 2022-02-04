<?php require_once('../controller/vehiculeController.php'); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Véhicules</title>
</head>

<body>
    <!-- FILTRE POUR SELECTION DES VEHICULES PAR AGENCE -->
    <form action="" method="post">
        <select name="selectAgence" id="selectAgence">
            <option value="">Toutes les agences</option>
            <?php foreach ($arrayAgences as $values) : ?>

                <option value="<?= $values['id_agence']; ?>"><?= $values['titre']; ?></option>

            <?php endforeach; ?>
        </select>

        <button name="choisirAgence">Valider</button>
    </form>


    <!-- FORMULAIRE DE SAISIE AJOUT DE VEHICULES -->
    <h1>Ajouter un véhicule :</h1>
    <form method="POST">

        <label for="agence">Agence de rattachement :</label> 
        <select name="id_agence" id="id_agence">
            <option value="">Choisir une agence</option>

            <?php foreach ($arrayAgences as $values) : ?>

                <option value="<?= $values['id_agence']; ?>"><?= $values['titre']; ?></option>

            <?php endforeach; ?>
        </select><br>

        <label for="titre">Titre :</label> <input type="text" placeholder="Saisir le titre du véhicule" name="titre"><br>

        <label for="marque">Marque :</label> <input type="text" placeholder="Saisir la marque" name="marque"><br>

        <label for="modele">Modèle :</label> <input type="text" placeholder="Saisir le modèle" name="modele"><br>

        <label for="description">Description :</label> <input type="text" placeholder="Saisir la description" name="description"><br>

        <label for="photo">Photo :</label> <input type="text" placeholder="Saisir URL de la photo" name="photo"><br>

        <label for="prix">Prix journalier :</label> <input type="number" placeholder="Saisir le prix journalier" name="prix_journalier"><br>

        <button name="ajouterVehicule">Ajouter</button>

    </form>

    <!-- AFFICHAGE DES VEHICULES DANS UN TABLEAU -->
    <h1>Nos voitures :</h1>
    <hr>
    <table>
        <tr>
            <th>Id. du véhicule</th>
            <th>Agence</th>
            <th>Titre</th>
            <th>Marque</th>
            <th>Modèle</th>
            <th>Description</th>
            <th>Photo</th>
            <th>Prix journalier</th>
            <th>Actions</th>
        </tr>

        <?php foreach ($arrayVehicules as $values) : ?>
            <tr class="vehicule">
                <td> <?= $values['id_vehicule']; ?> </td>
                <td> <?= $values['agence_titre']; ?> </td>
                <td> <?= $values['titre']; ?> </td>
                <td> <?= $values['marque']; ?> </td>
                <td> <?= $values['modele']; ?> </td>
                <td> <?= $values['description']; ?> </td>
                <td> <img src="<?= $values['photo']; ?>" alt="<?= $values['titre']; ?>" height="80px" width="150px" /> </td>
                <td> <?= $values['prix_journalier']; ?> </td>
                <td>
                    <a href="vehiculeDetail.php?actions=detail&id=<?= $values['id_vehicule']; ?> ">Détail</a>
                    <a href="?actions=delete&id=<?= $values['id_vehicule']; ?> ">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>