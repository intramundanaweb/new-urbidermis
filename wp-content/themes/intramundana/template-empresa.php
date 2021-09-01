<?php

/* Template Name: Empresas */

get_header();
?>
<section>
    <div class="wrapper h-100 ff-dms">
        <section class="d-flex flex-column h-100" id="selectorheight">
            <div class="container-fluid px-lg-3 px-0">
                <div class="row">
                    <div class="pt-5 pb-3 col-12">
                        <h1 class="fs-12 fw-600 color-blue">Empresas y Start-ups</h1>
                    </div>
                </div>
                <div class="container-fluid px-0">

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 mx-0 px-0">
                        <?php

					$args = array(  'posts_per_page' => -1,
									'post_type' => 'empresas',
					);
					$wp_query = new WP_Query( $args );

					while ( $wp_query->have_posts() ) : $wp_query->the_post();
					?>


                        <a href="<?php the_permalink();?>" class="empresas-links color-blue">
                            <div class="col p-4 color-blue fs-25 "><?php the_title();?></div>
                        </a>


                        <?php
                        
					endwhile;
					wp_reset_query();
				?>
                    </div>
                </div>
            </div>
            <!-- Enlaces buttom -->
            <div class="py-4 nav-circle">

                <?php 
                
                     
                    if ( is_page() && $post->post_parent ) {
                        $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0&exclude='.$page_id.'' );
                    }else {
                        $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );
                    }

                    
                    if ( $childpages ) {
                     
                        $string = '<ul class="hijos list-unstyled d-flex justify-content-between">' . $childpages . '</ul>';
                    }
                                        
                    echo $string;
                    ?>

            </div>

        </section>
    </div>
</section>

<?php

get_footer();

?>