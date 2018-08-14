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
/****************************************RESTART FLOWCHART********************************************************/
  if($('#restart_flowchart').length != 0){
    $('#restart_flowchart').click(function(){
      location.reload();
    });
  }
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
  var info_project_and_services_route = 'http://' + document.location.hostname + '/rfp/profile/info_project_and_services/';
  if($('#calendar_projects').length != 0){
    var all_end_dates = document.getElementById('all_end_dates').value;
    all_end_dates = jQuery.parseJSON(all_end_dates);
    $('#calendar_projects').fullCalendar({
      themeSystem: 'bootstrap4',
      header:{
        left:'today,prev,next',
        center:'title',
        right:'month,listWeek'
      },
      eventSources:[{
        events: all_end_dates,
        color: '#7041f4',
        textColor: 'white'
      }],
      eventClick:function(calEvent, jsEvent, view){
        window.location.assign(info_project_and_services_route + calEvent.id);
      }
    });
  }

  if($('#calendar_new_projects').length != 0){
    var all_new_dates = document.getElementById('all_new_dates').value;
    all_new_dates =  jQuery.parseJSON(all_new_dates);

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
        events: all_new_dates,
        color: '#7041f4',
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
    var all_my_dates = document.getElementById('all_my_dates').value;
    all_my_dates = jQuery.parseJSON(all_my_dates);

    var link_fill_out = $('#fill_out').attr('href');
    var link_delete_project = $('#delete_project').attr('href');
    $('#calendar_my_projects').fullCalendar({
      themeSystem: 'bootstrap4',
      header:{
        left:'today,prev,next',
        center:'title',
        right:'month,listWeek'
      },
      eventSources:[{
        events: all_my_dates,
        color: '#7041f4',
        textColor: 'white'
      }],
      eventClick: function(calEvent, jsEvent, view){
        if(calEvent.reviewed_project == '0'){
          console.log(calEvent.reviewed_project);
          new_link_delete_project = link_delete_project + calEvent.id;
          new_link_fill_out = link_fill_out + calEvent.id;
          $('#fill_out').attr('href', new_link_fill_out);
          $('#delete_project').attr('href', new_link_delete_project);
          $('#link_project').html(calEvent.title);
          $('#link_project').attr('href', calEvent.title);
          $('#view_project').modal();
        }else if(calEvent.reviewed_project == '1'){
          window.location.assign(info_project_and_services_route + calEvent.id);
        }
      }
    });
  }
  /***************************************************************************************************************************
  END CALENDAR CODE
  ***************************************************************************************************************************/
});

/***********************************************************************************************************************
END JQUERY CODE
***********************************************************************************************************************/
