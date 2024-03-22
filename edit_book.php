<?php
require_once 'BOOK.PHP';

session_start();

$book_id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $new_title = $_POST['title'];
  $new_subject = $_POST['subject'];
if (isset($_GET['file'])) {
  
    $file_name = $_FILES['file']['name'];
    $file_tmp_name = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];

    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $allowed_exts = array('jpg', 'jpeg', 'png', 'gif');

    if (in_array($file_ext, $allowed_exts) && $file_size < 1000000) {
      $file_path = 'uploads/' . uniqid() . '.' . $file_ext;
      move_uploaded_file($file_tmp_name, $file_path);
      $book = Sientific_Book::get_book($book_id);
      if (!$book) {
        echo "Invalid Book ID.";
        exit;
      }
      if ($_SESSION['type'] !== "employee") {
        echo "You don't have permission to edit this book.";
        exit;
      }
      Sientific_Book::update_book($new_title,$new_subject,$book_id,$file_path);

    } else {
      echo "Invalid file format or size.";
      exit;
    }
}
  else {
    $book = Social_Book::get_book($book_id);
      if (!$book) {
        echo "Invalid book ID.";
        exit;
      }
      if ($_SESSION['type'] !== "employee") {
        echo "You don't have permission to edit this book.";
        exit;
      }
      Social_Book::update_book($new_title,$new_subject,$book_id);
    }
  echo "book updated successfully!";
} else {

  echo "<form method='post' action='#' enctype='multipart/form-data'>";
  echo "<label>Title:</label><br>";
  echo "<input type='text' name='title' value=''><br><br>";
  echo "<label>subject:</label><br>";
  echo "<textarea name='subject'></textarea><br><br>";

  if (isset($_GET['file'])) {
    echo "<label>File:</label><br>";
    echo "<input type='file' name='file'><br><br>";
  }

  echo "<input type='submit' value='Update'>";
  echo "</form>";
}
?>
