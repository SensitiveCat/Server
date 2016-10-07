<?php
require('../code/userinfo.php');
require('../config/config2.php');
require('../lib/db.php');
$conn = db_init($config2["host"], $config2["duser"], $config2["dpw"], $config2["dname"]);

if(isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}

if($_GET['squery']!='') {
  $where = 'WHERE name="'.$_GET['squery'].'"';
  $sql = "SELECT count(*) as cnt FROM nurse '.$where.' ORDER BY id DESC";
  $searchquery = '&amp;squery='.$_GET['squery'];
}
else {
  $sql = 'SELECT count(*) as cnt FROM nurse ORDER BY id DESC';
  $where ='';
}

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$allPost = $row['cnt']; // 1

$onePage = 8;
$allPage = ceil($allPost/$onePage); // 1

if($page < 1 && $page > $allPage) {
?>
		<script>
			alert("존재하지 않는 페이지입니다.");
			history.back();
		</script>
<?php
		exit;
	}
$oneSection = 10;
$currentSection = ceil($page / $oneSection); // 1
$allSection = ceil($allPage / $oneSection); // 1

$firstPage = ($currentSection * $oneSection) - ($oneSection - 1); // 1

if($currentSection == $allSection) {
  $lastPage = $allPage;
}
else {
  $lastPage = $currentSection * $oneSection;
}

$prevPage = (($currentSection -1) * $oneSection);
$nextPage = (($currentSection +1) * $oneSection) - ($oneSection - 1);

$paging = '<div class="text-center">';

if($page != 1) {
  $paging .= '<a class="text-center btn btn-default" href="./5nurse?page=1'.$searchquery.'">처음</a>&nbsp;';
}
if($currentSection != 1) {
  $paging .='<a class="text-center btn btn-primary" href="./5nurse?page='.$prevPage.$searchquery.'">이전</a>&nbsp;';
}

for($i = $firstPage; $i <= $lastPage; $i++) {
  if($i == $page) {
    $paging .='<a class="text-center btn btn-info" href="./5nurse?page='.$i.$searchquery.'">'.$i.'</a>&nbsp;';
  }
  else {
    $paging .='<a class="text-center btn btn-primary" href="./5nurse?page='.$i.$searchquery.'">'.$i.'</a>&nbsp;';
  }
}

if($page != $allPage) {
  $paging .='<a class="text-center btn btn-default" href="./5nurse?page='.$allPage.$searchquery.'">끝</a>&nbsp;';
}
$paging .='</div>';

$currentLimit = ($onePage * $page) - $onePage;
$sqlLimit = ' limit '. $currentLimit .', ' . $onePage;

$sql = 'SELECT * FROM nurse '.$where.' ORDER BY id'.$sqlLimit;
$result = mysqli_query($conn, $sql);
 ?>
<!DOCTYPE html>
<html>
<?php require('../code/nav.php'); ?>
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
 </div><h2 class="text-center"><img class="classimg" src="../useimg/m5.png" alt="간호학과" /></h2>
    <article class="contents"><div class="jumbotron">
        <table class="professortable">
          <tr class="proheader">
      <?php
          while($row = mysqli_fetch_assoc($result))
          {
      ?>
                  <td width="15%"><?php echo $row['level']?></td>
                  <td width="30%" style="font-weight: bold;"><?php echo $row['name']?></td>
                  <td width="25%"><?php echo $row['major']?></td>
                  <td width="30%"><h4><a id="viewesti" href="../medical/5nurseview?page=<?php echo $page ?>&id=<?php echo $row['id']?>" class="btn btn-primary">평가 보기</a>
                    <?php
                      $countsql = 'SELECT count(*) as cnt FROM nurseestimate WHERE proid='.$row['id'];
                      $result2 = mysqli_query($conn, $countsql);
                      $row2 = mysqli_fetch_assoc($result2);
                     ?> ◀ 참여 : <?php echo $row2['cnt']?> 명</h4></td>
                </tr>
        <?php
          }
        ?>
        </table>
      </div>
        <div class="paging">
            <?php
            if(!isset($_GET['squery'])) {
              echo $paging;
            }

            ?>
            <form class="text-center form-inline" action="5nurse" method="get">
              <input type="text" class="form-control" name="squery" size="20">
              <input type="submit" value="검색" class="btn">
            </form>
        </div>
      <p id="footer">
        ⓒ Copyright all rights received SensitiveCat <br> E-mail: eoen012@gmail.com
      </p>
    </article>

  </div>
  </body>
</html>
