<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/website icon.png">
    <title>Upload Job | Jobs Portal</title>
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

      
     $empid = $_SESSION['userid'];

    ?>
    <div class="container view-app" data-aos="zoom-in" data-aos-duration="1500">
    


      <div class="single ">
      <h1>Uploads Jobs</h1>
            <div class="col-md-6 ">
                 <form action="uploadjob.php" method="post">
                   
                   <div class="form-group">
                   <label class="form-label">Job Title</label>
                   <input type="text" placeholder="enter a name" name="name" class="form-control">  
                   </div>

                   <div class="form-group">
                   <!-- <input type="text" placeholder="enter a categories" name="categories" class="form-control">   -->
                   



                   </select>
                   </div>


               
                   <div class="form-group">
                   <label class="form-label">Job Requirement</label>
                   <input type="text" placeholder="Enter a Job requirement" name="requirement" class="form-control">
                   </div>

                   <div class="form-group">
                   <label class="form-label">Job Duty</label>
                   <input type="text" placeholder="Enter a Job duty " name="duty" class="form-control">
                   </div>

                   <div class="form-group">
                   <label class="form-label">Job Salary</label>
                   <input type="text" placeholder="Enter a Job salary" name="salary" class="form-control">
                   </div>

                   <div class="form-group">
                   <label class="form-label">Job Detail</label>
                   <textarea type="text" placeholder="Enter the Job detail" name="desc" class="form-control"></textarea>
                   </div>

                    <input type="submit"  name="postjob" value="Post Job" class="btn btn-primary" >
                    <br><br>
                 </form>
              

            </div>

            <div class="col-md-6 ">
                 <div class="form-group">
                 <label class="form-label">Uploaded Jobs</label>
                 <input type="text" id="myinput" placeholder="search ......" class="form-control">
                 </div>
               
                 <table class="table">
                      <thead>
                            <tr>
                                 <th>ID</th>
                                 <th>Title</th>
                                 <th>Requirement</th>
                                 <th>Duty</th>
                                 <th>Salary</th>
                                 <th>Description</th>
                                 <th>Campany</th>
                                 <!-- <th>Action</th> -->
                            </tr>
                      </thead>

                      <tbody id="mytable">
                           <?php
                              
                              $sql = "select jobs.*, employer.name
                              from jobs
                              inner join employer on employer.empid = jobs.empid
                              where jobs.empid = '$empid';
                              ";
                              $rs = mysqli_query($con,$sql);
                              while($data = mysqli_fetch_array($rs)){
                           ?>

                                <tr>
                                      <td><?=$data['jobid']?></td>
                                      <td><?=$data['title']?></td>
                                      
                                      <td><?=$data['requirement']?></td>
                                      <td><?=$data['duty']?></td>
                                      <td><?=$data['salary']?></td>
                                      <td><?=$data['description']?></td>
                                      <td><?=$data['name']?></td>
                                      <!-- <td>
                                           <a href="upload.php?id=<?=$data['jobid']?>" class="btn btn-info"> Edit</a>
                                           <a href="upload.php?id=<?=$data['jobid']?>" class="btn btn-danger"> Delete</a>
                                      </td> -->
                                </tr>

                           <?php
                              }
                              ?>
                      </tbody>
                 </table>

            </div>

      </div>
 

       <?php 

           if(isset($_POST['postjob']))
           {

           
         $empid = $_SESSION['userid'];



            $name = $_POST['name'];
          //   $categories = $_POST['categories'];
            
            $desc = $_POST['desc'];
            $salary = $_POST['salary'];
            $requirement = $_POST['requirement'];
            $duty = $_POST['duty'];

           $sql = "INSERT INTO `jobs`( `title`, `description`, `salary`, `requirement`, `duty`, `empid`) VALUES ('$name', '$desc','$salary','$requirement','$duty','$empid')";
           mysqli_query($con,$sql);
           
        

           echo "<script>alert('Job Posted')</script>";
           

        }
?>

</div>

<script>
$(document).ready(function(){
  $("#myinput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#mytable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

</script>

<br><br>
 <?php include('footer.php'); ?>


</body>
</html>