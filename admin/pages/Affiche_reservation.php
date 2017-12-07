<?php
$cake = new Vue_reservationDB($cnx);
$liste = $cake->getVue_reservationProduit();
$nbrCakes = count($liste);
?>
<br />
<div class="container"> 
    <table class="table table-striped fond">
    <thead>
      <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Email</th>
        <th>Telephonne</th>
        <th>Cochon</th>
      </tr>
    </thead>
<?php
if (isset($liste)) {
    if ($nbrCakes > 0) {
        ?>          
        <?php
        ?>      
        <?php
        for ($i = 0; $i < $nbrCakes; $i++) {
            ?>
              
                <tbody>
      <tr>
          <td><?php print $liste[$i]['NOM_CLIENT']; ?></td>
        <td><?php print $liste[$i]['PRENOM_CLIENT']; ?></td>
        <td><?php print $liste[$i]['EMAIL_CLIENT']; ?></td>
        <td><?php print $liste[$i]['TELEPHONE']; ?></td>
        <td><?php print $liste[$i]['COCHON']; ?></td>
      </tr>
    </tbody>
        <?php } ?>
            </table>
        </div>

        <?php
    }
}//fin if du debut 
?>

