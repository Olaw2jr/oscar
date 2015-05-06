<!-- SECTION – BLOG POST -->
<section id="blog-post" class="white-bg padding-top-bottom">
  <div class="container inner-top-sm inner-bottom classic-blog no-sidebar">
    <div class="row">
      <div class="col-sm-10 col-sm-offset-1">
        <div class="sidemeta">
          
          <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part( 'templates/content', get_post_format() ); ?>
          <?php endwhile; ?>
          
          <?php 
            // If we have a single page and the author bio exists, display it
            if ( get_the_author_meta( 'description' )) : ?>
            <div class="post-author">
              <figure>
                  
                <div class="author-image icon-overlay icn-link">
                    <a href="#"><?= get_avatar( get_the_author_meta( 'user_email' ), 70 ); ?></a>
                </div>
                
                <figcaption class="author-details">
                  <h3>About the author</h3>
                  <p><?php the_author_meta( 'description' ); ?>.</p>
                  <ul class="post-meta small">
                    <li class="author-posts"><a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>">All posts by <?php the_author_meta('first_name'); ?></a></li>
                  </ul><!-- /.meta -->
                </figcaption>
                  
              </figure>
            </div><!-- /.post-author -->
            <?php endif; ?>
          
            <?php comments_template('/templates/comments.php'); ?>
        
        </div><!-- /.sidemeta -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container -->
</section>

<!-- SECTION – BLOG POST : END -->
