<!DOCTYPE html>
<html>
<?php
  require('./code/nav.php');
 ?>
    <article class="">
        <h2 class="text-center"><img id="noticeimg" src="./useimg/mod.png" alt="mod" /></h2>
    <form class="join" action="infoupdate.php" method="post">
      <div class="form-group">
        <label for="nick"> New Nickname</label>
        <input required="required" type="text" class="form-control" id="nick" name="nick" value="" placeholder="변경하실 닉네임을 입력해주세요.">
      </div>
      <div class="form-group">
        <label for="pwd"> Old Password</label>
        <input required="required" type="password" class="form-control" id="pwd1" name="pwd1" value="" placeholder="기존 비밀번호를 입력해주세요.">
      </div>
      <div class="form-group">
        <label for="pwd">  New Password</label>
        <input required="required" type="password" class="form-control" id="pwd2" name="pwd2" value="" placeholder="변경하실 비밀번호를 입력해주세요.">
      </div>
      <br><br>
      <input type="submit" name="정보수정" class="text-center btn btn-primary btn-lg btn-block" value="정보수정">
    </form>
      <p id="footer">
        ⓒ Copyright all rights received SensitiveCat <br> E-mail: eoen012@gmail.com
      </p>
    </article>

  </div>
  </body>
</html>
