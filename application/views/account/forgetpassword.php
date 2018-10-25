<!-- <?php echo validation_errors(); ?> -->

<?php echo form_open('account/provideEmailForResetPassword'); ?>
<main class="container login">
    <h2 class="text-center my-lg-4">Forget Password</h2>
    <div class="text-light bg-danger text-center" style="font-size: 1.8rem;">
    <?php echo validation_errors();
          echo $message;
    ?>

    </div>
    <div class="col-md-4">
    </div>
    <article class="col-md-8 mx-auto" style="border: none; width: 60%; margin-bottom: 5rem; margin-top: 2.5rem;">
        <div class="form-group">
            <label for="email">Email</label>
            <input class='form-control' name="email" id="email" type="text" placeholder="Enter your email to reset password">
        </div>

        <div class="form-group">
            <button id="login" type="submit" >Reset Password</button>
        </div>
    </article>
    <div class="col-md-4">
    </div>
    </form>
</main>
