<?php
require("config/config2.php"); // DB설정 파일
require("lib/db.php"); // DB 실행 내용 저장 파일
$conn = db_init($config2["host"], $config2["duser"], $config2["dpw"], $config2["dname"]);

$email = mysqli_real_escape_string($conn, $_POST['email']);
$pwd1 = mysqli_real_escape_string($conn, $_POST['pwd1']);
$pwd2 = mysqli_real_escape_string($conn, $_POST['pwd2']);

if($pwd1 !== $pwd2) {
  echo "<script>alert(\"비밀번호를 다시 확인해 주세요.\");
  history.back();
</script>";
}
else{
  $sql = "DELETE FROM userlist WHERE email='$email'";
  $result = mysqli_query($conn, $sql);

  echo "<script>alert(\"탈퇴 처리 되었습니다.\");
        </script>";
        session_start();
        session_destroy();
        $referer = $_SERVER['HTTP_REFERER'];
        header('Location: ./main');
    }
?>
