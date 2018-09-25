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
}
?>
