<?php
    require_once "config.php";

	if (isset($_SESSION['access_token'])) {
		header('Location: index.php');
		exit();
	}

	$loginURL = $gClient->createAuthUrl();
?>
<!doctype html>
<html lang="fr">
<head>
  	<?php require_once "element/header.php"?>
</head>
<body id="page_login">
    <!-- Navigation -->
    <?php require_once "element/nav.php"?>

    <!-- Header -->
    <header class="masthead">
      <div class="container" style="background-color: #00000042;">
        <div class="intro-text">
          <div class="intro-heading text-uppercase">Temps libre, </div>
          <div class="intro-lead-in">une application qui vous aide à organiser vos loisirs<br>
            grâce à l'agenda de vos amis.</div>

        </div>
      </div>
    </header>

<?php require_once "element/footer.php"?>
</body>
</html>
