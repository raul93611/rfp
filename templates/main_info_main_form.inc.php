<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title"><i class="fas fa-list-alt"></i> Main information</h3>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-sm-12">
        <div class="form-group row">
          <?php
          Connection::open_connection();
          $users = UserRepository::get_users_3_4(Connection::get_connection());
          Connection::close_connection();
          ?>
          <?php
          if (count($users)) {
            ?>
            <label class="col-sm-2 col-form-label col-form-label-sm" for="designated_user">Designated user:</label>
            <div class="col-sm-10">
              <select id="designated_user" disabled class="form-control form-control-sm" name="designated_user">
              <?php
              foreach ($users as $user) {
                ?>
                <option value="<?php echo $user-> get_id(); ?>" <?php if ($user-> get_id() == $project-> get_designated_user()) {echo 'selected';}?>><?php echo $user-> get_username(); ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <?php
          }
          ?>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label col-form-label-sm" for="code">Code:</label>
          <div class="col-sm-10">
            <input type="text" name="code" id="code" class="form-control form-control-sm" value="<?php echo $project-> get_code(); ?>" placeholder="Code ...">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label col-form-label-sm" for="project_name">Name:</label>
          <div class="col-sm-10">
            <input class="form-control form-control-sm" type="text" id="project_name" name="project_name" placeholder="Project name ..."required value="<?php echo $project-> get_project_name(); ?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label col-form-label-sm" for="business_type">Business type:</label>
          <div class="col-sm-10">
            <select class="form-control form-control-sm" name="business_type" id="business_type">
              <option value="federal" <?php if($project-> get_business_type() == 'federal'){echo 'selected';} ?>>Federal</option>
              <option value="state" <?php if($project-> get_business_type() == 'state'){echo 'selected';} ?>>State</option>
              <option value="commercial" <?php if($project-> get_business_type() == 'commercial'){echo 'selected';} ?>>Commercial</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label col-form-label-sm" for="start_date">Start date:</label>
          <div class="col-sm-10">
            <input class="form-control form-control-sm" type="text" id="start_date" disabled name="start_date" required value="<?php echo $start_date; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label col-form-label-sm" for="end_date">End date:</label>
          <div class="col-sm-10">
            <input class="form-control form-control-sm" type="text" id="end_date" name="end_date" required value="<?php echo $end_date; ?>">
          </div>
        </div>
        <?php
        if($project-> get_submitted()){
          ?>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label col-form-label-sm" for="expiration_date">Expiration date:</label>
              <div class="col-sm-10">
                <input class="form-control form-control-sm" type="text" id="expiration_date" name="expiration_date" value="<?php echo $expiration_date; ?>">
              </div>
            </div>
          <?php
        }
        ?>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label col-form-label-sm" for="quantity_years">Years:</label>
          <div class="col-sm-10">
            <input type="number" name="quantity_years" class="form-control form-control-sm" id="quantity_years" value="<?php echo $project-> get_quantity_years(); ?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label col-form-label-sm" for="priority">Priority:</label>
          <div class="col-sm-10">
            <select class="form-control form-control-sm" name="priority" id="priority">
              <option value="8a" <?php if($project-> get_priority() == '8a'){echo 'selected';} ?>>8(a)</option>
              <option value="hubzone" <?php if($project-> get_priority() == 'hubzone'){echo 'selected';} ?>>HUBZone</option>
              <option value="small_business" <?php if($project-> get_priority() == 'small_business'){echo 'selected';} ?>>Small Business</option>
              <option value="full_and_open" <?php if($project-> get_priority() == 'full_and_open'){echo 'selected';} ?>>Full and Open</option>
              <option value="sources_sought" <?php if($project-> get_priority() == 'sources_sought'){echo 'selected';} ?>>Sources sought</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label col-form-label-sm" for="submission_instructions">Submission instructions:</label>
          <div class="col-sm-10">
            <select class="form-control form-control-sm" name="submission_instructions" id="submission_instructions">
              <option value="email" <?php if($project-> get_submission_instructions() == 'email'){echo 'selected';} ?>>E-mail</option>
              <option value="mail" <?php if($project-> get_submission_instructions() == 'mail'){echo 'selected';} ?>>Mail</option>
              <option value="gsa" <?php if($project-> get_submission_instructions() == 'gsa'){echo 'selected';} ?>>GSA</option>
              <option value="fedbid" <?php if($project-> get_submission_instructions() == 'fedbid'){echo 'selected';} ?>>FedBid</option>
              <option value="seaport" <?php if($project-> get_submission_instructions() == 'seaport'){echo 'selected';} ?>>SeaPort</option>
              <option value="others" <?php if($project-> get_submission_instructions() == 'others'){echo 'selected';} ?>>Others</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label col-form-label-sm" for="type">Type:</label>
          <div class="col-sm-10">
            <input class="form-control form-control-sm" name="type" id="type" readonly value="<?php if($project-> get_type() == 'services_and_equipment'){echo 'Services and equipment';}else{echo 'Services';} ?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label col-form-label-sm" for="subject">Subject:</label>
          <div class="col-sm-10">
            <select class="form-control form-control-sm" name="subject" id="subject">
              <option value="av" <?php if($project-> get_subject() == 'av'){echo 'selected';} ?>>AV</option>
              <option value="it" <?php if($project-> get_subject() == 'it'){echo 'selected';} ?>>IT</option>
              <option value="logistics" <?php if($project-> get_subject() == 'logistics'){echo 'selected';} ?>>Logistics</option>
              <option value="sources_sought" <?php if($project-> get_subject() == 'sources_sought'){echo 'selected';} ?>>Sources sought</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label col-form-label-sm" for="address">Address:</label>
          <div class="col-sm-10">
            <textarea class="form-control form-control-sm" name="address" id="address" rows="5"><?php echo $project-> get_address(); ?></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label col-form-label-sm" for="ship_to">Ship to:</label>
          <div class="col-sm-10">
            <textarea class="form-control form-control-sm" name="ship_to" id="ship_to" rows="5"><?php echo $project-> get_ship_to(); ?></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label col-form-label-sm" for="description">Description:</label>
          <div class="col-sm-10">
            <textarea class="form-control form-control-sm" name="description" id="description" rows="5"><?php echo $project-> get_description(); ?></textarea>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
