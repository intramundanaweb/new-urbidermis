/* Custom JS to initialize carousels and sliders */

jQuery(document).ready(function ($) {

  
});
/*
  lanzar el lightbox en los carrusel
  El content selector debe ser siemrpe ese para evitar que abra dos veces
  Repetir codigo para cada carrusel con lightbox cambiando la class de lanzadera
*/
Chocolat(document.querySelectorAll('.lightbox-carrusel'), {
  container: document.querySelector('#carrusel-01'),
  loop: true,
  imageSize: 'contain',
  fullScreen: false,
  allowZoom: true,
  // ...
})
Chocolat(document.querySelectorAll('.lightbox-carrusel-dos'), {
  container: document.querySelector('#carrusel-02'),
  loop: true,
  imageSize: 'contain',
  // ...
})

Chocolat(document.querySelectorAll('.lightbox-carrusel-center'), {
  container: document.querySelector('#carrusel-03'),
  loop: true,
  imageSize: 'contain',
  // ...
})

