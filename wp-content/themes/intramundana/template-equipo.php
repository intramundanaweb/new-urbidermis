<?php

/* Template Name: Equipo */

get_header('no-margin');
?>


<?php 

    $args_urbi = array(
        'post_type' => 'equipo',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'Empresa',
                'field'    => 'id',
                'terms'    => '156',
            ),
        ),
    );
    $equipo_urbidermis = new WP_Query( $args_urbi );

    $args_belloch = array(
        'post_type' => 'equipo',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'Empresa',
                'field'    => 'id',
                'terms'    => '158',
            ),
        ),
    );
    $equipo_belloch = new WP_Query( $args_belloch );

    $args_externos = array(
        'post_type' => 'equipo',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'Empresa',
                'field'    => 'id',
                'terms'    => '160',
            ),
        ),
    );
    $equipo_externo = new WP_Query( $args_externos );

    $args = array(
        'post_type' => 'post'
    );
    $articles_query = new WP_Query($args);

?>



<!-- Section header -->
<section class="equipo-section-header">
    <div class="wrapper header bg-beige-light mb-lg-0">
        <div class="container-fluid">
            <div class="row py-lg-5">
                <div class="equipo-header-wrap col-12 d-lg-flex">

                    <div class="col-12 col-lg-6 px-0 px-lg-0">
                        <?php
                            display_tag(
                                'titulo_introduccion',
                                'etiqueta_titulo',
                                'texto_titulo',
                                'fs-l fs-lg-l'
                            )
                        ?>
                    </div>

                    <div class="col-12 px-0 col-lg-6 ovy-lg-scroll">
                        <p class="fs-xxs fs-lg-xxs lh-25 mt-4 mt-lg-0"><?php the_field("parrafo_introduccion_1"); ?></p>
                        <p class="fs-xxs fs-lg-xxs lh-25 mb-5 mb-lg-0 mt-lg-0"><?php the_field("parrafo_introduccion_2"); ?></p>
                    </div>

                </div>                
            </div>
        </div>
    </div>
</section>

