<!DOCTYPE html>
<html>
  <head>
    <title>Admin Log In</title>
    <link rel="icon" type="image/png" href="<?php echo base_url().'assets/img/favico.png'; ?>" />
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/style.css'; ?>" rel="stylesheet">
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Open+Sans:600,700,300'>
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url().'assets/css/docs.min.css'; ?>">
    <link href="<?php echo base_url().'assets/fonts/font-awesome-4.1.0/css/font-awesome.css'; ?>" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url().'assets/js/jquery-1.11.0.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/login.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/postad.js';?>"></script>
  </head>
  <body>

    <?php echo form_open('', array('id' => 'loginAdmin-form')); ?>
      
      <div class="wrap">
        <div class="flip-container" id='flippr'>
          <div class="flipper">
            <div class="front"></div>
            <div class="back"></div>
          </div>
        </div>

        <h1 class="text" id="welcome">Welcome. <span>Please Login.</span></h1>
          <input type='text' id="username" name='username' placeholder='Username' required>
          <input type='password' id='password' name='password' placeholder='Password' required>

        <div style="margin-left:130px; width: 265px;" class="input-group" id="validationIn">  
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
          <div class="alert alert-dismissable" style="padding:5px; font-weight:bold;">
            <?php 
              if(validation_errors() != ""){
                echo "<script>$('#validationIn').show();</script>";
                echo validation_errors(); 
              }
            ?>
          </div>
        </div>

        <div class='login' style="margin-left:170px;">
          <input type="submit" value="Log In" id='loginBtn'>
        </div><!-- /login --> 
      </div><!-- /wrap -->  
    </form>
</body>
</html>  