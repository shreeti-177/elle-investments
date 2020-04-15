<?php 

  $conect = mysqli_connect("rendertech.com", $_SESSION['uname_long'], $_SESSION['psw'], "pupone_Summarizer");

  
  $csv = str_getcsv(file_get_contents('file/ListOfStocks1.csv'));
  $ListOfStocks = preg_replace('/\s\s/', ',', $csv[0]);

  $filename = file_get_contents('https://api.iextrading.com/1.0/tops/last?symbols='.$ListOfStocks);
  $final = json_decode($filename, true);
  //print_r($final[0]); 
  //echo $filename ; same as above

  foreach ($final as $row) {
    $query = "INSERT INTO main_tables(current_price, last_update) VALUES('$row["price"]', '$row["time"]')";
    
  }
  

  


  
  // $final = json_decode($response);
  // $elementCount  = count($final);
  
  // //print_r($final[0]->symbol) ;
  // //echo $elementCount;

  // $mysqli = new mysqli("rendertech.com", $_SESSION['uname_long'], $_SESSION['psw'], "pupone_Summarizer");
  
  

  // for ($x = 0; $x < $elementCount; $x++) {
  //   $current_price = $final[$x]->price;
  //   $symbol = $final[$x]->symbol;
  //   //echo $symbol. ": ".$current_price."\r\n";

  //   $query="UPDATE main_table SET current_price='$current_price' WHERE symbol='$symbol'";
  //   $mysqli->query("$query");
          
  // }
  
  // $mysqli->close();


?>