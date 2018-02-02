/* @projectDescription jQuery Serialize Anything - Serialize anything (and not just forms!)
 * @author Bramus! (Bram Van Damme)
 * @version 1.0
 * @website: http://www.bram.us/
 * @license : BSD
 */

"use strict";
(function($) {

    $.fn.serializeAnythingRepeater = function() {

        var toReturn    = [];
        var els         = $(this).find(':input').get();

        $.each(els, function() {
            if ($(this).attr('data-repeater_name') && !this.disabled && (this.checked || /select|textarea/i.test(this.nodeName) || /text|hidden|password/i.test(this.type))) {
                var val = $(this).val();

                toReturn.push( encodeURIComponent($(this).attr('data-repeater_name')) + "=" + encodeURIComponent( val ) );
            }
        });

        return toReturn.join("&").replace(/%20/g, "+");

    }

})(jQuery);






window.dzs_check_dependency_settings = function(){
    var $ = jQuery;










    var margs = {
        target_attribute: 'name'
    }



    $('*[data-dependency]').each(function(){
        var _t = $(this);




        var str_dependency = _t.attr('data-dependency');
        str_dependency = str_dependency.replace(/{{quot}}/g, '"');
        str_dependency = str_dependency.replace(/{quot}/g, '"');
        var dep_arr = []


        try{

            dep_arr = JSON.parse(str_dependency);



            if(dep_arr[0]){
                var _c = null;



                var target_attribute = margs.target_attribute;

                var target_con = $(document);


                if(_t.hasClass('check-label')){
                    target_attribute = 'data-label';
                }

                if(_t.hasClass('check-customize-setting-link')){
                    target_attribute = 'data-customize-setting-link';
                }
                if(_t.hasClass('check-parent1')){
                    target_con = _t.parent();
                }
                if(_t.hasClass('check-parent2')){
                    target_con = _t.parent().parent();
                }
                if(_t.hasClass('check-parent3')){
                    target_con = _t.parent().parent().parent();
                }






                if(dep_arr[0].lab){
                    _c = target_con.find('*['+target_attribute+'="'+dep_arr[0].lab+'"]:not(.fake-input)').eq(0);
                }
                if(dep_arr[0].label){
                    _c = target_con.find('*['+target_attribute+'="'+dep_arr[0].label+'"]:not(.fake-input)').eq(0);
                }
                if(dep_arr[0].element){
                    _c = target_con.find('*['+target_attribute+'="'+dep_arr[0].element+'"]:not(.fake-input)').eq(0);
                }





                if(_c){

                    var cval = _c.val();



                    var sw_show = false;


                    if(dep_arr[0].val){

                        for(var i3 in dep_arr[0].val) {


                            if (_c.val() == dep_arr[0].val[i3]) {


                                if(_c.attr('type')=='checkbox'){


                                    if(_c.val() == dep_arr[0].val[i3] && _c.prop('checked')){

                                        sw_show = true;
                                    }
                                }else{

                                    sw_show = true;
                                }


                            }
                        }
                    }






                    if(dep_arr.relation){




                        for(var i in dep_arr){
                            if(i=='relation'){
                                continue;
                            }




                            if(dep_arr[i].lab){
                                _c = target_con.find('*['+target_attribute+'="'+dep_arr[i].lab+'"]:not(.fake-input)').eq(0);
                            }
                            if(dep_arr[i].label){
                                _c = target_con.find('*['+target_attribute+'="'+dep_arr[i].label+'"]:not(.fake-input)').eq(0);
                            }
                            if(dep_arr[i].element){
                                _c = target_con.find('*['+target_attribute+'="'+dep_arr[i].element+'"]:not(.fake-input)').eq(0);
                            }


                            if(dep_arr[i].value){
                                if(dep_arr.relation=='AND'){
                                    sw_show=false;

                                }



                                if(dep_arr[0].element){
                                    _c = target_con.find('*['+target_attribute+'="'+dep_arr[i].element+'"]:not(.fake-input)').eq(0);
                                }


                                for(var i3 in dep_arr[i].value) {



                                    if (_c.val() == dep_arr[i].value[i3]) {






                                        if(_c.attr('type')=='checkbox'){

                                            if(_c.val() == dep_arr[i].value[i3] && _c.prop('checked')){

                                                sw_show = true;
                                            }
                                        }else{

                                            sw_show = true;
                                        }

                                        break;

                                    }


                                    if(dep_arr[i].value[i3]=='anything_but_blank' && cval){

                                        sw_show=true;
                                        break;
                                    }
                                }




                                if(dep_arr.relation=='AND'){
                                    if(sw_show==false){
                                        break;
                                    }
                                }
                            }



                        }

                    }else{

                        if(dep_arr[0].value){

                            for(var i3 in dep_arr[0].value) {

                                if (_c.val() == dep_arr[0].value[i3]) {


                                    if(_c.attr('type')=='checkbox'){
                                        if(_c.val() == dep_arr[0].value[i3] && _c.prop('checked')){

                                            sw_show = true;
                                        }
                                    }else{

                                        sw_show = true;
                                    }

                                    break;

                                }


                                if(dep_arr[0].value[i3]=='anything_but_blank' && cval){

                                    sw_show=true;
                                    break;
                                }
                            }
                        }
                    }



                    if(sw_show){


                        _t.show();
                    }else{
                        _t.hide();
                    }
                }


            }
        }catch(err){
            console.error('json dependency error - ',str_dependency);
            console.error(err);
        }
    })



}




