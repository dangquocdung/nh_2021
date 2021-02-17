<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <title><?php echo $__env->yieldContent('title'); ?> - Admin - <?php echo e($w_title); ?></title>
  <!-- favicon-icon -->
  <link rel="icon" type="image/icon" href="<?php echo e(url('images/favicon/favicon.png')); ?>"/>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"/>
  <!-- Google Fonts -->
  <link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet"/>
  <!-- Material Icons -->
  <link href="//fonts.googleapis.com/icon?family=Material+Icons"
  rel="stylesheet"/>
  
   
   <link rel="stylesheet" type="text/css" href="<?php echo e(url('css/button.datatable.css')); ?>">
   <link rel="stylesheet" type="text/css" href="<?php echo e(url('css/datatable.min.css')); ?>"/>
   <link href ="<?php echo e(url('css/datatable_material.css')); ?>" rel="stylesheet" />
 
  <link href ="<?php echo e(url('css/dataTables.material.min.css')); ?>" rel="stylesheet" />
 
   <link href="//cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
  
  
<link rel="stylesheet" href="<?php echo e(url('css/maincss.css')); ?>"/>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" type="text/css" />

 
  <!-- Jquery Ui Css -->
  <link rel="stylesheet" href="<?php echo e(url('css/jquery-ui.min.css')); ?>"/>
  <link rel="stylesheet" href="<?php echo e(url('css/jquery-jvectormap.css')); ?>"/>
  <!-- Admin (main) Style Sheet -->
  <link rel="stylesheet" href="<?php echo e(url('css/admin.css')); ?>"/>
  <!-- bootstarp tour -->
  <link href ="<?php echo e(url('css/bootstrap-tour.css')); ?>" rel="stylesheet" />

  <link rel="stylesheet" href="<?php echo e(url('css/bootstrap-tagsinput.css')); ?>"/>
  <link rel="stylesheet" href="<?php echo e(url('css/custom-style.css')); ?>"/>

  <!-- select 2 -->
  
  <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />



  <script>
    window.Laravel =  <?php echo json_encode([
      'csrfToken' => csrf_token(),
    ]); ?>
  </script>
  <style media="screen">
    .ht::first-letter{
      text-transform: uppercase;
    }


  </style>

  <?php echo $__env->yieldContent('stylesheet'); ?>
