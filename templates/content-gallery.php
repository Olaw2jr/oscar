<article <?php post_class(); ?>>
            
  <div class="date-wrapper">
    <div class="date">
      <span class="day"><?php the_time('d'); ?></span>
      <span class="month"><?php the_date('M') ?></span>
    </div><!-- /.date -->
  </div><!-- /.date-wrapper -->
  
  <div class="format-wrapper">
    <a href="#" data-filter=".format-gallery"><i class="fa fa-file-image-o"></i></a>
  </div><!-- /.format-wrapper -->
  
  <div class="post-content">
    
    <div id="carousel" class="carousel slide post-media" data-ride="carousel">
          <!-- Indicators
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
          </ol> -->

          <!-- Wrapper for slides -->
          <div class="carousel-inner">
          <?php
          $images = get_children( array (
            'post_parent' => $post->ID,
            'post_type' => 'attachment',
            'post_mime_type' => 'image'
          ));

          foreach ( $images as $attachment_id => $attachment ): ?>
            <div class="item ">
              <?php echo wp_get_attachment_image( $attachment_id, 'post-thumbnail' ); ?>
            </div>

          <?php endforeach; 
          ?>
          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
            <span class="fa fa-chevron-right"></span>
          </a>
        </div>

    
    <?php
        // If single page, display the post Author
         if(is_single()): ?>
          <p class="author">
            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" data-toggle="tooltip" data-placement="right" title="Post author"><?php the_author(); ?></a>
          </p> 
        <?php endif; ?>

        <?php
        // If single page, display the title
    // Else, we display the title in a link
    if ( is_single() ) : ?>
      <h1 class="post-title entry-title" rel="bookmark"><?php the_title(); ?></h1>
    <?php else : ?>
      <h2 class="post-title entry-title">
        <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?>
      </h2>
    <?php endif; ?>
    
    <?php get_template_part('templates/entry-meta'); ?>
    
    <div class="entry-summary">
        <?php
        if ( is_single() ) {
          the_content();
        } else {
          the_excerpt();
        }
      ?>
      </div>
    
  </div><!-- /.post-content --> 
  
</article><!-- /.post -->
