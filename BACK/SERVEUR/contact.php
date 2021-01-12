<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Jarditoucontact.com</title>
</head>
<body>
<?php

   try 
   {        
$db = new PDO('mysql:host=localhost;charset=utf8;dbname=jarditou', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   } catch (Exception $e) {
      echo "Erreur : " . $e->getMessage() . "<br>";
      echo "N° : " . $e->getCode();
      die("Fin du script");
}
	

require_once('Regex.php');

if (isset($_POST["Envoyer"]) && $_POST["Envoyer"] == 'Envoyer')
 { 
   echo('formulaire envoyé');
 $res = verif($_POST);
 //echo("\$res vaut : ");
 //var_dump($res);
  if(empty($res["Erreur"])){
   // echo("Pas d'erreurs dans l'envoi du formulaire");
    $donnees_formulaires="";
    foreach($res["Resultat"] as $cle=>$valeur_saisie)
    {
      echo("<p>$cle vaut : $valeur_saisie </p>");
    }
  }
}

?>
   <!--logo-->
<div class="container-fluid"> 
<div class="row align-items-center">
                <div class="col-sm-3">
            <div class="d-none d-sm-block">
                <img src="jarditou_logo.jpg" class="img-fluid"></img>
        </div>
    </div>
           <!-- titre--> 
                        <div class="col-sm-9">
                            <div class="d-none d-sm-block">
            <h2 class="text-right"> Tout le jardin</h2>
        </div>
    </div>
</div>

            
            
            
           <!--accueil tableau contact-->
            
     <!--1ere partie navbar-->
     </div>
    <div class="row-align-items-center">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-flower1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M6.174 1.184a2 2 0 0 1 3.652 0A2 2 0 0 1 12.99 3.01a2 2 0 0 1 1.826 3.164 2 2 0 0 1 0 3.652 2 2 0 0 1-1.826 3.164 2 2 0 0 1-3.164 1.826 2 2 0 0 1-3.652 0A2 2 0 0 1 3.01 12.99a2 2 0 0 1-1.826-3.164 2 2 0 0 1 0-3.652A2 2 0 0 1 3.01 3.01a2 2 0 0 1 3.164-1.826zM8 1a1 1 0 0 1 1 1l-.002.03a4.997 4.997 0 0 1-.064.387c-.049.241-.122.542-.213.887a60.59 60.59 0 0 1-.676 2.314L8 5.762l-.045-.144a60.59 60.59 0 0 1-.676-2.314 16.705 16.705 0 0 1-.213-.887 4.99 4.99 0 0 1-.064-.386A1 1 0 0 1 8 1zM2 9a1 1 0 1 1 .03-1.998l.091.01c.077.012.176.029.296.054.241.049.542.122.887.213a60.59 60.59 0 0 1 2.314.676L5.762 8l-.144.045c-.8.248-1.626.494-2.314.676-.345.091-.646.164-.887.213a4.99 4.99 0 0 1-.386.064L2 9zm7 5a1 1 0 0 1-2 0l.002-.03a4.996 4.996 0 0 1 .064-.386c.049-.242.122-.543.213-.888.182-.688.428-1.513.676-2.314L8 10.238l.045.144c.248.8.494 1.626.676 2.314.091.345.164.646.213.887a5.005 5.005 0 0 1 .064.386L9 14zm-5.696-2.134a1 1 0 0 1-1-1.732l.027-.014c.02-.01.048-.021.084-.036a5.09 5.09 0 0 1 .283-.102c.233-.078.53-.165.874-.258a60.598 60.598 0 0 1 2.343-.572l.147-.033-.103.11a58.239 58.239 0 0 1-1.666 1.743c-.253.252-.477.465-.66.629a5.001 5.001 0 0 1-.304.248l-.025.017zM4.5 14.062a1 1 0 0 0 1.366-.366l.014-.027c.01-.02.021-.048.036-.084a5.09 5.09 0 0 0 .102-.283c.078-.233.165-.53.258-.874a60.6 60.6 0 0 0 .572-2.343l.033-.147-.11.102a60.848 60.848 0 0 0-1.743 1.667 17.07 17.07 0 0 0-.629.66 5.06 5.06 0 0 0-.248.304l-.017.025a1 1 0 0 0 .366 1.366zm9.196-8.196a1 1 0 0 0-1-1.732l-.025.017a4.951 4.951 0 0 0-.303.248 16.69 16.69 0 0 0-.661.629A60.72 60.72 0 0 0 10.04 6.77l-.102.111.147-.033a60.6 60.6 0 0 0 2.342-.572c.345-.093.642-.18.875-.258a4.993 4.993 0 0 0 .367-.138.53.53 0 0 0 .027-.014zM11.5 1.938a1 1 0 0 1 .366 1.366l-.017.025a5.001 5.001 0 0 1-.248.303 17.01 17.01 0 0 1-.629.661A60.614 60.614 0 0 1 9.23 5.96l-.111.102.033-.147a60.62 60.62 0 0 1 .572-2.342c.093-.345.18-.642.258-.875a5.066 5.066 0 0 1 .138-.367l.014-.027a1 1 0 0 1 1.366-.366zM14 9a1 1 0 0 0 0-2l-.03.002a4.996 4.996 0 0 0-.386.064c-.242.049-.543.122-.888.213-.688.182-1.513.428-2.314.676L10.238 8l.144.045c.8.248 1.626.494 2.314.676.345.091.646.164.887.213a4.996 4.996 0 0 0 .386.064L14 9zM1.938 4.5a1 1 0 0 0 .393 1.38l.084.035c.072.03.166.064.283.103.233.078.53.165.874.258a60.88 60.88 0 0 0 2.343.572l.147.033-.103-.111a60.584 60.584 0 0 0-1.666-1.742 16.705 16.705 0 0 0-.66-.629 4.996 4.996 0 0 0-.304-.248l-.025-.017a1 1 0 0 0-1.366.366zm2.196-1.196A1 1 0 1 1 5.88 2.33c.01.02.021.048.036.084.029.072.063.166.102.283.078.233.165.53.258.875.186.687.387 1.524.572 2.342l.033.147-.11-.102a60.597 60.597 0 0 1-1.743-1.667 16.713 16.713 0 0 1-.629-.66 4.996 4.996 0 0 1-.248-.304l-.017-.025zm9.928 8.196a1 1 0 0 1-1.366.366l-.025-.017a4.946 4.946 0 0 1-.303-.248 16.71 16.71 0 0 1-.661-.629A60.73 60.73 0 0 1 10.04 9.23l-.102-.111.147.033c.818.185 1.655.386 2.342.572.345.093.642.18.875.258a5 5 0 0 1 .367.138 1 1 0 0 1 .394 1.38zm-3.928 2.196a1 1 0 0 0 1.732-1l-.017-.025a5.065 5.065 0 0 0-.248-.303 16.705 16.705 0 0 0-.629-.661A60.462 60.462 0 0 0 9.23 10.04l-.111-.102.033.147a60.6 60.6 0 0 0 .572 2.342c.093.345.18.642.258.875a4.985 4.985 0 0 0 .138.367.575.575 0 0 0 .014.027zM8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
      </svg>
        <a class="navbar-brand" href="index.php">Jarditou.com</a>
          <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
      <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
      <a class="nav-link" href="tableau.php">Tableau <span class="sr-only">(current)</span></a>
      </li>
      <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
      <a class="nav-link" href="contact.php">Contact <span class="sr-only">(current)</span></a>
      </li>                                  
      </div>
      </ul>
 <!--2eme partie navbar bouton-->
                                        
                                        
<form class="form-inline my-2 my-lg-0">
<div class="d-none d-sm-block">
 <input class="form-control mr-sm-2" type="search" placeholder="Votre promotion" aria-label="Search">
   <button class="btn btn-outline-success my-2 my-sm-0 pull" type="submit">Rechercher</button>
</div>
   </div>
  </div>
  </div>
  </form>
  </nav>
                            
<!----Promo-->
                        
<img src="promotion.jpg" class="img-fluid"></img>
                        
<div class="p-3">
<form id="f_verification" method="post" action="./contact.php">
<fieldset class="p-3">
*Ces zones sont obligatoires 
<h1> <bold>Vos Coordonnées</h1></bold>
  <div class="form-group">
    <label for="Nom">Nom*</label>
    <input type="text" id="nom" class="form-control" name="nom" value = '<?php if(isset($_POST['nom'])){echo $_POST['nom'];} ?>' placeholder="Nom">
    <p id="ErreurNom" class="Erreur"><?php if (isset($res['Nom'])){echo $res['Nom'];}?></p>
  </div>
  <div class="form-group">
    <label for="Prenom">Prénom*</label>
    <input type="text" id="prenom" class="form-control" name="prenom" value = '<?php if(isset($_POST['prenom'])){echo $_POST['prenom'];} ?>' placeholder="Prénom">
    <p id="ErreurPrenom" class="Erreur"><?php if (isset($res['Prenom'])){echo $res['Prenom'];}?></p>
  </div>
                            
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="sexe" value='Madame'id="inlineRadio1"<?php if(isset($_POST['sexe'])&& $_POST['sexe'] == 'Madame'){echo "checked";} ?>>
    <label class="form-check-label" for="inlineRadio1">Madame*</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="sexe" value="Monsieur" id="inlineRadio2"<?php if(isset($_POST['sexe'])&& $_POST['sexe'] == 'Monsieur'){echo "checked";} ?>>
    <label class="form-check-label" for="inlineRadio2">Monsieur*</label><br>
  </div>
    <p id="ErreurSexe" class="Erreur"><?php if (isset($res['Sexe'])){echo $res['Sexe'];}?></p>
  <div class="form-group">
    <label for="Datedenaissance">Date de naissance*</label>
    <input id="date" type="date" class="form-control" value="<?php if(isset($_POST['date'])){echo $_POST['date'];} ?>" name="date" placeholder="jj/mm/aaaa">
    <p id="ErreurDate" class="Erreur"><?php if (isset($res["Date de naissance"])){echo $res["Date de naissance"];}?></p>
    </div>
    <div class="form-group">
      <label for="Codepostal">Code postal*</label>
      <input id="codepost" type="birth" class="form-control" value = '<?php if(isset($_POST['codepost'])){echo $_POST['codepost'];} ?>' name="codepost" placeholder="80000">
      <p id="ErreurCodePostal" class="Erreur" > <?php if (isset($res["Code postal"])){echo $res["Code postal"];}?> </p>
    </div>
    <div class="form-group">
      <label for="Adresse">Adresse</label>
      <input id="adresse" type="adresse" class="form-control" value="<?php if(isset($_POST['adresse'])){echo $_POST['adresse'];} ?>" name="adresse" placeholder="30 Rue de Poulainville">
      <p id="ErreurAdresse" class="Erreur"><?php if (isset($res["Adresse"])){echo $res["Adresse"];}?></p>
    </div>
    <div class="form-group">
      <label for="Ville">Ville</label>
      <input id="ville" type="city" class="form-control" value="<?php if(isset($_POST['ville'])){echo $_POST['ville'];} ?>" name="ville" placeholder="Amiens">
      <p id="ErreurVille" class="Erreur"> <?php if (isset($res["Ville"])){echo $res["Ville"];}?></p>
    </div>
    <div class="form-group">
    <label for="Email">Email*</label>
    <input id="mail" type="" class="form-control" value="<?php if(isset($_POST['mail'])){echo $_POST['mail'];} ?>" name="mail" placeholder="dave.loper@afpa.com">
    <p id="ErreurMail" class="Erreur"><?php if (isset($res["Email"])){echo $res["Email"];}?></p>
    </div>
    </fieldset>
    <fieldset class="p-3">
      <h1><bold>Votre demande</h1> </bold>
        <form class="form-inline" id="f_verification">
           <label class="my-1 mr-2" for="inlineFormCustomSujet">Sujet</label>
              <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSujet" name="sujet">
              <option value="Choisissez" >Choisissez</option>
                <option value="Mes commandes"<?php if(isset($_POST['sujet'])&&($_POST['sujet'] =="Mes commandes")){echo 'selected';}?> >Mes commandes</option>
                <option value="Question sur un produit"<?php if(isset($_POST['sujet'])&&($_POST['sujet'] =="Question sur un produit")){echo 'selected';}?> >Question sur un produit</option>
                <option value="Réclamation"<?php if(isset($_POST['sujet'])&&($_POST['sujet'] =="Réclamation")){echo 'selected';}?> >Réclamation</option>
                <option value="Autres"<?php if(isset($_POST['sujet'])&&($_POST['sujet'] =="Autres")){echo 'selected';}?> >Autres</option>
              </select>
    <p id="errSujet" class="Erreur"><?php if (isset($res["Sujet"])){echo $res["Sujet"];}?></p> 
    <label for="question">Votre question* :</label><textarea class="form-control" id="question" aria-label="With textarea" name="question"><?php if(isset($_POST['question'])){echo $_POST['question'];} ?> </textarea>
    <p id="errQuest" class="Erreur"><?php if (isset($res["Question"])){echo $res["Question"];}?></p>
    </fieldset>   
    <p>
    <input type="checkbox" class="form-check-input" id="accept" name="accept"> J'accepte le traitement informatique de ce formulaire<br>
    <p id="errAccept" class="Erreur"><?php if (isset($res["Validation"])){echo $res["Validation"];}?></p>
    </p>
      <button class="btn btn-dark" type="submit" value="Envoyer" name="Envoyer">Envoyer</button>
        <i class="fa fa-fw fa-paper-plane"></i> 
      <button class="btn btn-dark" type="reset">Annuler</button>
        <i class="fa fa-fw fa-undo"></i>
   </div>    
   </div>
    <p id="erreurs" name="erreurs" class="error"></p>
    </form>

<?php require_once "./includes/footer.inc.php"; ?>