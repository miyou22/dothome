<div class="container">
  <nav class="menu">
    <ul>
      <li><a href="../pages/index.php">홈으로</a></li>
      <li><a href="../question/random_question.php">문제풀기</a></li>
      <li><a href="../question/previous_question.php">기출문제</a></li>
      <li><a href="../review/review.php">시험후기</a></li>
      <li><a href="../notice/qna.php">Q&A</a></li>
      <li><a href="../notice/notice.php">공지사항</a></li>
    </ul>
  </nav>
  <div class="m_menu">
    <span></span>
  </div>
  <div class="m_menuList">
    <ul>
      <li><a href="../pages/index.php">홈으로</a></li>
      <li><a href="../question/random_question.php">문제풀기</a></li>
      <li><a href="../question/previous_question.php">기출문제</a></li>
      <li><a href="../review/review.php">시험후기</a></li>
      <li><a href="../notice/qna.php">Q&A</a></li>
      <li><a href="../notice/notice.php">공지사항</a></li>
    </ul>
  </div>

  <div class="member">
    <ul>
      <?php if (isset($_SESSION['myMemberID'])) { ?>
        <li class="login"><a href="../userpages/userpages.php?memberID=<?=$_SESSION['myMemberID']?>"><?= $_SESSION['youNickname'] ?>님 환영합니다.</a></li>
        <li><a href="../login/logout.php">로그아웃</a></li>
      <?php } else { ?>
        <li><a href="../login/login.php">로그인</a></li>
        <li><a href="../login/join.php">회원가입</a></li>
      <?php } ?>
    </ul>
  </div>
</div>