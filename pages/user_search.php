<?php
include_once("header.php");
require_once '../models/users.php';

$db = new Database;
?>
<head>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<div class="mt-5 mx-5">
    <form action="" method="post">
        <div class="form-group search-contant">
            <input type="text"class="form_control" placeholder="search.." name="search">
            <button type="submit" class="search-btn" name="submit">search</button>
        </div>
        <?php
                       $search = new User;
                       $search->search();

?>




    </form>
    <ul class="list-group">
        <li class="list-group-item search-result-item">
             
              <?php 
              $u = new User;
              for($i=1 ; $i < rand(1,$db->count('users'));$i++){
                $u->viewUsers($i);
              }
            ?>
              
        </li>
    </ul>
</div>






<!------sceript--------->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</body>

</html>