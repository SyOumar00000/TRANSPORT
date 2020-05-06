<?php include_once(' connect.php');?>
<?php include_once(' entete.php');?>

<?php
  // Accès à la base de données
  $serveur     = "monserveur.com";
  $utilisateur = "dbxxxxxx";
  $motDePasse  = "mon_mot_de_passe_BDD";
  $base        = "dbxxxxxxxx";
  mysql_connect($serveur, $utilisateur, $motDePasse);
  mysql_select_db($base) or die("Base de données inactive. ");
  // $items est la chaîne contenant l'objet JSON des données
  $items = '';

  // Parcours des lieux
  $result = mysql_query("SELECT* FROM lieux ");
  WHILE ($row = mysql_fetch_object($result)) {   
   // Ecriture des données sous format JSON   
$items .= <<<EOD
   { "LatLng_lieu" : "$row->latlng_lieu",
     "Titre_lieu"  : "$row->titre_lieu",
     "Url_lieu"    : "$row->url_lieu"},
EOD;
    }
    mysql_free_result($result);
 
  // On enlève la dernière virgule
  if ($items != ''){
     $items = substr($items, 0, -1);
  }
 
  // Ecriture de la liste des lieux en format JSON
    header('Content-type: application/json');
    ?>
    {   
        "items": [
                  <?php echo $items;?>
                  ]
    }






<?php include_once(' footer.php');?>