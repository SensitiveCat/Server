<?php
require("config/config2.php"); // DB설정 파일
require("lib/db.php"); // DB 실행 내용 저장 파일
$conn = db_init($config2["host"], $config2["duser"], $config2["dpw"], $config2["dname"]);

$nickname = mysqli_real_escape_string($conn, $_POST['nick']);
$pwd1 = mysqli_real_escape_string($conn, $_POST['pwd1']);
$pwd2 = mysqli_real_escape_string($conn, $_POST['pwd2']);

if($pwd1 !== $pwd2) {
  echo "<script>alert(\"비밀번호를 다시 확인해 주세요.\");
  history.back();
</script>";
}
else{
  if ($nickname != null) {
    $sql = "UPDATE userlist SET nickname=$nickname WHERE nickname=$_SESSION['id']";
    $result = mysqli_query($conn, $sql);
  }
  else {
    if($pwd1 != null && $pwd2 != null) {
      $sql = "UPDATE userlist SET pwd=$pwd2 WHERE pwd=$pwd1";
      $result = mysqli_query($conn, $sql);
    }
    else {
      echo "<script>alert(\"다시 입력해주세요.\");
            history.back();
            </script>";
      header('Location: /main');
    }

  echo "<script>alert(\"수정되었습니다.\");
        history.back();
        </script>";
  header('Location: /main');
}
}
?>
