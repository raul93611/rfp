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
                <div class="col-sm-8">
                    <h1 class="m-0 text-dark">New projects</h1>
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
                <div id="calendar_new_projects"></div>
                <div class="modal fade" id="view_project" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Project info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label>Link:</label>
                          <p><a href="" target="_blank" class="link" id="link_project"></a></p>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <a href="<?php echo INFO_PROJECT; ?>" id="fill_out" class="btn btn-success"><i class="fa fa-pencil"></i> Review</a>
                        <a href="<?php echo DELETE_PROJECT; ?>" id="delete_project" class="btn btn-danger"><i class="fa fa-times"></i> Delete</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
