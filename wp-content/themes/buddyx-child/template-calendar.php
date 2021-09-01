<?php

/* Template Name: Test calendar */

get_header();
?>

<section class="wrapper">
    <div class="container-fluid px-lg-0 py-md-2 py-2">
        <div class="row">
            <div class="col-12 mt-5">
                <?php echo do_shortcode('[ameliabooking]');?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();