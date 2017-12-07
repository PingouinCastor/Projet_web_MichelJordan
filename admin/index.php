<!DOCTYPE html>

<?php
include 'lib/php/adm_liste_include.php';

$cnx = Connexion::getInstance($dsn, $user, $pass);
session_start();
?>

<html>
    <head>
        <meta charset:="UTF-8">
        <title></title>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="lib/js/js_validation/dist/jquery.validate.js" />
        <script src="lib/js/gt_function.js"></script>
        <script src="lib/js/gt_functionval.js"></script>
        <link rel="stylesheet" type="text/css" href="lib/css/style_diegro.css">
    </head>
    <body>
        <div class="container">
            <header>
                <!--<img src="images/gt_banniere.jpg" alt=""/>-->
            </header>
        </div>
        <div class="container fond">
            <div class="row">
                <div class="col-sm-2">
                    <nav>
                        <?php
                        if(isset($_SESSION['admin'])){
                            
                            if (file_exists("./lib/php/a_gt_menu.php")) {
                                include ("./lib/php/a_gt_menu.php");
                            }
                        }
                        ?>
                    </nav>
                </div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-11">
                            <?php if(isset($_SESSION['admin'])){
                                
                            ?>
                            <a href="index.php?page=disconnect" class="float-right btn btn-danger" type="button">
                                D&eacute;connexion
                            </a>    
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <section>
                        <?php
                        /* le contenu change en fonction de la navigation */
                        if(!isset($_SESSION['admin'])){
                            $_SESSION['page']="admin_login";
                        }
                        else{
                        
                            if (!isset($_SESSION['page'])) {
                                $_SESSION['page'] = "accueil_admin";
                            } else {

                                if (isset($_GET['page'])) {
                                    //print $_GET['page'];
                                    $_SESSION['page'] = $_GET['page'];
                                }
                            }
                            
                        }    
                        $path="./pages/". $_SESSION['page'].".php";
                        print $_SESSION['page'];
                        //print $_SESSION['page'];  
                        if (file_exists($path)) {
                            include $path;
                        } else {
                            print "ICI OUPS!!!!!";
                        }
                        ?>
                    </section>
                    <footer>
                        <?php
                        if (file_exists("./lib/php/p_footer.php")) {
                            include ("./lib/php/p_footer.php");
                        }
                        ?>
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>