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

  /*******************************************************************************************************************
  START CALENDAR CODE
  *******************************************************************************************************************/
  var all_events = document.getElementById('all_events').value;
  all_events =  jQuery.parseJSON(all_events);

  var link_fill_out = $('#fill_out').attr('href');
  $('#calendar_system').fullCalendar({
    themeSystem: 'bootstrap4',
    header:{
      left:'today,prev,next',
      center:'title',
      right:'month,basicWeek,basicDay,agendaWeek,agendaDay'
    },
    dayClick:function(date, jsEvent, view){
      $('#add_project').modal();
      var parts_fecha = date.format().split('-');
      var fecha = parts_fecha[1] + '/' + parts_fecha[2] + '/' + parts_fecha[0];
      $('#date').val(fecha);
    },
    events: all_events,
    eventClick:function(calEvent, jsEvent, view){

      new_link_fill_out = link_fill_out + calEvent.id;
      $('#fill_out').attr('href', new_link_fill_out);
      $('#link_project').html(calEvent.title);
      $('#view_project').modal();
    }
  });
  /***************************************************************************************************************************
  END CALENDAR CODE
  ***************************************************************************************************************************/
});

/***********************************************************************************************************************
END JQUERY CODE
***********************************************************************************************************************/
