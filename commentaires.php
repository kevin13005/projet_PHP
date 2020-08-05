<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>BlogVoyage.php</title>
  <link rel="stylesheet" href="styleblog.css">
</head>

<body>


<?php

require("connect_sql.php");
$db = connect();

$reponse = $db->prepare('SELECT id, titre, contenu, date_creation FROM BILLET  WHERE id = ?');

$reponse->execute(array($_GET['billet']));

$element = $reponse->fetch();
?>
<p>
<h5><?php echo htmlspecialchars($element['titre']);?></h5>
le<?php echo htmlspecialchars($element['date_creation']);?></p> <br/>
 <p><?php switch ($element['id']){
     case 1:
        echo '<img src="https://itourisme.net/wp-content/uploads/2018/03/hanoi-a-halong-bay.jpg" width="900" heigth="500">';
break;
case 3:
        echo '<img src="https://upload.wikimedia.org/wikipedia/commons/9/95/Tour_eiffel_de_nuit.jpg" width="900" heigth="500">';
break;
case 4:
    echo '<img src="https://cdn.bioalaune.com/img/article/thumb/900x500/37864-uluru-rocher-plus-celebre-australie-pris-dassaut-avant-qu-ne-soit-interdit-public.png"width="900" heigth="500">'; 
break; 
case 5:
    echo '<img src="https://cdn.getyourguide.com/img/tour_img-1845047-98.jpg" width="900" heigth="500">';
break;
case 6:
    echo '<img src="https://images.freeimages.com/images/large-previews/dc6/sultanahmet-mosque-1417360.jpg" width="900" heigth="500">';
break;
}
?>
<p><?php echo htmlspecialchars($element['contenu']);?><br/>
<?php
//$reponse->closeCursor();


//recuperation commentaires variables donc prepare
$reponse=$db->prepare('SELECT auteur, commentaire, date_commentaire FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire DESC');
$reponse->execute(array($_GET['billet']));

while ($element = $reponse->fetch())
{
    ?><p><?php $element['auteur'];?>le <?php echo $element['date_commentaire'];?></p>                                                                                                              
    <p><?php echo $element['commentaire'];?></p>
    
    <?php
    }
    //$reponse->closeCursor();
    ?>
    
<form method="get" action="commentaires.php">


<label for="auteur">pseudo</label>
<input type="text" id="auteur" name="auteur" required>

<label for="com">commentaires</label>
<textarea id="com" name="com" rows="10" cols="30" required></textarea>

<input type="submit" value="envoyer commentaire" name="button">                                                                                                                              

</form>
<?php
if(isset($_GET['button'])){
$com=$_GET['com'];
$auteur=$_GET['auteur'];
$id=$_GET['billet'];
$requete=$db->prepare('INSERT INTO commentaires(id_billet, commentaire, auteur, date_commentaire)VALUES(?, ?, ?, NOW())');
$requete->execute(array($id, $com, $auteur));
}
?>


</body>
</html>



         
