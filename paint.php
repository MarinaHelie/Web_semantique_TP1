<?php
/**
  * Created by SublimeText3
 * User: Marina Helie
 * Date: 10/01/2016
 */
   
     
        session_start(); 
       if (!isset($_SESSION['email'])) {
        header("Location: main.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8 />
    <title>Pictionnary</title>
    <link rel="stylesheet" media="screen" href="css/styles.css" >
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.min.js"></script>

    <script>

        // les quatre tailles de pinceau possible.
        var sizes=[8,20,44,90];
        // la taille et la couleur du pinceau
        var size, color;
        // la dernière position du stylo
        var x0, y0;
        // le tableau de commandes de dessin à envoyer au serveur lors de la validation du dessin
        var drawingCommands = [];

        var setColor = function() {
            // on récupère la valeur du champs couleur
            color = document.getElementById('color').value;
            console.log("color:" + color);
        }

       var setSize = function() {  
        // ici, récupèrez la taille dans le tableau de tailles, en fonction de la valeur choisie dans le champs taille.  
        size = sizes[document.getElementById('size').value];
        console.log("size:" + size);  
    }
        window.onload = function() {
            var canvas = document.getElementById('myCanvas');
            canvas.width = 600;
            canvas.height= 350;


            var context = canvas.getContext('2d');
            
             canvas.style.marginLeft = ((window.innerWidth - canvas.width) / 2) + "px";

            window.onresize = function() {
             canvas.style.marginLeft = ((window.innerWidth - canvas.width) / 2) + "px"};

            setSize();
            setColor();
            document.getElementById('size').onchange = setSize;
            document.getElementById('color').onchange = setColor;

            var isDrawing = false;

            
                // crér un nouvel objet qui représente une commande de type "start", avec la position, la couleur
            

            var startDrawing = function(e) {
                isDrawing = true;
            };

            var stopDrawing = function(e) {
                isDrawing = false;
            };

            
                    // ici, créer un nouvel objet qui représente une commande de type "draw", avec la position, et l'ajouter à la liste des commandes.
            var draw = function(e) 
            {
            if (isDrawing) 
            {
            drawingCommands.push(
            {
                    command : "draw",
                    x : e.x - this.offsetLeft,
                    y : e.y - this.offsetTop,
                    size: size / 2,
                    color: color
            });
            context.beginPath();
            context.fillStyle = color;
            context.arc(e.x - this.offsetLeft, e.y - this.offsetTop, size / 2, 0, 2 * Math.PI);
            context.fill();
            context.closePath();
                    // ici, dessinez un cercle de la bonne couleur, de la bonne taille, et au bon endroit. 
            }
            };

            canvas.onmousedown = startDrawing;
            canvas.onmouseout = stopDrawing;
            canvas.onmouseup = stopDrawing;
            canvas.onmousemove = draw;

            document.getElementById('restart').onclick = function()
             {
                drawingCommands.push(
                {
                    command : "clear"
                });
                context.clearRect(0, 0, canvas.width, canvas.height);
            };
                // ici ajouter à la liste des commandes une nouvelle commande de type "clear"
                // ici, effacer le context, grace à la méthode clearRect.
            

            document.getElementById('validate').onclick = function() {
                // la prochaine ligne transforme la liste de commandes en une chaîne de caractères, et l'ajoute en valeur au champs "drawingCommands" pour l'envoyer au serveur.
                document.getElementById('drawingCommands').value = JSON.stringify(drawingCommands);
                document.getElementById('picture').value = canvas.toDataURL();
            };

                // ici, exportez le contenu du canvas dans un data url, et ajoutez le en valeur au champs "picture" pour l'envoyer au serveur.
            $("#my-tools").draggable();
        };
    </script>
</head>
<body>
 <?php include('header.php'); ?>
<canvas id="myCanvas" style="border:1px solid #000000;"></canvas>
<div class="container" >
    <div class="row centered-form">
            <div class="col-xs-12 col-sm-12 col-md-6 col-sm-offset-4 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form  action="req_paint.php" method="post" name="connexion">
                            <div class="form-group">
                                <label for="size">Taille&nbsp;:</label>
                                <input class="input-md" type="range" id="size" min="0" max="3" step="1" value="0"/>
                            </div>
                            <div class="form-group">
                                <label for="color">Couleur&nbsp;:</label>
                                <input class="form-control input-md" type="color" id="color" value="#000000" onchange=""/>
                            </div>
                            <input class="btn btn-danger" id="annuler" type="button" value="Annuler" onclick='location.href="main.php"'/>
                            <input class="btn btn-warning" id="restart" type="button" value="Recommencer"/>
                            <input type="hidden" id="drawingCommands" name="drawingCommands"/>
                            <!-- à quoi servent ces champs hidden ? -->
                             <!--  * Ces champs servent à envoyer des données qui ne sont pas contenus dans des input par default mais plutôt des données calculées -->
                            <input type="hidden" id="picture" name="picture"/>
                            <input class="btn btn-success" id="validate" type="submit" value="Valider"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>