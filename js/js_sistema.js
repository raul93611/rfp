/********************************************************************************************************************
STARTJQUERY CODE
**********************************************************************************************************************/
$(document).ready(function(){
  /**************************************ADD TASK BUTTON*****************************************************************/
  $('#add_task').click(function(){
    $('#form_add_task').modal();
  });
  /*************************************FILE INPUT MAIN FORM********************************************************************/
  $('#file_input_info').change(function(e){
    var fileName = [];
    for (var i = 0; i < e.target.files.length; i++) {
      fileName.push(e.target.files[i].name);
    }
    $('#label_file').html(fileName.join(', '));
  });
  /***************************************FILE INPUT CREATE FORM*****************************************************************/
  $('#file_input_info_create').change(function(e){
    var fileName_create = [];
    for (var i = 0; i < e.target.files.length; i++) {
      fileName_create.push(e.target.files[i].name);
    }
    $('#label_file_create').html(fileName_create.join(', '));
  });
  /****************************************DON'T LET CODE EMPTY******************************************************/
  if($('#form_info_project_and_services').length != 0){
    var form_info_project_and_services = $('#form_info_project_and_services');
    form_info_project_and_services.submit(function(){
      var code_field = $('#code').val();
      if(code_field == ''){
        $('#form_uncompleted_body').html('<h4 class="text-center text-danger">"Code" must be fill out.</h4>');
        $('#form_uncompleted').modal();
        return false;
      }
    });
  }
  /***************************************HIDE/SHOW PROPOSED PRICE**************************************************/
  if($('#proposed_price').length != 0){
    var proposed_price = $('#proposed_price');
    var result = $('#result');
    proposed_price.hide();
    result.change(function(){
      if(result.val() != 'none'){
        proposed_price.fadeIn();
      }else{
        proposed_price.fadeOut();
      }
    });

    if(result.val() != 'none'){
      proposed_price.fadeIn();
    }else{
      proposed_price.fadeOut();
    }
  }
  /***************************************COLLAPSIBLE LINETIME******************************************************/
  var timelines = $('.timeline');
  timelines.each(function(i){
    var timeline = $(this);
    $(this).find('.clickable_title').click(function(){
      timeline.find('.body_comments').toggle('slideUp');
    });
  });
  /*************************************BETTER CHECKBOX SUBMITTED AWARD*********************************************/
  $('input[type="checkbox"].minimal').iCheck({
    checkboxClass: 'icheckbox_minimal-blue'
  });
/***************************************DATATABLES JQUERY**********************************************************/
  $('#staff_table').DataTable({
    paging: false,
    ordering: false
  });

  $('#costs_table').DataTable({
    paging: false,
    ordering: false
  });

  $('#items_table').DataTable({
    paging: false,
    ordering: false
  });

  $('#search_table').DataTable({
    'order': [[2, 'desc']]
  });
/*********************************************************************************************************************/

  /************************************REPORT ERROR BUTTON*********************************************************/
  $('#report_error_button').click(function(){
    $('#report_error_rfq_quote').modal();
  });
  /****************************************************************************************************************/
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
  $('#expiration_date').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'});
  $('#end_date_task').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'});
  /******************************************************************************************************************
  FLOWCHART
  ********************************************************************************************************************/
  for(var i = 2; i <= 15; i++){
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
      $('#q8').slideDown();
    }
  });

  $('input[name=q2]').click(function(){
    $('#q2').slideUp();
    if($(this).val() == '1'){
      $('#q14').slideDown();
    }else if($(this).val() == '0'){
      $('#q3').slideDown();
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
      $('#q7').slideDown();
      /**/
    }else if($(this).val() == '0'){
      $('#q12').slideDown();
    }
  });

  $('input[name=q7]').click(function(){
    $('#q7').slideUp();
    if($(this).val() == '1'){
      $('#bid_alert').slideDown();
      $('#project_comments').slideDown();
      $('#save_flowchart').slideDown();
      $('#flowchart_result').val('1');
    }else if($(this).val() == '0'){
      $('#q13').slideDown();
    }
  });

  $('input[name=q8]').click(function(){
    $('#q8').slideUp();
    if($(this).val() == '1'){
      $('#q2').slideDown();
    }else if($(this).val() == '0'){
      $('#q15').slideDown();
    }
  });

  $('input[name=q9]').click(function(){
    $('#q9').slideUp();
    if($(this).val() == '1'){
      $('#q4').slideDown();
    }else if($(this).val() == '0'){
      $('#q14').slideDown();
    }
  });

  $('input[name=q10]').click(function(){
    $('#q10').slideUp();
    if($(this).val() == '1'){
      $('#q14').slideDown();
    }else if($(this).val() == '0'){
      $('#q5').slideDown();
    }
  });

  $('input[name=q11]').click(function(){
    $('#q11').slideUp();
    if($(this).val() == '1'){
      $('#q6').slideDown();
    }else if($(this).val() == '0'){
      $('#q15').slideDown();
    }
  });

  $('input[name=q12]').click(function(){
    $('#q12').slideUp();
    if($(this).val() == '1'){
      $('#q7').slideDown();
    }else if($(this).val() == '0'){
      $('#q15').slideDown();
    }
  });

  $('input[name=q13]').click(function(){
    $('#q13').slideUp();
    if($(this).val() == '1'){
      $('#bid_alert').slideDown();
      $('#project_comments').slideDown();
      $('#save_flowchart').slideDown();
      $('#flowchart_result').val('1');
    }else if($(this).val() == '0'){
      $('#q15').slideDown();
    }
  });

  $('input[name=q14]').click(function(){
    $('#q14').slideUp();
    if($(this).val() == '1'){
      $('#q5').slideDown();
    }else if($(this).val() == '0'){
      $('#q15').slideDown();
    }
  });

  $('input[name=q15]').click(function(){
    $('#q15').slideUp();
    if($(this).val() == '1'){
      $('#q7').slideDown();
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

  if($('#calendar_my_tasks').length != 0){
    var all_my_tasks = $('#all_my_tasks').val();
    all_my_tasks = jQuery.parseJSON(all_my_tasks);

    var link_project = $('#go_to_project').attr('href');
    var link_completed_task = $('#completed_task').attr('href');
    $('#calendar_my_tasks').fullCalendar(
      {
        themeSystem: 'bootstrap4',
        header:{
          left: 'today,prev,next',
          center: 'title',
          right: 'month,listWeek'
        },
        eventSources:[
          {
            events: all_my_tasks,
            color: '#996d00',
            textColor: 'white'
          }
        ],
        eventClick: function(calEvent, jsEvent, view){
          new_link_project = link_project + calEvent.id_project;
          new_link_completed_task = link_completed_task + calEvent.id;
          $('#go_to_project').attr('href', new_link_project);
          $('#completed_task').attr('href', new_link_completed_task);
          $('#task_message').html(calEvent.description);
          $('#task_info').modal();
        }
      }
    );
  }
  /***************************************************************************************************************************
  END CALENDAR CODE
  ***************************************************************************************************************************/
});
/****************************************ADD STAFF FORMULES**********************************************************/
if($('#form_add_staff').length != 0){
  var time = setInterval(function(){
    if(!isNaN($('#rate').val()) && $('#rate').val() != ''){
      var rate = parseFloat($('#rate').val())/100;
    }else{
      var rate = 0;
    }

    if(!isNaN($('#office_expenses').val()) && $('#office_expenses').val() != ''){
      var office_expenses = parseFloat($('#office_expenses').val());
    }else{
      var office_expenses = 0;
    }

    if(!isNaN($('#hourly_rate').val()) && $('#hourly_rate').val() != ''){
      var hourly_rate = parseFloat($('#hourly_rate').val());
    }else{
      var hourly_rate = 0;
    }

    if(!isNaN($('#hours_project').val()) && $('#hours_project').val() != ''){
      var hours_project = parseFloat($('#hours_project').val());
    }else{
      var hours_project = 0;
    }

    if(rate == 0 && office_expenses == 0 && hourly_rate == 0 && hours_project == 0){
      var total_burdened_rate = 0;
      var burdened_rate = 0;
      var fblr = 0;
      var total_fblr = 0;
    }else {
      var burdened_rate = ((rate + 1.08)*(office_expenses + 2592.56*hourly_rate + 3000))/2080;
      var fblr = burdened_rate + burdened_rate*0.0075;
      var total_burdened_rate = hours_project*burdened_rate;
      var total_fblr = hours_project*fblr;
    }

    $('#total_burdened_rate').val(total_burdened_rate.toFixed(2));
    $('#total_fblr').val(total_fblr.toFixed(2));
    $('#burdened_rate').val(burdened_rate.toFixed(2));
    $('#fblr').val(fblr.toFixed(2));
  }, 500);
}
/*******************************************************************************************************************/
/*******************************************FORM INFO***************************************************************/
if($('#designated_user').length != 0){
  var designated_user = $('#designated_user').val();
}
$('#form_info_project').submit(function(){
  var new_designated_user = $('#designated_user').val();
  if(new_designated_user == designated_user){
    change_designated_user = false;
  }else{
    change_designated_user = true;
  }
  var code = $('#code').val();
  var project_name = $('#project_name').val();
  var end_date = $('#end_date').val();
  var description = $('#description').val();

  if(code.length == 0 || project_name.length == 0 || end_date.length == 0 || description.length == 0){
    if(change_designated_user == true){
      return true;
    }else{
      $('#form_uncompleted').modal();
      return false;
    }
  }
});
/*************************************ALERT TO AVOID SAVE*********************************************************/
if($('#form_info_project_and_services').length != 0){
  var address = $('#address');
  if(address.val() == ''){
    address.addClass('is-invalid');
  }
  address.focus(function(){
    $(this).removeClass('is-invalid');
  });

  var ship_to = $('#ship_to');
  if(ship_to.val() == ''){
    ship_to.addClass('is-invalid');
  }
  ship_to.focus(function(){
    $(this).removeClass('is-invalid');
  });
}
/**********************************************************************************************************************/
/*************************************************REPORTS**************************************************************/
if($('#data_reports').length != 0){
  var submitted_projects_by_month = $('#submitted_projects_by_month').val();
  var award_projects_by_month = $('#award_projects_by_month').val();
  var award_by_amount_projects_by_month = $('#award_by_amount_projects_by_month').val();
  var ocho_a = $('#ocho_a').val();
  var full_and_open = $('#full_and_open').val();
  var hubzone = $('#hubzone').val();
  var small_business = $('#small_business').val();
  var sources_sought = $('#sources_sought').val();
  var cancelled = $('#cancelled').val();
  var disqualified = $('#disqualified').val();
  var loss = $('#loss').val();
  var re_posted = $('#re_posted').val();
  var to_be_determined = $('#to_be_determined').val();
  var submitted_projects_by_month_last_year = $('#submitted_projects_by_month_last_year').val();
  var award_projects_by_month_last_year = $('#award_projects_by_month_last_year').val();
  var award_by_amount_projects_by_month_last_year = $('#award_by_amount_projects_by_month_last_year').val();
  var follow_up = $('#follow_up').val();
  var no_follow_up = $('#no_follow_up').val();
  var av = $('#av').val();
  var it = $('#it').val();
  var logistics = $('#logistics').val();
  var sources_sought_subject = $('#sources_sought_subject').val();

  submitted_projects_by_month = jQuery.parseJSON(submitted_projects_by_month);
  award_projects_by_month = jQuery.parseJSON(award_projects_by_month);
  award_by_amount_projects_by_month = jQuery.parseJSON(award_by_amount_projects_by_month);
  ocho_a = jQuery.parseJSON(ocho_a);
  full_and_open = jQuery.parseJSON(full_and_open);
  hubzone = jQuery.parseJSON(hubzone);
  small_business = jQuery.parseJSON(small_business);
  sources_sought = jQuery.parseJSON(sources_sought);
  cancelled = jQuery.parseJSON(cancelled);
  disqualified = jQuery.parseJSON(disqualified);
  loss = jQuery.parseJSON(loss);
  re_posted = jQuery.parseJSON(re_posted);
  to_be_determined = jQuery.parseJSON(to_be_determined);
  submitted_projects_by_month_last_year = jQuery.parseJSON(submitted_projects_by_month_last_year);
  award_projects_by_month_last_year = jQuery.parseJSON(award_projects_by_month_last_year);
  award_by_amount_projects_by_month_last_year = jQuery.parseJSON(award_by_amount_projects_by_month_last_year);
  follow_up = jQuery.parseJSON(follow_up);
  no_follow_up = jQuery.parseJSON(no_follow_up);
  av = jQuery.parseJSON(av);
  it = jQuery.parseJSON(it);
  logistics = jQuery.parseJSON(logistics);
  sources_sought_subject = jQuery.parseJSON(sources_sought_subject);
}

var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
};

