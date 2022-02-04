<?php require_once('../controller/agenceController.php'); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails agence</title>
</head>

<body>

    <!-- AFFICHAGE DE LA VILLE DE L'AGENCE DANS LE TITRE -->
    <?php foreach ($arrayDetailAgence as $values) : ?>
        <h1>Détail de l'agence de <?= $values['ville']; ?> </h1>
    <?php endforeach; ?>
    <hr>

    <!-- AFFICHAGE DES INFOS DE L'AGENCE DANS UN TABLEAU -->
    <table>
        <tr>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Ville</th>
            <th>CP</th>
            <th>Description</th>
            <th>Photo</th>
        </tr>

        <?php foreach ($arrayDetailAgence as $values) : ?>
            <tr class="agence">
                <td> <?= $values['titre']; ?> </td>
                <td> <?= $values['adresse']; ?> </td>
                <td> <?= $values['ville']; ?> </td>
                <td> <?= $values['cp']; ?> </td>
                <td> <?= $values['description']; ?> </td>
                <td> <img src="<?= $values['photo']; ?>" alt="<?= $values['titre']; ?>" height="150px" width="290px" /> </td>
                <td>
            </tr>
        <?php endforeach; ?>
    </table>
    <hr>

    <!-- AFFICHAGE DU FORMULAIRE DE MODIFICATION DE L'AGENCE -->
    <?php foreach ($arrayDetailAgence as $values) : ?>
        <h1>Modifier l'agence de <?= $values['ville']; ?> </h1>
    <?php endforeach; ?>
    <hr>
    <form method="POST">

        <input type="hidden" name="id_agence" value=<?= $values['id_agence']; ?>>

        <label for="titre">Nom de l'agence :</label> 
        <input type="text" name="titre" value="<?= $values['titre']; ?>"> <br>

        <label for="adresse">Adresse :</label> 
        <input type="text" name="adresse" value="<?= $values['adresse']; ?>"> <br>

        <label for="ville">Ville :</label> 
        <input type="text" name="ville" value="<?= $values['ville']; ?>"> <br>

        <label for="cp">Code postal :</label> 
        <input type="text" name="cp" value="<?= $values['cp']; ?>"><br>

        <label for="description">Description :</label> 
        <input type="text" name="description" value="<?= $values['description']; ?>"><br>

        <label for="photo">Photo :</label> 
        <input type="text" name="photo" value="<?= $values['photo']; ?>"><br>

        <button name="modifier">Valider la modification</button>

    </form>
    <hr>

    <a href="agence.php">Retour page agences</a>

</body>

</html>