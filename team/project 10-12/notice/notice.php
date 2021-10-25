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

  <banner class="imgBanner notice">
    <div class="container">
      <div class="rName">
        <p class="rTitle">공지사항</p>
        <p class="rSub">새로운 소식을 전해드립니다</p>
      </div>
    </div>
  </banner>
  <!--//banner-->
  
  <main class="bMain">
    <div class="container">
      <h2 class="board-title">공지사항</h2>
      <div class="board-search">
        <form action="boardSearch.php" name="boardSearch" method="get">
          <fieldset>
            <select name="searchOption" id="searchOption" class="form-select">
              <option value="title">제목</option>
              <option value="content">내용</option>
              <option value="name">등록자</option>
            </select>
            <input type="search" name="searchKeyword" class="form-search" placeholder="검색어를 입력하세요" aria-label="search">
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
              <td><a href="#">정보처리기사 2021년 3회 가답안</a></td>
              <td>관리자</td>
              <td>2021-10-07</td>
              <td>5</td>
            </tr>
            <tr>
              <td>9</td>
              <td><a href="#">정보처리기사 2021년 2회 가답안</a></td>
              <td>관리자</td>
              <td>2021-10-07</td>
              <td>5</td>
            </tr>
            <tr>
              <td>8</td>
              <td><a href="#">정보처리기사 2021년 1회 가답안</a></td>
              <td>관리자</td>
              <td>2021-10-07</td>
              <td>5</td>
            </tr>
            <tr>
              <td>7</td>
              <td><a href="#">정보처리기사 2020년 3회 가답안</a></td>
              <td>관리자</td>
              <td>2021-10-07</td>
              <td>5</td>
            </tr>
            <tr>
              <td>6</td>
              <td>정보처리기사 2020년 2회 가답안</td>
              <td>관리자</td>
              <td>2021-10-07</td>
              <td>5</td>
            </tr>
            <tr>
              <td>5</td>
              <td>정보처리기사 2020년 1회 가답안</td>
              <td>관리자</td>
              <td>2021-10-07</td>
              <td>5</td>
            </tr>
            <tr>
              <td>4</td>
              <td>문제 만들기는 회원분만 가능합니다.</td>
              <td>관리자</td>
              <td>2021-10-07</td>
              <td>5</td>
            </tr>
            <tr>
              <td>3</td>
              <td>공지사항 테스트</td>
              <td>관리자</td>
              <td>2021-10-07</td>
              <td>5</td>
            </tr>
            <tr>
              <td>2</td>
              <td>관리자입니다.</td>
              <td>관리자</td>
              <td>2021-10-07</td>
              <td>5</td>
            </tr>
            <tr>
              <td>1</td>
              <td>정신머리 사이트 오픈</td>
              <td>관리자</td>
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