<?php
include('connect.php');
//show data on compagnies table
 $qc= 'SELECT * FROM compagnies ORDER BY id_compagnie ASC';
 $mqc= mysqli_query($conn, $qc) or die('Erreur SQL !'.$mqc.'</br>'.mysqli_error($conn));
 //show data on ville table(ville depart)
  $qvdep= 'SELECT * FROM ville ORDER BY id_ville ASC';
  $mqvdep= mysqli_query($conn, $qvdep) or die('Erreur SQL !'.$mqvdep.'</br>'.mysqli_error($conn));
  //show data on ville table(ville arrivee)
   $qvarr= 'SELECT * FROM ville ORDER BY id_ville ASC';
   $mqvarr= mysqli_query($conn, $qvarr) or die('Erreur SQL !'.$mqvarr.'</br>'.mysqli_error($conn));

if (isset($_POST['valider']))
{   // get the forms data
      $username = $_POST['username'];
      $compagnie =$_POST['compagnie'];
      $ville_depart = $_POST['ville_depart'];
      $ville_arrivee =  $_POST['ville_arrivee'];
      $date_depart = $_POST['date_depart'];
      $heure_depart = $_POST['heure_depart'];
           //make test with different towns
         if ($_POST['$ville_depart'] == $_POST['$ville_arrivee']) {
           $sms = "verifier la vile de depart et d'arrivée ";
         }else {
           //insert data on database
           $sql = "INSERT INTO users (username,compagnie,ville_depart,ville_arrivee,date_depart,heure_depart)
                   VALUES('$username','$compagnie','$ville_depart','$ville_depart','$date_depart','$heure_depart')";
                    mysqli_query($conn, $sql) or die('Erreur SQL !'.$sql.'<br/>'.mysqli_error($conn));
         }

}
?>
