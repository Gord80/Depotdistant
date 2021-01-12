<?php
    
    function getDetails($pro_id = null,&$tab_details = [],&$db = null)
    {
        $sql_details =
        "
            SELECT pro_ref,pro_libelle,pro_description,pro_prix,pro_stock,pro_couleur,pro_photo,pro_d_ajout,pro_d_modif
            FROM produits
            WHERE pro_id = ?
        ";

        $pq_details = $db->prepare($sql_details);
        $pq_details->execute([$pro_id]);
        $retour_fetch = $pq_details->fetch(PDO::FETCH_ASSOC);

        if(is_array($retour_fetch))
            $tab_details = $retour_fetch;

        return (!empty($tab_details));
    }

    function getListeProduits(&$liste_produits,&$db)
    {
        $sql_liste_produits = 
        "
            SELECT pro_id,pro_libelle,pro_prix,pro_description
            FROM produits
            ORDER BY pro_id
        ";

        $pq_liste_produits = $db->prepare($sql_liste_produits);
        $pq_liste_produits->execute();

        $liste_produits = $pq_liste_produits->fetchAll(PDO::FETCH_ASSOC);

        return (!empty($liste_produits));
    }

    function creerProduit($produit_a_creer,&$id_produit,&$db)
    {
        $sql_creer_produit = 
        "
            INSERT INTO produits(pro_ref,pro_libelle,pro_description,pro_prix,pro_stock,pro_couleur,pro_d_ajout,pro_cat_id)
            VALUES(?,?,?,?,?,?,?,?)
        ";
        $pq_creer_produit = $db->prepare($sql_creer_produit);
        $produit_a_creer['date_ajout'] = date('Y-m-d');

        $valeurs_a_inserer = [
            $produit_a_creer['reference'],$produit_a_creer['libelle'],$produit_a_creer['description'],
            $produit_a_creer['prix'],$produit_a_creer['stock'],$produit_a_creer['couleur'],$produit_a_creer['date_ajout'],
            $produit_a_creer['categorie']
        ];
        $succes_creer_produit = ($pq_creer_produit->execute($valeurs_a_inserer));

        if($succes_creer_produit)
            $id_produit = $db->lastInsertId();

            return $succes_creer_produit;
    }

    function modifierProduit($produit_a_modifier,&$db)
    {
        $sql_modifier_produit =
        "
            UPDATE produits 
            SET pro_ref=?,
            pro_libelle=?,
            pro_description=?,
            pro_prix=?,
            pro_stock=?,
            pro_couleur=?,
            pro_d_ajout=?,
            pro_d_modif=?
            WHERE pro_id=?
        ";
        $pq_modifier_produit = $db->prepare($sql_modifier_produit);
        $produit_a_modifier['date_modifiation'] = date('Y-m-d H:i:s');

        $valeurs_a_modifier = [
            $produit_a_modifier['reference'],$produit_a_modifier['libelle'],$produit_a_modifier['description'],
            $produit_a_modifier['prix'],$produit_a_modifier['stock'],$produit_a_modifier['couleur'],$produit_a_modifier['date_ajout'],$produit_a_modifier['date_modification']
        ];
        $valeurs_requete_modification = $valeurs_a_modifier;
        $valeurs_requete_modification[] = $produit_a_modifier['id'];
        
        $succes_modifier_produit = ($pq_modifier_produit->execute($valeurs_requete_modification));

        return $succes_modifier_produit;

    }

    function supprimerProduit($pro_id,&$db)
    {
        $sql_supprimer_produit = 
        "
            DELETE FROM produits WHERE pro_id = ?
        ";

        $pq_supprimer_produit = $db->prepare($sql_supprimer_produit);
        $succes_supprimer_produit = ($pq_supprimer_produit->execute([$pro_id]) !== false);

        return $succes_supprimer_produit;
    }
?>