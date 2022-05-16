<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">

<!--    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>-->
    <!-- Navbar Search-->
    <h4 style="color:#F2B01E">Welcome <?php echo $_SESSION['user']['name']?> To Our WebStore </h4>
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" style="width: 50%">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
            <div class="input-group-append">
                <button class="btn btn-primary" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo url('front_end/images/').$_SESSION['user']['image'] ; ?>" style="width: 50px;border-radius: 50%"></a>
<!--            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i></a>-->
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown" style="text-align: center">
                <center><img src="<?php echo url('front_end/images/').$_SESSION['user']['image'] ; ?>" style="width: 50px;border-radius: 50%"></center>
                <p style="text-align: center;"><?php echo $_SESSION['user']['name']; ?></p><hr>

                <a class="dropdown-item" href="<?php echo url('profile.php')?>">Profile</a>
                <?php
                    if($_SESSION['user']['role_id']==1){
                        ?>
                        <a class="dropdown-item" href="<?php echo url('add_product.php')?>">Add New Product</a>

                        <?php
                    }
                ?>
                <a class="dropdown-item" href="#">
                    <?php
                    //                        $role_id=$_SESSION['admin']['role_id'];
                    //                        $get_role_name="SELECT role FROM roles WHERE id=$role_id";
                    //                        $op=mysqli_query($connection,$get_role_name);
                    //                        $name=mysqli_fetch_assoc($op);
                    //                        echo $name['role'];
                    ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo url('logout.php') ; ?>">Logout</a>
            </div>
        </li>
    </ul>
</nav>