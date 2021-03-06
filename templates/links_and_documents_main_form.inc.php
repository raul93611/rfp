<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title"><i class="fas fa-link"></i> Links and documents</h3>
  </div>
  <div class="card-body">
    <label>Members:</label><br>
    <?php
    Connection::open_connection();
    $users = UserRepository::get_all_users_enabled(Connection::get_connection());
    Connection::close_connection();
    foreach ($users as $user) {
      if($user-> get_level() != 2){
        ?>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" name="members[]" value="<?php echo $user-> get_id(); ?>" id="<?php echo $user-> get_id(); ?>"
          <?php
          $members = explode('|', $project-> get_members());
          if(count($members)){
            foreach ($members as $member) {
              if($member == $user-> get_id()){
                echo 'checked';
              }
            }
          }
          if($level == 5){
            echo ' disabled';
          }
          ?>
          >
          <label class="custom-control-label" for="<?php echo $user-> get_id(); ?>"><?php echo $user-> get_username(); ?></label>
        </div>
        <?php
      }
    }
    if(!$project-> get_previous_contract()){
      Connection::open_connection();
      $previous_contracts = ProjectRepository::get_all_previous_contracts(Connection::get_connection(), $project-> get_id());
      Connection::close_connection();
      ?>
      <div class="form-group">
        <br>
        <label>Previous contracts:</label>
        <div class="list-group">
          <?php
          if(count($previous_contracts)){
            foreach ($previous_contracts as $i => $previous_contract) {
              ?>
              <a class="list-group-item list-group-item-action" href="<?php echo INFO_PROJECT_AND_SERVICES . $previous_contract-> get_id(); ?>">Previous contract: <?php echo $previous_contract-> get_id(); ?></a>
              <?php
            }
          }else{
            ?>
            <h3 class="text-center text-danger"><i class="fa fa-times"></i> No previous contracts!</h3>
            <?php
          }
          ?>
        </div>
      </div>
      <?php
    }
    ?>
    <div class="form-group">
      <br>
      <label>Link:</label><br>
      <span>
        <?php if($project-> get_link() != ''){
          if($project-> get_link() == 'RFQ project'){
            ?><p>RFQ project</p><?php
          }else {
            ?>
            <a href="<?php echo $project-> get_link(); ?>" target="_blank"><?php echo $project-> get_link(); ?></a>
            <?php
          }
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
        $folder = @scandir($directory);
        if(count($folder) <= 2){
        }
        $files = [];
        while (($file = readdir($manager)) !== false) {
          $complete_directory = $directory . "/" . $file;
          if ($file != "." && $file != "..") {
            $files[] = $file;
          }
        }
        $files = implode(',', $files);
        ?>
        <input type="hidden" id="files" value="<?php echo $files; ?>">
        <?php
        closedir($manager);
      }
      ?>
      <input type="file" id="file_input" multiple name="file_input[]">
      <br>
      <?php
      /*
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
                  echo '<li class="list-group-item"><a download href="' . DOCS . $id_project . '/' . $file_url . '">' . $file . '</a><a href="' . DELETE_DOCUMENT . $id_project . '/' . $file . '" class="delete_document_button close"><span aria-hidden="true">&times;</span></a></li>';
              }
          }
          closedir($manager);
          echo "</div>";
      }*/
      ?>
    </div>
    <!--<div class="form-group">
      <label for="documents">Upload documents:</label><br>
      <div class="custom-file">
        <input type="file" name="documents[]" multiple class="custom-file-input" id="file_input_info">
        <label id="label_file" class="custom-file-label" for="file_input_info">Choose file</label>
      </div>
    </div>-->
  </div>
</div>
