<?php include "header.php"
?>

<section class="login-section ">
    <div>
        <form action="register.php" method="post">
            <h2 class="register-title titlee "> صفحة التسجيل في الموقع</h2>
            <div class="register-content contentt t ">
                <?php
                include('./database.php');
                /*ı can use isset($_POST[sigup]) when ı put sigup .... */




                $name = "";
                $password = "";
                $useremail = "";
                $country = "";
                $age = "";
                $gender = "";
                $todayage = "";
                if (isset($_POST["email"])) {

                    $useremail = $_POST['email'];
                }
                if (isset($_POST["name"])) {

                    $name =  $_POST['name'];
                }
                if (isset($_POST["password"])) {

                    $password =  md5($_POST['password']);
                }

                if (isset($_POST["date"])) {

                    $age =  $_POST['date'];
                }
                if (isset($_POST["country"])) {

                    $country =  $_POST['country'];
                }
                if (isset($_POST["gender"])) {
                    $gender =  $_POST['gender'];
                }




                $bday = $age;
                $today = date("Y-m-d");
                $diff = date_diff(date_create($bday), date_create($today));
                $todayage = $diff->format('%y');


                if (isset($_POST["register"])) {


                    $userselect = "select * from users where user_email ='$useremail'";

                    $result = mysqli_query($con, $userselect);
                    $num = mysqli_num_rows($result);

                    if ($num > 0) {
                ?>
                        <div class ="erorr" id="alert" >اسم المستخدم موجود</div>
                        <?php
                    }
                    else {
                        if (strlen(trim($_POST['password'])) < 6) {
                        ?>
                            <div class ="erorr" >كلمة السر يجب ان تكون اكتر من 6 احراف او ارقام</div>
                        <?php

                        }
                        if ($todayage > 16) {
                        ?>
                            <div class ="erorr">لأن عمرك<?php print $todayage; ?> والموقع للاعمار مادون ال 16 مع الاسف لا تستطيع انشاء حساب للدخول </div>
                        <?php

                        }
                        elseif($todayage < 16 && strlen(trim($_POST['password'])) > 6) {
                            $insertuser = "insert into users ( user_name , user_email , user_password  , user_birthday , user_gander , user_country , rol_id) values(' $name ','$useremail','$password','$age','$gender','$country' , 0)";
                            mysqli_query($con, $insertuser);

                        ?>
                            <div class ="erorr">تم الاضافة بنجاح </div>
                           
                        
                <?php
                        header("location:login.php");
                        }
                    }
                }

                ?>
                <div class="login-email text-field">
                    <label for="email" class=" style-label"> بريدك الالكتروني:</label>
                    <input type="text" class="form-control text-field" id="email" name="email" placeholder="أدخل بريدك الالكتروني">
                </div>
                <div class="login-password text-field">
                    <label for="password" class=" style-label"> كلمة المرور:</label>
                    <input type="password" class="form-control text-field " id="password" name="password" placeholder="أدخل كلمة المرور">
                </div>
                <div class="login-password text-field">
                    <label for="name" class=" style-label"> الاسم :</label>
                    <input type="text" class="form-control text-field" id="name" name="name" placeholder="أدخل اسمك">
                </div>
                <div class="login-password text-field">
                    <label for="age" class=" style-label"> تاريخ الميلاد :</label>
                    <input type="date" class="form-control text-field" id="age" name="date" placeholder="أدخل عمرك">
                </div>
                <div class="login-password text-field">
                    <label for="country" class=" style-label"> البلد :</label>
                    <input type="text" class="form-control text-field" id="country" name="country" placeholder="أدخل بلدك">
                </div>
                <label for="country" class="my-1 mx-2 style-label"> الجنس :</label>
                <input type="radio" value="male" name="gender" class="style-label">
                <span class="ml-4" style="font-size:18px">ذكر</span>
                <input type="radio" value="famale" name="gender" class="style-label">
                <span style="font-size:18px">أنثى</span>
                <br>
                <button type="submit" class="btn btn-success " name="register">سجل حساب</button>
                <span class="login-label mt-2 style-label mr-3"> إذا كان لديك حساب :<a href="login.php"> اضغط هنا </a></span>

            </div>
        </form>
    </div>
</section>


<?php include "footer.php"
?>