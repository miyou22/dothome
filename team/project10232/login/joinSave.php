<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>정신머리</title>
</head>
<body>
<?php 
  include "../connect/connect.php";

  $youEmail = $_POST['youEmail'];
  $youNickname = $_POST['youNickname'];
  $youName = $_POST['youName'];
  $youPass = $_POST['youPass'];
  $youPassC = $_POST['youPassC'];
  $regTime = time();

  //메시지 출력
  function msg ($alert) {
    echo "<script>alert('{$alert}'); history.back(); </script>";
  }

  //var_dump(filter_var('web@naver.com',FILTER_VALIDATE_EMAIL));
  //입력 유효성 검사
  if($youEmail == null || $youEmail == ''){
    msg("이메일을 입력해 주세요");
    exit;
  }
  if($youPass == null || $youPass == ''){
    msg("비밀번호를 입력해 주세요");
    exit;
  }
  if($youPassC == null || $youPassC == ''){
    msg("확인 비밀번호를 입력해 주세요");
    exit;
  }
  if($youName == null || $youName == ''){
    msg("이름을 입력해 주세요");
    exit;
  }
  if($youNickname == null || $youNickname == ''){
    msg("닉네임을 입력해 주세요");
    exit;
  }

  //이메일 검사 : 내장 함수
  $check_email = filter_var($youEmail, FILTER_VALIDATE_EMAIL);
  if( $check_email == false) {
    msg("이메일이 잘못되었습니다. <br> 올바른 이메일을 적어주세요!!");
    exit;
  }


  //비밀번호 암호화
  //$youPass = sha1($youPass);

  //이름 검사
  $check_name = preg_match("/^[가-힣]{1,}$/", $youName);
  if( $check_name == false) {
    msg("이름이 정확하지 않습니다. <br> 한글로만 적어주세요!!");
    exit;
  }

  //회원가입
  $sql = "INSERT INTO myMember(youEmail, youNickname, youName, youPass, regTime) ";
  $sql .= "VALUES ('$youEmail', '$youNickname', '$youName', '$youPass', '$regTime')";

  $result = $connect -> query($sql);

  if($result){
    //회원가입 성공
      Header("Location: joinCheck.php");
  } else {
      msg("에러발생03 - 관리자에게 문의해 주세요.");
      exit;
  }
  

  // INSERT INTO myMember(youEmail, youPass, youName, youBirth, youPhone, regTime)
  // VALUES ('$youEmail', '$youPass', '$youName', '$youBirth', '$youPhone', '$regTime');
?>
</body>
</html>