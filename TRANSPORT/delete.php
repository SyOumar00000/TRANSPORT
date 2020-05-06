<?php include_once('connect.php') ?>
<?php  include('entete.php') ?>
<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="3" width="100%">
  <center><h1> suppression d'informations </h1></center>

  <tr>
    <th> Code </th>
    <th> Nom et Prenoms </th>
    <th> Compagnie de transport</th>
    <th>  Ville de depart</th>
      <th>  Ville d'arrivée </th>
    <th> Date de départ</th>
    <th> Heure de départ </hd>
    <th> Supprimer </hd>
  </tr>

  <?php
  // table users query
  $requeteusers ='SELECT * FROM users ORDER BY id_users ASC';
  $rusers = mysqli_query($conn, $requeteusers) or die('Erreur SQL !'.$requeteusers.'</br>'.mysqli_error());
  ?>

  <!-- on va scanner tous les tuples un par un -->
  <?php while ($data=mysqli_fetch_array($rusers)) {
           //query to show the compagny's name where id is inside the users table
           $compagnyid = $data['compagnie'];
           $compagny = '';
           $getcompagny = mysqli_query($conn, "SELECT * FROM compagnies WHERE id_compagnie='$compagnyid'");
           while ($comp=mysqli_fetch_array($getcompagny)) {
               $compagny = $comp['nom_compagnie'];
           }

           //query to show the town's name where id is inside the users table
           $villedepart = $data['ville_depart'];
           $getvilledepart = mysqli_query($conn, "SELECT * FROM ville WHERE id_ville = '$villedepart'");
           while ($ville=mysqli_fetch_array($getvilledepart)) {
               $villed=$ville['nom_ville'];
           }

          //query to show the town's name where id is inside the users table
           $villearrivee = $data['ville_arrivee'];
           $getvillearrivee = mysqli_query($conn, "SELECT * FROM ville WHERE id_ville = '$villearrivee'");
           while ($villeA=mysqli_fetch_array($getvillearrivee)) {
               $villeari=$villeA['nom_ville'];
           }
            ?>
            <!-- code pour suppprimer -->
            <?php   
              if(isset($_POST['delete'])){
                $ID = (int)$_POST['id'];
                $rekete="DELETE FROM users WHERE id_users='$ID'";
                 $answers=  mysqli_query($conn, $rekete);  
              /*   $conn->query($rekete);  
                mysqli_close($conn);  */   
              }
              /*   if($answers){
                  echo" votre table a ete supprime avec succes";
                }             
 */         
            ?>
	<!-- show the results -->
  <tr>
                <td><?php echo($data['id_users']); ?></td>
                <td><?php echo($data['username']); ?></td>
                <td><?php echo($compagny); ?></td>
                <td><?php echo($villed); ?></td>
                <td><?php echo( $villeari); ?></td>
                <td><?php echo($data['date_depart']) ?></td>
                <td><?php echo($data['heure_depart']) ?></td>
                <td><form method = "POST" action = "">
                 <input type = "hidden" name = "id" value = "<?php echo $data['id_users'];?>">
                 <input type = "submit"  class=" btn btn-danger" name = "delete" value = "SUPPRIMER">
                 </form></td>
                <!-- <a href="delete.php?id_users=<?php echo $data['id_users'];?>"><button class='btn btn-danger' name='suppression'> Supprimer</button></a> -->
            </tr>
  <?php } ?>
  </table>
  <!-- code pour suppression  -->
  <div class ="row">
     <div class = "col-md-4 col-lg-4 col-xs-12 col-sm-12">
     <a href ="update.php"><button class ="btn btn-warning">  Modifier enregistrements</button></a></div>
     <div class = "col-md-4 col-lg-4 col-xs-12 col-sm-12">
        <a href ="index.php"><button class ="btn btn-primary"> Retour aux enregistrements</button></a>
     </div>
     <div class = "col-md-4 col-lg-4 col-xs-12 col-sm-12"></div>
<?php  include('footer.php') ?>