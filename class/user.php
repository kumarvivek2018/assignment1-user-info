<?php
class User
{
    private $conn;
    function __construct() {
    session_start();
    $servername = "localhost";
    $dbname = "crud";
    $username = "root";
    $password = "";


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
       }else{
        $this->conn=$conn;
       }

    }


    public function user_list(){

       $sql = "SELECT * FROM users ORDER BY first_name DESC ";
       $result=  $this->conn->query($sql);
       return $result;
    }

    public function create_user_info($post_data=array()){

       if(isset($post_data['create_user'])){
       $first_name= mysqli_real_escape_string($this->conn,trim($post_data['first_name']));
       $last_name= mysqli_real_escape_string($this->conn,trim($post_data['last_name']));
       $email_address= mysqli_real_escape_string($this->conn,trim($post_data['email_address']));

       $sql="INSERT INTO users (first_name, last_name, email_address) VALUES ('$first_name', '$last_name', '$email_address')";

        $result=  $this->conn->query($sql);

           if($result){

               $_SESSION['message']="Successfully Inserted User Info";

              header('Location: index.php');
           }

       unset($post_data['create_user']);
       }


    }

    public function view_user_by_user_id($id){
       if(isset($id)){
       $user_id= mysqli_real_escape_string($this->conn,trim($id));

       $sql="Select * from users where id='$user_id'";

       $result=  $this->conn->query($sql);

        return $result->fetch_assoc();

       }
    }


    public function update_user_info($post_data=array()){
       if(isset($post_data['update_user'])&& isset($post_data['id'])){

       $first_name= mysqli_real_escape_string($this->conn,trim($post_data['first_name']));
       $last_name= mysqli_real_escape_string($this->conn,trim($post_data['last_name']));
       $email_address= mysqli_real_escape_string($this->conn,trim($post_data['email_address']));
       $user_id= mysqli_real_escape_string($this->conn,trim($post_data['id']));

       $sql="UPDATE users SET first_name='$first_name',last_name='$last_name', email_address='$email_address' WHERE id =$user_id";

        $result=  $this->conn->query($sql);

           if($result){
               $_SESSION['message']="Successfully Updated User Info";
           }
       unset($post_data['update_user']);
       }
    }

    public function delete_user_info_by_id($id){

       if(isset($id)){
       $user_id= mysqli_real_escape_string($this->conn,trim($id));

       $sql="DELETE FROM  users  WHERE id =$user_id";
        $result=  $this->conn->query($sql);

           if($result){
               $_SESSION['message']="Successfully Deleted User Info";

           }
       }
         header('Location: index.php');
    }
    function __destruct() {
    mysqli_close($this->conn);
    }

}

?>
