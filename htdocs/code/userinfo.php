<?php
session_start();
if(!isset($_SESSION['is_login'])){
    $_SESSION['msg'] = '<p class="welcome"> 로그인 하셔서 평가를 남겨보세요! </p><div class="userinfo">
    <a id="join" type="button" href="/join" class="text-center btn btn-primary btn-lg btn-block">회원가입</a>
    <a id="login" type="button" href="/login" class="text-center btn btn-success btn-lg btn-block">로그인</a></div>';
}else{
    if(isset($_SESSION['id'])){
        $welcome = '<h3 class="welcome"> 환영합니다. '.$_SESSION['id'].'님! </h3>';
    }
    $logout = '
    <form action="../modinfo.php">
    <h3><input type="submit" id="mod" class="btn btn-info btn-lg btn-block" value="정보수정" /></h3>
    </form>
    <form action="signout.php">
    <h3><input type="submit" id="mod" class="btn btn-warning btn-lg btn-block" value="회원탈퇴" /></h3>
    </form>
    <form action="logout.php">
    <h3><input type="submit" id="logout" class="btn btn-danger btn-lg btn-block" value="로그아웃"/></h3>
    </form>';
}
 ?>
