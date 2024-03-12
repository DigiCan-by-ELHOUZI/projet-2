<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>




<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  

<?php

include('connect.php');

$query= "SELECT * FROM contacte";

$result= $db->query($query);
?>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> id_contacte </th>
            <th> message </th>
            <th> Nam </th>
            <th>E-mail</th>
            <th>subject </th>
            <th>suprimer </th>
            
          </tr>
        </thead>
        <tbody>
     
        <?php
               foreach($result as $produit){
            ?>
          <tr>
            <td> <?= $produit['id_cont'] ?></td>
            <td> <?= $produit['message'] ?></td>
            <td> <?= $produit['name'] ?></td>
            <td><?= $produit['email'] ?></td>
            <td> <?= $produit['subject'] ?></td>
            <td> <a href="deletemsg.php?a_id=<?php echo $produit['id_cont']; ?>" class="btn btn-danger" role="button">supprimer</a></td>
            
           
           
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