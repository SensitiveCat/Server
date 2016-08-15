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
        <a class="btn btn-default btn-lg btn-block" href="/IT/1soft">소프트웨어설계경영학과</a>
        <a class="btn btn-default btn-lg btn-block" href="/IT/2cpsc">컴퓨터공학과</a>
        <a class="btn btn-default btn-lg btn-block" href="/IT/3elec">전자공학과</a>
        <a class="btn btn-default btn-lg btn-block" href="/IT/4energy">에너지IT학과</a>
        <a class="btn btn-default btn-lg btn-block" href="/IT/5mathinfo">수학금융정보학과</a>
      </div>
      <br><br><br>
      <p id="footer">
        ⓒ Copyright all rights received SensitiveCat <br> E-mail: eoen012@gmail.com
      </p>
    </article>

  </div>
  </body>
</html>
