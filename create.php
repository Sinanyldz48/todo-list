<?php
//require ile diğer sphp safyalarını kullanabilmek için çağırıyoruz.
require "includes/_header.php";
require "includes/functions.php";
    //Burda isset ile create isminde post geldiğinde yani submit olan formdaki buttonun namesi create varsa işlemlere devam et.
    if(isset($_POST["create"]))
    {   
        session_start();
        //Posttan Gelen Input'u Aldık.
        $txt = $_POST["task_text"];
        //Login yaptıktan sonra kullanıcının id bilgisi sessiona kaydediliyordu. Burda ise onu bir değişkene atadık ekleme yaparken lazım olcak.
        $user_id = $_SESSION["user_id"];
        
        //Oluşturdu mu? Fonksiyon resultu döndürdüğü için true veya false gelebilir.
        //txt gelen input, 1 status bilgisi 1 veya 0 burda default olarak 1 verdim , user id ise o sadece o kullanıcıya vermek için.
        if (createTask($txt,1,$user_id)) {
            session_start();
            $_SESSION['alert'] = "Görev Eklendi";
            //Burda eklendiyse ana ekrana yönlendiriyoruz.
            header("Location: index.php");
        }
        else
            echo $_SESSION['alert'] = "Hata Oluştu";

        
    }


?>
<div class="container" invalid>
<form method="post" action="create.php">
  <div class="mb-3">
    <label for="task_text" class="form-label">Görev Ekleyin</label>
    <input type="task_text" class="form-control" id="task_text" name="task_text" aria-describedby="task_text">
  </div>
  <button type="submit" class="btn btn-primary" name="create">Oluştur</button>
</form>
</div>
