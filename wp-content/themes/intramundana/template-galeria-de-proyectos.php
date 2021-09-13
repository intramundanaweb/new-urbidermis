<?php

/* Template Name: Projects */

//get_header('no-margin');
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://use.fontawesome.com/3b6cc9f0ed.js"></script>


<?php

    $chevron = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
    </svg>';

?>

<style>

* {
    font-family: sans-serif;
    padding: 0;
    margin: 0;
}

.section-header {
    background-color: #e5e4dc;
    border-top: 1px solid black;
    border-bottom: 1px solid black;
}

.header-introduction {
    max-height: 12em;
    overflow-y: auto;
    scrollbar-color: black lightgrey;
    scrollbar-width: thin;
}

/** Custom scrollbar settings 4 Chrome */

/* Width */
.section-header .section-grid ::-webkit-scrollbar {
    width: 3px;
}

/* Track */
.section-header .section-grid ::-webkit-scrollbar-track {
    background: #f6f5f1;
}

/* Handle */
.section-header .section-grid ::-webkit-scrollbar-thumb {
    background: black;
    border-radius: 20px;
}

/** Custom switch */

.switch {
    width: 60px;
    height: 34px;
    top: -22px;
}

.switch input { 
    opacity: 0;
    width: 0;
    height: 0;
}

/** Rounded slider */

.slider {
    border-radius: 34px;
    border: 1px solid black;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: transparent;
    -webkit-transition: .4s;
    transition: .4s;
}

.slider:before {
    position: absolute;
    content: "";
    border-radius: 50%;
    height: 24px;
    width: 24px;
    left: 4px;
    bottom: 4px;
    background-color: black;
    -webkit-transition: .4s;
    transition: .4s;
}

input:checked + .slider {
    background-color: transparent;
    border: 1px solid black;
}

input:focus + .slider {
    border: 1px solid black;
}

input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
}


/** Page content */

/*boot*/
.section-grid {
    background: #f6f5f1;
}

.switch-color {
    color: grey;
}

.grid-flex {
    /* d-flex no es una opción ya que bootstrap pone un !important, el cual pasa por encima del 'display: none' al hacer el switch de grid-lista */
    display: flex;
    top: -1.5em;
    left: -2.5em;
}

.grid-project-wrap {
    transition: 0.4s;
}

.grid-project-wrap:hover {
    background: #9dbfcc;
}

.grid-project {
    /* d-flex no es una opción ya que bootstrap pone un !important, el cual pasa por encima del 'display: none' al hacer el filtraje de proyectos (.hide()) */
    display: flex;
    padding: 30px;
}

.project-title {
    /* position: absolute;
    top: 0.5em; */
}

.image-wrap {
    border: 1px solid grey;
}

img  {
    width: 100%;
}

.filter-label {
    cursor: pointer;
}

.bi-plus-circle {
    display: inline-block;
    vertical-align: text-top;
    opacity: 0;
    transition: 0.4s;
    cursor: pointer;
}

.selects-wrap {
    top: -3em;
    border-radius: 15px;
}

.custom-select {
    width: 15em;
    background: transparent;
	border-radius: 25px;
	margin-right: 10em;
}

.filter-box {
    /* d-none no es una opción ya que bootstrap pone un !important, el cual pasa por encima del 'display: block' al hacer el toggle (.show() / .hide()) */
    display: none;
}

.select-hide {
    /* d-none no es una opción ya que bootstrap pone un !important, el cual pasa por encima del 'display: block' al hacer el toggle (.show() / .hide()) */
    display: none;
}

.select-items {
    /* Elemento creado con jQuery */
    border: 1px solid black;
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;
    width: 15em;
    position: relative;
    left: -13px;
    background: #f6f5f1;
    border-top: none;
    padding: .5em .75em .75em .75em;
    z-index: 1;
    height: 12em;
    height: max-content;
    max-height: 12em;
}

.items-wrap {
    height: max-content;
    max-height: 11em;
    overflow-y: auto;
    scrollbar-width: thin;
    scrollbar-color: black lightgrey;
}

