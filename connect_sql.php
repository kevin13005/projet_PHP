<?php
function connect()
{
try
{
$db = new PDO("mysql:host=".$_SERVER['dbHost']."; dbname=".$_SERVER['dbBd'],
 $_SERVER['dbLogin'], $_SERVER['dbPass']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
return $db;
/*array(PDO::ATTR_PERSISTENT => true), pour garder la connexion permanente,  mais inutilisable avec setAttribute*/
}


catch(Exception $e)
{
        echo "<pre>Échec : " . $e->getMessage()."<pre>";
}
}
?>
