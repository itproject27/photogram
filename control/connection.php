<?php

use Database as GlobalDatabase;

 class Database
 {
     private $servername = "localhost";
     private $username = "root";
     private $password = "";
    private $db_name = "instagram";


    public function connect()
     {
         $conn = new mysqli($this->servername, $this->username, $this->password, $this->db_name);
         if ($conn->connect_error) {
             die("Connection failed" . $conn->connect_error);
         }
         return $conn;
 
     }

     function read_db(){
      $connection =$this->connect();
      $id = $_SESSION['id'];
      $query=("SELECT image FROM users where id like '$id'"); 
      $result = mysqli_query($connection , $query);
      if($result->num_rows > 0){ ?> 
       <div class="gallery"> 
           <?php while($row = $result->fetch_assoc()){ ?> 
               <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" /> 
           <?php } ?> 
       </div> 
   <?php }else{ ?> 
       <p class="status error">Image(s) not found...</p> <?php } 
     }


function updata_img(){
  $status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 
    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) {  
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
        $allowTypes = array('jpg','png','jpeg','gif','webp'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
            $id=$_SESSION['id'];
            $insert = ("UPDATE users SET image = '$imgContent' ,created= NOW()  WHERE id like '$id'");
           
            
            if($insert){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
                header("Location: ../pages/profile.php");
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
} 

}





function get($query){
    $db = new GlobalDatabase;
    $conn = $db->connect();
    $id = $_SESSION['id'];
    $res = $conn->query( "SELECT * from users where id like '$id' ") ;
    if(!empty($res)){
       foreach($res as $value){
           echo $value[$query];
       }
    }
}

function count($query)
{
  $host = 'localhost';
    $db_name = 'instagram';
    $username = 'root';
    $password = '';
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $stmt = $conn->prepare("SELECT COUNT(*) FROM $query ");

    $stmt->execute();
    $result = $stmt->fetchColumn();

    $conn = null;

    return  $result;
}

 }
    
    
    ?>