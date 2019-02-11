<?php
if($level == 1){
  if($current_manager == ''){
    include_once 'templates/admin_dashboard.inc.php';
  }else if($current_manager == 'calendar_new_projects'){
    include_once 'templates/calendar_new_projects.inc.php';
  }else if($current_manager == 'calendar_projects'){
    include_once 'templates/calendar_projects.inc.php';
  }else if($current_manager == 'calendar_my_projects'){
    include_once 'templates/calendar_my_projects.inc.php';
  }else if($current_manager == 'calendar_my_tasks'){
    include_once 'templates/calendar_my_tasks.inc.php';
  }
}else if($current_manager == ''){
  include_once 'templates/story_comments.inc.php';
}else if($current_manager == 'calendar_new_projects'){
  include_once 'templates/calendar_new_projects.inc.php';
}else if($current_manager == 'calendar_projects'){
  include_once 'templates/calendar_projects.inc.php';
}else if($current_manager == 'calendar_my_projects'){
  include_once 'templates/calendar_my_projects.inc.php';
}else if($current_manager == 'calendar_my_tasks'){
  include_once 'templates/calendar_my_tasks.inc.php';
}
?>
