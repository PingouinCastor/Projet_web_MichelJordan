<!DOCTYPE html>
<?php

include './admin/lib/php/adm_liste_include.php';
$cnx = Connexion::getInstance($dsn, $user, $pass);
session_start();
?>
<html>
    <head>
        <meta charset:="UTF-8">
        <title>La di&eacute;grosserie</title>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">      
        <script src="admin/lib/js/js_validation/dist/jquery.validate.js"></script>
        <script src="admin/lib/js/gt_functionval.js"></script>
        <script src="admin/lib/js/gt_function.js"></script>
        <link rel="stylesheet" type="text/css" href="admin/lib/css/style_diegro.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        
    </head>
    <body>
         
            
        <div class="container">
            <header>
                <h2>La di&eacute;grosserie</h2>
            </header>
        </div>
        <div class="container fond">
            <div class="row">
                <div class="col-sm-2">
                    <nav id="menu">
                        <?php
                        if (file_exists("./lib/php/p_menu.php")) {
                            include ("./lib/php/p_menu.php");
                        }
                        ?>
                    </nav>
                </div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-11">
                            <a href="admin/index.php" class="float-right btn btn-info" type="button">
                                Administration
                            </a>     
                        </div>
                    </div>
                    <section>
                        <?php
                        /* le contenu change en fonction de la navigation */
                        if (!isset($_SESSION['page'])) {
                            $_SESSION['page'] = "./pages/accueil.php";
                        } else {

                            if (isset($_GET['page'])) {
                                //print $_GET['page'];
                                $_SESSION['page'] = "./pages/" . $_GET['page'];
                            }
                        }

                        //print $_SESSION['page'];  
                        if (file_exists($_SESSION['page'])) {
                            include $_SESSION['page'];
                        } else {
                            print "OUPS!!!!!";
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
</html>

