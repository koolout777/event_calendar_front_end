<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title><?php echo $title ?> - CIT-U Event Calendar</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url().'assets/css/bootstrap-table.css'; ?>">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url().'assets/css/bootstrap.css'; ?>">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url().'assets/css/docs.min.css'; ?>">
    <link href="<?php echo base_url().'assets/fonts/font-awesome-4.1.0/css/font-awesome.css'; ?>" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="<?php echo base_url().'assets/img/favico.png'; ?>" />
    <script src="<?php echo base_url().'assets/js/jquery-1.11.0.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/login.js';?>"></script>
    
  </head>
  <body>
    <div class="container">   
      <div class="row page-header">
        <!-- Button trigger modal -->
        <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#b-menu-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        <div class='text-center'><a href="#"><img src="<?php echo base_url().'assets/img/logo.png'; ?>" style="height:55px;"/></a></div>
        </div>
      <div class="collapse navbar-collapse text-center" id="b-menu-1">
          <ul style='margin-top:5px;' class="nav navbar-nav navbar-right font-nav ">
             <?php
              $tabs = array('User Accounts','Events','Admin Accounts');
              $icons = array('user','calendar','tags');
              $links = array('users','events','admins');
              $ctr=0;
              foreach ($tabs as $tab) {
                echo "<li><a href='".base_url().$links[$ctr]."'>"."<i class='fa fa-".$icons[$ctr]."' style='color:#ff5d43'></i> ".$tab."</a></li>";
                $ctr++;
              }
             ?>
             <li class="dropdown">
                <a href="#" class="dropdown-toggle nav-drop-size" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><b class="caret"></b></a>
                <ul id='session-menu' class="dropdown-menu font-nav">
                  <?php if ( empty($userid) ) : redirect('http://localhost/CIT-UEventCalendar');?>
                  <?php else: ?>
                    <li><a href="<?php echo base_url()?>view-account"><i class="fa fa-fw fa-user"></i> <span id='session-username'><?php echo $username; ?></span></a></li>
                    <li><a href="#"><i class="fa fa-fw fa-anchor"></i> <span id='session-username'><?php echo $type; ?></span></a></li>
                    <li><a href="#" onclick="logoutAdmin();"><i class="fa fa-fw fa-sign-out"></i> Logout</a></li>
                  <?php endif; ?>
                </ul>
             </li> 
             
          </ul>
        </div>
      </div> 
    </div>      
    </div>  
    <script>$('.dropdown-toggle').dropdown();</script>


