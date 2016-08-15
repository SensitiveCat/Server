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
        <a class="btn btn-default btn-lg btn-block" href="/law/1law">법학과</a>
        <a class="btn btn-default btn-lg btn-block" href="/law/2police">경찰안보학과</a>
      </div>
      <br><br><br>
      <p id="footer">
        ⓒ Copyright all rights received SensitiveCat <br> E-mail: eoen012@gmail.com
      </p>
    </article>

  </div>
  </body>
</html>
