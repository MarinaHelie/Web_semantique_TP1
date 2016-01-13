<?php 
include('connexionBDD.php');
$email=stripslashes($_POST['email']);
$password=stripslashes($_POST['password']);
try {
    // En SQL: sélectionner tous les tuples de la table USERS tels que l'email est égal à $email et tels que le password est égal à $password.
    $sql = $dbh->query("SELECT * FROM users WHERE email='".$email."' AND password='".$password."'");
    if ($sql->rowCount() < 1) {
        header("Location: connexion.php");
        print "L'email ou le mot de passe est incorrect";
    }
    else {
        session_start();
        // ensuite on requête à nouveau la base pour l'utilisateur qui vient d'être inscrit, et
        $sql = $dbh->query("SELECT u.id, u.email, u.nom, u.prenom, u.couleur, u.profilepic FROM USERS u WHERE u.email='".$email."'");
        if ($sql->rowCount()<1) {
            header("Location: ../main.php?erreur=".urlencode("un problème est survenu"));
        }
        else {
            $sqlfetch = $sql->fetch();
            $_SESSION['id'] = $sqlfetch['id'];
            $_SESSION['email'] = $sqlfetch['email'];
            $_SESSION['nom'] = $sqlfetch['nom'];
            $_SESSION['prenom'] = $sqlfetch['prenom'];
            $_SESSION['couleur'] = $sqlfetch['couleur'];
            $_SESSION['profilepic'] = $sqlfetch['profilepic'];
        }
        header("Location: main.php");
    }
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    $dbh = null;
    die();
}
 ?>