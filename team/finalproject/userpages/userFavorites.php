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
  <title>정신머리 | 마이페이지:즐겨찾기</title>

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
            <li class="active"><a href="userFavorites.php">문제 즐겨찾기</a></li>
            <li><a href="userWirteQuestion.php">내가 작성한 문제</a></li>
        </ul>
        </div>
    </nav>
    <div class="random_head">
      <div class="container">
        <h1 id="random_title">문제 즐겨찾기</h1>
        <span id="random_desc">내가 즐겨찾기한 문제</span>
      </div>
    </div>
    <!-- <div class="random_question">
      <div class="container">
        <div class="question">
          <div class="question_area"> -->
                <?php
                  $memberID = $_SESSION['myMemberID'];

                  $sql = "SELECT q_ID, q_ask, q_desc, q_choice1, q_choice2, q_choice3, q_choice4, q_answer, q_comment, f.favor_ID, f.myMemberID ";
                  $sql .= "FROM question q JOIN Favorites f ON(q.q_ID = f.favor_ID) WHERE f.myMemberID = {$memberID} ";

                  $result = $connect -> query($sql);

                  $result_set = mysqli_query($connect, $sql);
                  $row = mysqli_fetch_assoc($result_set);

                  // if($result){
                  //   echo "성공";
                  // } else {
                  //   echo "실패";
                  //   exit;
                  // }
                
                
                
                  // if($info['myMemberID'] == $_SESSION['myMemberID']){
                    if($result){
                      $count = $result -> num_rows;
                      
                      if($count > 0){
                        for($i = 1; $i <= $count; $i++){
                          $row = $result -> fetch_array(MYSQLI_ASSOC);
                          
                            echo "<div class='random_question'>";
                            echo "<div class='container'>";
                            echo "<div class='question'>";
                            echo "<div class='question_area'>";
                            echo "<h3 class='question_title'>";
                            echo "<span class='question_title_num'>".$row['q_ID']."</span>";
                            echo "<span class='question_title_ask'>".$row['q_ask']."</span>";
                            echo "</h3>";
                            echo "<div class='result_img'>";
                            echo "<img src='../assets/img/o.svg' alt='정답' class='o'>";
                            echo "<img src='../assets/img/x.svg' alt='오답' class='x'>";
                            echo "</div>";
                            if($row['q_desc']){  
                                echo "<div class='question_desc'>";
                                echo "<h4>&lt;보기&gt;</h4>";
                                echo "<p>".$row['q_desc']."</p>";
                                echo "</div>";
                              }
                            echo "<div class='question_answer_selects'>";
                            echo "<label for='select1'>";
                            echo "<input type='radio' class='select' name='select' id='select1' value='1'><span class='choice'>".$row['q_choice1']."</span>";
                            echo "</label>";
                            echo "<label for='select2'>";
                            echo "<input type='radio' class='select' name='select' id='select2' value='2'><span class='choice'>".$row['q_choice2']."</span>";
                            echo "</label>";
                            echo "<label for='select3'>";
                            echo "<input type='radio' class='select' name='select' id='select3' value='3'><span class='choice'>".$row['q_choice3']."</span>";
                            echo  "</label>";
                            echo "<label for='select4'>";
                            echo "<input type='radio' class='select' name='select' id='select4' value='4'><span class='choice'>".$row['q_choice4']."</span>";
                            echo "</label>";
                            echo "</div>";
                            echo "</div>";
                            echo "<div class='question_side_menu'>";
                            echo "<div class='share'>";
                            echo "<h4 class='ir_so'>공유하기</h4>";
                            echo "<span></span>";
                            echo "</div>";
                            echo "<div class='favorites like'>";
                            echo "<h4 class='ir_so'>즐겨찾기</h4>";
                            echo "<span></span>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "<div class='commentary_area view'>";
                            echo "<p><span>정답 : ".$row['q_answer']."<br></span>".$row['q_comment']."</p>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                        }
                      }
                    }
                  
                ?>
            <!-- <h3 class="question_title">
              <span class="question_title_num"></span>
              <span class="question_title_ask"></span>
            </h3>
            <div class="result_img">
              <img src="../assets/img/o.svg" alt="정답" class="o">
              <img src="../assets/img/x.svg" alt="오답" class="x">
            </div>
            <div class="question_desc">
              <h4>&lt;보기&gt;</h4>
              <p><</p>
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
          <div class="left">
              <button type="button" id="commentary_btn" class="question_btn">해설보기</button>
        </div>
          <button type="button" id="grading_btn" class="question_btn">채점하기</button>
          <div class="right">
          </div>
        </div> -->
        <!-- <div class="commentary_area">
          <p></p>
        </div>
      </div>
    </div> -->
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
    const favorites = $(".question_side_menu .favorites");


    //즐겨찾기
    function favoriteCheck(){
      let q_ID = $(this).parent().siblings(".question_area").find(".question_title_num").text();
      console.log(q_ID);
      $.ajax({
        url: "../question/question_Favorites.php",
        method: "POST",
        data: {"type":"check","q_ID":q_ID},
        dataType: "json",
        success: function (data) {
          if(data.resultData == "insert"){
            favorites.addClass("like");
          } else if(data.resultData == "delete"){
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
    favorites.click(favoriteCheck);
    
  </script>
</body>
</html>