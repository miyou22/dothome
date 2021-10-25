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
    <div class="random_head">
      <div class="container">
        <h1 id="random_title">문제풀기</h1>
        <span id="random_desc">랜덤으로 나오는 문제를 풀어 봅시다.</span>

        <div class="select_subject">
          <label for="random_subject" class="ir_so">문제 과목 선택</label>
          <select name="random_subject" id="random_subject" class="random_subject">
            <option value="0">전체 랜덤 문제 풀기</option>
            <option value="1">1과목 소프트웨어 설계</option>
            <option value="2">2과목 소프트웨어 개발</option>
            <option value="3">3과목 데이터베이스 구축</option>
            <option value="4">4과목 프로그래밍 언어 활용</option>
            <option value="5">5과목 정보시스템 구축 관리</option>
          </select>
        </div>
      </div>
    </div>
    <div class="random_question">
      <div class="container">
        <div class="question">
          <div class="question_area">
            <h3 class="question_title">
              <span class="question_title_num"></span>
              <span class="question_title_ask"></span>
            </h3>
            <div class="result_img">
              <img src="../assets/img/o.svg" alt="정답" class="o">
              <img src="../assets/img/x.svg" alt="오답" class="x">
            </div>
            <div class="question_desc">
              <h4>&lt;보기&gt;</h4>
              <p></p>
            </div>
            <div class="question_answer_selects">
              <label for="select1">
                <input type="radio" class="select" name="select" id="select1" value="1"><span class="choice"></span>
              </label>
              <label for="select2">
                <input type="radio" class="select" name="select" id="select2" value="2"><span class="choice"></span>
              </label>
              <label for="select3">
                <input type="radio" class="select" name="select" id="select3" value="3"><span class="choice"></span>
              </label>
              <label for="select4">
                <input type="radio" class="select" name="select" id="select4" value="4"><span class="choice"></span>
              </label>
            </div>
          </div>
          <div class="question_side_menu">
            <div class="share">
              <h4 class="ir_so">공유하기</h4>
              <span></span>
            </div>
            <div class="favorites">
              <h4 class="ir_so">즐겨찾기</h4>
              <span></span>
            </div>
          </div>
        </div>
        <div class="question_btn_area">
          <div class="left"><button type="button" id="commentary_btn" class="question_btn">해설보기</button></div>
          <div class="right">
            <button type="button" id="grading_btn" class="question_btn">채점하기</button>
            <button type="button" id="next_btn" class="question_btn">다음문제</button>
          </div>
        </div>
        <div class="commentary_area">
          <p></p>
        </div>
      </div>
    </div>
  </main>

  <footer id="footer">
    <?php
          include "../include/footer.php";
        ?>
  </footer>
  <!-- //footer -->

  <script src="../assets/js/jquery.min_1.12.4.js"></script>
  <script src="../assets/js/common.js"></script>
  <script>
    const questionTitle = $(".question_title");
    const num = $(".question_title_num");
    const ask = $(".question_title_ask");
    const questionDesc = $(".question_desc p");
    const choicesTxt = $(".question_answer_selects .choice");
    const commentary = $(".commentary_area p");

    const favorites = $(".question_side_menu .favorites");

    const commentaryBtn = $("#commentary_btn");
    const gradingBtn = $("#grading_btn");
    const nextBtn = $("#next_btn");

    let answer = "";
    let check = false;
    let q_ID;

    //문제 화면에 뿌리기
    function dataView(quiz) {
      q_ID = quiz.q_ID;

      num.text(quiz.q_ID);
      ask.text(quiz.q_ask);
      if (quiz.q_desc == "") {
        $(".question_desc").css({
          "display": "none"
        });
      } else {
        $(".question_desc").css({
          "display": "block"
        });
        questionDesc.html(quiz.q_desc);
      };
      choicesTxt.each(function (i) {
        let choice = "";
        switch (i) {
          case 0:
            choice = quiz.q_choice1;
            break;
          case 1:
            choice = quiz.q_choice2;
            break;
          case 2:
            choice = quiz.q_choice3;
            break;
          case 3:
            choice = quiz.q_choice4;
            break;
        }
        $(this).text(choice);
      });
      commentary.html(quiz.q_comment);

      //초기 즐겨찾기 확인하기
      $.ajax({
        url: "question_Favorites.php",
        method: "POST",
        data: {
          "type": "init",
          "q_ID": q_ID
        },
        dataType: "json",
        success: function (data) {
          if (data.resultData == "yes") {
            favorites.addClass("like");
          }
        },
        error: function (reqeust, status, error) {
          console.log('reqeust' + reqeust);
          console.log('status' + status);
          console.log('error' + error);
        }
      });
    }

    //DB에서 랜덤 1문제 가져오기
    function dataReady() {
      let subjectNum = $("#random_subject option:selected").val();
      $.ajax({
        url: "random_questionView.php", //통신할 url
        method: "POST", //통신할 메서드 타입
        data: {
          "subjectNum": subjectNum
        }, //전송할 데이타
        dataType: "json",
        success: function (data) {
          let quiz = data.question;

          dataView(quiz);
          answer = quiz.q_answer;
        },
        error: function (reqeust, status, error) {
          console.log('reqeust' + reqeust);
          console.log('status' + status);
          console.log('error' + error);
        }
      });
    }

    //해설보기
    function commentaryShow() {
      $(".commentary_area").toggleClass("show");
    }
    //정답 체크
    function grading() {
      let select = $("input[name='select']:checked").val();

      if (select == null || select == "") {
        alert("정답을 선택해주세요.");
      } else {
        if (answer == select) {
          //정답
          $(".result_img img").css("display", "none");
          $(".result_img .o").css("display", "block");
          $(".commentary_area").addClass("show");
        } else {
          //오답
          $(".result_img img").css("display", "none");
          $(".result_img .x").css("display", "block");
          commentary.prepend("정답: " + answer + "<br><br>");
          $(".commentary_area").addClass("show");
        }
        $(window).scrollTop(0);
        check = true;
      }
    }

    //다음버튼
    function nextQuiz() {
      if (!check) {
        let next_check = confirm("정답을 확인하지 않고 다음 문제로 넘어가시겠습니까?");
        if (next_check) check = true;
      }
      if (check) {
        dataReady();
        check = false;
        $(".result_img img").css("display", "none");
        $("input[name='select']").prop("checked", false);
        $(".commentary_area").removeClass("show");
      }
    }

    function favoriteCheck() {
      $.ajax({
        url: "question_Favorites.php",
        method: "POST",
        data: {
          "type": "check",
          "q_ID": q_ID
        },
        dataType: "json",
        success: function (data) {
          if (data.resultData == "insert") {
            favorites.addClass("like");
          } else if (data.resultData == "delete") {
            favorites.removeClass("like");
          }
          console.log(data);
        },
        error: function (reqeust, status, error) {
          console.log('reqeust' + reqeust);
          console.log('status' + status);
          console.log('error' + error);
        }
      });
    }


    dataReady();
    //click event
    //해설보기
    commentaryBtn.click(commentaryShow);
    //채점하기
    gradingBtn.click(grading);
    //다음문제가기
    nextBtn.click(nextQuiz);
    //즐겨찾기
    favorites.click(favoriteCheck);

    //change event
    $(".random_subject").change(function () {
      dataReady();
      check = false;
      $(".result_img img").css("display", "none");
      $("input[name='select']").prop("checked", false);
      $(".commentary_area").removeClass("show");
    });


    //url copy
    function urlCopy() {
      let url = '';
      let urlText = document.createElement("textarea");
      document.body.appendChild(urlText);
      url = window.document.location.href;
      urlText.value = url;
      urlText.select();
      document.execCommand("copy");
      document.body.removeChild(urlText);
      alert("URL이 복사되었습니다.")
    }

    document.querySelector(".share").addEventListener("click", urlCopy);
  </script>
</body>

</html>