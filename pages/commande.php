<h2>Commander</h2>
<?php

if (!isset($_GET['id']) && !isset($_SESSION['id_commande'])) {
    ?>
    <p>Pour reserver, choisissez <a href="index.php?page=catalogue.php">ici</a> votre cochon</p>
    <?php
} else if (isset($_GET['id'])) {
    $_SESSION['id_commande'] = $_GET['id'];
   
}
if (isset($_SESSION['id_commande'])) {
    $cake = new vue_cochonsDB($cnx);
    $liste = $cake->getVue_cochonsId($_SESSION['id_commande']);

    // TRAITEMENT DU FORMULAIRE
    if (isset($_GET['commander'])) {
        //permet d'extraire les champs du tableau $_GET pour simplifier
        extract($_GET, EXTR_OVERWRITE);
        if (empty($email1) || empty($email2) || empty($nom) || empty($prenom) || empty($telephone) || empty($rue_client) || empty($numero) || empty($codepostal) || empty($localite)) {
            $erreur = "Veuillez remplir tous les champs";
        }
        else{
            $client = new ReservationDB($cnx);
            $client->addClient($_GET);
        }
    }
        ?>
        <div class="row">
            <div class="col-sm-4">
                <img src="../admin/images/<?php print $liste[0]['IMAGE']; ?>">
                
            </div>
            <div class="col-sm-2">
        <?php print $liste[0]['NOM']; ?>
            </div>
            <div class="col-sm-2">
                <?php print $liste[0]['DATE_NAISS']; ?>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-4 erreur">
        <?php
        if (isset($erreur)) {
            print $erreur;
        }
        ?>
                </div>
            </div>
            <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="form_commande">

                <div class="row">
                    <div class="col-sm-2"><label for="email1">Email</label></div>
                    <div class="col-sm-4">
                        <input type="email" id="email1" name="email1" placeholder="aaa@aaa.aa"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2"><label for="email2">Confirmez votre email</label></div>
                    <div class="col-sm-4">
                        <input type="email" id="email2" name="email2" placeholder="aaa@aaa.aa"/>
                    </div>
                </div> 
                
                <div class="row">
                    <div class="col-sm-2"><label for="nom">Nom</label></div>
                    <div class="col-sm-4">
                        <input type="text" name="nom" id="nom" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2"><label for="prenom">Prénom</label></div>
                    <div class="col-sm-4">
                        <input type="text" name="prenom" id="prenom" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2"><label for="telephone">Téléphone</label></div>
                    <div class="col-sm-4">
                        <input type="text" name="telephone" id="telephone" placeholder="xxx/xx.xx.xx"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2"><label for="adresse">Adresse</label></div>
                    <div class="col-sm-4">
                        <input type="text" name="rue_client" id="adresse" />
                    </div>
                </div> 
                <div class="row">
                    <div class="col-sm-2"><label for="numero">Numéro</label></div>
                    <div class="col-sm-4">
                        <input type="text" name="numero" id="numero"/>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-sm-2"><label for="codepostal">Code postal</label></div>
                    <div class="col-sm-4">
                        <input type="text" name="codepostal" id="codepostal" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2"><label for="localite">Localité</label></div>
                    <div class="col-sm-4">
                        <input type="text" name="localite" id="localite" />
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-sm-4">
                        <input type="submit" name="commander" id="commander" value="Finaliser ma commande" class="pull-right"/>&nbsp;           
                        <input type="reset" id="reset" value="Annuler" class="pull-left"/>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-sm-4" id="coucou">
                        <input type="text" name="cochon" id="cochon" value="<?php print $liste[0]['NOM']; ?>" />
                        
                    </div>
                </div>
                
            </form>
        </div>

        <?php
    }
    ?>
