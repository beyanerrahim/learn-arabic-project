<?php 
error_reporting(false);
session_start();
$pageTitle = 'Exams'; 
include 'init.php';
include './database.php';
$examname=$_SESSION['examname'];
echo $examname;
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
            <a href="adminlesson.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-file-video me-2 "></i>Lessons</a>
            <a href="adminexam.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i class="fas fa-file me-2"></i>Exames</a>
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
                <h2 class="fs-2 m-0">Exams</h2>
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
<input id="myInput" type="text" placeholder="Search.."   class="form-control mb-4"  style="width: 50%;">

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
    <section class="exam-section">

        <div class="container">
            <div class="exam-content">
            <form action="adminexam.php" method="POST">      
           <input type="text"  class="form-control " id="name" name="examname" placeholder="Enter Exam name" style="width: 40%;">
           <label  class="my-2 "> Exam type :</label> 
           <select name="department" value="<?php echo $_POST["op"]?>" id="" class="selectoption" >
              <option hidden> select departmant</option>
              <option name="op" value="1">letters</option>
              <option name="op" value="3">numbers </option>
              <option name="op" value="2">fruit</option>
              <option name="op" value="6">grammer</option>
              <option name="op" value="5"> the holy quran</option>
              <option name="op" value="4"> animals</option>
            </select>
            <button type="submit"  name="insertexam" class="btn btn-success my-3" >insert exam</button>
            <?php  
            $examname = "";
            $department = "";
            if (isset($_POST["department"])) {

                $department = $_POST['department'];
            }
            if (isset($_POST["examname"])) {

                $examname = $_POST['examname'];
            }
            if(isset($_POST['insertexam'])){
             $insertlesson = "insert into exams ( exam_name ,department_id) values('$examname','$department')";
             mysqli_query($con, $insertlesson);
            }
            ?>
     
            </form>
            <form action="test.php" method="POST">   
        
            <button type="submit" class="btn btn-success my-3" >Select exams</button>

            </form> 

            <?php
        
        $beforupdatequestion="";
        $beforupdatequescore="";
        $beforupdateAop="";
        $beforupdateBop="";
        $beforupdateCop="";

    if(isset($_POST["editbutton"])){ 
        $key=$_POST["editbutton"];  
      //  echo $key;
    //    $queryforname = mysqli_query($con,"SELECT * FROM lessons WHERE lesson_id ='$key'");
        $res=mysqli_query($con,"SELECT * FROM questions WHERE question_id ='$key'");
        if($res){
            while($row = mysqli_fetch_row($res)){
                $beforupdateid=$row[0];
                $beforupdatequestion= $row[1];
                $beforupdateAop= $row[2];
                $beforupdateBop= $row[3];
                $beforupdateCop= $row[4];
                $_POST['trueanswer']=$row[5];
                $beforupdatequescore= $row[6];
                $beforupdateexams=$row[7];
        
            }}       

        } 
        
