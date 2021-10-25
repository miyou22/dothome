<?php
  include "../connect/connect.php";
  include "../connect/session.php";

  //관리자 이메일 가져오기
  $sql = "SELECT youEmail FROM myMember WHERE youNickname = '관리자'";
  $result = $connect -> query($sql);

  if($result){
    $count = $result -> num_rows;

    if($count == 0){
      echo "<script>alert('지금은 메일을 보낼 수 없습니다.'); location.href='qna.php';</script>";
    } else {
      $info = $result -> fetch_array(MYSQLI_ASSOC);

      //to: 받는사람(관리자 이메일)
      //mailTitle: 메일 제목
      //mailText: 메일 내용
      //from: 보내는 사람(로그인된 이메일)
      $to = $info['youEmail'];
      $mailTitle = $_POST['email_tite'];
      $mailText = $_POST['email_txt'];
      //한글 안깨지게 해줌
      $mailTitle = "=?UTF-8?B?".base64_encode($mailTitle)."?=";
      $from = $_SESSION['youEmail'];
      $headers .= 'From: '.$from."\r\n";  
	  $headers .= 'Reply-To: '.$from."\r\n";
      
      $headers .= 'Organization: Sender Organization ' . "\r\n";
      $headers .= 'MIME-Version: 1.0 ' . "\r\n";
      $headers .= 'Content-type: text/html; charset=utf-8 ' . "\r\n";
      $headers .= 'X-Priority: 3 ' ."\r\n" ;
      $headers .= 'X-Mailer: PHP". phpversion() ' ."\r\n" ;

      if($from == null || $from == ''){
        //로그인이 안된 상태일 때
        echo "<script>alert('로그인 후 이용하실 수 있습니다.'); history.back();</script>";
      } else {
        mail($to, $mailTitle, $mailText, $headers);
        echo "<script>alert('최대한 빠르게 답변드리겠습니다.'); location.href='qna.php';</script>";
      }
    }
  }


  

?>