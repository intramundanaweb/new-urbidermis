<?php

/* Template Name: Gracias */

get_header('top-bar-classy');
?>

<section class="bg-custom-gracias">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row py-5">
                <div
                    class="col-md-6 col-12 text-center order-2 order-md-1 d-flex align-items-center flex-column justify-content-center mt-4 mt-md-0">
                    <h1 class="mb-4 text-center text-uppercase color-yellow">
                        <?php the_field('gracias_title') ?>
                    </h1>
                    <div>
                        <?php the_field('gracias_txt') ?>
                    </div>
                    <div class="text-center mt-4 w-50">
                        <a href="<?php the_field('gracias_btn_link') ?>"
                            class="px-lg-4 py-1 btn text-uppercase bg-custom-black text-white w-100">
                            <?php the_field('gracias_btn_txt') ?>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-12 order-1 order-md-2">
                    <?php img_with_alt('gracias_img')?>
                </div>
            </div>
        </div>
    </div>
</section>


<?php

get_footer();