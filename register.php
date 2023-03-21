<?php

@include 'config/config.php';

$conn = mysqli_connect($hostname, $username, $password, $database);

if(isset($_POST['submit'])){

   //  $id = mysqli_insert_id($conn); // lấy id
    $name = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
 
    $select = " SELECT * FROM account WHERE username = '$name'  ";
 
    $result = mysqli_query($conn, $select);
 
    if(mysqli_num_rows($result) > 0){

        echo -99; // check tài khoản đã tồn tại chưa ?

    }else{ 

       if($pass != $cpass){

          echo -97; // check trùng pass

       }else{
          $insert = "INSERT INTO account(username, password) VALUES('$name','$pass')";
         //  $insert2 = "INSERT INTO player (account_id) VALUES('$id')"; // chuyền id
          mysqli_query($conn, $insert);
         //  mysqli_query($conn, $insert2);
          header('location:login.php');
       }
    }
 
 };
?>

