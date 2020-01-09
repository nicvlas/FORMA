<div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5">
          <div class="card-img-left d-none d-md-flex">
          </div>
          <div class="card-body">
            <h3 class="card-title text-dark text-center">Créer votre compte</h3>
            <form class="form-signin" action="index.php?uc=connexion&action=creercompte" method="post">

              <div class="form-label-group">
                <input type="text" name="util_prenom" id="inputprenom" maxlength="20" class="form-control" placeholder="Prénom" required autofocus>
                <label for="inputprenom">Prénom</label>
              </div>

              <div class="form-label-group">
                <input type="text" name="util_nom" id="inputnom" maxlength="20" class="form-control" placeholder="Nom" required>
                <label for="inputnom">Nom</label>
              </div>

              <div class="form-label-group">
                <input type="mail" name="util_mail" id="inputmail" maxlength="30" class="form-control" placeholder="Nom" required>
                <label for="inputmail">Mail</label>
              </div>
              
              <hr>

              <div class="form-label-group">
                <input type="text" name="util_adresse" id="inputadresse" maxlength="50" class="form-control" placeholder="Adresse" required>
                <label for="inputadresse">Adresse</label>
              </div>
              
              <div class="form-label-group">
                <input type="number" name="util_cp" id="inputCP" class="form-control" placeholder="Code Postal" required>
                <label for="inputCP">Code Postal</label>
              </div>

              <div class="form-label-group">
                <input type="text" name="util_ville" id="inputville" maxlength="30" class="form-control" placeholder="Ville" required>
                <label for="inputville">Ville</label>
              </div>

              <hr>

              <label>Association</label>
              <div class="form-label-group">
                <select name="util_assoc" class="form-control" id="inputConfirmPassword">
                  <option value="01">Association Rugby</option>
                  <option value="02">Association Football</option>
                </select>
              </div>

              <label>Fonction M2L</label>
              <div class="form-label-group">
                <select name="util_fonction" class="form-control" id="inputConfirmPassword">
                  <option value="S">Salarié</option>
                  <option value="B">Bénévole</option>
                  <option value="A">Administrateur</option>
                </select>
              </div>

              <label>Statut</label>
              <div class="form-label-group">
                <select name="util_statut" class="form-control">
                    <option value="etudiant">Etudiant</option>
                    <option value="prof">Professeur</option>
                    <option value="secretaire">Secretaire</option>
                </select>
              </div>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Valider</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>