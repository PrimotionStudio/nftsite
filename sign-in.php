<?php
const PAGE_TITLE = "Sign In";
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
            require_once("includes/title.php");
            require_once("includes/sign-in-form.php");
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