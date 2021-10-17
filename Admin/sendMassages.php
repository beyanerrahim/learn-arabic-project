<?php
error_reporting(false);

session_start();
$pageTitle = 'sendmassge';
include 'init.php';
include 'database.php';
include 'sendEmail.php';


if (isset($_SESSION['adminemail'])) {
    $email = $_SESSION['adminemail'];
$do = isset($_GET['do']) ? $_GET['do'] : 'Replay';    

?>


<section class="section-connect section " id="connectus">
<div class="container" style="padding: 0 15%; ">

  <div class="row">            
    <div class="col-md-12 col-12">
      <div class="new-item">
        <h3 class="section-title my-4 "> will send from  <?php 
                                
                                $selecttable ="SELECT user_name FROM users WHERE user_email = '$email'";
                                $result= mysqli_query($con, $selecttable);
                                while($rows = mysqli_fetch_array($result))
                                {
                                   $adne=$rows['user_name'];
                                }
                               
                                ?> admin </h3> 
                                <?php
                           $userid = isset($_GET['massageid']) && is_numeric($_GET['massageid']) ? intval($_GET['massageid']) : 0;
                           //echo $userid;
                           if ($do == 'Replay'){ //Edit Admin Page
                           
                    
                         //   echo $userid;
                            $selecttable ="SELECT * FROM massages WHERE massage_id = $userid ";
                            $result= mysqli_query($con, $selecttable);
                    
                            while($rows = mysqli_fetch_array($result))
                            {
                               $adname      =$rows['user_name'];
                               $admaill = $rows['user_email'];
                               $adsub = $rows['subject'];
                               $admassagefrom  = $rows['massagefromuser'];
                               $admassageto  = $rows['massagetouser'];
                            
                            }
                           
                           
                                 ?>
        <div class="row">
          <form action="sendMassages.php" method="POST">
            <div class="form-group">
              <label for="exampleFormControlInput1">To :</label>
              <input type="email" class="form-control input-connect" value="<?php echo $admaill ?>" name="email" id="exampleFormControlInput1" >
            </div>
            
                <div class="form-group">
                      <label for="exampleFormControlInput1">User Name :</label>
                      <input type="text" class="form-control" value="<?php echo $adname ?>" name="name" id="name" id="exampleFormControlInput1"  >
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Subject :</label>
                      <input type="text" class="form-control" value="<?php echo $adsub ?>"  name="subject" id="subject"  >
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1"> massage from user :</label>
                      <input class="form-control" value="<?php echo $admassagefrom ?>" id="exampleFormControlTextarea" name="massage" id="massage"  rows="5"  >
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1"> massage to user :</label>
                   <input  class="form-control" value="<?php echo $admassageto ?>" id="exampleFormControlTextarea1" name="massage1" id="massage1"  rows="5"  ">
                    </div>
                    <button class="btn btn-success mt-3"value="<?php echo $userid;?>"  name="send"  >send</button>
                    
                  </form>        
                  <?php
                           }
                           if(isset($_POST['send'])){
                             $key=$_POST['send'];
                             $admaill=$_POST['email'];
                             $adname=$_POST['name'];
                             $adsub=$_POST['subject'];
                             $updatemassage=$_POST['massage1'];

                         //    echo $admaill. $adname . $adsub . $updatemassage;
                             
                             $selecttable ="SELECT * FROM massages WHERE massage_id = $key ";
                             $result= mysqli_query($con, $selecttable);
                             $num = mysqli_num_rows($result);
                             while($row = mysqli_fetch_row($result)){
                                $status = $row[6];
                                if(!empty($status)){
                                    ?>   
                                    <h6 class="alert alert-dark" > this massage replied  </h6>
                               <?php
                                }
                                else  {  
                                send_mail($admaill,$adname,$adsub,$updatemassage,$email,$adne);


                             if($num > 0){
                              
                               if(empty ($updatemassage)){?><h6 class="alert alert-dark" > Until didnot write massage did not send empty massage</h6><?php
                            }
                               $updateqe= "UPDATE massages SET massagetouser= '$updatemassage',statuss='1' WHERE massage_id='$key '";
                               mysqli_query($con, $updateqe);

                           }}}
                       }
                          
            ?>
           
                </div>
              </div>

            </div>
          </div>
        </div>
       
          
</section>
<?php } else {
        header('Location: ../login.php');
        exit();
 }