.open-close {
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
    border-bottom: none;
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
}

.select-selected {
    /* Elemento creado con jQuery */
    display: flex;
}

.select-selected .fa {
    margin-left: auto;
    top: 3px;
    left: 20px;
    position: relative;
}

.item {
    cursor: pointer;
}

.item:hover {
    text-decoration-line: underline;
}

.item span {
    color: lightgrey;
}

/* */

.order-label {
    margin: 0;
    margin-left: 15px;
}

.list-project {
    display: flex;
    border-top: 1px solid black;
    margin-left: 15px;
    margin-right: 15px;
    width: 100%;
    padding: 0.5em 0;
    transition: 0.4s;
}

.list-project:hover {
    background: #9dbfcc;
}

.list-menu {
    margin-left: 15px;
    margin-right: 15px;
    width: 100%;
    padding: 1em 0;
}

.list-menu div {
    padding: 0;
    margin: 0;
}

.list-flex {
    /* d-none no es una opción ya que bootstrap pone un !important, el cual pasa por encima del 'display: block' al hacer el toggle (.show() / .hide()) */
    display: none;
}

.list-project:nth-last-child(1) {
    border-bottom: 1px solid black;
}

.order span {
    cursor: pointer;
}

.range {
    display: none;
}

@media screen and (max-width: 321px) {

    .section-header {
        border: none;
    }

    .header-title, .upper-menu {
        padding: 0;
    }

    .header-introduction {
        max-height: inherit;
        padding: 0;
        margin-top: 1em;
    }

    .slider {
        border-radius: 34px;
        border-radius: 8px;
    }

    .slider::before {
        height: 12px;
        width: 12px;
        left: 2px;
        bottom: 2px;
    }

    .switch {
        width: 40px;
        height: 18px;
        top: -15px;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(22px);
        -ms-transform: translateX(22px);
        transform: translateX(22px);
    }

    .grid-project {
        padding: 1.5em;
        margin-bottom: 0em!important;
    }

    .project-title {
        top: 1.5em;
    }

    .upper-menu {
        margin-top: 2em!important;
        margin-bottom: 0em!important;
    }

    .range {
        display: block;
        margin-bottom: 3em;
        background: black;
        height: 2px;
        -webkit-appearance: none;
        -moz-appearance: none;
        opacity: 0.6;
        transition: 0.2s;
    }

    .range:hover {
        opacity: 1;
    }

    .range::-webkit-slider-thumb {
        -webkit-appearance: none;
        width: 15px;
        height: 15px;
        background: black;
        cursor: pointer;
        border: none;
        border-radius: 50%;
    }

    .range::-moz-range-thumb {
        width: 15px;
        height: 15px;
        background: black;
        cursor: pointer;
        border: none;
        border-radius: 50%;        
    }


}

</style>

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
    <div class="container-fluid">
        <div class="row px-4 py-5">

            <div class="header-title col-sm-12 col-lg-6">
                <h2>Galería de proyectos</h2>
            </div>

            <div class="header-introduction col-sm-12 col-lg-6">
                <p><?php echo $intro; ?></p>
            </div>
            
        </div>
    </div>
</section>

