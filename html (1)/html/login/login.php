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

    <main id="login_main">
        <div class="container">
            <div class="lg_form">
                <div class="lg_box">
                    <h2>로그인</h2>
                    <form name="login" action="loginSave.php" method="POST">
                        <div class="member-box">
                            <div>
                                <label for="youEmail">ID</label>
                                <input type="email" name="youEmail" id="youEmail" class="input_write"
                                    placeholder="Sample@naver.com" autocmplete="off" autofocus>
                            </div>
                            <div>
                                <label for="youPass">PW</label>
                                <input type="password" name="youPass" id="youPass" class="input_write" maxlength="20"
                                    placeholder="비밀번호 입력" autocmplete="off" required>
                            </div>
                        </div>
                        <button type="submit">로그인</button>
                        <p class="info">* 아직 회원이 아니라면? <a href="join.php">회원가입</a>하러 가기</p>
                    </form>
                </div>
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