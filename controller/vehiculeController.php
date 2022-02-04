<?php

require_once('../config/bdd.php');
require_once('../template/header.inc.php'); // template header

ini_set('display_errors', '1');

// INSERTION NOUVEAU VEHICULE :

if(isset($_POST['ajouterVehicule'])) 
{   
    insertVehicule($_POST, $pdo);
}

function insertVehicule($values, $sql)
{
    $request = $sql->prepare("INSERT INTO vehicule VALUES (NULL, :id_agence, :titre, :marque, :modele, :description, :photo, :prix_journalier)");

    $request->bindparam(":id_agence", $values['id_agence'], PDO::PARAM_STR);
    $request->bindparam(":titre", $values['titre'], PDO::PARAM_STR);
    $request->bindparam(":marque", $values['marque'], PDO::PARAM_STR);
    $request->bindparam(":modele", $values['modele'], PDO::PARAM_STR);
    $request->bindparam(":description", $values['description'], PDO::PARAM_STR);
    $request->bindparam(":photo", $values['photo'], PDO::PARAM_STR);
    $request->bindparam(":prix_journalier", $values['prix_journalier'], PDO::PARAM_INT);

    $request->execute();
    
}


// AFFICHAGE DE TOUS LES VEHICULES :

function afficherAgences($sql)
{
    $request = $sql->prepare("SELECT * FROM agence");
    $request->execute();
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

$arrayAgences = afficherAgences($pdo);

function afficherVehicule($sql)
{
    $request = $sql->prepare("SELECT vehicule.*, agence.id_agence as agence_id, agence.titre as agence_titre
    FROM vehicule, agence
    WHERE agence.id_agence = vehicule.id_agence
    ORDER BY id_vehicule desc");
    $request->execute();
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

$arrayVehicules = afficherVehicule($pdo);


// AFFICHAGE D'UN VEHICULE :

if (isset($_GET['actions']))
{
    $actions = $_GET['actions'];
}else{
    $actions = NULL;
}


if($actions == 'detail')
{
    $arrayDetailVehicule = detaillerVehicule($_GET['id'], $pdo);
}

function detaillerVehicule($id, $sql)
{
    
    $request = $sql->prepare("SELECT * FROM vehicule WHERE id_vehicule = $id");
    $request->execute();
    return $request->fetchAll(PDO::FETCH_ASSOC);
}


// MODIFICATION D'UN VEHICULE :

if($actions == 'update')
{
    $arrayDetailVehicule = detaillerVehicule($_GET['id'], $pdo); // on récupère $arrayDetailVehicule pour n'afficher qu'un seul vehicule
}

if(isset($_POST['modifierVehicule']))
{
    modifierVehicule($_POST, $pdo);
}

function modifierVehicule($values, $sql)
{

    $id = $values["id_vehicule"];
    $idAgence = $values["id_agence"];
    $titre = $values["titre"];
    $marque = $values["marque"];
    $modele = $values["modele"];
    $description = $values["description"];
    $photo = $values["photo"];
    $prixJour = $values["prix_journalier"];

    
    
    $request = $sql->prepare("UPDATE vehicule
    SET 
    id_vehicule = '$id',
    id_agence = '$idAgence',
    titre = '$titre',
    marque = '$marque',
    modele = '$modele',
    description = '$description',
    photo = '$photo',
    prix_journalier = '$prixJour'
    WHERE id_vehicule = '$id' ");
    
    $request->execute();  
    header("Location: vehicule.php"); // redirection 
}


// SUPPRESSION D'UN VEHICULE :

if (isset($_GET['actions']))
{
    $actions = $_GET['actions'];
}else{
    $actions = NULL;
}

// OU $actions = (isset($_GET['actions'])) ? $_GET['actions'] : NULL; // ternaire


if($actions == 'delete')
{
    supprimerVehicule($_GET['id'], $pdo);
}

function supprimerVehicule($id, $sql)  // $id et $sql sont des variables de réception, qui recoivent les valeurs de $_GET['id'] et de $pdo... $sql est un clone de $pdo (idem pour $_GET['id'] et $id)
{
    $request = $sql->prepare("DELETE FROM vehicule WHERE id_vehicule = $id");
    
    $request->execute();
    header("Location: vehicule.php"); // redirection vers même page pour "rafraichir" la page automatiquement
}



?>