<?php

/* Template Name: Contacto */

get_header('top-bar');
$page_id = get_queried_object_id();
?>
<section>
    <div class="wrapper ff-dms">
        <section class="d-flex flex-column">
            <div class="container-fluid">
                <div class="row py-5">
                    <div class="col-12 col-lg-3 color-blue">
                        <?php
                            display_tag(
                                'title_group',
                                'title_tag',
                                'title_txt',
                                'fs-12 fw-600 d-block'
                            )
                        ?>
                        <div class="text-body color-blue">
                            <?php the_field('contenido'); ?>
                        </div>
                    </div>
                    <div class="col-12 col-lg-9">

                        <?php //acf_make_map_marker('direccion');?>

                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1491.1293410237795!2d2.3389343240937213!3d41.62853967175129!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a4c9df2a892027%3A0x7ad786aead9c99e9!2sIntramundana!5e0!3m2!1ses!2ses!4v1618412334657!5m2!1ses!2ses" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>


                    </div>
                </div>
            </div>

        </section>

    </div>
</section>




<?php

get_footer();

?>