<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";



    //삭제하고 자하는 글 번호 받기
    $q_ID = $_GET['q_ID'];

    //삭제 쿼리문 실행
    $sql = "DELETE FROM question WHERE q_ID = {$q_ID}";
    $result = $connect -> query($sql);
    
    //삭제여부 확인
    // if($result){
    //     echo "success";
    // } else {
    //     echo "fail:delete";
    // }

?>

<script>
   location.href = "userWirteQuestion.php";
</script>