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
include "../connect/session.php";
include "../connect/sessionCheck.php";

$noticeBoardID = $_POST['boardID'];
$noticeBoardTitle = $_POST['boardTitle'];
$noticeBoardContent = $_POST['boardContent'];
$myMemberID = $_POST['myMemberID'];
$memberID = $_SESSION['myMemberID'];


// echo $boardID,$boardTitle,$boardContent;
// echo "<pre>";
// var_dump($_SESSION);
// echo "</pre>";

$boardTitle = $connect -> real_escape_string($boardTitle);
$boardContent = $connect -> real_escape_string($boardContent);

if($myMemberID == $memberID){
  $sql = "UPDATE noticeBoard SET noticeBoardTitle = '{$noticeBoardTitle}', noticeBoardContent = '{$noticeBoardContent}' WHERE noticeBoardID = '{$noticeBoardID}'";
  $connect -> query($sql);
}

?>
<script>
  location.href = "notice.php";
</script>

</body>
</html>


