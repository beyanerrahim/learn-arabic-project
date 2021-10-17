 <?php 
session_start();
$pageTitle = 'students'; 
include 'init.php';

if (isset($_SESSION['adminemail'])) {
    $email=$_SESSION['adminemail'];

    ?> 
    <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i class="fas fa-user me-2"></i>Hello</div>
        <div class="list-group list-group-flush my-3">
            <a href="dashboard.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="admins.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-user-cog me-2"></i>Admins</a> 
            <a href="adminstudent.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i class="fas fa-users-cog me-2"></i>Students</a>
            <a href="adminbook.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-book me-2"></i>Books</a>
            <a href="adminlesson.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-file-video me-2 "></i>Lessons</a>
            <a href="adminexam.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-file me-2"></i>Exames</a>
            <a href="massages.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-envelope me-2"></i>Messages</a>

            <a href="logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                    class="fas fa-power-off me-2"></i>Logout</a>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page nav-->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
            <div class="d-flex align-items-center">
                <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                <h2 class="fs-2 m-0">students</h2>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user me-2"></i><?php 
                                
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

    <!-- Page nav-->

     
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<input id="myInput" type="text" placeholder="Search.."   class="form-control"  style="width: 50%;">

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

<!-- /#page-content-wrapper  table-->
<section class="table-student-section">
                 <div class="container">
                     <table class="table table-striped table-hover student-table">
                         <thead class="thead-dark ">
                             <tr>
                                 <th scope="col"> id</th>
                                 <th scope="col"> name</th>
                                 <th scope="col">email</th>
                                 <th scope="col"> password </th>
                                 <th scope="col">birthday</th>
                                 <th scope="col"> gender </th>
                                 <th scope="col"> country </th>
                                 <th scope="col"> control </th>

                             </tr>
                         </thead>
                         <tbody id="myTable">
                         <?php
             $mysqli=new mysqli('localhost','root','','arabic');
             $result=$mysqli->query("SELECT * FROM users WHERE rol_id = 0");
              while($row = $result->fetch_assoc()){
             
                echo "<tr>";
                echo "<td>" .$row['user_id'] . "</td>";
                echo  "<td>" .$row['user_name'] . "</td>";
                echo "<td>" . $row['user_email'] . "</td>";
                echo "<td>" . $row['user_password'] . "</td>";
                echo "<td>" . $row['user_birthday'] . "</td>";
                echo"<td>" . $row['user_gander'] . "</td>";
                echo "<td>" . $row['user_country'] . "</td>";
                echo '<td><form>
                <button type="submit" class="btn btn-danger" name="delete" value="'. $row['user_id'] .'">delete</button>
                </form></td>';
                 
                echo "<tr>";

            }
            if(isset($_GET['delete'])){
                $id=$_GET['delete'];
                $mysqli->query("DELETE FROM users WHERE user_id = $id");
                ?>
                <h6 class="alert alert-dark" >تم الحذف بنجاح </h6>
           <?php
            }

            ?>
                         </tbody>
                     </table>

                 </div>
             </section>

<!-- /#page-content-wrapper -->


 <?php } else {
        header('Location: ../login.php');
        exit();
 }
include 'templates/footer.php'; ?>
