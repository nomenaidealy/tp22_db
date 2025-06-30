<?php 
    $mode = $_GET['mode'];
    $departement = $_GET['departement'];
    $mot = $_GET['recherche'];
    $min = $_GET['min'];
    $max = $_GET['max'];
    $resultat =  select_recherche($mode , $departement , $mot , $min , $max, $age)
?>