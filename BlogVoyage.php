<?php
require_once "fonction_visite.php";
$vues=nb_vues();
?>

<?php

try
{
$db = new PDO("mysql:host=".$_SERVER['dbHost']."; dbname=".$_SERVER['dbBd'], $_SERVER['dbLogin'], $_SERVER['dbPass']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch(Exception $e)
{
        echo "<pre>Échec : " . $e->getMessage()."<pre>";
}



$reponse = $db->query('SELECT id, titre, contenu, date_creation FROM BILLET ORDER BY date_creation DESC LIMIT 0, 5');

require('affich_accueil.php');
?>
