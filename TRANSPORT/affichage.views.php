<?php include_once('connect.php'); ?>
<?php include('entete.php'); ?>
<div class="panel-body">
        <table class="table table-striped table-hover">
            <tr>
                <th> N° D'ORDRE</th>
                <th> NOM ET PRENOMS</th>
                <th> COMPAGNIE</th>
                <th> VILLE DEPART</th>
                <th> VILLE ARRIVEE</th>
                <th> DATE DE DEPART</th>
                 <th> HEURE DEPART </th>
            </tr>
            <?php 
            // table users query
  $requeteusers ='SELECT * FROM users ORDER BY id_users ASC';
  $rusers = mysqli_query($conn, $requeteusers) or die('Erreur SQL !'.$requeteusers.'</br>'.mysqli_error($conn));
  ?>
        <?php while ($data=mysqli_fetch_array($rusers)) {
            //script pour afficher le nom de la compagnie dont l'id se trouve dans la table client
            $compagnyid = $data['compagnie'];
            $compagny = '';
            $getcompagny = mysqli_query($conn, "SELECT * FROM compagnies WHERE id_compagnie='$compagnyid'");
            while ($comp=mysqli_fetch_array($getcompagny)) {
                $compagny = $comp['nom_compagnie'];
            }

            //script pour afficher le nom de la ville de depart dont l'id se trouve dans la table client
            $villedepid = $data['ville_depart'];
            $getvilledep = mysqli_query($conn, "SELECT * FROM ville WHERE id_ville = '$villedepid'");
            while ($ville=mysqli_fetch_array($getvilledep)) {
                $villed=$ville['nom_ville'];
            }

            //script pour afficher le nom de la ville d'arrivée dont l'id se trouve dans la table client
            $villearrivid = $data['ville_arrivee'];
            $getvillearr = mysqli_query($conn, "SELECT * FROM ville WHERE id_ville = '$villearrivid'");
            while ($villear=mysqli_fetch_array($getvillearr)) {
                $villeari=$villear['nom_ville'];
            }
             ?>

            <tr>
                <td><?php echo($data['id_users']); ?></td>
                <td><?php echo($data['username']); ?></td>
                <td><?php echo($compagny); ?></td>
                <td><?php echo($villed); ?></td>
                <td><?php echo( $villeari); ?></td>
                <td><?php echo($data['date_depart']); ?></td>
                <td><?php echo( $data['heure_depart']); ?></td>              
            </tr>
            <?php } ?>
        </table>
    </div>
    </div>
<?php include('footer.php'); ?>