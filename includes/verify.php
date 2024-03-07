<section class="tf-login tf-section">
    <div class="themesflat-container">
        <div class="row">
            <div class="col-12">
                <h2 class="tf-title-heading ct style-1">
                    Verify Your Account
                </h2>

                <div class="flat-form box-login-email">
                    <div class="box-title-login">
                        <h5>Confirm your ownership to this account by inputing the OTP code sent to your mail: <?= $_SESSION["otp_mail"] ?></h5>
                    </div>

                    <div class="form-inner">
                        <form action="#" id="contactform">
                            <input id="" name="text" tabindex="2" value="" aria-required="true" type="email" placeholder="Your OTP Code" required>
                            <button class="submit">Verify</button>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>