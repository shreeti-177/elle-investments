<?php




if (isset($_GET['accept-cookies'])) {
    /* cookie notice banner accepted for one year 31556925 or ~6 months 16000000 or until they clear history */
    setcookie('accept-cookies', 'cookies-notice-banner-accepted', time() + 16000000);
    header('Location: ./index.php'); /* refresh this page */
}
?>

<?php


$page = $_GET['page'];
switch ($page) {
    case "de_nobis":
        $page = "de_nobis.html";
        $title = "de_nobis";
        break;
    case "research":
        $page = "research.html";
        $title = "research";
        break;
    case "internships":
        $page = "internships.html";
        $title = "internships";
        break;

    case "contact":
        $page = "contact.html";
        $title = "contact";
        break;

    case "tracker":
        $page = "tracker.html";
        $title = "tracker";
        break;
    
    case "tutorials":
        $page = "tutorials.html";
        $title = "tutorials";
        break;

    default:
        $page = "de_nobis.html";
        $title = "De Nobis - About us";
}
?>

<!DOCTYPE html>
<html>

    <head>
        <title><?php print $title; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
        <!--All page specific code goes above this line which loads the common head-->
        <script src="../js/load-head.js"></script>
        
    </head>

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
                <?php include('../mainFolder/header.php'); ?> 
            </div>
            <div id="main-container" class="clear"> 
                <div id="tableDiv">
                    <?php include($page); ?>

                </div>
            </div>

            <footer id="colophon" class="clearfix notranslate"> 
                <?php include('../mainFolder/footer.html'); ?> 
            </footer>

        </div>
    </body>
</html>



