<?php
include_once("../control/connection.php");
include_once ('../control/profiles.php');
class User
{
    public $id ;
    public $username ;
    public $pass;
    public $email;
    public $image;
    public $gender;
    public $created;
    public $posts;
    public $followers;
    public $followings;



    public function getUsernameById($id)
    {
        $db = new Database;
        $conn = $db->connect();
        if ($id == null) {
            echo 'username';
        } else {
            $result = $conn->query("SELECT username FROM users WHERE id = $id");

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row['username'];
            } else {
                return 'Unknown';
            }
        }

        $conn->close();
    }


    public function viewUsers($id)
    {
        $db = new Database;
        $db = $db->connect();
        $p = new Profile;
        $result = $db->query("SELECT * FROM users WHERE id = $id");

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            ?>
                <div class="card-img" style="justify-content: space-between;">
                    <?php $p->displayProfileImage($id); ?>
                    <h6 class="card-subtitle text-muted"><?php echo $this->getUsernameById($id); ?></h6>

                </div>
                
<?php

            }
        }
    }





    function search(){
        $con = new Database;
         $con=$con->connect();
            if(isset($_POST['submit'])){
                $search=$_POST['search'];
    
                $sql="SELECT * FROM users WHERE username LIKE '%$search%' ";
                $result=mysqli_query($con,$sql);
                if($result){
                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_assoc($result)){?>
                        <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($row['image']); ?>" style="border-radius: 50%; wigth: 40px; height:40px;" />
                  <?php  echo '<a href="">'.$row['username'] .
                    '</a>';}
                }else{
                    echo '<h3>NOT FOUND</h3>';}
                }
                
            }
    }









}



?>