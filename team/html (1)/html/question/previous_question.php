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
</head>

<body>
    <header id="header">
        <?php
          include "../include/header.php";
        ?>
    </header>
    <banner class="prebanner">
        <div class="container">
            <div class="rName">
                <p class="rTitle">기출문제</p>
                <p class="rSub">기출문제를 풀어봅시다.</p>
            </div>
        </div>
    </banner>
    <main class="preMain">
        <div class="container">
            <div class="preLeft">
                <div class="preQuizWrap">
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
                    </div>
                    <div class="preQuestion__quiz">
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
                <div class="answer__box">
                    <div class="preQuestion__number">1.</div>
                    <div class="preQuestion__number_answer">①</div>
                </div>
                <div class="answer__box">
                    <div class="preQuestion__number">2.</div>
                    <div class="preQuestion__number_answer">②</div>
                </div>
                <div class="answer__box">
                    <div class="preQuestion__number">3.</div>
                    <div class="preQuestion__number_answer">③</div>
                </div>
                <div class="answer__box">
                    <div class="preQuestion__number">4.</div>
                    <div class="preQuestion__number_answer">④</div>
                </div>
                <div class="preAnswerSend">답안지 제출</div>
            </div>
        </div>
    </main>
    <footer>
      <?php
        include "../include/footer.php";
      ?>
    </footer>

    <script src="../assets/js/jquery.min_1.12.4.js"></script>
    <script src="../assets/js/common.js"></script>
    <script>
        //선택자
        const preQuizWrap = document.querySelector(".preQuizWrap");

        let quizInfo = [];


        $.getJSON('../assets/json/previous_questions.json', function(data){
            console.log(data.data[0].question);
            quizInfo = data.data[0].question;

            
        });


        //문제 정보
        // const quizInfo = [
        //     {
        //         quizNum: 1,
        //         quizAsk: "다음 중 디자인의 기본 요소들로 옳은 것은?",
        //         quizChoice: {
        //             1: "선, 색체, 공간, 수량",
        //             2: "점, 선, 면, 질감",
        //             3: "시간, 수량, 구조, 공간",
        //             4: "면, 구조, 공간, 수량"
        //         },
        //         quizAnswer: 2,
        //         quizEx: "디자인의 기본 요소는 점, 선, 면, 질감으로 이루어져 있습니다."
        //     },
        //     {
        //         quizNum: 2,
        //         quizAsk: "다음 중 시각 디자인의 4대 매체가 아닌 것은?",
        //         quizChoice: {
        //             1: "포스터 디자인",
        //             2: "신문 광고 디자인",
        //             3: "TV 광고 디자인",
        //             4: "텍스타일 디자인"
        //         },
        //         quizAnswer: 4,
        //         quizEx: "시각 디자인의 4대 매체는 포스터 디자인, 신문 광고 디자인, TV 광고 디자인, 잡지 광고 디자인입니다."
        //     },
        //     {
        //         quizNum: 3,
        //         quizAsk: "다음과 가장 관계 있는 디자인 원리는? [바다 위의 빨깐 등대, 무성한 나뭇잎들 사이에서 핀 꽃, 별이 총총한 밤하늘에 뜬 달, 평평한 벽에 생긴 갈라진 틈 등]",
        //         quizChoice: {
        //             1: "조화",
        //             2: "통일",
        //             3: "점증",
        //             4: "강조"
        //         },
        //         quizAnswer: 4,
        //         quizEx: "시각 디자인의 4대 매체는 포스터 디자인, 신문 광고 디자인, TV 광고 디자인, 잡지 광고 디자인입니다."
        //     }
        // ]

        //문제 만들기
        function updateQuiz() {
            const output = [];

            quizInfo.forEach((currentQuestion, questioinNumber) => {
                output.push(`
                        <div class="preQuestion__quiz">
                            <h3 class="preQuestion__title">
                                <span class="preQuestion__title__num">${currentQuestion.num}</span>
                                <span class="preQuestion__title__ask">${currentQuestion.ask}</span>
                            </h3>
                            <div class="preQuestion__answer">
                                <div class="preQuestion__answer__selects">
                                    <label>
                                        <input class="select" type="radio" name="select${questioinNumber}" value="1"/>
                                        <span class="choice">${currentQuestion.choice[1]}</span>
                                    </label>
                                    <label>
                                        <input class="select" type="radio" name="select${questioinNumber}" value="2">
                                        <span class="choice">${currentQuestion.choice[2]}</span>
                                    </label>
                                    <label>
                                        <input class="select" type="radio" name="select${questioinNumber}" value="3">
                                        <span class="choice">${currentQuestion.choice[3]}</span>
                                    </label>
                                    <label>
                                        <input class="select" type="radio" name="select${questioinNumber}" value="4">
                                        <span class="choice">${currentQuestion.choice[4]}</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                `)
            });
            preQuizWrap.innerHTML = output.join(' ');
        }
        updateQuiz();
    </script>

</body>

</html>