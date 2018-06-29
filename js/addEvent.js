// Tooltips Initialization
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

// Steppers
$(document).ready(function () {
  var navListItems = $('div.setup-panel-2 div a'),
          allWells = $('.setup-content-2'),
          allNextBtn = $('.nextBtn-2'),
          allPrevBtn = $('.prevBtn-2');

  allWells.hide();

  navListItems.click(function (e) {
      e.preventDefault();
      var $target = $($(this).attr('href')),
              $item = $(this);

      if (!$item.hasClass('disabled')) {
          navListItems.removeClass('btn-amber').addClass('btn-blue-grey');
          $item.addClass('btn-amber');
          allWells.hide();
          $target.show();
          $target.find('input:eq(0)').focus();

      }
  });

  allPrevBtn.click(function(){
      var curStep = $(this).closest(".setup-content-2"),
          curStepBtn = curStep.attr("id"),
          prevStepSteps = $('div.setup-panel-2 div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

          prevStepSteps.removeAttr('disabled').trigger('click');
  });

  allNextBtn.click(function(){
      var curStep = $(this).closest(".setup-content-2"),
          curStepBtn = curStep.attr("id"),
          nextStepSteps = $('div.setup-panel-2 div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url']"),
          isValid = true;

      $(".form-group").removeClass("has-error");
      for(var i=0; i< curInputs.length; i++){
          if (!curInputs[i].validity.valid){
              isValid = false;
              $(curInputs[i]).closest(".form-group").addClass("has-error");
          }
      }

      if (isValid)
          nextStepSteps.removeAttr('disabled').trigger('click');
  });

  $('div.setup-panel-2 div a.btn-amber').trigger('click');

  $('#addline').click(function(){
    var nb = $('#nb_participant').attr("value");
    nb = parseInt(nb) + 1;
    $('#nb_participant').attr("value",nb);
    var content = "<tr><td><input type='text' name='nom"+nb+"' class='p-name'></td><td><input type='text' name='email"+nb+"' class='p-email'></td></tr>";


    $("table.add-participant").append(content);
  });
});




//freetime of participant
$(document).ready(function(){
  var tab_p_email=new Array();
  $("#show-calendars").click(function() {

    var nb = $("#nb_participant").attr("value");
    nb = parseInt(nb);
    for (var i = 1; i <= nb; i++) {
      var content ="<div class='row'><div class='col-md-12 availability_con'><div id='availability"+i+"' ></div></div></div>";
      $("#all_availabilities").append(content);
    }
    var index = 0;
    $("table.add-participant input.p-email").each(function(){
      var p_email = $(this).val();
      if(p_email!=""){
        index++;
        initializeViewAvailability(p_email,index);
        var char="table.add-participant input[name='nom" + index + "']";
        var this_name=$(char).val();
        var availability_id = "#availability"+index;
        $(availability_id).before("<h5>Participant: "+this_name+"</h5>");
        tab_p_email[index-1]=p_email;
      }
    });

  });
  //bug 要先点前一页的显示才能得到这一页的用户信息
  $('#btn_coin').click(function () {
    console.log(tab_p_email);
    initializeAgenda(tab_p_email);
  });
});


function initializeViewAvailability(email,index){
  var params = "Email="+email;
  $.ajax({
    type: "post",
    data: params,
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
           console.log(index);

            var id_availability = "availability"+index;
            console.log(id_availability);
            var chart = new google.visualization.Calendar(document.getElementById(id_availability));
            document.getElementById(id_availability).style.width="1200px";
            document.getElementById(id_availability).style.height="250px";
            var options = {
                tooltip: { isHtml: true },
                title: "Temps disponibles",
                height: 300,
                calendar: {
                   cellSize: 20,
                   cellColor: {
                      stroke: 'black',
                      strokeOpacity: 0.5,
                      strokeWidth: 1,
                    }
                 }
            };

            chart.draw(dataTable, options);
            //console.log(chart.getSelection());


          }



        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            //alert(errorThrown);
            console.log("no user");
        }

  });
}

