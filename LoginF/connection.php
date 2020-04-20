<?php
    $mysqli = new mysqli();
    if($mysqli->connect_errno > 0){
        die('Unable to connect to database [' . $mysqli->connect_error . ']');
    }
?>

<?php
function Connection_to_DB()
 {

 $mysqli = new mysqli("rendertech.com", "pupone_Florian" , "Florian20^^", "pupone_Summarizer") or die("Connect failed: %s\n". $conn -> error);
 
 return $mysqli;
 }
 
function CloseCon($mysqli)
 {
 $mysqli -> close();
 }
   
?>