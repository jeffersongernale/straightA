<?php


$user = new User();
$user->store();

Class User{

    private $conn;

    public function __construct(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "straightarrow";
    
        $this->conn = mysqli_connect($servername, $username, $password, $dbname);
       
        if ($this->conn->connect_error) {
          die("Connection failed: " . $this->$conn->connect_error);
        }
    }

    public function store()
    {
        $firstname = $_POST['firstname'];
        $lastname  = $_POST['lastname'];
        $job_title = $_POST['job_title'];
        $email     = $_POST['email'];
        $mobile    = $_POST['mobile'];
        $skype_id  = $_POST['skype_id'];


        $stmt = $this->conn->prepare('INSERT INTO users (firstname, lastname, job_title , email, mobile, skype_id)
        VALUES(?,?,?,?,?,?)');
        $stmt->bind_param('ssssss', $firstname, $lastname, $job_title,  $email,  $mobile, $skype_id); 
  
        if($stmt->execute())
        {
            echo "Record successfully inserted";
        }
        else
        {
            echo "Something went wrong. Please try again";
        }
       
    }

}