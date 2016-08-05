<?php
  $conn = mysqli_connect('localhost','root','134679aa');
  mysqli_select_db($conn, 'opentutorials');
  $sql = "DELETE FROM topic WHERE id=".$_GET['id'];
  $result = mysqli_query($conn, $sql);
  header('Location: /index.php');
 ?>
