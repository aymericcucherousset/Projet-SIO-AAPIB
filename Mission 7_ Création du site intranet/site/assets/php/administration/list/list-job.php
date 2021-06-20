<?php
require "assets/php/classes/job.php";
?>
<h2 class="text-center my-2">Liste des métiers</h2>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Membres</th>
    </tr>
  </thead>
  <tbody>
    <?php $x = 0;
    foreach (getAllJob() as $j) { 
        $metier = new Job($j['job_id']);?>
        <tr <?php if($x%2 == 0){?> class="table-dark" <?php } ?>>
            <th scope="row"><?= $metier->getNameJob() ?></th>
            <td><?= $metier->getNbMembresDuJob() ?></td>
        </tr>
        <?php $x += 1;?>
    <?php } ?>
  </tbody>
</table>