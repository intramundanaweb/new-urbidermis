<?php

/* Template Name: Projects */

get_header('no-margin');
?>

<?php
    // WP QUERIES AND TAXONOMIES INFO
 

    // The Query
    $args = array(
        'post_type' => 'proyecto',
    );

    $projects_query = new WP_Query( $args );


    // The Taxnonomies
    $paises = get_terms( array(
        'taxonomy' => 'pais',
        'hide_empty' => false
    ) );

    $ciudades = get_terms( array(
        'taxonomy' => 'ciudad',
        'hide_empty' => false
    ) );

    $tipologias = get_terms( array(
        'taxonomy' => 'tipo',
        'hide_empty' => false
    ) );

    $productos = get_terms( array(
        'taxonomy' => 'producto',
        'hide_empty' => false
    ) );
    
?>

<!-- Section header -->
<section class="section-header">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row py-5">
                <div class="col-12 d-lg-flex">

                    <div class="header-title col-12 col-lg-6">
                        <?php
                            display_tag(
                                'titulo_pagina',
                                'etiqueta_titulo',
                                'texto_titulo',
                                'fs-lg-375'
                            )
                        ?>
                    </div>

                    <div class="header-introduction col-12 col-lg-6">
                        <p class="fw-400 fs-11 fs-lg-14 lh-25 lh-lg-25"><?php the_field("texto_introduccion"); ?></p>
                    </div>

                </div>                
            </div>
        </div>
    </div>
</section>

