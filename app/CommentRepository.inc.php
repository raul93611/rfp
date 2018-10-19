<?php
class CommentRepository{
  public static function insert_comment($connection, $comment){
    if(isset($connection)){
      try{
        $sql = 'INSERT INTO comments(id_project, id_user, comment_date, comment) VALUES(:id_project, :id_user, NOW(), :comment)';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_project', $comment-> get_id_project(), PDO::PARAM_STR);
        $sentence-> bindParam(':id_user', $comment-> get_id_user(), PDO::PARAM_STR);
        $sentence-> bindParam(':comment', $comment-> get_comment(), PDO::PARAM_STR);
        $sentence-> execute();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
  }

  public static function get_all_comments_by_id_project($connection, $id_project){
    $comments = [];
    if(isset($connection)){
      try{
        $sql = 'SELECT * FROM comments WHERE id_project = :id_project ORDER BY comment_date DESC';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_project', $id_project, PDO::PARAM_STR);
        $sentence-> execute();
        $result = $sentence-> fetchAll(PDO::FETCH_ASSOC);
        if(count($result)){
          foreach ($result as $row) {
            $comments[] = new Comment($row['id'], $row['id_project'], $row['id_user'], $row['comment_date'], $row['comment']);
          }
        }
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return $comments;
  }

  public static function delete_all_comments($connection, $id_project){
    if(isset($connection)){
      try{
        $sql = 'DELETE FROM comments WHERE id_project = :id_project';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_project', $id_project, PDO::PARAM_STR);
        $sentence-> execute();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
  }

  public static function print_comments($id_project){
    Connection::open_connection();
    $project = ProjectRepository::get_project_by_id(Connection::get_connection(), $id_project);
    $comments = self::get_all_comments_by_id_project(Connection::get_connection(), $id_project);
    Connection::close_connection();
    if(count($comments)){
      ?>
      <ul class="timeline">
        <li>
          <i class="fa fa-bookmark"></i>
          <div class="timeline-item">
            <h3 class="timeline-header">Project: <?php echo $project-> get_project_name(); ?></h3>
          </div>
        </li>
        <?php
        foreach ($comments as $comment) {
          $comment_date = ProjectRepository::mysql_datetime_to_english_format($comment-> get_comment_date());
          ?>
          <li class="body_comments">
            <i class="fa fa-user"></i>
            <div class="timeline-item">
              <span class="time"><i class="far fa-clock"></i> <?php echo $comment_date; ?></span>
              <h3 class="timeline-header">
                <span class="text-primary">
                <?php
                Connection::open_connection();
                $user = UserRepository::get_user_by_id(Connection::get_connection(), $comment-> get_id_user());
                Connection::close_connection();
                echo $user-> get_username();
                ?>
                </span>
                 said</h3>
              <div class="timeline-body">
                <?php echo nl2br($comment-> get_comment()); ?>
              </div>
            </div>
          </li>
          <?php
        }
        ?>
        <li>
          <i class="fa fa-infinity"></i>
        </li>
        </ul>
      <?php
    }
  }

  public static function count_all_comments_project($connection, $id_project){
    $all_comments_project = 0;
    if(isset($connection)){
      $sql = 'SELECT COUNT(*) as all_comments_project FROM comments WHERE id_project = :id_project';
      $sentence = $connection-> prepare($sql);
      $sentence-> bindParam(':id_project', $id_project, PDO::PARAM_STR);
      $sentence-> execute();
      $result = $sentence-> fetch(PDO::FETCH_ASSOC);
      if(count($result)){
        $all_comments_project = $result['all_comments_project'];
      }
    }
    return $all_comments_project;
  }
}
?>
