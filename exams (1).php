<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <title>Document</title>
  <?php
  // $do = isset($_GET['do']) ? $_GET['do'] : 'Errer'; 
  // if ($do == 'leter'){
  session_start();
  if (isset($_SESSION['useremail'])) {
    $useremail = $_SESSION['useremail'];
    //  echo $useremail;
  }
  $exam_id = isset($_GET['exam_id']) && is_numeric($_GET['exam_id']) ? intval($_GET['exam_id']) : 0;
  // $exam_id=3;
  ?>
  <style>
    html {
      direction: rtl;
    }

    body {
      direction: rtl;
      font-family: "tajawal", sans-serif;
      text-align: right;
    }

    .sectiontitlebook {
      width: 100%;
      padding: 9px;
      color: green;
      /* box-shadow: 1px 2px 5px #dacfcf; */
    }

    .section-title-book {
      display: inline-block;
      text-align: left;
      width: 55%;
      font-size: 30px;
    }

    .link2 {
      display: inline-block;
      width: 40%;
      text-align: left;
    }

    .hover-title {
      color: green;
    }

    .hover-title:hover {
      color: darkmagenta;
    }

    .content-question {
      margin: 0 7%;
    }

    /* .button-gonder1{ margin: 0 7%;} */
  </style>
</head>

<body>
  <?php
  include 'database.php';

  $quereselectexamname = mysqli_query($con, "SELECT * FROM exams where exam_id =$exam_id");
  while ($res = mysqli_fetch_row($quereselectexamname)) {
    $examname = $res[1];
  }
  ?>
  <section>
    <div class="page">
      <div class="main-menu  ">

        <nav class=" navbar navbar-expand-lg navbar-light bg-light  bg-white ">

          <a class="navbar-brand mr-5 " href="#"><img style="height: 50px;" src="./images/1624292664814.png-min.jpg" alt="logo"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="pl-5 row col justify-content-start">
            <div class="cc collapse navbar-collapse pl-5 " id="navbarSupportedContent">

              <div class="mr-auto "></div>

              <ul class="navbar-nav">
              <li class="nav-item mr-2 text-center">
                    <a class="nav-link" href="profil.php">الملف الشخصي</a>
                  </li>
                <li class="nav-item mr-2 text-center">
                  <a class="nav-link" href="indexs.php">الصفحة الرئيسية <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item text-left ">
                  <form action="logout.php" method="POST">
                    <button class="btn btn-outline-danger my-2 my-sm-0" onclick="fonlogin()" style="border-radius: 10px; width: 70px; height: 40px;" type="submit">خروج</button>
                  </form>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </section>
  <?php
  if (isset($_POST['gonder'])) {
    $selectquery = "SELECT * FROM users WHERE user_email ='$useremail'";
    $que = mysqli_query($con, $selectquery);

    if ($res = mysqli_fetch_array($que)) {
      $useid = $res[0];
    }
    $examname=mysqli_query($con,"SELECT * FROM user_exam where users_id='$useid' And exams_id='$exam_id'");
    $nums= mysqli_num_rows($examname);
    if($nums == 1){
     
      ?>
      
     <h5 class="alert alert-danger text-center" >لا يسمح لك بأعادة الاختبار!!!!!</h5>
      <?php
    }else{
  ?>
    <h5 class="alert alert-success text-center" style="margin-top: 10px;">يمكنك رؤية علامتك من ملفك الشخصي</h5>


  <?php
  }} ?>
  <?php
  // $do = isset($_GET['do']) ? $_GET['do'] : 'Errer'; 
  // if ($do == 'leter'){

  error_reporting(false);
  $exam = @mysqli_query($con, "SELECT question, question_id FROM questions WHERE exam_id=$exam_id");
  if (@mysqli_num_rows($exam) == 0)
    echo "Errro: No lesson founded";
  else {
    $final = 0;

    $i = 1;

    while ($exams = @mysqli_fetch_array($exam)) {

      $ques = $exams['question'];
      $quesid = $exams['question_id'];
      //$ansera=$exams['answer_A'];
      //$anserb=$exams['answer_B'];
      //$anserc=$exams['answer_C'];
      //$ansertrue=$exams['answer_true'];
      //$quesscore=$exams['question_score'];
      //$examid=$exams['exam_id'];

  ?>
      <form method="POST">
        <div class="question">
          <h3 class="question_title  mb-1"><?php echo $i . " ." . $ques; ?></h3>



          <?php
          $anser = @mysqli_query($con, "SELECT answer_A, answer_B, answer_C,answer_true,question_score FROM questions WHERE question_id = $quesid ");
          while ($ans = @mysqli_fetch_array($anser)) {

            $ansera = $ans['answer_A'];
            $anserb = $ans['answer_B'];
            $anserc = $ans['answer_C'];
            $ansertrue = $ans['answer_true'];
            $questionscore = $ans['question_score'];
          ?>
            <div class="form-check form-check-inline" type="">
              <input type="radio" name=<?php echo $i ?> value="A">
              <?php echo "&ensp;" . $ansera; ?>
            </div>
             <div class="form-check form-check-inline" type="">
              <input type="radio" name=<?php echo $i ?> value="B">
              <?php echo "&ensp;" . $anserb; ?>
            </div>
             <div class="form-check form-check-inline" type="">
              <input type="radio" name=<?php echo $i ?> value="C">
              <?php echo "&ensp;" . $anserc; ?>
            </div>
            <?php
            //  $today= date("d/m/Y");
            // echo $today;
            $studentanswer = $_POST["$i"];
            //echo $studentanswer;
            if (isset($_POST['gonder'])) {
              if ($studentanswer == $ansertrue) {
                $r = " جواب صحيح";
            ?>
                <h6 style="color:green" class="mt-2">جواب صحيح</h6>
              <?php
                $final += $questionscore;
                //       $finally = $final;
              } else {
              ?>
                <h6 style="color:red" class="mt-2">جواب خاطئ الاجابة الصحيحة هي :<?php echo $ansertrue; ?></h6>
            <?php
              }
            }



            ?>

            <?php $i = $i + 1 ?>
        </div>
        <hr> <br>
    <?php
          }
        }
      $resw= $final;

    ?>
 
  <?php
if (isset($_POST['gonder'])) {

   
    //  echo "hello" . $_POST["puan"];
    //  $finallyy = $_POST["puan"];
    //  echo "hi" . $finally;

    $selectquery = "SELECT * FROM users WHERE user_email ='$useremail'";
    $que = mysqli_query($con, $selectquery);

    if ($res = mysqli_fetch_array($que)) {
      $useid = $res[0];
    }
   
    $insertqu = "insert into user_exam ( users_id , exams_id , degree ) values('$useid','$exam_id','$final')";
    mysqli_query($con, $insertqu);
  }}

  ?> <button type="submit" class="btn btn-success button-gonder1" name='gonder'>أرسال</button>

      </form>





      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>

</html>