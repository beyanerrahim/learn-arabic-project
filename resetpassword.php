<?php include "header.php";
include('./database.php');

?>
<?php
session_start();
if (isset($_SESSION['useremail'])) {
   // echo $_SESSION['useremail'];
}
?>

<section class="login-section" style="direction: rtl;">
    <form action="resetpassword.php" method="post" autocomplete="off">

        <div>
            <h2 class="login-title titlee "> صفحة إعادة تعيين كلمة المرور</h2>
            <div class="reset-content contentt">
            <?php
        if (isset($_POST['changePassword'])) {

            $password =md5($_POST['password']);
            $confirimpassword =md5($_POST['confirmpassword']);
            $email = $_SESSION['useremail'];

            $emailCheckQuery = "SELECT * FROM users WHERE user_email = '$email'";
            $emailCheckResult = mysqli_query($con, $emailCheckQuery);

            if ($emailCheckQuery) {
                if (mysqli_num_rows($emailCheckResult) < 0) {
                } else {
                    if (strlen(trim($_POST['password'])) < 6) {
        ?>
                        <div id="alert">استخدم اكثر من 6 احرف او ارقام</div>

                        <?php
                    } else {
                        if ($password != $confirimpassword) {
                        ?>
                            <div id="alert">الشيفرة الاولى والتانية غير متطابقين</div>

        <?php                        } else {
                            $confirimpassword = $password;

                            $updatePassword = "UPDATE users SET user_password = '$password' where user_email = '$email '";
                            mysqli_query($con, $updatePassword);
                            session_unset();
                            session_destroy();
                            header("location: login.php");
                        }
                    }
                }
            }
        }
        ?>


                <div class="login-password text-field">
                    <label for="password" class="my-2 style-label"> كلمة المرور الجديدة:</label>
                    <input type="password" class="form-control " name="password" placeholder=" كلمة المرور الجديدة">
                </div>
                <div class="login-password text-field">
                    <label for="password" class="my-2 style-label">تكرار كلمة المرور:</label>
                    <input type="password" class="form-control " name="confirmpassword" placeholder="تكرار كلمة المرور">
                </div>
                <button type="submit" name="changePassword" id="changePassword" class="btn btn-success button-giris mt-3">إعادة التعيين</button>

            </div>

        </div>
       
    </form>
</section>














<?php include "footer.php"
?>