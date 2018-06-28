<?php
$title = $_POST["title"];
setcookie("title", $title);
$category = $_POST["category"];
setcookie("category", $category);
$description = $_POST["description"];
setcookie("description", $description);
$nb_participant = $_POST["nb_participant"];
;
$place = $_POST["place"];
setcookie("place", $place);
$real_nb=0;
for($i=1;$i<=$nb_participant;$i++){
  $index = $i-1;
  if($_POST["nom".$i]!=null){
    $participant_name[$i-1]=$_POST["nom".$i];
    setcookie("participant_name[$index]", $participant_name[$i-1]);
    $participant_email[$i-1]=$_POST["email".$i];
    setcookie("participant_email[$index]", $participant_email[$i-1]);
    $real_nb++;
  }
}
setcookie("nb_participant", $real_nb);
if(isset($_POST["group"])&&$_POST["group"]=="add"){
  $group = true;
}else {
  $group = false;
}
setcookie("group", $group);
 ?>
 <?php
 	require_once "element/first_header.php";
 ?>
 <head>
 	<?php require_once "element/header.php"?>
 	<link href='css/addEvent.css' rel='stylesheet'>
 </head>
   <body>

     <div class="container" style="margin-top: 100px">
       <div class="row" id="confirmation">
         <div class="col-md-8 gray-container">
           <div class="title-block col-md-4">
             <h4 >Confirmation</h4>
           </div>
           <div class="main-block">
             <div class="col-md-10 sub-block">
               <div class="row">
                 <h3>Confirmation les Informations de l'activité</h3>
               </div>
               <div class="row">
                 <h5>Titre</h5>
                 <p class="results"><?php echo $title; ?></p>
               </div>
               <div class="row">
                 <h5>Catégorie</h5>
                 <p class="results"><?php echo $category; ?></p>
               </div>
               <div class="row">
                 <h5>Description</h5>
                 <p class="results"><?php echo $description; ?></p>
               </div>
               <div class="row">
                 <h5>Endroit</h5>
                 <p class="results"><?php echo $place; ?></p>
               </div>
               <div class="row">
                 <h5>Horiare</h5>
                 <p class="results"></p>
               </div>
               <div class="row">
                 <h5>Participant</h5>
                 <p class="results">
          <?php for($i=1;$i<=$real_nb;$i++){

                     echo $participant_name[$i-1];
                     echo "   ";
                     echo $participant_email[$i-1];

                 } ?></p>
               </div>
             </div>

           </div>
               <button class="btn btn-rounded prevBtn-2 float-left" type="button" onclick="window.history.back(-1)">Modifier</button>
               <button class="btn btn-info btn-rounded nextBtn-2 float-right" type="button" onclick="window.location.href='controller/addEventData.php'">Confirmer</button>
           </div>
       </div>
     </div>

     <script src="js/popper.min.js"></script>
     <?php require_once "element/footer.php"?>
     <script type="text/javascript" src="js/addEvent.js"></script>
   </body>
 </html>
