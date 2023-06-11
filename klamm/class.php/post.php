<?php
class Post{
    private $error ="";

    // function to create post
    public function create_post($user_id,$data,$files){
        if(!empty($data['post'])||!empty($files['file']['name']) || isset($data['is_profile_image']) || isset($data['is_cover_image']))
        {
            $image ="";
            $has_image =0;
            $is_cover_image = 0;
            $is_profile_image =0;
            if(isset($data['$is_profile_image'])|| isset($data['']))
            if(isset($data['$is_profile_image'])|| isset($data['is_cover_image'])){
                $image = $files;
                $has_image = 1;
                if(isset($data['is_cover_image']))
                {
                    $is_cover_image =1;

                }else{
                    if(!empty($files['file']['name'])){
                        $folder = "uploads/".$user_id."/";
                        // create folder
                        if(!file_exists($folder)){
                            
                        }
                    }
                }
            }


        }
    }
}



?>