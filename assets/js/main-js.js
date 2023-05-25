/*
 ** This is the main js file.
*/

function college_menu_height(){

    var outer_header_height = jQuery('section#college-header').outerHeight();
    var inner_logo_height  = jQuery('section#college-logo').height();
    var total_menu_item_height = inner_logo_height+20;

    jQuery('section#college-header').css('max-height',outer_header_height+'px');
    jQuery('#college-main-navigation').css('line-height',inner_logo_height+'px');
    jQuery('#college-main-navigation ul li a').not('.sub-menu li a').not('.sub-menu ul li ul li a').css('height',total_menu_item_height+'px');
}
function college_responsive_menu(){
    jQuery('#responsive-menu-button').sidr({
        name:'college-mobile-navigation'
    });
}
function college_slider(){
    var mySwiper = new Swiper ('.swiper-container',{
        loop:true,
        speed: 1500,
        effect:'fade',
        autoplay:5500,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        pagination: '.swiper-pagination',
        paginationClickable: true,
        grabCursor:true,

        onInit:function(mySwiper){
            var active_slide_index = mySwiper.activeIndex;
            var transition = jQuery('.swiper-slide').eq(active_slide_index).find('.college-single-slide > .college-slide-content').attr('data-transition');

            setTimeout(function () {
                jQuery('.swiper-slide').eq(active_slide_index).find('.college-single-slide > .college-slide-content').fadeIn().addClass('animated '+transition);
            },1200);
        },

        onTransitionStart: function(mySwiper) {

            var active_slide_index = mySwiper.activeIndex;
            var transition = jQuery('.swiper-slide').eq(active_slide_index).find('.college-single-slide > .college-slide-content').attr('data-transition');

            setTimeout(function () {
                jQuery('.swiper-slide').eq(active_slide_index).find('.college-single-slide > .college-slide-content').fadeIn().addClass('animated '+transition);
            },1200);
        },
        onTransitionEnd: function(mySwiper) {

         var active_slide_index = mySwiper.previousIndex;
         var transition = jQuery('.swiper-slide').eq(active_slide_index).find('.college-single-slide > .college-slide-content').attr('data-transition');
         jQuery('.swiper-slide').eq(active_slide_index).find('.college-single-slide > .college-slide-content').hide().removeClass('animated '+ transition);

        },
        onSlideChangeEnd: function(mySwiper) {

         var active_slide_index = mySwiper.activeIndex+1;
         var slide_before = mySwiper.previousIndex;
         var transition = jQuery('.swiper-slide').eq(active_slide_index).find('.college-single-slide > .college-slide-content').attr('data-transition');

         jQuery('.swiper-slide').eq(active_slide_index).find('.college-single-slide > .college-slide-content').hide().removeClass('animated '+ transition);
         jQuery('.swiper-slide').eq(slide_before).find('.college-single-slide > .college-slide-content').hide().removeClass('animated '+ transition);

        }
    });

}

function college_matchHeight(){
    jQuery('.matchHeight').matchHeight();
}

jQuery(window).load(function(){
    /** Scripts here run as soon as the website is fully loaded  */
    jQuery('#site-loader').fadeOut();
    college_menu_height();
    jQuery('ul.nav-tabs li:first-child').addClass('active');
});


jQuery(document).ready(function(){
    'use-strict';

    /** Scripts here run as soon as the DOM is ready  */
    college_responsive_menu();
    college_slider();
    college_matchHeight();
});