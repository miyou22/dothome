<?php
  include "../connect/connect.php";
  include "../connect/session.php";
  include "../connect/sessionCheck.php";
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

  <main id="questionWriteMain">
    <div class="container">
      <h1 class="questionWriteTitle">문제 만들기</h1>
      <div class="questionWriteContent">
        <form action="questionWriteSave.php" name="questionWrite" method="post">
          <fieldset>
            <legend class="ir_so">문제 만들기 글쓰기 영역입니다.</legend>
            <div>
              <label for="board_question">문제</label>
              <textarea name="board_question" id="board_question" class="title-text" rows="5" placeholder="문제를 작성해주세요"
                required></textarea>
            </div>

            <div>
              <label for="board_question">보기<p>※ 보기가 없으면 작성하지않으셔도 무관합니다.</p></label>
              <textarea name="board_question" id="board_question" class="title-text" rows="6" placeholder="보기를 작성해주세요"></textarea>
            </div>

            <div class="question_choice">
                <label for="select1">
                    <input class="select" type="radio" name="select" id="select1" value="1">
                    <input type="text" name="choie-list1" id="choie-list1" class="choie-list" placeholder="예시를 작성해주세요" required>
                </label>
                <label for="select2">
                    <input class="select" type="radio" name="select" id="select2" value="1">
                    <input type="text" name="choie-list2" id="choie-list2" class="choie-list" placeholder="예시를 작성해주세요" required>
                </label>
                <label for="select3">
                    <input class="select" type="radio" name="select" id="select3" value="1">
                    <input type="text" name="choie-list3" id="choie-list3" class="choie-list" placeholder="예시를 작성해주세요" required>
                </label>
                <label for="select4">
                    <input class="select" type="radio" name="select" id="select4" value="1">
                    <input type="text" name="choie-list4" id="choie-list4" class="choie-list" placeholder="예시를 작성해주세요" required>
                </label>
            </div>

            <div>
                <label for="board_commentary">해설</label>
                <textarea name="board_commentary" id="board_commentary" class="title-text" rows="8" placeholder="해설을 작성해주세요"
                  required></textarea>
              </div>
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