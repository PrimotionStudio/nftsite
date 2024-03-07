<?php
require_once("required/session.php");
const PAGE_TITLE = "Sign Up";
require_once("required/sql.php");
require_once("func/sign-up.php");
include_once("includes/head.php");
include_once("includes/alert.php");
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
            include_once("includes/sign-up-form.php");
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