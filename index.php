<!--  SECTION – BLOG  -->
      
<section id="blog" class="light-bg">
	<div class="container inner-top-sm inner-bottom classic-blog no-sidebar">
	  
	  <div class="row">
	    <div class="col-md-9 center-block">
	      
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
	      
	      <ul class="pagination">
	        <li><a href="#">Prev</a></li>
	        <li class="active"><a href="#">1</a></li>
	        <li><a href="#">2</a></li>
	        <li><a href="#">3</a></li>
	        <li><a href="#">Next</a></li>
	      </ul><!-- /.pagination --> 
	      
	    </div><!-- /.col -->
	  </div><!-- /.row -->
	  
	</div><!-- /.container -->
</section>

<!--  SECTION – BLOG : END  -->
