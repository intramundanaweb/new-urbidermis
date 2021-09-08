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
        
<section class="section-cover d-flex flex-column flex-lg-row h-100 bg-beige">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <!-- the_title() -->
                <p>Caso práctico, 8 min</p>
                <!-- the_tag() -->
                <p>#urbanidad #ciudad #edificios #suspensión #instalación #espacios</p>

                <p><?php the_field('texto_portada'); ?></p>

                <p>Información técnica</p>
                <span><i class="icon-plus"></i></span>

                <?php img_with_alt('imagen_portada'); ?>

            </div>
        </div>
    </div>
</section>

<section class="section-intro d-flex flex-column flex-lg-row bg-beige-light">

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="titulo_introduccion">
                    <?php
                        display_tag(
                            'titulo_introduccion',
                            'etiqueta_titulo',
                            'texto_titulo',
                            'fs-18 fs-lg-3 mb-4'
                        )
                    ?>
                </div>

                <p><?php the_field('texto_resaltado'); ?></p>
                <p><?php the_field('texto_introduccion'); ?></p>

                <?php img_with_alt('imagen_introduccion_1'); ?>
                <?php img_with_alt('imagen_introduccion_2'); ?>

            </div>
        </div>
    </div>

</section>

<section class="section-history d-flex flex-column flex-lg-row bg-beige-light">

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="titulo_introduccion">
                    <?php
                        display_tag(
                            'titulo_introduccion',
                            'etiqueta_titulo',
                            'texto_titulo',
                            'fs-18 fs-lg-3 mb-4'
                        )
                    ?>
                </div>

            </div>
        </div>
    </div>

</section>





<?php

get_footer();

?>