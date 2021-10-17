<?php

//Title Page
//The Page has $pageTitle And echo Defult For Other Pages.
function getTitle(){

global $pageTitle;

if (isset($pageTitle)) {

    echo $pageTitle;

} else {
    
    echo 'Default';
}
}

//Function to Check Item ın Database 
//Check Total İtem
function checkItem($select, $from, $value) {

    global $con;

    $ceckitem = "SELECT $select FROM $from WHERE $select='$value' ";
    $result = mysqli_query($con, $ceckitem);
    $num = mysqli_num_rows($result);
    return $num;
   
}

function checkItemnum($selected, $from) {

    global $con;

    $ceckitem = "SELECT $selected FROM $from";
    $result = mysqli_query($con, $ceckitem);
    $num = mysqli_num_rows($result);
    return $num;
}

//Home Redirect Function
//$theMsg = Echo the The Message [Error, Seccess, Warning]
//$url =Want to Redirect TO
//$seconds = Seconds Befor Redireting

function redirectHome($theMsg, $url= null, $seconds = 3)
{
    if ($url === null) {
        $url ='index.php';
        $link= 'Home Page';
    } else {
        if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== '') {

            $url = $_SERVER['HTTP_REFERER'];
            $link = 'Previous Page';
        } else {
            $url = 'index.php';
            $link = 'Home Page';
        }
        
    }
    echo $theMsg;
    echo "<div class='alert alert-info'>You Will Be Redirected to $link After $seconds seconds.</div>";
    header("refresh:$seconds;url=$url");
    exit();
}