<?php include "header.php";
include('./database.php');

?>
<?php
session_start();
if (isset($_SESSION['useremail'])) {
  $_SESSION['useremail'];

  


?>
  <section>
    <div class="page">
      <div class="main-menu fixed-top ">
        
          <nav class=" navbar navbar-expand-lg navbar-light bg-light  bg-white ">

            <a class="navbar-brand mr-5 " href="#"><img style="height: 50px;" src="./images/1624292664814.png-min.jpg"
                alt="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="pl-5 row col justify-content-start">
              <div class="cc collapse navbar-collapse pl-5 " id="navbarSupportedContent">

                <div class="mr-auto "></div>

                <ul class="navbar-nav">
                                  
                  <form class="form-inline m3-5 col justify-content-between my-2 my-lg-0 text-center">
                    <input class="form-control  text-right mr-1" type="search" placeholder="ابحث" aria-label="Search" style="width: 500px;border-radius: 20px;font-family: initial; font-size: 18px; ">
                  </form>
                  
                  <li class="nav-item mr-2 text-center">
                    <a class="nav-link" href="indexs.php#exams">اختبارات</a>
                  </li>
                  <li class="nav-item mr-2 text-center">
                    <a class="nav-link" href="indexs.php#books">الكتب</a>
                  </li>
                  <li class="nav-item mr-2 text-center">
                    <a class="nav-link" href="indexs.php#lessons">الدروس</a>
                  </li>

               
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

  ?>
  <div class="center ">
   
      <div class="">
        <p  class="title text-success "><b>اهلا وسهلا بكم في موقعنا التعليمي</b></p>
        <h3 class="title1 text-dark">هيا لنتعلم العربية</h3>
      </div>



      <div class="container ">
        <div class="img1 row">
          <div class="col-xs-12 col-sm-4 col-lg-4">
            <a href="indexs.php#lessons"><img style="height: 150px; width: 150; border-radius: 40px;" src="./images/images4.png" alt="logo"></a>
          </div>
          <div class="col-xs-12 col-sm-4 col-lg-4">
          <a href="indexs.php#exams"><img style="height: 150px; width: 150;border-radius: 40px;" src="./images/images.png" alt="logo"></a>
          </div>
          <div class="col-xs-12 col-sm-4 col-lg-4">
          <a href="indexs.php#books"><img style="height: 150px; width: 150;border-radius: 40px;" src="./images/books-hero.jpg" alt="logo"></a>
          </div>

        </div>
      
    </div>



  </div>

  <a name="lessons" style="font-size: 20px; "></a>
  <div class="center" >
    

    <div class="lesons container ">
      <h2 class="bb1text">dersler kısmı</h2>

      <div class="img1 row">
        <div class="col-xs-12 col-sm-4 col-lg-4">
        <a href="lessonanimal.php">
          <img style="height: 150px; width: 150px; border-radius: 30px;"
            src="./images/a457fa00-c542-4b9d-92b1-e6ca18c7a9b8.jpg" alt="logo">
        </a>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-4">
        <a href="lessonfruit.php">
          <img style="height: 150px; border-radius: 30px;" src="./images/79e87804-f893-46a8-a76e-1a9c50937cf1.jpg"
            alt="logo">
        </a>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-4">
        <a href="lessonnumber.php">
          <img style="height: 150px; width: 150px; border-radius: 30px;"
            src="./images/most-important-6-information-about-primes-characteristics.jpg" alt="logo">
        </a>
        </div>

      </div>
    </div>
    <div class="container ">
      <div class="img1 row">
        <div class="col-xs-12 col-sm-4 col-lg-4">
        <a href="lessonletter.php">
          <img style="height: 150px; width: 150px; border-radius: 30px;" src="./images/harefler.jpg" alt="logo">
          </a>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-4">
        <a href="lessonquran.php">
          <img style="height: 150px; width: 150px; border-radius: 30px;"
            src="./images/a4289cd2-5a45-4269-ba9a-016fb715f609.jpg" alt="logo">
         </a>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-4">
        <a href="lessongramer.php">
          <img style="height: 150px; width: 150px; border-radius: 30px;"
            src="./images/bceedb8c-584b-42d0-a4fd-b43623d5999f.jpg" alt="logo">
        </a>
        </div>

      </div>
    </div>

  </div>
  <a name="exams" style="font-size: 20px; "></a>
  <div class="center ">
   

    <div class="exams container ">
      <h2 class="bb1text">testler kısmı</h2>

      <div class="img1 row">
        <div class="col-xs-12 col-sm-4 col-lg-4">
        <a href="exams (1).php?exam_id=3">
          <img style="height: 150px; width: 150px; border-radius: 30px;"
            src="./images/a457fa00-c542-4b9d-92b1-e6ca18c7a9b8.jpg" alt="logo">
            </a>  
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-4">
        <a href="exams (1).php?exam_id=6">
          <img style="height: 150px; border-radius: 30px;" src="./images/79e87804-f893-46a8-a76e-1a9c50937cf1.jpg"
            alt="logo">
            </a>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-4">
        <a href="exams (1).php?exam_id=4">

          <img style="height: 150px; width: 150px; border-radius: 30px;"
            src="./images/most-important-6-information-about-primes-characteristics.jpg" alt="logo"> 
            </a>
        </div>

      </div>
    </div>
    <div class="container ">
      <div class="img1 row">
        <div class="col-xs-12 col-sm-4 col-lg-4">
        <a href="exams (1).php?exam_id=5">
          <img style="height: 150px; width: 150px; border-radius: 30px;" src="./images/harefler.jpg" alt="logo"></a>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-4">
        <a href="exams (1).php?exam_id=8">
          <img style="height: 150px; width: 150px; border-radius: 30px;"
            src="./images/a4289cd2-5a45-4269-ba9a-016fb715f609.jpg" alt="logo"></a>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-4">
        <a href="exams (1).php?exam_id=7">
          <img style="height: 150px; width: 150px; border-radius: 30px;"
            src="./images/bceedb8c-584b-42d0-a4fd-b43623d5999f.jpg" alt="logo"></a>
        </div>

      </div>
    </div>

  </div>
  <a name="books" style="font-size: 20px; "></a>
  <div class="center ">
    

    <div class="books container ">
      <h2 class="bb1text">kitaplar kısmı</h2>

      <div class="img1 row">
        <div class="col-xs-12 col-sm-4 col-lg-4">
        <a href="bookanimal.php">
          <img style="height: 150px; width: 150px; border-radius: 30px;"
            src="./images/a457fa00-c542-4b9d-92b1-e6ca18c7a9b8.jpg" alt="logo">
        </a>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-4">
        <a href="bookfruit.php">
          <img style="height: 150px; border-radius: 30px;" src="./images/79e87804-f893-46a8-a76e-1a9c50937cf1.jpg"
            alt="logo">
        </a>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-4">
        <a href="booknumber.php">
          <img style="height: 150px; width: 150px; border-radius: 30px;"
            src="./images/most-important-6-information-about-primes-characteristics.jpg" alt="logo">
        </a>
        </div>

      </div>
    </div>
    <div class="container ">
      <div class="img1 row">
        <div class="col-xs-12 col-sm-4 col-lg-4">
        <a href="bookletter.php">
          <img style="height: 150px; width: 150px; border-radius: 30px;" src="./images/harefler.jpg" alt="logo">
          </a>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-4">
        <a href="bookquran.php">
          <img style="height: 150px; width: 150px; border-radius: 30px;"
            src="./images/a4289cd2-5a45-4269-ba9a-016fb715f609.jpg" alt="logo">
          </a>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-4">
        <a href="bookgramer.php">
          <img style="height: 150px; width: 150px; border-radius: 30px;"
            src="./images/bceedb8c-584b-42d0-a4fd-b43623d5999f.jpg" alt="logo">
          </a>
        </div>

      </div>
    </div>

  </div>



  <?php
   } else {
    header('Location: login.php');
    exit();
}
  
  include "footer.php"

  ?>