<?php 
        $queryfromusers = mysql_query("SELECT * FROM users WHERE username like '%" .$_POST["username"]. "%' ORDER BY id_users ASC", $conn);
         $resultat = mysql_num_rows($queryfromusers);
        if($resultat >0){
         
            echo " resultat de votre recherche";
            // get every lines of my table users
            echo ('<table border=1>\n');
            echo('<tr>\n');
            echo('<td><strong> nom et prenoms</strong></td>\n');
            echo('<td><strong> compagnies </strong></td>\n');
            echo('<td><strong> ville de depart</strong></td>\n');
            echo('<td><strong> ville d\'arrivee</strong></td>\n');
            echo('<td><strong> date de depart</strong></td>\n');
            echo('<td><strong> heure de depart</strong></td>\n');
            echo('</tr>');
            while($resultat= mysql_fetch_array($queryfromusers)){                
                echo($data['id_users']); 
                echo($data['username']);
                echo($compagny);
                echo($villed);
                echo( $villeari);
                echo($data['date_depart']); 
                echo( $data['heure_depart']);            
          
            }
            echo ('</table>\n');
        }else{
            echo  "<p> desolez cet elements est introuvable </p>";
        }   
      ?>

<form action="/action_page.php" method="get">
  <input type="checkbox" name="vehicle1" value="Bike">
  <label for="vehicle1"> I have a bike</label><br>
  <input type="checkbox" name="vehicle2" value="Car">
  <label for="vehicle2"> I have a car</label><br>
  <input type="checkbox" name="vehicle3" value="Boat" checked>
  <label for="vehicle3"> I have a boat</label><br><br>
  <input type="submit" value="Submit">
</form>