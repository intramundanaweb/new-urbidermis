<?php

/* Template Name: MainPage */

get_header('top-bar');
$page_id = get_queried_object_id();
?>
<section>
    <div class="wrapper ff-dms">
        <section class="d-flex flex-column">
            <div class="container-fluid">
                <div class="row py-5">
                    <div class="col-12 col-lg-3 color-blue height-column custom-height">
                        <div class="custom-direction">
                            <?php
                            display_tag(
                                'title_group',
                                'title_tag',
                                'title_txt',
                                'fs-12 fw-600 d-block'
                            )
                        ?>
                            <div class="text-body color-blue">
                                <?php the_field('contenido'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-9 px-lg-5">

                        <div class="slider-galeria">
                            <?php
        							if( have_rows('slider_principal') ):
    									$counter =1;
        							while ( have_rows('slider_principal') ) : the_row();
    							?>
                            <div class="cualquiera">
                                <div class="slider-container mb-3">
                                    <?php img_with_alt_lazy_sub('imagen'); ?>
                                </div>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-1 align-self-start color-blue">
                                            <span class="slider-info"></span>
                                        </div>
                                        <div class="col align-self-end text-right pr-lg-2">
                                            <a class="buttom-info-photo edit color-blue"
                                                id="modal-slider-<?php echo $counter;?>"><?php the_sub_field('titulo_foto'); ?></a>
                                        </div>
                                    </div>
                                </div>

                                <span class="invisible id-dinamico color-blue"><?php echo $counter;?></span>
                                <span id="firstname<?php echo $counter;?>" style="display:none">
                                    <?php the_sub_field('fotografo'); ?>
                                </span>
                                <span id="descripname<?php echo $counter;?>" style="display:none">
                                    <?php the_sub_field('descripcion_de_la_imagen'); ?>
                                </span>


                            </div>
                            <?php
    							$counter++;
    							endwhile;
    							endif;
    							?>
                        </div>

                        <div class="control-slider d-none d-lg-flex justify-content-between w-100">
                            <span id="slider-left">
                                <span class="icon-arrow-left fs-2 color-blue"></span>
                            </span>
                            <span id="slider-right">
                                <span class="icon-arrow-right fs-2 color-blue"></span>
                            </span>
                        </div>

                    </div>
                </div>
            </div>



            <!-- Inicio seccion lateral -->
            <section class="height-200 sidecontent">
                <div class="wrapper h-100">
                    <section class="d-flex flex-column h-100">
                        <div class="container-fluid h-100">
                            <div class="mt-lg-5 mt-4">
                                <a class="closebtn d-block mb-lg-0 mb-4 fs-15"><span
                                        class="icon-close fs-12 float-none text-white pointer"></span></a>
                            </div>
                            <div class="py-lg-5 text-white">
                                <span id="descrnametext"></span>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="d-flex">
                                <p class="fs-1 text-white"><?php _e('Fotógrafo', 'intramundana') ?>:
                                    <span id="efirstname"></span>
                                </p>
                            </div>
                        </div>
                    </section>
                </div>
            </section>
            <!-- Fin seccion lateral -->

            <!-- Enlaces buttom -->
            <div class="py-4 nav-circle-page">

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