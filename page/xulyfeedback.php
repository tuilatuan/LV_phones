<?php
include('../db/connect.php');
session_start();
$userId = $_SESSION['accountID'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['btnsub'])){
        $content = $_POST['content'];
        $email = $_POST['email'];
        $str = "INSERT INTO `feedback`(`accountID`, `content`, `email`) VALUES ('$userId','$content','$email')";
        $query = mysqli_query($con,$str);
        header("location: http://localhost/LV_Phones/contact.php");
    }
}
