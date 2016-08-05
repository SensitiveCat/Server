<!DOCTYPE html>
<html>
<?php
  require('./code/nav.php');
 ?>
    <article class="">
        <h2 class="text-center"><img id="noticeimg" src="./useimg/signout.png" alt="signout" /></h2>
    <form class="join" action="signoutprocess.php" method="post">
      <div class="form-group">
        <label for="email">  Email</label>
        <input required="required" type="email" class="form-control" id="email" name="email" value="" placeholder="이메일을 입력해주세요.">
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
      <input type="submit" name="회원탈퇴하기" class="text-center btn btn-danger btn-lg btn-block" value="회원탈퇴하기">
    </form>
      <p id="footer">
        ⓒ Copyright all rights received SensitiveCat <br> E-mail: eoen012@gmail.com
      </p>
    </article>

  </div>
  </body>
</html>
