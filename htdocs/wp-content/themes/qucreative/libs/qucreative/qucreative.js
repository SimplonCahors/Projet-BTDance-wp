"use strict";


/*
 * Author: ant_farm
 * Website: http://antfarmthemes.com
 * Portfolio: http://themeforest.net/user/ant_farm/portfolio?ref=ant_farm
 * This is not free software.
 * QuCreative
 * Version: 1.08
 */










window.qucreative_env_style_index = 1;
window.qucreative_vc_custom_style_index = 1;
window.dzs_check_lazyloading_images_use_this_element_css_top_instead_of_window_scroll = null;


window.dzs_check_lazyloading_images_toberesized_arr = [];
window.dzs_check_lazyloading_inter = 0;
window.dzs_check_lazyloading_delayed = 0; // -- at 50 we launch the function nonetheless
window.dzs_check_lazyloading_images = function(){
    // console.info('dzs_check_lazyloading_images()');

    function check_scroll() {
        var st = jQuery(window).scrollTop();

        var wh = jQuery(window).height();

        //console.info(st,wh);

        if(window.dzs_check_lazyloading_images_use_this_element_css_top_instead_of_window_scroll){

            st = -(parseInt(window.dzs_check_lazyloading_images_use_this_element_css_top_instead_of_window_scroll.css('top'),10));
        }

        //console.info(st);



        jQuery('img[data-src],.divimage[data-src]').each(function(){
            var _t = jQuery(this);
            //console.info(_t,_t.offset().top,st+wh);

            // console.warn('st - ',st, _t.offset().top, st+wh+140, _t);

            if(_t.offset().top<=st+wh+355){


                var auximg = new Image();



                auximg.onload = function(){


                    //console.info(this,_t,_t.attr('data-src'));

                    if(_t.attr('data-src')){

                        var aux34 = _t.attr('data-src');


                        if(_t.hasClass('divimage')){
                            _t.css('background-image','url('+aux34+')');

                            window.dzs_check_lazyloading_images_toberesized_arr.push(_t);

                            _t.attr('data-responsive_ratio',this.naturalHeight / this.naturalWidth);

                            window.dzs_check_lazyloading_image_resize();
                        }else{
                            _t.attr('src', aux34);
                        }

                        _t.attr('data-src', '');
                        _t.addClass('loaded');
                    }

                    if(_t.hasClass('set-height-auto-after-load')){

                        _t.css('height','auto');
                    }


                    //console.info(_t.parent().parent().parent().parent().parent(), _t.parent().parent().parent().parent().parent().hasClass('.mode-isotope'))
                    if(_t.parent().parent().parent().parent().parent().hasClass('mode-isotope')){
                        //console.info('ceva');

                        var _c = _t.parent().parent().parent().parent().parent();
                        if(_c.get(0) && _c.get(0).api_relayout_isotope){
                            _c.get(0).api_relayout_isotope();
                        }
                    }



                }

                auximg.src=_t.attr('data-src');

                // console.error('auximg.src - ',auximg.src);

            }
        })


        window.dzs_check_lazyloading_inter = 0;
        window.dzs_check_lazyloading_delayed = 0;
    }
    if(window.dzs_check_lazyloading_inter){
        clearTimeout(window.dzs_check_lazyloading_inter);

        window.dzs_check_lazyloading_delayed++;
        if(window.dzs_check_lazyloading_delayed>39){
            check_scroll();
        }
    }

    window.dzs_check_lazyloading_inter = setTimeout(function(){
        check_scroll()
    },50);

}


window.dzs_check_lazyloading_image_resize = function(){
    //console.info("ceva");

    for(var i=0;i<window.dzs_check_lazyloading_images_toberesized_arr.length;i++){
        var _c = window.dzs_check_lazyloading_images_toberesized_arr[i];

        //console.info(_c);

        _c.height(Number(_c.attr('data-responsive_ratio')) * _c.width());
    }
}

if(!(window.dzs_check_lazyloading_images_inited)){

    window.dzs_check_lazyloading_images_inited = false;

    jQuery(window).bind('resize',window.dzs_check_lazyloading_image_resize)
}





window.init_progress_markers=function(){

    var color_outside_circle = '#eeeeee';
    var color_inside_circle = '#333333';
    jQuery('.antfarm-progress-circle').each(function() {
        var _t = jQuery(this);


        if(jQuery('.the-content-sheet.the-content-sheet-dark').find(_t).length>0){
            color_inside_circle='#ffffff';
            color_outside_circle='#444444';
        }
        //console.info(jQuery('.the-content-sheet.the-content-sheet-dark').find(_t).length);


        _t.html(' <div class="dzs-progress-bar skin-prev9copy" style="width:100%; max-width: 150px; height:auto;margin-top:0px;margin-left:auto;margin-right:auto;margin-bottom:0px;" data-animprops=\'{"animation_time":"'+_t.attr('data-animation_time')+'","maxperc":"'+_t.attr('data-maxperc')+'","maxnr":"'+_t.attr('data-maxnr')+'","initon":"scroll"}\'><canvas class="progress-bars-item progress-bars-item--circ" data-type="circ" data-animprops=\'{"height":"{{width}}","circle_outside_fill":"'+color_outside_circle+'","circle_inside_fill":"transparent","circle_outer_width":"1","circle_line_width":"10"}\' style="position: absolute; width: calc(100% + 8px); top: -4px; left: -4px; right: auto; bottom: auto; margin: 0px; color: rgb(255, 255, 255); border-radius: 0px; border: 0px; opacity: 1; font-size: 12px; background-color: transparent;" width="302" height="302"></canvas><canvas class="progress-bars-item progress-bars-item--circ" data-type="circ" data-animprops=\'{"height":"{{width}}","circle_outside_fill":"'+color_inside_circle+'","circle_inside_fill":"transparent","circle_outer_width":"{{perc-decimal}}","circle_line_width":"2"}\' style="position: relative; width: 100%; top: 0px; left: 0px; right: auto; bottom: auto; margin: 0px; color: rgb(255, 255, 255); border-radius: 0px; border: 0px; opacity: 1; font-size: 12px; background-color: transparent;" width="298" height="298"></canvas><div class="progress-bars-item progress-bars-item--text" data-type="text" data-animprops=\'{"left":"{{center}}"}\' style="position: absolute; top: 50%; transform: translate(0,-50%);  margin: 0px; margin-top: -3px; width: 100%; height: auto; right: auto; bottom: auto; color: rgb(33, 33, 33); border-radius: 0px; border: 0px; opacity: 1; font-size: 40px; background-color: transparent;"><h3 style="text-align: center; " data-mce-style="text-align: center;">{{perc}}</h3></div></div>');

        _t.addClass('treated');
    });



    jQuery('.antfarm-progress-line').each(function() {
        var _t = jQuery(this);

        //var auxhtml = _t.html();


        if(jQuery('.the-content-sheet.the-content-sheet-dark').find(_t).length>0){
            color_inside_circle='#ffffff';
            color_outside_circle='#333333';
        }
        // --'+_t.html()+'
        _t.html(' <div class="dzs-progress-bar auto-init skin-prev2copy" style="width:100%;height:auto;margin-top:0px;margin-left:0px;margin-right:0px;margin-bottom:0px;" data-animprops=\'{"animation_time":"'+_t.attr('data-animation_time')+'","maxperc":"'+_t.attr('data-maxperc')+'","maxnr":"'+_t.attr('data-maxnr')+'","initon":"scroll"}\'><div class="progress-bars-item progress-bars-item--text h6" data-type="text" data-animprops=\'{}\' style="position: relative; width: 100%; height: auto; top: 0px; left: 0px; right: auto; bottom: auto; margin: 0px; margin-bottom: 5px; color: rgb(33, 33, 33); border-radius: 0px; border: 0px; opacity: 1;line-height: 1; background-color: transparent;">'+_t.attr('data-title')+'</div><div class="progress-bars-item progress-bars-item--text" data-type="text" data-animprops=\'{"left":"{{perc}}"}\' style="position: absolute; width: 0px; height: auto; top: auto; right: auto; bottom: 35px; margin: 0px 0px 0px 0px; color: #999999; border-radius: 0px; border: 0px; font-size: 14px; background-color: transparent;"><h6 style="text-align: right; position:absolute; right:0; white-space:nowrap; margin-top:0; margin-bottom: 0;  " >{{perc}}</h6></div><div class="progress-bars-item progress-bars-item--rect" data-type="rect" data-animprops=\'{}\' style="position: relative; width: 100%; height: 10px; top: 0px; left: 0px; right: auto; bottom: auto; margin: 0px; color: rgb(255, 255, 255); border-radius: 0px; border: 0px; opacity: 1; font-size: 12px; background-color: '+color_outside_circle+';"></div><div class="progress-bars-item progress-bars-item--rect" data-type="rect" data-animprops=\'{"width":"{{perc}}"}\' style="position: absolute; height: 2px; top: auto; left: 0px; right: auto; bottom: 7px; margin: 0; color: rgb(255, 255, 255); border-radius: 0px; border: 0px; opacity: 1; font-size: 12px; background-color: rgb(34, 34, 34);"></div></div>');

        _t.addClass('treated');
    });

    jQuery('.antfarm-progress-text').each(function() {
        var _t = jQuery(this);





        var h_tag = 'h2';
        var h_class= '';

        if(_t.attr('data-h-tag')){
            h_tag = _t.attr('data-h-tag');
        }

        if(_t.attr('data-h-tag-class')){
            h_class = _t.attr('data-h-tag-class');
        }


        _t.html('<div class="dzs-progress-bar auto-init skin-bignumber" style="width:100%;height:auto;margin-top:0px;margin-left:0px;margin-right:0px;margin-bottom:0px;" data-animprops=\'{"animation_time":"'+_t.attr('data-animation_time')+'","maxperc":"'+_t.attr('data-maxperc')+'","maxnr":"'+_t.attr('data-maxnr')+'","convert_1000_to_k":"'+_t.attr('data-convert-1000-to-k')+'","initon":"scroll"}\'><div class="progress-bars-item progress-bars-item--text" data-type="text" data-animprops=\'{}\' style="position: relative; width: 100%; height: auto; top: 0px; left: 0px; right: auto; bottom: auto; margin: 0px; color: rgb(255, 255, 255); border-radius: 0px; border: 0px; opacity: 1; font-size: 50px; background-color: transparent;"><'+h_tag+' class="'+h_class+'"  style="text-align: center; margin-bottom:0;" ><span style="color: rgb(255, 255, 255); " >{{percmaxnr}}</span></'+h_tag+'></div></div>');

        _t.addClass('treated');
    });

    jQuery('.antfarm-progress-rect').each(function() {
        var _t = jQuery(this);

        if(_t.hasClass('treated')){
            return;
        }


        var color_inside_circle = 'rgb(34,34,34)';
        var color_outside_circle = '';

        var color_opacity_line = '1';
        if(jQuery('.the-content-sheet.the-content-sheet-dark').find(_t).length>0){
            color_inside_circle='#ffffff';
            color_outside_circle='#333333';
            color_opacity_line = '0.25';
        }

        //console.info(_t, _t.children('div[class*="icon-"]'), _t.children('div[class*="icon-"]').length);

        if(_t.children('div[class*="icon-"]').length==0){

            // -- no icon

            _t.html('<div class="dzs-progress-bar auto-init skin-prev3copy" style="width:100%;height:auto;margin-top:0px;margin-left:0px;margin-right:0px;margin-bottom:0px;" data-animprops=\'{"animation_time":"'+_t.attr('data-animation_time')+'","maxperc":"'+_t.attr('data-maxperc')+'","maxnr":"'+_t.attr('data-maxnr')+'","convert_1000_to_k":"'+_t.attr('data-convert-1000-to-k')+'","initon":"scroll"}\'><div class="progress-bars-item progress-bars-item--text h1" data-type="text" data-animprops=\'{}\' style="position: relative; width: 100%; height: auto; top: 6px; left: 0px; right: auto; bottom: auto; margin: 0px 0px 5px 0px; padding-right:20px; color: '+color_inside_circle+'; border-radius: 0px; border: 0px; opacity: 1; line-height: 1; background-color: transparent;">   <div class="h1 h1-for-progress" style="text-align: center;" data-mce-style="text-align: right;"><span>{{percmaxnr}}</span></div>   </div><div class="progress-bars-item progress-bars-item--text h6" data-type="text" data-animprops=\'{}\' style="position: relative; width: 100%; height: auto; top: 0px; left: 0px; right: auto; bottom: auto; margin: 0px 0px 0px 0px; padding-right:20px; padding-bottom:20px; color: '+color_inside_circle+'; border-radius: 0px; border: 0px; opacity: 1;  background-color: transparent;"><div style="text-align: center;" data-mce-style="text-align: center;">'+_t.attr('data-text')+'</div></div><div class="progress-bars-item progress-bars-item--rect" data-type="rect" data-animprops=\'{}\' style="position: absolute; width: 100%; height: 1px; top: auto; left: 0px; right: auto; bottom: 0px; margin: 0px; color: rgb(255, 255, 255); border-radius: 0px; border: 0px; opacity: '+color_opacity_line+'; font-size: 12px; background-color: rgb(205, 205, 205);"></div> <div class="progress-bars-item progress-bars-item--rect" data-type="rect" data-animprops=\'{}\' style="position: absolute; width: 1px; height: 120px; top: auto; left: auto; right: 0px; bottom: 0px; margin: 0px; color: rgb(255, 255, 255); border-radius: 0px; border: 0px; opacity: '+color_opacity_line+'; font-size: 12px; background-color: rgb(205, 205, 205);"></div> </div>');
        }else{

            var aux = _t.children('div[class*="icon-"]').eq(0).get(0).outerHTML;
            _t.html('<div class="dzs-progress-bar auto-init skin-prev3copy" style="width:100%;height:185px;margin-top:0px;margin-left:0px;margin-right:0px;margin-bottom:0px;" data-animprops=\'{"animation_time":"'+_t.attr('data-animation_time')+'","maxperc":"'+_t.attr('data-maxperc')+'","maxnr":"'+_t.attr('data-maxnr')+'","convert_1000_to_k":"'+_t.attr('data-convert-1000-to-k')+'","initon":"scroll"}\'><div class="progress-bars-item progress-bars-item--text" data-type="text" data-animprops=\'{}\' style="position: relative; width: 100%; height: auto; top: 0px; left: 0px; right: auto; bottom: auto; margin: 0px 0px 5px 0px; padding-right:20px;  padding-top: 71px;color: '+color_inside_circle+'; border-radius: 0px; border: 0px; opacity: 1; ;; line-height: 1; background-color: transparent;">    <div class="h1 h1-for-progress" style="text-align: right;" ><span>{{percmaxnr}}</span></div>    </div>    <div class="progress-bars-item progress-bars-item--text h6" data-type="text" data-animprops=\'{}\' style="position: relative; width: 100%; height: auto; top: 0px; left: 0px; right: auto; bottom: auto; margin: -3px 0px 0px 0px; padding-right:20px; padding-bottom:20px; color:'+color_inside_circle+'; border-radius: 0px; border: 0px; opacity: 1; line-height: 1; background-color: transparent;"><div style="text-align: right; " data-mce-style="text-align: right;">'+_t.attr('data-text')+'</div></div>   <div class="progress-bars-item progress-bars-item--rect" data-type="rect" data-animprops=\'{}\' style="position: absolute; width: 100%; height: 1px; top: auto; left: 0px; right: auto; bottom: 0px; margin: 0px; color: rgb(255, 255, 255); border-radius: 0px; border: 0px; opacity: '+color_opacity_line+'; font-size: 12px; background-color: rgb(205, 205, 205);"></div> <div class="progress-bars-item progress-bars-item--rect" data-type="rect" data-animprops=\'{}\' style="position: absolute; width: 1px; height: 185px; top: auto; left: auto; right: 0px; bottom: 0px; margin: 0px; color: rgb(255, 255, 255); border-radius: 0px; border: 0px; opacity: '+color_opacity_line+'; font-size: 12px; background-color: rgb(205, 205, 205);"></div> </div>');

            _t.children('.dzs-progress-bar').prepend(aux);



        }

        _t.addClass('treated');


    });
}



window.init_advanced_scrollers = function(){


    function really_init(){


        //zfolio-portfolio-expandable
        //console.info($('.vplayer-tobe.auto-init-from-q:not(".zfolio-portfolio-expandable .vplayer-tobe.auto-init-from-q")'));

        dzsas_init('.advancedscroller.auto-init-from-q.clients-slider',{
            init_each: true
            ,settings_swipe: "on"
            ,settings_swipeOnDesktopsToo: "on"
            ,design_itemwidth: "16.666667%"
            ,responsive_720_design_itemwidth: "25%"
        });





        //console.info($('.advancedscroller.skin-qucreative.auto-init-from-q'), $('.advancedscroller.skin-qucreative.auto-init-from-q').width(), $('.advancedscroller.skin-qucreative.auto-init-from-q').parent().width());



        $('.advancedscroller.skin-qucreative.auto-init-from-q,.advancedscroller.skin-trumpet.auto-init-from-q').each(function(){
            var _t = $(this);

            //_t.width(870);

            if(_t.hasClass('inited')){

                if(_t.get(0) && _t.get(0).api_handleResize){

                    _t.get(0).api_handleResize();
                }
            }else{
                dzsas_init(_t,{
                    init_each: true
                });
            }

        })


        // console.info($('.advancedscroller.skin-whitefish.auto-init-from-q'));
        $('.advancedscroller.testimonial-ascroller').each(function(){
            var _t = $(this);

            //_t.width(870);

            if(_t.hasClass('inited')){

                if(_t.get(0) && _t.get(0).api_handleResize){

                    _t.get(0).api_handleResize();
                }
            }else{

                var args = {
                    settings_mode: "onlyoneitem"
                    ,design_arrowsize: "0"
                    ,settings_swipe: "on"
                    ,settings_swipeOnDesktopsToo: "on"
                    ,settings_slideshow: "on"
                    ,settings_slideshowTime: "300"
                    ,settings_transition:"slide"
                    ,settings_lazyLoading:'on'
                    ,settings_lazyLoading_load_otheritems_after_loading_first_items:'on'
                    ,settings_autoHeight:'off'
                    ,settings_centeritems:false
                    ,design_bulletspos: "bottom"
                    ,settings_wait_for_do_transition_call: "off"
                    ,settings_transition_only_when_loaded: "off"
                };


                window.temp_options = {};
                if(_t.attr('data-options')){
                    var aux = _t.attr('data-options');




                    try{


                        args = $.extend(args, JSON.parse(aux));

                    }catch(err){
                        console.error(err);
                    }



                }

                dzsas_init(_t,args);
            }

        })



        $('.advancedscroller.skin-nonav.auto-init-from-q:not(".inited")').each(function(){
            var _t21 = $(this);
            var args = {
                init_each: true
                ,settings_swipe: "on"
                ,settings_swipeOnDesktopsToo: "on"
            };

            if(_t21.attr('data-options')){
                var aux = _t21.attr('data-options');


                try{


                    args = $.extend(args, JSON.parse(aux));

                }catch(err){
                    console.error(err);
                }

                //console.info(window.dzssc)

            }

            if(_t21.hasClass('inited')==false){

                dzsas_init(_t21,args);
            }
        })



        $('.advancedscroller.auto-init-from-q').each(function(){
            var _t = $(this);

            //_t.width(870);

            // console.info('trying to init - ',_t,_t.hasClass('inited'));

            if(_t.hasClass('inited')){

                if(_t.get(0) && _t.get(0).api_handleResize){

                    _t.get(0).api_handleResize();
                }
            }else{

                var args = {

                    init_each: true
                    ,settings_swipe: "on"
                    ,settings_swipeOnDesktopsToo: "on"
                };


                window.temp_options = {};
                if(_t.attr('data-options')){
                    var aux = _t.attr('data-options');




                    try{


                        args = $.extend(args, JSON.parse(aux));

                    }catch(err){
                        console.error(err);
                    }

                }

                dzsas_init(_t,args);
            }

        });


        setTimeout(function(){
            $('.testimonial-ascroller').each(function(){
                var _t = $(this);

                if(_t.get(0) && _t.get(0).api_force_resize){
                    _t.get(0).api_force_resize();
                }
            })
        },100)
    }

    var $ = jQuery;

    if(window.dzsas_init){

        really_init();
    }else{
        setTimeout(function(){
            if(window.dzsas_init){

                really_init();
            }else{
                setTimeout(function(){
                    if(window.dzsas_init){

                        really_init();
                    }
                },3000);
            }
        },1000);
    }


};


function getBrowserScrollSize(){

    var css = {
        "border":  "none",
        "height":  "200px",
        "margin":  "0",
        "padding": "0",
        "width":   "200px"
    };

    var inner = jQuery("<div>").css(jQuery.extend({}, css));
    var outer = jQuery("<div>").css(jQuery.extend({
        "left":       "-1000px",
        "overflow":   "scroll",
        "position":   "absolute",
        "top":        "-1000px"
    }, css)).append(inner).appendTo("body")
        .scrollLeft(1000)
        .scrollTop(1000);

    var scrollSize = {
        "height": (outer.offset().top - inner.offset().top) || 0,
        "width": (outer.offset().left - inner.offset().left) || 0
    };

    outer.remove();
    return scrollSize;
}

Object.size = function(obj) {
    var size = 0, key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) size++;
    }
    return size;
};


Math.easeIn = function(t, b, c, d) {

    return -c *(t/=d)*(t-2) + b;

};
(function($) {
    $.fn.descendantOf = function(parentId) {
        return this.closest(parentId).length != 0;
    }
})(jQuery)

window.qcreative_document_ready_ed = false;
window.google_maps_loaded = false;
window.gooogle_maps_must_init = false;



window.init_zoombox_whitefull = {
    settings_zoom_doNotGoBeyond1X:'off'
    ,design_skin:'skin-whitefull'
    ,settings_enableSwipe:'off'
    ,settings_enableSwipeOnDesktop:'off'
    ,settings_galleryMenu:'none'
    ,settings_useImageTag:'on'
    ,settings_fullsize : 'on'
    ,preset_name : 'whitefull'
    ,settings_disablezoom : 'on'
    ,settings_transition : 'fromtop'
    ,settings_transition_gallery: 'helper-rectangle'
    ,settings_transition_out: 'slideup'
    ,settings_disableSocial : 'on'
    ,settings_add_delay_time_for_gallery_transition: 50
    ,settings_add_delay_time_for_transition_in: 20
    ,videoplayer_settings: {
        design_skin: 'skin_reborn'
        ,zoombox_video_autoplay: "off"
    }
    ,settings_extraClasses: ''
    ,settings_holder_con_extra_classes: " scroller-con"
    ,settings_holder_extra_classes: " inner"
    ,settings_callback_func_gotoItem: qcre_callback_for_zoombox
};


window.init_zoombox_darkfull =  {
    settings_zoom_doNotGoBeyond1X:'off'
    ,design_skin:'skin-darkfull'
    ,settings_enableSwipe:'on'
    ,settings_enableSwipeOnDesktop:'on'
    ,settings_galleryMenu:'dock'
    ,settings_useImageTag:'on'
    ,settings_paddingHorizontal : '100'
    ,settings_paddingVertical : '100'
    ,settings_disablezoom:'on'
    ,preset_name : 'darkfull'
    ,settings_transition : 'fade'
    ,settings_transition_out : 'fade'
    ,videoplayer_settings: {
        design_skin: 'skin_reborn'
        ,zoombox_video_autoplay: "off"
        ,settings_youtube_usecustomskin: "off"
        ,settings_video_overlay: "on"
    }
};;



window.scroll_top_object = { 'val' : 0 };

function goclone(source) {
    if (Object.prototype.toString.call(source) === '[object Array]') {
        var clone = [];
        for (var i=0; i<source.length; i++) {
            clone[i] = goclone(source[i]);
        }
        return clone;
    } else if (typeof(source)=="object") {
        var clone = {};
        for (var prop in source) {
            if (source.hasOwnProperty(prop)) {
                clone[prop] = goclone(source[prop]);
            }
        }
        return clone;
    } else {
        return source;
    }
}


function copy(source, deep) {
    var o, prop, type;

    if (typeof source != 'object' || source === null) {
        // What do to with functions, throw an error?
        o = source;
        return o;
    }

    o = new source.constructor();

    for (prop in source) {

        if (source.hasOwnProperty(prop)) {
            type = typeof source[prop];

            if (deep && type == 'object' && source[prop] !== null) {
                o[prop] = copy(source[prop]);

            } else {
                o[prop] = source[prop];
            }
        }
    }
    return o;
}

