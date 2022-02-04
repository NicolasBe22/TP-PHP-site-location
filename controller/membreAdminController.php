<?php

require_once('../config/bdd.php');
require_once('../template/header.inc.php'); // template header
ini_set('display_errors', '1');


// INSERTION NOUVEAU MEMBRE :

if(isset($_POST['ajouterMembre'])) 
{
    insertMembre($_POST, $pdo);
} 

function insertMembre($values, $sql)
{
    $request = $sql->prepare("INSERT INTO membre VALUES (NULL, :pseudo, :mdp, :nom, :prenom, :email, :civilite, :statut, now())");

    $request->bindparam(":pseudo", $values['pseudo'], PDO::PARAM_STR);
    $request->bindparam(":mdp", $values['mdp'], PDO::PARAM_STR);
    $request->bindparam(":nom", $values['nom'], PDO::PARAM_STR);
    $request->bindparam(":prenom", $values['prenom'], PDO::PARAM_STR);
    $request->bindparam(":email", $values['email'], PDO::PARAM_STR);
    $request->bindparam(":civilite", $values['civilite'], PDO::PARAM_STR);
    $request->bindparam(":statut", $values['statut'], PDO::PARAM_STR);

    $request->execute();
    
}


// AFFICHAGE DE TOUS LES MEMBRES :

function afficherMembres($sql)
{
    $request = $sql->prepare("SELECT * FROM membre");
    $request->execute();
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

$arrayMembres = afficherMembres($pdo);


// AFFICHAGE D'UN MEMBRE (DETAIL) :

if (isset($_GET['actions']))
{
    $actions = $_GET['actions'];
}else{
    $actions = NULL;
}


if($actions == 'detail')
{
    $arrayDetailMembre = detailler($_GET['id'], $pdo);
}

function detailler($id, $sql)
{
    
    $request = $sql->prepare("SELECT * FROM membre WHERE id_membre = $id");
    $request->execute();
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

// MODIFICATION D'UN MEMBRE :

if($actions == 'update')
{
    $arrayDetailMembre = detailler($_GET['id'], $pdo); // on récupère $arrayDetailMembre pour n'afficher qu'une seule agence
}

if(isset($_POST['modifier']))
{
    modifier($_POST, $pdo);
}

function modifier($values, $sql)
{

    $id = $values["id_membre"] ;
    $pseudo = $values["pseudo"];
    $mdp = $values["mdp"];
    $nom = $values["nom"];
    $prenom = $values["prenom"];
    $email = $values["email"];
    $civilite = $values["civilite"];
    $statut = $values["statut"];
    
    
    $request = $sql->prepare("UPDATE membre
    SET 
    id_membre = '$id',
    pseudo = '$pseudo',
    mdp = '$mdp',
    nom = '$nom',
    prenom = '$prenom',
    email = '$email',
    civilite = '$civilite',
    statut = '$statut'
    WHERE id_membre = '$id' ");
    
    $request->execute();
    header("Location: membreAdmin.php"); // redirection  
}


// SUPPRESSION D'UN MEMBRE :  

if (isset($_GET['actions']))
{
    $actions = $_GET['actions'];
}else{
    $actions = NULL;
}


if($actions == 'delete')
{
    supprimer($_GET['id'], $pdo);
}

function supprimer($id, $sql)  // $id et $sql sont des variables de réception, qui recoivent les valeurs de $_GET['id'] et de $pdo... $sql est un clone de $pdo (idem pour $_GET['id'] et $id)
{
    $request = $sql->prepare("DELETE FROM membre WHERE id_membre = $id");
    
    $request->execute();
    header("Location: membreAdmin.php"); // redirection vers même page pour "rafraichir" la page automatiquemen
}
