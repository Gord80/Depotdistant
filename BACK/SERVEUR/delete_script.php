<?php
require_once "./includes/pdo.inc.php";

$db = getPDOConnexion();
$succes_supprimer_produit = supprimerProduit($produit,$db);
closePDOConnexion($db);
?>