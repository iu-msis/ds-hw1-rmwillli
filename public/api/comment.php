<?php
require '../../app/common.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $comment = new Comment($_POST);
  $comment->createComment();
  echo json_encode($comment);
  exit;
}

// 1. Go to the database and get all work associated with the $taskId
$commentArr = Comment::getAllComments();
// 2. Convert to JSON
$json = json_encode($commentArr, JSON_PRETTY_PRINT);
// 3. Print
header('Content-Type: application/json');
echo $json;
