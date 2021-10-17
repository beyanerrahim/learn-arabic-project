<?php include "header.php";
include('./database.php');
include './Admin/sendEmail.php';


?>
        <?php 
        session_start();
        ?>    

<section class="login-section">  
  <div>
        <h2 class="login-title titlee "> صفحة التحقق من الإيميل</h2> 
        <div class="login-content contentt">
        <form action="" method="POST" autocomplete="off">

              <div class=" login-email text-field">
                <label for="email" class="my-3 style-label"> بريدك الالكتروني:</label>
                <input type="text"  class="form-control  " id="email" name="email" placeholder="أدخل بريدك الالكتروني" required>
              </div>
              <div id="div1" style="color: rgb(214, 45, 15);"></div>
              <button type="submit" id="sendEmail1"  name="sendEmail" class="btn btn-success button-giris mt-2" id="btncheck" >تحقق</button>
              <?php



if (isset($_POST['sendEmail'])) {
    $email = $_POST['email'];
    $_SESSION['useremail']=$email;

    $emailCheckQuery = "Select * from users where user_email = '$email'";
    $emailCheckResult = mysqli_query($con, $emailCheckQuery);
    while($res= mysqli_fetch_array($emailCheckResult)){
        $username =$res["user_name"];
    }
    if ($emailCheckResult) {
        if (mysqli_num_rows($emailCheckResult) > 0) {
            $code = rand(999999, 111111);
            $updateQuery = "UPDATE users SET code = $code where user_email = '$email'";
            $updateResult = mysqli_query($con, $updateQuery);
            if ($updateResult) {
                $subject = 'لأعادة انشاء كلمة السر';
                $message = "من اجل اعادة كلمة المرور استخدم هذا الكود $code";

                if (send_mail1($email,$username,$subject,$message)) {
               


                    header('location: code.php');
                }else{
                    ?>
                    <div id="alert">فشلت عملية ارسال الكود</div>
                    <?php 
                }
            } else {
                ?>
                   <div id="alert">فشلت عملية ارسال الكود</div>

                <?php 
               
            }
        } else {
            ?>
                 <div id="alert">ايميل غير صحيح</div>

            <?php 
         }
    } else {
        ?>
                <div id="alert">فشلت عملية تحقق من الايميل</div>
        <?php 
       
    }
}



?>
        </form>
        </div>

    </div>
</section>



<?php include "footer.php"
?>