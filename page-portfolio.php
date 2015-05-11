<?php
/**
 * Template Name: Portfolio
 */
query_posts('post_type=portfolio&posts_per_page=6');
?>

<!--  SECTION – portfolio  -->  
<section id="portfolio" class="white-bg padding-top-bottom">
    <!-- Page Content -->
    <div class="container">

        <h1 class="section-title">Page Heading</h1>


        <!-- Projects Row -->
        <div class="row">
        <?php while (have_posts()) : the_post(); ?>

            <?php
                $terms = get_the_terms( $post->ID, 'project-type' );
                                
                if ( $terms && ! is_wp_error( $terms ) ) : 
                    $links = array();

                foreach ( $terms as $term ) 
                    {
                        $links[] = $term->name;
                    }
                        $links = str_replace(' ', '-', $links); 
                        $tax = join( " ", $links );     
                else :  
                        $tax = '';  
                endif;
            ?>

            <div class="col-md-6 portfolio-item">
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
                <h3 class="text-center post-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>
                
            </div>

        <?php endwhile; ?>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li>
                        <a href="#">&laquo;</a>
                    </li>
                    <li class="active">
                        <a href="#">1</a>
                    </li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#">4</a>
                    </li>
                    <li>
                        <a href="#">5</a>
                    </li>
                    <li>
                        <a href="#">&raquo;</a>
                    </li>
                </ul>
            </div>
        </div> <!-- /.row -->
        
    </div> <!-- /.container -->
    
</section> <!--  SECTION – portfolio : END  -->
