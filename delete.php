<?php
    require "includes/_header.php";
    require "includes/functions.php";
    // Burada ise indexte hangi task'ın sil butonuna tıklandığını almak için $_get ile id'yi alıyoruz.
    $task_id = $_GET["task_id"];
    if(deleteTask($task_id))
    {
        $_SESSION['alert'] = "Silindi";
        header("Location: index.php");
    }
    else
    echo $_SESSION['alert'] = "Hata Oluştu";
?>