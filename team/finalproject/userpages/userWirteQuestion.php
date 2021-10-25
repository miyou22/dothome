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
  <title>정신머리 | 마이페이지:내가만든 문제</title>

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
    <nav id="user_nav">
      <div class="user">
        <ul>
          <li><a href="userpages.php">마이페이지</a></li>
          <li><a href="userFavorites.php">문제 즐겨찾기</a></li>
          <li class="active"><a href="userWirteQuestion.php">내가 작성한 문제</a></li>
        </ul>
      </div>
    </nav>
    <div class="random_head">
      <div class="container">
        <h1 id="random_title">내가 만든 문제</h1>
        <span id="random_desc">내가 만든 문제들을 확인할 수 있습니다.</span>
      </div>
    </div>
    <div class="user_question">
      <div class="container">
        <!-- <div class="question">
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
        </div>
        <div class="question_btn_area">
          <div class="left"><button type="button" id="commentary_btn" class="question_btn">해설보기</button></div>
          <button type="button" id="grading_btn" class="question_btn">채점하기</button>
          <div class="right">
            <button type="button" id="revise_btn" class="question_btn">수정하기</button>
            <button type="button" id="delete_btn" class="question_btn" onclick="return userWirteQuestionRemove();">삭제하기</button>
          </div>
        </div>-->
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
    const question = $(".question")

    const commentaryBtn = $(".commentary_btn");
    const gradingBtn = $("#grading_btn");
    const nextBtn = $("#next_btn");

    let quiz = [];
    let answer = "";
    let check = false;


    //반복문을 사용하여 문제 뿌리기
    function updateQuiz(quizInfo) {
      const output = []; //문제
      //가져욘 quiz에서 선택된 quizIndex의 문제들을 뿌려준다
      $.each(quizInfo, function (currentQuestion, questionNumber) {

        let txt = `<div class="question_wrap">
        <div class="question">
            <div class="question_area">
                <h3 class="question_title">
                    <span class="question_title_num">${questionNumber.q_ID}</span>
                    <span class="question_title_ask">${questionNumber.q_ask}</span>
                </h3>
                <div class="result_img">
                    <img src="../assets/img/o.svg" alt="정답" class="o">
                    <img src="../assets/img/x.svg" alt="오답" class="x">
                </div>`;
        if (questionNumber.q_desc){
          txt +=`<div class="question_desc">
                    <h4>&lt;보기&gt;</h4>
                    <p>${questionNumber.q_desc}</p>
                </div>`;
        }
        txt+= `
                <div class="question_answer_selects">
                    <label for="select1">
                        <input type="radio" class="select" name="select" id="select${questionNumber.q_ID}" ><span
                            class="choice">${questionNumber.q_choice1}</span>
                    </label>
                    <label for="select2">
                        <input type="radio" class="select" name="select" id="select${questionNumber.q_ID}" ><span
                            class="choice">${questionNumber.q_choice2}</span>
                    </label>
                    <label for="select3">
                        <input type="radio" class="select" name="select" id="select${questionNumber.q_ID}" ><span
                            class="choice">${questionNumber.q_choice3}</span>
                    </label>
                    <label for="select4">
                        <input type="radio" class="select" name="select" id="select${questionNumber.q_ID}" ><span
                            class="choice">${questionNumber.q_choice4}</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="question_btn_area" style="margin-bottom: 30px;">
            <!--<div class="left"><button type="button" id="commentary_btn${questionNumber.q_ID}" class="commentary_btn question_btn">해설보기</button></div> -->
            <div class="right">
                <a href="../question/questionModify.php?q_ID=${questionNumber.q_ID}" id="revise_btn" class="question_btn">수정하기</a>
                <button type="button" id="delete_btn" class="question_btn" onclick="return userWirteQuestionRemove(${questionNumber.q_ID});">삭제하기</button>
            </div>
        </div>
        <div class="commentary_area show comment${questionNumber.q_ID}" style="margin-bottom: 80px;">
            <p>${questionNumber.q_comment}</p>
        </div></div>
        `;

        output.push(txt);
      });
      $(".user_question .container").html(output.join(' '));
    }
    //1. 화면에 뿌리기  --클리어
    //2. 여러문제 나오게 하기
    //3. 수정하기
    //4. 삭제하기
    //DB에서 문제 가져오기
    function dataReady() {
      $.ajax({
        url: "userWirteQuestionView.php", //통신할 url
        method: "POST", //통신할 메서드 타입
        data: "", //전송할 데이타
        dataType: "json",
        success: function (data) {
          quiz = data.question;
          updateQuiz(quiz);
          //  dataView(quiz);
          //  answer = quiz.q_answer;
        },
        error: function (reqeust, status, error) {
          console.log('reqeust' + reqeust);
          console.log('status' + status);
          console.log('error' + error);
        }
        //문제 출력하기
      });
    }
    dataReady();

    //해설보기
    // function commentaryShow() {
    //   $(".commentary_area").toggleClass("show");
    // }
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
        }
        $(window).scrollTop(0);
        check = true;
      }
    }

    //click event
    //해설보기
    $(document).on("click",commentaryBtn,function(){
      console.log(commentaryBtn);
    });
    //채점하기
    gradingBtn.click(grading);

    //삭제하기 경고창
    function userWirteQuestionRemove(q_ID) {

      const txt = "정말 삭제하시겠습니까?";
      let result = confirm(txt);

      if (result == true) {
        location = 'userWirteQuestionRemove.php?q_ID='+q_ID;
      } else {
        return false;
      }

      return result;
    }
  </script>
</body>

</html>