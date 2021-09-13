<?php

/**
 * The template for displaying all single project posts 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Intramundana
 */

get_header('no-margin');
/* $page_id = get_queried_object_id(); */
?>
        
<section class="section-cover h-100 bg-beige">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 wrapper-proj d-flex flex-column flex-lg-row">

                    <div class="d-lg-flex flex-lg-column col-lg-6 p-0">
                        <h1 class="mt-5 fw-500 fs-25 fs-lg-375 lh-lg-40 mt-lg-0 mb-lg-4"><?php the_title();?></h1>
                        <p class="fw-500 fs-11 fs-lg-14 lh-lg-25 mb-lg-0">Caso práctico, 8 min</p>
                        
                        <!-- the_tag() -->
                        <p class="fw-500 fs-11 fs-lg-14 lh-25 lh-lg-25 w-75">#urbanidad #ciudad #edificios #suspensión #instalación #espacios</p>

                        <?php if ( !wp_is_mobile() ) : ?>

                            <div class="mt-5 mb-lg-0 mt-lg-auto ">
                                <p class="fw-500 fs-14 d-inline">Información técnica</p>
                                <span><i class="icon-plus d-inline ml-3"></i></span>
                            </div>

                        <?php endif; ?>

                    </div>

                    <div class="col-lg-6 mt-5 mt-lg-0 p-0">
                        <p class="fw-500 mb-lg-0 fs-11 fs-lg-14 lh-25 lh-lg-28"><?php the_field('texto_portada'); ?></p>
                    </div>

                    <?php if (wp_is_mobile()): ?>

                        <div class="mt-5 mt-lg-auto">
                            <p class="fw-500 fs-11 lh-25 d-inline">Información técnica</p>
                            <span><i class="icon-plus d-inline ml-3"></i></span>
                        </div>

                    <?php endif; ?>
                    
                </div> 

            </div>
        </div>
    </div>

    <?php img_with_alt('imagen_portada'); ?>

    <div class="infoTec h-200 bg-beige-light position-fixed mt-5 py-4 py-lg-0 mt-lg-0">
        <div class="infoTec-wrap px-4 py-4 px-lg-5 py-lg-5">

            <div class="d-flex justify-content-between">
                <h3 class="fs-lg-25">Información técnica</h3>
                <?php if( !wp_is_mobile() ) : ?>
                    <span><i class="icon-close"></i></span>
                <?php else: ?>
                    <span><i class="icon-arrow-left"></i></span>
                <?php endif; ?>
            </div>

            <div class="infoContent mt-5">

                <p class="infoTitle fw-500 fs-lg-11 mb-0">Localización</p>
                <p class="infoText fs-lg-11 mb-3"><?php the_field('infoTec_localizacion'); ?></p>

                <p class="infoTitle fw-500 fs-lg-11 mb-0">Autor</p>
                <p class="infoText fs-lg-11 mb-3"><?php the_field('infoTec_autor'); ?></p>

                <p class="infoTitle fw-500 fs-lg-11 mb-0">Consultor de iluminación</p>
                <p class="infoText fs-lg-11 mb-3"><?php the_field('infoTec_consultor'); ?></p>

                <p class="infoTitle fw-500 fs-lg-11 mb-0">Cliente</p>
                <p class="infoText fs-lg-11 mb-3"><?php the_field('infoTec_cliente'); ?></p>

                <p class="infoTitle fw-500 fs-lg-11 mb-0">Superfície Total</p>
                <p class="infoText fs-lg-11 mb-3"><?php the_field('infoTec_superficie'); ?></p>

                <p class="infoTitle fw-500 fs-lg-11 mb-0">Proyecto</p>
                <p class="infoText fs-lg-11 mb-3"><?php the_field('infoTec_proyecto'); ?></p>

                <p class="infoTitle fw-500 fs-lg-11 mb-0">Fotografia</p>
                <p class="infoText fs-lg-11 mb-3"><?php the_field('infoTec_fotografia'); ?></p>

            </div>

        </div>
    </div>

</section>

