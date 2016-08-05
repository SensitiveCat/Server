<?php
require("/config/config2.php");// DB설정
require("lib/db.php"); // DB 실행 내용 저장 파일
$conn = db_init($config2["host"], $config2["duser"], $config2["dpw"], $config2["dname"]);
$id = $_GET['id'];

$sql = "SELECT * FROM notice WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$datetime = explode(' ', $row['date']);
$date = $datetime[0];
$time = $datetime[1];
if($date == Date('Y-m-d'))
  $row['date'] = $time;
else
  $row['date'] = $date;

  if(!empty($id) && empty($_COOKIE['notice' . $id])) {
  		$sql = 'UPDATE notice SET hit = hit + 1 WHERE id = ' . $id;
  		$result = mysqli_query($conn, $sql);
  		if(empty($result)) {
  			?>
  			<script>
  				alert('오류가 발생했습니다.');
  				history.back();
  			</script>
  			<?php
  		} else {
  			setcookie('notice' . $id, TRUE, time() + (60 * 60 * 24), '/');
  		}
  	}
?>
<!DOCTYPE html>
<html>
<?php
  require('./code/nav.php');
 ?>
    <article class="contents">
      <h2 class="text-center"><img id="noticeimg" src="./useimg/notice.png" alt="notice" /></h2>
        <table class="noticetable">
          <tr id="thead">
            <td width="10%">번호</td>
            <td width="40%">제목</td>
            <td width="10%">작성자</td>
            <td width="20%">작성일</td>
            <td width="10%">조회수</td>
          </tr>
        <tr id="tbody">
          <td class="id"><?php echo $row['id']?></td>
          <td class="title"><?php echo $row['title']?></td>
          <td class="author"><?php echo $row['author']?></td>
          <td class="date"><?php echo $row['date']?></td>
          <td class="hit"><?php echo $row['hit']?></td>
				</tr>
        </table><br><br><br>
        <div class="jumbotron">
          <p class="text-left"><?php echo $row['content']?></p>
        </div>
        <div class="text-center">
        <?php
        if(isset($_SESSION['id'])) {
          $sql = "SELECT admin FROM userlist WHERE nickname='".$_SESSION['id']."'";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($reuslt);
          if($row['admin'] == 1) {
            echo '<a id="noticemodify" type="button" href="/noticewrite?id=<?php echo $id?>" class="btn btn-info btn-lg">수정</a>
        	   <a id="noticedelete" type="button" href="/noticedelete?id=<? echo $id ?>" class="btn btn-danger btn-lg">삭제</a>';
          }
        }
        else {
          echo '<a id="notice" type="button" href="/notice" class="btn btn-primary btn-lg">목록</a>';
        }
        ?>
        </div>
      <p id="footer">
        ⓒ Copyright all rights received SensitiveCat <br> E-mail: eoen012@gmail.com
      </p>
    </article>

  </div>
  </body>
</html>
