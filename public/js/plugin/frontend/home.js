function scrolltop() 
{
	var id_button = '.toTop';

	// Kéo xuống khoảng cách 200px thì xuất hiện button
	var offset = 200;

	// THời gian di trượt là 0.5 giây
	var duration = 500;

	// Thêm vào sự kiện scroll của window, nghĩa là lúc trượt sẽ
	// kiểm tra sự ẩn hiện của button
	jQuery(window).scroll(function() {
		if (jQuery(this).scrollTop() > offset) {
			jQuery(id_button).fadeIn(duration);
		} else {
			jQuery(id_button).fadeOut(duration);
		}
	});

	// Thêm sự kiện click vào button để khi click là trượt lên top
	jQuery(id_button).click(function(event) {
		event.preventDefault();
		jQuery('html, body').animate({scrollTop: 0}, duration);
		return false;
	});
}
function swap(image) {
    document.getElementById("image").src = image.href;
    jQuery('#image-view').attr('href', image.href);
	jQuery('#image').elevateZoom({
		zoomType: "inner",
		cursor: "crosshair",
		zoomWindowFadeIn: 155,
		zoomWindowFadeOut: 155
   });
}
jQuery(document).ready(function() {
	var widthwindow1=jQuery(window).width();
	if(widthwindow1>1024){
		jQuery('#image').elevateZoom({
			zoomType: "inner",
			cursor: "crosshair",
			zoomWindowFadeIn: 155,
			zoomWindowFadeOut: 155
		});
	}
    jQuery('#image-view').click(function () {return false;});
	jQuery('.lazy-image').lazyload({
        event : "sporty"
    });
    var timeout = setTimeout(function() {
        jQuery(".lazy-image").trigger("sporty");
    }, 3000);
	
	if(jQuery('ul.menu li .sub-menu').length){
		jQuery('ul.menu li .sub-menu').parent().addClass('par');
	} 
	jQuery('ul.menu li.par .icon-cat').click(function(){
		jQuery(this).parent().toggleClass('active');
		jQuery('ul.menu li.par .sub-menu').slideToggle();
	});
	jQuery('.header-menu .navbar-header a').click(function(){
		jQuery(this).parent().toggleClass('active');
		jQuery('.header-menu .nav.navbar-nav').slideToggle();
	});
	jQuery('.list-recommended ul').bxSlider({
		slideWidth: 263,
		maxSlides: 3,
		slideMargin: 30,
		moveSlides: 1,
		pager: false
	});
	jQuery('.product-thumb ul').bxSlider({
		slideWidth: 85,
		maxSlides: 3,
		slideMargin: 20,
		moveSlides: 1,
		pager: false
	});
	jQuery('#horizontalTab').easyResponsiveTabs({
        type: 'default', //Types: default, vertical, accordion           
        width: 'auto', //auto or any width like 600px
        fit: true,   // 100% fit in a container
        closed: 'accordion', // Start closed if in accordion view
        activate: function(event) { // Callback function if tab is switched
            var tab = jQuery(this);
            var info = jQuery('#tabInfo');
            var name = jQuery('span', info);

            name.text(tab.text());

            info.show();
        }  
    });
	
	jQuery('.toTop').hide();
	scrolltop();
	
});