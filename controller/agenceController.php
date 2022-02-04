<?php

require_once('../config/bdd.php');
require_once('../template/header.inc.php'); // template header

ini_set('display_errors', '1');

// INSERTION NOUVELLE AGENCE :

if(isset($_POST['ajouterAgence'])) 
{
    insertAgence($_POST, $pdo);
}

function insertAgence($values, $sql)
{
    $request = $sql->prepare("INSERT INTO agence VALUES (NULL, :titre, :adresse, :ville, :cp, :description, :photo)");

    $request->bindparam(":titre", $values['titre'], PDO::PARAM_STR);
    $request->bindparam(":adresse", $values['adresse'], PDO::PARAM_STR);
    $request->bindparam(":ville", $values['ville'], PDO::PARAM_STR);
    $request->bindparam(":cp", $values['cp'], PDO::PARAM_STR);
    $request->bindparam(":description", $values['description'], PDO::PARAM_STR);
    $request->bindparam(":photo", $values['photo'], PDO::PARAM_STR);

    $request->execute();
    
}


// AFFICHAGE DE TOUTES LES AGENCES :

function afficherAgences($sql)
{
    $request = $sql->prepare("SELECT * FROM agence ORDER BY id_agence desc");
    $request->execute();
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

$arrayAgences = afficherAgences($pdo);


// AFFICHAGE D'UNE AGENCE (DETAIL) :

if (isset($_GET['actions']))
{
    $actions = $_GET['actions'];
}else{
    $actions = NULL;
}


if($actions == 'detail')
{
    $arrayDetailAgence = detailler($_GET['id'], $pdo);
}

function detailler($id, $sql)
{
    
    $request = $sql->prepare("SELECT * FROM agence WHERE id_agence = $id");
    $request->execute();
    return $request->fetchAll(PDO::FETCH_ASSOC);
}


// MODIFICATION D'UNE AGENCE :

if($actions == 'update')
{
    $arrayDetailAgence = detailler($_GET['id'], $pdo); // on récupère $arrayDetailAgence pour n'afficher qu'une seule agence
}

if(isset($_POST['modifier']))
{
    modifier($_POST, $pdo);
}

function modifier($values, $sql)
{

    $id = $values["id_agence"] ;
    $titre = $values["titre"];
    $adresse = $values["adresse"];
    $ville = $values["ville"];
    $cp = $values["cp"];
    $descr = $values["description"];
    $photo = $values["photo"];
    
    
    $request = $sql->prepare("UPDATE agence
    SET 
    id_agence = '$id',
    titre = '$titre',
    adresse = '$adresse',
    ville = '$ville',
    cp = '$cp',
    description = '$descr',
    photo = '$photo'
    WHERE id_agence = '$id' ");
    
    $request->execute();
    header("Location: agence.php"); // redirection 
}


// SUPPRESSION D'UNE AGENCE :

if (isset($_GET['actions']))
{
    $actions = $_GET['actions'];
}else{
    $actions = NULL;
}

// OU $actions = (isset($_GET['actions'])) ? $_GET['actions'] : NULL; // ternaire


if($actions == 'delete')
{
    supprimer($_GET['id'], $pdo);
}

function supprimer($id, $sql)  // $id et $sql sont des variables de réception, qui recoivent les valeurs de $_GET['id'] et de $pdo... $sql est un clone de $pdo (idem pour $_GET['id'] et $id)
{
    $request = $sql->prepare("DELETE FROM agence WHERE id_agence = $id");
    
    $request->execute();
    header("Location: agence.php"); // redirection vers même page pour "rafraichir" la page automatiquement
    
}




?>