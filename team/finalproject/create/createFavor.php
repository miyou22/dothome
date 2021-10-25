<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE Favorites (";
    $sql .= "favor_ID int(10) unsigned NOT NULL auto_increment,";
    $sql .= "myMemberID int(10) unsigned NOT NULL,";
    $sql .= "PRIMARY KEY (favor_ID)";
    $sql .= ")charset = utf8";

    $result = $connect -> query($sql);

        if($result){
            echo "Create Table True";
        } else {
            echo "Create Table False";
        }

?>