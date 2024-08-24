<?php
    function getLists($id)
    {
        require "settings_mysql.php";
        $sql = "SELECT t.id,t.task_text,t.status,t.created_at FROM tasks t join users u ON t.user_id=u.id WHERE u.id=?";
        $stmt = mysqli_prepare($connection,$sql);
        mysqli_stmt_bind_param($stmt,'i',$id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return $result;
    }
    function getListById($id)
    {
        require "settings_mysql.php";
        $sql = "SELECT * FROM tasks WHERE id = $id";
        $result = mysqli_query($connection,$sql);
        mysqli_close($connection);
        return $result;
    }
    function createTask(string $text,int $status=1,int $user_id)
    {
        require "settings_mysql.php";
        $sql = "INSERT INTO tasks(task_text,status,user_id) VALUES(?,?,?)";
        $result = mysqli_prepare($connection,$sql);
        mysqli_stmt_bind_param($result,'sii',$text,$status,$user_id);
        mysqli_stmt_execute($result);
        mysqli_close($connection);
        return $result;
    }
    function deleteTask($id)
    {
        require "settings_mysql.php";
        $sql = "DELETE FROM tasks WHERE id=?";
        $result = mysqli_prepare($connection,$sql);
        mysqli_stmt_bind_param($result,'i',$id);
        mysqli_stmt_execute($result);
        mysqli_close($connection);
        print_r($result);
        return $result;
    }
    function updateStatus($id)
    {
        require "settings_mysql.php";
        $sql = "";
        $result = getListById($id);
        $item = mysqli_fetch_assoc($result);
        $last = $item["status"];
        if($last == 1)
        {
            $sql = "UPDATE tasks SET status = 0 WHERE id = $id";
        }
        else
        {
            $sql = "UPDATE tasks SET status = 1 WHERE id = $id";
        }
        if ($sonuc = mysqli_query($connection,$sql)) {
            return $sonuc;
        }
        else
            return "Hata Var";
    }
?>
