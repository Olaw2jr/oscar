<!--  SECTION – portfolio  -->  
<section id="portfolio" class="white-bg padding-top-bottom">
    <!-- Page Content -->
    <div class="container">

    <?php while (have_posts()) : the_post(); ?>
    
      <?php 
        $post_meta_data = get_post_custom($post->ID);
        $link = $post_meta_data["sage_link"][0];  
        $client = $post_meta_data["sage_client"][0]; 
            if ($link != "" || $link != "http://"){
            $link= "<a type='button' class='btn btn-quattro' href=\"http://$link\"><i class='fa fa-globe'></i>  VISIT THE PROJECT</a>";
        }else{
            $link= "";
        }
      ?>

        <h1 class="section-title"><?php the_title(); ?></h1>

        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-8">
                <div class="browser dark outline">
                    <div class="bar">
                        <div class="home"></div>
                        <div class="addressbar">
                            <div class="search"></div>
                        </div>
                        <div class="settings"></div>
                    </div>
                    <div class="content">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('sage-potifolio_thumb'); ?></a>
                        <!--700x400-->              
                    </div>
                </div> <!-- // end browser -->
            </div>

            <div class="col-md-4">
                <h3>Project Description</h3>
                <?php the_content( ); ?>

                <h3>Project Details</h3>
                <ul class="list-unstyled">
                    <li><i class="fa fa-calendar"></i> <?php the_time('F d, Y'); ?></li>
                    <li>
                        <i class="fa fa-tags"></i>
                        <?php $terms_as_text = get_the_term_list($post->ID, 'project-type', '', ', ',''); echo strip_tags($terms_as_text); ?>
                    </li>

                    <?php if($client != "")  print "<li><i class='fa fa-user'></i>   $client</li>"; ?>
                </ul>
                <?php if($link != "") print " $link"; ?>
            </div>

        </div>
        <!-- /.row -->

    <?php endwhile; ?>

        <!-- Related Projects Row -->
        <div class="row">

            <div class="col-lg-12">
                <h3 class="page-header">Related Projects</h3>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

        </div> <!-- /.row -->
        
    </div> <!-- /.container -->
       
</section> <!--  SECTION – portfolio : END  -->