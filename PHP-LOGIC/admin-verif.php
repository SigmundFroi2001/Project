<?php
session_start();
// DON'T MIND THIS
$username = $_SESSION['user'];
$db_name = "epiz_28587720_qcanedb";  
$db_username = "epiz_28587720";    
$db_pass = "Ft0s6tdLSzzjd";    
$db_host = "sql113.epizy.com";
//$db_name = "qcanedb";
//$db_username = "root";
//$db_pass = "";
//$db_host = "localhost:3307";
$con = mysqli_connect($db_host, $db_username, $db_pass, $db_name) or die('Error: ' . mysqli_error($con)); //Connect to server
$query = "SELECT * from users WHERE username = . $username";
$results = mysqli_query($con, $query); //Query the users table if there are matching rows equal to $username
$exists = mysqli_num_rows($results); //Checks if username exists
$table_users = "";
$table_status = "";

if ($results != "" && $exists != 1) { //IF there are no returning rows or no existing username
    print '<script>alert("Incorrect Username!");</script>'; //Prompts the user 
    print '<script>window.location.assign("login.php");</script>'; // redirects to login.php  
} else {
    while ($row = mysqli_fetch_assoc($results)) //display all rows from query
    {
        $table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished  
        $table_status = $row['status']; // the first status row is passed on to $table_users, and so on until the query is finished 
    }
    if ($username == $table_users) // checks if there are any matching fields
    {
        if ($table_status == 1) {
            $_SESSION['user'] = $username; //set the username in a session. This serves as a global variable
            header("location: admin.php"); // redirects the user to the authenticated home page 
        }else{
            print '<script>alert("Not an Admin!");</script>'; 
            $_SESSION['user'] = $username; //set the username in a session. This serves as a global variable
            header("location: main.html"); // redirects the user to the authenticated home page 
        }
    } else {
        print '<script>alert("No Admin Account!");</script>'; //Prompts the user 
        print '<script>window.location.assign("main.html");</script>'; // redirects to login.php 
    }
}
