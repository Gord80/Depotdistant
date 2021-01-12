<?php
function getPDOConnexion()
{
    $user = 'root';
    $pass = '';
    $dbh = new PDO('mysql:host=127.0.0.1;dbname=jarditou', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
}

function closePDOConnexion(&$dbh,&$stmt = null)
{
    $dbh = null;
    $stmt = null;
}
?>