jQuery(document).ready(function($){






    var sw_ask_before_leave = true;


    var update_image_meta_attr_inter = 0;


    var inter_change_color = 0;
    var colorpicker_args = {

        // -- you can declare a default color here,
        // -- or in the data-default-color attribute on the input
        defaultColor: false,
        // -- a callback to fire whenever the color changes to a valid color
        change: function(event, ui){
            console.info('colorpicker changed', event,ui,event.target, $(event.target));


            clearTimeout(inter_change_color);
            inter_change_color = setTimeout(function(){

                $(event.target).trigger('change');
            },500);
        },
        // -- a callback to fire when the input is emptied or an invalid color
        clear: function() {},
        // -- hide the color picker controls on load
        hide: true,
        // --show a group of common colors beneath the square
        // -- or, supply an array of colors to customize further
        palettes: true
    }

    if($.fn.wpColorPicker){

        $('.dzswp-color-picker').wpColorPicker(colorpicker_args);
        setTimeout(function(){

            $('.dzswp-color-picker').wpColorPicker(colorpicker_args);
        },1000);
    }




    // $(document).on('click.antfarmrep2', '.btn-add-repeater-field,.delete-btn', handle_mouse_repeater);
    $(document).on('click.antfarmrep', '.btn-add-repeater-field,.repeater-btn.delete-btn', handle_mouse_repeater);
    $(document).on('change.antfarmrep', '.repeater-con:not(.repeater-con-for-clone) .repeater-field', handle_change_repeater);

    setup_repeater_cons();
    setInterval(function(){


    },1000);

    // -- global
    var i = 0;
    $(document).delegate(".input-big-image", "change", change_big_image);
    $(document).delegate(".q-att-meta-edit-field", "keyup", handle_submit);
    $(document).on( "change",'select[name="page_template"], *[name="qucreative_meta_post_media_type"], select.q-att-meta-edit-field', handle_submit);
    $(document).on("click", '.ui-edit-field-close, .dzscheckbox.skin-nova,.vc-row-move, .customize-section-back', handle_mouse);
    $(document).on("click.dzs", 'input[name="save"],input[name="publish"]', function(e){
        sw_ask_before_leave = false;
    });


    setTimeout(function(){

        $(document).on("change", '.qucreative_meta-meta-bigcon > .setting > input,.qucreative_meta-meta-bigcon > .setting .dzscheckbox > input, .qucreative_meta-meta-bigcon > .setting > select,.qucreative_meta-meta-bigcon > .setting .dzs-select-wrapper > select,#qucreative_meta_options_portfolio .dzscheckbox > input', function(){

            // -- this makes sure that it asks you when close window





            $(window).on('beforeunload.dzs', function(){
                if(sw_ask_before_leave){

                    return "You have attempted to leave this page.  If you have made any changes to the fields without clicking the Save button, your changes will be lost.  Are you sure you want to exit this page?";
                }
            });

        });
    },3000);


    function con() {

        if(sw_ask_before_leave){
        }

    }


    $(".input-big-image").trigger('change');
    if(window.reskin_select){

        setTimeout(reskin_select, 10);
    }




    $(document).on('click','.install-btn',function(){
        var _t = $(this);



        var data = {
            action: 'qucreative_import_demo'
            ,postdata: ''
            ,demo: _t.attr('data-demo')
            ,nonce: $('.qucreative-nonce').eq(0).html()
        };









        var _con = _t.parent().parent().parent().parent().parent().parent();

        _con.addClass('loading');
        _con.parent().addClass('loading');

        $.post(ajaxurl, data, function(response) {
            if(window.console ){
                console.log('Got this from the server: ' + response);
            }

            setTimeout(function(){
                window.location.reload();
            },500);

        });

        return false;
    });



    setInterval(function(){

        $('.wpb_vc_section,.wpb_vc_row').each(function(){
            var _t = $(this);

            var _contr = _t.children('.vc_controls');



            if(_contr.children('.vc-row-move').length==0){

                _contr.find('.vc_column-add').eq(0).after('<a class="vc_control vc-row-move vc-row-move-down"  title="Move row down" data-vc-control="move-down"><i class="vc-composer-icon vc-c-icon-arrow_downward"></i></a>');
                _contr.find('.vc_column-add').eq(0).after('<a class="vc_control vc-row-move vc-row-move-up"  title="Move row up" data-vc-control="move-up"><i class="vc-composer-icon vc-c-icon-arrow_upward"></i></a>');
            }
        })

    },1000);

    // -- customizer code
    $(document).delegate('.customize-control-checkbox-multiple input[type="checkbox"]', 'change', function() {

            console.info(this);
            var checkbox_values = $( this ).parents( '.customize-control' ).find( 'input[type="checkbox"]:checked' ).map(
                function() {
                    return this.value;
                }
            ).get().join( ',' );

            console.info($( this ).parents( '.customize-control' ).find( 'input[type="hidden"]' ));

            $( this ).parents( '.customize-control' ).find( 'input[type="hidden"]' ).val( checkbox_values ).trigger( 'change' );
        }
    );
    // -- customizer code END




    jQuery(document).on('change','input[name=video]',function(){

        var _t = $(this);

    })



    setTimeout(function(){
        try{
            jQuery('*[name="qucreative_meta_post_media_type"]').trigger('change');
            jQuery('#page_template').trigger('change');

        }catch(err){
            console.log('try to change page_template', err);
        }
    },500);


    setTimeout(function(){
        try{
            jQuery('*[name="qucreative_meta_post_media_type"]').trigger('change');
            jQuery('#page_template').trigger('change');

        }catch(err){
            console.log('try to change page_template', err);
        }
    },2000);


    setTimeout(function(){
        try{
            jQuery('#page_template').trigger('change');

        }catch(err){
            console.log('try to change page_template', err);
        }
    },4000);


    var aux =window.location.href;



    /// --- item gallery CODE
    var _gallery = $('.dzs_item_gallery_list');

    $('.dzs-add-gallery-item').unbind('click', window.click_add_gallery_item);
    $('.dzs-add-gallery-item').bind('click', window.click_add_gallery_item);
    $(document).undelegate('li .ui-delete', 'click');
    $(document).delegate('li .ui-delete', 'click', click_item_delete);
    $(document).undelegate('li .ui-edit', 'click');
    $(document).delegate('li .ui-edit', 'click', click_item_edit);


    setTimeout(function(){

    },2000);
    setTimeout(function(){

        jQuery('.iconselector-waiter').trigger('change');
    },3000);


    $(document).on('change.dzsdepe', '.customize-control select, .dzs-dependency-field,*[name="0-settings-vpconfig"],.wpb_vc_param_value[name=skin],*[name=zfolio-mode],*[name="qucreative_meta_port_open_custom_link_sw"]',handle_change);







    setTimeout(function(){

        $('.dzs-dependency-field,*[name=zfolio-mode]').trigger('change');
    }, 1000);







    function handle_change(e){



        var _t = $(this);
        if(_t.attr('data-customize-setting-link') || _t.hasClass('dzs-dependency-field') || _t.attr('name')=='zfolio-mode'|| _t.attr('name')=='skin'|| _t.attr('name')=='qucreative_meta_port_open_custom_link_sw' ){

            dzs_check_dependency_settings();
        }


        if(_t.attr('name')=='0-settings-vpconfig'){


            var ind = 0;

            _t.children().each(function(){
                var _t2 = $(this);

                // console.info(_t2);
                if(_t2.prop('selected')){
                    ind = _t2.parent().children().index(_t2) - 1;
                    return false;
                }
            });

            $('#quick-edit').attr('href', add_query_arg($('#quick-edit').attr('href'),'currslider',ind));


        }

    }







    if($.fn.sortable){


        _gallery.each(function(){
            var _t23 = $(this);


            if(_t23.hasClass('ui-sortable')==false){


                _t23.sortable({
                    items: 'li',
                    handle: '.the-handler',
                    scrollSensitivity:50,
                    forcePlaceholderSize: true,
                    forceHelperSize: false,
                    helper: 'clone',
                    opacity: 0.7,
                    placeholder: 'dzs_item_gallery_list-placeholder',
                    update: function(event, ui) {

                        console.info(this);
                        window.update_dzs_item_gallery_metafield($(this));
                    }
                });
            }

        })
    }else{
        console.warn('please include sortable');
    }



    function click_item_edit(){
        var _t = $(this);
        var _con = _t.parent();

        _con.parent().children().removeClass('edit-field-active');


        _con.addClass('edit-field-active');

    }

    function handle_mouse_repeater(e){
        var _t3 = $(this);

        if(e.type=='click'){
            if(_t3.hasClass('btn-add-repeater-field')){



                add_repeater_field(_t3.parent().parent());

                repeater_generate_serialized(_t3.parent().parent());
                return false;
            }
            if(_t3.hasClass('delete-btn')){


                var _con = _t3.parent().parent().parent().parent().remove().remove();

                repeater_generate_serialized(_con);
            }
        }
    }

    function handle_change_repeater(e){
        var _t3 = $(this);

        if(e.type=='change'){
            if(_t3.hasClass('repeater-field')){


                // console.info(_t3.data('repeater-con-main'));

                var _rCM = null;

                if(_t3.data('repeater-con-main')){
                    _rCM = _t3.data('repeater-con-main');
                }

                if(_t3.parent().parent().parent().parent().parent().hasClass('repeater-main-con')){
                    _rCM = _t3.parent().parent().parent().parent().parent();
                }

                if(_t3.parent().parent().parent().parent().parent().parent().parent().hasClass('repeater-main-con')){
                    _rCM = _t3.parent().parent().parent().parent().parent().parent().parent();
                }



                repeater_generate_serialized(_rCM,{
                    "call_from":"change_field"
                });


            }

            if(_t3.attr('data-repeater_name')=='title'){
                _t3.parent().parent().parent().find('.the-title').eq(0).html(_t3.val());
            }
        }
    }

    function repeater_generate_serialized(_argRepeaterMainCon,pargs){




        var aux = '';

        var margs = {
            call_from: "default"
        };

        if(pargs){
            margs = $.extend(margs,pargs);
        }




        var arr = [];


        if(_argRepeaterMainCon){

            _argRepeaterMainCon.find('.repeater-con:not(".repeater-con-for-clone")').each(function(){
                var _t4 = $(this);



                var arr_aux = {};
                _t4.find('*[data-repeater_name]').each(function(){
                    var _t42 = $(this);



                    arr_aux[_t42.attr('data-repeater_name')] = _t42.val();


                });

                arr.push(arr_aux);
            })


            aux = JSON.stringify(arr);





            _argRepeaterMainCon.prev().val(aux);
        }else{



        }

    }


    function add_repeater_field(_arg, pargs){

        var margs = {

            link: '#'
            ,title: ''
            ,icon: ''
        };






        if(pargs){
            margs = $.extend(margs,pargs);
        }





        _arg.find('.repeaters-con').eq(0).append(_arg.find('.repeater-con-for-clone').clone() );
        var _cach = _arg.find('.repeaters-con').children().last();

        _cach.removeClass('repeater-con-for-clone');


        for(var lab in margs){




            _cach.find('*[data-repeater_name="'+lab+'"]').val(margs[lab]);

            if(lab=='title'){
                _cach.find('.the-title').eq(0).html(margs[lab]);
            }


        }

    }



    function generate_repeater_cons(_repeaterMainCon,_t){


        var aux_arr = [];



        try{

            var _inp = _repeaterMainCon.data('target-input');

            aux_arr = JSON.parse(_inp.val());

            for(var lab in aux_arr){
                add_repeater_field(_repeaterMainCon, aux_arr[lab]);
            }
        }catch(err){
            console.info('err in json ' , err);
        }



    }


    function regenerate_repeater_cons(){



        $('.repeater-main-con').each(function(){
            var _t2 = $(this);

            generate_repeater_cons(_t2, _t2.prev())
        })
    }



    function setup_repeater_cons(){






        $('.repeater-con-target').each(function(){
            var _t = $(this);

            var _repeaterMainCon = null;




            if(_t.hasClass('setuped')){
                return;
            }


            _t.addClass('setuped');



            if(_t.next().hasClass('repeater-main-con')){
                _repeaterMainCon = _t.next();

            }

            _t.next().data('target-input',_t);






            if(_repeaterMainCon.data('setuped')=='on'){  return; }



            if(_t.parent().parent().parent().parent().parent().parent().parent().hasClass('widgets-holder-wrap')){

             }
            if(_t.parent().parent().parent().parent().parent().parent().parent().hasClass('widgets-holder-wrap')==false){

                return;

            }











            var _repeaterTarget = _t;

            var _repeaterCons = null;

            var inter_change_dom = 0;
            if(_repeaterMainCon){

                _repeaterCons = _repeaterMainCon.find('.repeaters-con').eq(0);




                if($.fn.sortable){





                    _repeaterCons.sortable({
                        items: '.repeater-con'
                        ,handle: '.move-btn'
                        ,scrollSensitivity:100,
                        forcePlaceholderSize: true,
                        forceHelperSize: false,
                        helper: 'clone',
                        opacity: 0.7,
                        placeholder: 'repeater-con-placeholder',
                        update: function(event, ui) {

                            // console.info(this);

                            var _t = $(this);

                            if(_t.parent().hasClass('repeater-main-con')){

                                repeater_generate_serialized(_t.parent());
                            }

                            if(_t.parent().parent().hasClass('repeater-main-con')){

                                repeater_generate_serialized(_t.parent().parent());
                            }
                        }
                    });
                }else{
                    console.warn('please include sortable');
                }





                if(_t.parent().parent().hasClass('widget-content')){
                    _t.parent().parent().on('DOMNodeInserted DOMNodeRemoved', function(){



                        if(_t.val()!='[]'){

                            if(_repeaterMainCon.find('.repeater-con').length==1){

                                


                                regenerate_repeater_cons();


                            }

                        }
                        setTimeout(function(){

                        },500);

                    })
                }
            }



            _repeaterMainCon.addClass('setuped');
            _repeaterMainCon.data('setuped','on');
            generate_repeater_cons(_repeaterMainCon);



        })



    }



    function click_item_delete(){
        var _t = $(this);

        var _con = _t.parent().parent();
        _t.parent().remove();
        window.update_dzs_item_gallery_metafield(_con);
    }

    /// -- item gallery CODE END



    function click_ahtml(){
        $('#wp-content-wrap').removeClass('builder-active');

    }

    function click_atmce(){
        $('#wp-content-wrap').removeClass('builder-active');

    }
    function click_builder_initer(){

        $('#wp-content-wrap').removeClass('tmce-active').removeClass('html-active').addClass('builder-active');
    }


    function update_image_meta_attr(_arg){


        var _con = null;


        if(_arg.parent().parent().hasClass('ui-edit-field')){
            _con = _arg.parent().parent();

        }





        var mainarray = {};


        mainarray.id = _con.find('*[name="qucreative_meta_post_id"]').val();
        mainarray.post_excerpt = _con.find('*[name="qucreative_meta_post_excerpt"]').val();
        mainarray.post_content = _con.find('*[name="qucreative_meta_post_content"]').val();
        mainarray.meta_att_aligment = _con.find('*[name="qucreative_meta_att_aligment"]').val();
        mainarray.meta_att_video = _con.find('*[name="qucreative_meta_att_video"]').val();
        mainarray.qucreative_meta_att_enable_video_cover = _con.find('*[name="qucreative_meta_att_enable_video_cover"]').val();


        mainarray = JSON.stringify(mainarray);





        var data = {
            action: 'qucreative_save_att_meta'
            ,postdata: mainarray
        };


        jQuery.post(ajaxurl, data, function(response) {
            if(window.console !=undefined ){
                console.log('Got this from the server: ' + response);
            }


        });

    }

    function handle_mouse(e) {
        var _t = $(this);


        if(e.type=='click'){


            if(_t.hasClass('ui-edit-field-close')){
                _t.parent().parent().removeClass('edit-field-active');
            }
            if(_t.hasClass('customize-section-back')){


                var _c = $('.typography-tabs').eq(0);

                if(_c.length){
                    if(_c.get(0) && _c.get(0).api_goto_tab){



                        _c.find('.tab-menu-con.active .tab-menu').trigger('click');
                    }
                }

            }
            if(_t.hasClass('vc-row-move')){


                var _con = _t.parent().parent();

                if(_t.hasClass('vc-row-move-down')){

                    _con.next().after(_con);

                }
                if(_t.hasClass('vc-row-move-up')){

                    _con.prev().before(_con);
                }


                setTimeout(function(){



                    var _wmsort = $(".wpb_main_sortable");

                    $('.vc_column-move').trigger('click');
                    $('.vc_column-move').trigger('mousedown');
                    _wmsort.trigger('sort');
                    _wmsort.trigger('update');
                    _wmsort.trigger('sortupdate');


                    _wmsort.sortable('refresh');
                    _wmsort.sortable('option','update')(null, {item: _con});

                },100)
                setTimeout(function(){
                    $('.vc_column-move').trigger('mouseup');

                },200)



                return false;
            }

            if (_t.hasClass('dzscheckbox')) {




                if (_t.find('input').eq(0).prop('checked') == false) {
                    _t.find('input').eq(0).prop('checked', true);
                } else {
                    _t.find('input').eq(0).prop('checked', false);
                }

                _t.find('input').eq(0).trigger('change');

                return false;
            }
        }
    }

    function handle_submit(e){
        var _t = $(this);

        if(e.type=='keyup' || e.type=='change'){
            if(_t.hasClass('q-att-meta-edit-field')){


                clearTimeout(update_image_meta_attr_inter);

                update_image_meta_attr_inter = setTimeout(function(){
                    update_image_meta_attr(_t);
                }, 1000);
            }
        }

        if(e.type=='change'){
            if(_t.attr('name')=='page_template'){


                if(_t.val()=='template-qucreative-slider.php'||_t.val()=='template-gallery-creative.php'){

                }else{

                    if($('*[name="qucreative_meta_post_media_type"]').eq(0).val()!='slider') {

                    }
                }

                var aux = _t.val();

                aux = aux.replace('.php','');

                $('body').removeClass('selected-default selected-template-qucreative-slider selected-template-portfolio selected-template-gallery-creative');

                $('body').addClass('selected-'+aux);
            }


            if(String(_t.attr('name'))=='qucreative_meta_post_media_type'){


                if(_t.parent().parent().hasClass('con-type-receiver')){
                    var _con =_t.parent().parent();



                    _con.removeClass('type-image type-video type-vimeo type-youtube type-slider');

                    _con.addClass('type-'+_t.val());
                }

                if($('*[name="page_template"]').eq(0).val()!='template-qucreative-slider.php'){





                    $('body').removeClass('selected-media-type-image selected-media-type-video selected-media-type-youtube selected-media-type-vimeo selected-media-type-slider ');

                    $('body').addClass('selected-media-type-'+_t.val());
                }
            }
        }
    }


    function change_big_image(){
        var _t = $(this);
        var _it = _t.parent();

        var val = _t.val();

        //console.log(_t, val);
        if(val!=undefined && val!=''){
            _it.find('.dzs-img-preview-con').eq(0).fadeIn('slow');
            _it.find('.dzs-img-preview').eq(0).css({
                'background-image' : 'url(' + val + ')'
            });
        }else{
            _it.find('.dzs-img-preview-con').eq(0).fadeOut('slow');

        }
    }


    $('.dzsq-dzs-wordpress-uploader').unbind('click');
    $('.dzsq-dzs-wordpress-uploader').bind('click', function(e){
        var _t = $(this);
        var targetInput = _t.prev();

        var searched_type = '';

        if(targetInput.hasClass('upload-type-audio')){
            searched_type = 'audio';
        }
        if(targetInput.hasClass('upload-type-image')){
            searched_type = 'image';
        }


        var uploader_frame = wp.media.frames.qucreative_addimage = wp.media({
            // Set the title of the modal.
            title: "Insert Media",

            // Tell the modal to show only images.
            library: {
                type: searched_type
            },

            // Customize the submit button.
            button: {
                // Set the text of the button.
                text: "Insert Media",
                // Tell the button not to close the modal, since we're
                // going to refresh the page when the image is selected.
                close: false
            }
        });

        // When an image is selected, run a callback.
        uploader_frame.on( 'select', function() {
            // Grab the selected attachment.
            var attachment = uploader_frame.state().get('selection').first();

            //console.log(attachment.attributes.url);
            var arg = attachment.attributes.url;

            if(targetInput.hasClass('upload-prop-id')){
                targetInput.val(attachment.attributes.id);
            }else{
                targetInput.val(attachment.attributes.url);

            }

            targetInput.css({
                'background-color':''
                ,'color':''
            })

            targetInput.trigger('change');
            uploader_frame.close();
        });

        // Finally, open the modal.
        uploader_frame.open();

        e.stopPropagation();
        e.preventDefault();
        return false;
    });



    jQuery(document).on('widget-updated', function(e, widget){
        // -- do your awesome stuff here

        setTimeout(function(){

            dzssel_init('select.dzs-style-me', {init_each: true});
        },2);
        setTimeout(function(){


            setup_repeater_cons();
        },100);
        setTimeout(function(){

            jQuery('.iconselector-waiter').trigger('change');
        },200);
        // -- "widget" represents jQuery object of the affected widget's DOM element
    });

});