</head>
<body class="hold-transition skin-blue">
  <div class="loading-block">
    <div class="loading z-depth-4"></div>
  </div>
  <div class="wrapper">
    <!-- Main Header -->
    <header class="main-header">
      <!-- Logo -->
      <a href="<?php echo e(url('/admin')); ?>" class="logo" title="<?php echo e($w_title); ?>">
        <?php if(isset($logo)): ?>
        <img src="<?php echo e(url('images/logo/'.$logo)); ?>" class="img-responsive" alt="<?php echo e($w_title); ?>">
        <?php endif; ?>
      </a>
      <?php
      $nav_menus=App\Menu::all();
      ?>
      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <?php if(isset($nav_menus) && count($nav_menus) > 0): ?>
        <a href="<?php echo e(isset($nav_menus[0]) ? route('home', $nav_menus[0]->slug) : '#'); ?>" target="_blank" class="visit-site-btn btn" title="Visit Site">Visit Site <i class="material-icons right">keyboard_arrow_right</i></a>
        <?php else: ?>
        <a href="#" data-toggle="tooltip" data-placement="bottom" data-original-title="Please create at least one menu to visit the site" class="visit-site-btn btn">Visit Site <i class="material-icons right">keyboard_arrow_right</i></a>
        <?php endif; ?>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown admin-nav">
              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="material-icons">language</i> <?php echo e(Session::has('changed_language') ? Session::get('changed_language') : ''); ?></button>
              <ul class="dropdown-menu animated flipInX">
                <?php if(isset($languages) && count($languages) > 0): ?>
                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="<?php echo e(route('languageSwitch', $language->local)); ?>"><?php echo e($language->name); ?> (<?php echo e($language->local); ?>) </a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
              </ul>
            </li>
            <li class="dropdown admin-nav">
              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="material-icons">account_circle</i></button>
              <ul class="dropdown-menu animated flipInX">
                <li><a href="<?php echo e(url('admin/profile')); ?>" title="My Profile">My Profile</a></li>
                <li>
                  <a href="<?php echo e(route('logout')); ?>"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();" title="logout">
                  Logout
                </a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                  <?php echo e(csrf_field()); ?>

                </form>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar" style="background-image: url(<?php echo e(url('images/sidebar-7.jpg')); ?>);">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <i class="material-icons">account_circle</i>
        </div>
        <div class="pull-left info">
          <h4 class="user-name"><?php echo e(ucfirst($auth->name)); ?></h4>
          <?php if(Auth::user()->is_admin == 1): ?>
            <p>Admin</p>
          <?php else: ?>
            <p>Producer</p>
          <?php endif; ?>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <!-- Optionally, you can add icons to the links -->
        <?php if(Auth::user()->is_assistant != 1): ?>
          <li><a class="<?php echo e(Nav::isRoute('dashboard')); ?>" href="<?php echo e(url('/admin')); ?>" title="Dashboard" id="dashboard"><i class="material-icons">dashboard</i> <span>Dashboard</span></a></li>
        <?php endif; ?>
        <?php if(Auth::user()->is_assistant != 1): ?>
          <li><a class="<?php echo e(Nav::isResource('users')); ?>" href="<?php echo e(url('/admin/users')); ?>" title="Users" id="users"><i class="material-icons">people</i> <span>Users</span></a></li>
        <?php endif; ?>
        
       
        <li><a class="<?php echo e(Nav::isResource('menu')); ?>" href="<?php echo e(url('/admin/menu')); ?>" title="Menu" id="menu"><i class="material-icons">menu</i> <span>Menu / Navigation</span></a></li>
        <?php if(Auth::user()->is_assistant != 1): ?>
        <li><a class="<?php echo e(Nav::isResource('packages')); ?>" href="<?php echo e(url('/admin/packages')); ?>" title="Packages" id="package"><i class="material-icons">poll</i> <span>Packages</span></a></li>
        <?php endif; ?>
         <li><a class="<?php echo e(Nav::isResource('genres')); ?>" href="<?php echo e(url('/admin/genres')); ?>" title="Genres" id="genre"><i class="material-icons">filter_list</i> <span>Genres</span></a></li>

        

        <li><a class="<?php echo e(Nav::isResource('movies')); ?>" href="<?php echo e(url('/admin/movies')); ?>" title="Movies"id="movies"><i class="material-icons">ondemand_video</i> <span>Movies</span></a></li>
        <li><a class="<?php echo e(Nav::isResource('tvseries')); ?>" href="<?php echo e(url('/admin/tvseries')); ?>" title="TV Series" id="tvseries"><i class="material-icons">movie_filter</i> <span>TV Series</span></a></li>
         <li><a class="<?php echo e(Nav::isResource('livetv')); ?>" href="<?php echo e(url('/admin/livetv')); ?>" title="Live TV" id="livetv"><i class="material-icons">shop_two</i> <span>Live TV</span></a></li>

         <li><a class="<?php echo e(Nav::isResource('liveevent')); ?>" href="<?php echo e(url('/admin/liveevent')); ?>" title="Live Event" id="liveevent"><i class="material-icons">event</i> <span>Live Event</span></a></li>
        <li><a class="<?php echo e(Nav::isResource('audio')); ?>" href="<?php echo e(url('/admin/audio')); ?>" title="Audio"><i class="material-icons">audiotrack</i> <span>Audio</span></a></li>
      
        <?php if(Auth::user()->is_assistant != 1): ?>
        <li><a class="<?php echo e(Nav::isResource('directors')); ?>" href="<?php echo e(url('/admin/directors')); ?>" title="Directors"><i class="material-icons">stars</i> <span>Directors</span></a></li>
        <li><a class="<?php echo e(Nav::isResource('actors')); ?>" href="<?php echo e(url('/admin/actors')); ?>" title="Actors"><i class="material-icons">star_border</i> <span>Actors</span></a></li>

        <?php
          $config = App\Config::first();
        ?>
        <?php if($config->blog == 1): ?>
         <li><a class="<?php echo e(Nav::isResource('blog')); ?>" href="<?php echo e(route('blog.index')); ?>" title="Blogs"><i class="material-icons">pages</i> <span>Blog</span></a></li>
        <?php endif; ?>
        <li><a class="<?php echo e(Nav::isResource('notification')); ?>" href="<?php echo e(route('notification.create')); ?>" title="Genres"><i class="material-icons">notifications_active</i> <span>Notification</span></a></li>

        <li><a class="<?php echo e(Nav::isResource('audio_language')); ?>" href="<?php echo e(url('/admin/audio_language')); ?>" title="Audio Languages"><i class="material-icons">queue_music</i> <span>Audio Languages</span></a></li>

        <li class="treeview">
          <a href="#" class="<?php echo e(Nav::isResource('home_slider')); ?> <?php echo e(Nav::isResource('landing-page')); ?> <?php echo e(Nav::isResource('auth-page-customize')); ?> <?php echo e(Nav::isRoute('social.ico')); ?> <?php echo e(Nav::isResource('home-block')); ?> <?php echo e(Nav::isResource('custom_page')); ?>" title="Site Customization" id="sitecustomization">
            <i class="material-icons">view_quilt</i> <span>Site Customization</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
               <li><a class="<?php echo e(Nav::isResource('home_slider')); ?>" href="<?php echo e(url('/admin/home_slider')); ?>" title="Slider Settings"><i class="fa fa-circle-o"></i> <span>Slider Settings</span></a></li>
            <li class="<?php echo e(Nav::isResource('landing-page')); ?>"><a href="<?php echo e(url('admin/customize/landing-page')); ?>" title="Landing Page"><i class="fa fa-circle-o"></i> Landing Page</a></li>
             <li><a class="<?php echo e(Nav::isResource('custom_page')); ?>" href="<?php echo e(url('/admin/custom_page')); ?>" title="Custom Pages"><i class="fa fa-circle-o"></i> <span>Custom Pages</span></a></li>

            <li class="<?php echo e(Nav::isResource('auth-page-customize')); ?>"><a href="<?php echo e(url('admin/customize/auth-page-customize')); ?>" title="Login"><i class="fa fa-circle-o"></i> Sign In / Sign Up</a></li>

            <li class="<?php echo e(Nav::isRoute('social.ico')); ?>"><a href="<?php echo e(route('social.ico')); ?>" title="Login"><i class="fa fa-circle-o"></i> Social Icon Setting</a></li>

           
             <li><a class="<?php echo e(Nav::isResource('home-block')); ?>" href="<?php echo e(url('/admin/home-block')); ?>" title="Home Block Settings"><i class="fa fa-circle-o"></i> <span>Promotion Settings</span></a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#" class="<?php echo e(Nav::isRoute('addedmovies')); ?> <?php echo e(Nav::isRoute('addedTvSeries')); ?> <?php echo e(Nav::isRoute('addedLiveTv')); ?>" title="Producer Settings">
            <i class="material-icons">ondemand_video</i> <span>Producer Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a class="<?php echo e(Nav::isRoute('addedmovies')); ?>" href="<?php echo e(route('addedmovies')); ?>" title="Movies"><i class="fa fa-circle-o"></i> <span>Added Movies</span></a></li>
            <li><a class="<?php echo e(Nav::isRoute('addedTvSeries')); ?>" href="<?php echo e(route('addedTvSeries')); ?>" title="Movies"><i class="fa fa-circle-o"></i> <span>Added TV Series</span></a></li>
            <li><a class="<?php echo e(Nav::isRoute('addedLiveTv')); ?>" href="<?php echo e(route('addedLiveTv')); ?>" title="Live TV"><i class="fa fa-circle-o"></i> <span>Added LiveTv</span></a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#" class="<?php echo e(Nav::isResource('settings')); ?> <?php echo e(Nav::isRoute('term_con')); ?> <?php echo e(Nav::isRoute('pri_pol')); ?> <?php echo e(Nav::isRoute('refund_pol')); ?><?php echo e(Nav::isRoute('adsense')); ?><?php echo e(Nav::isRoute('sociallogin')); ?> <?php echo e(Nav::isRoute('copyright')); ?> <?php echo e(Nav::isRoute('mail.getset')); ?> <?php echo e(Nav::isRoute('term_con')); ?>" title="Site Settings" id="sitesettings">
            <i class="material-icons">settings</i> <span>Site Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo e(Nav::isResource('settings')); ?>"><a href="<?php echo e(url('admin/settings')); ?>" title="Settings"><i class="fa fa-circle-o"></i> Settings</a></li>
           
             <li class="<?php echo e(Nav::isRoute('sociallogin')); ?>"><a href="<?php echo e(url('/admin/social-login')); ?>" title="Social Login Setting"><span><i class="fa fa-circle-o"></i> &nbsp;&nbsp;Social Login Settings</span></a></li>

              <li><a class="<?php echo e(Nav::isRoute('chat.index')); ?>" href="<?php echo e(route('chat.index')); ?>" title="Active Plan"><span><i class="fa fa-circle-o"></i> &nbsp;<span>Chat Settings</span></a>
          </li>
            
            <li class="<?php echo e(Nav::isRoute('adsense')); ?>"><a href="<?php echo e(url('/admin/adsensesetting')); ?>" title="Page Setting"><span><i class="fa fa-circle-o"></i> &nbsp;&nbsp;Adsense Settings</span></a></li>

            <li class="<?php echo e(Nav::isRoute('term_con')); ?>"><a href="<?php echo e(url('admin/term&con')); ?>" title="Terms &amp; Condition"><i class="fa fa-circle-o"></i> Terms &amp; Condition</a></li>
            <li class="<?php echo e(Nav::isRoute('pri_pol')); ?>"><a href="<?php echo e(url('admin/pri_pol')); ?>" title="Privacy Policy"><i class="fa fa-circle-o"></i> Privacy Policy</a></li>
            <li class="<?php echo e(Nav::isRoute('refund_pol')); ?>"><a href="<?php echo e(url('admin/refund_pol')); ?>" title="Refund Policy"><i class="fa fa-circle-o"></i> Refund Policy</a></li>
            <li class="<?php echo e(Nav::isRoute('copyright')); ?>"><a href="<?php echo e(url('admin/copyright')); ?>" title="Copyright"><i class="fa fa-circle-o"></i> Copyright</a></li>

            <li class="<?php echo e(Nav::isRoute('customstyle')); ?>"><a href="<?php echo e(url('admin/custom-style-settings')); ?>" title="Custom Css and Style"><i class="fa fa-circle-o"></i> Custom Style</a></li>


          </ul>
        </li>

        <li><a class="<?php echo e(Nav::isRoute('pwa.setting.index')); ?>" href="<?php echo e(route('pwa.setting.index')); ?>" title="PWA Settings"><i class="material-icons">devices_other</i> <span>PWA Settings</span></a></li>

         <li><a class="<?php echo e(Nav::isRoute('admin.backup.settings')); ?>" href="<?php echo e(route('admin.backup.settings')); ?>" title="Database Backup"><i class="material-icons">settings_backup_restore</i> <span>Database Backup</span></a></li>
         
        <li class="treeview">
          <a href="#" class="<?php echo e(Nav::isRoute('player.set')); ?> <?php echo e(Nav::isRoute('ads')); ?>" title="Player Settings" id="player">
            <i class="material-icons">settings</i> <span>Player Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo e(Nav::isRoute('player.set')); ?>"><a href="<?php echo e(route('player.set')); ?>" title="Create ad"><i class="fa fa-circle-o"></i>Player Customization</a></li>
            <li class="<?php echo e(Nav::isResource('ads')); ?>"><a href="<?php echo e(url('admin/ads')); ?>" title="Create ad"><i class="fa fa-circle-o"></i>Advertise</a></li>
             <?php $ads = App\Ads::all(); ?>

          </ul>
        </li>

        <li class="treeview">
          <a href="#" class="<?php echo e(Nav::isResource('coupons')); ?> <?php echo e(Nav::isResource('report')); ?>" title="Stripe Settings">
            <i class="material-icons">more</i> <span>Stripe Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a class="<?php echo e(Nav::isResource('coupons')); ?>" href="<?php echo e(url('/admin/coupons')); ?>" title="Stripe Coupons"><i class="material-icons">assignment</i> <span>Stripe Coupons</span></a></li>
               <?php if(env('STRIPE_SECRET') != ""): ?>
                <li><a class="<?php echo e(Nav::isResource('report')); ?>" href="<?php echo e(url('/admin/report')); ?>" title="Stripe Reports"><i class="material-icons">assignment</i> <span>Stripe Reports</span></a></li>
                <?php endif; ?>
          </ul>
        </li>
     

        <li><a class="<?php echo e(Nav::isResource('menual_payment')); ?>" href="<?php echo e(url('/admin/manual_payment')); ?>" title="Manual Payment Transaction"><i class="material-icons">list_alt</i> <span>Manual Payments</span></a></li>

        <li class="treeview">
          <a href="#" class="<?php echo e(Nav::isRoute('pricing.get')); ?> <?php echo e(Nav::isResource('languages')); ?>" id="language">
            <i class="material-icons">translate</i> <span>Translations</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a class="<?php echo e(Nav::isResource('languages')); ?>" href="<?php echo e(url('/admin/languages')); ?>" title="Languages"><i class="fa fa-circle-o"></i><span>Languages</span></a></li>
         
            <?php
            $package=App\Package::first();
            ?>
            <?php if(isset($package)): ?>
           
            <li class="<?php echo e(Nav::isRoute('pricing.get')); ?>"><a href="<?php echo e(route('pricing.get',$package->id)); ?>" title="Custom Pricing text"><i class="fa fa-circle-o"></i>Pricing Text</a></li>
          
            <?php endif; ?>
          </ul>
        </li>
       

        <li><a class="<?php echo e(Nav::isResource('faqs')); ?>" href="<?php echo e(url('/admin/faqs')); ?>" title="FAQ's"><i class="material-icons">question_answer</i> <span>FAQ's</span></a></li>

        <li class="treeview">
          <a href="#" class="<?php echo e(Nav::isRoute('device_history')); ?> <?php echo e(Nav::isRoute('revenue.report')); ?> <?php echo e(Nav::isRoute('view.track')); ?>" title="Site Settings" id="sitesettings">
            <i class="material-icons">trending_up</i> <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if(Auth::user()->is_assistant != 1 && App\PaypalSubscription::count()>0): ?>
              <li><a class="<?php echo e(Nav::isResource('plan')); ?>" href="<?php echo e(url('/admin/plan')); ?>" title="Active Plan"><i class="fa fa-circle-o"></i> <span>Users Subscription</span></a>
              </li>
            <?php endif; ?>
            <li><a class="<?php echo e(Nav::isRoute('device_history')); ?>" href="<?php echo e(route('device_history')); ?>" title="Device History"><i class="fa fa-circle-o"></i>  <span>Device History</span></a></li>
           
             <li><a class="<?php echo e(Nav::isRoute('revenue.report')); ?>" href="<?php echo e(url('admin/report/revenue')); ?>" title="Active Plan"><i class="fa fa-circle-o"></i> <span>Revenue Report</span></a>
            </li>
            <li><a class="<?php echo e(Nav::isRoute('view.track')); ?>" href="<?php echo e(route('view.track')); ?>" title="View Tracker"><i class="fa fa-circle-o"></i><span>View Tracker</span></a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#" class="<?php echo e(Nav::isResource('appsettings')); ?> <?php echo e(Nav::isRoute('admob')); ?><?php echo e(Nav::isRoute('splashscreen')); ?>" title="Mobile App Settings" id="mobilesettings">
            <i class="material-icons">phonelink_setup</i> <span>App Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo e(Nav::isResource('appsettings')); ?>"><a href="<?php echo e(url('admin/appsettings')); ?>" title="Settings"><i class="fa fa-circle-o"></i> Settings</a></li>
           
             <li class="<?php echo e(Nav::isRoute('splashscreen')); ?>"><a href="<?php echo e(url('/admin/splashscreen')); ?>" title="Social Login Setting"><span><i class="fa fa-circle-o"></i> &nbsp;&nbsp;Splash screen Settings</span></a></li>
            
            <li class="<?php echo e(Nav::isRoute('appslider')); ?>"><a href="<?php echo e(url('/admin/appslider')); ?>" title="Page Setting"><span><i class="fa fa-circle-o"></i> &nbsp;&nbsp;App Slider Settings</span></a></li>
          </ul>
        </li>

      
       <?php endif; ?>
   

     </ul>
     <!-- /.sidebar-menu -->
   </section>
   <!-- /.sidebar -->
 </aside>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <?php if(Session::has('added')): ?>
  <div id="sessionModal" class="sessionmodal rgba-green-strong z-depth-2">
    <i class="fa fa-check-circle"></i> <p><?php echo e(session('added')); ?></p>
  </div>
  <?php elseif(Session::has('updated')): ?>
  <div id="sessionModal" class="sessionmodal rgba-cyan-strong z-depth-2">
    <i class="fa fa-check-circle"></i> <p><?php echo e(session('updated')); ?></p>
  </div>
  <?php elseif(Session::has('deleted')): ?>
  <div id="sessionModal" class="sessionmodal rgba-red-strong z-depth-2">
    <i class="fa fa-window-close"></i> <p><?php echo e(session('deleted')); ?></p>
  </div>
  <?php endif; ?>
  <!-- Content Header (Page header) -->
  <section class="content-header">
  </section>
  <!-- Main content -->
  <section class="content container-fluid">
    <?php echo $__env->yieldContent('content'); ?>

  </section>

  <!-- /.content -->
