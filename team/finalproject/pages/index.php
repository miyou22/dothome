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
        <article class="main_banner">
            <div class="container">
                <div class="random_quiz">
                    <h1>랜덤문제</h1>
                    <p>유저들이 만든 다양한 문제들을 랜덤으로 풀어 볼 수 있습니다.</p>
                    <a href="../question/questionWrite.php" class="quiz_btn">문제만들기</a>
                </div>
                <div class="quiz">
                    <h1>기출문제</h1>
                    <p>2020년 이후의 모의고사 문제들을 풀어 볼 수 있습니다.</p>
                    <form action="../question/previous_question.php" method="get" name="memberJoin" onsubmit="return quizLink();">
                        <label for="selectYear" class="ir_so">기출 연도 선택</label>
                        <select name="selectYear" id="selectYear" class="selectYear">
                            <!-- <option disabled selected>기출연도를 선택해주세요.</option>
                            <option value="2020_1">2020년 1회</option>
                            <option value="2020_2">2020년 2회</option>
                            <option value="2020_3">2020년 3회</option> -->
                        </select>
                        <button type="submit" class="quiz_btn">문제풀기</button>
                    </form>
                </div>
            </div>
        </article>

        <section id="section1" class="main_section">
            <div class="container">
                <div class="imgarea">
                    <img src="../assets/img/main_img01.jpg" alt="이미지">
                </div>
                <div class="textarea">
                    <h1>여러 문제들을 <br>여러 사람들과 <br>함께 공부할 수 있는 공간</h1>
                    <p>정신머리 사이트는 정보처리기사에 관련된 교육자료들을 수백개의 링크를 클릭하지 않고,<br>
                        언제 어디서나 내게 필요한 부분만 골라 공부하고 사람들과 소통할 수 있는 웹 사이트 입니다.</p>
                    <?php 
                        if(!isset($_SESSION['myMemberID'])){
                    ?>
                            <a href="../login/join.php">회원가입</a>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </section>

        <section id="section2" class="main_section">
            <div class="container">
                <div class="textarea">
                    <h1>한 공간에서 효과적으로<br>공부할 수 있는 공간</h1>
                    <p>다양한 문제풀이를 공유하며 사용자만의 즐겨찾기 페이지를 만들어<br>
                        자신만의 문제집을 만들어 풀 수 있는 사이트</p>
                    <a href="#">문제풀기</a>
                </div>
                <div class="imgarea">
                    <img src="../assets/img/main_img02.jpg" alt="이미지">
                </div>
            </div>
        </section>

        <section id="section3" class="main_section">
            <div class="container">
                <div class="dday_box">
                    <img src="../assets/img/ddayimg.jpg" alt="이미지">
                    <div class="dday_container">
                        <h1>시험 D-DAY</h1>
                        <p>※<span class="year">0000</span>년 <span class="round">0</span>회 필기시험까지 <span class="day">0</span>일 남았습니다.</p>
                        <div class="dday">
                            D - Day<br><span class="day">00</span>
                        </div>
                    </div>
                </div>
                <div class="review_board">
                    <h1>시험 후기</h1>
                    <a href="../review/reviewWrite.php" class="review_btn">후기 남기기</a>
                    <ul class="review">
                      <?php
                        $sql = "SELECT b.myBoardID, b.boardTitle, b.regTime ";
                        $sql .= "FROM myBoard b ";
                        $sql .= "ORDER BY myBoardID DESC LIMIT 5";
  
                        $result = $connect -> query($sql);

                        if($result){
                          $count = $result -> num_rows;
                          
                          if($count > 0){
                            for($i = 1; $i <= $count; $i++){
                              $info = $result -> fetch_array(MYSQLI_ASSOC);
                              echo "<li><a href='../review/reviewView.php?boardID=".$info['myBoardID']."'>".$info['boardTitle']."<span>".date('Y.m.d', $info['regTime'])."</span></a></li>";
                            }
                          }
                        }
                      ?>
                        <!-- <li><a href="#">오늘 시험치고 왔습니다.<span>2021.10.04</span></a></li>
                        <li><a href="#">오늘 시험치고 왔습니다.<span>2021.10.04</span></a></li>
                        <li><a href="#">오늘 시험치고 왔습니다.<span>2021.10.04</span></a></li>
                        <li><a href="#">오늘 시험치고 왔습니다.<span>2021.10.04</span></a></li>
                        <li><a href="#">오늘 시험치고 왔습니다.<span>2021.10.04</span></a></li> -->
                    </ul>
                </div>
            </div>
        </section>
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
    <script src="../assets/js/common.js"></script>
    <script src="../assets/js/dday.js"></script>
    <script>
      //기출문제 이동 전 확인
      function quizLink(){
        if($("#selectYear option:selected").val() == null || $("#selectYear option:selected").val() == ""){
          alert("풀고 싶은 기출연도를 선택해주세요.");
          return false;
        }
      }

      //기출문제 부분 출력
      function init() {
        //json 문제출력
        $.getJSON('../assets/json/previous_questions.json', function (data) {
          //기출 회차를 셀렉트박스에 출력
          let subject = [];
          subject.push("<option disabled selected value=''>기출연도를 선택해주세요.</option>");
          $.each(data.data, function (i, d) {
            subject.push(`<option value="${i}">${d.title}</option>`);
          });

          $("#selectYear").html(subject);
        });
      }

      //day 함수
      function ddayTime(){
        const second = 1000,
              minute = second * 60,
              hour = minute * 60,
              days = hour * 24;

        const year = $(".dday_container .year");
        const round = $(".dday_container .round");
        const day = $(".dday_container .day");
        
        let test;
        let testYear;
        let testRound;
        
        const today = new Date().getTime();

        let datas = [];
        datas = dday;
        

        for(let data of datas){
          const testDay = new Date(data.date +','+ data.year + " 00:00:00").getTime();

          if(today <= testDay){
            test = testDay;
            testYear = data.year;
            testRound = data.round;
          } else {
            test = 0;
          }
        }

        if(test != 0){
          //d-day가 있는 경우
          year.text(testYear);
          round.text(testRound);

          let distance = test - today;
          day.text(Math.floor(distance / (days)));
        } else if(test == 0){
          //이후 일정 미정
          $(".dday_container p").text("※일정을 준비중입니다.");
        }
      }

      init();
      ddayTime();
    </script>
</body>

</html>