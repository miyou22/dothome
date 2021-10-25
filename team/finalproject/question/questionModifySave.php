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

// echo $boardID,$boardTitle,$boardContent,$boardPass;
// echo "<pre>";
// var_dump($_SESSION);
// echo "</pre>";

$myMemberID = $_SESSION["myMemberID"];
$q_ID = $_POST['q_ID'];
$q_subject = $_POST["quesWrite_select"]; 
$q_ask = $_POST["board_problem"];
$q_desc = isset($_POST["board_example"])?$_POST["board_example"]:"";
$q_choice1 = $_POST["choie-list1"];
$q_choice2 = $_POST["choie-list2"];
$q_choice3 = $_POST["choie-list3"];
$q_choice4 = $_POST["choie-list4"];
$q_answer = $_POST["select"];
$q_comment = $_POST["board_commentary"];

$sql = "UPDATE question SET q_subject = '{$q_subject}', q_ask = '{$q_ask}', q_desc = '{$q_desc}', q_choice1 = '{$q_choice1}', q_choice2 = '{$q_choice2}', q_choice3 = '{$q_choice3}', q_choice4 = '{$q_choice4}', q_answer = '{$q_answer}', q_comment = '{$q_comment}' WHERE q_ID = '$q_ID' AND myMemberID = '{$myMemberID}'";

$connect -> query($sql);

?>
<script>
  location.href = "../userpages/userWirteQuestion.php";
</script>

</body>
</html>


