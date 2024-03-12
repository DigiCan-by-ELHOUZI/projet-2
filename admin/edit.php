<?php

include('connect.php');


$id=$_POST['id'];
$Nmm=$_POST['nm'];
$Prnm=$_POST['prenom'];
$Age=$_POST['age'];
$Adrs=$_POST['adresse'];
$Nrtf=$_POST['nrtf'];
$email=$_POST['email'];



$req="UPDATE inscription SET nm ='$Nmm', prenom ='$Prnm' , age = '$Age' , adresse = ' $Adrs' , nrtf = '$Nrtf' , email = '$email'  WHERE id = '$id'";

  
 


if($db->exec($req)){

    header("Location:joueurs.php");  

}
else{
    echo "error in query ....";
}
?>
