<?php
$local="sql305.infinityfree.com";
$user="if0_37610030";
$password="AMQqZG4P0ZCvGZ";
try{
    $conn= mysqli_connect($local,$user,$password);
    //echo "connexion avec succes";

}catch(Exception){
   // echo"erreur de connexion";

}


try{
    $select_db=mysqli_select_db($conn, "if0_37610030_Auth_db");
    if($select_db){
       // echo"selection réussie";
    }
    

}catch(Exception){
    echo "erreur de selection";

}
