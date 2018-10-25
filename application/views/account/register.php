<!-- User registration page including users of Google accounts-->


<?php echo form_open('account/register'); ?>

<main class="container login">
    <h2 class="text-center my-lg-4">Register your account</h2>
    <div class="bg-danger text-center text-white my-3">
        <p class="my-lg-4"><?php echo validation_errors(); ?></p>
    </div>
    <section class="row">
        <article class="col-md-6">
            <div class="form-group">
                <label for="email">Email</label>
                <input class='form-control' name="email" id="email" type="text" placeholder="Type in a valid email">
            </div>
            <div class="form-group">
                <label for="name">Full Name</label>
                <input class='form-control' name="name" id="name" type="text" placeholder="Type in your full name">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class='form-control' name="password" id="password" type="password" placeholder="Type in a valid password">
            </div>
            <div class="form-group">
                <label for="password_confirm">Confirm Password</label>
                <input class='form-control' name="password_confirm" id="password_confirm" type="password" placeholder="Retype your password">
            </div>
            <div class="form-group">
                <button id="CreateAccount_bttn" type="submit" >Register Account</button>
            </div>
        </article>
        <div class="col-md-1">
        </div>
        <aside class="col-md-4">
            <h4>Connect with Google</h4>
            <!-- Google Sign in button -->
            <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
        </aside>
        </aside>
        </aside>
        </form>
    </section>  
</main>

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
