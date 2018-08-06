<?php
Connection::open_connection();
$projects = ProjectRepository::get_all_unreviewed_projects(Connection::get_connection());
Connection::close_connection();
?>
<input type="hidden" id="all_events" value='<?php echo json_encode($projects); ?>'>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-9">
                    <h1 class="m-0 text-dark">Pending projects</h1>
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
                <div id="calendar_new_projects"></div>
                <div class="modal fade" id="add_project" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Add project</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form id="form_new_project" method="post" enctype="multipart/form-data" action="<?php echo SAVE_PROJECT; ?>">
                          <div class="form-group">
                            <label for="link">Link:</label>
                            <input type="text" id="link" name="link" placeholder="Link ..." class="form-control" autofocus required>
                          </div>
                          <div class="form-group">
                            <label for="documents">Documents:</label><br>
                            <input type="file" id="documents" name="documents[]" class="btn btn-block btn-secondary" multiple>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" name="save_project" form="form_new_project" class="btn btn-success"><i class="fa fa-check"></i> Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban"></i> Cancel</button>
                      </div>
                    </div>
                  </div>
                </div>
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
          <div class="col-2">

          </div>
        </div>
      </div>
    </section>
</div>
