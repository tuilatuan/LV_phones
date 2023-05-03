<?php
include('../db/connect.php');
session_start();
$userId = $_SESSION['accountID'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['profile-button'])) {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $username = $_POST['username'];
        // echo ("$fullname + $email +$address + $phone");
        $str = "UPDATE account SET `fullname`='$fullname',`username`='$username',`phone`='$phone',`email`='$email',`address`='$address' WHERE accountID= $userId";
        $query = mysqli_query($con, $str);
        echo '<script>;window.history.back(1);</script>';
    };
    if (isset($_POST['rePass'])) {
        $oldpass = $_POST['oldPass'];
        $newpass = $_POST['newPass'];
        $renewpass = $_POST['renewPass'];
        $sql = "SELECT * FROM account WHERE accountID='$userId'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        $hash = $row['password'];
        if (password_verify($oldpass, $hash)) {
            $hash = password_hash($newpass, PASSWORD_DEFAULT);
            $sql=" UPDATE `account` SET `password`='$hash'WHERE accountID='$userId'";
            $query = mysqli_query($con,$sql);
            echo "<script>alert('Đổi mật khẩu thành côngt');
            window.location=document.referrer;
            </script>";
        } else {
            echo "<script>alert('sai mật khẩu cũ');
                            window.location=document.referrer;
                            </script>";
        }
    }
}
