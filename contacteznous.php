<?php
$serveur="localhost";
$dbname="projet";
$user="root";
$pass="";
$email=$_POST["email"];
$prenom=$_POST["prenom"];
$nom=$_POST["nom"];
$txt=$_POST["txt"];
 

try{
    $dbco=new PDO ("mysql:host=$serveur; dbname=$dbname",$user,$pass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sth=$dbco->prepare("INSERT INTO contactez_nous(email, prenom, nom, txt) VALUES(:email, :prenom, :nom, :txt)");

    $sth->bindParam(':email',$email);
    $sth->bindParam(':prenom',$prenom);
    $sth->bindParam(':nom',$nom);
    $sth->bindParam(':txt',$txt);
    $sth->execute();
    header("location:merci.html");
}
catch(PDOException $e){
     echo 'Erreur de traitement:' . $e->getMessage() ;

}

?>