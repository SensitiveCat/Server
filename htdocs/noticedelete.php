<?php
  require('config/config2.php');
  require('lib/db.php');
  $conn = db_init($config2["host"], $config2["duser"], $config2["dpw"], $config2["dname"]);
  $id = $_GET['id'];

  $sql = "DELETE FROM notice WHERE id=$id";
  $result = mysqli_query($conn, $sql);

  // 글 삭제 후 id를 알맞게 설정하기 위한 부분.
  $id = $id - 1;
  $sql = "ALTER TABLE notice AUTO_INCREMENT=$id";
  $result = mysqli_query($conn, $sql);
  header('Location: /notice');
 ?>
