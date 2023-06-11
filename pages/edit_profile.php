<?php
include_once '../models/ses.php';
if (!isset($_SESSION['id'])) {
    header("location:login.php");
}
include_once("header.php");
require_once '../control/profiles.php';
require_once '../models/users.php';
$pr = new Profile;
$u = new User;
$id = $_SESSION['id'];

?>
<head>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<section class="main">
    <div class="wordwrap">
        <div class="left-col">
            <?php
            if (isset($_GET['error_message'])) { ?>
                <p class="text-conter alter-denger">
                    <?php echo $_GET['erroe_message']; ?>
                </p>

            <?php } ?>
            <h3 style="text-align: center;">Update Profile</h3>

            <div class="profile-img " style="width:100%;">
                <?php $pr->displayProfileImage($id); ?>
            </div>

            <form action="../includes/update_profile.php" method="post" enctype="multipart/form-data">
                <div  class="form_group">
                <input type="file" name="image" class="form-control">
                </div>
                <div  class="form_group">
                <input type="submit" name="submit" value="Edit" class="upload_btn">
                </div>
            </form>
        </div>
    </div>
    </div>

</section>



<!----------script------------>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"> </script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</body>

</html>