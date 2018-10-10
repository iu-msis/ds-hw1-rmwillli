<?php

class Comment
{
  public $id;
  public $comment;

  public function __construct($row) { //constructor --> turning this into a new instance of team
    $this->id = isset($row['id']) ? intval($row['id']) : null;
    $this->comment = $row['comment'];
  }

  public static function getAllComments() {
    $connect = @mysql_connect($mysql_host, $mysql_user, $mysql_password)or die(mysql_error());
    $db = @mysql_select_db($mysql_database,$connect)or die(mysql_error());
    $sql = 'SELECT * FROM Comment';
    $statement = $db->prepare($sql);
    $success = $statement->execute();
    $commentArr = [];
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $comment =  new Comment($row);
      array_push($CommentArr, $comment);
    }
    return $commentArr;
  }

  public function createComment(){
    $connect = @mysql_connect($mysql_host, $mysql_user, $mysql_password)or die(mysql_error());
    $db = @mysql_select_db($mysql_database,$connect)or die(mysql_error());
    $sql = 'INSERT INTO Comment (comment) VALUES (?)';
    $statement = $db->prepare($sql);
    $success = $statement->execute([$this->comment]);
    $this->id = $db->lastInsertId();
  }
}
