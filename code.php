<?php include "header.php";
include('./database.php');
error_reporting(false);

?>
    
<?php 
session_start();

if (isset($_SESSION['useremail'])) {
    $email= $_SESSION['useremail'];
   // <?php echo $email; 
}

?>

<section class="login-section">
    
  <div>
  <form action="code.php" method="POST" autocomplete="off" class="sig-up-pas">

        <h2 class="login-title titlee "> صفحة كود التحقق  </h2> 
        <div class="login-content contentt">
             
              <div class=" login-email text-field">
                <label for="email" class="my-3 style-label">  رمز التحقق:</label>
                <input type="text" name="OTPverify"  class="form-control "  placeholder="أدخل رمز التحقق " required>
              
<!--                  
                     <div id="alert"> تم ارسال كود للايميل   </div> -->
                     <?php
                     
            if(isset($_POST['verifyEmail'])){
                $OTPverify = mysqli_real_escape_string($con,$_POST['OTPverify']);
                $verifQuery ="SELECT * from users where code = $OTPverify";
                $runVerifyQuery = mysqli_query($con, $verifQuery);
                if($runVerifyQuery){
                   if(mysqli_num_rows($runVerifyQuery) > 0){
                       $newQuery = "UPDATE users SET code = 0";
                       mysqli_query($con,$newQuery);
                       header('location: resetpassword.php');
                   }else{
                    ?>
                    <div id="alert"> الكود خطأ</div>

                <?php
                   }
               
                }else{
                    ?>
                    <div id="alert"> خطأ الكود</div>
            <?php
                }
            }
            
            
            
            
            
            
            
            ?>
              </div>
              <div id="div2" style="color: crimson;"></div>
              <button type="submit"name="verifyEmail" class="btn btn-success button-giris mt-2" id="btncheck2">افحص</button>
        </div>
    </div>
    
     
            </form>

</section>


<?php include "footer.php"
?>