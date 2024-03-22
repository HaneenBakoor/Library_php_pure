<?php
include"connect.php";
abstract class Book{
   protected $title,$auther,$pdate,$subject,$gner;
    function __construct($title,$auther,$pdate,$subjec,$gner)
   {
    $this->title=$title;
    $this->auther=$auther;
    $this->pdate=$pdate;
    $this->subject=$subjec;
    $this->gner=$gner;

   }

   abstract static public function show_books();
  
   abstract public function add_book();
 
   abstract static public function update_book($new_title,$new_subject,$book_id,$new_file);
 
   abstract static public function delete_book($book_id);

   abstract static public function get_book($book_id);
   abstract static public function search($title);


}

class Sientific_Book extends Book
{  private $file; 
     function __construct($title,$auther,$pdate,$file,$subject,$gner)
    {
        parent::__construct($title,$auther,$pdate,$subject,$gner);
        $this->file=$file;
    }
    static public function show_books()
    {$db=DATABASE::getinstance();
     $connect=$db->getconnection();
     $query="SELECT * FROM sientific_book";
     $result=mysqli_query($connect,$query);
     $re=mysqli_fetch_all($result,MYSQLI_ASSOC);
     return $re;

    }
    public function add_book()
    {$db=DATABASE::getinstance();
    $connect=$db->getconnection();
    $query = "INSERT INTO sientific_book(title,auther,pdate,gner,file,subject) VALUES ('$this->title','$this->auther','$this->pdate','$this->gner','$this->file','$this->subject')";
    $stmt = mysqli_query($connect,$query);

    }
    static public function update_book($new_title,$new_subject,$book_id, $new_file)
    { $db=DATABASE::getinstance();
    $connect=$db->getconnection();
    $query = "UPDATE sientific_book SET title = '$new_title', subject = '$new_subject', file = '$new_file' WHERE id ='$book_id' ";
    $stmt = mysqli_query($connect,$query);

    }
    public static function delete_book($book_id)
    {
        $db=DATABASE::getinstance();
        $connect=$db->getconnection();
        $query = "DELETE from sientific_book WHERE id ='$book_id'";
        $stmt = mysqli_query($connect,$query);
    }

    public static function get_book($book_id)
    { $db=DATABASE::getinstance();
        $connect=$db->getconnection();
        $query="SELECT * FROM orders WHERE id ='$book_id'";
        $re=mysqli_query($connect,$query);
        return $re;

    }
    public static function search($title)
    {$db=DATABASE::getinstance();
        $connect=$db->getconnection();
        $query="SELECT * FROM sientific_book WHERE title LIKE '%$title%' OR auther LIKE '%$title%'";
       $res=mysqli_query($connect,$query);
       $row=mysqli_fetch_array($res,MYSQLI_ASSOC);
        return $row;
    }
}


class Social_Book extends Book
{
    function __construct($title,$auther,$pdate,$subject,$gner)
    {
        parent::__construct($title,$auther,$pdate,$subject,$gner);
    
    }
    static public function show_books()
    {$db=DATABASE::getinstance();
     $connect=$db->getconnection();
     $query="SELECT * FROM social_books";
     $result=mysqli_query($connect,$query);
     $re=mysqli_fetch_all($result,MYSQLI_ASSOC);
     return $re;

    }
    public function add_book()
    {$db=DATABASE::getinstance();
    $connect=$db->getconnection();
    $query = "INSERT INTO social_books(title,auther,pdate,subject,gner) VALUES ('$this->title','$this->auther','$this->pdate',$this->subject',$this->gner')";
    $stmt = mysqli_query($connect,$query);

    }
    static public function update_book($new_title,$new_subject,$book_id,$new_file=null)
    { $db=DATABASE::getinstance();
    $connect=$db->getconnection();
    $query = "UPDATE social_books SET title = '$new_title', subject = '$new_subject' WHERE id ='$book_id' ";
    $stmt = mysqli_query($connect,$query);

    }
    public static function delete_book($book_id)
    {
        $db=DATABASE::getinstance();
        $connect=$db->getconnection();
        $query = "DELETE from social_books WHERE id ='$book_id'";
        $stmt = mysqli_query($connect,$query);
    }
    public static function get_book($book_id)
     {
        $db=DATABASE::getinstance();
        $connect=$db->getconnection();
        $query="SELECT * FROM social_books WHERE id ='$book_id'";
        $stmt = mysqli_query($connect,$query);
        return $stmt;
    }

    public static function search($title)
    {
        $db=DATABASE::getinstance();
        $connect=$db->getconnection();
        $query="SELECT * FROM social_books WHERE title LIKE '%$title%' ";
        $res=mysqli_query($connect,$query);
       $row=mysqli_fetch_array($res,MYSQLI_ASSOC);
       return $row;
    }

}