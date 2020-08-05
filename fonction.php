
<?php
function nb_vues(){

if (file_exists('compteur.txt')){
        $fichier=fopen('compteur.txt', 'r+');
        $page_vues=fgets($fichier);
        $page_vues=$page_vues + 1;
        fseek($fichier, 0);
        fputs($fichier, $page_vues);
        fclose($fichier);
        return $page_vues;
        }
}
?>
