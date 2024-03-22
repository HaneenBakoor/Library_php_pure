
<?PHP
class USER
{
    private $username;
    private $password;
    private $type;
    public function __construct($username,$password,$type) {
        
        $this->username = $username;
        $this->password = $password;
        $this->type = $type;
    
    }


    public function register() {
        $db = DATABASE::getinstance();
        $connection = $db->getconnection();
        $query = "INSERT INTO users (username, password, type) VALUES ('$this->username','$this->password','$this->type')";  
        $stmt = mysqli_query($connection,$query);
        if ($stmt) {
            return true;
        }else return false;
      }

      public static function login($username, $password)
      {
        $db=DATABASE::getinstance();
        $connection=$db->getconnection();
        $query="SELECT * FROM users WHERE username= '$username' AND password='$password' ";
        $result=mysqli_query($connection,$query);
        // if(mysqli_num_rows($result)==0)
        // echo "Invalid username or password";
        // else
        // {
        // echo"log in successfully";
        $user=mysqli_fetch_assoc($result);
        
        if ($user) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['type'] = $user['type'];
            return true;
          } else {
            return false;
          }
        
        
        }
        
        public static function logout() {
          session_start();
          session_destroy();
        }
      

      }


