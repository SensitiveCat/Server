<?php
require('../code/userinfo.php');
if(!isset($id)) {
require('../config/config2.php');
require('../lib/db.php');
$conn = db_init($config2["host"], $config2["duser"], $config2["dpw"], $config2["dname"]);
$id = $_GET['id'];
$sql = "SELECT * FROM la_sc WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
}
else {

}

 ?>
<!DOCTYPE html>
<html>
<?php
  require('../code/nav.php');
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
      <div class="jumbotron">
          <table class="professortable">
            <tr class="proheader">
              <td class="tl bl" rowspan="2" width="15%"><img id="thumbnail" src="../useimg/thumbnail.png" alt="" width="100px" height="100px"/></td>
              <td width="20%">직책</td>
              <td width="20%">이름</td>
              <td class="tr" width="30%">전공</td>
            </tr>
            <tr>
              <td width="20%"><?php echo $row['level']?></td>
              <td width="20%"><?php echo $row['name']?></td>
              <td class="br" width="30%"><?php echo $row['major']?></td>
            </tr>
          </table>
          <br>
          <?php
          $id = $_GET['id'];
          require('../config/config2.php');
          $conn = db_init($config2["host"], $config2["duser"], $config2["dpw"], $config2["dname"]);
          $sql = "SELECT ROUND(AVG(level), 2) as avglevel, ROUND(AVG(mood), 2) as avgmood, ROUND(AVG(qual), 2) as avgqual, ROUND(AVG(quan), 2) as avgquan, ROUND(AVG(reportlv), 2) as avgreportlv, ROUND(AVG(testlv), 2) as avgtestlv, ROUND(AVG(scorelv), 2) as avgscorelv, ROUND(AVG(book), 2) as avgbook, ROUND(AVG(insung), 2) as avginsung FROM la_scestimate WHERE proid = $id";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          $avglevel = $row['avglevel'];
          $avgmood = $row['avgmood'];
          $avgqual = $row['avgqual'];
          $avgquan = $row['avgquan'];
          $avgreportlv = $row['avgreportlv'];
          $avgtestlv = $row['avgtestlv'];
          $avgscorelv = $row['avgscorelv'];
          $avgbook = $row['avgbook'];
          $avginsung = $row['avginsung'];
          ?>
          <div class="jumbotron">
          <table class="professortable2">
          <tr>
            <td class="tl" width="20%" style="padding-top: 20px;">강의 수준</td>
            <td class="tr" width="50%" style="padding-top: 20px;"><div id="level" style="width:80%;background-color:#1996E4;border-radius:10px;display: inline-block;"></td>
          </tr>
          <tr>
            <td width="20%">강의 분위기</td>
            <td width="50%"><div id="mood" style="width:80%;background-color:#1996E4;border-radius:10px;display: inline-block;"></td>
          </tr>
          <tr>
            <td width="20%">강의 질</td>
            <td width="50%"><div id="qual" style="width:80%;background-color:#1996E4;border-radius:10px;display: inline-block;"></td>
          </tr>
          <tr>
            <td width="20%">과제량</td>
            <td width="50%"><div id="quan" style="width:80%;background-color:#1996E4;border-radius:10px;display: inline-block;"></td>
          </tr>
          <tr>
            <td width="20%">과제 난이도</td>
            <td width="50%"><div id="reportlv" style="width:80%;background-color:#1996E4;border-radius:10px;display: inline-block;"></td>
          </tr>
          <tr>
            <td width="20%">시험 난이도</td>
            <td width="50%"><div id="testlv" style="width:80%;background-color:#1996E4;border-radius:10px;display: inline-block;"></td>
          </tr>
          <tr>
            <td width="20%">학점 부여도</td>
            <td width="50%"><div id="scorelv" style="width:80%;background-color:#1996E4;border-radius:10px;display: inline-block;"></td>
          </tr>
          <tr>
            <td width="20%">교재 구매 추천도</td>
            <td width="50%"><div id="book" style="width:80%;background-color:#1996E4;border-radius:10px;display: inline-block;"></td>
          </tr>
          <tr>
            <td width="20%" class="bl" style="padding-bottom: 20px;">인성</td>
            <td width="50%" class="br" style="padding-bottom: 20px;"><div id="insung" style="width:80%;background-color:#1996E4;border-radius:10px;display: inline-block;"></td>
          </tr>
          <?php
          $total = 5;
          $levelpercent = (( $avglevel / $total ) * 100)."%";
          if($avglevel == null) {
            echo '<script language="javascript">
            document.getElementById("level").innerHTML="<div style=\"width:80%;background-color:#1996E4;border-radius:10px;\"> 평가 없음 </div>";
            </script>';
          } else {
              echo '<script language="javascript">
              document.getElementById("level").innerHTML="<div style=\"width:'.$levelpercent.';background-color:#FFC71A;border-radius:10px;\">'.$avglevel.'점</div>";
              </script>';
            }

          $moodpercent = (( $avgmood / $total ) * 100)."%";
          if($avgmood == null) {
            echo '<script language="javascript">
            document.getElementById("mood").innerHTML="<div style=\"width:80%;background-color:#1996E4;border-radius:10px;\"> 평가 없음 </div>";
            </script>';
          } else {
              echo '<script language="javascript">
              document.getElementById("mood").innerHTML="<div style=\"width:'.$moodpercent.';background-color:#FFC71A;border-radius:10px;\">'.$avgmood.'점</div>";
              </script>';
            }

          $qualpercent = (( $avgqual / $total ) * 100)."%";
          if($avgqual == null) {
            echo '<script language="javascript">
            document.getElementById("qual").innerHTML="<div style=\"width:80%;background-color:#1996E4;border-radius:10px;\"> 평가 없음 </div>";
            </script>';
          } else {
              echo '<script language="javascript">
              document.getElementById("qual").innerHTML="<div style=\"width:'.$qualpercent.';background-color:#FFC71A;border-radius:10px;\">'.$avgqual.'점</div>";
              </script>';
            }

          $quanpercent = (( $avgquan / $total ) * 100)."%";
          if($avgquan == null) {
            echo '<script language="javascript">
            document.getElementById("quan").innerHTML="<div style=\"width:80%;background-color:#1996E4;border-radius:10px;\"> 평가 없음 </div>";
            </script>';
          } else {
              echo '<script language="javascript">
              document.getElementById("quan").innerHTML="<div style=\"width:'.$quanpercent.';background-color:#FFC71A;border-radius:10px;\">'.$avgquan.'점</div>";
              </script>';
            }

            $reportlvpercent = (( $avgreportlv / $total ) * 100)."%";
            if($avgreportlv == null) {
              echo '<script language="javascript">
              document.getElementById("reportlv").innerHTML="<div style=\"width:80%;background-color:#1996E4;border-radius:10px;\"> 평가 없음 </div>";
              </script>';
            } else {
            echo '<script language="javascript">
            document.getElementById("reportlv").innerHTML="<div style=\"width:'.$reportlvpercent.';background-color:#FFC71A;border-radius:10px;\">'.$avgreportlv.'점</div>";
            </script>';
          }

            $testlvpercent = (( $avgtestlv / $total ) * 100)."%";
            if ($avgtestlv == null) {
              echo '<script language="javascript">
              document.getElementById("testlv").innerHTML="<div style=\"width:80%;background-color:#1996E4;border-radius:10px;\"> 평가 없음 </div>";
              </script>';
            } else {
              echo '<script language="javascript">
              document.getElementById("testlv").innerHTML="<div style=\"width:'.$testlvpercent.';background-color:#FFC71A;border-radius:10px;\">'.$avgtestlv.'점</div>";
              </script>';
            }

            $scorelvpercent = (( $avgscorelv / $total ) * 100)."%";
            if($avgscorelv == null) {
              echo '<script language="javascript">
              document.getElementById("scorelv").innerHTML="<div style=\"width:80%;background-color:#1996E4;border-radius:10px;\"> 평가 없음 </div>";
              </script>';
            } else {
            echo '<script language="javascript">
            document.getElementById("scorelv").innerHTML="<div style=\"width:'.$scorelvpercent.';background-color:#FFC71A;border-radius:10px;\">'.$avgscorelv.'점</div>";
            </script>';
          }

            $bookpercent = (( $avgbook / $total ) * 100)."%";
            if($avgbook == null) {
              echo '<script language="javascript">
              document.getElementById("book").innerHTML="<div style=\"width:80%;background-color:#1996E4;border-radius:10px;\"> 평가 없음 </div>";
              </script>';
            } else {
            echo '<script language="javascript">
            document.getElementById("book").innerHTML="<div style=\"width:'.$bookpercent.';background-color:#FFC71A;border-radius:10px;\">'.$avgbook.'점</div>";
            </script>';
          }

            $insungpercent = (( $avginsung / $total ) * 100)."%";
            if($avginsung == null) {
              echo '<script language="javascript">
              document.getElementById("insung").innerHTML="<div style=\"width:80%;background-color:#1996E4;border-radius:10px;\"> 평가 없음 </div>";
              </script>';
            } else {
            echo '<script language="javascript">
            document.getElementById("insung").innerHTML="<div style=\"width:'.$insungpercent.';background-color:#FFC71A;border-radius:10px;\">'.$avginsung.'점</div>";
            </script>';
          }

           ?>
          </table>
          </div>

          <div class="text-center">
          <?php
          $id = $_GET['id'];
          require('../config/config2.php');
          $conn = db_init($config2["host"], $config2["duser"], $config2["dpw"], $config2["dname"]);
          $sql = "SELECT ROUND(AVG(score), 2) FROM la_sccomment WHERE proid=$id";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          $avgscore = $row['ROUND(AVG(score), 2)'];
          echo '<div id="progress" style="width:50%;background-color:#1996E4;border-radius:10px;display: inline-block;"></div>';
          if($avgscore == null) {

          } else {
          $total = 5;
          $percent = (( $avgscore / $total ) * 100)."%";
              echo '<script language="javascript">
              document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-color:#FFC71A;border-radius:10px;\">'.$percent.'</div>";
              </script>';
            }
           ?>

          </div>
          <h2 id="estitext" class="text-center">
            <?php
            if($avgscore == null) {
              echo "아직 평가되지 않았습니다.";
            }
            else {
              echo '수강 추천 평균 : ';
              echo $avgscore;
              echo ' 점';
            }
            ?>
          </h2>
        </div>
        <div class="jumbotron">
          <h2 class="text-center">BEST COMMENT</h2>
          <?php
          $sql = 'SELECT * FROM la_sccomment ORDER BY liked DESC, created DESC LIMIT 3';
          $result = mysqli_query($conn, $sql);
          if($result->num_rows >= 1) {
            while($row = mysqli_fetch_assoc($result)) {
              $datetime = explode(' ', $row['created']);
              $date = $datetime[0];
              $time = $datetime[1];
              if($date == Date('Y-m-d'))
                $row['created'] = $time;
              else
                $row['created'] = $date;


            ?>
            <table class="commenttable">
            <tr>
              <td rowspan="2" class="nick" width="20%"><?php echo $row['nick']?><br><?php
                if($row['score']==0) {
                  echo '☆☆☆☆☆';
                }
                else if($row['score']==1) {
                  echo '★☆☆☆☆';
                }
                else if($row['score']==2) {
                  echo '★★☆☆☆';
                }
                else if($row['score']==3) {
                  echo '★★★☆☆';
                }
                else if($row['score']==4) {
                  echo '★★★★☆';
                }
                else if($row['score']==5) {
                  echo '★★★★★';
                }
                ?></td>
              <td rowspan="2" class="comment" width="60%"><?php echo $row['comment']?></td>
              <td colspan="2" class="created" width="20%"><?php echo $row['created']?><br></td></tr>
              <tr><td class="like">
                <?php
                if(!isset($_SESSION['is_login'])){
                  ?><input type="submit" name="name" value="Like : <?php echo $row['liked']?>" class="likebtn btn-primary" style="border-radius: 30px;border:0px solid black;"><?php
                }
                else {
                    if(isset($_SESSION['id'])){?>
                          <form class="" action="2lasclikeProcess.php" method="post">
                          <input type="hidden" name="nick" value="<?php echo $_SESSION['id']?>">
                          <input type="hidden" name="liked" value="<?php echo $row['nick']?>">
                          <input type="hidden" name="id" value="<?php echo $row['id']?>">
                          <input type="submit" name="name" value="Like : <?php echo $row['liked']?>" class="likebtn btn-primary" style="border-radius: 30px;border:0px solid black;">
                        </form><td class="comdel"><?php
                        if($_SESSION['id'] == $row['nick']) {?>
                          <form class="" action="2lasccommentdelete.php" method="post">
                          <input type="hidden" name="nick" value="<?php echo $_SESSION['id']?>">
                          <input type="hidden" name="liked" value="<?php echo $row['nick']?>">
                          <input type="hidden" name="id" value="<?php echo $row['id']?>">
                          <input type="submit" name="name" value="댓글삭제" class="delbtn btn-danger" style="font-size:0.9em;border-radius: 30px;border:0px solid black;">
                          </form></td><?php
                        }
                    }
                  }
                  //echo $row['liked'];
                ?>
              </td>
            </tr></table><br>
            <?php
          }
        }
        else  {
          echo '<h1 class="jumbotron text-center">베스트 평가가 없습니다!</h1>';
        }
        ?>
        </div>
        <div class="jumbotron">
          <h2 class="text-center">COMMENTS</h2>
            <?php
            $id = $_GET['id'];
            require('../config/config2.php');
            $conn = db_init($config2["host"], $config2["duser"], $config2["dpw"], $config2["dname"]);

            if(isset($_GET['page'])) {
              $page = $_GET['page'];
            } else {
              $page = 1;
            }

            $sql = "SELECT count(*) as cnt FROM la_sccomment WHERE proid=$id ORDER BY created DESC";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            $allPost = $row['cnt'];
            if($allPost > 8) {
            $onePage = 8;
            $allPage = ceil($allPost/$onePage);

            if($page < 1 && $page > $allPage) {
            ?>
                <script>
                  alert("존재하지 않는 페이지입니다.");
                  history.back();
                </script>
            <?php
                exit;
              }
            $oneSection = 10;
            $currentSection = ceil($page / $oneSection);
            $allSection = ceil($allPage / $oneSection);

            $firstPage = ($currentSection * $oneSection) - ($oneSection - 1);

            if($currentSection == $allSection) {
              $lastPage = $allPage;
            }
            else {
              $lastPage = $currentSection * $oneSection;
            }

            $prevPage = (($currentSection -1) * $oneSection);
            $nextPage = (($currentSection +1) * $oneSection) - ($oneSection - 1);

            $paging = '<div><table class="pagetable"><tr>';

            if($page != 1) {
              $paging .= '<td class="page page_start"><a class="text-center btn btn-default" href="./2lascview?id='.$id.'&page=1">처음</a></td>';
            }
            if($currentSection != 1) {
              $paging .='<td class="page page_prev"><a class="text-center btn btn-primary" href="./2lascview?id='.$id.'&page='.$prevPage.'">이전</a></td>';
            }

            for($i = $firstPage; $i <= $lastPage; $i++) {
              if($i == $page) {
                $paging .='<td class="page current"><a class="text-center btn btn-info" href="./2lascview?id='.$id.'page='.$i.'">'.$i.'</a></td>';
              }
              else {
                $paging .='<td class="page"><a class="text-center btn btn-primary" href="./2lascview?id='.$id.'&page='.$i.'">'.$i.'</a></td>';
              }
            }

            if($page != $allPage) {
              $paging .='<td class="page page_end"><a class="text-center btn btn-default" href="./2lascview?id='.$id.'&page='.$allPage.'">끝</a></td>';
            }
            $paging .='</tr></table></div>';

            $currentLimit = ($onePage * $page) - $onePage;
            $sqlLimit = ' limit '. $currentLimit .', ' . $onePage;

            $sql = "SELECT * FROM la_sccomment WHERE proid=$id ORDER BY created $sqlLimit";
            $result = mysqli_query($conn, $sql);
          }
          else {
            $sql = "SELECT * FROM la_sccomment WHERE proid=$id ORDER BY created";
            $result = mysqli_query($conn, $sql);
          }

            if($result->num_rows >= 1) {
              while($row = mysqli_fetch_assoc($result)) {
                $datetime = explode(' ', $row['created']);
                $date = $datetime[0];
                $time = $datetime[1];
                if($date == Date('Y-m-d'))
                  $row['created'] = $time;
                else
                  $row['created'] = $date;
              ?>
              <table class="commenttable">
              <tr>
                <td rowspan="2" class="nick" width="20%"><?php echo $row['nick']?><br><?php
                  if($row['score']==0) {
                    echo '☆☆☆☆☆';
                  }
                  else if($row['score']==1) {
                    echo '★☆☆☆☆';
                  }
                  else if($row['score']==2) {
                    echo '★★☆☆☆';
                  }
                  else if($row['score']==3) {
                    echo '★★★☆☆';
                  }
                  else if($row['score']==4) {
                    echo '★★★★☆';
                  }
                  else if($row['score']==5) {
                    echo '★★★★★';
                  }
                  ?></td>
                <td rowspan="2" class="comment" width="60%"><?php echo $row['comment']?></td>
                <td colspan="2" class="created" width="20%"><?php echo $row['created']?><br></td></tr>
                <tr><td class="like">
                  <?php
                  //$commentuser = $row['nick'];
                  //$sql = "SELECT liked FROM comment WHERE nick='".$commentuser."'";
                  //$result = mysqli_query($conn, $sql);
                  //$row = mysqli_fetch_assoc($result);

                  if(!isset($_SESSION['is_login'])){
                    ?><input type="submit" name="name" value="Like : <?php echo $row['liked']?>" class="likebtn btn-primary" style="border-radius: 30px;border:0px solid black;"><?php
                  }
                  else {
                      if(isset($_SESSION['id'])){?>
                            <form class="" action="2lasclikeProcess.php" method="post">
                            <input type="hidden" name="nick" value="<?php echo $_SESSION['id']?>">
                            <input type="hidden" name="liked" value="<?php echo $row['nick']?>">
                            <input type="hidden" name="id" value="<?php echo $row['id']?>">
                            <input type="submit" name="name" value="Like : <?php echo $row['liked']?>" class="likebtn btn-primary" style="border-radius: 30px;border:0px solid black;">
                          </form><td class="comdel"><?php
                          if($_SESSION['id'] == $row['nick']) {?>
                            <form class="" action="2lasccommentdelete.php" method="post">
                            <input type="hidden" name="nick" value="<?php echo $_SESSION['id']?>">
                            <input type="hidden" name="liked" value="<?php echo $row['nick']?>">
                            <input type="hidden" name="id" value="<?php echo $row['id']?>">
                            <input type="submit" name="name" value="댓글삭제" class="delbtn btn-danger" style="font-size:0.9em;border-radius: 30px;border:0px solid black;">
                            </form></td><?php
                          }
                      }
                    }
                    //echo $row['liked'];
                  ?>
                </td>
              </tr></table><br>
              <?php
            }
          }
          else  {
            echo '<h1 class="jumbotron text-center">작성된 평가가 없습니다!</h1>';
          }
          ?>
          <div class="paging">
              <?php
              if($allPost > 8) {
                echo $paging;
              }
              ?>
          </div>
        </div>
        <div class="jumbotron">
          <h1 class="text-center">평가 작성하기</h1>
          <?php
            if(!isset($_SESSION['is_login'])) {
              echo $_SESSION['msg'];
            }
            else {
              ?>
            <form class="" action="2lasccommentprocess?id=<?php echo $id?>" method="post">
              <h1 class="text-left">강의 수준</h1>
              <select name="level" class="form-control text-center" style="height: 50px;">
               <option class="text-center" value = "">선택</option>
               <option class="text-center" value = "0">0점: 평가할 가치가 없다</option>
               <option class="text-center" value = "1">1점: 매우 쉽다</option>
               <option class="text-center" value = "2">2점: 쉬운 편이다</option>
               <option class="text-center" value = "3">3점: 적절하다</option>
               <option class="text-center" value = "4">4점: 어려운 편이다</option>
               <option class="text-center" value = "5">5점: 매우 어렵다</option>
              </select>
              <h1 class="text-left">강의 분위기</h1>
              <select name="mood" class="form-control text-center" style="height: 50px;">
               <option class="text-center" value = "">선택</option>
               <option class="text-center" value = "0">0점: 평가할 가치가 없다</option>
               <option class="text-center" value = "1">1점: 완전 개판이다</option>
               <option class="text-center" value = "2">2점: 어수선하다</option>
               <option class="text-center" value = "3">3점: 적절하다</option>
               <option class="text-center" value = "4">4점: 공부할만 하다</option>
               <option class="text-center" value = "5">5점: 공부해야 한다</option>
              </select>
              <h1 class="text-left">강의의 질</h1>
              <select name="qual" class="form-control text-center" style="height: 50px;">
               <option class="text-center" value = "">선택</option>
               <option class="text-center" value = "0">0점: 평가할 가치가 없다</option>
               <option class="text-center" value = "1">1점: 배울게 없다</option>
               <option class="text-center" value = "2">2점: 그나마 있다</option>
               <option class="text-center" value = "3">3점: 적절하다</option>
               <option class="text-center" value = "4">4점: 배울게 있다</option>
               <option class="text-center" value = "5">5점: 배울게 많다</option>
              </select>
              <h1 class="text-left">과제의 양</h1>
              <select name="quan" class="form-control text-center" style="height: 50px;">
               <option class="text-center" value = "">선택</option>
               <option class="text-center" value = "0">0점: 과제가 없다(없을리가?)</option>
               <option class="text-center" value = "1">1점: 완전 적다(기..기모띠!)</option>
               <option class="text-center" value = "2">2점: 적은 편이다</option>
               <option class="text-center" value = "3">3점: 적절하다</option>
               <option class="text-center" value = "4">4점: 많다</option>
               <option class="text-center" value = "5">5점: 매우 많다</option>
              </select>
              <h1 class="text-left">과제의 난이도</h1>
              <select name="reportlv" class="form-control text-center" style="height: 50px;">
               <option class="text-center" value = "">선택</option>
               <option class="text-center" value = "0">0점: 나같은 쓰레기도 할 수 있다</option>
               <option class="text-center" value = "1">1점: 매우 쉽다</option>
               <option class="text-center" value = "2">2점: 쉬운 편이다</option>
               <option class="text-center" value = "3">3점: 적절하다</option>
               <option class="text-center" value = "4">4점: 어렵다</option>
               <option class="text-center" value = "5">5점: 암걸린다(조별과제인 경우, 여기에 해당)</option>
              </select>
              <h1 class="text-left">시험 난이도</h1>
              <select name="testlv" class="form-control text-center" style="height: 50px;">
               <option class="text-center" value = "">선택</option>
               <option class="text-center" value = "0">0점: 시험이 아닌 수준</option>
               <option class="text-center" value = "1">1점: 매우 쉽다</option>
               <option class="text-center" value = "2">2점: 쉬운 편이다</option>
               <option class="text-center" value = "3">3점: 보통이다</option>
               <option class="text-center" value = "4">4점: 어려운 편이다</option>
               <option class="text-center" value = "5">5점: 교수님이 씨뿌리기를 시전했다</option>
              </select>
              <h1 class="text-left">학점 부여도</h1>
              <select name="scorelv" class="form-control text-center" style="height: 50px;">
               <option class="text-center" value = "">선택</option>
               <option class="text-center" value = "0">0점: 학점을 자기 맘대로 준다</option>
               <option class="text-center" value = "1">1점: 사해의 소금농도 수준이다</option>
               <option class="text-center" value = "2">2점: 간장 수준이다</option>
               <option class="text-center" value = "3">3점: 적절하게 준다</option>
               <option class="text-center" value = "4">4점: 은혜롭게 주신다</option>
               <option class="text-center" value = "5">5점: 절 가지세요 교수님</option>
              </select>
              <h1 class="text-left">교재 구매 추천도</h1>
              <select name="book" class="form-control text-center" style="height: 50px;">
               <option class="text-center" value = "">선택</option>
               <option class="text-center" value = "0">0점: 아무것도 안사도 된다</option>
               <option class="text-center" value = "1">1점: 안사도 큰 문제 없다</option>
               <option class="text-center" value = "2">2점: 제본 뜨는게 낫다</option>
               <option class="text-center" value = "3">3점: 사도 되고 안사도 된다</option>
               <option class="text-center" value = "4">4점: 사는게 낫다</option>
               <option class="text-center" value = "5">5점: 무조건 사야한다</option>
              </select>
              <h1 class="text-left">인성</h1>
              <select name="insung" class="form-control text-center" style="height: 50px;">
               <option class="text-center" value = "">선택</option>
               <option class="text-center" value = "0">0점: 이 분 인성이?</option>
               <option class="text-center" value = "1">1점: 아주 안좋다</option>
               <option class="text-center" value = "2">2점: 별로다</option>
               <option class="text-center" value = "3">3점: 그냥 그렇다</option>
               <option class="text-center" value = "4">4점: 좋으신 편이다</option>
               <option class="text-center" value = "5">5점: 갓OO교수님</option>
              </select>
            <h1 class="text-left">전체 수강 추천도</h1>
          <select name="star" class="form-control text-center" style="height: 50px;">
           <option class="text-center" value = "">선택</option>
           <option class="text-center" value = "0">☆☆☆☆☆</option>
           <option class="text-center" value = "1">★☆☆☆☆</option>
           <option class="text-center" value = "2">★★☆☆☆</option>
           <option class="text-center" value = "3">★★★☆☆</option>
           <option class="text-center" value = "4">★★★★☆</option>
           <option class="text-center" value = "5">★★★★★</option>
          </select>
            <h1 class="text-left">한 마디 하기</h1>
          <textarea name="comment" class="form-control text-left" rows="4" cols="40"></textarea>
          <input type="submit" name="name" value="등록" class="btn btn-primary btn-lg btn-block text-center">
          </form>

        <?php
        }
        ?>
        </div>
        <button onclick="location.href='../gongdae/2lasc'" class="btn btn-default btn-lg btn-block text-center">목록으로 돌아가기</button>
      <p id="footer">
      ⓒ Copyright all rights received SensitiveCat <br> E-mail: eoen012@gmail.com
      </p>

    </article>

  </div>
  </body>
</html>