<!-- Section grid -->
<section>
    <div class="wrapper py-5 py-lg-5">
        <div class="container-fluid">
            <div class="row">
                
                <!-- EQUIPO URBIDERMIS -->
                <div class="col-12 pb-lg-5">
                    <?php
                        $term = get_term(156); //Example term ID
                        $empresa = $term->name; //gets term name
                    ?>

                    <p class="fs-13 mb-0">Equipo de <?php echo strip_tags($empresa); ?></p>
                </div>

                <?php if ( $equipo_urbidermis->have_posts() ) {

                    $miembro_counter = 1;

                    while ( $equipo_urbidermis->have_posts() ) {
                        
                        $equipo_urbidermis->the_post();
                        $especializacion = get_the_term_list( $equipo_urbidermis->ID, 'Especialización' ); ?>
                    
                        <div class="miembro miembro-<?php echo $miembro_counter; ?> col-6 col-lg-3 d-flex flex-column cursor-pointer">
                            <div class="img-wrap-miembro">
                                <?php img_with_alt_featured(); ?>
                            </div>

                            <div class="miembro-info p-1 p-lg-3">
                                <p class="text-center fs-1 fw-500 mb-0"><?php the_title(); ?></p>
                                <p class="text-center fs-1 mb-0"><?php echo strip_tags($especializacion); ?></p>
                            </div>
                        </div>

                        <div class="modal-miembro modal-miembro-<?php echo $miembro_counter; ?> position-fixed bg-beige w-100 <?php if (!wp_is_mobile()) echo 'w-50'; ?> height-200">
                            <div class="wrapper h-100">
                                <div class="container-fluid h-100">
                                    <div class="py-5 py-lg-5 d-lg-flex flex-lg-column h-100">

                                        <div class="d-flex position-relative">
                                            <div class="ml-auto">
                                                <span class="close-miembro-modal close-miembro-modal-<?php echo $miembro_counter; ?> fal fa-times fs-xs cursor-pointer"></span>
                                            </div>
                                        </div>

                                        <div>
                                            <p class="fs-l mb-lg-0"><?php the_title(); ?></p>
                                        </div>

                                        <div>
                                            <p class="especializacion mb-0 mt-2 mt-lg-0 m-lg-0"><?php echo $especializacion; ?></p>
                                        </div>

                                        <div class="w-100 w-lg-75 px-0 pt-5 pb-4 pb-lg-0">
                                            <p class="fw-400 fs-xxs fs-lg-11 lh-25"><?php the_field("descripcion_miembro_1"); ?></p>
                                            <p class="fw-400 fs-xxs fs-lg-11 lh-25 mb-0"><?php the_field("descripcion_miembro_2"); ?></p>
                                        </div>

                                        <div>
                                            <p class="fs-xxs fs-lg-11 lh-25 mb-0">Conecta con <?php the_title(); ?> a través de <span class="fab fa-linkedin-in"></span></p>
                                        </div>

                                        <div class="py-5 w-100">
                                            <p class="leer-articulos-miembro-<?php echo $miembro_counter; ?> btn btn-round mr-lg-3 d-lg-inline mx-auto">Leer artículos</p>
                                            <p class="ver-proyectos-miembro-<?php echo $miembro_counter; ?> btn btn-round d-lg-inline mx-auto">Ver proyectos en los que ha participado</p>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="sub-modal-articulos sub-modal-articulos-<?php echo $miembro_counter; ?> position-fixed bg-beige <?php if (!wp_is_mobile()) echo 'w-50'; ?> height-200">
                            <div class="wrapper h-100">
                                <div class="container-fluid h-100">
                                    <div class="w-100 py-5 py-lg-5 d-flex flex-column">

                                        <div class="d-flex position-relative">
                                            <div class="ml-auto">
                                                <span class="close-sub-modal-articulos-<?php echo $miembro_counter; ?> fal fa-chevron-right fs-xs cursor-pointer"></span>
                                            </div>
                                        </div>

                                        <div>
                                            <p class="fs-21 lh-40 mb-0">Artículos<br>de <?php the_title(); ?></p>
                                            <p class="especializacion mb-0 mt-2 mt-lg-0 m-lg-0"><?php echo $especializacion; ?></p>
                                        </div>

                                        <?php

                                            $args_article = array(
                                                'post_type' => 'post',
                                                'orderby' => 'rand',
                                                'meta_query' => array(
                                                    array(
                                                        'key' => 'miembro_escritor',
                                                        'value' => 725,
                                                        'compare' => '='
                                                    )
                                                )
                                            );

                                            $articles_query = new WP_Query($args_article);

                                        ?>

                                        <div class="row ovy-scroll">

                                            <?php if ($articles_query->have_posts()) : 
                                                while ($articles_query->have_posts()) : $articles_query->the_post(); ?>

                                                    <div class="mt-4 col-6 d-flex flex-column">
                                                        <div class="miembro-article-box-shadow">
                                                            <div class="miembro-article-top p-2">
                                                                <p class="fs-xxs mb-0"><?php the_title(); ?></p>  
                                                            </div>
                                                            <div class="miembro-article-bottom">
                                                                <?php img_with_alt_featured(); ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php endwhile; endif; ?>
                                        </div>

                                        <?php if (!wp_is_mobile()) { ?>
                                            <div>
                                                <p>Leer más artículos</p>
                                            </div>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="sub-modal-proyectos sub-modal-proyectos-<?php echo $miembro_counter; ?> position-fixed bg-beige <?php if (!wp_is_mobile()) echo 'w-50'; ?> height-200">
                            <div class="wrapper h-100">
                                <div class="container-fluid h-100">
                                    <div class="w-100 py-5 py-lg-5 d-flex flex-column">

                                        <div class="d-flex position-relative">
                                            <div class="ml-auto">
                                                <span class="close-sub-modal-proyectos-<?php echo $miembro_counter; ?> fal fa-chevron-right fs-xs cursor-pointer"></span>
                                            </div>
                                        </div>

                                        <div>
                                            <p class="fs-21 lh-40 mb-0">Proyectos<br>de <?php the_title(); ?></p>
                                            <p class="especializacion mb-0 mt-2 mt-lg-0 m-lg-0"><?php echo $especializacion; ?></p>
                                        </div>

                                        <?php

                                            $args_proyecto = array(
                                                'post_type' => 'proyecto',
                                                'orderby' => 'rand',
                                                'meta_query' => array(
                                                    array(
                                                        'key' => 'miembros_colaboradores_$_miembro_colaborador',
                                                        'value' => 725,
                                                        'compare' => '='
                                                   )
                                                )
                                            );

                                            $proyectos_query = new WP_Query($args_proyecto);

                                        ?>

                                        <div class="row ovy-scroll">

                                            <?php if ($proyectos_query->have_posts()) : 
                                                while ($proyectos_query->have_posts()) : $proyectos_query->the_post(); ?>

                                                    <div class="mt-4 col-6 d-flex flex-column">
                                                        <div class="miembro-proyecto-bottom">
                                                            <?php img_with_alt_featured(); ?>
                                                        </div>
                                                        <div class="miembro-proyecto-top p-2">
                                                            <p class="fs-xxs fw-500 mb-0"><?php the_title(); ?></p>
                                                            <p class="fs-xxs mb-0">"Tipologia"</p> 
                                                        </div>
                                                        
                                                    </div>

                                                <?php endwhile; endif; ?>
                                        </div>

                                        <?php if (!wp_is_mobile()) { ?>
                                            <div>
                                                <p>Ver más proyectos</p>
                                            </div>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>

                            jQuery(document).ready(function ($) {

                                $(".miembro-<?php echo $miembro_counter; ?>").click(function() {
                                    $(".modal-miembro-<?php echo $miembro_counter; ?>").show('slide', {direction: 'right'}, 500)
                                })
                                $(".close-miembro-modal-<?php echo $miembro_counter; ?>").click(function() {
                                    $(".modal-miembro-<?php echo $miembro_counter; ?>").hide('slide', {direction: 'right'}, 500)
                                })

                                $(".leer-articulos-miembro-<?php echo $miembro_counter; ?>").click(function() {
                                    $(".sub-modal-articulos-<?php echo $miembro_counter; ?>").show('slide', {direction: 'right'}, 500)
                                })
                                $(".close-sub-modal-articulos-<?php echo $miembro_counter; ?>").click(function() {
                                    $(".sub-modal-articulos-<?php echo $miembro_counter; ?>").hide('slide', {direction: 'right'}, 500)
                                })

                                $(".ver-proyectos-miembro-<?php echo $miembro_counter; ?>").click(function() {
                                    $(".sub-modal-proyectos-<?php echo $miembro_counter; ?>").show('slide', {direction: 'right'}, 500)
                                })
                                $(".close-sub-modal-proyectos-<?php echo $miembro_counter; ?>").click(function() {
                                    $(".sub-modal-proyectos-<?php echo $miembro_counter; ?>").hide('slide', {direction: 'right'}, 500)
                                })

                            })

                        </script>

                    <?php $miembro_counter ++; } ?>

                <?php } else {
                // no posts found
                }
                wp_reset_postdata(); ?>
            
                <!-- EQUIPO BELLOCH -->
                <div class="col-12 pb-lg-5">
                    <?php
                        $term = get_term(158); //Example term ID
                        $empresa = $term->name; //gets term name
                    ?>

                    <p class="fs-13 pt-5 mb-0">Equipo de <?php echo strip_tags($empresa); ?></p>
                </div> 
                    
                <?php if ( $equipo_belloch->have_posts() ) {

                    while ( $equipo_belloch->have_posts() ) {
                        
                        $equipo_belloch->the_post();
                        $especializacion = get_the_term_list( $equipo_belloch->ID, 'Especialización' );
                    ?>
                    
                    <div class="miembro col-6 col-lg-3 d-flex flex-column cursor-pointer">
                        <a href="<?php the_permalink(); ?>">

                            <div class="img-wrap-miembro">
                                <?php img_with_alt_featured(); ?>
                            </div>

                            <div class="miembro-info p-1 p-lg-3">
                                <p class="text-center fs-1 fw-500 mb-0"><?php the_title(); ?></p>
                                <p class="text-center fs-1 mb-0"><?php echo strip_tags($especializacion); ?></p>
                            </div>

                        </a>
                    </div>

                <?php } ?>

                <?php } else {
                // no posts found
                }
                wp_reset_postdata(); ?>
                
                <!-- EQUIPO EXTERNO -->
                <div class="col-12 pb-lg-5">
                    <?php
                        $term = get_term(160); //Example term ID
                        $empresa = $term->name; //gets term name
                    ?>

                    <p class="fs-13 pt-5 mb-0"><?php echo strip_tags($empresa); ?></p>
                </div>

                <?php if ( $equipo_externo->have_posts() ) {

                    while ( $equipo_externo->have_posts() ) {
                        
                        $equipo_externo->the_post();
                        $especializacion = get_the_term_list( $equipo_externo->ID, 'Especialización' );
                    ?>
                    
                    <div class="miembro col-6 col-lg-3 d-flex flex-column cursor-pointer">
                        <a href="<?php the_permalink(); ?>">

                            <div class="img-wrap-miembro">
                                <?php img_with_alt_featured(); ?>
                            </div>

                            <div class="miembro-info p-1 p-lg-3">
                                <p class="text-center fs-1 fw-500 mb-0"><?php the_title(); ?></p>
                                <p class="text-center fs-1 mb-0"><?php echo strip_tags($especializacion); ?></p>
                            </div>

                        </a>
                    </div>

                <?php } ?>

                <?php } else {
                // no posts found
                }
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
                <div class="equipo-big-title-wrap col-12 bg-green text-center">
                    <?php
                        display_tag(
                            'big_title',
                            'etiqueta_big_title',
                            'texto_big_title',
                            'equipo-big-title w-lg-25 fs-37 fs-lg-5 d-block m-auto m-lg-auto'
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
                        <p class="fw-400 mb-0 fs-14 fs-lg-m lh-25 lh-lg-25"><?php the_field("subtexto_articulos"); ?></p>
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 px-0 pr-0 pr-lg-3">

                                <div class="slick-equipo py-lg-5">

                                    <?php if ($articles_query->have_posts() ) {
                                        while ($articles_query->have_posts() ) {
                                            $articles_query->the_post(); ?>
                                        
                                            <div class="slick-miembro mr-3 mr-lg-0">

                                                <div class="slick-miembro-header p-3 p-lg-3 border border-dark">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <p class="fs-s fs-lg-s fw-400"><?php the_title(); ?></p>
                                                    </a>
                                                </div>

                                                <div class="slick-miembro-content p-3 p-lg-3 d-flex flex-column justify-content-between border border-dark">
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

                                <div class="slick-arrows-equipo position-absolute d-none d-lg-flex justify-content-between p-4">
                                    <span id="slick-equipo-left" class="fal fa-chevron-left"></span>
                                    <span id="slick-equipo-right" class="fal fa-chevron-right"></span>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="mr-lg-auto pl-lg-5">
                        <?php 
                            $link = get_field('ver_publicaciones');
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