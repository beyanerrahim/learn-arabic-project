<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
     integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>book quran</title>

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
    .sectiontitlebook{
      width: 100%;
       padding: 9px;
       
      color:green;
      /* box-shadow: 1px 2px 5px #dacfcf; */
  }
  .section-title-book{
      display: inline-block;
      text-align: left;
      width: 55%;
       
      font-size: 30px;
     
  }
  .link2{
    
    display: inline-block;
    width: 40%;
    text-align: left;
  }
  .hover-title {
   color: green;
  }
.hover-title:hover{
   color: darkmagenta;
}
.content-book{
    width: 37%;
    height: 400px;
    /* background-color: green; */
    float: right;
    margin: 7px 4%;
}
.book_title{
    height: 25%;
    padding: 5px;
    /* background-color: yellow; */
    text-align: center;
}
.bookpdf{
    height: 90%;
    padding-left:5% ;
    /* padding-right: 3%; */
    
}

@media screen and (max-width:768px) {
    .content-book{
    width: 100%;
    height: 400px;
    margin: 10px ;
    /* background-color: green; */
}
.section-title-book{
    text-align: right;
    width: 70%;
}
.link2{
    width: 20%;
}
}
    </style>
</head>
<body >
    
<section class="sectiontitlebook ">
       <h2 class="section-title-book">  كتب وقصص القران الكريم  </h2>
       <span class="link2"><a href="indexs.php" style="text-decoration: none;" class="hover-title">الصفحة الرئيسية</a></span>
       
</section>

<?php
include 'database.php';
              $bookquran = @mysqli_query($con,"SELECT book_name,file_url FROM books WHERE department_id=5");

             if(@mysqli_num_rows($bookquran) == 0)
	          echo"Errro: No lesson founded";
             else{
              // <?php echo $animals['file_url'];
	        while($qurans = @mysqli_fetch_array($bookquran)){
 ?>

            <div class="content-book">
              
                  <div class="book-content">
                  <h3 class="book_title "><?php echo $qurans['book_name']; ?></h3>
                   <div class="bookpdf">
                                 
                   <embed  src="Admin/upload/<?php echo $qurans['file_url'];?>" width="100%" height="340px"/> 
                    
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









