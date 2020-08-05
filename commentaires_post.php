
<?php
$billet = $_GET['billet'];

if(isset($_GET['button'])){
$com=$_GET['com'];
$auteur=$_GET['auteur'];
$requete=$db->prepare('INSERT INTO commentaires(id_billet, commentaire, auteur, date_commentaire)VALUES(?, ?, ?, NOW())');
$requete->execute(array($billet, $com, $auteur));
}
?>
