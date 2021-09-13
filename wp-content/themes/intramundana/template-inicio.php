<?php

/* Template Name: Home */

get_header('no-margin');
?>

<!-- Section cover -->
<section>
    <div class="wrapper px-0 p-lg-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 px-0 height-200">

                    <div class="slick-cover">

                        <?php
                            if( have_rows('slider_home') ):
                                $counter =1;
                            while ( have_rows('slider_home') ) : the_row();
                        ?>

                        <div class="position-relative">

                            <?php img_with_alt_lazy_sub('imagen'); ?>
                            <p class="pie-de-foto fw-500 fs-14 fs-lg-15 position-absolute color-black"><?php the_sub_field('pie_de_foto'); ?></p>

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
    </div>
</section>

<!-- Section contact -->
<section>
    <div class="wrapper contact px-lg-0 px-0 bg-beige">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                <div class="section section-contact px-4 mt-5 mt-lg-0 mb-5 mb-lg-0 d-flex flex-column height-200">

                    <div class="mb-4">
                        <?php
                            display_tag(
                                'title_group',
                                'title_tag',
                                'title_txt',
                                'font-weight-bold fs-25 fs-lg-375'
                            )
                        ?>
                    </div>
                    
                    <div>
                        <p class="fw-500 fs-13 fs-lg-25 p-text"><?php the_field('parrafo_1'); ?></p>
                        <p class="fw-500 fs-13 fs-lg-25 p-text"><?php the_field('parrafo_2'); ?></p>
                    </div>

                    <div class="button-wrap mt-auto">
                        <button class="btn btn-round mt-auto ml-auto mr-auto mb-lg-6"><?php the_field('texto_boton'); ?></button>
                    </div>

                </div>

                    

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section skin -->
<section>
    <div class="wrapper px-lg-0 px-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 bg-beige-light p-0">

                    <?php img_with_alt('imagen_seccion'); ?>

                    <div class="section section-skin px-4 pt-5 pb-5 pb-lg-0 d-flex flex-column flex-lg-row">
                    
                        <div class="title pl-3 col-lg-6 mb-4">
                            <?php
                                display_tag(
                                    'titulo_intermedio',
                                    'title_tag',
                                    'title_txt',
                                    'font-weight-bold fs-25 fs-lg-375'
                                )
                            ?>
                        </div>

                        <div class="body col-lg-6 d-flex flex-column">

                            <p class="fw-500 fs-13 fs-lg-25 p-text"><?php the_field('parrafo_intermedio_1'); ?></p>
                            <p class="fw-500 fs-13 fs-lg-25 p-text"><?php the_field('parrafo_intermedio_2'); ?></p>

                            <div class="skin-buttons d-flex flex-column flex-lg-row mt-auto mt-lg-auto">
                                <button class="btn btn-round habla-con-nos mb-4 mb-lg-6 ml-auto mr-auto mr-lg-0 mt-5 mt-lg-0"><?php the_field('texto_boton_1'); ?></button>
                                <button class="btn btn-round ver-galeria ml-auto ml-lg-4 mr-auto mb-lg-6"><?php the_field('texto_boton_2'); ?></button>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>    
</section>

<!-- Section BIG TITLE -->
<section>
    <div class="wrapper px-lg-0 px-0 bg-beige">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 big-title-section py-5 px-5">
                    <?php
                        display_tag(
                            'titulo_final',
                            'title_tag',
                            'title_txt',
                            'big-title-content m-0 text-center fs-lg-56'
                        )
                    ?>
                    <?php
                        display_tag(
                            'palabra_dinamica',
                            'title_tag',
                            'title_txt',
                            'palabra-dinamica fs-lg-56'
                        )
                    ?>

                    <!--<canvas id="myCanvas"></canvas>-->

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Reference -->
<section>
    <div class="wrapper reference px-lg-0 px-0 bg-beige-light">
        <div class="container-fluid pr-lg-0">
            <div class="row">
                <div class="col-12">

                    <div class="section section-reference px-4 pt-5 pb-5 pb-lg-0">
                        <div class="row reference-wrap pr-0">

                            <div class="title col-lg-6 mb-4">
                                <?php
                                    display_tag(
                                        'subtitulo_final',
                                        'title_tag',
                                        'title_txt',
                                        'font-weight-bold fs-25 fs-lg-375 mb-4'
                                    )
                                ?>
                            </div>

                            <div class="col-lg-6 pr-0 d-flex flex-column">

                                <div class="slick-articles d-flex">

                                    <?php for ($i = 0; $i < 5; $i++) { ?>
                                        
                                        <div class="slick-article d-flex flex-column justify-content-between mr-3 p-3 border-1 border-black">

                                            <a href="#">
                                                <p class="fs-15 fs-lg-18 fw-500 mb-lg-0">¿Cómo iluminar con catenaria?</p>
                                            </a>

                                            <div class="hline"></div>

                                            <div class="child-article">
                                                <p class="fs-11 fs-lg-14 fw-500 mb-lg-0">Artículo</p>
                                                <p class="fs-11 fs-lg-14 fw-500 mb-lg-0">12 min</p>
                                            </div>

                                            <div class="hline"></div>

                                            <p class="tags-title font-weight-bold fs-lg-09">TAGS</p>

                                            <p class="tags fs-15 fs-lg-18 fw-500 mb-lg-0">#urbanidad #ciudad #edificios #suspensión
                                                #instalación
                                                #espacios</p>

                                        </div>

                                    <?php } ?>

                                </div>

                                <div class="d-flex slick-chevrons mt-3">
                                    <span id="slick-article-left" class="icon-arrow-left mr-3"></span>
                                    <span id="slick-article-right" class="icon-arrow-right"></span>
                                </div>

                                <button class="btn btn-round ml-auto ml-lg-0 mr-auto mt-5 mb-lg-6"><?php the_field('texto_boton_final'); ?></button>

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