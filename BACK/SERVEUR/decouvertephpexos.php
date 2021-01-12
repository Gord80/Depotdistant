
<html>  
<body>
<?php 
/*  Découverte PHP
    Exercice 1 les boucles
  for ($a=1; $a < 151; $a+=2) { 
     echo "$a \n";  
}
   Exercice 2   
      Écrire un programme qui écrit 500 fois la phrase Je dois faire des sauvegardes régulières de mes fichiers.
      $nombre_de_lignes = 1;

while ($nombre_de_lignes < 501)
{
    echo "Je dois faire des sauvegardes régulières de mes fichiers. \n";
    $nombre_de_lignes++; // $nombre_de_lignes = $nombre_de_lignes + 1
}

Exercice 3

    Ecrire un script qui affiche la table de multiplication totale de {1,...,12} par {1,...,12}
     le résultat doit être le suivant :

function table($nbr, $nbr2)
{
    $table = '<table border="1">';
    for ($a=0; $a <= $nbr; $a++) {
        $table .= '<tr>';
        for ($b=0; $b <= $nbr2 ; $b++) {
            $table .= '<td>'.$a*$b.'</td>';
        }
        $table .= '</tr>';
    }
    $table .= '</table>';
    return $table;
}
 
echo table(12, 12);


Exercice fonctions :
Ecrivez la fonction calculator() traitant les opérations 
d'addition, de soustraction, de multiplication et de division.

$num1 = $_POST['num1'];
$num2 = $_POST['num2'];
$calculator = $_POST['calculator'];

    function calculator($n1,$n2, $calcul)
    {
        switch($calcul)
        {
        case "Addition": 
            $calcul = $n1 + $n2; 
            break;
        case "Soustraction":
            $calcul = $n1 - $n2; 
            break;
        case "Multiplication":
            $calcul = $n1 * $n2; 
            break;
        case "Division":
            $calcul = $n1 / $n2; 
            break;
        }
        return $calcul;
       

        Exercices Tableaux
1-Quelle semaine a lieu la validation du groupe 19002 ?


2-Trouver la position de la dernière occurrence de Stage pour le groupe 19001.

3-Extraire, dans un nouveau tableau, les codes des groupes.

4-Combien de semaines dure le stage du groupe 19003 ?
         */

        $a = array("19001" => array("Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "", "", "Centre", "Centre", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Validation", "Validation"), 
     "19002" => array("Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Validation", ""), 
     "19003" => array("", "", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "", "", "Validation") 
    );
  ?> 

      
</body>
</html> 