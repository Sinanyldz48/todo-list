<?php
 require "includes/_header.php";
 require "includes/functions.php";
 require "includes/settings_mysql.php";
        //isset = null değilse yani varsa true döndürür
    if (isset($_POST["register"])) {
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
        $sql = "INSERT INTO users(username,password) VALUES(?,?)";
        $stmt = mysqli_prepare($connection,$sql);
        mysqli_stmt_bind_param($stmt,'ss',$username,$password);
        //Burda execute edildikten sonra true dönerse yani kullanıcı kaydı başarılı ise login ekranına yönlendirme yapılıyor.
        if (mysqli_stmt_execute($stmt)) {
            header("Location: login.php");
        }
        else
        {
            echo "Hata Oluştu";
        }
        
    }

?>
  <div class="register-container">
    <h1>Register</h1>
    <form method="post" action="register.php">
      <div class="form-group">
        <label for="name">Userame:</label>
        <input type="text" name="username" placeholder="Enter your username" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Enter your password" required>
      </div>
      <button type="submit" name="register">Register</button>
    </form>
    <div class="login-link">
      <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
  </div>
</body>
</html>