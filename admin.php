<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Jobs Portal</title>
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
    ?>
    
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <input type="file" placeholder="img" name="img_dir" class="form-control">
    </div>
    <input type="submit"  name="upload" value="upload" class="btn btn-primary">
</form>
<?php   

    if(isset( $_POST['upload']) ){
        $file = $_FILES['img_dir']['name'];
        $sql = "INSERT INTO `employer`( `img_dir`) VALUES ('$img_dir')";

        $res = mysqli_query($con,$sql);
        if($res){
            move_uploaded_file($_FILES['img_dir']['tmp_name'], "$file");
        }
      } 
?>  
<br><br>
 <?php include('footer.php'); ?>

</body>
</html>