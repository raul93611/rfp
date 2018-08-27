<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title"><i class="fa fa-plus"></i> Main information</h3>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col">
        <div class="form-group">
          <?php
          Connection::open_connection();
          $users = UserRepository::get_users_3_4(Connection::get_connection());
          Connection::close_connection();
          ?>
          <?php
          if (count($users)) {
            ?>
            <label for="designated_user">Designated user:</label>
            <select id="designated_user" disabled class="form-control" name="designated_user">
            <?php
            foreach ($users as $user) {
              ?>
              <option value="<?php echo $user-> get_id(); ?>" <?php if ($user-> get_id() == $project-> get_designated_user()) {echo 'selected';}?>><?php echo $user-> get_username(); ?></option>
              <?php
              }
              ?>
            </select>
            <?php
          }
          ?>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="code">Code:</label>
          <input type="text" name="code" id="code" class="form-control" value="<?php echo $project-> get_code(); ?>" placeholder="Code ..." autofocus>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="project_name">Name:</label>
          <input class="form-control" type="text" id="project_name" name="project_name" placeholder="Project name ..." autofocus required value="<?php echo $project-> get_project_name(); ?>">
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="business_type">Business type:</label>
          <select class="form-control" name="business_type" id="business_type">
            <option value="federal" <?php if($project-> get_business_type() == 'federal'){echo 'selected';} ?>>Federal</option>
            <option value="state" <?php if($project-> get_business_type() == 'state'){echo 'selected';} ?>>State</option>
            <option value="commercial" <?php if($project-> get_business_type() == 'commercial'){echo 'selected';} ?>>Commercial</option>
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="form-group">
          <label for="start_date">Start date:</label>
          <input class="form-control" type="text" id="start_date" disabled name="start_date" required value="<?php echo $start_date; ?>">
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="end_date">End date:</label>
          <input class="form-control" type="text" id="end_date" name="end_date" required value="<?php echo $end_date; ?>">
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="quantity_years">Years:</label>
          <input type="number" name="quantity_years" class="form-control" id="quantity_years" value="<?php echo $project-> get_quantity_years(); ?>">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="form-group">
          <label for="priority">Priority:</label>
          <select class="form-control" name="priority" id="priority">
            <option value="8a" <?php if($project-> get_priority() == '8a'){echo 'selected';} ?>>8(a)</option>
            <option value="hubzone" <?php if($project-> get_priority() == 'hubzone'){echo 'selected';} ?>>HUBZone</option>
            <option value="small_business" <?php if($project-> get_priority() == 'small_business'){echo 'selected';} ?>>Small Business</option>
            <option value="full_and_open" <?php if($project-> get_priority() == 'full_and_open'){echo 'selected';} ?>>Full and Open</option>
          </select>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="submission_instructions">Submission instructions:</label>
          <select class="form-control" name="submission_instructions" id="submission_instructions">
            <option value="email" <?php if($project-> get_submission_instructions() == 'email'){echo 'selected';} ?>>E-mail</option>
            <option value="mail" <?php if($project-> get_submission_instructions() == 'mail'){echo 'selected';} ?>>Mail</option>
            <option value="gsa" <?php if($project-> get_submission_instructions() == 'gsa'){echo 'selected';} ?>>GSA</option>
            <option value="fedbid" <?php if($project-> get_submission_instructions() == 'fedbid'){echo 'selected';} ?>>FedBid</option>
            <option value="seaport" <?php if($project-> get_submission_instructions() == 'seaport'){echo 'selected';} ?>>SeaPort</option>
            <option value="others" <?php if($project-> get_submission_instructions() == 'others'){echo 'selected';} ?>>Others</option>
          </select>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="type">Type:</label>
          <select class="form-control" name="type" id="type">
            <option value="services" <?php if($project-> get_type() == 'services'){echo 'selected';} ?>>Services</option>
            <option value="services_and_equipment" <?php if($project-> get_type() == 'services_and_equipment'){echo 'selected';} ?>>Services and equipment</option>
          </select>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="subject">Subject:</label>
          <select class="form-control" name="subject" id="subject">
            <option value="av" <?php if($project-> get_subject() == 'av'){echo 'selected';} ?>>AV</option>
            <option value="it" <?php if($project-> get_subject() == 'it'){echo 'selected';} ?>>IT</option>
            <option value="logistics" <?php if($project-> get_subject() == 'logistics'){echo 'selected';} ?>>Logistics</option>
            <option value="sources_sought" <?php if($project-> get_subject() == 'sources_sought'){echo 'selected';} ?>>Sources sought</option>
          </select>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="description">Description:</label>
      <textarea class="form-control" name="description" id="description" rows="10"><?php echo $project-> get_description(); ?></textarea>
    </div>
  </div>
</div>
