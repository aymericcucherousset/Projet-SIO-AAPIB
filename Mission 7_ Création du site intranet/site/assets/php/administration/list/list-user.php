<?php 
require("assets/php/classes/personnel.php"); 
if (!empty($_GET['remove-user'])) {
    $personnel = new Personnel($_GET['remove-user']);
    $personnel->setDisabled();
    header('Location: index.php?url=administration&action=list-user');
}
if (!empty($_GET['active-user'])) {
    $personnel = new Personnel($_GET['active-user']);
    $personnel->setActive();
    header('Location: index.php?url=administration&action=list-user');
}
?>
<h2 class="text-center my-2">Liste des utilisateurs</h2>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Poste</th>
      <th scope="col">Service</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $x = 0;
    foreach (getAllPersonnel() as $user) {
        $personnel = new Personnel($user['id']);?>
        <tr <?php if($x%2 == 0){?> class="table-dark" <?php } ?>>
            <th scope="row"><?= $personnel->getUserLastName() ?></th>
            <td><?= $personnel->getUserFirstName() ?></td>
            <td><?= $personnel->getUserJob() ?></td>
            <td><?= $personnel->getUserService() ?></td>
            <?php if ($personnel->getUserStatus() == 0) { ?>
                <td><a href="index.php?url=administration&action=list-user&remove-user=<?= $personnel->getId() ?>" <?php if($x%2 != 0){?> class="text-primary" <?php }else{ ?> style="color: #ffffff;" <?php } ?> ><i class="far fa-trash-alt"></i></a></td>
            <?php }else{ ?>
                <td><a href="index.php?url=administration&action=list-user&active-user=<?= $personnel->getId() ?>" <?php if($x%2 != 0){?> class="text-primary" <?php }else{ ?> style="color: #ffffff;" <?php } ?> ><i class="fas fa-plus"></i></a></td>
            <?php } ?>
        </tr>
        <?php $x += 1;?>
    <?php } ?>
  </tbody>
</table>
