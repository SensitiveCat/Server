<?php
require('../code/userinfo.php');
$proid = $_GET['id'];
$page = $_GET['page'];
 ?>
<!DOCTYPE html>
<html>
    <?php
      require('../code/nav.php');
     ?>
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
  <body>
    <div class="jumbotron">
      <h1 class="text-center">댓글 수정하기</h1>
      <?php
        if(!isset($_SESSION['is_login'])) {
          echo $_SESSION['msg'];
        }
        else {
          ?>
        <form class="" action="8athleticcommentupdateprocess?page=<?php echo $page ?>&id=<?php echo $proid?>" method="post">
          <input type="hidden" name="proid" value="<?php echo $proid ?>">
          <input type="hidden" name="page" value="<?php echo $page ?>">
        <h1 class="text-left">전체 수강 추천도</h1>
      <select name="star" class="form-control text-center" style="height: 50px;">
       <option class="text-center" value = "">선택</option>
       <option class="text-center" value = "0">☆☆☆☆☆</option>
       <option class="text-center" value = "1">★☆☆☆☆</option>
       <option class="text-center" value = "2">★★☆☆☆</option>
       <option class="text-center" value = "3">★★★☆☆</option>
       <option class="text-center" value = "4">★★★★☆</option>
       <option class="text-center" value = "5">★★★★★</option>
      </select>
        <h1 class="text-left">코멘트 수정</h1>
      <textarea name="comment" class="form-control text-left" rows="4" cols="40"></textarea>
      <input type="submit" name="name" value="수정" class="btn btn-primary btn-lg btn-block text-center">
      </form>
      <a class="btn btn-default btn-lg btn-block text-center" href="./8athleticview?page=<?php echo $page?>&id=<?php echo $proid ?>">돌아가기</a>

    <?php
    }
    ?>
    </div>
  </body>
</html>
