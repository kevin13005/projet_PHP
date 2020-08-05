
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>BlogVoyage.php</title>
  <link rel="stylesheet" href="styleblog.css">
</head>

<body class="body">

<h1>Inscription</h1>

<form method="post" action="inscription.php">

<label for="pseudo">login</label>
<input type="text" name="pseudo" id="pseudo" required>
<label for="pass">password</label>>
<input type="password" name="pass" id="pass" required>
<label for="pass2">confirmer password</label>>
<input type="password" name="pass2" id="pass2" required>
<label for="mail">adresse mail</label>>
<input type="email" name="mail" id="mail" size="30" maxlength="64" required>
<input type="submit" value="valider" name="valider">
</form>

<?php
require('connect_sql.php');
$db=connect();
?>
<?php

if(isset($_POST['valider'])){

if(isset($_POST['pseudo'], $_POST['pass'], $_POST['pass2'], $_POST['mail'])){
        $pseudo=$_POST['pseudo'];
        $pass=$_POST['pass'];
        $pass2=$_POST['pass2'];
        $mail=$_POST['mail'];                                                                                                                                                                
        if(empty($pseudo) || empty($pass) || empty($pass2) || empty($mail)){
                echo 'un ou plusieurs champs ne sont pas remplis';
        }
        elseif(strlen($pseudo)>20){
                echo 'votre pseudo ne doit pas depasser 20 caracteres';
        }
        elseif($pass != $pass2){
                echo 'mot de passe different, entrez le meme mot de passe';
        }
        /*elseif(!preg_match('#^[a-z0-9._-]@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $mail)){
                echo 'entrez un mail valide, avec seulement des minuscules';
        }*/
        /*elseif mysqli_num_rows(mysqli_query($db,"SELECT * FROM membres WHERE pseudo=".$pseudo.""))==1)*/
        $sql="SELECT pseudo FROM membres WHERE pseudo=".$pseudo."";
        $query = $db->query($sql);
        if($count = $query->fetch()){
                echo 'ce pseudo est deja utilisé';
            }
        }
                else{
                        $pass_crypt=password_hash($pass, PASSWORD_DEFAULT);
                        $sql="INSERT INTO membres(pseudo, pass, email, date_inscription)VALUES(:pseudo, :pass, :email, CURDATE())";
                        $requete=$db->prepare($sql);
                        $requete->execute(array('pseudo' => $pseudo,
                                                        'pass' => $pass,
                                                        'email' => $mail));
                        echo 'vous etes inscrite';
                        echo '<a href="BlogVoyage.php">retour accueil pour se logger</a>';
                }
        }
        
        ?>
        </body>
        </html>
        
        
        
        
