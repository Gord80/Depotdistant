<?php
require_once "../includes/pdo.inc.php";
require_once "../bdd_data/produits.php";
require_once "../includes/common.php";

$message = "";
$champs_requis = ['reference','libelle','categorie','prix','stock'];
$nombre_champs_requis = count($champs_requis); 
$champs_avec_valeurs = array_keys_associated_values($_POST);
$fusion = array_intersect($champs_requis,$champs_avec_valeurs);
$nombre_cles_fusionnees = count($fusion);

if($nombre_cles_fusionnees == $nombre_champs_requis)
{
    $db = getPDOConnexion();
    $id_produit = null;
    $succes_creer_produit = creerProduit($_POST,$id_produit,$db);
    $types_mime_autorises = ["image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff"];
    $extension = substr(strrchr($_FILES['image']['name'], '.'), 1);
    $nom_fichier_uploade = $id_produit.".".$extension;
    $succes_upload_fichier = uploadFichier($types_mime_autorises,$_FILES['image'],"../images",$nom_fichier_uploade,$message);
    closePDOConnexion($db);
}
?>