function dzstln_mainoptions_ready(){

    jQuery('.dzstln-save-mainoptions').bind('click', dzstln_mo_saveall);
    jQuery('.saveconfirmer').fadeOut('slow');
}

var global_dzstln_batchupload_index = 0;
function dzstln_adminpage_batchupload_ready(){

    jQuery('.save-batchupload').bind('click', dzstln_batchupload_saveall);
    jQuery('.saveconfirmer').fadeOut('slow');


    window.dzsuploader_multi_init('.dzs-multi-upload',{});
}

window.global_dzsmultiupload = function(arg1,arg2){

    jQuery('form.mainsettings').append('<input type="hidden" name="item['+global_dzstln_batchupload_index+'][name]" value="'+arg1+'"/>');
    jQuery('form.mainsettings').append('<input type="hidden" name="item['+global_dzstln_batchupload_index+'][url]" value="'+(dzs_upload_path + arg1)+'"/>');

    global_dzstln_batchupload_index++;

    jQuery('.notice-files-uploaded--number').html(global_dzstln_batchupload_index);
};

function dzstln_mo_saveall(){
    jQuery('#save-ajax-loading').css('visibility', 'visible');
    var mainarray = jQuery('.mainsettings').serialize();
    var data = {
        action: 'dzstln_ajax_mo',
        postdata: mainarray
    };
    jQuery('.saveconfirmer').html('Options saved.');
    jQuery('.saveconfirmer').fadeIn('fast').delay(2000).fadeOut('fast');
    jQuery.post(ajaxurl, data, function(response) {
        if(window.console !=undefined ){
            console.log('Got this from the server: ' + response);
        }
        jQuery('#save-ajax-loading').css('visibility', 'hidden');
    });

    return false;
}

