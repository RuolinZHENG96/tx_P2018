<?php
	require_once "element/first_header.php";
	//require_once "controller\get_event_data_json.php";
?>
<!doctype html>
<html lang="fr">
<head>
	<?php require_once "element/header.php"?>
	<!-- calendar -->
	<link href='css/calendar.css' rel='stylesheet'>

</head>
<body>
	<style></style>
	<div class="container" style="margin-top: 100px">

		<div class="row">
				<button type="button" class="btn btn-outline-warning" id="foravailability">Disponibilité</button>
				<button type="button" class="btn btn-outline-warning" id="foragenda">Agenda</button>
		</div>

		<div class="row">
				<div id="availability" style="width: 1200px; height: 1000px;"></div>
				<div id="agenda">
					<div id='wrap'></div>
					<div id='calendar'></div>
				</div>
		</div>

		</div>

	</div>


</div>

<?php require_once "element/footer.php"?>
<script type="text/javascript" src="js/loader.js"></script>
<script type="text/javascript" src="js/cal_freetime.js"></script>
</body>
</html>
