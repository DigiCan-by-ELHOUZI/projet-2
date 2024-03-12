<?php

$id= $_GET['u_id'];

include('connect.php');


$req="DELETE FROM inscription WHERE id='$id'";



if($db->exec($req)){
    header("Location:joueurs.php"); 
}
else {
    
    echo "error in query ....";
}


?>