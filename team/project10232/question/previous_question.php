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

    <!-- style -->
    <link rel="stylesheet" href="../assets/css/font.css">
    <link rel="stylesheet" href="../assets/css/common.css">
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sticky-sidebar/3.3.1/sticky-sidebar.min.js"></script>

</head>

<body>
    <header id="header">
        <?php
          include "../include/header.php";
        ?>
    </header>
     
    <div class="random_head">
      <div class="container">
        <h1 id="random_title">기출문제</h1>
        <span id="random_desc">기출문제를 풀어봅시다.</span>

        <div class="select_subject">
          <label for="random_subject" class="ir_so">문제 과목 선택</label>
          <select name="random_subject" id="random_subject" class="random_subject">
            <option value="0">모의고사 문제 풀기</option>
            <option value="1">2021년 3회차 모의고사</option>
            <option value="2">2021년 2회차 모의고사</option>
            <option value="3">2021년 1회차 모의고사</option>
            <option value="4">2020년 3회차 모의고사</option>
            <option value="5">2020년 2회차 모의고사</option>
          </select>
        </div>
      </div>
    </div>
    <main class="preMain">
        <div class="container">
            <div class="preLeft">
                <div class="preQuizWrap">
                    <!-- <div class="preQuestion__quiz">
                        <h3 class="preQuestion__title">
                            <span class="preQuestion__title__num"></span>
                            <span class="preQuestion__title__ask"></span>
                        </h3>
                        <div class="PreQuestion_desc">
                            <h4>&lt;보기&gt;</h4>
                            <p></p>
                        </div>
                        <div class="preQuestion__answer">
                            <div class="preQuestion__answer__selects">
                                <label for="select1">
                                    <input class="select" type="radio" name="select" id="select1" value="1">
                                    <span class="choice"></span>
                                </label>
                                <label for="select2">
                                    <input class="select" type="radio" name="select" id="select2" value="2">
                                    <span class="choice"></span>
                                </label>
                                <label for="select3">
                                    <input class="select" type="radio" name="select" id="select3" value="3">
                                    <span class="choice"></span>
                                </label>
                                <label for="select4">
                                    <input class="select" type="radio" name="select" id="select4" value="4">
                                    <span class="choice"></span>
                                </label>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="preQuestion__quiz">
                        <h3 class="preQuestion__title">
                            <span class="preQuestion__title__num">1</span>
                            <span class="preQuestion__title__ask">병행제어 기법 중 로킹(Locking) 기법에 대한 설명으로 옳지 않은 것은?</span>
                        </h3>
                        <div class="preQuestion__answer">
                            <div class="preQuestion__answer__selects">
                                <label for="select1">
                                    <input class="select" type="radio" name="select" id="select1" value="1"/>
                                    <span class="choice">로킹의 대상이 되는 객체의 크기를 로킹 단위라고 한다.</span>
                                </label>
                                <label for="select2">
                                    <input class="select" type="radio" name="select" id="select2" value="2">
                                    <span class="choice">로킹 단위가 작아지면 병행성 수준이 높아진다.</span>
                                </label>
                                <label for="select3">
                                    <input class="select" type="radio" name="select" id="select3" value="3">
                                    <span class="choice">로킹 단위가 커지면 로킹 오버헤드가 증가한다.</span>
                                </label>
                                <label for="select4">
                                    <input class="select" type="radio" name="select" id="select4" value="4">
                                    <span class="choice">데이터베이스도 로킹 단위가 될 수 있다.
                                    </span>
                                </label>
                            </div>
                        </div> 
                    </div> -->
                </div>
            </div>
            <div class="preAnswer">
                <!-- <div class="answer__box">
                    <div class="preQuestion__number">1.</div>
                    <div class="preQuestion__number_answer"></div>
                </div> -->
                <!-- <div class="preAnswerSend">답안지 제출①</div> -->
            </div>
        </div>
    </main>
    <footer id="footer">
      <?php
        include "../include/footer.php";
      ?>
    </footer>
    <script src="../assets/js/jquery.min_1.12.4.js"></script>
    <script src="../assets/js/common.js"></script>
    <script>
        //선택자
        const preQuizWrap = $(".preQuizWrap");
        const preQuestionQuiz = $(".preQuestion__quiz");
        const preQuestionTitle = $(".preQuestion__title");
        const num = $(".preQuestion__title__num");
        const ask = $(".preQuestion__title__ask");
        const qDesc = $(".preQuestion__quiz .PreQuestion_desc");
        const questionDesc = $(".preQuestion__quiz .PreQuestion_desc p");
        const choicesTxt = $(".preQuestion__answer__selects .choice");

        //    const quizInfo = data.data;
        //    num.text(quizInfo[0].question[0].num);
        //    ask.text(quizInfo[0].question[0].ask);
        //    if(quizInfo[0].question[0].desc == "" ){
        //         $(".PreQuestion_desc").css({"display":"none"});
        //    } else {
        //         $(".PreQuestion_desc").css({"display":"block"});
        //        questionDesc.text(quizInfo[0].question[0].desc);
        //    };
        //    choicesTxt.each(function(i){
        //       $(this).text(quizInfo[0].question[0].choice[i+1]);
        //    }); 
        // });



        //json 문제출력
        $.getJSON('../assets/json/previous_questions.json', function(data){
            const quizInfo = data.data[0].question; 
           
            function updateQuiz() {
                const output = [];
                const answerBox = [];
                $.each(quizInfo, function(currentQuestion, questionNumber){
                    let txt = `
                        <div class="preQuestion__quiz">
                            <h3 class="preQuestion__title">
                                <span class="preQuestion__title__num">${questionNumber.num}</span>
                                <span class="preQuestion__title__ask">${questionNumber.ask}</span>
                            </h3>`;
                    if(questionNumber.desc){
                        txt += `<div class="preQuestion_desc">
                                    <h4>&lt;보기&gt;</h4>
                                    <p>${questionNumber.desc}</p> 
                                </div>`;
                    }
                    txt += `
                                <div class="preQuestion__answer">
                                    <div class="preQuestion__answer__selects">
                                        <label>
                                            <input class="select" type="radio" name="select${questionNumber.num}" value="1" >
                                            <span class="choice">${questionNumber.choice[1]}</span>
                                        </label>
                                        <label>
                                            <input class="select" type="radio" name="select${questionNumber.num}" value="2">
                                            <span class="choice">${questionNumber.choice[2]}</span>
                                        </label>
                                        <label>
                                            <input class="select" type="radio" name="select${questionNumber.num}" value="3">
                                            <span class="choice">${questionNumber.choice[3]}</span>
                                        </label>
                                        <label>
                                            <input class="select" type="radio" name="select${questionNumber.num}" value="4">
                                            <span class="choice">${questionNumber.choice[4]}</span>
                                        </label>
                                    </div>
                                </div>
                            </div>  
                    `;

                    output.push(txt);

                    //omr 체크 박스
                    answerBox.push(`<div class="answer__box">
                        <div class="preQuestion__number">${questionNumber.num}.</div>
                        <div class="preQuestion__number_answer"></div></div>`
                    );
                });
            preQuizWrap.html( output.join(' ') );
            $(".preAnswer").html(answerBox.join(' ')+"<div class='preAnswerSend'>답안지 제출①</div>");
            }
            updateQuiz();
        })

        //라디오박스 체크값 가져오기
        var ab = $("input:radio[name='select1']").is(":checked");
        $("input:radio[name='select1']").click(function(){console.log(ab);}); 
        
        //스티커.
    //     var sidebar = new StickySidebar('.preMain', {
    //     containerSelector: '.container',
    //     innerWrapperSelector: '.preAnswer',
    //     topSpacing: 20,
    //     bottomSpacing: 20
    // });
        
    </script>

</body>

</html>