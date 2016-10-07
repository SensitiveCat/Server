<?php
require('../config/config2.php');
require('../lib/db.php');
$conn = db_init($config2["host"], $config2["duser"], $config2["dpw"], $config2["dname"]);

$nick = $_POST['nick'];
$liked = $_POST['liked'];
$id = $_POST['id'];

if($nick == $liked) {
  echo '<script>alert("자신의 글은 좋아요를 할 수 없습니다.");
  history.back();</script>';
}
else {
  $sql = "SELECT * FROM medicineliketable WHERE commentid=$id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  if( $row['nick'] == $nick) {
    echo '<script>alert("좋아요는 한 번만 할 수 있습니다.");
    history.back();</script>';
  }
  else {
    $sql = "INSERT INTO medicineliketable(nick, liked, commentid) VALUES ('".$nick."','".$liked."','".$id."')";
    $result = mysqli_query($conn, $sql);
    $sql = "UPDATE medicinecomment SET liked = liked + 1 WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    echo '<script>alert("좋아요를 했습니다.");
    history.back();</script>';
  }
}
 ?>
