<?php/**
 * Created by SublimeText3
 * User: Marina Helie
 * Date: 10/01/2016
 */?>
<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8 /> 
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<script src="./js/jquery.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<title>Pictionnary - page d'inscription </title>
</head>
<body>
<?php include('header.php');?>
  <div class="container" id="container1">
        <div class="row centered-form">
            <div class="col-xs-12 col-sm-12 col-md-6 col-sm-offset-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title"><strong>inscrivez-vous  </strong></h1>
                    </div>
                    <div class="panel-body">
                        <form class="inscription" action="req_inscription.php" method="post" name="inscription">
                            <div class="form-group">
                               <input type="text" class="form-control" name="nom" id="nom" placeholder="Votre nom" />  
                            </div>

                            <div class="form-group">
                               <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Votre prenom" required/> 
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" required autofocus placeholder="'name@something.com'">
                            </div>

                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                         <input type="password" class="form-control" name="password" id="mdp1" onkeyup="validateMdp2()" title = "Le mot de passe doit contenir de 6 à 8 caractères alphanumériques." required placeholder="Entrer un mot de passe"  pattern="^[a-z0-9A-Z]{6,8}$">  
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="mdp2" required onkeyup="validateMdp2()" required placeholder="Confirmer le mot de passe">

					             		<script>  
					               		validateMdp2 = function(e) {  
					                    var mdp1 = document.getElementById('mdp1');  
					                    var mdp2 = document.getElementById('mdp2');  
					                    var req = /^[a-z0-9A-Z]{6,8}/;
					                    if (req.exec(mdp1.value) && mdp1.value==mdp2.value) {  
					                        // ici on supprime le message d'erreur personnalisé, et du coup mdp2 devient valide.  
					                        document.getElementById('mdp2').setCustomValidity('');  
					                    } else {  
					                        // ici on ajoute un message d'erreur personnalisé, et du coup mdp2 devient invalide.  
					                        document.getElementById('mdp2').setCustomValidity('Les mots de passes doivent être égaux.');  
					                    }  
					                	}  
					            		</script>  

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                               <input type="tel" class="form-control" name="telephone" id="telephone" placeholder="Entrer votre numéro de téléphone" />
                            </div>
                            <div class="form-group">
                               <input type="url" class="form-control" value="http://" name="siteweb" id="siteweb" placeholder="Entrer votre site web" />  
                            </div>
                            <div class="form-group">
                               <label class="radio-inline">
				  				<input type="radio" name="sexe" id="sexe" value="F" > Femme
								</label>
								<label class="radio-inline">
				  				<input type="radio" name="sexe" id="sexe" value="H"> Homme
								</label>
                            </div>
                            <div class="form-group">
                               <input type="date" class="form-control" name="datenaissance" id="datenaissance"  required onchange="computeAge()"/>  
							 	<script>  
				                computeAge = function(e) 
				    			{  
				                    try
		     					{  
		                        // j'affiche dans la console quelques objets javascript, ce qui devrait vous aider.  
		                        console.log(Date.now());  
		                        console.log(document.getElementById("datenaissance"));  
		                        console.log(document.getElementById("datenaissance").value);  
		                        console.log(Date.parse(document.getElementById("datenaissance").value));  
		                        console.log(new Date(0).getYear());  
		                        console.log(new Date(65572346585).getYear());  
							    console.log(document.getElementById("age"));
							    // modifier ici la valeur de l'élément age
							    var dateAtuel = new Date();
							    var anneeActuel = dateAtuel.getYear();
							    var moiActuel = dateAtuel.getMonth();
							    var jourActuel = dateAtuel.getDay();
							    var dateNaissance = Date.parse(document.getElementById("datenaissance").value);
							    var anneeNaissance = new Date(dateNaissance).getYear();
							    var moiNaissance = new Date(dateNaissance).getMonth();
							    var jourNaissance = new Date(dateNaissance).getDay();
							    if(moiActuel < moiNaissance)
							      {
							       document.getElementById("age").value = anneeActuel - anneeNaissance - 1;
							      }
							    else if(moiActuel > moiNaissance)
							      {
							       document.getElementById("age").value = anneeActuel - anneeNaissance;
							      }
							      else
							    	  {
							       		if(jourActuel < jourNaissance)
							       	  {
							       		document.getElementById("age").value = anneeActuel - anneeNaissance - 1;
							       	  }

							       else
							       {
							        document.getElementById("age").value = anneeActuel - anneeNaissance;
							       }
							      }
							     }
							    catch(e) 
							    {  
							        document.getElementById("age").value = "";
							    }  
							    }  

							
							</script>
						</div>
						<div class="form-group">
                               <input type="number" class="form-control" name="age" id="age" disabled />
                        </div>
                        <div class="form-group">
                              <input type="text" class="form-control" name="ville" id="ville" placeholder="Votre ville" />
                        </div>
                        <div class="form-group">
                             <input type="range" value="1.60" max="0" min="2.5" step="0.01"  name="taille" id="taille">
                        </div>
                        <div class="form-group">
                              <input type="color" value="#00000"  name="couleur" id="couleur">
                        </div>
                        <div class="form-group">
                             <input class="form-control" type="file" id="profilepicfile" onchange="loadProfilePic(this)">
					<input type="hidden" name="profilepic" id="profilepic"/>  
               <!-- l'input profilepic va contenir l'image redimensionnée sous forme d'une data url -->   
            <!-- c'est cet input qui sera envoyé avec le formulaire, sous le nom profilepic -->  
            <canvas id="preview" width="0" height="0"></canvas>  
            <!-- le canvas (nouveauté html5), c'est ici qu'on affichera une visualisation de l'image. -->  
            <!-- on pourrait afficher l'image dans un élément img, mais le canvas va nous permettre également   
            de la redimensionner, et de l'enregistrer sous forme d'une data url-->  
            <script>  
                loadProfilePic = function (e) {  
                    // on récupère le canvas où on affichera l'image  
                    var canvas = document.getElementById("preview");  
                    var ctx = canvas.getContext("2d");  
                    // on réinitialise le canvas: on l'efface, et déclare sa largeur et hauteur à 0  
                    //ctx.setFillColor("white");  
                    ctx.fillRect(0,0,canvas.width,canvas.height);  
                    canvas.width=0;  
                    canvas.height=0;  
                    // on récupérer le fichier: le premier (et seul dans ce cas là) de la liste  
                    var file = document.getElementById("profilepicfile").files[0];  
                    // l'élément img va servir à stocker l'image temporairement  
                    var img = document.createElement("img");  
                    // l'objet de type FileReader nous permet de lire les données du fichier.  
                    var reader = new FileReader();  
                   // on prépare la fonction callback qui sera appelée lorsque l'image sera chargée  
                    reader.onload = function(e) {  
                        //on vérifie qu'on a bien téléchargé une image, grâce au mime type  
                        if (!file.type.match(/image.*/)) {  
                            // le fichier choisi n'est pas une image: le champs profilepicfile est invalide, et on supprime sa valeur  
                            document.getElementById("profilepicfile").setCustomValidity("Il faut télécharger une image.");  
                            document.getElementById("profilepicfile").value = "";  
                        }  
                        else {  
                            // le callback sera appelé par la méthode getAsDataURL, donc le paramètre de callback e est une url qui contient   
                            // les données de l'image. On modifie donc la source de l'image pour qu'elle soit égale à cette url  
                            // on aurait fait différemment si on appelait une autre méthode que getAsDataURL.  
                            img.src = e.target.result;  
                            // le champs profilepicfile est valide  
                            document.getElementById("profilepicfile").setCustomValidity("");  
                            var MAX_WIDTH = 96;  
                            var MAX_HEIGHT = 96;  
                            var width = img.width;  
                            var height = img.height;  
                            var newhateur;
  							
  							if (width>height)
  							{
  								height = (height*MAX_HEIGHT)/width;
  								width = MAX_WIDTH;

  							}
  							else
  							{
  								width = (width*MAX_WIDTH)/height;
  								height=MAX_HEIGHT;
  							}
                            // A FAIRE: si on garde les deux lignes suivantes, on rétrécit l'image mais elle sera déformée  
                            // Vous devez supprimer ces lignes, et modifier width et height pour:  
                            //    - garder les proportions,   
                            //    - et que le maximum de width et height soit égal à 96  
                              
                              
                            canvas.width = width;  
                            canvas.height = height;  
                            // on dessine l'image dans le canvas à la position 0,0 (en haut à gauche)  
                            // et avec une largeur de width et une hauteur de height  
                            ctx.drawImage(img, 0, 0, width, height);  
                            // on exporte le contenu du canvas (l'image redimensionnée) sous la forme d'une data url  
                            var dataurl = canvas.toDataURL("image/png");  
                            // on donne finalement cette dataurl comme valeur au champs profilepic  
                            document.getElementById("profilepic").value = dataurl;  
                        };  
                    }  
                    // on charge l'image pour de vrai, lorsque ce sera terminé le callback loadProfilePic sera appelé.  
                    reader.readAsDataURL(file);  
                }  
            </script>  
                        </div>

                            <input type="submit" value="Inscription" class="btn btn-info btn-block">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>