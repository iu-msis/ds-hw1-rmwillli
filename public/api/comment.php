<?php
require '../../app/common.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  require 'workPost.php';
  exit;
}
<<<<<<< HEAD

=======
$id = intval($_GET['id'] ?? 0);
if ($id < 1) {
  throw new Exception('Invalid ID');
}
>>>>>>> parent of 768a1b7... PHP Updates
// 1. Go to the database and get all work associated with the $taskId
$commentArr = Comment::getAllComments();
// 2. Convert to JSON
$json = json_encode($commentArr, JSON_PRETTY_PRINT);
// 3. Print
header('Content-Type: application/json');
echo $json;
