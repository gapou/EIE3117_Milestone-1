<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/website icon.png">
    <title>Register | Jobs Portal</title>
    <?php 
    
    include('header_link.php'); 
    include('dbconnect.php');

    
    
    ?>
</head>
<body>
<?php 
    
    include('header.php'); 

    ?>
<div class="container">


      <div class="single login">
           
              <div class="col-md-5" data-aos="fade-right" data-aos-duration="1500">
            <h1>Company Sign Up</h1>

                 <form action="register_empr.php" method="post" enctype="multipart/form-data">
                 
                    <div class="form-group">
                    <label class="form-label">Login ID</label>
                    <input type="text" placeholder="enter a login ID" name="login_id" class="form-control"> 
                    </div>
                    <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" placeholder="enter a password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                    <label class="form-label">User Name</label>
                    <input type="text" placeholder="enter a name" name="name" class="form-control"> 
                    </div>
                    <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <input type="email" placeholder="name@example.com" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                    <label class="form-label">Profile Image</label>
                    <input type="file" placeholder="img" name="img_dir" class="form-control form-image">
                    </div>
                    
                    <input type="submit"  name="empregister" value="Register Employer" class="btn btn-primary">
                    <br><br>
                    <p>Sign up as a user? <a href="register.php">Click here</a></p>
                 </form>
              

            </div>
            <div class="col-md-1">
            </div>
            <div class="col-md-6" data-aos="fade-left" data-aos-duration="1500">
            <img src="images/signup2.png" alt="" width="500" height="400">
            </div>
            <?php 

            if(isset($_POST['empregister']))
            {

            $login_id = $_POST['login_id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $img_dir = $_FILES['img_dir']['tmp_name'];
            $target = "images/".basename($img_dir);
            move_uploaded_file($_FILES['img_dir']['tmp_name'], $target);

            $sql2 = "INSERT INTO `employer`( `login_id`, `name`, `email`, `password`, `type`, `img_dir`) 
                    VALUES ('$login_id','$name','$email','$password','1','$target')";
            mysqli_query($con,$sql2);

            echo "<script>alert('Employer Register')</script>";

            }
            ?>

      </div>
 
 </div>
 <br><br>
 <?php include('footer.php'); ?>

</body>
</html>