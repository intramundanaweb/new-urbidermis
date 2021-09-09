<?php

/* Template Name: Home */

get_header('no-margin');
?>

<!-- Section cover -->
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 px-0 height-200">

                <div class="slick-cover">

                    <?php
                        if( have_rows('slider_home') ):
                            $counter =1;
                        while ( have_rows('slider_home') ) : the_row();
                    ?>

                    <div>

                        <?php img_with_alt_lazy_sub('imagen'); ?>
                        <p class="conocimiento-urbanidad fs-16 fs-lg-15 position-absolute color-black"><?php the_sub_field('pie_de_foto'); ?></p>

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
    <div class="container-fluid">
        <div class="row">
            <div class="section-contact bg-beige col-12 px-0 height-200">

                <div class="contact-content pl-4 pr-4 pb-4 pt-5 d-flex flex-column h-100">

                    <?php
                        display_tag(
                            'title_group',
                            'title_tag',
                            'title_txt',
                            'font-weight-bold fs-lg-3 mb-4'
                        )
                    ?>

                    <p class="fw-400 fs-13"><?php the_field('parrafo_1'); ?></p>
                    <p class="fw-400 fs-13"><?php the_field('parrafo_2'); ?></p>

                    <div class="button-wrap mt-auto">
                        <button class="btn btn-round ml-auto mr-auto mb-4"><?php the_field('texto_boton'); ?></button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Section skin -->
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="section-skin bg-beige-light d-flex flex-column col-12 px-0 height-200">

                <?php img_with_alt('imagen_seccion'); ?>

                <div class="row skin-content pl-4 pr-4 pt-5 pb-4 d-flex h-100">

                    <div class="title pl-3 col-lg-6">
                        <?php
                            display_tag(
                                'titulo_intermedio',
                                'title_tag',
                                'title_txt',
                                'font-weight-bold fs-18 fs-lg-3 mb-4'
                            )
                        ?>
                    </div>

                    <div class="body col-lg-6 d-flex flex-column">

                        <p class="fw-400 fs-13"><?php the_field('parrafo_intermedio'); ?></p>
                        <div class="skin-buttons d-flex flex-column mt-auto">
                            <button class="btn btn-round habla-con-nos mb-4 ml-auto mr-auto mt-5"><?php the_field('texto_boton_1'); ?></button>
                            <button class="btn btn-round ver-galeria ml-auto mr-auto mb-4"><?php the_field('texto_boton_2'); ?></button>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

<!-- Section reference -->
<section class="bg-beige">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 big-title-section py-5 px-5">
                <?php
                    display_tag(
                        'titulo_final',
                        'title_tag',
                        'title_txt',
                        'big-title-content m-0 text-center'
                    )
                ?>
                <?php
                    display_tag(
                        'palabra_dinamica',
                        'title_tag',
                        'title_txt',
                        'palabra-dinamica'
                    )
                ?>

                <!--<canvas id="myCanvas"></canvas>-->

            </div>
        </div>
    </div>
</section>
<section>
    <div class="container-fluid pr-lg-0">
        <div class="row">
            <div class="col-12 section-reference bg-beige-light px-0">

                <div class="container-fluid">
                    <div class="row reference-wrap pt-5 pb-4 pl-4 pr-0">

                        <div class="title col-lg-6 pl-0 mb-4">
                            <?php
                            display_tag(
                                'subtitulo_final',
                                'title_tag',
                                'title_txt',
                                'font-weight-bold fs-18 fs-lg-3 mb-4'
                            )
                        ?>

                        </div>

                        <div class="col-lg-6 pr-0 d-flex flex-column">

                            <div class="slick-articles d-flex">

                                <?php for ($i = 0; $i < 5; $i++) { ?>
                                    
                                    <div class="slick-article d-flex flex-column justify-content-between mr-3 p-3 border-1 border-black">

                                        <a href="#">
                                            <p class="fs-15 fs-lg-11 fw-500">¿Cómo iluminar con catenaria?</p>
                                        </a>

                                        <div class="hline"></div>

                                        <div class="child-article">
                                            <p class="fs-11 fs-lg-11 fw-500 mb-0">Artículo</p>
                                            <p class="fs-11 fs-lg-11 fw-500">12 min</p>
                                        </div>

                                        <div class="hline"></div>

                                        <p class="tags-title font-weight-bold fs-lg-07">TAGS</p>

                                        <p class="tags fs-15 fs-lg-11 fw-500">#urbanidad #ciudad #edificios #suspensión
                                            #instalación
                                            #espacios</p>

                                    </div>

                                <?php } ?>

                            </div>

                            <div class="d-flex slick-chevrons mt-3">
                                <span id="slick-article-left" class="icon-arrow-left-bold mr-3"></span>
                                <span id="slick-article-right" class="icon-arrow-right-bold"></span>
                            </div>

                            <button class="btn btn-round btn-masPublicaciones ml-auto mr-auto mt-5 mb-5"><?php the_field('texto_boton_final'); ?></button>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<?php
get_footer();