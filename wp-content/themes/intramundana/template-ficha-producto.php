<?php

/* Template Name: Ficha de producto */

get_header('top-bar-classy');
?>

<section class="bg-beige height-200 pt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-lg-5">
                <h1>Configurador</h1>
            </div>
            <div class="col-12">
                <form action="">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="seleccion-1 mb-3">
                                    <p class="lead">1. Selecciona la aplicación</p>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline1" name="customRadioInline1"
                                            class="custom-control-input">
                                        <label class="custom-control-label" for="customRadioInline1">Catenaria</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline2" name="customRadioInline1"
                                            class="custom-control-input">
                                        <label class="custom-control-label" for="customRadioInline2">Columna</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline3" name="customRadioInline1"
                                            class="custom-control-input">
                                        <label class="custom-control-label" for="customRadioInline3">Mural</label>
                                    </div>
                                </div>
                                <div class="seleccion-2 mb-3">
                                    <p class="lead">2. Configura tu producto</p>

                                    <nav class="tabs-style-one">
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-link active" id="nav-altura-tab" data-toggle="tab"
                                                href="#nav-altura" role="tab" aria-controls="nav-altura"
                                                aria-selected="true">Altura</a>
                                            <a class="nav-link" id="nav-luminaria-tab" data-toggle="tab"
                                                href="#nav-luminaria" role="tab" aria-controls="nav-luminaria"
                                                aria-selected="false">Luminaria</a>
                                            <a class="nav-link" id="nav-acabado-tab" data-toggle="tab"
                                                href="#nav-acabado" role="tab" aria-controls="nav-acabado"
                                                aria-selected="false">Acabado</a>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-altura" role="tabpanel"
                                            aria-labelledby="nav-altura-tab">

                                            <div class="inputs-radio">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio1" name="customRadio"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio1">3,40m</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio2" name="customRadio"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio2">4,20m</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio3" name="customRadio"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio3">5,00m</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio4" name="customRadio"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio4">5,80m</label>
                                                </div>
                                            </div>
                                            <div class="controls pt-4">
                                                <span class="siguiente-tab btn btn-round">Siguiente</span>
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="nav-luminaria" role="tabpanel"
                                            aria-labelledby="nav-luminaria-tab">
                                            <div class="inputs-radio">
                                                ...
                                            </div>
                                            <div class="controls pt-4">
                                                <span class="anterior-tab btn btn-round">Atrás</span>
                                                <span class="siguiente-tab btn btn-round">Siguiente</span>

                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-acabado" role="tabpanel"
                                            aria-labelledby="nav-acabado-tab">
                                            <div class="inputs-radio">
                                                ...
                                            </div>
                                            <div class="controls pt-4">
                                                <span class="anterior-tab btn btn-round">Atrás</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-5">

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="bg-beige">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 ">

            </div>
        </div>
    </div>
</section>

<section class="bg-beige">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 ">

            </div>
        </div>
    </div>
</section>

<?php
get_footer();