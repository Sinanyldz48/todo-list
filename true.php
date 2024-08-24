<?php
    require "includes/functions.php";
    $id = $_GET["task_id"];
    $result = getListById($id);
    if (updateStatus($id)) {
        echo "Durum Başarılı";
        header("Location: index.php");
    }
    else
        echo "Hata var";
?>