<?php
Connection::open_connection();
$projects = ProjectRepository::get_all_unreviewed_projects(Connection::get_connection());
Connection::close_connection();
?>
<input type="hidden" id="all_new_dates" value='<?php echo json_encode($projects); ?>'>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-4">
                    <h1 class="m-0 text-dark">New projects</h1>
                </div>
                <div class="col-md-8">
                  <div class="btn-group" role="group">
                    <a class="btn btn-<?php if($current_manager == 'calendar_new_projects'){echo 'primary';}else{echo 'secondary';} ?>" href="<?php echo CALENDAR_NEW_PROJECTS; ?>">New projects</a>
                    <a class="btn btn-<?php if($current_manager == 'calendar_project'){echo 'primary';}else{echo 'secondary';} ?>" href="<?php echo CALENDAR_PROJECTS; ?>">All projects</a>
                    <a class="btn btn-<?php if($current_manager == 'calendar_my_projects'){echo 'primary';}else{echo 'secondary';} ?>" href="<?php echo CALENDAR_MY_PROJECTS; ?>">My projects</a>
                    <a class="btn btn-<?php if($current_manager == 'calendar_my_tasks'){echo 'primary';}else{echo 'secondary';} ?>" href="<?php echo CALENDAR_MY_TASKS; ?>">My tasks</a>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-2">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fa fa-copy"></i> References</h3>
              </div>
              <div class="card-body">
                <p>
                  <i class="fa fa-square" style="color:#ff5253;"></i> 8(a)<br>
                  <i class="fa fa-square" style="color:#ffd73f;"></i> HUBZone<br>
                  <i class="fa fa-square" style="color:#18d2f0;"></i> Small business<br>
                  <i class="fa fa-square" style="color:#be90e3;"></i> Full and Open<br>
                  <i class="fa fa-square" style="color:#448aff;"></i> Sources sought<br><br>
                  <i class="fa fa-square" style="color:#3fd5ae;"></i> New projects<br>
                  <i class="fa fa-square" style="color:#c7d0d3;"></i> No Bid
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-10">
            <div class="card">
              <div class="card-body">
                <div id="calendar_new_projects"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
