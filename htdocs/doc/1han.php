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
  $sql = "SELECT count(*) as cnt FROM 1han '.$where.' ORDER BY id DESC";
  $searchquery = '&amp;squery='.$_GET['squery'];
}
else {
  $sql = 'SELECT count(*) as cnt FROM 1han ORDER BY id DESC';
  $where ='';
}

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$allPost = $row['cnt'];

$onePage = 8;
$allPage = ceil($allPost/$onePage);

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
$currentSection = ceil($page / $oneSection);
$allSection = ceil($allPage / $oneSection);

$firstPage = ($currentSection * $oneSection) - ($oneSection - 1);

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
  $paging .= '<a class="text-center btn btn-default" href="./1han?page=1">처음</a>&nbsp;';
}
if($currentSection != 1) {
  $paging .='<a class="text-center btn btn-primary" href="./1han?page='.$prevPage.'">이전</a>&nbsp;';
}

for($i = $firstPage; $i <= $lastPage; $i++) {
  if($i == $page) {
    $paging .='<a class="text-center btn btn-info" href="./1han?page='.$i.'">'.$i.'</a>&nbsp;';
  }
  else {
    $paging .='<a class="text-center btn btn-primary" href="./1han?page='.$i.'">'.$i.'</a>&nbsp;';
  }
}

if($page != $allPage) {
  $paging .='<a class="text-center btn btn-default" href="./1han?page='.$allPage.'">끝</a>&nbsp;';
}
$paging .='</div>';

$currentLimit = ($onePage * $page) - $onePage;
$sqlLimit = ' limit '. $currentLimit .', ' . $onePage;

$sql = 'SELECT * FROM 1han '.$where.' ORDER BY id'.$sqlLimit;
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
 </div><h2 class="text-center"><img class="classimg" src="../useimg/c34.png" alt="notice" /></h2>
    <article class="contents">
      <?php
      //  $sql = "S1hanT * FROM professor";
      //  $result = mysqli_query($conn, $sql);
          while($row = mysqli_fetch_assoc($result))
          {
      ?>
          <div class="jumbotron">
              <table class="professortable">
                <tr class="proheader">
                  <td class="tl" rowspan="2" width="25%"><img id="thumbnail" src="../useimg/thumbnail.png" alt="" width="100px" height="100px"/></td>
                  <td width="15%">직책</td>
                  <td width="20%">이름</td>
                  <td width="25%">전공</td>
                  <td width="15%" class="tr br" rowspan="2" width="15%"><a id="viewesti" href="../doc/1hanview?page=<?php echo $page ?>&id=<?php echo $row['id']?>" class="btn btn-primary">평가 보기</a>
                    <?php
                      $countsql = 'SELECT count(*) as cnt FROM 1hanestimate WHERE proid='.$row['id'];
                      $result2 = mysqli_query($conn, $countsql);
                      $row2 = mysqli_fetch_assoc($result2);


                     ?><h4>평가참여 <br><br><?php echo $row2['cnt']?> 명</h4></td>
                </tr>
                <tr>
                  <td ><?php echo $row['level']?></td>
                  <td style="font-weight: bold;"><?php echo $row['name']?></td>
                  <td ><?php echo $row['major']?></td>

                </tr>
              </table>
            </div>
        <?php
          }
        ?>
        <div class="paging">
          <?php
          if(!isset($_GET['squery'])) {
            echo $paging;
          }
        ?>
        <form class="text-center form-inline" action="1han" method="get">
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
