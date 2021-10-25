<?php
  include "../connect/connect.php";
  include "../connect/session.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
  $searchKeyword = $_GET['searchKeyword'];
  $searchOption = $_GET['searchOption'];

  $url = "review.php?searchKeyword=".$searchKeyword."&&searchOption=".$searchOption;

  header("location: $url");
?>
</body>
</html>
