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
        <a class="btn btn-default btn-lg btn-block" href="/bionano/1food">식품생물공학과</a>
        <a class="btn btn-default btn-lg btn-block" href="/bionano/2nutri">영양학과</a>
        <a class="btn btn-default btn-lg btn-block" href="/bionano/3bio">바이오나노학과</a>
        <a class="btn btn-default btn-lg btn-block" href="/bionano/4life">생명과학과</a>
        <a class="btn btn-default btn-lg btn-block" href="/bionano/5nanoph">나노물리학과</a>
        <a class="btn btn-default btn-lg btn-block" href="/bionano/6nanoch">나노화학과</a>
      </div>
      <br><br><br>
      <p id="footer">
        ⓒ Copyright all rights received SensitiveCat <br> E-mail: eoen012@gmail.com
      </p>
    </article>

  </div>
  </body>
</html>
