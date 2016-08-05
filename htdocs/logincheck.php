<?php
require("config/config2.php"); // DB설정 파일
require("lib/db.php"); // DB 실행 내용 저장 파일
$conn = db_init($config2["host"], $config2["duser"], $config2["dpw"], $config2["dname"]);
$user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
$user_pwd = mysqli_real_escape_string($conn, $_POST['user_pwd']);
session_start();
$sql = "SELECT * FROM userlist WHERE email='".$user_email."'";
$result  = mysqli_query($conn, $sql);
if($result->num_rows > 0) {
  $row = mysqli_fetch_assoc($result);
  if($row['pwd'] == $user_pwd) {
    $_SESSION['is_login'] = true;
    $_SESSION['id'] = $row['nickname'];
    header('Location: /main');
    //exit();
  }
  else {
    echo "<script>alert(\"비밀번호가 일치하지 않습니다.\");
    history.back();
  </script>";
  }
}
else {
  echo "<script>alert(\"회원 정보가 존재하지 않습니다.\");
  history.back();
</script>";
}
