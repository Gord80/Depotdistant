<?php
require_once "./includes/header.inc.php";
require_once "./includes/pdo.inc.php";
require_once "./bdd_data/produits.php";

$db = getPDOConnexion();
$tab_details = [];
$message = "";
$succes_recuperation_details = getDetails($_GET['pro_id'],$tab_details,$db);
closePDOConnexion($db);

if($succes_recuperation_details)
  include_once "carte_produit.php";
else
{
  $message = "Impossible de récupérer les informations du produit !";
  include_once "erreur.php";
}

require_once "./includes/footer.inc.php";
?>