
 $(document).ready(function(){
     $(".popup-member").fancybox({
        padding     : 0,
 		openEffect  : 'elastic',
        closeEffect : 'elastic',
        maxWidth    : '90%',
        maxHeight   : "600px",
        width       : '540px',
        height      : '80%',
        wrapCSS     : 'style-login', 
        helpers     : {
            title   : null
        },
        tpl: { 
            closeBtn: '<div title="Đóng" class="fancybox-item fancybox-close">Đóng <span>X</span></div>' 
        }
     });    
 });

 $(document).ready(function(){
    $(".viewmap").fancybox({
		fitToView	: false,
		closeClick	: false,
		openEffect  : 'elastic',
        closeEffect : 'elastic',
        maxWidth    : "80%",
        minWidth    : "800px",
        maxHeight   : "70%"
    });    
});
  $(document).ready(function(){
    $(".menu-top .form-search .s-title").click(function(){
        if(! $(this).parent().hasClass("show")){
            $(this).parent().addClass("show");
        }else{
            $(this).parent().removeClass("show");
        }
    });
    $(window).bind("click",function(e){
        var $clicked  = $(e.target);
        if(! $clicked.parents().hasClass("form-search")){
            $(".menu-top .form-search").removeClass("show");
        }    
    });
  });
  $(document).ready(function(){
    vnTRUST.goTopStart();
  });