
<?php

@include 'config/config.php';

$connect = mysqli_connect($hostname, $username, $password, $database);

session_start();


if(mysqli_connect_error())
{
    echo -99; // #1 Loi ket noi khong thanh cong
    exit();
}


if (isset($_POST['submit'])) {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $checkLoginQuery = "SELECT * FROM account WHERE username = '$username' && password = '$password' ";
    $checkLogin = mysqli_query($connect, $checkLoginQuery) or die(-97);

    if (empty($_POST["username"]) || empty($_POST["password"]) ){
        echo -98; // #2 POST empty
        exit();
    };
    if (mysqli_num_rows($checkLogin) == 0) {
        echo -96; // #3 Tai khoan mat khau khong chinh xac
        exit();
    } else {
        echo 0; // Login thanh cong
    }
    ;

}
 
?>