function initializeAgenda(tab_p_email){
  var params = "Email_user0="+tab_p_email[0];
  for (var i = 1; i < tab_p_email.length; i++) {
    params = params+"&"+"Email_user"+i+"="+tab_p_email[i];
  }
  params = params+"&"+"nb_user="+tab_p_email.length;
  $.ajax({
    type: "post",
    data: params,
    url: "http://localhost/GoogleLogin/controller/get_coincidence_json.php",
    dataType: "json",
    success: function (data) {
      //console.log(data);
      var date = new Date();
    	var d = date.getDate();
    	var m = date.getMonth();
    	var y = date.getFullYear();

    	/*  className colors

    	className: default(transparent), important(red), chill(pink), success(green), info(blue)

    	*/


    	/* initialize the external events
    	-----------------------------------------------------------------*/

    	$('#external-events div.external-event').each(function() {

    		// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
    		// it doesn't need to have a start or end
    		var eventObject = {
    			title: $.trim($(this).text()) // use the element's text as the event title
    		};

    		// store the Event Object in the DOM element so we can get to it later
    		$(this).data('eventObject', eventObject);

    		// make the event draggable using jQuery UI
    		$(this).draggable({
    			zIndex: 999,
    			revert: true,      // will cause the event to go back to its
    			revertDuration: 0  //  original position after the drag
    		});

    	});


    	/* initialize the calendar
    	-----------------------------------------------------------------*/

    	var calendar =  $('#coincidence').fullCalendar({
    		header: {
    			left: 'title',
    			center: 'agendaWeek',
    			right: 'prev,next today'
    		},
    		editable: true,
    		firstDay: 0, //  1(Monday) this can be changed to 0(Sunday) for the USA system
    		selectable: true,
    		defaultView: 'agendaWeek',
        minTime:"08:00:00",
        maxTime:"20:00:00",
    		axisFormat: 'h:mm',
    		columnFormat: {
    							month: 'ddd',    // Mon
    							week: 'ddd d', // Mon 7
    							day: 'dddd M/d',  // Monday 9/7
    							agendaDay: 'dddd d'
    					},
    					titleFormat: {
    							month: 'MMMM yyyy', // September 2009
    							week: "MMMM yyyy", // September 2009
    							day: 'MMMM yyyy'                  // Tuesday, Sep 8, 2009
    					},
    		allDaySlot: false,
    		selectHelper: true,
        eventClick: function(calEvent, jsEvent, view) {

          console.log(calEvent.start);
          console.log(calEvent.end);
          // change the border color just for fun
          $(this).css('border-color', 'red');

          var nb_horaire = $("#nb_horaire").val();
          nb_horaire = parseInt(nb_horaire) +1;
          var inputname_s = "start"+nb_horaire;
          var inputname_e = "end"+nb_horaire;
          formatDate(calEvent.start);
          $("#row_horaire").append("<input style='width:50%;' type='text' name='"+inputname_s+"' value='"+formatDate(calEvent.start)+"'>");
          $("#row_horaire").append("<input style='width:50%;' type='text' name='"+inputname_e+"' value='"+formatDate(calEvent.end)+"'>");
          $("#nb_horaire").attr("value",nb_horaire);
        },
    		 //events: '/GoogleLogin/controller/get_event_data_json.php'
    		 events: data
    		 //  events: [
    		 //  {
    		 // 	 "title":"mytitre",
    			//  allDay: false,
    		 // 	 "start":"2018-06-29T10:00:00",
    			//  "end":"2018-06-29T12:00:00"
    		 // }]
    	});


      }, error: function (XMLHttpRequest, textStatus, errorThrown) {
          alert(errorThrown);
      }

  });

}
function formatDate(date){
    var y = date.getFullYear();
    var m = date.getMonth() + 1;
    m = m < 10 ? ('0' + m) : m;
    var d = date.getDate();
    d = d < 10 ? ('0' + d) : d;
    var h = date.getHours();
    h=h < 10 ? ('0' + h) : h;
    var minute = date.getMinutes();
    minute = minute < 10 ? ('0' + minute) : minute;
    var second=date.getSeconds();
    second=second < 10 ? ('0' + second) : second;
    return y + '-' + m + '-' + d+' '+h+':'+minute+':'+second;
}
