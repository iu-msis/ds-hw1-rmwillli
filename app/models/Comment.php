<?php

class Comment
{
  public $id;
  public $comment;

  public function __construct($row) { //constructor --> turning this into a new instance of team
    $this->id = isset($row['id']) ? intval($row['id']) : null;
    $this->comment = $row['comment'];
  }

    public function createComment(){
      $db = new PDO(DB_SERVER, DB_USER, DB_PW);
      $sql = 'INSERT INTO Comment (comment) VALUES (?)';
      $statement = $db->prepare($sql);
      $success = $statement->execute([$this->comment]);
      $this->id = $db->lastInsertId();
    }

  public static function getAllComments() {
    $db = new PDO(DB_SERVER, DB_USER, DB_PW);
    $sql = 'SELECT * FROM Comment';
    $statement = $db->prepare($sql);
    $success = $statement->execute();
    $arr = [];
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $comment =  new Comment($row);
      array_push($arr, $comment);
    }
    return $arr;
  }
}
