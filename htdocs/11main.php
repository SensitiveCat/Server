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
      <h2 class="text-center"><img class="classimg" src="../useimg/medicalmain.png" alt="메디컬캠퍼스" /></h2>
      <div class="text-center jumbotron">
        <table class="medicaltable">
          <tr>
            <td width="60%" class="tl tr">
              <h2>의학대학</h2><br>
              <a class="btn btn-default btn-lg btn-block" href="/medical/1basic">기초의학</a>
              <a class="btn btn-default btn-lg btn-block" href="/medical/2social">인문사회의학</a>
              <a class="btn btn-default btn-lg btn-block" href="/medical/3clinic">임상의학</a>
              <br>
            </td>
          </tr>
          <tr>
            <td>
              <h2>약학대학</h2><br>
              <a class="btn btn-default btn-lg btn-block" href="/medical/4medicine">약학과</a>
              <br>
            </td>
          </tr>
          <tr>
            <td>
              <h2>간호대학</h2><br>
              <a class="btn btn-default btn-lg btn-block" href="/medical/5nurse">간호학과</a><br>
            </td>
          </tr>
          <tr>
            <td class="bl br">
              <h2>보건과학대학</h2><br>
              <a class="btn btn-default btn-lg btn-block" href="/medical/6dent">치위생학과</a>
              <a class="btn btn-default btn-lg btn-block" href="/medical/7emer">응급구조학과</a>
              <a class="btn btn-default btn-lg btn-block" href="/medical/8radi">방사선학과</a>
              <a class="btn btn-default btn-lg btn-block" href="/medical/9phtr">물리치료학과</a>
              <a class="btn btn-default btn-lg btn-block" href="/medical/10biom">의용생체공학과</a>
              <a class="btn btn-default btn-lg btn-block" href="/medical/11phre">운동재활복지학과</a>
              <br>
            </td>
          </tr>
        </table>


      </div>
      <br><br><br>
      <p id="footer">
        ⓒ Copyright all rights received SensitiveCat <br> E-mail: eoen012@gmail.com
      </p>
    </article>

  </div>
  </body>
</html>
