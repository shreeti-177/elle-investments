
     <head>
        <title><?php print $title; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
        <!--All page specific code goes above this line which loads the common head-->
        <script src="../js/load-head.js"></script>
        <!--why is the line above not working and the line below necessary?-->
        <link rel='stylesheet' type='text/css' href='../css/main.css'/>
        
        
    </head>
    
    <div>
    <table style="margin-bottom: 0px;">
        <tbody>
            <tr>
                <td id="left-header" width="80%">
                    <div id="stars">
                        <!-- creates a hidden div on top of the page where the stars are displayed
                             right clicking on the div will lead to a new page -->
                        <div oncontextmenu="javascript:window.location.href = '../privato/index.php';" 
                             style="opacity: 0; width: 50px; height:50px; left: 23px; cursor:default; 
                             background-color:red; position: absolute;"></div>

                        <h1 style="display:inline-block">Elle Investments </h1>
                    </div>
                    <h4> Asset Management</h4>
                </td>
                <td id="right-header" width="20%" style=" text-align: center">
                    <div style="display: inline-block">
                       
                        <a target="_tab" rel="noopener noreferrer" href="../LoginF/login.php">
                         <img src = "http://www.elle-investments.com/images/ELLE LOGO-Lwlogin_100x56.png" width="100" height="56px" alt="Elle Investments logo" ></a>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>


    <?php include('crumbs.html'); ?> 
    <!--
    <div class="middle-bar"></div> -->
</div> 

