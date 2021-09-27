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
    <title>댓글</title>

    <!-- style -->
    <link rel="stylesheet" href="../assets/css/fonts.css">
    <link rel="stylesheet" href="../assets/css/var.css">
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <div id="skip">
        <a href="#contents">컨텐츠 바로가기</a>
        <a href="#footer">푸터 바로가기</a>
    </div>
    <!-- //skip -->
    
    <header id="header">  
        <?php
            include "../include/header.php";
        ?>
    </header>
    <!-- //header -->

    <main id="contents">
        <section id="mainCont">
            <h2 class="ir_so">메인 컨텐츠</h2>
            <article class="content-article">
                <!-- cartType01 -->
                <section class="cardType">
                    <div class="cardType01">
                        <h2>웹스토리보이 강의</h2>
                        <p>웹디자이너, 웹 퍼블리셔, 프론트앤드 개발자를 위한 강의 사이트입니다. 초보자부터 중급자까지 볼 수 있는 
                            포폴 영상강의를 준비하였습니다.</p>
                        <div class="card-wrap">
                            <div class="card">
                                <a href="#">
                                    <img src="../assets/img/card01.jpg" alt="웹표준 사이트 만들기 관련 이미지입니다." class="card-img">
                                    <strong class="card-title">웹표준 사이트 만들기 웹표준 사이트 만들기</strong>
                                    <span class="card-desc">웹 접근성 지첨서를 준수하여 만들 사이트입니다. 기본기를 다지기 위한 사이트입니다. 기본기를 다지기 위한 사이트입니다.</span>
                                    <span class="card-keyword">
                                        <span>#웹 초보</span>
                                        <span>#웹 사이트</span>
                                        <span>#웹표준</span>
                                    </span>
                                </a>
                            </div>
                            <div class="card">
                                <a href="#">
                                    <img src="../assets/img/card02.jpg" alt="반응형 사이트 만들기 관련 이미지입니다." class="card-img">
                                    <strong class="card-title">반응형 사이트 만들기</strong>
                                    <span class="card-desc">반응형을 위한 사이트입니다. 모든 디바이스에서 잘 나올 수 있도록 제작하였습니다. 기본기를 다지기 위한 사이트입니다.</span>
                                    <span class="card-keyword">
                                        <span>#웹 초보</span>
                                        <span>#반응형 사이트</span>
                                    </span>
                                </a>
                            </div>
                            <div class="card">
                                <a href="#">
                                    <img src="../assets/img/card03.jpg" alt="웹표준 사이트 만들기 관련 이미지입니다." class="card-img">
                                    <strong class="card-title">기업 사이트 만들기</strong>
                                    <span class="card-desc">기업 사이트에서 가장 많이 쓰이는 사이트 유형입니다.  유형을 분석하고 가장 많이 쓰이 기본기를 다지기 위한 사이트입니다.</span>
                                    <span class="card-keyword">
                                        <span>#웹 초보</span>
                                        <span>#기업 사이트</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- //cartType01 -->
            </article>
            <article class="flow-article">
                <h3 class="ir_so">나도 강의 신청하기</h3>
                <section id="comment" class="section-comment">
                    <h4>강의 신청하기</h4>
                    <p>강의 수강을 원하는 분들은 댓글로 참여 신청을 남겨주세요!</p>
                    <div class="comment-form">
                        <form action="commentSave.php" method="post" name="comment">
                            <fieldset>
                                <legend class="ir_so">댓글 영역</legend>
                                <div class="comment-wrap">
                                    <div>
                                        <label for="youName" class="ir_so">이름</label>
                                        <input type="text" name="youName" id="youName" class="input_write2" placeHolder="이름" autocomplete="off" maxlength="10" required>
                                    </div>
                                    <div>
                                        <label for="youText" class="ir_so">신청하기</label>
                                        <input type="text" name="youText" id="youText" class="input_write2 w100" placeHolder="신청과목을 적어주세요!" autocomplete="off" required>
                                    </div>
                                    <button class="btn_submit2" type="submit" value="신청하기">go</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <div class="comment-list">
                        <?php
                            include "../connect/connect.php";

                            $sql = "SELECT * FROM myComment99 LIMIT 10";
                            $result = $connect -> query($sql);

                            // echo "<pre>";
                            // var_dump( mysqli_fetch_array($result));
                            // echo "</pre>";

                            while( $info = mysqli_fetch_array($result) ){
                        ?>
                            <div>
                                <p><?=$info['youText']?></p>
                                <div>
                                    <img src="http://richclub9.dothome.co.kr/assets/ico/icon12.jpg" alt="신청자">
                                    <span><?=$info['youName']?></span>
                                    <span><?=date('Y-m-d H:i', $info['regTime'])?></span>
                                </div>
                            </div>
                        <?php
                            }
                        ?>



                        <!-- <div>
                            <p>저 신청합니다.! 꼭 받아주세요!</p>
                            <div>
                                <img src="http://richclub9.dothome.co.kr/assets/ico/icon12.jpg" alt="신청자">
                                <span>황가연</span>
                                <span>2020-03-04</span>
                            </div>
                        </div> -->
                        
                    </div>
                </section>
            </article>
        </section>
    </main>
    <!-- //contents -->

    <footer id="footer">
        footer
    </footer>
    <!-- //footer -->
</body>
</html>