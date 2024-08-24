<?php require "includes/_header.php";
require "includes/functions.php";
session_start(); // Oturum başlatıldı

if (!isset($_SESSION["isLoggined"])) {
    header("Location: login.php");
    exit; // Yönlendirmeden sonra kodun devamını engelle
}
//Login ekranında giriş yapıldıktan sonra sessiona kaydettiğimiz id ile sadece o kullanıcıya ait kayıtları getiriyoruz.
$user_id = $_SESSION['user_id'];
//Bu Fonksiyona user_id ile bir parametre gönderiyor ve gelen değer bir mysqli nesnesi
$result = getLists($user_id);
?>
<?php require "includes/_navbar.php"; ?>
<div class="container">

    <div class="col-12">
        <div class="d-flex justify-content-center align-items-center">
            <a href="create.php" class="btn btn-success px-5 fs-5 mt- text-center">Görev Ekle</a>
        </div>
        <table class="table table-dark mt-2">
            <thead>
                <tr>
                    <th>Görev</th>
                    <th>Oluşturma Tarihi</th>
                    <th>Durum</th>
                    <th>Düzenle</th>
                    <th>Sil</th>
                </tr>
                </thead>
                <!-- Burda ise giriş yapılmış mı diye kontrl ediyoruz yapmadıysa logine yönlendiriyoruz -->
            <?php if (isset($_SESSION["isLoggined"])): ?>
                <!-- Tüm değerleri yani nesneyi mysqli_feth_assoc fonksiyonu ile alıyoruz diziye çeviriyoruz -->
                <?php while ($item = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <?php if ($item["status"] == 0): ?>
                            <td><del><?php echo $item["task_text"] ?></del></td>
                        <?php else: ?>
                            <td><?php echo $item["task_text"]; ?></td>
                        <?php endif; ?>

                        <td><?php echo $item["created_at"] ?></td>
                        <?php if ($item["status"] == 1): ?>
                            <td><span class="badge badge-warning">Devam Ediyor</span></td>
                        <?php else: ?>
                            <td><del><span class="badge badge-success">Bitti</span></del></td>
                        <?php endif; ?>
                        <td>
                            <a href="true.php?task_id=<?php echo $item["id"] ?>" class="btn btn-warning">
                                <?php ?>
                                <?php if ($item["status"] == 0): ?>
                                    <del><i class="fa fa-check" aria-hidden="true"></i>
                                    </del>
                                <?php else: ?>
                                    <i class="fa fa-times" aria-hidden="true"></i>
                        </td>
                    <?php endif; ?>
                    </td>
                    <td><a href="delete.php?task_id=<?php echo $item["id"] ?>" class="btn btn-danger">Sil</a></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <?php header("Location:login.php") ?>

            <?php endif; ?>
        </table>
    </div>
</div>
<?php require "includes/_footer.php"; ?>