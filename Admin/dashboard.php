<?php 
session_start();
$pageTitle = 'Dashboard'; 
include 'init.php';
include 'database.php';

if (isset($_SESSION['adminemail'])) {
    $email=$_SESSION['adminemail'];

    ?>
    <div class="d-flex" id="wrapper">
    <div class="bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i class="fas fa-user me-2"></i>Hello</div>
        <div class="list-group list-group-flush my-3">
            <a href="dashboard.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="admins.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-user-cog me-2"></i>Admins</a> 
            <a href="adminstudent.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-users-cog me-2"></i>Students</a>
            <a href="adminbook.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-book me-2"></i>Books</a>
            <a href="adminlesson.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-file-video me-2 "></i>Lessons</a>
            <a href="adminexam.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-file me-2"></i>Exames</a>
            <a href="massages.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-envelope me-2"></i>Messages</a>
            <a href="logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                    class="fas fa-power-off me-2"></i>Logout</a>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
            <div class="d-flex align-items-center">
                <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                <h2 class="fs-2 m-0">Dashboard</h2>
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
                            <i class="fas fa-user me-2"></i>
                            <?php 
                                
                                $selecttable ="SELECT user_name FROM users WHERE user_email = '$email'";
                                $result= mysqli_query($con, $selecttable);
                                while($rows = mysqli_fetch_array($result))
                                {
                                   $adne =$rows['user_name'];
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

        <div class="container-fluid px-4">
        <div class="row g-3 my-2">
                <div class="col-md-3">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2">
                            <a href="adminstudent.php" style="color: black; text-decoration:none;"><?php echo checkItem('rol_id', 'users', 0) ?></a>
                            </h3>
                            <p class="fs-5">Total users</p>
                        </div>
                        <i class="fas fa-solid fa-users fs-1 primary-text rounded-full secondary-bg p-3 border"></i>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2">
                            <a href="adminbook.php" style="color: black; text-decoration:none;"><?php echo checkItemnum('book_id', 'books') ?></a>
                            </h3>
                            <p class="fs-5">Total Book</p>
                        </div>
                        
                        <i class="fa fa-solid fa-book fs-1 primary-text rounded-full secondary-bg p-3 border"></i>
                        <!--<i class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i> -->
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2"><a href="adminexam.php" style="color: black; text-decoration:none;"><?php echo checkItemnum('exam_id', 'exams') ?></a></h3>
                            <p class="fs-5">Total Exames</p>
                        </div>
                        <i class="fas fa-file-pdf fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2">
                            <a href="adminlesson.php" style="color: black; text-decoration:none;"><?php echo checkItemnum('lesson_id', 'lessons') ?></a>
                            </h3>
                            <p class="fs-5">Total Lessons</p>
                        </div>
                        <i class="fas fa-file-video fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <h3 class="fs-4 mb-3">Latests user</h3>
                <div class="col">
              
                   <table class="table table-striped table-hover book-table">
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
            <tbody>
            <form method="POST">
            <?php
            $selectquery = "SELECT * FROM users where rol_id=0 ORDER BY user_id DESC limit 5 ";
            $query = mysqli_query($con,$selectquery);
            $nums= mysqli_num_rows($query);
            while($res = mysqli_fetch_array($query)){
            
            
            ?> 
                </td>
              </tr>
              <tr>
              <th scope="row"><?php echo $res['user_id']; ?></th>
              <td> <?php echo $res['user_name']; ?> </td>
                <td><?php echo $res['user_email']; ?></td>
                <td><?php echo $res['user_password']; ?> </td>
                <td><?php echo $res['user_birthday']; ?></td>
                <td><?php echo $res['user_gander']; ?> </td>
                <td><?php echo $res['user_country']; ?></td>
               
                <td>
               
                    <button type="submit" class="btn btn-danger" name="delete" value="<?php echo $res['user_id']; ?>">delete</button>
               
                </td>
              </tr>
              <?php
              
            }

              ?>
              <?php
    
         if(isset($_POST["delete"])){ 
         $key=$_POST["delete"];  
     
         $selectid = "DELETE from users WHERE user_id ='$key'";
         $query3 = mysqli_query($con,$selectid );
         mysqli_query($con,$query3);
         }
         ?>
           </form>  
            </tbody>
          </table>
         
   
                </div>
            </div>

    


 <?php } else {
        header('Location: ../login.php');
        exit();
 }
include 'templates/footer.php'; ?>
