<center><a href="logout.php"><button>logout</button></a></center>
<br>
<center><a href="addbook_form.php"><button>add book</button></a></center>
<br>
<center><a href="search.php"><button> search</button></a></center>
<br>
<?php
include 'BOOK.php';
include 'USER.php';

// session_start();
if(isset($_COOKIE['user']) && isset($_COOKIE['pass']))
{ 
  USER::login($_COOKIE['user'],$_COOKIE['pass']);
}
if (!isset($_SESSION['user_id'])) {
  header('Location: login_form.php');
}
$books = Sientific_Book::show_books();
echo "<h1> Sientific_Book:" ;
foreach ($books as $book) {
  echo "<h3>" . $book['title'] . "</h3>";
  echo "<p>" . $book['auther'] . "</p>";
  echo "<p>" . $book['subject'] . "</p>";
  echo "<p>" . $book['pdate'] . "</p>";
  echo "<p>" . $book['gner'] . "</p>";
  echo "<img src='" . $book['file'] . "' width='200'>";

  ?>
  <?php
  if ($_SESSION['type']=='employee') {?>
<br><a href="edit_book.php?id=<?php echo $book['id'];?>&file=<?php echo $book['file'];?>"><button>Edit</button></a>
<a href="delete_book.php?id=<?php echo $book['id']; ?>&file=<?php echo $book['file'];?>"><button>delete</button></a>
<!-- <a href="buy_book.php?id=<?php echo $book['id']; ?>"><button>pay</button></a>  -->
<br>
<form action="buy_book.php" method="post">
 buy:<input type="checkbox" name="ch[]" value="<?php echo $book['id']; ?>">
<input type="submit" value="buy" name="buy">
</form>
<?php  }
  ?>
  <?php
}

$books1 = Social_Book::show_books();
echo "<h1> Social_Book:" ;
  
foreach ($books1 as $book) {
echo "<h3>" . $book['title'] . "</h3>";
echo "<p>" . $book['auther'] . "</p>";
echo "<p>" . $book['subject'] . "</p>";
echo "<p>" . $book['pdate'] . "</p>";
echo "<p>" . $book['gner'] . "</p>";
  ?>
  <?php
  if ($_SESSION['type']=='employee') {?>
   <a href="edit_book.php?id=<?php echo $book['id'];?>"><button>Edit</button></a>
<a href="delete_book.php?id=<?php echo $book['id']; ?>"><button>delete</button></a> 
<a href="buy_book.php?id=<?php echo $book['id']; ?>"><button>pay</button></a> 


<?php  }
  ?>
  <?php
}

?>
