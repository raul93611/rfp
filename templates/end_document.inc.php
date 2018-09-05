<div class="modal modal-danger fade" id="form_uncompleted">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-danger"><i class="fa fa-exclamation-triangle"></i> ALERT</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="form_uncompleted_body">
        <h4 class="text-center text-danger">Must be fill out</h4>
      </div>
    </div>
  </div>
</div>

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
            <input type="text" id="link" name="link" placeholder="Link ..." class="form-control form-control-sm" autofocus required>
          </div>
          <div class="form-group">
            <label for="create_part_comments">Comments:</label>
            <textarea class="form-control form-control-sm" name="create_part_comments" rows="5" id="create_part_comments"></textarea>
          </div>
          <div class="form-group">
            <label for="documents">Upload documents:</label><br>
            <div class="custom-file">
              <input type="file" name="documents[]" multiple class="custom-file-input" id="file_input_info_create">
              <label id="label_file_create" class="custom-file-label" for="file_input_info_create">Choose file</label>
            </div>
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
<div class="modal fade" id="report_error_rfq_quote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Report error</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form_error_quote_email" method="post" action="<?php echo SEND_ERROR_QUOTE_EMAIL; ?>">
          <div class="form-group">
            <label for="comments_error_quote_email">Comments:</label>
            <textarea class="form-control" name="comments_error_quote_email" rows="5" id="comments_error_quote_email"></textarea>
          </div>
          <input type="hidden" name="id_project" value="<?php echo $id_project; ?>">
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" name="send_error_quote_email" form="form_error_quote_email" class="btn btn-success"><i class="fa fa-check"></i> Send</button>
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
          <p class="break_words"><a href="" target="_blank" class="link" id="link_project"></a></p>
        </div>
      </div>
      <div class="modal-footer">
        <a href="<?php echo INFO_PROJECT; ?>" id="fill_out" class="btn btn-success"><i class="fa fa-pencil"></i> Review</a>
        <a href="<?php echo DELETE_PROJECT; ?>" id="delete_project" class="btn btn-danger"><i class="fa fa-times"></i> Delete</a>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="task_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Task info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Description:</label>
          <textarea id="task_message" class="form-control form-control-sm" disabled rows="10"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <a href="<?php echo INFO_PROJECT_AND_SERVICES; ?>" id="go_to_project" class="btn btn-success"><i class="fas fa-highlighter"></i> Review</a>
        <a href="<?php echo COMPLETED_TASK; ?>" id="completed_task" class="btn btn-primary"><i class="fa fa-check"></i> Mark as completed</a>
      </div>
    </div>
  </div>
</div>
<footer class="main-footer">
    <strong>Copyright &copy; 2018.</strong>
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0
    </div>
</footer>
</div>
<script src="<?php echo PLUGINS; ?>jquery/jquery.min.js"></script>
<script src="<?php echo PLUGINS; ?>bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo PLUGINS; ?>chart.js/Chart.min.js"></script>
<script src="<?php echo DIST; ?>js/adminlte.js"></script>
<script src="<?php echo DIST; ?>js/demo.js"></script>
<script src="<?php echo PLUGINS; ?>jQueryUI/jquery-ui.min.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="<?php echo JS; ?>raphael-min.js"></script>
<script src="<?php echo PLUGINS; ?>sparkline/jquery.sparkline.min.js"></script>
<script src="<?php echo PLUGINS; ?>jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo PLUGINS; ?>jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?php echo PLUGINS; ?>knob/jquery.knob.js"></script>
<script src="<?php echo PLUGINS; ?>input-mask/jquery.inputmask.js"></script>
<script src="<?php echo PLUGINS; ?>input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo PLUGINS; ?>input-mask/jquery.inputmask.extensions.js"></script>
<script src="<?php echo JS; ?>moment.min.js"></script>
<script src="<?php echo PLUGINS; ?>daterangepicker/daterangepicker.js"></script>
<script src="<?php echo PLUGINS; ?>datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo PLUGINS; ?>datatables/jquery.dataTables.js"></script>
<script src="<?php echo PLUGINS; ?>datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo PLUGINS; ?>ckeditor/ckeditor.js"></script>
<script src="<?php echo PLUGINS; ?>bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="<?php echo PLUGINS; ?>slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo PLUGINS; ?>fullcalendar/fullcalendar.js"></script>
<script src="<?php echo PLUGINS; ?>iCheck/icheck.js"></script>
<script src="<?php echo JS; ?>js_sistema.js"></script>
</body>
</html>
