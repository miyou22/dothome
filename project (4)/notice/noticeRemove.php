<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $noticeBoardID = $_GET['boardID'];
    $noticeBoardID = $connect -> real_escape_string($noticeBoardID);

    $sql = "DELETE FROM noticeBoard WHERE noticeBoardID = {$noticeBoardID}";

    $connect -> query($sql);

?>

<script>
    location.href = "notice.php";
</script>