<?php
  include "../connect/connect.php";
  include "../connect/session.php";

  $boardTitle = $_POST['boardTitle'];
  $boardContent = $_POST['boardContent'];

  // echo $boardTitle;
  // echo $boardContent;

  $boardTitle = $connect -> real_escape_string($boardTitle);
  $boardContent = $connect -> real_escape_string($boardContent);
  $boardView = 0;
  $regTime = time();
  $memberID = $_SESSION['myMemberID'];

  //데이터 입력
  $sql = "INSERT INTO myBoard(myMemberID, boardTitle, boardContent, boardView, regTime) ";
  $sql .= "VALUES('$memberID', '$boardTitle', '$boardContent', '$boardView', '$regTime')";

  $result = $connect -> query($sql);

  // if($result){
  //   echo "goooood";
  // } else {
  //   echo "bad";
  // }
?>

<script>
  location.href = "review.php";
</script>