if($('#submitted_chart').length != 0){
  var submitted_chart_box = $('#submitted_chart');
  var submitted_chart = new Chart(submitted_chart_box, {
    type: 'bar',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      datasets:
      [
        {
          label: '# of submitted projects last year',
          data: [1, 9, 5, 3, 2, 6, 2, 4, 7, 2, 9, 9],
          backgroundColor: 'rgba(0, 0, 2, 0.3)',
          borderColor: 'rgba(0, 0, 2, 1)',
          borderWidth: 1
        },
        {
          label: '# of submitted projects',
          data: [12, 19, 3, 5, 2, 3, 5, 7, 3, 4, 6, 1],
          backgroundColor: 'rgba(66, 134, 244, 0.3)',
          borderColor: 'rgba(66, 134, 244, 1)',
          borderWidth: 1
        }
      ]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: $.extend({
            beginAtZero:true,
            callback: function (value, index, values) {
                if (value >= 1000) {
                    value /= 1000;
                    value += 'k';
                }
                return value;
            }
          },ticksStyle)
        }]
      },
      animation:{
          easing: 'easeInOutCubic',
          duration: 2500
      }
    }
  });
}

if($('#award_chart').length != 0){
  var award_chart_box = $('#award_chart');
  var award_chart = new Chart(award_chart_box, {
    type: 'bar',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      datasets:
      [
        {
          label: '# of award projects last year',
          data: [1, 9, 5, 3, 2, 6, 2, 4, 7, 2, 9, 9],
          backgroundColor: 'rgba(0, 0, 2, 0.3)',
          borderColor: 'rgba(0, 0, 2, 1)',
          borderWidth: 1
        },
        {
          label: '# of award projects',
          data: [12, 19, 3, 5, 2, 3, 5, 7, 3, 4, 6, 1],
          backgroundColor: 'rgba(226, 190, 29, 0.3)',
          borderColor: 'rgba(226, 190, 29, 1)',
          borderWidth: 1
        }
      ]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: $.extend({
            beginAtZero:true,
            callback: function (value, index, values) {
                if (value >= 1000) {
                    value /= 1000;
                    value += 'k';
                }
                return value;
            }
          },ticksStyle)
        }]
      },
      animation:{
          easing: 'easeInOutCubic',
          duration: 2500
      }
    }
  });
}



