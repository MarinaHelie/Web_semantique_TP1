<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8 /> 
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <title>Pictionnary - page de connexion </title>
</head>
<body>
<?php include('header.php');?>
<div class="container" >
    <div class="row centered-form">
            <div class="col-xs-12 col-sm-12 col-md-6 col-sm-offset-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title"><strong>Connectez-vous  </strong></h1>
                    </div>
                    <div class="panel-body">
                        <form  action="req_connexion.php" method="post" name="connexion">
                            <div class="form-group">
                                <label for="email">Votre Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Saisir votre email" required autofocus >
                            </div>
                            <div class="form-group">
                                <label for="pwd">Mot de passe </label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Saisir votre mot de passe" aria-required="required" pattern="[a-zA-Z0-9]{6,8}" title="Le mot de passe doit contenir de 6 à 8 caractères alphanumériques" required>
                            </div>
                            <input type="submit" value="Connexion" class="btn btn-info btn-block">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
