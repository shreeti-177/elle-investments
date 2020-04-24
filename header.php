
<head>
    <title><?php print $title; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
    <!--All page specific code goes above this line which loads the common head-->


    <meta name='viewport' content='width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0'/>
    <link rel='stylesheet' type='text/css' href='css/main.css'/>
    <link id='navigationId' rel='stylesheet' type='text/css'  href='css/navigation.css'/>
    <link rel='stylesheet' type='text/css' href='css/footer.css'/>
    <link class='css/responsive_css'>
    <link rel='stylesheet' type='text/css'  media='only screen and (min-width:737px) and (max-width:880px)' href='css/screen_layout_medium.css'/>
    <link rel='stylesheet' type='text/css'  media='only screen and (min-width:50px) and (max-width:736px)' href='css/screen_layout_small.css'/>
    <link rel='stylesheet' type='text/css'  media='only screen and (max-height:440px)' href='css/screen_layout_small.css'/>

    <script src='js/jquery.cookie.js'></script>

    <script src='js/plus-minus.js'></script>

    <!--
    
    <link rel='stylesheet' type='text/css' href='../css/main.css'/>
    <link rel='stylesheet' type='text/css' href='../css/footer.css'/>
     <link rel='stylesheet' type='text/css' href='../css/footer.css'/>
    -->

</head>

<div>
    <table style="margin-bottom: 0px;">
        <tbody>
            <tr>
                <td id="left-header" width="80%">
                    <div id="stars">
                        <!-- creates a hidden div on top of the page where the stars are displayed
                             right clicking on the div will lead to a new page -->
                        <div oncontextmenu="javascript:window.location.href = 'privato/index.php';" 
                             style="opacity: 0; width: 50px; height:50px; left: 23px; cursor:default; 
                             background-color:red; position: absolute;"></div>

                        <h1 style="display:inline-block">Elle Investments </h1>
                    </div>
                    <h4> Asset Management</h4>
                </td>
                <td id="right-header" width="20%" style=" text-align: center">
                    <div style="display: inline-block">

                        <a target="_tab" rel="noopener noreferrer" href="LoginF/index.php">
                            <img src = "images/ELLE LOGO-Lwlogin_100x56.png" width="100" height="56px" alt="Elle Investments logo" ></a>
                    </div>  
                </td>
            </tr>
        </tbody>
    </table>


    <?php include('crumbs.html'); ?> 
    <!--
    <div class="middle-bar"></div> -->
</div> 

