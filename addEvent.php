<?php
	require_once "element/first_header.php";
?>
<head>
	<?php require_once "element/header.php"?>
	<link href='css/addEvent.css' rel='stylesheet'>

</head>
  <body>
    <div class="container" style="margin-top: 100px">



        <h2 class="text-center font-bold pt-4 pb-5 mb-5"><strong>Ajouter une activité</strong></h2>

        <!-- Stepper -->
        <div class="steps-form-2">
            <div class="steps-row-2 setup-panel-2 d-flex justify-content-between">
                <div class="steps-step-2">
	                    <a href="#step-1" type="button" class="btn btn-amber btn-circle-2 " data-toggle="tooltip" data-placement="top" title="Basic Information">1</a>
                </div>
                <div class="steps-step-2">
                    <a href="#step-2" type="button" class="btn btn-blue-grey btn-circle-2 " data-toggle="tooltip" data-placement="top" title="Personal Data">2</a>
                </div>
                <div class="steps-step-2">
                    <a href="#step-3" type="button" class="btn btn-blue-grey btn-circle-2 " data-toggle="tooltip" data-placement="top" title="Terms and Conditions">3</a>
                </div>
                <div class="steps-step-2">
                    <a href="#step-4" type="button" class="btn btn-blue-grey btn-circle-2 " data-toggle="tooltip" data-placement="top" title="Finish">4</a>
                </div>
            </div>
        </div>

        <!-- First Step -->
        <form role="form" action="confirmation.php" method="post">
            <div class="row setup-content-2" id="step-1">
                <div class="col-md-8 gray-container">
									<div class="title-block col-md-2">
										<h4>Quoi ?</h4>
									</div>
									<div class="main-block">
										<div class="col-md-10 sub-block">
											<div class="row">
												<h3>Description de l'événement</h3>
											</div>
											<div class="row">
												<h5>Titre</h5>
												<input type="text" name="title" class="form-control" required>
											</div>
											<div class="row">
												<h5>Catégorie</h5>
												<select name="category">
											    <option value="travail" selected>Travail</option>
											    <option value="etude">Etude</option>
											    <option value="diversement">Diversement</option>
											  </select>
											</div>
											<div class="row">
												<h5>Description</h5>
												<textarea name="description" rows="4" cols="50" class="form-control" placeholder="Ajouter la Description ..."></textarea>
											</div>
											<div class="row">
												<h5>Annexe</h5>
											</div>
											<div class="row">
													<h5 >Vous ne savez pas encore ? <a href="#"> Lancer un sondage</a></h5>
											</div>
										</div>

									</div>

                  <button class="btn btn-info btn-rounded nextBtn-2 float-right" type="button">Suivant</button>
                </div>
            </div>

            <!-- Second Step -->
            <div class="row setup-content-2" id="step-2">
							<div class="col-md-8 gray-container">
								<div class="title-block col-md-2">
									<h4>Qui ?</h4>
								</div>
								<div class="main-block">
									<div class="col-md-10 sub-block">
										<div class="row">
											<h3>Saisir votre(vos) participant(s)</h3>
										</div>
										<div class="row">
											<table class="add-participant col-md-12">
												<tr>
													<th>Nom</th>
													<th>Email</th>
												</tr>
												<tr>
													<td>
														<input type="text" name="nom1">
													</td>
													<td>
														<input type="text" name="email1">
													</td>
												</tr>
											</table>
											<input type="hidden" id="nb_participant" name="nb_participant" value="1">
											<a class="col-md-12" id="addline">+</a>
											<button type="button" id="show-calendars" class="btn btn-info">Consulter leurs calendriers du temps libre</button>
										</div>
										<div class="row">
											<div class="form-check">
												<input type="checkbox" name="group" value="add" class="form-check-input" id="add-group">
	        							<label class="form-check-label" for="add-group">Créer un groupe de discussion</label>
											</div>
										</div>
										<div class="row">
												<h5 >Vous ne savez pas encore ? <a href="#"> Lancer un sondage</a></h5>
										</div>
									</div>

								</div>
                    <button class="btn btn-rounded prevBtn-2 float-left" type="button">Précédent</button>
                    <button class="btn btn-info btn-rounded nextBtn-2 float-right" type="button">Suivant</button>
                </div>
            </div>

            <!-- Third Step -->
            <div class="row setup-content-2" id="step-3">
							<div class="col-md-8 gray-container">
								<div class="title-block col-md-3">
									<h4 >Quand ?</h4>
								</div>
								<div class="main-block">
									<div class="col-md-10 sub-block">
										<div class="row">
											<h3>Choisir les horaires</h3>
										</div>
										<div class="row">
											<h5>Catégorie</h5>

										</div>
										<div class="row">
											<h5>Horaires choisis</h5>
										</div>
										<div class="row">
												<h5 >Vous ne savez pas encore ? <a href="#"> Lancer un sondage</a></h5>
										</div>
									</div>

								</div>
                    <button class="btn btn-rounded prevBtn-2 float-left" type="button">Previous</button>
                    <button class="btn btn-info btn-rounded nextBtn-2 float-right" type="button">Next</button>
                </div>
            </div>

            <!-- Fourth Step -->
            <div class="row setup-content-2" id="step-4">
							<div class="col-md-8 gray-container">
								<div class="title-block col-md-2">
									<h4>Où ?</h4>
								</div>
								<div class="main-block">
									<div class="col-md-10 sub-block">
										<div class="row">
											<h3>Saisir le lieu</h3>
										</div>
										<div class="googleMap">
											<input id="pac-input" name="place" class="controls" type="text" placeholder="Search Box">
											<div id="map"></div>

										</div>

										<div class="row">
												<h5 >Vous ne savez pas encore ? <a href="#"> Lancer un sondage</a></h5>
										</div>
									</div>

								</div>
                    <button class="btn btn-mdb-color btn-rounded prevBtn-2 float-left" type="button">Previous</button>
                    <button class="btn btn-success btn-rounded float-right" type="submit">Submit</button>
                </div>
            </div>
        </form>

  </div>
  <script src="js/popper.min.js"></script>

    <?php require_once "element/footer.php"?>

    <script type="text/javascript" src="js/addEvent.js"></script>
		<script type="text/javascript" src="js/googleMap.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPD6S_9xVKgn1XvV0FS5zQqcX0W5H1AkI&libraries=places&callback=initAutocomplete"
				 async defer></script>
  </body>
</html>
