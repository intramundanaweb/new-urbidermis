<?php

/* Template Name: Autores */

get_header('no-margin');
?>

<?php 

    $args_autor = array(
        'post_type' => 'autor',
    );

    $autors_query = new WP_Query( $args_autor );

    $autors_ids = array();

    if ($autors_query->have_posts()) {
        while ($autors_query->have_posts()) {
            $autors_query->the_post();
            array_push($autors_ids, get_the_ID());
        }
    }

    console_log($autors_ids);

    $args_article = array(
        'post_type' => 'post',
        'author__in' => $autors_ids,
        'orderby' => 'rand'
    );

    $articles_query = new WP_Query($args_article);

?>

?>

<div style="height: 110px;"></div><!-- incloent la barra de wp amunt -->

<!-- Section header -->
<section>
    <div class="wrapper header bg-beige-light" style="border-bottom: 1px solid black;">
        <div class="container-fluid">
            <div class="row py-lg-5">
                <div class="col-12 d-lg-flex">

                    <div class="col-12 col-lg-6 px-lg-0">
                        <?php
                            display_tag(
                                'titulo_introduccion',
                                'etiqueta_titulo',
                                'texto_titulo',
                                'fs-lg-375'
                            )
                        ?>
                    </div>

                    <div class="col-12 col-lg-6">
                        <p class="fw-400 fs-11 fs-lg-14 lh-25"><?php the_field("texto_introduccion"); ?></p>
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
            <div class="row py-lg-5">
                <div class="col-12 d-lg-flex flex-wrap">

                <?php if ( $autors_query->have_posts() ) { ?>

                    <?php while ( $autors_query->have_posts() ) {
                        
                        $autors_query->the_post();
                        $tipo_autor = get_the_term_list( $autors_query->ID, 'tipo-autor' ); ?>
                    
                    <a class="autor col-lg-3" href="<?php the_permalink(); ?>">
                        <div class="d-flex flex-column">

                            <div class="img-wrap-autor">
                                <?php img_with_alt_featured(); ?>
                            </div>

                            <div class="autor-info py-lg-3">
                                <p class="text-center"><?php the_title(); ?></p>
                                <p class="text-center"><?php echo strip_tags($tipo_autor); ?></p>
                            </div>

                        </div>
                    </a>
                        

                    <?php } ?>

                <?php } else {
                    // no posts found
                }
                /* Restore original Post Data */
                wp_reset_postdata(); ?>                    

                </div>                
            </div>
        </div>
    </div>
</section>

<!-- Section BIG TITLE -->
<section>
    <div class="wrapper p-lg-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 bg-green py-5 text-center">
                    <?php
                        display_tag(
                            'titulo_articulos',
                            'etiqueta_titulo',
                            'texto_titulo',
                            'fs-lg-375 w-25 d-block m-lg-auto'
                        )
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section articles -->
<section>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row py-5">
                <div class="col-12 d-lg-flex flex-lg-column">

                    <div class="header-introduction">
                        <p class="fw-400 fs-11 fs-lg-14 lh-25 lh-lg-25"><?php the_field("texto_articulos"); ?></p>
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 ">

                                <div class="slick-autors py-lg-5 d-lg-flex justify-content-between">

                                    <?php if ($articles_query->have_posts() ) {
                                        while ($articles_query->have_posts() ) {
                                            $articles_query->the_post(); ?>
                                        
                                            
                                        

                                            <div class="slick-autor col-lg-3 d-lg-flex flex-lg-column">
                                                <div class="slick-autor-header p-lg-3 border border-dark">
                                                    <p class="fs-lg-15 text-center"><?php the_title(); ?></p>
                                                </div>
                                                <div class="slick-autor-content p-lg-3 border border-dark">
                                                    <p class="fs-lg-12">Artículo - 12 min</p>
                                                    <p class="tags fs-lg-15">#urbanidad #ciudad #edificios #suspensión #instalación #espacios</p>
                                                </div>
                                            </div>

                                        <?php } ?>
                                    <?php } else {
                                        // no posts found
                                    }
                                    /* Restore original Post Data */
                                    wp_reset_postdata(); ?>

                                </div>

                                <div class="slick-arrows-autors position-absolute d-flex justify-content-between p-4">
                                    <span id="slick-autors-left" class="fal fa-chevron-left"></span>
                                    <span id="slick-autors-right" class="fal fa-chevron-right"></span>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div>
                        <button class="btn-round"><?php the_field('texto_boton'); ?></button>
                    </div>

                </div>                
            </div>
        </div>
    </div>
</section>




<?php
get_footer();