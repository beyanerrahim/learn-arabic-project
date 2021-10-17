<?php

$query=mysqli_query($con,"SELECT * FROM users where user_email='$useremail'");
  while($rows = mysqli_fetch_array($query)){
    $userid=$rows['user_id'];
    $name= $rows['user_name'];
    $email=$useremail;
    $age=$rows['user_birthday'];
    $gander=$rows['user_gander'];
    $country=$rows['user_country'];
    $password=$rows['user_password'];
    $confirimpassword=$_post['confirimpassword'];


?>
<?php
        }?>   
               <?php
            $name=$_POST['name'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $age=$_POST['age'];
            $gander=$_POST['gander'];
            $country=$_POST['country'];
          if(isset($_POST['updateprof'])){
            $key=$_post['updateprof'];

            echo "hhhhhhhhhhhhhhh". $key;
            $selectqueryprofilid = " UPDATE users SET user_name='$name', 
            user_email='$email', user_password='$password',user_birthday='$age',
            user_gander='$gander',user_country='$country' WHERE  user_id='$key'";
            mysqli_query($con,$selectqueryprofilid);
            ?>
            <div>تم التعديل</div>
            <?php
          }
        
        
        ?>