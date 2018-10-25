<!-- This is the main website header and navigation bar used in all pages -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- needed for Google sign ins/registration -->
    <meta name="google-signin-client_id" content="759948704133-m9u80ag34n0037rm8kqhhaqdauqgmh2i.apps.googleusercontent.com">
    <title>Hackerspace</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url(); ?>/images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('css/style.css');?>">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
<nav class="container-fluid">
  <div class="row">
      <figure class="col-md-6">
          <a href="<?php echo base_url()?>" ><img class="mt-3" src="https://2018.hackerspace.govhack.org/assets/bannerlogo-ab7eef11d2ba1db01308a41598c4ceba43c997bb7f855f7c914dd62599980dbc.png" width ="180" alt="IMG-LOGO"></a>
      </figure>
      <div class="col-md-2">
      </div>
      <div class="col-md-4">

        <!-- This section shows Register and Login buttons if user is not logged in
            or Dashboard and Logout buttons if they are logged in. -->
        <?php if(!isset($_SESSION['email'])){
          echo "
            <ul>
              <li class='col-m-5 mt-2'><a href='".base_url('account/register')."'><span class='glyphicon glyphicon-pencil'></span>REGISTER</a></li>
                <div class='col-md-2'></div>
              <li class='col-m-5 mt-2 mr-4'><a href='".base_url('account/login')."'><span class='glyphicon glyphicon-user'></span>SIGN IN</a></li>
            </ul>
          ";
        }else{
          echo "
            <ul>
              <li class='col-m-5 mt-2'><a href='".base_url('dashboard')."'><span class='glyphicon glyphicon-pencil'></span>DASHBOARD</a></li>
                <div class='col-md-2'></div>
              <li class='col-m-5 mt-2 mr-4'><a href='".base_url('account/logout')."' onclick='signOut();'><span class='glyphicon glyphicon-user'></span>SIGN OUT</a></li>
            </ul>
          ";
        }?>


      </div>
  </div>
  <div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-8">
      <ul>
        <li class="col-md-2"><a href="<?php echo site_url() ?>welcome">HOME</a></li>
        <li class="col-md-2"><a href="<?php echo site_url() ?>events/index">EVENTS</a></li>
        <li class="col-md-2 mr-lg-4"><a href="<?php echo site_url() ?>challenges/index">CHALLENGES</a></li>
        <li class="col-md-2"><a href="<?php echo site_url() ?>projects/index">PROJECTS</a></li>
        <li class="col-md-2"><a href="<?php echo site_url() ?>datasets/index">DATASETS</a></li>
        <li class="col-md-2"><a target=_blank href="https://www.govhack.org/competition/info/">ABOUT</a></li>
      </ul>
    </div>
</nav>
