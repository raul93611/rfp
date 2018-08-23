<?php
Connection::open_connection();
$end_dates = ProjectRepository::get_all_end_dates_my_projects(Connection::get_connection(), $_SESSION['id_user']);
$new_dates = ProjectRepository::get_all_new_dates_my_projects(Connection::get_connection(), $_SESSION['id_user']);
Connection::close_connection();
$all_my_dates = array_merge($end_dates, $new_dates);
?>
<input type="hidden" id="all_my_dates" value='<?php echo json_encode($all_my_dates); ?>'>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">My projects</h1>
                </div>
                <div class="col-sm-6">
                  <div class="btn-group" role="group">
                    <a class="btn btn-<?php if($current_manager == 'calendar_new_projects'){echo 'primary';}else{echo 'secondary';} ?>" href="<?php echo CALENDAR_NEW_PROJECTS; ?>">New projects</a>
                    <a class="btn btn-<?php if($current_manager == 'calendar_projects'){echo 'primary';}else{echo 'secondary';} ?>" href="<?php echo CALENDAR_PROJECTS; ?>">All projects</a>
                    <a class="btn btn-<?php if($current_manager == 'calendar_my_projects'){echo 'primary';}else{echo 'secondary';} ?>" href="<?php echo CALENDAR_MY_PROJECTS; ?>">My projects</a>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-2">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fa fa-copy"></i> References</h3>
              </div>
              <div class="card-body">
                <p>
                  <i class="fa fa-square" style="color:#f75a6a;"></i> 8(a)<br>
                  <i class="fa fa-square" style="color:#f8d200;"></i> HUBZone<br>
                  <i class="fa fa-square" style="color:#0cd63f;"></i> Small business<br>
                  <i class="fa fa-square" style="color:#f441be;"></i> Full and Open<br><br>
                  <i class="fa fa-square" style="color:#7041f4;"></i> New projects<br>
                  <i class="fa fa-square" style="color:black:"></i> No Bid
                </p>
              </div>
            </div>
          </div>
          <div class="col-10">
            <div class="card">
              <div class="card-body">
                <div id="calendar_my_projects"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
