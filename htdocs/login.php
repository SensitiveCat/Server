<?php
  session_start();
  if(isset($_SESSION['is_login']))
  {
    header('Location: /main');
  }
 ?>
<!DOCTYPE html>
<html>
<?php
  require('./code/nav.php');
 ?>
    <article class="contents">
      <h2 class="text-center"><img id="noticeimg" src="./useimg/login.png" alt="login" /></h2>
      <form class="login" action="logincheck.php" method="post">
        <div class="form-group">
          <label for="user_email">  Email</label>
          <input type="email" class="form-control" id="user_email" name="user_email" placeholder="이메일을 입력해주세요.">
        </div>
        <div class="form-group">
          <label for="user_pwd">  Password</label>
          <input type="password" class="form-control" id="user_pwd" name="user_pwd" placeholder="비밀번호를 입력해주세요.">
        </div>
        <br><br>
        <input type="submit" name="로그인" class="btn btn-primary btn-lg btn-block" value="로그인">
      </form>
      <p id="footer">
        ⓒ Copyright all rights received SensitiveCat <br> E-mail: eoen012@gmail.com
      </p>
    </article>

  </div>
  </body>
</html>
