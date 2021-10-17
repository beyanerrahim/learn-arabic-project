<?php
session_start();
$pageTitle = 'Login';

if (isset($_SESSION['adminemail'])) {
    header('Location:dashboard.php'); //Redirect To Dashboard Page
}

include 'init.php';

//Check HTTP Requst
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ademail = $_POST['email'];
    $password = $_POST['pass'];
    //Chek if User Exist in Database

  $stmt = "SELECT user_email, user_password FROM users WHERE user_email='$ademail' AND user_password='$password'";
  $result= mysqli_query($con, $stmt);
  $count = mysqli_num_rows($result);

  $row =mysqli_fetch_row($result);
    if ($count > 0) {

        $_SESSION['adminemail'] = $ademail; //Register Session Email
        $_SESSION['adminpass']= $password;
        $_SESSION['rol'] = $adm['rol_id'];
        //$_SESSION['passs']= $row['user_password'];
        header('Location:dashboard.php'); //Redirect To Dashboard Page
        exit();
    }
}
?>

<!--Start Login Admin Page -->
<div class="container">
<form class="login"  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <!--Start Admin Email İnput -->
  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-4">
      <input type="email" name="email" class="form-control" id="" required>
    </div>
  </div>
  <!--Start Admin Email İnput -->

  <!--Start Admin Password İnput -->
  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-4">
      <input type="password" name="pass" class="form-control" id="" required>
    </div>
  </div>
  <!--End Admin Password İnput -->
  
  <button type="submit" class="btn btn-success">Login</button>
</form>
</div>
<!--End Login Admin Page -->

<?php include 'templates/footer.php'; ?>



