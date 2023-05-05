<?php
include('../db/connect.php');
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['DelAcc'])) {
        $accountID = $_POST['AccId'];
        $qtr = "DELETE FROM `account` WHERE `accountID` = $accountID";
        $query = mysqli_query($con, $qtr);
        header('location: http://localhost/LV_Phones/admin/index.php?chon=t&id=6');
    }
    if(isset($_POST['addUser'])){
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['nphone'];
        $password = $_POST['password'];
        $role = $_POST['PQ'];
        $existSql = "SELECT * FROM `account` WHERE username = '$username'";
        $result = mysqli_query($con, $existSql);
        $numExistRows = mysqli_num_rows($result);
        if ($numExistRows > 0) {
            echo "
            <script>alert('tài khoản đã tồn tại');
            window.location=document.referrer;
        </script>
            ";
        } else {
            if (($password == $cpassword)) {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `account` ( `fullname`, `username`, `password`, `phone`, `role`,`email`) VALUES ('$fullname',
    '$username', '$hash', '$phone', '0', '$email')";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    $showAlert = true;
                    header("Location: /LV_Phones/index.php?signupsuccess=true");
                }
            } else {
                $showError = "Mật khẩu không đúng";
                header("Location: /LV_Phones/index.php?signupsuccess=false&error=$showError");
            }
        }
    }
}
