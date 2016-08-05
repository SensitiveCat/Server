<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
      <h1>JavaScript</h1>
      <ul>
      <script>
      list = new Array("1", "2", "3", "4");
      i = 0;
      while(i < list.length)
      {
        document.write("<li>"+ list[i] + "</li>");
        i += 1;
      }
      </script>
    </ul>
    <h1>Php</h1>
    <ul>
    <?php
      $list = array("1", "2", "3", "4");
      $i = 0;
      while($i < count($list))
      {
        echo "<li>".$list[$i]."</li>";
        $i += 1;
      }
     ?>
   </ul>
  </body>
</html>
