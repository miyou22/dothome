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

$boardID = $_POST['boardID'];
$boardTitle = $_POST['boardTitle'];
$boardContent = $_POST['boardContent'];

// echo $boardID,$boardTitle,$boardContent,$boardPass;
// echo "<pre>";
// var_dump($_SESSION);
// echo "</pre>";

$boardTitle = $connect -> real_escape_string($boardTitle);
$boardContent = $connect -> real_escape_string($boardContent);

$sql = "UPDATE myBoard SET boardTitle = '{$boardTitle}', boardContent = '{$boardContent}' WHERE myBoardID = '{$boardID}'";
$connect -> query($sql);

?>
<script>
  location.href = "review.php";
</script>

</body>
</html>