if($('#award_by_amount_chart').length != 0){
  var award_by_amount_chart_box = $('#award_by_amount_chart');
  var award_by_amount_chart = new Chart(award_by_amount_chart_box, {
    type: 'bar',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      datasets:
        [
          {
            label: 'amount award projects last year',
            data: [1, 9, 5, 3, 2, 6, 2, 4, 7, 2, 9, 9],
            backgroundColor: 'rgba(0, 0, 2, 0.3)',
            borderColor: 'rgba(0, 0, 2, 1)',
            borderWidth: 1
          },
          {
            label: 'amount award projects',
            data: [12, 19, 3, 5, 2, 3, 5, 7, 3, 4, 6, 1],
            backgroundColor: ' rgba(178, 219, 15, 0.3)',
            borderColor: 'rgba(178, 219, 15, 1)',
            borderWidth: 1
          }
        ]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: $.extend({
            beginAtZero:true,
            callback: function (value, index, values) {
                if (value >= 1000) {
                    value /= 1000;
                    value += 'k';
                }
                return '$'+value;
            }
          },ticksStyle)
        }]
      },
      animation:{
          easing: 'easeInOutCubic',
          duration: 2500
      }
    }
  });
}

if($('#submitted_pie_chart').length != 0){
  var submitted_pie_chart_box = $('#submitted_pie_chart');
  var submitted_pie_chart = new Chart(submitted_pie_chart_box, {
    type: 'pie',
    data:
    {
      labels: ['8(a)', 'Full Open', 'HUBZone', 'Small Business', 'Sources sought'],
      datasets:
      [{
        label: "Population (millions)",
        backgroundColor: ['#f75a6a', '#f441be', '#f8d200', '#0cd63f', '#137024'],
        data: [12,4,5,5,3]
      }]
    },
    options:
    {
      maintainAspectRatio: false,
      title: {
          display: false,
          text: 'Predicted world population (millions) in 2050'
      },
      cutoutPercentage: 0,
      animation:{
          easing: 'easeInOutCubic',
          duration: 2500
      }
    }
  });
}

