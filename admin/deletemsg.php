<?php

$id= $_GET['a_id'];

include('connect.php');


$query="DELETE FROM contacte WHERE id_cont='$id'";



if($db->exec($query)){
    header("Location:messages.php"); 
}
else {
    
    echo "error in query ....";
}


?>