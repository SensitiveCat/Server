<?php
require("/config/config2.php");// DB설정
require("lib/db.php"); // DB 실행 내용 저장 파일
$conn = db_init($config2["host"], $config2["duser"], $config2["dpw"], $config2["dname"]);

if(isset($_GET['id'])) {
		$id = $_GET['id'];
	}

	if(isset($id)) {
		$sql = "SELECT id, title, content FROM notice WHERE id =$id";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
	}
 ?>
<!DOCTYPE html>
<html>
  <?php require('./code/nav.php'); ?>
    <article class="contents">
      <h2 class="text-center">공지사항 작성</h2>
      <form class="noticewrite" action="noticeupdate.php" method="post">
        <?php
				if(isset($id)) {
					echo '<input type="hidden" name="id" value="' . $id . '">';
				}
				?>
        <div class="form-group">
          <label for="text">  제목</label><br>
          <input type="text" class="form-control" id="title" name="title" value="<?php echo isset($row['title'])?$row['title']:null?>" placeholder="제목을 입력해주세요.">
        </div>
        <div class="form-group">
          <label for="textarea">  내용</label><br>
          <textarea class="form-control" id="content" name="content" rows="8" cols="40" placeholder="내용을 입력해주세요."><?php echo isset($row['content'])?$row['content']:null?></textarea>
        </div><br><br>
        <input type="submit" id="wrtie" name="write" class="btn btn-primary btn-lg btn-block" value="<?php echo isset($id)?'수정':'작성'?>">
      </form>
      <p id="footer">
        ⓒ Copyright all rights received SensitiveCat <br> E-mail: eoen012@gmail.com
      </p>
    </article>

  </div>
  </body>
</html>
