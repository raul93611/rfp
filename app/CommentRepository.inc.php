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
}
?>
