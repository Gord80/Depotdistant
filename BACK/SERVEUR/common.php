<?php
function array_keys_associated_values($tableau)
{
    $clefs = [];
    foreach($tableau as $clef=>$valeur)
    {
        if(!empty($valeur))
            $clefs[] = $clef;
    }
    return $clefs;
}

function uploadFichier($extensions_autorisees,$fichier,$dossier_destination,$nom_fichier_uploade,&$message)
{
    $erreur = false;
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimetype = finfo_file($finfo, $fichier["tmp_name"]);
    finfo_close($finfo);

    if(in_array($mimetype,$extensions_autorisees))
    {
        $erreur = (!move_uploaded_file($fichier["tmp_name"],$dossier_destination."/".$nom_fichier_uploade));
    }
    else
    {
        $message = "Type de fichier non autorisé";
        $erreur = true;
    }
    return (!$erreur);
}
?>