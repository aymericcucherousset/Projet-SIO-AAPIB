<div class="card col-12 col-md-6 col-lg-4 p-0" >
    <h3 class="card-header"><a class="text-decoration-none" href="index.php?url=personnel&id=<?= $user['id'] ?>"><?= $user['last_name']." ".$user['first_name'] ?></a></h3>
    <div class="card-body">
        <h5 class="card-title"><?= $user['name_service'] ?></h5>
        <h6 class="card-subtitle text-muted"><?= $user['job_label'] ?></h6>
    </div>
    <img class="card-img-top" src="<?= $imagePath ?>" alt="Card image cap">
    <!-- <div class="card-body">
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div> -->
    <div class="card-body">
        <a href="index.php?url=personnel&id=<?= $user['id'] ?>" class="card-link">Détails</a>
    </div>
    <div class="card-footer text-muted"><?= $joinDate ?></div>
</div>