<?php
Connection::open_connection();
$project = ProjectRepository::get_project_by_id(Connection::get_connection(), $id_project);
Connection::close_connection();
if($project-> get_start_date() != '0000-00-00'){
  $start_date = ProjectRepository::mysql_date_to_english_format($project-> get_start_date());
}else{
  $start_date = '';
}

$hoy = getdate();
$fecha_default = $hoy['mon'] . '/' . $hoy['mday'] . '/' . $hoy['year'];

if($project-> get_end_date() != '0000-00-00 00:00:00'){
  $end_date = ProjectRepository::mysql_datetime_to_english_format($project-> get_end_date());
}else{
  $end_date = $fecha_default;
}
?>
<input type="hidden" name="id_project" id="id_project" value="<?php echo $id_project; ?>">
<div class="card card-primary">
  <div class="card-header">
      <h3 class="card-title"><i class="fa fa-plus"></i> Links and documents</h3>
  </div>
  <div class="card-body">
    <div class="form-group">
      <label>Link:</label><br>
      <span>
        <?php if($project-> get_link() != ''){
        ?>
        <a href="<?php echo $project-> get_link(); ?>" target="_blank"><?php echo $project-> get_link(); ?></a>
        <?php
        }else{
          ?>
          <h3 class="text-center text-danger"><i class="fa fa-times"></i> No link!</h3>
          <?php
        }
        ?>
      </span>
    </div>
    <div class="form-group">
      <label>Documents:</label>
      <?php
      $directory = $_SERVER['DOCUMENT_ROOT'] . '/rfp/documents/' . $id_project;
      if (is_dir($directory)) {
          $manager = opendir($directory);
          echo '<div class="list-group">';
          $folder = @scandir($directory);
          if(count($folder) <= 2){
            echo '<h3 class="text-center text-danger"><i class="fa fa-times"></i> No files!</h3>';
          }
          while (($file = readdir($manager)) !== false) {
              $complete_directory = $directory . "/" . $file;
              if ($file != "." && $file != "..") {
                  $file_url = str_replace(' ', '%20', $file);
                  $file_url = str_replace('#', '%23', $file_url);
                  echo '<li class="list-group-item"><a download href="' . DOCS . $id_project . '/' . $file_url . '">' . $file . '</a><a href="' . DELETE_DOCUMENT . $id_project . '/' . $file_url . '" class="close"><span aria-hidden="true">&times;</span></a></li>';
              }
          }
          closedir($manager);
          echo "</div>";
      }
      ?>
    </div>
  </div>
</div>
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
            <select id="designated_user" class="form-control" name="designated_user">
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
          <input class="form-control" type="text" id="project_name" name="project_name" placeholder="Project name ..." value="<?php echo $project-> get_project_name(); ?>">
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
          <input class="form-control" type="text" id="start_date" disabled name="start_date" value="<?php echo $start_date; ?>">
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="end_date">End date:</label>
          <input class="form-control" type="text" id="end_date" name="end_date" value="<?php echo $end_date; ?>">
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
<div class="card-footer footer">
  <a class="btn btn-primary" id="go_back" href="<?php echo CALENDAR_NEW_PROJECTS; ?>"><i class="fa fa-reply"></i></a>
  <button type="submit" class="btn btn-success" name="save_changes_project"><i class="fa fa-check"></i> Save</button>
</div>
