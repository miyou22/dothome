<?php
  include "../connect/connect.php";
  include "../connect/session.php";
  include "../connect/sessionCheck.php";
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
    <main id="questionWriteMain">
        <div class="container">
            <div class="questionWriteTitle">
                <h1>문제 만들기</h1>
            </div>
            <div class="questionWriteContent">
                <form action="questionWriteSave.php" name="questionWrite" method="post" onsubmit="return questionWriteCheck();">
                    <fieldset>
                        <label for="quesWrite_select" class="ir_so">문제 과목 선택</label>
                        <select name="quesWrite_select" id="quesWrite_select" class="quesWrite_select">
                            <option disabled selected>문제의 과목을 선택해주세요.</option>
                            <option value="1">1과목 소프트웨어 설계</option>
                            <option value="2">2과목 소프트웨어 개발</option>
                            <option value="3">3과목 데이터베이스 구축</option>
                            <option value="4">4과목 프로그래밍 언어 활용</option>
                            <option value="5">5과목 정보시스템 구축 관리</option>
                        </select>
                        <legend class="ir_so">문제 만들기 글쓰기 영역입니다.</legend>
                        <div>
                            <label for="board_problem">문제</label>
                            <textarea name="board_problem" id="board_problem" class="problem-text" rows="5"
                                placeholder="문제를 작성해주세요" required></textarea>
                        </div>

                        <div>
                            <label for="board_example">보기<p>※ 보기가 없으면 작성하지않으셔도 무관합니다.</p></label>
                            <textarea name="board_example" id="board_example" class="example-text" rows="6"
                                placeholder="보기를 작성해주세요"></textarea>
                        </div>

                        <div class="question_choice">
                            <label for="select1">
                                <input class="choie_radio" type="radio" name="select" id="select1" value="1">
                                <span><input type="text" name="choie-list1" id="choie-list1" class="choie-list"
                                        placeholder="예시를 작성해주세요" required></span>
                            </label>
                            <label for="select2">
                                <input class="choie_radio" type="radio" name="select" id="select2" value="2">
                                <span><input type="text" name="choie-list2" id="choie-list2" class="choie-list"
                                        placeholder="예시를 작성해주세요" required></span>
                            </label>
                            <label for="select3">
                                <input class="choie_radio" type="radio" name="select" id="select3" value="3">
                                <span><input type="text" name="choie-list3" id="choie-list3" class="choie-list"
                                        placeholder="예시를 작성해주세요" required></span>
                            </label>
                            <label for="select4">
                                <input class="choie_radio" type="radio" name="select" id="select4" value="4">
                                <span><input type="text" name="choie-list4" id="choie-list4" class="choie-list"
                                        placeholder="예시를 작성해주세요" required></span>
                            </label>
                        </div>

                        <div>
                            <label for="board_commentary">해설</label>
                            <textarea name="board_commentary" id="board_commentary" class="commentary-text" rows="8"
                                placeholder="해설을 작성해주세요" required></textarea>
                        </div>
                        <button type="submit" class="board-btn" value="작성완료">작성완료</button>
                    </fieldset>
                </form>
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
    <script src="../assets/js/common.js"></script>
    <script>
        function questionWriteCheck() {
            let select = $("input[name='select']:checked").val();
            let subject = $("#quesWrite_select option:selected").val();

            if (select == null || select == "") {
                alert("문제의 정답을 선택해주세요");
                return false;
            }

            if (subject == null || subject == "") {
                alert("문제의 과목을 선택해주세요");
                return false;
            }
        }
    </script>
</body>

</html>