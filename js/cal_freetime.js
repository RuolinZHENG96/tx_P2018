
$(document).ready(function() {




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
            for (var i in data) {
                dataTable.addRow([ new Date(data[i].Date), data[i].Availability ]);
           }

            var chart = new google.visualization.Calendar(document.getElementById('view_availability'));

            var options = {
                title: "Calendar Chart",
                height: 720
            };

            chart.draw(dataTable, options);
          }



        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert(errorThrown); 
        }

  });

});
