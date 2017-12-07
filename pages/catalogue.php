<?php

    $cake = new Vue_CochonsDB($cnx);
    $liste = $cake->getVue_cochonProduit();
    $nbrCakes = count($liste);
    
?>
<br />
<div class="container" id="white">
    <?php
        if(isset($liste)){
            if($nbrCakes>0){       
    ?>          
   <?php    
   ?>      
                <?php
                    for($i=0;$i<$nbrCakes;$i++){
                ?>
               
                <div class="row">
                    <div class="col-sm-4">
                           <img src="admin/images/<?php print $liste[$i]['IMAGE'];?>" alt="imahe" id="liste"/>
                           
                    </div>
                            <div class="col-sm-2">
                                    <?php print $liste[$i]['NOM'];?>
                               
                            </div>                             
                           <div class="col-sm-2">  
                                  <?php print $liste[$i]['DATE_NAISS'];?>
                           </div>
                            <div class="col-sm-2">
                                <a type="button" class="btn-action btn btn-warning" href="index.php?page=commande.php&id=<?php print $liste[$i]['ID'] ?>">                
                                    Reserver un cochon
                                </a>   
                            </div>
                        
                    </div>
                    <?php } ?>
                </div>
              
 <?php
            }}//fin if du debut 
 ?>

