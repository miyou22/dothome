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
            <div class="bvTitle">공지사항</div>
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
            </div>
        </div>
    </main>

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