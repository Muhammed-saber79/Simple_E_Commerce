<?php

require 'helpers/db_connection.php';
require 'helpers/vaildators.php';
require 'helpers/router.php';


//echo $_SESSION['admin'];
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $email    =clean($_POST['email']);
    $password =clean($_POST['password']);

    $errors=[];


    # Email Validation ...
    if(!validate($email,1)){
        $errors['Email'] = "*Email Field Required .....";
    }elseif(!validate($email,2)){
        $errors['Email'] = "*Invalid Email .....";
    }


    # Password Validation ...
    if(!validate($password,1)){
        $errors['Password'] = "*Password Field Required .....";
    }elseif(!validate($password,3) ){
        $errors['Password'] = "*Password Length Must >= 6 ch .....";
    }


    if(count($errors) > 0){
        $_SESSION['Message']=$errors;
    }else{

        $password = md5($password);   //encrypt password

        //db validation for user data
        $query="SELECT * FROM users WHERE email='$email' AND password='$password' ";
        $query_op=mysqli_query($connection,$query);

        //echo mysqli_error($connection);

        if(mysqli_num_rows($query_op)==1){
            $get_data=mysqli_fetch_assoc($query_op);
            //print_r($get_data);exit;
            $_SESSION['user'] = $get_data;
            header("Location:".url('index.php'));
            //print_r($_SESSION);exit;
        }else{
            $_SESSION['Message']=['*Error in Your Account Data , Try Again .....'];
        }

        mysqli_close($connection);
    }

}

//require 'front_end/login.html';

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Page Title - SB Admin</title>
        <link href="front_end/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Admin Login</h3></div>
                                    <div class="card-body">

                                    <ol class="breadcrumb mb-4">
                                            <li class="breadcrumb-item active">

                                                <?php
                                                if(isset($_SESSION['try_to_log'])){
                                                    $_SESSION['Message']=['*You are not Admin .....'];

                                                    foreach($_SESSION['Message'] as $key => $value){
                                                        echo $value . "<br>";
                                                    }
                                                }elseif (isset($_SESSION['Message'])){
                                                    foreach($_SESSION['Message'] as $key => $value){
                                                    echo $value . "<br>";
                                                    }
                                                }else{
                                                    echo "Admin/Login";
                                                }

                                                unset($_SESSION['Message']);
                                                ?>

                                            </li>
                                      </ol>


                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                                            <input type="email" name="email" class="form-control py-4" id="inputEmailAddress" placeholder="Enter email address" />
                                        </div>

                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">Password</label>
                                            <input type="password" name="password" class="form-control py-4" id="inputPassword" placeholder="Enter password" />
                                        </div>


                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox"/>
                                                <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="<?php echo url('register.php')?>"> OR Register A New Account?</a>
                                            <input type="submit" name="submit" class="btn btn-primary"  value="Login">
                                        </div>
                                        
                                        
                                    </form>

                                    </div>
                                    <div class="card-footer text-center">
                                        <!-- <div class="small"><a href="">Need to be ? Sign up!</a></div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>

            <!-- <div id="layoutAuthentication_footer">

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>

            </div> -->
        </div>

            
           
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="front_end/js/scripts.js"></script>
    </body>
</html>
