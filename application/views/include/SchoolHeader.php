<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7 ]> <html class="ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
  <head>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="googlebot" content="index,follow">

    <!-- Title -->
    <title>ZeroERP Education</title>

    <!-- Templates core CSS -->
	<link href="<?=base_url();?>stylesheets/application.css" rel="stylesheet">
	<!--<link href="<?=base_url();?>scss/extracss/bootstrap.min.css" rel="stylesheet">-->
	<link href="<?=base_url();?>scss/extracss/design.css" rel="stylesheet">
	<!--Extra css --->
	<base href="<?php echo base_url(); ?>"/>
	<!-- hrms css started added by palak on 20 june -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:400,700,400italic">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fonts/linecons/css/linecons.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fonts/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/xenon-core.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/xenon-forms.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/xenon-components.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/xenon-skins.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/popup_box.css">
	
	<!-- mandatory scripts starts added by palak on 20th june -->
	<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/common_function.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/select2/select2.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/select2/select2-bootstrap.css">
	
	<!-- Imported styles on this page -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/datatables/dataTables.bootstrap.css">
	<style>
		.datepicker{z-index:1151 !important;}
	</style>
		
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

  </head>
  
  
  
  <!-- NAVBAR
================================================== -->
 
<!--<div class="navbar-wrapper">-->
    <nav class="navbar navbar-default navbar-fixed-top">
      
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" style="min-height: inherit" href="http://junctiondev.cloudapp.net/zeroschool/Front/index">ZeroERP Education</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
           
           
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Product <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <!--<li><a href="<?=base_url();?>Front/index">Why ZeroERP Education</a></li>-->
                <li><a href="http://junctiondev.cloudapp.net/zeroschool/Front/feature">Feature Tour</a></li>
                <!--<li><a href="<?=base_url();?>Front/index">Mobile</a></li>-->
              
              </ul>
            </li>
			
			 <li><a href="http://junctiondev.cloudapp.net/appmanager/login/registration_application?id=School">Register and Use free</a></li>
				  
			 <li><a href="http://junctiondev.cloudapp.net/zeroschool/Front/About">Company</a></li>
				  
            <li><a href="http://junctiondev.cloudapp.net/zeroschool/Front/Contactus">Contact us</a></li>
          </ul>
		
          <ul class="nav navbar-nav navbar-right">
            <li><a href="http://junctiondev.cloudapp.net/zeroschool/Front/form" class="btn btn-danger btn-sm" style=" background-color:white; color:white; border-color:#E58121" role="button">ANY QUERY</a></li>
		   <!--<li><img src="<?=base_url();?>images/feature_icon/42.png"> </li>-->
          </ul>
       </div>
    </nav>
	
