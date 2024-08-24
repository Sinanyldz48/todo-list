<?php
 require "includes/_header.php";
 require "includes/functions.php";
 require "includes/settings_mysql.php";
    if (isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $sql = "SELECT id,username,password FROM users WHERE username=?";
        if($stmt = mysqli_prepare($connection,$sql))
        {   
          //usernameyi geçici değişkene atıyoruz
            $param_username = $username;
            mysqli_stmt_bind_param($stmt,'s',$param_username);
            if (mysqli_stmt_execute($stmt)) {
                //Gelen sonucu bellekte tutar daha sonra fetch ile almak için
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    //Bu değişkenlere gelen sütunları atar
                    mysqli_stmt_bind_result($stmt,$id,$username,$db_password);
                    //Yukarıdaki değerle bir sonraki satıra atandı mı diye kontrol eder.
                    if (mysqli_stmt_fetch($stmt)) {
                        if ($password == $db_password) {
                            session_start();
                            $_SESSION["isLoggined"] = "true";
                            $_SESSION["user_id"] = $id;
                            $_SESSION["username"] = $username;
                            header("Location: index.php");
                        }
                        else
                        {
                            echo "Yanlıs Parola";
                        }
                    }
                }
                else
                    echo "Kullanıcı Adı Bulunamadı";
            }
            mysqli_close($connection);
        }
        
        

    }

?>
  <div class="register-container">
    <h1>Login</h1>
    <form method="post" action="login.php">
      <div class="form-group">
        <label for="name">Userame:</label>
        <input type="text" name="username" placeholder="Enter your username" required>
      </div>

      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Enter your password" required>
      </div>
      <button type="submit" name="login">Login</button>
    </form>
    <div class="login-link">
      <p>Dont Have a Account? <a href="register.php">Register</a></p>
    </div>
  </div>
</body>
</html>