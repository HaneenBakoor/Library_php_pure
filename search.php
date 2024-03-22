<?php
include "BOOK.php";
session_start();
echo "<form method='post' action='#' enctype='multipart/form-data'>";
echo "<label>Search:</label><br>";
echo "<input type='text' name='title' value=''><br><br>";
echo "<input type='submit' value='search'>";
  echo "</form>";
  

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
  $title = $_POST['title'];
  $row=Sientific_Book::search($title);
  if($row)
    {echo"<pre>";
     echo"TITLE:".$row['title']."<br>";
     echo"AUTHER:".$row['auther']."<br>";
     echo"PUBLISHED_DATE:".$row['pdate']."<br>";
     echo"SUBJECT:".$row['subject']."<br>";
     echo"<img src='" . $row['file'] . "' width='200'><br>";
    echo"</pre>";
    }
    elseif($row=Social_Book::search($title))
    {
        {echo"<pre>";
         echo"TITLE:".$row['title']."<br>";
         echo"AUTHER:".$row['auther']."<br>";
         echo"PUBLISHED_DATE:".$row['pdate']."<br>";
         echo"SUBJECT:".$row['subject']."<br>";
        echo"</pre>";
        }
    }

   else {
    echo"the book not exists";
   }

}