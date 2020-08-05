<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>BlogVoyage.php</title>
  <link rel="stylesheet" href="styleblog.css">
</head>

<body class="body">

<h1>BLOG VOYAGES / VISITES</h1>

<h4>Derniers billets du blog :</h4>


<h4>il y a eu <?php echo $vues; ?> visites sur le site.</h4>

<div class="membres">

<ul>
<li><a href="inscription2.php" rel="noopener noreferrer" target="_blank" type="clique">inscription</a> </li>
<li>connection</li>
</ul>

<form method="get" action="BlogVoyage.php">
<label for="pseudo">login</label>
<input type="text" name="pseudo" id="pseudo" required>
<label for="pass">password</label>>
<input type="password" name="pass" id="pass" required>
<input type="submit" value="valider" name="valider">
</form>

</div>
<?php
require('BlogPageConnexion.php');
?>

<?php
while ($element = $reponse->fetch())

{
?>
<div class="title">
<span class="title_nom"><?php echo htmlspecialchars($element['titre']);?></span><br/>

<span class="title_date">le <?php echo htmlspecialchars($element['date_creation']);?></span> <br/>
</div>
        <p class="halong tour uluru taj sultan"><?php switch ($element['id']){
                case 1:
                        echo '<img class="halong"  src="https://itourisme.net/wp-content/uploads/2018/03/hanoi-a-halong-bay.jpg" width="900" heigth="500">';
                break;
                case 3:
                        echo '<img class="tour" src="https://upload.wikimedia.org/wikipedia/commons/9/95/Tour_eiffel_de_nuit.jpg" width="900" heigth="500">';
                break;
                case 4:
                    echo '<img class="uluru" src="https://cdn.bioalaune.com/img/article/thumb/900x500/37864-uluru-rocher-plus-celebre-australie-pris-dassaut-avant-qu-ne-soit-interdit-public.png" width="900" heigth="500">';
                    case 5:
                        echo '<img class="taj" src="https://cdn.getyourguide.com/img/tour_img-1845047-98.jpg" width="900" heigth="500">';                                                                    break;
                case 6:
                        echo '<img class="sultan" src="https://images.freeimages.com/images/large-previews/dc6/sultanahmet-mosque-1417360.jpg" width="900" heigth="500';
                break;
        }
?></p><br/>

<div class="comm">
<p><?php echo htmlspecialchars($element['contenu'])?></p></div>
<p>
<?php  print "<a href=commentaires.php?billet=".$element['id']." >Commentaires</a>"?>
</p>

<?php
}
closeCursor();
?>

<img src="BlogVoyage.php"/>

</body>

</html>
