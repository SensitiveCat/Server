<?php
require("/config/config2.php");// DB설정
require("lib/db.php"); // DB 실행 내용 저장 파일
$conn = db_init($config2["host"], $config2["duser"], $config2["dpw"], $config2["dname"]);
require('./code/userinfo.php');
 ?>
<!DOCTYPE html>
<html>
<?php
  require('./code/nav.php');
 ?>
    <article class="contents">
      <div class="maintitle text-center">
      <p>
        <?php
           if(!isset($_SESSION['is_login'])){
               echo $_SESSION['msg'];
           }else {
             echo $welcome;
             echo $logout;
           }
         ?>
      </p>
    </div>
      <h2 class="text-center"><img id="noticeimg" src="./useimg/notice.png" alt="notice" /></h2>
      <div class="jumbotron">
        <table class="noticetable">
          <tr id="thead">
            <td width="10%">번호</td>
            <td width="40%">제목</td>
            <td width="10%">작성자</td>
            <td width="20%">작성일</td>
            <td width="10%">조회수</td>
          </tr>
          <?php
            $sql = 'SELECT * FROM notice ORDER BY id desc';
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result))
            {
              $datetime = explode(' ', $row['date']);
							$date = $datetime[0];
							$time = $datetime[1];
							if($date == Date('Y-m-d'))
								$row['date'] = $time;
							else
								$row['date'] = $date;

           ?>
           <tr id="tbody">
					<td class="id"><?php echo $row['id']?></td>
					<td class="title"><a id="noticelink" href="/noticeview?id=<?php echo $row['id']?>"><?php echo $row['title']?></a></td>
					<td class="author"><?php echo $row['author']?></td>
					<td class="date"><?php echo $row['date']?></td>
					<td class="hit"><?php echo $row['hit']?></td>
				  </tr>
        <?php
						}
					?>
        </table></div><br><br>
        <?php
        if(isset($_SESSION['id'])) {
          $sql = "SELECT admin FROM userlist WHERE nickname='".$_SESSION['id']."'";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          if($row['admin'] == 1) {
            echo '<a id="login" type="button" href="/noticewrite" class="text-center btn btn-default btn-lg btn-block">글쓰기</a>';
          }
        }
        ?>

      <p id="footer">
        ⓒ Copyright all rights received SensitiveCat <br> E-mail: eoen012@gmail.com
      </p>
    </article>

  </div>
  </body>
</html>