if($('#result_pie_chart').length != 0){
  var result_pie_chart_box = $('#result_pie_chart');
  var result_pie_chart = new Chart(result_pie_chart_box, {
    type: 'pie',
    data:
    {
      labels: ['Cancelled', 'Disqualified', 'Loss', 'Re-posted', 'To be determined'],
      datasets:
      [{
        label: "Population (millions)",
        backgroundColor: ['#3afcfc', '#2009f2', '#ef17cf', '#f44256', '#f4dc04'],
        data: [12,4,5,5,10]
      }]
    },
    options:
    {
      maintainAspectRatio: false,
      title: {
          display: false,
          text: 'Predicted world population (millions) in 2050'
      },
      cutoutPercentage: 0,
      animation:{
          easing: 'easeInOutCubic',
          duration: 2500
      }
    }
  });
}

if($('#follow_up_chart').length != 0){
  var follow_up_chart_box = $('#follow_up_chart');
  var follow_up_chart = new Chart(follow_up_chart_box, {
    type: 'pie',
    data:
    {
      labels: ['Follow up', 'Not follow up'],
      datasets:
      [{
        label: "Population (millions)",
        backgroundColor: ['#00db5f', '#6a27b2'],
        data: [12,4]
      }]
    },
    options:
    {
      maintainAspectRatio: false,
      title: {
          display: false,
          text: 'Predicted world population (millions) in 2050'
      },
      cutoutPercentage: 0,
      animation:{
          easing: 'easeInOutCubic',
          duration: 2500
      }
    }
  });
}

if($('#subject_chart').length != 0){
  var subject_chart_box = $('#subject_chart');
  var subject_chart = new Chart(subject_chart_box, {
    type: 'pie',
    data:
    {
      labels: ['AV', 'IT', 'Logistics', 'Sources sought'],
      datasets:
      [{
        label: "Population (millions)",
        backgroundColor: ['#9cd7e2', '#f7c767', '#af0101', '#edf767'],
        data: [12,4,1,3]
      }]
    },
    options:
    {
      maintainAspectRatio: false,
      title: {
          display: false,
          text: 'Predicted world population (millions) in 2050'
      },
      cutoutPercentage: 0,
      animation:{
          easing: 'easeInOutCubic',
          duration: 2500
      }
    }
  });
}
/***********************************************************************************************************************
END JQUERY CODE
***********************************************************************************************************************/
