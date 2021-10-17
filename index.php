<?php include "header.php";
include('./database.php');

?>
    
     <!-- Header -->
     <nav class="fixed-top navbar navbar-expand-lg navbar-light bg-white">

         <div class="container">
        <a class="navbar-brand" href="#">
            <img src="images/logo1.jpg" alt="logo image" width="100px" height="60px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item  mar">
              <a class="nav-link active1 active link" href="#home">الصفحة الرئيسية <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item mar">
              <a class="nav-link link" href="#about"> حول </a>
            </li>
              <li class="nav-item mar">
                <a class="nav-link link" href="login.php">الدروس</a>
              </li>
              <li class="nav-item mar">
                <a class="nav-link link" href="login.php">الكتب</a>
              </li>
              <li class="nav-item mar">
                <a class="nav-link link" href="login.php">الاختبارات</a>
              </li>
              <li class="nav-item mar">
                <a class="nav-link link" href="#connectus"> تواصل معنا</a>
              </li>
              <li class="nav-item mar">
                <a class="nav-link link" href="register.php">انشاء حساب</a>
              </li>
              <li class="nav-item text-left ">
                <form action="login.php" method="POST">
                   <button class="btn btn-success my-2 my-sm-0" name="loginbuton1" onclick="fonlogin()" style="border-radius: 10px" type="submit" >تسجيل دخول</button>
                </form>
              </li>

          </ul>
          
        </div>
    </div>
      </nav>
 

      <!-- Home -->

      <section class="section home">
        <a name="home" href="#"></a>
       <div class="container">
          <div class="row">            
                  <div class="home-item">
                         <h2 class="pt-4"> موقع إقرأ لتعليم اللغة العربية</h2>
                         <p class="my-4">
                          موقع تعليمي مجاني لتشجيع الاطفال مادون 16 عام على حب وتعلم الغة العربية بأساليب سهلة ومبسطة
                          ويحتوي على العديد من الفيديوهات التعليمية والكتب والقصص الصور التي تساعد على تسهيل تلقي المعلومة 
                         </p>
                        <form action="register.php" method="POST">
                         <button class="btn btn-success btn1">هيا لنبدأ </button>
                        </form>
                  </div>
          </div>
       </div>
      </section>
    
    <!-- about -->

      <section class="section about" id="about"> 
        <div class="section-about">    
         <div class="container">
            <div class="row pt-5">
             <div class="col-md-5 col-12">
                  <div class="about-item">
                    <h2 class="section-title"> حول</h2> 
                    <p class="">
                                         فريق تعليمي متكامل ذو شهادات علمية متقدمة 
                           في اللغة العربية وعلوم القران وخبرة تزيد عن 10 أعوام في 
                        مجال التعليم نعمل معا لتقديم محتوى مجاني هادف يساعد الأطفال 
                          على تعلم وحب اللغة العربية وتنمية كافة المهارات التي يحتاجونها لذلك 
                        كمهارة النطق والاستماع وغيرها بـأساليب شيقة ومبسطة
                    </p>        
                  </div>
             </div>
             <div class="col-md-5 col-12">
                <div class="about-img">
                    <img src="images/about.jpg"  alt="arabic foto" class="w-100 pt-4"/>
                </div>  
            </div>
          </div>
      </section>

      <section class="section-connect section " id="connectus">

        <div class="container">

          <div class="row">            
            <div class="col-md-12 col-12">
              <div class="new-item">
                <h2 class="section-title my-4 "> تواصل معنا</h2> 
                <div class="row">
                  <form action="index.php#connectus" method="POST">
                    <div class="form-group">
                      <label for="exampleFormControlInput1">البريد الالكتروني:</label>
                      <input type="email" class="form-control input-connect" name="email" id="exampleFormControlInput1" placeholder="أدخل بريدك الالكتروني">
                    </div>
                    <?php
                    if(isset($_POST['send'])){
                       $useremail ="salialmolhem@gmail.com";
                       $username =$_POST['name'];
                       $usersubject =$_POST['subject'];
                       $usermassage =$_POST['massage'];
                       $sender = $_POST['email'];

                       $body= "";
                       $body .="From: ".$username. "\r\n";
                       $body .="Email: ".$sender. "\r\n";
                       $body .="Message: ".$usermassage. "\r\n";


                       if(empty($useremail) || empty( $usersubject) || empty( $username ) || empty( $usermassage)){
                         ?>
                         <div id ="alert">اضف جميع المعلومات</div>
                         <?php
                       }else{
                        $query = mysqli_query($con,"insert into massages (user_email , user_name , subject , massagefromuser , massagetouser) values ('$sender','$username','$usersubject','$usermassage','')");
                        mysqli_query($con, $query);?>
                              <div id="alert">تم الارسال بنجاح </div>
                              <?php
                            
                       }


                    }
                    
                    
                    ?>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">الاسم والكنية:</label>
                      <input type="text" class="form-control"name="name" id="name" id="exampleFormControlInput1" placeholder="أدخل اسمك">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">الموضوع:</label>
                      <input type="text" class="form-control"  name="subject" id="subject" placeholder="أدخل الموضوع">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1"> الرسالة:</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" name="massage" id="massage"  rows="5" placeholder="أدخل رسالتك"></textarea>
                    </div>
                    <button class="btn btn-success"name= "send" id="send">إرسال</button>
                  </form>              
    
                </div>
              </div>

            </div>
          </div>
        </div>
       

      </section>
      

      <?php include "footer.php"
?>


