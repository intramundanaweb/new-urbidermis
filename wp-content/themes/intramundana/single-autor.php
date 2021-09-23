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

<?php

    $tipo_autor = get_the_term_list( get_the_id(), 'tipo-autor' );

?>

<!-- Section header -->
<section>
    <div class="wrapper bg-beige">
        <div class="container-fluid">
            <div class="row py-lg-5">
                <div class="col-12 d-lg-flex">

                    <div class="col-12 col-lg-6 px-lg-0 d-lg-flex flex-lg-column">
                        <div>
                            <?php
                                display_tag(
                                    'nombre_autor',
                                    'etiqueta_nombre_autor',
                                    'texto_nombre_autor',
                                    'fs-lg-25 fw-400'
                                )
                            ?>
                        </div>
                        <div class="mt-lg-4">
                            <span><?php the_field('ano_autor'); ?></span><span>, </span>
                            <?php echo $tipo_autor; ?>
                        </div>
                        <div class="mt-lg-auto">
                            <span class="fal fa-chevron-left mr-lg-3"></span>
                            <span>Volver a autores</span>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <p class="fw-400 fs-11 fs-lg-11 lh-25"><?php the_field("descripcion_autor"); ?></p>
                    </div>

                </div>                
            </div>
        </div>
    </div>
</section>

<!-- Sección historia -->
<section>
    <div class="wrapper bg-beige-light">
        <div class="container-fluid">
            <div class="row py-lg-5">
                <div class="col-12">

                    <div class="d-lg-flex">

                        <div class="col-12 col-lg-6 d-lg-flex flex-lg-column px-lg-0">
                            <div>
                                <?php 
                                    display_tag(
                                        'titulo_historia',
                                        'etiqueta_titulo_historia',
                                        'texto_titulo_historia',
                                        'fs-lg-25 fw-400'
                                    );
                                ?>
                            </div>
                            <div>
                                <p class="fs-lg-11 w-75 mt-lg-5 fw-400"><?php the_field('texto_historia'); ?></p>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 d-lg-flex flex-lg-column">
                            <div>
                                <?php img_with_alt('imagen_historia_1'); ?>
                            </div>
                            <div class="mt-lg-5">
                                <?php img_with_alt('imagen_historia_2'); ?>
                            </div>
                        </div>

                    </div>

                </div>                
            </div>
        </div>
    </div>
</section>

<!--Seccion diseños-->
<section>
    <div class="wrapper bg-green">
        <div class="container-fluid">
            <div class="row py-lg-5">
                <div class="col-12">

                    <div class="d-lg-flex flex-lg-column">

                        <div class="m-lg-auto">
                            <?php 
                                display_tag(
                                    'titulo_disenos',
                                    'etiqueta_titulo_disenos',
                                    'texto_titulo_disenos',
                                    'fs-lg-5 fw-500'    
                                );
                            ?>
                        </div>
                        <div>
                            <p class="mx-lg-auto mt-lg-5 fs-lg-11 fw-400 w-50 text-center"><?php the_field('texto_disenos'); ?></p>
                        </div>

                    </div>

                </div>                
            </div>
        </div>
    </div>
</section>

