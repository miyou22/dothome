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
                <form action="boardSearch.php" name="boardSearch" method="get">
                    <fieldset>
                        <select name="searchOption" id="searchOption" class="form-select">
                            <option value="title">제목</option>
                            <option value="content">내용</option>
                            <option value="name">등록자</option>
                        </select>
                        <input type="search" name="searchKeyword" class="form-search" placeholder="검색어를 입력하세요"
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
                        <tr>
                            <td>10</td>
                            <td><a href="#">오늘 시험 잘 치뤘어요</a></td>
                            <td>김가나</td>
                            <td>2021-10-07</td>
                            <td>5</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td><a href="#">망했어요 ㅠ.ㅠ</a></td>
                            <td>이나라</td>
                            <td>2021-10-07</td>
                            <td>5</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td><a href="#">망했어요 ㅠ.ㅠ</a></td>
                            <td>박유나</td>
                            <td>2021-10-07</td>
                            <td>5</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td><a href="#">어려워요</a></td>
                            <td>사주나</td>
                            <td>2021-10-07</td>
                            <td>5</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>배고파요</td>
                            <td>마고음</td>
                            <td>2021-10-07</td>
                            <td>5</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>기분좋아요</td>
                            <td>황가람</td>
                            <td>2021-10-07</td>
                            <td>5</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>머리아파</td>
                            <td>나주먹</td>
                            <td>2021-10-07</td>
                            <td>5</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>100점 맞아서 기분이 좋아요</td>
                            <td>김철수</td>
                            <td>2021-10-07</td>
                            <td>5</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>너무 어려워서 아무것도 모르겠어요</td>
                            <td>나바보</td>
                            <td>2021-10-07</td>
                            <td>5</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>하핫 첫번째 글이네요.</td>
                            <td>김천재</td>
                            <td>2021-10-07</td>
                            <td>5</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="board-page">
                <ul>
                    <li><a href="#">&lt;</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&gt;</a></li>
                </ul>
                <a href="../review/reviewWrite.html" class="form-btn black">글쓰기</a>
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