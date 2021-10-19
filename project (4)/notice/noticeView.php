<?php
  include "../connect/connect.php";
  include "../connect/session.php";
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>정신머리</title>

    <!-- style -->
    <link rel="stylesheet" href="../assets/css/font.css">
    <link rel="stylesheet" href="../assets/css/common.css">
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <header id="header">
        <?php
            include "../include/header.php";
        ?>
    </header>
    <!-- //header -->

    <main class="bvMainView">
        <div class="container">
        <?php 
              $boardID = $_GET['boardID'];

              $sql = "SELECT b.noticeBoardTitle, b.noticeBoardContent, b.noticeBoardView, m.youNickname, m.myMemberID, b.regTime ";
              $sql .= "FROM noticeBoard b JOIN myMember m ON(b.myMemberID = m.myMemberID) WHERE b.noticeBoardID  = {$boardID}";

              $result = $connect -> query($sql);

              $view = "UPDATE noticeBoard SET noticeBoardView = noticeBoardView+1 WHERE noticeBoardID = {$boardID}";
              $connect -> query($view);

              

              if($result){
                  $info = $result -> fetch_array(MYSQLI_ASSOC);
                  $bv = $info['noticeBoardView']+1;
              ?>
                  <div class="bvTitle"><? echo $info['noticeBoardTitle']; ?></div>
                  <div class="bvEtc">
                      <div class="bvNick"><? echo $info['youNickname']; ?></div>
                      <div class="bvCoday"><? echo $bv; ?> <span>|</span> <? echo date('Y-m-d',$info['regTime']); ?></div>
                  </div>
                  <div class="bvCont">
                      <p><? echo nl2br($info['noticeBoardContent']); ?>
                      </p>
                  </div>
                  <div class="aWrapform">
                    <?php
                      if($info['myMemberID'] == $_SESSION['myMemberID']){
                    ?>
                      <a href="noticeModify.php?boardID=<?=$_GET['boardID']?>" class="form-write">수정하기</a>
                      <a href="noticeRemove.php?boardID=<?=$_GET['boardID']?>" class="form-write" onclick="return noticeRemove();">삭제하기</a>
                    <?php
                      }
                    ?>
                      <a href="notice.php" class="form-write">목록으로</a>
                  </div>
            <?php
              }
            ?>
            <!-- <div class="bvTitle">공지사항</div>
            <div class="bvEtc">
                <div class="bvNick">관리자</div>
                <div class="bvCoday">조회수1 <span>|</span> 2021-10-03</div>
            </div>
            <div class="bvCont">
                <p>시험 안내 드립니다<br>
                    이번 시험 일정은 XX부터 XX까지였습니다.
                </p>
            </div>
            <div class="aWrapform">
                <a href="/project/notice/noticeModify.html" class="form-write">수정하기</a>
                <a href="#" class="form-write">삭제하기</a>
                <a href="/project/notice/notice.html" class="form-write">목록으로</a>
            </div> -->
        </div>
    </main>

    <footer id="footer">
        <?php
          include "../include/footer.php";
        ?>
    </footer>
    <!-- //footer -->

    <!-- js -->
    <script src="../assets/js/jquery.min_1.12.4.js"></script>
    <script src="../assets/js/common.js"></script>
    <script>
      function noticeRemove(){
        const txt = "정말 삭제하시겠습니까?";
        let result = confirm(txt);

        return result;
      }
    </script>
</body>

</html>