<section class="section-intro bg-beige-light">
    <div class="wrapper d-flex flex-column flex-lg-row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-lg-flex px-xs-4 wrapper-proj">

                    <div class="col-lg-6 d-lg-flex flex-column px-0">
                        <?php
                            display_tag(
                                'titulo_introduccion',
                                'etiqueta_titulo',
                                'texto_titulo',
                                'titulo-introduccion mb-4 mb-lg-5 fs-25 fs-lg-375'
                            )
                        ?>

                        <?php if ( !wp_is_mobile() ) : ?>
                            
                            <div class="img-wrap my-lg-auto">
                                <?php img_with_alt('imagen_introduccion_1'); ?>
                            </div>

                        <?php endif; ?>

                    </div>

                    <div class="col-lg-6 px-0 d-lg-flex flex-lg-column justify-content-between">
                        <p class="texto-resaltado fw-500 fs-14 fs-lg-22 lh-28 lh-lg-40 mb-4"><?php the_field('texto_resaltado'); ?></p>
                        <p class="fw-500 fs-11 fs-lg-14 lh-25 lh-lg-30"><?php the_field('texto_introduccion_1'); ?></p>
                        <p class="fw-500 fs-11 fs-lg-14 lh-25 lh-lg-30"><?php the_field('texto_introduccion_2'); ?></p>
                        <p class="fw-500 fs-11 fs-lg-14 lh-25 lh-lg-30 mb-lg-0"><?php the_field('texto_introduccion_3'); ?></p>
                    </div>

                </div>

                <?php if ( wp_is_mobile() ) : ?>

                    <?php img_with_alt('imagen_introduccion_1'); ?>

                <?php endif; ?>
                
            </div>
        </div>
    </div>

    <?php img_with_alt('imagen_introduccion_2'); ?>

</section>

<section class="section-history d-flex flex-column flex-lg-row bg-beige-light">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 px-xs-4 d-lg-flex wrapper-proj">

                    <div class="col-lg-6 d-lg-flex flex-lg-column justify-content-between px-0 pr-lg-5">
                        <?php
                            display_tag(
                                'titulo_historia',
                                'etiqueta_titulo',
                                'texto_titulo',
                                'titulo-historia mb-4 fs-25 fs-lg-375'
                            )
                        ?>

                        <?php if ( !wp_is_mobile() ) : ?>

                            <?php img_with_alt('imagen_historia'); ?>

                        <?php endif; ?>
                    </div>
                        
                    <div class="col-lg-6 d-lg-flex flex-lg-column px-0">
                        <p class="fw-500 fs-11 fs-lg-14 mb-5 mb-lg-3"><?php the_field('texto_historia_1'); ?></p>
                        <p class="fw-500 fs-11 fs-lg-14"><?php the_field('texto_historia_2'); ?></p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php if ( wp_is_mobile() ) : ?>

        <?php img_with_alt('imagen_historia'); ?>

    <?php endif; ?>

</section>

<section class="section-product d-flex flex-column flex-lg-row bg-beige">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-lg-flex px-xs-4 wrapper-proj">

                    <div class="col-lg-6 d-lg-flex flex-lg-column justify-content-between px-0 pr-lg-5">
                        <?php
                            display_tag(
                                'titulo_productos',
                                'etiqueta_titulo',
                                'texto_titulo',
                                'titulo-producto mb-4 fs-25 fs-lg-375'
                            )
                        ?>

                        <?php if ( !wp_is_mobile() ) : ?>
                            
                            <div class="img-wrap">
                                <?php img_with_alt('imagen_producto_escritorio'); ?>
                            </div>

                        <?php endif; ?>
                    </div>

                    <div class="col-lg-6 d-lg-flex flex-lg-column justify-content-between px-0">
                        <p class="fw-500 fs-11 fs-lg-14 mb-5"><?php the_field('texto_productos_1'); ?></p>
                        <p class="fw-500 fs-11 fs-lg-14 mb-5"><?php the_field('texto_productos_2'); ?></p>

                        <?php if ( !wp_is_mobile() ) : ?>

                            <button class="ver-ficha btn btn-round ml-auto mr-auto my-lg-0 mr-lg-auto ml-lg-0"><?php the_field('texto_boton_producto'); ?></button>

                        <?php endif; ?>
                        
                    </div>

                    <?php if ( wp_is_mobile() ) : ?>

                        <div class="slick-productos">

                            <?php
                                if( have_rows('slider_productos') ):
                                    $counter = 1;
                                while ( have_rows('slider_productos') ) : the_row();
                            ?>

                                <div class="slick-imagen">
                                    <?php img_with_alt_lazy_sub('imagen_producto'); ?>
                                </div>

                            <?php
                                $counter++;
                                endwhile;
                                endif;
                            ?>

                        </div>

                        <button class="ver-ficha btn btn-round ml-auto mr-auto mb-0 my-lg-0 mr-lg-auto ml-lg-0"><?php the_field('texto_boton_producto'); ?></button>

                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</section>

<div class="hline"></div>

<?php

get_footer();

?>