<!-- Section grid -->
<section class="section-grid">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <!-- Upper menu -->
                <div class="upper-menu col-12 d-flex justify-content-between my-5">

                    <!-- Switch button -->
                    <div class="switch-wrap">
                        <span class="switch-imagen">Imágenes</span>
                        <span class="switch-wrap">
                            <label class="switch position-relative d-inline-block">
                                <input name="view-switch" type="checkbox">
                                <span class="slider position-absolute"></span>
                            </label>
                        </span>
                        <span class="switch-lista">Lista</span>
                    </div>

                    <!-- Filter label -->
                    <div class="filter-label">
                        <p class="filtrar">Filtrar <i class="fa fa-chevron-down"></i></p>
                    </div>

                </div>

                <input type="range" min="1" max="100" value="0" class="range w-100"></input>

                <!-- Filter box -->
                <div class="container-fluid filter-box">
                        <div class="row">
                            <div class="col-12">
                    
                                <div class="selects-wrap p-3 border border-dark position-relative d-flex justify-content-start flex-wrap">

                                    <div class="custom-select position-relative text-dark border-dark">
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

                <!-- GRID -->
                <div class="grid-flex container-fluid p-0">

                    <div class="row">

                        <?php for ($i = 0; $i < 11; $i++) { ?>

                            <div class="grid-project-wrap p-0 col-lg-2 col-sm-12">
                                <div class="grid-project flex-column" data-pais="Spain" data-ciudad="Madrid" data-tipologia="Catalogado" data-producto="Cestita">
                                    <div class="project-title">
                                        <p class="d-inline-block mb-2">Museo del diseño HUB</p>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                        </svg>
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

                        <p class="order-label">Ordenar por</p>

                        <div class="list-menu row w-100">
                                
                            <div data-value="project" class="col order order-proyecto"><span>Proyecto <i class="fa fa-chevron-down"></i></span></div>
                            <div data-value="city" class="col order order-ciudad"><span>Ciudad <i class="fa fa-chevron-down"></i></span></div>
                            <div data-value="country" class="col order order-pais"><span>País <i class="fa fa-chevron-down"></i></span></div>
                            <div data-value="year" class="col order order-ano"><span>Año proyecto <i class="fa fa-chevron-down"></i></span></div>
                            <div class="col order order-producto">Producto</div>

                        </div>

                        <div class="list-wrap d-flex flex-wrap">

                            <?php for ($i = 0; $i < 4; $i++) { ?>

                                <div class="list-project justify-content-between" data-tipologia="Catalogado">
                                    
                                    <p class="col proyecto m-0 p-0">Plaza Mayor
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                        </svg>
                                    </p>
                                    <p class="col Ciudad m-0 p-0">Madrid</p>
                                    <p class="col Pais m-0 p-0">EJPAÑA</p>
                                    <p class="col Ano m-0 p-0">1995</p>
                                    <p class="col Producto m-0 p-0">TMM, NeoRomántico Liviano</p>

                                </div>

                                <div class="list-project justify-content-between" data-tipologia="Redacción">
                                    
                                    <p class="col proyecto m-0 p-0">Museo del diseño HUB
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                        </svg>
                                    </p>
                                    <p class="col Ciudad m-0 p-0">Barcelona</p>
                                    <p class="col Pais m-0 p-0">Spain</p>
                                    <p class="col Ano m-0 p-0">2019</p>
                                    <p class="col Producto m-0 p-0">Rama, NeoRomántico Liviano</p>

                                </div>

                                <div class="list-project justify-content-between" data-tipologia="Redacción">
                                    
                                    <p class="col proyecto m-0 p-0">Fontana di Trevi
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                        </svg>
                                    </p>
                                    <p class="col Ciudad m-0 p-0">Roma</p>
                                    <p class="col Pais m-0 p-0">Italy</p>
                                    <p class="col Ano m-0 p-0">2021</p>
                                    <p class="col Producto m-0 p-0">SíSíSí, NeoRomántico Liviano</p>

                                </div>

                            <?php } ?>

                        </div>
                    
                    </div>
            
                </div>
            </div>
        </div>
    </div>
</section>

<script>

    jQuery(document).ready(function() {

        /** Switch button - Change opacity of selected option */
        jQuery(".switch-imagen").toggleClass('switch-color')

        jQuery(".slider").on('click', function() {
            
            jQuery(".switch-imagen").toggleClass('switch-color')
            jQuery(".switch-lista").toggleClass('switch-color')

            jQuery(".grid-flex").toggle()
            jQuery(".list-flex").toggle()

            apply_filter()
        })

        /** Hover grid project */
        jQuery(".grid-project").mouseenter(function() {
            jQuery(this).find('.bi').css('opacity', '1')
        })
        jQuery(".grid-project").mouseleave(function() {
            jQuery(this).find('.bi').css('opacity', '0')
        })

        /** Hover list project */
        function project_hover() {
            jQuery(".list-project").mouseenter(function() {
                jQuery(this).find('.bi').css('opacity', '1')
            })
            jQuery(".list-project").mouseleave(function() {
                jQuery(this).find('.bi').css('opacity', '0')
            })
        }

        project_hover()

        jQuery(".order").click(function() {
            project_hover()
        })
        

        /** Toggle the filter box */
        jQuery(".filter-label").click(function() {

            jQuery(".filter-box").toggle();
            //'slide', {direction: 'up'}, 500 
        })

        jQuery(".filtrar").click(function() {
            jQuery(this).find("i").toggleClass("fa-chevron-down fa-chevron-up")
        })

        /** APPLY FILTER */

        function apply_filter() {

            let elements = undefined
            let grid = undefined

            if (jQuery(".switch-imagen").hasClass("switch-color")) {
                elements = jQuery(".grid-project")
                grid = true
            } else {
                elements = jQuery(".list-project")
            }

            let filters = jQuery(".select-selected")
            let dict = {}

            for (let i = 0; i < 4; i++) {
                dict[i] = filters[i].innerText
            }

            elements.show()

            elements.filter(function(index, element) {

                let results = []

                if (dict[1] != 'Ciudad') {
                    if (grid) {
                        result = element.dataset.ciudad == dict[1]
                    } else {
                        result = element.children[1].innerText == dict[1]
                    }
                    results.push(result)
                }
                if (dict[0] != 'País') {
                    if (grid) {
                        result = element.dataset.pais == dict[0]
                    } else {
                        result = element.children[2].innerText == dict[0]
                    }
                    results.push(result)
                }
                if (dict[2] != 'Tipologia') {
                    if (grid) {
                        result = element.dataset.tipologia == dict[2]
                    } else {
                        result = element.dataset.tipologia == dict[2]
                    }
                    results.push(result)
                }
                if (dict[3] != 'Producto') {
                    if (grid) {
                        result = element.dataset.producto == dict[3]
                    } else {
                        result = element.children[4].innerText == dict[3]
                    }
                    results.push(result)
                }
                
                console.log(results)
                console.log(results.includes(false))

                return results.includes(false)

            }).hide()

        }

        /** CUSTOM DROP-DOWN MENUS */
        
        <?php $count = 0; ?>

        // Mirem quants customs selects hi ha a la pàgina
        customs = jQuery(".custom-select");
        n_customs = customs.length;
        
        // Per a cada custom drop-down (div):
        for (i = 0; i < n_customs; i++) {

            <?php $count += 5; ?>

            // Agafem el 'tag' select, fill del .custom-select
            select = customs[i].children[0];
            n_options = select.length;
            
            // Creem el div que actuarà com la selecció visible, i posem el text de la primera opció (títol)
            let selected = jQuery('<div/>', {
                text: select[0].innerText,
                class: 'select-selected'
            })
            // Afegim l'icono del chevron
            selected.append('<i class="dropdown fa fa-chevron-down"></i>')

            // Afegim el div recent creat dins el custom-select
            customs[i].append(selected[0]);

            // Creem el div que contindrà la llista d'opcions
            let options = jQuery('<div/>', {
                class: 'select-items select-hide'
            })

            let options_wrap = jQuery('<div/>', {
                class: 'items-wrap'
            }).appendTo(options)

            for (j = 0; j < n_options; j++) {

                // Per cada opció, creem un div i li posem el respectiu text
                let option = jQuery('<div/>', {
                    text: select[j].innerText,
                    class: 'item'
                })

                <?php $count += 1; ?>

                option.append('<span> <?php echo $count; ?></span>')

                // Afegim l'opcio creada a la llista d'opcions
                options_wrap.append(option[0])
                options.append(options_wrap[0])
            }
            // Afegim totes les opcions al custom-select
            customs[i].append(options[0])
        }

        jQuery(".item").click(function() {

            let selected_item = jQuery(this)[0].innerText
            let item_text = selected_item.split(' ')[0]

            jQuery(this).parent().parent().prev().html(item_text)
            jQuery(this).addClass("same-as-selected")
            jQuery(".same-as-selected").removeClass("same-as-selected");

            jQuery(this).parent().parent().prev().append('<i class="fa fa-chevron-down"></i>')

            //let type = jQuery(this).parent().find(".item")[0].firstChild.data

            apply_filter()
        })
       
        jQuery(".select-selected").click(function(e) {
            
            jQuery(".select-items").not(jQuery(this).next()).addClass("select-hide")

            jQuery(this).next().toggleClass("select-hide");

            jQuery(".custom-select").not(jQuery(this).parent()).removeClass("open-close")

            jQuery(this).parent().toggleClass("open-close");

            // Al fer clic a un selector, totes les fletxes es posen cap avall *
            jQuery(".select-selected").not(this).find("i").removeClass("fa-chevron-up")
            jQuery(".select-selected").not(this).find("i").addClass("fa-chevron-down")
            
            // * Menys la que estem seleccionant
            jQuery(this).find("i").toggleClass("fa-chevron-down fa-chevron-up");

            e.stopPropagation();
        })

        jQuery(document).click(function() {

            jQuery(".custom-select").removeClass("open-close")
            jQuery(".select-items").addClass("select-hide")
            jQuery(".select-selected").find("i").removeClass("fa-chevron-up");
            jQuery(".select-selected").find("i").addClass("fa-chevron-down");
        })

        /** ORDER ELEMENTS IN LIST FLEX */

        jQuery(".order span").click(function() {

            let elements = jQuery(".list-project")
            let descendent = false

            if (jQuery(this).find("i").hasClass("fa-chevron-up")) {
                descendent = true
            }

            jQuery(this).find("i").toggleClass("fa-chevron-down fa-chevron-up")

            console.log(jQuery(this).parent().data('value'))

            let filter = undefined
            switch (jQuery(this).parent().data('value')) {
                case 'project': 
                    filter = ".Proyecto"
                    break;
                case 'city':
                    filter = ".Ciudad"
                    break;
                case 'country':
                    filter = ".Pais"
                    break;
                case 'year':
                    filter = ".Ano"
                    break;
            }

            let ordered_elements = elements.sort(function (a, b) {
                if (descendent) {
                    console.log('des ' + jQuery(a).find(filter).text())
                    return jQuery(a).find(filter).text() < jQuery(b).find(filter).text();
                } else {
                    console.log('asc ' + jQuery(a).find(filter).text())
                    return jQuery(a).find(filter).text() > jQuery(b).find(filter).text();
                }
            })

            console.log('ordered ' + ordered_elements.length)

            jQuery(".list-wrap").html(ordered_elements);
            
            jQuery("i").not(jQuery(this).find("i")).removeClass("fa-chevron-up")
            jQuery("i").not(jQuery(this).find("i")).addClass("fa-chevron-down")
            descendent = false
        })

        /** RANGE SLIDER */
        jQuery(".range").change(function() {

            if (jQuery(".range").val() < 33) {

                jQuery(".grid-project-wrap").removeClass("col-6 col-4").addClass("col-12")
                jQuery(".project-title").css('display', 'block')
            }
            
            if (jQuery(".range").val() >= 33) {

                jQuery(".grid-project-wrap").removeClass("col-4 col-12").addClass("col-6")
                jQuery(".grid-project-wrap").css('padding', '0')
                jQuery(".project-title").css('display', 'block')

                jQuery(".grid-flex").removeClass("p-0")
                jQuery(".grid-project").css('padding', '10px')
            }

            if (jQuery(".range").val() >= 66) {

                jQuery(".grid-project-wrap").removeClass("col-6 col-12").addClass("col-4")
                jQuery(".project-title").css('display', 'none')
            }

        })

    })

</script>

<?php
//get_footer();