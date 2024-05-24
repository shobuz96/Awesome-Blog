<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin | Awesome Blog</title>

  <?php include('./header.php'); ?>
  <?php 
  session_start();
  if(isset($_SESSION['login_id']))
    header("location:index.php?page=home");
  ?>

</head>
<style>
  body {
    width: 100%;
    height: 100vh;
    background: url("assets/img/login.jpg") no-repeat !important;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0;
  }
  main#main {
    width: 100%;
    height: 100%;
    background: #1dd1a1;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  #login-right {
    width: 40%;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  #login-right .card {
    background-color: #FFBF00; /* Amber color */
  }
  .card-body {
    padding: 2rem;
  }
  .form-group input::placeholder {
    color: #aaa;
  }
  .create-account {
    margin-top: 1rem;
    text-align: center;
  }
  .create-account a {
    color: #007bff;
    text-decoration: none;
  }
  .create-account a:hover {
    text-decoration: underline;
  }
</style>

<body>

  <main id="main" class="alert-info">
    <div id="login-right">
      <div class="card col-md-8">
        <div class="card-body">
          <form id="login-form">
            <h3 class="text-center">Login</h3>
            <div class="form-group">
              <label for="username" class="control-label">Username</label>
              <input type="text" id="username" name="username" class="form-control" placeholder="Enter your username">
            </div>
            <div class="form-group">
              <label for="password" class="control-label">Password</label>
              <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
            </div>
            <center><button class="btn-sm btn-block btn-wave col-md-4 btn-primary">Login</button></center>
            <div class="create-account">
              <p>Don't have an account? <a href="#" id="show-register">Create Account</a></p>
            </div>
          </form>

          <form id="register-form" style="display:none;">
            <h3 class="text-center">Register</h3>
            <div class="form-group">
              <label for="name" class="control-label">Name</label>
              <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name">
            </div>
            <div class="form-group">
              <label for="new_username" class="control-label">Username</label>
              <input type="text" id="new_username" name="new_username" class="form-control" placeholder="Choose a username">
            </div>
            <div class="form-group">
              <label for="new_password" class="control-label">Password</label>
              <input type="password" id="new_password" name="new_password" class="form-control" placeholder="Choose a password">
            </div>
            <center><button class="btn-sm btn-block btn-wave col-md-4 btn-primary">Sign Up</button></center>
            <div class="create-account">
              <p>Already have an account? <a href="#" id="show-login">Sign In</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

</body>
<script>
  $(document).ready(function(){
    $('#login-form').submit(function(e){
      e.preventDefault();
      $('#login-form button').attr('disabled',true).html('Logging in...');
      if($(this).find('.alert-danger').length > 0 )
        $(this).find('.alert-danger').remove();
      $.ajax({
        url:'ajax.php?action=login',
        method:'POST',
        data:$(this).serialize(),
        error:err=>{
          console.log(err);
          $('#login-form button').removeAttr('disabled').html('Login');
        },
        success:function(resp){
          if(resp == 1){
            location.reload('index.php?page=home');
          }else{
            $('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>');
            $('#login-form button').removeAttr('disabled').html('Login');
          }
        }
      })
    });

    $('#register-form').submit(function(e){
      e.preventDefault();
      $('#register-form button').attr('disabled',true).html('Creating account...');
      if($(this).find('.alert-danger').length > 0 )
        $(this).find('.alert-danger').remove();
      $.ajax({
        url:'ajax.php?action=register',
        method:'POST',
        data:$(this).serialize(),
        error:err=>{
          console.log(err);
          $('#register-form button').removeAttr('disabled').html('Sign Up');
        },
        success:function(resp){
          if(resp == 1){
            location.reload('index.php?page=home');
          }else if(resp == 2){
            $('#register-form').prepend('<div class="alert alert-danger">Username already exists.</div>');
            $('#register-form button').removeAttr('disabled').html('Sign Up');
          }else{
            $('#register-form').prepend('<div class="alert alert-danger">Failed to create account.</div>');
            $('#register-form button').removeAttr('disabled').html('Sign Up');
          }
        }
      })
    });

    $('#show-register').click(function(){
      $('#login-form').hide();
      $('#register-form').show();
    });

    $('#show-login').click(function(){
      $('#register-form').hide();
      $('#login-form').show();
    });
  });
</script>
</html>
