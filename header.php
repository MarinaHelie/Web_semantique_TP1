<?php
/**
  * Created by SublimeText3
 * User: Marina Helie
 * Date: 10/01/2016
 */
 if(!isset($_SESSION)) 
    { 
	session_start();
	$page = (isset($_GET['page'])) ? htmlentities($_GET['page']) : NULL;
	}
 
?>

<!doctype html>
<html>
    <head>
        <title>Web Semantiques LPSIL IDSE</title>
        <meta charset="UTF-8">
        <link href="bootstrap-3.3.1/css/bootstrap.css" rel="stylesheet">
      	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    	<script src="./js/jquery.js"></script>
    	<script src="./js/bootstrap.min.js"></script>
    </head>

    <body>
        <header class="navbar" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a id="titre" class="navbar-brand" href="index.php?page=index.tpl">Web Semantique</a>
                </div>
                <div class="collapse navbar-collapse">
                    <?php if ( isset($_SESSION['email']) ) { ?>
                        <form class="deconnexion" action="logout.php" method="post" name="deconnexion">
                            <a href="paint.php" type="button" class="btn btn-default navbar-btn">Pictionary</a>
                            <button class="btn btn-default navbar-btn navbar-right" type="submit" onclick="logout()">Deconnexion</button>
                        </form>
                    <?php }
                    else { ?>
                        <a href="connexion.php" class="btn btn-default navbar-btn navbar-right" type="button">Connexion</a>
                        <a href="inscription.php" class="btn btn-default navbar-btn navbar-right" type="button">Inscription</a>
                    <?php } ?>
                </div>
            </div>
        </header>
        
    </body>


</html>
