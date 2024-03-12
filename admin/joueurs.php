<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>





<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Profil admin
            <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              <a href="ajt_admin.php" style="color: aliceblue;" class="btn">Ajouter profil admin</a>
            </button>
    </h6>
  </div>

<?php

include('connect.php');

$query= "SELECT * FROM inscription";

$result= $db->query($query);
?>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Name </th>
            <th>Prenom </th>
            <th>age</th>
            <th>Adresse </th>
            <th>Numéro Télephone </th>
            <th>E-mail </th>
            <th>User_type </th>
            <th>modification </th>
            <th>suprimer </th>
            
          </tr>
        </thead>
        <tbody>
     
        <?php
               foreach($result as $produi){
            ?>
          <tr>
            <td> <?= $produi['id'] ?></td>
            <td> <?= $produi['nm'] ?></td>
            <td> <?= $produi['prenom'] ?></td>
            <td><?= $produi['age'] ?></td>
            <td> <?= $produi['adresse'] ?></td>
            <td> <?= $produi['nrtf'] ?></td>
            <td> <?= $produi['email'] ?></td>
            <td> <?= $produi['user_type'] ?></td>
            <td> <a href="modif.php?u_id=<?php echo $produi['id']; ?>" class="btn btn-info" role="button">Modifier</a></td>
            <td> <a href="delete.php?u_id=<?php echo $produi['id']; ?>" class="btn btn-danger" role="button">supprimer</a></td>
           
           
          </tr>
          <?php
        }
        ?>
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php

include('includes/footer.php');
?>