<?php

/* Template Name: Autores */

get_header('no-margin');
?>

<?php 

    $args_autor = array(
        'post_type' => 'autor',
    );

    $autors_query = new WP_Query( $args_autor );

?>

<!-- Section header -->
<section class="autores-section-header">
    <div class="wrapper header bg-beige-light mb-4 mb-lg-0" style="border-bottom: 1px solid black;">
        <div class="container-fluid">
            <div class="row py-lg-5">
                <div class="autores-header-wrap col-12 d-lg-flex">

                    <div class="col-12 col-lg-6 px-lg-0">
                        <?php
                            display_tag(
                                'titulo_introduccion',
                                'etiqueta_titulo',
                                'texto_titulo',
                                'fs-l fs-lg-l'
                            )
                        ?>
                    </div>

                    <div class="col-12 col-lg-6">
                        <p class="fw-400 fs-11 fs-lg-xxs lh-25 mb-5 mt-4 mb-lg-0 mt-lg-0"><?php the_field("texto_introduccion"); ?></p>
                    </div>

                </div>                
            </div>
        </div>
    </div>
</section>

<!-- Section grid -->
<section>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row py-5 py-lg-5">

                <?php $autors_ids = array();
               
                    if ( $autors_query->have_posts() ) {
                        $autor_counter = 1; ?>

                        <?php while ( $autors_query->have_posts() ) {
                            
                            $autors_query->the_post();
                            $tipo_autor = get_the_term_list( $autors_query->ID, 'tipo-autor' );
                            
                            ////
                            array_push($autors_ids, get_the_ID());

                            $args_article = array(
                                'post_type' => 'post',
                                'orderby' => 'rand',
                                'meta_query' => array(
                                    array(
                                        'key' => 'autor_escritor',
                                        'value' => $autors_ids,
                                        'compare' => 'IN'
                                    )
                                )
                            );

                            $articles_query = new WP_Query($args_article);
                            //// ?>
                        
                            <div class="autor-<?php echo $autor_counter; ?> col-6 col-lg-3 d-flex flex-column mb-4 cursor-pointer">
                                
                                <div class="img-wrap-autor">
                                    <?php img_with_alt_featured(); ?>
                                </div>

                                <div class="autor-info p-1 p-lg-3">
                                    <p class="text-center fs-1 fw-500 mb-0"><?php the_title(); ?></p>
                                    <p class="text-center fs-1 mb-0"><?php echo strip_tags($tipo_autor); ?></p>
                                </div>

                            </div>

                            <div class="modal-autor modal-autor-<?php echo $autor_counter; ?> position-fixed bg-beige <?php if (!wp_is_mobile()) echo 'w-50'; ?> height-200">
                                <div class="wrapper h-100">
                                    <div class="container-fluid h-100">
                                        <div class="py-5 py-lg-5 d-lg-flex flex-lg-column h-100">

                                            <div class="d-flex position-relative">
                                                <div class="ml-auto">
                                                    <?php if (wp_is_mobile()) { ?>
                                                        <span class="close-autor-modal-<?php echo $autor_counter; ?> fal fa-chevron-right cursor-pointer"></span>
                                                    <?php } else { ?>
                                                        <span class="close-autor-modal-<?php echo $autor_counter; ?> fal fa-times"></span>
                                                    <?php } ?>
                                                </div>
                                            </div>

                                            <div>
                                                <p class="fs-l fw-500 mb-lg-0"><?php the_title(); ?></p>
                                            </div>

                                            <div>
                                                <p class="autor-ano-tipo fs-xs mb-0 mt-2 mt-lg-0 m-lg-0"><?php if (wp_is_mobile()) { the_field('ano_autor'); echo ', ';} ?><?php echo $tipo_autor; ?></p>
                                            </div>

                                            <div class="w-100 w-lg-75 px-0 pt-5 pb-4 pb-lg-0">
                                                <p class="fw-400 fs-xxs fs-lg-11 lh-25 mb-0"><?php the_field("descripcion_autor"); ?></p>
                                            </div>

                                            <?php if (wp_is_mobile()) { ?>
                                                <div>
                                                    <p class="fs-xxs fs-lg-11 lh-25 mb-0">Conecta con Urbidermis a trav??s de <span class="fab fa-linkedin-in"></span></p>
                                                </div>

                                                <div class="mt-lg-auto py-4 w-100">
                                                    <a class="btn btn-round m-auto" href="<?php the_permalink(); ?>">Ver m??s de <?php the_title(); ?></a>
                                                </div>
                                            <?php } else { ?>
                                                <div class="mt-lg-5">
                                                    <p>Visitar sitio web <a href="#"><span class="visitar-web fa fa-chevron-right"></span></a></p>
                                                </div>

                                                <div class="mt-lg-auto">
                                                    <p class="ver-productos-autor-<?php echo $autor_counter; ?> btn btn-round mr-lg-3 d-lg-inline">Ver productos del autor</p>
                                                    <p class="ver-galeria-autor-<?php echo $autor_counter; ?> btn btn-round d-lg-inline">Ver galer??a del autor</p>
                                                </div>
                                            <?php } ?>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            
                            <?php if (!wp_is_mobile()) { ?>
                                <div class="sub-modal-productos sub-modal-productos-<?php echo $autor_counter; ?> position-fixed bg-beige <?php if (!wp_is_mobile()) echo 'w-50'; ?> height-200">
                                    <div class="wrapper h-100">
                                        <div class="container-fluid h-100">
                                            <div class="w-100 py-5 py-lg-5 d-lg-flex flex-lg-column">

                                                <div class="d-flex position-relative">
                                                    <div class="ml-auto">
                                                        <span class="close-sub-modal-productos-<?php echo $autor_counter; ?> fal fa-chevron-right cursor-pointer"></span>
                                                    </div>
                                                </div>

                                                <div>
                                                    <p class="fs-l fw-500 mb-lg-0"><?php the_title(); ?></p>
                                                </div>

                                                <div>
                                                    <p class="autor-ano-tipo fs-xs mb-0 mt-2 mt-lg-0 m-lg-0"><?php echo $tipo_autor; ?></p>
                                                </div>

                                                <p>Grid de productos</p>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="sub-modal-galeria sub-modal-galeria-<?php echo $autor_counter; ?> position-fixed bg-beige <?php if (!wp_is_mobile()) echo 'w-50'; ?> height-200">
                                    
                                    <div class="position-relative">
                                        <div class="wrapper h-100">
                                            <div class="container-fluid h-100">
                                                <div class="w-100 py-5 py-lg-5 d-lg-flex flex-lg-column">

                                                    <div class="d-flex position-relative">
                                                        <div class="ml-auto">
                                                            <span class="close-sub-modal-galeria-<?php echo $autor_counter; ?> fal fa-chevron-right cursor-pointer"></span>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <p class="fs-l fw-500 mb-lg-0"><?php the_title(); ?></p>
                                                    </div>

                                                    <div>
                                                        <p class="autor-ano-tipo fs-xs mb-0 mt-2 mt-lg-0 m-lg-0"><?php echo $tipo_autor; ?></p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="chevrons-modal-galeria position-absolute w-100 d-lg-flex justify-content-between">
                                            <span class="icon-circle-bold right-modal-galeria"></span>
                                            <span class="icon-circle-bold right-modal-galeria"></span>
                                        </div>

                                        <div class="slick-autor-modal-galeria position-absolute">

                                            <?php if (have_rows('autor_modal_galeria')) :
                                                while (have_rows('autor_modal_galeria')) : the_row(); ?>

                                                    <div class="wrap-modal-galeria">
                                                        <?php img_with_alt_lazy_sub('imagen_modal_galeria'); ?>
                                                    </div>

                                            <?php 
                                                endwhile; endif;
                                            ?>

                                        </div>

                                    </div>

                                </div>

                            <?php } ?>

                            <script>

                                jQuery(document).ready(function ($) {

                                    $(".autor-<?php echo $autor_counter; ?>").click(function() {
                                        $(".modal-autor-<?php echo $autor_counter; ?>").show('slide', {direction: 'right'}, 500)
                                    })
                                    $(".close-autor-modal-<?php echo $autor_counter; ?>").click(function() {
                                        $(".modal-autor-<?php echo $autor_counter; ?>").hide('slide', {direction: 'right'}, 500)
                                    })

                                    $(".ver-productos-autor-<?php echo $autor_counter; ?>").click(function() {
                                        $(".sub-modal-productos-<?php echo $autor_counter; ?>").show('slide', {direction: 'right'}, 500)
                                    })
                                    $(".close-sub-modal-productos-<?php echo $autor_counter; ?>").click(function() {
                                        $(".sub-modal-productos-<?php echo $autor_counter; ?>").hide('slide', {direction: 'right'}, 500)
                                    })

                                    $(".ver-galeria-autor-<?php echo $autor_counter; ?>").click(function() {
                                        $(".sub-modal-galeria-<?php echo $autor_counter; ?>").show('slide', {direction: 'right'}, 500)
                                        $(".slick-autor-modal-galeria").slick('refresh')
                                    })
                                    $(".close-sub-modal-galeria-<?php echo $autor_counter; ?>").click(function() {
                                        $(".sub-modal-galeria-<?php echo $autor_counter; ?>").hide('slide', {direction: 'right'}, 500)
                                    })

                                })

                            </script>
                            
                        <?php $autor_counter++; } ?>

                    <?php } else {
                        // no posts found
                    }
                    /* Restore original Post Data */
                    wp_reset_postdata(); ?>
              
            </div>
        </div>
    </div>
