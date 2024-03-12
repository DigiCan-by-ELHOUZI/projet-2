<?php

@include '../page_cnx/config.php';

if(isset($_POST['submit'])){

   $Nmm = mysqli_real_escape_string($conn, $_POST['nm']);
   $Prnm = mysqli_real_escape_string($conn, $_POST['prenom']);
   $Age = mysqli_real_escape_string($conn, $_POST['age']);
   $Adrs = mysqli_real_escape_string($conn, $_POST['adresse']);
   $Nrtf = mysqli_real_escape_string($conn, $_POST['nrtf']);

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['passwor']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM inscription WHERE email = '$email' && passwor = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO inscription(nm, prenom, age, adresse, nrtf, email, passwor, user_type) VALUES('$Nmm','$Prnm','$Age','$Adrs','$Nrtf','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:joueurs.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Inscription</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../page_cnx/css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Nouvelle Inscription</h3>
      
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>

      
      <input type="text" name="nm" required placeholder="Nom">
      <input type="text" name="prenom" required placeholder="Prenom">
      <input type="text" name="age" required placeholder="Votre age">
      <input type="text" name="adresse" required placeholder="Votre adresse">
      <input type="text" name="nrtf" required placeholder="votre numéro de téléphone">

      <input type="email" name="email" required placeholder="E-mail">
      <input type="password" name="passwor" required placeholder="mot de passe">
      <input type="password" name="cpassword" required placeholder="confirmer mot de passe">
      <select name="user_type">
         
         <option value="admin">admin</option>
      </select>
      <input type="submit" name="submit" value="register now" class="form-btn">
      <a type="submit" href="joueurs.php"class="login100-form-btn">Retour</a>
   </form>

</div>

</body>
</html>