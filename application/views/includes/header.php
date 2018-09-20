<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle; ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
	<script type="text/javascript" src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=w5ykid4l09vk3kgj5c3pgzxu2lphgfxiruiijzubssq5u1ik"></script> 
	<script>
        tinyMCE.init({
                //selector: 'textarea',
                external_template_list_url : "<?php echo base_url() ?>tinymce/tinymce.min.js"
        });	    
	</script>
	
    <style>
    	.error{
    		color:red;
    		font-weight: normal;
    	}
    </style>
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
    <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
    </script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url(); ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Admin</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Administrator</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo $name; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $name; ?>
                      <small><?php echo $role_text; ?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo base_url(); ?>loadChangePass" class="btn btn-default btn-flat"><i class="fa fa-key"></i> Change Password</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url(); ?>logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
              </a>
            </li>
									
			<?php
            if($role == '2' || $role=='1')
            {
            ?>
			<!--
            <li class="treeview">
              <a href="<?php echo base_url(); ?>artikelDepan" >
                <i class="fa fa-plane"></i>
                <span>Berita Halaman Depan</span>
              </a>
            </li>
			-->
			
			<?php } ?>
			
			<?php
            if($role == '3' || $role=='1'|| $role=='2')
            {
            ?>
			
			<li class="treeview">
              <a href="<?php echo base_url(); ?>Gallery" >
				<i class="fa fa-upload"></i>
                <span>Galeri Foto</span>
              </a>
            </li>
			
			<?php } ?>
			<!--
            <li class="treeview">
              <a href="<?php echo base_url(); ?>Gallery/kegiatan" >
                <i class="fa fa-ticket"></i>
                <span>Galeri Kegiatan</span>
              </a>
            </li>
			<li class="treeview">
              <a href="<?php echo base_url(); ?>Gallery/pemerintahan" >
                <i class="fa fa-ticket"></i>
                <span>Galeri Pemerintahan</span>
              </a>
            </li>
			-->
            <?php
            //if($role == ROLE_ADMIN || $role == ROLE_MANAGER)
            //{
            ?>
			<!--
            <li class="treeview">
              <a href="<?php //echo base_url(); ?>Unggulan/#" >
                <i class="fa fa-thumb-tack"></i>
                <span>Produk Unggulan Desa</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php //echo base_url(); ?>Arsip/#" >
                <i class="fa fa-upload"></i>
                <span>Arsip Desa Online</span>
              </a>
            </li>
			-->
            <?php
            //}
            if($role == ROLE_ADMIN)
            {
            ?>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>userListing">
                <i class="fa fa-users"></i>
                <span>Users</span>
              </a>
            </li>
			<?php }?>
			<?php
            if($role == '2' || $role=='1')
            {
            ?>
            <li class="treeview">
              <a href="<?php echo base_url() ?>Excel" >
                <i class="fa fa-files-o"></i>
                <span>Upload Excel</span>
              </a>
            </li>
			<!--
			<li class="treeview">
              <a href="<?php //echo base_url() ?>Download/#" >
                <i class="fa fa-files-o"></i>
                <span>Download Excel</span>
              </a>
            </li>
			-->
            <?php
            }
            ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>