<?php
if (!isset($_SESSION["otp_mail"]) || !isset($_SESSION["user_id"])) {
    $user_id = "";
    $mail = "";
} else {
    $user_id = $_SESSION["user_id"];
    $mail = $_SESSION["otp_mail"];
}
?>
<section class="tf-login tf-section">
    <div class="themesflat-container">
        <div class="row">
            <div class="col-12">
                <h2 class="tf-title-heading ct style-1">
                    Verify Your Account
                </h2>

                <div class="flat-form box-login-email">
                    <div class="box-title-login">
                        <h5>Confirm your ownership to this account by inputing the OTP code sent to your mail: <?= $mail ?></h5>
                    </div>

                    <div class="form-inner">
                        <form action="" method="post" id="contactform">
                            <input type="hidden" name="user_id" value="<?= $user_id ?>">
                            <input type="hidden" name="mail" value="<?= $mail ?>">
                            <input id="" name="otp" tabindex="2" value="" aria-required="true" type="text" placeholder="Your OTP Code" required>
                            <button class="submit">Verify</button>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>