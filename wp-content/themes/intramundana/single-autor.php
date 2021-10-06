<?php

/**
 * The template for displaying all single project posts 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Intramundana
 */

get_header();
/* $page_id = get_queried_object_id(); */
?>

<?php

    $tipo_autor = get_the_term_list( get_the_id(), 'tipo-autor' );

?>

<!-- Section header -->
<section>
    <div class="wrapper bg-beige autor-header-wrap">
        <div class="container-fluid">
            <div class="row py-lg-5">
                <div class="col-12 d-lg-flex">

                    <div class="col-12 col-lg-6 px-lg-0 d-lg-flex flex-lg-column">
                        <div>
                            <?php
                                display_tag(
                                    'nombre_autor',
                                    'etiqueta_nombre_autor',
                                    'texto_nombre_autor',
                                    'fs-l fs-lg-25 fw-500'
                                )
                            ?>
                        </div>

                        <div class="mt-lg-4">
                            <p class="autor-ano-tipo fs-xxs mb-0 mt-2"><?php the_field('ano_autor'); ?>, <?php echo $tipo_autor; ?></p>
                        </div>

                        <div class="col-12 col-lg-6 px-0 py-5">
                            <p class="fw-400 fs-xxs fs-lg-11 lh-25 mb-0"><?php the_field("descripcion_autor"); ?></p>
                        </div>

                        <div class="mt-lg-auto mb-4">
                            <span class="fal fa-chevron-left mr-3 mr-lg-3"></span>
                            <?php 
                                $link = get_field('volver_autores');
                                if( $link ): 
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                    ?>
                                    <a class="fs-1" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>                
            </div>
        </div>
    </div>
</section>

<!-- Sección historia -->
<section>

    <?php img_with_alt('foto_historia'); ?>

    <div class="wrapper bg-beige-light autor-historia-wrap">
        <div class="container-fluid">
            <div class="row pt-5 pb-4 py-lg-5">
                <div class="col-12">

                    <div class="d-lg-flex">

                        <div class="col-12 col-lg-6 d-lg-flex flex-lg-column px-lg-0">
                            <div>
                                <?php 
                                    display_tag(
                                        'titulo_historia',
                                        'etiqueta_titulo_historia',
                                        'texto_titulo_historia',
                                        'fs-21 fs-lg-25 w-75 fw-400'
                                    );
                                ?>
                            </div>

                            <div>
                                <p class="fs-14 fs-lg-11 lh-25 mt-lg-5 py-4"><?php the_field('texto_historia_destacado'); ?></p>
                            </div>
                            
                            <div>
                                <p class="fs-xxs fs-lg-11 lh-25 mt-lg-5"><?php the_field('texto_historia_1'); ?></p>
                                <p class="fs-xxs fs-lg-11 lh-25 mt-lg-5"><?php the_field('texto_historia_2'); ?></p>
                            </div>
                        </div>

                    </div>

                </div>                
            </div>
        </div>
    </div>

    <div class="autor-imagen-historia-wrap mt-lg-5">
        <?php img_with_alt('imagen_historia_2'); ?>
    </div>

</section>

<!--Seccion diseños-->
<section>
    <div class="wrapper bg-green">
        <div class="container-fluid">

            <div class="d-flex">

                <div class="py-5 mx-auto text-center m-lg-auto">
                    <?php 
                        display_tag(
                            'titulo_disenos',
                            'etiqueta_titulo_disenos',
                            'texto_titulo_disenos',
                            'fs-37 fs-lg-5 fw-500'
                        );
                    ?>
                </div>  

            </div>

                
        </div>
    </div>
</section>

<!--Seccion productos-->
<section>
    
    <div class="container-fluid">
        <div class="row">

            <div class="accordion w-100" id="accordionExample">

                <div class="card bg-beige-light">

                    <div class="card-header p-4 py-lg-0" id="headingOne">
                            <button class="text-center w-100 collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <p class="fs-21 fs-lg-3 fw-500">NeoRomántico Clásico</p>
                            </button>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">

                        <div class="card-body bg-beige-light">
                            
                            <div class="wrapper">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mx-lg-auto mt-lg-5">
                                            <p class="fs-xxs fs-lg-11 fw-400 text-center">Banco Urbano, 2000</p>
                                        </div>

                                        <div class="py-3 mt-lg-4">
                                            <p class="fs-xxs fs-lg-11 fw-400 mx-lg-auto text-center">La familia NeoRomántico Liviano, la versión ligera y con apoyabrazos, dispone de gran variedad de formatos y materiales: silla individual y banco y banqueta de longitud varia. Realizados en distintas maderas. Depurando los excesos de su precedente versión, sin por ello renunciar a la ya característica ergonomía, un soporte aligerado, con porte elegante y refinado.</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            
                            <div class="slick-autor-product-carousel">
                                
                                <?php
                                    if( have_rows('product_carousel') ):
                                        $counter_carousel =1;
                                    while ( have_rows('product_carousel') ) : the_row();
                                ?>

                                    <div class="img-wrap">
                                        <?php img_with_alt_lazy_sub('img_product_carousel'); ?>
                                    </div>

                                <?php
                                    $counter_carousel++;
                                    endwhile;
                                    endif;
                                ?>

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

?>