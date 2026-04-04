/*#region Home page carousel*/
$(function () {

    const $track = $('#productTrack');
    const $slides = $track.children();
    const slideCount = $slides.length;

    let visibleSlides = 4;
    let index = 0;
    let autoSlide;
    const intervalTime = 4000;

    function getVisibleSlides() {
        if (window.innerWidth < 640) return 1;
        if (window.innerWidth < 1024) return 2;
        return 4;
    }

    function updateDimensions() {
        visibleSlides = getVisibleSlides();
        slideWidth = $('#productCarousel').width() / visibleSlides;
        $('.product-slide').width(slideWidth);
    }

    function cloneSlides() {
        $track.append($slides.clone());
    }

    function moveToSlide(i) {
        index = i;

        $track.css({
            transition: 'transform 0.5s ease',
            transform: `translateX(-${index * slideWidth}px)`
        });

        if (index >= slideCount) {
            setTimeout(function () {
                $track.css('transition', 'none');
                $track.css('transform', 'translateX(0)');
                index = 0;
            }, 500);
        }
    }

    function nextSlide() {
        moveToSlide(index + 1);
    }

    function prevSlide() {
        if (index <= 0) {
            index = slideCount;
            $track.css('transition', 'none');
            $track.css('transform', `translateX(-${index * slideWidth}px)`);
        }
        setTimeout(() => moveToSlide(index - 1), 10);
    }

    $('#nextProduct').click(function () {
        nextSlide();
        resetAuto();
    });

    $('#prevProduct').click(function () {
        prevSlide();
        resetAuto();
    });

    function startAuto() {
        autoSlide = setInterval(nextSlide, intervalTime);
    }

    function resetAuto() {
        clearInterval(autoSlide);
        startAuto();
    }

    // INIT
    let slideWidth;
    updateDimensions();
    cloneSlides();
    startAuto();

    $(window).on('resize', function () {
        updateDimensions();
    });

});
/*#endregion Home page carousel end*/
