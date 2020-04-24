<?php
   
  session_start();
       
  if(!isset($_SESSION['uname'])){
      
   
    header("Location:logout.php");
    exit();
}
  if(isset($_GET["symbolSearch"])){
    $name=$_GET["symbolSearch"];
    header("Location:symbol.php?name=$name");
  };
 $user=$_SESSION['uname'];
 $type=$_SESSION['type'];
?>
<html lang="en">
    <head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


      <script src="http://mbostock.github.com/d3/d3.v2.js"></script>

<!-- jQuery library -->
<!-- <script src="SummarizerJS.js"></script> -->

<!-- Latest compiled JavaScript -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="symbol.css">
    </head>
    <body>
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
          </div>
          <ul class="nav navbar-nav">
              <p><?php echo $user ?></p>
     
              <p><?php echo $type ?></p>
              <button class="btn btn-default btn-md"><a href="logout.php">Log Out</a></button>
              <input id="back" class="btn btn-default btn-md"type="button" value="Main Page" onClick="Search()">
              <input class="btn btn-default btn-md" id="save"type="button" value="Save">
          </ul>
          <form class="navbar-form navbar-right"  action="symbol.php" method="GET" role="search" >
            <div class="input-group">
            <div class="input-group-btn">
                <input class="btn btn-default btn-sm" type="submit" name="submit" value="Go To">
              </div>
              <input   type="text" class="form-control" name="symbolSearch">
            </div>
          </form>
        </div>
      </nav>
      <div id="main-content">
      <br>
          <?php
          //check if user wanna redirect to other symbol page from the current symbol page
            if(isset($_GET["name"])){
              //get the symbol from the user input
              $name=$_GET["name"];
            };
            $con1=mysqli_connect("rendertech.com",$_SESSION['uname_long'],$_SESSION['psw'],"pupone_Summarizer");
            if (!$con1)
              {
              die('Could not connect: ' . mysqli_error());
              }
             
            mysqli_select_db($con1,"pupone_Summarizer");
            //select data from db for the searched symbol
            if($result2 = mysqli_query($con1,"SELECT * FROM main_table WHERE symbol='".$name."'"))
            {
              
              if(mysqli_num_rows($result2)==0){
                echo "<br><h3>Your input does not exist!</h3>";
              }else{
                /* pull data from database and insert into data table. */
                while($row1 = mysqli_fetch_array($result2))
                {
                  ?>
                    <ul>
                        <li><h4><a contenteditable="true" id="status"><?= $row1['status'] ?></a></h4></li>
                        <li><h4>Penny Stock: <a contenteditable="true" id="PStock"><?= $row1['penny_stock'] ?></a></h4><h4>Cash: <a contenteditable="true" id="cash"><?= $row1['cash'] ?></a></h4><h4>Burn: <a contenteditable="true" id="burn"><?=$row1['burn'] ?></a></h4></li>
                        <li><h4>Biotech: <a contenteditable="true" id="biotech"><?= $row1['biotech'] ?></a></h4></li>         
                    </ul>
                    <h2 id="symbol"><a href="https://seekingalpha.com/symbol/<?=$row1['symbol']?>/chart" onclick="javascript:void window.open(`https://seekingalpha.com/symbol/`<?$row1['symbol']?>`/chart`,`1520620719413`,`width=920,height=1200,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=200px,top=100px`);return false;"><span id="link" class="glyphicon glyphicon-picture" aria-hidden="true"></span></a><?= $row1['symbol'] ?></h2>
                    
                    <h4 class="stock_title"><a contenteditable="true" id="mktCap"><?= $row1['market_cap'] ?></a></h4>
                    
                    <h4 class="stock_title"><a contenteditable="true" id="industry"><?= $row1['industry'] ?></a></h4>
                    <h4>Current Price ($): <span id="api_return"></span></h4>   
                    
                   
                  <!--<div style="clear:both"></div>-->
                  <!--<div id="graph" class="aGraph" style="text-align:center;background-color:lightgrey;"></div>-->
        
                    <table class="table table-striped">
                      <tbody>
                        <tr>
                         <td><h4>1st Price Target : <a contenteditable="true" id="PTarget"><?= $row1['1st_price_target'] ?></a></h4></td>
                           <td><h4>Down Risk: <a contenteditable="true" id="down"><?= $row1['downside_risk'] ?></a></h4></td>
                          <td><h4>Target Weight: <a contenteditable="true" id="Tweight"><?= $row1['target_weight'] ?></a></h4></td>
                          <td><h4>Next Earnings: <a class="updatable" contenteditable="true" id="next_earnings"><?= $row1['next_earnings'] ?></a></h4></td>
                        </tr>
                        <tr>
                          <td><h4>1st Upside: <a contenteditable="true" id="upside"><?= $row1['1st_upside'] ?></a></h4></td>
                          <!--must change the ID below>-->
                          <td><h4>Consensus : <a contenteditable="true" id="2ndPTarget"><?= $row1['2nd_price_target'] ?></a></h4></td>
                          <td><h4>Actual Weight: <a contenteditable="true" id="actualWeight"><?=$row1['actual_weight'] ?>%</a></h4></td>
                          <td><h4>Last Earnings Date: <a id="LDate" class="updatable" contenteditable="true"><?= $row1['last_earnings'] ?></a></h4></td>
                        </tr>
                        <tr>
                          <td><h4>Last Update: <a contenteditable="true" id="LUpdate"><?= $row1['last_update'] ?></a></h4></td>
                               <!--must change the ID below>-->
                          <td><h4>Consensus Upside: <a contenteditable="true" id="2ndupside"><?= $row1['2nd_upside'] ?></a></h4></td> 
                          <td><h4>Weight Difference: <a contenteditable="true" id="diff"><?= $row1['weight_difference'] ?></a></h4></td>
                          <td><h4>Analysis Date: <a contenteditable="true" id="AnalysisDate"><?= $row1['analysis_date'] ?></a></h4></td>
                        </tr>
                        <tr>
                            <td><h4>Last Price:<a style="width:60px" contenteditable="true" id="last_price"><?= $row1['last_price'] ?></a></h4></td>
                           <td><h4>Confidence: <a contenteditable="true" id="confidence"><?= $row1['confidence'] ?></a></h4></td> 
                          <td><h4>Intern:<a id="intern" contenteditable="true"><?= $row1['intern'] ?></a></h4></td>
                          <td><h4>Analysis Price: <a contenteditable="true" id="analysisPrice"><?= $row1['analysis_price'] ?></a></h4></td>                       
                        </tr>
                        <tr>
                          <td><h4>VariationL:<a contenteditable="true" id="varL"></a></h4></td> 
                          <td><h4>Rank: <a contenteditable="true" id="rank"><?= $row1['rank'] ?></a></h4></td>
                          <td><h4></h4></td>
                          <td><h4>Variation1: <a contenteditable="true" id="LTarget"><?= $row1['variation1'] ?>%</a></h4></td>
                            
                        </tr>
                      </tbody>
                    
                    </table>
                    <button id="btn1"><span id="first1" class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Discussion</button>
                    <button id="btn2"><span id="second1" class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Worst Case</button>
                    <button id="btn3"><span id="third1" class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Catalysts</button>
                    <button id="btn4"><span id="forth1" class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Related Tickers</button>
                    <button id="btn5"><span id="fifth1" class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Strategy</button>
                    
                    <h4 id="question"><span id="first" class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Discussion:</h4>   
                    <textarea id="question1" contenteditable="true"><?= $row1['discussion'] ?></textarea>
                
                    <h4 id="case"><span id="second" class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Worst Case:</h4>
                    <textarea id="case1"contenteditable="true"><?= $row1['worst_case'] ?> </textarea>
                    
                    <h4 id="catalyst"><span id="third" class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Catalysts:</h4>
                    <textarea id="catalyst1" contenteditable="true"><?= $row1['catalysts'] ?></textarea>
               

                    <h4 id="ticket"><span id="forth" class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Related Tickers:</h4>
                    <textarea id="ticket1" contenteditable="true"><?= $row1['related_tickers'] ?></textarea>
                    
                    <h4 id="stra"><span id="fifth" class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Strategy:</h4>
                    <textarea id="stra1" contenteditable="true"><?= $row1['strategy'] ?></textarea>
                    
                    <h4 id="note">Notes:</h4>
                    <div class="textarea" id="note1" contenteditable="true"><?= $row1['notes'] ?></div>
              
              <?php 
                
                }
                mysqli_free_result($result2);
          }
            mysqli_close($con1);
        }
      
          if($_SESSION["type"]=="viewer"){
            //if the user type is viewer, set all fields as readonly
            echo "
            <script>
              $('a').attr('contenteditable','false');
              $('textarea').attr('readonly','readonly');
              $('#note1').attr('contenteditable','false');
            </script>
            ";
          }
          
          if($_SESSION["type"]=="Updater"){
            //if the user type is viewer, set all fields as readonly
            echo "
            <script>
              $('a').attr('contenteditable','false');
              $('textarea').attr('readonly','readonly');
              $('#note1').attr('contenteditable','false');
              //$('a').attr('contenteditable','true');
             $('.updatable').attr('contenteditable','true');
              

            </script>
            ";
          }
        ?>
      </div>
      <!-- script for hiding and displaying discussion, worst case .... -->
        <script src="sym.js"></script>
        <!-- script for saving symbol data on user click -->
        <script src="save.js"></script>
        <script>
          // API call to get the current stock price
         var symbol=$("#symbol").text();
            
            
            var firstPriceTarget=$("#PTarget").text();
            var secondPriceTarget=$("#2ndPTarget").text();
            var last_price=$("#last_price").text();
            //console.log(last_price, secondPriceTarget, firstPriceTarget);
            window.onload = function(){
                var now = Math.floor(Date.now());
                $.getJSON('https://api.iextrading.com/1.0/tops/last?symbols=' + symbol, function(data) {
                    var latestPrice = data[0].price;
                    var timeUpdated = data[0].time;
                    if (now - timeUpdated > 600000){
                    $("#price").text(latestPrice + "!!");
                }else{
                    $("#price").text(latestPrice);
                    //$.post("Latest_price_into_Main.php",data[0]);
                    
                }
                document.getElementById('api_return').innerHTML = latestPrice;
                //console.log(data);
            });
        };
          
            
        </script>
    </body>
</html>
