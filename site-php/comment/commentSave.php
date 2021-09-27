<?php
    include "../connect/connect.php";

    $youName = $_POST['youName'];
    $youText = $_POST['youText'];
    $regTime = time();

    $sql = "INSERT INTO myComment99(youName, youText, regTime) VALUES('$youName', '$youText', '$regTime')";

    $result = $connect -> query($sql);

    // if($result) {
    //     echo "INSERT INTO true";
    // } else {
    //     echo "INSERT INTO flase";
    // }
?>

<script>
    location.href = "../comment/comment.php#comment";
</script>