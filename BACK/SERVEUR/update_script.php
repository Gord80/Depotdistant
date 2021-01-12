<?php
require_once "./includes/pdo.inc.php";

$db = getPDOConnexion();
$succes_modifier_produit = modifierProduit($produit,$db);
closePDOConnexion($db);
?>