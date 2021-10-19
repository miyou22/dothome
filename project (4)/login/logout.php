<?php
    include "../connect/session.php";

    unset($_SESSION['myMemberID']);
    unset($_SESSION['youEmail']);
    unset($_SESSION['youNickname']);
?>

<script>
    location.href = "../pages/index.php";
</script>