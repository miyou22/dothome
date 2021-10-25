<?php
    include "../connect/connect.php";
 
    $sql = "CREATE TABLE question (";
    $sql .= "q_ID int(10) unsigned NOT NULL auto_increment,";
    $sql .= "myMemberID int(10) unsigned NOT NULL,";
    $sql .= "q_subject int(10) unsigned NOT NULL,";
    $sql .= "q_ask longtext NOT NULL,";
    $sql .= "q_desc longtext,";
    $sql .= "q_choice1 longtext NOT NULL,";
    $sql .= "q_choice2 longtext NOT NULL,";
    $sql .= "q_choice3 longtext NOT NULL,";
    $sql .= "q_choice4 longtext NOT NULL,";
    $sql .= "q_answer varchar(10) NOT NULL,";
    $sql .= "q_comment longtext NOT NULL,";
    $sql .= "PRIMARY KEY (q_ID)";
    $sql .= ")charset = utf8";

    $result = $connect -> query($sql);

    if($result){
        echo "Create Table True";
    } else {
        echo "Create Table False";
    }
?>
