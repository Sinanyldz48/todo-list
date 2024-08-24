<?php
    // Eğer username varsa yani kullanıcı girişi olmuşsa 
    if (isset($_SESSION["username"])) {
      $username = $_SESSION["username"];
    }
    else
      $username = "Lütfen Giriş Yapınız";
?>
<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="#">TODO-List</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <!-- Eğer Session isLoggined isimli session yoksa Login sayfasına yönlendiriyor -->
        <?php if(!isset($_SESSION["isLoggined"])):?>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
        <?php else:?>
          <!-- Burda logouta basılınca sessionlar siliniyor ve logine yönlendiriliyor detay için logOut.php dosyasına bakınız. -->
          <li class="nav-item">
            <a class="nav-link" href="logOut.php">LOgOut</a>
          </li>
        <?php endif;?>
        <li class="nav-item">
          <a class="nav-link" href="#"></a>
        </li>
        <!-- Burada ise eğer bir kullanıcı adı varsa(giriş varsa) onu navbarda gösteriyoruz. -->
        <li class="nav-item username">
          <span>Hoşgeldin, <?php echo strtoupper($username)?></span>
        </li>
      </ul>
    </div>
  </nav>
  <?php require "_footer.php";?>