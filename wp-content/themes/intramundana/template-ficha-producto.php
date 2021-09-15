<?php

/* Template Name: Ficha de producto */

get_header('top-bar-classy');
?>

<section class="bg-beige height-200 pt-5">

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-lg-5 mb-4">
                    <h1>Configurador</h1>
                </div>
                <div class="col-12 px-0">
                    <form action="" class="">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="accordion" id="accordionExample">
                                        <div class="card bg-transparent border-0 br-0">
                                            <div class="card-header px-0 bg-transparent border-0" id="headingOne">
                                                <!-- STEP 1 -->
                                                <button class="btn text-standard btn-block px-0 text-left" type="button"
                                                    data-toggle="collapse" data-target="#collapseOne"
                                                    aria-expanded="true" aria-controls="collapseOne">
                                                    1. Selecciona la aplicación
                                                </button>

                                            </div>

                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                                data-parent="#accordionExample">
                                                <div class="card-body px-0">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio01" name="customRadio0"
                                                            class="custom-control-input" required>
                                                        <label class="custom-control-label text-standard"
                                                            for="customRadio01">Catenaria</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio02" name="customRadio0"
                                                            class="custom-control-input" required>
                                                        <label class="custom-control-label text-standard"
                                                            for="customRadio02">Columna</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio03" name="customRadio0"
                                                            class="custom-control-input" required>
                                                        <label class="custom-control-label text-standard"
                                                            for="customRadio03">Mural</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card bg-transparent border-0 br-0">
                                            <div class="card-header px-0 bg-transparent border-0" id="headingTwo">
                                                <!-- STEP 2 -->
                                                <button class="btn text-standard btn-block px-0 text-left collapsed"
                                                    type="button" data-toggle="collapse" data-target="#collapseTwo"
                                                    aria-expanded="false" aria-controls="collapseTwo">
                                                    2. Configura tu producto
                                                </button>

                                            </div>
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                                data-parent="#accordionExample">
                                                <div class="card-body px-0">
                                                    <nav class="tabs-style-one pr-3">
                                                        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                                            <a class="nav-link active" id="nav-altura-tab"
                                                                data-toggle="tab" href="#nav-altura" role="tab"
                                                                aria-controls="nav-altura"
                                                                aria-selected="true">Altura</a>
                                                            <a class="nav-link" id="nav-luminaria-tab" data-toggle="tab"
                                                                href="#nav-luminaria" role="tab"
                                                                aria-controls="nav-luminaria"
                                                                aria-selected="false">Luminaria</a>
                                                            <a class="nav-link" id="nav-acabado-tab" data-toggle="tab"
                                                                href="#nav-acabado" role="tab"
                                                                aria-controls="nav-acabado"
                                                                aria-selected="false">Acabado</a>
                                                            <a class="nav-link" id="nav-unidades-tab" data-toggle="tab"
                                                                href="#nav-unidades" role="tab"
                                                                aria-controls="nav-unidades"
                                                                aria-selected="false">Unidades</a>
                                                        </div>
                                                    </nav>

                                                    <div class="tab-content" id="nav-tabContent">
                                                        <!-- SUB-STEP 1 DE STEP 2 -->
                                                        <div class="tab-pane fade  show active" id="nav-altura"
                                                            role="tabpanel" aria-labelledby="nav-altura-tab">

                                                            <fieldset class="inputs-radio d-inline-block">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="customRadio1"
                                                                        name="customRadio" class="custom-control-input"
                                                                        required>
                                                                    <label class="custom-control-label text-standard"
                                                                        for="customRadio1">3,40m</label>
                                                                </div>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="customRadio2"
                                                                        name="customRadio" class="custom-control-input"
                                                                        required>
                                                                    <label class="custom-control-label text-standard"
                                                                        for="customRadio2">4,20m</label>
                                                                </div>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="customRadio3"
                                                                        name="customRadio" class="custom-control-input"
                                                                        required>
                                                                    <label class="custom-control-label text-standard"
                                                                        for="customRadio3">5,00m</label>
                                                                </div>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="customRadio4"
                                                                        name="customRadio" class="custom-control-input"
                                                                        required>
                                                                    <label class="custom-control-label text-standard"
                                                                        for="customRadio4">5,80m</label>
                                                                </div>
                                                            </fieldset>

                                                        </div>

                                                        <!-- SUB-STEP 2 DE STEP 2 -->
                                                        <div class="tab-pane fade " id="nav-luminaria" role="tabpanel"
                                                            aria-labelledby="nav-luminaria-tab">

                                                            <div class="container-fluid px-0">
                                                                <div class="form-row mx-0">
                                                                    <div class="col-12 px-0 mb-2">
                                                                        <div class="circle">1</div>
                                                                    </div>
                                                                    <div class="col-lg-4 pl-0">
                                                                        <fieldset class="variacion1 mb-3">
                                                                            <legend class="d-block mb-3 text-standard">
                                                                                Light
                                                                                color
                                                                            </legend>
                                                                            <div class="inputs-radio d-inline-block">
                                                                                <div
                                                                                    class="custom-control custom-radio">
                                                                                    <input type="radio"
                                                                                        id="customradio3000k"
                                                                                        name="customRadioLightColor"
                                                                                        class="custom-control-input"
                                                                                        required>
                                                                                    <label
                                                                                        class="custom-control-label text-standard"
                                                                                        for="customradio3000k">3000k</label>
                                                                                </div>
                                                                                <div
                                                                                    class="custom-control custom-radio">
                                                                                    <input type="radio"
                                                                                        id="customRadio4000k"
                                                                                        name="customRadioLightColor"
                                                                                        class="custom-control-input "
                                                                                        required>
                                                                                    <label
                                                                                        class="custom-control-label text-standard"
                                                                                        for="customRadio4000k">4000k</label>
                                                                                </div>
                                                                            </div>
                                                                        </fieldset>
                                                                        <fieldset class="variacion2">
                                                                            <legend class="d-block mb-3 text-standard">
                                                                                Power
                                                                            </legend>
                                                                            <div class="inputs-radio d-inline-block">
                                                                                <div
                                                                                    class="custom-control custom-radio">
                                                                                    <input type="radio"
                                                                                        id="customradioleds1"
                                                                                        name="customRadioPower"
                                                                                        class="custom-control-input"
                                                                                        required>
                                                                                    <label
                                                                                        class="custom-control-label text-standard"
                                                                                        for="customradioleds1">18 LEDs
                                                                                        21W</label>
                                                                                </div>
                                                                                <div
                                                                                    class="custom-control custom-radio">
                                                                                    <input type="radio"
                                                                                        id="customRadioleds2"
                                                                                        name="customRadioPower"
                                                                                        class="custom-control-input"
                                                                                        required>
                                                                                    <label
                                                                                        class="custom-control-label text-standard"
                                                                                        for="customRadioleds2">18 LEDs
                                                                                        30W</label>
                                                                                </div>
                                                                                <div
                                                                                    class="custom-control custom-radio">
                                                                                    <input type="radio"
                                                                                        id="customRadioleds3"
                                                                                        name="customRadioPower"
                                                                                        class="custom-control-input"
                                                                                        required>
                                                                                    <label
                                                                                        class="custom-control-label text-standard"
                                                                                        for="customRadioleds3">18 LEDs
                                                                                        40W</label>
                                                                                </div>
                                                                                <div
                                                                                    class="custom-control custom-radio">
                                                                                    <input type="radio"
                                                                                        id="customRadioleds4"
                                                                                        name="customRadioPower"
                                                                                        class="custom-control-input"
                                                                                        required>
                                                                                    <label
                                                                                        class="custom-control-label text-standard"
                                                                                        for="customRadioleds4">36 LEDs
                                                                                        40W</label>
                                                                                </div>
                                                                                <div
                                                                                    class="custom-control custom-radio">
                                                                                    <input type="radio"
                                                                                        id="customRadioleds5"
                                                                                        name="customRadioPower"
                                                                                        class="custom-control-input"
                                                                                        required>
                                                                                    <label
                                                                                        class="custom-control-label text-standard"
                                                                                        for="customRadioleds5">36 LEDs
                                                                                        56W</label>
                                                                                </div>
                                                                                <div
                                                                                    class="custom-control custom-radio">
                                                                                    <input type="radio"
                                                                                        id="customRadioleds6"
                                                                                        name="customRadioPower"
                                                                                        class="custom-control-input"
                                                                                        required>
                                                                                    <label
                                                                                        class="custom-control-label text-standard"
                                                                                        for="customRadioleds6">36 LEDs
                                                                                        78W</label>
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

                                                        </div>

                                                        <!-- SUB-STEP 3 DE STEP 2 -->
                                                        <div class="tab-pane fade " id="nav-acabado" role="tabpanel"
                                                            aria-labelledby="nav-acabado-tab">

                                                            <fieldset class="inputs-radio d-inline-block">
                                                                <legend class="d-block mb-3 text-standard">Inyección de
                                                                    aluminio
                                                                </legend>
                                                                <div class="custom-control custom-radio px-0 mb-3">
                                                                    <input type="radio" id="customAcabado1"
                                                                        name="customRadioAcabado"
                                                                        class="custom-control-input" value="#b3b8bb"
                                                                        required>

                                                                    <div class="container-fluid container-custom-radio">
                                                                        <div class="form-row align-items-center">
                                                                            <div class="col-lg-2 col-4 pl-0">
                                                                                <span class="text-standard">Gris
                                                                                    claro</span>
                                                                            </div>

                                                                            <div class="col-auto">

                                                                                <label
                                                                                    class="custom-control-label px-3 rectangulo-gris-claro"
                                                                                    for="customAcabado1"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="custom-control custom-radio px-0 mb-3">
                                                                    <input type="radio" id="customAcabado2"
                                                                        name="customRadioAcabado"
                                                                        class="custom-control-input" value="#7d8079"
                                                                        required>

                                                                    <div class="container-fluid container-custom-radio">
                                                                        <div class="form-row align-items-center">
                                                                            <div class="col-lg-2 col-4 pl-0">
                                                                                <span class="text-standard">Gris
                                                                                    medio</span>
                                                                            </div>

                                                                            <div class="col-auto">

                                                                                <label
                                                                                    class="custom-control-label px-3 rectangulo-gris-medio"
                                                                                    for="customAcabado2"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="custom-control custom-radio px-0 mb-3">
                                                                    <input type="radio" id="customAcabado3"
                                                                        name="customRadioAcabado"
                                                                        class="custom-control-input" value="#4a4b55"
                                                                        required>

                                                                    <div class="container-fluid container-custom-radio">
                                                                        <div class="form-row align-items-center">
                                                                            <div class="col-lg-2 col-4 pl-0">
                                                                                <span class="text-standard">Gris
                                                                                    oscuro</span>
                                                                            </div>

                                                                            <div class="col-auto">

                                                                                <label
                                                                                    class="custom-control-label px-3 rectangulo-gris-oscuro"
                                                                                    for="customAcabado3"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div
                                                                    class="custom-control custom-radio px-0 d-flex align-items-center">
                                                                    <input type="radio" id="customAcabado4"
                                                                        name="customRadioAcabado"
                                                                        class="custom-control-input" value="1" required>

                                                                    <div class="container-fluid container-custom-radio">
                                                                        <div class="form-row align-items-center">
                                                                            <div class="col-lg-2 col-4 pl-0">
                                                                                <span class="text-standard">Otros</span>
                                                                            </div>

                                                                            <div class="col-auto">

                                                                                <label
                                                                                    class="custom-control-label px-1 rectangulo"
                                                                                    for="customAcabado4">
                                                                                    <input type="text" name="otrocolor"
                                                                                        id="tcontenidoMod"
                                                                                        class="form-control otrocolor"
                                                                                        disabled>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </fieldset>
                                                        </div>

                                                        <!-- SUB-STEP 3 DE STEP 2 -->
                                                        <div class="tab-pane fade " id="nav-unidades" role="tabpanel"
                                                            aria-labelledby="nav-unidades-tab">

                                                            <fieldset
                                                                class="input-number d-flex align-items-end position-relative">

                                                                <input type="number" id="unidades" name="unidades"
                                                                    class="form-control text-center" placeholder="0" step="1" min="1" value="0" required >
                                                                <div
                                                                    class="d-flex flex-column align-items-center justify-content-center ">
                                                                    <button class="btn py-0 btn-plus">
                                                                        <span class="icon-arrow-up"></span>
                                                                    </button>

                                                                    <button class="btn py-0 btn-minus">
                                                                        <span class="icon-arrow-down"></span>
                                                                    </button>
                                                                </div>


                                                            </fieldset>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card bg-transparent border-0 br-0">
                                            <div class="card-header px-0 bg-transparent border-0" id="headingThree">
                                                <!-- STEP 3 -->
                                                <button class="btn text-standard btn-block px-0 text-left collapsed"
                                                    type="button" data-toggle="collapse" data-target="#collapseThree"
                                                    aria-expanded="false" aria-controls="collapseThree">
                                                    3. Indica el nombre de tu proyecto
                                                </button>
                                            </div>
                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                                data-parent="#accordionExample">
                                                <div class="card-body px-0">
                                                    <input type="text" class="form-control" id="proyecto" placeholder="Escribe aquí" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <fieldset class="seleccion-1 mb-3">
                                        <legend class="text-standard">1. Selecciona la aplicación</legend>


                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio01" name="customRadio0"
                                                class="custom-control-input" required>
                                            <label class="custom-control-label text-standard"
                                                for="customRadio01">Catenaria</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio02" name="customRadio0"
                                                class="custom-control-input" required>
                                            <label class="custom-control-label text-standard"
                                                for="customRadio02">Columna</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio03" name="customRadio0"
                                                class="custom-control-input" required>
                                            <label class="custom-control-label text-standard"
                                                for="customRadio03">Mural</label>
                                        </div>

                                    </fieldset>
                                    
                                    <fieldset class="seleccion-2 mb-3">
                                        <legend class="text-standard">2. Configura tu producto</legend>

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
                                                <a class="nav-link" id="nav-unidades-tab" data-toggle="tab"
                                                    href="#nav-unidades" role="tab" aria-controls="nav-unidades"
                                                    aria-selected="false">Unidades</a>
                                            </div>
                                        </nav>
                                        <div class="tab-content" id="nav-tabContent">
                                           
                                            <div class="tab-pane  show active" id="nav-altura" role="tabpanel"
                                                aria-labelledby="nav-altura-tab">

                                                <fieldset class="inputs-radio d-inline-block">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio1" name="customRadio"
                                                            class="custom-control-input" required>
                                                        <label class="custom-control-label text-standard"
                                                            for="customRadio1">3,40m</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio2" name="customRadio"
                                                            class="custom-control-input" required>
                                                        <label class="custom-control-label text-standard"
                                                            for="customRadio2">4,20m</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio3" name="customRadio"
                                                            class="custom-control-input" required>
                                                        <label class="custom-control-label text-standard"
                                                            for="customRadio3">5,00m</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio4" name="customRadio"
                                                            class="custom-control-input" required>
                                                        <label class="custom-control-label text-standard"
                                                            for="customRadio4">5,80m</label>
                                                    </div>
                                                </fieldset>

                                            </div>

                                            <div class="tab-pane " id="nav-luminaria" role="tabpanel"
                                                aria-labelledby="nav-luminaria-tab">

                                                <div class="container-fluid">
                                                    <div class="form-row">
                                                        <div class="col-12 px-0 mb-2">
                                                            <div class="circle">1</div>
                                                        </div>
                                                        <div class="col-lg-4 pl-0">
                                                            <fieldset class="variacion1 mb-3">
                                                                <legend class="d-block mb-3 text-standard">Light color
                                                                </legend>
                                                                <div class="inputs-radio d-inline-block">
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" id="customradio3000k"
                                                                            name="customRadioLightColor"
                                                                            class="custom-control-input" required>
                                                                        <label
                                                                            class="custom-control-label text-standard"
                                                                            for="customradio3000k">3000k</label>
                                                                    </div>
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" id="customRadio4000k"
                                                                            name="customRadioLightColor"
                                                                            class="custom-control-input " required>
                                                                        <label
                                                                            class="custom-control-label text-standard"
                                                                            for="customRadio4000k">4000k</label>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            <fieldset class="variacion2">
                                                                <legend class="d-block mb-3 text-standard">Power
                                                                </legend>
                                                                <div class="inputs-radio d-inline-block">
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" id="customradioleds1"
                                                                            name="customRadioPower"
                                                                            class="custom-control-input" required>
                                                                        <label
                                                                            class="custom-control-label text-standard"
                                                                            for="customradioleds1">18 LEDs 21W</label>
                                                                    </div>
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" id="customRadioleds2"
                                                                            name="customRadioPower"
                                                                            class="custom-control-input" required>
                                                                        <label
                                                                            class="custom-control-label text-standard"
                                                                            for="customRadioleds2">18 LEDs 30W</label>
                                                                    </div>
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" id="customRadioleds3"
                                                                            name="customRadioPower"
                                                                            class="custom-control-input" required>
                                                                        <label
                                                                            class="custom-control-label text-standard"
                                                                            for="customRadioleds3">18 LEDs 40W</label>
                                                                    </div>
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" id="customRadioleds4"
                                                                            name="customRadioPower"
                                                                            class="custom-control-input" required>
                                                                        <label
                                                                            class="custom-control-label text-standard"
                                                                            for="customRadioleds4">36 LEDs 40W</label>
                                                                    </div>
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" id="customRadioleds5"
                                                                            name="customRadioPower"
                                                                            class="custom-control-input" required>
                                                                        <label
                                                                            class="custom-control-label text-standard"
                                                                            for="customRadioleds5">36 LEDs 56W</label>
                                                                    </div>
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" id="customRadioleds6"
                                                                            name="customRadioPower"
                                                                            class="custom-control-input" required>
                                                                        <label
                                                                            class="custom-control-label text-standard"
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

                                            </div>

                                            <div class="tab-pane " id="nav-acabado" role="tabpanel"
                                                aria-labelledby="nav-acabado-tab">

                                                <fieldset class="inputs-radio d-inline-block">
                                                    <legend class="d-block mb-3 text-standard">Inyección de aluminio
                                                    </legend>
                                                    <div class="custom-control custom-radio px-0 mb-3">
                                                        <input type="radio" id="customAcabado1"
                                                            name="customRadioAcabado" class="custom-control-input"
                                                            value="#b3b8bb" required>

                                                        <div class="container-fluid container-custom-radio">
                                                            <div class="form-row align-items-center">
                                                                <div class="col-lg-2 col-4 pl-0">
                                                                    <span class="text-standard">Gris claro</span>
                                                                </div>

                                                                <div class="col-auto">

                                                                    <label
                                                                        class="custom-control-label px-3 rectangulo-gris-claro"
                                                                        for="customAcabado1"></label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="custom-control custom-radio px-0 mb-3">
                                                        <input type="radio" id="customAcabado2"
                                                            name="customRadioAcabado" class="custom-control-input"
                                                            value="#7d8079" required>

                                                        <div class="container-fluid container-custom-radio">
                                                            <div class="form-row align-items-center">
                                                                <div class="col-lg-2 col-4 pl-0">
                                                                    <span class="text-standard">Gris medio</span>
                                                                </div>

                                                                <div class="col-auto">

                                                                    <label
                                                                        class="custom-control-label px-3 rectangulo-gris-medio"
                                                                        for="customAcabado2"></label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="custom-control custom-radio px-0 mb-3">
                                                        <input type="radio" id="customAcabado3"
                                                            name="customRadioAcabado" class="custom-control-input"
                                                            value="#4a4b55" required>

                                                        <div class="container-fluid container-custom-radio">
                                                            <div class="form-row align-items-center">
                                                                <div class="col-lg-2 col-4 pl-0">
                                                                    <span class="text-standard">Gris oscuro</span>
                                                                </div>

                                                                <div class="col-auto">

                                                                    <label
                                                                        class="custom-control-label px-3 rectangulo-gris-oscuro"
                                                                        for="customAcabado3"></label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div
                                                        class="custom-control custom-radio px-0 d-flex align-items-center">
                                                        <input type="radio" id="customAcabado4"
                                                            name="customRadioAcabado" class="custom-control-input"
                                                            value="1" required>

                                                        <div class="container-fluid container-custom-radio">
                                                            <div class="form-row align-items-center">
                                                                <div class="col-lg-2 col-4 pl-0">
                                                                    <span class="text-standard">Otros</span>
                                                                </div>

                                                                <div class="col-auto">

                                                                    <label class="custom-control-label px-1 rectangulo"
                                                                        for="customAcabado4">
                                                                        <input type="text" name="otrocolor"
                                                                            id="tcontenidoMod"
                                                                            class="form-control otrocolor" disabled>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </fieldset>
                                            </div>

                                            <div class="tab-pane " id="nav-unidades" role="tabpanel"
                                                aria-labelledby="nav-unidades-tab">

                                                <fieldset class="input-number d-flex align-items-end position-relative">

                                                    <input type="number" id="unidades" name="unidades"
                                                        class="form-control text-center" required>
                                                    <div
                                                        class="d-flex flex-column align-items-center justify-content-center ">
                                                        <button class="btn py-0 btn-plus">
                                                            <span class="icon-arrow-up"></span>
                                                        </button>

                                                        <button class="btn py-0 btn-minus">
                                                            <i class="icon-arrow-down"></i>
                                                        </button>
                                                    </div>


                                                </fieldset>

                                            </div>
                                        </div>

                                    </fieldset>

                                    
                                    <fieldset class="seleccion-1 mb-3">
                                        <div>
                                            <legend class="text-standard">3. proyecto</legend>

                                            <input type="text" class="form-control" id="proyecto" required>
                                        </div>
                                    </fieldset> -->
                                </div>
                                <div class="col-5 d-lg-block d-none text-center">

                                    <img src="http://localhost/new-urbidermis/wp-content/uploads/2021/09/test_web.svg"
                                        alt="" class="img-fluid" style="width:400px;">
                                </div>
                                <div class="col-12">
                                    <div class="controls pt-4 d-flex">

                                        <span
                                            class="anterior-tab btn btn-round px-5 py-1 mr-4 d-flex align-items-center">Atrás</span>
                                        <span
                                            class="siguiente-tab btn btn-round px-5 py-1 mr-4 d-flex align-items-center">Siguiente</span>

                                        <input type="submit"
                                            class="btn btn-round px-5 py-1 mr-4 d-flex align-items-center"
                                            value="Enviar">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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