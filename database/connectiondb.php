<?php
$local="localhost";
$user="root";
$password="";
try{
    $conn= mysqli_connect($local,$user,$password);
    echo "connexion avec succes";

}catch(Exception){
   // echo"erreur de connexion";

}


try{
    $select_db=mysqli_select_db($conn, "porfolio");
    if($select_db){
       // echo"selection réussie";
    }
    

}catch(Exception){
    echo "erreur de selection";

}
