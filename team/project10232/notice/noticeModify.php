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
  <!-- css -->
  <link href="../assets/css/reset.css" rel="stylesheet">
  <link href="../assets/css/font.css" rel="stylesheet">
  <link href="../assets/css/common.css" rel="stylesheet">
  <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>
    <header id="header">
        <?php
            include "../include/header.php";
        ?>
    </header>
    <!-- //header -->

  <main id="boardWriteMain">
    <div class="container">
      <h1 class="boardWriteTitle">수정하기</h1>
      <div class="boardWriteContent">
        <form action="noticeModifySave.php" name="boardWrite" method="post">
          <fieldset>
            <legend class="ir_so">공지사항 게시판 수정하기 영역입니다.</legend>
            <?php
              $noticeBoardID = $_GET['boardID'];

              $sql = "SELECT b.noticeBoardTitle, b.noticeBoardContent, b.myMemberID , m.youName ";
              $sql .= "FROM noticeBoard b join myMember m ON(b.myMemberID = m.myMemberID) ";
              $sql .= "WHERE b.noticeBoardID = {$noticeBoardID}";

              $result = $connect -> query($sql);

              if($result){
                $info = $result -> fetch_array(MYSQLI_ASSOC);
            ?>
                <div style="display:none">
                  <label for="boardID">번호</label>
                  <input type="text" id="boardID" name="boardID" class="title-text" value="<?=$_GET['boardID']?>"/>
                </div>
                <div style="display:none">
                  <label for="myMemberID">작성자ID</label>
                  <input type="text" id="myMemberID" name="myMemberID" class="title-text" value="<?=$info['myMemberID']?>"/>
                </div>
                <div>
                  <label for="boardTitle">제목</label>
                  <input type="text" id="boardTitle" name="boardTitle" class="title-text" value="<?=$info['noticeBoardTitle']?>"/>
                </div>
                <div>
                  <label for="boardContent">내용</label>
                  <textarea name="boardContent" id="boardContent" class="title-text" rows="13" ><?=$info['noticeBoardContent']?></textarea>
                </div>
            <?php
              } 
            ?>
            <!-- <div>
              <label for="boardTitle">제목</label>
              <input type="text" id="boardTitle" name="boardTitle" class="title-text" placeholder="제목을 입력해주세요!" required
                autofocus />
            </div>
            <div>
              <label for="boardContent">내용</label>
              <textarea name="boardContent" id="boardContent" class="title-text" rows="13" placeholder="내용을 작성해주세요!"
                required></textarea>
            </div> -->
          </fieldset>
          <button type="submit" class="board-btn" value="작성완료">작성완료</button>
        </form>
      </div>
    </div>
  </main>
  <!-- //main -->

  <footer id="footer">
      <?php
        include "../include/footer.php";
      ?>
  </footer>
  <!-- //footer -->

  <!-- js -->
  <script src="../assets/js/common.js"></script>
</body>

</html>