<!-- Filter box mobile -->
<?php if( wp_is_mobile() ) : ?>
    <div class="filter-box position-fixed py-5 px-5 w-100 height-200 bg-beige-light">

        <span class="filterBox-mobile-chevron"><span class="far fa-chevron-up"></span></span>

        <div class="custom-select mt-5 mb-4 position-relative text-dark border-dark">
            <select name="country" id="sel-country" class="d-none">
                <option>País</option>
                <?php foreach($paises as $pais) { ?>    
                    <option><?php echo $pais->name; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="custom-select  mb-4 position-relative text-dark border-dark">
            <select name="city" id="sel-city" class="d-none">
                <option>Ciudad</option>
                <?php foreach($ciudades as $ciudad) { ?>    
                    <option><?php echo $ciudad->name; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="custom-select mb-4 position-relative text-dark border-dark">
            <select name="typology" id="sel-typology" class="d-none">
                <option>Tipologia</option>
                <?php foreach($tipologias as $tipologia) { ?>    
                    <option><?php echo $tipologia->name; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="custom-select mb-4 position-relative text-dark border-dark">
            <select name="product" id="sel-product" class="d-none">
                <option>Producto</option>
                <?php foreach($productos as $producto) { ?>    
                    <option><?php echo $producto->name; ?></option>
                <?php } ?>
            </select>
        </div>

    </div>
<?php endif; ?>


<!-- Section projects [grid | list] -->
<section class="section-grid">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- UPPER MENU -->
                    <div class="upper-menu col-12 d-flex justify-content-between mt-5 mb-3">

                        <!-- SWITCH BUTTON -->
                        <div class="switch-wrapper d-flex d-lg-flex">
                            <span class="switch-imagen fw-400 fs-11 fs-lg-14"><?php _e('Imágenes', 'urbidermis'); ?></span>
                            <span class="switch-wrap">
                                <label class="switch mx-2 mx-lg-2 mb-0 position-relative d-inline-block">
                                    <input name="view-switch" type="checkbox">
                                    <span class="slider position-absolute"></span>
                                </label>
                            </span>
                            <span class="switch-lista fw-400 fs-11 fs-lg-14"><?php _e('Lista', 'urbidermis'); ?></span>
                        </div>

                        <!-- FILTER LABEL -->
                        <div class="filter-label">
                            <button class="fw-400 fs-11 fs-lg-14 border-0 p-0"><?php _e('Filtrar', 'urbidermis'); ?> <span class="fa fa-chevron-down"></span></button>
                        </div>

                    </div>

                    <div class="active-filters w-100 d-flex flex-wrap justify-content-end d-lg-none"></div>

                    <?php if( wp_is_mobile() ) : ?>
                        <input type="range" min="1" max="100" value="0" class="range mt-3 mb-4 bg-black w-100 p-0"></input>
                    <?php endif; ?>

                    <!-- FILTER BOX -->
                    <?php if(! wp_is_mobile() ) : ?>
                        <div class="container-fluid filter-box">
                            <div class="row">
                                <div class="col-12 px-lg-0">
                        
                                    <div class="selects-wrap p-3 border border-dark position-relative d-flex justify-content-between flex-wrap">

                                        <div class="custom-select mb-4 mb-lg-0 position-relative text-dark border-dark">
                                            <select name="country" id="sel-country" class="d-none">

                                                <option><?php _e('País', 'urbidermis'); ?></option>
                                                <?php foreach($paises as $pais) { ?>    
                                                    <option><?php echo $pais->name; ?></option>
                                                <?php } ?>

                                            </select>
                                        </div>

                                        <div class="custom-select position-relative text-dark border-dark">
                                            <select name="city" id="sel-city" class="d-none">
                                                
                                                <option><?php _e('Ciudad', 'urbidermis'); ?></option>
                                                <?php foreach($ciudades as $ciudad) { ?>
                                                    <option><?php echo $ciudad->name; ?></option>
                                                <?php } ?>

                                            </select>
                                        </div>

                                        <div class="custom-select position-relative text-dark border-dark">
                                            <select name="typology" id="sel-typology" class="d-none">
                                                
                                                <option><?php _e('Tipologia', 'urbidermis'); ?></option>
                                                <?php foreach($tipologias as $tipologia) { ?>
                                                    <option><?php echo $tipologia->name; ?></option>
                                                <?php } ?>

                                            </select>
                                        </div>

                                        <div class="custom-select position-relative text-dark border-dark">
                                            <select name="product" id="sel-product" class="d-none">
                                                
                                                <option><?php _e('Producto', 'urbidermis'); ?></option>
                                                <?php foreach($productos as $producto) { ?>
                                                    <option><?php echo $producto->name; ?></option>
                                                <?php } ?>

                                            </select>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- GRID -->
                    <?php if ( $projects_query->have_posts() ) { 
                        $counter =1; ?>
                        <div class="grid-flex container-fluid p-0">
                            <div class="row grid-row">
                                <?php while ( $projects_query->have_posts() ) {

                                    $projects_query->the_post(); 
                                    $id = get_the_ID();
                                    $pais = get_the_term_list( $projects_query->ID, 'pais' );
                                    $ciudad = get_the_term_list( $projects_query->ID, 'ciudad' );
                                    $tipologia = get_the_term_list( $projects_query->ID, 'tipo' );
                                    $producto = get_the_term_list( $projects_query->ID, 'producto' ); ?>

                                    <div class="grid-project-wrap col-12 col-lg-2 py-3">
                                        <a class="d-block open-modal-<?php echo $counter; ?>" href="#<?php //the_permalink(); ?>">
                                            <div class="grid-project flex-column" data-pais="<?php echo strip_tags($pais); ?>" data-ciudad="<?php echo strip_tags($ciudad); ?>" data-tipologia="<?php echo strip_tags($tipologia); ?>" data-producto="<?php echo strip_tags($producto); ?>">
                                                <div class="image-wrap">
                                                    <?php img_with_alt_featured(); ?>
                                                </div>
                                                <?php if ( get_field('tipo_de_proyecto') == 'extendido' ) { ?>
                                                    <div class="project-title extended mt-2 px-2">
                                                    <p class="d-inline-block mb-2 mb-lg-0 fw-500 fs-11 fs-lg-12"><?php the_title(); ?> <span class="fal fa-plus-circle"></span></p>
                                                    
                                                <?php } else { ?>
                                                    <div class="project-title pt-2 pt-lg-2">
                                                    <p class="d-inline-block mb-2 mb-lg-0 fw-500 fs-11 fs-lg-12"><?php the_title(); ?></p>
                                                <?php } ?>
                                                    
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <!-- Section modal -->
                                    <section class="section-modal modal-<?php echo $counter; ?> bg-beige-light height-200">
                                        <?php if ( get_field('tipo_de_proyecto') == 'extendido' ) { ?>
                                            <div class="background bg-blue-light pt-lg-5 pt-5">
                                        <?php } else { ?>
                                            <div class="background bg-beige-light pt-lg-5 pt-5">
                                        <?php } ?>
                                                <div class="wrapper">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-12 height-200">
                                                            
                                                            <!-- MODAL MOBILE -->
                                                            <?php if (wp_is_mobile()) { ?>
                                                            
                                                                <div class="d-flex close-modal-mobile position-relative">
                                                                    <div class="ml-auto">
                                                                        <span class="close-modal-<?php echo $counter; ?> fal fa-chevron-left"></span>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <p class="fs-l"><?php the_title(); ?></p>
                                                                    <span class="m-lg-0 fs-m"><?php the_field('ciudad_pais'); ?></span>
                                                                    <span class="m-lg-0 fs-m"><?php the_field('ano'); ?></span>
                                                                    <p class="m-lg-0 fs-m"><?php the_field('centro'); ?></p>
                                                                </div>

                                                                <div class="d-flex">
                                                                    <div class="mx-auto">
                                                                        <?php if ( get_field('tipo_de_proyecto') == 'extendido' ) { ?>
                                                                            <?php 
                                                                                $link = get_field('boton_leer');
                                                                                if( $link ): 
                                                                                    $link_url = $link['url'];
                                                                                    $link_title = $link['title'];
                                                                                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                                                                    <a class="button btn-round mt-3 mb-5 fs-xxs" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                                                            <?php endif; ?>
                                                                        <?php } else { ?>
                                                                            <div class="mt-4"></div>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                                

                                                                <p class="fw-500 fs-s"><?php _e('Productos', 'urbidermis'); ?></p>
                                                                <p class="m-lg-0 fs-s w-75"><?php the_field('productos'); ?></p>

                                                                <div class="slick-project-modal-mobile">

                                                                    <?php
                                                                        if( have_rows('slider_project') ):
                                                                            $counter_slide_mobile =1;
                                                                        while ( have_rows('slider_project') ) : the_row();
                                                                    ?>

                                                                    <div class="position-relative">
                                                                        <?php img_with_alt_lazy_sub('imagen'); ?>
                                                                    </div>

                                                                    <?php
                                                                        $counter_slide_mobile++;
                                                                        endwhile;
                                                                        endif;
                                                                    ?>

                                                                </div>

                                                            <!-- MODAL DESKTOP -->
                                                            <?php } else { ?>

                                                                <!-- AQUESTES FLETXES SON PER CANVIAR DE PROJECTE NO DE IMATGE -->
                                                                <div class="chevrons-project d-lg-flex justify-content-between position-relative w-100">
                                                                    <div><span class="fal fa-chevron-left chevron-project-left"></span></div>
                                                                    <div><span class="fal fa-chevron-right chevron-project-right"></span></div>
                                                                </div>

                                                                <div class="d-lg-flex w-100">
                                                                    <div class="ml-lg-auto fs-lg-xs">
                                                                        <span class="fal fa-times close-modal-<?php echo $counter; ?>"></span>
                                                                    </div>
                                                                </div>

                                                                <div class="project-info position-absolute">
                                                                    <p class="fw-500 mb-lg-2"><?php _e('Información', 'urbidermis'); ?></p>
                                                                    <p class="m-lg-0"><?php the_field('localizacion_concreta'); ?></p>
                                                                    <p class="m-lg-0"><?php the_field('ciudad_pais'); ?></p>
                                                                    <p class="m-lg-0"><?php the_field('ano'); ?></p>
                                                                    <p class="m-lg-0"><?php the_field('centro'); ?></p>
                                                                    <p class="fw-500 mb-lg-2 mt-lg-3"><?php _e('Productos', 'urbidermis'); ?></p>
                                                                    <p class="m-lg-0 w-50"><?php the_field('productos'); ?></p>
                                                                </div>

                                                                <div class="slick-project-modal">

                                                                    <?php
                                                                        if( have_rows('slider_project') ):
                                                                            $counter_slide =1;
                                                                        while ( have_rows('slider_project') ) : the_row();
                                                                    ?>

                                                                    <div class="position-relative">
                                                                        <?php img_with_alt_lazy_sub('imagen'); ?>
                                                                    </div>

                                                                    <?php
                                                                        $counter_slide++;
                                                                        endwhile;
                                                                        endif;
                                                                    ?>

                                                                </div>

                                                                <?php if ( get_field('tipo_de_proyecto') == 'extendido' ) { ?>
                                                                    <?php 
                                                                        $link = get_field('boton_leer');
                                                                        if( $link ): 
                                                                            $link_url = $link['url'];
                                                                            $link_title = $link['title'];
                                                                            $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                                                            <a class="button btn-round" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                                                    <?php endif; ?>
                                                                <?php }  ?>

                                                            <?php } ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </section>

                                    <script>
                                        jQuery(document).ready(function ($) {

                                            $(".open-modal-<?php echo $counter; ?>").click(function() {
                                                $(".modal-<?php echo $counter; ?>").toggle('slide', { direction: 'left'}, 500)
                                            })

                                            $(".close-modal-<?php echo $counter; ?>").click(function(e) {
                                                console.log('clickedddddd fuck')
                                                e.preventDefault()
                                                $(".modal-<?php echo $counter; ?>").toggle('slide', {direction: 'left'}, 500)
                                            })
                                        })
                                    </script>

                                <?php $counter++; } ?>

                            </div>
                        </div>

                        
                    <?php } else {
                        // no posts found
                    }
                    /* Restore original Post Data */
                    wp_reset_postdata(); ?>

                    
                    <!-- LIST -->
                    <div class="list-flex container-fluid">
                        <div class="row">
                            <div class="col-12 px-0 px-lg-0">
                                
                                <p class="order-label">Ordenar por</p>

                                <div class="list-menu d-lg-flex w-lg-100">
                                        
                                    <div data-value="project" class="col-6 col-lg px-0 order order-proyecto"><span class="fw-500 fs-1 fs-lg-13"><?php _e('Proyecto', 'urbidermis'); ?> <span class="d-lg-inline fa fa-chevron-down"></span></span></div>
                                    <div data-value="city" class="col-lg px-0 order order-ciudad"><span class="fw-500 fs-1 fs-lg-13"><?php _e('Ciudad', 'urbidermis'); ?> <span class="d-lg-inline fa fa-chevron-down"></span></span></div>
                                    <div data-value="country" class="col-3 col-lg px-0 order order-pais"><span class="fw-500 fs-1 fs-lg-13"><?php _e('País', 'urbidermis'); ?> <span class="d-lg-inline fa fa-chevron-down"></span></span></div>
                                    
                                    <?php if ( !wp_is_mobile() ) : ?>
                                        <div data-value="year" class="col-lg px-0 order order-ano"><span class="fw-500 fs-1 fs-lg-13"><?php _e('Año proyecto', 'urbidermis'); ?> <span class="d-lg-inline fa fa-chevron-down"></span></span></div>
                                    <?php else : ?>
                                        <div data-value="year" class="col-3 px-0 order order-ano"><span class="fw-500 fs-1 fs-lg-13"><?php _e('Año', 'urbidermis'); ?> <span class="d-lg-inline fa fa-chevron-down"></span></span></div>
                                    <?php endif; ?>

                                    <div class="col-lg order order-producto"><span class="fw-500 fs-1 fs-lg-13"><?php _e('Producto', 'urbidermis'); ?></span></div>

                                </div>

                                <?php if ( wp_is_mobile() ) : ?>

                                    <div class="hline mt-2 mb-3"></div>

                                <?php endif; ?>

                                <?php if ( $projects_query->have_posts() ) { ?>
                                    <div class="list-wrap d-lg-flex flex-wrap">

                                        <?php while ( $projects_query->have_posts() ) {
                                            $projects_query->the_post();
                                            $pais = get_the_term_list( $projects_query->ID, 'pais' );
                                            $ciudad = get_the_term_list( $projects_query->ID, 'ciudad' );
                                            $tipologia = get_the_term_list( $projects_query->ID, 'tipo' );
                                            $producto = get_the_term_list( $projects_query->ID, 'producto' );
                                            $img = get_the_post_thumbnail( $projects_query->ID ); ?>

                                            <!-- If Desktop -->
                                            <?php if ( !wp_is_mobile() ) : ?>

                                                <a class="w-100 open-modal" href="#<?php //the_permalink(); ?>">
                                                    <?php if ( get_field('tipo_de_proyecto') == 'extendido' ) { ?>
                                                        <div class="list-project extended justify-content-between" data-tipologia="<?php echo strip_tags($tipologia); ?>" data-ciudad="<?php echo strip_tags($ciudad); ?>" data-producto="<?php echo strip_tags($producto); ?>" data-pais="<?php echo strip_tags($pais); ?>">                                  
                                                    <?php } else { ?>
                                                        <div class="list-project justify-content-between" data-tipologia="<?php echo strip_tags($tipologia); ?>" data-ciudad="<?php echo strip_tags($ciudad); ?>" data-producto="<?php echo strip_tags($producto); ?>" data-pais="<?php echo strip_tags($pais); ?>">
                                                    <?php } ?>
                                                            <p class="col Proyecto m-0 p-0"><?php the_title(); ?> <?php if ( get_field('tipo_de_proyecto') == 'extendido' ) { ?><span class="fal fa-plus-circle"></span><?php } ?></p>
                                                            <p class="col Ciudad m-0 p-0"><?php echo strip_tags($ciudad); ?></p>
                                                            <p class="col Pais m-0 p-0"><?php echo strip_tags($pais); ?></p>
                                                            <p class="col Ano m-0 p-0">1995</p>
                                                            <p class="col Producto m-0 p-0"><?php echo strip_tags($producto); ?></p>

                                                        </div>
                                                </a>

                                            <!-- If Mobile -->
                                            <?php else: ?>

                                                <a class="w-100" href="<?php the_permalink(); ?>">
                                                    <?php if ( get_field('tipo_de_proyecto') == 'extendido' ) { ?>
                                                        <div class="list-project extended justify-content-between" data-tipologia="<?php echo strip_tags($tipologia); ?>" data-ciudad="<?php echo strip_tags($ciudad); ?>" data-producto="<?php echo strip_tags($producto); ?>" data-pais="<?php echo strip_tags($pais); ?>">
                                                    <?php } else { ?>
                                                        <div class="list-project justify-content-between" data-tipologia="<?php echo strip_tags($tipologia); ?>" data-ciudad="<?php echo strip_tags($ciudad); ?>" data-producto="<?php echo strip_tags($producto); ?>" data-pais="<?php echo strip_tags($pais); ?>">
                                                    <?php } ?>
                                                            <p class="col-6 Proyecto m-0 p-0">
                                                                <?php the_title(); ?><br>
                                                                <span class="fw-500"><?php echo strip_tags($producto); ?></span>
                                                                <?php if ( get_field('tipo_de_proyecto') == 'extendido' ) { ?> <span class="fal fa-plus-circle"></span><?php } ?>
                                                            </p>
                                                            <p class="col-3 Pais m-0 p-0">
                                                                <?php echo strip_tags($pais); ?>,<br>
                                                                <span><?php echo strip_tags($ciudad); ?></span>
                                                            </p>
                                                            <p class="col-3 Ano m-0 p-0">1995</p>
                                                        
                                                        </div>
                                                </a>

                                                <div class="hline-grey my-3"></div>

                                            <?php endif; ?>

                                        <?php } ?>

                                    </div>

                                <?php } else {
                                    // no posts found
                                }
                                /* Restore original Post Data */
                                wp_reset_postdata(); ?>

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