<?php

/* Template Name: Projects-new */

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

    $categorias = get_terms( array(
        'taxonomy' => 'Categoria de producto',
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
                                'fs-lg-l'
                            )
                        ?>
                    </div>

                    <div class="header-introduction col-12 col-lg-6">
                        <p class="fw-400 fs-11 fs-lg-xxs lh-25 lh-lg-28"><?php the_field("texto_introduccion"); ?></p>
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
                <option>Pa??s</option>
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

<!-- Section switch - active filters - filter label -->
<section>
    <div class="wrapper bg-beige-light">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- UPPER MENU -->
                    <div class="upper-menu col-12 d-flex justify-content-between mt-5 mb-3 my-lg-4">

                        <!-- SWITCH BUTTON -->
                        <div class="switch-wrapper d-flex d-lg-flex">
                            <span class="switch-imagen fw-400 fs-11 fs-lg-xxs"><?php _e('Im??genes', 'urbidermis'); ?></span>
                            <span class="switch-wrap">
                                <label class="switch mx-2 mx-lg-2 mb-0 position-relative d-inline-block">
                                    <input name="view-switch" type="checkbox">
                                    <span class="slider position-absolute"></span>
                                </label>
                            </span>
                            <span class="switch-lista fw-400 fs-11 fs-lg-xxs"><?php _e('Lista', 'urbidermis'); ?></span>
                        </div>

                        <!-- ACTIVE FILTERS -->
                        <div class="active-filters-wrap d-lg-flex flex-wrap">
                            <div class="active-filters">
                            </div>
                        </div>
                        

                        <!-- FILTER LABEL -->
                        <div class="filter-label">
                            <button class="fw-400 fs-11 fs-lg-xxs border-0 p-lg-0" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><?php _e('Filtrar', 'urbidermis'); ?> <span class="fa fa-chevron-down"></span></button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    

<!-- Section filter -->
<?php if(! wp_is_mobile() ) : ?>
    
    <div class="collapse filter-wrap bg-beige-light" id="collapseExample">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 filter-content d-lg-flex justify-content-between py-lg-4">
                        
                        <div class="filter-category-wrap">
                            <p>Pa??s</p>

                            <div class="filter-category-content pais">
                                <?php foreach($paises as $pais) { ?>    
                                    <p class="mb-lg-0 item"><?php echo $pais->name; ?></p>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="filter-category-wrap">
                            <p>Ciudad</p>

                            <div class="filter-category-content ciudad">
                                <?php foreach($ciudades as $ciudad) { ?>    
                                    <p class="mb-lg-0 item"><?php echo $ciudad->name; ?></p>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="filter-category-wrap">
                            <p>Categor??a de producto</p>

                            <div class="filter-category-content categoria">
                                <?php foreach($categorias as $categoria) { ?>    
                                    <p class="mb-lg-0 item"><?php echo $categoria->name; ?></p>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="filter-category-wrap">
                            <p>Producto</p>

                            <div class="filter-category-content producto">
                                <?php foreach($productos as $producto) { ?>    
                                    <p class="mb-lg-0 item"><?php echo $producto->name; ?></p>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="filter-category-wrap">
                            <p>Tipolog??a de proyecto</p>

                            <div class="filter-category-content tipologia">
                                <?php foreach($tipologias as $tipologia) { ?>    
                                    <p class="mb-lg-0 item"><?php echo $tipologia->name; ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
               
<?php endif; ?>


<!-- Section grid -->
<section class="section-grid">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!--ANTIC<div class="active-filters w-100 d-flex flex-wrap justify-content-end d-lg-none"></div>-->

                    <?php if( wp_is_mobile() ) : ?>
                        <input type="range" min="1" max="100" value="0" class="range mt-3 mb-4 bg-black w-100 p-0"></input>
                    <?php endif; ?>

                    <!-- GRID -->
                    <?php if ( $projects_query->have_posts() ) { ?>
                        <div class="grid-flex container-fluid p-0">
                            <div class="row grid-row">

                                <?php while ( $projects_query->have_posts() ) {

                                    $projects_query->the_post();
                                    $pais = get_the_term_list( $projects_query->ID, 'pais' );
                                    $ciudad = get_the_term_list( $projects_query->ID, 'ciudad' );
                                    $categoria = get_the_term_list( $projects_query->ID, 'Categoria de producto' );
                                    $tipologia = get_the_term_list( $projects_query->ID, 'tipo' );
                                    $producto = get_the_term_list( $projects_query->ID, 'producto' ); ?>
                                    
                                    <div class="grid-project-wrap col-12 col-lg-2">
                                        <a class="d-block p-3" href="<?php the_permalink(); ?>">
                                            <div class="grid-project flex-column" data-pais="<?php echo strip_tags($pais); ?>" data-ciudad="<?php echo strip_tags($ciudad); ?>" data-categoria="<?php echo strip_tags($categoria); ?>"  data-tipologia="<?php echo strip_tags($tipologia); ?>" data-producto="<?php echo strip_tags($producto); ?>">
                                                <div class="image-wrap">
                                                    <?php img_with_alt_featured(); ?>
                                                </div>
                                                <div class="project-title pt-2 pt-lg-2">
                                                    <p class="d-inline-block mb-2 mb-lg-0 fw-500 fs-11 fs-lg-12"><?php the_title(); ?></p>
                                                    <!--<span class="fal fa-plus-circle"></span>-->
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                <?php } ?>

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
                                    <div data-value="country" class="col-3 col-lg px-0 order order-pais"><span class="fw-500 fs-1 fs-lg-13"><?php _e('Pa??s', 'urbidermis'); ?> <span class="d-lg-inline fa fa-chevron-down"></span></span></div>
                                    
                                    <?php if ( !wp_is_mobile() ) : ?>
                                        <div data-value="year" class="col-lg px-0 order order-ano"><span class="fw-500 fs-1 fs-lg-13"><?php _e('A??o proyecto', 'urbidermis'); ?> <span class="d-lg-inline fa fa-chevron-down"></span></span></div>
                                    <?php else : ?>
                                        <div data-value="year" class="col-3 px-0 order order-ano"><span class="fw-500 fs-1 fs-lg-13"><?php _e('A??o', 'urbidermis'); ?> <span class="d-lg-inline fa fa-chevron-down"></span></span></div>
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

                                                <a class="w-100" href="<?php the_permalink(); ?>">
                                                    <div class="list-project justify-content-between" data-tipologia="<?php echo strip_tags($tipologia); ?>" data-ciudad="<?php echo strip_tags($ciudad); ?>" data-producto="<?php echo strip_tags($producto); ?>" data-pais="<?php echo strip_tags($pais); ?>">
                                                        
                                                        <p class="col Proyecto m-0 p-0"><?php the_title(); ?></p>
                                                        <p class="col Ciudad m-0 p-0"><?php echo strip_tags($ciudad); ?></p>
                                                        <p class="col Pais m-0 p-0"><?php echo strip_tags($pais); ?></p>
                                                        <p class="col Ano m-0 p-0">1995</p>
                                                        <p class="col Producto m-0 p-0"><?php echo strip_tags($producto); ?></p>

                                                    </div>
                                                </a>

                                            <!-- If Mobile -->
                                            <?php else: ?>

                                                <a class="w-100" href="<?php the_permalink(); ?>">
                                                    <div class="list-project justify-content-between" data-tipologia="<?php echo strip_tags($tipologia); ?>" data-ciudad="<?php echo strip_tags($ciudad); ?>" data-producto="<?php echo strip_tags($producto); ?>" data-pais="<?php echo strip_tags($pais); ?>">
                                                        
                                                        <p class="col-6 Proyecto m-0 p-0">
                                                            <?php the_title(); ?><br>
                                                            <span class="fw-500"><?php echo strip_tags($producto); ?></span>
                                                            <!--<span class="fal fa-plus-circle"></span>-->
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