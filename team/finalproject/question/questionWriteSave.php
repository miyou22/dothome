<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $myMemberID = $_SESSION["myMemberID"];
    $q_subject = $_POST["quesWrite_select"]; 
    $q_ask = $_POST["board_problem"];
    $q_desc = isset($_POST["board_example"])?$_POST["board_example"]:"";
    $q_choice1 = $_POST["choie-list1"];
    $q_choice2 = $_POST["choie-list2"];
    $q_choice3 = $_POST["choie-list3"];
    $q_choice4 = $_POST["choie-list4"];
    $q_answer = $_POST["select"];
    $q_comment = $_POST["board_commentary"];

    $sql = "INSERT INTO question(myMemberID,q_subject,q_ask,q_desc,q_choice1,q_choice2,q_choice3,q_choice4,q_answer,q_comment) ";
    $sql .= "VALUES ('$myMemberID','$q_subject','$q_ask','$q_desc','$q_choice1','$q_choice2','$q_choice3','$q_choice4','$q_answer','$q_comment')";

    $result = $connect -> query($sql);

    if($result){
        ?>
        <script>alert("문제가 저장되었습니다."); location.href="random_question.php";</script>
        <?php
    } else {
        exit;
    }

?>
</body>
</html>