?>


   
            <form action="adminexam.php" method="POST">
            <br>
            <div class="quesionid" ><br>
            <input type="hidden"  class="forquid" id=" form-control " name="quid" value="<?php echo  $beforupdateid; ?>"  style="width: 65%;">
            </div>   
            <select name="exams" value="<?php echo  $beforupdateexams; ?>" id="" class="selectoption" >
              <option hidden> select exam</option>
              <?php $exams= mysqli_query($con,"SELECT * FROM exams");
                    if(mysqli_num_rows($exams) == 0){
                        echo "Error:No exams founded";
                    }
                    else{
                        while($exam = mysqli_fetch_array($exams)){
                            echo "<option value=".$exam['exam_id'].">".$exam['exam_name']."</option>";
                        }
                    }
              ?>
            </select>

            <div class="" style="width: 65%;">
                <label for="question" class="mt-4 style-label">Question :</label>
                <input rows="3" cols="5" type="text" value="<?php echo  $beforupdatequestion; ?>" name="question" class="form-control " id="question" placeholder="enter question" > 
            </div>
            <div class=" ">
                <label for="option3" class="my-1 style-label label-option">Question Score:</label>
                <input type="number" value="<?php echo  $beforupdatequescore; ?>" class="form-control "name="questionscore" id="option3" placeholder=" Enter Score question" style="width: 40%;">
               
            </div>
            <div class="option">
                <label for="option1" class="my-1 style-label label-option"> A:</label>
                <input type="text"value="<?php echo  $beforupdateAop; ?>"  class="form-control " id="option1 "name="Aoption" placeholder="first option" style="width: 40%;">
            </div>
            <div class="option option22">
                <label for="option2" class="my-1 style-label label-option"> B:</label>
                    <input type="text"value="<?php echo  $beforupdateBop; ?>"  class="form-control" id="option2"name="Boption" placeholder=" secound option" style="width: 40%;">
            </div>

            <div class="option ">
                <label for="option3" class="my-1 style-label label-option"> C:</label>
                <input type="text"value="<?php echo  $beforupdateCop; ?>"  class="form-control " id="option3"name="Coption" placeholder=" third option" style="width: 40%;">
               
            </div>
                 <label for="" class="my-1 style-label label-option ml-3"> true answr:</label>
                 <span>A</span>
                 <input type="radio" name="trueanswer" value="A">
                 <span class="mx-3">
                 <span>B</span>
                 <input type="radio" name="trueanswer" value="B">
               </span>
                 <span>C</span>
                 <input type="radio" name="trueanswer" value="C">
            <div> 

            </div>
            
            <?php
          //  echo $_POST["department"];

                $exams="";
                $question = "";
                $questionscore= "";
                $Aoption= "";
                $Boption= "";
                $Coption= "";
                $trueanswer= "";
                $quid = $_POST['quid'];
                if (isset($_POST["exams"])) {

                    $exams = $_POST['exams'];
                }
               
                if (isset($_POST["question"])) {

                    $question = $_POST['question'];
                }
                if (isset($_POST["questionscore"])) {

                    $questionscore = $_POST['questionscore'];
                }
                if (isset($_POST["Aoption"])) {

                    $Aoption = $_POST['Aoption'];
                }
                if (isset($_POST["Boption"])) {

                    $Boption = $_POST['Boption'];
                }
                if (isset($_POST["Coption"])) {

                    $Coption =  $_POST['Coption'];

                }
                if (isset($_POST["trueanswer"])) {

                    $trueanswer = $_POST['trueanswer'];

                }

                
                if (isset($_POST["insertque"])) {
                    $res=mysqli_query($con,"SELECT * FROM questions WHERE question_id ='$quid'"); 
                    $num = mysqli_num_rows($res);
                 //   echo $num;
                    if($num > 0){ 
                      //  echo $question.$Aoption.$Boption.$Coption.$trueanswer.$questionscore.$exams;
                        $selectquerylessonnid = "UPDATE questions SET question ='$question', answer_A ='$Aoption', 
                        answer_B='$Boption', 
                        answer_C='$Coption', answer_true='$trueanswer', question_score='$questionscore', exam_id='$exams' 
                        WHERE question_id='$quid'";
                        mysqli_query($con,$selectquerylessonnid);
                      //  mysqli_query($con,"SELECT * FROM lessons WHERE lesson_id ='$key'");
                      
                    ?>
                    <h6 class="alert alert-dark" >تم التعديل بنجاح </h6>
        <?php
                }else{
                            $insertqu = "insert into questions ( question , answer_A , answer_B , answer_C , answer_true , question_score , exam_id) values('$question','$Aoption','$Boption','$Coption','$trueanswer','$questionscore','$exams')";
                            mysqli_query($con, $insertqu);


                        ?>
                           <h6 class="alert alert-dark" >تم الاضافة بنجاح </h6>
                <?php

                     
               
                    }}
                ?>
            <button type="submit"  name="insertque" class="btn btn-success my-3" >save</button>
            
            <button type="reset" class="btn btn-dark my-3" id="" >clear</button>
           </form> 
        </div>
        </div>

   </section> 

 <!-- Page Content-->

<!-- /#page-content-wrapper  table-->
 <section class="table-exam-section">
<form action="adminexam.php" method="post">

    <div class="container">
        <table class="table table-striped table-hover exam-table">

            <thead class="thead-dark ">
              <tr>
                <th scope="col"> exam</th>
                <th scope="col"> question</th>
                <th scope="col">first option </th>
                <th scope="col">secound option </th>
                <th scope="col">third option</th>
                <th scope="col">true answr </th>
                <th scope="col">Score </th>
                <th scope="col"> control </th>

              </tr>
            </thead>
             
            <tbody id="myTable">
            <?php       
                
                $selectquery = "select * from questions ";
                $query = mysqli_query($con,$selectquery);
                $nums= mysqli_num_rows($query);
                while($res = mysqli_fetch_array($query)){
                    $selectdepartmentname = "select * from exams where exam_id =".$res['exam_id'];
                    $query2 = mysqli_query($con,$selectdepartmentname);
                    $nums2= mysqli_num_rows($query2);
                    while($res1 = mysqli_fetch_array($query2)){

                
                
                ?>

              <tr>
                <th scope="row"><?php echo $res1['exam_name']; ?></th>
                <td><?php echo $res['question']; ?></td>
                <td><?php echo $res['answer_A']; ?></td>
                <td><?php echo $res['answer_B']; ?> </td>
                <td><?php echo $res['answer_C']; ?></td>
                <td><?php echo $res['answer_true']; ?></td>
                <td><?php echo $res['question_score']; ?></td>
                <td> <button type="submit" id="delete" value="<?php echo $res['question_id'] ;?>" name ="deletebutton" class="btn btn-danger">delete</button>
                    <button type="submit"value="<?php echo $res['question_id'] ;?>" name="editbutton" class="btn btn-warning">edit</button></td>
                  
              </tr>
             
           
           <?php
                    }}
           ?>
            </tbody>
          </table>
          
          <?php
    
    if(isset($_POST["deletebutton"])){ 
         $key=$_POST["deletebutton"];  
         echo $key;
         $selectquerylessonnid = "DELETE from questions WHERE question_id ='$key'";
         $query3 = mysqli_query($con,$selectquerylessonnid);
         mysqli_query($con,$query3);
         }
         ?>  
    </div>


    </form>
</section>

<!-- /#page-content-wrapper -->

    


 <?php
} else {
    header('Location: ../login.php');
    exit();
 }
include 'templates/footer.php'; ?>
