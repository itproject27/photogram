<?php
class Notification {

    function add_notification($user_id, $activity,$row){
        $row = (object )$row;
       $user_id = $this->esc($user_id);
       $activity = $this->esc($activity);
       
       $content_owner = $row->user_id;

       $content_id = 0;
       $content_type ="";
       $date = date("Y-m-d H:i:s");


       if(isset($row->post_id)){
        $content_id = $row->post_id;   //depend on post id
        $content_type = "post";
        if($row->comment_id){
           $content_type = "comment";
        }
 
       }
       
       
        if(isset($row->gender)){
           $content_type = "profile";
           $content_id = $row->user_id;
          
        }   
       $query = "insert into content_i_follow(user_id,,date,content_id,content_type)
                 values ('$user_id','$date','$content_id','$content_type')";
       $db = new Database();
       $db->add_db($query);





    }
    function content_i_follow($user_id,$row){

        $user_id = $this->esc($user_id);
        $content_owner = $row->user_id;
 
        $content_id = 0;
        $content_type ="";
        $date = date("Y-m-d H:i:s");
 
 
        if(isset($row->post_id)){
         $content_id = $row->post_id;   //depend on post id
         $content_type = "post";
         if($row->comment_id){
            $content_type = "comment";
         }
  
        }
        
        if(isset($row->gender)){
         $content_type = "profile";
           
        }
        $query = "insert into notification(user_id,activity,content_owner,date,content_id,content_type)
                  values ('$user_id','$content_owner','$date','$content_id','$content_type')";
        $db = new Database();
        $db->add_db($query);

    }

    function esc($value){
        return addslashes($value);
    }
 


    function notification_seen($id){
        $notification_id = addslashes($id);
        $user_id =$_SESSION['id'];   // must be declared previously
        $db = new Database();
        $query ="select * from notification_seen where user_id = '$user_id'&& notification_id ='$notification_id'";
          
         $check= $db->read_db($query);
         if(!is_array($check)){
                $query = "insert into notification_seen (user_id,notification_id)
                        values('$user_id','$notification_id')";

                $db->add_db($query);
         }


    }

    function check_notification(){
        
        $number = 0;
       

        $user_id =$_SESSION['id'];   // must be declared previously
        $db = new Database();
        $query = "select * from notification where user_id != '$user_id' && content_owner = '$user_id'";
        $data = $db->read_db($query);
        if(is_array($data)){
            foreach($data as $row ){
                $query ="select * from notification_seen where user_id = '$user_id'&& notification_id ='$row[id]'";
                
                $check= $db->read_db($query);
                if(!is_array($check)){
                      $number++;
                }
            }
        }
        return $number;
    }

    



}




?>