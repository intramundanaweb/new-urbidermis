<?php

/* Template Name: Galería de proyectos */

get_header('no-margin');
?>

<?php
    // WP QUERIES AND TAXONOMIES INFO
 

    // The Query
    $args = array(
        'post_type' => 'proyecto',
        'posts_per_page' => -1
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

                <?php 
                    $full_text = get_field('texto_introduccion');
                    $replacement = '... <br><p class="view-more">Leer más</p>';
                ?>

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

                        <?php if (wp_is_mobile()) { ?>

                            <p class="fw-400 fs-11 fs-lg-14 lh-25 lh-lg-25 mb-0"><?php echo substr_replace($full_text, $replacement, 150); ?></p>

                        <?php } else { ?>

                            <p class="fw-400 fs-11 fs-lg-14 lh-25 lh-lg-25"><?php the_field('texto_introduccion'); ?></p>

                        <?php } ?>

                    </div>

                </div>                
            </div>
        </div>
    </div>
</section>

<script>
    jQuery(document).ready(function($) {
        // USAR UN PUTO ACORDEON CONYYYYYY
        $(".view-more").click(function() {
            $(".header-introduction").html('<?php the_field("texto_introduccion"); ?>' + '<p class="view-less"> Leer menos</p>')
            $(".view-less").click(function() {
                console.log('epepepepep')
                $(".header-introduction").html(<?php echo substr_replace($full_text, $replacement, 150); ?>)
            })
        })
    })
</script>

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
    <?php if(! wp_is_mobile() ) : ?>
        <div class="wrapper">
    <?php endif; ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 px-0 px-lg-3">

                    <!-- UPPER MENU -->
                    <div class="upper-menu col-12 d-flex justify-content-between mt-5 mb-3 px-4 px-lg-0">

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

                    <div class="active-filters w-100 d-flex flex-wrap justify-content-end d-lg-none px-4"></div>

                    <?php if( wp_is_mobile() ) : ?>
                        <div class="px-4">
                            <input type="range" min="1" max="100" value="0" class="range mt-3 mb-4 bg-black w-100 p-0"></input>
                        </div>
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
                        $counter_grid = 1; ?>
                        <div class="grid-flex container-fluid p-0">
                            <div class="row grid-row">
                                <?php while ( $projects_query->have_posts() ) {
                                    $projects_query->the_post();
                                    $id = get_the_ID();
                                    $pais = get_the_term_list( $projects_query->ID, 'pais' );
                                    $ciudad = get_the_term_list( $projects_query->ID, 'ciudad' );
                                    $tipologia = get_the_term_list( $projects_query->ID, 'tipo' );
                                    $producto = get_the_term_list( $projects_query->ID, 'producto' ); ?>

                                    <div class="grid-project-wrap col-12 col-lg-2">
                                        
                                        <?php if (( get_field('tipo_de_proyecto') == 'extendido' ) && wp_is_mobile()) { ?>
                                            <div class="background-wrap bg-blue-light">
                                            <a class="d-block project-<?php echo $counter_grid; ?> p-4 grid-project-wrap-link" href="#">
                                        <?php } else { ?>
                                            <a class="d-block project-<?php echo $counter_grid; ?> p-4" href="#">
                                        <?php } ?>
                                                <div class="grid-project flex-column" data-pais="<?php echo strip_tags($pais); ?>" data-ciudad="<?php echo strip_tags($ciudad); ?>" data-tipologia="<?php echo strip_tags($tipologia); ?>" data-producto="<?php echo strip_tags($producto); ?>">
                                                    <div class="image-wrap">
                                                        <?php img_with_alt_featured(); ?>
                                                    </div>
                                                    <?php if ( get_field('tipo_de_proyecto') == 'extendido' ) { ?>
                                                        <div class="project-title extended mt-2 px-2">
                                                        <p class="d-inline-block mb-0 mb-lg-0 fw-500 fs-11 fs-lg-12"><?php the_title(); ?> <span class="fal fa-plus-circle"></span></p>
                                                        
                                                    <?php } else { ?>
                                                        <div class="project-title pt-2 pt-lg-2">
                                                        <p class="d-inline-block mb-0 mb-lg-0 fw-500 fs-11 fs-lg-12"><?php the_title(); ?></p>
                                                    <?php } ?>
                                                        
                                                    </div>
                                                </div>
                                        
                                            </a>
                                        <?php if (( get_field('tipo_de_proyecto') == 'extendido' ) && wp_is_mobile()) { ?>
                                            </div>
                                        <?php } ?>
                                    </div>

                                    <!-- Section modal -->
                                    <section class="section-modal modal-<?php echo $counter_grid; ?> bg-beige-light height-200">
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
                                                            
                                                                <div class="d-flex position-relative">
                                                                    <div class="ml-auto">
                                                                        <span class="close-modal-<?php echo $counter_grid; ?> fal fa-chevron-left"></span>
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

                                                                <div class="slick-project-modal-grid-mobile mt-4 mb-5">

                                                                    <?php
                                                                        if( have_rows('slider_fotos_proyecto') ):
                                                                            $counter_slide_mobile =1;
                                                                        while ( have_rows('slider_fotos_proyecto') ) : the_row();
                                                                    ?>

                                                                    <div class="position-relative">
                                                                        <?php img_with_alt_lazy_sub('foto_proyecto'); ?>
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
                                                                        <span class="fal fa-times close-modal-<?php echo $counter_grid; ?>"></span>
                                                                    </div>
                                                                </div>

                                                                <div class="project-info position-absolute">
                                                                    <p class="fw-500 mb-lg-2"><?php _e('Información', 'urbidermis'); ?></p>
                                                                    <p class="m-lg-0"><?php the_field('localizacion_concreta'); ?></p>
                                                                    <p class="m-lg-0"><?php the_field('ciudad_pais'); ?></p>
                                                                    <p class="m-lg-0"><?php the_field('ano'); ?></p>
                                                                    <p class="m-lg-0"><?php the_field('centro'); ?></p>
                                                                    <p class="fw-500 mb-lg-2 mt-lg-3"><?php _e('Productos', 'urbidermis'); ?></p>
                                                                    <!--<p class="m-lg-0 w-50"><?php //the_field('productos'); ?></p>-->
                                                                    <p class="m-lg-0 w-50">
                                                                        <?php if (have_rows('productos_proyecto')) { ?>
                                                                            
                                                                            <?php while ( have_rows('productos_proyecto') ) { the_row(); ?>

                                                                                <?php 
                                                                                    $link = get_field('producto_proyecto');
                                                                                    console_log($link);
                                                                                    if( $link ): 
                                                                                        $link_url = $link['url'];
                                                                                        $link_title = $link['title'];
                                                                                        $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                                                                        <a class="button btn-round" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                                                                <?php endif; ?>

                                                                            <?php } ?>

                                                                        <?php } ?>
                                                                    </p>
                                                                </div>

                                                                <div class="slick-project-modal-grid">

                                                                    <?php
                                                                        if( have_rows('slider_fotos_proyecto') ):
                                                                            $counter_slide =1;
                                                                        while ( have_rows('slider_fotos_proyecto') ) : the_row();
                                                                    ?>

                                                                    <div class="position-relative">
                                                                        <?php img_with_alt_lazy_sub('foto_proyecto'); ?>
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

                                            $(".project-<?php echo $counter_grid; ?>").click(function() {
                                                $(".modal-<?php echo $counter_grid; ?>").toggle('slide', { direction: 'left'}, 500)
                                                $(".slick-project-modal-grid").slick('refresh')
                                                $(".slick-project-modal-grid-mobile").slick('refresh')
                                            })

                                            $(".close-modal-<?php echo $counter_grid; ?>").click(function(e) {
                                                e.preventDefault()
                                                $(".modal-<?php echo $counter_grid; ?>").toggle('slide', {direction: 'left'}, 500)
                                            })
                                        })
                                    </script>

                                <?php $counter_grid++; } ?>

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

                                <div class="list-menu d-lg-flex w-lg-100 p-4 px-lg-0 border-bottom border-dark">
                                        
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

                                <?php if ( $projects_query->have_posts() ) {
                                    $counter_list =1; ?>
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

                                                <a class="w-100 project" href="#<?php //the_permalink(); ?>">
                                                    <?php if ( get_field('tipo_de_proyecto') == 'extendido' ) { ?>
                                                        <div class="list-project py-lg-3 project-list-<?php echo $counter_list; ?> extended justify-content-between" data-tipologia="<?php echo strip_tags($tipologia); ?>" data-ciudad="<?php echo strip_tags($ciudad); ?>" data-producto="<?php echo strip_tags($producto); ?>" data-pais="<?php echo strip_tags($pais); ?>">                                  
                                                    <?php } else { ?>
                                                        <div class="list-project py-lg-3 project-list-<?php echo $counter_list; ?> justify-content-between" data-tipologia="<?php echo strip_tags($tipologia); ?>" data-ciudad="<?php echo strip_tags($ciudad); ?>" data-producto="<?php echo strip_tags($producto); ?>" data-pais="<?php echo strip_tags($pais); ?>">
                                                    <?php } ?>
                                                            <p class="col Proyecto m-0 p-0"><?php the_title(); ?> <?php if ( get_field('tipo_de_proyecto') == 'extendido' ) { ?><span class="fal fa-plus-circle"></span><?php } ?></p>
                                                            <p class="col Ciudad m-0 p-0"><?php echo strip_tags($ciudad); ?></p>
                                                            <p class="col Pais m-0 p-0"><?php echo strip_tags($pais); ?></p>
                                                            <p class="col Ano m-0 p-0"><?php the_field('ano'); ?></p>
                                                            <p class="col Producto m-0 p-0">
                                                                <?php
                                                                    $productos = preg_split('/(?=[A-Z])/', strip_tags($producto));
                                                                    for ($i = 1; $i < count($productos); $i++) {
                                                                        echo $productos[$i];
                                                                        if ($i < count($productos) - 1) echo ', ';
                                                                    }
                                                                ?>
                                                            </p>

                                                        </div>
                                                </a>

                                            <!-- If Mobile -->
                                            <?php else: ?>

                                                <?php if ( get_field('tipo_de_proyecto') == 'extendido' ) { ?>
                                                    <a class="w-100 p-4 border-bottom border-dark d-block extended" href="#<?php //the_permalink(); ?>">
                                                <?php } else { ?>
                                                    <a class="w-100 p-4 border-bottom border-dark d-block" href="#<?php //the_permalink(); ?>">
                                                <?php } ?>
                                                    <div class="list-project project-list-<?php echo $counter_list; ?> justify-content-between" data-tipologia="<?php echo strip_tags($tipologia); ?>" data-ciudad="<?php echo strip_tags($ciudad); ?>" data-producto="<?php echo strip_tags($producto); ?>" data-pais="<?php echo strip_tags($pais); ?>">
                                                
                                                        <p class="col-6 Proyecto m-0 p-0">
                                                            <?php the_title(); ?><br>
                                                            <span class="fw-500"><?php echo strip_tags($producto); ?></span>
                                                            <?php if ( get_field('tipo_de_proyecto') == 'extendido' ) { ?> <span class="fal fa-plus-circle"></span><?php } ?>
                                                        </p>
                                                        <p class="col-3 Pais m-0 p-0">
                                                            <?php echo strip_tags($pais); ?>,<br>
                                                            <span><?php echo strip_tags($ciudad); ?></span>
                                                        </p>
                                                        <p class="col-3 Ano m-0 p-0"><?php the_field('ano'); ?></p>
                                                    
                                                    </div>
                                                </a>

                                            <?php endif; ?>

                                            <!-- Section modal -->
                                            <section class="section-modal modal-list-<?php echo $counter_list; ?> bg-beige-light height-200">
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
                                                                    
                                                                        <div class="d-flex position-relative">
                                                                            <div class="ml-auto">
                                                                                <span class="close-modal-list-<?php echo $counter_list; ?> fal fa-chevron-left"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <p class="fs-l"><?php the_title(); ?></p>
                                                                            <span class="m-lg-0 fs-m"><?php the_field('ciudad_pais'); ?></span>
                                                                            <span class="m-lg-0 fs-m"><?php the_field('ano'); ?></span>
                                                                            <p class="m-lg-0 fs-m"><?php the_field('autor'); ?></p>
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

                                                                        <div class="slick-project-modal-list-mobile mt-4 mb-5">

                                                                            <?php
                                                                                if( have_rows('slider_fotos_proyecto') ):
                                                                                    $counter_slide_mobile =1;
                                                                                while ( have_rows('slider_fotos_proyecto') ) : the_row();
                                                                            ?>

                                                                            <div class="position-relative">
                                                                                <?php img_with_alt_lazy_sub('foto_proyecto'); ?>
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
                                                                                <span class="fal fa-times close-modal-list-<?php echo $counter_list; ?>"></span>
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

                                                                        <div class="slick-project-modal-list">

                                                                            <?php
                                                                                if( have_rows('slider_fotos_proyecto') ):
                                                                                    $counter_slide =1;
                                                                                while ( have_rows('slider_fotos_proyecto') ) : the_row();
                                                                            ?>

                                                                            <div class="position-relative">
                                                                                <?php img_with_alt_lazy_sub('foto_proyecto'); ?>
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
                                                    
                                                    $(".project-list-<?php echo $counter_list; ?>").click(function() {
                                                        $(".modal-list-<?php echo $counter_list; ?>").toggle('slide', { direction: 'left'}, 500)
                                                        $('.slick-project-modal-list').slick('refresh')
                                                        $(".slick-project-modal-list-mobile").slick('refresh')
                                                    })
                                                    
                                                    $(".close-modal-list-<?php echo $counter_list; ?>").click(function(e) {
                                                        e.preventDefault()
                                                        $(".modal-list-<?php echo $counter_list; ?>").toggle('slide', {direction: 'left'}, 500)
                                                        
                                                    })
                                                })
                                            </script>

                                        <?php $counter_list++; } ?>

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
    <?php if(! wp_is_mobile() ) : ?>
        </div>
    <?php endif; ?>
</section>

<script>
    jQuery(document).ready(function($) {
        if (!window.mobileCheck()) {
            $(".section-modal").css('overflow-y', 'inherit')
        }
    })
</script>

<?php
get_footer();