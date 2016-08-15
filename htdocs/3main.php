<?php
require('./code/userinfo.php');
 ?>
<!DOCTYPE html>
<html>
  <?php
    require('./code/nav.php');
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
    <article class="contents">
      <div class="text-center jumbotron">
        <a class="btn btn-default btn-lg btn-block" href="/gongdae/1city">도시계획학과</a>
        <a class="btn btn-default btn-lg btn-block" href="/gongdae/2lasc">조경학과</a>
        <a class="btn btn-default btn-lg btn-block" href="/gongdae/3inbuild">실내건축학과</a>
        <a class="btn btn-default btn-lg btn-block" href="/gongdae/4build">건축학과</a>
        <a class="btn btn-default btn-lg btn-block" href="/gongdae/5aren">건축공학과</a>
        <a class="btn btn-default btn-lg btn-block" href="/gongdae/6elen">전기공학과</a>
        <a class="btn btn-default btn-lg btn-block" href="/gongdae/7emma">소방방재공학과</a>
        <a class="btn btn-default btn-lg btn-block" href="/gongdae/8chemeng">화공생명공학과</a>
        <a class="btn btn-default btn-lg btn-block" href="/gongdae/9maen">기계공학과</a>
        <a class="btn btn-default btn-lg btn-block" href="/gongdae/10cien">토목환경공학과</a>
        <a class="btn btn-default btn-lg btn-block" href="/gongdae/11inma">산업경영공학과</a>
      </div>
      <br><br><br>
      <p id="footer">
        ⓒ Copyright all rights received SensitiveCat <br> E-mail: eoen012@gmail.com
      </p>
    </article>

  </div>
  </body>
</html>
