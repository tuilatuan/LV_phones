<?php
session_start();
echo "Tạm biệt bạn tôi....";
unset($_SESSION["adminloggedin"]);
unset($_SESSION["staffloggedin  "]);
unset($_SESSION["loggedin"]);
unset($_SESSION["username"]);
unset($_SESSION["adminname"]);
unset($_SESSION["staffname"]);
unset($_SESSION["roleadmin"]);
unset($_SESSION["accountID"]);
unset($_SESSION["rolestaff"]);


// session_unset();
// session_destroy();

header("location: /LV_Phones/index.php");
?>