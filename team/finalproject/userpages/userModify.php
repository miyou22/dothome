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
               <div class="userMD_box">
               <form name="join" action="userupdate.php" method="POST" onsubmit="return joinSubmit();">
                   <div class="userMD_form">
                       <h2>회원정보 수정</h2>
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
                                placeholder="닉네임을 적어주세요." value="<?= $row['youNickname'] ?>" autocmplete="off" autofocus>
                            <button class="btn_sb" type="button" onclick="nickChecking()">중복 확인</button>
                        </div>
                        <div>
                            <label for="youName">이름</label>
                            <input type="text" name="youName" id="youName" class="input_write" maxlength="5"
                                placeholder="이름을 적어주세요." value="<?= $row['youName']; ?>" autocmplete="off" autofocus>
                        </div>
                        <div>
                            <label for="youPass">비밀번호</label>
                            <input type="password" name="youPass" id="youPass" class="input_write wp" maxlength="20"
                                placeholder="비밀번호 입력" autocmplete="off" required>
                        </div>
                        <div>
                            <label for="youPassC">비밀번호 확인</label>
                            <input type="password" name="youPassC" id="youPassC" class="input_write wp"
                                maxlength="20" placeholder="비밀번호 확인" autocmplete="off" required>
                        </div>
                        <button id="user_Btn" class="btn_submit" type="submit">수정 완료</button>
                    </div>
                </form>
               </div>
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
        let nickCheck = false;

        //submit 전 체크
        function joinSubmit(){
        //비밀번호, 비밀번호 확인
        let youPass = $("#youPass").val();
        let youPassC = $("#youPassC").val();
        let youName = $("#youName").val();
        let youNickname = $("#youNickname").val();
        
        if(nickCheck == false){
          alert("닉네임 중복체크를 확인해주세요.");
          return false;
        }

        //비밀번호가 동일한지 체크
        if(youPass !== youPassC){
          alert("비밀번호가 동일하지 않습니다.");
          return false;
        }
      }


        //닉네임 중복체크
        function nickChecking(){
            let youNickname = $('#youNickname').val();	
                
            if(youNickname == null || youNickname == ''){
                alert("닉네임을 입력해주세요!");
            } else {
                let request = $.ajax({
                url: "check.php", //통신할 url
                method: "POST", //통신할 메서드 타입
                data: { "youNickname" : youNickname, "type" : "nickCheck"}, //전송할 데이타
                dataType: "json",
                success: function(data){
                    var word = "이미 존재하는 닉네임입니다.";
                    if(data.result == 'good'){
                        word = "사용 가능한 닉네임입니다.";
                        alert(word);
                        nickCheck = true;
                    } else {
                    word = "이미 존재하는 닉네임입니다.";
                    alert(word);
                    nickCheck = false;
                    }
                },
                error : function(reqeust, status, error){
                    console.log('reqeust'+reqeust);
                    console.log('status'+status);
                    console.log('error'+error);
                }
                    });
            }
        }

    </script>
</body>

</html>