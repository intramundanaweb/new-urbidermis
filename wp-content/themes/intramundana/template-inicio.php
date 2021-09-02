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
                        <p class="conocimiento-urbanidad fs-lg-15 position-absolute font-weight-bold color-black"><?php the_sub_field('pie_de_foto'); ?></p>

                    </div>

                    <?php
                        $counter++;
                        endwhile;
                        endif;
                    ?>

                </div>

                <div class="slick-arrows w-100 position-absolute d-flex justify-content-between p-4">
                    <span id="slick-cover-left" class="icon-circle-bold fs-16"></span>
                    <span id="slick-cover-right" class="icon-circle-bold fs-16"></span>
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

                <div class="contact-content d-flex flex-column h-100">

                    <?php
                        display_tag(
                            'title_group',
                            'title_tag',
                            'title_txt',
                            'font-weight-bold fs-lg-3 mb-4'
                        )
                    ?>
                   
                    <p class="fw-500 fs-lg-11"><?php the_field('parrafo_1'); ?></p>
                    <p class="fw-500 fs-lg-11"><?php the_field('parrafo_2'); ?></p>

                    <div class="button-wrap mt-auto">
                        <button class="contact-btn"><?php the_field('texto_boton'); ?></button>
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

                <?php img_with_alt_lazy('imagen_seccion'); ?>

                <div class="row skin-content d-flex h-100">

                    <div class="title pl-0 col-lg-6">
                        <?php
                            display_tag(
                                'titulo_intermedio',
                                'title_tag',
                                'title_txt',
                                'font-weight-bold fs-lg-3'
                            )
                        ?>
                    </div>

                    <div class="body col-lg-6 d-flex flex-column">

                        <p class="fw-500 fs-lg-11"><?php the_field('parrafo_intermedio'); ?></p>
                        <div class="skin-buttons d-flex mt-auto">
                            <button class="mr-5"><?php the_field('texto_boton_1'); ?></button>
                            <button><?php the_field('texto_boton_2'); ?></button>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

<!-- Section reference -->
<section>
    <div class="container-fluid pl-0">
        <div class="row">
            <div class="section-reference bg-beige-light col-12 px-0 height-200">

                <div class="big-title-section bg-beige py-5 px-5">
                    <?php
                        display_tag(
                            'titulo_final',
                            'title_tag',
                            'title_txt',
                            'fs-lg-45'
                        )
                    ?>
                    <!--<h1 class="fs-lg-45">Vienen tiempos de revolución urbana</h1>-->
                </div>

                <div class="row height-200 p-5">

                    <div class="title col-lg-6">
                        <?php
                            display_tag(
                                'subtitulo_final',
                                'title_tag',
                                'title_txt',
                                'font-weight-bold fs-lg-3'
                            )
                        ?>
                        <!--<h2 class="font-weight-bold fs-lg-3">Descubre nuestros artículos de referencia</h2>-->
                    </div>

                    <div class="body col-lg-6 d-flex flex-column">

                        <div class="slick-wrapper d-flex flex-column">

                            <div class="slick-articles d-flex">
                                <div
                                    class="slick-article d-flex flex-column justify-content-between mr-3 p-3 border-1 border-black">

                                    <a href="#">
                                        <p class="fs-lg-15 fw-500">¿Cómo iluminar con catenaria?</p>
                                    </a>

                                    <div class="hline"></div>

                                    <div class="child-article">
                                        <p class="fs-lg-11 fw-400 mb-0">Artículo</p>
                                        <p class="fs-lg-11 fw-400">12 min</p>
                                    </div>

                                    <div class="hline"></div>

                                    <p class="tags-title font-weight-bold fs-lg-07">TAGS</p>

                                    <p class="fs-lg-15 fw-500">#urbanidad #ciudad #edificios #suspensión #instalación
                                        #espacios</p>

                                </div>

                                <div
                                    class="slick-article d-flex flex-column justify-content-between mr-3 p-3 border-1 border-black">

                                    <a href="#">
                                        <p class="fs-lg-15 fw-500">¿Cómo iluminar con catenaria?</p>
                                    </a>

                                    <div class="hline"></div>

                                    <div class="child-article">
                                        <p class="fs-lg-11 fw-400 mb-0">Artículo</p>
                                        <p class="fs-lg-11 fw-400">12 min</p>
                                    </div>

                                    <div class="hline"></div>

                                    <p class="tags-title font-weight-bold fs-lg-07">TAGS</p>

                                    <p class="fs-lg-15 fw-500">#urbanidad #ciudad #edificios #suspensión #instalación
                                        #espacios</p>

                                </div>

                                <div
                                    class="slick-article d-flex flex-column justify-content-between mr-3 p-3 border-1 border-black">

                                    <a href="#">
                                        <p class="fs-lg-15 fw-500">¿Cómo iluminar con catenaria?</p>
                                    </a>

                                    <div class="hline"></div>

                                    <div class="child-article">
                                        <p class="fs-lg-11 fw-400 mb-0">Artículo</p>
                                        <p class="fs-lg-11 fw-400">12 min</p>
                                    </div>

                                    <div class="hline"></div>

                                    <p class="tags-title font-weight-bold fs-lg-07">TAGS</p>

                                    <p class="fs-lg-15 fw-500">#urbanidad #ciudad #edificios #suspensión #instalación
                                        #espacios</p>

                                </div>

                                <div
                                    class="slick-article d-flex flex-column justify-content-between mr-3 p-3 border-1 border-black">

                                    <a href="#">
                                        <p class="fs-lg-15 fw-500">¿Cómo iluminar con catenaria?</p>
                                    </a>

                                    <div class="hline"></div>

                                    <div class="child-article">
                                        <p class="fs-lg-11 fw-400 mb-0">Artículo</p>
                                        <p class="fs-lg-11 fw-400">12 min</p>
                                    </div>

                                    <div class="hline"></div>

                                    <p class="tags-title font-weight-bold fs-lg-07">TAGS</p>

                                    <p class="fs-lg-15 fw-500">#urbanidad #ciudad #edificios #suspensión #instalación
                                        #espacios</p>

                                </div>

                                <div
                                    class="slick-article d-flex flex-column justify-content-between mr-3 p-3 border-1 border-black">

                                    <a href="#">
                                        <p class="fs-lg-15 fw-500">¿Cómo iluminar con catenaria?</p>
                                    </a>

                                    <div class="hline"></div>

                                    <div class="child-article">
                                        <p class="fs-lg-11 fw-400 mb-0">Artículo</p>
                                        <p class="fs-lg-11 fw-400">12 min</p>
                                    </div>

                                    <div class="hline"></div>

                                    <p class="tags-title font-weight-bold fs-lg-07">TAGS</p>

                                    <p class="fs-lg-15 fw-500">#urbanidad #ciudad #edificios #suspensión #instalación
                                        #espacios</p>

                                </div>

                            </div>

                            <div class="d-flex mt-3">
                                <span id="slick-article-left" class="icon-arrow-left-bold mr-3"></span>
                                <span id="slick-article-right" class="icon-arrow-right-bold"></span>
                            </div>

                        </div>

                        <button class="btn-masPublicaciones mt-3"><?php the_field('texto_boton_final'); ?></button>

                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

<?php
get_footer();