function dzstln_batchupload_saveall(){
    jQuery('#save-ajax-loading').css('visibility', 'visible');
    var mainarray = jQuery('.mainsettings').serialize();
    var data = {
        action: 'dzstln_ajax_batchupload_saveall',
        postdata: mainarray
    };
    jQuery('.saveconfirmer').html('Options saved.');
    jQuery('.saveconfirmer').fadeIn('fast').delay(2000).fadeOut('fast');
    jQuery.post(ajaxurl, data, function(response) {
        if(window.console !=undefined ){
            console.log('Got this from the server: ' + response);
        }
        jQuery('#save-ajax-loading').css('visibility', 'hidden');
    });

    return false;
}
function reskin_select(){
    for(var i=0;i<jQuery('select').length;i++){
        var $cache = jQuery('select').eq(i);


        if($cache.hasClass('styleme')==false || $cache.parent().hasClass('select_wrapper') || $cache.parent().hasClass('select-wrapper')){
            continue;
        }
        var sel = ($cache.find(':selected'));
        $cache.wrap('<div class="select-wrapper"></div>');
        $cache.parent().prepend('<span>' + sel.text() + '</span>')
    }
    jQuery(document).undelegate(".select-wrapper select", "change");
    jQuery(document).delegate(".select-wrapper select", "change",  change_select);


    function change_select(){
        var selval = (jQuery(this).find(':selected').text());
        jQuery(this).parent().children('span').text(selval);
    }

}
window.click_add_gallery_item = function(e){

    var _t = jQuery(this);



    var item_gallery_frame = wp.media.frames.downloadable_file = wp.media({
        title: 'Add Images to Item Gallery',
        button: {
            text: 'Add to gallery'
        },
        multiple: true
    });

    item_gallery_frame.on( 'select', function() {

        var selection = item_gallery_frame.state().get('selection');
        var _gallery = null;


        if(_t.parent().children('.dzs_item_gallery_list').length>0){

            _gallery = _t.parent().children('.dzs_item_gallery_list').eq(0);
        }
        selection = selection.toJSON();

        for(var i=0;i<selection.length;i++){

            var _c = selection[i];

            if(_c.id==undefined){
                continue;
            }

            if(_gallery){
                _gallery.append('<li class="item-element" data-id="'+_c.id+'"><img class="the-image" src="'+_c.url+'"/><div class="ui-delete"></div><div class="ui-edit">'+window.qucreative_settings.lang_edit+'</div><div class="ui-edit-field"><div class="ui-edit-field-close"><i class="fa fa-times-circle"></i></div> <input type="hidden" name="qucreative_meta_post_id" value="'+_c.id+'"/> <div class="setting"> <h5>'+window.qucreative_settings.lang_title+'</h5> <input class="q-att-meta-edit-field" type="text" name="qucreative_meta_post_excerpt" value="'+_c.caption+'"/> </div> <div class="setting"> <h5>'+window.qucreative_settings.lang_description+'</h5> <textarea class="q-att-meta-edit-field" type="text" name="qucreative_meta_post_content">'+_c.description+'</textarea> </div> <div class="setting"> <h5>'+window.qucreative_settings.lang_aligment+'</h5> <select name="qucreative_meta_att_aligment" class="q-att-meta-edit-field"><option value="right" selected>'+window.qucreative_settings.lang_right+'</option><option value="left">'+window.qucreative_settings.lang_left+'</option></select> </div> <div class="setting"> <h5>Attached Video</h5> <input class="q-att-meta-edit-field" type="text" name="qucreative_meta_att_video" value=""/> </div> <div class="setting"> <h5>Enable Video Cover</h5> <select name="qucreative_meta_att_enable_video_cover" class="q-att-meta-edit-field"><option value="off">Off</option><option value="on">On</option></select> </div> </div> </div></li>')
            }


        }
        window.update_dzs_item_gallery_metafield(_gallery);


    });



    // Finally, open the modal.
    item_gallery_frame.open();
    /// --====item gallery CODE END



    return false;
};



window.update_dzs_item_gallery_metafield = function(_arg){
    // -- @arg is the .dzs_item_gallery_list element

    console.info('update_dzs_item_gallery_metafield', _arg);
    var _theinput = null;

    if(_arg && _arg.parent && _arg.parent().children('input[name*=image_gallery]').length>0){
        _theinput = _arg.parent().children('input[name*=image_gallery]').eq(0);
    }

    if(_theinput){

        _theinput.val('');
    }
    var aux = '';
    var i=0;

    if(_arg && _arg.children){
        _arg.children().each(function(){
            var _t = jQuery(this);

            if(i>0){
                aux+=',';
            }
            aux+=_t.attr('data-id');
            i++;
        });
    }

    if(_theinput){

        _theinput.val(aux);
    }
}









