<?php 
error_reporting(false);
session_start();
$pageTitle = 'lessons'; 
include 'init.php';
include './database.php';
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
            <a href="adminstudent.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-users-cog me-2"></i>Students</a>
            <a href="adminbook.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-book me-2"></i>Books</a>
            <a href="adminlesson.php" class="list-group-item list-group-item-action bg-transparent  second-text  active link-primary"><i class="fas fa-file-video me-2 "></i>Lessons</a>
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
                <h2 class="fs-2 m-0">lessons</h2>
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

     <!-- Page Content-->
    <section class="lesson-section">
    <?php
        $beforupdatename="";
        $beforupdatelink="";
    if(isset($_POST["editbutton"])){ 
        $key=$_POST["editbutton"];  
      //  echo $key;
    //    $queryforname = mysqli_query($con,"SELECT * FROM lessons WHERE lesson_id ='$key'");
        $res=mysqli_query($con,"SELECT * FROM lessons WHERE lesson_id ='$key'");
        if($res){
            while($row = mysqli_fetch_row($res)){
                $beforupdateid=$row[0];
                $beforupdatename= $row[1];
                $beforupdatelink= $row[2];
                $befordepertmant= $row[3];
            //    echo $beforupdatelink;
            }}
       
       
        

        } 
        
?>

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



        <div class="container">
            <div class="lesson-content">
           <form action="adminlesson.php" method="post">
           <div class="lessonid" ><br>
                <input type="hidden"  class="forlessonid" id=" form-control " name="lesid"  value="<?php echo  $beforupdateid; ?>" style="width: 65%;">
            </div>   
            <div class="lessonname" >
                <label for="lessonname" class="mt-4 ">lesson name :</label>
                <input type="text"  class="form-control " name="lesname" value="<?php echo  $beforupdatename; ?>"  placeholder="enter lesson name" style="width: 65%;">
            </div>
            <div class="lessonlink my-3">
                <label for="lessonlink" class=" ">the link of lesson:</label>
                    <input type="text"  class="form-control  "name="leslink" value="<?php echo $beforupdatelink; ?>" placeholder=" enter lesson link" style="width: 65%;">
            </div>
            
            <label  class="my-2 "> departmant:</label>
            <select name="department" value="<?php echo $_POST["op"]?>" id="" class="selectoption" >
              <option hidden> select departmant</option>
              <option name="op" value="1">letters</option>
              <option name="op" value="3">numbers </option>
              <option name="op" value="2">fruit</option>
              <option name="op" value="6">grammer</option>
              <option name="op" value="5"> the holy quran</option>
              <option name="op" value="4"> animals</option>


            </select>
            <br>
            <?php

          

                $lessonname = "";
                $lessonlink = "";
                $department = "";
                $lessonnid = $_POST['lesid'];

                if (isset($_POST["lesname"])) {

                    $lessonname = $_POST['lesname'];
                }
                if (isset($_POST["leslink"])) {

                    $lessonlink =  $_POST['leslink'];

                }
                if (isset($_POST["department"])) {

                    $department = $_POST['department'];

                }

    

                if (isset($_POST["insertlesson"])) {
                    $res=mysqli_query($con,"SELECT * FROM lessons WHERE lesson_id ='$lessonnid'");    
                    $num = mysqli_num_rows($res);

                    if($num > 0){ 
                     //   echo $num;
                            $selectquerylessonnid = "UPDATE lessons SET lesson_name ='$lessonname',link ='$lessonlink',department_id='$department' WHERE  lesson_id='$lessonnid'";
                            mysqli_query($con,$selectquerylessonnid);
                          //  mysqli_query($con,"SELECT * FROM lessons WHERE lesson_id ='$key'");
                          
                        ?>
                        <h6 class="alert alert-dark" >تم التعديل بنجاح </h6>
            <?php
                    }else{
                            $insertlesson = "insert into lessons ( lesson_name , link , department_id) values('$lessonname','$lessonlink','$department')";
                            mysqli_query($con, $insertlesson);

                        ?>
                           <h6 class="alert alert-dark" >تم الاضافة بنجاح </h6>
                <?php

                        }
               
                    }
                ?>
            <button type="submit"  name="insertlesson" class="btn btn-success my-3" >save</button>
            
            <button type="reset" class="btn btn-dark my-3" id="" >clear</button>
            </form>
        </div>
        </div>

   </section> 

 <!-- Page Content-->


<!-- /#page-content-wrapper  table-->
 <section class="table-lesson-section">
 <form action="adminlesson.php" method="post">

    <div class="container">

  
   
    
    
    
    
 
        <table class="table table-striped table-hover lesson-table">
            <thead class="thead-dark ">
              <tr>
                <th scope="col" name="keyid"> id</th>
                <th scope="col"> lesson name</th>
                <th scope="col">lesson link </th>
                <th scope="col">lesson departmant  </th>
                <th scope="col"> control </th>

              </tr>
            </thead>
            <tbody id="myTable">
                <?php

                



                $selectquery = "select * from lessons ";
                $query = mysqli_query($con,$selectquery);
                $nums= mysqli_num_rows($query);
                while($res = mysqli_fetch_array($query)){
                    $selectdepartmentname = "select * from departments where department_id =".$res['department_id'];
                    $query2 = mysqli_query($con,$selectdepartmentname);
                    $nums2= mysqli_num_rows($query2);
                    while($res1 = mysqli_fetch_array($query2)){

                
                
                ?>
              <tr>
                <th scope="row" name ="lessonsid" ><?php echo $res['lesson_id']; ?></th>
                <td name ="lessonsname"><?php echo $res['lesson_name']; ?></td>
                <td name ="lessonslink"><a href="<?php echo $res['link']; ?>"><?php echo $res['link']; ?></a></td>
                <td name ="departmentname"><?php echo $res1['department_name']; ?></td>
                <td>
                    <button type="submit" id="update"click="funcconversion()"  class="btn btn-danger" value="<?php echo $res['lesson_id']; ?>" name ="deletebutton" >delete</button>
                    <button type="submit" id="delete"  class="btn btn-warning" value="<?php echo $res['lesson_id']; ?>" name="editbutton">edit</button>
                
                    

                </td>
              </tr>
              <?php
              
            }}
              ?>
            </tbody>
          </table>
          
          
    </div>

<?php
    
if(isset($_POST["deletebutton"])){ 
     $key=$_POST["deletebutton"];  
 
     $selectquerylessonnid = "DELETE from lessons WHERE lesson_id ='$key'";
     $query3 = mysqli_query($con,$selectquerylessonnid);
     mysqli_query($con,$query3);
     ?>
     <h6 class="alert alert-dark" >تم الحذف بنجاح </h6>
<?php
     }
     ?>
 </form>
</section>

<!-- /#page-content-wrapper -->


 <?php 
 } else {
    header('Location: ../login.php');
    exit();
 }
include 'templates/footer.php'; ?>
