
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrator - <?php echo safe_echo_html($this->config->item('site_title')); ?></title>

    <link href="<?php echo base_url('assets/admin'); ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url('assets/admin'); ?>/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url('assets/admin'); ?>/vendor/metisMenu/metisMenu.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url('assets/admin'); ?>/dist/css/sb-admin-2.css" rel="stylesheet"/>
    <link href="<?php echo base_url('assets/admin'); ?>/vendor/morrisjs/morris.css" rel="stylesheet"/>
    <link href="<?php echo base_url('assets/admin'); ?>/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('assets/admin'); ?>/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('assets/admin'); ?>/dist/css/style.css" rel="stylesheet"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('admin'); ?>">Administrator - <?php echo safe_echo_html($this->config->item('site_title')); ?></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                      <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
                      <li class="divider"></li>
                      <li><a href="<?php echo base_url('admin/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      <li>
                          <a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                      </li>
                      <li>
                        <a href='#!'><i class='fa fa-file-text-o fa-fw'></i> Artikel <span class='fa arrow'></span></a>
                        <ul class='nav nav-second-level'>
                          <li><a href='<?php echo base_url('admin/add_artikel'); ?>'>Tambah Artikel</a></li>
                          <li><a href='<?php echo base_url('admin/list_artikel'); ?>'>Daftar Artikel</a></li>
                        </ul>
                      </li>
                      <li>
                        <a href='#!'><i class='fa fa-file-text-o fa-fw'></i> Halaman <span class='fa arrow'></span></a>
                        <ul class='nav nav-second-level'>
                          <li><a href='<?php echo base_url('admin/add_halaman'); ?>'>Tambah Halaman</a></li>
                          <li><a href='<?php echo base_url('admin/list_halaman'); ?>'>Daftar Halaman</a></li>
                        </ul>
                      </li>
                      <li>
                        <a href='<?php echo base_url('admin/list_kategori'); ?>'><i class='fa fa-tags'></i> Kategori</a>
                      </li>
                      <li>
                        <a href='#!'><i class='fa fa-users fa-fw'></i> User <span class='fa arrow'></span></a>
                        <ul class='nav nav-second-level'>
                          <li><a href='<?php echo base_url('admin/add_user'); ?>'>Tambah User</a></li>
                          <li><a href='<?php echo base_url('admin/list_user'); ?>'>Daftar User</a></li>
                        </ul>
                      </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
