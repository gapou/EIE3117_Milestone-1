<?php

$con = mysqli_connect('localhost','root','','dbjobsportal');

if(!$con){
    die('MySQL connected Failed');
}##else{
##   echo"<script>alert('MySQL connected Sucessful!')</script>";
##}

?>