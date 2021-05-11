<?php 
    session_start(); //starts the session 
    //$db_name = "qcanedb";  
    //$db_username = "root";    
    //$db_pass = "";    
    //$db_host = "localhost:3307";
	
	$db_name = "epiz_28587720_qcanedb";  
    $db_username = "epiz_28587720";    
    $db_pass = "Ft0s6tdLSzzjd";    
    $db_host = "sql113.epizy.com";
    if($_SESSION['user']){ //checks if user is logged in 
    }  
    else{ header("location:login.php"); // redirects if user is not logged in
    }  
    if($_SERVER['REQUEST_METHOD'] == "GET"){  $con = mysqli_connect("$db_host","$db_username","$db_pass", "$db_name") or die(mysqli_error(mysqli_connect("$db_host","$db_username","$db_pass", "$db_name"))); //Connect to server 
    $id = $_GET['id']; 
    mysqli_query($con, "DELETE FROM list WHERE id='$id'"); 
    header("location: home.php");} 
?>