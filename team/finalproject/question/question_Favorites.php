<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    
    $type = $_POST['type'];

    $myMemberID = $_SESSION['myMemberID'];
    $favor_ID = $_POST['q_ID'];

    $resultData = "no";

    if($type == "init"){
      $sql = "SELECT * FROM Favorites WHERE favor_ID = '$favor_ID' AND myMemberID = '$myMemberID'";

      $result = $connect -> query($sql);

      if($result->num_rows == 0){
        $resultData = "no";
      } else {
        $resultData = "yes";
      }
    } else if($type == "check"){
      $sql = "SELECT * FROM Favorites WHERE favor_ID = '$favor_ID' AND myMemberID = '$myMemberID'";

      $result = $connect -> query($sql);

      if($result->num_rows == 0){
        //즐겨찾기 추가
        $sql = "INSERT INTO Favorites(favor_ID, myMemberID) VALUES ('$favor_ID','$myMemberID')";
        $result = $connect -> query($sql);
        
        $resultData = "insert";
      } else {
        //즐겨찾기 삭제
        $sql = "DELETE FROM Favorites WHERE favor_ID = '$favor_ID' AND myMemberID = '$myMemberID'";
        $result = $connect -> query($sql);

        $resultData = "delete";
      }
    }


    echo json_encode(array('resultData'=>$resultData));

?>