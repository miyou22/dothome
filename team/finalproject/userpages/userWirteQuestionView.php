<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $myMemberID = $_SESSION['myMemberID'];

    $sql = "SELECT q_ID, q_ask, q_desc, q_choice1, q_choice2, q_choice3, q_choice4, q_answer, q_comment FROM question WHERE myMemberID = '$myMemberID'";

    $result = $connect -> query($sql);

    $count = mysqli_num_rows($result);

    $info = [];
    for ($i=0; $i < $count; $i++) { 
      $info[$i] = mysqli_fetch_array($result);
    }


    echo json_encode(array('question'=>$info));
?>  