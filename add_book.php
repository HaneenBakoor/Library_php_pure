<?php
include "BOOK.PHP";
if($_SERVER['REQUEST_METHOD']=="POST")
{
  echo"done";
    
session_start();

$title = $_POST['title'];
$auther = $_POST['auther'];
$subject=$_POST['subject'];
$gner=$_POST['gner'];
$pdate=$_POST['pdate'];

// $book_id = $_SESSION['book_id'];
if ($_SESSION['type'] == 'employee') {
  
if (!empty($_FILES['file']['name'])) {
  $file_name = $_FILES['file']['name'];
  $file_tmp_name = $_FILES['file']['tmp_name'];
  $file_size = $_FILES['file']['size'];
  $file_type = $_FILES['file']['type'];

  $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
  $allowed_exts = array('jpg', 'jpeg', 'png', 'gif');

  if (in_array($file_ext, $allowed_exts) && $file_size < 1000000) {
    $file_path = 'uploads/' . uniqid() . '.' . $file_ext;
    move_uploaded_file($file_tmp_name, $file_path);

    $book = new Sientific_Book($title,$auther,$pdate,$file_path,$subject,$gner);
    $book->add_book();
  } else {
    echo "Invalid file format or size.";
  }
} else {
    $book = new Social_Book ($title,$auther,$pdate,$subject,$gner);
    $book->add_book();
}

echo "book added successfully!";
}
else
echo "You don't have permission to add book.";
// header('Location: show_books.php');
exit;


}
