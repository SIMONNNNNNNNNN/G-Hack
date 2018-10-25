<!-- form for user to log in -->

<?php echo validation_errors(); ?>
<?php if(isset($error)){echo $error;}?>
<?php echo form_open('account/login'); ?>

<main class="container login">
    <h2 class="text-center">Sign in to your account</h2>
    <section class="row">
        <article class="col-md-6">
            <div class="form-group">
                <label for="email">Email</label>
                <input class='form-control' name="email" id="email" type="text" placeholder="Type in your email">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input class='form-control' name="password" id="password" type="password" placeholder="Type in your password">
            </div>

            <div class="form-group">
                <button id="login" type="submit">Sign In</button>
            </div>
            <div style="text-align: center">
            	<a href="<?php echo base_url('account/forgetPassword') ?>">Forgot Password?</a>
            </div>
        </article>
        <div class="col-md-1">
        </div>
        <aside class="col-md-4">
            <h4>Google Sign In</h4>
            <!-- Google Sign in button -->
            <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
        </aside>
        </form>

        <!-- Google sign in / registration function -->
        <script>
            function onSignIn(googleUser) {
                // Getting Google user data
                var profile = googleUser.getBasicProfile();

                // The ID token to pass to backend to check Google sign in authenticity:
                var id_token = googleUser.getAuthResponse().id_token;

                //AJAX sending token to controller to check authenticity and if existing account
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('account/google') ?>",
                    dataType: "json",
                    data:
                    {
                        token: id_token,
                        name: profile.getName(),
                        email: profile.getEmail()
                    },
                    success: function(data, status) {
                        //alert("Result: " + data.response);
                        
                        //will redirect user to another page (or dashboard) if logged in
                        if (data.logged_in) {
                            window.location.href = data.redirect;
                        } else {
                            signOut();
                        }
                    }
                });
            }
        </script>
    
    </section>
</main>
