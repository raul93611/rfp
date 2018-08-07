<?php
Connection::open_connection();
$projects = ProjectRepository::get_all_reviewed_projects(Connection::get_connection());
Connection::close_connection();
?>
<input type="hidden" id="all_reviewed_events" value='<?php echo json_encode($projects); ?>'>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-9">
                    <h1 class="m-0 text-dark">All projects</h1>
                </div>
                <div class="col-sm-3">
                  <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                    <a class="btn btn-primary" href="<?php echo PROFILE; ?>">Pending projects</a>

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

          </div>
          <div class="col-8">
            <div class="card">
              <div class="card-body">
                <div id="calendar_projects"></div>
              </div>
            </div>
          </div>
          <div class="col-2">

          </div>
        </div>
      </div>
    </section>
</div>
