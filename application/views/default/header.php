<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php if(isset($title)){echo $title." - ";}; echo safe_echo_html($this->config->item('site_title')); ?></title>
    <link href="<?php echo base_url('assets/default/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/default/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <!-- <link href='http://fonts.googleapis.com/css?family=Varela' rel='stylesheet' type='text/css'/> -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300' rel='stylesheet' type='text/css'/>
    <link href="<?php echo base_url('assets/default/css/style.css'); ?>" rel="stylesheet">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav id='nav-wrapper'>
      <div class='container'>
        <!-- <div class='left head-title'>
          <a href='<?php echo base_url(); ?>'><?php echo safe_echo_html($this->config->item('site_title')); ?></a>
        </div> -->
        <ul>
          <li><a href='<?php echo base_url(); ?>'>Home</a></li>
          <?php
            foreach ($this->config->item('page_list') as $lpage) {
              $judulHalaman = $lpage['title'];
              if(!empty($lpage['short_title'])){
                $judulHalaman = $lpage['short_title'];
              }
              echo "<li><a href='".base_url('page/'.$lpage['url'])."'>".safe_echo_html($judulHalaman)."</a></li>";
            }
          ?>
        </ul>
      </div>
    </nav>
    <div class='container'>
      <div class='row'>
        <div class='col-sm-9'>
