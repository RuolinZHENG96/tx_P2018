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
	<div class="container" style="margin-top: 100px">
		<div class="row">

				<ul id="myTab" class="nav nav-tabs">

					<li class="active">
						<a href="#agenda" data-toggle="tab" class="active show">
							 Agenda
						</a>
					</li>

					<li><a href="#availability" data-toggle="tab">disponibilité</a></li>
				</ul>

				<div id="myTabContent" class="tab-content">

					<div class="tab-pane fade in active show" id="agenda">
						<div id='wrap'></div>
						<div id='calendar'></div>
						<div style='clear:both'></div>
					</div>

					<div class="tab-pane fade" id="availability">

					</div>

				</div>
				<div id="view_availability" style="width: 1000px; height: 350px;"></div>
		</div>
		<!-- <?php echo '<iframe src="https://www.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=' . $_SESSION['email'] . '&amp;color=%232952A3&amp;ctz=Europe%2FParis" style=" border-width:0 " width="800" height="600" frameborder="0" scrolling="no"></iframe>'; ?> -->
	</div>


</div>

<?php require_once "element/footer.php"?>
<script type="text/javascript" src="js/loader.js"></script>
<script type="text/javascript" src="js/cal_freetime.js"></script>
</body>
</html>
