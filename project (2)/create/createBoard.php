<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE myBoard (";
    $sql .= "myBoardID int(10) unsigned NOT NULL auto_increment,";
    $sql .= "myMemberID int(10) unsigned NOT NULL,";
    $sql .= "boardTitle varchar(50) NOT NULL,";
    $sql .= "boardContent longtext NOT NULL,";
    $sql .= "boardView int(10) unsigned NOT NULL,";
    $sql .= "regTime int(15) unsigned NOT NULL,";
    $sql .= "PRIMARY KEY (myBoardID)";
    $sql .= ")charset = utf8";

    $result = $connect -> query($sql);

    if($result){
        echo "Create Table True";
    } else {
        echo "Create Table False";
    }
?>
