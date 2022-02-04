<?php

require_once('../config/bdd.php');
require_once('../template/header.inc.php'); // template header

ini_set('display_errors', '1');


// INSERTION NOUVELLE COMMANDE :   ajouterCommande

if(isset($_POST['ajouterCommande'])) 
{
    insertCommande($_POST, $pdo);
}

function insertCommande($values, $sql)
{
    $request = $sql->prepare("INSERT INTO commande VALUES (NULL, :id_membre, :id_vehicule, :id_agence, :date_heure_depart, :date_heure_fin, :prix_total, now())");

    $request->bindparam(":id_membre", $values['id_membre'], PDO::PARAM_STR);
    $request->bindparam(":id_vehicule", $values['id_vehicule'], PDO::PARAM_STR);
    $request->bindparam(":id_agence", $values['id_agence'], PDO::PARAM_STR);
    $request->bindparam(":date_heure_depart", $values['date_heure_depart'], PDO::PARAM_STR);
    $request->bindparam(":date_heure_fin", $values['date_heure_fin'], PDO::PARAM_STR);
    $request->bindparam(":prix_total", $values['prix_total'], PDO::PARAM_STR);

    $request->execute();
    
}


// AFFICHAGE DE TOUTES LES COMMANDES :

function afficherCommandes($sql)
{
    $request = $sql->prepare("SELECT * FROM commande");
    $request->execute();
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

$arrayCommandes = afficherCommandes($pdo);


// AFFICHAGE D'UNE COMMANDE (DETAIL) :

if (isset($_GET['actions']))
{
    $actions = $_GET['actions'];
}else{
    $actions = NULL;
}

if($actions == 'detail')
{
    $arrayDetailAgence = detaillerCommande($_GET['id'], $pdo);
}

function detaillerCommande($id, $sql)
{
    
    $request = $sql->prepare("SELECT * FROM commande WHERE id_commande = $id");
    $request->execute();
    return $request->fetchAll(PDO::FETCH_ASSOC);
}


// MODIFICATION D'UNE AGENCE : 

if($actions == 'detail')
{
    $arrayDetailCommande = detaillerCommande($_GET['id'], $pdo); // on récupère $arrayDetailAgence pour n'afficher qu'une seule agence
}

if(isset($_POST['modifierCommande']))
{
    modifierCommande($_POST, $pdo);
}

function modifierCommande($values, $sql)
{

    $id = $values["id_commande"] ;
    $membre = $values["id_membre"];
    $vehicule = $values["id_vehicule"];
    $agence = $values["id_agence"];
    $dateDepart = $values["date_heure_depart"];
    $dateFin = $values["date_heure_fin"];
    $prixTotal = $values["prix_total"];
    
    
    $request = $sql->prepare("UPDATE commande
    SET 
    id_commande = '$id',
    id_membre = '$membre',
    id_vehicule = '$vehicule',
    id_agence = '$agence',
    date_heure_depart = '$dateDepart',
    date_heure_fin = '$dateFin',
    prix_total = '$prixTotal'
    WHERE id_commande = '$id' ");
    
    $request->execute();
    header("Location: commande.php"); // redirection 
}


// SUPPRESSION D'UNE AGENCE :

if (isset($_GET['actions']))
{
    $actions = $_GET['actions'];
}else{
    $actions = NULL;
}


if($actions == 'delete')
{
    supprimerCommande($_GET['id'], $pdo);
}

function supprimerCommande($id, $sql)  // $id et $sql sont des variables de réception, qui recoivent les valeurs de $_GET['id'] et de $pdo... $sql est un clone de $pdo (idem pour $_GET['id'] et $id)
{
    $request = $sql->prepare("DELETE FROM commande WHERE id_commande = $id");
    
    $request->execute();
    header("Location: commande.php"); // redirection vers même page pour "rafraichir" la page automatiquement
    
}