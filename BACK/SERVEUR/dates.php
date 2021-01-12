<?php
/*
Utilisez l'objet DateTime, sauf mention contraire.

Exercice 1
Affichez la date du jour au format mardi 2 juillet 2019.

Exercice 2
Trouvez le numéro de semaine de la date suivante : 14/07/2019.

Exercice 3
Combien reste-t-il de jours avant la fin de votre formation.

Exercice 4
Reprenez l'exercice 3, mais traitez le problème avec les fonctions de gestion du timestamp, time() et mktime().

Exercice 5
Quelle sera la prochaine année bissextile ?

Exercice 6
Montrez que la date du 17/17/2019 est erronée.

Exercice 7
Affichez l'heure courante sous cette forme : 11h25.

Exercice 8
Ajoutez 1 mois à la date courante. */

1)   $dateJour = date(N.m.Y.d);
2)      $dateObj = new DateTime('2019-07-14'); 
// Objet->format('Type') permet de transformer le format sous un format souhaité 
echo "2019-07-14, semaine nº : ".$dateObj->format('W')."."; // W (weekly) permet d'obtenir le nº de la semaine.

3)  $finForm = new DateTime('2021-07-24');
$today = new DateTime();
$temps = $finForm->diff($today);
echo "Il reste ".$temps->days." jours.";

4)  $form = mktime(0,0,0,7,24,2020);
$finform = new DateTime();
$finform->setTimestamp($form);
$today= new Datetime();
$temps = $finform->diff($today);
echo "Il reste ".$temps->days." jours.";


5) $date = new DateTime();
for ($i = 0; $i < 4; $i++)
{
    $date->modify('+1 years');
    if ($date->format('L') == 1)
    {
        ?>
           L'année <?= $date->format('Y') ?> sera la prochaine année bissextile.
           <?php
    }
}
6) 
$date = "17/17/2019";
$testDate = DateTime::createFromFormat('d/m/Y', $date); 
$errors = $testDate->getLastErrors();
  if ($errors['warning_count'] >= 1)

7) $heure = date("H\hi");
echo("$heure");
8)  $date = date("d-m-Y");
Print("Nous sommes le $date");
$date2 = date('d-m-Y', strtotime(' + 1 month'));
Print("Dans un mois nous serons le $date2");