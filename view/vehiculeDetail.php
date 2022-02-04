<?php require_once('../controller/vehiculeController.php'); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails véhicule</title>
</head>

<body>

    <!-- AFFICHAGE DU TITRE DU VEHICULE DANS LE TITRE -->
    <?php foreach ($arrayDetailVehicule as $values) : ?>
        <h1>Détail du véhicule n° <?= $values['id_vehicule']; ?> :  <?= $values['titre']; ?> </h1>
    <?php endforeach; ?>
    <hr>

    <!-- AFFICHAGE DES INFOS DU VEHICULE DANS UN TABLEAU -->
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
        </tr>

        <?php foreach ($arrayDetailVehicule as $values) : ?>
            <tr class="vehicule">
                <td> <?= $values['id_vehicule']; ?> </td>
                <td> <?= $values['id_agence']; ?> </td>
                <td> <?= $values['titre']; ?> </td>
                <td> <?= $values['marque']; ?> </td>
                <td> <?= $values['modele']; ?> </td>
                <td> <?= $values['description']; ?> </td>
                <td> <img src="<?= $values['photo']; ?>" alt="<?= $values['titre']; ?>" height="80px" width="190px" /> </td>
                <td> <?= $values['prix_journalier']; ?> </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <hr>

    <!-- AFFICHAGE DU FORMULAIRE DE MODIFICATION DU VEHICULE -->
    <?php foreach ($arrayDetailVehicule as $values) : ?>
        <h1>Modifier le véhicule n° <?= $values['id_vehicule']; ?> :  <?= $values['titre']; ?> </h1>
    <?php endforeach; ?>
    <hr>

    <form method="POST">

        <input type="hidden" name="id_vehicule" value=<?= $values['id_vehicule']; ?>" >

        <label for="titre">Titre :</label> 
        <input type="text" name="titre" value="<?= $values['titre']; ?>"> <br>

        <label for="marque">Marque :</label> 
        <input type="text" name="marque" value= "<?= $values['marque']; ?>" > <br> 

        <label for="modele">Modèle :</label> 
        <input type="text" name="modele" value="<?= $values['modele']; ?>" > <br>

        <label for="description">Description :</label> <input type="text" name="description" value="<?= $values['description']; ?>"><br>

        <label for="photo">Photo :</label> <input type="text" name="photo" value="<?= $values['photo']; ?>"><br>

        <label for="prix_journalier">Prix journalier :</label> <input type="number" name="prix_journalier" value="<?= $values['prix_journalier']; ?>"><br>

        <button name="modifierVehicule">Valider la modification</button>

    </form>
    <hr>

    <a href="vehicule.php">Retour page véhicules</a>

</body>

</html>