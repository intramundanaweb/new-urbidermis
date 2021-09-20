/*
    ==============================
    Page: Galeria-Proyecto
    ==============================
    */

    jQuery(document).ready(function ($) {

        /** Switch button - Change opacity of selected option */
        $(".switch-imagen").toggleClass('switch-color');
        
        $(".slider").on('click', function () {
        
            $(".switch-imagen").toggleClass('switch-color')
            $(".switch-lista").toggleClass('switch-color')
        
            $(".grid-flex").toggle()
            $(".list-flex").toggle()
        
            $(".range").toggle()
        
            apply_filter()

            //check_empty_projects()
        })
        
        
        /** Toggle the filter box */
        $(".filter-label").click(function () {
        
            if (window.mobileCheck()) {
                $(".filter-box").show()
            } else {
                $(this).find(".fa").toggleClass("fa-chevron-down fa-chevron-up")
                $(".filter-box").toggle('slide', {direction: 'up'}, 500);
            }
        })
        
        /** Close the filter box [mobile] */
        $(".filterBox-mobile-chevron").click(function() {
            $(".filter-box").toggle('slide', {direction: 'up'}, 500)
        })
        
        /** APPLY FILTER */
        
        function apply_filter() {
        
            // Aquí es guardaran els elements (projectes)
            let elements = undefined
            // Booleà que ens permet saber quin a quin div reemplaçar (.html()) el contingut filtrat
            let grid = undefined
        
            // Comprovem si estem en el format Grid | Llista
            if ($(".switch-imagen").hasClass("switch-color")) {
                grid = true
                elements = $(".grid-project-wrap")
            } else {
                elements = $(".list-project")
            }
        
            // Agafem els elements (divs) que contenen els strings de les seleccions
            let filters = $(".select-selected")
        
            // Guardem a l'array filter_selections la selecció actual de cada filtre
            let filter_selections = {}
            for (let i = 0; i < 4; i++) {
                filter_selections[i] = filters[i].innerText
            }

            // Sempre, abans de filtrar (amagar) els elements, els mostrem tots per filtrar sobre tots ells
            elements.show()
        
            // Per a cada element (projecte), es mira la seva informació i es comprova que coincideixi o no amb els filtres
            elements.filter(function (index, element) {
        
                // Array de booleans, si conté un 'false', dit element (projecte) no coincideix amb el filtre i s'ha d'amagar
                let results = []
                console.log('start')
                // Si no coincideix amb els noms per defecte vol dir que s'ha escollit alguna altra opció diferent (filtrat)
                if (filter_selections[1] != 'Ciudad') {
                    if (grid) {
                        result = element.childNodes[1].dataset.ciudad == filter_selections[1]
                    } else {
                        result = element.dataset.ciudad == filter_selections[1]
                    }
                    // Afegim a l'array de resultats si la ciutat del projecte coincideix amb la ciutat del filtre
                    results.push(result)
                }
                if (filter_selections[0] != 'País') {
                    if (grid) {
                        result = element.childNodes[1].dataset.pais == filter_selections[0]
                    } else {
                        result = element.dataset.pais == filter_selections[0]
                    }
                    results.push(result)
                }
                if (filter_selections[2] != 'Tipologia') {
                    if (grid) {
                        result = element.childNodes[1].dataset.tipologia == filter_selections[2]
                    } else {
                        result = element.dataset.tipologia == filter_selections[2]
                    }
                    results.push(result)
                }
                if (filter_selections[3] != 'Producto') {
                    if (grid) {
                        result = element.childNodes[1].dataset.producto == filter_selections[3]
                    } else {
                        result = element.dataset.producto == filter_selections[3]
                    }
                    results.push(result)
                }
                $(".grid-row").css('width', '100%')

                // Afegir o esborrar les línies separatòries entre projectes en versió mòvil i format llista
                if (!grid) {
                    if (window.mobileCheck()) {
                        element.nextElementSibling.hidden = false

                        if (results.includes(false)) {
                            element.nextElementSibling.hidden = true
                        }
                    }
                }

                // Si l'array inclou algun 'false', retorna 'true' i doncs, amaga (.hide()) l'element/projecte
                return results.includes(false)
        
            }).hide()
        }

        /** CHECK EMPTY PROJECTS */
        function check_empty_projects() {
            if (window.mobileCheck()) {

                // Si el format actual és de llista
                if ($(".switch-lista").hasClass('switch-color')) {
    
                    if ($($(".list-project").css('display') != 'none').length == 0) {

                        if ($(".not-found").length < 2) {
                            $(".list-wrap").append('<p class="not-found">No se han encontrado proyectos con los filtros seleccionados</p>')
                        }
                    }
                // Si el format actual és de graella
                } else {
                    $(".range").css('opacity', '1')
                    if ($($(".grid-project-wrap").css('display') != 'none').length == 0) {
                        $(".range").css('opacity', '0')
                        
                        if ($(".not-found").length < 2) {
                            $(".grid-flex").append('<p class="not-found">No se han encontrado proyectos con los filtros seleccionados</p>')
                        }
                    }
                } 
            }
        }
        
        
        /** CUSTOM DROP-DOWN MENUS */
        let count = 0;
        
        // Mirem quants customs selects hi ha a la pàgina
        customs = $(".custom-select");
        n_customs = customs.length;
        
        // Per a cada custom drop-down (div):
        for (i = 0; i < n_customs; i++) {
        
            count += 5;
        
            // Agafem el 'tag' select, fill del .custom-select
            select = customs[i].children[0];
            n_options = select.length;
        
            // Creem el div que actuarà com la selecció visible, i posem el text de la primera opció (títol)
            let selected = $('<div/>', {
                text: select[0].innerText,
                class: 'select-selected'
            })
            // Afegim l'icono del chevron
            selected.append('<i class="dropdown fa fa-chevron-down"></i>')
        
            // Afegim el div recent creat dins el custom-select
            customs[i].append(selected[0]);
        
            // Creem el div que contindrà la llista d'opcions
            let options = $('<div/>', {
                class: 'select-items select-hide'
            })
        
            let options_wrap = $('<div/>', {
                class: 'items-wrap'
            }).appendTo(options)
        
            for (j = 0; j < n_options; j++) {
        
                // Per cada opció, creem un div i li posem el respectiu text
                let option = $('<div/>', {
                    text: select[j].innerText,
                    class: 'item'
                })
        
                count += 1;
        
                option.append(`<span> ${count} </span>`)
        
                // Afegim l'opcio creada a la llista d'opcions
                options_wrap.append(option[0])
                options.append(options_wrap[0])
            }
            // Afegim totes les opcions al custom-select
            customs[i].append(options[0])
        }
        
        $(".item").click(function () {
        
            // Agafem el contingut del item clicat i separem el text del número
            let selected_item = $(this)[0].innerText
            let item_text = selected_item.split(' ')[0]
        
            $(this).parent().parent().prev().html(item_text)
            
            $(this).parent().parent().prev().append('<i class="fa fa-chevron-down"></i>')
            
            apply_filter()

            // Mostrem missatge si no es troba cap projecte que coincideixi amb els filtres seleccionats
            check_empty_projects()            
        })
        
        $(".select-selected").click(function (e) {
        
            $(".select-items").not($(this).next()).addClass("select-hide")
        
            $(this).next().toggleClass("select-hide");
        
            $(".custom-select").not($(this).parent()).removeClass("open-close")
        
            $(this).parent().toggleClass("open-close");
        
            // Al fer clic a un selector, totes les fletxes es posen cap avall *
            $(".select-selected").not(this).find("i").removeClass("fa-chevron-up")
            $(".select-selected").not(this).find("i").addClass("fa-chevron-down")
        
            // * Menys la que estem seleccionant
            $(this).find("i").toggleClass("fa-chevron-down fa-chevron-up");
        
            e.stopPropagation();
        })
        
        $(document).click(function () {
        
            $(".custom-select").removeClass("open-close")
            $(".select-items").addClass("select-hide")
            $(".select-selected").find("i").removeClass("fa-chevron-up");
            $(".select-selected").find("i").addClass("fa-chevron-down");
        })
        
        /** ORDER ELEMENTS IN LIST FLEX */
        
        $(".order span").click(function() {
        
            let elements = $(".list-project")
            let descendent = false
        
            if ($(this).find(".fa").hasClass("fa-chevron-up")) {
                descendent = true
            }
        
            $(this).find(".fa").toggleClass("fa-chevron-down fa-chevron-up")
        
            let filter = undefined
            switch ($(this).parent().data('value')) {
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
                    return $(a).find(filter).text() < $(b).find(filter).text();
                } else {
                    return $(a).find(filter).text() > $(b).find(filter).text();
                }
            })
        
            $(".list-wrap").html(ordered_elements);
        
            $(".fa").not($(this).find(".fa")).removeClass("fa-chevron-up")
            $(".fa").not($(this).find(".fa")).addClass("fa-chevron-down")
            descendent = false

            if (window.mobileCheck()) {
                $(".list-project").each(function() {
                    if ($(this).css('display') !== 'none') {
                        $(this).after('<div class="hline-grey my-3"></div>')
                    }
                })
            }

        })
        
        /** RANGE SLIDER */
        $(".range").change(function () {
        
            if ($(".range").val() < 33) {
        
                $(".grid-project-wrap").removeClass("col-6 col-4").addClass("col-12")
                $(".project-title").css('display', 'block')
            }
        
            if ($(".range").val() >= 33) {
        
                $(".grid-project-wrap").removeClass("col-4 col-12").addClass("col-6")
                $(".grid-project-wrap").css('padding', '0')
                $(".project-title").css('display', 'block')
        
                $(".grid-flex").removeClass("p-0")
                $(".grid-project").css('padding', '10px')
            }
        
            if ($(".range").val() >= 66) {
        
                $(".grid-project-wrap").removeClass("col-6 col-12").addClass("col-4")
                $(".project-title").css('display', 'none')
            }
        })
    })