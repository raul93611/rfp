<?php
Connection::open_connection();
$end_dates = ProjectRepository::get_all_end_dates_reviewed_projects(Connection::get_connection());
Connection::close_connection();
?>
<input type="hidden" id="all_end_dates" value='<?php echo json_encode($end_dates); ?>'>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h1 class="m-0 text-dark">All projects</h1>
                </div>
                <div class="col-sm-4">
                  <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                    <a class="btn btn-primary" href="<?php echo PROFILE; ?>">New projects</a>

                    <div class="btn-group" role="group">
                      <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Projects
                      </button>
                      <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item" href="<?php echo PROFILE . 'calendar_projects'; ?>">All projects</a>
                        <a class="dropdown-item" href="<?php echo PROFILE . 'calendar_my_projects'; ?>">My projects</a>
                      </div>
                    </div>
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
                <div id="calendar_projects"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
