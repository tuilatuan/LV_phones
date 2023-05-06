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
    }
?>