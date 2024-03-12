<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>modification</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../page_cnx/css/style.css">

</head>
<body>

<?php

include('connect.php');

$id=$_GET['u_id'];

$req="SELECT * FROM inscription WHERE id='$id'";

$res= $db->query($req);
?>

<div class="form-container">

   <form action="edit.php" method="post">
      <h3>modification</h3>
     <?php
         foreach($res as $produi){
    ?>
       <input type="hidden" name="id" value="<?php echo $produi['id']; ?>">  
      
      <input type="text" name="nm" value="<?php echo $produi['nm']; ?> ">
      <input type="text" name="prenom" value="<?php echo $produi['prenom']; ?> ">
      <input type="text" name="age" value="<?php echo $produi['age']; ?> ">
      <input type="text" name="adresse" value="<?php echo $produi['adresse']; ?> ">
      <input type="text" name="nrtf" value="<?php echo $produi['nrtf']; ?> ">

      <input type="email" name="email" value="<?php echo $produi['email']; ?> ">
      <?php
                        }
                       ?>

      <input type="submit"  value="Enregistrer" class="form-btn">
      <a type="submit" href="joueurs.php"class="login100-form-btn">Retour</a>
   </form>

</div>

</body>
</html>