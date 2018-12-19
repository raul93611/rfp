<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Projects</h1>
        </div>
        <div class="col-sm-6">
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <section class="col-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="float-left card-title">Partner list</h3>
              <a href="#" id="partner_new_modal" class="float-right btn btn-sm btn-primary"><i class="fas fa-plus"></i></a>
            </div>
            <div class="card-body table-responsive">
              <?php
              PartnerListRepository::print_partner_list();
              ?>
            </div>
          </div>
        </section>
      </div>
    </div>
  </section>
</div>
<!--***********************************************MODAL EDIT CONTACT******************-->
<div class="modal fade" id="new_partner_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">New partner</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form_new_partner" action="<?php echo SAVE_NEW_PARTNER; ?>" method="post">
          <div class="form-group">
            <label for="company_name">Company:</label>
            <input type="text" name="company_name" class="form-control form-control-sm" value="">
          </div>
          <div class="form-group">
            <label for="poc_name">POC:</label>
            <input type="text" name="poc_name" class="form-control form-control-sm" value="">
          </div>
          <div class="form-group">
            <label for="partner_phone">Phone:</label>
            <input type="text" name="partner_phone" class="form-control form-control-sm" value="">
          </div>
          <div class="form-group">
            <label for="partner_email">Email:</label>
            <input type="email" name="partner_email" class="form-control form-control-sm" value="">
          </div>
          <div class="form-group">
            <label for="area_of_expertise">Area of Expertise:</label>
            <input type="text" name="area_of_expertise" class="form-control form-control-sm" value="">
          </div>
          <div class="form-group">
            <label for="elogic_poc_partner">Elogic POC with this partner:</label>
            <input type="text" name="elogic_poc_partner" class="form-control form-control-sm" value="">
          </div>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="worked_before" name="worked_before" value="yes">
            <label class="custom-control-label" for="worked_before">Worked with them before</label>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" name="save_new_partner" form="form_new_partner" class="btn btn-success"><i class="fa fa-check"></i> Send</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban"></i> Cancel</button>
      </div>
    </div>
  </div>
</div>
<!--*********************************************EDIT_PARTNER MODAL**************************************-->
<div class="modal fade" id="partner_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Partner</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="submit" name="save_partner" form="form_partner" class="btn btn-success"><i class="fa fa-check"></i> Send</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban"></i> Cancel</button>
      </div>
    </div>
  </div>
</div>
