<?php
const PAGE_TITLE = "Home";
require_once("includes/head.php");
?>

<body class="body header-fixed is_dark">

    <?php
    require_once("includes/preloader.php")
    ?>
    <div id="wrapper">
        <div id="page" class="clearfix">

            <?php
            require_once("includes/header.php");
            require_once("includes/hero.php");
            require_once("includes/about.php");
            require_once("includes/live-auctions.php");
            require_once("includes/popular-collection.php");
            require_once("includes/how-we-work.php");
            require_once("includes/top-sellers.php");
            require_once("includes/contact.php");
            require_once("includes/footer.php");
            ?>


        </div>
        <!-- /#page -->
    </div>
    <!-- /#wrapper -->
    <?php
    require_once("includes/bottom.php");
    ?>
</body>
</html>