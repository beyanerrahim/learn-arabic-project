<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
     integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>lesson gramer</title>

    <style>
@import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700;900&display=swap');

    html{
        direction: rtl;
    }
    body{ 
    direction: rtl;  
    font-family:"tajawal",sans-serif;
    text-align: right;
    }
  .lesson-content{
      width: 30%;
      height:260px;
     /* background-color:#f3d9e7; */
      float: right;
      margin: 10px;
      
  }
  .content-number{
      margin: 10px 4%;
     
  }
  
  .sectiontitlelesson{
      width: 100%;
       padding: 9px;
       
      color:darkmagenta;
      /* box-shadow: 1px 2px 5px #dacfcf; */
  }
  .section-title{
      display: inline-block;
      text-align: left;
      width: 55%;
       
      font-size: 30px;
     
  }
  .link1{
    
    display: inline-block;
    width: 40%;
    text-align: left;
  }
  .lesson_title{
     text-align: center;
     /* background-color:#f3d9e7 ; */
     /* color:darkmagenta ;
     */
  }
  .title-gramer{
      font-size: 20px;
  }
  @media screen and (max-width :768px){
    .lesson-content{
        width: 100%;
        height:300px;
    }
    .lesson_title{
     text-align: center;
     padding-left: 25%;
  }
  }
    </style>
</head>
<body >
    
<section class="sectiontitlelesson ">
       <h2 class="section-title">  قواعد اللغة العربية</h2>
       <span class="link1"><a href="indexs.php" style="text-decoration: none;color: darkmagenta;">الصفحة الرئيسية</a></span>
       
</section>

<?php
include 'database.php';
              $lessongramer = @mysqli_query($con,"SELECT lesson_name,link FROM lessons WHERE department_id=6");

             if(@mysqli_num_rows($lessongramer) == 0)
	          echo"Errro: No lesson founded";
             else{
               // <?php echo $numbers['link'];
               //src="<?php echo $numbers['link']; " 
	        while($gramers = @mysqli_fetch_array($lessongramer)){
 ?>

            <div class="content-number">
              
                  <div class="lesson-content">
                  <h3 class="lesson_title mb-2 title-gramer"><?php echo $gramers['lesson_name']; ?></h3>
                   <div class="lessonvedio">
            
        
                 <iframe width="350" height="217" src="<?php echo $gramers['link'];?>" 
                title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                 allowfullscreen></iframe>

                   </div>
                   </div>
              
            </div>


<?php
            }}
?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
 integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
</html>









