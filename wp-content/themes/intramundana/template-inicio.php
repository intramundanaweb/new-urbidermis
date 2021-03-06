<?php

/* Template Name: Home */

get_header('no-margin');
?>

<?php

    $args = array(
        'post_type' => 'post'
    );

    $articles_query = new WP_Query($args);

?>

<!-- Section cover -->
<section>
    <div class="container-fluid section-cover">
        <div class="row">
            <div class="col-12 px-0 height-200">

                <div class="slick-cover">

                    <?php
                        if( have_rows('slider_home') ):
                            $counter =1;
                        while ( have_rows('slider_home') ) : the_row();
                    ?>

                    <div class="position-relative">

                        <?php img_with_alt_lazy_sub('imagen'); ?>
                        <p class="pie-de-foto fw-500 fs-14 fs-lg-md position-absolute color-black"><?php the_sub_field('pie_de_foto'); ?></p>

                    </div>

                    <?php
                        $counter++;
                        endwhile;
                        endif;
                    ?>

                </div>

                <div class="slick-arrows w-100 position-absolute d-flex justify-content-between p-4">
                    <span id="slick-cover-left" class="icon-circle-bold"></span>
                    <span id="slick-cover-right" class="icon-circle-bold"></span>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Section contact -->
<section>
    <div class="wrapper contact bg-beige">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="section section-contact mt-5 mt-lg-0 pt-lg-56 mb-5 mb-lg-6 d-flex flex-column">

                        <div class="mb-4">
                            <?php
                                display_tag(
                                    'title_group',
                                    'title_tag',
                                    'title_txt',
                                    'font-weight-bold fs-25 fs-lg-l'
                                )
                            ?>
                        </div>
                        
                        <div>
                            <p class="fw-400 fs-11 fs-lg-l"><?php the_field('parrafo_1'); ?></p>
                            <p class="fw-400 fs-11 fs-lg-l"><?php the_field('parrafo_2'); ?></p>
                        </div>

                        <div class="button-wrap mt-auto ml-auto ml-lg-0 mr-auto">
                            <?php 
                                $link = get_field('boton_home_intro');
                                if( $link ): 
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                    <a class="button btn btn-round fs-lg-xxs" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                            <?php endif; ?>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section skin -->
<section>

    <?php img_with_alt('imagen_seccion'); ?>

    <div class="wrapper skin bg-beige-light">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="section section-skin pt-5 pt-lg-56 pb-5 pb-lg-0 d-flex flex-column flex-lg-row">
                    
                        <div class="title col-lg-6 mb-4 px-0">
                            <?php
                                display_tag(
                                    'titulo_intermedio',
                                    'title_tag',
                                    'title_txt',
                                    'font-weight-bold fs-25 fs-lg-l'
                                )
                            ?>
                        </div>

                        <div class="body col-lg-6 px-0 d-flex flex-column">

                            <p class="fw-400 lh-lg-28 fs-11 fs-lg-xxs p-text"><?php the_field('parrafo_intermedio_1'); ?></p>
                            <p class="fw-400 lh-lg-28 fs-11 fs-lg-xxs p-text"><?php the_field('parrafo_intermedio_2'); ?></p>

                            <div class="skin-buttons d-flex flex-column flex-lg-row mt-auto mt-lg-auto">
                                <?php 
                                    $link = get_field('boton_home_skin_1');
                                    if( $link ): 
                                        $link_url = $link['url'];
                                        $link_title = $link['title'];
                                        $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                        <a class="button btn btn-round habla-con-nos mb-4 fs-lg-xxs mb-lg-6 ml-auto mr-auto mr-lg-0 mt-5 mt-lg-0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                <?php endif; ?>
                                <?php 
                                    $link = get_field('boton_home_skin_2');
                                    if( $link ): 
                                        $link_url = $link['url'];
                                        $link_title = $link['title'];
                                        $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                        <a class="button btn btn-round ver-galeria ml-auto fs-lg-xxs ml-lg-4 mr-auto mb-lg-6" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                <?php endif; ?>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>    
</section>

<!-- Section BIG TITLE -->
<section>
    <div class="wrapper bg-beige">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 big-title-section py-5">
                    <?php
                        display_tag(
                            'titulo_final',
                            'title_tag',
                            'title_txt',
                            'big-title-content m-0 text-center fs-lg-xl'
                        )
                    ?>
                    <?php
                        display_tag(
                            'palabra_dinamica',
                            'title_tag',
                            'title_txt',
                            'palabra-dinamica fs-lg-xl'
                        )
                    ?>

                    <!--<canvas id="myCanvas"></canvas>-->

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Reference -->
<section>
    <div class="wrapper reference bg-beige-light">
        <div class="container-fluid pr-lg-0">
            <div class="row">
                <div class="col-12">

                    <div class="section section-reference pt-5 pt-lg-5 pb-5 pb-lg-0">
                        <div class="reference-wrap pr-0">

                            <div class="title mb-4">
                                <?php
                                    display_tag(
                                        'subtitulo_final',
                                        'title_tag',
                                        'title_txt',
                                        'fw-400 fs-25 fs-lg-m mb-4'
                                    )
                                ?>
                            </div>

                            <div class="slick-articles pt-lg-56 pb-lg-5">

                                <?php if ( $articles_query->have_posts() ) { ?>

                                    <?php while ( $articles_query->have_posts() ) { 
                                        
                                        $articles_query->the_post();
                                        $post_tags = get_the_tags($articles_query->ID); ?>
                                        
                                        <div class="slick-article mr-3">

                                            <div class="slick-article-top p-3 border border-dark">
                                                <a href="#">
                                                    <p class="fs-15 fs-lg-s fw-400"><?php the_title(); ?></p>
                                                </a>
                                            </div>

                                            <div class="slick-article-bottom p-3 d-flex flex-column justify-content-between border border-dark">
                                                <p class="fs-11 fs-lg-xs fw-400"><?php the_field('tipo_de_entrada'); ?> - <?php the_field('tiempo_de_lectura'); ?></span>
                                                <p class="tags fs-lg-s fw-400 mb-lg-0"><?php the_tags( '', ', ', '' ); ?></p>
                                            </div>

                                        </div>
                                                                    
                                    <?php } ?>

                                <?php } else {
                                    // no posts found
                                }
                                /* Restore original Post Data */
                                wp_reset_postdata(); ?>

                            </div>

                            <div class="slick-arrows-articles position-relative d-none d-lg-flex justify-content-between w-100">
                                <span id="slick-article-left" class="fal fa-chevron-left"></span>
                                <span id="slick-article-right" class="fal fa-chevron-right"></span>
                            </div>

                            <div class="ver-mas ml-auto ml-lg-4 mr-auto mt-5 mb-lg-6">
                                <?php 
                                    $link = get_field('boton_home_final');
                                    if( $link ): 
                                        $link_url = $link['url'];
                                        $link_title = $link['title'];
                                        $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                        <a class="button btn btn-round m-auto fs-lg-xxs" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                <?php endif; ?>
                            </div>
                            

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();