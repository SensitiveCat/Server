<?php
require('./code/userinfo.php');
if(!isset($id)) {
require('config/config2.php');
require('lib/db.php');
$conn = db_init($config2["host"], $config2["duser"], $config2["dpw"], $config2["dname"]);
$id = $_GET['id'];
$sql = "SELECT * FROM professor WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
}
else {

}

 ?>
<!DOCTYPE html>
<html>
<?php
  require('./code/nav.php');
 ?>
   <div class="maintitle text-center">
   <p>
     <?php
        if(!isset($_SESSION['is_login'])){
            echo $_SESSION['msg'];
        }else {
          echo $welcome;
          echo $logout;
        }
      ?>
   </p>
 </div>
    <article class="contents">
      <?php require('./code/professordetail.php');?>
    </article>

  </div>
  </body>
</html>
