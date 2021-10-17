<?php
ob_start();
session_start();
$pageTitle = 'admin';

//Admins Page
if (isset($_SESSION['adminemail'])) {
    $email=$_SESSION['adminemail'];
    include 'init.php';
    $do = isset($_GET['do']) ? $_GET['do'] : 'admins';
    if ($do == 'admins') {
?>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i class="fas fa-user me-2"></i>Hello</div>
            <div class="list-group list-group-flush my-3">
                <a href="dashboard.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="admins.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i class="fas fa-user-cog me-2"></i>Admins</a>
                <a href="adminstudent.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-users-cog me-2"></i>Students</a>
                <a href="adminbook.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-book me-2"></i>Books</a>
                <a href="adminlesson.php" class="list-group-item list-group-item-action bg-transparent  second-text  fw-bold link-primary"><i class="fas fa-file-video me-2 "></i>Lessons</a>
                <a href="adminexam.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-file me-2"></i>Exames</a>
                <a href="massages.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-envelope me-2"></i>Messages</a>

                <a href="logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- End sidebar-wrapper -->

        <!--Start Page nav-->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">admins</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>
                                <?php 
                                
                $selecttable ="SELECT user_name FROM users WHERE user_email = '$email'";
                $result= mysqli_query($con, $selecttable);
                while($rows = mysqli_fetch_array($result))
                {
                   $adne      =$rows['user_name'];
                }
                echo $adne;
                ?>
                               
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!--End Page nav-->

            <!--Start PHP İNSERT-->
            <?PHP
            //Check HTTP Requst
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                $adnem = $_POST['adname'];
                                $admail = $_POST['ademail'];
                                $adpass = $_POST['adpassword'];
                                $adbir = $_POST['adbirth'];
                                $adcoun = $_POST['adcountry'];
                                $adgen = $_POST['adgender'];


                                //Chek if User Exist in Database
                                $check =  checkItem("user_email", "users", $admail);
                                if($check == 1) {
                                    $theMsg = '<div class="alert alert-danger"> Sorry This Email Is Exist</div>';
                                    redirectHome($theMsg, 'back'); 
                                } else {
                                    //Insert Category to The Database

                                    $inserad = "INSERT INTO users ( user_name , user_email , user_password  , user_birthday , user_gander , user_country , rol_id) 
                                    values(' $adnem ','$admail','$adpass','$adbir','$adcoun','$adgen' , 1)";
                                    mysqli_query($con, $inserad);

                                    $theMsg = "<div class='alert alert-success'> Record Inserted</div>";
                                    redirectHome($theMsg, 'back');
                                }
                                } ?>
            <!--End PHP İNSERT-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<input id="myInput" type="text" placeholder="Search.."   class="form-control mb-3"  style="width: 50%;">

<script>
$(document).ready(function(){
 $("#myInput").on("keyup", function() {
   var value = $(this).val().toLowerCase();
   $("#myTable tr").filter(function() {
     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
   });
 });
});
</script>
            <!-- Page Content-->
            <section class="admins-section">
                <div class="container">
                    <div class="admins-content">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                            <div class="">
                                <input type="hidden" name="adidd">
                                <label for="name" class=" style-label">  name:</label>
                                <input type="text" name="adname" class="form-control " id="name" placeholder="enter name" style="width: 65%;" required="required">
                            </div>
                            <div class="">
                                <label for="email" class=" style-label"> email :</label>
                                <input type="email" name="ademail" class="form-control " id="email" placeholder="enter email" style="width: 65%;" required="required">
                            </div>
                            <div class="">
                                <label for="password" class=" style-label">  password:</label>
                                <input type="password" name="adpassword" class="form-control  " id="password" placeholder="enter password" style="width: 65%;" required="required">
                            </div>
                            <div class="login-password text-field">
                                <label for="birthday " class=" style-label"> birthday :</label>
                                <input type="date" name="adbirth" class="form-control" id="birthday " placeholder="enter birthday" style="width: 65%;" required="required">
                            </div>
                      
                            <div class="login-password text-field">
                                <label for="country" class=" style-label"> country :</label>
                                <input type="text" name="adcountry" class="form-control text-field" id="country" placeholder=" enter country" style="width: 65%;" required="required">
                            </div>
                            <label for="country" class="my-1 mx-2 style-label"> gender :</label>
                            <input type="radio" name="adgender" value="male" class="style-label" required="required">
                            <span class="ml-4" style="font-size:18px">male</span>
                            <input type="radio" name="adgender" value="femail" class="style-label" required="required">
                            <span style="font-size:18px">female</span>
                             <br>
                            <button type="submit" class="btn btn-success my-3">insert</button>
                            <button type="reset" class="btn btn-dark my-3" id="">clear</button>
                        </form>
                    </div>
                </div>
            </section>
            <!-- Page Content-->

          <!--Start admins table -->

          <section class="table-admin-section">
    <div class="container">
        <table class="table table-striped table-hover admin-table">
            <thead class="thead-dark ">
              <tr>
                <th scope="col"> ID</th>
                <th scope="col"> Name</th>
                <th scope="col">Email</th>
                <th scope="col"> Password </th>
                <th scope="col">Birthday</th>
                <th scope="col"> Gender </th>
                <th scope="col"> Country </th>               
                <th scope="col"> Control </th>

              </tr>
            </thead>
            <tbody id="myTable">
            <?php 

                $selecttable ="SELECT * FROM users WHERE rol_id =1";
                $result= mysqli_query($con, $selecttable);
                $rowss= mysqli_fetch_all($result, MYSQLI_ASSOC);

                foreach($rowss as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['user_id'] . "</td>";
                    echo "<td>" . $row['user_name'] . "</td>";
                    echo "<td>" . $row['user_email'] . "</td>";
                    echo "<td>" . $row['user_password'] . "</td>";
                    echo "<td>" . $row['user_birthday'] . "</td>";
                    echo "<td>" . $row['user_gander'] . "</td>";
                    echo "<td>" . $row['user_country'] . "</td>";
                    //echo "<td>" . $row['rol_id'] . "</td>";
                    
                    echo "<td>
                    
                            <a href='admins.php?do=Edit&userid=" . $row['user_id'] . "'  class='btn btn-success'><i class='fas fa-edit me-2'></i>Edit</a>
                            <a href='admins.php?do=Delete&userid= " . $row['user_id'] . "'  class='btn btn-danger'><i class='fas fa-window-close me-2'></i>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }

            ?>
            </tbody>
          </table>
          <!-- End Admins Table-->
    </div>
    
   
</section>

    <?php } elseif ($do == 'Edit'){ //Edit Admin Page
    
        $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;


        $selecttable ="SELECT * FROM users WHERE user_id = $userid ";
        $result= mysqli_query($con, $selecttable);

        while($rows = mysqli_fetch_array($result))
        {
           $adne      =$rows['user_name'];
           $admaill = $rows['user_email'];
           $adpasss = $rows['user_password'];
           $adbirr  = $rows['user_birthday'];
           $adcou  = $rows['user_country'];
           $adgan  = $rows['user_gander'];
           $adidd = $rows['user_id'];
        }
        
        $num = mysqli_num_rows($result);

        if($num > 0){
             ?>
            <div class="d-flex" id="wrapper">
        <div id="page-content-wrapper">
            <!-- Page Content-->
            <section class="admins-section">
                <div class="container">
                    <div class="admins-content">
                        <form action="?do=Update" method="POST">
                            <div class="">
                                <input type="hidden" name="userid" value="<?php echo $userid ?>">
                                <label for="name" class=" style-label">  name:</label>
                                <input type="text" name="adname" value="<?php echo $adne ?>"  class="form-control " id="name"  style="width: 65%;" required="required">
                            </div>
                            <div class="">
                                <label for="email" class=" style-label"> email :</label>
                                <input type="email" name="ademail" value="<?php echo $admaill ?>" class="form-control " id="email"  style="width: 65%;" required="required">
                            </div>
                            <div class="">
                                <label for="password" class=" style-label">  password:</label>
                                <input type="password" name="adpassword" value="<?php echo $adpasss ?>" class="form-control  " id="password"  style="width: 65%;" required="required">
                            </div>
                            <div class="login-password text-field">
                                <label for="birthday " class=" style-label"> birthday :</label>
                                <input type="date" name="adbirth" value="<?php echo $adbirr ?>" class="form-control" id="birthday "  style="width: 65%;" required="required">
                            </div>
                      
                            <div class="login-password text-field">
                                <label for="country" class=" style-label"> country :</label>
                                <input type="text" name="adcountry" value="<?php echo $adcou ?>" class="form-control text-field" id="country" style="width: 65%;" required="required">
                            </div>
                            <label for="country" class="my-1 mx-2 style-label"> gender :</label>
                            <input type="radio" name="adgender" value="male" class="style-label" required="required">
                            <span class="ml-4" style="font-size:18px">male</span>
                            <input type="radio" name="adgender" value="femail" class="style-label" required="required">
                            <span style="font-size:18px">female</span>
                             <br>
                            <button type="submit" class="btn btn-success my-3">Update</button>
                        </form>
                    </div>
                </div>
            </section>
            <!--End Page Content-->
<?php
        } else {
            echo "<div class='container'>";
            $theMsg='<div class="alert alert-danger">Theres NO Such ID </div>';
            redirectHome($theMsg);
            echo "</div>";
        }
    
    } elseif($do == 'Update'){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //Get Variables From Form
            $adid   = $_POST['userid'];
            $adnam  = $_POST['adname'];
            $admaill = $_POST['ademail'];
            $adpasss = $_POST['adpassword'];
            $adbirr  = $_POST['adbirth'];
            $adcou  = $_POST['adcountry'];
            $adgan  = $_POST['adgender'];

            $updateqe= "UPDATE users SET user_name= '$adnam', user_email= '$admaill', user_password= '$adpasss', user_birthday= '$adbirr', user_country='$adcou', user_gander='$adgan' WHERE user_id='$adid'";
            mysqli_query($con, $updateqe);

            echo '<div class="container">';
                $theMsg="<div class='alert alert-success'>One Record Updated</div>";
                redirectHome($theMsg);
            echo '</div>';
        }

    } elseif( $do == 'Delete') { //Delete Admin Page

        $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;

        $check = checkItem('user_id', 'users', $userid);

         if($check > 0){
             $deleteqe = "DELETE FROM users WHERE user_id='$userid'";
             mysqli_query($con, $deleteqe);

             $theMsg = "<div class='alert alert-success'>One Record Deleted</div>";
             redirectHome($theMsg, 'back');
         } else {
            $theMsg ='<div class="alert alert-danger">This ID is Not Exist!!! </div>';
            redirectHome($theMsg);
         }

    }

        include 'templates/footer.php';
    } else {
        header('Location: ../login.php');
        exit();
    }
     
    ob_end_flush();    
