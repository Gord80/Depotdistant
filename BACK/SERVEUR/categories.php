<?php

function getListeCategories(&$db,&$liste_categories) 
{
    $str="SELECT cat_id,cat_nom,cat_parent FROM categories
    ORDER BY cat_parent, cat_nom";
    $stmt=$db->query($str);
    $liste_categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return (!empty($liste_categories));
}

?>