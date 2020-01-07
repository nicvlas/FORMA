<nav class="fixed-top">
  <!-- Navbar -->
  <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="">Maison des Ligues</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarsExample01">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php?uc=accueil">Accueil<span class="sr-only">(current)</span></a>
          </li>
          <?php
          if(isset($_SESSION['connexion']) && $_SESSION['connexion'] == 0)
          {
            ?>
          <li class="nav-item active">
            <a class="nav-link" href="index.php?uc=connexion&action=seconnecter">Connexion<span class="sr-only">(current)</span></a>
          </li>
          <?php
          }
          ?>
          <?php
          if(isset($_SESSION['connexion']) && $_SESSION['connexion'] == 1)
          {
            ?>
          <li class="nav-item active">
            <a class="nav-link" href="index.php?uc=connexion&action=déco">Déconnexion<span class="sr-only">(current)</span></a>
          </li>
          <?php
          }
          ?>
          <li class="nav-item">
            <a class="nav-link" href="index.php?uc=Utilisateur&action=voirDomaines">Voir le catalogue</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?uc=Compta&action=creerUneFormation">Ajouter une formation</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?uc=Compta&action=modifierUneFormationD">Modifier une formation</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?uc=Compta&action=supprimerUneFormationD">Supprimer une formation</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?uc=Compta&action=listeParticipants">Liste des participants</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?uc=Compta&action=Historiser">Historisation</a>
          </li>
        </ul>
      </div>
  </nav>

  <!-- Progressbar -->
  <div class="wrap_progressbar ">
    <div class="progressbar-container">
      <div class="progress-bar" id="myBar"></div>
    </div>
  </div>
</nav>