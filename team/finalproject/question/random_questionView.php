<?php
    include "../connect/connect.php";

    $subjectNum = $_POST['subjectNum'];

    $sql = "SELECT q_ID, q_ask, q_desc, q_choice1, q_choice2, q_choice3, q_choice4, q_answer, q_comment FROM question ";
    if($subjectNum != 0){
      $sql .= "WHERE q_subject = '$subjectNum' ";
    }
    $sql .= "ORDER BY rand() limit 1";

    $result = $connect -> query($sql);

    $info = $result -> fetch_array(MYSQLI_ASSOC);
    $info['q_desc'] = nl2br($info['q_desc']);
    $info['q_comment'] = nl2br($info['q_comment']);

    echo json_encode(array('question'=>$info));
?>