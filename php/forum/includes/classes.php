<?php
interface Forum{
    public function logout();
    public function postReply($subject, $content);
    //public function like($post);
    //public function dislike($post);
}
interface AdminForum extends  Forum{
    public function deletePost($post);
    public function createTopic($topic, $description);
    public function banUser($userId);
    public function createModerator($userId);
    
}
class User implements Forum{
    public $username;
    public $allContent;
    public function __construct($username){
        $this->username = $username;
    }
    public function logout(){
        
        $_SESSION['username'] = null;
        header("Location: http://localhost/teamrcf/pages/TeamForum.php");
        echo "redirecting";
    }
    public function __destruct(){
        
        
    }
    public function postReply($subject, $content){
        $this->allContent = array($subject, $content);
    }
}
class Topic{
    public $topic;
    public $results;
    public $database;
    public function __construct($topic){
        $this->topic = (string)$topic;
    }
    
    public function returnThreads(){
        $this->database = new mysqli("localhost","root", "cupquakeciller99", "teamrcf_public");
        $this->results = $this->database->query("SELECT * FROM `threads` WHERE `{$this->topic}` LIKE 'coco'"); 
        return $this->results;
        }
    }


class MySQLDB{

    public $results;
    public $numRows;
    public $connection;
   
    
    public function connect($dbname){
                $dbhost = "localhost";
                $dbuser = "root";
                $dbpass = "cupquakeciller99";
                $this->dbname = $dbname;
                $this->connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
                // Test if connection occurred.
                if(mysqli_connect_errno()) {
                die("Database connection failed: " . 
                mysqli_connect_error() . 
                " (" . mysqli_connect_errno() . ")");
                }
                
            }
     public function __construct($dbname){
        $this->dbname = $dbname;
        $this->connect($dbname);
    
    }

}
    
    
    
    




?>