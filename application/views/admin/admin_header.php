<!DOCTYPE html>
<html>
    <head>
        <title>Admin Panel</title>
        <?php echo link_tag('assets/css/bootstrap.min.css'); ?>
        <?php echo link_tag('assets/css/sidenav.css'); ?>
        
    </head>
    <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Gambling</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01" bis_skin_checked="1">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo base_url('admin_panel/dashboard'); ?>">Home <span class="sr-only">(current)</span></a>
            </li>
            <!--<li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('admin_panel/loadAddreview'); ?>">Add Review</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('admin_panel/displayReview'); ?>">View Review</a>
            </li>-->
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Review Management</a>
            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 37px, 0px);">
            <a class="dropdown-item" href="<?php echo base_url('admin_panel/loadAddreview'); ?>">Add Review</a>
            <a class="dropdown-item" href="<?php echo base_url('admin_panel/displayReview'); ?>">View Review</a>
            </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('admin_panel/displayUser'); ?>">User-Details</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Image Management</a>
            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 37px, 0px);">
            <a class="dropdown-item" href="<?php echo base_url('admin_panel/appImage'); ?>">Add App Images</a>
            <a class="dropdown-item" href="<?php echo base_url('admin_panel/sliderImage'); ?>">Add Slider Images</a>
            </div>
            </li>
            <!--<li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('admin_panel/appImage'); ?>">Add App Images</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('admin_panel/sliderImage'); ?>">Add Slider Images</a>
            </li>-->
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('admin_panel/logout'); ?>">Logout</a>
            </li>
            
          </ul>

        </div>

      </nav>
     