<article <?php post_class(); ?>>
  
  <div class="date-wrapper">
    <div class="date">
      <span class="day"><?php the_time('d'); ?></span>
      <span class="month"><?php the_date('M') ?></span>
    </div><!-- /.date -->
  </div><!-- /.date-wrapper -->
  
  <div class="format-wrapper">
    <a href="#" data-filter=".format-quote"><i class="fa fa-quote-right"></i></a>
  </div><!-- /.format-wrapper -->
  
  <div class="post-content">
    <blockquote>
      <?php the_content(); ?>
      <footer><cite><?= get_the_author(); ?></cite></footer>
    </blockquote>
  </div><!-- /.post-content --> 
  
</article><!-- /.post -->