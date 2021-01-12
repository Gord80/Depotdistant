<?php
// Déclaration de ma fonction 
function verif($post)
{
    // Déclaration des regex
    $alpha = "/^[a-zA-Zéèêëôœîïûüàáâæç -]+$/";
    $mail = "/^[a-zA-Z]+[@][a-z]+[.][a-z]{2,4}+$/";
    $codep = "/^[0-9]{5}$/";
    $adr = "/^[0-9]+[a-zA-Z -]+$/";
    $villes =  "/^[A-Z]+[a-zA-Zéèêëôœîïûüàáâæç -]+$/";
    // Récupération des valeurs du formulaire en fonction de leurs ID
    $nom = $post["nom"];
    $prenom = $post["prenom"];
    $date = $post["date"];
    $CP = $post["codepost"];
    $adresse = $post["adresse"];
    $ville = $post["ville"];
    $email = $post["mail"];
    $sujet = $post["sujet"];
    $question = $post["question"];

    $Erreur = [];
    $Resultat = [];

    if (!empty($nom)) {
        if (preg_match($alpha, $nom)==1){
            $Resultat = ["Nom" => $nom];
        } else {
            $Erreur["Nom"] = "Merci de ne saisir uniquement que des lettres";
        }
    } else {
        $Erreur["Nom"] = "Champs obligatoire";
    }
    if (!empty($prenom)) {
        if (preg_match($alpha, $prenom)==1) {
            $Resultat['Prenom'] = $prenom;
        } else {
            $Erreur["Prenom"] = "Merci de ne saisir uniquement que des lettres";
        }
    } else {
        $Erreur["Prenom"] = "Champs obligatoire";
    }
    if (isset($_POST['sexe'])) {

        $Resultat["Sexe"] = $_POST['sexe'];
    } else {

        $Erreur["Sexe"] = "Veuillez indiquer votre sexe";
    }
    if (!empty($date)) {
        $Resultat["Date de naissance"] = $date;
    } else {
        $Erreur["Date de naissance"] = "Champs obligatoire";
    }
    if (preg_match($codep, $CP)==1) {
        $Resultat["Code Postal"] = $CP;
    } else {
        $Erreur["Code postal"] = "Le format du code postal n'est pas respecté";
    }
    if (preg_match($adr ,$adresse)==1) {
        $Resultat["Adresse"] = $adresse;
    } else {
        $Erreur["Adresse"] = "Le format de l'adresse n'est pas respecté";
    }

    if (preg_match($villes, $ville)==1) {
        $Resultat["Ville"] = $ville;
    } else {
        $Erreur["Ville"] = "Le format de la ville n'est pas respecté";
    }
    if (!empty($email)) {

        if (preg_match($mail, $email)==1) {
            $Resultat['Email'] = $email;
        } else {
            $Erreur["Email"] = "Le format email n'est pas respecté";
        }
    } else {
        $Erreur["Email"] = "Champs obligatoire";
    }
    if ($sujet != "Choisissez") {
        $Resultat["Sujet"] = $sujet;
    } else {
        $Erreur["Sujet"] = "Veuillez choisir un sujet";
    }
    if (!empty($question)) {
        $Resultat["Question"] = $question;
    } else {
        $Erreur["Question"] = "Champs obligatoire";
    }
    if (!isset($_POST['accept'])) {
        $Erreur["Validation"] = "Veuillez accepter le traitement du formulaire";
    }
         return["Erreur" => $Erreur, "Resultat" => $Resultat] ;
     
}