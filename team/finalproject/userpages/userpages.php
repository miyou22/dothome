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

    <main>
        <article class="user_pages">
            <nav id="user_nav">
                <div class="user">
                <ul>
                    <li class="active"><a href="userpages.php">마이페이지</a></li>
                    <li><a href="userFavorites.php">문제 즐겨찾기</a></li>
                    <li><a href="userWirteQuestion.php">내가 작성한 문제</a></li>
                </ul>
                </div>
            </nav>
            <div class="container">
               <div class="user_box">
                   <div class="user_form">
                       <h2>마이페이지</h2>
                       <?php

                       $myMemberID = $_GET['memberID'];
                       $select_query = "SELECT youEmail, youNickname, youName FROM myMember WHERE myMemberID = '$myMemberID'";

                       $result_set = mysqli_query($connect, $select_query);
                       $row = mysqli_fetch_assoc($result_set);
                       
                       ?>
                       <div>
                        <label for="youEmail">이메일</label>
                        <input type="email" name="youEmail" id="youEmail" class="input_write"
                            placeholder="<?= $row['youEmail'] ?>" autocmplete="off" disabled>
                        </div>
                        <div>
                            <label for="youNickname">닉네임</label>
                            <input type="text" name="youNickname" id="youNickname" class="input_write" maxlength="5"
                                placeholder="<?= $row['youNickname'] ?>" autocmplete="off" disabled>
                        </div>
                        <div>
                            <label for="youName">이름</label>
                            <input type="text" name="youName" id="youName" class="input_write" maxlength="5"
                                placeholder="<?= $row['youName']; ?>" autocmplete="off" disabled>
                        </div>
                        <?php if (isset($_SESSION['myMemberID'])) { ?>
                        <button id="user_Btn" class="btn_submit" type="submit"><a href="userModify.php?memberID=<?=$_SESSION['myMemberID']?>">회원정보 변경</a></button>
                        <?php } else { ?>
                   </div>
               </div>
               <?php } ?>
            </div>
        </article>
    </main>
    <!-- //main -->

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

    </script>
</body>

</html>