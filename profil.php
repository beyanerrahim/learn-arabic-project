<?php include "header.php";
include('./database.php');
error_reporting(false);

?>
<?php
session_start();
if (isset($_SESSION['useremail'])) {
  $useremail=$_SESSION['useremail'];
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
  <section class="container">
    <div class=" adminsert1 p-2 col justify-content-lg-end col justify-content-sm-end">
    <div class="container col-md-5  col-lg-3 col-sm-12 col justify-content-lg-end col justify-content-sm-end ">
    <?php

$query=mysqli_query($con,"SELECT * FROM users where user_email='$useremail'");
  while($rows = mysqli_fetch_array($query)){
    $userid=$rows['user_id'];
    $name1= $rows['user_name'];
    $email1=$rows['user_email'];
    $age1=$rows['user_birthday'];
    $gander1=$rows['user_gander'];
    $country1=$rows['user_country'];
    $password1=$rows['user_password'];
    $confirimpassword1=$_post['confirimpassword'];}


?>
    <form action="profil.php" method="POST">
      <div class="">

        <div class="row mb-3 ">

            <div class="form-group ">

              <input type="text" class="form-control form-control-sm" name="name" value="<?php echo $name1;?>" id="colFormLabelSm" >

            </div>
            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm text-right col justify-content-lg-end ">:ad soyad</label>

          </div> 
        <div class="row mb-3">
            
            <div class="form-group">
              <input type="email" class="form-control form-control-sm" name="email" value="<?php echo $email1;?>" id="colFormLabelSm" >
            </div>
            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm text-right col justify-content-lg-end ">:mail</label>
          </div> 
        <div class="row mb-3">
           
            <div class="form-group">
              <input type="text" class="form-control form-control-sm" name="age" value="<?php echo $age1;?>" id="colFormLabelSm" >
            </div>
            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm text-right col justify-content-lg-end ">:yaş</label>
          </div>     
        <div class="row mb-3">
          <div class="form-group">
            <input type="text" class="form-control form-control-sm" name="gander" value="<?php echo $gander1;?>" id="colFormLabelSm" >
          </div>
         
            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm text-right col justify-content-lg-end ">:cinsiyet</label>
          </div>   
        <div class="row mb-3">
            
            <div class="form-group">
              <input type="text" class="form-control form-control-sm" name="country"value="<?php echo $country1;?>" id="colFormLabelSm" >
            </div>
            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm text-right col justify-content-lg-end ">:ülke</label>
          </div>  
          <div class="row mb-3">
            
            <div class="form-group">
              <input type="password" class="form-control form-control-sm" name="password"value="<?php echo $password1;?>" id="colFormLabelSm" >
            </div>
            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm text-right col justify-content-lg-end ">:şifre</label>
          </div>  
          <div class="row mb-3">
            
            <div class="form-group">
              <input type="password" class="form-control form-control-sm" name="conpassword"value="<?php echo $password1;?>" id="colFormLabelSm" >
            </div>
            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm text-right col justify-content-lg-end ">:şifre tekrarı</label>
          </div>  
        </div> 
        <div class="ml-sm-5 col justify-content-sm-end col justify-content-lg-center  ">
       
          <button class="bbprofil btn btn-success" name="updateprof" value="<?php echo $userid;?>" >düzenle</button>
        </div> 
               
          </div> 
          </form>
        </div>  
        
        </section>
            <?php
            $name=$_POST['name'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $conpassword=$_POST['conpassword'];
            $age=$_POST['age'];
            $gander=$_POST['gander'];
            $country=$_POST['country'];
            if(isset($_POST['updateprof'])){
            $key=$_POST['updateprof'];


            $selectqueryprofilid = "UPDATE users SET user_name='$name', 
            user_email='$email', user_password='$password',user_birthday='$age',
            user_gander='$gander',user_country='$country' WHERE  user_id='$key' AND rol_id=0";
            mysqli_query($con,$selectqueryprofilid);
            ?>
            <div>تم التعديل</div>
            <?php
          }
        
        ?>
        <section class="container ">  
      <div class="scortext1 ">
      <h3 class="scortext text-right">علامتي</h3>
      <p class="scortext text-right">علامتي مرتبة بترتيب الزمن</p>   
     </div>  
        
      <table class="table table-hover mx-3">
        <thead>
          <tr>
            <th>اسم الامتحات</th>
            <th>العلامات</th>
          </tr>
        </thead>
        <tbody>
        <?php

$selectquery = "select * from user_exam  where users_id =".$userid;
$query = mysqli_query($con,$selectquery);
while($res = mysqli_fetch_array($query)){
    
  $selectdepartmentname = "select * from exams where exam_id =".$res['exams_id'];;
  $query2 = mysqli_query($con,$selectdepartmentname);
  while($res1 = mysqli_fetch_array($query2)){

?>
      <tr>             
                <td name ="lessonslink"><?php echo $res1['exam_name'];?></td>
                <td name ="departmentname"><?php echo $res['degree']; ?></td>
               
              </tr>
              <?php
              
            }}
              ?>
            </tbody>
          </table>
    
   </section>  
           
   <?php
   } else {
    header('Location: login.php');
    exit();
}
  
  include "footer.php"

  ?>