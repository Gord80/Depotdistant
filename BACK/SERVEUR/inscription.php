<?php 
    require_once "./includes/header.inc.php";
?>

<form action="../bdd_processing/add_script.php" method="post" enctype="multipart/form-data">
    <div class="card mb-3">
        <div class="card-body">
            <h3 class="Ajoutproduit"></h3>
            <p class="card-text">
                <label for="user-nom" class="form-label">Nom :</label> 
                <input type="text" id="user-nom" name="nom" class="form-control" value=""/>
            </p>
            <p id="erreur-nom"></p>           

            <p class="card-text">
                <label for="user-prenom" class="form-label">Prénom :</label> 
                <input type="text" id="user-prenom" name="prenom" class="form-control"></textarea>
            </p>
            <p id="erreur-prenom"></p>    
            <p class="card-text">
                <label for="user-mail" class="form-label">Adresse mail :</label> 
                <input type="text" id="user-mail" name="mail" class="form-control" value=""/>
            </p>
            <p id="erreur-mail"></p>
            <p class="card-text">
                <label for="user-login" class="form-label">Login :</label> 
                <input type="text" id="user-login" name="login" class="form-control" value=""/>
            </p>
            <p id="erreur-login"></p>
            <p class="card-text">
                <label for="user-mdp" class="form-label">Mot de passe :</label> 
                <input type="text" id="user-mdp" name="mdp" class="form-control" value=""/>
            </p>
            <p id="erreur-mdp"></p>
            <p class="card-text">
                <input type="submit" class="btn btn-primary" value="Envoyer" />
                <input type="reset" class="btn btn-secondary" value="Annuler" />
            </p> 
        </div>
    </div>
</form>
<script type="text/javascript" src="../js/add_form.js?v=2">
<?php require_once "./includes/footer.inc.php"; ?>