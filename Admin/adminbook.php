<?php
error_reporting(false);
session_start();
$pageTitle = 'books';
include 'init.php';
include 'database.php';

if (isset($_SESSION['adminemail'])) {
    $email = $_SESSION['adminemail'];

?>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i class="fas fa-user me-2"></i>Hello</div>
            <div class="list-group list-group-flush my-3">
                <a href="dashboard.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="admins.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-user-cog me-2"></i>Admins</a>
                <a href="adminstudent.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-users-cog me-2"></i>Students</a>
                <a href="adminbook.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i class="fas fa-book me-2"></i>Books</a>
                <a href="adminlesson.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-file-video me-2 "></i>Lessons</a>
                <a href="adminexam.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-file me-2"></i>Exames</a>
                <a href="massages.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-envelope me-2"></i>Messages</a>

                <a href="logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page nav-->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Books</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i><?php

                                                                $selecttable = "SELECT user_name FROM users WHERE user_email = '$email'";
                                                                $result = mysqli_query($con, $selecttable);
                                                                while ($rows = mysqli_fetch_array($result)) {
                                                                    $adne      = $rows['user_name'];
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

            <!-- Page Content-->
            <?php
            $bookname = "";
            $booknumber = "";


            if (isset($_POST["edit"])) {
                $key = $_POST["edit"];
                //  echo $key;
                //    $queryforname = mysqli_query($con,"SELECT * FROM lessons WHERE lesson_id ='$key'");
                $res = mysqli_query($con, "SELECT * FROM books WHERE book_id ='$key'");
                if ($res) {
                    while ($row = mysqli_fetch_row($res)) {
                        $bookid = $row[0];
                        $bookname = $row[1];
                        $booknumber = $row[2];
                        $bookfile = $row[3];
                        $depertmant = $row[4];
                    }
                }
            }

 
 ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<input id="myInput" type="text" placeholder="Search.."  class="form-control"  style="width: 50%;">

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
            <section class="book-section">

                <div class="container">
                    <div class="book-content">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="bookid"><br>
                                <input type="hidden" class="bookid" id=" form-control " name="book_id" value="<?php echo  $bookid; ?>" style="width: 65%;">
                            </div>
                            <div class="bookname">
                                <label for="bookname" class="mt-4 style-label">book name :</label>
                                <input type="text" class="form-control " id="bookname" name="book_name" value="<?php echo  $bookname; ?>" placeholder="enter book name" style="width: 65%;">
                            </div>
                            <div class="booknumber">
                                <label for="booknumber" class="my-1 style-label "> book number :</label>
                                <input type="number" class="form-control " id=" booknumber" name="book_number" value="<?php echo  $booknumber; ?>" required placeholder="enter book number" style="width: 65%;">
                            </div>
                            <div class="bookfile my-3">
                                <label class=" style-label ">select pdf file :</label>
                                <input type="file" id="bookfile" accept=".pdf" name="file" value="<?php echo  $file; ?>" placeholder=" enter book link" style="width: 26%;">
                                <!-- <button type="submit" name="upload" style="border: 2px solid black;">upload</button> -->

                            </div>

                            <label class="my-2 "> book type :</label>
                            <select id="" class="selectoption" name="department">
                                <option hidden> select type</option>
                                <?php
                                $departments = @mysqli_query($con, "SELECT * FROM departments");

                                if (@mysqli_num_rows($departments) == 0)
                                    echo "Errro: No departmets founded";
                                else {

                                    while ($department = @mysqli_fetch_array($departments))
                                        echo "<option value='" . $department['department_id'] . "'>" . $department['department_name'] . "</option>";
                                }
                                ?>
                            </select>
                            <br>

                            <button type="submit" class="btn btn-success my-3" id="giris-btn" name="insert">insert</button>
                            <button type="reset" class="btn btn-dark my-3" id="">clear</button>
                            <?php

                            $bookid = $_POST['book_id'];
                            $bookname = $_POST['book_name'];
                            $booknumber =  $_POST['book_number'];
                            $department = $_POST['department'];
                            $file = $_POST['book_number'] . ".pdf";
                            $file_loc = $_FILES['file']['tmp_name'];
                            $folder = "upload/";
                            if (isset($_POST["insert"])) {

                                $res = mysqli_query($con, "SELECT * FROM books WHERE book_id ='$bookid'");
                                $num = mysqli_num_rows($res);

                                if ($num > 0) {
                                    echo $bookname . $bookfile;
                                    $selectquerybookid = "UPDATE books SET book_name ='$bookname',book_number ='$booknumber',
                            file_url='$file',department_id='$department'
                             WHERE  book_id='$bookid'";
                                    mysqli_query($con, $selectquerybookid);
                                    //  mysqli_query($con,"SELECT * FROM lessons WHERE lesson_id ='$key'");
                                } else {




                                    if (move_uploaded_file($file_loc, $folder . $file)) {
                                        // $sql="INSERT INTO books (file_url) VALUES($file)";
                                        // mysqli_query($con,$sql);
                                        $querybooknumber= mysqli_query($con,"select * from books where book_number='$booknumber'");
                                        if($querybooknumber){
                                         ?>
                                         <h6 class="alert alert-dark" > choose anethor book number ,This Book İs Exist!!‏ </h6>
                                         <?php
                                        }else{
                                        $insertbook = "INSERT INTO  books(book_name , book_number ,file_url, department_id) VALUES('$bookname','$booknumber','$file','$department')";
                                        mysqli_query($con, $insertbook);
                                        // echo "<h4 style='color:green;'>file sucessfuly uploaded </h4>";

                                    }}
                                }
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </section>

            <!-- Page Content-->


            <!-- /#page-content-wrapper  table-->
            <section class="table-book-section">
                <form method="POST">
                    <div class="container">
                        <table class="table table-striped table-hover book-table">
                            <thead class="thead-dark ">
                                <tr>
                                    <th scope="col"> id</th>
                                    <th scope="col"> book name</th>
                                    <th scope="col">book number</th>
                                    <th scope="col">file link </th>
                                    <th scope="col">book type </th>
                                    <th scope="col"> control </th>

                                </tr>
                            </thead>
                            <tbody id="myTable">
                                <?php
                                $selectquery = "SELECT * FROM books ";
                                $query = mysqli_query($con, $selectquery);
                                $nums = mysqli_num_rows($query);
                                while ($res = mysqli_fetch_array($query)) {
                                    $departmentname = "select * from departments where department_id =" . $res['department_id'];
                                    $query2 = mysqli_query($con, $departmentname);
                                    $nums2 = mysqli_num_rows($query2);
                                    while ($res1 = mysqli_fetch_array($query2)) {

                                ?>
                                        <tr>
                                            <th scope="row" name="booksid"><?php echo $res['book_id']; ?></th>
                                            <td name="booksname"><?php echo $res['book_name']; ?></td>
                                            <td name="booksnumber"><?php echo $res['book_number']; ?></td>

                                            <td name="file_url"><?php echo $res['file_url']; ?></td>
                                            <td name="departmentname"><?php echo $res1['department_name']; ?></td>
                                            <td>

                                                <button type="submit" class="btn btn-danger" name="delete" value="<?php echo $res['book_id']; ?>">delete</button>
                                                <button type="submit" class="btn btn-warning" value="<?php echo $res['book_id']; ?>" name="edit">edit</button>

                                            </td>
                                        </tr>
                                <?php

                                    }
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>

                    <?php
                    if (isset($_POST['delete'])) {
                        $key = $_POST['delete'];
                        $qubooknumber = mysqli_query($con,"SELECT * FROM books WHERE book_id ='$key'");
                        while($rows = mysqli_fetch_row($qubooknumber)){
                            $filebook=$rows[3];
                         

                        }
                        $folder = "upload/".$filebook;
                        if(unlink($folder)){
                        $bookid1 = "DELETE FROM books WHERE book_id ='$key'";
                        $query3 = mysqli_query($con, $bookid1);
                        mysqli_query($con, $query3);}
                       

                    }
                    ?>
                </form>
            </section>

            <?php
            // if(isset($_POST['insert'])){
            //     $file=rand(1000,10000)."-".$_FILES['file']['name'];
            //     $file_loc=$_FILES['file']['tmp_name'];
            //     $folder="upload/";
            //     $new_file_name=strtolower($file);
            //     $final_file=str_replace('','-',$new_file_name);

            //     if(move_uploaded_file($file_loc,$folder.$final_file)){
            //         $sql="INSERT INTO books(file_url) VALUES($final_file)";
            //         mysqli_query($con,$sql);

            //         echo "<h4 style='color:green;'>file sucessfuly uploaded </h4>";
            //     }
            // else{
            //     echo "error please try again";
            // }

            //}
            ?>
            <!-- /#page-content-wrapper -->


        <?php } else {
        header('Location: ../login.php');
        exit();
    }
    include 'templates/footer.php'; ?>