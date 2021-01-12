<?php
require_once "./includes/header.inc.php";
require_once "./includes/pdo.inc.php";
require_once "./bdd_data/produits.php";

$db = getPDOConnexion();
$liste_produits = [];
$succes_liste_produits = getListeProduits($liste_produits,$db);
?>
<div class="container">
<?php
    $indice_produit = 1;
    $row_start = "<div class='row'>";
    $row_end = "</div>";
    $str_grid = $row_start;
    
    foreach($liste_produits as $produit)
    {
        
        $str_grid .= "<div class='col border border-primary rounded m-1'>";
        $str_grid .= "<p><h3>{$produit['pro_libelle']}</h3></p>";
        $str_grid .= "<div class='col mb-3'>{$produit['pro_description']}</div>";
        $str_grid .= "<p><b>Prix</b> : {$produit['pro_prix']}</p>";
        $str_grid .= "<p><a href='detail.php?pro_id={$produit['pro_id']}' class='btn btn-primary'>Voir détails</a></p>"; 
        $str_grid .= "</div>";

        if(($indice_produit % 4) == 0)
        {
            $str_grid .= $row_end.$row_start;
        }
        $indice_produit++;
    }
    $str_grid.=$row_end;

    echo $str_grid;
?>
</div>
<?php
require_once "./includes/footer.inc.php";
?>