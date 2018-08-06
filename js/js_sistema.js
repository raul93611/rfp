//'use strict'
/*****************************************************************************************************************
SEARCH USERS
******************************************************************************************************************/
function search_users() {
    var input, filter, table, tr, td, i, select;
    select = document.getElementById("option");
    var tipo = select.options[select.selectedIndex].value;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("users_table");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        switch (tipo) {
            case 'First names':
                td = tr[i].getElementsByTagName("td")[0];
                break;
            case 'Last names':
                td = tr[i].getElementsByTagName("td")[1];
                break;
        }

        if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
/******************************************************************************************************************
END SEARCH USERS
*******************************************************************************************************************/


/********************************************************************************************************************
STARTJQUERY CODE
**********************************************************************************************************************/
$(document).ready(function(){
  /**********************************************************************************************************
  NEW PROJECT BUTTON
  ***********************************************************************************************************/
  $('#new_project').click(function(){
      $('#add_project').modal();
  });
  /*******************************************************************************************************************
  INPUT MASK IN DATES
  *********************************************************************************************************************/
  $('#start_date').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'});
  $('#end_date').inputmask("datetime", {
      mask: "2/1/y h:s",
      placeholder: "mm/dd/yyyy hh:mm",
      leapday: "02/29/",
      separator: "/",
      alias: "mm/dd/yyyy"
  });
  /******************************************************************************************************************
  FLOWCHART
  ********************************************************************************************************************/
  for(var i = 2; i <= 14; i++){
    $('#q'+i).hide();
  }


  $('#bid_alert').hide();
  $('#no_bid_alert').hide();
  $('#project_comments').hide();
  $('#save_flowchart').hide();



  $('input[name=q1]').click(function(){
    $('#q1').slideUp();
    if($(this).val() == '1'){
      $('#q2').slideDown();
    }else if($(this).val() == '0'){
      $('#q7').slideDown();
    }
  });

  $('input[name=q2]').click(function(){
    $('#q2').slideUp();
    if($(this).val() == '1'){
      $('#q3').slideDown();
    }else if($(this).val() == '0'){
      $('#q8').slideDown();
    }
  });

  $('input[name=q3]').click(function(){
    $('#q3').slideUp();
    if($(this).val() == '1'){
      $('#q4').slideDown();
    }else if($(this).val() == '0'){
      $('#q9').slideDown();
    }
  });

  $('input[name=q4]').click(function(){
    $('#q4').slideUp();
    if($(this).val() == '1'){
      $('#q5').slideDown();
    }else if($(this).val() == '0'){
      $('#q10').slideDown();
    }
  });

  $('input[name=q5]').click(function(){
    $('#q5').slideUp();
    if($(this).val() == '1'){
      $('#q6').slideDown();
    }else if($(this).val() == '0'){
      $('#q11').slideDown();
    }
  });

  $('input[name=q6]').click(function(){
    $('#q6').slideUp();
    if($(this).val() == '1'){
      $('#bid_alert').slideDown();
      $('#project_comments').slideDown();
      $('#save_flowchart').slideDown();
      $('#flowchart_result').val('1');
    }else if($(this).val() == '0'){
      $('#q12').slideDown();
    }
  });

  $('input[name=q7]').click(function(){
    $('#q7').slideUp();
    if($(this).val() == '1'){
      $('#q2').slideDown();
    }else if($(this).val() == '0'){
      $('#q14').slideDown();
    }
  });

  $('input[name=q8]').click(function(){
    $('#q8').slideUp();
    if($(this).val() == '1'){
      $('#q3').slideDown();
    }else if($(this).val() == '0'){
      $('#q13').slideDown();
    }
  });

  $('input[name=q9]').click(function(){
    $('#q9').slideUp();
    if($(this).val() == '1'){
      $('#q13').slideDown();
    }else if($(this).val() == '0'){
      $('#q4').slideDown();
    }
  });

  $('input[name=q10]').click(function(){
    $('#q10').slideUp();
    if($(this).val() == '1'){
      $('#q5').slideDown();
    }else if($(this).val() == '0'){
      $('#q14').slideDown();
    }
  });

  $('input[name=q11]').click(function(){
    $('#q11').slideUp();
    if($(this).val() == '1'){
      $('#q6').slideDown();
    }else if($(this).val() == '0'){
      $('#q14').slideDown();
    }
  });

  $('input[name=q12]').click(function(){
    $('#q12').slideUp();
    if($(this).val() == '1'){
      $('#bid_alert').slideDown();
      $('#project_comments').slideDown();
      $('#save_flowchart').slideDown();
      $('#flowchart_result').val('1');
    }else if($(this).val() == '0'){
      $('#q14').slideDown();
    }
  });

  $('input[name=q13]').click(function(){
    $('#q13').slideUp();
    if($(this).val() == '1'){
      $('#q4').slideDown();
    }else if($(this).val() == '0'){
      $('#q14').slideDown();
    }
  });

  $('input[name=q14]').click(function(){
    $('#q14').slideUp();
    if($(this).val() == '1'){
      $('#q6').slideDown();
    }else if($(this).val() == '0'){
      $('#no_bid_alert').slideDown();
      $('#project_comments').slideDown();
      $('#save_flowchart').slideDown();
      $('#flowchart_result').val('0');
    }
  });
  /*******************************************************************************************************************
  START CALENDAR CODE
  *******************************************************************************************************************/
  if($('#calendar_projects').length != 0){
    var all_reviewed_events = document.getElementById('all_reviewed_events').value;
    all_reviewed_events = jQuery.parseJSON(all_reviewed_events);
    $('#calendar_projects').fullCalendar({
      themeSystem: 'bootstrap4',
      header:{
        left:'today,prev,next',
        center:'title',
        right:'month,listWeek'
      },
      eventSources:[{
        events: all_reviewed_events,
        color: '#ff2e00',
        textColor: 'white',
        displayEventTime: true,
        displayEventEnd: true
      }]
    });
  }

  if($('#calendar_new_projects').length != 0){
    var all_events = document.getElementById('all_events').value;
    all_events =  jQuery.parseJSON(all_events);

    var link_fill_out = $('#fill_out').attr('href');
    var link_delete_project = $('#delete_project').attr('href');
    $('#calendar_new_projects').fullCalendar({
      themeSystem: 'bootstrap4',
      header:{
        left:'today,prev,next',
        center:'title',
        right:'month,listWeek'
      },
      eventSources:[{
        events: all_events,
        color: '#ff2e00',
        textColor: 'white'
      }],
      eventClick:function(calEvent, jsEvent, view){
        new_link_delete_project = link_delete_project + calEvent.id;
        new_link_fill_out = link_fill_out + calEvent.id;
        $('#fill_out').attr('href', new_link_fill_out);
        $('#delete_project').attr('href', new_link_delete_project);
        $('#link_project').html(calEvent.title);
        $('#link_project').attr('href', calEvent.title);
        $('#view_project').modal();
      }
    });
  }

  if($('#calendar_my_projects').length != 0){
    var all_my_events = document.getElementById('all_my_events').value;
    all_my_events = jQuery.parseJSON(all_my_events);
    $('#calendar_my_projects').fullCalendar({
      themeSystem: 'bootstrap4',
      header:{
        left:'today,prev,next',
        center:'title',
        right:'month,listWeek'
      },
      eventSources:[{
        events: all_my_events,
        color: '#ff2e00',
        textColor: 'white',
        displayEventTime: true,
        displayEventEnd: true
      }]
    });
  }
  /***************************************************************************************************************************
  END CALENDAR CODE
  ***************************************************************************************************************************/
});

/***********************************************************************************************************************
END JQUERY CODE
***********************************************************************************************************************/
