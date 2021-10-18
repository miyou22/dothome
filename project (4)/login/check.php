<?php
    // echo json_encode(array('result'=>'good'));
    include_once "../connect/connect.php";

    //요청받은 중복확인의 타입 확인
    $type = $_POST['type'];

    //쿼리문 생성
    $sql = "SELECT youEmail FROM myMember ";
    if($type == "emailCheck"){
      $youEmail = $connect->real_escape_string(trim($_POST['youEmail']));
      $sql .= "WHERE youEmail = '{$youEmail}'";
    }
    if($type == "nickCheck"){
      $youNickname = $connect->real_escape_string(trim($_POST['youNickname']));
      $sql .= "WHERE youNickname = '{$youNickname}'";
    }
    //쿼리문 질의
    $result = $connect -> query($sql);

    //전달할 데이터
    $jsonResult = "bad";

    //해당하는 레코드 수가 0이라면 중복되는 ID가 없다는 뜻
    if($result->num_rows == 0){
        $jsonResult = "good";
    }   

    echo json_encode(array('result'=>$jsonResult));
?>