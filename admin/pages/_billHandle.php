<?php 
include('../db/connect.php');
session_start();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $billId = $_POST['billid'];
            $status = $_POST['status'];
            $str_billstatus = "UPDATE `bill` SET `billStatus`='$status' WHERE billID = $billId";
            $querystatus = mysqli_query($con, $str_billstatus);
        }
    }
?>