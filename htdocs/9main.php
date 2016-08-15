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
        <a class="btn btn-default btn-lg btn-block" href="/arts/1paint">회화조소전공</a>
        <a class="btn btn-default btn-lg btn-block" href="/arts/2visual">시각디자인전공</a>
        <a class="btn btn-default btn-lg btn-block" href="/arts/3indust">산업디자인전공</a>
        <a class="btn btn-default btn-lg btn-block" href="/arts/4fashion">패션디자인전공</a>
        <a class="btn btn-default btn-lg btn-block" href="/arts/5vocal">성악전공</a>
        <a class="btn btn-default btn-lg btn-block" href="/arts/6inst">기악전공</a>
        <a class="btn btn-default btn-lg btn-block" href="/arts/7compo">작곡전공</a>
        <a class="btn btn-default btn-lg btn-block" href="/arts/8athletic">체육전공</a>
        <a class="btn btn-default btn-lg btn-block" href="/arts/9taekwon">태권도전공</a>
        <a class="btn btn-default btn-lg btn-block" href="/arts/10act">연기예술학과</a>
      </div>
      <br><br><br>
      <p id="footer">
        ⓒ Copyright all rights received SensitiveCat <br> E-mail: eoen012@gmail.com
      </p>
    </article>

  </div>
  </body>
</html>
