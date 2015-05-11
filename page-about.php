<?php
/**
 * Template Name: About
 */
?>

<style type="text/css">
    .intro-header{
        background-color:gray;
        background:no-repeat center center;
        background-attachment:scroll;
        -webkit-background-size:cover;
        -moz-background-size:cover;
        background-size:cover;
        -o-background-size:cover;
        margin-bottom:50px
    }
    .intro-header .page-heading{
        padding:100px 0 50px;
        color:#fff
    }
    .intro-header .page-heading{
        text-align:center
    }
</style>

<!--  SECTION About  -->  
<section id="about" class="white-bg padding-bottom">

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('<?= esc_url( get_template_directory_uri() ); ?>/dist/images/about-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <h1 class="section-title"><?php get_template_part('templates/page', 'header'); ?></h1>
                        <p class="section-description">This is what I do.</p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('templates/content', 'page'); ?>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

</section><!-- End Section About -->
