<?php 
include('../db/connect.php');
session_start();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['PH'])){
            $answer = $_POST['answer'];
            $feedid =$_POST['feedid'];
            $str="UPDATE `feedback` SET`answer`=' $answer' WHERE feedbackID = $feedid";
            $con->query($str);
            // $query = mysqli_query($con,$str);
            echo "<script>alert(' Thành công');
                            window.location=document.referrer;
                            </script>";
        }
        if (isset($_POST['DelFeed'])) {
            $feedbackID = $_POST['feedbackID'];
            $qtr = "DELETE FROM `feedback` WHERE `feedbackID` = $feedbackID";
            $query = mysqli_query($con, $qtr);
            header('location: http://localhost/LV_Phones/admin/index.php?chon=t&id=5');
        }
    }
?>