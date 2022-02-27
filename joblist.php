<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/website icon.png">
    <title>Jobs list Page | Jobs Portal</title>
    <?php include('header_link.php'); ?>
  
</head>
<body>

<?php include('header.php');


 $userid = $_SESSION['userid'];

?>

<?php include('job.php'); ?>

<?php include('footer.php'); ?>


</body>
</html>