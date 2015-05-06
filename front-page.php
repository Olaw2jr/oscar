<!-- SERVICES -->
<section id="services" class="white-bg padding-top-bottom">

	<div class="container">
		
		<h1 class="section-title"><?php _e( 'What I Play With', 'sage' ); ?></h1>
		
		<div class="text-center">
			<div class="btn-group">
				<button type="button" href="#front-end" class="btn btn-default toggle-tabs active">Front End</button>
				<button type="button" href="#back-end" class="btn btn-default toggle-tabs">Back End</button>
			</div>
		</div>
		
		<div class="tab-content">
		
			<div class="row tab-pane active" id="front-end">
			
				<div class="col-sm-4 service-item scrollimation fade-left">
				
					<div class="service-icon "><i class="fa fa-html5"></i></div>
					
					<h3>Clean HTML5 Code</h3>
					
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo.</p>
					
					
				</div>
			
				<div class="col-sm-4 service-item scrollimation fade-left">
				
					<div class="service-icon "><i class="fa fa-css3"></i></div>
					
					<h3>Modern CSS3 styles</h3>
					
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo.</p>
					
					
				</div>
				
				<div class="col-sm-4 service-item scrollimation fade-left">
				
					<div class="service-icon "><i class="fa fa-mobile"></i></div>
					
					<h3>Responsive Design</h3>
					
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo.</p>
					
				</div>
				
			</div>
			
			<div class="row tab-pane" id="back-end">
			
				<div class="col-sm-4 service-item">
				
					<div class="service-icon"><i class="fa fa-wordpress"></i></div>
					
					<h3>Wordpress</h3>
					
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo.</p>
					
					
				</div>
			
				<div class="col-sm-4 service-item">
				
					<div class="service-icon"><i class="fa fa-joomla"></i></div>
					
					<h3>Joomla</h3>
					
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo.</p>
					
					
				</div>
				
				<div class="col-sm-4 service-item">
				
					<div class="service-icon"><i class="fa fa-drupal"></i></div>
					
					<h3>Drupal</h3>
					
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo.</p>
					
				</div>
				
			</div>
			
		</div>
		
	</div>


</section>
	
<!-- LATEST PROJECTS -->

<section class="padding-top-bottom gray-bg">

	<div class="container">
		
		<h1 class="section-title"><?php _e( 'Latest Projects', 'sage' ); ?></h1>

		<?php
	    // WP_Query arguments
	    $args = array (
	      'post_type'  => 'portfolio',
	      'posts_per_page' => 2
	    );

	    // The Query
	    $query = new WP_Query( $args );

	    // The Loop
	    $count = 0; while ( $query->have_posts() ): $query->the_post(); $count++; 

	    if( $count == 1) { 
	    	$style1 = 'col-sm-5 push-down scrollimation fade-right'; 
	    	$style2 = 'col-sm-6 col-sm-offset-1 scrollimation fade-left'; 
	    	$count = 1; 
	    	} else { 
	    		$style1='col-sm-6 col-sm-push-6 push-down scrollimation fade-left'; 
	    		$style2='col-sm-6 col-sm-pull-6 scrollimation fade-right'; 
	    		} 
	    ?>
	
		<div class="row">
		
			<div <?php post_class($style1) ?>>
			
				<h2 class="row-title"><?php the_title(); ?></h2>
				
				<?php the_excerpt(); ?>
			
				<p><a class="btn btn-quattro" href="<?php the_permalink(); ?>"><?php _e( 'View Project', 'sage' ); ?></a></p>
			
			</div>
		
			<div <?php post_class($style2) ?>>
				<div class="browser dark outline">
                    <div class="bar">
                        <div class="home"></div>
                        <div class="addressbar">
                            <div class="search"></div>
                        </div>
                        <div class="settings"></div>
                    </div>
                    <div class="content">
                        <?php the_post_thumbnail('sage-potifolio_thumb'); ?>             
                    </div>
                </div> <!-- // end browser -->
			</div>
		
		</div>
	
		<hr>
		<?php endwhile;
	  	// Restore original Post Data
	  	wp_reset_postdata(); ?>
		
	</div>
	
</section>

<!-- NEWS -->			
<section id="news" class="white-bg padding-top-bottom">

	<h1 class="section-title">I Love Writting</h1>
	
	<div class="container">
	
		<div class="row">

		<?php
		$newsposts = new WP_Query('posts_per_page=3'); ?>
		<?php if ($newsposts->have_posts()) : while ($newsposts->have_posts()) : $newsposts->the_post(); ?>
			<article class="col-sm-6 post-entry scrollimation fade-right">

			
				<header class="post-header">
					<!--<a class="post-thumb" href="image-post.html" title="Read post: Post with single featured image">
						<img class="img-responsive" src="assets/images/blog/post-image-2.jpg" alt="" />
					</a>-->
					
					<h2 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					
					<?php get_template_part('templates/entry-meta'); ?>

				</header>
				
				<?php the_excerpt(); ?>
				
			</article>
		<?php endwhile; endif; ?>
		
		</div>
	
		<p class="text-center padding-top"><a class="btn btn-quattro" href="<?= esc_url(home_url('/blog')); ?>"><?php _e( 'Read My Blog', 'sage' ); ?></a></p>
	
	</div>
	
</section>