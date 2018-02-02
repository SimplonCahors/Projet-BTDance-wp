window_presetter_inited = false;
window.has_preseter= true;

window.preseter_options= {
    'delay_time_to_autohide': 1000000
    ,init_on_document_ready : false
};

jQuery(document).ready(function ($) {

    var preseter_options_default = {
        'delay_time_to_autohide' : 1500
        ,'init_on_document_ready' : true
    }

    if(window.preseter_options ){
        window.preseter_options = $.extend(preseter_options_default, window.preseter_options);
    }else{
        window.preseter_options = preseter_options_default;
    }

    if(window.preseter_options.init_on_document_ready && window.preseter_init){

        window.preseter_init();
    }
})







function get_query_arg(purl, key){
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


function add_query_arg(purl, key,value){
    key = encodeURIComponent(key); value = encodeURIComponent(value);

    //if(window.console) { console.info(key, value); };

    var s = purl;
    var pair = key+"="+value;

    var r = new RegExp("(&|\\?)"+key+"=[^\&]*");


    //console.info(pair);

    s = s.replace(r,"$1"+pair);
    //console.log(s, pair);
    var addition = '';
    if(s.indexOf(key + '=')>-1){


    }else{
        if(s.indexOf('?')>-1){
            addition = '&'+pair;
        }else{
            addition='?'+pair;
        }
        s+=addition;
    }

    //if value NaN we remove this field from the url
    if(value=='NaN'){
        var regex_attr = new RegExp('[\?|\&]'+key+'='+value);
        s=s.replace(regex_attr, '');
    }


    //if(!RegExp.$1) {s += (s.length>0 ? '&' : '?') + kvp;};

    return s;
}




jQuery(document).ready(function($){

    var _body = $('body').eq(0);
    var _qcre_aux_css = null;
    if($('#qucreative-css-from-js').length>0){
        _qcre_aux_css=$('#qucreative-css-from-js').eq(0);
    }else{


        $('head').append('<style id="qucreative-css-from-js"></style>');
        _qcre_aux_css=$('#qucreative-css-from-js').eq(0);

    }

    var inter_enlarge_preseter = 0;


    var inter_preseter_scroll = 0;






    var curr_html = ''
        ,curr_html_with_clear_cache = false
    ;

    function preseter_init(){

        var preseter_options_default = {
            'delay_time_to_autohide' : 1500
        }




        var $ = jQuery;





        $(function() {

            if($.fn.wpColorPicker) {

                $('.wp-color-picker-init ').wpColorPicker();
            }else{
                setTimeout(function(){

                    if($.fn.wpColorPicker) {
                        $('.wp-color-picker-init ').wpColorPicker();
                    }
                },1000);
            }
        });


        var auxa = String(window.location.href).split('/');


        var aux2 = auxa[auxa.length-1];

        if(window.qucreative_options){
            // -- then it is wordpress
            if(window.qucreative_options.site_url){

                aux2 = window.location.href;
            }
        }






        if(window.preseter_options ){
            window.preseter_options = $.extend(preseter_options_default, window.preseter_options);
        }else{
            window.preseter_options = preseter_options_default;
        }


        if(window_presetter_inited){
            return false;
        }


        var _preseter = $('.preseter').eq(0);

        jQuery('.select-wrapper select').bind('change', change_select);




        var targetw = -(_preseter.find('.the-content').outerWidth());


        if(_preseter.find('.the-content').attr('data-targetw')){
            targetw = Number(_preseter.find('.the-content').attr('data-targetw'));
        }


        if(_preseter.hasClass('align-right')){
            setTimeout(function () {
                _preseter.animate({'right': targetw}, {duration: 700, queue: false});
            }, window.preseter_options.delay_time_to_autohide)
        }else{
            setTimeout(function () {
                _preseter.animate({'left':  targetw}, {duration: 700, queue: false});
            }, window.preseter_options.delay_time_to_autohide)
        }

        $('.preseter > .the-icon,.preseter > .the-icon-con').bind("click", function () {
            var _t = $(this);
            //console.log(_t);

            var targetw = -(_preseter.find('.the-content').outerWidth());


            if(_preseter.find('.the-content').attr('data-targetw')){
                targetw = Number(_preseter.find('.the-content').attr('data-targetw'));
            }


            if(_preseter.hasClass('align-right')){
                if (parseInt(_t.parent().css('right')) < 0) {
                    _t.parent().animate({'right': 0}, {duration: 300, queue: false});
                    _preseter.addClass('preseter-opened-by-user');
                } else {
                    _preseter.animate({'right': targetw}, {duration: 300, queue: false});
                    _preseter.removeClass('preseter-opened-by-user');
                    _t.parent().find(".picker-con").find(".picker").fadeOut('fast');
                }
            }else{
                if (parseInt(_t.parent().css('left')) < 0) {
                    _t.parent().animate({'left': 0}, {duration: 300, queue: false});
                } else {
                    _preseter.animate({'left': targetw}, {duration: 300, queue: false});
                    //console.log(_t.parent().find(".picker-con"));
                    _t.parent().find(".picker-con").find(".picker").fadeOut('fast');
                }
            }


        })


        window_presetter_inited = true;

    }

    window.preseter_init = preseter_init;



    $(document).on('change','*[name=menu-type]',function(){
        var _t = $(this);
        var val = _t.val();


        if(val=='menu-type-9'||val=='menu-type-10'||val=='menu-type-13'||val=='menu-type-14'||val=='menu-type-15'||val=='menu-type-16'||val=='menu-type-17'||val=='menu-type-18'){
            $('.small-checkbox-con-menu_is_sticky').show();
        }else{

            $('.small-checkbox-con-menu_is_sticky').hide();
        }





    })



    if(window.dzsscr_init){
        //console.log('apply BURNED WATER');

        // -- preseter scroller
        // $('.preseter .preseter-content-con').addClass('scroller-con');



        // if($('.preseter').find('scroller-con').length){
        //     window.dzsscr_init('.preseter .scroller-con',{
        //         'settings_skin':'skin_apple'
        //         ,enable_easing: 'on'
        //         ,settings_autoresizescrollbar: 'on'
        //         ,settings_chrome_multiplier : 0.12
        //         ,settings_firefox_multiplier : -3
        //         ,settings_refresh: 700
        //         ,settings_autoheight: "off"
        //         ,settings_show_sidebar_on_right_side_mouse: "on"
        //         ,touch_leave_native_scrollbar: "on"
        //     });
        //
        //
        // }
        //


        window.dzsscr_init('.the-content-inner-con',{
            'settings_skin':'skin_apple'
            ,enable_easing: 'on'
            ,settings_autoresizescrollbar: 'on'
            ,settings_chrome_multiplier : 0.12
            ,settings_firefox_multiplier : -3
            ,settings_refresh: 700
            ,bubble_events: "off"
            ,settings_autoheight: "off"
            ,settings_show_sidebar_on_right_side_mouse: "on"
            ,touch_leave_native_scrollbar: "on"
        });
    }


    setTimeout(function(){

        $('*[name=menu-type]').trigger('change');



        setTimeout(function(){

            $(document).on('change.dzsmenutypeopacity','*[name=menu-type]',function(){

                var _t = $(this);

                var val = 30;

                // || _t.val()=='menu-type-17' || _t.val()=='menu-type-18'
                if(_t.val()=='menu-type-3' || _t.val()=='menu-type-4'|| _t.val()=='menu-type-6'){
                    // $('#customize-control-menu_enviroment_opacity-slider').slider("value", 100);
                    // $('#customize-control-menu_enviroment_opacity-slider').trigger("slidechange");
                    // $('#customize-control-menu_enviroment_opacity-slider').trigger("slide");
                    // $('#customize-control-menu_enviroment_opacity-slider').slider("option",'change');


                    val = 100;
                }
                if(_t.val()=='menu-type-5' ){


                    val = 90;
                }
                // -- 7,8,9,10,11,12,13,14,15,16  - 0



                $('*[name="menu_enviroment_opacity"]').val(val);
                // $('*[name="menu_enviroment_opacity"]').trigger('change');
                $('.slider-ui[data-for=menu_enviroment_opacity]').slider("value", val);

            });
        },10);


        if(window.preseter_init){

            setTimeout(function(){

                $('.preseter.align-right').addClass('activated');
            },1000)
            window.preseter_init()





            $('.preseter .preseter-content-con .the-content-inner-inner').bind('mouseenter',function(){

                clearTimeout(inter_enlarge_preseter);
                //console.info('mouseenter', $('.preseter .preseter-content-con .the-content'));
                //$('.preseter .preseter-content-con .the-content-inner-con').css('width', '700px');
                //$('.preseter .preseter-content-con .the-content-inner-con').css('left', 'auto');
                //$('.preseter .preseter-content-con .the-content-inner-con').css('right', '0');








                // TODO: WE DONT NEED THIS IF SCORLLER
                // $('.preseter .preseter-content-con .the-content').css('width', '700px');
                // $('.preseter .preseter-content-con .the-content').css('left', 'auto');
                // $('.preseter .preseter-content-con .the-content').css('right', '0');







                //$(this).css('width', '260px');
                //$(this).css('left', 'auto');
                //$(this).css('right', '0');
            })
            $('.preseter .preseter-content-con .the-content-inner-inner').bind('mouseleave',function(){


                clearTimeout(inter_enlarge_preseter);
                inter_enlarge_preseter = setTimeout(function(){

                    //$('.preseter .preseter-content-con .the-content-inner-con').css('width', '');
                    //$('.preseter .preseter-content-con .the-content-inner-con').css('left', '');
                    //$('.preseter .preseter-content-con .the-content-inner-con').css('right', '');



                    // $('.preseter .preseter-content-con .the-content').css('width', '');
                    // $('.preseter .preseter-content-con .the-content').css('left', '');
                    // $('.preseter .preseter-content-con .the-content').css('right', '');



                    //$(this).css('width', '');
                    //$(this).css('left', '');
                    //$(this).css('right', '');
                },300)
                //console.info('mouseleave');
            })

        }
    },1500);




    function change_select() {
        var selval = (jQuery(this).find(':selected').text());
        jQuery(this).parent().children('span').text(selval);
    }









    function handle_the_wheel(e){

        //console.info('ceva');

        clearTimeout(inter_preseter_scroll);

        inter_preseter_scroll = setTimeout(function(){

            //console.info('ceva');

            var _c = $('.preseter .the-content');

            _c.find('.dzstooltip-con').each(function(){
                var _t233 = $(this);

                if(_t233.get(0) && _t233.get(0).api_handle_resize){
                    _t233.get(0).api_handle_resize();
                }
            })


        },300);

        e.stopPropagation()
    }

    function handle_mouse(e){
        var _t = $(this);

        if(e.type=='click'){
            if(_t.hasClass('preseter-button--save')){


                //console.log('ceva');


                if(typeof(Storage) !== "undefined") {
                    //console.info($('input[name=parallax_bg]:checked').val());

                    var datenow = new Date().getTime();
                    var object = {value: $('select[name=menu-type]').eq(0).val(), timestamp: datenow};
                    localStorage.setItem("menu-type", JSON.stringify(object));


                    object = {value: $('select[name=page-title-align]').eq(0).val(), timestamp: datenow};
                    localStorage.setItem("page-title-align", JSON.stringify(object));

                    object = {value: $('select[name=heading-style]').eq(0).val(), timestamp: datenow};
                    //console.info(object);
                    localStorage.setItem("heading-style", JSON.stringify(object));

                    object = {value: $('select[name=heading-aligment]').eq(0).val(), timestamp: datenow};
                    localStorage.setItem("heading-aligment", JSON.stringify(object));





                    object = {value: $('input[name=saturation_ammount]').eq(0).val(), timestamp: datenow};
                    localStorage.setItem("saturation_ammount", JSON.stringify(object));



                    //console.info(localStorage.getItem('heading-style'));


                    var menu_type_aux = $('select[name=menu-type]').eq(0).val();
                    //console.info(menu_type_aux);

                    // console.info('curr_html - ',curr_html);




                    var is_light = 'off';
                    if(menu_type_aux=='menu-type-2'||menu_type_aux=='menu-type-4'||menu_type_aux=='menu-type-6'||menu_type_aux=='menu-type-8'||menu_type_aux=='menu-type-10'||menu_type_aux=='menu-type-14'||menu_type_aux=='menu-type-16'||menu_type_aux=='menu-type-18'){



                        is_light = 'on';

                    }else{


                    }

                    var finalurl = qcreative_curr_html;


                    if(is_light=='on'){
                        // finalurl = add_query_arg(finalurl,'light','on');
                    }
                    finalurl = add_query_arg(finalurl,'menu_type',$('*[name=menu-type]').eq(0).val());
                    finalurl = add_query_arg(finalurl,'menu_enviroment_opacity',$('*[name=menu_enviroment_opacity]').eq(0).val());
                    finalurl = add_query_arg(finalurl,'content_enviroment_opacity',$('*[name=content_enviroment_opacity]').eq(0).val());
                    finalurl = add_query_arg(finalurl,'highlight_color',$('*[name=highlight_color]').eq(0).val());
                    finalurl = add_query_arg(finalurl,'border_color',$('*[name=highlight_color]').eq(0).val());
                    finalurl = add_query_arg(finalurl,'content_align',$('*[name=content_align]').eq(0).val());
                    finalurl = add_query_arg(finalurl,'width_blur_margin',$('*[name=width_blur_margin]').eq(0).val());
                    finalurl = add_query_arg(finalurl,'width_column',$('*[name=width_column]').eq(0).val());
                    finalurl = add_query_arg(finalurl,'width_gap',$('*[name=width_gap]').eq(0).val());
                    finalurl = add_query_arg(finalurl,'border_width',$('*[name=border_width]').eq(0).val());
                    finalurl = add_query_arg(finalurl,'border_color',$('*[name=border_color]').eq(0).val());
                    finalurl = add_query_arg(finalurl,'blur_ammount',$('*[name=blur_ammount]').eq(0).val());
                    finalurl = add_query_arg(finalurl,'content_enviroment_style',$('*[name=content_enviroment_style]').eq(0).val());
                    // finalurl = add_query_arg(finalurl,'menu_is_sticky',$('*[name=menu_is_sticky]').eq(0).val());

                    var checkboxlab = '';
                    checkboxlab = 'bg_isparallax';

                    if($('*[name="'+checkboxlab+'"][value="on"]').eq(0).prop('checked')){
                        finalurl = add_query_arg(finalurl,checkboxlab,'on');
                    }else{

                        finalurl = add_query_arg(finalurl,checkboxlab,'off');
                    }



                    checkboxlab = 'content_link_to_menu_opacity';

                    if($('*[name="'+checkboxlab+'"][value="on"]').eq(0).prop('checked')){
                        finalurl = add_query_arg(finalurl,checkboxlab,'on');
                    }else{

                        finalurl = add_query_arg(finalurl,checkboxlab,'off');
                    }
                    checkboxlab = 'menu_is_sticky';

                    if($('*[name="'+checkboxlab+'"][value="on"]').eq(0).prop('checked')){
                        finalurl = add_query_arg(finalurl,checkboxlab,'on');
                    }else{

                        finalurl = add_query_arg(finalurl,checkboxlab,'off');
                    }

                    // checkboxlab = 'enable_native_scrollbar';
                    //
                    // if($('*[name="'+checkboxlab+'"][value="on"]').eq(0).prop('checked')){
                    //     finalurl = add_query_arg(finalurl,checkboxlab,'on');
                    // }else{
                    //
                    //     finalurl = add_query_arg(finalurl,checkboxlab,'off');
                    // }

                    checkboxlab = 'enable_ajax';

                    if($('*[name="'+checkboxlab+'"][value="on"]').eq(0).prop('checked')){
                        finalurl = add_query_arg(finalurl,checkboxlab,'on');
                    }else{

                        finalurl = add_query_arg(finalurl,checkboxlab,'off');
                    }

                    window.location.href = String(finalurl);

                } else {
                    // Sorry! No Web Storage support..
                }


            }







            if(_t.hasClass('preseter-button--default')){


                //console.log('ceva');


                finalurl = add_query_arg(qcreative_curr_html,'clearcache','on');

                window.location.href = String(finalurl);

                return false;

                if(typeof(Storage) !== "undefined") {


                    localStorage.setItem("page-title-align", '');
                    localStorage.setItem("heading-style", '');
                    localStorage.setItem("heading-aligment", '');


                    localStorage.setItem("saturation_ammount", '');


                    //location.reload();


                    if(String(qcreative_curr_html).indexOf('light-')!=0){

                        //console.info(curr_html);

                        // if(curr_html_with_clear_cache){
                        //     window.location.href = curr_html;
                        // }else{
                        //     location.reload();
                        // }
                        //location.reload();
                    }else{

                        // window.location.href = String(curr_html).substr(6);
                    }
                } else {
                    // Sorry! No Web Storage support..
                }


            }



        }
    }

    // TODO: move in preseter.js - async
    if(window.preseter_init){

        window.onload = function() {
            //console.info('ceva');


        };


        // console.info("WE ARE IN PRESETER");

        //$( window ).unload(function() {
        //
        //    localStorage.setItem("menu-type", '');

        //    localStorage.setItem("page-title-align", '');
        //    localStorage.setItem("heading-style", '');
        //    localStorage.setItem("heading-aligment", '');
        //    localStorage.setItem("content-align", '');

        //    localStorage.setItem("blur_ammount", '');
        //    localStorage.setItem("saturation_ammount", '');

        //
        //
        //});

        if(typeof(Storage) !== "undefined") {



            if(get_query_arg(window.location.href, 'clearcache')=='on'){



                localStorage.setItem("page-title-align", '');
                localStorage.setItem("heading-style", '');
                localStorage.setItem("heading-aligment", '');


                localStorage.setItem("saturation_ammount", '');

            }



            // -- <h6>SECTION TITLE STYLE</h6> <select name="heading-style"> <option value="heading-style-1">Section Title 1</option> <option value="heading-style-2">Section Title 2</option> <option selected value="heading-style-3">Section Title 3</option> <option value="heading-style-4">Section Title 4</option> <option value="heading-style-5">Section Title 5</option> </select> </div> <div class="setting"> <h6>SECTION TITLE ALIGMENT</h6> <select name="heading-aligment"> <option value="heading-is-left">Left</option> <option value="heading-is-center">Center</option> <option value="heading-is-right">Right</option> </select> </div>
            //
            //
            //


            var preseter_width = 490;


            if($('.preseter.align-right').length==0){

            }


            var datenow = new Date().getTime();






            if(localStorage.getItem('page-title-align')){

                try{
                    var obj = JSON.parse(localStorage.getItem('page-title-align'));

                    //console.info(obj.timestamp, datenow, (datenow - obj.timestamp)/1000);

                    //console.log(obj.value);
                    if(obj.value && datenow - obj.timestamp < 1800000){
                        //console.log(obj.value);
                        _body.removeClass('page-title-align-left page-title-align-center page-title-align-right');

                        _body.addClass(obj.value);


                        $('.preseter select[name=page-title-align]').val(obj.value);
                    }
                }catch(err){
                    // console.log(err);
                }


            }



            if(localStorage.getItem('heading-style')){

                try{
                    var obj = JSON.parse(localStorage.getItem('heading-style'));

                    //console.info(obj.timestamp, datenow, (datenow - obj.timestamp)/1000);

                    if(obj.value && datenow - obj.timestamp < 1800000){
                        $('.the-content-sheet-text').removeClass('heading-style-1 heading-style-2 heading-style-3 heading-style-4 heading-style-5')

                        $('.the-content-sheet-text').addClass(obj.value);

                        if((obj.value=='heading-style-1'||obj.value=='heading-style-2')&&$('.the-content-sheet-text').eq(0).length>0){

                            $('.the-content-sheet-text').each(function(){
                                var _t232=$(this);

                                _t232.html(_t232.html().split('<br>').join(' '))
                            })

                        }
                        if((obj.value=='heading-style-4')&&$('.the-content-sheet-text').eq(0).length>0){

                            $('.the-content-sheet-text').each(function(){
                                var _t232=$(this);


                                var auxa = _t232.html().split('<br>');

                                var aux_str = String(_t232.html()).replace(/<h2>(.*)<br>(.*)<\/h2>/g, '<h2><span class="light">$1</span>$2<\/h2>');

                                //console.log(aux_str);
                                _t232.html(aux_str)
                            })

                        }

                        //console.info(obj, obj.value);
                        $('.preseter select[name=heading-style]').val(obj.value);

                    }
                }catch(err){
                    console.log(err);
                }


            }
            if(localStorage.getItem('heading-aligment')){

                try{
                    var obj = JSON.parse(localStorage.getItem('heading-aligment'));

                    //console.info(obj.timestamp, datenow, (datenow - obj.timestamp)/1000);

                    if(obj.value && datenow - obj.timestamp < 1800000){
                        $('.the-content-sheet-text').removeClass('heading-is-left heading-is-center heading-is-right')

                        $('.the-content-sheet-text').addClass(obj.value);


                        $('.preseter select[name=heading-aligment]').val(obj.value);
                    }
                }catch(err){
                    console.log(err);
                }


            }








            if(localStorage.getItem('saturation_ammount')){

                try{
                    var obj = JSON.parse(localStorage.getItem('saturation_ammount'));

                    //console.info(obj.timestamp, datenow, (datenow - obj.timestamp)/1000);

                    if(obj.value && datenow - obj.timestamp < 1800000){
                        $('.preseter *[name=saturation_ammount]').val(obj.value);

                        var aux24 = 100-Number(obj.value);

                        var aux23 = '.translucent-con .translucent-canvas{ -webkit-filter: grayscale('+aux24+'%); -ms-filter: grayscale('+aux24+'%); -moz-filter: grayscale('+aux24+'%);  filter: grayscale('+aux24+'%); }';
                        //console.info('ceva',aux23);
                        _qcre_aux_css.html(_qcre_aux_css.html()+aux23);

                    }
                }catch(err){
                    console.log(err);
                }


            }







            if($.fn.slider){
                $( ".slider-ui" ).each(function(){
                    var _t = $(this);
                    //console.info(_t);

                    var min = 0;
                    var max = 100;
                    var val = 1;

                    if(_t.parent().hasClass('slider-ui-con')){

                        val = _t.parent().find('.slider-ui-target-field').eq(0).val();
                        if(_t.hasClass('slider-ui-for-blur')){
                            max = 30;
                        }
                    }

                    _t.slider({
                        min: min,
                        max: max,
                        value: val,
                        slide: function( event, ui ) {

                            if($(this).parent().hasClass('slider-ui-con')){
                                $(this).parent().find('.slider-ui-target-field').eq(0).val(ui.value);
                            }

                            var _t2 = $(this);
                            // console.info('_t2 - ',_t2);

                            if(_t2.attr('data-for')=='content_enviroment_opacity'){
                                $('*[name=content_link_to_menu_opacity]').prop('checked',false);
                            }
                        }
                    })
                })
            }

        } else {
            // Sorry! No Web Storage support..
        }



        var _c = $('.preseter .the-content');
        //console.info(_c, _c[0]);





        // TODO: if no scroller con..
        // if (_c[0] && _c[0].addEventListener){
        //     _c[0].addEventListener('DOMMouseScroll', handle_the_wheel, false);
        // }else{
        // }
        // _c[0].onmousewheel = handle_the_wheel;


    }











    window.farbtastic_reinit();


    $(document).undelegate(".picker-con .the-icon", "click");
    $(document).on("click", ".preseter-button--save,.preseter-button--default", handle_mouse);

    $(document).delegate(".picker-con .the-icon", "click", function(){
        // console.info("ceva");
        var _t = $(this);
        var _c = _t.parent().children('.picker');
        if(_c.css('display')=='none'){
            _c.fadeIn('fast');
        }else{
            _c.fadeOut('fast');
        }
    });
    $(document).delegate(".picker-con .picker .farbastic-close-btn", "click", function(){
        var _t = $(this);
        var _c = _t.parent();
        if(_c.css('display')=='none'){
            _c.fadeIn('fast');
        }else{
            _c.fadeOut('fast');
        }
    });
})
















/**
 * Farbtastic Color Picker 1.2
 */
jQuery.fn.farbtastic = function (callback) {
    jQuery.farbtastic(this, callback);
    return this;
};

jQuery.farbtastic = function (container, callback) {
    var container = jQuery(container).get(0);
    return container.farbtastic || (container.farbtastic = new jQuery._farbtastic(container, callback));
}

jQuery._farbtastic = function (container, callback) {
    var $ = jQuery.noConflict();
    // Store farbtastic object
    var fb = this;

    // Insert markup
    var aux23 = '<div class="farbtastic"><div class="color"></div><div class="wheel"></div><div class="overlay"></div><div class="h-marker marker"></div><div class="sl-marker marker"></div></div>';

    aux23+='<div class="farbastic-close-btn"><i class="fa fa-times-circle"></i></div>';
    aux23+='<input type="text" class="farbastic-demo-input"/><br><br>';

    $(container).html(aux23);
    var e = $('.farbtastic', container);
    fb.wheel = $('.wheel', container).get(0);
    // Dimensions
    fb.radius = 69;
    fb.square = 80;
    fb.width = 160;

    // Fix background PNGs in IE6
    if (navigator.appVersion.match(/MSIE [0-6]\./)) {
        $('*', e).each(function () {
            if (this.currentStyle.backgroundImage != 'none') {
                var image = this.currentStyle.backgroundImage;
                image = this.currentStyle.backgroundImage.substring(5, image.length - 2);
                $(this).css({
                    'backgroundImage': 'none',
                    'filter': "progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled=true, sizingMethod=crop, src='" + image + "')"
                });
            }
        });
    }

    /**
     * Link to the given element(s) or callback.
     */
    fb.linkTo = function (callback) {
        // Unbind previous nodes
        if (typeof fb.callback == 'object') {
            $(fb.callback).unbind('keyup', fb.updateValue);
        }

        // Reset color
        fb.color = null;

        // Bind callback or elements
        if (typeof callback == 'function') {
            fb.callback = callback;
        }
        else if (typeof callback == 'object' || typeof callback == 'string') {
            fb.callback = $(callback);
            fb.callback.bind('keyup', fb.updateValue);
            if (fb.callback.get(0).value) {
                fb.setColor(fb.callback.get(0).value);
            }
        }
        return this;
    }
    fb.updateValue = function (event) {
        if (this.value && this.value != fb.color) {
            fb.setColor(this.value);

            // console.info(fb);
        }
    }

    /**
     * Change color with HTML syntax #123456
     */
    fb.setColor = function (color) {
        var unpack = fb.unpack(color);
        if (fb.color != color && unpack) {
            fb.color = color;
            fb.rgb = unpack;
            fb.hsl = fb.RGBToHSL(fb.rgb);
            fb.updateDisplay();
        }
        return this;
    }

    /**
     * Change color with HSL triplet [0..1, 0..1, 0..1]
     */
    fb.setHSL = function (hsl) {
        fb.hsl = hsl;
        fb.rgb = fb.HSLToRGB(hsl);
        fb.color = fb.pack(fb.rgb);
        fb.updateDisplay();
        return this;
    }

    /////////////////////////////////////////////////////

    /**
     * Retrieve the coordinates of the given event relative to the center
     * of the widget.
     */
    fb.widgetCoords = function (event) {
        var x, y;
        var el = event.target || event.srcElement;
        var reference = fb.wheel;

        if (typeof event.offsetX != 'undefined') {
            // Use offset coordinates and find common offsetParent
            var pos = { x: event.offsetX, y: event.offsetY };

            // Send the coordinates upwards through the offsetParent chain.
            var e = el;
            while (e) {
                e.mouseX = pos.x;
                e.mouseY = pos.y;
                pos.x += e.offsetLeft;
                pos.y += e.offsetTop;
                e = e.offsetParent;
            }

            // Look for the coordinates starting from the wheel widget.
            var e = reference;
            var offset = { x: 0, y: 0 }
            while (e) {
                if (typeof e.mouseX != 'undefined') {
                    x = e.mouseX - offset.x;
                    y = e.mouseY - offset.y;
                    break;
                }
                offset.x += e.offsetLeft;
                offset.y += e.offsetTop;
                e = e.offsetParent;
            }

            // Reset stored coordinates
            e = el;
            while (e) {
                e.mouseX = undefined;
                e.mouseY = undefined;
                e = e.offsetParent;
            }
        }
        else {
            // Use absolute coordinates
            var pos = fb.absolutePosition(reference);
            x = (event.pageX || 0*(event.clientX + $('html').get(0).scrollLeft)) - pos.x;
            y = (event.pageY || 0*(event.clientY + $('html').get(0).scrollTop)) - pos.y;
//        console.info(x, y);
        }
        // Subtract distance to middle
        return { x: x - fb.width / 2, y: y - fb.width / 2 };
    }

    /**
     * Mousedown handler
     */
    fb.mousedown = function (event) {
        // Capture mouse
        if (!document.dragging) {
            $(document).bind('mousemove', fb.mousemove).bind('mouseup', fb.mouseup);
            document.dragging = true;
        }

        // Check which area is being dragged
        var pos = fb.widgetCoords(event);
        fb.circleDrag = Math.max(Math.abs(pos.x), Math.abs(pos.y)) * 2 > fb.square;

        // Process
        fb.mousemove(event);
        return false;
    }

    /**
     * Mousemove handler
     */
    fb.mousemove = function (event) {
        // Get coordinates relative to color picker center
        var pos = fb.widgetCoords(event);

        // Set new HSL parameters
        if (fb.circleDrag) {
            var hue = Math.atan2(pos.x, -pos.y) / 6.28;
            if (hue < 0) hue += 1;
            fb.setHSL([hue, fb.hsl[1], fb.hsl[2]]);
        }
        else {
            var sat = Math.max(0, Math.min(1, -(pos.x / fb.square) + .5));
            var lum = Math.max(0, Math.min(1, -(pos.y / fb.square) + .5));
            fb.setHSL([fb.hsl[0], sat, lum]);
        }
        return false;
    }

    /**
     * Mouseup handler
     */
    fb.mouseup = function () {
        // Uncapture mouse
        $(document).unbind('mousemove', fb.mousemove);
        $(document).unbind('mouseup', fb.mouseup);
        document.dragging = false;
    }

    /**
     * Update the markers and styles
     */
    fb.updateDisplay = function () {
        // Markers
        var angle = fb.hsl[0] * 6.28;
        $('.h-marker', e).css({
            left: Math.round(Math.sin(angle) * fb.radius + fb.width / 2) + 'px',
            top: Math.round(-Math.cos(angle) * fb.radius + fb.width / 2) + 'px'
        });

        $('.sl-marker', e).css({
            left: Math.round(fb.square * (.5 - fb.hsl[1]) + fb.width / 2) + 'px',
            top: Math.round(fb.square * (.5 - fb.hsl[2]) + fb.width / 2) + 'px'
        });

        // Saturation/Luminance gradient
        $('.color', e).css('backgroundColor', fb.pack(fb.HSLToRGB([fb.hsl[0], 1, 0.5])));

        // console.info(fb);
        // Linked elements or callback
        if (typeof fb.callback == 'object') {
            // Set background/foreground color
            //  console.info(fb);

            var _con = null;
            if(jQuery(fb.wheel).parent().parent().hasClass('picker')){
                _con = jQuery(fb.wheel).parent().parent();

            }
            // console.info('_con - ',_con);
            if(_con){
                _con.find('.farbastic-demo-input').val(fb.color);

                if(_con.prev().hasClass('accepts-color')){
                    _con.prev().css({
                        'background-color':fb.color
                    })
                }
            }
            $(fb.callback).css({
                backgroundColor: fb.color,
                color: fb.hsl[2] > 0.5 ? '#000' : '#fff'
            });
            $(fb.callback).trigger('change');

            // Change linked value
            $(fb.callback).each(function() {
                if (this.value != fb.color) {
                    this.value = fb.color;
//            console.info(this, fb.color, this.value);
                }
            });
        }
        else if (typeof fb.callback == 'function') {
            fb.callback.call(fb, fb.color);
        }
    }

    /**
     * Get absolute position of element
     */
    fb.absolutePosition = function (el) {
        var r = { x: el.offsetLeft, y: el.offsetTop };
        // Resolve relative to offsetParent
        if (el.offsetParent) {
            var tmp = fb.absolutePosition(el.offsetParent);
            r.x += tmp.x;
            r.y += tmp.y;
        }
        return r;
    };

    /* Various color utility functions */
    fb.pack = function (rgb) {
        var r = Math.round(rgb[0] * 255);
        var g = Math.round(rgb[1] * 255);
        var b = Math.round(rgb[2] * 255);
        return '#' + (r < 16 ? '0' : '') + r.toString(16) +
            (g < 16 ? '0' : '') + g.toString(16) +
            (b < 16 ? '0' : '') + b.toString(16);
    }

    fb.unpack = function (color) {
        if (color.length == 7) {
            return [parseInt('0x' + color.substring(1, 3)) / 255,
                parseInt('0x' + color.substring(3, 5)) / 255,
                parseInt('0x' + color.substring(5, 7)) / 255];
        }
        else if (color.length == 4) {
            return [parseInt('0x' + color.substring(1, 2)) / 15,
                parseInt('0x' + color.substring(2, 3)) / 15,
                parseInt('0x' + color.substring(3, 4)) / 15];
        }
    }

    fb.HSLToRGB = function (hsl) {
        var m1, m2, r, g, b;
        var h = hsl[0], s = hsl[1], l = hsl[2];
        m2 = (l <= 0.5) ? l * (s + 1) : l + s - l*s;
        m1 = l * 2 - m2;
        return [this.hueToRGB(m1, m2, h+0.33333),
            this.hueToRGB(m1, m2, h),
            this.hueToRGB(m1, m2, h-0.33333)];
    }

    fb.hueToRGB = function (m1, m2, h) {
        h = (h < 0) ? h + 1 : ((h > 1) ? h - 1 : h);
        if (h * 6 < 1) return m1 + (m2 - m1) * h * 6;
        if (h * 2 < 1) return m2;
        if (h * 3 < 2) return m1 + (m2 - m1) * (0.66666 - h) * 6;
        return m1;
    }

    fb.RGBToHSL = function (rgb) {
        var min, max, delta, h, s, l;
        var r = rgb[0], g = rgb[1], b = rgb[2];
        min = Math.min(r, Math.min(g, b));
        max = Math.max(r, Math.max(g, b));
        delta = max - min;
        l = (min + max) / 2;
        s = 0;
        if (l > 0 && l < 1) {
            s = delta / (l < 0.5 ? (2 * l) : (2 - 2 * l));
        }
        h = 0;
        if (delta > 0) {
            if (max == r && max != g) h += (g - b) / delta;
            if (max == g && max != b) h += (2 + (b - r) / delta);
            if (max == b && max != r) h += (4 + (r - g) / delta);
            h /= 6;
        }
        return [h, s, l];
    }


    // Install mousedown handler (the others are set on the document on-demand)
    $('*', e).mousedown(fb.mousedown);

    // Init color
    fb.setColor('#000000');

    // Set linked elements/callback
    if (callback) {
        fb.linkTo(callback);
    }
}

window.farbtastic_reinit = function(){
    jQuery('.with-colorpicker').each(function(){
        var _t = jQuery(this);
        if(_t.hasClass('treated')){
            return;
        }
        if(jQuery.fn.farbtastic){
            _t.next().find('.picker').farbtastic(_t);

        }
        _t.addClass('treated');
    });
}
;












/*! jQuery UI - v1.11.4 - 2015-08-09
* http://jqueryui.com
* Includes: core.js, widget.js, mouse.js, position.js, slider.js
* Copyright 2015 jQuery Foundation and other contributors; Licensed MIT */

(function(e){"function"==typeof define&&define.amd?define(["jquery"],e):e(jQuery)})(function(e){function t(t,s){var n,a,o,r=t.nodeName.toLowerCase();return"area"===r?(n=t.parentNode,a=n.name,t.href&&a&&"map"===n.nodeName.toLowerCase()?(o=e("img[usemap='#"+a+"']")[0],!!o&&i(o)):!1):(/^(input|select|textarea|button|object)$/.test(r)?!t.disabled:"a"===r?t.href||s:s)&&i(t)}function i(t){return e.expr.filters.visible(t)&&!e(t).parents().addBack().filter(function(){return"hidden"===e.css(this,"visibility")}).length}e.ui=e.ui||{},e.extend(e.ui,{version:"1.11.4",keyCode:{BACKSPACE:8,COMMA:188,DELETE:46,DOWN:40,END:35,ENTER:13,ESCAPE:27,HOME:36,LEFT:37,PAGE_DOWN:34,PAGE_UP:33,PERIOD:190,RIGHT:39,SPACE:32,TAB:9,UP:38}}),e.fn.extend({scrollParent:function(t){var i=this.css("position"),s="absolute"===i,n=t?/(auto|scroll|hidden)/:/(auto|scroll)/,a=this.parents().filter(function(){var t=e(this);return s&&"static"===t.css("position")?!1:n.test(t.css("overflow")+t.css("overflow-y")+t.css("overflow-x"))}).eq(0);return"fixed"!==i&&a.length?a:e(this[0].ownerDocument||document)},uniqueId:function(){var e=0;return function(){return this.each(function(){this.id||(this.id="ui-id-"+ ++e)})}}(),removeUniqueId:function(){return this.each(function(){/^ui-id-\d+$/.test(this.id)&&e(this).removeAttr("id")})}}),e.extend(e.expr[":"],{data:e.expr.createPseudo?e.expr.createPseudo(function(t){return function(i){return!!e.data(i,t)}}):function(t,i,s){return!!e.data(t,s[3])},focusable:function(i){return t(i,!isNaN(e.attr(i,"tabindex")))},tabbable:function(i){var s=e.attr(i,"tabindex"),n=isNaN(s);return(n||s>=0)&&t(i,!n)}}),e("<a>").outerWidth(1).jquery||e.each(["Width","Height"],function(t,i){function s(t,i,s,a){return e.each(n,function(){i-=parseFloat(e.css(t,"padding"+this))||0,s&&(i-=parseFloat(e.css(t,"border"+this+"Width"))||0),a&&(i-=parseFloat(e.css(t,"margin"+this))||0)}),i}var n="Width"===i?["Left","Right"]:["Top","Bottom"],a=i.toLowerCase(),o={innerWidth:e.fn.innerWidth,innerHeight:e.fn.innerHeight,outerWidth:e.fn.outerWidth,outerHeight:e.fn.outerHeight};e.fn["inner"+i]=function(t){return void 0===t?o["inner"+i].call(this):this.each(function(){e(this).css(a,s(this,t)+"px")})},e.fn["outer"+i]=function(t,n){return"number"!=typeof t?o["outer"+i].call(this,t):this.each(function(){e(this).css(a,s(this,t,!0,n)+"px")})}}),e.fn.addBack||(e.fn.addBack=function(e){return this.add(null==e?this.prevObject:this.prevObject.filter(e))}),e("<a>").data("a-b","a").removeData("a-b").data("a-b")&&(e.fn.removeData=function(t){return function(i){return arguments.length?t.call(this,e.camelCase(i)):t.call(this)}}(e.fn.removeData)),e.ui.ie=!!/msie [\w.]+/.exec(navigator.userAgent.toLowerCase()),e.fn.extend({focus:function(t){return function(i,s){return"number"==typeof i?this.each(function(){var t=this;setTimeout(function(){e(t).focus(),s&&s.call(t)},i)}):t.apply(this,arguments)}}(e.fn.focus),disableSelection:function(){var e="onselectstart"in document.createElement("div")?"selectstart":"mousedown";return function(){return this.bind(e+".ui-disableSelection",function(e){e.preventDefault()})}}(),enableSelection:function(){return this.unbind(".ui-disableSelection")},zIndex:function(t){if(void 0!==t)return this.css("zIndex",t);if(this.length)for(var i,s,n=e(this[0]);n.length&&n[0]!==document;){if(i=n.css("position"),("absolute"===i||"relative"===i||"fixed"===i)&&(s=parseInt(n.css("zIndex"),10),!isNaN(s)&&0!==s))return s;n=n.parent()}return 0}}),e.ui.plugin={add:function(t,i,s){var n,a=e.ui[t].prototype;for(n in s)a.plugins[n]=a.plugins[n]||[],a.plugins[n].push([i,s[n]])},call:function(e,t,i,s){var n,a=e.plugins[t];if(a&&(s||e.element[0].parentNode&&11!==e.element[0].parentNode.nodeType))for(n=0;a.length>n;n++)e.options[a[n][0]]&&a[n][1].apply(e.element,i)}};var s=0,n=Array.prototype.slice;e.cleanData=function(t){return function(i){var s,n,a;for(a=0;null!=(n=i[a]);a++)try{s=e._data(n,"events"),s&&s.remove&&e(n).triggerHandler("remove")}catch(o){}t(i)}}(e.cleanData),e.widget=function(t,i,s){var n,a,o,r,h={},l=t.split(".")[0];return t=t.split(".")[1],n=l+"-"+t,s||(s=i,i=e.Widget),e.expr[":"][n.toLowerCase()]=function(t){return!!e.data(t,n)},e[l]=e[l]||{},a=e[l][t],o=e[l][t]=function(e,t){return this._createWidget?(arguments.length&&this._createWidget(e,t),void 0):new o(e,t)},e.extend(o,a,{version:s.version,_proto:e.extend({},s),_childConstructors:[]}),r=new i,r.options=e.widget.extend({},r.options),e.each(s,function(t,s){return e.isFunction(s)?(h[t]=function(){var e=function(){return i.prototype[t].apply(this,arguments)},n=function(e){return i.prototype[t].apply(this,e)};return function(){var t,i=this._super,a=this._superApply;return this._super=e,this._superApply=n,t=s.apply(this,arguments),this._super=i,this._superApply=a,t}}(),void 0):(h[t]=s,void 0)}),o.prototype=e.widget.extend(r,{widgetEventPrefix:a?r.widgetEventPrefix||t:t},h,{constructor:o,namespace:l,widgetName:t,widgetFullName:n}),a?(e.each(a._childConstructors,function(t,i){var s=i.prototype;e.widget(s.namespace+"."+s.widgetName,o,i._proto)}),delete a._childConstructors):i._childConstructors.push(o),e.widget.bridge(t,o),o},e.widget.extend=function(t){for(var i,s,a=n.call(arguments,1),o=0,r=a.length;r>o;o++)for(i in a[o])s=a[o][i],a[o].hasOwnProperty(i)&&void 0!==s&&(t[i]=e.isPlainObject(s)?e.isPlainObject(t[i])?e.widget.extend({},t[i],s):e.widget.extend({},s):s);return t},e.widget.bridge=function(t,i){var s=i.prototype.widgetFullName||t;e.fn[t]=function(a){var o="string"==typeof a,r=n.call(arguments,1),h=this;return o?this.each(function(){var i,n=e.data(this,s);return"instance"===a?(h=n,!1):n?e.isFunction(n[a])&&"_"!==a.charAt(0)?(i=n[a].apply(n,r),i!==n&&void 0!==i?(h=i&&i.jquery?h.pushStack(i.get()):i,!1):void 0):e.error("no such method '"+a+"' for "+t+" widget instance"):e.error("cannot call methods on "+t+" prior to initialization; "+"attempted to call method '"+a+"'")}):(r.length&&(a=e.widget.extend.apply(null,[a].concat(r))),this.each(function(){var t=e.data(this,s);t?(t.option(a||{}),t._init&&t._init()):e.data(this,s,new i(a,this))})),h}},e.Widget=function(){},e.Widget._childConstructors=[],e.Widget.prototype={widgetName:"widget",widgetEventPrefix:"",defaultElement:"<div>",options:{disabled:!1,create:null},_createWidget:function(t,i){i=e(i||this.defaultElement||this)[0],this.element=e(i),this.uuid=s++,this.eventNamespace="."+this.widgetName+this.uuid,this.bindings=e(),this.hoverable=e(),this.focusable=e(),i!==this&&(e.data(i,this.widgetFullName,this),this._on(!0,this.element,{remove:function(e){e.target===i&&this.destroy()}}),this.document=e(i.style?i.ownerDocument:i.document||i),this.window=e(this.document[0].defaultView||this.document[0].parentWindow)),this.options=e.widget.extend({},this.options,this._getCreateOptions(),t),this._create(),this._trigger("create",null,this._getCreateEventData()),this._init()},_getCreateOptions:e.noop,_getCreateEventData:e.noop,_create:e.noop,_init:e.noop,destroy:function(){this._destroy(),this.element.unbind(this.eventNamespace).removeData(this.widgetFullName).removeData(e.camelCase(this.widgetFullName)),this.widget().unbind(this.eventNamespace).removeAttr("aria-disabled").removeClass(this.widgetFullName+"-disabled "+"ui-state-disabled"),this.bindings.unbind(this.eventNamespace),this.hoverable.removeClass("ui-state-hover"),this.focusable.removeClass("ui-state-focus")},_destroy:e.noop,widget:function(){return this.element},option:function(t,i){var s,n,a,o=t;if(0===arguments.length)return e.widget.extend({},this.options);if("string"==typeof t)if(o={},s=t.split("."),t=s.shift(),s.length){for(n=o[t]=e.widget.extend({},this.options[t]),a=0;s.length-1>a;a++)n[s[a]]=n[s[a]]||{},n=n[s[a]];if(t=s.pop(),1===arguments.length)return void 0===n[t]?null:n[t];n[t]=i}else{if(1===arguments.length)return void 0===this.options[t]?null:this.options[t];o[t]=i}return this._setOptions(o),this},_setOptions:function(e){var t;for(t in e)this._setOption(t,e[t]);return this},_setOption:function(e,t){return this.options[e]=t,"disabled"===e&&(this.widget().toggleClass(this.widgetFullName+"-disabled",!!t),t&&(this.hoverable.removeClass("ui-state-hover"),this.focusable.removeClass("ui-state-focus"))),this},enable:function(){return this._setOptions({disabled:!1})},disable:function(){return this._setOptions({disabled:!0})},_on:function(t,i,s){var n,a=this;"boolean"!=typeof t&&(s=i,i=t,t=!1),s?(i=n=e(i),this.bindings=this.bindings.add(i)):(s=i,i=this.element,n=this.widget()),e.each(s,function(s,o){function r(){return t||a.options.disabled!==!0&&!e(this).hasClass("ui-state-disabled")?("string"==typeof o?a[o]:o).apply(a,arguments):void 0}"string"!=typeof o&&(r.guid=o.guid=o.guid||r.guid||e.guid++);var h=s.match(/^([\w:-]*)\s*(.*)$/),l=h[1]+a.eventNamespace,u=h[2];u?n.delegate(u,l,r):i.bind(l,r)})},_off:function(t,i){i=(i||"").split(" ").join(this.eventNamespace+" ")+this.eventNamespace,t.unbind(i).undelegate(i),this.bindings=e(this.bindings.not(t).get()),this.focusable=e(this.focusable.not(t).get()),this.hoverable=e(this.hoverable.not(t).get())},_delay:function(e,t){function i(){return("string"==typeof e?s[e]:e).apply(s,arguments)}var s=this;return setTimeout(i,t||0)},_hoverable:function(t){this.hoverable=this.hoverable.add(t),this._on(t,{mouseenter:function(t){e(t.currentTarget).addClass("ui-state-hover")},mouseleave:function(t){e(t.currentTarget).removeClass("ui-state-hover")}})},_focusable:function(t){this.focusable=this.focusable.add(t),this._on(t,{focusin:function(t){e(t.currentTarget).addClass("ui-state-focus")},focusout:function(t){e(t.currentTarget).removeClass("ui-state-focus")}})},_trigger:function(t,i,s){var n,a,o=this.options[t];if(s=s||{},i=e.Event(i),i.type=(t===this.widgetEventPrefix?t:this.widgetEventPrefix+t).toLowerCase(),i.target=this.element[0],a=i.originalEvent)for(n in a)n in i||(i[n]=a[n]);return this.element.trigger(i,s),!(e.isFunction(o)&&o.apply(this.element[0],[i].concat(s))===!1||i.isDefaultPrevented())}},e.each({show:"fadeIn",hide:"fadeOut"},function(t,i){e.Widget.prototype["_"+t]=function(s,n,a){"string"==typeof n&&(n={effect:n});var o,r=n?n===!0||"number"==typeof n?i:n.effect||i:t;n=n||{},"number"==typeof n&&(n={duration:n}),o=!e.isEmptyObject(n),n.complete=a,n.delay&&s.delay(n.delay),o&&e.effects&&e.effects.effect[r]?s[t](n):r!==t&&s[r]?s[r](n.duration,n.easing,a):s.queue(function(i){e(this)[t](),a&&a.call(s[0]),i()})}}),e.widget;var a=!1;e(document).mouseup(function(){a=!1}),e.widget("ui.mouse",{version:"1.11.4",options:{cancel:"input,textarea,button,select,option",distance:1,delay:0},_mouseInit:function(){var t=this;this.element.bind("mousedown."+this.widgetName,function(e){return t._mouseDown(e)}).bind("click."+this.widgetName,function(i){return!0===e.data(i.target,t.widgetName+".preventClickEvent")?(e.removeData(i.target,t.widgetName+".preventClickEvent"),i.stopImmediatePropagation(),!1):void 0}),this.started=!1},_mouseDestroy:function(){this.element.unbind("."+this.widgetName),this._mouseMoveDelegate&&this.document.unbind("mousemove."+this.widgetName,this._mouseMoveDelegate).unbind("mouseup."+this.widgetName,this._mouseUpDelegate)},_mouseDown:function(t){if(!a){this._mouseMoved=!1,this._mouseStarted&&this._mouseUp(t),this._mouseDownEvent=t;var i=this,s=1===t.which,n="string"==typeof this.options.cancel&&t.target.nodeName?e(t.target).closest(this.options.cancel).length:!1;return s&&!n&&this._mouseCapture(t)?(this.mouseDelayMet=!this.options.delay,this.mouseDelayMet||(this._mouseDelayTimer=setTimeout(function(){i.mouseDelayMet=!0},this.options.delay)),this._mouseDistanceMet(t)&&this._mouseDelayMet(t)&&(this._mouseStarted=this._mouseStart(t)!==!1,!this._mouseStarted)?(t.preventDefault(),!0):(!0===e.data(t.target,this.widgetName+".preventClickEvent")&&e.removeData(t.target,this.widgetName+".preventClickEvent"),this._mouseMoveDelegate=function(e){return i._mouseMove(e)},this._mouseUpDelegate=function(e){return i._mouseUp(e)},this.document.bind("mousemove."+this.widgetName,this._mouseMoveDelegate).bind("mouseup."+this.widgetName,this._mouseUpDelegate),t.preventDefault(),a=!0,!0)):!0}},_mouseMove:function(t){if(this._mouseMoved){if(e.ui.ie&&(!document.documentMode||9>document.documentMode)&&!t.button)return this._mouseUp(t);if(!t.which)return this._mouseUp(t)}return(t.which||t.button)&&(this._mouseMoved=!0),this._mouseStarted?(this._mouseDrag(t),t.preventDefault()):(this._mouseDistanceMet(t)&&this._mouseDelayMet(t)&&(this._mouseStarted=this._mouseStart(this._mouseDownEvent,t)!==!1,this._mouseStarted?this._mouseDrag(t):this._mouseUp(t)),!this._mouseStarted)},_mouseUp:function(t){return this.document.unbind("mousemove."+this.widgetName,this._mouseMoveDelegate).unbind("mouseup."+this.widgetName,this._mouseUpDelegate),this._mouseStarted&&(this._mouseStarted=!1,t.target===this._mouseDownEvent.target&&e.data(t.target,this.widgetName+".preventClickEvent",!0),this._mouseStop(t)),a=!1,!1},_mouseDistanceMet:function(e){return Math.max(Math.abs(this._mouseDownEvent.pageX-e.pageX),Math.abs(this._mouseDownEvent.pageY-e.pageY))>=this.options.distance},_mouseDelayMet:function(){return this.mouseDelayMet},_mouseStart:function(){},_mouseDrag:function(){},_mouseStop:function(){},_mouseCapture:function(){return!0}}),function(){function t(e,t,i){return[parseFloat(e[0])*(p.test(e[0])?t/100:1),parseFloat(e[1])*(p.test(e[1])?i/100:1)]}function i(t,i){return parseInt(e.css(t,i),10)||0}function s(t){var i=t[0];return 9===i.nodeType?{width:t.width(),height:t.height(),offset:{top:0,left:0}}:e.isWindow(i)?{width:t.width(),height:t.height(),offset:{top:t.scrollTop(),left:t.scrollLeft()}}:i.preventDefault?{width:0,height:0,offset:{top:i.pageY,left:i.pageX}}:{width:t.outerWidth(),height:t.outerHeight(),offset:t.offset()}}e.ui=e.ui||{};var n,a,o=Math.max,r=Math.abs,h=Math.round,l=/left|center|right/,u=/top|center|bottom/,d=/[\+\-]\d+(\.[\d]+)?%?/,c=/^\w+/,p=/%$/,f=e.fn.position;e.position={scrollbarWidth:function(){if(void 0!==n)return n;var t,i,s=e("<div style='display:block;position:absolute;width:50px;height:50px;overflow:hidden;'><div style='height:100px;width:auto;'></div></div>"),a=s.children()[0];return e("body").append(s),t=a.offsetWidth,s.css("overflow","scroll"),i=a.offsetWidth,t===i&&(i=s[0].clientWidth),s.remove(),n=t-i},getScrollInfo:function(t){var i=t.isWindow||t.isDocument?"":t.element.css("overflow-x"),s=t.isWindow||t.isDocument?"":t.element.css("overflow-y"),n="scroll"===i||"auto"===i&&t.width<t.element[0].scrollWidth,a="scroll"===s||"auto"===s&&t.height<t.element[0].scrollHeight;return{width:a?e.position.scrollbarWidth():0,height:n?e.position.scrollbarWidth():0}},getWithinInfo:function(t){var i=e(t||window),s=e.isWindow(i[0]),n=!!i[0]&&9===i[0].nodeType;return{element:i,isWindow:s,isDocument:n,offset:i.offset()||{left:0,top:0},scrollLeft:i.scrollLeft(),scrollTop:i.scrollTop(),width:s||n?i.width():i.outerWidth(),height:s||n?i.height():i.outerHeight()}}},e.fn.position=function(n){if(!n||!n.of)return f.apply(this,arguments);n=e.extend({},n);var p,m,g,v,y,b,_=e(n.of),x=e.position.getWithinInfo(n.within),w=e.position.getScrollInfo(x),k=(n.collision||"flip").split(" "),T={};return b=s(_),_[0].preventDefault&&(n.at="left top"),m=b.width,g=b.height,v=b.offset,y=e.extend({},v),e.each(["my","at"],function(){var e,t,i=(n[this]||"").split(" ");1===i.length&&(i=l.test(i[0])?i.concat(["center"]):u.test(i[0])?["center"].concat(i):["center","center"]),i[0]=l.test(i[0])?i[0]:"center",i[1]=u.test(i[1])?i[1]:"center",e=d.exec(i[0]),t=d.exec(i[1]),T[this]=[e?e[0]:0,t?t[0]:0],n[this]=[c.exec(i[0])[0],c.exec(i[1])[0]]}),1===k.length&&(k[1]=k[0]),"right"===n.at[0]?y.left+=m:"center"===n.at[0]&&(y.left+=m/2),"bottom"===n.at[1]?y.top+=g:"center"===n.at[1]&&(y.top+=g/2),p=t(T.at,m,g),y.left+=p[0],y.top+=p[1],this.each(function(){var s,l,u=e(this),d=u.outerWidth(),c=u.outerHeight(),f=i(this,"marginLeft"),b=i(this,"marginTop"),D=d+f+i(this,"marginRight")+w.width,S=c+b+i(this,"marginBottom")+w.height,N=e.extend({},y),M=t(T.my,u.outerWidth(),u.outerHeight());"right"===n.my[0]?N.left-=d:"center"===n.my[0]&&(N.left-=d/2),"bottom"===n.my[1]?N.top-=c:"center"===n.my[1]&&(N.top-=c/2),N.left+=M[0],N.top+=M[1],a||(N.left=h(N.left),N.top=h(N.top)),s={marginLeft:f,marginTop:b},e.each(["left","top"],function(t,i){e.ui.position[k[t]]&&e.ui.position[k[t]][i](N,{targetWidth:m,targetHeight:g,elemWidth:d,elemHeight:c,collisionPosition:s,collisionWidth:D,collisionHeight:S,offset:[p[0]+M[0],p[1]+M[1]],my:n.my,at:n.at,within:x,elem:u})}),n.using&&(l=function(e){var t=v.left-N.left,i=t+m-d,s=v.top-N.top,a=s+g-c,h={target:{element:_,left:v.left,top:v.top,width:m,height:g},element:{element:u,left:N.left,top:N.top,width:d,height:c},horizontal:0>i?"left":t>0?"right":"center",vertical:0>a?"top":s>0?"bottom":"middle"};d>m&&m>r(t+i)&&(h.horizontal="center"),c>g&&g>r(s+a)&&(h.vertical="middle"),h.important=o(r(t),r(i))>o(r(s),r(a))?"horizontal":"vertical",n.using.call(this,e,h)}),u.offset(e.extend(N,{using:l}))})},e.ui.position={fit:{left:function(e,t){var i,s=t.within,n=s.isWindow?s.scrollLeft:s.offset.left,a=s.width,r=e.left-t.collisionPosition.marginLeft,h=n-r,l=r+t.collisionWidth-a-n;t.collisionWidth>a?h>0&&0>=l?(i=e.left+h+t.collisionWidth-a-n,e.left+=h-i):e.left=l>0&&0>=h?n:h>l?n+a-t.collisionWidth:n:h>0?e.left+=h:l>0?e.left-=l:e.left=o(e.left-r,e.left)},top:function(e,t){var i,s=t.within,n=s.isWindow?s.scrollTop:s.offset.top,a=t.within.height,r=e.top-t.collisionPosition.marginTop,h=n-r,l=r+t.collisionHeight-a-n;t.collisionHeight>a?h>0&&0>=l?(i=e.top+h+t.collisionHeight-a-n,e.top+=h-i):e.top=l>0&&0>=h?n:h>l?n+a-t.collisionHeight:n:h>0?e.top+=h:l>0?e.top-=l:e.top=o(e.top-r,e.top)}},flip:{left:function(e,t){var i,s,n=t.within,a=n.offset.left+n.scrollLeft,o=n.width,h=n.isWindow?n.scrollLeft:n.offset.left,l=e.left-t.collisionPosition.marginLeft,u=l-h,d=l+t.collisionWidth-o-h,c="left"===t.my[0]?-t.elemWidth:"right"===t.my[0]?t.elemWidth:0,p="left"===t.at[0]?t.targetWidth:"right"===t.at[0]?-t.targetWidth:0,f=-2*t.offset[0];0>u?(i=e.left+c+p+f+t.collisionWidth-o-a,(0>i||r(u)>i)&&(e.left+=c+p+f)):d>0&&(s=e.left-t.collisionPosition.marginLeft+c+p+f-h,(s>0||d>r(s))&&(e.left+=c+p+f))},top:function(e,t){var i,s,n=t.within,a=n.offset.top+n.scrollTop,o=n.height,h=n.isWindow?n.scrollTop:n.offset.top,l=e.top-t.collisionPosition.marginTop,u=l-h,d=l+t.collisionHeight-o-h,c="top"===t.my[1],p=c?-t.elemHeight:"bottom"===t.my[1]?t.elemHeight:0,f="top"===t.at[1]?t.targetHeight:"bottom"===t.at[1]?-t.targetHeight:0,m=-2*t.offset[1];0>u?(s=e.top+p+f+m+t.collisionHeight-o-a,(0>s||r(u)>s)&&(e.top+=p+f+m)):d>0&&(i=e.top-t.collisionPosition.marginTop+p+f+m-h,(i>0||d>r(i))&&(e.top+=p+f+m))}},flipfit:{left:function(){e.ui.position.flip.left.apply(this,arguments),e.ui.position.fit.left.apply(this,arguments)},top:function(){e.ui.position.flip.top.apply(this,arguments),e.ui.position.fit.top.apply(this,arguments)}}},function(){var t,i,s,n,o,r=document.getElementsByTagName("body")[0],h=document.createElement("div");t=document.createElement(r?"div":"body"),s={visibility:"hidden",width:0,height:0,border:0,margin:0,background:"none"},r&&e.extend(s,{position:"absolute",left:"-1000px",top:"-1000px"});for(o in s)t.style[o]=s[o];t.appendChild(h),i=r||document.documentElement,i.insertBefore(t,i.firstChild),h.style.cssText="position: absolute; left: 10.7432222px;",n=e(h).offset().left,a=n>10&&11>n,t.innerHTML="",i.removeChild(t)}()}(),e.ui.position,e.widget("ui.slider",e.ui.mouse,{version:"1.11.4",widgetEventPrefix:"slide",options:{animate:!1,distance:0,max:100,min:0,orientation:"horizontal",range:!1,step:1,value:0,values:null,change:null,slide:null,start:null,stop:null},numPages:5,_create:function(){this._keySliding=!1,this._mouseSliding=!1,this._animateOff=!0,this._handleIndex=null,this._detectOrientation(),this._mouseInit(),this._calculateNewMax(),this.element.addClass("ui-slider ui-slider-"+this.orientation+" ui-widget"+" ui-widget-content"+" ui-corner-all"),this._refresh(),this._setOption("disabled",this.options.disabled),this._animateOff=!1},_refresh:function(){this._createRange(),this._createHandles(),this._setupEvents(),this._refreshValue()},_createHandles:function(){var t,i,s=this.options,n=this.element.find(".ui-slider-handle").addClass("ui-state-default ui-corner-all"),a="<span class='ui-slider-handle ui-state-default ui-corner-all' tabindex='0'></span>",o=[];for(i=s.values&&s.values.length||1,n.length>i&&(n.slice(i).remove(),n=n.slice(0,i)),t=n.length;i>t;t++)o.push(a);this.handles=n.add(e(o.join("")).appendTo(this.element)),this.handle=this.handles.eq(0),this.handles.each(function(t){e(this).data("ui-slider-handle-index",t)})},_createRange:function(){var t=this.options,i="";t.range?(t.range===!0&&(t.values?t.values.length&&2!==t.values.length?t.values=[t.values[0],t.values[0]]:e.isArray(t.values)&&(t.values=t.values.slice(0)):t.values=[this._valueMin(),this._valueMin()]),this.range&&this.range.length?this.range.removeClass("ui-slider-range-min ui-slider-range-max").css({left:"",bottom:""}):(this.range=e("<div></div>").appendTo(this.element),i="ui-slider-range ui-widget-header ui-corner-all"),this.range.addClass(i+("min"===t.range||"max"===t.range?" ui-slider-range-"+t.range:""))):(this.range&&this.range.remove(),this.range=null)},_setupEvents:function(){this._off(this.handles),this._on(this.handles,this._handleEvents),this._hoverable(this.handles),this._focusable(this.handles)},_destroy:function(){this.handles.remove(),this.range&&this.range.remove(),this.element.removeClass("ui-slider ui-slider-horizontal ui-slider-vertical ui-widget ui-widget-content ui-corner-all"),this._mouseDestroy()},_mouseCapture:function(t){var i,s,n,a,o,r,h,l,u=this,d=this.options;return d.disabled?!1:(this.elementSize={width:this.element.outerWidth(),height:this.element.outerHeight()},this.elementOffset=this.element.offset(),i={x:t.pageX,y:t.pageY},s=this._normValueFromMouse(i),n=this._valueMax()-this._valueMin()+1,this.handles.each(function(t){var i=Math.abs(s-u.values(t));(n>i||n===i&&(t===u._lastChangedValue||u.values(t)===d.min))&&(n=i,a=e(this),o=t)}),r=this._start(t,o),r===!1?!1:(this._mouseSliding=!0,this._handleIndex=o,a.addClass("ui-state-active").focus(),h=a.offset(),l=!e(t.target).parents().addBack().is(".ui-slider-handle"),this._clickOffset=l?{left:0,top:0}:{left:t.pageX-h.left-a.width()/2,top:t.pageY-h.top-a.height()/2-(parseInt(a.css("borderTopWidth"),10)||0)-(parseInt(a.css("borderBottomWidth"),10)||0)+(parseInt(a.css("marginTop"),10)||0)},this.handles.hasClass("ui-state-hover")||this._slide(t,o,s),this._animateOff=!0,!0))},_mouseStart:function(){return!0},_mouseDrag:function(e){var t={x:e.pageX,y:e.pageY},i=this._normValueFromMouse(t);return this._slide(e,this._handleIndex,i),!1},_mouseStop:function(e){return this.handles.removeClass("ui-state-active"),this._mouseSliding=!1,this._stop(e,this._handleIndex),this._change(e,this._handleIndex),this._handleIndex=null,this._clickOffset=null,this._animateOff=!1,!1},_detectOrientation:function(){this.orientation="vertical"===this.options.orientation?"vertical":"horizontal"},_normValueFromMouse:function(e){var t,i,s,n,a;return"horizontal"===this.orientation?(t=this.elementSize.width,i=e.x-this.elementOffset.left-(this._clickOffset?this._clickOffset.left:0)):(t=this.elementSize.height,i=e.y-this.elementOffset.top-(this._clickOffset?this._clickOffset.top:0)),s=i/t,s>1&&(s=1),0>s&&(s=0),"vertical"===this.orientation&&(s=1-s),n=this._valueMax()-this._valueMin(),a=this._valueMin()+s*n,this._trimAlignValue(a)},_start:function(e,t){var i={handle:this.handles[t],value:this.value()};return this.options.values&&this.options.values.length&&(i.value=this.values(t),i.values=this.values()),this._trigger("start",e,i)},_slide:function(e,t,i){var s,n,a;this.options.values&&this.options.values.length?(s=this.values(t?0:1),2===this.options.values.length&&this.options.range===!0&&(0===t&&i>s||1===t&&s>i)&&(i=s),i!==this.values(t)&&(n=this.values(),n[t]=i,a=this._trigger("slide",e,{handle:this.handles[t],value:i,values:n}),s=this.values(t?0:1),a!==!1&&this.values(t,i))):i!==this.value()&&(a=this._trigger("slide",e,{handle:this.handles[t],value:i}),a!==!1&&this.value(i))},_stop:function(e,t){var i={handle:this.handles[t],value:this.value()};this.options.values&&this.options.values.length&&(i.value=this.values(t),i.values=this.values()),this._trigger("stop",e,i)},_change:function(e,t){if(!this._keySliding&&!this._mouseSliding){var i={handle:this.handles[t],value:this.value()};this.options.values&&this.options.values.length&&(i.value=this.values(t),i.values=this.values()),this._lastChangedValue=t,this._trigger("change",e,i)}},value:function(e){return arguments.length?(this.options.value=this._trimAlignValue(e),this._refreshValue(),this._change(null,0),void 0):this._value()},values:function(t,i){var s,n,a;if(arguments.length>1)return this.options.values[t]=this._trimAlignValue(i),this._refreshValue(),this._change(null,t),void 0;if(!arguments.length)return this._values();if(!e.isArray(arguments[0]))return this.options.values&&this.options.values.length?this._values(t):this.value();for(s=this.options.values,n=arguments[0],a=0;s.length>a;a+=1)s[a]=this._trimAlignValue(n[a]),this._change(null,a);this._refreshValue()},_setOption:function(t,i){var s,n=0;switch("range"===t&&this.options.range===!0&&("min"===i?(this.options.value=this._values(0),this.options.values=null):"max"===i&&(this.options.value=this._values(this.options.values.length-1),this.options.values=null)),e.isArray(this.options.values)&&(n=this.options.values.length),"disabled"===t&&this.element.toggleClass("ui-state-disabled",!!i),this._super(t,i),t){case"orientation":this._detectOrientation(),this.element.removeClass("ui-slider-horizontal ui-slider-vertical").addClass("ui-slider-"+this.orientation),this._refreshValue(),this.handles.css("horizontal"===i?"bottom":"left","");break;case"value":this._animateOff=!0,this._refreshValue(),this._change(null,0),this._animateOff=!1;break;case"values":for(this._animateOff=!0,this._refreshValue(),s=0;n>s;s+=1)this._change(null,s);this._animateOff=!1;break;case"step":case"min":case"max":this._animateOff=!0,this._calculateNewMax(),this._refreshValue(),this._animateOff=!1;break;case"range":this._animateOff=!0,this._refresh(),this._animateOff=!1}},_value:function(){var e=this.options.value;return e=this._trimAlignValue(e)},_values:function(e){var t,i,s;if(arguments.length)return t=this.options.values[e],t=this._trimAlignValue(t);if(this.options.values&&this.options.values.length){for(i=this.options.values.slice(),s=0;i.length>s;s+=1)i[s]=this._trimAlignValue(i[s]);return i}return[]},_trimAlignValue:function(e){if(this._valueMin()>=e)return this._valueMin();if(e>=this._valueMax())return this._valueMax();var t=this.options.step>0?this.options.step:1,i=(e-this._valueMin())%t,s=e-i;return 2*Math.abs(i)>=t&&(s+=i>0?t:-t),parseFloat(s.toFixed(5))},_calculateNewMax:function(){var e=this.options.max,t=this._valueMin(),i=this.options.step,s=Math.floor(+(e-t).toFixed(this._precision())/i)*i;e=s+t,this.max=parseFloat(e.toFixed(this._precision()))},_precision:function(){var e=this._precisionOf(this.options.step);return null!==this.options.min&&(e=Math.max(e,this._precisionOf(this.options.min))),e},_precisionOf:function(e){var t=""+e,i=t.indexOf(".");return-1===i?0:t.length-i-1},_valueMin:function(){return this.options.min},_valueMax:function(){return this.max},_refreshValue:function(){var t,i,s,n,a,o=this.options.range,r=this.options,h=this,l=this._animateOff?!1:r.animate,u={};this.options.values&&this.options.values.length?this.handles.each(function(s){i=100*((h.values(s)-h._valueMin())/(h._valueMax()-h._valueMin())),u["horizontal"===h.orientation?"left":"bottom"]=i+"%",e(this).stop(1,1)[l?"animate":"css"](u,r.animate),h.options.range===!0&&("horizontal"===h.orientation?(0===s&&h.range.stop(1,1)[l?"animate":"css"]({left:i+"%"},r.animate),1===s&&h.range[l?"animate":"css"]({width:i-t+"%"},{queue:!1,duration:r.animate})):(0===s&&h.range.stop(1,1)[l?"animate":"css"]({bottom:i+"%"},r.animate),1===s&&h.range[l?"animate":"css"]({height:i-t+"%"},{queue:!1,duration:r.animate}))),t=i}):(s=this.value(),n=this._valueMin(),a=this._valueMax(),i=a!==n?100*((s-n)/(a-n)):0,u["horizontal"===this.orientation?"left":"bottom"]=i+"%",this.handle.stop(1,1)[l?"animate":"css"](u,r.animate),"min"===o&&"horizontal"===this.orientation&&this.range.stop(1,1)[l?"animate":"css"]({width:i+"%"},r.animate),"max"===o&&"horizontal"===this.orientation&&this.range[l?"animate":"css"]({width:100-i+"%"},{queue:!1,duration:r.animate}),"min"===o&&"vertical"===this.orientation&&this.range.stop(1,1)[l?"animate":"css"]({height:i+"%"},r.animate),"max"===o&&"vertical"===this.orientation&&this.range[l?"animate":"css"]({height:100-i+"%"},{queue:!1,duration:r.animate}))},_handleEvents:{keydown:function(t){var i,s,n,a,o=e(t.target).data("ui-slider-handle-index");switch(t.keyCode){case e.ui.keyCode.HOME:case e.ui.keyCode.END:case e.ui.keyCode.PAGE_UP:case e.ui.keyCode.PAGE_DOWN:case e.ui.keyCode.UP:case e.ui.keyCode.RIGHT:case e.ui.keyCode.DOWN:case e.ui.keyCode.LEFT:if(t.preventDefault(),!this._keySliding&&(this._keySliding=!0,e(t.target).addClass("ui-state-active"),i=this._start(t,o),i===!1))return}switch(a=this.options.step,s=n=this.options.values&&this.options.values.length?this.values(o):this.value(),t.keyCode){case e.ui.keyCode.HOME:n=this._valueMin();break;case e.ui.keyCode.END:n=this._valueMax();break;case e.ui.keyCode.PAGE_UP:n=this._trimAlignValue(s+(this._valueMax()-this._valueMin())/this.numPages);break;case e.ui.keyCode.PAGE_DOWN:n=this._trimAlignValue(s-(this._valueMax()-this._valueMin())/this.numPages);break;case e.ui.keyCode.UP:case e.ui.keyCode.RIGHT:if(s===this._valueMax())return;n=this._trimAlignValue(s+a);break;case e.ui.keyCode.DOWN:case e.ui.keyCode.LEFT:if(s===this._valueMin())return;n=this._trimAlignValue(s-a)}this._slide(t,o,n)},keyup:function(t){var i=e(t.target).data("ui-slider-handle-index");this._keySliding&&(this._keySliding=!1,this._stop(t,i),this._change(t,i),e(t.target).removeClass("ui-state-active"))}}})});