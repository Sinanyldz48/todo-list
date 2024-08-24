<?php
    //LogOut tuşuna basıldığı anda session silinir ve header araclığı ile login sayfasına yönlendirilir
    session_start();
    unset($_SESSION["username"]);
    unset($_SESSION["isLoggined"]);
    unset($_SESSION["id"]);
    header("Location: login.php");
?>