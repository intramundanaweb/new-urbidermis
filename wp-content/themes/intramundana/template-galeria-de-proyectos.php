<?php

/* Template Name: Projects */

get_header('no-margin');
?>

<?php

    $intro = 'El banco constituye una parte fundamental del equipamiento del entorno urbano.  Es el elemento urbano de descanso por excelencia, de contemplación e interacción.
    Un elemento que debe ser universalmente inclusivo y fabricado con materiales sostenibles. Un banco requiere de gran resistencia frente al uso continuado y las adversidades
    climatológicas. Se dispone en las zonas que no dificulten la circulación del viandante, alejadas del tráfico intenso, alrededor de espacios idóneos para su función,
    principalmente en los espacios verdes y zonas de esparcimiento como de zonas de juegos infantiles, parques, paradas de.
    El banco constituye una parte fundamental del equipamiento del entorno urbano. Es el elemento urbano de descanso por excelencia, de contemplación e interacción.
    Un elemento que debe ser universalmente inclusivo y fabricado con materiales sostenibles. Un banco requiere de gran resistencia frente al uso continuado y las adversidades
    climatológicas. Se dispone en las zonas que no dificulten la circulación del viandante, alejadas del tráfico intenso, alrededor de espacios idóneos para su función,
    principalmente en los espacios verdes y zonas de esparcimiento como de zonas de juegos infantiles, parques, paradas de.
    El banco constituye una parte fundamental del equipamiento del entorno urbano. Es el elemento urbano de descanso por excelencia, de contemplación e interacción.
    Un elemento que debe ser universalmente inclusivo y fabricado con materiales sostenibles. Un banco requiere de gran resistencia frente al uso continuado y las adversidades
    climatológicas. Se dispone en las zonas que no dificulten la circulación del viandante, alejadas del tráfico intenso, alrededor de espacios idóneos para su función,
    principalmente en los espacios verdes y zonas de esparcimiento como de zonas de juegos infantiles, parques, paradas de.
    El banco constituye una parte fundamental del equipamiento del entorno urbano. Es el elemento urbano de descanso por excelencia, de contemplación e interacción.
    Un elemento que debe ser universalmente inclusivo y fabricado con materiales sostenibles. Un banco requiere de gran resistencia frente al uso continuado y las adversidades
    climatológicas. Se dispone en las zonas que no dificulten la circulación del viandante, alejadas del tráfico intenso, alrededor de espacios idóneos para su función,
    principalmente en los espacios verdes y zonas de esparcimiento como de zonas de juegos infantiles, parques, paradas de.';

?>

<!-- Section header -->
<section class="section-header">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row py-5">
                <div class="col-12 d-lg-flex">

                    <div class="header-title col-12 col-lg-6">
                        <h2 class="fs-lg-375">Galería de proyectos</h2>
                    </div>

                    <div class="header-introduction col-12 col-lg-6">
                        <p class="fw-500 fs-11 fs-lg-14 lh-25 lh-lg-25"><?php echo $intro; ?></p>
                    </div>

                </div>                
            </div>
        </div>
    </div>
</section>

<!-- Filter box mobile -->
<?php if( wp_is_mobile() ) : ?>
    <div class="filter-box position-fixed py-5 px-5 w-100 height-200 bg-beige-light">

        <span class="filterBox-mobile-chevron"><span class="far fa-chevron-up"></span></span>

        <div class="custom-select mt-5 mb-4 position-relative text-dark border-dark">
            <select name="country" id="sel-country" class="d-none">
                <option value="País">País</option>
                <option value="Portugal">Portugal</option>
                <option value="Francia">Uganda</option>
                <option value="Francia">Belgica</option>
                <option value="Francia">Portugal</option>
                <option value="Francia">Suiza</option>
                <option value="Francia">Eslovenia</option>
                <option value="Francia">Islandia</option>
                <option value="Francia">Mexico</option>
                <option value="Francia">Argentina</option>
                <option value="Francia">Afghanistan</option>
                <option value="Francia">Spain</option>
            </select>
        </div>

        <div class="custom-select  mb-4 position-relative text-dark border-dark">
            <select name="city" id="sel-city" class="d-none">
                <option class="fw-500 fs-11 fs-lg-14" value="Ciudad">Ciudad</option>
                <option value="Barcelona">Barcelona</option>
                <option value="Madrid">Madrid</option>
            </select>
        </div>

        <div class="custom-select mb-4 position-relative text-dark border-dark">
            <select name="typology" id="sel-typology" class="d-none">
                <option class="fw-500 fs-11 fs-lg-14" value="Tipologia">Tipologia</option>
                <option value="Catalogado">Catalogado</option>
                <option value="Redaccion">Redacción</option>
            </select>
        </div>

        <div class="custom-select mb-4 position-relative text-dark border-dark">
            <select name="product" id="sel-product" class="d-none">
                <option class="fw-500 fs-11 fs-lg-14" value="Producto">Producto</option>
                <option value="Silvestrina">Silvestrina</option>
                <option value="Cestita">Cestita</option>
            </select>
        </div>

    </div>
