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
                                <!-- STEP 1 -->
                                <fieldset class="seleccion-1 mb-3">
                                    <legend class="lead">1. Selecciona la aplicación</legend>
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
                                </fieldset>
                                <!-- STEP 3 -->
                                <fieldset class="seleccion-2 mb-3">
                                    <legend class="lead">2. Configura tu producto</legend>

                                    <nav class="tabs-style-one pr-3">
                                        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
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
                                        <!-- SUB-STEP 1 DE STEP 2 -->
                                        <div class="tab-pane fade show active" id="nav-altura" role="tabpanel"
                                            aria-labelledby="nav-altura-tab">

                                            <fieldset class="inputs-radio d-inline-block">
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
                                            </fieldset>
                                            <div class="controls pt-4">
                                                <span class="siguiente-tab btn btn-round">Siguiente</span>
                                            </div>

                                        </div>

                                        <!-- SUB-STEP 2 DE STEP 2 -->
                                        <div class="tab-pane fade" id="nav-luminaria" role="tabpanel"
                                            aria-labelledby="nav-luminaria-tab">

                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-12 px-0 mb-2">
                                                        <div class="circle">1</div>
                                                    </div>
                                                    <div class="col-lg-4 pl-0">
                                                        <fieldset class="variacion1 mb-3">
                                                            <legend class="d-block mb-3 fs-14">Light color</legend>
                                                            <div class="inputs-radio d-inline-block">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="customradio3000k"
                                                                        name="customRadioLightColor"
                                                                        class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="customradio3000k">3000k</label>
                                                                </div>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="customRadio4000k"
                                                                        name="customRadioLightColor"
                                                                        class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="customRadio4000k">4000k</label>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset class="variacion2">
                                                            <legend class="d-block mb-3 fs-14">Power</legend>
                                                            <div class="inputs-radio d-inline-block">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="customradioleds1"
                                                                        name="customRadioPower"
                                                                        class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="customradioleds1">18 LEDs 21W</label>
                                                                </div>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="customRadioleds2"
                                                                        name="customRadioPower"
                                                                        class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="customRadioleds2">18 LEDs 30W</label>
                                                                </div>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="customRadioleds3"
                                                                        name="customRadioPower"
                                                                        class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="customRadioleds3">18 LEDs 40W</label>
                                                                </div>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="customRadioleds4"
                                                                        name="customRadioPower"
                                                                        class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="customRadioleds4">36 LEDs 40W</label>
                                                                </div>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="customRadioleds5"
                                                                        name="customRadioPower"
                                                                        class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="customRadioleds5">36 LEDs 56W</label>
                                                                </div>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="customRadioleds6"
                                                                        name="customRadioPower"
                                                                        class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="customRadioleds6">36 LEDs 78W</label>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 pl-0">

                                                </div>
                                                <div class="col-lg-3 pl-0">

                                                </div>

                                            </div>

                                            <div class="controls pt-4">
                                                <span class="anterior-tab btn btn-round">Atrás</span>
                                                <span class="siguiente-tab btn btn-round">Siguiente</span>

                                            </div>
                                        </div>

                                        <!-- SUB-STEP 3 DE STEP 2 -->
                                        <div class="tab-pane fade" id="nav-acabado" role="tabpanel"
                                            aria-labelledby="nav-acabado-tab">
                                            <legend class="d-block mb-3 fs-14">Inyección de aluminio</legend>
                                            <fieldset class="inputs-radio d-inline-block">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customAcabado1" name="customRadioAcabado"
                                                        class="custom-control-input">

                                                    <div class="container-fluid container-custom-radio">
                                                        <div class="row align-items-center">
                                                            <div class="col-6">
                                                                <span>Gris claro</span>
                                                            </div>

                                                            <div class="col-6">

                                                                <label
                                                                    class="custom-control-label px-3 rectangulo-gris-claro"
                                                                    for="customAcabado1"></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="custom-control custom-radio d-flex align-items-center">
                                                    <input type="radio" id="customAcabado2" name="customRadioAcabado"
                                                        class="custom-control-input">

                                                    <div class="container-fluid container-custom-radio">
                                                        <div class="row align-items-center">
                                                            <div class="col-6">
                                                                <span>Gris medio</span>
                                                            </div>

                                                            <div class="col-6">

                                                                <label
                                                                    class="custom-control-label px-3 rectangulo-gris-medio"
                                                                    for="customAcabado2"></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="custom-control custom-radio d-flex align-items-center">
                                                    <input type="radio" id="customAcabado3" name="customRadioAcabado"
                                                        class="custom-control-input">

                                                    <div class="container-fluid container-custom-radio">
                                                        <div class="row align-items-center">
                                                            <div class="col-6">
                                                                <span>Gris oscuro</span>
                                                            </div>

                                                            <div class="col-6">

                                                                <label
                                                                    class="custom-control-label px-3 rectangulo-gris-oscuro"
                                                                    for="customAcabado3"></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="custom-control custom-radio d-flex align-items-center">
                                                    <input type="radio" id="customAcabado4" name="customRadioAcabado"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label px-3"
                                                        for="customAcabado4">Otros</label>
                                                </div>
                                            </fieldset>
                                            <div class="controls pt-4">
                                                <span class="anterior-tab btn btn-round">Atrás</span>
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>
                            </div>
                            <div class="col-lg-5 text-center">

                                <img src="http://localhost/new-urbidermis/wp-content/uploads/2021/09/test_web.svg"
                                    alt="" class="img-fluid" style="width:600px;">
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