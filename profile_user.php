<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/website icon.png">
    <title>Home Page | Jobs Portal</title>
    <?php include('header_link.php'); ?>
  
</head>
<body>

<?php include('header.php');


 $userid = $_SESSION['userid'];

?>




<div class="container">

<div class="single">  
     
<?php


 $userid = $_SESSION['userid'];

  include('dbconnect.php');
  $sql = "select * from user where userid = '$userid' ";
  $rs = mysqli_query($con,$sql);
  while($data = mysqli_fetch_array($rs)){

    $_SESSION['jobid'] = $data['jobid'];
    $userid = $_SESSION['userid'];
?>
	   

     <div class="container">
      <div class="single">
        <div class="col-md-12 view-app profile" data-aos="zoom-in" data-aos-duration="1500">
        <img src="<?=$data['img_dir']?>"  width="100" height="100"></img>
        <hr>
        <ul class="list-group">
                      <li class="list-group-item">
                        <h6 class="mb-0"><i class="fa-regular fa-id-card"></i>&emsp;Userid:</h6>
                        <span class="text-secondary"><?=$data['userid']?></span>
                      </li>
                      <li class="list-group-item">
                        <h6 class="mb-0"><i class="bi bi-key-fill"></i>&emsp;Login_id:</h6>
                        <span class="text-secondary"><?=$data['login_id']?></span>
                      </li>
                      <li class="list-group-item">
                        <h6 class="mb-0"><i class="bi bi-person-fill"></i>&emsp;Nick Name:</h6>
                        <span class="text-secondary"><?=$data['name']?></span>
                      </li>
                      <li class="list-group-item">
                        <h6 class="mb-0"><i class="bi bi-envelope-fill"></i>&emsp;Email address:</h6>
                        <span class="text-secondary"><?=$data['email']?></span>
                      </li>
                      <li class="list-group-item">
                        <h6 class="mb-0"><i class="bi bi-calendar-check-fill"></i>&emsp;Sign Up date:</h6>
                        <span class="text-secondary"><?=$data['date']?></span>
                      </li>
          </ul>                                      
       </div>
      </div>
    </div>

       <?php
  }
  ?>
	  
</div>
     
         
</div>

<?php include('footer.php'); ?>


</body>
</html>