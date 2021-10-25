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

    <main id="boardWriteMain">
        <div class="container">
            <h1 class="boardWriteTitle">글쓰기</h1>
            <div class="boardWriteContent">
                <form action="reviewWriteSave.php" name="boardWrite" method="post">
                    <fieldset>
                        <legend class="ir_so">시험후기 게시판 글쓰기 영역입니다.</legend>
                        <div>
                            <label for="boardTitle">제목</label>
                            <input type="text" id="boardTitle" name="boardTitle" class="title-text"
                                placeholder="제목을 입력해주세요!" required autofocus />
                        </div>
                        <div>
                            <label for="boardContent">내용</label>
                            <textarea name="boardContent" id="boardContent" class="title-text" rows="13"
                                placeholder="내용을 작성해주세요!" required></textarea>
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