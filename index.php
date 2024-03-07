<?php
const PAGE_TITLE = "Home";
include_once("includes/head.php");
?>

<body class="body header-fixed is_dark">

    <?php
    include_once("includes/preloader.php")
    ?>
    <div id="wrapper">
        <div id="page" class="clearfix">

            <?php
            include_once("includes/header.php");
            include_once("includes/hero.php");
            include_once("includes/about.php");
            include_once("includes/live-auctions.php");
            include_once("includes/popular-collection.php");
            include_once("includes/how-we-work.php");
            include_once("includes/top-sellers.php");
            include_once("includes/contact.php");
            include_once("includes/footer.php");
            ?>


        </div>
        <!-- /#page -->
    </div>
    <!-- /#wrapper -->
    <?php
    include_once("includes/bottom.php");
    ?>
</body>
</html>