<!--Seccion productos-->
<section>
    
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 px-lg-0">

                    <div class="accordion" id="accordionExample">

                        <div class="card bg-beige-light">
                            <div class="card-header py-lg-0" id="headingOne">
                                
                                    <button class="text-center w-100 collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <p class="fs-lg-3 fw-500">NeoRomántico Clásico</p>
                                    </button>
                                
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body bg-beige-light">
                                    
                                    <div class="mx-lg-auto mt-lg-5">
                                        <p class="fs-lg-11 fw-400 text-center">Banco Urbano, 2000</p>
                                    </div>
                                    <div class="mt-lg-4">
                                        <p class="fs-lg-11 fw-400 w-50 mx-lg-auto text-center">La familia NeoRomántico Liviano, la versión ligera y con apoyabrazos, dispone de gran variedad de formatos y materiales: silla individual y banco y banqueta de longitud varia. Realizados en distintas maderas. Depurando los excesos de su precedente versión, sin por ello renunciar a la ya característica ergonomía, un soporte aligerado, con porte elegante y refinado.</p>
                                    </div>
                                    <div class="img-catalogue d-lg-flex justify-content-between mt-lg-5">
                                        <div class="img-wrap">
                                            <img src="http://localhost/new-urbidermis/wp-content/uploads/2021/09/harpo.jpg" alt="">
                                        </div>
                                        <div class="img-wrap">
                                            <img src="http://localhost/new-urbidermis/wp-content/uploads/2021/09/harpo.jpg" alt="">
                                        </div>
                                        <div class="img-wrap">
                                            <img src="http://localhost/new-urbidermis/wp-content/uploads/2021/09/harpo.jpg" alt="">
                                        </div>
                                        <div class="img-wrap">
                                            <img src="http://localhost/new-urbidermis/wp-content/uploads/2021/09/harpo.jpg" alt="">
                                        </div>
                                        <div class="img-wrap">
                                            <img src="http://localhost/new-urbidermis/wp-content/uploads/2021/09/harpo.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="mx-lg-auto my-lg-5">
                                        <p class="fs-lg-11 fw-400 text-center">Ver ficha de producto</p>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card bg-beige-light">
                            <div class="card-header py-lg-0" id="headingTwo">
                               
                                <button class="text-center w-100 collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <p class="fs-lg-3 fw-500">NeoRomántico Liviano</p>
                                </button>
                                
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body bg-beige-light d-lg-flex flex-lg-column">
                                    
                                    <div class="mx-lg-auto mt-lg-5">
                                        <p class="fs-lg-11 fw-400 text-center">Banco Urbano, 2000</p>
                                    </div>
                                    <div class="mt-lg-4">
                                        <p class="mx-lg-auto fs-lg-11 fw-400 w-50 text-center">La familia NeoRomántico Liviano, la versión ligera y con apoyabrazos, dispone de gran variedad de formatos y materiales: silla individual y banco y banqueta de longitud varia. Realizados en distintas maderas. Depurando los excesos de su precedente versión, sin por ello renunciar a la ya característica ergonomía, un soporte aligerado, con porte elegante y refinado.</p>
                                    </div>
                                    <div class="img-catalogue d-lg-flex justify-content-between mt-lg-5">
                                        <div class="img-wrap">
                                            <img src="http://localhost/new-urbidermis/wp-content/uploads/2021/09/harpo.jpg" alt="">
                                        </div>
                                        <div class="img-wrap">
                                            <img src="http://localhost/new-urbidermis/wp-content/uploads/2021/09/harpo.jpg" alt="">
                                        </div>
                                        <div class="img-wrap">
                                            <img src="http://localhost/new-urbidermis/wp-content/uploads/2021/09/harpo.jpg" alt="">
                                        </div>
                                        <div class="img-wrap">
                                            <img src="http://localhost/new-urbidermis/wp-content/uploads/2021/09/harpo.jpg" alt="">
                                        </div>
                                        <div class="img-wrap">
                                            <img src="http://localhost/new-urbidermis/wp-content/uploads/2021/09/harpo.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="mx-lg-auto my-lg-5">
                                        <p class="fs-lg-11 fw-400 text-center">Ver ficha de producto</p>
                                    </div>

                                </div>
                            </div>
                        </div> 

                        <div class="card bg-beige-light">
                            <div class="card-header py-lg-0" id="headingThree">
                                
                                <button class="text-center w-100 collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <p class="fs-lg-3 fw-500">Harpo</p>
                                </button>
                                
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body bg-beige-light">
                                    
                                    <div class="mx-lg-auto mt-lg-5">
                                        <p class="fs-lg-11 fw-400 text-center">Banco Urbano, 2000</p>
                                    </div>
                                    <div class="mt-lg-4">
                                        <p class="mx-lg-auto fs-lg-11 fw-400 w-50 text-center">La familia NeoRomántico Liviano, la versión ligera y con apoyabrazos, dispone de gran variedad de formatos y materiales: silla individual y banco y banqueta de longitud varia. Realizados en distintas maderas. Depurando los excesos de su precedente versión, sin por ello renunciar a la ya característica ergonomía, un soporte aligerado, con porte elegante y refinado.</p>
                                    </div>
                                    <div class="img-catalogue d-lg-flex justify-content-between mt-lg-5">
                                        <div class="img-wrap">
                                            <img src="http://localhost/new-urbidermis/wp-content/uploads/2021/09/harpo.jpg" alt="">
                                        </div>
                                        <div class="img-wrap">
                                            <img src="http://localhost/new-urbidermis/wp-content/uploads/2021/09/harpo.jpg" alt="">
                                        </div>
                                        <div class="img-wrap">
                                            <img src="http://localhost/new-urbidermis/wp-content/uploads/2021/09/harpo.jpg" alt="">
                                        </div>
                                        <div class="img-wrap">
                                            <img src="http://localhost/new-urbidermis/wp-content/uploads/2021/09/harpo.jpg" alt="">
                                        </div>
                                        <div class="img-wrap">
                                            <img src="http://localhost/new-urbidermis/wp-content/uploads/2021/09/harpo.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="mx-lg-auto my-lg-5">
                                        <p class="fs-lg-11 fw-400 text-center">Ver ficha de producto</p>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card bg-beige-light">
                            <div class="card-header py-lg-0" id="headingFour">
                                
                                <button class="text-center w-100 collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <p class="fs-lg-3 fw-500">Inner</p>
                                </button>
                                
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                <div class="card-body bg-beige-light">
                                    
                                    <div class="mx-lg-auto mt-lg-5">
                                        <p class="fs-lg-11 fw-400 text-center">Banco Urbano, 2000</p>
                                    </div>
                                    <div class="mt-lg-4">
                                        <p class="mx-lg-auto fs-lg-11 fw-400 w-50 text-center">La familia NeoRomántico Liviano, la versión ligera y con apoyabrazos, dispone de gran variedad de formatos y materiales: silla individual y banco y banqueta de longitud varia. Realizados en distintas maderas. Depurando los excesos de su precedente versión, sin por ello renunciar a la ya característica ergonomía, un soporte aligerado, con porte elegante y refinado.</p>
                                    </div>
                                    <div class="img-catalogue d-lg-flex justify-content-between mt-lg-5">
                                        <div class="img-wrap">
                                            <img src="http://localhost/new-urbidermis/wp-content/uploads/2021/09/harpo.jpg" alt="">
                                        </div>
                                        <div class="img-wrap">
                                            <img src="http://localhost/new-urbidermis/wp-content/uploads/2021/09/harpo.jpg" alt="">
                                        </div>
                                        <div class="img-wrap">
                                            <img src="http://localhost/new-urbidermis/wp-content/uploads/2021/09/harpo.jpg" alt="">
                                        </div>
                                        <div class="img-wrap">
                                            <img src="http://localhost/new-urbidermis/wp-content/uploads/2021/09/harpo.jpg" alt="">
                                        </div>
                                        <div class="img-wrap">
                                            <img src="http://localhost/new-urbidermis/wp-content/uploads/2021/09/harpo.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="mx-lg-auto my-lg-5">
                                        <p class="fs-lg-11 fw-400 text-center">Ver ficha de producto</p>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card bg-beige-light">
                            <div class="card-header py-lg-0" id="headingFive">
                                
                                <button class="text-center w-100 collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    <p class="fs-lg-3 fw-500">Basic</p>
                                </button>
                                
                            </div>
                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                <div class="card-body bg-beige-light">
                                    
                                    <div class="mx-lg-auto mt-lg-5">
                                        <p class="fs-lg-11 fw-400 text-center">Banco Urbano, 2000</p>
                                    </div>
                                    <div class="mt-lg-4">
                                        <p class="mx-lg-auto fs-lg-11 fw-400 w-50 text-center">La familia NeoRomántico Liviano, la versión ligera y con apoyabrazos, dispone de gran variedad de formatos y materiales: silla individual y banco y banqueta de longitud varia. Realizados en distintas maderas. Depurando los excesos de su precedente versión, sin por ello renunciar a la ya característica ergonomía, un soporte aligerado, con porte elegante y refinado.</p>
                                    </div>
                                    <div class="img-catalogue d-lg-flex justify-content-between mt-lg-5">
                                        <div class="img-wrap">
                                            <img src="http://localhost/new-urbidermis/wp-content/uploads/2021/09/harpo.jpg" alt="">
                                        </div>
                                        <div class="img-wrap">
                                            <img src="http://localhost/new-urbidermis/wp-content/uploads/2021/09/harpo.jpg" alt="">
                                        </div>
                                        <div class="img-wrap">
                                            <img src="http://localhost/new-urbidermis/wp-content/uploads/2021/09/harpo.jpg" alt="">
                                        </div>
                                        <div class="img-wrap">
                                            <img src="http://localhost/new-urbidermis/wp-content/uploads/2021/09/harpo.jpg" alt="">
                                        </div>
                                        <div class="img-wrap">
                                            <img src="http://localhost/new-urbidermis/wp-content/uploads/2021/09/harpo.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="mx-lg-auto my-lg-5">
                                        <p class="fs-lg-11 fw-400 text-center">Ver ficha de producto</p>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card bg-beige-light">
                            <div class="card-header py-lg-0" id="headingSix">
                                
                                <button class="text-center w-100 collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    <p class="fs-lg-3 fw-500">Robert</p>
                                </button>
                                
                            </div>
                            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                                <div class="card-body bg-beige-light">
                                    
                                    <div class="mx-lg-auto mt-lg-5">
                                        <p class="fs-lg-11 fw-400 text-center">Banco Urbano, 2000</p>
                                    </div>
                                    <div class="mt-lg-4">
                                        <p class="mx-lg-auto fs-lg-11 fw-400 w-50 text-center">La familia NeoRomántico Liviano, la versión ligera y con apoyabrazos, dispone de gran variedad de formatos y materiales: silla individual y banco y banqueta de longitud varia. Realizados en distintas maderas. Depurando los excesos de su precedente versión, sin por ello renunciar a la ya característica ergonomía, un soporte aligerado, con porte elegante y refinado.</p>
                                    </div>
                                    <div class="img-catalogue d-lg-flex justify-content-between mt-lg-5">
                                        <div class="img-wrap">
                                            <img src="http://localhost/new-urbidermis/wp-content/uploads/2021/09/harpo.jpg" alt="">
                                        </div>
                                        <div class="img-wrap">
                                            <img src="http://localhost/new-urbidermis/wp-content/uploads/2021/09/harpo.jpg" alt="">
                                        </div>
                                        <div class="img-wrap">
                                            <img src="http://localhost/new-urbidermis/wp-content/uploads/2021/09/harpo.jpg" alt="">
                                        </div>
                                        <div class="img-wrap">
                                            <img src="http://localhost/new-urbidermis/wp-content/uploads/2021/09/harpo.jpg" alt="">
                                        </div>
                                        <div class="img-wrap">
                                            <img src="http://localhost/new-urbidermis/wp-content/uploads/2021/09/harpo.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="mx-lg-auto my-lg-5">
                                        <p class="fs-lg-11 fw-400 text-center">Ver ficha de producto</p>
                                    </div>

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

?