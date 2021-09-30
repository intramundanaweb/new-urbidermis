jQuery(document).ready(function ($) {
    /*
    ==============================
    Page: Template-Inicio
    ==============================
    */

    // Change section-contact background on hovering button
    $(".section-contact button").mouseenter(function () {
        $(".wrapper.contact").animate({
            backgroundColor: '#87966e'
        }, 200)
        $(".section-contact button").css('color', '#000')
    }).mouseleave(function () {
        $(".wrapper.contact").animate({
            backgroundColor: '#e5e4dc'
        }, 200)
    })

    // Change section-skin background on hovering buttons 
    $(".skin-buttons button").mouseenter(function () {
        $(".wrapper.skin").animate({
            backgroundColor: '#b4714e'
        }, 200)
        $(".section-skin button").css('color', '#000')
    }).mouseleave(function () {
        $(".wrapper.skin").animate({
            backgroundColor: '#f6f5f1'
        }, 200)
    })

    // Change section-reference background on hovering button
    $(".section-reference button").mouseenter(function () {
        $(".wrapper.reference").animate({
            backgroundColor: '#9dbfcc'
        }, 200)
        $(".section-reference button").css('color', '#000')
    }).mouseleave(function () {
        $(".wrapper.reference").animate({
            backgroundColor: '#f6f5f1'
        }, 200)
    })

    // Parallax effect 'revolución urbana' (try)
    /*let big = $(".big-title-section")

    const html = document.documentElement;
    const canvas = document.getElementById("myCanvas");
    const context = canvas.getContext("2d");

    const frameCount = 4;
    const currentFrame = index => (
    `/new-urbidermis/wp-content/themes/intramundana/vienen_${index.toString().padStart(0, '0')}.png`
    )

    const preloadImages = () => {
    for (let i = 1; i < frameCount; i++) {
        const img = new Image();
        img.src = currentFrame(i);
    }
    };

    const img = new Image()
    img.src = currentFrame(1);
    canvas.width=1903;
    canvas.height=168;
    img.onload=function(){
    context.drawImage(img, 0, 0);
    }

    const updateImage = index => {
    img.src = currentFrame(index);
    context.drawImage(img, 0, 0);
    }

    window.addEventListener('scroll', () => {  
    const scrollTop = big.scrollTop();
    const maxScrollTop = big.height() - window.innerHeight;
    const scrollFraction = scrollTop / maxScrollTop;
    const frameIndex = Math.min(frameCount - 1, Math.ceil(scrollFraction * frameCount));
    
    requestAnimationFrame(() => updateImage(frameIndex + 1))
    });

    preloadImages()*/

});