</div>
<p class="version">Version 3.1&emsp;</p>
<!-- /.content-wrapper -->
<!-- Main Footer -->

</div>
<!-- ./wrapper -->



<!-- Admin Js -->
<script src="<?php echo e(url('js/jquery.min.js')); ?>" type="text/javascript"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js" type="text/javascript"></script>
<script src="<?php echo e(url('js/admin.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(url('js/app.js')); ?>" type="text/javascript"></script>


<script src="<?php echo e(url('js/bootstrap-tour.js')); ?>"></script>
<script src="<?php echo e(url('js/ckeditor.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(url('js/datatables.min.js')); ?>" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.0.3/js/buttons.colVis.js"></script>

<script src="<?php echo e(url('js/jquery-ui.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(url('js/chart.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(url('js/utils.js')); ?>" type="text/javascript"></script>
<script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-pageLoadMore/1.0.0/js/dataTables.pageLoadMore.min.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="<?php echo e(url('js/jquery-jvectormap-1.2.2.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(url('js/jquery-jvectormap-world-mill-en.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(url('js/bootstrap-tagsinput.min.js')); ?>"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>



<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

 
<script src="//cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/dataTables.material.min.js"></script>

<script type="text/javascript" src="//cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>




<script src="<?php echo e(url('js/custom-js.js')); ?>"></script>
<!------- datepicker ------------------------->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<!--- lazy load --->
 

