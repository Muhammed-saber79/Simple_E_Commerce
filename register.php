
 <?php  

require './Helpers/db_connection.php';
require './Helpers/router.php';
require './Helpers/vaildators.php';


 


if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=clean($_POST['name']);
    $email=clean($_POST['email']);
    $password=clean($_POST['password']);
    /* $role_id=$_POST['role']; */

    #image details .....
    $image_name=$_FILES['image']['name'];
    $image_temp_name=$_FILES['image']['tmp_name'];
    $image_type=$_FILES['image']['type'];



    #start validation ......
    $errors=[];
    if(!validate($name,1)){
      $errors['name']="*Name Field Required";
    }elseif(!validate($name,3)){
      $errors['name']="*Name Length Must Be At Least 7 Chars";
    }
  
  
    if(!validate($password,1)){
      $errors['password']="*Password Field Required";
    }elseif(!validate($password,3)){
      $errors['password']="*Password Length Must Be At Least 7 Chars";
    }
  
  
    if(!validate($email,1)){
      $errors['email']="*Email Field Required";
    }elseif(!validate($email,2)){
      $errors['email']="*Please Enter Valid Email";
    }


    if(!validate($image_name,1)){
        $errors['image']="*image Field Required";
    }else{
        $arr_type=explode('/',$image_type);
        if (!validate($arr_type[1],6)){
            $errors['image']="Not Allowed Extension";
        }
    }
  
    
  
  
    if (count($errors)>0){
        $_SESSION['Message']=$errors;
    }else{
        $final_name=rand(10,1000) . time() . "-" . $image_name;
        $distination_path="./front_end/images/" . $final_name;



        if (move_uploaded_file($image_temp_name,$distination_path)){
            $password=md5($password);
            $add_admin="INSERT INTO users(name,email,password,image) VALUES('$name','$email','$password','$final_name')";
            $query_add=mysqli_query($connection,$add_admin);
            /* echo mysqli_error($connection);
            exit; */


            if($query_add){
                $message="*User Added Successfully";
            }else{
                $message="*Error Adding New User,Please Try Again";
            }
            $_SESSION['Message']=[$message];
            header("location:".url2('index.php'));
            exit;


        }else{
            $_SESSION['Message']=["Image Didn't Moved Correctly"];
        }

  
  
    }
  
  }
  



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
        <link href="<?php echo url('front_end/css/styles.css'); ?>" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary" style="background-image: url(../images/audio_2.jpg);height: 100%;
                                                      background-position: center;
                                                      background-repeat: no-repeat;
                                                      background-size: cover;">

        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <div class="card shadow-lg border-0 rounded-lg mt-5">


                                      <div class="card-header"><h3 class="text-center font-weight-light my-4">Register</h3></div>
                                      <div class="card-body">
                                    
                                        <div class="container">
                                          <ol class="breadcrumb mb-4">
                                              <li class="breadcrumb-item active">

                                                  <?php
                                                  if (isset($_SESSION['Message'])){
                                                      foreach($_SESSION['Message'] as $key => $value){
                                                      echo $value . "<br>";
                                                      }
                                                  }else{
                                                      echo "Register/Create New User";
                                                  }
                                                  unset($_SESSION['Message']);
                                                  ?>

                                              </li>
                                          </ol>
                                          

                                          <form  action="<?php echo $_SERVER['PHP_SELF']; ?>"   method="POST"   enctype ="multipart/form-data">


                                              <div class="form-group">
                                              <label for="exampleInputEmail1">Name</label>
                                              <input type="text"  name="name"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
                                              </div>

                                              
                                              <div class="form-group">
                                              <label for="exampleInputPassword1">Password</label>
                                              <input type="password"   name = "password"  class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
                                              </div>


                                              <div class="form-group">
                                              <label for="exampleInputEmail1">Email address</label>
                                              <input type="email"   name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                              </div>

                                              <div class="form-group">
                                                  <label for="exampleInputEmail1">Upload Image</label><br>
                                                  <input type="file"   name="image">
                                              </div>
                                             

                                              <button type="submit" class="btn btn-primary" style="margin-bottom: 15px;">Rigister</button>
                                          </form>
                                        </div>
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
        <script src="<?php echo url('front_end/js/scripts.js'); ?>"></script>
    </body>
</html>
