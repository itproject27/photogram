<?php
require_once '../../project/includes/process.php';

?>
<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Login </title>
    <link rel="shortcut icon" href="../img/insta_icon.ico" type="image/x-icon">

    <meta name="description" content="" />

 
    <link rel="icon" type="image/x-icon" href="../assets/images/imag.ico"/>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />
    <link rel="stylesheet" href="../assets/css/img.css" >

    <script src="../assets/vendor/js/helpers.js"></script>
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    
    <section class="page">
     
        <div class="col1">
          <div class="hore-img">
            
          </div>

      <article class="col2">
        <div class="container-xxl">
         <div class="authentication-wrapper authentication-basic container-p-y">
          <div class="authentication-inner">
          <!-- Register -->
           <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="#" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                    <img src="../assets/images/images.jpeg" alt=""width="50"
                      viewBox="0 0 25 42"
                      version="1.1">
                    
                  </span>
                  <span class="app-brand-text demo text-body fw-bolder">Photogram</span>
                </a>
              </div>
              <!-- /Logo -->

              <form id="formAuthentication" class="mb-3" action="login.php" name="form1" method="POST" >

              <tr>
                    <td>
                        
                    </td>
                    <td>
                        <font color="red"><?php echo $error;?></font>
                    </td>
                </tr>

                <div class="mb-3">
                  <label for="email" class="form-label"> Email</label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Enter email"
                    autofocus 
                    required="required"
                    value="<?php
                     if(isset($email))echo$email;
                     if(isset($username))echo$user;
                     
                     ?>" 
                  />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                      required="required"
                      value="<?php if(isset($password))echo $password;?>"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="d-flex justify-content-between">
                    <label class="form-label" for="password"></label>
                  
                <a href="auth-forgot-password-basic.html">
                      <small>Forgot Password?</small>
                    </a>
                </div>
                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" />
                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit" name="sub" >Log In</button>
                </div>
              </form>
              <p class="text-center">
                <span>New on our platform?</span>
                <a href="register.php">
                  <span>Sign Up</span>
                </a>
              </p>
      </article>
             
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
     </div>
    </div>
    </section>


    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    
    <script src="../assets/js/main.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>