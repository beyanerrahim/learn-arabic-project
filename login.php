<?php include "header.php";
include('./database.php');

?>
<?php 
session_start();

if (isset($_SESSION['useremail'])) {

}if (isset($_SESSION['useremail'])) {
 

}

?>
<section class="login-section">

  <div>



    <form method="post">
      <h2 class="login-title titlee "> صفحة تسجيل الدخول</h2>
      <div class="login-content contentt">

        <div class=" login-email text-field">

          <label for="email" class="my-3 style-label"> بريدك الالكتروني:</label>
          <input type="text" class="form-control  " name="email" placeholder="أدخل بريدك الالكتروني">
        </div>
        <?php




        $password = "";
        $useremail = "";

        if (isset($_POST["email"])) {

          $useremail = $_POST['email'];
        }

        if (isset($_POST["password"])) {

          $password =  $_POST['password'];
        }


        if (isset($_POST["loginbutton"])) {
        
            $sifrelipassword=md5($password);
            $_SESSION['useremail']= $useremail;
            $useremailselect = "select * from users where user_email = '$useremail'";
            $result0 = mysqli_query($con, $useremailselect);
            $num0 = mysqli_num_rows($result0);
            if ($num0 == 1) {
             
              $userselect = "select * from users where user_email = '$useremail' and user_password = '$sifrelipassword' and rol_id=0";
              $adminselect = "select * from users where user_email = '$useremail' and user_password = '$sifrelipassword' and rol_id=1";

              $result1 = mysqli_query($con, $userselect);
              $result2 = mysqli_query($con, $adminselect);
              $num1 = mysqli_num_rows($result1);
              $num2 = mysqli_num_rows($result2);
              if ($num1 == 1 ) {
                $_SESSION['useremail']=$useremail;

               header('Location:indexs.php');
           } 
           elseif($num2 == 1 ){
                $_SESSION['adminemail']=$useremail;
                header('Location:Admin/dashboard.php'); //Redirect To Dashboard Page
              }
           else {
        ?>      
              <a id="alert">تأكد من كلمة السر</a>
            <?php
            }
          } else {

            ?>
            <div id="alert">تأكد من الايميل</div>
        <?php
          }
        }
      
      
       
     
        ?>
        <div class="login-password text-field">
          <label for="password" class="my-3 style-label"> كلمة المرور:</label>
          <input type="password" class="form-control " name="password" placeholder="أدخل كلمة المرور">
        </div>
        <p class="login-label mt-2 style-label">نسيت كلمة السر:<a href="checkemail.php"> اضغط هنا</a></p>

        <button type="submit" class="btn btn-success 
              button-giris" name="loginbutton">دخول</button>

      </div>
    </form>
  </div>
</section>





<?php include "footer.php"
?>