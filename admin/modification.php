<?php
 
 include('includes/header.php'); 
?> 




<div class="container">
<?php

    include('connect.php');

    $id=$_GET['u_id'];

    $query="SELECT * FROM inscription WHERE id='$id'";

    $result= $db->query($query);
?>
<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-6 col-lg-6 col-md-6">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">modification</h1>
                
              </div>

                <form class="user" action="edit.php" method="post">
                <?php
                   foreach($result as $produi){
                ?>
                    <input type="hidden" name="id" value="<?php echo $produi['id']; ?>">


                    <div class="form-group">
                    <input type="text" name="nm"  class="form-control form-control-user" value="<?php echo $produi['nm']; ?> " >
                    </div>
                    <div class="form-group">
                    <input type="text" name="prenom"  class="form-control form-control-user" value="<?php echo $produi['prenom']; ?> ">
                    </div>
                    <div class="form-group">
                    <input type="text" name="age"  class="form-control form-control-user" value="<?php echo $produi['age']; ?> ">
                    </div>
                    <div class="form-group">
                    <input type="text" name="adresse"  class="form-control form-control-user" value="<?php echo $produi['adresse']; ?> ">
                    </div>
                    <div class="form-group">
                    <input type="text" name="nrtf"  class="form-control form-control-user" value="<?php echo $produi['nrtf']; ?> ">
                    </div>
                    <div class="form-group">
                    <input type="email" name="email"  class="form-control form-control-user" value="<?php echo $produi['email']; ?> ">
                    </div>
                    <?php
                        }
                       ?>
            
                    <!-- <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block"> Login </button>
                    <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block"> Login </button> -->
                    <div class="container-login100-form-btn">
                        <input type="submit" value="Enregistrer" class="login100-form-btn">
                        <a type="submit" href="#"class="login100-form-btn">Retour</a>
                    </div>
                    <hr>
                </form>


            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>


<!-- <?php
// include('includes/scripts.php'); 
?> -->