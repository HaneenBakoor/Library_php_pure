<?php
require_once 'BOOK.php';

session_start();

$book_id = $_GET['id'];
if (isset($_GET['file'])) {
  $book = Sientific_Book::get_book($book_id);

  if (!$book) {
    echo "Invalid book ID.";
    exit;
  }
  
  
  if ($_SESSION['type'] !== "employee") {
      echo "You don't have permission to delete this book.";
    exit;
  }
  
  Sientific_Book::delete_book($book_id);  
  echo "book deleted successfully!";
}else {
  $book =Social_Book::get_book($book_id);

  if (!$book) {
    echo "Invalid book ID.";
    exit;
  }
  
  
  if ($_SESSION['type'] !== "employee") {
      echo "You don't have permission to delete this book.";
    exit;
  }
  
  Social_Book::delete_book($book_id);  
  echo "book deleted successfully!";
}

?>
