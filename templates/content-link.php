<article <?php post_class(); ?>>
  <?php
  // Content = just the article URL
  $url = get_the_content();
  ?>        
  <div class="date-wrapper">
    <time datetime="<?php the_time( 'Y-m-d' ); ?>" class="date">
      <span class="day"><?php the_time('d'); ?></span>
      <span class="month"><?php the_date('M') ?></span>
    </time><!-- /.date -->
  </div><!-- /.date-wrapper -->
  
  <div class="format-wrapper">
    <a href="#" data-filter=".format-link"><i class="fa fa-external-link"></i></a>
  </div><!-- /.format-wrapper -->
  
  <div class="post-content">
    <h2 class="post-title">
      <a href="<?= $url; ?>" target="_blank"><?php the_title(); ?></a>
    </h2>
    <a href="<?= $url; ?>" target="_blank"><?= $url; ?></a>
  </div><!-- /.post-content --> 
  
</article><!-- /.post --> 