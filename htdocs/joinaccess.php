<?php
require("config/config2.php"); // DB설정 파일
require("lib/db.php"); // DB 실행 내용 저장 파일
$conn = db_init($config2["host"], $config2["duser"], $config2["dpw"], $config2["dname"]);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$nickname = mysqli_real_escape_string($conn, $_POST['nickname']);
$pwd1 = mysqli_real_escape_string($conn, $_POST['pwd1']);
$pwd2 = mysqli_real_escape_string($conn, $_POST['pwd2']);

$check_email = filter_var($email, FILTER_VALIDATE_EMAIL);

if($check_email==true)
{

}
else
{
  echo "<script>alert(\"올바른 이메일 형식이 아닙니다.\");
  history.back();
</script>";
}

if($pwd1 == null) {
  echo "<script>alert(\"올바른 비밀번호 형식이 아닙니다.\");
  history.back();
</script>";
}

$sql = "SELECT COUNT(email) as cnt FROM userlist WHERE email='$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if($row['cnt'] > 0) {
  echo "<script>alert(\"존재하는 이메일입니다.\");
  history.back();
  </script>";
}
else {
  $sql = "SELECT COUNT(nickname) as cnt FROM userlist WHERE nickname='$nickname'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  if($row['cnt'] > 0) {
    echo "<script>alert(\"존재하는 닉네임입니다.\");
    history.back();
  </script>";
  }
  else {
    if($pwd1 !== $pwd2) {
      echo "<script>alert(\"비밀번호를 다시 확인해 주세요.\");
      history.back();
    </script>";
    }
    else{
      $sql = "INSERT INTO userlist (email, nickname, pwd, created) VALUES('".$email."', '".$nickname."', '".$pwd1."', now())";
      $result = mysqli_query($conn, $sql);
      header('Location: /main');
    }
  }
}
?>
