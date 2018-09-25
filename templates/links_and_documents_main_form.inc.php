<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title"><i class="fas fa-link"></i> Links and documents</h3>
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
                  echo '<li class="list-group-item"><a download href="' . DOCS . $id_project . '/' . $file_url . '">' . $file . '</a><a href="' . DELETE_DOCUMENT . $id_project . '/' . $file . '" class="delete_document_button close"><span aria-hidden="true">&times;</span></a></li>';
              }
          }
          closedir($manager);
          echo "</div>";
      }
      ?>
    </div>
    <div class="form-group">
      <label for="documents">Upload documents:</label><br>
      <div class="custom-file">
        <input type="file" name="documents[]" multiple class="custom-file-input" id="file_input_info">
        <label id="label_file" class="custom-file-label" for="file_input_info">Choose file</label>
      </div>
    </div>
  </div>
</div>
