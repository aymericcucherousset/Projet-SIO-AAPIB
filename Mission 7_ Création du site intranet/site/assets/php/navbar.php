<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="./">AAPIB</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto"></ul>
      <ul class="navbar-nav ml-auto">
        <?php if (!empty($_SESSION['id'])) { ?>
          <li class="nav-item">
            <a class="nav-link" href="index.php?url=nouveautes">Nouveautés</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?url=personnel">Personnel</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Outils</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="http://glpi.intranet.local" target="_blank">GLPI</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="http://nextcloud.intranet.local" target="_blank">NextCloud</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="http://zabbix.intranet.local" target="_blank">Zabbix</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="http://aapib.local" target="_blank">Site Vitrine</a>
            </div>
          </li>
          <?php if (isAdmin()) { ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Administration</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="index.php?url=administration&action=add-service">Ajout de service</a>
              <a class="dropdown-item" href="index.php?url=administration&action=add-job">Ajout de métier</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="index.php?url=administration&action=assign-service">Attribuer un service</a>
              <a class="dropdown-item" href="index.php?url=administration&action=assign-job">Attribuer un métier</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="index.php?url=administration&action=list-user">Liste d'utilisateurs <span class="badge rounded-pill bg-primary"><?= getNbUser() ?></span></a>
              <a class="dropdown-item" href="index.php?url=administration&action=list-service">Liste de services <span class="badge rounded-pill bg-primary"><?= getNbService() ?></span></a>
              <a class="dropdown-item" href="index.php?url=administration&action=list-job">Liste de métiers <span class="badge rounded-pill bg-primary"><?= getNbJob() ?></span></a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="index.php?url=administration">Administration</a>
            </div>
          </li>
          <?php } ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Profil</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="index.php?url=profil">Profil</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="index.php?url=deconnexion">Deconnexion</a>
            </div>
          </li>
        <?php }else { ?>
          <li class="nav-item">
            <a class="nav-link" href="index.php?url=connexion">Connexion</a>
          </li>
        <?php } ?>
        </ul>
    </div>
  </div>
</nav>