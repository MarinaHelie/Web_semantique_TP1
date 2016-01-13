<?php session_start();
include('connexionBDD.php');

if (!isset($_SESSION['email'])) {
    header("Location: main.php");
}

$drawingCommands = stripslashes($_POST['drawingCommands']);
$picture         = stripslashes($_POST['picture']);

try {
    
    $sql = $dbh->prepare("INSERT INTO drawings (id_utilisateur, commandes, dessin) VALUES (:id_utilisateur, :commandes, :dessin)");
    $sql->bindValue(":id_utilisateur" , $_SESSION['email']);
    $sql->bindValue(":commandes"      , $drawingCommands);
    $sql->bindValue(":dessin"         , $picture);

    if (!$sql->execute()) {
        echo "PDO::errorInfo():<br/>";
        $err = $sql->errorInfo();
        print_r($err);
    } else {
        header("Location: main.php");
    }

    $dbh = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    $dbh = null;
    die();
}