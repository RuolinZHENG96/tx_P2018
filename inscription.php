<!DOCTYPE html>
<html lang="fr">
<head>
	<?php
    require_once "element/header.php";
  ?>
</head>
  <body id="page_inscription">
    <div class="container">
			<div class="row main">
				<div class="main-login main-center">
  				<h2 class="text_center">Inscription</h2>
  				<form class="" method="post" action="controller/add_user_email.php">

            <div class="form-group">
              <label for="familyName" class="cols-sm-2 control-label">Nom</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="familyName" id="familyName"  placeholder="Entrer votre nom"/>
                </div>
              </div>
            </div>

  						<div class="form-group">
  							<label for="firstName" class="cols-sm-2 control-label">Prénom</label>
  							<div class="cols-sm-10">
  								<div class="input-group">
  									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
  									<input type="text" class="form-control" name="firstName" id="firstName"  placeholder="Entrer votre prénom"/>
  								</div>
  							</div>
  						</div>

  						<div class="form-group">
  							<label for="email" class="cols-sm-2 control-label">Email</label>
  							<div class="cols-sm-10">
  								<div class="input-group">
  									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
  									<input type="text" class="form-control" name="email" id="email"  placeholder="Entrer votre email"/>
  								</div>
  							</div>
  						</div>

  						<div class="form-group">
  							<label for="password" class="cols-sm-2 control-label">Mot de passe</label>
  							<div class="cols-sm-10">
  								<div class="input-group">
  									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
  									<input type="password" class="form-control" name="password" id="password"  placeholder="Entrer votre mot de passe"/>
  								</div>
  							</div>
  						</div>

  						<div class="form-group">
  							<label for="confirm" class="cols-sm-2 control-label">Confirmer mot de passe</label>
  							<div class="cols-sm-10">
  								<div class="input-group">
  									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
  									<input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirmer votre mot de passe"/>
  								</div>
  							</div>
  						</div>

  						<div class="form-group text_center">
                <button  type = "submit" class="btn btn-light">M'inscrire</button>
  						</div>

  					</form>
				</div>
			</div>
		</div>
    <?php require_once "element/footer.php"?>
  </body>
</html>
