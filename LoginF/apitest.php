<html lang="en">
<head>

</head>

  <body>
  
    <?php
        
      
        // API with single stock
        $Stock = "AAPL";
        echo "//API request with single stock: ";
        echo $Stock;
        echo "<br>";
        //get response
        $response_with_single_stock_symbol = file_get_contents('https://api.iextrading.com/1.0/tops/last?symbols='.$Stock);
        echo "Response:   ";
        echo gettype($response_with_single_stock_symbol);
        echo "<br>";
        //decode and output
        $final_single = json_decode($response_with_single_stock_symbol);
        print_r($final_single);
          
        echo "<br>"; echo "<br>"; echo "<br>";
        
        // API with multiple stocks          
        $ListOfStocks = "ACAD,CRM,BYSI";   
        echo "//API request with multiple stocks: ";
        echo $ListOfStocks;
        echo "<br>";
        //get response
        $response_with_multiple_stock_symbol = file_get_contents('https://api.iextrading.com/1.0/tops/last?symbols='.$ListOfStocks); 
        echo "Response: ";
        echo gettype($response_with_multiple_stock_symbol);
        echo "<br>";
        //decode and output
        $final_multiple = json_decode($response_with_multiple_stock_symbol); 
        print_r($final_multiple);
       
      
 /*

       */ 
        

?>


  

</body>
</html>
    
    