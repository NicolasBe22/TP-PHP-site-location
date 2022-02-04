<?php

ini_set('display_errors', '1');

//////////////////////////////////
//***** CREATION DU HEADER *****//
//////////////////////////////////

echo "HEADER ADMIN <br>";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

        <!-- Passage de l'élément ul en navbar-nav soit flex-direction: column -->
        <!-- <ul class="nav justify-content-center"> -->
        <ul class="navbar-nav ">

            <li class="nav-item"><a class="nav-link" href="agence.php">GESTION AGENCE</a></li>

    <!--  //**** POUR UN SOUS MENU DANS <li> ****/
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Qui sommes-nous</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Notre histoire</a>
                    <a class="dropdown-item" href="#">Présentation</a>
                    <a class="dropdown-item" href="#">L'équipe</a>
                </div>
            </li> 
    -->

            <li class="nav-item"><a class="nav-link" href="vehicule.php">GESTION VEHICULE</a></li>

            <li class="nav-item"><a class="nav-link" href="membreAdmin.php">GESTION MEMBRE</a></li>

            <li class="nav-item"><a class="nav-link" href="commande.php">GESTION COMMANDE</a></li>
            
        </ul>

        </nav>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>