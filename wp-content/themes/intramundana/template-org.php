<?php

/* Template Name: ORG */

get_header();
$page_id = get_queried_object_id();
?>
<!-- <section class="height-300"> -->
<section class="">
    <div class="wrapper h-100 ff-dms">
        <section class="d-flex flex-column h-100">
            <div class="container-fluid h-100">
                <div class="row py-5">
                    <div class="col-12 col-lg-3 color-blue">
                        <?php
                            display_tag(
                                'title_group',
                                'title_tag',
                                'title_txt',
                                'fs-12 fw-600 d-block mb-4'
                            )
                        ?>
                        <div class="text-body">

                            <h2 class="fs-1 color-blue mb-4 fw-300"><ins><?php the_field('titulo_1'); ?></ins></h2>
                            <!-- Presidente -->
                            <div class="presi mb-4">
                                <h2 class="fs-1 color-blue fw-300 font-italic mb-1"><?php _e('Presidente', 'intramundana') ?></h2>
                                <h2 class="fs-1 color-blue fw-300 pointer" id="open-modal-presi">
                                    <?php the_field('presidente'); ?>
                                </h2>
                                <!-- Seccion lateral -->
                                <section class="height-300 sidecontent-presi">
                                    <div class="wrapper h-100">
                                        <section class="d-flex flex-column h-100">
                                            <div class="container-fluid h-100">
                                                <div class="mt-lg-5 mt-4">
                                                    <a class="closebtn-presi d-block mb-lg-0 mb-4 fs-15">
                                                        <span
                                                            class="icon-close fs-12 float-none text-white pointer"></span>
                                                    </a>
                                                </div>
                                                <div class="py-lg-5 text-white">
                                                    <div class="img-bio mb-4">
                                                        <?php img_with_alt('foto_del_presidente'); ?>
                                                    </div>
                                                    <div class="bio">
                                                        <?php the_field('biografia_presidente'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </section>
                                <!-- Fin seccion lateral -->
                            </div>
                            <!-- Fin Presidente -->

                            <!-- Vicepresidente -->
                            <div class="vicepresi mb-4">
                                <h2 class="fs-1 color-blue font-italic fw-300"><?php _e('Vicepresidente', 'intramundana') ?></h2>
                                <h2 class="fs-1 color-blue fw-300 pointer" id="open-modal-vicepresi">
                                    <?php the_field('vicepresidente'); ?>
                                </h2>
                                <!-- Seccion lateral -->
                                <section class="height-300 sidecontent-vicepresi">
                                    <div class="wrapper h-100">
                                        <section class="d-flex flex-column h-100">
                                            <div class="container-fluid h-100">
                                                <div class="mt-lg-5 mt-4">
                                                    <a class="closebtn-vicepresi d-block mb-lg-0 mb-4 fs-15">
                                                        <span
                                                            class="icon-close fs-12 float-none text-white pointer"></span>
                                                    </a>
                                                </div>
                                                <div class="py-lg-5 text-white">
                                                    <div class="img-bio mb-4">
                                                        <?php img_with_alt('foto_del_vicepresidente'); ?>
                                                    </div>
                                                    <div class="bio">
                                                        <?php the_field('biografia_vicepresidente'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </section>
                                <!-- Seccion lateral -->
                            </div>
                            <!-- FIn Vicpresidente -->

                            <!-- Voceros -->
                            <div class="voceros mb-4">
                                <h2 class="fs-1 color-blue font-italic fw-300"><?php _e('Voceros Consejeros', 'intramundana') ?></h2>

                                <?php
    							if( have_rows('voceros_consejeros') ):
									$counterr =1;
                                    while ( have_rows('voceros_consejeros') ) : the_row();
                                ?>

                                <div class="vocero-<?php echo $counterr; ?>">
                                    <h2 class="fs-1 color-blue fw-300 pointer" data-toggle="modal"
                                        data-target="#exampleModal-<?php echo $counterr; ?>">
                                        <?php the_sub_field('vocero'); ?>
                                    </h2>


                                    <!-- Seccion lateral -->
                                    <section class="height-300 sidecontent-vocero modal"
                                        id="exampleModal-<?php echo $counterr;?>" aria-hidden="true">
                                        <div class="wrapper h-100">
                                            <section class="d-flex flex-column h-100">
                                                <div class="container-fluid h-100">
                                                    <div class="mt-lg-5 mt-4">
                                                        <!--  <a class="closebtn-vocero mt-5">
                                                            <span class="icon-close text-white pointer"></span>
                                                        </a> -->
                                                        <a type="button" class="close float-none d-block mb-lg-0 mb-4"
                                                            data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true"
                                                                class="icon-close fs-12 text-white pointer"></span>
                                                        </a>
                                                    </div>
                                                    <div class="py-lg-5 text-white">
                                                        <div class="img-bio mb-4">
                                                            <?php img_with_alt_sub('imagen_del_vocero'); ?>
                                                        </div>
                                                        <div class="bio">
                                                            <?php the_sub_field('biografia_del_vocero'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </section>
                                    <!-- Seccion lateral -->
                                </div>

                                <?php
                                $counterr++;
                                endwhile;
                                endif;
                                ?>

                            </div>
                            <!-- Fin VOceros -->

                            <!-- Secretario -->
                            <div class="secre mb-4">

                                <h3 class="fs-1 color-blue fw-300 font-italic"><?php _e('Secretario no Consejero', 'intramundana') ?></h3>
                                <h3 class="fs-1 color-blue fw-300 pointer" id="open-modal-secre">
                                    <?php the_field('secretario'); ?>
                                </h3>

                                <!-- Seccion lateral -->
                                <section class="height-300 sidecontent-secre">
                                    <div class="wrapper h-100">
                                        <section class="d-flex flex-column h-100">
                                            <div class="container-fluid h-100">
                                                <div class="mt-lg-5 mt-4">
                                                    <a class="closebtn-secre d-block mb-lg-0 mb-4 fs-15">
                                                        <span
                                                            class="icon-close fs-12 float-none text-white pointer"></span>
                                                    </a>
                                                </div>
                                                <div class="py-lg-5 text-white">
                                                    <div class="img-bio mb-4">
                                                        <?php img_with_alt('foto_del_secretario'); ?>
                                                    </div>
                                                    <div class="bio">
                                                        <?php the_field('biografia_secretario'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </section>
                                <!-- Seccion lateral -->

                            </div>

                            <!-- Fin Secretario -->


                            <h3 class="fs-1 color-blue mb-4 fw-300"><ins><?php _e('Departamento Legal', 'intramundana') ?></ins></h3>

                            <div class="legal mb-4">
                                <h3 class="fs-1 color-blue fw-300 pointer" id="open-modal-legal">
                                    <?php the_field('departamento_legal'); ?>
                                </h3>
                                <!-- Seccion lateral -->
                                <section class="height-300 sidecontent-legal">
                                    <div class="wrapper h-100">
                                        <section class="d-flex flex-column h-100">
                                            <div class="container-fluid h-100">
                                                <div class="mt-lg-5 mt-4">
                                                    <a class="closebtn-legal d-block mb-lg-0 mb-4 fs-15">
                                                        <span
                                                            class="icon-close fs-12 float-none text-white pointer"></span>
                                                    </a>
                                                </div>
                                                <div class="py-lg-5 text-white">
                                                    <div class="img-bio mb-4">
                                                        <?php img_with_alt('foto_del_departamento_legal'); ?>
                                                    </div>
                                                    <div class="bio">
                                                        <?php the_field('biografia_departamento_legal'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </section>
                                <!-- Seccion lateral -->
                            </div>

                        </div>
                    </div>
                    <div class="col-12 col-lg-9">

                        <div class="slider-galeria px-lg-4">
                            <?php
    							if( have_rows('slider_principal') ):
									$counter =1;
    							while ( have_rows('slider_principal') ) : the_row();
							?>
                            <div class="cualquiera">
                                <div class="slider-container mb-3">
                                    <?php img_with_alt_lazy_sub('imagen'); ?>
                                </div>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col align-self-start ">
                                            <span class="slider-info color-blue"></span>
                                        </div>
                                        <div class="col align-self-end text-right pr-lg-2">
                                            <a class="buttom-info-photo edit color-blue"
                                                id="modal-slider-<?php echo $counter;?>"><?php the_sub_field('titulo_foto'); ?></a>
                                        </div>
                                    </div>
                                </div>

                                <span class="invisible id-dinamico"><?php echo $counter;?></span>
                                <span id="firstname<?php echo $counter;?>" style="display:none">
                                    <?php the_sub_field('fotografo'); ?>
                                </span>
                                <span id="descripname<?php echo $counter;?>" style="display:none">
                                    <?php the_sub_field('descripcion_de_la_imagen'); ?>
                                </span>


                            </div>
                            <?php
							$counter++;
							endwhile;
							endif;
							?>
                        </div>
                        <div class="control-slider d-lg-flex d-none justify-content-between w-100">
                            <span id="slider-left">
                                <span class="icon-arrow-left fs-2 color-blue"></span>
                            </span>
                            <span id="slider-right">
                                <span class="icon-arrow-right fs-2 color-blue"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Inicio seccion lateral -->
            <section class="height-300 sidecontent">
                <div class="wrapper h-100">
                    <section class="d-flex flex-column h-100">
                        <div class="container-fluid h-100">
                            <div class="mt-lg-5 mt-4">
                                <a class="closebtn d-block mb-lg-0 mb-4 fs-15"><span
                                        class="icon-close fs-12 text-white"></span></a>
                            </div>
                            <div class="py-lg-5 text-white">
                                <span id="descrnametext"></span>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="d-flex">
                                <p class="fs-1 text-white"><?php _e('Fotógrafo', 'intramundana') ?>:
                                    <span id="efirstname"></span>
                                </p>
                            </div>
                        </div>
                    </section>
                </div>
            </section>
            <!-- Fin seccion lateral -->



            <!-- Enlaces buttom -->
            <div class="py-4 nav-circle">

                <?php 
                
                     
                    if ( is_page() && $post->post_parent ) {
                        $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0&exclude='.$page_id.'' );
                    }else {
                        $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );
                    }

                    
                    if ( $childpages ) {
                     
                        $string = '<ul class="hijos list-unstyled d-flex justify-content-between">' . $childpages . '</ul>';
                    }
                                        
                    echo $string;
                    ?>

            </div>



        </section>

    </div>
</section>




<?php

get_footer();

?>