<?php
  require('../config/config2.php');
  require('../lib/db.php');
  $conn = db_init($config2["host"], $config2["duser"], $config2["dpw"], $config2["dname"]);

  $nick = $_POST['nick'];
  $liked = $_POST['liked'];
  $commentid = $_POST['id'];
  $page = $_GET['page'];
  $id = $_GET['id'];

  $sql = "DELETE FROM welfarecomment WHERE id=$commentid";
  $result = mysqli_query($conn, $sql);

  $replacadmiRL = "/7welfareview?page='".$page."'&id='".$id;
 ?>
 <script>
   location.replace("<?php echo $replacadmiRL?>");
 </script>
