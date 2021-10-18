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

    <main id="join_main">
        <div class="container">
            <div class="jo_form">
                <div class="jo_box">
                    <h2>회원가입</h2>
                    <div class="join-info">
                        <ul class="list">
                            <li>회원가입은 1인당 1개의 이메일 계정을이용할 수 있습니다.</li>
                            <li>개인정보를 수집 및 이용하며, 회원의 개인정보를 안전하게 취급하고, 교육을 목적으로 사용됩니다. </li>
                        </ul>
                    </div>
                    <h4>개인정보 수집 및 동의</h4>
                    <div class="join-privacy">
                        <ul class="list">
                            <li>&lt;개인정보 수집 목적&gt;</li>
                            <li>가입자 개인 식별, 가입 의사 확인, 가입자와의 원활한 의사소통,가입자와의 교육 커뮤니테이션</li>
                            <li>&lt;수집하는 개인정보 목록&gt;</li>
                            <li>아이디(이메일주소), 비밀번호, 이름</li>
                            <li>보유기간 : 회원 탈퇴 시까지 보유(탈퇴일로부터 즉시 파기합니다.)<br>개인정보 수집에 대한 동의를 거부할 권리가 있으며, 회원 가입시 개인정보수집을
                                동의함으로 간주합니다.</li>
                        </ul>
                        <span class="join_check"><input type="checkbox" name="동의" value="약관에 동의합니다." class="joinCheck">약관에 동의합니다.</span>
                    </div>
                    <form name="join" action="joinSave.php" method="POST" onsubmit="return joinSubmit();">
                        <div class="member-box">
                            <h4>정보입력</h4>
                            <div>
                                <label for="youEmail">이메일</label>
                                <input type="email" name="youEmail" id="youEmail" class="input_write"
                                    placeholder="Sample@naver.com" autocmplete="off" autofocus>
                                <button class="btn_sb" type="button" onclick="emailChecking()">중복 확인</button>
                            </div>
                            <div>
                                <label for="youNickname">닉네임</label>
                                <input type="text" name="youNickname" id="youNickname" class="input_write" maxlength="5"
                                    placeholder="닉네임 입력" autocmplete="off" required>
                                <button class="btn_sb" type="button" onclick="nickChecking()">중복 확인</button>
                            </div>
                            <div>
                                <label for="youName">이름</label>
                                <input type="text" name="youName" id="youName" class="input_write" maxlength="5"
                                    placeholder="이름 입력" autocmplete="off" required>
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
                        </div>
                        <button id="joinBtn" class="btn_submit" type="submit">회원가입 완료</button>
                    </form>
                </div>
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
    <script src="../assets/js/jquery.min_1.12.4.js"></script>
    <script src="../assets/js/common.js"></script>
    <script>
      let emailCheck = false;
      let nickCheck = false;

      //submit 전 체크
      function joinSubmit(){
        //개인정보 동의 체크 여부
        let joinCheck = $(".joinCheck").is(':checked');
        //비밀번호, 비밀번호 확인
        let youPass = $("#youPass").val();
        let youPassC = $("#youPassC").val();

        //중복확인 / 개인정보 동의 체크 
        if(joinCheck == false){
          alert("개인정보 수집 및 동의를 체크해주세요.");
          return false;
        } 
        
        if(emailCheck == false){
          alert("이메일 중복체크를 확인해주세요.");
          return false;
        } 
        
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

      //이메일 중복체크
      function emailChecking(){
        let youEmail = $('#youEmail').val();
				
				if(youEmail == null || youEmail == ''){
          alert("이메일을 입력해주세요!");
        }	else {
          let request = $.ajax({
            url: "check.php", //통신할 url
            method: "POST", //통신할 메서드 타입
            data: { "youEmail" : youEmail, "type" : "emailCheck"}, //전송할 데이타
            dataType: "json",
            success: function(data){
              var word = "이미 존재하는 이메일입니다.";
              if(data.result == 'good'){
                word = "사용 가능한 이메일입니다.";
                alert(word);
                emailCheck = true;
              } else {
                word = "이미 존재하는 이메일입니다.";
                alert(word);
                emailCheck = false;
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