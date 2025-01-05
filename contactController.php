<?php
session_start();
include 'database/connectiondb.php';
$erreur="";
$succes="";
if($_SERVER['REQUEST_METHOD']=='POST'){
  if(!empty($_POST["nom"])){
    $nom=htmlspecialchars($_POST["nom"]);
  }else{
    $erreur="veuiller renseigner votre nom complet svp";

  }
  if(!empty($_POST["email"])){
    if(!preg_match("#[a-zA-Z0-9]+@{1}[a-zA-Z0-9]+\.{1}[a-zA-Z]{2,3}#",$_POST["email"])){
      $erreur="format email invalide";
    }else{
      $email=htmlspecialchars($_POST["email"]);
    }
  }
  if(!empty("message")){
    $message=htmlspecialchars($_POST["message"]);
  }else{
    $erreur="veuiller décrire votre besoin";
  }
  if(!empty($_POST["objet"])){
    $objet=htmlspecialchars($_POST["objet"]);
  }
  
}
try{
  $req="INSERT INTO contact(nom,email,objet,message)values(?,?,?,?)";
  $stm=$conn->prepare($req);
  $stm->bind_param("ssss",$nom,$email,$objet,$message);
  $res=$stm->execute();
  if($res){
    $_SESSION["contact"]="message envoyé avec succes";
    header("location:index.php");
  }

}catch(Exception){
  echo"erreur lors de l'envoi";
}
mysqli_close($conn);