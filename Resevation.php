<?php
$serveur="localhost";
//nom de la BD quon va creer au niveau de phpmyadmin
$dbname="projet";
//
$user="root";
$pass="";
//recuperer les informations du html avec le php avec le name qui est dans input
$email=$_POST["nom"];
$prenom=$_POST["prenom"];
$nom=$_POST["email"];
$numero=$_POST["numero"];
$nombre=$_POST["nombre"];
$dat=$_POST["dat"];
$heure=$_POST["heure"];
$txt=$_POST["txt"];
 

try{
    //se connecter a la BD
    $dbco=new PDO ("mysql:host=$serveur; dbname=$dbname",$user,$pass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //creer une BD et une table pour sctoker les informations jai crer avecphpmyadmin directement
    //inserer les donnees recus
    $sth=$dbco->prepare("INSERT INTO reservation(nom, prenom, email, numero, nombre, dat,heure, txt) VALUES(:nom, :prenom, :email, :numero, :nombre, :dat, :heure, :txt)");

    $sth->bindParam(':nom',$nom);
    $sth->bindParam(':prenom',$prenom);
    $sth->bindParam(':email',$email);
    $sth->bindParam(':numero',$numero);
    $sth->bindParam(':nombre',$nombre);
    $sth->bindParam(':dat',$dat);
    $sth->bindParam(':heure',$heure);
    $sth->bindParam(':txt',$txt);
    $sth->execute();
    //renvoyer a l'utilisateur la page de remerciement
    header("location:mercie.html");
}
//gestion en cas d'erreur
catch(PDOException $e){
     echo 'Erreur de traitement:' . $e->getMessage() ;

}

?>