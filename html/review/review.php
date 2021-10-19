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
    <title>정신머리</title>

    <!-- style -->
    <link rel="stylesheet" href="../assets/css/font.css">
    <link rel="stylesheet" href="../assets/css/common.css">
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <header id="header">
        <?php
            include "../include/header.php";
        ?>
    </header>
    <!-- //header -->
    
    <banner class="imgBanner">
        <div class="container">
            <div class="rName">
                <p class="rTitle">시험후기</p>
                <p class="rSub">다양한 후기를 들러주세요.</p>
            </div>
        </div>
    </banner>
    <!--//banner-->
    <main class="bMain">
        <div class="container">
            <h2>시험후기</h2>
            <div class="board-search">
                <form action="reviewSearch.php" name="boardSearch" method="get" onsubmit="return searchBtnCheck();">
                    <fieldset>
                        <select name="searchOption" id="searchOption" class="form-select">
                            <option value="title">제목</option>
                            <option value="content">내용</option>
                            <option value="name">등록자</option>
                        </select>
                        <input type="search" name="searchKeyword" id="searchKeyword" class="form-search" placeholder="검색어를 입력하세요"
                            aria-label="search">
                        <button type="submit" class="form-btn">검색</button>
                    </fieldset>
                </form>
            </div>
            <div class="board-table">
                <table>
                    <colgroup>
                        <col style="width: 5%">
                        <col>
                        <col style="width: 10%">
                        <col style="width: 12%">
                        <col style="width: 7%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>번호</th>
                            <th>제목</th>
                            <th>작성자</th>
                            <th>작성일</th>
                            <th>조회</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                      if(isset($_GET['page'])){
                        $page = (int) $_GET['page'];
                      } else {
                        $page = 1;
                      }

                      $numView = 10;
                      $viewLimit = ($numView * $page) - $numView;
                      $sql = "SELECT b.myBoardID, b.boardTitle, m.youNickname, b.boardView, b.regTime ";
                      $sql .= "FROM myMember m JOIN myBoard b ON m.myMemberID = b.myMemberID ";
                      if(isset($_GET['searchOption']) && isset($_GET['searchKeyword'])){
                        $searchOption = $_GET['searchOption'];
                        $searchKeyword = $_GET['searchKeyword'];
                        switch($searchOption){
                          case 'title':
                            $sql .= "WHERE b.boardTitle LIKE '%{$searchKeyword}%' ";
                            break;
                          case 'content':
                            $sql .= "WHERE b.boardContent LIKE '%{$searchKeyword}%' ";
                            break;
                          case 'name':
                            $sql .= "WHERE m.youNickname LIKE '%{$searchKeyword}%' ";
                            break;
                        }
                      }
                      $sql .= "ORDER BY myBoardID DESC LIMIT {$viewLimit}, {$numView}";

                      $result = $connect -> query($sql);

                      if($result){
                        $count = $result -> num_rows;
                        
                        if($count > 0){
                          for($i = 1; $i <= $count; $i++){
                            $info = $result -> fetch_array(MYSQLI_ASSOC);
                            echo "<tr>";
                            echo "<td>".$info['myBoardID']."</td>";
                            echo "<td><a href='reviewView.php?boardID={$info['myBoardID']}'>".$info['boardTitle']."</a></td>";
                            echo "<td>".$info['youNickname']."</td>";
                            echo "<td>".date('Y-m-d', $info['regTime'])."</td>";
                            echo "<td>".$info['boardView']."</td>";
                            echo "</tr>";
                          }
                        }
                      }
                    ?>
                        <!-- <tr>
                            <td>10</td>
                            <td><a href="#">오늘 시험 잘 치뤘어요</a></td>
                            <td>김가나</td>
                            <td>2021-10-07</td>
                            <td>5</td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
            <div class="board-page">
                <ul>
                  <?php
                    $sql = "SELECT count(myBoardID) FROM myBoard b JOIN myMember m ON b.myMemberID = m.myMemberID ";
                    if(isset($_GET['searchOption']) && isset($_GET['searchKeyword'])){
                      $searchOption = $_GET['searchOption'];
                      $searchKeyword = $_GET['searchKeyword'];
                      switch($searchOption){
                        case 'title':
                          $sql .= "WHERE b.boardTitle LIKE '%{$searchKeyword}%' ";
                          break;
                        case 'content':
                          $sql .= "WHERE b.boardContent LIKE '%{$searchKeyword}%' ";
                          break;
                        case 'name':
                          $sql .= "WHERE m.youNickname LIKE '%{$searchKeyword}%' ";
                          break;
                      }
                    }

                    $result = $connect -> query($sql);
                    $boardTotalCount = $result -> fetch_array(MYSQLI_ASSOC);
                    $boardTotalCount = $boardTotalCount['count(myBoardID)'];

                    // echo "전체 갯수 : " .$boardTotalCount;

                    //총 페이지 수
                    $boardTotalPage = ceil($boardTotalCount/$numView);
                    // echo "총 페이지 수 : " .$boardTotalPage;

                    //1 2 3 4 5 6 7 8 9 10 11
                    //현재 페이지를 기준으로 보여주고 싶은 갯수
                    $pageView = 5;
                    $startPage = $page - $pageView;
                    $endPage = $page + $pageView;

                    //처음 페이지 초기화
                    if($startPage < 1) $startPage = 1;

                    //마지막 페이지 초기화
                    if($endPage >= $boardTotalPage) $endPage = $boardTotalPage;

                    //처음으로
                    if($page != 1) {
                      $uri = "page=1";
                      if(isset($_GET['searchOption']) && isset($_GET['searchKeyword'])){
                        $uri .= "&&searchOption=".$_GET['searchOption']."&&searchKeyword=".$_GET['searchKeyword'];
                      }
                      echo "<li><a href='review.php?{$uri}'>&lt;&lt;</a></li>";
                    }

                    //이전페이지
                    if($page != 1){
                      $prevPage = $page - 1;
                      $uri = "page=".$prevPage;
                      if(isset($_GET['searchOption']) && isset($_GET['searchKeyword'])){
                        $uri .= "&&searchOption=".$_GET['searchOption']."&&searchKeyword=".$_GET['searchKeyword'];
                      }
                      echo "<li><a href='review.php?{$uri}'>&lt;</a></li>";
                    }

                    for($i=$startPage; $i<=$endPage; $i++){
                      $active = '';
                      if($i == $page) $active = 'active';
                      $uri = "page=".$i;
                      if(isset($_GET['searchOption']) && isset($_GET['searchKeyword'])){
                        $uri .= "&&searchOption=".$_GET['searchOption']."&&searchKeyword=".$_GET['searchKeyword'];
                      }
                      echo "<li class='{$active}'><a href='review.php?{$uri}'>{$i}</a></li>";
                    }

                    //다음페이지
                    if($page != $endPage){
                      $nextPage = $page + 1;
                      $uri = "page=".$nextPage;
                      if(isset($_GET['searchOption']) && isset($_GET['searchKeyword'])){
                        $uri .= "&&searchOption=".$_GET['searchOption']."&&searchKeyword=".$_GET['searchKeyword'];
                      }
                      echo "<li><a href='review.php?{$uri}'>&gt;</a></li>";
                    }

                    //마지막으로
                    if($page != $boardTotalPage){
                      $uri = "page=".$boardTotalPage;
                      if(isset($_GET['searchOption']) && isset($_GET['searchKeyword'])){
                        $uri .= "&&searchOption=".$_GET['searchOption']."&&searchKeyword=".$_GET['searchKeyword'];
                      }
                      echo "<li><a href='review.php?{$uri}'>&gt;&gt;</a></li>";
                    }
                  ?>
                    <!-- <li><a href="#">&lt;</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&gt;</a></li> -->
                </ul>
                <a href="../review/reviewWrite.php" class="form-btn black">글쓰기</a>
            </div>
        </div>
    </main>

    <footer id="footer">
        <?php
          include "../include/footer.php";
        ?>
    </footer>
    <!-- //footer -->

    <!-- js -->
    <script src="../assets/js/common.js"></script>
</body>

</html>