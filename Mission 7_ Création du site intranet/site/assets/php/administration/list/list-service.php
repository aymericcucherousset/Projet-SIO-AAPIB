<?php
require "assets/php/classes/service.php";
?>
<h2 class="text-center my-2">Liste des services</h2>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Membres</th>
    </tr>
  </thead>
  <tbody>
    <?php $x = 0;
    foreach (getAllServices() as $serv) { 
        $service = new Service($serv['id_service']);?>
        <tr <?php if($x%2 == 0){?> class="table-dark" <?php } ?>>
            <th scope="row"><?= $service->getNameService() ?></th>
            <td><?= $service->getNbMembresDuService() ?></td>
        </tr>
        <?php $x += 1;?>
    <?php } ?>
  </tbody>
</table>