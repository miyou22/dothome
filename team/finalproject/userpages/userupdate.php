<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    
    $myMemberID = $_SESSION['myMemberID'];
    $youNickname = $_POST['youNickname'];
    $youName = $_POST['youName'];
    $youPass = $_POST['youPass'];
    $youPassC = $_POST['youPassC'];

    echo $myMemberID;
    echo $youNickname;
    echo $youName;
    echo $youPass;
    echo $youPassC;

    $sql = "UPDATE myMember set youPass='$youPass', youNickname='$youNickname', youName='$youName'  WHERE myMemberID='$myMemberID'";

    $result = $connect -> query($sql);

    Header("Location: userpages.php?memberID=$myMemberID");
?>