</section>

<!-- Section BIG TITLE -->
<section>
    <div class="wrapper px-0 px-lg-0">
        <div class="container-fluid">
            <div class="row">
                <div class="autores-big-title-wrap col-12 bg-green text-center">
                    <?php
                        display_tag(
                            'titulo_articulos',
                            'etiqueta_titulo',
                            'texto_titulo',
                            'autores-big-title fs-37 fs-lg-5 d-block m-auto m-lg-auto'
                        )
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section articles -->
<section>
    <div class="wrapper pr-0 pr-lg-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 pr-0 pr-lg-3 d-lg-flex flex-lg-column">

                    <div class="articles-introduction py-5 pt-lg-5">
                        <p class="fw-400 mb-0 fs-14 fs-lg-m lh-25 lh-lg-25"><?php the_field("texto_articulos"); ?></p>
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 pr-0 pr-lg-3">

                                <div class="slick-autors py-lg-5">

                                    <?php if ($articles_query->have_posts() ) {
                                        while ($articles_query->have_posts() ) {
                                            $articles_query->the_post(); ?>
                                        
                                            <div class="slick-autor mr-3 mr-lg-0">

                                                <div class="slick-autor-header p-3 p-lg-3 border border-dark">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <p class="fs-s fs-lg-s fw-400"><?php the_title(); ?></p>
                                                    </a>
                                                </div>

                                                <div class="slick-autor-content p-3 p-lg-3 d-flex flex-column justify-content-between border border-dark">
                                                    <p class="fs-xs fs-lg-xs fw-400"><?php the_field('tipo_de_entrada'); echo ' - '; the_field('tiempo_de_lectura'); ?></p>
                                                    <p class="tags fs-xs fs-lg-s fw-400 mb-lg-0"><?php the_tags( '', ', ', '' ); ?></p>
                                                </div>

                                            </div>

                                        <?php } ?>
                                    <?php } else {
                                        // no posts found
                                    }
                                    /* Restore original Post Data */
                                    wp_reset_postdata(); ?>

                                </div>

                                <div class="slick-arrows-autors position-absolute d-none d-lg-flex justify-content-between p-4">
                                    <span id="slick-autors-left" class="fal fa-chevron-left"></span>
                                    <span id="slick-autors-right" class="fal fa-chevron-right"></span>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="mr-lg-auto pl-lg-5">
                        <?php 
                            $link = get_field('texto_boton');
                            if( $link ): 
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <a class="button btn-round mx-auto my-5 fs-xxs" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>
                    </div>

                </div>                
            </div>
        </div>
    </div>
</section>




<?php
get_footer();