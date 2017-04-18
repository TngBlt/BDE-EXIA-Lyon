<?php $customTitle = "Log in !";

$customHead = "<link rel='stylesheet' href='css/connection.css'/>";

$topPadding = true;

include "../includes/header.php"; ?>

        <div class="row login">

            <div class="col-md-6 login-column">

                <div class="widget widget-primary">
                    <h2 class="widget-title widget-offset">Join us !</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nibh urna, venenatis ut massa non, placerat semper sem. Donec tempor lorem leo, eget pulvinar risus rutrum et. Cras bibendum ipsum lectus, ac varius felis accumsan ut. Phasellus porttitor augue nunc.</p>
                </div>

                <div class="widget login-widget">

                    <h3 class="widget-title widget-offset">Log in</h3>

                    <form class="login-form">

                        <div class="form-group">
                            <label for="login-email">Email</label>
                            <input type="text" name="login-email" id="login-email" class="form-control"/>
                            <small class="text-muted form-text">The email defined during the registration</small>
                        </div>

                        <div class="form-group">
                            <label for="login-password">Password</label>
                            <input type="password" name="login-password" id="login-password" class="form-control"/>
                            <small class="text-muted form-text">The password defined during the registration</small>
                        </div>

                        <div class="row no-margin-row justify-content-end">
                            <button class="button button-primary">Log in</button>
                        </div>

                    </form>

                </div>

            </div>

            <div class="col-md-6 signin-column">

                <div class="widget">

                    <h3 class="widget-title widget-offset">Sign in</h3>

                    <form class="signin-form">

                        <div class="form-group">
                            <label for="signin-username">Username</label>
                            <input type="text" name="signin-username" id="signin-username" class="form-control"/>
                            <small class="text-muted form-text">The username used for the log in</small>
                        </div>

                        <div class="form-group">
                            <label for="signin-email">Email</label>
                            <input type="email" name="signin-email" id="signin-email" class="form-control"/>
                            <small class="text-muted form-text">To stay in touch</small>
                        </div>

                        <div class="form-group">
                            <label for="signin-password">Password</label>
                            <input type="password" name="signin-password" id="signin-password" class="form-control"/>
                            <small class="text-muted form-text">The password to protect your account</small>
                        </div>

                        <div class="form-group">
                            <label for="signin-password-check">Password verification</label>
                            <input type="password" name="signin-password-check" id="signin-password-check" class="form-control"/>
                            <small class="text-muted form-text">Just to be sure</small>
                        </div>

                        <div class="row no-margin-row justify-content-end">
                            <button class="button button-primary">Sign in</button>
                        </div>

                    </form>

                </div>

            </div>

        </div>

<?php include "../includes/footer.php"; ?>