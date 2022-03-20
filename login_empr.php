<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/website icon.png">
    <title>Login | Sign Up</title>
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
           
            <div class="col-md-4" data-aos="fade-right" data-aos-duration="1500">
            <h1>Company Login</h1>

                <form action="login.php" method="post">
                    <div class="form-group">
                    <label class="form-label">Login ID</label>
                    <input type="text" placeholder="enter a login ID" name="login_id" class="form-control" value="<?php if(isset($_COOKIE['login_id'])) echo $_COOKIE['login_id'];?>">
                    </div>
                    <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" placeholder="enter a password" name="password" class="form-control" value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password'];?>">
                    </div>
                    <div>
                    <p><input type="checkbox" name="remember" value="1"> Remember me</p>
                    </div>
                    <input type="submit"  name="logine" value="Login" class="btn btn-primary">
                    <br><br>
                    <p>Login as a user? <a href="login.php">Click here</a></p>
                 </form>
              

            </div>
            <div class="col-md-2" >

            </div>
            <div class="col-md-6" data-aos="fade-left" data-aos-duration="1500">
            <img src="images/login.png" alt="" width="500" height="600">
            </div>
      </div>
 

       <?php 

           if(isset($_POST['logine']))
           {

            $login_id = $_POST['login_id'];
            $password = $_POST['password'];
            $remember = $_POST['remember'];
            if($remember == 1){
                setcookie('login_ide',$login_id,time()+60*60*7,"/");
                setcookie('password',$password,time()+60*60*7,"/");
            }
            $sql = "select empid,name,login_id,password,type from employer where login_id = '$login_id' and password = '$password' 

            ";

            //$sql = "select * from employer where login_id = '$login_id' and password = '$password'";

            $rs = mysqli_query($con,$sql);
             
            if($row = mysqli_num_rows($rs)>0){
                $userinfo = mysqli_fetch_array($rs);

                
                session_start();

                $user_id     = $userinfo[0];
                $login_id       = $userinfo[2];
                $password    = $userinfo[3];
                $type        = $userinfo[4];

                $_SESSION['userid'] = $user_id;
                $_SESSION['login_id'] = $login_id;
                $_SESSION['password'] = $password;
                $_SESSION['type'] = $type;
 
            
                 if($type == 1){
                    header('Location: profile_empr.php');
                 }else if($type == 2){
                    header('Location: index.php');
                 }

            }else{
                echo "<script>alert('Invalid Username or password')</script>";
                  echo "<h1 style='color:red;'> Invalid Username or password</h1>";
            }
               

        }
        ?>

<?php 

           if(isset($_POST['loginr']))
           {

            $login_id = $_POST['login_id'];
            $password = $_POST['password'];
            $remember = $_POST['remember'];
            if($remember == 1){
                setcookie('login_ide',$login_id,time()+60*60*7,"/");
                setcookie('password',$password,time()+60*60*7,"/");
            }
            $sql = "select userid,name,login_id,password,type from user where login_id = '$login_id' and password = '$password' 

            ";

            //$sql = "select * from employer where login_id = '$login_id' and password = '$password'";

            $rs = mysqli_query($con,$sql);
             
            if($row = mysqli_num_rows($rs)>0){
                $userinfo = mysqli_fetch_array($rs);

                
                session_start();

                $user_id     = $userinfo[0];
                $login_id       = $userinfo[2];
                $password    = $userinfo[3];
                $type        = $userinfo[4];

                $_SESSION['userid'] = $user_id;
                $_SESSION['login_id'] = $login_id;
                $_SESSION['password'] = $password;
                $_SESSION['type'] = $type;
 
            
                 if($type == 1){
                    header('Location: home.php');
                 }else if($type == 2){
                    header('Location: index.php');
                 }

            }else{
                echo "<script>alert('Invalid Username or password')</script>";
                  echo "<h1 style='color:red;display:flex;justify-content:center;position: fixed;bottom: 30vh;'> Invalid Username or password</h1>";
            }
               

        }
        ?>
</div>

<br><br>
 <?php include('footer.php'); ?>
</body>
</html>