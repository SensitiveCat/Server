<?php
  session_start();
  require('../config/config2.php');
  require("../lib/db.php"); // DB 실행 내용 저장 파일
  $conn = db_init($config2["host"], $config2["duser"], $config2["dpw"], $config2["dname"]);

  $level = $_POST['level'];
  $mood = $_POST['mood'];
  $qual = $_POST['qual'];
  $quan = $_POST['quan'];
  $reportlv = $_POST['reportlv'];
  $testlv = $_POST['testlv'];
  $scorelv = $_POST['scorelv'];
  $book = $_POST['book'];
  $insung = $_POST['insung'];

  $proid = $_GET['id'];
  $nick = $_SESSION['id'];
  $score = $_POST['star'];
  $comment = nl2br($_POST['comment']);

  $sql = "INSERT INTO eleccomment (proid, nick, score, comment) VALUES ('".$proid."','".$nick."','".$score."','".$comment."')";
  $result = mysqli_query($conn, $sql);
  $replacadmiRL = './3elecview?id=' . $proid;

  $sql = "INSERT INTO elecestimate (level, mood, qual, quan, reportlv, testlv, scorelv, book, insung, proid)
  VALUES ('".$level."','".$mood."','".$qual."','".$quan."','".$reportlv."','".$testlv."','".$scorelv."','".$book."','".$insung."','".$proid."')";
  $result = mysqli_query($conn, $sql);
?>
<script>
  location.replace("<?php echo $replacadmiRL?>");
</script>