<?php endif; ?>

<!-- Section grid -->
<section class="section-grid">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- Upper menu -->
                    <div class="upper-menu col-12 d-flex justify-content-between my-5">

                        <!-- Switch button -->
                        <div class="switch-wrapper d-flex d-lg-flex">
                            <span class="switch-imagen fw-500 fs-11 fs-lg-14">Imágenes</span>
                            <span class="switch-wrap">
                                <label class="switch mx-2 mx-lg-2 mb-0 position-relative d-inline-block">
                                    <input name="view-switch" type="checkbox">
                                    <span class="slider position-absolute"></span>
                                </label>
                            </span>
                            <span class="switch-lista fw-500 fs-11 fs-lg-14">Lista</span>
                        </div>

                        <!-- Filter label -->
                        <div class="filter-label">
                            <p class="fw-500 fs-11 fs-lg-14">Filtrar <span class="fa fa-chevron-down"></span></p>
                        </div>

                    </div>

                    <?php if( wp_is_mobile() ) : ?>
                        <input type="range" min="1" max="100" value="0" class="range mt-3 mb-5 bg-black w-100 p-0"></input>
                    <?php endif; ?>

                    <!-- Filter box -->
                    <?php if(! wp_is_mobile() ) : ?>
                        <div class="container-fluid filter-box">
                            <div class="row">
                                <div class="col-12 px-lg-0">
                        
                                    <div class="selects-wrap p-3 border border-dark position-relative d-flex justify-content-between flex-wrap">

                                        <div class="custom-select mb-4 mb-lg-0 position-relative text-dark border-dark">
                                            <select name="country" id="sel-country" class="d-none">
                                                <option value="País">País</option>
                                                <option value="Portugal">Portugal</option>
                                                <option value="Francia">Uganda</option>
                                                <option value="Francia">Belgica</option>
                                                <option value="Francia">Portugal</option>
                                                <option value="Francia">Suiza</option>
                                                <option value="Francia">Eslovenia</option>
                                                <option value="Francia">Islandia</option>
                                                <option value="Francia">Mexico</option>
                                                <option value="Francia">Argentina</option>
                                                <option value="Francia">Afghanistan</option>
                                                <option value="Francia">Spain</option>
                                            </select>
                                        </div>

                                        <div class="custom-select position-relative text-dark border-dark">
                                            <select name="city" id="sel-city" class="d-none">
                                                <option value="Ciudad">Ciudad</option>
                                                <option value="Barcelona">Barcelona</option>
                                                <option value="Madrid">Madrid</option>
                                            </select>
                                        </div>

                                        <div class="custom-select position-relative text-dark border-dark">
                                            <select name="typology" id="sel-typology" class="d-none">
                                                <option value="Tipologia">Tipologia</option>
                                                <option value="Catalogado">Catalogado</option>
                                                <option value="Redaccion">Redacción</option>
                                            </select>
                                        </div>

                                        <div class="custom-select position-relative text-dark border-dark">
                                            <select name="product" id="sel-product" class="d-none">
                                                <option value="Producto">Producto</option>
                                                <option value="Silvestrina">Silvestrina</option>
                                                <option value="Cestita">Cestita</option>
                                            </select>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    

                    <!-- GRID -->
                    <div class="grid-flex container-fluid p-0">
                        <div class="row">

                            <?php for ($i = 0; $i < 11; $i++) { ?>

                                <div class="grid-project-wrap col-12 col-lg-2">
                                    <div class="grid-project flex-column mb-4" data-pais="Spain" data-ciudad="Madrid" data-tipologia="Catalogado" data-producto="Cestita">
                                        <div class="project-title">
                                            <p class="d-inline-block mb-2 fw-500 fs-11 fs-lg-14">Museo del diseño HUB</p>
                                            <span class="fal fa-plus-circle"></span>
                                        </div>
                                        <div class="image-wrap">
                                            <img class="project-image" src="/urbidermis/wp-content/themes/intramundana/img/img1.png" alt="project-cover">
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>

                        </div>
                    </div>

                    <!-- LIST -->
                    <div class="list-flex container-fluid">
                        <div class="row">
                            <div class="col-12 px-0 px-lg-0">
                                
                                <p class="order-label">Ordenar por</p>

                                <div class="list-menu d-lg-flex w-lg-100">
                                        
                                    <div data-value="project" class="col-6 col-lg px-0 order order-proyecto"><span class="fw-500 fs-1 fs-lg-13">Proyecto <span class="d-lg-inline fa fa-chevron-down"></span></span></div>
                                    <div data-value="city" class="col-lg px-0 order order-ciudad"><span class="fw-500 fs-1 fs-lg-13">Ciudad <span class="d-lg-inline fa fa-chevron-down"></span></span></div>
                                    <div data-value="country" class="col-3 col-lg px-0 order order-pais"><span class="fw-500 fs-1 fs-lg-13">País <span class="d-lg-inline fa fa-chevron-down"></span></span></div>
                                    
                                    <?php if ( !wp_is_mobile() ) : ?>
                                        <div data-value="year" class="col-lg px-0 order order-ano"><span class="fw-500 fs-1 fs-lg-13">Año proyecto <span class="d-lg-inline fa fa-chevron-down"></span></span></div>
                                    <?php else : ?>
                                        <div data-value="year" class="col-3 px-0 order order-ano"><span class="fw-500 fs-1 fs-lg-13">Año <span class="d-lg-inline fa fa-chevron-down"></span></span></div>
                                    <?php endif; ?>

                                    <div class="col-lg order order-producto"><span class="fw-500 fs-1 fs-lg-13">Producto</span></div>

                                </div>

                                <?php if ( wp_is_mobile() ) : ?>

                                    <div class="hline mt-2 mb-3"></div>

                                <?php endif; ?>

                                <div class="list-wrap d-lg-flex flex-wrap">

                                    <?php for ($i = 0; $i < 4; $i++) { ?>

                                        <?php if ( !wp_is_mobile() ) : ?>
                                            <div class="list-project justify-content-between" data-tipologia="Catalogado">
                                                
                                                <p class="col Proyecto m-0 p-0">Plaza Mayor</p>
                                                <p class="col Ciudad m-0 p-0">Madrid</p>
                                                <p class="col Pais m-0 p-0">EJPAÑA</p>
                                                <p class="col Ano m-0 p-0">1995</p>
                                                <p class="col Producto m-0 p-0">TMM, NeoRomántico Liviano</p>

                                            </div>

                                            <div class="list-project justify-content-between bg-blue-light" data-tipologia="Redacción">
                                                
                                                <p class="col Proyecto m-0 p-0">Museo del diseño HUB <span class="fal fa-plus-circle"></span></p>
                                                <p class="col Ciudad m-0 p-0">Barcelona</p>
                                                <p class="col Pais m-0 p-0">Spain</p>
                                                <p class="col Ano m-0 p-0">2019</p>
                                                <p class="col Producto m-0 p-0">Rama, NeoRomántico Liviano</p>

                                            </div>

                                            <div class="list-project justify-content-between" data-tipologia="Redacción">
                                                
                                                <p class="col Proyecto m-0 p-0">Fontana di Trevi</p>
                                                <p class="col Ciudad m-0 p-0">Roma</p>
                                                <p class="col Pais m-0 p-0">Italy</p>
                                                <p class="col Ano m-0 p-0">2021</p>
                                                <p class="col Producto m-0 p-0">SíSíSí, NeoRomántico Liviano</p>

                                            </div>

                                        <?php else: ?>

                                            <div class="list-project justify-content-between" data-tipologia="Catalogado">
                                                
                                                <p class="col-6 Proyecto m-0 p-0">
                                                    Plaza Mayor<br>
                                                    <span class="fw-500">TMM, NeoRomántico Liviano</span> 
                                                    <span class="fal fa-plus-circle"></span>
                                                </p>
                                                <p class="col-3 Pais m-0 p-0">
                                                    EJPAÑA,<br>
                                                    <span>Madrid</span>
                                                </p>
                                                <p class="col-3 Ano m-0 p-0">1995</p>

                                            </div>

                                            <div class="hline-grey my-3"></div>

                                            <div class="list-project justify-content-between" data-tipologia="Redacción">
                                                
                                                <p class="col-6 Proyecto m-0 p-0">
                                                    Museo del diseño HUB
                                                    <span class="fw-500">Rama, NeoRomántico Liviano</span>
                                                    <span class="fal fa-plus-circle"></span>
                                                </p>
                                                <p class="col-3 Pais m-0 p-0">
                                                    Spain,<br>
                                                    <span>Barcelona</span>
                                                </p>
                                                <p class="col-3 Ano m-0 p-0">2019</p>

                                            </div>

                                            <div class="hline-grey my-3"></div>

                                            <div class="list-project justify-content-between" data-tipologia="Redacción">
                                                
                                                <p class="col-6 Proyecto m-0 p-0">
                                                    Fontana di Trevi
                                                    <span class="fw-500">SíSíSí, NeoRomántico Liviano</span>
                                                    <span class="fal fa-plus-circle"></span>
                                                </p>
                                                <p class="col-3 Pais m-0 p-0">
                                                    Italy,<br>
                                                    <span>Roma</span>
                                                </p>
                                                <p class="col-3 Ano m-0 p-0">2021</p>
                                                
                                            </div>

                                            <div class="hline-grey my-3"></div>

                                        <?php endif; ?>

                                    <?php } ?>

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