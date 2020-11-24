function validateForm() {
    if(document.getElementById("LaSaisie").value == "") {
      document.getElementById("Saisie").innerHTML = "Le champ ne doit pas être vide";
      return false;
    } else {
      document.getElementById("Saisie").innerHTML = "";
      alert('Le formulaire est valide');
      return true;
    }
  }