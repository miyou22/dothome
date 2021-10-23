<?php
  include "../connect/connect.php";
  include "../connect/session.php";

  $noticeBoardTitle = $_POST['boardTitle'];
  $noticeBoardContent = $_POST['boardContent'];

  $noticeBoardTitle = $connect -> real_escape_string($noticeBoardTitle);
  $noticeBoardContent = $connect -> real_escape_string($noticeBoardContent);
  $noticeBoardView = 0;
  $regTime = time();
  $memberID = $_SESSION['myMemberID'];

  //데이터 입력
  $sql = "INSERT INTO noticeBoard(myMemberID, noticeBoardTitle, noticeBoardContent, noticeBoardView, regTime) ";
  $sql .= "VALUES('$memberID', '$noticeBoardTitle', '$noticeBoardContent', '$noticeBoardView', '$regTime')";

  $result = $connect -> query($sql);

  // if($result){
  //   echo "goooood";
  // } else {
  //   echo "bad";
  // }
?>

<script>
  location.href = "notice.php";
</script>