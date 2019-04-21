<!DOCTYPE html>
<html>

    <head>
        <title><?php print $title; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
        <!--All page specific code goes above this line which loads the common head-->
        <script src="/js/load-head.js"></script>
        <!--why is the line above not working and the line below necessary?-->
        <link rel='stylesheet' type='text/css' href='/css/main.css'/>
        
    </head>

    <body>

        <?php
        /* show banner if cookies is not accepted */
        if (!isset($_COOKIE['accept-cookies'])) {

            include ('cookie-notice-banner/cookie-notice-banner.html');
            /* JQuery so the banner slides down and css for cookie notice banner */
            echo '<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>'
            . '<script src="cookie-notice-banner/cookie-notice-banner.js"></script>';
        }
        ?>

        <div id="supra-header"></div>
        <div id="page">
            <div id="header"> 
                <?php include('../header.php'); ?> 
            </div>
             <div id="main-container" class="clear"> 
                <br>
                <div id="tableDiv">
                    <?php include('PBYI.html'); ?>

                </div>

            <footer id="colophon" class="clearfix notranslate"> 
                <?php include('../footer.html'); ?> 
            </footer>

        </div>
    </body>
</html>