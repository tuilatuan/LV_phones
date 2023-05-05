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
    if (isset($_POST['addUser'])) {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['nphone'];
        $password = $_POST['password'];
        $cpassword = $_POST['repassword'];
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
    '$username', '$hash', '$phone', $role, '$email')";
                $result = mysqli_query($con, $sql);
                if ($result) {
                            echo "
                             <script>alert('Thành công');
                             </script>";
                    header('location: http://localhost/LV_Phones/admin/index.php?chon=t&id=6');
                }
            } else {
                echo "
                         <script>alert('Mật khẩu nhập lại không đúng');
                         </script>";
                header('location: http://localhost/LV_Phones/admin/index.php?chon=t&id=6');
            }
        }
    }
    if(isset($_POST['editUser'])){
        $userId = $_POST['userID'];
        $username = $_POST['username'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $role = $_POST['PQ'];
        if(!empty($_POST['password'])){
            $str_user ="UPDATE `account` SET `fullname`='$fullname',`username`='$username',`password`='$hash',`phone`='$phone ',`role`='$role',`email`='$email' WHERE accountID = $userId";
            $query_user = mysqli_query($con ,  $str_user);
            if($query_user){
                echo "
                         <script>alert('cập nhật thành công');
                         </script>";
                header('location: http://localhost/LV_Phones/admin/index.php?chon=t&id=6');
            }
            else{
                echo "
                         <script>alert('cập nhật thất bại');
                         </script>";
                header('location: http://localhost/LV_Phones/admin/index.php?chon=t&id=6');
            }
    
        }
        else{
            $str_user ="UPDATE `account` SET `fullname`='$fullname',`username`='$username',`phone`='$phone ',`role`='$role',`email`='$email' WHERE accountID = $userId";
            $query_user = mysqli_query($con ,  $str_user);
            if($query_user){
                echo "
                         <script>alert('cập nhật thành công');
                         </script>";
                header('location: http://localhost/LV_Phones/admin/index.php?chon=t&id=6');
            }
            else{
                echo "
                         <script>alert('cập nhật thất bại');
                         </script>";
                header('location: http://localhost/LV_Phones/admin/index.php?chon=t&id=6');
            }
        }
    }
}
