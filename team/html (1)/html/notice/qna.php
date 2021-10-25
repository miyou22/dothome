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

    <!-- css -->
    <link href="../assets/css/reset.css" rel="stylesheet">
    <link href="../assets/css/font.css" rel="stylesheet">
    <link href="../assets/css/common.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>
    <header id="header">
        <?php
            include "../include/header.php";
        ?>
    </header>
    <!-- //header -->

    <main>
        <div id="qna_wrap">
            <div class="qna_benner">
                <div class="container">
                    <div class="qna_bg">
                        <h3>Q & A</h3>
                        <p>사이트 이용관련 자주 묻는 질문에 대한 답변입니다.</p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="qna_form">
                    <div class="qna_accordion">
                        <div id="accordion">
                            <h3>
                                <span>[사이트 이용]</span>
                                <span>문제가 한문제씩만 나오는데 여러문제를 풀 수는 없나요?</span>
                                <span>2021.10.03</span>
                            </h3>
                            <div>
                                <p>
                                    현재 저희 정신머리 사이트에서는 문제를 한문제씩 푸는것만이 아니라 여러문제도 풀 수 있도록<br>
                                    게시판을 나누었으며, 상단 메뉴에서 기출문제로 들어가시면 여러 문제를 풀어보실 수 있습니다.
                                </p>
                            </div>
                            <h3>
                                <span>[사이트 이용]</span>
                                <span>이번 년도에 나온 시험은 언제 업데이트 되나요?</span>
                                <span>2021.10.03</span>
                            </h3>
                            <div>
                                <p>
                                    Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet
                                    purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor
                                    velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In
                                    suscipit faucibus urna.
                                </p>
                            </div>
                            <h3>
                                <span>[사이트 이용]</span>
                                <span>정보처리기사 문제를 업로드 할 수 있나요?</span>
                                <span>2021.10.03</span>
                            </h3>
                            <div>
                                <p>
                                    Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis.
                                    Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero
                                    ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis
                                    lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui.
                                </p>
                            </div>
                            <h3>
                                <span>[개인정보 관련]</span>
                                <span>회원탈퇴는 어떻게 하나요?</span>
                                <span>2021.10.03</span>
                            </h3>
                            <div>
                                <p>
                                    Cras dictum. Pellentesque habitant morbi tristique senectus et netus
                                    et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
                                    faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
                                    mauris vel est.
                                </p>
                                <p>
                                    Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus.
                                    Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
                                    inceptos himenaeos.
                                </p>
                            </div>
                            <h3>
                                <span>[개인정보 관련]</span>
                                <span>가입된 이메일을 다른 이메일로 바꾸고 싶어요.</span>
                                <span>2021.10.03</span>
                            </h3>
                            <div>
                                <p>
                                    Cras dictum. Pellentesque habitant morbi tristique senectus et netus
                                    et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
                                    faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
                                    mauris vel est.
                                </p>
                                <p>
                                    Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus.
                                    Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
                                    inceptos himenaeos.
                                </p>
                            </div>
                            <h3>
                                <span>[개인정보 관련]</span>
                                <span>비밀번호를 잊어버린거 같아요. 어떻게 해야 하나요?</span>
                                <span>2021.10.03</span>
                            </h3>
                            <div>
                                <p>
                                    Cras dictum. Pellentesque habitant morbi tristique senectus et netus
                                    et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
                                    faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
                                    mauris vel est.
                                </p>
                                <p>
                                    Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus.
                                    Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
                                    inceptos himenaeos.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //아코디언 -->

                <div class="mail_tell">
                    <h4>기타사항을 메일로 문의 주시면 1~2일 내로 답변 드립니다.</h4>
                    <form action="qnaMail.php" name="mailWrite" method="post" class="mail_form" >
                        <fieldset>
                            <legend class="ir_so">메일 문의 영역</legend>
                            <div>
                                <label for="email_tite">문의 제목</label>
                                <input type="text" id="email_tite" name="email_tite" class="email_tite"
                                    placeholder="제목을 입력해주세요!" required />
                            </div>
                            <div>
                                <label for="email_txt">문의 내용</label>
                                <textarea name="email_txt" id="email_txt" class="email_txt" rows="13"
                                    placeholder="내용을 작성해주세요!" required></textarea>
                            </div>
                        </fieldset>
                        <button type="submit" class="email-btn" value="보내기">보내기</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <!-- //main -->

    <footer id="footer">
        <?php
          include "../include/footer.php";
        ?>
    </footer>
    <!-- //footer -->


    <!-- js -->
    <script src="../assets/js/jquery.min_1.12.4.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="../assets/js/common.js"></script>
    <script>
        $(function () {
            $("#accordion").accordion();
        });
    </script>
</body>

</html>