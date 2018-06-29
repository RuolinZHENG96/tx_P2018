
$(document).ready(function() {
  initializeViewAvailability();
  //addunit();
  //$('#availability').hide();
$('#foravailability').click(function(){
  //initializeViewAvailability();
  if($('#agenda table').length!==0){
    $('#agenda').hide();
    console.log("hide agenda");
  };

  if($('#availability div').length===0){
    initializeViewAvailability();
    console.log("in initialization");
  } else {
    $('#availability').show();
    console.log("in show");
  }

});





});
function initializeViewAvailability(){
  $.ajax({
    type: "post",
    url: "http://localhost/GoogleLogin/controller/get_freetime_data_json.php",
    dataType: "json",
    success: function (data) {

          google.charts.load("current", {packages:["calendar"]});
          google.charts.setOnLoadCallback(drawChart);
          function drawChart(){
            var dataTable = new google.visualization.DataTable();
            dataTable.addColumn({ type: 'date', id: 'Date' });
            dataTable.addColumn({ type: 'number', id: 'Availability' });
            dataTable.addColumn({type: 'string', role: 'tooltip', 'p': {'html': true}});

            for (var i in data) {
                dataTable.addRow([ new Date(data[i].Date), data[i].Availability,data[i].Date+" <br/> Nombre d'heure disponible: " + data[i].Availability ]);
           }

            var chart = new google.visualization.Calendar(document.getElementById('availability'));

            var options = {
                tooltip: { isHtml: true },
                title: "Vos temps disponibles (en nombres d'heures)",
                height: 1000,
                calendar: {
                   cellSize: 20
                 }
            };

            chart.draw(dataTable, options);
            //console.log(chart.getSelection());


          }



        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert(errorThrown);
        }

  });
}




//question
// function addunit() {
//   var start = $("#availability svg g:first-child text:first-child");
//
//   //var start = $("#availability svg text[text-anchor='start']");
//   var number_s =start.text();
//   start.text(number_s + " heures");
//   console.log(number_s);
//}
