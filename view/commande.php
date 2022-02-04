<?php require_once('../controller/commandeController.php'); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commandes</title>
</head>

<body>

    <!-- FORMULAIRE DE SAISIE AJOUT D'UNE COMMANDE -->
    <h1>Ajouter une commande :</h1>

    <form method="POST">

        <label for="titre">id membre :</label> 
        <input type="text" placeholder="Saisir id membre" name="id_membre"><br>

        <label for="titre">id vehicule :</label> 
        <input type="text" placeholder="Saisir id vehicule" name="id_vehicule"><br>
        
        <label for="titre">id agence :</label> 
        <input type="text" placeholder="Saisir id agence" name="id_agence"><br>

        <label for="date_heure_depart">date_heure_depart :</label> 
        <input type="date" placeholder="Saisir date/heure depart" name="date_heure_depart"><br>

        <label for="date_heure_fin">date_heure_fin :</label> 
        <input type="date" placeholder="Saisir date/heure fin" name="date_heure_fin"><br>

        <label for="prix_total">Prix total :</label> 
        <input type="number" placeholder="recuperer SUM dans un /****** ALIAS ********/" name="prix_total"><br>   

        <button name="ajouterCommande">Ajouter</button>

    </form>



    <!-- AFFICHAGE DES COMMANDES DANS UN TABLEAU -->
    <table>
        <tr>
            <th>Id commande</th>
            <th>Membre (statut + nom/prenom + email depuis la base membre</th>
            <th>Vehicule (id.vehicule + titre.vehicule depuis la base vehicule</th>
            <th>Agence (id.agence + titre.agence depuis la base agence</th>
            <th>Date/heure de depart</th>
            <th>Date/heure de retour</th>
            <th>Prix total (faire un sum() et alias as)</th>
            <th>Date/heure d'enregistrement commande</th>
            <th>Actions</th>
        </tr>

        <!-- Boucle foreach pour afficher toutes les commandes enregistrées -->

        <?php foreach ($arrayCommandes as $values): ?>
        <tr class="commande">
            <td><?= $values['id_commande']; ?></td>
            <td><?= $values['id_membre']; ?></td>
            <td><?= $values['id_vehicule']; ?></td>
            <td><?= $values['id_agence']; ?></td>
            <td><?= $values['date_heure_depart']; ?></td>
            <td><?= $values['date_heure_fin']; ?></td>
            <td><?= $values['prix_total']; ?></td>  <!-- ajouter le alias de prix total -->
            <td><?= $values['date_enregistrement']; ?></td>
            <td>
                <a href="commandeDetail.php?actions=detail&id=<?= $values['id_commande']; ?> ">Détail</a>
                <a href="?actions=delete&id=<?= $values['id_commande']; ?> ">Supprimer</a>
            </td>  
        </tr>      
        <?php endforeach; ?>

    </table>

</body>

</html>