<?php
include('connect.php');
//show data on compagnies table
 $qc = 'SELECT * FROM compagnies ORDER BY id_compagnie ASC';
 $mqc = mysqli_query($conn, $qc) or die('Erreur SQL !'.$qc.'</br>'.mysqli_error());
 //show data on ville table(ville depart)
  $qvdep = 'SELECT * FROM ville ORDER BY id_ville ASC';
  $mqvdep = mysqli_query($conn, $qvdep) or die('Erreur SQL !'.$qvdep.'</br>'.mysqli_error());
  //show data on ville table(ville arrivee)
   $qvarr = 'SELECT * FROM ville ORDER BY id_ville ASC';
   $mqvarr = mysqli_query($conn, $qvarr) or die('Erreur SQL !'.$qvarr.'</br>'.mysqli_error());

if (isset($_POST['valider']))
{   // get the forms data
      $username = $_POST['username'];
      $compagnie =$_POST['compagnie'];
      $ville_depart = $_POST['ville_depart'];
      $ville_arrivee =  $_POST['ville_arrivee'];
      $date_depart = $_POST['date_depart'];
      $heure_depart = $_POST['heure_depart'];
           //make test with different towns
         if ($_POST['ville_depart'] == $_POST['ville_arrivee']) {
           $sms = "verifier la vile de depart et d'arrivée";
         }else {
           //insert data on database
           $sql = "INSERT INTO users (username,compagnie,ville_depart,ville_arrivee,date_depart,heure_depart)
                   VALUES('$username','$compagnie','$ville_depart','$ville_arrivee','$date_depart','$heure_depart')";
                    mysqli_query($conn, $sql) or die('Erreur SQL !'.$sql.'<br/>'.mysqli_error($conn));
         }

}
?>
<?php include('entete.php'); ?>
        <div class="row">
              <div class="fond">
              <div class="col-md-2 col-lg-2 col-xs-3 col-sm-3 hidden_xs hidden-sm">
              </div>
              <div class="col-md-8 col-lg-8 col-xs-12 col-sm-12">
                <h3> VOS INFORMATIONS SVP!!!</h3>
                 <div class="form">
                    <form class="" action="" method="post">
                       <input type="text"  id= "show" name="username" placeholder="Saisir votre Nom et Prenoms SVP!!!" value="" required>
                        <select class="compagnie" name="compagnie" placeholder="votre compagnie de transport">
                          <option selected disabled> Quelle est votre compagnie ?</option>
                          <?php while($infoc=mysqli_fetch_array($mqc)){ ?>
                          <option value="<?php  echo($infoc['id_compagnie']);?>" required><?php echo ($infoc['nom_compagnie']); ?></option>
                          <?php } ?>
                        </select>
                        <select class="ville_depart" name="ville_depart" placeholder="ville de depart">
                          <option selected disabled> Quelle est votre ville de depart ?</option>
                          <?php while($infovd=mysqli_fetch_array($mqvdep)){ ?>
                          <option value="<?php echo ($infovd['id_ville']);?>" required><?php echo ($infovd['nom_ville']); ?></option>
                          <?php } ?>
                        </select>
                        <select class="ville_arrivee" name="ville_arrivee" placeholder="ville de destination">
                          <option selected disabled> Quelle est votre destination ?</option>
                          <?php while($infova=mysqli_fetch_array($mqvarr)){ ?>
                          <option value="<?php echo ($infova['id_ville']);?>" required><?php echo ($infova['nom_ville']); ?></option>
                          <?php } ?>
                        </select>
                        <?php if (!empty($sms)) { ?>
                            <div class="alert alert-danger">
                                <strong><?php echo $sms; ?></strong> 
                            </div> 
                            <?php } ?>
                        <input type="date" class="date_depart" name="date_depart" value="Date du voyage!!!">
                        <input type="time" class="heure_depart" placeholder="Entrez une heure au format 10:30 min" name="heure_depart" required>
                       <input type="submit" class="btn btn-primary" name="valider" value="VALIDER">
                    </form>
                    <br>
                   <a href="inserer.php"> <button class="btn btn-success"> voir tout les clients</button> </a>
                 </div>
              </div>
              <div class="col-md-2 col-lg-2 col-xs-3 col-sm-3 hidden_xs hidden-sm">
              </div>
            </div>
        </div>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&language=fr">
        </script>
 <?php include('footer.php'); ?>