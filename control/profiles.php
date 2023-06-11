<?php

class Profile{

    public function displayProfileImage($id)
    {
        $db = new Database;
        $conn = $db->connect();
        $result = $conn->query("SELECT image FROM users where id like '$id'");

        ?>
        <?php if ($result->num_rows > 0) { ?>
            <div class="gallery">
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($row['image']); ?>" style="border-radius: 50%;" />
                <?php } ?>
            </div>
        <?php } else { ?>
            <i class="icon fas fa-user"></i>
            <?php }
    }


}