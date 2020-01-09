<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h3 class="card-title text-dark text-center">Connexion</h3>
            <form class="form-signin" action="index.php?uc=connexion&action=authentification" method="post">
              <div class="form-label-group">
                <input type="text" name="identifiant" id="inputID" class="form-control" placeholder="Identifiant" required autofocus>
                <label for="inputID">Identifiant</label>
              </div>
                <br>
              <div class="form-label-group">
                <input type="password" name="mdp" id="inputmdp" class="form-control" placeholder="Mot de passe" required>
                <label for="inputmdp">Mot de passe</label>
              </div>
                <br>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit"><i class="fa fa-unlock"></i> Connexion</button>
              <hr class="my-4">
              <a class="btn btn-lg btn-danger btn-block text-uppercase" type="button" href="index.php?uc=connexion&action=pagecreercompte"><i class="fa fa-file-alt"></i> Créer un compte</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>