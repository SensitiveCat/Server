<!DOCTYPE html>
<html>
<?php
  require('./code/nav.php');
 ?>
    <article class="">
        <h2 class="text-center"><img id="noticeimg" src="./useimg/signup.png" alt="signup" /></h2>
    <form class="join" action="joinaccess.php" method="post">
      <div class="form-group">
        <label for="email">  Email</label>
        <input required="required" type="email" class="form-control" id="email" name="email" value="" placeholder="이메일을 입력해주세요.">
      </div>
      <div class="form-group">
        <label for="text">  NickName</label>
        <input required="required" type="text" class="form-control" id="nickname" name="nickname" value="" placeholder="별명을 입력해주세요.">
      </div>
      <div class="form-group">
        <label for="pwd">  Password</label>
        <input required="required" type="password" class="form-control" id="pwd" name="pwd1" value="" placeholder="비밀번호를 입력해주세요.">
      </div>
      <div class="form-group">
        <label for="pwd">  Password Confirm</label>
        <input required="required" type="password" class="form-control" id="pwd" name="pwd2" value="" placeholder="입력하신 비밀번호를 다시 입력해주세요.">
      </div>
      <br><br>
      <input type="submit" name="가입완료" class="text-center btn btn-primary btn-lg btn-block" value="가입완료">
    </form>
      <p id="footer">
        ⓒ Copyright all rights received SensitiveCat <br> E-mail: eoen012@gmail.com
      </p>
    </article>

  </div>
  </body>
</html>
