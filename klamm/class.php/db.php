<?php
class Database
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
   private $db_name = "instagram";

    function connect()
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->db_name, 3307);
        if ($conn->connect_error) {
            die("Connection failed" . $conn->connect_error);
        }
        return $conn;

    }

    function read_db($query)
    {
        $connection =$this->connect();
        $result = mysqli_query($connection , $query);
        if(!$result){
            return false;
        }else{
            $data = [];
            
            while($row = mysqli_fetch_assoc($result))
            {
              $data[] = $row;
            }
            return $data;
        }
        

       
     
    }




    
    function add_db($query)
    {
        $connection =$this->connect();
        $result = mysqli_query($connection , $query);
        if(!$result){
            return false;
        }else{
            return true;
        }
        

    }

    function delete_db($query){
        $connection =$this->connect();
        $result = mysqli_query($connection , $query);
        if(!$result){
            return false;
        }else{
            return true;
        }
    }

}
// $act = "hi mark";

// $db = new Database();
// $query = "insert into notification('activity') values('$act')";

//  $db->add_db($query);
// // $d = $db->read_db($query);
// // print_r($d); use print_r instead of echo (echo wil cause a warning here )

// $act = "like";
// $content_type = "post";

// $query = "insert into notification(activity,content_type) values('$act','$content_type')";
// $dat = new Database();
// $dat->add_db($query);

?>