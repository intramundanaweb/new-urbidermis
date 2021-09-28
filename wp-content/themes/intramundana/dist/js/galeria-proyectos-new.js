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
    })
    
    
    /** Toggle the filter box */
    /* ANTIC $(".filter-label").click(function () {
    
        if (window.mobileCheck()) {
            $(".filter-box").toggle('slide', {direction: 'up'}, 500);
        } else {
            $(this).find(".fa").toggleClass("fa-chevron-down fa-chevron-up")
            $(".filter-box").toggle('slide', {direction: 'up'}, 500);
        }
    })*/
    
    /** Close the filter box [mobile] */
    /*ANTIC $(".filterBox-mobile-chevron").click(function() {
        $(".filter-box").toggle('slide', {direction: 'up'}, 500)
    })*/
    
    /** APPLY FILTER */
    let filter_selections = []
    function apply_filter() {
    
        // Aquí es guardaran els elements (projectes)
        let elements = undefined
        // Booleà que ens permet saber quins elements agafar, els del grid o els de la llista
        let grid = undefined
    
        // Comprovem si estem en el format Grid | Llista
        if ($(".switch-imagen").hasClass("switch-color")) {
            grid = true
            elements = $(".grid-project-wrap")
        } else {
            elements = $(".list-project")
        }

        // Sempre, abans de filtrar (amagar) els elements, els mostrem tots per filtrar sobre tots ells
        elements.show()
    
        // Agafem els elements (divs) que contenen els strings de les seleccions
        let filters = $(".active-filter")
        let n_active_filters = $(".active-filter").length

        if (n_active_filters > 0) {
            for (let i = 0; i < n_active_filters; i++) {
                filter_selections[0] = (filters[i].classList.contains('pais')) ? filters[i].innerText : ''
                filter_selections[1] = (filters[i].classList.contains('ciudad')) ? filters[i].innerText : ''
                filter_selections[2] = (filters[i].classList.contains('categoria')) ? filters[i].innerText : ''
                filter_selections[3] = (filters[i].classList.contains('producto')) ? filters[i].innerText : ''
                filter_selections[4] = (filters[i].classList.contains('tipologia')) ? filters[i].innerText : ''
            }
        } else {
            
        }
        
    
        // Per a cada element (projecte), es mira la seva informació i es comprova que coincideixi o no amb els filtres
        elements.filter(function (index, element) {
    
            // Array de booleans, si conté un 'false', dit element (projecte) no coincideix amb el filtre i s'ha d'amagar
            let results = []
            
            // Si no coincideix amb els noms per defecte vol dir que s'ha escollit alguna altra opció diferent (filtrat)
            if (filter_selections[0] != '') {
                if (grid) {
                    result = element.childNodes[1].childNodes[1].dataset.pais == filter_selections[0]
                } else {
                    result = element.dataset.ciudad == filter_selections[1]
                }
                // Afegim a l'array de resultats si la ciutat del projecte coincideix amb la ciutat del filtre
                results.push(result)
            }
            if (filter_selections[1] != '') {
                if (grid) {
                    result = element.childNodes[1].childNodes[1].dataset.ciudad == filter_selections[1]
                } else {
                    result = element.dataset.pais == filter_selections[0]
                }
                results.push(result)
            }
            if (filter_selections[2] != '') {
                if (grid) {
                    result = element.childNodes[1].childNodes[1].dataset.categoria == filter_selections[2]
                } else {
                    result = element.dataset.tipologia == filter_selections[2]
                }
                results.push(result)
            }
            if (filter_selections[3] != '') {
                if (grid) {
                    result = element.childNodes[1].childNodes[1].dataset.producto == filter_selections[3]
                } else {
                    result = element.dataset.producto == filter_selections[3]
                }
                results.push(result)
            }
            if (filter_selections[4] != '') {
                if (grid) {
                    result = element.childNodes[1].childNodes[1].dataset.tipologia == filter_selections[4]
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

        // Mostrem missatge si no es troba cap projecte que coincideixi amb els filtres seleccionats
        //check_empty_projects()

        //let default_filters = ['Ciudad', 'País', 'Tipologia', 'Producto']

        // Mostrem els filtres actius quan el filter-box està ocult
        /*$(".active-filters").empty()
        filter_selections.forEach(element => {
            if (!default_filters.includes(element)) {
                $(".active-filters").append(`<p class="active-filter ml-3 fs-09 fw-500">${element}<span class="fal fa-times"></span></p>`)
            }
        });*/
    };

    $(".active-filters").on("click", ".active-filter span", function() {

        let parent = $(this).parent()

        if (parent.hasClass('pais')) $(".pais").children().removeClass('text-black')
        else if (parent.hasClass('ciudad')) $(".ciudad").children().removeClass('text-black')
        else if (parent.hasClass('categoria')) $(".categoria").children().removeClass('text-black')
        else if (parent.hasClass('producto')) $(".producto").children().removeClass('text-black')
        else if (parent.hasClass('tipologia')) $(".tipologia").children().removeClass('text-black')

        $(this).parent().remove()
        //ANTIC remove_filter($(this)[0].innerText)
        
        apply_filter()
    });
    

    /*ANTIC function remove_filter(filter_txt) {
        
        // Agafem els elements (divs) que contenen els strings de les seleccions
        let filters = $(".select-selected")
    
        for (let i = 0; i < 4; i++) {
            if (filter_txt == filters[i].innerText) {
                reset_filter(i)
            }
        }
        apply_filter()
    };

    function reset_filter(n_filter) {
        switch(n_filter) {
            case 0:
                $(".select-selected")[0].innerText = 'País'
                break
            case 1:
                $(".select-selected")[1].innerText = 'Ciudad'
                break
            case 2:
                $(".select-selected")[2].innerText = 'Tipologia'
                break
            case 3:
                $(".select-selected")[3].innerText = 'Producto'
                break
        }
    }*/

    /** CHECK EMPTY (NOT FOUND) PROJECTS */
    function check_empty_projects() {

        jQuery(".not-found").remove()

        // Si el format actual és de llista
        if ($(".switch-lista").hasClass('switch-color')) {

            let visible = $(".list-project").filter(function() {
                return $(this).css('display') === 'flex';
            }).length;

            if (visible == 0) {
                $(".list-wrap").append('<p class="not-found">No se han encontrado proyectos con los filtros seleccionados</p>')
            }
        // Si el format actual és de graella
        } else {
            $(".range").css('opacity', '1')
            
            let visible = $(".grid-project-wrap").filter(function() {
                return $(this).css('display') === 'block';
            }).length;

            if (visible == 0) {
                $(".grid-row").append('<p class="not-found ml-3 ml-lg-3">No se han encontrado proyectos con los filtros seleccionados</p>')
                $(".range").css('opacity', '0')
            }
        }
    }
    
    // ANTIC
    /*$(".item").click(function() {
    
        // Agafem el contingut del item clicat i separem el text del número
        let selected_item = $(this)[0].innerText
        let item_text = selected_item.split(' ')[0]
    
        $(this).parent().parent().prev().html(item_text)
        
        $(this).parent().parent().prev().append('<i class="fa fa-chevron-down"></i>')
        
        apply_filter()
    })*/

    /** ADD FILTERS TO ACTIVE FILTERS BAR [AND REMOVE THEM IF IT IS SELECTED ONE OF THE SAME CATEGORY] */
    $(".item").click(function() {

        let selected_filter_category = undefined
        let parent = $(this).parent()
        // Si hem fet clic a una categoria que ja tenia un filtre aplicat, canviar-li el color again a gris
        if (parent.hasClass('pais')) selected_filter_category = 'pais'
            else if (parent.hasClass('ciudad')) selected_filter_category = 'ciudad'
            else if (parent.hasClass('categoria')) selected_filter_category = 'categoria'
            else if (parent.hasClass('producto')) selected_filter_category = 'producto'
            else if (parent.hasClass('tipologia')) selected_filter_category = 'tipologia'

        let item = `<p class="active-filter ${selected_filter_category}">`
        item += $(this)[0].innerText
        item += '<span class="fal fa-times"></span></p>'

        // Comprovem si ja hi ha alguna opció seleccionada (en color negre), i si n'hi ha, l'esborrem de la barra de filtres actius, per després afegir el clicat
        if ($(`.${selected_filter_category}`).find('.text-black').length !== 0) {
            let already_selected = $(`.${selected_filter_category}`).find('.text-black')[0].innerText
            
            $(".active-filter").filter(function() {
                return $(this).text() == already_selected;
            }).hide();
        }

        $(".active-filters").append(item)
        
        // Posem tota la llista a color gris i el element seleccionat/actiu en color negre
        $(`.${selected_filter_category}`).children().removeClass('text-black').addClass('text-grey')

        $(this).removeClass('text-grey').addClass('text-black')

        apply_filter()
    })
    
    /*$(document).click(function () {
    
        $(".custom-select").removeClass("open-close")
        $(".select-items").addClass("select-hide")
        $(".select-selected").find("i").removeClass("fa-chevron-up");
        $(".select-selected").find("i").addClass("fa-chevron-down");
    })*/
    
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
            $(".project-title").css('font-size', '1.1em')
            $(".project-title").css('top', '-25px')

            $(".range").removeClass('mb-3').addClass('mb-5')

            $(".grid-project-wrap a").removeClass('p-2').addClass('p-3')
            $(".grid-row").removeClass('mb-4')
        }
    
        if ($(".range").val() >= 33) {
    
            $(".grid-project-wrap").removeClass("col-4 col-12").addClass("col-6")
            $(".grid-project-wrap").css('padding', '0')

            $(".project-title").css('display', 'block')
            $(".project-title").css('font-size', '.75em')
            $(".project-title").css('top', '-15px')
    
            $(".grid-flex").removeClass("p-0")

            $(".range").removeClass('mb-5').addClass('mb-3')

            $(".grid-project-wrap a").removeClass('p-2').addClass('p-3')
            $(".grid-row").removeClass('mb-4')
        }
    
        if ($(".range").val() >= 66) {
    
            $(".grid-project-wrap").removeClass("col-6 col-12").addClass("col-4")
            $(".project-title").css('display', 'none')

            $(".grid-project-wrap a").removeClass('p-3').addClass('p-2')
            $(".grid-row").addClass('mb-4')
        }
    })
})