<script>
  $(function () {
    // DataTables
   $('#movies_table').DataTable({
     
      responsive: true,
      "sDom": "<'row'><'row'<'col-md-4'l><'col-md-4'B><'col-md-4'f>r>t<'row'<'col-sm-12'p>>",
      "language": {
        "paginate": {
          "previous": '<i class="material-icons paginate-btns">keyboard_arrow_left</i>',
          "next": '<i class="material-icons paginate-btns">keyboard_arrow_right</i>'
          }
      },
      buttons: [
        {
          extend: 'print',
          exportOptions: {
              columns: ':visible'
          }
        },
        'csvHtml5',
        'excelHtml5',
      ]
    });

    $('#full_detail_table').DataTable({
      responsive: true,
      "sDom": "<'row'><'row'<'col-md-4'l><'col-md-4'B><'col-md-4'f>r>t<'row'<'col-sm-12'p>>",
      "language": {
      "paginate": {
        "previous": '<i class="material-icons paginate-btns">keyboard_arrow_left</i>',
        "next": '<i class="material-icons paginate-btns">keyboard_arrow_right</i>'
        }
      },
      buttons: [
        {
          extend: 'print',
          exportOptions: {
              columns: ':visible'
          }
        },
        'csvHtml5',
        'excelHtml5',
        'colvis',
      ]
    });
    
    $(".js-select2").select2({
        placeholder: "Pick states",
        theme: "material"
    });

    $(".select2-selection__arrow")
        .addClass("material-icons")
        .html("arrow_drop_down");
  });
</script>
    
</script>
<script>
  $(function () {
    $('[data-toggle="popover"]').popover()
  })
</script>


<?php echo $__env->yieldContent('custom-script'); ?>
</body>
</html>
<?php /**PATH /var/www/httv/public/uploads/dungthinh/nh_2021/resources/views/layouts/admin.blade.php ENDPATH**/ ?>