jQuery(document).ready(function($){
    //console.info('DOCUMENT READY');


    Math.easeIn = function(t, b, c, d) {

        return -c *(t/=d)*(t-2) + b;

    };
    Math.easeOut = function (t, b, c, d) {
        t /= d;
        return -c * t*(t-2) + b;
    };

    if(window.qcreative_document_ready_ed){
        return false;
    }else{
        window.qcreative_document_ready_ed = true;
    }

    $.fn.outerHTML = function() {
        return $(this).clone().wrap('<div></div>').parent().html();
    };

    var BlurStack = function() {
        return {
            r : 0,
            g : 0,
            b : 0,
            a : 0,
            next : null
        }
    };

    var
        _mainBg = null
        ,_body = $('body')
        ,_mainBgConCon = null

        ,_navCon = null
        ,_mainBgTransitioning = null
        ,_navConTranslucentTransitioning = null
        ,_mainGalleryDescs = null
        ,_preloaderCon = null
        ,_theContent = null
        ,_theContentConTr = null
        ,_mainContainer = null
        ,_navCon_520 = null
        ,_theActualNav = null
        ,_upperFooter = null
        ,response_str = null
        ,___response = null
        ,_gallery_thumbs_con = null
        ,_sidebarMain = null
        ,_logoCon = null

        ,_qcre_aux_css = null
        ,_curr_parallaxer = null // -- the current parallax main bg
    ;

    var mainBgImgCSS = '';
    var mainBgImgUrl = '';

    var newclass_body = ''
        ,newclass_body_page = ''
        ,newclass_content_con = ''
        ,newclass_body_nopadding=false
        ,newclass_body_with_fullbg=false
        ,qcre_init_zoombox = false
        ,main_content_loaded=false
        ,sw_native_scrollbar_sidebar_check=false
        ,sw_native_scrollbar_sidebar_check_anim_frame_called=false
    ;

    var ww = 0
        ,wh = 0
        ,st = 0 // -- scrolltop
        ,mainbgoffset = 15
        ,currBgNr = 0
        ,bigimagewidth = 0
        ,bigimageheight = 0
        ,lastcontent_w = 0
        ,gallery_thumbs_img_container_nw = 0 // -- natural width for gallery thumbs image container
        ,gallery_thumbs_img_container_nh = 0
        ,gallery_thumbs_img_container_cw = 0
        ,gallery_thumbs_img_container_ch = 0
        ,gallery_thumbs_img_container_padding_space=20
        ,menu_width = 250
        ,thumbs_padding_left_and_right = 40
        ,thumbs_list_padding_right = 0
        ,menu_height = 0
        ,menu_width_on_right = 0
        ,content_width = 930
        ,force_content_width = 0
        ,force_width_gap = 0
        ,force_width_column = 0
        ,force_width_blur_margin = 0
        ,force_content_gap_width = 0
        ,force_width_section_bg = 0
        ,default_content_width = 930
        ,menu_content_space = 20
        ,native_scrollbar_width = 0

        ,initial_sidebar_offset = 0
        ,initial_theContent_offset = 0

        ,currNr_gallery_w_thumbs = 0


        ,i = 0
        ,bg_slideshow_time = 0
        ,initial_offset = 0
        ,responsive_breakpoint = 1000
        ,border_width = 0
        ,menu_is_scrollable = false
        ,menu_is_scrollable_offset = 0
        ,the_actual_nav_initial_top_offset = -1

        ,css_border_width = 0
    ;

    var bg_transition = "slidedown"
        ,last_bg_transition = "slidedown"
        ,initial_bg_transition = ''
    ;

    var bg_transition_delay = 500

        ,animation_time = 400
        // ,animation_time = 10000
        ,targeth = 0
    ;

    var
        busy_main_transition = false
        ,is_ready_load = false
        ,bg_errored = false
        ,is_ready_transition = false
        ,parallax_reverse = true
        ,is_content_page = false // -- check if it is a content page ( page normal )
        ,allow_resizing_on_blur = true
        ,_cache = null
        ,_cache2_translucentCon = null
        ,_content_translucent_canvas = null
        ,social_scripts_loaded = false
        ,social_scripts_reinit = false
        ,transitioned_via_ajax_first = false // -- set to true when the first ajax transition has been made
        ,first_page_not_transitioned = true// -- only on the first page load, only once
        ,first_bg_not_transitioned = true
        ,first_transition = true
        ,has_custom_outside_content_1 = false
        ,history_first_pushed_state = false
    ;

    var global_image_data = null;


    var scripts_loaded_arr = [];
    var scripts_tobeloaded = [];
    var stylesheets_tobeloaded = [];
    var elements_tobe_added_arr = []
        ,videoplayers_tobe_resized = []
    ;


    var inter_resizing = 0
        ,inter_calculate_dims_light = 0

        ,inter_preseter_scroll = 0
        ,inter_check_if_main_content_loaded = 0
        ,inter_bg_slideshow = 0
        ,handle_frame_id = 0
        ,last_handle_frame_id = 0
    ;


    var old_qcre_options = null
        ,customizer_force_blur = -1
    ;
    var old_zoombox_options = null;
    var zoombox_options = null;


    var _c_for_parallax_items = null;


    var _selectorCon = null
        ,selectorCon_initialOffset = 0

    ;

    var ind_blur = 0

    ;

    var parallaxer_multiplier = 1.3;


    var page_is_fullwidth = false;



    var duration_vix = 20
    ;

    var target_vix = 0
    ;

    var begin_vix = 0
    ;

    var finish_vix = 0
    ;

    var change_vix = 0
    ;





    var duration_viy = 5
        ,target_viy = 0
        ,begin_viy = 0
        ,finish_viy = 0
        ,change_viy = 0
    ;


    var state_curr_menu_items_links = [];

    var menu_type = '';



    var page =''
        ,page_change_ind = 0
        ,page_portfolio_requires_move_filters = false
        ,selector_con_cloned = false
    ;

    var windowhref = ''
        ,ajax_site_url = ''
        ,curr_html = ''
        ,curr_html_with_clear_cache = false
        ,new_bg_transition = 'on' // -- if set to "off" then the initial background will remain
    ;




    var is_menu_horizontal_and_full_bg = false
        ,custom_responsive_menu = false
        ,full_bg_init_y = 0
        ,_full_bg = null
    ;

    var debug_var = false;




    if($('.main-bg-con-con').length>0){
        _mainBgConCon = $('.main-bg-con-con').eq(0);
    }
    _mainContainer = $('.main-container').eq(0);
    _mainBg = $('.main-bg-con').eq(0);
    //console.info(_mainBg);
    _preloaderCon = $('.main-container > .preloader-con');
    _navCon = $('.qucreative--nav-con').eq(0);
    _navCon_520 = $('.qucreative--520-nav-con').eq(0);
    _theActualNav = $('ul.the-actual-nav').eq(0);

    $('div.the-actual-nav').children('ul').addClass('the-actual-nav');


    _logoCon = _navCon.find('.logo-con').eq(0);

    if($('.the-content:not(.the-content-for-preseter)').length>0){
        _theContent = $('.the-content:not(.the-content-for-preseter)').eq(0);
    }


    if($('#qucreative-css-from-js').length>0){
        _qcre_aux_css=$('#qucreative-css-from-js').eq(0);
    }else{


        $('head').append('<style id="qucreative-css-from-js"></style>');
        _qcre_aux_css=$('#qucreative-css-from-js').eq(0);

    }




    if(isiPad){
        _body.addClass('is-ipad');
    }


    var regex = /menu-type-(.*?)( |$)/g;

    var aux = regex.exec(_body.attr('class'));

    if(aux){
        menu_type = 'menu-type-'+aux[1];
    }

    // console.info('menu_type - '+menu_type);


    var auxa = getBrowserScrollSize();

    native_scrollbar_width = auxa.width;


    // -- TBC calculate content width
    default_content_width = content_width;


    //console.log(getBrowserScrollSize());


    var qucreative_options_defaults = {
        images_arr: ['#ffffff']
        ,bg_slideshow_time: "0" // -- slideshow time in seconds. If it 0 then there the background images will not have a slideshow
        ,site_url: 'detect'
        ,enable_ajax: 'on' // -- if this is set to "on" then pages will load without browser reload ( can only be set on init )
        ,page: 'index'
        ,bg_isparallax: 'off'
        ,gallery_w_thumbs_autoplay_videos: 'on' // -- enable the native scrollbar
        ,enable_native_scrollbar: 'on'
        ,blur_ammount: 25
        ,border_width: "0" // -- if set to higher then 0, then a border of n pixels will sorround the site
        ,border_color: "#ffffff"
        ,substract_parallaxer_pixels: 10
        ,content_width: "0" // -- set a custom content width
        ,width_column: "0" // -- set a custom column width
        ,width_gap: "0" // -- set a custom gap width
        ,width_blur_margin: "0" // -- set a custom gap width
        ,content_gap_width: "0" // -- set a custom gap width between columns, needs to be a even value ( in pixels )

        ,menu_scroll_method: "scroll" // -- when the menu height is bigger then the window height, this is an option either to scroll with the mouse wheel ( "scroll" ) or to scroll based on mouse move ( "mousemove" )

        ,responsive_menu_type: "custom" // -- "custom" a custom forged, "select" a select menu for native mobile devices select menu
        ,bg_transition: "slidedown" // -- fade or slidedown
        ,new_bg_transition: "on" // -- if set to "off" then the initial background will remain

        ,video_player_settings: {
            init_each:true
            ,settings_youtube_usecustomskin: "off"
            ,design_skin: "skin_reborn"
            ,settings_video_overlay: "on"
        }
    };

    var qucreative_options_defaults_string = JSON.stringify(qucreative_options_defaults);
    //console.log(qucreative_options_defaults_string);
    if(window.qucreative_options){



        //console.log('this..');
        //var auxer =copy(qucreative_options_defaults);
        window.qucreative_options = $.extend(qucreative_options_defaults, window.qucreative_options);


    }else{
        window.qucreative_options = $.extend({}, qucreative_options_defaults);
    }




    //console.info(window.qucreative_options);


    $(window).scrollTop(0);

    setInterval(function(){
        debug_var=true;
    },1000)




    var regex_bodyclass = /(page-.*?)[ |"]/g;

    //console.log(String($('body').attr('class')))


    setTimeout(function(){
        $('.preseter').css('opacity','');
    },500);


    init();

    function check_animation_time(){


        if(animation_time!=400){
            _qcre_aux_css.html(_qcre_aux_css.html() + 'body .main-container .main-bg-con{ transition-duration: '+(animation_time/1000)+'s } body .main-container .translucent-con--for-nav-con{ transition-duration: '+(animation_time/1000)+'s!important } body .main-container .translucent-con--for-nav-con .translucent-canvas{ transition-duration: '+( (animation_time-100) /1000)+'s } body .main-container .main-bg-con .main-bg-image{ transition-duration: '+( (animation_time-100) /1000)+'s } body .main-container .the-content-con{ transition-duration: '+( (animation_time-100) /1000)+'s!important; }' );
        }

        if(_body.hasClass('qucreative-horizontal-menu')){

            _qcre_aux_css.html(_qcre_aux_css.html() + ' body .main-container .translucent-con--for-nav-con { transition-duration: '+( (animation_time) /6000)+'s!important; }  ' );
        }
    }


    function init(){

        var regex_bodyclass_page = /.*?(page-(?:blogsingle|homepage|gallery-w-thumbs|normal|contact|about|contact|portfolio|portfolio-single))/g;

        var aux23 = regex_bodyclass_page.exec(String($('body').attr('class')));

        newclass_body_page = '';
        if(aux23){
            if(aux23[1]){
                newclass_body_page = aux23[1];
            }
        }

        newclass_content_con = $('.the-content-con').eq(0).attr('class');



        if(isNaN(parseInt(_body.css('border-width'),10)),parseInt(_body.css('border-width'),10)){
            css_border_width = parseInt(_body.css('border-width'),10);
        }

        //console.info(css_border_width);
        //console.info(newclass_body);



        $('.qucreative-option-feed').each(function(){
            var _c = $(this)
            if(_c.length){






                if(_c.attr('data-rel')=='mainoptions'){

                    try{
                        var arg = JSON.parse(_c.html());

                        qcreative_overwrite_mainoptions(arg);

                        // console.info('new options - ',qucreative_options);
                    }catch(err){
                        console.info("CANNOT PARSE", err, aux.html());
                    }
                }


                if(_c.attr('data-rel')=='zoombox-options'){

                    try{
                        var arg = JSON.parse(_c.html());


                        window.init_zoombox_preset = arg.type;

                        // console.info('arg - ',arg);

                    }catch(err){
                        console.info("CANNOT PARSE", err, aux.html());
                    }
                }



                if(_c.attr('data-rel')=='gmaps-styling'){

                    try{

                        window.str_gmaps_styling = _c.html();

                    }catch(err){
                        console.info("CANNOT PARSE", err, aux.html());
                    }
                }









            }
        })




        // console.log('window.qucreative_options - ',window.qucreative_options);

        initial_bg_transition = qucreative_options.bg_transition;
        last_bg_transition = initial_bg_transition;

        new_bg_transition = window.qucreative_options.new_bg_transition;


        if(isNaN(parseInt(window.qucreative_options.border_width,10))==false && parseInt(window.qucreative_options.border_width,10)){
            border_width = parseInt(window.qucreative_options.border_width,10);

        }


        if(border_width>0){

            _body.addClass('with-border');

            _mainContainer.css({
                // 'border': border_width+'px solid '+window.qucreative_options.border_color
                'padding': border_width+'px'
                // ,'width': 'calc(100% - '+border_width*2+'px)'
                // ,'padding-bottom': ''+border_width+'px'
            })

            if(_body.hasClass('qucreative-horizontal-menu') && _body.hasClass('menu-is-sticky')){

                _navCon.css({
                    'top': border_width+'px'
                    ,'left': border_width+'px'
                    ,'width': 'calc(100% - '+border_width*2+'px)'
                })
            }
            if(_body.hasClass('qucreative-vertical-menu')){

                _navCon.find('.translucent-con--for-nav-con').css({
                    'top': -border_width+'px'
                })
            }
            if(_body.hasClass('qucreative-vertical-menu') && _body.hasClass('menu-is-sticky')){

                _navCon.css({
                    'top': border_width+'px'
                    ,'left': border_width+'px'
                    ,'height': 'calc(100% - '+border_width*2+'px)'
                })
            }

            var aux = '';

            aux+='<style class="qucreative-border-css">';
            aux+='.main-gallery--descs { right: '+(0+border_width)+'px } ';
            aux+='.main-gallery-buttons-con { right: '+(30+border_width)+'px } ';
            aux+='.main-gallery-buttons-con { bottom: '+(-30+border_width)+'px } ';
            aux+='.main-gallery-buttons-con.style2 { bottom: '+(30+border_width)+'px } ';
            if(_body.hasClass('qucreative-vertical-menu')) {
                aux += 'nav.qucreative--nav-con { top: ' + (0 + border_width) + 'px } ';
                aux += 'nav.qucreative--nav-con { left: ' + (0 + border_width) + 'px } ';
                aux += 'nav.qucreative--nav-con { height: calc(100% - ' + (border_width * 2) + 'px); } ';
            }
            aux+='</style>'
            $('head').append(aux);
        }

        if(isNaN(parseInt(window.qucreative_options.blur_ammount,10))==false){
            window.qucreative_options.blur_ammount = parseInt(window.qucreative_options.blur_ammount,10);
        }else{

            window.qucreative_options.blur_ammount = 25;
        }

        check_animation_time();




        force_content_width = parseInt(qucreative_options.content_width,10);
        force_width_column = parseInt(qucreative_options.width_column,10);
        force_width_gap = parseInt(qucreative_options.width_gap,10);
        force_width_blur_margin = parseInt(qucreative_options.width_blur_margin,10);
        force_content_gap_width = parseInt(qucreative_options.content_gap_width,10);
        force_width_section_bg = parseInt(qucreative_options.width_section_bg,10);




        if(isNaN(force_width_section_bg)){
            force_width_section_bg = '';
        }

        if(isNaN(force_content_width) || force_content_width==0){
            force_content_width=0;
        }



        if(force_width_section_bg){
            if(isNaN(force_width_column)){

                force_width_column = 56;
            }
            if(isNaN(force_width_gap)){

                force_width_gap = 30;
            }
            if(isNaN(force_width_blur_margin)){

                force_width_blur_margin = 30;
            }
        }
        // console.info('force_width_column' , force_width_column);
        // console.info("force_width_section_bg - ", force_width_section_bg)

        if(isNaN(force_width_column) || force_width_column==0){


        }else{

            // console.info(force_width_column, force_width_gap, force_width_blur_margin, force_width_section_bg);


            if(force_width_section_bg){

            }

            if(force_width_column!=56 || force_width_gap!=30 || force_width_blur_margin!=30 || force_width_section_bg ){


                force_content_width = force_width_column * 12 + force_width_gap * 13 + force_width_blur_margin * 2;


                if(force_width_section_bg){

                    force_content_width = force_width_column * 12 + force_width_gap * 11 + force_width_blur_margin * 2 + 2*force_width_section_bg;
                }


            }


        }







        //console.info('INIT LAZYLOADING');
        if(window.dzs_check_lazyloading_images_inited==false){

            window.dzs_check_lazyloading_images_inited = true;


            $(window).bind('scroll',window.dzs_check_lazyloading_images);
            window.dzs_check_lazyloading_images();
            setTimeout(function(){
                window.dzs_check_lazyloading_images();
            },1500);
            setTimeout(function(){
                window.dzs_check_lazyloading_images();
            },2500);
        }else{
            if(window.dzs_check_lazyloading_images){
                window.dzs_check_lazyloading_images();
                setTimeout(function(){
                    if(window.dzs_check_lazyloading_images) {
                        window.dzs_check_lazyloading_images();
                    }
                },1000);
                setTimeout(function(){
                    if(window.dzs_check_lazyloading_images) {
                        window.dzs_check_lazyloading_images();
                    }
                },2000);
                setTimeout(function(){
                    if(window.dzs_check_lazyloading_images) {
                        window.dzs_check_lazyloading_images();
                    }
                },3000);
            }
        }


        //console.info(qucreative_options.content_width, force_content_width);

        // console.info('force_content_width' , force_content_width);


        // console.info('force_width_gap - ',force_width_gap);


        if(force_width_gap!=30){

            if(isNaN(force_width_gap)){
                force_width_gap = 30;
            }

            _qcre_aux_css.html(_qcre_aux_css.html()+'div.zfolio[data-margin="theme-column-gap"] > .items { margin-left: -'+(force_width_gap/2)+'px; margin-right: -'+(force_width_gap/2)+'px; } div.zfolio[data-margin="theme-column-gap"] .zfolio-item { padding-left: '+(force_width_gap/2)+'px; padding-right: '+(force_width_gap/2)+'px; margin-bottom: '+(force_width_gap)+'px; }');
        }





        if(force_content_width>0){
            content_width = force_content_width;
            default_content_width = content_width;


            var aux23='  .main-container .the-content-con.page-normal:not(.fullit) > .the-content{max-width:'+force_content_width+'px; }        .the-content-con.page-portfolio-single:not(.fullit) > .the-content{ max-width:'+force_content_width+'px; } .main-container .the-content-con:not(.fullit) > .the-content:not(.gallery-thumbs--image-container){ max-width:'+(force_content_width)+'px; } ';




            if(force_width_section_bg){
                aux23+='body .the-content-sheet .the-content-sheet-text:not(.forced-from-no-rows):not(.post-type-post), .flex-for-sc, .the-content-con:not(.page-blogsingle) footer.upper-footer{ padding-left: '+force_width_section_bg+'px; padding-right: '+force_width_section_bg+'px; }';
            }

            aux23+='  .main-container .the-content-con.page-template-template-portfolio:not(.fullit)  > .the-content{ max-width:'+(force_content_width-(force_width_gap*2))+'px; }  ';



            aux23+=' .col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12, div[class*="vc_col-sm-"] >.vc_column-inner  { padding-left: '+(force_width_gap/2)+'px; padding-right: '+(force_width_gap/2)+'px; } .row,.vc_row { margin-left: -'+(force_width_gap/2)+'px; margin-right: -'+(force_width_gap/2)+'px; }';

            aux23+=' .the-content-con > .the-content { padding: '+(force_width_blur_margin)+'px; }';

            if(force_width_blur_margin==0){

                aux23+=' .the-content-con.template-is-default-and-has-one-zfolio > .the-content , .the-content-con.posts-page > .the-content, .the-content-con.page-blogsingle:not(.ceva) > .the-content { padding: 30px; }';
            }

            aux23+=' body .the-content-con.page-normal.fullit > .the-content { padding: '+(force_width_blur_margin)+'px; }';

            if(force_width_blur_margin>30){

                aux23+=' .the-content-con.page-portfolio:not(.fullit) .the-content-inner>.selector-con:first-child{ margin-top: '+(20 - force_width_blur_margin)+'px; }';
            }
            aux23+=' .margin-right-blur-margin { margin-right: '+(force_width_blur_margin)+'px; }';
            aux23+=' .margin-left-blur-margin { margin-left: '+(force_width_blur_margin)+'px; }';
            // aux23+=' .the-content-con.page-portfolio .zfolio + .qc-pagination { margin-top: '+(force_width_gap-30)+'px; }';
            //aux23+=' .the-content-con.page-portfolio .zfolio + .qc-pagination { margin-bottom: '+(force_width_gap-30)+'px; }';



            aux23+=' .the-content-sheet.blog-single-block { margin-bottom: '+force_width_gap+'px; } ';
            aux23+=' body .the-content .the-content-inner + .upper-footer { margin-top: '+force_width_gap+'px; } ';


            // -- TODO: why is force width_gap here
            // aux23+=' .the-content-con.page-normal:not(.fullit) .the-content .the-content-inner:last-child { margin-bottom: '+force_width_gap+'px; } ';


            if(force_width_blur_margin!=30){

                var pt = (30-force_width_blur_margin);


                if(pt<0){

                    aux23+=' .the-content-con > .the-content > .the-content-inner > .selector-con:not(.selector-clone){ margin-top: '+pt+'px; }';
                }else{

                    aux23+=' .the-content-con > .the-content > .the-content-inner > .selector-con:not(.selector-clone){ padding-top: '+pt+'px; }';
                }

            }


            _qcre_aux_css.html(_qcre_aux_css.html()+aux23);
        }
        if(force_content_gap_width>0){
            var aux23=' @media (min-width:992px) { .row{  margin-left:-'+Math.round(force_content_gap_width/2)+'px; margin-right:-'+Math.round(force_content_gap_width/2)+'px; } .col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12{ padding-left:'+Math.round(force_content_gap_width/2)+'px; padding-right:'+Math.round(force_content_gap_width/2)+'px;} .the-content-con > .the-content{ padding: '+force_content_gap_width+'px; }   ';

            aux23+='}';
            _qcre_aux_css.html(_qcre_aux_css.html()+aux23);


        }



        if( _body.hasClass('menu-type-13') ||_body.hasClass('menu-type-14') ||_body.hasClass('menu-type-15') ||_body.hasClass('menu-type-16') ||_body.hasClass('menu-type-17') ||_body.hasClass('menu-type-18') ){
            // console.warn("YES");


            // console.info(_theActualNav);
            _theActualNav.find('> li > .sub-menu').prepend('<svg class="tooltip--icon" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="15px" height="15px" viewBox="0 0 15 15" enable-background="new 0 0 15 15" xml:space="preserve"> <path fill-rule="evenodd" clip-rule="evenodd" fill="#5EBB53" d="M0,0v15h15C6.716,15,0,8.284,0,0z"/> </svg> ')
        }

        windowhref = window.location.href;
        if(window.qucreative_options.enable_ajax == 'on' && window) {


            if(window.qucreative_options.site_url=='detect'){


                var auxa = windowhref.split('/');

                var i = 0;
                for(i in auxa){

                    if(i>0){
                        ajax_site_url+='/';
                    }
                    if(i<auxa.length-1){
                        ajax_site_url+=auxa[i];
                    }


                }
            }else{
                ajax_site_url = window.qucreative_options.site_url;
            }
            //console.log(ajax_site_url);


        }



        if(ieVersion()==11){
            var head= document.getElementsByTagName('head')[0];
            var script= document.createElement('script');
            script.type= 'text/javascript';
            //script.src= 'js/StackBlur.js';
            script.src= 'js/FastBlur.js';
            head.appendChild(script);
        }


        $('.the-actual-nav .menu-item > a').addClass('custom-a');

        $('script').each(function(){
            var _t = $(this);


            if(_t.attr('src')){
                scripts_loaded_arr.push(_t.attr('src'));
            }
            //console.info(_t.attr('src'));

            if(String(_t.attr('src')).indexOf('https://maps.googleapis.com/maps/api')==0){
                window.google_maps_loaded = true;
            }
        });


        $('link').each(function(){
            var _t = $(this);

            //console.info(_t);

            if(_t.attr('rel')=='stylesheet' && _t.attr('href')){
                var aux_href = _t.attr('href');
                if(aux_href.indexOf('./')==0){
                    aux_href = aux_href.replace('./','');
                }
                scripts_loaded_arr.push(aux_href);
            }
        });


        //console.info(_navCon_520,_navCon.children('.logo-con'))




        $(this).scrollTop(0);

        setTimeout(function(){

        },4000);



        if(do_we_need_parallaxer()){
            $('.translucent-canvas').addClass('for-parallaxer');
        }
        //console.info(scripts_loaded_arr)


        if(window.qucreative_options.enable_ajax=='on'){
            if(_body.children('.ajax-preloader').length==0){
                _body.append('<div class="ajax-preloader"><div class="loader"></div></div>');



            }
        }



        determine_page();





        if(_body.hasClass('menu-type-5')||_body.hasClass('menu-type-6')){

            _body.addClass('menu-is-sticky');
        }

        setTimeout(function(){

            reinit({
                'call_from':'init()'
            });
        },500);


        window.qucreative_reinit = reinit;




        setTimeout(function(){



            $('.qucreative--520-nav-con .dzs-select-wrapper-head').bind('click', handle_mouse);
        },1000);



        if(_body.children('#wpadminbar').length){
            $(document).bind('mousemove',mousemove_document);
        }

        $(document).delegate('.main-gallery-buttons-con > *, .qucreative--520-nav-con .dzs-select-wrapper-head, .close-responsive-con, .custom-menu a','click', handle_mouse);
        $(document).delegate('form.for-contact,shortcode-antfarm-contact','submit', handle_submit);


        $(document).on('submit','form.search-form', function(){
            var _t = $(this);

            var _c = (_t.find('*[name=s]')).eq(0);


            // console.info('_c.val() - ',_c.val());
            if(_c.val()==''){


                return false;

            }else{
            }




        });
        $(document).on('click','.services-lightbox--close,.services-lightbox-overlay.active,.services-lightbox,.menu-closer,.menu-toggler,.map-toggler,.contact-form .contact-form-button, .shortcode-antfarm-contact .contact-form-button,.submit-comment,.portfolio-single-liquid-info,.arrow-left-for-skin-qucreative,.arrow-right-for-skin-qucreative,.description-wrapper--icon-con,.submenu-toggler,a[data-vc-container],.qucreative--520-nav-con--placeholder', handle_mouse);

        //console.info($('.qucreative--520-nav-con'));
        $(document).on('click','.gallery-thumbs--image-container .advancedscroller .arrow-right,.gallery-thumbs--image-container .advancedscroller .arrow-left', handle_mouse_for_gallery_w_thumbs);




        $(document).on('click','.zfolio-portfolio-classic a.zfolio-item--inner:not(.not-ajax), .portfolio-link--toback-a, a.portfolio-link--title,a.ajax-link', click_menu_anchor);
        $(document).on('mouseover','.search-submit.screen-reader-text', function(){
            $(this).addClass('hovered');
            $(this).parent().addClass('hovered');
        });
        $(document).on('mouseout','.search-submit.screen-reader-text', function(){
            $(this).removeClass('hovered');
            $(this).parent().removeClass('hovered');
        });



        if(qucreative_options.menu_scroll_method=='mousemove'){

            _navCon.bind('mousemove', handle_mouse);
        }else{

            if (_navCon[0] && _navCon[0].addEventListener){
                _navCon[0].addEventListener('DOMMouseScroll', handle_wheel, false);
                _navCon[0].onmousewheel = handle_wheel;
            }else{
            }
        }
        _body.addClass('menu-scroll-method-'+qucreative_options.menu_scroll_method);


        // $(window).bind('beforeunload',handle_beforeunload);
        $(window).bind('resize',handle_resize);
        handle_resize(null,{
            'redraw_canvas' : false
        });

        $(window).on('scroll.qcre', handle_scroll);

        if(window.addEventListener){

            window.addEventListener('popstate', handle_popstate);
        }

        //console.log(_navCon_520.find('option'));

        //console.info(_navCon, _theActualNav);
        //_theActualNav.find('a').bind('click', click_menu_anchor);


        // console.warn($('.the-actual-nav a'))
        $(document).on('click', '.the-actual-nav a, a.zfolio-item--inner:not(.for-content-opener),.qc-pagination > li > a', click_menu_anchor);
        $('.menu-toggler-target, .logo-con').find('a').bind('click', click_menu_anchor);

        if(_body.hasClass('menu-type-3')||_body.hasClass('menu-type-4')||_body.hasClass('menu-type-5')||_body.hasClass('menu-type-6')||_body.hasClass('menu-type-7')||_body.hasClass('menu-type-8')){

            _theActualNav.children().each(function(){
                var _t = $(this);

                //console.info(_t);
                if(_t.find('ul').length>0){
                    _t.append('<i class="sub-menu-indicator fa fa-chevron-circle-right"></i>');
                }
            })
        }

        goto_bg(0);


        handle_frame();
    }





    function handle_beforeunload(){

    }

    function misc_regulate_nav(){

        //console.info(_navCon);

        regulate_nav();

        return false;

        //if( _body.hasClass('menu-type-5')||_body.hasClass('menu-type-6') ){
        //    _navCon.css({
        //        'top' : $(window).scrollTop() + 'px'
        //    })
        //
        //    if(ww<responsive_breakpoint){
        //
        //    }
        //}

        if(_body.hasClass('page-blogsingle') && _sidebarMain){

            //console.info(_sidebarMain.offset().top);


            //console.info(_theContent.offset().top, _theContent.height(), _sidebarMain.offset().top, _sidebarMain.height())
            //console.info(_sidebarMain.offset().top, _sidebarMain.height(), $(window).scrollTop(),wh, _sidebarMain.offset().top + _sidebarMain.height() + 30 , $(window).scrollTop()+wh)
            if(initial_sidebar_offset + _sidebarMain.height() + 30 < $(window).scrollTop()+wh){
                //console.info('ceva');

                var aux = ($(window).scrollTop()+wh) - (initial_sidebar_offset + _sidebarMain.height() + 30);



                //console.info(aux + initial_sidebar_offset+_sidebarMain.height(), _theContent.offset().top + _theContent.height() );

                if(aux + initial_sidebar_offset + _sidebarMain.height()> _theContent.offset().top + _theContent.height() + 40){
                    aux = _theContent.offset().top + _theContent.height() - _sidebarMain.height() + 40 - initial_sidebar_offset;
                }

                console.warn('aux - ',aux);

                _sidebarMain.css({
                    'top' : aux
                })
            }else{

                _sidebarMain.css({
                    'top' : 0
                })
            }
            if(ww<responsive_breakpoint){

                _sidebarMain.css({
                    'top' : ''
                })
            }
        }
        //();


    }

    function calculate_menu_width(){
        if (_body.hasClass('menu-type-3') || _body.hasClass('menu-type-4')||_body.hasClass('menu-type-5') || _body.hasClass('menu-type-6')) {

            menu_width = 230;
        }
        if (_body.hasClass('menu-type-5') || _body.hasClass('menu-type-6') ) {

            menu_width = 230;

            // console.info('menu_width233 - ' ,menu_width);
        }
        if (_body.hasClass('menu-type-7') || _body.hasClass('menu-type-8') || _body.hasClass('menu-type-11')) {

            menu_width = 260;
        }
        if (_body.hasClass('menu-type-12')) {

            menu_width = 170;
            menu_width_on_right = 200;
        }
    }


    function misc_regulate_nav_native(){


        // console.warn("before enter frame check ",sw_native_scrollbar_sidebar_check,page_portfolio_requires_move_filters,sw_native_scrollbar_sidebar_check_anim_frame_called );

        duration_viy = 10;


        if( (sw_native_scrollbar_sidebar_check || page_portfolio_requires_move_filters) && sw_native_scrollbar_sidebar_check_anim_frame_called==false){


            // sw_native_scrollbar_sidebar_check_anim_frame_called=true;
            handle_frame_nav_native();
            // requestAnimFrame(misc_regulate_nav_native);
        }else{
            if(ww>999){

                regulate_nav();
            }
        }

    }

    function handle_frame_nav_native(){

        // console.info('handle_frame_nav_native');
        // console.info(_selectorCon);

        var reinit_move_filters = false;
        // if(  sw_native_scrollbar_sidebar_check_anim_frame_called){
        if(  1){


            if(page_portfolio_requires_move_filters){

                page_portfolio_requires_move_filters = false;
                reinit_move_filters = true;
            }




            if (_selectorCon) {



                _selectorCon.css({
                    'top': '',
                    'bottom': '',
                    'position': '',
                    'width': '',
                    'left': ''
                })


                if(st>0 || selector_con_cloned){


                     // _selectorCon.next().offset().top

                    if(_selectorCon.next().hasClass('selector-clone')){
                        selectorCon_initialOffset = _selectorCon.next().offset().top - _selectorCon.next().outerHeight();
                        // console.info(_selectorCon.next().offset().top)
                    }
                    var aux_bottom = selectorCon_initialOffset;

                    var _sidebarMain_width = _selectorCon.outerWidth();


                    var of_left = _selectorCon.offset().left;


                    if(selector_con_cloned==false && _selectorCon.next().hasClass('selector-clone')==false){

                        _selectorCon.after(_selectorCon.clone());
                        selector_con_cloned = true;
                        _selectorCon.next().addClass('selector-clone');
                        _selectorCon.next().show();
                        _selectorCon.next().css({
                            'opacity':'0'
                            ,'margin-bottom':'0'
                            ,'position':'relative'
                            ,'height':_selectorCon.outerHeight()
                        });
                    }


                    _selectorCon.css({
                        'top': aux_bottom,
                        'position': 'fixed',
                        'width': _sidebarMain_width + 'px',
                        'left': of_left + 'px'
                    })
                }else{

                    if(selector_con_cloned){

                        // _selectorCon.next().hide();
                    }
                }


            }

            regulate_nav();
            // handle_frame_id = requestAnimFrame(handle_frame_nav_native);

            if(last_handle_frame_id==0){
                // last_handle_frame_id = handle_frame_id;
            }

            // console.info('handle_frame_id - ',handle_frame_id);
            if(window.qucreative_options.enable_native_scrollbar=='on') {
            }
        }

        if(reinit_move_filters){

            page_portfolio_requires_move_filters = true;
        }
    }




    function reinit(pargs){


        var margs = {
            'call_from': 'default'
        };

        if(pargs){
            margs = $.extend(margs,pargs);
        }


        sw_native_scrollbar_sidebar_check = false;

        // console.warn('reinit()', margs);


        if(_body.hasClass('menu-type-5')||_body.hasClass('menu-type-6')){

            _body.addClass('menu-is-sticky');
        }

        var auxa = String(window.location.href).split('/');


        var aux2 = auxa[auxa.length-1];

        if(window.qucreative_options){
            // -- then it is wordpress
            if(window.qucreative_options.site_url){

                aux2 = window.location.href;
            }
        }

        if(aux2.indexOf('?')>-1){
            //console.info(aux2);

            if(aux2.indexOf('clearcache=on')>-1){

                curr_html_with_clear_cache = true;
            }
            curr_html = aux2.split('?')[0];
        }else{
            curr_html=aux2;
        }
        if(curr_html==''){
            curr_html = '';
        }
        qcreative_curr_html = curr_html;



        // console.info('curr_html - ', auxa,aux2,curr_html);

        //console.info(page_is_fullwidth, _mainContainer.hasClass('fullit'));


        //$(document).scrollTop(0);


        setTimeout(function(){

            _body.removeClass('q-ajax-transitioning');

            $('.widget_text .textwidget').addClass('font-group-6');
        },100)
        _body.removeClass('qtransitioning');
        _body.removeClass('page-is-fullwidth');




        if(margs.call_from=='init()'){


            //console.info(window.qucreative_options.bg_isparallax, _body.hasClass('page-homepage'),_body.hasClass('page-gallery-w-thumbs'));
            if( window.qucreative_options.bg_isparallax=='on' && _body.hasClass('page-homepage')==false && _body.hasClass('page-gallery-w-thumbs')==false ) {

                //var args = {  mode_scroll: "fromtop", animation_duration : '20', is_fullscreen: "on", init_functional_delay: "10000",init_functional_remove_delay_on_scroll: "off" };
                //if(parallax_reverse){
                //    args.direction = "reverse";
                //}
                setTimeout(function () {

                }, 30000);
                setTimeout(function () {

                    if(_mainBgTransitioning){

                        _mainBgTransitioning.addClass('dzsparallaxer');
                        _mainBgTransitioning.children('.main-bg').addClass('dzsparallaxer--target');
                        //_mainBgTransitioning.addClass('stickto100');
                    }

                    //console.log(args);


                }, 500);

            }
        }

        if(_theContent){
            // console.info(_theContent.find('.sc-final-closer'));
            _theContent.find('.sc-final-closer').each(function(){
                var _t = $(this);

                // console.info(_t, _t.html(),_t.parent().parent().parent().parent().children(),_t.parent().parent().parent().parent().children().length);
                if(_t.html()==''){

                    // console.warn(_t.parent().parent().parent().parent().children().length);
                    // if(_t.parent().parent().hasClass('vc_col-sm-12')){
                    //     _t.parent().parent().parent().remove();
                    // }

                    if(_t.parent().parent().parent().parent().children().length==1){
                        _t.parent().parent().parent().parent().parent().remove();
                    }
                    if(_t.parent().parent().parent().parent().children().length==2){
                        // console.log(_t.parent().parent().parent().parent().children().eq(1), _t.parent().parent().parent().parent().children().eq(1).get(0).outerHTML)

                        var _c = _t.parent().parent().parent().parent().children().eq(1);

                        if(_c.children().length==1 && _c.find('.wpb_wrapper').length==1 && _c.find('.wpb_wrapper').html()==''){

                            _t.parent().parent().parent().parent().parent().remove();
                        }
                    }
                }
            });


            _theContent.find('.delete-prev-cst').each(function(){
                var _t = $(this);

                if(_t.prev().hasClass('the-content-sheet-text')){

                    _t.prev().hide();
                }
            })

            _theContent.find('.wpb_wrapper').each(function(){
                var _t = $(this);

                // console.info(_t);

                if(_t.children().last().hasClass('vc_empty_space')){
                    _t.parent().append(_t.children().last());
                }
            })


            _theContent.find('.delete-prev-section').each(function(){
                var _t = $(this);

                if(_t.prev().hasClass('the-content-sheet')){

                    _t.prev().hide();
                }
            })
            _theContent.find('.wpb_wrapper').each(function(){
                var _t = $(this);

                // console.info(_t, _t.html())
                if(_t.html()==''){

                    // console.info(_t.parent().parent());
                    if(_t.parent().parent().hasClass('vc_col-sm-12')){
                        _t.parent().parent().parent().remove();
                    }
                }
            });

            _theContent.find('.vc_empty_space,.qucreative-divider-from-element').each(function(){
                var _t = $(this);


                var _con = null;

                if(_t.parent().parent().parent().hasClass('vc_row')){
                    _con = _t.parent().parent().parent();
                }

                if(_t.parent().parent().parent().parent().hasClass('vc_row')){
                    _con = _t.parent().parent().parent().parent();
                }


                // console.info("_t.parent().parent().parent().parent() for vc_empty_space - ",_t.parent().parent().parent().parent(), _t);

                if(_con){

                    var _chtml = _con.html();
                    // console.warn('_con.html() -> ', _chtml);
                    // console.warn('_chtml.length -4', _chtml.length);
                    // console.warn('_chtml.indexOf(\'12\') ', _chtml.indexOf('12'));


                    if(_chtml.indexOf('12')>-1){
                        if(_chtml.length < 290){

                            _con.addClass('no-margin-bottom');
                        }
                    }
                }
                // console.info("_t.parent().parent().parent().parent() for vc_empty_space - ",_t.parent().parent().parent().parent(), _t);
                //
                // if(_t.parent().parent().parent().parent().hasClass('vc_row')){
                //
                //     _t.parent().parent().parent().parent().addClass('no-margin-bottom');
                // }
            })

            _theContent.find('.wpb_wrapper .antfarm-divider').each(function(){
                var _t = $(this);




                var __par = _t.parent().get(0);

                // console.info('__par -> ' ,__par);
                if(__par && __par.nodeName == 'P'){
                    // console.info(__par);

                    if(__par.className==''){
                        if(__par){
                            if(__par.outerHTML){

                                // console.info('__par.outerHTML - ',__par.outerHTML);
                                if(String(__par.outerHTML).length<290){

                                    $(__par).css({
                                        'margin-top':'0'
                                        ,'margin-bottom':'0'
                                        ,'font-size':'0'
                                        ,'line-height':'1'
                                    })
                                }
                            }
                        }
                    }
                }


            })
            _theContent.find('.antfarm-video-text').each(function(){

                var _t = $(this);

                var _con = null;


                if(_t.parent().parent().parent().parent().parent().parent().hasClass('the-content-sheet')){
                    _con = _t.parent().parent().parent().parent().parent().parent();
                }else{
                    if(_t.parent().parent().parent().parent().parent().hasClass('the-content-sheet')){
                        _con = _t.parent().parent().parent().parent().parent();
                    }
                }

                if(_con){
                    _con.next().css({
                        'position':'static'
                    })
                    _con.next().children('.featured-media-con').css({
                        'position':'static'
                    })
                    _con.next().children('.featured-media-con').children('.section-featured-media').css({
                        'position':'static'
                    })
                }
            })

            // console.warn(_theContent);

            var _ctl = _theContent.find('.translucent-layer').eq(0);
            if(_ctl.hasClass('colorize-layers')){
                if(_ctl.hasClass('custom-color')==false && _ctl.hasClass('custom-opacity')==false){
                    if(_body.hasClass('body-style-light')){

                        _theContent.find('.translucent-con .translucent-overlay').css('background-color','#eeeeee');
                        _theContent.find('.translucent-layer').eq(0).css('background-color','#fff');
                    }else{

                        _theContent.find('.translucent-con .translucent-overlay').css('background-color','#333333');
                        _theContent.find('.translucent-layer').eq(0).css('background-color','#222222');
                    }
                }
            }

            if(_theContent.find('.upper-footer').length){
                _upperFooter = _theContent.find('.upper-footer').eq(0);
            }else{
                _upperFooter = null;
            }



            // console.info("SET DEFAULT HERE",qucreative_options.images_arr);




            if(qucreative_options.images_arr.length==1){


                if(qucreative_options.images_arr[0]=='#ffffff'){
                    _body.addClass('bg-default-ffffff');
                    if(_theContent){
                        _theContent.parent().addClass('bg-default-ffffff');
                    }
                }else{

                    _body.removeClass('bg-default-ffffff');
                    if(_theContent){
                        _theContent.parent().removeClass('bg-default-ffffff');
                    }
                }
            }

            if(_theContent && _theContent.find('.post-password-form').length){
                _theContent.find('.post-password-form input[type=submit]').addClass('antfarm-btn btn-read-more style-default padding-small');
            }

        }




        function call_scroll_for_parallaxer(arg,argx,argy){
            //console.info('scroll is called', arg,argx, argy);

            window.scroll_top_object.val -= argy;

            if(window.scroll_top_object.val<0){
                window.scroll_top_object.val = 0;
            }

            //console.info('first', window.scroll_top_object.val);

            if(_curr_parallaxer && _curr_parallaxer.get(0) && _curr_parallaxer.get(0).api_handle_scroll){
                _curr_parallaxer.get(0).api_handle_scroll();
            }

            if(window.dzs_check_lazyloading_images_inited){
                window.dzs_check_lazyloading_images();
            }

            setTimeout(function(){

            },100);






        }


        // console.info(window.qucreative_options, window.dzsscr_init);
        if(window.qucreative_options.enable_native_scrollbar!='on' && get_query_arg(window.location.href, 'disable_scrollbar')!=='on' && window.dzsscr_init){

            var args = {
                'type':'scrollTop'
                ,'settings_skin':'skin_apple'
                ,enable_easing: 'on'
                ,settings_autoresizescrollbar: 'on'
                ,settings_chrome_multiplier : 0.12
                ,settings_firefox_multiplier : -3
                ,settings_safari_multiplier: 0.25
                , settings_ie_multiplier: 0.8 //scrollmultiplier for ie
                ,settings_refresh: 700
            };



            // console.info("ENABLE SCROLLBAR");


            // console.error("INIT SCROLLBAR");

            if(window.has_preseter){
                setTimeout(function(){
                    window.dzsscr_init($('.main-container'),args);
                },1000);
            }else{

                window.dzsscr_init($('.main-container'),args);
            }



            if(_body.hasClass('with-border')){
                //console.log($('.main-container'), $('.main-container').get(0).api_set_action_handle_wheel_end);
                // $('.main-container').get(0).api_set_action_handle_wheel_end(call_scroll_for_parallaxer);
            }


            if(_mainContainer.get(0) && _mainContainer.get(0).api_set_action_handle_frame){

                _mainContainer.get(0).api_set_action_handle_frame(misc_regulate_nav);
            }




        }else{
            $('html').addClass('has-native-scrollbar');
        }





        if(_theContent && _theContent.find('.sidebar-main').length>0){

            // console.info(_theContent);
            _sidebarMain = _theContent.find('.sidebar-main').last();

            // console.warn('_sidebarMain - ',_sidebarMain);


            //force_width_blur_margin
            initial_sidebar_offset = _sidebarMain.offset().top ;

            // initial_theContent_offset = _theContent.offset().top + border_width;
        }else{
            _sidebarMain = null;

            initial_sidebar_offset =0;
            initial_theContent_offset=0;
        }



        if(window.qucreative_options.enable_native_scrollbar=='off' ||window.qucreative_options.enable_native_scrollbar=='on'){



            // console.info("CHECK IF WE NEED SIDEBAR SCROLLING FOR NATIVE SCROLLBAR", _sidebarMain)

            if(_sidebarMain && $('.col-content').eq(0).height() > wh){
                sw_native_scrollbar_sidebar_check = true;

                misc_regulate_nav_native();
            }
        }


        if(is_touch_device()){

            $('html').addClass('has-native-scrollbar');
        }


        //console.info('social_scripts_reinit', social_scripts_reinit)
        if(social_scripts_reinit){
            //console.info('REINIT SOCIAL SCRIPS');
            if(window.FB && FB.XFBML && FB.XFBML.parse){
                //console.info('REINIT SOCIAL SCRIPS - FB');
                FB.XFBML.parse();
            }


            if(window.twttr && window.twttr.widgets && window.twttr.widgets.load){
                //console.info('twitter - load');
                twttr.widgets.load()
            }
        }



        if(_mainContainer.find('.the-content-con').eq(0).hasClass('fullit')){
            page_is_fullwidth=true;
        }

        if(page=='page-gallery-w-thumbs'||page=='page-homepage'){

            page_is_fullwidth=true;
        }

        selector_con_cloned = false;
        is_menu_horizontal_and_full_bg = false;
        if(page_is_fullwidth){

            $("body").addClass('page-is-fullwidth');


            if (_body.hasClass('menu-type-9') || _body.hasClass('menu-type-10') || _body.hasClass('menu-type-13') || _body.hasClass('menu-type-14') || _body.hasClass('menu-type-15') || _body.hasClass('menu-type-16') || _body.hasClass('menu-type-17') || _body.hasClass('menu-type-18')) {
                is_menu_horizontal_and_full_bg = true;


                //console.log($('.fullbg').eq(0).css('top'));





            }
        }



        var the_select_str ='<select class="dzs-style-me-from-q skin-justvisible " name="the_layout"> <option value="default">default</option> <option value="random">random</option> </select>';

        //console.info(qucreative_options.responsive_menu_type);
        if(qucreative_options.responsive_menu_type=='custom'){

            the_select_str = '';
        }

        var the_custom_menu_str = '';
        if(qucreative_options.responsive_menu_type=='custom'){

            the_select_str = '';

            the_custom_menu_str = '<div class="custom-responsive-menu"><div class="close-responsive-con"><i class="fa fa-times"></i></div><div class="custom-menu-con"><ul class="custom-menu"></ul></div></div>';


        }


        // console.info('_theContent - ',_theContent);
        if(_theContent && _theContent.length){
            //console.info(the_select_str, window.qucreative_options.responsive_menu_type, _theContent);
            if(_theContent.parent().children('.qucreative--520-nav-con').length==0){



                _theContent.parent().prepend('<div class="qucreative--520-nav-con "> <div class="dzs-select-wrapper skin-justvisible "> <div class="dzs-select-wrapper-head"> <div class="nav-wrapper-head bg-color-hg"><i class="fa fa-bars"></i></div> </div> '+the_select_str+' </div>'+the_custom_menu_str+' </div>');


                _navCon_520 = _theContent.parent().children('.qucreative--520-nav-con').eq(0);
            }


            var _c = _theContent.find('.responsive-featured-media-con').eq(0);
            if(_c.length>0){
                //console.info('ceva');

                if(_c.children().length==0){
                    if(_theContent.find('.responsive-featured-media-con--target').length>0){
                        //console.info(_theContent.find('.responsive-featured-media-con--target'),_theContent.find('.responsive-featured-media-con--target').html());


                        _c.append(_theContent.find('.responsive-featured-media-con--target').html());

                        if(_theContent.find('.responsive-featured-media-con--target').eq(0).hasClass('advancedscroller-con')){

                            _c.children('.advancedscroller').removeClass('skin-nonav').addClass('skin-qucreative').height(400);
                            _c.children('.advancedscroller').attr('data-options','{ settings_mode: "onlyoneitem",design_arrowsize: "0" ,settings_swipe: "on" ,settings_autoHeight: "on",settings_autoHeight_proportional: "on",settings_swipeOnDesktopsToo: "on" ,settings_slideshow: "on" ,settings_slideshowTime: "150" }');

                        }

                    }
                }


                if(_c.children().length==0){
                    if(_theContent.find('.responsive-featured-media-con--target').length==0){

                        var aux = $('.main-bg-div').eq(0).css('background-image');




                        var the_bg = window.qucreative_options.images_arr[0];



                        if(window.qucreative_options.the_background){
                            the_bg = window.qucreative_options.the_background;
                        }
                        // console.warn('the_bg - ',the_bg);

                        var aux2 = '<img src="'+the_bg+'" class="fullwidth"/>';

                        //console.log(window.qucreative_options);

                        _c.append(aux2);
                        //_c.append();
                        //_c.children('.main-bg-div').height(400);
                    }
                }


            }
        }else{

            // console.info('page - ',page);
            if(page=='page-homepage'){



                if($('.the-content-con').eq(0).children('.qucreative--520-nav-con').length==0){

                    // console.info('$(\'.the-content-con\').eq(0) - ',$('.the-content-con').eq(0));

                    $('.the-content-con').eq(0).prepend('<div class="qucreative--520-nav-con "> <div class="dzs-select-wrapper skin-justvisible "> <div class="dzs-select-wrapper-head"> <div class="nav-wrapper-head  bg-color-hg"><i class="fa fa-bars"></i></div> </div> '+the_select_str+' </div>'+the_custom_menu_str+'</div>');


                    _navCon_520 = $('.the-content-con').eq(0).children('.qucreative--520-nav-con').eq(0);
                }

            }

        }


        if(_theContent && _theContent.parent()){

            // console.info('_theContent.parent() - ',_theContent.parent(), $('.main-container > .scrollbar'));

            setTimeout(function(){

                // console.info('_theContent.parent() timeout - ',_theContent.parent(), $('.main-container > .scrollbar .scrollbary'));


                if(_theContent.parent().attr('data-scrollbar-theme')=='light'){
                    $('.main-container > .scrollbar .scrollbary').css({
                        'background-color':'rgba(255,255,255,0.5)'
                    })
                }else{

                    $('.main-container > .scrollbar .scrollbary').css({
                        'background-color':''
                    })
                }
            },1000);

            _selectorCon = null;


            if($('.selector-con').length){
                _selectorCon =  $('.selector-con').eq(0);

                selectorCon_initialOffset = _selectorCon.offset().top - $(window).scrollTop();
                // console.info('selectorCon_initialOffset - ',selectorCon_initialOffset);

            }

        }


        if(_theContent){
            if(_sidebarMain || _upperFooter){
                var _cal = $('.calendar_wrap');

                if(_cal.length){
                    _cal.each(function(){
                        var _t2 = $(this);

                        // console.info(_t2,_theContent);

                        _t2.find('table').addClass('h-group-1');
                        _t2.find('table > caption').addClass('h-group-1');
                        _t2.find('a').addClass('custom-a');

                        _t2.find('tfoot #prev a').eq(0).addClass('calendar-arrow-left').html('<i class="fa fa-chevron-left"></i>');
                        _t2.find('tfoot #next a').eq(0).addClass('calendar-arrow-right').html('<i class="fa fa-chevron-right"></i>');

                        _t2.find('*[colspan]').each(function(){
                            var _t3 = $(this);

                            if(_t3.hasClass('treated')){
                                return;
                            }

                            var len = Number(_t3.attr('colspan')) - 1;


                            _t3.addClass('treated');
                            if(len){

                                // console.info('len - ',len, _t3);
                                for(var i = 0;i<len;i++){
                                    _t3.after('<td> </td>');
                                }
                            }
                        })


                        // _t2.find('td').each(function(){
                        //     var _t3= $(this);
                        //
                        //     if(_t3.children().length==0){
                        //         _t3.wrapInner('<span class="the-number"></span>')
                        //     }
                        // })
                    })
                }

                $('.widget_meta.widget,.widget_archive.widget,.widget_categories.widget,.widget_pages.widget,.widget_nav_menu.widget,.widget_rss.widget,.widget_recent_entries.widget').each(function(){
                    var _t2 = $(this);

                    _t2.find('ul').addClass('links-list');
                    _t2.find('ul li').addClass('font-group-6');
                })

            }
        }



        if(_navCon_520.children('.logo-con').length==0){

            _navCon_520.prepend(_navCon.children('.logo-con').clone());
        }


        var _cac = _navCon_520.find('.dzs-select-wrapper select').eq(0);

        if(_navCon_520.children('.custom-responsive-menu').length>0){
            custom_responsive_menu=true;
            _cac = _navCon_520.children('.custom-responsive-menu').find('.custom-menu').eq(0);

            //console.info(_cac);
        }
        _navCon_520.find('.logo-con').addClass('logo-con-520');

        _cac.html('');
        _theActualNav.children('li').each(function(){
            var _t = $(this);
            //console.info(_t);

            var aux_str = '';

            if(custom_responsive_menu==false){
                aux_str = '<option';

                if(_t.hasClass('current-menu-item')){
                    aux_str+=' selected';
                }

                aux_str +=' value="'+_t.children('a').attr('href')+'">'+_t.children('a').eq(0).html()+'</option>';

                _cac.append(aux_str);

                //console.info(_t,_t.hasClass('current-menu-item'));
                if(_t.children('ul').length>0){

                    _t.children('ul').eq(0).children('li').each(function(){

                        var _t2 = $(this);
                        _cac.append('<option value="'+_t2.children('a').attr('href')+'"> - '+_t2.children('a').eq(0).html()+'</option>');


                        //console.info(_t2, _t2.children('ul'));

                        _t2.children('ul').eq(0).children('li').each(function(){

                            var _t3 = $(this);
                            //console.info(_t2);
                            _cac.append('<option value="'+_t3.children('a').attr('href')+'"> - - '+_t3.children('a').eq(0).html()+'</option>');


                        });
                    });
                }
            }else{

                //console.info(_cac, _theActualNav,_theActualNav.html());


                //aux_str = '<li class="';
                //
                //if(_t.hasClass('current-menu-item')){
                //    aux_str+=' current-menu-item';
                //}
                //
                //aux_str +='"><a  href="'+_t.children('a').attr('href')+'">'+_t.children('a').eq(0).html()+'</a>';
                //
                //
                ////console.info(_t,_t.hasClass('current-menu-item'));
                //if(_t.children('ul').length>0){
                //
                //    aux_str+='<ul>';
                //    _t.children('ul').eq(0).children('li').each(function(){
                //
                //        var _t2 = $(this);
                //        _cac.append('<li><a href="'+_t2.children('a').attr('href')+'"> - '+_t2.children('a').eq(0).html()+'</li>');
                //
                //
                //        //console.info(_t2, _t2.children('ul'));
                //
                //        _t2.children('ul').eq(0).children('li').each(function(){
                //
                //            var _t3 = $(this);
                //            //console.info(_t2);
                //            _cac.append('<option value="'+_t3.children('a').attr('href')+'"> - - '+_t3.children('a').eq(0).html()+'</option>');
                //
                //
                //        });
                //    });
                //    aux_str+='</ul>';
                //}
                //
                //aux_str+='</li>';
            }


        });

        if(custom_responsive_menu){

            _cac.append(_theActualNav.html());
            //_cac.append(aux_str);

            _cac.find('li').each(function(){
                var _t = $(this);

                //console.info(_t, _t.children('ul').length);



                if(_t.children('ul').length>0){

                    _t.addClass('has-children');
                    _t.prepend('<i class="submenu-toggler fa fa-angle-right"></i>')
                    //console.info('THIS HAS CHILDREN');
                }

            })

        }
        _navCon_520.find('select').eq(0).unbind('change', change_nav_con_520);
        _navCon_520.find('select').eq(0).bind('change', change_nav_con_520);


        //content_width = 930;

        calculate_menu_width();


        if (_body.hasClass('page-portfolio') || _body.hasClass('page-blogsingle') ) {

            // content_width = default_content_width - 60;
            // content_width = default_content_width ;
        }



        if (_body.hasClass('menu-type-5') || _body.hasClass('menu-type-6') || _body.hasClass('menu-type-7') || _body.hasClass('menu-type-8') || _body.hasClass('menu-type-11')) {
            menu_content_space = 30;
        }
        if (_body.hasClass('menu-type-9') || _body.hasClass('menu-type-10') || _body.hasClass('menu-type-13') || _body.hasClass('menu-type-14') || _body.hasClass('menu-type-15') || _body.hasClass('menu-type-16') || _body.hasClass('menu-type-17') || _body.hasClass('menu-type-18') ) {
            //console.info('ceva',_theContent, _theContent.parent().prev(), _theContent.parent().prev().length==0, _theContent.parent().prev().hasClass('q-creative--nav-con'));
            menu_width=0;
            menu_width_on_right = 0;
            menu_content_space = 0;
            menu_height = 135;
            thumbs_padding_left_and_right = 40;
            thumbs_list_padding_right = 20;

            if( _body.hasClass('menu-type-13') || _body.hasClass('menu-type-14') || _body.hasClass('menu-type-15') || _body.hasClass('menu-type-16') || _body.hasClass('menu-type-17') || _body.hasClass('menu-type-18')){
                menu_height = 100;
            }


            if( _theContent&& ( _theContent.parent().prev().length==0 || _theContent.parent().prev().hasClass('q-creative--nav-con')==false) && _mainContainer.children().eq(0).hasClass('qucreative--nav-con')==false ){

                //console.info('... hmm ', _mainContainer, $('.qucreative--nav-con').eq(0))
                _mainContainer.prepend($('.qucreative--nav-con').eq(0));
            }
        }



        if(margs.call_from=='init()'){

            if (_body.hasClass('menu-type-11') || _body.hasClass('menu-type-12')) {
                //console.info('ceva',_theContent, _theContent.parent().prev(), _theContent.parent().prev().length==0, _theContent.parent().prev().hasClass('q-creative--nav-con'));
                _navCon.append('<i class="fa fa-bars menu-toggler"></i>');

                _mainContainer.append('<div class="menu-toggler-target "><div class="q-close-btn menu-closer"><svg version="1.1" baseProfile="tiny" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="58.42px" height="58.96px" viewBox="0 0 58.42 58.96" xml:space="preserve"> <polygon fill-rule="evenodd" fill="#FFFFFF" points="57,0 29.21,27.78 1.42,0 0,1.42 27.78,29.21 0,57 1.42,58.42 29.21,30.64 57,58.42 58.42,57 30.63,29.21 58.42,1.42 "></polygon> </svg></div></div>');

                _mainContainer.find('.menu-toggler-target').eq(0).append(_navCon.find('.the-actual-nav').eq(0));
            }
        }else{

        }
        setTimeout(function(){
            $('ul[class*="qc-pagination-for-zfolio"]').find('a').addClass('dzszfl-pagination-a custom-a');

            if($.fn.vcGrid){
                $("[data-vc-grid-settings]").vcGrid()
            }
        },1000);

        _body.removeClass('page-title-no-antetitle');








        _gallery_thumbs_con = null;

        $('.social-icon').each(function(){

            var aux = window.location.href;
            var _t = $(this);
            _t.attr('onclick', String(_t.attr('onclick')).replace('{{replaceurl}}',aux));
        })






        // console.info("Sidebar Main - ",_sidebarMain);



        var i23 = 0;
        $('.translucent-bg').each(function() {
            var _t = $(this);




            //console.info(_t, _t.parent(),_t.parent().parent(),mainBgImgCSS);

            calculate_translucent(_t);


            i23++;
        });


        window.init_progress_markers();


        if(window.dzsprb_init){

            window.dzsprb_init('.dzs-progress-bar',{init_each:true});
        }


        //console.info(".translucent-canvas");

        $('.translucent-canvas').each(function() {
            var _t = $(this);


            //calculate_translucent_canvas(_t);




            //
            //
            //function drawStackBlur() {
            //
            //
            //    var aux2 = $('.main-bg').eq(0).css('background-image');
            //    //console.log(_t,_t.css('background-image'));
            //    aux2 = aux2.replace('url(', '');
            //    aux2 = aux2.replace(')', '');
            //    aux2 = aux2.replace("'", '');
            //    aux2 = aux2.replace('"', '');
            //
            //
            //
            //
            //}
            //
            //setTimeout(drawStackBlur, 1000);
            ////console.info(_t, mainBgImgCSS);



        });




        _c_for_parallax_items = [];
        if($('.translucent-canvas.for-parallaxer').length>0){
            $('.translucent-canvas.for-parallaxer').each(function(){
                var _t = $(this);
                _c_for_parallax_items.push(_t);
            })
            //= ;
        }



        // console.log("PAGE IS ", page, page=='page-gallery-w-thumbs', newclass_body_page);
        if(newclass_body_page=='page-gallery-w-thumbs') {


            // console.info($("#as-gallery-w-thumbs"));


            $("#as-gallery-w-thumbs").each(function(){
                var _t = $(this);


                var _t2_i = 0;
                _t.find('.items').eq(0).children().each(function(){
                    var _t2 = $(this);
                    //console.log(_t2);



                    if(_t2.hasClass('processed')){
                        return;
                    }

                    // console.info(_t2);

                    if(_t2.attr('data-gallery-thumbnail')){

                        var aux = '<li class="thumb';

                        if(_t2_i==0){
                            aux+=' curr-thumb';
                        }

                        aux+='"  style=";"><div class="bgimage"  style="background-image: url('+_t2.attr('data-gallery-thumbnail')+')"></div></li>';

                        $('.gallery-thumbs-con .thumbs-list').eq(0).append(aux);

                        _t2_i++;
                    }

                    if(_t2.attr('data-type')=='image'){
                        _t2.addClass('needs-loading')
                    }

                    // -- gallery-w-thumbs
                    if(_t2.attr('data-type')=='video'){
                        var aux = '<div class="wipeout-wrapper"><div class="wipeout-wrapper-inner"><div class="vplayer-tobe " ';

                        if(_t2.attr('data-width-for-gallery')){
                            aux+=' data-width-for-gallery="'+_t2.attr('data-width-for-gallery')+'"';
                        }
                        if(_t2.attr('data-height-for-gallery')){
                            aux+=' data-height-for-gallery="'+_t2.attr('data-height-for-gallery')+'"';
                        }

                        aux+=' data-src="'+_t2.attr('data-source')+'" >';


                        if(_t2.children('.cover-image').length>0){
                            //console.info(_t2.children('.cover-image'), _t2.children('.cover-image').eq(0).outerHTML())

                            aux+=_t2.children('.cover-image').eq(0).outerHTML();
                            _t2.children('.cover-image').remove();
                        }

                        aux+='</div></div></div>';

                        _t2.addClass('needs-loading')
                        _t2.attr('data-source','');

                        _t2.append(aux);




                        if(window.dzsvp_init){
                            dzsvp_init(_t2.find('.vplayer-tobe'),qucreative_options.video_player_settings);
                        }else{
                            console.info('video player not found');
                        }

                    }

                    _t2.addClass('processed');
                });

                // -- as gallery w thumbs
                dzsas_init(_t,{
                    settings_mode: "onlyoneitem"
                    ,design_arrowsize: "0"
                    ,settings_swipe: "off"
                    ,settings_swipeOnDesktopsToo: "off"
                    ,settings_slideshow: "on"
                    ,settings_slideshowTime: "300000"
                    ,settings_transition:"wipeoutandfade"
                    ,settings_lazyLoading:'on'
                    ,settings_lazyLoading_load_otheritems_after_loading_first_items:'on'
                    ,settings_autoHeight:'on'
                    ,settings_centeritems:false
                    ,design_bulletspos: "none"
                    ,settings_wait_for_do_transition_call: "on"
                    ,settings_transition_only_when_loaded: "on"
                    ,mode_onlyone_autoplay_videos : window.qucreative_options.gallery_w_thumbs_autoplay_videos
                    ,mode_onlyone_reset_videos_to_0:'on'
                });
            });




            if (document.getElementById("as-gallery-w-thumbs") && document.getElementById("as-gallery-w-thumbs").api_set_action_call_on_gotoItem) {

                document.getElementById("as-gallery-w-thumbs").api_set_action_call_on_gotoItem(page_gallery_w_thumbs_calculate);
            }
        }

        if(_mainContainer.get(0) && _mainContainer.get(0).api_toggle_resize){
            _mainContainer.get(0).api_toggle_resize();
            //console.info('ceva');

            setTimeout(function(){

                _mainContainer.get(0).api_toggle_resize();
            },900);
        }
        //console.info(page);



        // -- tbc lets unite this from reinit and load_new_page into a new function -- load scripts
        if(window.dzsvp_init){


            //zfolio-portfolio-expandable
            //console.info($('.vplayer-tobe.auto-init-from-q:not(".zfolio-portfolio-expandable .vplayer-tobe.auto-init-from-q")'));



            $('.vplayer-tobe.auto-init-from-q:not(".zfolio-portfolio-expandable .vplayer-tobe.auto-init-from-q")').each(function(){
                var _t = $(this);

                //console.warn(_t.get(0),  _t.get(0).style.height);

                //if(_t.get(0) && _t.get(0).style && _t.get(0).style.height){
                //    //console.log(content_width);
                //
                //
                //    if(_t.get(0).style.height=='auto'){
                //        _t.addClass('auto-height-16-9');
                //        videoplayers_tobe_resized.push(_t);
                //    }else{
                //        _t.data('original-width', _t.width());
                //        _t.data('original-height', _t.height());
                //        _t.data('reference-width', content_width-120);
                //
                //
                //
                //        //console.log(content_width, _theContent.find('.sidebar-main'), ((content_width-30)/3*2) - 30);
                //
                //        if(_theContent.find('.sidebar-main').length==1){
                //
                //            _t.data('reference-width', ((content_width-30)/3*2) - 30);
                //        }
                //
                //        videoplayers_tobe_resized.push(_t);
                //    }
                //
                //}

                //console.info('dzsvp_init', _t);

                var responsive_ratio = "0.5625";

                if(_t.attr('data-responsive_ratio')){
                    responsive_ratio = _t.attr('data-responsive_ratio');
                }

                // console.info(_t);

                if(_t.parent().hasClass('slider-con')){
                    responsive_ratio = '';
                }

                // console.info("RESPONSIVE RATIO -> ",responsive_ratio);
                dzsvp_init(_t,{
                    settings_youtube_usecustomskin:"off"
                    ,init_each:true
                    ,controls_out_opacity: "1"
                    ,controls_normal_opacity: "1"
                    ,settings_video_overlay: "on"
                    ,design_skin: "skin_reborn"
                    ,cueVideo: "off"
                    ,autoplay: "off"
                    ,responsive_ratio: responsive_ratio
                });
            })


        }



        if(window.dzstaa_init){


            //zfolio-portfolio-expandable
            //console.info($('.vplayer-tobe.auto-init-from-q:not(".zfolio-portfolio-expandable .vplayer-tobe.auto-init-from-q")'));

            dzstaa_init('.dzs-tabs.auto-init-from-q', {
                'init_each':true
            });
            dzstaa_init('.dzs-tabs.auto-init-from-q-for-tabs',{ 'design_tabsposition' : 'top'
                ,design_transition: 'fade'
                ,design_tabswidth: 'default'
                ,toggle_breakpoint : '300'
                ,settings_appendWholeContent: false
                ,toggle_type: 'accordion'});

            var args = { 'design_tabsposition' : 'top'
                ,design_transition: 'fade'
                ,design_tabswidth: 'default'
                ,toggle_breakpoint : '4000'
                ,settings_appendWholeContent: false
                ,settings_startTab: -1
                ,toggle_type: 'accordion'};



            dzstaa_init('.dzs-tabs.auto-init-from-q-for-accordions',args);
        }

        if(window.dzsap_init){



            var settings_ap = {
                disable_volume: 'off'
                ,disable_scrub: 'default'
                ,design_skin: 'skin-redlights'
                ,skinwave_dynamicwaves:'off'
                ,skinwave_enableSpectrum:'off'
                ,settings_backup_type:'full'
                ,skinwave_enableReflect:'on'
                ,skinwave_comments_enable:'on'
                ,skinwave_timer_static:'off'
                ,disable_player_navigation: 'off'
                ,skinwave_mode: 'normal'
                ,default_volume:'last' // -- number / set the default volume 0-1 or "last" for the last known volume
                ,skinwave_comments_retrievefromajax:'off'

                ,soundcloud_apikey: window.qucreative_options.soundcloud_apikey//insert api key here
                ,embed_code:"You can enable embed button for your viewers to embed on their site, the code will auto generate. &lt;iframe src=&quot;http://yoursite.com/bridge.php?type=gallery&amp;id=gal1&quot; &gt;&lt;/iframe&gt;"
                ,init_each: true
                ,settings_php_handler : ''
                ,action_audio_play2: dzsap_handle_play
                ,'php_retriever' : window.qucreative_options.theme_url+'/soundcloudretriever.php'
            };

            //zfolio-portfolio-expandable
            //console.info($('.vplayer-tobe.auto-init-from-q:not(".zfolio-portfolio-expandable .vplayer-tobe.auto-init-from-q")'));




            window.dzsap_init('.audioplayer-tobe.auto-init-from-q',settings_ap);


            if(window.dzsag_init){


                // console.info(get_query_arg(window.location.href,'vc_editable') );

                $('.audiogallery').each(function(){
                    var _t = $(this);

                    // console.info(_t, _t.find('.items').children());


                    window.dzsag_init(_t,{
                        'transition':'fade'
                        ,'cueFirstMedia' : 'off'
                        ,'autoplay' : 'on'
                        ,'autoplayNext' : 'on'
                        ,'php_retriever' : window.qucreative_options.theme_url+'/soundcloudretriever.php'
                        ,design_menu_position:'bottom'
                        ,'settings_ap':settings_ap
                        ,embedded: 'off'
                        ,init_each: true
                        ,enable_easing: 'on'
                        ,design_menu_height: 200
                        ,settings_mode: "mode-showall"
                        ,design_menu_state: 'open' // -- options are "open" or "closed", this sets the initial state of the menu, even if the initial state is "closed", it can still be opened by a button if you set design_menu_show_player_state_button to "on"
                        ,design_menu_show_player_state_button: 'on' // -- show a button that allows to hide or show the menu

                    });
                })

            }




        }


        if(_theContent){

            // _theContent.find('').each(function(){
            //     var _t4 = $(this);
            //
            //     //.attr('href','#')
            // })


            _theContent.find('.divimage-calculate-real-size,a.comment-reply-link').each(function(){
                var _t4 = $(this);

                // console.info('_t4 -> ',_t4);

                if(_t4.hasClass('comment-reply-link')){

                    _t4.addClass('custom-a').attr('onclick',String(_t4.attr('onclick')).replace('div-',''));
                }


                if(_t4.hasClass('divimage-calculate-real-size')){

                    var src = sanitize_image_src_from_background(_t4.css('background-image'));


                    var img = new Image();

                    img.parentEl = _t4;



                    img.onload = function(e){
                        // image  has been loaded


                        var _t4_c = this.parentEl;

                        if(_t4_c.parent().hasClass('pic-con')){
                            _t4_c.parent().animate({
                                'max-width':this.naturalWidth
                            })
                        }

                    };
                    img.onerror = function(e){
                        // image  has been loaded


                    };

                    img.src = src;
                }






            })

            // _theContent.find('a.comment-reply-link').addClass('custom-a').attr('href','#');
            // _theContent.find('a.comment-reply-link')
            // _theContent.find('a.comment-reply-link').attr('onclick','console.log(addComment)')
            // _theContent.find('a.comment-reply-link').attr('onclick','addComment.moveForm( "div-comment-3", "3", "respond", "1515" )')
            // _theContent.find('.the-label > a').addClass('custom-a').attr('href','#');
        }


        window.init_advanced_scrollers();

        // -- init
        // -- from reinit()
        if(window.dzszfl_init){

            //console.info('fromreinit', $('.zfolio.auto-init-from-q'));
            dzszfl_init('.zfolio.auto-init-from-q',{
                init_each: true
            });

        }
        if(window.dzssel_init){


            //zfolio-portfolio-expandable
            //console.info($('.vplayer-tobe.auto-init-from-q:not(".zfolio-portfolio-expandable .vplayer-tobe.auto-init-from-q")'));


            dzssel_init('select.dzs-style-me-from-q', {init_each: true});

        }

        start_bg_slideshow_time();

        setTimeout(function(){
            calculate_dims({
                ignore_menu: false
                ,placew: false
                ,place_page: false
                ,redraw_canvas: false
                ,calculate_sidebar_main_is_bigger: false
            });
        },100);







        if(_body.hasClass('single-antfarm_port_items') || _body.hasClass('single-dzsvcs_port_items')){
            if(qucreative_options.portfolio_page_url){
                var pgu = qucreative_options.portfolio_page_url


                // console.info('pgu - ', pgu, $('a[href="'+pgu+'"]'));



                $('a[href="'+pgu+'"]').parent().addClass('current-menu-item');
                $('a[href="'+pgu+'"]').parent().parent().parent().addClass('current-menu-item');


            }
        }
        if(_body.hasClass('page-blogsingle')){
            if(qucreative_options.blog_posts_url){
                var pgu = qucreative_options.blog_posts_url;


                // console.info('pgu - ', pgu, $('a[href="'+pgu+'"]'));



                $('a[href="'+pgu+'"]').parent().addClass('current-menu-item');
                $('a[href="'+pgu+'"]').parent().parent().parent().addClass('current-menu-item');


            }
        }


        if(_theContent){
            // console.info("the-content-con -> ",_theContent.parent());


            var _contpar = _theContent.parent();

            var posy = 0;
            if(_contpar.attr('data-scroll-to')){





                if(_contpar.attr('data-scroll-to-pixel')){
                    posy = Number(_contpar.attr('data-scroll-to-pixel'));
                }
                if(_contpar.attr('data-scroll-to')=='browser-bottom'){
                    posy = wh;
                }
            }else{
                // console.info(windowhref);
                var targetid = windowhref.split('#')[1];


                var _c4 = null;
                if(targetid){


                    _c4 = $('#'+targetid).eq(0);;
                    if(_c4 && _c4.length && _c4.offset()){

                        posy = Number(_c4.offset().top) - 200;
                    }
                }

                // console.info('targetid -> ',targetid, posy, _c4);




            }

            if(posy){

                setTimeout(function(){

                    if(_mainContainer.get(0) && _mainContainer.get(0).api_scrolly_to){
                        _mainContainer.get(0).api_scrolly_to(posy, {
                            'force_no_easing':'off'
                            ,show_scrollbar : false
                        })
                    }else{

                        if(_contpar.attr('data-scroll-to')) {
                            $(window).scrollTop(posy);
                        }
                    }
                },1000);
            }


            // console.info("CHECK HASHTAG", window.location.href, windowhref);
        }



        if(_body.hasClass('qucreative-overlay-menu')){

            // console.info("$('.menu-toggler-target') -> ",$('.menu-toggler-target'));

            if($('.menu-toggler-target').eq(0).hasClass('active')){

                setTimeout(function(){
                    // $('.menu-toggler-target').trigger('click');
                    $('.q-close-btn').trigger('click');
                },100);
            }
        }


        //console.info(window.qucreative_options);
        //_theContent.find('.zfolio-portfolio-expandable').find('.item-tobe').addClass('loaded');



        //if(window.qucreative_options.bg_isparallax=='on'){
        //    $('.main-bg-con').addClass('dzsparallaxer');
        //    $('.main-bg').addClass('dzsparallaxer--target');
        //
        //    dzsprx_init('.dzsparallaxer', {mode_scroll: 'fromtop', direction: 'reverse'});
        //}

        if(margs.call_from!='setup_newBgImage() _ samePageTransition'){

            page_portfolio_requires_move_filters = false;
            sw_native_scrollbar_sidebar_check_anim_frame_called = false;
        }



        // console.info('page - ',page);
        if(page=='page-portfolio'){


            // console.info(_theContent,_theContent.parent().hasClass('fullit'), _theContent.find('.selector-con').length);
            if(_theContent && _theContent.parent().hasClass('fullit')){
                // console.info("NICE")
                if(_theContent.find('.selector-con').length){

                    page_portfolio_requires_move_filters = true;
                }
            }

            if(_body.hasClass('qucreative-horizontal-menu')){
                if(_body.hasClass('menu-is-sticky')==false){

                    page_portfolio_requires_move_filters = false;
                }
            }
        }



        if (window.qucreative_options.enable_native_scrollbar=='off' ||window.qucreative_options.enable_native_scrollbar == 'on') {
            // console.log('window.qucreative_options.enable_native_scrollbar -  ',window.qucreative_options.enable_native_scrollbar);
            // console.log('page_portfolio_requires_move_filters - ',page_portfolio_requires_move_filters);

            if(page_portfolio_requires_move_filters){
                misc_regulate_nav_native();
            }
        }

    }


    function start_bg_slideshow_time(){


        clearInterval(inter_bg_slideshow);
        bg_slideshow_time = Number(window.qucreative_options.bg_slideshow_time);


        if(bg_slideshow_time){
            inter_bg_slideshow = setInterval(function(){
                goto_next_bg();
            }, bg_slideshow_time*1000);
        }

    }


    function dzsap_handle_play(argcthis){


        //console.info(argcthis);


        $('.audioplayer').each(function(){
            var _t = $(this);
            if(_t.get(0)!=argcthis.get(0)){
                if(_t.get(0).api_seek_to_perc){
                    _t.get(0).api_seek_to_perc(0);
                }
            }
        })
    }

    function sanitize_image_src_from_background(arg){

        var aux32 = arg;
        aux32 = aux32.replace('url(','');
        aux32 = aux32.replace(')','');
        aux32 = aux32.replace(/"/g,'');

        return aux32;
    }

    function page_gallery_w_thumbs_calculate(argcthis, arg,pargs){

        // console.info('page_gallery_w_thumbs_calculate()',argcthis,arg,pargs);
        // console.info('arg -> ',arg);

        var margs = {
            arg: 0
        };

        if(pargs){
            margs = $.extend(margs,pargs);
        }
        //console.info('ceva',arg, arg.data('naturalWidth'));

        //console.info(argcthis, argcthis.hasClass('transition-wipeoutandfade'));
        if(argcthis.hasClass('transition-wipeoutandfade')){

            _body.addClass('page-gallery-w-thumbs-transitioning-content');
            setTimeout(function(){

                //console.info(_theContent);

                gallery_thumbs_img_container_nw = arg.data('naturalWidth');
                gallery_thumbs_img_container_nh = arg.data('naturalHeight');



                if(arg.attr('data-width-for-gallery')){
                    gallery_thumbs_img_container_nw = Number(arg.attr('data-width-for-gallery'));
                }
                if(arg.attr('data-height-for-gallery')){
                    gallery_thumbs_img_container_nh = Number(arg.attr('data-height-for-gallery'));
                }


                // console.info('lets see if gallery_thumbs_img_container_nw',gallery_thumbs_img_container_nw, arg);
                // console.info('lets see if gallery_thumbs_img_container_nh',gallery_thumbs_img_container_nh, arg);

                if(!gallery_thumbs_img_container_nw){
                    // console.info("NATURAL WIDTH NOT DEFINED");

                    // console.info(arg);



                    if(arg.attr('data-width-for-gallery')){
                        gallery_thumbs_img_container_nw = Number(arg.attr('data-width-for-gallery'));
                    }
                    if(arg.attr('data-height-for-gallery')){
                        gallery_thumbs_img_container_nh = Number(arg.attr('data-height-for-gallery'));
                    }

                    setTimeout(function(){

                        if(arg.find('img').length){
                            if(arg.find('img').get(0).naturalWidth){
                                arg.data('naturalWidth', arg.find('img').get(0).naturalWidth);
                                arg.data('naturalHeight', arg.find('img').get(0).naturalHeight);
                            }
                        }

                        page_gallery_w_thumbs_calculate(argcthis,arg,margs);
                    },150);

                    return false;
                }


                // console.info('natural width and height', gallery_thumbs_img_container_nw, gallery_thumbs_img_container_nh);



                var args = {
                    'this_is_new_item' : true
                }
                //console.info('CALL calculate_dims_gallery_thumbs_img_container', 'from page_gallery_w_thumbs_calculate')
                calculate_dims_gallery_thumbs_img_container(args);

                setTimeout(function(){

                    _body.addClass('page-gallery-w-thumbs-transition-on-content');

                    //console.info('api_do_transition()');


                    // console.warn(gallery_thumbs_img_container_ch,gallery_thumbs_img_container_padding_space );

                    // console.info(gallery_thumbs_img_container_cw-gallery_thumbs_img_container_padding_space*2, (gallery_thumbs_img_container_ch-gallery_thumbs_img_container_padding_space*2) );


                    var args = {
                        force_width: parseInt( (gallery_thumbs_img_container_cw-gallery_thumbs_img_container_padding_space*2),10)
                        ,force_height: parseInt((gallery_thumbs_img_container_ch-gallery_thumbs_img_container_padding_space*2),10)
                        ,arg: margs.arg
                        ,called_from : 'calling from qcreative.js 3266 '
                    };




                    argcthis.get(0).api_do_transition(args);




                    setTimeout(function(){

                        //argcthis.get(0).api_force_resize();
                    },20000)
                    _body.removeClass('page-gallery-w-thumbs-transitioning-content');
                },900);



            },700)
        }else{

            argcthis.get(0).api_do_transition();
        }
    }

    function qcreative_overwrite_mainoptions(arg){

        var auxer5 = JSON.parse(qucreative_options_defaults_string);
        //console.log(auxer5);

        window.qucreative_options = $.extend(auxer5, arg);



        if(customizer_force_blur>-1){
            qucreative_options.blur_ammount = customizer_force_blur;
        }




        if(isNaN(parseInt(window.qucreative_options.blur_ammount,10))==false){
            window.qucreative_options.blur_ammount = parseInt(window.qucreative_options.blur_ammount,10);
        }else{

            window.qucreative_options.blur_ammount = 25;
        }


        var aux = window.qucreative_options.images_arr;

        aux = aux.replace(/'/g,'');

        window.qucreative_options.images_arr = aux.split(',');

        window.qucreative_options = qucreative_options;
    }

    function handle_popstate(e){
        console.log('handle_popstate', e, e.state);

        if(e.state && e.state.href){
            click_menu_anchor(null, {
                'force_href': e.state.href
                ,force_no_ajax:'on'
                ,call_from:'popstate'
            })

            //console.info(e.state.curr_menu_items,Object(e.state.curr_menu_items).size,Object.size(e.state.curr_menu_items));

            //console.log(e.state.curr_menu_items, e.state, history);

            if(Object.size(e.state.curr_menu_items)>0){


                //console.info('my docs', _theActualNav.find('.current-menu-item'))
                _theActualNav.find('.current-menu-item').removeClass('current-menu-item');

                for(var i2 = 0; i2< Object.size(e.state.curr_menu_items); i2++){
                    _theActualNav.find('li').eq(e.state.curr_menu_items[i2]).addClass('current-menu-item');
                }
            }
            return false;
        }
    }


    function imgLoaded_for_thumbs(e){

        //console.log('ceva', this.ref_t);

        if(this){
            if(this.ref_t){
                this.ref_t.addClass('img-loaded');
            }
            if(this.removeEventListener){
                this.removeEventListener('load',imgLoaded_for_thumbs);
            }
        }

    }

    function calculate_dims_gallery_thumbs_img_container(pargs){

        //console.log('calculate_dims_gallery_thumbs_img_container()', pargs);

        var margs = {
            'this_is_new_item' : false
        }

        // -- nw - natural width
        //console.info(gallery_thumbs_img_container_nw);

        //gallery_thumbs_img_container_cw = Number(gallery_thumbs_img_container_nw)+40;
        //gallery_thumbs_img_container_ch = Number(gallery_thumbs_img_container_nh)+40;








        //var ratio_w_h = gallery_thumbs_img_container_nw/gallery_thumbs_img_container_nh;

        //console.info(ratio_w_h);

        //console.info(gallery_thumbs_img_container_nw, gallery_thumbs_img_container_nh);


        var thumb_space = 140;

        var aux_menu_width = menu_width;
        var aux_menu_width_on_right = menu_width_on_right;
        var aux_menu_height = menu_height;

        if(_navCon.css('display')=='none'){
            aux_menu_width = 0;
            aux_menu_height = 0;
            aux_menu_width_on_right=0;

            // --d but on 0 account lets just leave normal scroller
        }



        var responsive_nav_and_thumbs_h = 0;


        var new_iw = 0;
        var new_ih = 0;

        var aux_sep_w = 80;
        var aux_sep_h = 110;


        var blur_margin = 30;
        if(force_width_blur_margin!=30){

            if(isNaN(Number(force_width_blur_margin))==false){

                blur_margin = Number(force_width_blur_margin);
            }else{
                // console.info('force_width_blur_margin->',force_width_blur_margin);
            }
        }

        // -- image width
        var aux_iw = 0;;
        var aux_ih =  0;

        // aux_iw = Number(gallery_thumbs_img_container_nw)+gallery_thumbs_img_container_padding_space*2;
        // aux_ih = Number(gallery_thumbs_img_container_nh)+gallery_thumbs_img_container_padding_space*2;

        aux_iw = Number(gallery_thumbs_img_container_nw) ;
        aux_ih = Number(gallery_thumbs_img_container_nh) ;

        aux_iw+=blur_margin*2;
        aux_ih+=blur_margin*2;

        // space width

        var aux_sw = 0;
        var aux_sh = 0;
        // aux_sw = ww-aux_menu_width-gallery_thumbs_img_container_padding_space*2;
        // aux_sh = wh-thumb_space-gallery_thumbs_img_container_padding_space*2 - aux_menu_height;


        // console.info('blur_margin->',blur_margin);
        aux_sw = _theContent.parent().width();
        aux_sh = _theContent.parent().height();

        aux_sw-=blur_margin;
        aux_sh-=blur_margin;


        // console.info('aux_sw','aux_sh',aux_sw,aux_sh);
        // console.info('aux_iw','aux_ih',aux_iw,aux_ih);


        $('.the-content-bg-placeholder').eq(0).outerHeight(0);
        if(ww<=responsive_breakpoint){

            responsive_nav_and_thumbs_h = _theContent.parent().height();

            aux_sw = ww - 40;
            aux_sh = wh - responsive_nav_and_thumbs_h;
            if(aux_sh< 400){
                aux_sh = 400;
                _body.addClass('remove_overflow');
            }else{

                _body.removeClass('remove_overflow');
            }


            if(_theContent && _theContent.prev().hasClass('the-content-bg')==false){
                _theContent.before('<div class="the-content-bg"></div>');
            }



            //console.info(responsive_nav_and_thumbs_h, _theContent.parent().height(), aux_sh);
            //aux_sh = wh - _theContent.parent().height();
        }


        var aux_ir = aux_iw/aux_ih;
        var aux_sr = aux_sw/aux_sh;

        // console.info(aux_iw, aux_ih, aux_sw, aux_sh);

        //console.log(aux_ir, aux_sr);

        if(aux_sr > aux_ir){

            gallery_thumbs_img_container_cw = aux_iw*(aux_sh/aux_ih);
            gallery_thumbs_img_container_ch = aux_sh;

        }else{
            gallery_thumbs_img_container_cw = aux_sw;

            gallery_thumbs_img_container_ch = aux_ih * (aux_sw/aux_iw);
        }


        if(gallery_thumbs_img_container_cw>aux_iw){
            gallery_thumbs_img_container_cw = aux_iw;
            gallery_thumbs_img_container_ch = aux_iw * (aux_ih /aux_iw);
        }



        // console.info('gallery_thumbs_img_container cw and ch', gallery_thumbs_img_container_cw, gallery_thumbs_img_container_ch)




        var _c = $('.the-content-con > .the-content').eq(0);




        //console.info(aux_top);

        if(ww<=responsive_breakpoint){
            //aux_top+=


            // -- responsive


            // aux_top = responsive_nav_and_thumbs_h;
            //
            //
            // $('.the-content-bg').css({
            //     'width': ww+'px'
            //     ,'height': gallery_thumbs_img_container_ch+'px'
            //     ,'top':responsive_nav_and_thumbs_h+'px'
            // })
            //
            // if($('.the-content-bg').eq(0).offset().top + $('.the-content-bg').eq(0).outerHeight()<wh){
            //     $('.the-content-bg').eq(0).outerHeight(wh-$('.the-content-bg').eq(0).offset().top);
            // }
            //
            // $('.the-content-bg-placeholder').eq(0).outerHeight($('.the-content-bg').eq(0).outerHeight());


        }


        setTimeout(function(){

            // console.info(_c, gallery_thumbs_img_container_cw, gallery_thumbs_img_container_ch);
            //console.info(cw);

            // TODO: _c is the the-content ?
            _c.outerWidth(parseInt(gallery_thumbs_img_container_cw,10));
            _c.eq(0).css({
                // 'left': aux_left+'px'
            });

            //console.info(cw, _c.width(), _c);

            _c.outerHeight(parseInt(gallery_thumbs_img_container_ch,10));
            _c.eq(0).css({
                // 'top': aux_top+'px'
            });
        },50);




        //console.info('1865', page, newclass_body)

        if(newclass_body_page=='page-gallery-w-thumbs'){

            if(document.getElementById("as-gallery-w-thumbs") && document.getElementById("as-gallery-w-thumbs").api_set_action_call_on_gotoItem){

                document.getElementById("as-gallery-w-thumbs").api_set_action_call_on_gotoItem(page_gallery_w_thumbs_calculate);
            }



            var delaytime = 0;

            if(margs.this_is_new_item){
                delaytime = 1000;
            }
            setTimeout(function(){

                var _c4 = _theContent.find('.advancedscroller').eq(0);

                _c4.find('.thumbsCon').eq(0).height(gallery_thumbs_img_container_ch-blur_margin*2);
                _c4.find('.thumbsCon').eq(0).width(gallery_thumbs_img_container_cw-blur_margin*2);
                _c4.find('.currItem').eq(0).height(gallery_thumbs_img_container_ch-blur_margin*2);
                _c4.find('.currItem').eq(0).width(gallery_thumbs_img_container_cw-blur_margin*2);
                //_theContent.find('.advancedscroller').eq(0).find('.currItem > img').eq(0).width(gallery_thumbs_img_container_cw-40);


                if(margs.this_is_new_item==false){

                    _theContent.find('.advancedscroller').eq(0).find('.currItem > img').eq(0).css({
                            'width' : (gallery_thumbs_img_container_cw-blur_margin*2)
                            ,'height' : (gallery_thumbs_img_container_ch-blur_margin*2)
                        }, {queue:false, duration: 400}
                    );
                }

                _theContent.addClass('active');
            },1000)

            //console.info($('.gallery-thumbs-con'));
            if($('.gallery-thumbs-con').length>0){
                _gallery_thumbs_con = $('.gallery-thumbs-con').eq(0);


                var gallery_width = 0;

                var gallery_max_width = ww - (menu_width + menu_content_space);

                _gallery_thumbs_con.find('li.thumb:not(.inited)').each(
                    function(){
                        var _t = $(this);

                        //console.info(_t);

                        _t.addClass('inited');

                        if(_t.children().eq(0).hasClass('bgimage')){
                            var aux32 = _t.children().eq(0).css('background-image');
                            aux32 = aux32.replace('url(','');
                            aux32 = aux32.replace(')','');
                            aux32 = aux32.replace(/"/g,'');
                            //console.log(aux32);


                            var auximg = new Image();
                            auximg.ref_t = _t;

                            //var auxfunc =


                            if(auximg.addEventListener){
                                auximg.addEventListener('load', imgLoaded_for_thumbs )
                            }


                            auximg.src = aux32;

                        }else{
                            _t.addClass('img-loaded');
                        }


                        //gallery_width+=100;

                        _t.bind('click',handle_mouse);

                    }
                )


                gallery_width = _gallery_thumbs_con.find('li.thumb').length * 100 + 40;


                _gallery_thumbs_con.find('.thumbs-list').width(gallery_width-40);

                //console.info(gallery_width);

                var aux_add_20 = 0;

                if(gallery_width>gallery_max_width){
                    gallery_width = gallery_max_width;

                    aux_add_20+=20;
                }

                // -- 40 padding
                var auxer23 = 0;
                if(aux_menu_width_on_right){
                    auxer23 = 20;
                }

                var aux_thumbs_list_padding_right = thumbs_list_padding_right;
                //console.info(ww/2, gallery_width/2);




                var aux =  ((menu_width + menu_content_space) + ( (ww - (menu_width + menu_content_space*2) )/2 - gallery_width/2));




                if(aux<menu_width+menu_content_space){
                    aux = menu_width + menu_content_space;
                }

                if(aux>0){
                    //aux = menu_width + menu_content_space;
                    aux_thumbs_list_padding_right = 0;
                }



                //console.log(aux , aux_thumbs_list_padding_right,(gallery_width+aux_add_20-thumbs_padding_left_and_right-aux_menu_width_on_right-auxer23-aux_thumbs_list_padding_right));
                _gallery_thumbs_con.find('.thumbs-list-con').eq(0).width(gallery_width+aux_add_20-thumbs_padding_left_and_right-aux_menu_width_on_right-auxer23-aux_thumbs_list_padding_right);

                _gallery_thumbs_con.css({
                    'left': aux + 'px'
                })

                if(aux_menu_width_on_right){

                    _gallery_thumbs_con.css({
                        'width': 'calc(100% - '+ (aux_menu_width_on_right+20+menu_width) + 'px)'
                    })
                }else{

                    _gallery_thumbs_con.css({
                        'width': ''
                    })
                }



                if(ww<=responsive_breakpoint){
                    _gallery_thumbs_con.css({
                        'left': 0
                        ,'width': '100%'
                    })
                    _gallery_thumbs_con.find('.thumbs-list-con').css('width', '100%');
                    //_gallery_thumbs_con.find('.thumbs-list').width(ww-40);
                    //console.info(ww);
                }


                if(is_touch_device()==false){

                    _gallery_thumbs_con.find('.thumbs-list-con').eq(0).unbind('mousemove');
                    _gallery_thumbs_con.find('.thumbs-list-con').eq(0).bind('mousemove',handle_mouse);
                }else{
                    _gallery_thumbs_con.find('.thumbs-list-con').css('overflow', 'auto');

                }
            }

            if(_theContent){
                //console.info(_theContent);

                if(_theContent.parent().css('opacity')==0){
                    //console.info('this is for gallery-w-thumbs')
                    if(_gallery_thumbs_con){

                        calculate_translucent_canvas(_gallery_thumbs_con.find('.translucent-canvas').eq(0),{'call_from':'gallery_thumbs_con'});
                    }
                    //fade_the_content_con(_theContent.parent())
                }
            }

        }


    }



    function click_menu_anchor(e,pargs) {


        var _t = $(this);
        var thehref = _t.attr('href');
        var isselectoption = false;
        var newtitle = null;

        var margs = {
            _t: null
            ,force_href: ''
            ,force_no_ajax: 'off'
            ,call_from: 'default'
        }


        if(pargs){
            margs = $.extend(margs,pargs);
        }

        if(margs._t){
            _t = margs._t;
        }


        if(_t.hasClass('not-ajax')==false){

        }

        var allow_html5_link_process = true;


        if(_t && _t.hasClass('zoombox-delegated')){
            allow_html5_link_process = false;
        }

        // console.info('qcre click_menu_anchor()', margs);

        if(_t && _t.get(0) && _t.get(0).nodeName=='SELECT'){

            isselectoption = true;
            thehref = _t.val();
            //thehref = _t.find(':selected').attr('value');

        }

        if(_t && _t.get(0) && _t.get(0).nodeName=='OPTION'){

            isselectoption = true;
            thehref = _t.val();
            //thehref = _t.find(':selected').attr('value');

        }

        //console.info(_t.hasClass('current-menu-item'), _t, _t.attr('class'));
        //if(_t&&_t.parent().hasClass('current-menu-item') && margs.force_no_ajax!='on'){
        //
        //    return false;
        //}

        // console.log(thehref, curr_html);

        if(qucreative_options.enable_ajax=='on' && thehref==curr_html){
            return false;
        }


        if(is_touch_device()){

            if(_t && _t.hasClass('zoombox-delegated')){

            }else{

                margs.force_no_ajax = 'on';
                window.location.href = thehref;
            }
        }

        //console.info(margs.force_href, margs.force_no_ajax);
        if(margs.force_href){
            thehref = margs.force_href;

            //console.info(margs.force_no_ajax, thehref);

            if(margs.force_no_ajax=='on'){
                window.location.href = thehref;
            }
        }




        //console.info(busy_main_transition);
        if(busy_main_transition){

            setTimeout(function(){
                var args = {};
                if(_t){ args._t = _t; args.force_href = thehref };

                click_menu_anchor(e,args);
            },1000);

            return false;
        }


        //console.info(_t,_t.val(), isselectoption,thehref);
        if(isselectoption){
            //return false;
        }
//        console.info(_t);

        //==== well test if it's an outer link, if its an outside link we dont need any ajax.

        // console.info(window.qucreative_options.enable_ajax, margs.force_no_ajax)



        var new_footer_extra_content_html = '';
        if(window.qucreative_options.enable_ajax == 'on' && ( !(_t) || _t.hasClass('not-ajax')==false ) && window && margs.force_no_ajax!='on' && allow_html5_link_process) {


            // console.info(thehref.indexOf('#'), thehref, thehref.split('#')[0], String(window.location.href).split('#')[0])
            if (thehref == '#' || (thehref && thehref.indexOf('#')==0 ) || ( thehref.indexOf('#')>-1 &&  thehref.split('#')[0] == String(window.location.href).split('#')[0] ) ) {


                if (window.qucreative_options.enable_native_scrollbar != 'on') {
                    return false;
                }
                if (thehref == '#') {
                }
            } else {
                //console.info('ceva', thehref.indexOf('file://'), window.location.href);
                //console.info('ceva', thehref.indexOf('http://') > -1, thehref.indexOf(ajax_site_url));

                // console.log(( window.location.href.indexOf('file://') ==0 || ( thehref.indexOf('http://') > -1 || ( thehref.indexOf('http://') > -1  && thehref.indexOf(ajax_site_url)!= 0) )),window.location.href.indexOf('file://') ==0, ( ( thehref.indexOf('http://') > -1  && thehref.indexOf(ajax_site_url)!= 0) ));
                //
                //
                // console.info( window.location.href, thehref, ajax_site_url )
                // return false;

                // console.info(thehref.indexOf(ajax_site_url));
                if ( window.location.href.indexOf('file://') ==0  || ((thehref.indexOf('http://') > -1||thehref.indexOf('https://') > -1) && ( thehref.indexOf(ajax_site_url)!= 0) ) ) {



                } else {
                    //if indeed we are going to history api it

                    //console.info(scripts_loaded_arr);
                    clearInterval(inter_bg_slideshow);
                    $('body').removeClass('loaded');

                    if (can_history_api()) {
                        scripts_tobeloaded=[];
                        stylesheets_tobeloaded=[];
                        var nr_scripts_tobeloaded = 0;


                        $('.portfolio-fulscreen--items').remove();
                        _body.addClass('q-ajax-transitioning');
                        $.ajax({
                            url: thehref,
                            context: document.body
                        }).done(function (response) {

                            if(_t){
                                //console.info(_t.parent().parent().parent());
                                if(_t.parent().parent().parent().hasClass('menu-toggler-target')){
                                    _t.parent().parent().parent().removeClass('active');
                                }
                                if(_t.parent().parent().parent().parent().parent().hasClass('menu-toggler-target')){
                                    _t.parent().parent().parent().parent().parent().removeClass('active');
                                }
                            }

                            // console.info('response - ',response);
                            response_str = response;
                            ___response = $(response);



                            if(response.indexOf('widget_media_video')>-1){

                                scripts_tobeloaded.push(window.qucreative_options.site_url+'/wp-includes/js/mediaelement/mediaelement-and-player.min.js');
                                scripts_tobeloaded.push(window.qucreative_options.site_url+'/wp-includes/js/mediaelement/wp-mediaelement.min.js');
                            }

                            var regex_bodyclass = /<body.*?class="(.*?)"/g;
                            var regex_bodyclass_page = /<body.*?class=".*?(page-(?:blogsingle|homepage|gallery-w-thumbs|normal|contact|about|contact|portfolio|portfolio-single))[ |"]/g;
                            var regex_the_content_con_class = /<div class="(the-content-con.*?)"/g;
                            var regex_menu_type = /menu-type-\d*/g;


                            var aux23 = regex_bodyclass.exec(response);

                            newclass_body = '';
                            newclass_body_page = '';

                            if(aux23){
                                if(aux23[1]){
                                    newclass_body = aux23[1];
                                }
                            }


                            aux23=regex_bodyclass_page.exec(response);


                            if(aux23){
                                if(aux23[1]){
                                    newclass_body_page = aux23[1];
                                }
                            }


                            aux23 = regex_the_content_con_class.exec(response);
                            if(aux23){
                                if(aux23[1]){
                                    newclass_content_con = aux23[1];
                                }
                            }

                            //console.error('newclass_content_con - ',newclass_content_con);

                            //console.warn('response - ',response);

                            newclass_body+=' q-inited q-inited-bg';



                            // -- attributes which we need

                            // console.info('curr body class', _body.attr('class'));
                            var aux = regex_menu_type.exec(_body.attr('class'));

                            // console.info(aux);

                            newclass_body = newclass_body.replace(/menu-type-\d*/g, '');

                            if(aux && aux[0]){

                                // console.info(aux[0]);
                                newclass_body+=' '+aux[0];
                            }


                            // console.info('newclass_body - ',newclass_body);
                            // console.info('newclass_body_page - ',newclass_body_page);

                            //console.log(newclass_body);

                            newclass_body_nopadding = false;
                            newclass_body_with_fullbg = false;

                            // regex_bodyclass = /<body.*?class=".*?(no-padding)[ |"]/g;







                            // console.log(response, ___response);


                            //console.log(scripts_loaded_arr);



                            var match = null;





                            var regex_scripts = /<script.*?src=['|"](.*?)['|"][\s|\S]*?\/script>/gim;

                            while (match = regex_scripts.exec(response)) {

                                // console.info(match);

                                if (match[1]) {


                                    var sw = false;

                                    for (var j = 0; j < scripts_loaded_arr.length; j++) {

                                        //console.info(_t4.src, scripts_loaded_arr[j], (qucreative_options.site_url + scripts_loaded_arr[j]));

                                        // console.info(_t4.src, scripts_loaded_arr[j], ajax_site_url);

                                        // var auxa = scripts_loaded_arr[j].explode('?');

                                        var aux = match[1];
                                        if (aux.indexOf('&') > -1) {
                                            aux = aux.split('&')[0];
                                        }

                                        if (match[1] == '' || scripts_loaded_arr[j] == match[1] || ajax_site_url + scripts_loaded_arr[j] == match[1]) {
                                            sw = true;
                                        }
                                    }

                                    // console.info(_t4.src);

                                    if (sw == false && match[1]) {

                                        scripts_tobeloaded.push(match[1]);
                                    }

                                }
                            }





                            var regex_links = /(<!--\[if lt IE \d*\]>[\S|\s]{0,1})?<link.*?href=['|"](.*?)['|"][\s|\S]*?\/{0,1}>/gim;


                            while (match = regex_links.exec(response)) {

                                // console.info(match);

                                if (match[2]) {


                                    var sw = false;

                                    for (var j = 0; j < scripts_loaded_arr.length; j++) {

                                        //console.info(_t4.src, scripts_loaded_arr[j], (qucreative_options.site_url + scripts_loaded_arr[j]));

                                        // console.info(_t4.src, scripts_loaded_arr[j], ajax_site_url);
                                        if (match[1] || match[2] == '' || scripts_loaded_arr[j] == match[2] || ajax_site_url + scripts_loaded_arr[j] == match[2] || String(match[0]).indexOf("stylesheet")==-1 ) {
                                            sw = true;
                                        }
                                    }

                                    // console.info(_t4.src);

                                    if (sw == false && match[2]) {

                                        stylesheets_tobeloaded.push(match[2]);
                                    }

                                }
                            }


                            var regex_env = /<style.*?id='qucreative-inline-css'.*?>([\s|\S]*?)<\/style>/gim;


                            // console.groupCollapsed("response");
                            // console.info(response);
                            // console.groupEnd();

                            while (match = regex_env.exec(response)) {

                                // console.info('meatched inline css', match);

                                if (match[1]) {




                                    if(window.qucreative_env_style_index>2){
                                        $('.qucreative-inline-css'+(window.qucreative_env_style_index-2)).remove();
                                    }

                                    _body.append('<style class="qucreative-inline-css'+window.qucreative_env_style_index+'">'+match[1]+'</style>')

                                    window.qucreative_env_style_index++;

                                }
                            }


                            var regex_vc_custom = /<style.*?data-type="vc_shortcodes-custom-css">([\s|\S]*?)<\/style>/gim;


                            while (match = regex_vc_custom.exec(response)) {

                                // console.info(match);

                                if (match[1]) {




                                    if(window.qucreative_env_style_index>2){
                                        $('.vc_shortcodes-custom-css'+(window.qucreative_env_style_index-2)).remove();
                                    }

                                    _body.append('<style class="vc_shortcodes-custom-css'+window.qucreative_env_style_index+'">'+match[1]+'</style>')

                                    window.qucreative_env_style_index++;

                                }
                            }




                            var regex_env = /<div class="map-canvas-con">([\s|\S]*?)<\/div>\<!--end map canvas con-->/gim;


                            while (match = regex_env.exec(response)) {

                                // console.info(match);

                                if (match[1]) {



                                    if($('.map-canvas-con').length){
                                        $('.map-canvas-con').html(match[1]);
                                    }else{
                                        _body.append('<div class="map-canvas-con">'+match[1]+'</div>');
                                    }

                                }
                            }





                            var regex_footer_extra = /<div class="footer-extra-zoombox-items">([\s|\S]*?)<span style="display: none;">dzs2<\/span><\/div>/gm ;

                            var aux = (regex_footer_extra.exec(response));

                            if(aux){
                                if(aux[1]){
                                    new_footer_extra_content_html = aux[1];
                                }
                            }

                            // console.info('aux - ',aux);

                            //console.groupCollapsed('whole response');
                            //console.log(response);
                            //console.groupEnd();
                            //console.groupCollapsed('new_footer_extra_content_html');
                            //console.log(new_footer_extra_content_html);
                            //console.groupEnd();





                            var regex_mo = /<div.*?class="qucreative-option-feed"(.*?)>([\s|\S]*?)<\/div>/gim;


                            while (match = regex_mo.exec(response)) {

                                // console.info(match);

                                if (match[1]) {




                                    if(match[1].indexOf('mainoptions')>-1){

                                        try{
                                            var arg = JSON.parse(match[2]);

                                            qcreative_overwrite_mainoptions(arg);
                                        }catch(err){
                                            console.info("CANNOT PARSE", err, match[2]);
                                        }
                                    }




                                    if(match[1].indexOf('zoombox-options')>-1){

                                        try{
                                            var arg = JSON.parse(match[2]);
                                            if(zoombox_options){

                                                old_zoombox_options = $.extend([],zoombox_options);
                                            }

                                            if(window.zoombox_default_opts_string){
                                                var def_opts_parse  = $.extend(true, {},$.parseJSON(window.zoombox_default_opts_string));
                                                // zoombox_options = $.extend(def_opts_parse, window.init_zoombox_settings);


                                                if(arg.type=='darkfull'){
                                                    zoombox_options = $.extend(def_opts_parse, window.init_zoombox_darkfull);
                                                }

                                                if(arg.type=='whitefull'){
                                                    zoombox_options = $.extend(def_opts_parse, window.init_zoombox_whitefull);
                                                }

                                                //console.info('new zoombox settings', zoombox_options,window.zoombox_default_opts,window.init_zoombox_settings);
                                                window.init_zoombox_settings = zoombox_options;
                                            }else{

                                                // console.info('arg.type - ',arg.type);


                                                window.init_zoombox_preset = arg.type; ;


                                                if(window.init_zoombox_preset=='darkfull'){
                                                    window.init_zoombox_settings = $.extend({}, window.init_zoombox_darkfull);
                                                }

                                                if(window.init_zoombox_preset=='whitefull'){
                                                    window.init_zoombox_settings = $.extend({}, window.init_zoombox_whitefull);
                                                }
                                            }



                                            if(window.api_zoombox_setoptions){
                                                //window.api_zoombox_setoptions(zoombox_options);
                                            }

                                            qcre_init_zoombox = true;


                                        }catch(err){
                                            console.info("CANNOT PARSE", err, match[2]);
                                        }
                                    }



                                    if(match[1].indexOf('gmaps-styling')>-1){

                                        try{

                                            window.str_gmaps_styling = match[2];

                                        }catch(err){
                                            console.info("CANNOT PARSE", err, aux.html());
                                        }
                                    }


                                    // qcreative_overwrite_mainoptions();
                                }
                            }



                            if($('.footer-extra-zoombox-items').length){
                                $('.footer-extra-zoombox-items').html(new_footer_extra_content_html);
                            }else{

                                _body.append('<div class="footer-extra-zoombox-items">'+new_footer_extra_content_html+'<span style="display: none;">dzs2</span></div>')
                            }



                            social_scripts_reinit = false;
                            for (i = 0; i < ___response.length; i++) {
                                var _t3 = ___response[i];


                                // -- parse each item

                                var aux_href = '';
                                if(_t3.href){
                                    aux_href = _t3.href;

                                    if(aux_href.indexOf('./')==0){
                                        aux_href = aux_href.replace('./','');
                                    }
                                }



                                if(_t3.nodeName=='TITLE'){
                                    newtitle = _t3.innerHTML;

                                }






                            }
                            // -- parsing response end

                            //console.info(scripts_loaded_arr);
                            //console.info(scripts_tobeloaded, stylesheets_tobeloaded);
                            // console.info('scripts_tobeloaded -> ',scripts_tobeloaded);
                            // console.info('stylesheets_tobeloaded -> ',stylesheets_tobeloaded);
                            // console.info('scripts_loaded_arr -> ',scripts_loaded_arr);


                            //console.info($.zfolio);
                            setTimeout(function() {
                                var i = 0;
                                nr_scripts_tobeloaded = scripts_tobeloaded.length + stylesheets_tobeloaded.length;


                                function loadFunc(e){
                                    //console.info(e);
                                }

                                // console.warn('nr_scripts_tobeloaded - ',nr_scripts_tobeloaded);
                                if(nr_scripts_tobeloaded<=0){



                                    load_new_page();
                                    return false;
                                }

                                //console.info(scripts_tobeloaded);


                                var i4 = 0;
                                for(i4=0;i4<scripts_tobeloaded.length;i4++){

                                    // console.info(scripts_tobeloaded[i4]);
                                    $.getScript( scripts_tobeloaded[i4]).done(function( data, textStatus, jqxhr ) {
                                        //console.log( data ); // Data returned
                                        //console.log( textStatus ); // Success
                                        //console.log( jqxhr.status ); // 200
                                        //console.log( "Load was performed." );




                                        //console.log(this, data,textStatus, jqxhr);


                                        if(String(this.url).indexOf('http://maps.googleapis.com/maps')>-1){

                                            window.google_maps_loaded = true;
                                            window.gooogle_maps_must_init = true;
                                        }
                                        //
                                        //if(!(data)){
                                        //    //console.info('load was not performed', i4, scripts_tobeloaded[i4], jqxhr);
                                        //
                                        //
                                        //    //console.info(window.google_maps_loaded)
                                        //    if(window.google_maps_loaded==false){
                                        //
                                        //        var scriptElement = document.createElement('script');
                                        //        //console.info(scriptElement.async);
                                        //        //scriptElement.async = true;
                                        //        //console.info(scriptElement.async);
                                        //        scriptElement.src = "https://maps.googleapis.com/maps/api/js?v=3&callback=qcreative_gm_init";
                                        //        document.getElementsByTagName('head')[0].appendChild(scriptElement);
                                        //
                                        //        window.google_maps_loaded = true;
                                        //    }else{
                                        //        window.gooogle_maps_must_init = true;
                                        //    }
                                        //}


                                        nr_scripts_tobeloaded--;

                                        // console.warn(nr_scripts_tobeloaded, scripts_tobeloaded);

                                        if(nr_scripts_tobeloaded<=0){

                                            load_new_page();
                                        }

                                        //console.info(this,i4);

                                        var aux = this.url;

                                        if(aux.indexOf('?')>-1){
                                            aux = aux.split('?')[0];
                                        }

                                        //console.info(aux);
                                        scripts_loaded_arr.push(aux);

                                    }).fail(function( jqxhr, settings, exception ) {
                                        console.log( "Triggered ajaxError handler.",jqxhr, settings, exception, this );

                                        nr_scripts_tobeloaded--;
                                        if(nr_scripts_tobeloaded<=0){

                                            load_new_page();
                                        }
                                    });
                                }
                                for(i4=0;i4<stylesheets_tobeloaded.length;i4++){

                                    // console.warn("LOADING STYLESHEET -> ", stylesheets_tobeloaded[i4]);
                                    $('<link/>', {
                                        rel: 'stylesheet',
                                        type: 'text/css',
                                        href: stylesheets_tobeloaded[i4]
                                    }).appendTo('head');

                                    scripts_loaded_arr.push(stylesheets_tobeloaded[i4]);





                                    nr_scripts_tobeloaded--;

                                    // console.warn(nr_scripts_tobeloaded, scripts_tobeloaded);

                                    if(nr_scripts_tobeloaded<=0){

                                        load_new_page();
                                    }
                                }


                                setTimeout(function(){
                                    //console.info(window.dzsprx_init);
                                    //console.info($.zfolio,jQuery.zfolio);
                                },1000)


//                            console.info(___response, ___response_scriptmo);
                            }, 100);


                            //console.info(thehref)



                            // console.warn("FADE - ",_navCon.find('.translucent-con'));
                            if(bg_transition=='fade'){

                                var aux9000 = _mainBg;

                                setTimeout(function(){

                                    if(aux9000.get(0) && aux9000.get(0).api_destroy){

                                        aux9000.get(0).api_destroy();
                                    }
                                },300);
                            }else{

                                if(_mainBg.get(0) && _mainBg.get(0).api_destroy){

                                    _mainBg.get(0).api_destroy();
                                }
                            }




                            //console.info('destroy zoombox');


                            if(window.api_destroy_zoombox){
                                window.api_destroy_zoombox();
                            }

                            //console.info()

                            //console.info('STATE CURR MENU ITEMS LINKS2',state_curr_menu_items_links);



                            if(_t.get(0)!=window) {



                                if(history_first_pushed_state==false){

                                    if ( window.location.href.indexOf('file://')===-1){

                                        var aux = curr_html;
                                        if(aux=='index.html'){
                                            aux = '';
                                        }
                                        if(aux=='index.php'){
                                            aux = '';
                                        }

                                        var stateObj = {href: curr_html};


                                        //console.info("curr_url HREF - ", curr_html);
                                        //console.info("INTRODUCED HREF - ", aux);
                                        history.pushState(stateObj, null, aux);
                                    }
                                    history_first_pushed_state=true;
                                }

                                var aux_arr = state_curr_menu_items_links.slice(0);

                                var stateObj = {foo: page_change_ind, href: thehref, 'curr_menu_items': aux_arr};

                                page_change_ind++;
                                // console.info('PUSH STATE', stateObj, newtitle, thehref)
                                history.pushState(stateObj, newtitle, thehref);
                                if(newtitle){
                                    document.title = newtitle;
                                }


                                // console.info(window.history);
                            }
                        });


                        //console.info(_t.parent());




                        //console.info(state_curr_menu_items_links);

                        //state_curr_menu_items_links = _theActualNav.find('.current-menu-item');


                        // console.info(_t, _t.get(0));
                        if(_t.get(0)!=window){

                            // -- adjust current-menu-item



                            state_curr_menu_items_links = [];

                            _theActualNav.find('.current-menu-item').each(function(){
                                var _t = $(this);

                                //console.log(_t,_theActualNav.find('*').index(_t));


                                state_curr_menu_items_links.push(_theActualNav.find('li').index(_t));
                            })

                            //console.info('STATE CURR MENU ITEMS LINKS', state_curr_menu_items_links);

                            //console.info(_t, _t.attr('rel'), _theActualNav);



                            // console.warn('_t - ',_t);




                            if( ( _t && _t.hasClass('donotchange-ajax-menu') )==false ) {


                                // console.info("HMM - ", _t);

                                if(_t){
                                    // console.info("HMM2", _t.hasClass('donotchange-ajax-menu'));
                                }
                                _theActualNav.find('.current-menu-item,.current-menu-ancestor').removeClass('current-menu-item current-menu-ancestor');
                                if (_t.attr('rel') == 'home') {
                                    if (_theActualNav.find('a[rel=home]').length > 0) {

                                        _theActualNav.find('a[rel=home]').eq(0).parent().addClass('current-menu-item');
                                    }
                                }

                                if (_t.parent().parent().hasClass('the-actual-nav')) {
                                    _t.parent().addClass('current-menu-item');
                                }
                                if (_t.parent().parent().parent().parent().hasClass('the-actual-nav')) {
                                    _t.parent().parent().parent().parent().find('.current-menu-item').removeClass('current-menu-item');
                                    _t.parent().parent().parent().addClass('current-menu-item');
                                    _t.parent().addClass('current-menu-item');
                                }


                                if (_t.parent().parent().parent().parent().parent().parent().hasClass('the-actual-nav')) {
                                    _t.parent().parent().parent().parent().parent().parent().find('.current-menu-item').removeClass('current-menu-item');

                                    // console.info(_t);
                                    _t.parent().parent().parent().parent().parent().addClass('current-menu-item');
                                    _t.parent().parent().parent().addClass('current-menu-item');
                                    _t.parent().addClass('current-menu-item');
                                }
                            }
                        }

                        if(_t && _t.hasClass('ajax-link')){
                            if( ( _t && _t.hasClass('donotchange-ajax-menu') )==false ) {
                                _theActualNav.find('li > a').each(function () {
                                    var _t3 = $(this);

                                    //console.log(_t3, _t3.attr('href'), thehref);

                                    if (_t3.attr('href') == thehref || _t3.attr('href') == ajax_site_url + thehref) {
                                        _theActualNav.find('li').removeClass('current-menu-item');
                                        _t3.parent().addClass('current-menu-item');
                                    }
                                })
                            }
                        }


                        return false;
                    }


                }

            }
        }

    }


    function load_new_page(){

        // -- @stack trace
        // -- click_menu_anchor()
        // -- load_new_page
        // goto_bg(newpage);

        //console.info('load_new_page()');

        videoplayers_tobe_resized = [];

        goto_bg(0,{newpage_transition: true
            ,'call_from':'load_new_page'
        });

        //console.info(___response);
    }


    function add_default_bg_class(){

    }

    function goto_bg(arg,pargs){
        // console.info('goto_bg('+arg+')', pargs, 'is_ready_transition - ', is_ready_transition);

        if(busy_main_transition){
            return false;
        }


        var margs = {
            newpage_transition: false
            ,'call_from':'default'
        }
        if(pargs){
            margs = $.extend(margs,pargs);
        }

        var cek = qucreative_options.images_arr[arg];

        //console.info(margs);



        if(_theContent && ( ( _theContent.parent().hasClass('page-portfolio-single') && _theContent.parent().hasClass('page-portfolio-type-slider') ) || ( _theContent.parent().hasClass('page-blogsingle') && _theContent.parent().hasClass('post-media-type-slider') ) )   ){

            if(window.qucreative_options.the_background){
                cek = window.qucreative_options.the_background;
            }
        }



        // console.warn('cek - ',cek);

        var img = new Image();



        if($('.main-gallery--descs').length>0){
            _mainGalleryDescs = $('.main-gallery--descs').eq(0);
        }



        if(bg_transition=='fade') {
            _mainBg.addClass('for-remove js-transitioning-out');
            if(_theContent){

                _theContent.parent().addClass('js-transitioning-out');
            }
            _navCon.addClass('js-transitioning-out');
            _navCon.find('.translucent-con').addClass('js-transitioning-out');
            //_navCon.find('.translucent-canvas').addClass('js-transitioning-out');
        }


        // -- lets kill all page-homepage main gallery descs
        if(_mainGalleryDescs){
            if(_mainGalleryDescs.children('.active').length>0){

                _mainGalleryDescs.css({
                    'width' : ''
                    ,'opacity' : ''
                })
                setTimeout(function(){

                    // -- firefox windows bug fix
                    _mainGalleryDescs.css({
                        'width' : ''
                    })
                },20);
                setTimeout(function(){
                    is_ready_transition=true;
                    if(is_ready_load==true){
                        margs.call_from = ' is_ready_transition now, is_ready_load was';
                        goto_bg_doit(arg,margs);
                        //console.info('ceva from desc');
                    }

                    if(_mainGalleryDescs){

                        _mainGalleryDescs.css({
                            'height' : '0'
                        })
                    }

                },500);

            }else{
                is_ready_transition=true;
            }
        }else{
            is_ready_transition=true;
        }


        img.onload = function(e){
            // image  has been loaded

            is_ready_load = true;
            bg_errored = false;
            if(is_ready_transition==true){
                margs.call_from = ' is_ready_load now, is_ready_transition was';
                goto_bg_doit(arg, margs);
                //console.info('ceva from onload');
            }

        };
        img.onerror = function(e){
            // image  has been loaded

            bg_errored = true;

            is_ready_load = true;

            if(is_ready_transition==true) {
                margs.call_from = 'bg_errored yes, is_ready_transition now, is_ready_load was';
                goto_bg_doit(arg, margs);
            }
            //console.info(e);

        };





        // --if it's background color
        if(cek.indexOf('#')==0){

            is_ready_load = true;
            if(is_ready_transition==true){

                margs.call_from = 'is_ready_load now, is_ready_transition was';
                goto_bg_doit(arg, margs);
                //console.info('ceva from onload');
            }

        }else{

            img.src = cek;
        }




        busy_main_transition = true;
    }





    function do_we_need_parallaxer(arg){



        if(arg){

        }else{
            arg='newbody';
        }


        if(arg=='newbody'){

            return (window.qucreative_options.bg_isparallax=='on' && newclass_body_page!='page-homepage' && newclass_body_page!='page-gallery-w-thumbs' &&  ( newclass_content_con.indexOf('page-portfolio-single')>-1 && newclass_content_con.indexOf('page-portfolio-type-image')>-1 &&  newclass_content_con.indexOf('single-antfarm_port_items-fullscreen')>-1 )==false  );
        }
        if(arg=='currbody'){



            return (window.qucreative_options.bg_isparallax=='on' && _body.attr('class').indexOf('page-homepage')==-1 && _body.attr('class').indexOf('page-gallery-w-thumbs')==-1 &&  ( _body.attr('class').indexOf('page-portfolio-single')>-1 && _body.attr('class').indexOf('page-portfolio-type-image')>-1 && _body.attr('class').indexOf('single-antfarm_port_items-fullscreen')>-1     )==false );
        }

        return false;

    }

    function goto_bg_doit(arg,pargs){

        // -- image has loaded


        wh = window.innerHeight;


        var margs = {
            newpage_transition: false
            ,'call_from':'default'
        };

        if(pargs){
            margs = $.extend(margs,pargs);
        }



        if(border_width>0){

            // wh = wh - (border_width*2);
        }

        // console.info('goto_bg_do_it('+arg+')',margs, '_theContent - ',_theContent);


        if(margs.newpage_transition){
            // return false;
        }

        var extra_class = '';
        var extra_class_main_bg = '';
        var isparallax = false;
        var targeth = '100%';
        var extra_translate = '';



        margs.arg = arg;



        if(window.qucreative_options.bg_isparallax!='on'){


        }



        if(do_we_need_parallaxer() ){



            extra_class+=' dzsparallaxer';
            extra_class_main_bg+=' dzsparallaxer--target';


            isparallax=true;



            var auxpix = (wh*(parallaxer_multiplier-1) - qucreative_options.substract_parallaxer_pixels);


            // -- for main-bg-con


            extra_translate='transform: translate3d(0,-'+auxpix+'px,0);';

        }









        var aux_top = '-50';

        is_content_page = false;
        if(newclass_body.indexOf('page-normal')>-1||newclass_body.indexOf('page-blogsingle')>-1||newclass_body.indexOf('page-blog')>-1||newclass_body.indexOf('page-portfolio')>-1){

            is_content_page=true;

        }

        if(margs.newpage_transition==false){
            if(_body.hasClass('page-normal') || _body.hasClass('page-blogsingle') || _body.hasClass('page-blog') || _body.hasClass('page-portfolio')){

                is_content_page=true;
            }
        }

        //console.info('ADD new-',newclass_body);
        _body.addClass('new-'+newclass_body_page);



        bg_transition='slidedown';
        if(initial_bg_transition){
            bg_transition = initial_bg_transition;
        }


        // console.info('initial_bg_transition - ',initial_bg_transition);
        // console.info('bg_transition - ',bg_transition);

        //console.info('first_bg_not_transitioned - ',first_bg_not_transitioned,'margs.newpage_transition - ',margs.newpage_transition,'is_content_page - ',is_content_page)
        if(first_bg_not_transitioned==false&&margs.newpage_transition==false && is_content_page){

            bg_transition = 'fade';
        }

        first_bg_not_transitioned = false;
        if(bg_transition=='fade'){

            aux_top = 0;
        }


        // console.error("HIER3");

        //console.log(aux_top);



        if(bg_transition=='fade') {
            //_mainBg.addClass('for-remove');
            //
            //var aux9000 = _mainBg;
            //
            ////console.info('aux9000 is ',aux9000);
            //
            //setTimeout(function () {
            //
            //    if (aux9000.get(0) && aux9000.get(0).api_destroy) {
            //
            //        aux9000.get(0).api_destroy();
            //    }
            //}, 1000);
        }

        if(margs.newpage_transition==true){

        }else{

            _mainBg.addClass('for-remove');

            var aux9000 = _mainBg;

            //console.info('aux9000 is ',aux9000);

            setTimeout(function () {

                if (aux9000.get(0) && aux9000.get(0).api_destroy) {

                    aux9000.get(0).api_destroy();
                }
            }, 1000);
        }
        //extra_translate = '';
        //console.info(extra_translate, wh);


        var the_bg = qucreative_options.images_arr[arg];


        // -- here has an impact
        if(_theContent && ( ( _theContent.parent().hasClass('page-portfolio-single') && _theContent.parent().hasClass('page-portfolio-type-slider') ) || ( _theContent.parent().hasClass('page-blogsingle') && _theContent.parent().hasClass('post-media-type-slider') ) )   ){

            if(window.qucreative_options.the_background){
                the_bg = window.qucreative_options.the_background;
            }
        }



        var aux23_img ='<img class="main-bg-image'+extra_class_main_bg+'" style=" '+extra_translate+'" src="'+the_bg+'"/>';

        if(the_bg.indexOf("#")==0){
            aux23_img ='<div class="main-bg-image is-image '+extra_class_main_bg+'" style=" width: 100%;height:120%; background-color: '+the_bg+'; '+extra_translate+'"></div>';
        }

        var mainBgConTr_str = '<div class="main-bg-con do-not-set-js-height js-transitioning-in preparing-to-transition transitioning'+extra_class+'" style="display:none;';

        if(bg_transition=='fade') {
            //mainBgConTr_str+='opacity: 0;';
        }


        mainBgConTr_str+='">'+aux23_img+'<div class="main-bg-div"  style="height: '+wh+'px; background-image:url('+the_bg+');"></div></div>';



        //console.log(mainBgConTr_str);

        //mainBgConTr_str = '';
        //console.info(window.qucreative_options.bg_isparallax,mainBgConTr_str);


        //console.info(mainBgConTr_str);







        if(first_transition == false && bg_transition=='fade'){

            //$('.the-content-con').css('opacity','');
            //$('.main-bg-con').addClass('transitioning-out');
            //$('.translucent-con--for-nav-con .translucent-canvas').addClass('transitioning-out');
            //
            //if($('.translucent-con--for-the-content').eq(0).hasClass('drawn')){
            //    $('.translucent-con--for-the-content .translucent-canvas').eq(0).addClass('transitioning-out');
            //}
        }
        // -- new page transition
        if(margs.newpage_transition==true){


            //console.info('PAGE IS '+page);

            if(page=='page-homepage'){
                if($('.main-gallery--descs').length>0){

                    $('.main-gallery--descs').addClass('removed');
                    _mainGalleryDescs = null;
                }

                currBgNr=0;
            }

            _mainBg.removeClass('js-transitioning-in')

            //console.info(_navCon, mainBgConTr_str);


            // console.info('MOVE CONTENT CON', new_bg_transition);



            if(_body.hasClass('menu-type-9')||_body.hasClass('menu-type-10') || _body.hasClass('menu-type-13') || _body.hasClass('menu-type-14') || _body.hasClass('menu-type-15') || _body.hasClass('menu-type-16') || _body.hasClass('menu-type-17') || _body.hasClass('menu-type-18')){

                //_mainContainer.append(_theContentConTr);
                // console.warn("goto_bg_doit() - ", margs, new_bg_transition);
                $('.the-content-con').addClass('transitioning-out').removeClass('currContent');


                if(bg_transition=='fade' && margs.newpage_transition){
                    $('.the-content-con.transitioning-out').animate({
                        //'opacity': 0
                    },{
                        queue:false
                        ,duration: animation_time
                    })
                }

                if(new_bg_transition!='off'){

                    // -- not sure if here
                    _mainContainer.append(mainBgConTr_str);
                }

            }else{

                //console.warn("HIER", margs, new_bg_transition);
                $('.the-content-con').addClass('transitioning-out').removeClass('currContent');

                if(new_bg_transition!='off'){

                    _navCon.before(mainBgConTr_str);
                }
            }



            calculate_mainbg({
                'call_from':'new_page'
            });

            //console.info($('.main-bg-con'));

            if($('.main-bg-con.transitioning').eq(0).hasClass('dzsparallaxer')){

                // goto_bg_do_it

                //window.debug_index = 250;
                //setInterval(function(){
                //
                //    if(window.debug_index>0 && $('.main-bg-con.js-transitioning-in').get(0) ){
                //        //console.info(window.debug_index,$('.main-bg-con.transitioning').eq(0).find('.dzsparallaxer--target').css('transform'));
                //        console.info(window.debug_index,$('.main-bg-con.js-transitioning-in').find('.dzsparallaxer--target').get(0).style.transform);
                //        //console.info(window.debug_index,_mainBg.css('transform'));
                //        window.debug_index--;
                //    }
                //
                //},5)


                //console.info('target pixels - ',bigimageheight-wh-qucreative_options.substract_parallaxer_pixels);
                $('.main-bg-con.transitioning').eq(0).find('.dzsparallaxer--target').css({
                    'transform': 'translate3d(0,-'+(bigimageheight-wh-qucreative_options.substract_parallaxer_pixels)+'px,0)'
                })

                //console.info($(window).height(),bigimageheight-$(window).height(), 'translate3d(0,-'+(bigimageheight-$(window).height())+'px,0)');
            }

            if(_theContent){


                _theContent.find('.selector-con,.call-to-action-con, .row.services-lightbox-content, .dzs-tabs.skin-menu .tabs-menu').css({
                    'z-index':'auto'
                });
                _theContent.find('.advancedscroller.skin-whitefish.is-thicker .bulletsCon').animate({
                    'opacity':'0'
                },{
                    queue:false
                    ,duration: 300
                });




            }


            if(___response) {


                // -- do script actions


                //$('.the-content-con').remove();





                var sw_wait_for_load = false;


                //response_str
                // console.info("DEFINE _theContentConTr hier",___response.find('.wait-for-load'),___response);

                if(response_str.indexOf('<div class="qucreative-option-feed" data-rel="zfolio-wait-for-load">')>-1){
                    sw_wait_for_load=true;
                }

                _theContentConTr = ___response.find('.the-content-con');

                //console.log(_theContentConTr);

                _theContentConTr.addClass('transitioning');

                if(sw_wait_for_load){
                    _theContentConTr.addClass('wait-for-main-content-to-load');
                }



                if(force_content_width){





                    setTimeout(function(){

                    },1500);




                }



                initial_offset = _theContentConTr.offset().left;
                if(_theContentConTr.hasClass('fullit')==false){


                    page_is_fullwidth = false;


                    setTimeout(function(){



                        lastcontent_w = _theContentConTr.width();


                        _theContentConTr.css({
                        })

                        _theContentConTr.css({

                        })





                        _theContentConTr.children('').css({

                        })

                        _theContentConTr.children('h1,.the-content,footer').css({

                        })

                    },100)
                }else{

                    _theContentConTr.css({
                        'opacity': 0
                    });

                    // lets normalize for the portfollio TODO: lets remove for a while
                    _theContentConTr.find('.zfolio.fullwidth').css({
                        // 'width' : ww-menu_width
                    })

                    page_is_fullwidth = true;


                }
                ;



                // -- here we add them
                if(_body.hasClass('menu-type-9')||_body.hasClass('menu-type-10')  || _body.hasClass('menu-type-13') || _body.hasClass('menu-type-14') || _body.hasClass('menu-type-15') || _body.hasClass('menu-type-16') || _body.hasClass('menu-type-17') || _body.hasClass('menu-type-18')){

                    _mainContainer.append(_theContentConTr);
                }else{


                    _navCon.before(_theContentConTr);

                }


                if(_gallery_thumbs_con){

                    _gallery_thumbs_con.find('.thumbs-list-con').eq(0).unbind('mousemove');
                }





                // -- destroy listeners
                if(_theContent){

                    _theContent.find('.vplayer,.zfolio,.audioplayer').each(function(){
                        var _t = $(this);


                        if(_t.get(0) && _t.get(0).api_destroy_listeners){
                            _t.get(0).api_destroy_listeners();
                        }


                        setTimeout(function(arg){

                            if(arg && arg.api_destroy){
                                arg.api_destroy();
                            }
                            _t[0] = null;
                        },1000,_t.get(0));


                    });
                }




                _theContentConTr.find('a.comment-reply-link').addClass('custom-a');
                if(window.dzsas_init){

                    if(ww>responsive_breakpoint){
                        if(_body.hasClass('page-portfolio') && newclass_body_page == 'page-portfolio-single' && _theContentConTr.hasClass('fullit')==false){

                        }
                    }


                    dzsas_init(_theContentConTr.find('.advancedscroller.skin-qucreative.auto-init-from-q'),{
                        init_each: true
                    });

                    // console.info(_theContentConTr.find('.advancedscroller.skin-trumpet.auto-init-from-q'));
                    dzsas_init(_theContentConTr.find('.advancedscroller.skin-trumpet.auto-init-from-q'),{
                        init_each: true
                    });
                }

                if(window.dzszfl_init){


                    if(ww>responsive_breakpoint){
                        if(newclass_body_page == 'page-portfolio' && _theContentConTr.hasClass('fullit')==false){

                        }
                    }

                    dzszfl_init(_theContentConTr.find('.zfolio.auto-init-from-q'),{
                        init_each: true
                    });





                    setTimeout(function(){


                        $('.the-content-con .zfolio').each(function(){
                            var _t100 = $(this);

                            if(_t100.get(0) && _t100.get(0).api_handle_resize){

                                if(_t100.parent().parent().parent().parent().hasClass('the-content-con')){
                                    _t100.parent().parent().parent().parent().css('width','');
                                }

                                _t100.get(0).api_handle_resize();
                            }
                        })
                    },1000)

                }









            }
        }else{

            // -- same page

            //console.info('ceva');
            // console.warn("HIER2 - ", margs, ___response);

            if(new_bg_transition!='off'){

                //console.info('new_bg_transition != off', _mainBg, mainBgConTr_str);
                _mainBg.after(mainBgConTr_str);
            }

            calculate_mainbg({
                'call_from':'same_page'
            });



            //console.info('target pixels same page - ',bigimageheight-wh-qucreative_options.substract_parallaxer_pixels);
            if($('.main-bg-con.transitioning').eq(0).hasClass('dzsparallaxer')){

                $('.main-bg-con.transitioning').eq(0).find('.dzsparallaxer--target').css({
                    'transform': 'translate3d(0,-'+(bigimageheight-wh-qucreative_options.substract_parallaxer_pixels)+'px,0)'
                })
                //console.info($(window).height(),bigimageheight-$(window).height(), 'translate3d(0,-'+(bigimageheight-$(window).height())+'px,0)');
            }


        }

        _mainBgTransitioning = $('body').find('.main-bg-con.js-transitioning-in:not(.for-remove)');

        if(bg_transition=='fade'){

            setTimeout(function(){

                _mainBgTransitioning.addClass('transitioning-in ');
            },animation_time/2);
        }else{

            _mainBgTransitioning.addClass('transitioning-in ');
        }


        //console.info(mainBgConTr_str, _mainBgTransitioning.children('.main-bg-div').css('background-image'));


        //var animation_time = 400; // -- set later




        //console.info('ceva23232');
        if($('.qucreative--nav-con .translucent-canvas').length>0){


            // --- menubg ( still inside do_transition )

            if(  (menu_type == 'menu-type-5')==false && (menu_type == 'menu-type-6')==false && _body.hasClass('menu-type-7')==false && _body.hasClass('menu-type-8')==false && _body.hasClass('menu-type-9')==false && _body.hasClass('menu-type-10')==false && _body.hasClass('menu-type-15')==false && _body.hasClass('menu-type-16')==false){
                var _c = $('.qucreative--nav-con .translucent-con').eq(0);
                var targeth = '100%';

                // console.error('hony');



                // -- CLONING translucent-con ( do_transition )
                _c.after(_c.clone());
                _cache2_translucentCon = $('.qucreative--nav-con .translucent-con').eq(1); // -- navigation translucent-con











                _cache2_translucentCon.removeClass('dummy transitioning-out  js-transitioning-out ');
                _cache2_translucentCon.find('.translucent-canvas').removeClass('dummy transitioning-out  js-transitioning-out ');


                var the_bg = window.qucreative_options.images_arr[0];



                if(window.qucreative_options.the_background){
                    the_bg = window.qucreative_options.the_background;
                }






                // console.error('the_bg - ',the_bg);

                if(the_bg.indexOf('#')==0){
                    _cache2_translucentCon.find('.translucent-canvas').before('<div class="translucent-canvas-solid" style="width: 100%; height: 100%; background-color: '+the_bg+';"></div>');


                    setTimeout(function(){
                        _cache2_translucentCon.find('.translucent-canvas-solid').remove();
                    },800);
                }



                _cache2_translucentCon.addClass('transitioning transitioning-in preparing-to-transition');

                // console.info('bg_transition -> ',bg_transition, '_cache2_translucentCon - ',_cache2_translucentCon);
                if(bg_transition=='fade'){

                    _cache2_translucentCon.addClass('transitioning ');
                    _cache2_translucentCon.removeClass('  preparing-to-transition');
                    _cache2_translucentCon.find('.translucent-canvas').addClass('transitioning  preparing-to-transition');
                    setTimeout(function(){

                        _cache2_translucentCon.find('.translucent-canvas').addClass(' transitioning-in ');
                    },10)

                }else{

                }


                _cache2_translucentCon.hide();

                _navConTranslucentTransitioning = _cache2_translucentCon;



                //console.log();
                // if(window.qucreative_options.bg_isparallax=='on' && newclass_body_page!='page-homepage' && newclass_body_page!='page-gallery-w-thumbs'){
                if(do_we_need_parallaxer()){
                    //console.info(wh*0.3);
                    //_cache2_translucentCon.find('.translucent-bg').css({
                    //    'transform' : 'translate3d(0,-'+wh*0.3+'px,0)'
                    //    ,'height' : ((wh*parallaxer_multiplier) + 30)+'px'
                    //})

                    //console.info(bigimageheight,wh);
                    _navConTranslucentTransitioning.find('.translucent-canvas').css({
                        'transform' : 'translate3d(0,-'+(bigimageheight-wh-qucreative_options.substract_parallaxer_pixels)+'px,0)'
                        ,'height' : ((bigimageheight) )+'px'
                    })

                    if(_navConTranslucentTransitioning.find('.translucent-canvas').data('substract-translate')!='off'){
                        _navConTranslucentTransitioning.find('.translucent-canvas').data('substract-translate','on');
                    }
                }else{

                    _navConTranslucentTransitioning.find('.translucent-canvas').css({
                        'transform' : 'translate3d(0,0,0)'
                        ,'height' : ((wh) )+'px'
                    })

                    //console.info(wh, _c2.find('.translucent-bg').height());
                }




                //handle_resize();

                //console.log($('.main-bg-image'));


                //determine_page();
                //console.info(" -- page is really ", page, newclass_body);



                // console.info("do we need parallaxer 3 -> ",do_we_need_parallaxer());
                // if(newclass_body_page!='page-homepage' && newclass_body_page!='page-gallery-w-thumbs' && qucreative_options.bg_isparallax=='on'){
                if(do_we_need_parallaxer()){
                    //console.info(page);

                    _navConTranslucentTransitioning.find('.translucent-canvas').addClass('for-parallaxer');
                    //animation_time=400;
                    //animation_time=12000;
                    targeth=String(parallaxer_multiplier*10) + '0%';
                }else{

                    //console.info(_c2);
                    _navConTranslucentTransitioning.find('.translucent-canvas').removeClass('for-parallaxer');
                    //animation_time=400;
                }


                if(margs.newpage_transition){
                    // return false;
                }

                //console.info('ceva23232');
                handle_resize(null,{
                    placew: true
                    ,place_page:false
                    ,redraw_canvas:false
                });

            }

            //console.info(_cache2_translucentCon.find('.translucent-canvas'));

            // console.info('margs 5834 - ',margs);

            if(is_chrome() && String(window.location.href).indexOf('file://')==0){

                margs.call_from_do_transition = 'file access ... ';
                do_transition(margs);

            }else{

                // console.info('is_content_page - ', is_content_page);
                if(_navConTranslucentTransitioning){

                    _content_translucent_canvas = null;
                    if(bg_transition=='fade' && is_content_page){

                        var _c23 = $('.the-content .translucent-canvas').eq(0); // content translucent-canvas

                        setTimeout(function(){

                            //_c23.css({
                            //    'opacity':'0'
                            //},{
                            //    queue:false
                            //    ,duration : animation_time
                            //})
                        },500);


                        _c23.after(_c23.clone());
                        _c23.next().css('opacity','0');
                        //_c23.next().css('opacity','0').addClass('transitioning');
                        _content_translucent_canvas = _c23;



                        //console.warn('bg_transition - ',bg_transition, margs.newpage_transition);

                        var args = {overwrite_bg_index: arg,'call_from' : 'goto_bg_doit() - contenttranslucent' };
                        if(bg_transition=='fade' && margs.newpage_transition==false){

                            args.crossfade_newcanvas = true;
                        }
                        calculate_translucent_canvas(_c23.next(), args);
                    }

                    if(is_content_page){


                    }
                    // -- cache2 is qcreative nav con
                    //console.info(_cache2_translucentCon, _cache2_translucentCon.find('.translucent-canvas'))



                    margs.call_from_do_transition = 'normal do_transition from callback ... ';

                    calculate_translucent_canvas(_navConTranslucentTransitioning.find('.translucent-canvas'), {overwrite_bg_index: arg, callback_func: do_transition, callback_func_args: margs,'call_from' : 'goto_bg_doit() - navcontranslucent hier'  });

                    if(ww>=1000){

                    }else{

                        // do_transition(margs);
                    }

                }else{

                    margs.call_from_do_transition = 'nada _navConTranslucentTransitioning ... ';
                    do_transition(margs);
                }
            }







        }

    }

    function do_transition(margs){

        // console.log('do_transition()',margs);

        if(margs){
            // console.log(margs.call_from_do_transition);
        }

        if(_theContent){
            // console.info('the-content -> ',_theContent);
            // console.info('the-response -> ',___response);
        }
        if(_theContentConTr){

            // console.info('_theContentConTr ->  ',_theContentConTr);
        }




        if(margs && margs.newpage_transition){
            // return false;
        }


        // console.info('first-transition q-inited-bg', first_transition);
        _body.addClass('q-inited-bg');
        _body.removeClass('bg_transition-fade bg_transition-slidedown bg_transition-wipedown');
        _body.addClass('bg_transition-'+bg_transition);

        var delay_time = 0;
        if(bg_transition!=last_bg_transition){
            console.warn('different transition');
            delay_time = 100;
        }

        last_bg_transition = bg_transition;


        // normally only on zoomfolio pages we wait for content to load
        if(_theContentConTr && _theContentConTr.hasClass('wait-for-main-content-to-load')){

            main_content_loaded = false;

            var _czfolio = _theContentConTr.find('.zfolio').eq(0);
            inter_check_if_main_content_loaded = setInterval(function(){

                // if(_theContent.find('.translucent-layer').eq(0).children().eq(0).hasClass('zfolio')){
                //     var _c23 = _theContent.find('.translucent-layer').eq(0).children().eq(0);
                //
                // }


                // console.info('_czfolio - ',_czfolio);
                if(_czfolio.hasClass('all-images-loaded')){

                    clearInterval(inter_check_if_main_content_loaded);
                    if(main_content_loaded==false){
                        do_transition_really_do_it(margs)
                    }
                }
            },100);

            setTimeout(function(){





                clearInterval(inter_check_if_main_content_loaded);
                if(main_content_loaded==false){
                    do_transition_really_do_it(margs)
                }
            },2000);
        }else{

            setTimeout(function() {
                do_transition_really_do_it(margs);
            },delay_time);
        }



        //return false;

    }



    function do_transition_really_do_it(margs){

        // -- this is where all transition really come
        // console.log('do_transition_really_do_it() - ',margs);



        if(margs && margs.newpage_transition){
            // return false;
        }


        var margs_default = {
            arg : 0
        };

        margs = $.extend(margs_default, margs);

        _body.removeClass('qtransitioned');
        _body.addClass('qtransitioning');

        allow_resizing_on_blur=false;

        setTimeout(function(){
            allow_resizing_on_blur=true;
        },2000);
        //console.log(_c2);

        _mainBgTransitioning.css('display','');
        if(_navConTranslucentTransitioning){

            _navConTranslucentTransitioning.css('display','');
        }




        // console.warn("first_transition - ",first_transition);
        var _aux_mainBgTransitioning = _mainBgTransitioning;
        var _aux_nav_new_translucentCon = _navConTranslucentTransitioning;



        if(first_transition){

            //console.warn("FIRST TRANSITION!!!");
            _aux_mainBgTransitioning.addClass('transitionduration0');
            setTimeout(function(){

                _aux_mainBgTransitioning.removeClass('transitionduration0');
            },50)
            setTimeout(function(){

                // console.info(_mainBgTransitioning, _mainBg, ' _aux_nav_new_translucentCon - ',_aux_nav_new_translucentCon);
                _aux_mainBgTransitioning.removeClass('preparing-to-transition');
                if(_aux_nav_new_translucentCon){

                    _aux_nav_new_translucentCon.removeClass('preparing-to-transition');
                }
                _mainBg.removeClass('preparing-to-transition');
            },100)
        }else{

            // -- not first transition

            var delay_time = 50;
            if(bg_transition=='fade'){

                //_mainBg.addClass('transitioning-out');
                //_navCon.children('.translucent-con').addClass('transitioning-out');
                delay_time=animation_time + 100;
            }


            setTimeout(function(){

                //console.info(_mainBgTransitioning, _mainBg, _aux);



                _aux_mainBgTransitioning.removeClass('preparing-to-transition ');


                // console.info('_aux_mainBgTransitioning - ',_aux_mainBgTransitioning);
                // console.info('_aux_nav_new_translucentCon - ',_aux_nav_new_translucentCon);
                if(bg_transition!='fade'){

                    // why we want to remove this ?

                    _aux_mainBgTransitioning.removeClass('transitioning-out ');
                }else{

                }
                if(_aux_nav_new_translucentCon) {
                    _aux_nav_new_translucentCon.removeClass('preparing-to-transition transitioning-out');
                }
                _mainBg.removeClass('preparing-to-transition transitioning-out');
            },delay_time)
        }

        //console.warn('bg_transition - ',bg_transition);




        //if(_cache2_translucentCon.find('.translucent-bg').data('appliedblur')!='on'){
        //
        //    //console.info('dadadadada', _c2);
        //    _cache2_translucentCon.find('.translucent-bg').css({
        //        'background-image': 'url(' + qucreative_options.images_arr[arg] + ')'
        //    })
        //}





        //console.info(_c2);

        var aux = animation_time;


        //console.info(_cache2_translucentCon);
        if(_navConTranslucentTransitioning){




            if(_navConTranslucentTransitioning.find('.translucent-canvas').eq(0).hasClass('for-parallaxer')){
                //aux-=67;
            }

            //console.log(aux);

            if(bg_transition!='fade' && (_body.hasClass('menu-type-13') || _body.hasClass('menu-type-14') || _body.hasClass('menu-type-17') || _body.hasClass('menu-type-18')) ) {
                //aux = 200;
            }


            if(bg_transition=='fade'){
                //if(margs.newpage_transition==false){

                //console.log($('.translucent-con.transitioning .for-parallaxer'));


                // ----- FADE

                if($('.translucent-con.transitioning .for-parallaxer').length>0){
                    //console.info(_c_for_parallax_items);

                    if(_c_for_parallax_items){
                        var auxlen = _c_for_parallax_items.length;

                        $(' .translucent-con.transitioning .for-parallaxer').each(function(){
                            var _t = $(this);
                            _c_for_parallax_items.push(_t);
                        })
                        //console.info(_c_for_parallax_items);

                        //console.log(auxlen);
                        for(var i23 = 0;i23<auxlen;i23++){
                            _c_for_parallax_items.shift();
                        }
                        //console.info(_c_for_parallax_items);

                    }
                }


                var args = {
                    mode_scroll: "fromtop",
                    animation_duration: '20',
                    is_fullscreen: "on",
                    init_functional_delay: "0",
                    init_functional_remove_delay_on_scroll: "off"
                    ,settings_substract_from_th: qucreative_options.substract_parallaxer_pixels
                };
                if (parallax_reverse) {
                    args.direction = "reverse";
                }

                //console.info($('.main-bg-con.transitioning'))
                //console.info(_mainBg);


                var _c234 = ($('.qucreative--nav-con .translucent-con:not(.transitioning)'));

                //console.info(_c234);

                if(window.qucreative_options.menu_enviroment_opacity!='100' && window.qucreative_options.blur_ammount!='0'){

                    //_c234.animate({
                    //
                    //
                    //    'opacity':0
                    //},{
                    //    queue:false
                    //    ,duration: 300
                    //})
                }



                setTimeout(function(){

                    if(_content_translucent_canvas){

                        // console.info('_content_translucent_canvas.next() - ',_content_translucent_canvas.next());

                        // -- new translucent canvas



                        setTimeout(function(){

                            _content_translucent_canvas.next().animate({


                                'opacity':1
                            },{
                                queue:false
                                ,duration: animation_time
                            })
                        },animation_time-200)
                        setTimeout(function(){
                            _content_translucent_canvas.remove();
                            _content_translucent_canvas.parent().children().removeClass('transitioning');
                        },600);
                    }

                    // console.info('_cache2_translucentCon - ',_cache2_translucentCon);

                    //_cache2_translucentCon.children('.translucent-con').css({
                    //    'height':0
                    //})


                    //animation_time = 350;
                },1)
            }else{


                // slidedown

                if(window.qucreative_options.images_arr[0].indexOf('#')==0){
                    //aux+=35;
                }

                //aux = 500;
                //var d = new Date(); console.info('menu transition started '+ d.getTime()+' delay - delay for menu_transition - '+0+' animation time '+aux);

                // -- qcreative nav con .translcent-con
                //_cache2_translucentCon.animate({
                //    'height' : '100%'
                //    ,'top' : '0'
                //},{
                //    queue:false
                //    , duration: aux
                //    ,complete:function(){
                //
                //        _cache2_translucentCon.removeClass('transitioning');
                //    }
                //
                //});
            }


            if(_cache2_translucentCon.hasClass('dzsparallaxer')){

            }
        }

        //console.log(_mainBgTransitioning, animation_time);


        var delay_for_main_bg = 0;

        if(_body.hasClass('menu-type-13') || _body.hasClass('menu-type-14') || _body.hasClass('menu-type-17') || _body.hasClass('menu-type-18')){
            delay_for_main_bg = 100;
        }



        // _mainBg Transition

        if(bg_transition=='fade'){


            //_mainBg.animate({
            //    'opacity' : '0'
            //},{
            //    queue:false
            //    , duration: animation_time
            //})

            setTimeout(function(){



                //console.info(_mainBgTransitioning, targeth);

                //_mainBgTransitioning.css({
                //    'height' : targeth
                //    ,'top' : '0'
                //    ,'opacity' : '0'
                //})

                // animation_time = 2000;
                // console.info('animation_time - ',animation_time);

                // console.info('do_transition_really_do_it fade margs - ',margs);

                if(margs.newpage_transition==true){
                    //animation_time=500;
                }



                var save_mainBgTransitioning = _mainBgTransitioning;
                setTimeout(function(){




                    save_mainBgTransitioning.css({
                        //'opacity' : '1'
                    },{
                        queue:false
                        , duration: animation_time
                    })

                },5)


                main_bg_transition_complete();
                setTimeout(function(){

                    $('.the-content-con').css('opacity','');
                }, animation_time+100)
            },animation_time);

        }else{


            //animation_time = 4000;
            //var d = new Date(); console.info('main bg transition started '+ d.getTime()+' delay - delay for main_bg - '+delay_for_main_bg+' animation time '+animation_time);


            setTimeout(function(){
                main_bg_transition_complete();
            },animation_time);
        }



        function main_bg_transition_complete(){

            /// -- when main background has transitioned
            // console.info('main_bg_transition_complete()');


            _mainBg = _mainBgTransitioning;
            _mainBgTransitioning = null;


            if(bg_transition=='fade'){

                $('.main-bg-con:not(".transitioning")').addClass('for-remove transitioning-out');
                // console.info('$(\'.main-bg-con:not(".transitioning")\') - ', $('.main-bg-con:not(".transitioning")'));
                setTimeout(function(){

                    // removing main-bg-con


                    $('.main-bg-con.for-remove').remove();

                    //$('.main-bg-con:not(".transitioning")').remove();
                },animation_time+100)
            }else{

                //console.info($('.main-bg-con.for-remove'),$('.main-bg-con:not(".transitioning")'));

                //console.info(new_bg_transition);
                if(new_bg_transition!='off'){

                    $('.main-bg-con:not(".transitioning")').remove();
                }
                //$('.main-bg-con:not(".transitioning")').remove();
            }

            _mainBg = $('.main-bg-con:not(".for-remove")').eq(0);


            // console.info(_mainBg);

            //console.info(_navCon,_navCon.find('.translucent-con').length);


            if(_navCon.find('.translucent-con').length>1){
                var _navConTranslucentConOut=_navCon.find('.translucent-con').eq(0);

                if(bg_transition=='fade'){
                    _navConTranslucentConOut.addClass('transitioning-out');
                    setTimeout(function(){
                        _navConTranslucentConOut.remove();
                    },animation_time);
                }else{
                    _navConTranslucentConOut.remove();
                }


            }



            //console.log(_navCon.find('.translucent-con'));


            _mainBg.removeClass('transitioning');

            //console.log(_mainBg, _mainBg.find('figure'))
            _mainBg.find('figure').eq(0).css({
                'width' : ''
                ,'height' : ''
            })

            //console.info(newclass_body);
            if( window.qucreative_options.bg_isparallax=='on' && newclass_body_page!='page-homepage' && newclass_body_page!='page-gallery-w-thumbs'){

                //var args = {  mode_scroll: "fromtop", animation_duration : '20', is_fullscreen: "on", init_functional_delay: "10000",init_functional_remove_delay_on_scroll: "off" };
                //if(parallax_reverse){
                //    args.direction = "reverse";
                //}
                setTimeout(function(){

                },30000);

                _mainBg.addClass('dzsparallaxer');
                _mainBg.children('.main-bg').addClass('dzsparallaxer--target');

                //console.log(args);


                //_mainBg.addClass('stickto100');

                //console.info(_mainBg);

                if($('.qucreative--nav-con .translucent-con').hasClass('dzsparallaxer')){
                    //$('.qucreative--nav-con .translucent-con').addClass('stickto100');
                }
                if($('.the-content .translucent-con').hasClass('dzsparallaxer')){
                    //$('.the-content .translucent-con').addClass('stickto100');
                }

                setTimeout(function(){

                },4000);
            }else{

                _mainBg.removeClass('dzsparallaxer');
                _mainBg.children('.main-bg').removeClass('dzsparallaxer--target');
                //_mainBg.children('.main-bg').removeClass('for-parallaxer');
            }


            if($('.main-gallery--descs').length>0){
                if($('.main-gallery--descs').eq(0).hasClass('removed')==false){

                    _mainGalleryDescs = $('.main-gallery--descs').eq(0);
                }
            }

            //reinit();
            if(_mainGalleryDescs){

                //console.info('curr desc', _mainGalleryDescs, _mainGalleryDescs.children().eq(arg));

                _mainGalleryDescs.children().removeClass('active');
                _mainGalleryDescs.children().eq(margs.arg).addClass('active');



                if(_mainGalleryDescs.children().eq(margs.arg).find('.big-desc').html()){
                    $('.responsive-info-btn-con').find('.info-text-con').html('<h6>'+_mainGalleryDescs.children().eq(margs.arg).find('.big-desc').html()+'</h6>');
                }else{
                    $('.responsive-info-btn-con').find('.info-text-con').html('');
                }


                if(_mainGalleryDescs.children().eq(margs.arg).hasClass('style2')){
                    _mainGalleryDescs.removeClass('style1').addClass('style2');
                    _mainGalleryDescs.css({
                        //'right' : (ww-280-_mainGalleryDescs.children().eq(arg).width())+'px'
                    })
                }else{

                    _mainGalleryDescs.removeClass('style2').addClass('style1');
                    _mainGalleryDescs.css({
                        'right' : ''
                    })
                }

                //console.info(_mainGalleryDescs.children().eq(arg).find('.translucent-canvas').eq(0));



                if(is_chrome() && String(window.location.href).indexOf('file://')==0){

                }else{

                    //console.info('calculate translucent for desc')

                    calculate_translucent_canvas(_mainGalleryDescs.children().eq(margs.arg).find('.translucent-canvas').eq(0), {overwrite_bg_index: margs.arg, 'call_from':'mainGalleryDescs'});
                }

                _mainGalleryDescs.css({
                    'width' : _mainGalleryDescs.children().eq(margs.arg).width() + 'px'
                    ,'height' : _mainGalleryDescs.children().eq(margs.arg).height() + 'px'
                    ,'opacity' : '1'
                })

            }



            //console.info('main_bg_transition_complete() - ',margs);
            setup_newBgImage(margs);

            // console.info('margs.arg - ',margs.arg);
            currBgNr = margs.arg;

            is_ready_load=false;
            is_ready_transition=false;
            busy_main_transition=false;

            if($('body').hasClass('q-inited')==false) {
                //console.log(is_ie(), ieVersion())
                if (ieVersion() == 11) {
                    setTimeout(function () {
                        $('body').addClass('q-inited');

                        if (_theContent && _theContent.parent().css('opacity') == 0) {


                            _theContent.parent().animate({
                                //'opacity': 1
                                //,width : lastcontent_w
                                //,left : 0
                            }, {
                                duration: 600
                                , queue: false
                            });
                        }

                        if (page == 'page-homepage') {
                            $('.the-content-con').animate({
                                //'opacity': 1
                                //,width : lastcontent_w
                                //,left : 0
                            }, {
                                duration: 600
                                , queue: false
                            });
                        }
                    }, 500)
                } else {

                    //console.warn("HERE");

                    setTimeout(function () {
                        $('body').addClass('q-inited');
                        if (_theContent && _theContent.find('.translucent-canvas').length > 0) {
                            _theContent.find('.translucent-canvas').each(function () {
                                var _t255 = $(this);

                                //console.log('first translucent canvas on the content', _t255);


                                if (is_chrome() && String(window.location.href).indexOf('file://') == 0) {

                                } else {

                                    // console.warn('hier - ',_t255);

                                    calculate_translucent_canvas(_t255,{'call_from':'mainbg_transition_complete - on content'});

                                    // if(_theContent.parent().find('.translucent-con-placeholder-footer').length){
                                    //     _theContent.parent().find('.translucent-con-placeholder-footer').eq(0).before(_t255.parent().clone());
                                    // }

                                    // console.info(_theContent.parent().find('.translucent-con-placeholder-footer'));
                                }

                            })
                        }


                        var _c = null;

                        //console.info(_theContent);
                        if (_theContent) {


                            _c = _theContent.parent();

                        } else {
                            if ($('.the-content-con').length > 0) {
                                _c = ($('.the-content-con').eq(0));

                            }
                        }

                        if (_c && _c.css('opacity') == 0) {


                            fade_the_content_con(_c);
                        }
                    }, 300)
                }
            }
        }




        if(first_transition){
            setTimeout(function(){

                _body.removeClass('first-transition');
            },animation_time)

            setTimeout(function(){

                first_transition=false;
            },animation_time);
        }
        setTimeout(function(){

            _body.removeClass('first-transition');
        },animation_time)


        main_content_loaded = true;


        // console.warn('margs - ',margs);
        if(margs.newpage_transition==false){

            setTimeout(function(){

                // -- TODO: debugger animation time
                // animation_time=15000;
                // check_animation_time();
            },2000);
        }
    }


    function setup_newBgImage(margs){
        // console.info('setup_newBgImage() / this where the new page comes into play / both for new page and for init', margs);

        //return false;

        if(_mainContainer.get(0) && _mainContainer.get(0).api_scrolly_to) {
            _body.addClass('has-custom-scroller');
        }


        var margs_default = {
            newpage_transition : true
        };

        margs = $.extend(margs_default, margs);


        // -- init lazy loading
        if(window.dzs_check_lazyloading_images_inited==false){

            window.dzs_check_lazyloading_images_inited = true;


            $(window).bind('scroll',window.dzs_check_lazyloading_images);
            window.dzs_check_lazyloading_images();
            setTimeout(function(){
                window.dzs_check_lazyloading_images();
            },1500);
            setTimeout(function(){
                window.dzs_check_lazyloading_images();
            },2500);
        }else{
            if(window.dzs_check_lazyloading_images){
                window.dzs_check_lazyloading_images();
                setTimeout(function(){
                    if(window.dzs_check_lazyloading_images) {
                        window.dzs_check_lazyloading_images();
                    }
                },1000);
                setTimeout(function(){
                    if(window.dzs_check_lazyloading_images) {
                        window.dzs_check_lazyloading_images();
                    }
                },2000);
                setTimeout(function(){
                    if(window.dzs_check_lazyloading_images) {
                        window.dzs_check_lazyloading_images();
                    }
                },3000);
            }
        }


        //console.info($('.main-container > .the-content-con'));
        setTimeout(function(){




            if(_body.hasClass('with-border') && window.dzsscr_init){
                //console.log('apply BURNED WATER');

                var _c = $('.main-container').get(0);





                /*
                window.dzs_check_lazyloading_images_use_this_element_css_top_instead_of_window_scroll = $('.main-container > .the-content-con').eq(0);

                if(_c && _c.api_set_scrollTop_height_indicator){



                    _c.api_set_window_object($('.main-container > .the-content-con').eq(0));
                    _c.api_set_scrollTop_height_indicator($('.main-container > .the-content-con').eq(0));

                    var aux24=$('.main-container > .the-content-con').eq(0).offset().top + parseInt($('.main-container > .the-content-con').css('margin-bottom'),10);

                    aux24+=15;

                    //console.log(parseInt($('.main-container > .the-content-con').css('margin-bottom'),10));
                    _c.api_comHeight_surplus(aux24);
                }


                if(_mainBg.get(0) && _mainBg.get(0).api_set_scrollTop_is_another_element_top){

                    //console.info('api_set_scrollTop_is_another_element_top', $('.main-container > .the-content-con').eq(0))
                    _mainBg.get(0).api_set_scrollTop_is_another_element_top($('.main-container > .the-content-con').eq(0));
                }
                */




            }
        },100);
















        //console.info(_mainBg);
        //console.info(margs);
        var aux = _mainBg.find('figure').eq(0).css('background-image');
        mainBgImgCSS = aux;

        if(aux){

            aux = aux.replace('url(','');
            aux = aux.replace('url("','');
            aux = aux.replace(')','');
            aux = aux.replace('")','');
        }else{
            //return false;
        }

        mainBgImgUrl = aux;



        //console.info('init zoombox is ( in setup new bg image )  ',qcre_init_zoombox);






        if(qcre_init_zoombox || $('body').children('.zoombox-maincon').length==0){



            var def_opts_parse  = $.extend(true, {},$.parseJSON(window.zoombox_default_opts_string));

            // console.info('window.init_zoombox_preset -> ',window.init_zoombox_preset);
            if(window.init_zoombox){



                if(window.init_zoombox_preset=='darkfull'){
                    zoombox_options = $.extend(def_opts_parse, window.init_zoombox_darkfull);
                }

                if(window.init_zoombox_preset=='whitefull'){
                    zoombox_options = $.extend(def_opts_parse, window.init_zoombox_whitefull);
                }

                window.init_zoombox(zoombox_options);
            }else{
                // console.log('zoombox not defined .. why ? ')
            }
            qcre_init_zoombox = false;
        }


        _c_for_parallax_items = [];

        // -for now we force fade
        //



        // if( (page!='page-homepage' && page!='page-gallery-w-thumbs' && window.qucreative_options.bg_isparallax=='on'  )  && (margs.newpage_transition || bg_transition=='fade')        ){




        var arg = '';
        // console.info('do we need parallaxer 4 ? ',do_we_need_parallaxer(arg));
        if( do_we_need_parallaxer(arg)        ){
            //_navCon.find('.translucent-con .translucent-bg').addClass('for-parallaxer');
            _navCon.find('.translucent-con .translucent-canvas').addClass('for-parallaxer');




            _c_for_parallax_items = [];
            if($('.for-parallaxer').length>0){
                $('.for-parallaxer').each(function(){
                    var _t = $(this);
                    _c_for_parallax_items.push(_t);
                })
                //= ;
            }
        }

        //console.info('DONE',margs);




        if(margs.newpage_transition && ___response) {

            transitioned_via_ajax_first = true;


            // -- this is the new page transition from setup_newBgImage() . destroy any listeners here
            determine_page();

            document.body.style.zoom = 1.0;



            $('.dzs-progress-bar').each(function(){
                var _t = $(this);

                //console.log(_t);
                if(_t.get(0) && _t.get(0).api_destroy_listeners){
                    _t.get(0).api_destroy_listeners();
                }

                setTimeout(function(){
                    _t[0] = null;
                },300);
                //_t = $();


            });








            force_scroll_to_top();

        }

        //console.info($('#map-canvas'));





        //console.info(newclass_body,window.qucreative_options.bg_isparallax);


        if( window.qucreative_options.bg_isparallax=='on' && newclass_body_page!='page-homepage' && newclass_body_page!='page-gallery-w-thumbs') {

            var args = {
                mode_scroll: "normal",
                animation_duration: '20',
                is_fullscreen: "on",
                init_functional_delay: "0",
                init_functional_remove_delay_on_scroll: "off"
                ,settings_substract_from_th: qucreative_options.substract_parallaxer_pixels
            };
            if (parallax_reverse) {
                args.direction = "reverse";
            }





            var _aux_theContentCon = $('.main-container > .the-content-con').eq(0);


            if($('.main-container > .the-content-con.transitioning').length>0){
                _aux_theContentCon = $('.main-container > .the-content-con.transitioning').eq(0);
            }

            if(_body.hasClass('with-border')){
                //console.info(' THESE ARE CONTENT-CONS', _aux_theContentCon);
                /*
                args.settings_scrollTop_is_another_element_top = _aux_theContentCon;
                */
                //args.settings_listen_to_object_scroll_top = window.scroll_top_object;
            }


            if(css_border_width){
                // args.settings_clip_height_is_window_height = true;
            }

            args.cthis_height_is_window_height = 'on';

            //console.info('initing main bg with parallax');

            window.dzsprx_init(_mainBg, args);

            _curr_parallaxer = _mainBg;

            //console.info(_mainBg);


            if(_mainBg.get(0) && _mainBg.get(0).api_set_update_func){

                _mainBg.get(0).api_set_update_func(update_parallaxer);
            }



        }


        if(bg_transition=='fade'){

        }

        if(margs.newpage_transition && ___response){



            // -- part of setup_newBgImage



            //console.info($('.the-content-con:not(".transitioning")'));

            //console.info($('#map-canvas'));
            //console.info('map canvases to remove - ', $('.map-canvas.to-remove', _theContent));
            $('.map-canvas.to-remove').remove();
            $('.the-content-con:not(".transitioning") .translucent-canvas').addClass('removed');
            $('.the-content-con.transitioning-out').remove();
            $('.the-content-con:not(".transitioning")').find('.zfolio').remove();





            if(_theContent){


                // console.info('setup_newBgImage() - ',_theContent.parent(), $('.the-content-con.transitioning-in'))
                // console.info("$('.the-content-con.transitioning').last()() - ",$('.the-content-con.transitioning').last());


                if(bg_transition=='fade'){

                    var _c321 = $('.the-content-con.transitioning').last()
                    setTimeout(function(){

                        _c321 = $('.the-content-con.transitioning').last();
                        _c321.addClass('currContent');
                    },100);
                    setTimeout(function(){

                        _c321.addClass('currContent');
                    },500);
                }else{

                    $('.the-content-con.transitioning').last().addClass('currContent');
                }
            }



            //console.info('PAGE IS ',page,newclass_body, $('.the-content-con.transitioning'));
            $('.the-content-con.transitioning').each(function(){


                // console.info("SETUP CONTENT CON TRANSITIONING HIER")
                _theContentConTr = $(this);

                //console.log(_theContentConTr);



                _theContentConTr.css('width', '');
                _theContentConTr.css('max-width', '');
                _theContentConTr.removeClass('transitioning');

                //_navCon.before(_theContentConTr);

                // -- olg content destroy zoomfolio
                if(_theContent){
                    _theContent.find('.zfolio').each(function(){
                        var _theContentConTr_zfolio = $(this);
                        //console.info(_theContentConTr2);
                        if(_theContentConTr_zfolio.get(0) && _theContentConTr_zfolio.get(0).api_destroy){
                            _theContentConTr_zfolio.get(0).api_destroy();
                        }

                    })
                }


                // -- the new content-con is the real content-con NOW
                _theContent = $('.the-content:not(.the-content-for-preseter)').eq(0);




                handle_resize(null,{
                    placew: false
                    ,place_page:true
                    ,redraw_canvas:false
                });



                if(_theContentConTr.hasClass('fullit')){
                    _theContentConTr.find('.zfolio.fullwidth').css({
                        'width' : ''
                    })

                    page_is_fullwidth=true;
                }

                //_theContent.parent().removeClass("transitioning");



                if(_theContent && _theContent.find('.translucent-canvas').length>0){
                    _theContent.find('.translucent-canvas').each(function(){
                        var _t255 = $(this);


                        //console.info('PAGE IS', page);





                        // if(page!='page-homepage' && page!='page-gallery-w-thumbs' && window.qucreative_options.bg_isparallax=='on'){
                        if(do_we_need_parallaxer()){
                            _t255.addClass('for-parallaxer');
                        }



                        _c_for_parallax_items = [];
                        if($('.for-parallaxer').length>0){
                            $('.for-parallaxer').each(function(){
                                var _t = $(this);
                                _c_for_parallax_items.push(_t);
                            })
                            //= ;
                        }else{
                            _c_for_parallax_items = [];
                        }

                        //console.log('content translucent cons', _t255, _theContent);
                        calculate_translucent_canvas(_t255,{'call_from':'setup_newBgImage - on content'});
                    })
                }

                setTimeout(function(){




                    //console.info('this is transition setup_newBgImage() - ', bg_transition);



                    if(_theContentConTr.hasClass('fullit')==false){

                        //console.info();



                        //console.info(page);

                        if(page!='nuttin'){



                            if(bg_transition == 'slidedown' || bg_transition == 'wipedown') {
                                _theContentConTr.css({
                                    'opacity': 0
                                    //,width : lastcontent_w
                                    //,left : 0
                                });
                            }

                            //console.info('check page here ',newclass_body);

                            if(newclass_body_page=='page-gallery-w-thumbs'){

                                calculate_dims_gallery_thumbs_img_container();
                            }

                            //console.info('y no animation');


                            // console.info('_theContentConTr - ',_theContentConTr);


                            setTimeout(function(){

                                _theContentConTr.addClass('currContent');
                            },100);



                            if(bg_transition == 'slidedown' || bg_transition == 'wipedown'){

                            }


                            if(bg_transition == 'fade'){
                            }else{

                                _theContentConTr.animate({
                                    'opacity': 1
                                    // ,width : lastcontent_w
                                    // ,left : 0
                                },{
                                    duration: 600
                                    ,queue:false
                                    ,complete:function(arg){


                                        //$(this).children('.the-content').css({
                                        //    'width':''
                                        //})
                                    }
                                    //,step: function(now,tween){
                                    //    //console.info(now,tween);
                                    //
                                    //
                                    //
                                    //    handle_resize(null, {ignore_menu:true});
                                    //}
                                });
                            }



                        }

                        _theContentConTr.children('.the-content').animate({
                            //'margin-left': 0
                        },{
                            queue:false
                            ,duration: 600
                        })


                        //_theContentConTr.find('.translucent-bg').css({
                        //    'margin-left': -ww
                        //})
                        //_theContentConTr.find('.translucent-bg').animate({
                        //    'margin-left': -initial_offset
                        //},{
                        //    duration: 600
                        //    ,queue:false
                        //})

                        setTimeout(function(){

                        },0);



                    }else{

                        //console.info('is fullit');

                        _theContentConTr.animate({
                            'opacity': 1
                        },{
                            duration: 600
                            ,queue:false
                        })


                    }


                },400);




            });



            setTimeout(function(){
                reinit({
                    'call_from':'setup_newBgImage() _ newPageTransition'
                });
                //console.info("REINIT");
                //handle_resize(null, {ignore_menu:true});
            },100)
        }else{


            if(first_page_not_transitioned){

                reinit({
                    'call_from':'setup_newBgImage() _ samePageTransition'
                });
                first_page_not_transitioned=false;
            }

            $('.the-content-con').addClass('currContent');



            start_bg_slideshow_time();


            //$("body").removeClass('qtransitioned');
            //$("body").addClass('qtransitioning');


            //console.info("REINIT FROM non");
            //handle_resize();
        }


        _mainContainer.addClass('transition-'+bg_transition);

        // console.info(_mainContainer);


        setTimeout(function(){
            var args = {
                ignore_menu: false
                ,placew: false
                ,place_page: false
                ,redraw_canvas: false
                ,calculate_sidebar_main_is_bigger: true
            }

            handle_resize(null, args);
        },1000);


        //console.info('map canvases - ', $('.map-canvas'));
        if($('.map-canvas').length>0){
            gm_initialize();
        }
        $('.map-canvas').removeClass('transitioning').addClass('to-remove');
        $('.map-canvas-con').removeClass('transitioning');

        //handle_resize();
    }



    function determine_page(){
        is_content_page = false;
        if(_body.hasClass('page-gallery-w-thumbs')){
            page='page-gallery-w-thumbs';
        }

        if(_body.hasClass('page-portfolio')){
            page='page-portfolio';
            is_content_page = true;
        }
        if(_body.hasClass('page-portfolio-single')){
            page='page-portfolio-single';
            is_content_page = true;
        }
        if(_body.hasClass('page-normal')){
            page='page-normal';
            is_content_page = true;
        }
        if(_body.hasClass('page-blog')){
            page='page-blog';
            is_content_page = true;
        }
        if(_body.hasClass('page-blogsingle')){
            page='page-blogsingle';
            is_content_page = true;
        }
        if(_body.hasClass('page-about')){
            page='page-about';
            is_content_page = true;
        }
        if(_body.hasClass('page-contact')){
            page='page-contact';
            is_content_page = true;
        }
        if(_body.hasClass('page-homepage')){
            page='page-homepage';
        }

        //console.info('CHECK AJAX', newclass_body,transitioned_via_ajax_first);
        if(transitioned_via_ajax_first && newclass_body){
            _body.removeClass('page-blogsingle page-homepage page-gallery-w-thumbs page-normal page-contact page-about page-contact page-portfolio page-portfolio-single');

            //console.info('REMOVE new-'+newclass_body)
            _body.removeClass('new-'+newclass_body_page);

            // console.info("NEW CLASS_BODY - ",newclass_body);
            _body.addClass(newclass_body);
            _body.attr('class',newclass_body);

            if(menu_type=='menu-type-5' || menu_type=='menu-type-6'){
                _body.addClass('menu-is-sticky');


            }





            handle_resize(null,{
                ignore_menu: false
                ,placew: false
                ,place_page: false
                ,redraw_canvas: false
                ,calculate_sidebar_main_is_bigger: false
                ,calculate_menu_overflow: true
            });

            _body.removeClass('bg_transition-fade bg_transition-slidedown bg_transition-wipedown');
            _body.addClass('bg_transition-'+bg_transition);
            _body.removeClass('first-transition');



            if(border_width>0) {



                _body.addClass('with-border');
            }

            newclass_body = newclass_body.replace(/menu-type-\d*/g, '');


            page=newclass_body_page;


            _body.removeClass('no-padding');

            if(newclass_body_nopadding){

                _body.addClass('no-padding');
            }
        }


    }


    function handle_resize(e,pargs){


        var margs = {
            ignore_menu: false
            ,placew: true
            ,place_page: true
            ,redraw_canvas: true
            ,calculate_sidebar_main_is_bigger: true
            ,calculate_menu_overflow: true
        };

        if(pargs){
            margs = $.extend(margs,pargs);
        }

        //console.info('handle_resize', e, margs);

        ww = window.innerWidth;
        wh = window.innerHeight;


        // console.warn('wh - ',wh);

        //console.info(wh);
        if(border_width>0){

            ww = ww - (border_width*2);
            // wh = wh - (border_width*2);
        }

        //console.info(wh);


        $('.main-bg-div').height(wh);



        //console.info(page, _theContent.parent().hasClass('fullit'))
        if(page=='page-portfolio-single' &&_theContent &&  _theContent.parent().hasClass('fullit')) {

            $('.advancedscroller').eq(0).css('height','100%');
            $('.advancedscroller-con').eq(0).height(wh);
            $('.advancedscroller-con-placeholder').eq(0).height(wh);

        }

        calculate_menu_width();


        if(margs.placew){

            $('.placewh').each(function(){
                var _t = $(this);

                _t.attr('data-placeholderh',wh);

                if(_t.hasClass('for-parallaxer')){

                    _t.attr('data-placeholderh', (bigimageheight*parallaxer_multiplier) );
                }
            });
        }



        if(videoplayers_tobe_resized.length>0){
            for(var i4=0;i4<videoplayers_tobe_resized.length;i4++){
                var _c = videoplayers_tobe_resized[i4];


                //console.error(_c.hasClass('auto-height-16-9'));

                if(_c.hasClass('auto-height-16-9')){
                    _c.height(0.562 * _c.width());
                }else{

                    var aux_oh = _c.data('original-height');
                    var aux_cw = _c.width()
                    var aux_rw = _c.data('reference-width');


                    var aux_total = aux_cw/aux_rw * aux_oh;


                    //console.log(aux_cw, aux_rw, aux_oh, aux_total);

                    _c.height(aux_total);
                }




            }
        }

        if(margs.calculate_menu_overflow) {
            if (_body.hasClass('menu-type-1') || _body.hasClass('menu-type-2') || _body.hasClass('menu-type-3') || _body.hasClass('menu-type-4') || _body.hasClass('menu-type-5') || _body.hasClass('menu-type-6') || _body.hasClass('menu-type-7') || _body.hasClass('menu-type-8')) {

                if (_theActualNav && _theActualNav.offset && _theActualNav.offset()) {
                    if (the_actual_nav_initial_top_offset == -1) {
                        the_actual_nav_initial_top_offset = _theActualNav.offset().top
                    }
                } else {
                    console.warn('actual nav does not exist ? ');
                }

                var aux_sum = the_actual_nav_initial_top_offset + _theActualNav.outerHeight() + 10;

                if (_navCon.children('.nav-social-con').length > 0) {
                    aux_sum += _navCon.children('.nav-social-con').outerHeight() + 30;
                }


                //console.info(the_actual_nav_initial_top_offset, _navCon.children('.nav-social-con').outerHeight(), aux_sum,wh);


                // console.info('aux_sum - ',aux_sum);
                // console.info('wh - ',wh);
                if (aux_sum > wh) {

                    _navCon.addClass('menu-overflows-height');


                    menu_is_scrollable = true;
                    menu_is_scrollable_offset = aux_sum - wh;

                    if (qucreative_options.menu_scroll_method == 'scroll') {
                        menu_is_scrollable_offset += 100;
                    }

                    // console.info('menu_is_scrollable_offset - ',menu_is_scrollable_offset)

                } else {

                    _navCon.removeClass('menu-overflows-height');

                    menu_is_scrollable = false;
                    menu_is_scrollable_offset = 0;


                    _logoCon.css({
                        'margin-top': ''
                    })
                }

            }
        }



        //console.info(page);

        if(margs.place_page) {
            //console.info(page);
            if (page == 'page-portfolio' || page == 'page-portfolio-single' || page == 'page-normal' || page == 'page-blog' || page == 'page-blogsingle' || page == 'page-about' || page == 'page-contact') {
                //console.info(_theContent);


                //console.info(_body.hasClass('menu-type-9'));


                // -- setting the content left position, menu types excluded here
                if (_theContent && (_theContent.parent().hasClass('fullit') == false && _body.hasClass('content-align-right')== false && _body.hasClass('content-align-left')== false && ( _body.hasClass('menu-type-5')==false && _body.hasClass('menu-type-6')==false && _body.hasClass('menu-type-9')==false && _body.hasClass('menu-type-10')==false  && _body.hasClass('menu-type-11')==false && _body.hasClass('menu-type-12')==false && _body.hasClass('menu-type-13')==false && _body.hasClass('menu-type-14')==false && _body.hasClass('menu-type-15')==false && _body.hasClass('menu-type-16')==false && _body.hasClass('menu-type-17')==false && _body.hasClass('menu-type-18')==false   ))) {

                    //console.info('Y DO U DO THIS');
                    var aux = menu_width + ((ww - menu_width) / 2 - _theContent.parent().width() / 2);

                    if(_body.hasClass('menu-type-7')||_body.hasClass('menu-type-8')){
                        aux = (menu_width-40) + ((ww - (menu_width-40) ) / 2 - _theContent.parent().width() / 2);
                    }
                    //console.log(menu_width, aux);


                    if(ww>(menu_width + content_width + menu_content_space)) {
                        _theContent.parent().css({
                            // 'left': aux
                        })

                        _theContent.css('left', aux);
                    }else{
                        //--responsive mode so we delete this

                        _theContent.parent().css({
                            'left': ''
                        })

                        _theContent.css({
                            'left': ''
                        })
                    }
                }



                if (_body.hasClass('menu-is-sticky') && (_body.hasClass('content-align-right')== false && _body.hasClass('content-align-left')== false) && (  _theContent && _theContent.parent().hasClass('fullit') == false)  &&  ( _body.hasClass('menu-type-5') || _body.hasClass('menu-type-6'))  ) {


                    // -- sticky

                    //console.info('Y DO U DO THIS TOO / THIS IS ONLY FOR MENU-TYPE-5 and 6');

                    menu_content_space = 30;

                    // console.info('content_width - ',content_width)
                    // console.info('menu_content_space - ',menu_content_space)
                    // console.info('menu_width - ',menu_width)


                    if(ww>(menu_width + content_width + menu_content_space)){
                        // console.info(ww/2,content_width, (menu_width + content_width)/2,menu_content_space)
                        _navCon.css({
                            'left': ww/2 - (menu_width + content_width)/2 - menu_content_space / 2
                        });




                        // parent()
                    }else{
                        // -- tbc
                        _navCon.css({
                            'left': ''
                        })
                        _theContent.css({
                            'left': ''
                            ,'margin-left': ''
                            ,'margin-right': ''
                        })

                    }

                }

                if(_body.hasClass('page-is-fullwidth')==false && ( _body.hasClass('menu-type-5') || _body.hasClass('menu-type-6') ) ){


                }


                if(_body.hasClass('page-is-fullwidth')==false && ( _body.hasClass('menu-type-1') || _body.hasClass('menu-type-2') || _body.hasClass('menu-type-3') || _body.hasClass('menu-type-4') || _body.hasClass('menu-type-5') || _body.hasClass('menu-type-6') || _body.hasClass('menu-type-7') || _body.hasClass('menu-type-8') ) ) {



                    if(ww<menu_width+menu_content_space+content_width){


                        _body.addClass('semi-responsive-mode');
                        _body.addClass('semi-responsive-mode-enforce');
                    }else{

                        _body.removeClass('semi-responsive-mode');
                        _body.removeClass('semi-responsive-mode-enforce');
                    }
                }
            }
        }

        if(ww<1000 && ww<menu_width+menu_content_space+content_width) {


            _body.addClass('responsive-mode-sc');
        }else{

            _body.removeClass('responsive-mode-sc');
        }

        if(ww+border_width*2<responsive_breakpoint){


            $('.testimonial-ascroller').each(function(){
                var _t3 = $(this);

                if(_t3.get(0) && _t3.get(0).style.height!='auto' && !( _t3.data('original-height')) ){

                    _t3.data('original-height', _t3.height());
                }
                _t3.css('height', 'auto');
                if(_t3.get(0) && _t3.get(0).api_force_resize){

                    _t3.get(0).api_force_resize();
                }

            });
            _body.removeClass('semi-responsive-mode');
            _body.removeClass('semi-responsive-mode-enforce');



        }else{

            $('.testimonial-ascroller').each(function(){
                var _t3 = $(this);
                if(_t3.data('original-height')){
                    _t3.css('height', _t3.data('original-height')+'px');
                    _t3.find('.thumbsCon').css('height', _t3.data('original-height')+'px');


                    if(_t3.get(0) && _t3.get(0).api_force_resize){

                        _t3.get(0).api_force_resize();
                    }
                }
            })

        }



        if(margs.place_page) {

            $('.translucent-bg').each(function(){
                var _t = $(this);

                if(margs.ignore_menu){
                    if(_t.parent().parent().hasClass('qucreative--nav-con')){
                        return;
                    }
                }

                //console.info(_t);


                calculate_translucent(_t);


            })



            calculate_mainbg({
                'call_from':'handle_resize'
            });

            if(allow_resizing_on_blur){

                //console.info('resizing');

                clearTimeout(inter_resizing);
                inter_resizing = setTimeout(function(){
                    calculate_dims(margs);
                },500);
                $('body').addClass('resizing');
            }

        }


        if(margs.calculate_sidebar_main_is_bigger){
            // console.info("CALCULATING SIDEBAR MAIN IS BIGGER ? ",_sidebarMain);
            if(_sidebarMain){
                if(_sidebarMain.height() > _sidebarMain.prev().height()){
                    _body.addClass('sidebar-is-bigger-then-content');
                }else{

                    _body.removeClass('sidebar-is-bigger-then-content');
                }
            }
        }


        //console.info('added resizing');
    }

    function calculate_dims(pargs){
        // -- only executes


        var margs = {
            ignore_menu: false
            ,placew: true
            ,place_page: true
            ,redraw_canvas: true
            ,calculate_sidebar_main_is_bigger: true
        };

        if(pargs){
            margs = $.extend(margs,pargs);
        }



        global_image_data = null;
        $('body').removeClass('resizing');

        //console.info(margs);

        if(margs.redraw_canvas){

            $('.translucent-canvas').each(function(){
                var _t = $(this);
                //console.info(_t);

                if(margs.ignore_menu){
                    if(_t.parent().parent().hasClass('qucreative--nav-con')){
                        return;
                    }
                }

                if(is_chrome() && String(window.location.href).indexOf('file://')==0){

                }else{

                    calculate_translucent_canvas(_t,{'call_from':'calculate_dims - redraw_canvas'});
                }


            })
        }



        if(page=='page-gallery-w-thumbs'){
            calculate_dims_gallery_thumbs_img_container();
        }

        //console.info(_body.hasClass('page-is-fullwidth'));

        if(_body.hasClass('page-is-fullwidth')){
            if(_body.hasClass('menu-type-9') || _body.hasClass('menu-type-10')){



                setTimeout(function(){
                    if(_mainContainer.get(0) && _mainContainer.get(0).api_handle_wheel) {
                        _mainContainer.get(0).api_handle_wheel();
                    }
                },100);

            }
        }




        if(window.qucreative_options.bg_isparallax=='on'){


            setTimeout(function(){
                if(_mainBg.get(0) && _mainBg.get(0).api_handle_scroll){

                    //console.info(bigimageheight, wh);
                    _mainBg.get(0).api_handle_scroll(null,{
                        'from':'qcre'
                        ,'force_th':bigimageheight
                        ,'force_ch':wh
                    });
                }
            },100)

        }

        $('.height-same-as-width').each(function(){
            var _t23 = $(this);

            _t23.height(_t23.width());


        })



        if(window.preseter_init){
            var _cach = $('.preseter-content-con').eq(0);
            //console.log(_cach);
            //if(_cach.hasClass('scroller-con')){

            var _cach_cont = _cach.find('.the-content').eq(0);
            //_cach_cont.css('top', '0');

            _cach_cont.scrollTop(0);
            //console.info(110, _cach_cont.height(), wh, _cach_cont);

            if(110 + _cach_cont.find('.the-content-inner-inner').height() + 56>wh){

                _cach.outerHeight(wh - 110);
                _cach.removeClass('auto-height');
                _cach.addClass('needs-scrolling');

                _cach_cont.find('.the-content-inner-inner').css({
                    'padding-right' : (39-native_scrollbar_width)+'px'
                    ,'width' : (490-native_scrollbar_width)+'px'
                });
                _cach_cont.find('.the-bg').eq(0).css({
                    //'right' : -(39-native_scrollbar_width)+'px'
                    //,'width' : (260-native_scrollbar_width)+'px'
                });
            }else{

                _cach.css('height', 'auto');
                _cach.addClass('auto-height');
                _cach.removeClass('needs-scrolling');
                //console.info(_cach, _cach.css('height'));


                _cach_cont.find('.the-content-inner-inner').css({
                    'padding-right' : ''
                    ,'width' : ''
                });
                _cach_cont.find('.the-bg').eq(0).css({
                    'right' : ''
                    ,'width' : ''
                });
            }



        }

    }

    function calculate_dims_light(){

    }

    function calculate_translucent_canvas(arg,pargs){



        var _t = arg;
        var margs = {

            'overwrite_bg_index' : ""
            ,'callback_func' : null
            ,'callback_func_args' : {}
            ,'crossfade_newcanvas' : false
            ,'call_from' : 'default'
        }


        //console.info(_t,_t.css('display'));

        if(_t.length==0){
            return false;
        }


        //if(_t.css('display')=='none'){
        //
        //    if(margs.callback_func){
        //        var delaytime = 50;
        //        if(is_firefox()){
        //            delaytime=1500;
        //        }
        //        setTimeout(function(){
        //
        //            margs.callback_func();
        //        },delaytime)
        //    }
        //
        //    return false;
        //}

        if(pargs){
            margs = $.extend(margs,pargs);
        }
        // console.info('calculate_translucent_canvas()', arg,margs, margs.call_from);



        if(ww<responsive_breakpoint){
            if (margs.callback_func) {
                var delaytime = 50;
                if (is_firefox()) {
                    delaytime = 50;
                }
                setTimeout(function () {

                    margs.callback_func(margs.callback_func_args);
                }, delaytime)
            }

            return false;
        }

        if(bg_errored){

            if (margs.callback_func) {
                margs.callback_func(margs.callback_func_args);
            }
            return false;
        }


        //console.info('calculate_translucent_canvas()', arg,margs);
        var tempNr = currBgNr;

        if( (margs.overwrite_bg_index!=null && margs.overwrite_bg_index!='') || margs.overwrite_bg_index===0){
            tempNr = margs.overwrite_bg_index;
        }


        //console.info('calculate_translucent_canvas', margs,tempNr,window.qucreative_options.images_arr[tempNr]);




        var width = _t.width();
        var height = _t.height();


        // console.info('_t -> ',_t);

        if(_t.parent().parent().hasClass('qucreative--nav-con')==false){

            if(_t.parent().parent().parent().hasClass('main-gallery--desc')){
                var tempNr2 = _t.parent().parent().parent().parent().children().index(_t.parent().parent().parent());
                if(tempNr2!=tempNr){
                    return false;
                }
                _t.parent().parent().parent().show();
            }

            width = _t.parent().width();
            height = _t.parent().height();




            //console.log(_t.parent().width(),width);
        }else{
            // -- if this is the navigation

            width = _t.parent().width();

            if(_t.attr('data-placeholderh')){
                height = Number(_t.attr('data-placeholderh'));
            }

            if(  _body.hasClass('menu-type-1') || _body.hasClass('menu-type-2') ){
                height =  bigimageheight;
            }

            if( ( _body.hasClass('menu-type-13') || _body.hasClass('menu-type-14') || _body.hasClass('menu-type-17') || _body.hasClass('menu-type-18') )  && _body.hasClass('menu-is-sticky')==false){
                height = bigimageheight-wh+20; // why


                // height =  bigimageheight;
            }

            //console.log(_t.hasClass('for-parallaxer'));

            if(_t.hasClass('for-parallaxer')==false && ( _body.hasClass('menu-type-13') || _body.hasClass('menu-type-14') || _body.hasClass('menu-type-17') || _body.hasClass('menu-type-18') )){
                height = 100;
            }



        }

        //console.log(_t, width, height, bigimageheight-wh)

        if(_t.hasClass('for-parallaxer')){

            // console.info(height, parallaxer_multiplier, margs, _t);
            height=height*parallaxer_multiplier;
        }









        if(_t.parent().parent().hasClass('the-content')){

            width = bigimagewidth;
            height = bigimageheight;
        }


        //console.info(_t);





        //console.info(_t.get(0));
        var auximg = new Image();

        //auximg.reference_t = _t;

        _t.attr('width', width);
        _t.attr('height', height);

        _t.css({
            'width':width
            ,'height':height
        });

        if(margs.crossfade_newcanvas){
            _t.css('opacity','0');
            //_t.hide();
        }

        //console.info(_t,$('.main-bg-image').width(),$('.main-bg-image').height())

        //console.log(bigimagewidth,bigimageheight);

        auximg.width = bigimagewidth;
        auximg.height = bigimageheight;
        auximg.parentt = _t;



        auximg.crossOrigin = "Anonymous";

        //console.info('calculating for', _t,_t.hasClass('for-parallaxer'),auximg);
        auximg.onload = function(e){
            // console.info('onLoad',this,this.width,this.height, this.naturalHeight);

            //console.info(window.qucreative_options)

            var radius = window.qucreative_options.blur_ammount;

            // console.info('radius - ',radius);

            if(radius){
                var width = this.parentt.width();
                var height = this.parentt.height();

                if(_t.attr('data-placeholderh')){
                    height = Number(_t.attr('data-placeholderh'));
                }


                var tot = (this.parentt.offset().top);
                var tol = (this.parentt.offset().left);


                //console.info('calculating for ..really ?', _t,_t.hasClass('for-parallaxer'), this.reference_t);


                if(_t.parent().parent().parent().hasClass('main-gallery--desc')){
                    _t.parent().parent().parent().css('display','');
                }







                // -- when transitioning
                //console.log(_t.parent().parent())
                if(_t.parent().parent().hasClass('qucreative--nav-con')){

                    tot=0;
                }
                //console.info(_t,tol,tot,width,height,$('.main-bg-image').width(),$('.main-bg-image').height());

                //console.log("DA",_t.data('lastwidth'), width, _t.data('lastheight'), height, _t.data('last_mainbg_width'), $('.main-bg-image').width(), _t.data('last_mainbg_height'), $('.main-bg-image').height(),_t.data('lastimgsrc'),this.src);

                if(_t.data('lastwidth')==width && _t.data('lastheight')==height && _t.data('lastww')==ww && _t.data('lastwh')==wh && _t.data('lastimgsrc')==this.src){

                    //if(margs.callback_func){
                    //    margs.callback_func();
                    //}
                    //return false;
                }


                // console.info('this.parentt - ',this.parentt);

                var ctx;
                if(this.parentt.get(0) && this.parentt.get(0).getContext){
                    ctx = this.parentt.get(0).getContext('2d');
                }
                //var

                //console.info(tol,tot, bigimagewidth,bigimageheight);


                if(this.parentt.parent().parent().hasClass('the-content')){
                    //console.log(width,height);
                    tol=0;
                    tot=0;
                }


                var sw_is_dummy=false;



                if(_t.hasClass('dummy')){
                    sw_is_dummy=true;
                }






                this.parentt.removeClass('drawn');
                this.parentt.parent().removeClass('drawn');

                // - -  &&isiPad==false

                // console.info('image loaded .. the parent is - ',_t.parent());
                if(_t.css('display')!='none' && sw_is_dummy==false  &&isiPad==false && (is_ie()==false || (is_ie() && ieVersion>10)) && !(_t.parent().hasClass('translucent-con--for-the-content') && window.qucreative_options.content_enviroment_opacity=='100')     &&    !(_t.parent().hasClass('translucent-con--for-nav-con') && window.qucreative_options.menu_enviroment_opacity=='100')   ) {


                    if(_t.parent().hasClass('translucent-con--for-the-content')){
                        // console.info('-tol -> ',-tol);
                    }

                    // console.info("DRAWING IMAGE",this,ctx);
                    ctx.drawImage(this, -tol, -tot, bigimagewidth, bigimageheight);

                    //ctx.rect(20,20,150,100);
                    //ctx.stroke();


                    //console.info(tot,tol);

                    //console.info(width,height);
                    //console.log(width,height);

                    var pol = 0; // -- offset left
                    var pot = 0; // -- offset top


                    _t.data('lastwidth', width);
                    _t.data('lastheight', height);
                    _t.data('lastww', ww);
                    _t.data('lastwh', wh);
                    _t.data('lastimgsrc', auximg.src);
                    _t.data('last_mainbg_width', $('.main-bg-image').width());
                    _t.data('last_mainbg_height', $('.main-bg-image').height());

                    //console.info(_t,_t.parent(),_t.parent().parent(),_t.parent().parent().hasClass('the-content'), _theContent);


                    if (_t.parent().parent().hasClass('the-content')) {
                        //console.info(pol,width);
                        pol = _t.parent().offset().left;

                        //console.info('POL IS', pol)
                        var sw = false;
                        if (pol > 30) {
                            pol -= 15;
                            sw = true;
                        }
                        width = _t.parent().width();
                        if (sw) {
                            width += 30;
                            if (width > bigimagewidth) {
                                width = bigimagewidth;
                            }
                        }
                    }
                    //console.log(height);


                    var sw_trace_to_global = false;
                    if (_t.parent().parent().hasClass('gallery-thumbs--image-container')) {

                        pot = gallery_thumbs_img_container_padding_space;
                        pol = parseInt(_theContent.parent().css('left'),10) + gallery_thumbs_img_container_padding_space;
                        // width = ww - 250 + gallery_thumbs_img_container_padding_space * 2;
                        // width = ww - 250 + gallery_thumbs_img_container_padding_space * 2;
                        width = _theContent.parent().width();
                        // height = wh - gallery_thumbs_img_container_padding_space;
                        height = _theContent.parent().height();

                        if(_t.parent().hasClass('translucent-con--for-the-content')){
                            height = bigimageheight;
                        }

                        sw_trace_to_global = true;

                        //console.info(pol,pot, width, height);
                    }
                    //console.info('dims are - ',pol,width,_t.parent().parent().hasClass('the-content'));


                    if (_t.parent().parent().hasClass('qucreative--nav-con') || 1|| !global_image_data) {
                        //console.info(ctx, _body.has($(ctx)), $(ctx).descendantOf(_body));
                        var imageData;

                        try{
                            //console.info(pol,pot,width,height);

                            if(width && height){

                                imageData = ctx.getImageData(pol, pot, width, height);


                                if (sw_trace_to_global) {
                                    global_image_data = imageData;
                                }
                                //console.info(imageData);
                                var pixels = imageData.data;


                                //console.info(_t.parent().parent());


                                var mul_table = [
                                    512, 512, 456, 512, 328, 456, 335, 512, 405, 328, 271, 456, 388, 335, 292, 512,
                                    454, 405, 364, 328, 298, 271, 496, 456, 420, 388, 360, 335, 312, 292, 273, 512,
                                    482, 454, 428, 405, 383, 364, 345, 328, 312, 298, 284, 271, 259, 496, 475, 456,
                                    437, 420, 404, 388, 374, 360, 347, 335, 323, 312, 302, 292, 282, 273, 265, 512,
                                    497, 482, 468, 454, 441, 428, 417, 405, 394, 383, 373, 364, 354, 345, 337, 328,
                                    320, 312, 305, 298, 291, 284, 278, 271, 265, 259, 507, 496, 485, 475, 465, 456,
                                    446, 437, 428, 420, 412, 404, 396, 388, 381, 374, 367, 360, 354, 347, 341, 335,
                                    329, 323, 318, 312, 307, 302, 297, 292, 287, 282, 278, 273, 269, 265, 261, 512,
                                    505, 497, 489, 482, 475, 468, 461, 454, 447, 441, 435, 428, 422, 417, 411, 405,
                                    399, 394, 389, 383, 378, 373, 368, 364, 359, 354, 350, 345, 341, 337, 332, 328,
                                    324, 320, 316, 312, 309, 305, 301, 298, 294, 291, 287, 284, 281, 278, 274, 271,
                                    268, 265, 262, 259, 257, 507, 501, 496, 491, 485, 480, 475, 470, 465, 460, 456,
                                    451, 446, 442, 437, 433, 428, 424, 420, 416, 412, 408, 404, 400, 396, 392, 388,
                                    385, 381, 377, 374, 370, 367, 363, 360, 357, 354, 350, 347, 344, 341, 338, 335,
                                    332, 329, 326, 323, 320, 318, 315, 312, 310, 307, 304, 302, 299, 297, 294, 292,
                                    289, 287, 285, 282, 280, 278, 275, 273, 271, 269, 267, 265, 263, 261, 259
                                ];
                                var shg_table = [
                                    9, 11, 12, 13, 13, 14, 14, 15, 15, 15, 15, 16, 16, 16, 16, 17,
                                    17, 17, 17, 17, 17, 17, 18, 18, 18, 18, 18, 18, 18, 18, 18, 19,
                                    19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 20, 20, 20,
                                    20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 21,
                                    21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21,
                                    21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 22, 22, 22, 22, 22, 22,
                                    22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22,
                                    22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 23,
                                    23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23,
                                    23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23,
                                    23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23,
                                    23, 23, 23, 23, 23, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24,
                                    24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24,
                                    24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24,
                                    24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24,
                                    24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24
                                ]

                                var x, y, i, p, yp, yi, yw, r_sum, g_sum, b_sum,
                                    r_out_sum, g_out_sum, b_out_sum,
                                    r_in_sum, g_in_sum, b_in_sum,
                                    pr, pg, pb, rbs;

                                var div = radius + radius + 1,
                                    w4 = width << 2,
                                    widthMinus1 = width - 1,
                                    heightMinus1 = height - 1,
                                    radiusPlus1 = radius + 1,
                                    sumFactor = radiusPlus1 * (radiusPlus1 + 1) / 2,
                                    stackStart = BlurStack(),
                                    stack = stackStart;

                                for (i = 1; i < div; i++) {
                                    stack = stack.next = BlurStack();
                                    if (i == radiusPlus1) var stackEnd = stack;
                                }

                                stack.next = stackStart;

                                var stackIn = null,
                                    stackOut = null;

                                yw = yi = 0;

                                var mul_sum = mul_table[radius],
                                    shg_sum = shg_table[radius];

                                for (y = 0; y < height; y++) {
                                    r_in_sum = g_in_sum = b_in_sum = r_sum = g_sum = b_sum = 0;

                                    r_out_sum = radiusPlus1 * (pr = pixels[yi]);
                                    g_out_sum = radiusPlus1 * (pg = pixels[yi + 1]);
                                    b_out_sum = radiusPlus1 * (pb = pixels[yi + 2]);

                                    r_sum += sumFactor * pr;
                                    g_sum += sumFactor * pg;
                                    b_sum += sumFactor * pb;

                                    stack = stackStart;

                                    for (i = 0; i < radiusPlus1; i++) {
                                        stack.r = pr;
                                        stack.g = pg;
                                        stack.b = pb;
                                        stack = stack.next;
                                    }

                                    for (i = 1; i < radiusPlus1; i++) {
                                        p = yi + ((widthMinus1 < i ? widthMinus1 : i) << 2);
                                        r_sum += (stack.r = (pr = pixels[p])) * (rbs = radiusPlus1 - i);
                                        g_sum += (stack.g = (pg = pixels[p + 1])) * rbs;
                                        b_sum += (stack.b = (pb = pixels[p + 2])) * rbs;

                                        r_in_sum += pr;
                                        g_in_sum += pg;
                                        b_in_sum += pb;

                                        stack = stack.next;
                                    }

                                    stackIn = stackStart;
                                    stackOut = stackEnd;
                                    for (x = 0; x < width; x++) {
                                        pixels[yi] = (r_sum * mul_sum) >> shg_sum;
                                        pixels[yi + 1] = (g_sum * mul_sum) >> shg_sum;
                                        pixels[yi + 2] = (b_sum * mul_sum) >> shg_sum;

                                        r_sum -= r_out_sum;
                                        g_sum -= g_out_sum;
                                        b_sum -= b_out_sum;

                                        r_out_sum -= stackIn.r;
                                        g_out_sum -= stackIn.g;
                                        b_out_sum -= stackIn.b;

                                        p = (yw + ((p = x + radius + 1) < widthMinus1 ? p : widthMinus1)) << 2;

                                        r_in_sum += (stackIn.r = pixels[p]);
                                        g_in_sum += (stackIn.g = pixels[p + 1]);
                                        b_in_sum += (stackIn.b = pixels[p + 2]);

                                        r_sum += r_in_sum;
                                        g_sum += g_in_sum;
                                        b_sum += b_in_sum;

                                        stackIn = stackIn.next;

                                        if(stackOut){

                                            r_out_sum += (pr = stackOut.r);
                                            g_out_sum += (pg = stackOut.g);
                                            b_out_sum += (pb = stackOut.b);
                                        }

                                        r_in_sum -= pr;
                                        g_in_sum -= pg;
                                        b_in_sum -= pb;

                                        if(stackOut){

                                            stackOut = stackOut.next;
                                        }

                                        yi += 4;
                                    }
                                    yw += width;
                                }


                                for (x = 0; x < width; x++) {
                                    g_in_sum = b_in_sum = r_in_sum = g_sum = b_sum = r_sum = 0;

                                    yi = x << 2;
                                    r_out_sum = radiusPlus1 * (pr = pixels[yi]);
                                    g_out_sum = radiusPlus1 * (pg = pixels[yi + 1]);
                                    b_out_sum = radiusPlus1 * (pb = pixels[yi + 2]);

                                    r_sum += sumFactor * pr;
                                    g_sum += sumFactor * pg;
                                    b_sum += sumFactor * pb;

                                    stack = stackStart;

                                    for (i = 0; i < radiusPlus1; i++) {
                                        stack.r = pr;
                                        stack.g = pg;
                                        stack.b = pb;
                                        stack = stack.next;
                                    }

                                    yp = width;

                                    for (i = 1; i <= radius; i++) {
                                        yi = (yp + x) << 2;

                                        r_sum += (stack.r = (pr = pixels[yi])) * (rbs = radiusPlus1 - i);
                                        g_sum += (stack.g = (pg = pixels[yi + 1])) * rbs;
                                        b_sum += (stack.b = (pb = pixels[yi + 2])) * rbs;

                                        r_in_sum += pr;
                                        g_in_sum += pg;
                                        b_in_sum += pb;

                                        stack = stack.next;

                                        if (i < heightMinus1) yp += width;
                                    }

                                    yi = x;
                                    stackIn = stackStart;
                                    stackOut = stackEnd;
                                    for (y = 0; y < height; y++) {
                                        p = yi << 2;
                                        pixels[p] = (r_sum * mul_sum) >> shg_sum;
                                        pixels[p + 1] = (g_sum * mul_sum) >> shg_sum;
                                        pixels[p + 2] = (b_sum * mul_sum) >> shg_sum;

                                        r_sum -= r_out_sum;
                                        g_sum -= g_out_sum;
                                        b_sum -= b_out_sum;

                                        r_out_sum -= stackIn.r;
                                        g_out_sum -= stackIn.g;
                                        b_out_sum -= stackIn.b;

                                        p = (x + (((p = y + radiusPlus1) < heightMinus1 ? p : heightMinus1) * width)) << 2;

                                        r_sum += (r_in_sum += (stackIn.r = pixels[p]));
                                        g_sum += (g_in_sum += (stackIn.g = pixels[p + 1]));
                                        b_sum += (b_in_sum += (stackIn.b = pixels[p + 2]));

                                        stackIn = stackIn.next;

                                        r_out_sum += (pr = stackOut.r);
                                        g_out_sum += (pg = stackOut.g);
                                        b_out_sum += (pb = stackOut.b);

                                        r_in_sum -= pr;
                                        g_in_sum -= pg;
                                        b_in_sum -= pb;

                                        stackOut = stackOut.next;

                                        yi += width;
                                    }
                                }


                                ctx.clearRect( 0, 0, widthMinus1, heightMinus1 );
                                ctx.putImageData(imageData, pol, pot);

                                this.parentt.addClass('drawn');
                                this.parentt.parent().addClass('drawn');

                                // console.warn("PUTTING IMAGE DATA", ctx, imageData);


                                // $('.the-content-inner').css({'opacity':0, 'visibility':'hidden'}); // -- for debug

                                // console.info('drawn', _t, _t.parent().attr('class'), pol, pot, widthMinus1, heightMinus1, width, height);

                            }
                        }catch(e){
                            console.info('putimage error error: ',e);
                        }


                    } else {

                        ctx.putImageData(global_image_data, pol, pot);
                    }

                }else{

                    this.parentt.removeClass('drawn').addClass('not-drawn-because-conditions-not-met');
                }



                //console.info('ceva', _t);
            }else{



                this.parentt.removeClass('drawn').addClass('not-drawn-because-blur-is-zero');
            }



            //console.info('callback func: ',margs.callback_func);
            if (margs.callback_func) {
                var delaytime = 50;
                if (is_firefox()) {
                    delaytime = 50;
                }
                setTimeout(function () {

                    margs.callback_func(margs.callback_func_args);
                }, delaytime)
            }



        };




        // console.info('starting to draw', _t, _t.parent().hasClass('translucent-con--for-the-content'), this, window.qucreative_options.images_arr[tempNr]);
        //console.info(tempNr);

        var the_bg = window.qucreative_options.images_arr[tempNr];

        if(_theContent && ( ( _theContent.parent().hasClass('page-portfolio-single') && _theContent.parent().hasClass('page-portfolio-type-slider') ) || ( _theContent.parent().hasClass('page-blogsingle') && _theContent.parent().hasClass('post-media-type-slider') ) )   ){

            if(window.qucreative_options.the_background){
                the_bg = window.qucreative_options.the_background;
            }
        }


        if(the_bg && the_bg.indexOf('#')==0){


            var delaytime = 50;
            if (is_firefox()) {
                delaytime = 50;
            }
            setTimeout(function () {
                _t.removeClass('drawn').addClass('not-drawn-because-simple-color');
            }, delaytime)

            if (margs.callback_func) {
                setTimeout(function () {


                    margs.callback_func(margs.callback_func_args);
                }, delaytime)
            }
        }else{

            _t.removeClass('not-drawn-because-simple-color');
            // console.info('undefined? ',window.qucreative_options.images_arr[tempNr]);
            auximg.src = the_bg;
        }

    }
    function calculate_translucent(arg,pargs){
        var _t = arg;

        return false;
        var margs = {

            'overwrite_bg_index' : ""
            ,'callback_func' : null
            ,'callback_func_args' : {}
        }

        if(pargs){
            margs = $.extend(margs,pargs);
        }



        if(_t.data('appliedblur')!='on'){

            _t.css('background-image', mainBgImgCSS);
        }



        //setTimeout(drawBlur,0);


        _t.css({
            'margin-left': 0
            ,'margin-top': 0
            //,'transform': 'translate3d(0,0,0)'
        });
        if(_t.hasClass('for-parallaxer')){
            _t.css({
                //'transform': 'translate3d(0,0,0)'
            });
        }


        var tot = (_t.offset().top);
        var tol = (_t.offset().left);


        var auxw = ww;
        var auxh = wh;

        //console.info(_t);

        if(_t.hasClass('dzsparallaxer--target') || _t.hasClass('for-parallaxer')){
            auxh=auxh*parallaxer_multiplier;
        }

        if(_t.offset().left<15){

            mainbgoffset = 0;
        }else{

            mainbgoffset = 0;
        }

        if(_t.data('substract-translate')=='on'){


            //console.info(_t.data('substract-translate'),tot);
            //tot+= (wh*0.3);
            _t.data('substract-translate','off');


        }

        _t.width(auxw + mainbgoffset*2);
        _t.height(auxh + mainbgoffset*2);


        //if(_t.parent().parent().hasClass('the-content')){
        tot-=st;
        //}

        _t.css({
            'margin-left': -tol - mainbgoffset
            ,'margin-top': -tot -mainbgoffset
        })

        //console.log(ieVersion());
        if(ieVersion()==11){


            //var _t_img = null;
            //var _t_img_cnv = null;
            //if(_t.next().hasClass('translucent-img')){
            //    _t_img = _t.next();
            //}
            //if(_t.next().next().hasClass('translucent-img-canvas')){
            //    _t_img_cnv = _t.next().next();
            //}
            //
            //
            //if(_t_img){
            //
            //    _t_img.css({
            //        'width' : (ww + mainbgoffset*2)
            //        ,'height': (wh + mainbgoffset*2)
            //        ,'left': -tol - mainbgoffset
            //        ,'top': -tot -mainbgoffset
            //    })
            //}
            //if(_t_img_cnv){
            //
            //    _t_img_cnv.css({
            //        'width' : (ww + mainbgoffset*2)
            //        ,'height': (wh + mainbgoffset*2)
            //        ,'left': -tol - mainbgoffset
            //        ,'top': -tot -mainbgoffset
            //    })
            //}

        }



        if(margs.callback_func){
            margs.callback_func(margs.callback_func_args);
        }

    }

    function goto_prev_bg(){
        var tempNr = currBgNr;

        tempNr--;

        if(tempNr<0){

            tempNr = qucreative_options.images_arr.length - 1;
        }

        goto_bg(tempNr);

    }

    function goto_next_bg(){
        var tempNr = currBgNr;

        tempNr++;


        // console.info('tempNr - ',tempNr, qucreative_options.images_arr.length)

        if(qucreative_options.images_arr.length && ( qucreative_options.the_background==''||_body.hasClass('page-homepage') ) ){

            if(tempNr>qucreative_options.images_arr.length - 1){

                tempNr = 0;
            }

            goto_bg(tempNr);
        }

    }

    function update_parallaxer(arg){


        if(debug_var){

            debug_var = false;
        }

        if(isNaN(arg)){
            arg = 0;
        }



        // -- we receive the value from parallaxer





        if(_c_for_parallax_items){



            for(var i24 = 0;i24<_c_for_parallax_items.length;i24++){
                var _t = _c_for_parallax_items[i24];

                var arg2 = arg;

                if( ( _body.hasClass('menu-type-13') || _body.hasClass('menu-type-14') || _body.hasClass('menu-type-17') || _body.hasClass('menu-type-18') ) && _body.hasClass('menu-is-sticky')==false){
                    //console.log(arg, $(window).scrollTop())

                    //console.log(_t.parent().parent());

                    if(_t.parent().parent().hasClass('qucreative--nav-con')){
                        arg2+=Number($(window).scrollTop());
                    }

                    if(_theContent && _theContent.parent().hasClass('page-portfolio-single')){
                        arg2 = Number($(window).scrollTop());
                    }

                }





                _t.css({

                    'transform' : 'translate3d(0,'+(arg2)+'px,0)'
                })

            }



        }

    }






    function force_scroll_to_top(){

        // console.info("SCROLL TO TOP FORCE FROM QCREATIVE.JS")

        window.scroll_top_object.val = 0;
        if(_mainContainer.get(0) && _mainContainer.get(0).api_scrolly_to){
            _mainContainer.get(0).api_scrolly_to(0, {
                'force_no_easing':'on'
                ,show_scrollbar : false
            })
        }else{

            $(window).scrollTop(0);
        }
    }


    function fade_the_content_con(arg){

        //console.info('fade_the_content_con');

        if(bg_transition=='slidedown' || bg_transition=='wipedown'){

            arg.animate({
                'opacity': 1
            }, {
                duration: 1000
                , queue: false
            });
        }
        if(bg_transition=='fade' ){
            //arg.css({
            //    'opacity': 0
            //});
            //arg.animate({
            //    'opacity': 1
            //}, {
            //    duration: animation_time
            //    , queue: false
            //});
        }


    }

    function calculate_mainbg(pargs){



        var margs = {
            call_from:'default'
        }


        if(pargs){
            margs = $.extend(margs,pargs);
        }


        //var _c = $('.main-bg-con');
        //
        //_c.each(function(){
        //
        //    var _t =$(this);
        //
        //    if(_t.hasClass('')){
        //
        //    }
        //
        //});

        // TODO: decide here which main bg to resize

        var selector = '.main-bg-con .main-bg-image';
        if(margs.call_from=='new_page'){

            selector = '.main-bg-con.transitioning .main-bg-image'
        }
        var _c = $(selector);



        _c.each(function(){

            var _t =$(this);
            //console.info(_t);
            var wi = _t.get(0).naturalWidth;
            var he = _t.get(0).naturalHeight;
            //console.info(wi,he,ww,wh);

            if(border_width){
                ww = window.innerWidth - border_width;

                console.info('ww-',ww);
            }
            var auxww = ww;
            var auxwh = wh;


            var arg = '';

            // console.info('do we need parallaxer -6',do_we_need_parallaxer());
            if(do_we_need_parallaxer(arg)){

                auxwh*=parallaxer_multiplier;

                // console.info("HAS PARALLAXER");
            }

            //console.info(auxww, wh, auxwh);




            var sw_no_parallaxer = false;




            if(margs.call_from=='new_page'){

                if( (newclass_body.indexOf('single-dzsvcs_port_items-fullscreen')>-1 || newclass_body.indexOf('single-antfarm_port_items-fullscreen')>-1) && newclass_body.indexOf('post-media-type-image')>-1){
                    sw_no_parallaxer = true;
                }

            }else{

                if(_theContent){
                    if(_theContent.parent().hasClass('single-dzsvcs_port_items-fullscreen post-media-type-image') || _theContent.parent().hasClass('single-antfarm_port_items-fullscreen post-media-type-image')){

                        sw_no_parallaxer = true;
                    }
                }
            }

            // console.warn("IS IMAGE NO PARALLAX ? -> ",sw_no_parallaxer,margs);

            if(sw_no_parallaxer){

                bigimagewidth = ww;
                bigimageheight = wh;

            }



            if(wi/he >auxww/auxwh){

                bigimagewidth=auxwh * (wi/he);
                bigimageheight=auxwh;

            }else{


                bigimagewidth=auxww;
                bigimageheight=auxww*(he/wi);
            }
            // console.info('ww, wh', ww, wh, wi/he, auxww/auxwh);
            // console.info('main-bg-image dimensions', bigimagewidth, bigimageheight);



            _t.width(bigimagewidth);
            _t.height(bigimageheight);
        })

    }

    function handle_frame(){

        //console.log('handle_frame()');

        if(page=='page-gallery-w-thumbs'){
            //console.info(_gallery_thumbs_con, finish_vix);
            if(finish_vix){



                begin_vix = target_vix;
                change_vix = finish_vix - begin_vix;


                //console.info('handle_frame', finish_viy, duration_viy, target_viy);

                //console.log(duration_viy);
                target_vix = Number(Math.easeIn(1, begin_vix, change_vix, duration_vix).toFixed(4));;


                //console.info(target_vix, _gallery_thumbs_con);

                if(!(_gallery_thumbs_con)){

                    if($('.gallery-thumbs-con').length>0) {
                        _gallery_thumbs_con = $('.gallery-thumbs-con').eq(0);
                    }
                }


                if(is_ios()==false && is_android()==false && _gallery_thumbs_con){
                    _gallery_thumbs_con.find('.thumbs-list').eq(0).css({
                        'transform': 'translate3d('+target_vix+'px,0,0)'
                    });
                }
            }
        }

        requestAnimFrame(handle_frame);

    }


    function change_nav_con_520(e){
        var _t = $(this);
        //console.info(e,_t, _t.val(), _t.find(':selected'));


        var _tc = _t.find(':selected').eq(0);



        click_menu_anchor(e, {_t:_tc});
    }

    function handle_wheel(e){


        var _t = $(this);


        //console.log(e, _t, menu_is_scrollable);

        if(menu_is_scrollable){
            var auxtop = parseInt(_logoCon.css('margin-top'),10);
            //console.log(auxtop);

            if(e && e.wheelDeltaY){

                auxtop+= (e.wheelDeltaY/3);
            }

            if(isNaN(auxtop)){
                auxtop=0;
            }
            if(is_firefox()){

                auxtop+= -(e.detail*12);
                //console.info(auxtop, e.detail*6)
            }else{

            }

            //console.info(auxtop, e.wheelDeltaY, menu_is_scrollable_offset);
            if(auxtop>0){
                auxtop = 0;
            }
            if(auxtop<-menu_is_scrollable_offset){
                auxtop = -menu_is_scrollable_offset;
            }
            //console.info(auxtop, e.wheelDeltaY);

            _logoCon.css('margin-top', auxtop+'px');

            e.preventDefault();
            return false;
        }
    }

    function submenu_animate_size(_arg){

        // -- _arg is the ul element


        //console.info(_arg);

        if(_arg.css('display')=='none'){


            var auxh = _arg.eq(0).height();

            if(_arg.parent().parent().hasClass('custom-menu')){


                //console.info('tru',_arg.parent().hasClass('children-active'));

                _arg.css('display','block');
                _arg.css('height','auto');

                _arg.css({
                    'display':'block'
                    ,'height':'0'
                })
                _arg.animate({
                    'height':auxh+'px'
                }, {
                    queue:false
                    ,duration:300
                    ,complete: function(e){
                        //console.info(this);

                        $(this).css('height','');
                    }
                })
                //console.info(auxh);

            }


            if(_arg.parent().parent().parent().parent().hasClass('custom-menu')){
                //console.info('tru third level');

                var _cach_parent = _arg.parent().parent();
                var _cach_parent_orig_h = _cach_parent.height();

                //console.info(_cach_parent,_cach_parent_orig_h);

                setTimeout(function(){

                    _arg.css({
                        'display':'block'
                        ,'height':'auto'
                    })

                    targeth = _arg.height();
                    var _cach_parent_targeth = _cach_parent.height();

                    _cach_parent.css({
                        'display':'block'
                        ,'height':_cach_parent_orig_h+'px'
                    })
                    _cach_parent.animate({
                        'height':_cach_parent_targeth+'px'
                    }, {
                        queue:false
                        ,duration:300
                        ,complete: function(e){
                            //console.info(this);

                            $(this).css('height','');
                        }
                    });


                    _arg.css({
                        'display':'block'
                        ,'height':'0'
                    })
                    _arg.animate({
                        'height':auxh+'px'
                    }, {
                        queue:false
                        ,duration:300
                        ,complete: function(e){
                            //console.info(this);

                            $(this).css('height','');
                        }
                    })

                    //console.info();
                },50)


                //_arg.animate({
                //    'height':auxh+'px'
                //}, {
                //    queue:false
                //    ,duration:300
                //    ,complete: function(e){
                //        console.info(this);
                //    }
                //})
            }
        }else{

            // -- close submenu

            if(_arg.parent().parent().hasClass('custom-menu')){


                _arg.animate({
                    'height': 0
                }, {
                    queue:false
                    ,duration:300
                    ,complete: function(e){
                        console.info(this);

                        $(this).css('display','none');
                        $(this).css('height','');
                    }
                })

            }



            if(_arg.parent().parent().parent().parent().hasClass('custom-menu')){
                //console.info('tru third level');

                var _cach_parent = _arg.parent().parent();
                var _cach_parent_orig_h = _cach_parent.height();


                setTimeout(function(){

                    _arg.css({
                        'display':'block'
                        ,'height':'0'
                    })

                    var targeth = _arg.height();
                    var _cach_parent_targeth = _cach_parent.height();

                    _cach_parent.css({
                        'display':'block'
                        ,'height':_cach_parent_orig_h+'px'
                    })
                    _cach_parent.animate({
                        'height':_cach_parent_targeth+'px'
                    }, {
                        queue:false
                        ,duration:300
                        ,complete: function(e){
                            console.info(this);

                            $(this).css('height','');
                        }
                    });


                    _arg.css({
                        'display':'block'
                        ,'height':''
                    })
                    _arg.animate({
                        'height':'0'
                    }, {
                        queue:false
                        ,duration:300
                        ,complete: function(e){
                            //console.info(this);

                            $(this).css('display','none');
                            $(this).css('height','');
                        }
                    })

                    //console.info();
                },50)


            }

        }

    }

    function handle_submit(e){
        var _t = $(this);
        if(e.type=='submit'){
            if(_t.hasClass('for-contact')){



                // var sw_error = false;
                //
                // var _c = _t.find('input[name="the_name"]').eq(0);
                // if(_c.val()==''){
                //
                //     _c.addClass('needs-attention');
                //     _c.eq(0).val('Please complete this field');
                //
                //     setTimeout(function(_arg){
                //
                //         _arg.removeClass('needs-attention');
                //         _arg.val('');
                //     },2000,_c);
                //
                //
                //     sw_error=true;
                // }
                //
                //
                //
                // _c = _t.find('input[name="the_subject"]').eq(0);
                // if(_c.val()==''){
                //
                //     _c.addClass('needs-attention');
                //     _c.val('Please complete this field');
                //
                //     setTimeout(function(_arg){
                //
                //         _arg.removeClass('needs-attention');
                //         _arg.val('');
                //     },2000,_c);
                //
                //
                //     sw_error=true;
                // }
                //
                // _c = _t.find('*[name="the_feedback"]').eq(0);
                // if(_c.val()==''){
                //
                //     _c.addClass('needs-attention');
                //     _c.val('Please complete this field');
                //
                //     setTimeout(function(_arg){
                //
                //         _arg.removeClass('needs-attention');
                //         _arg.val('');
                //     },2000,_c);
                //
                //
                //     sw_error=true;
                // }
                //
                //
                // _c = $('input[name="the_email"]').eq(0);
                // if(validateEmail(_c.val())==false){
                //     _c.addClass('needs-attention');
                //     _c.val('Invalid email address');
                //
                //     setTimeout(function(_arg){
                //
                //         _arg.removeClass('needs-attention');
                //         _arg.val('');
                //     },2000,_c);
                //
                //     sw_error=true;
                // }
                //
                // if(sw_error){
                //
                //     return false;
                // }





                console.info('trying to submit on contact');






                var sw_error = false;


                var _c = $('input[name=the_name],input[name=name]').eq(0);

                console.info(_c);


                var _con = null;


                if(_t.parent().parent().parent().parent().hasClass('shortcode-antfarm-contact')){
                    _con = _t.parent().parent().parent().parent();
                }else{
                    _con = $(this);
                }

                console.warn(_con);





                if(_c.val()==''){

                    _c.addClass('needs-attention');
                    _c.val('Please complete this field');

                    setTimeout(function(){

                        _c.removeClass('needs-attention');
                        _c.val('');
                    },2000);


                    sw_error=true;
                }

                var _car = _con.find('*[aria-required="true"]');


                _car.each(function(){
                    var _t2 = $(this);



                    if(_t2.val()==''){

                        _t2.addClass('needs-attention');
                        _t2.val('Please complete this field');

                        setTimeout(function(){

                            _t2.removeClass('needs-attention');
                            _t2.val('');
                        },2000);


                        sw_error=true;
                    }

                });




                var _c2 = _con.find('input[name=the_email],input[name=email]').eq(0);

                if(validateEmail(_c2.val())==false){
                    _c2.addClass('needs-attention');
                    _c2.val('Invalid email address');

                    setTimeout(function(){

                        _c2.removeClass('needs-attention');
                        _c2.val('');
                    },2000)

                    sw_error=true;
                }

                if(sw_error){

                    return false;
                }






                var data = {
                    postdata:_con.serialize()
                };
                var ajaxurl = _con.attr('action');






                jQuery.post(ajaxurl, data, function(response) {
                    if(window.console !=undefined ){
                        console.log('Got this from the server 9473: ' + response);
                    }
                    $('.form-feedback').eq(0).addClass('active');
                    _con.find('input,textarea').each(function(){
                        var _t23 = $(this);

                        if(_t23.attr('type')!='hidden'){
                            // _t23.val('');
                        }
                        _t23.val('');
                        _t23.trigger('change');
                        // _t.find('input,texarea').eq(0).val('');
                    });
                    _t.find('.form-feedback').eq(0).addClass('active');
                    _t.find('.form-feedback').eq(0).addClass('active-success');


                    if(response.indexOf('error - ')>-1){

                        _t.find('.form-feedback span').eq(0).html('ERROR IN CONTACT SEND');
                    }
                    if(response.indexOf('success - ')>-1){

                        _t.find('.form-feedback span').eq(0).html('THANK YOU FOR YOUR MESSAGE');
                    }
                    setTimeout(function(){

                        _t.find('.form-feedback').eq(0).removeClass('active');
                    },2000);


                    setTimeout(function(){
                        _t.find('.form-feedback').eq(0).removeClass('active-success active-error');
                    },2600);


                });



                return false;



            }
        }
    }

    function mousemove_document(e){


        // console.log(e);

        if(e&&e.pageY){
            if(e.pageY<33){
                $('#wpadminbar').addClass('active');
            }else{

                $('#wpadminbar').removeClass('active');
            }
        }
    }


    function handle_mouse(e){

        var _t = $(this);

        // console.info(_t);

        if(e){
            if(e.type=='mousemove'){
                if(_t.hasClass('thumbs-list-con')){

                    var this_w = _t.width();

                    //console.info(this_w, _t.find('.thumbs-list').eq(0).width());

                    if(_t.find('.thumbs-list').eq(0).width() > this_w){

                        var mx = e.pageX - _t.offset().left;

                        var aux_tw = _t.find('.thumbs-list').eq(0).width();




                        //console.info(mx/this_w);


                        finish_vix = mx/this_w * (this_w-aux_tw-(thumbs_padding_left_and_right/2) + thumbs_list_padding_right);

                        //console.log(finish_vix);


                    }else{
                        finish_vix=0;
                    }

                }

                // -- mouse move
                if(_t.hasClass('qucreative--nav-con')){

                    if(_body.hasClass('menu-type-1') || _body.hasClass('menu-type-2')){
                        if(e.pageX>250){
                            return false;
                        }
                    }
                    //console.info(e.pageX);
                    //console.info(menu_is_scrollable);
                    if(menu_is_scrollable){
                        var aux_perc = e.pageY / wh;

                        //console.info(aux_perc, (aux_perc*menu_is_scrollable_offset));

                        _logoCon.css({
                            'margin-top' : '-'+(aux_perc*menu_is_scrollable_offset)+'px'
                        })
                    }else{

                    }
                }

            }
            if(e.type=='click'){

                if(_t.attr('data-vc-container')){
                    if(_t.attr('href')=='#'){
                        return false;
                    }
                }

                // console.info('clickkk ',_t);

                if(_t.parent().hasClass('has-children') && _t.attr('href')=='#'){

                    _t.parent().children('.submenu-toggler').trigger('click');

                    return false;
                }

                if(_t.hasClass('qucreative--520-nav-con--placeholder')){

                    // window.close_zoombox();
                    // jQuery.fn.zoomBox.close()

                    $('.nav-wrapper-head').trigger('click');
                }
                if(_t.hasClass('prev-btn-con')){

                    goto_prev_bg()
                }
                if(_t.hasClass('next-btn-con')){

                    goto_next_bg()
                }
                if(_t.hasClass('map-show')){

                    contact_show_map();
                }
                if(_t.hasClass('map-hide')){

                    contact_hide_map();
                }
                if(_t.hasClass('submenu-toggler')){

                    //console.log(_t);

                    _t.parent().toggleClass('children-active');

                    var _cach = _t.parent().children('ul').eq(0);
                    submenu_animate_size(_cach);





                }
                if(_t.hasClass('dzs-select-wrapper-head')){

                    //console.log(_t);
                    //console.info(custom_responsive_menu);

                    if(custom_responsive_menu){
                        _body.addClass('custom-responsive-menu-active');
                        if(_mainContainer.get(0) && _mainContainer.get(0).api_block_scroll){
                            _mainContainer.get(0).api_block_scroll();
                        }
                    }
                }
                if(_t.hasClass('close-responsive-con')){

                    //console.log(_t);
                    //console.info(custom_responsive_menu);

                    if(custom_responsive_menu){
                        _body.removeClass('custom-responsive-menu-active');
                        if(_mainContainer.get(0) && _mainContainer.get(0).api_unblock_scroll){
                            _mainContainer.get(0).api_unblock_scroll();
                        }
                    }
                }

                if(_t.hasClass('menu-toggler') || _t.hasClass('menu-closer')){

                    $('.menu-toggler-target').eq(0).toggleClass('active');
                }

                if(_t.hasClass('thumb')){
                    var ind = _t.parent().children().index(_t);

                    currNr_gallery_w_thumbs = ind;

                    //console.info(ind);

                    _t.parent().children().removeClass('curr-thumb');
                    _t.addClass('curr-thumb');


                    //console.info(page);
                    if(page=='page-gallery-w-thumbs'){
                        if (document.getElementById("as-gallery-w-thumbs") && document.getElementById("as-gallery-w-thumbs").api_goto_page) {

                            document.getElementById("as-gallery-w-thumbs").api_goto_page(ind);
                        }

                    }
                }
                if(_t.hasClass('services-lightbox')){
                    //console.info('ceva');


                    _mainContainer.append('<div class="services-lightbox-overlay"></div>');
                    _mainContainer.append('<div class="services-lightbox-content"><div class="services-lightbox-content--content">'+_t.children('.lightbox-content').eq(0).html()+'</div><div class="services-lightbox--close"><i class="fa fa-times"></i></div></div>');

                    _mainContainer.children('.services-lightbox-content').width((_theContent.width()-60));


                    var css_left = _theContent.offset().left + 30;
                    _mainContainer.children('.services-lightbox-content').css({
                        'left' : css_left
                        ,'max-width' : ww - css_left
                    });

                    if(ww<responsive_breakpoint){
                        _mainContainer.children('.services-lightbox-content').css({
                            'left' : ''
                            ,'width' : ''
                        });
                    }


                    setTimeout(function(){
                        _mainContainer.children('.services-lightbox-overlay,.services-lightbox-content').addClass('active');

                        setTimeout(function(){
                            _mainContainer.children('.services-lightbox-content').addClass('active-content');

                        },300)
                    },100);

                    if(_mainContainer.get(0) && _mainContainer.get(0).api_block_scroll){
                        _mainContainer.get(0).api_block_scroll();
                    }

                    return false;
                }
                if(_t.hasClass('services-lightbox--close') || _t.hasClass('services-lightbox-overlay')){
                    //console.info('ceva');


                    _mainContainer.children('.services-lightbox-overlay').removeClass('active');
                    _mainContainer.children('.services-lightbox-content').removeClass('active active-content');

                    setTimeout(function(){
                        _mainContainer.children('.services-lightbox-overlay,.services-lightbox-content').remove();
                    },600);


                    if(_mainContainer.get(0) && _mainContainer.get(0).api_unblock_scroll){
                        _mainContainer.get(0).api_unblock_scroll();
                    }

                    return false;
                }




                if(_t.hasClass('contact-form-button')){
                    //console.info('ceva');

                    var sw_error = false;


                    var _c = $('input[name=the_name],input[name=name]').eq(0);

                    console.info(_c);


                    var _con = null;


                    if(_t.parent().parent().parent().parent().hasClass('shortcode-antfarm-contact')){
                        _con = _t.parent().parent().parent().parent();
                    }

                    console.warn(_con);





                    if(_c.val()==''){

                        _c.addClass('needs-attention');
                        _c.val('Please complete this field');

                        setTimeout(function(){

                            _c.removeClass('needs-attention');
                            _c.val('');
                        },2000);


                        sw_error=true;
                    }

                    var _car = _con.find('*[aria-required="true"]');


                    _car.each(function(){
                        var _t2 = $(this);



                        if(_t2.val()==''){

                            _t2.addClass('needs-attention');
                            _t2.val('Please complete this field');

                            setTimeout(function(){

                                _t2.removeClass('needs-attention');
                                _t2.val('');
                            },2000);


                            sw_error=true;
                        }

                    });




                    var _c2 = _con.find('input[name=the_email],input[name=email]').eq(0);

                    if(validateEmail(_c2.val())==false){
                        _c2.addClass('needs-attention');
                        _c2.val('Invalid email address');

                        setTimeout(function(){

                            _c2.removeClass('needs-attention');
                            _c2.val('');
                        },2000)

                        sw_error=true;
                    }

                    if(sw_error){

                        return false;
                    }






                    var data = {
                        postdata:_con.serialize()
                    };
                    var ajaxurl = _con.attr('action');






                    jQuery.post(ajaxurl, data, function(response) {
                        if(window.console !=undefined ){
                            console.log('Got this from the server 9857: ' + response);
                        }
                        $('.form-feedback').eq(0).addClass('active');
                        _con.find('input,textarea').each(function(){
                            var _t23 = $(this);

                            if(_t23.attr('type')!='hidden'){
                                // _t23.val('');
                            }
                        });


                        setTimeout(function(){
                            $('.form-feedback').eq(0).removeClass('active');
                        },2000);
                    });


                    // return false;


                }


                if(_t.hasClass('submit-comment')){



                    // return false;


                }

                if(_t.hasClass('portfolio-single-liquid-info')){


                    if(_mainContainer.get(0) && _mainContainer.get(0).api_scrolly_to){

                        _mainContainer.find('.scrollbary').eq(0).addClass('animatetoptoo');
                        setTimeout(function(){

                            var aux = _theContent.find('.desc-content-wrapper h3').eq(0).offset().top;
                            _mainContainer.get(0).api_scrolly_to(aux, {
                                'force_no_easing':'off'
                            });
                        },50);
                    }else{
                        var aux = _theContent.find('.desc-content-wrapper h3').eq(0).offset().top;
                        $('html, body').animate({
                            scrollTop: aux - 150
                        },300, 'swing');;
                    }


                }


                if(_t.hasClass('arrow-left-for-skin-qucreative')){


                    if(_theContent.find('.advancedscroller').get(0) && _theContent.find('.advancedscroller').get(0).api_gotoPrevPage) {
                        _theContent.find('.advancedscroller').get(0).api_gotoPrevPage();
                    }


                }
                if(_t.hasClass('arrow-right-for-skin-qucreative')){


                    if(_theContent.find('.advancedscroller').get(0) && _theContent.find('.advancedscroller').get(0).api_gotoNextPage){

                        _theContent.find('.advancedscroller').get(0).api_gotoNextPage();
                    }


                }
                if(_t.hasClass('description-wrapper--icon-con')){


                    _t.parent().toggleClass('active');


                }

            }
        }
    }

    function handle_mouse_for_gallery_w_thumbs(e){
        var _t = $(this);


        if(_t.hasClass('arrow-left')){
            //console.info(currNr_gallery_w_thumbs);

            currNr_gallery_w_thumbs--;

            if(currNr_gallery_w_thumbs < 0){
                currNr_gallery_w_thumbs = _theContent.find('.advancedscroller').find('.thumbsClip').children().length-1;
            }

            //console.log(currNr_gallery_w_thumbs);
            //console.info(currNr_gallery_w_thumbs, _theContent.find('.advancedscroller').find('.thumbsClip'));


        }

        if(_t.hasClass('arrow-right')){
            //console.info(currNr_gallery_w_thumbs);

            currNr_gallery_w_thumbs++;

            if(currNr_gallery_w_thumbs >= _theContent.find('.advancedscroller').find('.thumbsClip').children().length){
                currNr_gallery_w_thumbs = 0;
            }

            //console.info(currNr_gallery_w_thumbs, _theContent.find('.advancedscroller').find('.thumbsClip'));


        }

        if(_gallery_thumbs_con){

            _gallery_thumbs_con.find('.thumbs-list .thumb').removeClass('curr-thumb');
            _gallery_thumbs_con.find('.thumbs-list .thumb').eq(currNr_gallery_w_thumbs).addClass('curr-thumb');
        }else{
            console.warn('gallery_thumb_con not found');
        }
    }

    function validateEmail(email) {
        var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        return re.test(email);
    }

    function contact_show_map(){

        //console.info('contact_show_map()');

        $('.map-canvas-con').addClass('active');
    }

    function contact_hide_map(){

        //console.info('contact_show_map()');

        $('.map-canvas-con').removeClass('active');
    }


    function gm_initialize() {
        //console.info('gm_initialize()',window.google);



        //var _c_ = $('.map-canvas-con')[0];


        $('.map-canvas').each(function(){
            var _c_ = $(this).get(0);





            var lat = -33.890542;
            var long2 = 151.274856;


            if(_c_ && _c_.getAttribute && _c_.getAttribute('data-lat')){
                lat = _c_.getAttribute('data-lat');
            }
            if(_c_ && _c_.getAttribute && _c_.getAttribute('data-long')){
                long2 = _c_.getAttribute('data-long');
            }


            //console.info(window.google, window.google.maps);
            if(!(window.google) || !(google.maps) || !(google.maps.LatLng)){
                setTimeout(gm_initialize,1000);
                return false;
            }

            var gm_position = new google.maps.LatLng(lat, long2);
            var styleOptions = [];



            // console.info('styleOptions - ',styleOptions);
            if(window.str_gmaps_styling){
                styleOptions = JSON.parse(window.str_gmaps_styling);

                // console.info(window.str_gmaps_styling, styleOptions);
            }
            // console.info('styleOptions - ',styleOptions);


            //console.info(_c_, gm_position, lat, long2, $(_c_).width());


            var mapOptions = {
                zoom: 15
                ,maxZoom: 19
                ,center: gm_position
                ,mapTypeId: google.maps.MapTypeId.ROADMAP
                ,scrollwheel: false
                ,streetViewControl: false
                ,styles: styleOptions

            };





            var map = new google.maps.Map(_c_,
                mapOptions);


            setTimeout(function(){
                // map.setOptions({maxZoom:/*For example*/19});
            },1000);

            //console.info(_c_);

            var image = qucreative_options.theme_url+'libs/qucreative/img/marker_maps.png';

            if(_body.hasClass('page-normal') &&  $(_c_).hasClass('indicator-red')==false){
                //image = qucreative_options.site_url+'img/gmaps_marker_2.png';
            }

            // console.warn('image - ',image);

            var beachMarker = new google.maps.Marker({
                position: gm_position,
                map: map,
                icon: image
            });



        })



        //$(_c_).removeClass('transitioning');
        //$(_c_).parent().removeClass('transitioning');

        //console.info(_c_, $('.map-canvas-con'), $('.map-canvas-con')[0])



        //google.maps.event.addDomListener( map, 'drag', function(e) {
        //    //Code that runs consistantly everytime the user drags the map
        //    //load map tiles if not loaded yet
        //    console.log('ceva');
        //    google.maps.event.trigger(map,'resize');
        //    map.setZoom(map.getZoom());
        //});
        //
        //google.maps.event.addListenerOnce(map, 'tilesloaded', function () {
        //    google.maps.event.addListenerOnce(map, 'tilesloaded', function () {
        //        google.maps.event.trigger(map, 'resize');
        //    });
        //});

        //window.console.log("Position center: "+map.getCenter()+"\nZoom: "+map.getZoom());

        //setTimeout(function(){
        //    console.log(map);
        //    google.maps.event.trigger(map, "resize");
        //    map.setZoom( map.getZoom() );
        //},2000);
        //
        //google.maps.event.addListenerOnce(map, 'idle', function(){
        //    $(window).resize();
        //    map.setCenter(gm_position);
        //});



        //var marker = new google.maps.Marker({
        //    position: gm_position,
        //    map: map,
        //    title: 'Hello World!'
        //});


    }

    window.qcreative_gm_init = gm_initialize;

    function handle_scroll(e){

        // console.warn("HANDLE SCROLL");

        st = $(window).scrollTop();

        // console.warn("HANDLE SCROLL st - ",st);

        if(is_menu_horizontal_and_full_bg){
            var aux = full_bg_init_y - st;

            if(aux<0){
                aux = 0;
            }


        }

        // console.info(st);


        // console.info('sw_native_scrollbar_sidebar_check - ',sw_native_scrollbar_sidebar_check);
        if(sw_native_scrollbar_sidebar_check ){
            // console.info("YES");

            if(handle_frame_id){

                if(Math.abs(last_handle_frame_id - handle_frame_id)<3){

                    misc_regulate_nav_native();
                }
            }else{

                misc_regulate_nav_native();
            }
        }
        last_handle_frame_id = handle_frame_id;


        if( page_portfolio_requires_move_filters){
            // console.info("YES");
            misc_regulate_nav_native();
        }

        //if(css_border_width){
        //    //console.info(st,_mainBg);
        //
        //    _mainBg.css('top', st+'px');
        //}
        //console.log(is_menu_horizontal_and_full_bg);

        //console.log(st);

        //if(_theContent){
        //
        //    if(_theContent.children('.translucent-con').length>0){
        //        var _c = _theContent.children('.translucent-con').eq(0);
        //
        //        //_c.
        //
        //        _c.children('.translucent-bg').css({
        //            //'top' : ot+'px'
        //        })
        //    }
        //} g


    }


    function regulate_nav(){


        // console.info('regulate_nav', st, page_portfolio_requires_move_filters);


        if(page=='page-blogsingle' && _sidebarMain){


            st =$(window).scrollTop();
            if(_body.hasClass('with-border')){
                // st = -(parseInt($('.the-content-con').eq(0).css('top'),10));
            }

            //console.info(_sidebarMain.offset().top);


            //console.info(_theContent.offset().top, _theContent.height(), _sidebarMain.offset().top, _sidebarMain.height())
            //console.info(_sidebarMain.offset().top, _sidebarMain.height(), $(window).scrollTop(),wh, _sidebarMain.offset().top + _sidebarMain.height() + 30 , $(window).scrollTop()+wh)






            //console.info(st,initial_sidebar_offset + _sidebarMain.height() + 20,st+wh);


            //console.log(initial_theContent_offset);

            _sidebarMain.css({
                'top' : '',
                'bottom' : '',
                'position': '',
                'width' : '',
                'left': ''
            })





            var aux_bottom = 0;

            // aux_bottom = (aux_gap_width)+'px';
            aux_bottom = (force_width_blur_margin)+'px';



            // console.warn('initial_sidebar_offset -> ',initial_sidebar_offset);

            if(initial_sidebar_offset + _sidebarMain.height() + force_width_blur_margin < st+wh){
                // console.info('ceva');

                //console.info(aux);


                //console.info(aux + initial_sidebar_offset+_sidebarMain.height(), _theContent.offset().top + _theContent.height() );

                var of_left = _sidebarMain.offset().left;
                var _sidebarMain_width = _sidebarMain.outerWidth();


                var aux_gap_width = 30;

                if(force_width_gap){
                    aux_gap_width = force_width_gap;
                }


                //console.warn(of_left, _sidebarMain_width);




                if(_body.hasClass('with-border')==false){


                }else{

                }



                // console.info('aux - ',aux)
                // console.info('initial_sidebar_offset - ',initial_sidebar_offset)
                // console.info('_sidebarMain.height() - ',_sidebarMain.height())
                // console.info('---');
                // console.info('initial_theContent_offset - ',initial_theContent_offset)
                // console.info('_theContent.height() - ',_theContent.height())
                // console.info('aux_gap_width - ',aux_gap_width)
                // console.info('---');
                // console.info(aux + initial_sidebar_offset + _sidebarMain.height());
                // console.info(aux );
                // console.info(initial_theContent_offset + _theContent.height() + aux_gap_width + 5);


                // + initial_sidebar_offset + _sidebarMain.height()



                // console.info(st+wh, _upperFooter.offset().top)

                // console.info(_sidebarMain_width, ww, _sidebarMain.height(), wh);






                // -- if sidebar main height is bigger then viewport height
                if(_sidebarMain.height()>=wh){

                    // console.info("HIER");

                    //
                    // if(_sidebarMain_width<ww/2 && _body.hasClass('sidebar-is-bigger-then-content')==false){

                    if(_sidebarMain_width<ww/2 && _body.hasClass('sidebar-is-bigger-then-content')==false){

                        if(_upperFooter){


                            if(st+wh>_upperFooter.offset().top){
                                // console.error(aux_bottom);
                                aux_bottom = ( st+wh ) -  _upperFooter.offset().top + aux_gap_width;

                                // console.error('has upper footer :) ', aux_bottom);
                            }

                        }else{
                            if(_theContent){

                                // console.info(st+wh, _theContent.offset().top +_theContent.outerHeight())

                                if(st+wh>_theContent.offset().top +_theContent.outerHeight() ){
                                    // console.error(aux_bottom);
                                    aux_bottom = ( st+wh ) -  _theContent.offset().top - _theContent.outerHeight()  + aux_gap_width;

                                    // console.error('aux_bottom -', aux_bottom);
                                }
                            }
                        }

                        // console.info('aux_bottom -> ', aux_bottom);

                        _sidebarMain.css({
                            'top' : 'auto',
                            'bottom' : aux_bottom,
                            'position': 'fixed',
                            'width' : _sidebarMain_width+'px',
                            'left': of_left+'px'
                        })
                    }
                }else{


                    // console.info("HIER");





                    // stick to top for sidebar smaller then wh
                    if(st + force_width_blur_margin>_sidebarMain.offset().top){
                        // console.warn('aux_bottom - ',aux_bottom);



                        _sidebarMain.css({
                            'top' : aux_bottom,
                            'position': 'fixed',
                            'width' : _sidebarMain_width+'px',
                            'left': of_left+'px'
                        })
                    }





                    // -- works for sidebar smaller then wh
                    if(_upperFooter){
                        if(st + force_width_blur_margin * 2 + _sidebarMain.height() >_upperFooter.offset().top){




                            if(st+wh>_upperFooter.offset().top){
                                // console.error(aux_bottom);
                                aux_bottom = ( st+wh ) -  _upperFooter.offset().top + aux_gap_width;

                                // console.error(aux_bottom);
                            }

                            // console.warn('aux_bottom for bottom - ',aux_bottom);

                            _sidebarMain.css({
                                'top' : 'auto',
                                'bottom' : aux_bottom,
                                'position': 'fixed',
                                'width' : _sidebarMain_width+'px',
                                'left': of_left+'px'
                            })
                        }
                    }else{

                        // console.info('aux_bottom for bottom - ',aux_bottom);
                        if(_theContent){


                            // console.info('aux_bottom for bottom - ',aux_bottom);
                            if(st + force_width_blur_margin * 2 + _sidebarMain.height() >_theContent.offset().top +_theContent.outerHeight() ){




                                if(_upperFooter){

                                    if(st+wh>_upperFooter.offset().top){
                                        // console.error(aux_bottom);
                                        aux_bottom = ( st+wh ) -  _theContent.offset().top - _theContent.outerHeight() + aux_gap_width;

                                        // console.error(aux_bottom);
                                    }
                                }else{


                                    if(st+wh>_theContent.offset().top +_theContent.outerHeight()){
                                        // console.error(aux_bottom);
                                        aux_bottom = ( st+wh ) -  _theContent.offset().top - _theContent.outerHeight() + aux_gap_width;

                                        // console.error(aux_bottom);
                                    }
                                }

                                // console.warn('aux_bottom for bottom - ',aux_bottom);

                                _sidebarMain.css({
                                    'top' : 'auto',
                                    'bottom' : aux_bottom,
                                    'position': 'fixed',
                                    'width' : _sidebarMain_width+'px',
                                    'left': of_left+'px'
                                })
                            }

                        }
                    }


                }


                //console.info(initial_theContent_offset, aux + initial_sidebar_offset + _sidebarMain.height(),initial_theContent_offset.top + _theContent.height() + 35, aux);

                //_sidebarMain.css({
                //    'top' : aux
                //    //'transform' : 'translateY('+aux+'px)'
                //})
            }else{

                _sidebarMain.css({
                    'top' : 0
                })
            }
            if(ww<responsive_breakpoint){

                _sidebarMain.css({
                    'top' : ''
                })
            }
        }

        if(page_portfolio_requires_move_filters){


            // st =$(window).scrollTop();



            // console.info('st - ',st);

            if(ww<1000){

                if(_selectorCon){

                    if(window.qucreative_options.enable_native_scrollbar=='off' ||window.qucreative_options.enable_native_scrollbar=='on'){

                    }else{

                        _selectorCon.css({
                            'top':''
                        })
                    }
                }
            }else{

                if(_selectorCon){

                    if(window.qucreative_options.enable_native_scrollbar=='off' ||window.qucreative_options.enable_native_scrollbar=='on'){

                    }else {

                        // _selectorCon.css({
                        //     'transform': 'translate3d(0,' + st + 'px,0)'
                        // })
                    }

                }
            }


        }






    }


})
var qcreative_curr_html = '';

function qcre_callback_for_zoombox(arg){
    //console.info('qcre_callback_for_zoombox()', arg);
    //return false;

    //arg.prepend($('.qucreative--520-nav-con').eq(0).clone());


    console.info('jQuery(\'.qucreative--520-nav-con\') - ',jQuery('.qucreative--520-nav-con'), jQuery('.qucreative--520-nav-con').outerHeight());
    arg.prepend('<div class="qucreative--520-nav-con--placeholder" style="height: '+jQuery('.qucreative--520-nav-con').eq(0).outerHeight()+'px;"></div>');

    if(window.dzsscr_init){
        //console.log('apply BURNED WATER');

        // -- zoombox scroller
        window.dzsscr_init('.zoombox-maincon .scroller-con',{
            'settings_skin':'skin_apple'
            ,enable_easing: 'on'
            ,settings_autoresizescrollbar: 'on'
            ,settings_chrome_multiplier : 0.12
            ,settings_firefox_multiplier : -3
            ,settings_refresh: 700
            ,settings_autoheight: "off"
            ,touch_leave_native_scrollbar: "on"
        });
    }

    if(jQuery('.main-container')){

    }
}


window.qcre_open_social_link = function(arg){
    var leftPosition, topPosition;
    var w = 500, h= 500;
    //Allow for borders.
    leftPosition = (window.screen.width / 2) - ((w / 2) + 10);
    //Allow for title and status bars.
    topPosition = (window.screen.height / 2) - ((h / 2) + 50);
    var windowFeatures = "status=no,height=" + h + ",width=" + w + ",resizable=yes,left=" + leftPosition + ",top=" + topPosition + ",screenX=" + leftPosition + ",screenY=" + topPosition + ",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no";
    window.open(arg,"sharer", windowFeatures);
}

window.qcre_callback_for_zoombox = qcre_callback_for_zoombox;

function ieVersion() {
    //return 11;
    var ua = window.navigator.userAgent;
    if (ua.indexOf("Trident/7.0") > 0)
        return 11;
    else if (ua.indexOf("Trident/6.0") > 0)
        return 10;
    else if (ua.indexOf("Trident/5.0") > 0)
        return 9;
    else
        return 0;  // not IE9, 10 or 11
}

var isiPad = navigator.userAgent.match(/iPad/i) != null;

function is_ie11(){
    return !(window.ActiveXObject) && "ActiveXObject" in window;
}


function get_query_arg(purl, key){
//        console.log(purl, key)
    if(purl.indexOf(key+'=')>-1){
        //faconsole.log('testtt');
        var regexS = "[?&]"+key + "=.+";
        var regex = new RegExp(regexS);
        var regtest = regex.exec(purl);


        if(regtest != null){
            var splitterS = regtest[0];
            if(splitterS.indexOf('&')>-1){
                var aux = splitterS.split('&');
                splitterS = aux[1];
            }
            var splitter = splitterS.split('=');

            return splitter[1];

        }
        //$('.zoombox').eq
    }
}

function is_touch_device() {
    return !!('ontouchstart' in window);
}

function can_history_api() {
    return !!(window.history && history.pushState);
}

window.requestAnimFrame = (function() {
    //console.log(callback);
    return window.requestAnimationFrame ||
        window.webkitRequestAnimationFrame ||
        window.mozRequestAnimationFrame ||
        window.oRequestAnimationFrame ||
        window.msRequestAnimationFrame ||
        function(/* function */callback, /* DOMElement */element) {
            window.setTimeout(callback, 1000 / 60);
        };
})();



var addComment = {
    moveForm: function( commId, parentId, respondId, postId ) {
        var div, element, style, cssHidden,
            t           = this,
            _theLi        = t.I( commId ),
            respond     = t.I( respondId ),
            cancel      = t.I( 'cancel-comment-reply-link' ),
            parent      = t.I( 'comment_parent' ),
            post        = t.I( 'comment_post_ID' ),
            commentForm = respond.getElementsByTagName( 'form' )[0];

        console.info('moveForm() from qcreative.js','commId ->',commId, 'parentId ->', parentId, respondId,postId);
        console.info('document.getElementById(commId) -> ', document.getElementById(commId));
        console.info('_theLi -> ',_theLi,'respond -> ',respond, 'cancel -> ',cancel, 'parent -> ',parent,'commentForm -> ',commentForm);
        if ( ! _theLi || ! respond || ! cancel || ! parent || ! commentForm ) {
            return;
        }




        t.respondId = respondId;
        postId = postId || false;

        if ( ! t.I( 'wp-temp-form-div' ) ) {
            div = document.createElement( 'div' );
            div.id = 'wp-temp-form-div';
            div.style.display = 'none';
            respond.parentNode.insertBefore( div, respond );
        }

        _theLi.parentNode.insertBefore( respond, _theLi.nextSibling );
        if ( post && postId ) {
            post.value = postId;
        }
        parent.value = parentId;
        cancel.style.display = '';

        cancel.onclick = function() {
            var t       = addComment,
                temp    = t.I( 'wp-temp-form-div' ),
                respond = t.I( t.respondId );

            if ( ! temp || ! respond ) {
                return;
            }

            t.I( 'comment_parent' ).value = '0';
            temp.parentNode.insertBefore( respond, temp );
            temp.parentNode.removeChild( temp );
            this.style.display = 'none';
            this.onclick = null;
            return false;
        };

        jQuery(cancel).parent().show();

        /*
         * Set initial focus to the first form focusable element.
         * Try/catch used just to avoid errors in IE 7- which return visibility
         * 'inherit' when the visibility value is inherited from an ancestor.
         */
        try {
            for ( var i = 0; i < commentForm.elements.length; i++ ) {
                element = commentForm.elements[i];
                cssHidden = false;

                // Modern browsers.
                if ( 'getComputedStyle' in window ) {
                    style = window.getComputedStyle( element );
                    // IE 8.
                } else if ( document.documentElement.currentStyle ) {
                    style = element.currentStyle;
                }

                /*
                 * For display none, do the same thing jQuery does. For visibility,
                 * check the element computed style since browsers are already doing
                 * the job for us. In fact, the visibility computed style is the actual
                 * computed value and already takes into account the element ancestors.
                 */
                if ( ( element.offsetWidth <= 0 && element.offsetHeight <= 0 ) || style.visibility === 'hidden' ) {
                    cssHidden = true;
                }

                // Skip form elements that are hidden or disabled.
                if ( 'hidden' === element.type || element.disabled || cssHidden ) {
                    continue;
                }

                element.focus();
                // Stop after the first focusable element.
                break;
            }

            // console.info("jQuery('#cancel-comment-reply-link') -> ",jQuery('#cancel-comment-reply-link'));

            // jQuery('#cancel-comment-reply-link').unwrap();
            // jQuery('#cancel-comment-reply-link').wrap('<h6></h6>');




            // console.info("jQuery(t) [_theLi] -> > ",jQuery(_theLi), _theLi);

            jQuery(_theLi).find('.comment-reply-link').attr('href','#');


            var _c = jQuery('.comment-reply-title');


            _c.html(qucreative_options.translate_leave_a_comment_to+' <u>'+jQuery(_theLi).find('.author-name').eq(0).html()+'</u><h6><a rel="nofollow" id="cancel-comment-reply-link" href="'+String(window.location.href).split('#')[0]+'#respond">'+qucreative_options.translate_cancel_comment+'</a></h6>');

            cancel      = t.I( 'cancel-comment-reply-link' )



            cancel.onclick = function() {
                var t       = addComment,
                    temp    = t.I( 'wp-temp-form-div' ),
                    respond = t.I( t.respondId );

                if ( ! temp || ! respond ) {
                    return;
                }

                t.I( 'comment_parent' ).value = '0';
                temp.parentNode.insertBefore( respond, temp );
                temp.parentNode.removeChild( temp );
                this.style.display = 'none';


                var _c = jQuery('.comment-reply-title');


                _c.html(qucreative_options.translate_leave_a_comment);
                _c.append('<h6 class="cancel-comment-reply-link-con" style="display:none;"><a rel="nofollow" id="cancel-comment-reply-link" href="'+String(window.location.href).split('#')[0]+'#respond">'+qucreative_options.translate_cancel_comment+'</a></h6>');

                this.onclick = null;
                return false;
            };


        } catch( er ) {}

        return false;
    },

    I: function( id ) {
        return document.getElementById( id );
    }
};
