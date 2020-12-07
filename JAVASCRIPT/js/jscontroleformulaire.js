function formulaireEstOk(e){ 
    var erreurs="";
    var tab_erreurs = [];
    var inputs = ['nom','prenom','datedenaissance','code-postal','email','question']
    var nombre_inputs = inputs.length; 
    //Création RegExp nom minimum 2 lettres
    var nomRegExp = /^[a-zA-Z\-\wàäâçéèëêïîôùüû#&]+$/;
    //Création RegExp nom minimum 2 lettres
    var prenomRegExp = /^[a-zA-Z\-\wàäâçéèëêïîôùüû#&]+$/;
    //Création RegExp datedenaissance format jj/mm/aaaa
    var datedenaissanceRegExp = /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/;
    //Création RegExp codepostal france ou dom-tom
    var codepostal =  /^(([0-8][0-9])|(9[0-5]))[0-9]{3}$/;
    //Création RegExp demande d'inscrire le signe @
    var emailRegExp = /^[a-zA-Z0-9.-_]+[@]{1}[a-zA-Z0-9.-_]+[.]{1}[a-z]{2,10}$/;
    //Création vérification si question avec le point d'interrogation '?'
    var questionRegExp = /^[a-zA-Z\-\wàäâçéèëêïîôùüû#&]+$/;
    for (var i = 0; i < nombre_inputs; i++) {
        if (document.getElementById(inputs[i]).value == "") {
            switch(inputs[i])
            {
                case "nom": tab_erreurs.push("Veuillez renseigner votre Nom"); document.getElementById("erreur-"+inputs[i]).innerHTML="Veuillez renseigner votre Nom"; break;
                case "prenom": tab_erreurs.push("Veuillez renseigner votre Prénom"); document.getElementById("erreur-"+inputs[i]).innerHTML="Veuillez renseigner votre Prénom"; break;
                case "datedenaissance": tab_erreurs.push("Veuillez renseigner une date de naissance valide"); document.getElementById("erreur-"+inputs[i]).innerHTML="Veuillez renseigner une date de naissance valide"; break;
                case "code-postal": tab_erreurs.push("Veuillez renseigner un code postal valide"); document.getElementById("erreur-"+inputs[i]).innerHTML="Veuillez renseigner un code postal valide"; break;
                case "email": tab_erreurs.push("Veuillez renseigner une adresse mail valide");document.getElementById("erreur-"+inputs[i]).innerHTML="Veuillez renseigner une adresse mail valide";  break;
                case "question": tab_erreurs.push("Veuillez poser votre question");document.getElementById("erreur-"+inputs[i]).innerHTML="Veuillez poser votre question";  break;
            }       
        }
    }
    var formulaire_contient_erreurs = (tab_erreurs.length > 0);
    
    if(formulaire_contient_erreurs)
    {
        if(tab_erreurs.length == nombre_inputs)
            erreurs = "Veuillez renseigner tous les champs";
        else
            erreurs = tab_erreurs.join('<br />');
    }

    return (erreurs == "");
}

document.getElementById('erreurs').style.display = "none"; 
document.getElementById("f_verification").addEventListener("submit",function(e) {
    
    var formulaire_est_ok = formulaireEstOk(e);
    if(formulaire_est_ok)
    { 
        formulaire_envoye = document.getElementById("erreurs").innerHTML = "";    
        document.getElementById('erreurs').style.display = "none";
        alert('La saisie est correcte, le formulaire va donc être envoyé !');
    }
    else
    {
        document.getElementById('erreurs').style.display = "block";
        e.preventDefault();
    }   
    return formulaire_est_ok;                 
});
 // fin fonction  
