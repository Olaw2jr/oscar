<?php use Roots\Sage\Nav\NavWalker; ?>

<body data-spy="scroll" data-target="#main-nav" data-offset="400">

<!-- PAGE PRELOADER -->
<div id="page-loader"><span class="page-loader-gif"><?= __('Loading...', 'sage'); ?></span></div>

<?php if ( is_front_page() ): ?>
<!-- HEADER -->
<header id="home" class="parallax-bg" data-parallax-background="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/header-bg.png" data-stellar-background-ratio=".5">
  
  <div class="header-content">
    
      <ul class="slides">
        <li>
          <h1 class="scrollimation fade-down d1"><span class="primary">I am Oscar Olotu</span></h1>
          <h2 class="scrollimation fade-down d3"><span class="primary">Designer, Developer, Dreamer</span></h2>
        </li>
      </ul>

    <!--<img class="" src="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/header-img.png" alt=""/>-->

    <a class="scroll-button scrollto" href="#services"><i class="fa fa-angle-down"></i></a>  
      
  </div>
  
</header><!--End header -->
<?php endif; ?>

<?php if ( is_home() ): ?>
<!-- BLOG HEADER -->
<header id="inner-page-header" class="parallax-bg" data-parallax-background="<?=get_template_directory_uri(); ?>/dist/images/art/blog-header-3.jpg" data-stellar-background-ratio=".3">
  
  <div class="header-content">
  
    <h1 class="scrollimation fade-down d1">I Love Writing</h1>
    <?php //get_template_part('templates/page', 'header'); ?>
    
  </div>
  
</header><!--End Blog header -->
<?php endif; ?>

<!-- MAIN NAV -->

<div id="main-nav" class="navbar">
  <div class="container">
  
    <div class="navbar-header">
    
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#site-nav">
        <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
      </button>
      
      <!-- LOGO -->
      <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>">
        
        <img class="site-logo" src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/logo-small.png" alt="logo" />
      </a>
      
    </div>
    
    <div id="site-nav" class="navbar-collapse collapse">
      <?php
          if (has_nav_menu('primary_navigation')) :
            wp_nav_menu(['theme_location' => 'primary_navigation', 'walker' => new NavWalker(), 'menu_class' => 'nav navbar-nav navbar-right']);
          endif;
        ?>
    </div><!--End navbar-collapse -->
    
  </div><!--End container -->
  
</div><!--End main-nav -->
