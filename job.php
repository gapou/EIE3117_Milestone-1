


<div class="container">

<div class="single">  
     
<?php


 $userid = $_SESSION['userid'];

  include('dbconnect.php');
  $sql = "select * from jobs ORDER BY jobid DESC";
  $rs = mysqli_query($con,$sql);
  while($data = mysqli_fetch_array($rs)){


    $_SESSION['jobid'] = $data['jobid'];
    $userid = $_SESSION['userid'];
?>
	   

       <div class="col-md-12 job-from" height="400px;" > 
              
                <h1><?= $data['title'] ?></h1>

                
                <h3>Job Requirement :   <?= $data['requirement'] ?></h3>
                <h3>Job Duty :   <?= $data['duty'] ?></h3>
                <h3>Job Salary :   <?= $data['salary'] ?></h3>
                
                

                 <?php

					$type = $_SESSION['type'];

					if($type == 2){
                 
						echo "<a href='apply.php?jobid=".$data["jobid"]."' class='btn btn-primary'>View</a>";
                              
                
						
					}else{
						echo '<a href="login.php" class="btn btn-primary"> Login </a> ';
						echo '<a href="register.php" class="btn btn-primary"> Sign Up </a>';
					}

				 ?>
                 
               
        </div>



       <?php
  }
?>
	  
     </div>
     
         
</div>