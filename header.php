<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage ELM
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/wordpress_style.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/materialize.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="<?php bloginfo('template_directory'); ?>/js/materialize.min.js"></script>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
		<header>

          <div id="nav_content" class="navbar-fixed">
            <?php global $post; $pagename =(is_search())?"": $post->post_name; ?>
            <nav class="white">
              <div class="nav-wrapper">
              <a class="brand-logo" href="<?php bloginfo('url');?>"><img src="<?php bloginfo('template_directory'); ?>/images/logolm.jpg"/> </a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="fa fa-bars"></i></a>
              <ul class="right hide-on-med-and-down">
                <li class="<?php echo ($pagename=='equipement urbain')?'active':''; ?> base hover_green">
                  <a href='<?php echo get_permalink(get_page_by_title( 'Equipement urbain' )) ?>'><span>EQUIPEMENT URBAIN</span></a>
                </li>
                <li class="<?php echo ($pagename=='identification brady')?'active':''; ?> base hover_red">
                  <a href='<?php echo get_permalink(get_page_by_title( 'Identification brady' )) ?>'><span>IDENTIFICATION BRADY</span></a>
                </li>
                <li class="<?php echo ($pagename=='protection securite')?'active':''; ?> base hover_blue">
                  <a href="<?php echo get_permalink(get_page_by_title( 'Protection securite' )) ?>"><span>PROTECTION SÉCURITÉ</span></a>
                </li>
                <li class="<?php echo ($pagename=='signalisation')?'active':''; ?> base hover_orange">
                  <a href='<?php echo get_permalink(get_page_by_title( 'Signalisation' ))  ?>'><span>SIGNALISATION</span></a>
                </li>
                <li class="colored large">
                  <?php echo do_shortcode('[get_login_container]')?>
                </li>
                <li class="colored large">
                  <?php echo do_shortcode('[wps_mini_cart]') ?>
                </li>
                <li class="colored large">
                  <div id="searchBox">
                     <?php get_search_form(); ?>
                  </div>
                </li>

              </ul>
              <ul class="side-nav" id="mobile-demo">
                <li class="colored">
                  <div id="searchBox">
                     <?php get_search_form(); ?>
                  </div>
                </li>
                 <li class="base ">
                  <a href='javascript:scrollToId("#group2")'><span><i class="fa fa-bus fa-fw"></i>EQUIPEMENT URBAIN</span></a>
                </li>
                <li class="base ">
                  <a href='javascript:scrollToId("#group3")'><span><i class="fa fa-print fafw"></i>IDENTIFICATION BRADY</span></a>
                </li>
                <li class="base ">
                  <a href="javascript:scrollToId('#group4')"><span><i class="fa fa-medkit fa-fw"></i>PROTECTION SÉCURITÉ</span></a>
                </li>
                <li class="base ">
                  <a href='<?php echo do_shortcode('[get_category_link term_slug="signalisation_vehicules"]') ?>'><span><i class="fa fa-exclamation-triangle fa-fw"></i>SIGNALISATION</span></a>
                </li>
                <li class="colored">
                  <?php echo do_shortcode('[get_login_container]')?>
                </li>
                <li class="colored">
                  <?php echo do_shortcode('[wps_mini_cart]') ?>
                </li>
                

              </ul>

             </div>
              </nav>   
              
          </div>


    </header>
  <!-- .sidebar -->

	<div id="content" class="site-main">

