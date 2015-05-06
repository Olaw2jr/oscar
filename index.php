<!--  SECTION – BLOG  -->    
<section id="blog" class="white-bg padding-top-bottom">
	<div class="container inner-top-sm inner-bottom classic-blog no-sidebar">
	  
	  <div class="row">
	    <div class="col-sm-10 col-sm-offset-1">
	      
	      <div class="posts sidemeta">

	        <?php if (!have_posts()) : ?>
			  <div class="alert alert-warning">
			    <?php _e('Sorry, no results were found.', 'sage'); ?>
			  </div>
			  <?php get_search_form(); ?>
			<?php endif; ?>

			<?php while (have_posts()) : the_post(); ?>
			  <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
			<?php endwhile; ?>
			
	       </div><!-- /.posts -->
	       
	       <?php Roots\Sage\Extras\sage_paging_nav(); ?><!-- /.pagination --> 
	      
	    </div><!-- /.col -->
	  </div><!-- /.row -->
	  
	</div><!-- /.container -->
</section>
<!--  SECTION – BLOG : END  -->
