<?php
require("/config/config2.php");// DB설정
require("lib/db.php"); // DB 실행 내용 저장 파일
$conn = db_init($config2["host"], $config2["duser"], $config2["dpw"], $config2["dname"]);

if(isset($_POST['id'])) {
		$id = $_POST['id'];
	}

if(empty($id)){

}
$title = $_POST['title'];
$content = nl2br($_POST['content']);


if(isset($id)) {
  $sql = "UPDATE notice SET title='".$title."', content='".$content."' WHERE id='".$id."'";
  $msgState = '수정';
}
else {
  $sql = "INSERT INTO notice(title, content, author) VALUES ('".$title."','".$content."','관리자')";
  $msgState = '등록';
}

if(empty($msg)) {
    $result = mysqli_query($conn, $sql);
  if($result){
    $msg = '글이 정상적으로 '.$msgState.'되었습니다.';
    if(empty($id)) {
			$id = mysqli_insert_id($conn);
		}
    $replaceURL = './noticeview?id=' . $id;
  }
else {
  $msg = '글이 '.$msgState.'되지 않았습니다.';

?>
<script>
			alert("<?php echo $msg ?>");
			history.back();
</script>
<?php
    exit;
  }
}
?>
<script>
	alert("<?php echo $msg?>");
	location.replace("<?php echo $replaceURL?>");
</script>
