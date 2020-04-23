<!DOCTYPE html>
<html>

    <body>

        <?php
        /* show banner if cookies is not accepted */
        if (!isset($_COOKIE['accept-cookies'])) {

            include ('cookie-notice-banner/cookie-notice-banner.html'); 
           /* JQuery so the banner slides down and css for cookie notice banner */
            echo '<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>'
            . '<script src="../cookie-notice-banner/cookie-notice-banner.js"></script>';
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
                    <?php include('AKBA 6E - 191119.html'); ?>

                </div>

        </div>
    </body>
</html>