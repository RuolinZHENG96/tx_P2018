<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">Temps Libre</a>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav text-uppercase ml-auto">
        <li class="nav-item">
          <span class="nav-link js-scroll-trigger" data-toggle="modal" href="#loginModal">Se connecter</span>
        </li>
        <li class="nav-item">
          <span class="nav-link js-scroll-trigger" data-toggle="modal" href="#inscriptionModal">S'inscrire</span>
        </li>
      </ul>
    </div>
  </div>
</nav>



<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Se connecter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <input placeholder="Email..." name="email" class="form-control"><br>
            <input type="password" placeholder="Password..." name="password" class="form-control"><br>

              <input type="submit" value="Connexion" class="btn btn-primary ">
              <img src="../GoogleLogin/img/icon-google.svg" alt="icon_google" class="icon_google">
              <input type="button" onclick="window.location = '<?php echo $loginURL ?>';" value="Continuer avec Google" class="btn btn-danger loginBtn loginBtn-google">
              <br><br><a href="">Mot de passe oublié?</a><br>

        </form>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="inscriptionModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">S'inscrire</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>

              <a class="btn btn-primary" href="../GoogleLogin/inscription.php">S'inscrire avec email</a><br><br>
              <img src="../GoogleLogin/img/icon-google.svg" alt="icon_google" class="icon_google">
              <input type="button" onclick="window.location = '<?php echo $loginURL ?>';" value="Continuer avec Compte Google" class="btn btn-danger loginBtn loginBtn-google">

        </form>
      </div>
    </div>
  </div>
</div>

<!-- <div class="container" style="margin-top: 100px">
    <div class="row justify-content-center">
        <div class="col-md-6 col-offset-3" align="center">

            <img src="img/logo.png"><br><br>

            <form >
                <input placeholder="Email..." name="email" class="form-control"><br>
                <input type="password" placeholder="Password..." name="password" class="form-control"><br>
                <input type="submit" value="Log In" class="btn btn-primary">
                <input type="button" onclick="window.location = '<?php echo $loginURL ?>';" value="Log In With Google" class="btn btn-danger">
            </form>

        </div>
    </div>
</div> -->
