<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/website icon.png">
    <title>Apply Job | Jobs Portal</title>
    <?php 
    
    include('header_link.php'); 
    include('dbconnect.php'); 
    ?>
</head>
<body>

<?php 
    
    include('header.php');

    if(!isset( $_SESSION['userid'] ) ){
      header('Location: login.php');
    } 
      
    $jobid = $_GET['jobid'];
    $userid = $_SESSION['userid'];
    $sql = "select * from jobs where jobid = '$jobid' ";
    $rs = mysqli_query($con,$sql);
    while($data = mysqli_fetch_array($rs)){

      $_SESSION['jobid'] = $data['jobid'];
      $userid = $_SESSION['userid'];
  ?>
	   


              
     <div class="container">


    <div class="single">
    <h1>Job Information</h1>
      <div class="col-md-12 view-app">
           <form action="apply.php" method="post" enctype="multipart/form-data" >

             <input type="hidden" value="<?=$jobid?>" name="jobid" >
             <input type="hidden" value="<?=$userid?>" name="userid" >
             
             <ul class="list-group">
                      <li class="list-group-item">
                        <h6 class="mb-0"><i class="fa-regular fa-id-card"></i>&emsp;Job ID:</h6>
                        <span class="text-secondary"><?=$data['jobid']?></span>
                      </li>
                      <li class="list-group-item">
                        <h6 class="mb-0"><i class="bi bi-person-fill"></i>&emsp;Job Title:</h6>
                        <span class="text-secondary"><?=$data['title']?></span>
                      </li>
                      <li class="list-group-item">
                        <h6 class="mb-0"><i class="bi bi-gear-fill"></i>&emsp;Job Requirement:</h6>
                        <span class="text-secondary"><?=$data['requirement']?></span>
                      </li>
                      <li class="list-group-item">
                        <h6 class="mb-0"><i class="bi bi-briefcase-fill"></i>&emsp;Job Duty:</h6>
                        <span class="text-secondary"><?=$data['duty']?></span>
                      </li>
                      <li class="list-group-item">
                        <h6 class="mb-0"><i class="bi bi-coin"></i>&emsp;Job Salary:</h6>
                        <span class="text-secondary"><?=$data['salary']?></span>
                      </li>
                      <li class="list-group-item">
                        <h6 class="mb-0"><i class="bi bi-card-list"></i>&emsp;Job Description:</h6>
                        <span class="text-secondary"><?=$data['description']?></span>
                      </li>
          </ul>
          <div class="apply-group">
                  <div class="form-group apply-textarea">
                    <label class="form-label">Apply Message:</label>
                    <input type="text" placeholder="enter your message here" name="message" class="form-control">
                    </div>
              <div class="form-group">
              
              </div>
              
              <input type="submit"  name="applyjob" value="Apply" class="btn btn-primary">
              </div>
           </form>
        

      </div>

</div>                                  


       <?php
  }
  ?>

    
 

       <?php 
 
           if(isset($_POST['applyjob']))
           {

        

            $userid = $_POST['userid'];
            $jobid = $_POST['jobid'];
            $message = $_POST['message'];
            $date = date('Y-m-d H:i:s');
            



           $sql = "INSERT INTO `application`(`userid`, `jobid`, `message`, `date`) 
                  VALUES ('$userid','$jobid','$message','$date')";
           mysqli_query($con,$sql);
           
        

           echo "<script>alert('Apply Job')</script>";
           header('Location: viewappjob.php');

        }
?>

    
</div>

<br><br>
 <?php include('footer.php'); ?>


</body>
</html>