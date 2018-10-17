<?php
/*
    Sélection avec une requête SQL
*/

require_once "../includes/db.php"; // Inclusion des fonctions utilitaires
$data = $DB->getData("SELECT * FROM subject"); // Sélection des données

/* Affichage des données */
foreach($data as $el){ // Boucle foreach(array as element)
    // utf8_encode : afficher les caractères utilisant l'encodage UTF8
    var_dump(utf8_encode($el['name'])); // Affichage des informations sur une variable (type valeur);
    echo "<br/>";// Saut de ligne
}
