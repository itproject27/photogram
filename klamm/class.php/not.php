<?php
//  include("autoload   // class must be contained the objects of all classes
// include("notific_html.php/noti_bar.php");
$login = new Login();
$user_data = $login->check_login($_SESSION['id']);
$user = $user_data;   //save the retrun values from check_login function

if(isset($_GET['id'])&& is_numeric(['id'])){
    $profile = new Profile();
    $profile_data = $profile->get_profile($_GET['id']);

    if(is_array($profile_data)){
        $user_data = $profile_data[0];
    }
}


/*---------------post object--------------------*/

$post = new Post();
$usr = new User();  //user class
// $image_class = new Image()    //

// include("notific_html.php/noti_bar.php");






// if(isset($_SERVER['HTTP_REFERER']) && !strstr($$_SERVER['HTTP_REFERER'],"delete.php")){
//     $_SESSION['return_to'] =$_SERVER['HTTP_REFERER'];

// }
// if(isset($_Get['id'])){
//     $Row = $post->get_one_post($_GET['id']);
//     if(!$Row){
//         $ERROE = "No such post was found";

//     }else{
//         if(! i_own_content($Row)){
//             $ERROER = "Acess denied you can't delete this file";

//         }
//     }
// }else{
//     $ERROER ="NO such post was found";

// }


// if( $ERROER ==="" && $_SERVER['REQUEST_METHID']== 'post'){
//     $post->delete_post($_POST['post_id']);
//     header("Location: ".$_SESSION['return_to']);
//     die;
// }