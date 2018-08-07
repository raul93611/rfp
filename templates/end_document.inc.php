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
            <label for="create_part_comments"></label>
            <textarea class="form-control" name="create_part_comments" rows="5" id="create_part_comments"></textarea>
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
<script src="<?php echo PLUGINS; ?>fastclick/fastclick.js"></script>
<script src="<?php echo DIST; ?>js/adminlte.js"></script>
<script src="<?php echo DIST; ?>js/demo.js"></script>
<script src="<?php echo PLUGINS; ?>jQueryUI/jquery-ui.min.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="<?php echo JS; ?>raphael-min.js"></script>
<script src="<?php echo PLUGINS; ?>morris/morris.min.js"></script>
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
<script src="<?php echo PLUGINS; ?>ckeditor/ckeditor.js"></script>
<script src="<?php echo PLUGINS; ?>bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="<?php echo PLUGINS; ?>slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo DIST; ?>js/pages/dashboard.js"></script>
<script src="<?php echo PLUGINS; ?>fullcalendar/fullcalendar.js"></script>
<script src="<?php echo JS; ?>js_sistema.js"></script>
<script src="<?php echo DIST; ?>js/pages/dashboard3.js"></script>
</body>
</html>
