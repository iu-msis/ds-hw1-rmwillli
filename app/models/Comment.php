<?php

class Comment
{
  public $id;
  public $comment;

  public function __construct($row) { //constructor --> turning this into a new instance of team
    $this->id = intval($row['id']);

    $this->comment = $row['comment'];
  }

  public static function findAll() {
    // 1. Connect to the database
    $db = new PDO(DB_SERVER, DB_USER, DB_PW);

    // 2. Prepare the query
    $sql = 'SELECT * FROM Comment';

    $statement = $db->prepare($sql); //make pdo statement object --> knows how to query database and  handle response

    // 3. Run the query
    $success = $statement->execute(
        [$id]
    );

    // 4. Handle the results
    $commentArr = [];
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {  //get the next row in the query
      // 4.a. For each row, make a new work object
      $comment =  new Comment($row);

      var_dump($comment);
      die;
      array_push($arr, $comment);
    }

    // 4.b. return the array of work objects

    return $commentArr;
  }
}
