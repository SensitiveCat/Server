<?php
  session_start();
  require('../config/config2.php');
  require("../lib/db.php"); // DB 실행 내용 저장 파일
  $conn = db_init($config2["host"], $config2["duser"], $config2["dpw"], $config2["dname"]);

  $proid = $_GET['id'];
  $page = $_GET['page'];
  $nick = $_SESSION['id'];
  $score = $_POST['star'];
  $comment = nl2br($_POST['comment']);

  $sql = "UPDATE nanochcomment set comment='".$comment."',score=$score WHERE nick='".$nick."' and proid=$proid";
  $result = mysqli_query($conn, $sql);
  $replaceURL = "./6nanochview?page='.$page.'id='.$proid.'";
?>
<script>
  location.replace("<?php echo $replaceURL?>");
</script>
