<?php require_once('../controller/membreAdminController.php'); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails membre</title>
</head>

<body>
   
    <!-- AFFICHAGE id ET pseudo DU MEMBRE SELECTIONNE, DANS LE TITRE H1 -->
    <?php foreach ($arrayDetailMembre as $values) : ?>
        <h1>Détail du membre n° <?= $values['id_membre']; ?> :  <?= $values['pseudo']; ?> </h1>
    <?php endforeach; ?>
    <hr>
    

    <!-- AFFICHAGE DES INFOS DU MEMBRE DANS UN TABLEAU -->
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
       
        </tr>

        <?php foreach ($arrayDetailMembre as $values): ?>
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
            
        </tr>
        <?php endforeach; ?>

    </table>
    <hr>

    <!-- AFFICHAGE DU FORMULAIRE DE MODIFICATION DU MEMBRE -->
    <?php foreach ($arrayDetailMembre as $values) : ?>
        <h1>Modifier le membre n° <?= $values['id_membre']; ?> :  <?= $values['pseudo']; ?> </h1>
    <?php endforeach; ?>
    <hr>
    <form method="POST">

        <label for="id">Id membre :</label>
        <input type="text" name="id_membre" value=<?= $values['id_membre']; ?>> 
        <br>

        <label for="pseudo">pseudo :</label> 
        <input type="text" name="pseudo" value="<?= $values['pseudo']; ?>"> 
        <br>

        <label for="mdp">mdp :</label> 
        <input type="text" name="mdp" value="<?= $values['mdp']; ?>"> 
        <br>

        <label for="nom">nom :</label> 
        <input type="text" name="nom" value="<?= $values['nom']; ?>"> 
        <br>

        <label for="prenom">prenom :</label> 
        <input type="text" name="prenom" value="<?= $values['prenom']; ?>"> 
        <br>

        <label for="email">email :</label> 
        <input type="text" name="email" value="<?= $values['email']; ?>">
        <br>

        <label for="civilite">Civilité ('Mr', 'Mme'):</label> 
        <input type="text" name="civilite" value="<?= $values['civilite']; ?>">
        <br>

        <label for="statut">statut ('admin', 'membre') :</label> 
        <input type="text" name="statut" value="<?= $values['statut']; ?>">
        <br>

        <button name="modifier">Valider la modification</button>

    </form>
    <hr>

    <a href="membreAdmin.php">Retour page membres</a>

</body>

</html>