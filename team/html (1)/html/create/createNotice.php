<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE noticeBoard (";
    $sql .= "noticeBoardID int(10) unsigned NOT NULL auto_increment,";
    $sql .= "myMemberID int(10) unsigned NOT NULL,";
    $sql .= "noticeBoardTitle varchar(50) NOT NULL,";
    $sql .= "noticeBoardContent longtext NOT NULL,";
    $sql .= "noticeBoardView int(10) unsigned NOT NULL,";
    $sql .= "regTime int(15) unsigned NOT NULL,";
    $sql .= "PRIMARY KEY (noticeBoardID)";
    $sql .= ")charset = utf8";

    $result = $connect -> query($sql);

    if($result){
        echo "Create Table True";
    } else {
        echo "Create Table False";
    }
?>
