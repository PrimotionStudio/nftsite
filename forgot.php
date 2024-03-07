<?php
const PAGE_TITLE = "Forgot Password";
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
            include_once("includes/title.php");
            include_once("includes/forgot-form.php");
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