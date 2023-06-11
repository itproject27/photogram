<?php
include_once '../models/ses.php';
if (!isset($_SESSION['id'])) {
    header("location:login.php");
}
include_once 'header.php';
include_once '../control/connection.php';
$db = new Database;
$conn= $db->connect();
$status = $statusMsg = ''; 
if(isset($_POST['submit'])){ 
    $status = 'error';
    $id = $_SESSION['id'];
    $email=$_POST['email'];
    $username=$_POST['username'];
   $password=$_POST['password'];
   $gender=$_POST['gender'];
           
            $insert = $conn->query("UPDATE users SET  username ='$username' , email ='$email' , 
                                  gender = '$gender' ,pass = '$password' where id like '$id' ");
            header("Location: ../pages/profile.php");
            
            if($insert){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }


?>

<head>
  <link rel="stylesheet" href="../assets/css/style.css">
</head> 

 
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

              <div class="row">
                <div class="col-md-12">
               
                  <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                   
                        <form action="account.php" method="post" enctype="multipart/form-data">
                        
                      
                    <hr class="my-0" />
                    <div class="card-body">
                      <form id="formAccountSettings" method="POST" onsubmit="return false">
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Username </label>
                            <input
                              class="form-control"
                              type="text"
                              id="firstName"
                              name="username"
                              value=" <?php
                         $db->get('username');
                         ?>"
                              autofocus
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="gender" class="form-label">Gender</label>
                            <select id="gender" name="gender" class="select2 form-select">
                              <option value="none">none</option>
                              <option value="male">male</option>
                              <option value="female">female</option>
                            </select>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input
                              class="form-control"
                              type="text"
                              id="email"
                              name="email"
                              value=" <?php
                         $db->get('email');
                         ?>"
                              placeholder="john.doe@example.com"
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="password">Password</label>
                            <div class="input-group input-group-merge">
                              <input
                                type="text"
                                id="password"
                                name="password"
                                class="form-control"
                                placeholder="*********"
                              />
                            </div>
                          </div>
                        <div class="mt-2">
                          <button type="submit" name="submit" class="btn btn-primary me-2"> Save changes</button>
                          
                          <button type="reset" class="btn btn-outline-secondary"><a href="profile.php" style="text-decoration: none; color:black">Cancel</a></button>
                        </div>
                      </form>
</form>
</div>
                    </div>
                    <!-- /Account -->
                 

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/pages-account-settings-account.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
