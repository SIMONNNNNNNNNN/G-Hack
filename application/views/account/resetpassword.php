<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php echo form_open('account/resetPassword'); ?>
<div class="container">

    <h2 class="text-center my-lg-4">Reset Password</h2>
    <div class="text-light bg-danger text-center" style="font-size: 1.8rem;">
    <?php echo validation_errors(); ?>
    </div>

<article class="col-md-8 mx-auto" style="border: none; width: 60%; margin-bottom: 5rem; margin-top: 2.5rem;">

    <div class="form-group">
        <label for="password_new">New Password</label>
        <input class='form-control' name="password_new" id="password_new" type="text" placeholder="Type in your new password">
    </div>

    <div class="form-group">
        <label for="password_new_confirm">New Password Confirm</label>
        <input class='form-control' name="password_new_confirm" id="password_new_confirm" type="text" placeholder="Type again">
    </div>

    <div class="form-group">
        <button id="login" type="submit" >Confirm</button>
    </div>
</article>
</div>



<style>
    form{
        display:block;
    }


    .form-group button{
        width: 100%;
        padding: 1em 0;
        color: #fff;
        font-weight: 700;
        background-color: #ca1e56;
        border: none;
    }
</style>