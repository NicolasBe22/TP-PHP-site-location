<?php require_once('../controller/commandeController.php'); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails commande</title>
</head>

<body>

<!-- AFFICHAGE DE LA VILLE DE LA COMMANDE DANS LE TITRE -->
    <?php foreach ($arrayDetailCommande as $values) : ?>
        <h1>Détail de la commande n° <?= $values['id_commande']; ?> </h1>
    <?php endforeach; ?>
    <hr>

    <!-- AFFICHAGE DES INFOS DE LA COMMANDE DANS UN TABLEAU -->
    <table>
        <tr>
            <th>Id commande</th>
            <th>Membre</th>
            <th>Véhicule</th>
            <th>Agence</th>
            <th>Date/heure de départ</th>
            <th>Date/heure de départ</th>
            <th>Prix total</th>
            <th>Date enregistrement commande</th>

        </tr>

        <?php foreach ($arrayDetailAgence as $values) : ?>
            <tr class="agence">
                <td> <?= $values['id_commande']; ?> </td>
                <td> <?= $values['id_membre']; ?> </td>
                <td> <?= $values['id_vehicule']; ?> </td>
                <td> <?= $values['id_agence']; ?> </td>
                <td> <?= $values['date_heure_depart']; ?> </td>
                <td> <?= $values['date_heure_fin']; ?> </td>
                <td> <?= $values['prix_total']; ?> </td>
                <td> <?= $values['date_enregistrement']; ?> </td>
                
            </tr>
        <?php endforeach; ?>
    </table>
    <hr>

    <!-- AFFICHAGE DU FORMULAIRE DE MODIFICATION D'UNE COMMANDE -->

    <?php foreach ($arrayDetailCommande as $values) : ?>
        <h1>Modifier la commande n°  <?= $values['id_commande']; ?> </h1>
    <?php endforeach; ?>
    <hr>
    <form method="POST">

        <input type="hidden" name="id_commande" value=<?= $values['id_commande']; ?>>

        <label for="id_membre">Membre :</label> 
        <input type="text" name="id_membre" value="<?= $values['id_membre']; ?>"> <br>

        <label for="id_vehicule">Véhicule :</label> 
        <input type="text" name="id_vehicule" value="<?= $values['id_vehicule']; ?>"> <br>

        <label for="id_agence">Agence :</label> 
        <input type="text" name="id_agence" value="<?= $values['id_agence']; ?>"> <br>

        <label for="date_heure_depart">date_heure_depart :</label> 
        <input type="text" name="date_heure_depart" value="<?= $values['date_heure_depart']; ?>"> <br>

        <label for="date_heure_fin">date_heure_fin :</label> 
        <input type="text" name="date_heure_fin" value="<?= $values['date_heure_fin']; ?>"> <br>

        <label for="prix_total">prix_total :</label> 
        <input type="number" name="prix_total" value="<?= $values['prix_total']; ?>"><br>


        <button name="modifierCommande">Valider la modification</button>

    </form>
    <hr>

    <a href="commande.php">Retour page commandes</a>




    </body>

</html>