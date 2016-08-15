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
        <a class="btn btn-default btn-lg btn-block" href="/socsci/1admi">행정학과</a>
        <a class="btn btn-default btn-lg btn-block" href="/socsci/2media">언론영상광고학과</a>
        <a class="btn btn-default btn-lg btn-block" href="/socsci/3sight">관광경영학과</a>
        <a class="btn btn-default btn-lg btn-block" href="/socsci/4global">글로벌경제학과</a>
        <a class="btn btn-default btn-lg btn-block" href="/socsci/5hp">헬스케어경영학과</a>
        <a class="btn btn-default btn-lg btn-block" href="/socsci/6applied">응용통계학과</a>
        <a class="btn btn-default btn-lg btn-block" href="/socsci/7welfare">사회복지학과</a>
        <a class="btn btn-default btn-lg btn-block" href="/socsci/8kidsedu">유아교육학과</a>
        <a class="btn btn-default btn-lg btn-block" href="/socsci/9officer">경찰연계학전공</a>
      </div>
      <br><br><br>
      <p id="footer">
        ⓒ Copyright all rights received SensitiveCat <br> E-mail: eoen012@gmail.com
      </p>
    </article>

  </div>
  </body>
</html>
