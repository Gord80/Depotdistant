<div class="card mb-3">

  <!-- textarea class= "form-control" aria-label="description produit"
       <img src="..." class="card-img-top" alt="..."> -->
  <div class="card-body">
    <h3 class="card-title"><?= $tab_details['pro_libelle'] ?></h3>
    <p class="card-text">
        <label for="produit-description" class="form-label">Description :</label> 
        <textarea id="produit-description" class="form-control"><?= $tab_details['pro_description'] ?></textarea>
    </p>
    <p class="card-text">
        <label for="produit-reference" class="form-label">Référence :</label> 
        <input type="text" id="produit-reference" class="form-control" value="<?= $tab_details['pro_ref'] ?>"/>
    </p>
    <p class="card-text">
        <label for="produit-prix" class="form-label">Prix :</label> 
        <input type="text" id="produit-prix" class="form-control" value="<?= $tab_details['pro_prix'] ?>"/>
    </p>
    <p class="card-text">
        <label for="produit-stock" class="form-label">Stock :</label> 
        <input type="text" id="produit-stock" class="form-control" value="<?= $tab_details['pro_stock'] ?>"/>
    </p>
    <p class="card-text">
        <label for="produit-couleur" class="form-label">Couleur :</label> 
        <input type="text" id="produit-couleur" class="form-control" value="<?= $tab_details['pro_couleur'] ?>"/>
    </p>
    <p class="card-text">
        <label for="produit-date-ajout" class="form-label">Date d'ajout :</label> 
        <input type="text" id="produit-date-ajout" class="form-control" value="<?= date('d/m/Y',strtotime($tab_details['pro_d_ajout'])) ?>"/>
    </p>
    <p class="card-text">
        <label for="produit-date-modification" class="form-label">Date de modification :</label> 
        <input type="text" id="produit-date-modification" class="form-control" value="<?= $tab_details['pro_d_modif'] ?>" />
    </p>
    <p class="card-text"><a href="index.php" class="btn btn-primary">Retour</a></p>
  </div>
  
</div>