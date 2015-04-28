<article <?php post_class(); ?>>
            
  <div class="date-wrapper">
    <div class="date">
      <span class="day"><?php the_time('d'); ?></span>
      <span class="month"><?php the_date('M') ?></span>
    </div><!-- /.date -->
  </div><!-- /.date-wrapper -->
  
  <div class="format-wrapper">
    <a href="#" data-filter=".format-video"><i class="fa fa-film"></i></a>
  </div><!-- /.format-wrapper -->
  
  <div class="post-content">
    
    <div class="video-container post-media">
      <?php the_post_thumbnail(); ?>
    </div><!-- /.post-media -->
    
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