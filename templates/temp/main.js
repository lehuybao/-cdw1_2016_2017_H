$(document).ready(function(){
    $("#banner").nivoSlider({
        effect:'random',
        pauseTime:5000,
        directionNav:false ,
        controlNav: true,
        pauseOnHover:false,
        autoPlay: true,
    });
});
$(document).ready(function() {
    $("body").lazyScrollLoading({
        lazyItemSelector : ".lazyloading , .lazyloading1 , .lazyloading2",
        onLazyItemVisible : function(e, $lazyItems, $visibleLazyItems) {
            $visibleLazyItems.each(function() {
                $(this).addClass("show");
            });
        }
    });
});
$(document).ready(function(){
    $(document).ready(function(){
        $('#sliderProduct').owlCarousel({
            items: 3,
            scrollPerPage:true,
            autoHeight : true,
            loop:true,
            nav:true,
            dots: false,
            autoplay:true,
            autoplayTimeout:4000,
            slideBy:3,
        });
    });
});
$(document).ready(function(){
    $('#slider-news').slick({
        vertical: true,
        slidesToShow:2,
        slidesToScroll: 1,
        focusOnSelect: true,
        autoplay: true,
        autoplaySpeed: 2000
    });
});
/*
 $(document).ready(function(){
 $(window).load(function() {
 $('#banner').nivoSlider();
 });
 });
 $(document).ready(function(){
 $(".fancybox").on("click", function(){
 $.fancybox({
 helpers: {
 overlay: {
 locked: false
 }
 },
 href: this.href,
 type: $(this).data("type"),
 wrapCSS:'style-img',
 }); // fancybox
 return false
 }); // on
 });
 $(document).ready(function(){
 $('#slider-prod').owlCarousel({
 items: 4,
 scrollPerPage:true,
 autoHeight : true,
 loop:true,
 nav:true,
 dots: false,
 autoplay:true,
 autoplayTimeout:8000,
 slideBy:3,
 });
 });
 $(document).ready(function(){
 $('#slider-prod1').owlCarousel({
 items: 4,
 scrollPerPage:true,
 autoHeight : true,
 loop:true,
 nav:true,
 dots: false,
 autoplay:true,
 autoplayTimeout:8000,
 slideBy:3,
 });
 });
 $(document).ready(function(){
 $('#slideFeeback').owlCarousel({
 items: 3,
 scrollPerPage:true,
 autoHeight : true,
 loop:true,
 nav:true,
 dots: false,
 autoplay:true,
 autoplayTimeout:8000,
 slideBy:3,
 });
 });
 */