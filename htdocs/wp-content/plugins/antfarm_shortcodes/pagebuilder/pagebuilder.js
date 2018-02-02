var i =0;
var pagebuilder_lts_mousedown = false;
var pagebuilder_lts_mousedown_int = 0;
var pagebuilder_lasttarget = undefined;


var _pagebuilderWrap;
var _wrapBuild;
var pb_firsttransform_topb = true;

top.dzspb_receiver = function(arg){

    //top.dzspb_textsel = _con.find('.the-layout-body-content').eq(0).val();
    top.dzspb_target.val(arg);
    top.dzspb_target.trigger('change');
    jQuery.fn.zoomBox.close();

};


top.dzspb_receiver_type = function(arg){

    //top.dzspb_textsel = _con.find('.the-layout-body-content').eq(0).val();

    ///console.info(arg)

    top.dzspb_target_type_con.find('.field-title').eq(0).val(arg);
    jQuery.fn.zoomBox.close();

    update_layout_names();


};

(function($){
    //console.info('ceva');
    $.fn.prependOnce = function(arg, argfind) {
        var _t = $(this) // It's your element


//        console.info(argfind);
        if(typeof(argfind) =='undefined'){
            var regex = new RegExp('class="(.*?)"');
            var auxarr = regex.exec(arg);


            if(typeof auxarr[1] !='undefined'){
                argfind = '.'+auxarr[1];
            }
        }


        // we compromise chaining for returning the success
        if(_t.children(argfind).length<1){
            _t.prepend(arg);
            return true;
        }else{
            return false;
        }
    };
    $.fn.appendOnce = function(arg, argfind) {
        var _t = $(this) // It's your element


        if(typeof(argfind) =='undefined'){
            var regex = new RegExp('class="(.*?)"');
            var auxarr = regex.exec(arg);


            if(typeof auxarr[1] !='undefined'){
                argfind = '.'+auxarr[1];
            }
        }
        // we compromise chaining for returning the success
        if(_t.children(argfind).length<1){
            _t.append(arg);
            return true;
        }else{
            return false;
        }
    };


    $.fn.dzspgb = function(o) {

        //==default options
        var defaults = {
            type: 'editor' // -- 'templateedit' or 'editor'
            ,mode: 'Full' // -- 'full' or 'onlyrows'
            ,ajaxurl: 'admin.php'
            ,init_first_content: "default"
            ,append_after_cthis: "off" // -- append the dzspgb wrap after the element selected
            ,is_wp: "off" // -- append the dzspgb wrap after the element selected
            ,edit_in_zoombox: "on" // -- edit settings in a zoombox
        };

//        console.info(this, o);

        if(typeof o =='undefined'){
            if(typeof $(this).attr('data-options')!='undefined'  && $(this).attr('data-options')!=''){
                var aux = $(this).attr('data-options');
                aux = 'var aux_opts = ' + aux;
                eval(aux);
                o = aux_opts;
            }
        }
        o = $.extend(defaults, o);
        this.each( function() {
            var tthis = $(this);

            var cthis = null;

            var _theForm = null
                ,_theTextarea = null
                ;


            var ce_content = '';



            var sortable_settings_sections = {
                'items' : '.admin-dzspgb-section'
                ,handle : '.mover-handler-con'
                ,axis : 'y'
                ,update: function(){
                    update_elements_name();
                    if(o.type==='editor'){
                        update_ce({
                            'call_from':'move section'
                        });
                    }
                }
            }
            var sortable_settings_containers = {
                'items' : '.admin-dzspgb-container'
                ,handle : '.mover-container-handler-con'
                ,axis : 'y'
                ,update: function(){
                    update_elements_name();
                    if(o.type==='editor'){
                        update_ce({
                            'call_from':'move container'
                        });
                    }
                }
            }
            var sortable_settings_rows = {
                'items' : '.admin-dzspgb-row'
                ,handle : '.mover-row-handler-con'
                ,axis : 'y'
                ,update: function(){
                    update_elements_name();
                    if(o.type==='editor'){
                        update_ce({
                            'call_from':'move row'
                        });
                    }
                }
            }

            var sortable_settings_row_parts = {
                'items' : '.admin-dzspgb-row-part-con'
                ,handle : '.mover-row-part-handler-con'
                ,axis : 'x'
                ,update: function(){
                    //console.info('update');
                    update_elements_name();


                    if(o.type==='editor'){
                        update_ce({
                            'call_from':'move row part'
                        });
                    }
                }
            };

            var sortable_settings_elements = {
                'items' : '.dzspgb-element-con'
                ,handle : '.move-handler-for-elements'
                ,connectWith : '.elements-area'
                ,placeholder: "element-placeholder"
                ,axis : ''
                ,update: function(){
                    update_elements_name();



                    setTimeout(function(){

                        if(o.type==='editor'){
                            update_ce({
                                'call_from':'move element'
                            });
                        }
                    },300)
                }
            };



            var sortable_settings_multiple_items = {
                'items' : '.dzspgb-item'
                ,handle : '.move-handler-for-multiple-items'
                ,axis : 'y'
                ,update: function(){
                    //update_elements_name();



                    setTimeout(function(){

                        if(o.type==='editor'){
                            //update_ce();
                        }
                    },300)
                }
            };


            // feeded / inited


            if(o.append_after_cthis=='on'){
                if(!tthis.next().hasClass('dzspgb-builder--wrap')){

                    tthis.after('<div class="dzspgb-builder--wrap"></div>');
                    //tthis.wrap('<form class="dzspgb-builder--wrap"></form>');
                }
                cthis = tthis.next();

            }else{

                if(!tthis.parent().hasClass('dzspgb-builder--wrap')){

                    tthis.wrap('<div class="dzspgb-builder--wrap"></div>');
                    //tthis.wrap('<form class="dzspgb-builder--wrap"></form>');
                }
                cthis = tthis.parent();
            }




            //console.info(cthis);



            if(cthis.hasClass('inited')){
                return this;
            }


            if(o.type=='editor' && cthis.find('textarea').length>0){
                _theTextarea = cthis.find('textarea').eq(0);
            }



            if(_theTextarea && _theTextarea.val()){
                ce_content = _theTextarea.val();
            }

            if(o.init_first_content!="default"){
                ce_content = o.init_first_content;
            }

            console.info(cthis, _theTextarea);

            if(cthis.find('div.dzspgb-form').length>0){

            }else{

                if(_theTextarea){
                    _theTextarea.after('<div class="the-form dzspgb-form"></div>');
                }else{

                    cthis.append('<div class="the-form dzspgb-form"></div>');
                }

                //cthis.append('<form class="the-form dzspgb-form"></form>');


            }



            _theForm = cthis.find('.the-form').eq(0);








            //console.log(o.mode);
            if(o.mode=='Full'){
                _theForm.after('<div class="main-add-con" style="text-align: center"><span class="dzspgb-button dzspgb-add-section"><i class="fa fa-plus-square"></i><span>Add Section</span></span></div>');
            }else{

                _theForm.after('<div class="main-add-con" style="text-align: center"><span class="dzspgb-button dzspgb-add-row"><i class="fa fa-plus-square"></i><span>Add Row</span></span></div>');
            }




            if(cthis.hasClass('feeded')){

            }else{





                if(o.type=='editor'){
                    if(o.mode=='Full'){

                        update_pb();

                        setTimeout(function(){
                            update_ce({
                                'call_from':'init , full'
                            });
                        },1000);

                    }else{

                        console.groupCollapsed("start text");
                        console.info(ce_content);
                        console.groupEnd();

                        update_pb();

                        setTimeout(function(){
                            update_ce({
                                'call_from':'init, row'
                            });
                        },1000);
                    }
                }


            }

            if(o.mode=='Full'){
                _theForm.sortable(sortable_settings_sections);
            }else{

                _theForm.sortable(sortable_settings_rows);
            }


            //console.log(o.type);


            if(o.type=='templateedit'){

                _theForm.find('.admin-dzspgb-section').sortable(sortable_settings_containers);
                _theForm.find('.area-rows').sortable(sortable_settings_rows);
                _theForm.find('.area-row-parts').sortable(sortable_settings_row_parts);
                _theForm.find('.elements-area').sortable(sortable_settings_elements);






            }else{

            }

            setTimeout(function(){
                //console.log($('.elements-area > .dzspgb-element-con .dzs-single-upload:not(.do-not-treat)'));
                if(window.dzsuploader_single_init){

                    //console.info($('.dzs-single-upload:not(.do-not-treat)'));
                    window.dzsuploader_single_init('.elements-area > .dzspgb-element-con .dzs-single-upload:not(.do-not-treat)', {});
                }

            },1000);
            if(o.type=='templateedit'||o.type=='editor'){

                $('.btn-delete-element').each(function(){
                    var _t = $(this);


                    if(!_t.data('delete_target')){

                        if(_t.parent().parent().parent().hasClass('hidden-content')){

                            //console.info(_t);

                            _t.data('delete_target', _t.parent().parent().parent().parent());
                            //console.info(_t.data('delete_target'));
                        }
                        if(_t.parent().parent().hasClass('hidden-content')){

                            //console.info(_t);

                            _t.data('delete_target', _t.parent().parent().parent());
                            //console.info(_t.data('delete_target'));
                        }
                    }

                    //console.info(_t);
                });
            }



            init_listeners();
            //console.info(cthis.find('.dzspgb-saver'));




            cthis.find('.dzspgb-add-section').bind('click', handle_mouse);
            cthis.find('.button-save-template').bind('click', handle_mouse);

            //$(document).delegate('', 'click', handle_mouse);
            $(document).delegate('.layout-type-con, .clone-handler-for-elements', 'click', handle_mouse);
            $(document).delegate('.delete-handler-for-multiple-items', 'click', handle_mouse);
            $(document).delegate('.settings-button-con', 'click', handle_mouse);
            $(document).delegate('.dzspgb-add-container', 'click', handle_mouse);
            $(document).delegate('.dzspgb-add-row', 'click', handle_mouse);
            $(document).delegate('.dzspgb-add-element .add-element-label', 'click', handle_mouse);
            $(document).delegate('.dzspgb-add-element .close-element-type-label, .btn-delete-itm', 'click', handle_mouse);
            $(document).delegate('.buttons-con .btn-done-editing', 'click', handle_mouse);
            //$(document).delegate('.btn-delete-element', 'click', handle_mouse);
            //$('.btn-delete-element').bind('click', handle_mouse);
            //console.log($('.btn-delete-element'));
            //$(document).delegate('.btn-delete-element', 'click', handle_mouse);
            $(document).delegate('.elements-area > .dzspgb-element-con > .dzspgb-element-type > .dzspgb-button-choose', 'click', handle_mouse);
            $(document).delegate('.dzspgb-button-con .dzspgb-button-choose', 'click', handle_mouse);
            $(document).delegate('.btn-add-item', 'click', handle_mouse);
            $(document).delegate('.dzspgb-text-changer', 'change', change_text_changer);
            $(document).delegate('input[name*="[is_content]"],.hidden-content.the-type-pricing_table input[name*="[nr_columns]"]', 'change', change_text_changer);



            $(window).bind('resize', handle_resize);


            cthis.get(0).api_remove_non_actives = remove_non_actives;
            cthis.get(0).api_update_elements_name = update_elements_name;
            cthis.get(0).api_update_template_type = update_template_type;


            cthis.get(0).api_update_pb = update_pb;



            if(window.api_zoombox_set_callback_func){

                window.api_zoombox_set_callback_func(zoombox_init_holder_func);
            }

            //console.info(cthis);


            setTimeout(function(){
                //console.info($('.element-type-selector-con').eq(0).height());

                $('input[name*="[is_content]"]').trigger('change');

                dzssel_init('select.dzs-style-me', {init_each: true});
            },500)


            generates_non_actives();

            action_edit_element();

            setTimeout(function(){

                action_edit_element();
            },1000);

            function update_settings(pargs){
                if(pargs){

                    o = $.extend(o, pargs);
                }
            }



            function init_listeners(pargs){


                var margs ={

                    'selector': $('body')
                };
                if(pargs){

                    margs = $.extend(margs, pargs);
                }

                margs.selector.find('.func-slider').each(function(){
                    var _t = $(this);
                    var _val = _t.parent().find('.func-slider-val').eq(0);

                    if(_t.parent().parent().parent().parent().parent().hasClass('element-type-selector-con')){
                        return;
                    }

                    // console.log('func slider _t ' , _t, _val, $.fn.slider);
                    _t.slider({

                        value: _val.val()
                        ,animate: "fast"
                        ,step: 1
                        ,slide: function(e,ui){

                            _val.val(ui.value);

                            //console.log(this, ui, _val);
                        }
                    });
                });
                if(o.is_wp=='on'){
                    // tinymce.init(_t.get(0));

                }


                margs.selector.find('textarea.tinymce-me').each(function(){
                    //return false;
                    var _t = $(this);
                    if(_t.parent().parent().parent().parent().hasClass('element-type-selector-con')){
                        return;
                    }

                    if(_t.hasClass('tinymce-inited') && _t.hasClass('destroyed-tinymce-intentionally')==false){

                        if(_t && _t.tinymce()){

                            _t.tinymce().destroy();
                        }
                    }

                    //console.info(_t);

                    if(o.is_wp=='on'){
                        // tinymce.init(_t.get(0));
                        _t.attr('id', _t.attr('name'));

                        // console.warn(_t.attr('id'))





                        var sanitized_id = _t.attr('id');

                        sanitized_id = sanitized_id.replace(/(\[|\])/g, '\\$1');


                        // console.info($('textarea#'+sanitized_id));

                        tinymce.init({
                            selector: 'textarea#'+sanitized_id,
                            height: 150,
                            plugins: ['wordpress textcolor image paste wpview media wpembed hr'],
                            toolbar: 'insertfile undo redo | styleselect | forecolor bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                            content_css: [
                            ]
                            ,statusbar: true
                            ,menubar:false
                        });


                    }else{

                        // _t.tinymce({
                        //
                        //     // Location of TinyMCE script
                        //     script_url : 'tinymce/tinymce.min.js',
                        //
                        //     // General options
                        //     theme : "modern",
                        //     plugins : "code"
                        //
                        //     //,cleanup : false
                        //     ,valid_elements : '*[*]'
                        //
                        //
                        // });
                    }

                    _t.addClass('tinymce-inited');
                });
            }

            function zoombox_init_holder_func(arg_holder){

                //console.info(arg_holder);



                arg_holder.find('textarea.tinymce-me').each(function(){
                    //return false;
                    var _t = $(this);
                    if(_t.parent().parent().parent().parent().hasClass('element-type-selector-con')){
                        return;
                    }

                    if(_t.hasClass('tinymce-inited') && _t.hasClass('destroyed-tinymce-intentionally')==false){

                        if(_t && _t.tinymce()) {
                            _t.tinymce().destroy();
                        }
                    }

                    //console.info(_t);
                    _t.tinymce({

                        // Location of TinyMCE script
                        script_url : 'tinymce/tinymce.min.js',

                        // General options
                        theme : "modern",
                        plugins : "code"

                        //,cleanup : false
                        ,valid_elements : '*[*]'


                    });

                    _t.addClass('tinymce-inited');
                });
            }

            function get_shortcode_attr(arglab, argtext){

                //console.info(argtext);

                var regex= new RegExp(arglab+'=[\'|"](\\s|\\S*?)[\'|"]','gm');


                var aux = regex.exec(argtext);

                //console.info(aux);

                if(aux&&aux[1]){
                    return aux[1];
                }else{
                    return null;
                }


            }

            function add_section(pargs){


                var margs = {
                    'extra_classes' : ''
                };

                if(pargs){
                    margs = $.extend(margs,pargs);
                }


                _theForm.append(dzspgb_settings.struct_section);
                var _c = _theForm.children('.admin-dzspgb-section').last();
                _c.find('.area-containers').eq(0).sortable(sortable_settings_containers);


                if(margs.extra_classes){
                    _c.find('input[name*="[extra_classes]"]').eq(0).val(margs.extra_classes);
                }

                update_elements_name();
                if(o.type==='editor'){
                    update_ce({
                        'call_from':'add section'
                    });
                }
            }

            function add_container(argsection,pargs){


                var margs = {
                    'extra_classes' : ''
                    ,'use_template' : ''
                };

                if(pargs){
                    margs = $.extend(margs,pargs);
                }


                argsection.find('.area-containers').eq(0).append(dzspgb_settings.struct_container);
                var _c =argsection.find('.area-containers').eq(0).children('.admin-dzspgb-container').last();
                //console.log(argsection.find('.area-containers'), _c,_c.find('input[name*="[extra_classes]"]').eq(0));
                _c.find('.area-rows').eq(0).sortable(sortable_settings_rows);


                if(margs.extra_classes){
                    _c.find('input[name*="[extra_classes]"]').eq(0).val(margs.extra_classes);
                }
                if(margs.use_template){
                    _c.find('select[name*="[use_template]"]').eq(0).val(margs.use_template);
                }

                update_elements_name();
                if(o.type==='editor'){
                    update_ce({
                        'call_from':'add container'
                    });
                }
            }
            function add_row(argcontainer){
                //console.log(argcontainer, argcontainer.hasClass('dzspgb-builder--wrap.admin-wrap'));



                var _c = null;
                if(argcontainer.hasClass('dzspgb-builder--wrap')){

                    _theForm.append(dzspgb_settings.struct_row);
                    _theForm.children().last().find('.area-row-parts').eq(0).sortable(sortable_settings_row_parts);
                }else{

                    argcontainer.find('.area-rows').eq(0).append(dzspgb_settings.struct_row);
                    argcontainer.find('.area-rows').eq(0).children().last().find('.area-row-parts').eq(0).sortable(sortable_settings_row_parts);
                }



                //_t.parent().parent().sortable();
                update_elements_name();
                if(o.type==='editor'){
                    update_ce({
                        'call_from':'add row'
                    });
                }
            }
            function add_row_empty(argcontainer,pargs){



                var margs = {
                    'extra_classes' : ''
                    ,'hide_when_logged_in' : ''
                    ,'hide_when_not_logged_in' : ''
                    ,'call_from' : ''
                    ,append_to_the_form : false
                };

                if(pargs){
                    margs = $.extend(margs,pargs);
                }
                var _c = null;
                if(margs.append_to_the_form){

                    _theForm.append(dzspgb_settings.struct_row_empty);
                    _c=_theForm.eq(0).children('.admin-dzspgb-row').last();
                }else{

                    argcontainer.find('.area-rows').eq(0).append(dzspgb_settings.struct_row_empty);
                    _c=argcontainer.find('.area-rows').eq(0).children('.admin-dzspgb-row').last();
                }

                //console.info(sortable_settings_row_parts);
                _c.find('.area-row-parts').eq(0).sortable(sortable_settings_row_parts);


                if(margs.extra_classes){
                    _c.find('input[name*="[extra_classes]"]').eq(0).val(margs.extra_classes);
                }
                if(margs.hide_when_not_logged_in){
                    _c.find('input[name*="[hide_when_not_logged_in]"]').eq(0).val(margs.hide_when_not_logged_in);
                }
                if(margs.hide_when_logged_in=='on'){
                    _c.find('input[name*="[hide_when_logged_in]"]').eq(0).prop('checked',true);
                }
                if(margs.hide_when_not_logged_in=='on'){
                    _c.find('input[name*="[hide_when_not_logged_in]"]').eq(0).prop('checked',true);
                }
                if(margs.column_padding){
                    _c.find('input.val-'+margs.column_padding+'[name*="[column_padding]"]').eq(0).prop('checked',true);
                }


                //_t.parent().parent().sortable();
                update_elements_name();
                if(o.type==='editor'){

                    if(margs.call_from!='update_pb'){

                        update_ce({
                            'call_from':'add row empty'
                        });
                    }
                }
            }
            function change_text_changer(e){
                var _t = $(this);

                //console.log(e);
                if(e.type=='change'){

                    if(_t.hasClass('dzspgb-text-changer')){
                        if(o.type==='editor'){
                            update_ce({
                                'call_from':'change text changer'
                            });
                        }

                    }



                    if(String(_t.attr('name')).indexOf('[nr_columns]')>-1){

                        //console.info(_t);

                        var _con = _t.parent().parent();

                        var nrcols = parseInt(_t.val(),10);

                        //console.info(nrcols);

                        if(nrcols<2){
                            nrcols = 2;
                        }
                        if(nrcols>4){
                            nrcols = 4;
                        }

                        _con.find('.setting[data-actuallabelcon*="item"]').show();


                        if(nrcols==2){
                            _con.find('.setting[data-actuallabelcon="item3"]').hide();
                            _con.find('.setting[data-actuallabelcon="item4"]').hide();
                        }else{

                            if(nrcols==3){
                                _con.find('.setting[data-actuallabelcon="item4"]').hide();
                            }
                        }
                    }

                    if(String(_t.attr('name')).indexOf('[is_content]')>-1){

                        //console.log(_t.prop('checked'));

                        var _cach = null;
                        if(_t.parent().parent().parent().parent().parent().parent().parent().parent().hasClass('admin-dzspgb-container')){

                            _cach = _t.parent().parent().parent().parent().parent().parent().parent().parent();

                        }else{

                            console.log('does not have class .admin-dzspgb-container');
                        }

                        if(_cach){

                            var _c2 = _cach.children('.area-rows,.dzspgb-button-con');
                            var _c3 = _cach.children('.is-content-placeholder');
                            if(_t.prop('checked')){


                                _cach.addClass('is-content-container');


                                _c2.css({
                                    'overflow': 'hidden'
                                    ,'height':_c2.outerHeight()
                                })
                                _c2.animate({
                                    'height':0
                                },{
                                    'queue':false
                                    ,duration: 300
                                })



                                _c3.css({
                                    'overflow': 'hidden'
                                    ,'height': 'auto'
                                    ,'padding':'30px'
                                })

                                var aux2 = _c3.height();


                                _c3.css({
                                    'overflow': 'hidden'
                                    ,'height': 0
                                    ,'padding':'0 30px'
                                })

                                //console.log(_t2.height(), aux2);


                                _c3.animate({
                                    'height':aux2
                                    ,'padding':'30px'
                                },{
                                    'queue':false
                                    ,duration: 300
                                    ,complete:function(e,arg1,arg2){

                                        _c3.css({
                                            'overflow': ''
                                            ,'height': ''
                                        })

                                    }
                                })
                            }else{
                                _cach.removeClass('is-content-container');


                                //console.log(_c2.css('overflow'));

                                if(_c2.css('overflow')=='hidden'){
                                    _c2.each(function(){
                                        var _t2 = $(this);
                                        //console.log(_t2);


                                        _t2.css({
                                            'overflow': 'hidden'
                                            ,'height': 'auto'
                                        })

                                        var aux2 = _t2.height();


                                        _t2.css({
                                            'overflow': 'hidden'
                                            ,'height': 0
                                        })

                                        //console.log(_t2.height(), aux2);


                                        _t2.animate({
                                            'height':aux2
                                        },{
                                            'queue':false
                                            ,duration: 300
                                            ,complete:function(e,arg1,arg2){

                                                _t2.css({
                                                    'overflow': ''
                                                    ,'height': ''
                                                })

                                            }
                                        })
                                    })




                                    _c3.css({
                                        'overflow': 'hidden'
                                        ,'height':_c3.outerHeight()
                                        ,'padding' : '30px'
                                    })
                                    _c3.animate({
                                        'height':0
                                        ,'padding':'0 30px'
                                    },{
                                        'queue':false
                                        ,duration: 300
                                    })




                                }

                            }
                        }

                        //console.log(_t, _t.parent().parent().parent().parent().parent().parent().parent().parent());

                    }
                }

            }

            function add_row_part(argrow, pargs){


                var margs = {
                    'part' : '1.1'
                };

                if(pargs){
                    margs = $.extend(margs,pargs);
                }

                //console.info(margs);
                //console.info(argrow.find('.area-row-parts').eq(0),dzspgb_settings.struct_row_part)
                argrow.find('.area-row-parts').eq(0).append(dzspgb_settings.struct_row_part);

                var _c = argrow.find('.area-row-parts').eq(0).children().last();

                _c.find('.area-row-parts').eq(0).sortable(sortable_settings_row_parts);

                // -- 2.3+1.3 handling

                if(margs.part=='1.2'){
                    _c.attr('class', 'admin-dzspgb-row-part-con dzspb_layb_one_half');
                }
                if(margs.part=='1.3'){
                    _c.attr('class', 'admin-dzspgb-row-part-con dzspb_layb_one_third');
                }
                if(margs.part=='2.3'){
                    _c.attr('class', 'admin-dzspgb-row-part-con dzspb_layb_two_third');
                }
                if(margs.part=='3.4'){
                    _c.attr('class', 'admin-dzspgb-row-part-con dzspb_layb_three_fourth');
                }
                if(margs.part=='1.4'){
                    _c.attr('class', 'admin-dzspgb-row-part-con dzspb_layb_one_fourth');
                }
                //console.info(_c.find('.admin-dzspgb-label').eq(0))
                _c.find('.admin-dzspgb-label').eq(0).html(margs.part);
                _c.find('input[name*="[part]"]').eq(0).val(margs.part);


                _c.find('.elements-area').eq(0).sortable(sortable_settings_elements);
                //_t.parent().parent().sortable();
                update_elements_name();
                if(o.type==='editor'){
                    if(margs.call_from!='update_pb'){

                        update_ce({
                            'call_from':'add row part'
                        });
                    }
                }
            }
            function add_element(argrow, pargs){

                //console.warn('add_element()', argrow, pargs);


                var margs = {
                    'type_element' : 'text'
                };

                if(pargs){
                    margs = $.extend(margs,pargs);
                }

                //console.info(margs,dzspgb_templates[margs['type']]);


                //console.info(margs['type_element'],dzspgb_templates);
                //console.info(margs);
                var aux = dzspgb_templates[margs['type_element']];


                if(aux){

                    aux=aux.replace(/'q'/g,'"');
                    //console.info(aux,argrow);

                    argrow.find('.elements-area').eq(0).append(aux);
                    var _c = argrow.find('.elements-area').eq(0).children().last();

                    var ia = 0;

                    for (var key in margs) {
                        var obj = margs[key];
                        //console.info(key,obj);

                        var _c3  = _c.find('input[name*="['+key+']"],textarea[name*="['+key+']"],select[name*="['+key+']"]').eq(0);


                        if(_c3.attr('type')=='checkbox'){
                            //console.log(_c3, _c3.attr('value'), obj);

                            if(_c3.val() == obj){
                                _c3.prop('checked',true);
                            }else{

                                _c3.prop('checked',false);
                            }
                        }else{

                            _c3.val(obj);
                        }
                    }



                    //console.info("ADD SORTABLE TO ITEMS", _c.find('.dzspgb-multiple-items-con'));
                    _c.find('.dzspgb-multiple-items-con').sortable(sortable_settings_multiple_items);
                }else{
                    console.info('template - '+margs.type_element+' not found');
                }

                return false;

                //console.info(margs);
                //console.info(argrow.find('.area-row-parts').eq(0),dzspgb_settings.struct_row_part)


                _c.find('.area-row-parts').eq(0).sortable(sortable_settings_row_parts);

                if(margs.part=='1.2'){
                    _c.attr('class', 'admin-dzspgb-row-part-con dzspb_layb_one_half');
                }
                if(margs.part=='1.3'){
                    _c.attr('class', 'admin-dzspgb-row-part-con dzspb_layb_one_third');
                }
                if(margs.part=='2.3'){
                    _c.attr('class', 'admin-dzspgb-row-part-con dzspb_layb_two_third');
                }
                if(margs.part=='1.4'){
                    _c.attr('class', 'admin-dzspgb-row-part-con dzspb_layb_one_fourth');
                }
                //console.info(_c.find('.admin-dzspgb-label').eq(0))
                _c.find('.admin-dzspgb-label').eq(0).html(margs.part);
                _c.find('input[name*="[part]"]').eq(0).val(margs.part);
                //_t.parent().parent().sortable();
                update_elements_name();
                if(o.type==='editor'){
                    update_ce({
                        'call_from':'add element'
                    });
                }
            }


            function add_item(argcon, pargs){

                //console.info('add_item()');

                var _t = argcon;

                var margs = {

                };

                if(pargs){
                    margs = $.extend(margs,pargs);
                }


                var _item = _t.parent();
                var _con = null;




                var _c = _t.find('.for-clone-item').eq(0);

                //console.info(_c,_t.find(".btn-add-item"));

                _t.find(".btn-add-item").before(_c.clone());

                _t.find(".btn-add-item").prev().find('.do-not-treat').removeClass('do-not-treat');




                var _c2 = _t.find('.dzspgb-item').last();

                _c2.removeClass('for-clone-item');


                for (var key in margs) {
                    var obj = margs[key];
                    //console.info(key,obj);



                    obj = String(obj).replace(/\{replacequotquot\}/g, '"');


                    _c2.find('*[data-actuallabel="'+key+'"]').eq(0).val(obj);
                }


                setTimeout(function(){
                },5);
                if(window.dzsuploader_single_init){

                    //console.info($('.elements-area > .dzspgb-element-con .dzs-single-upload:not(.do-not-treat),.zoombox-maincon .dzs-single-upload:not(.do-not-treat)'));
                    window.dzsuploader_single_init('.elements-area > .dzspgb-element-con .dzs-single-upload:not(.do-not-treat),.zoombox-maincon .dzs-single-upload:not(.do-not-treat)', {});
                }


                return false;


            }

            function generates_non_actives(){


                $('.area-row-parts').each(function(){
                    var _t = $(this);

                    while(_t.children().length<5){

                        _t.append(dzspgb_settings.struct_row_part_nonactive);
                        //break;
                    }
                });

            }
            function remove_non_actives(){
                $('.admin-dzspgb-row-part-con.nonactive').remove();
            }


            function action_edit_element(){

                console.warn('action_edit_element');



                $('.elements-area > .dzspgb-element-con > .dzspgb-element-type').each(function(){
                    var _t = $(this);

                    var _con = null;
                    // console.info(_t);

                    if(_t.children('.the-excerpt-real').length){

                        _con = _t.parent();

                        var _c = _t.children('.the-excerpt-real').eq(0);

                        var str = _c.html();

                        if(_c.data('excerpt-real')){
                            str = _c.data('excerpt-real');
                        }else{
                            _c.data('excerpt-real', str);
                        }

                        var _hc = _con.find('.hidden-content').eq(0);

                        // console.info(str);


                        var reg = /{{(.*?)}}/g;

                        var finalstr = str;

                        var aux;

                        while(aux = reg.exec(str)){

                            // console.info(aux, _hc.find('*[name*="'+aux[1]+'"]'));

                            var finalval = _hc.find('*[name*="'+aux[1]+'"]').val();

                            // console.log("EDITOR");
                            if(window.tinyMCE){

                                // var ed = tinyMCE.get(_hc.find('*[name*="'+aux[1]+'"]').eq(0).attr('id'));
                                //
                                // console.log("EDITOR");
                                // console.info(ed);
                            }

                            finalstr = finalstr.replace(aux[0], finalval);






                        }


                        var reg2 = /<script[\s|\S]*?>[\s|\S]*?<\/script>/gm;

                        finalstr = finalstr.replace(reg2, '');

                        // return;
                        _c.html(finalstr);

                    }
                })
            }

            function sanitize_for_front_end(arg){
                arg = arg.replace(/{replacequotquot}/g,"\"");
                return arg;
            }

            function handle_mouse(e){
                var _t = $(this);
                var _con = _t.parent();

                //console.log(_t, e.type);

                if(e.type=='click'){
                    if(_t.hasClass('dzspgb-add-section')){
                        add_section();
                    }
                    if(_t.hasClass('dzspgb-add-container')){
                        //console.info(_t.parent().parent())
                        add_container(_t.parent().parent());
                    }
                    if(_t.hasClass('dzspgb-add-row')){


                        //console.log(_t.parent().parent())
                        add_row(_t.parent().parent());
                    }


                    //console.info(_t);

                    if(_t.hasClass('settings-button-con')){
                        //console.info(_t);
                        var ind = _t.parent().parent().children().index(_t.parent());

                        //console.info(ind);
                        //

                        //console.info(_t.parent().find('.hidden-content').eq(0),  _t.parent().find('.hidden-content').eq(0).find('.btn-delete-itm').eq(0));

                        _t.parent().find('.hidden-content').eq(0).find('.btn-delete-itm').eq(0).attr('data-index',ind);
                        $.fn.zoomBox.open(_t.parent().find('.hidden-content').eq(0), 'inlinecontent', {'bigwidth' : 1170,'bigheight' : 500, 'extra_classes' : '', forcenodeeplink: 'on',inline_content_move: 'on', dims_scaling: 'fill'});





                            return false;
                    }

                    if(_t.hasClass('delete-handler-for-multiple-items')){
                        //console.info(_t);
                        _t.parent().remove()

                        return false;
                    }
                    if(_t.hasClass('clone-handler-for-elements')){
                        //console.info(_t);

                        _t.parent().parent().parent().append(_t.parent().parent().clone());


                        var _cloned = _t.parent().parent().parent().children().last();



                        init_listeners({
                            'target':_cloned
                        })


                        if(o.edit_in_zoombox=='on'){

                        }else{

                        }

                        setTimeout(function(){
                            update_ce({
                                'call_from':'clone handler'
                            });
                        },500);

                        return false;
                    }

                    if(_t.hasClass('btn-add-page')){

                    }
                    if(_t.hasClass('button-save-template')){


                        //console.info($('.dzspgb-form').eq(0).serializeAnything());
                        //console.info($('.dzspgb-form').eq(0), $('.dzspgb-form').eq(0).serialize());

                        remove_non_actives();


                        $.ajax({
                            url: "admin.php",
                            type: "POST",
                            data: { action : 'save_template', template_name: $('input[name="template_name"]').eq(0).val(), postdata: $('.dzspgb-form').eq(0).serializeAnything() }

                            ,complete: function(res){
                                console.info(res);
                            }
                        });
                    }

                    if(_t.hasClass('btn-done-editing')){



                        console.info("DONE EDITING");
                        if(o.edit_in_zoombox=='on'){

                            window.api_close_zoombox();
                        }else{

                            if(_t.parent().parent().parent().hasClass('dzspgb-element-edit-con')){

                                _con = _t.parent().parent().parent();
                            }

                            if(_t.parent().parent().parent().parent().hasClass('dzspgb-element-edit-con')){

                                _con = _t.parent().parent().parent().parent();

                            if(!(_con.data('_type-element'))){

                                console.warn(_con.parent().parent());

                                if(_con.parent().parent().hasClass('dzspgb-element-type')){
                                    _con.data('_type-element',_con.parent().parent());
                                }
                            }

                            }
                            console.info(_con, _con.data('_type-element'))
                            if(_con.data('_type-element')){

                                var _c2 = _con.data('_type-element');

                                if(_c2.hasClass('dzspgb-element-con')){
                                    _c2 = _c2.find('.dzspgb-element-type').eq(0);
                                }

                                _c2.before(_con.children('.hidden-content'));

                                // console.info(_con);
                                _con.removeClass('active');
                            }else{

                            }

                        }

                        setTimeout(function(){
                            if(o.type=='editor'){
                                update_ce({
                                    'call_from':'done editing'
                                });
                            }
                            action_edit_element();
                        },500);
                        setTimeout(function(){
                        },1500);



                        return false;

                    }

                    if(_t.hasClass('btn-delete-itm') && _t.hasClass('btn-delete-element')==false){

                        console.log('STARTING DELETE ITEM', _t);

                        var ind = _t.attr('data-index');

                        if(_t.hasClass('btn-delete-container')){
                            ind = '';

                        }
                        if(_t.hasClass('btn-delete-row')){
                            ind = '';

                        }



                        if(_t.hasClass('btn-delete-element')){
                            ind='';
                        }

                        var r = confirm("Are you sure you want to delete item "+ind);
                        if (r == true) {

                            //console.info(_t.hasClass('btn-delete-section'),_theForm.find('.admin-dzspgb-section').eq(ind) );
                            if(_t.hasClass('btn-delete-section')){
                                _theForm.find('.admin-dzspgb-section').eq(ind-1).remove();
                            }

                            if(_t.hasClass('btn-delete-container')){
                                if(_t.parent().parent().parent().parent().parent().hasClass('admin-dzspgb-container')){
                                    _t.parent().parent().parent().parent().parent().remove();
                                    update_elements_name();
                                }
                            }
                            if(_t.hasClass('btn-delete-row')){
                                //console.log(_t.parent().parent().parent().parent().parent());
                                if(_t.parent().parent().parent().parent().parent().hasClass('admin-dzspgb-row')){
                                    _t.parent().parent().parent().parent().parent().remove();
                                    update_elements_name();
                                }
                            }


                            if(_t.hasClass('btn-delete-element')){


                                //console.log('ceva', _t.data('delete_target'))


                                if(_t.data('delete_target')){
                                    $(_t.data('delete_target')).remove();

                                    window.api_close_zoombox();

                                    update_elements_name();
                                }
                            }

                        }



                        if(_t.hasClass('btn-delete-section')){

                            window.api_close_zoombox();
                        }



                        if(o.type=='editor'){
                            update_ce({
                                'call_from':'delete itm'
                            });
                        }


                        if(o.is_wp=='on'){
                            return false;
                        }
                    }

                    // -- normal element delete
                    if(_t.hasClass('btn-delete-element')){


                        console.log('deleting element', _t.data('delete_target'))


                        var r = confirm("Are you sure you want to delete item "+ind);
                        if (r == true) {
                            if (_t.data('delete_target')) {
                                $(_t.data('delete_target')).remove();

                                window.api_close_zoombox();

                                update_elements_name();


                                if (o.type == 'editor') {
                                    update_ce({
                                        'call_from':'delete element'
                                    });
                                }
                            }
                        }
                    }


                    if(_t.hasClass('add-element-label')){
                        _con.addClass('active');
                        console.log(' -- this is where elements get shown')
                        //console.info(_con.find('.element-type-selector-con').eq(0).height());

                        //console.info(_con.parent().parent().parent(), _con.parent().parent().parent().hasClass('nonactive'), _con.parent().parent().parent().hasClass('dzspb_layb_one_full'))
                        if( ! (_con.parent().parent().parent().hasClass('nonactive') || _con.parent().parent().parent().hasClass('dzspb_layb_one_full') ) ){
                            //console.info(_con.parent().parent().parent())

                            _con.parent().addClass('absolute-width');
                            _con.parent().width(_con.parent().parent().parent().parent().width()-30);

                            _con.parent().css({
                                'margin-left' : (_con.parent().parent().parent().parent().offset().left - _con.parent().offset().left+15) + 'px'
                            })


                            setTimeout(function(){
                                $(window).trigger('resize')
                            },2000);
                        }

                        //console.log(_con);

                        console.log(_con.parent(), _con.parent().outerWidth(),_con.parent().parent(),_con.parent().parent().parent().parent().outerWidth());
                        _con.find('.element-type-selector-con').eq(0).width(_con.parent().parent().parent().parent().width()-80);
                        _con.height(_con.find('.element-type-selector-con').eq(0).outerHeight()+40);


                        setTimeout(function(){
                            _con.find('.element-type-selector-con').eq(0).css('width', '');
                            //_con.height
                        },500);
                    }
                    if(_t.hasClass('close-element-type-label')){
                        _con = _t.parent().parent();
                        _con.removeClass('active');

                        //console.info(_con);

                        _con.parent().css({
                            'margin-left' : ''
                            ,'width' : ''
                        })

                        _con.parent().removeClass('absolute-width');
                        _con.css('height','');
                    }
                    if(_t.hasClass('dzspgb-template-saver')){
                        console.info('here continue..');

                        return false;
                    }


                    if(_t.hasClass('layout-type-con')){

                        if(_t.parent().parent().parent().parent().parent().hasClass('admin-dzspgb-row')){
                            _con = _t.parent().parent().parent().parent().parent();
                        }


                        var aux_lay = _t.attr('data-layout');
                        var _c = null;
                        //console.log(_con, aux_lay);

                        if(aux_lay=='1.1'){
                            _c = _con.find('.area-row-parts').children().eq(0);
                            _c.attr('class', 'admin-dzspgb-row-part-con dzspb_layb_one_full');
                            _c.find('.admin-dzspgb-label').html('1.1');
                            _c.find('input[name*="[part]"]').eq(0).val('1.1');

                            _c = _con.find('.area-row-parts').children().eq(1);
                            _c.attr('class', 'admin-dzspgb-row-part-con nonactive')
                            _c.find('.admin-dzspgb-label').html('nonactive');
                            _c.find('input[name*="[part]"]').eq(0).val('nonactive');

                            _c = _con.find('.area-row-parts').children().eq(2);
                            _c.attr('class', 'admin-dzspgb-row-part-con nonactive')
                            _c.find('.admin-dzspgb-label').html('nonactive');
                            _c.find('input[name*="[part]"]').eq(0).val('nonactive');
                            _c = _con.find('.area-row-parts').children().eq(3);
                            _c.attr('class', 'admin-dzspgb-row-part-con nonactive')
                            _c.find('.admin-dzspgb-label').html('nonactive');
                            _c.find('input[name*="[part]"]').eq(0).val('nonactive');
                        }
                        if(aux_lay=='1.2+1.2'){
                            _c = _con.find('.area-row-parts').children().eq(0);
                            _c.attr('class', 'admin-dzspgb-row-part-con dzspb_layb_one_half');
                            _c.find('.admin-dzspgb-label').html('1.2');
                            _c.find('input[name*="[part]"]').eq(0).val('1.2');

                            _c = _con.find('.area-row-parts').children().eq(1);
                            _c.attr('class', 'admin-dzspgb-row-part-con dzspb_layb_one_half')
                            _c.find('.admin-dzspgb-label').html('1.2');
                            _c.find('input[name*="[part]"]').eq(0).val('1.2');

                            _c = _con.find('.area-row-parts').children().eq(2);
                            _c.attr('class', 'admin-dzspgb-row-part-con nonactive')
                            _c.find('.admin-dzspgb-label').html('nonactive');
                            _c.find('input[name*="[part]"]').eq(0).val('nonactive');
                            _c = _con.find('.area-row-parts').children().eq(3);
                            _c.attr('class', 'admin-dzspgb-row-part-con nonactive')
                            _c.find('.admin-dzspgb-label').html('nonactive');
                            _c.find('input[name*="[part]"]').eq(0).val('nonactive');
                        }
                        if(aux_lay=='1.3+1.3+1.3'){
                            _c = _con.find('.area-row-parts').children().eq(0);
                            _c.attr('class', 'admin-dzspgb-row-part-con dzspb_layb_one_third');
                            _c.find('.admin-dzspgb-label').html('1.3');
                            _c.find('input[name*="[part]"]').eq(0).val('1.3');

                            _c = _con.find('.area-row-parts').children().eq(1);
                            _c.attr('class', 'admin-dzspgb-row-part-con dzspb_layb_one_third')
                            _c.find('.admin-dzspgb-label').html('1.3');
                            _c.find('input[name*="[part]"]').eq(0).val('1.3');

                            _c = _con.find('.area-row-parts').children().eq(2);
                            _c.attr('class', 'admin-dzspgb-row-part-con dzspb_layb_one_third')
                            _c.find('.admin-dzspgb-label').html('1.3');
                            _c.find('input[name*="[part]"]').eq(0).val('1.3');


                            _c = _con.find('.area-row-parts').children().eq(3);
                            _c.attr('class', 'admin-dzspgb-row-part-con nonactive')
                            _c.find('.admin-dzspgb-label').html('nonactive');
                            _c.find('input[name*="[part]"]').eq(0).val('nonactive');
                        }
                        if(aux_lay=='1.3+2.3'){
                            _c = _con.find('.area-row-parts').children().eq(0);
                            _c.attr('class', 'admin-dzspgb-row-part-con dzspb_layb_one_third');
                            _c.find('.admin-dzspgb-label').html('1.3');
                            _c.find('input[name*="[part]"]').eq(0).val('1.3');

                            _c = _con.find('.area-row-parts').children().eq(1);
                            _c.attr('class', 'admin-dzspgb-row-part-con dzspb_layb_two_third')
                            _c.find('.admin-dzspgb-label').html('2.3');
                            _c.find('input[name*="[part]"]').eq(0).val('2.3');

                            _c = _con.find('.area-row-parts').children().eq(2);
                            _c.attr('class', 'admin-dzspgb-row-part-con nonactive')
                            _c.find('.admin-dzspgb-label').html('nonactive');
                            _c.find('input[name*="[part]"]').eq(0).val('nonactive');
                            _c = _con.find('.area-row-parts').children().eq(3);
                            _c.attr('class', 'admin-dzspgb-row-part-con nonactive')
                            _c.find('.admin-dzspgb-label').html('nonactive');
                            _c.find('input[name*="[part]"]').eq(0).val('nonactive');
                        }
                        if(aux_lay=='2.3+1.3'){
                            //console.info(aux_lay);
                            _c = _con.find('.area-row-parts').children().eq(0);
                            _c.attr('class', 'admin-dzspgb-row-part-con dzspb_layb_two_third')
                            _c.find('.admin-dzspgb-label').html('2.3');
                            _c.find('input[name*="[part]"]').eq(0).val('2.3');


                            _c = _con.find('.area-row-parts').children().eq(1);
                            _c.attr('class', 'admin-dzspgb-row-part-con dzspb_layb_one_third');
                            _c.find('.admin-dzspgb-label').html('1.3');
                            _c.find('input[name*="[part]"]').eq(0).val('1.3');


                            _c = _con.find('.area-row-parts').children().eq(2);
                            _c.attr('class', 'admin-dzspgb-row-part-con nonactive')
                            _c.find('.admin-dzspgb-label').html('nonactive');
                            _c.find('input[name*="[part]"]').eq(0).val('nonactive');
                            _c = _con.find('.area-row-parts').children().eq(3);
                            _c.attr('class', 'admin-dzspgb-row-part-con nonactive')
                            _c.find('.admin-dzspgb-label').html('nonactive');
                            _c.find('input[name*="[part]"]').eq(0).val('nonactive');
                        }
                        if(aux_lay=='3.4+1.4'){
                            //console.info(aux_lay);
                            _c = _con.find('.area-row-parts').children().eq(0);
                            _c.attr('class', 'admin-dzspgb-row-part-con dzspb_layb_three_fourth')
                            _c.find('.admin-dzspgb-label').html('3.4');
                            _c.find('input[name*="[part]"]').eq(0).val('3.4');


                            _c = _con.find('.area-row-parts').children().eq(1);
                            _c.attr('class', 'admin-dzspgb-row-part-con dzspb_layb_one_fourth');
                            _c.find('.admin-dzspgb-label').html('1.4');
                            _c.find('input[name*="[part]"]').eq(0).val('1.4');


                            _c = _con.find('.area-row-parts').children().eq(2);
                            _c.attr('class', 'admin-dzspgb-row-part-con nonactive')
                            _c.find('.admin-dzspgb-label').html('nonactive');
                            _c.find('input[name*="[part]"]').eq(0).val('nonactive');
                            _c = _con.find('.area-row-parts').children().eq(3);
                            _c.attr('class', 'admin-dzspgb-row-part-con nonactive')
                            _c.find('.admin-dzspgb-label').html('nonactive');
                            _c.find('input[name*="[part]"]').eq(0).val('nonactive');
                        }
                        if(aux_lay=='1.4+1.4+1.2'){
                            _c = _con.find('.area-row-parts').children().eq(0);
                            _c.attr('class', 'admin-dzspgb-row-part-con dzspb_layb_one_fourth');
                            _c.find('.admin-dzspgb-label').html('1.4');
                            _c.find('input[name*="[part]"]').eq(0).val('1.4');

                            _c = _con.find('.area-row-parts').children().eq(1);
                            _c.attr('class', 'admin-dzspgb-row-part-con dzspb_layb_one_fourth')
                            _c.find('.admin-dzspgb-label').html('1.4');
                            _c.find('input[name*="[part]"]').eq(0).val('1.4');

                            _c = _con.find('.area-row-parts').children().eq(2);
                            _c.attr('class', 'admin-dzspgb-row-part-con dzspb_layb_one_half');
                            _c.find('.admin-dzspgb-label').html('1.2');
                            _c.find('input[name*="[part]"]').eq(0).val('1.2');

                            _c = _con.find('.area-row-parts').children().eq(3);
                            _c.attr('class', 'admin-dzspgb-row-part-con nonactive')
                            _c.find('.admin-dzspgb-label').html('nonactive');
                            _c.find('input[name*="[part]"]').eq(0).val('nonactive');
                        }
                        if(aux_lay=='1.4+1.4+1.4+1.4'){
                            _c = _con.find('.area-row-parts').children().eq(0);
                            _c.attr('class', 'admin-dzspgb-row-part-con dzspb_layb_one_fourth');
                            _c.find('.admin-dzspgb-label').html('1.4');
                            _c.find('input[name*="[part]"]').eq(0).val('1.4');
                            _c = _con.find('.area-row-parts').children().eq(1);
                            _c.attr('class', 'admin-dzspgb-row-part-con dzspb_layb_one_fourth')
                            _c.find('.admin-dzspgb-label').html('1.4');
                            _c.find('input[name*="[part]"]').eq(0).val('1.4');
                            _c = _con.find('.area-row-parts').children().eq(2);
                            _c.attr('class', 'admin-dzspgb-row-part-con dzspb_layb_one_fourth');
                            _c.find('.admin-dzspgb-label').html('1.4');
                            _c.find('input[name*="[part]"]').eq(0).val('1.4');
                            _c = _con.find('.area-row-parts').children().eq(3);
                            _c.attr('class', 'admin-dzspgb-row-part-con dzspb_layb_one_fourth')
                            _c.find('.admin-dzspgb-label').html('1.4');
                            _c.find('input[name*="[part]"]').eq(0).val('1.4');
                        }


                        update_elements_name();
                        if(o.type==='editor'){
                            update_ce({
                                'call_from':'handle mouse .. after update_elements_name'
                            });
                        }

                        return false;
                    }

                    if(_t.hasClass('dzspgb-button-choose')){
                        var _item = _t.parent();
                        var _itemCon = null;
                        var _con = null;
                        var _itemConEdit = null;




                        // console.info(e.target, e.currentTarget, _theForm);


                        if($(e.target).hasClass('dzspgb-button-choose')==false){
                            return;
                        }
                        if(_t.children('.dzspgb-element-edit-con').length){

                        }

                        if(_t.children('.dzspgb-element-edit-con').length){

                            // console.warn("YES", _t,  _t.children('.dzspgb-element-edit-con').hasClass('active'));
                            if(_t.children('.dzspgb-element-edit-con').hasClass('active')){
                                _t.children('.dzspgb-element-edit-con').find('.btn-done-editing').trigger('click');

                                return false;
                            }
                        }


                        _theForm.find('.dzspgb-element-edit-con.active').each(function(){
                            var _t2 = $(this);

                            _t2.find('.btn-done-editing').trigger('click');



                            // console.info('active dzspgb element edit con - ',_t2);

                        })



                        if(_item.parent().parent().hasClass('elements-area')){
                            // --- edit element here

                            _itemCon = _t.parent().parent();

                            //console.info(_item,_item.find('.hidden-content'));

                            //console.log(_t.parent());

                            var auxw = 800;
                            var auxh = 600;

                            if(_t.parent().hasClass('the-type-divider')){
                                auxw = 400;
                                auxh = 400;
                            }
                            if(_t.parent().hasClass('the-type-query')){
                                auxw = 400;
                                auxh = 800;
                            }
                            if(_t.parent().hasClass('the-type-image')){
                                auxw = 400;
                                auxh = 400;

                            }



                            console.info("EDIT ELEMENT", _t, _itemCon);



                            if(o.edit_in_zoombox=='on'){
                                $.fn.zoomBox.open(_item.parent().find('.hidden-content').eq(0), 'inlinecontent', {'bigwidth' : auxw,'bigheight' : auxh, 'extra_classes' : '', forcenodeeplink: 'on',inline_content_move: 'on', dims_scaling: 'fill'});

                                setTimeout(function(){

                                    $('.hidden-content.the-type-pricing_table input[name*="[nr_columns]"]').trigger('change');
                                },1500);
                                setTimeout(function(){

                                    $('.hidden-content.the-type-pricing_table input[name*="[nr_columns]"]').trigger('change');
                                },3000);
                            }else{




                                create_element_edit_con(_t,_item,_itemCon);

                                var _itemConEdit = _t.children('.dzspgb-element-edit-con');


                                _itemConEdit.append(_itemCon.children('.hidden-content'));


                                _itemConEdit.find('.tinymce-me').each(function() {
                                    var _t2 = $(this);

                                    if (_t2.hasClass('removed-controls-temp')) {


                                        var sanitized_id = _t2.attr('id');
                                        // sanitized_id = sanitized_id.replace(/(\[|\])/g, '\\$1');

                                        tinymce.execCommand('mceAddEditor', false, sanitized_id);

                                        _t2.removeClass('removed-controls-temp')

                                    }
                                });
                            }



                        }else{
                            // -- add element here


                            if(_item.parent().parent().parent().parent().parent().hasClass('admin-dzspgb-row-part')){
                                _con  = _item.parent().parent().parent().parent().parent();

                                _t.parent().parent().parent().find('.close-element-type-label').eq(0).trigger('click');


                                // -- actually add the item
                                _con.find('.elements-area').eq(0).append(_item.parent().clone());
                                // -- actually add the item END





                                _con.find('.elements-area').eq(0).children().last().find('.dzspgb-button.dzspgb-button-choose').html("Edit");
                                _con.find('.elements-area').eq(0).children().last().find('input,textarea,select').each(function(){

                                    var _t3 = $(this);
                                    //console.info(_t);

                                    var auxb = _t3.attr('name');
                                    if(auxb){
                                        auxb = auxb.replace('newelement','dzspgb');
                                        _t3.attr('name',auxb);
                                    }

                                })



                                var _theitem = _con.find('.elements-area').eq(0).children().last();



                                _theitem.find('.dzspgb-multiple-items-con:not(".added-sortable")').sortable(sortable_settings_multiple_items);
                                _theitem.find('.dzspgb-multiple-items-con').addClass('added-sortable');



                                if(_theitem.children('.dzspgb-element-type').eq(0).hasClass('the-type-image')){
                                    //_theitem.find($('.dzs-single-upload'));
                                }




                                update_elements_name();




                                if(o.type==='editor'){
                                    update_ce();
                                }
                            }



                            setTimeout(function(){

                                if(window.dzsuploader_single_init){

                                    console.info($('.elements-area > .dzspgb-element-con .dzs-single-upload:not(.do-not-treat)'));
                                    window.dzsuploader_single_init('.elements-area > .dzspgb-element-con .dzs-single-upload:not(.do-not-treat)', {});
                                }
                            },500)
                        }



                    }
                    if(_t.hasClass('btn-add-item')){
                        var _item = _t.parent();
                        var _con = null;



                        add_item(_item);


                        update_elements_name();


                        if(o.type==='editor'){
                            update_ce();
                        }


                    }

                }

            }


            function create_element_edit_con(_t,_item, _itemCon){

                if(!_t.children('.dzspgb-element-edit-con').length){
                    _t.append('<span class="dzspgb-element-edit-con"></span>');


                }

                var _itemConEdit = _t.children('.dzspgb-element-edit-con');


                // console.info("THE ITEM - ",_t,_item, _itemCon);
                _itemConEdit.data('_type-element', _item);

                _itemConEdit.html('');

                _itemConEdit.addClass('active');




                console.info(_itemCon, _itemCon.find('.hidden-content').length);


                _itemCon.find('.hidden-content').find('.tinymce-me').each(function(){
                    var _t2 = $(this);

                    console.info(_t2);


                    if(_t2.hasClass('removed-controls-temp')==false){


                        var sanitized_id = _t2.attr('id');
                        // sanitized_id = sanitized_id.replace(/(\[|\])/g, '\\$1');

                        tinymce.execCommand('mceRemoveEditor', false, sanitized_id);

                        _t2.addClass('removed-controls-temp')

                    }
                })

            }


            function handle_resize(){
                $('.dzspgb-add-element.active').each(function(){
                    var _t = $(this);

                    _t.height(_t.children('.element-type-selector-con').eq(0).height());
                })
            }

            function calculate_dims(){


            }

            function update_template_type(arg){




                //console.info(arg);

                if(o.mode=='Full' && arg=='Row'){

                    var p = confirm("Change mode to Row? ");

                    if(p){
                        var args = {
                            mode : "Row"
                        }

                        update_settings(args);

                        _theForm.prepend(_theForm.find('.admin-dzspgb-container').eq(0).find('.area-rows').eq(0));

                        _theForm.children('.admin-dzspgb-section').remove();

                        update_elements_name();

                        //console.info(o);

                        if(_theForm.children('input[name="dzspgb[type]"]').length==0){

                            _theForm.append('<input type="hidden" name="dzspgb[type]" value="Row"/>');
                        }else{
                            _theForm.children('input[name="dzspgb[type]"]').val('Row');
                        }

                        _theForm.children('.main-add-con').html('<span class="dzspgb-button dzspgb-add-row"><i class="fa fa-plus-square"></i><span>Add Row</span></span>');
                    }


                }

                if(o.mode=='Row' && arg=='Full'){

                    var p = confirm("Change mode to Row? ");

                    if(p){
                        var args = {
                            mode : "Full"
                        }

                        update_settings(args);

                        _theForm.prepend(_theForm.find('.admin-dzspgb-container').eq(0).find('.area-rows').eq(0));

                        _theForm.children('.admin-dzspgb-section').remove();

                        update_elements_name();

                        //console.info(o);

                        if(_theForm.children('input[name="dzspgb[type]"]').length==0){

                            _theForm.append('<input type="hidden" name="dzspgb[type]" value="Full"/>');
                        }else{
                            _theForm.children('input[name="dzspgb[type]"]').val('Full');
                        }

                        _theForm.children('.main-add-con').html('<span class="dzspgb-button dzspgb-add-row"><i class="fa fa-plus-square"></i><span>Add Row</span></span>');
                    }


                }

                return false;
            }

            function update_elements_name(){

                // console.info('update_elements_name()');


                dzssel_init('select.dzs-style-me', {init_each: true});

                if(o.mode=='Full'){


                    var i1=0
                    ,i2=0
                    ,i3=0
                    ,i4=0
                    ,i5=0
                    ;


                    for(i1=0;i1 < _theForm.find('.admin-dzspgb-section').length;i1++){
                        var _c1 =  _theForm.find('.admin-dzspgb-section').eq(i1);



                        _c1.find('input,select').each(function(){
                            var _t = $(this);

                            var aux1 = _t.attr('name');

                            if(aux1){

                                aux1 = aux1.replace(/(dzspgb\[)(.*?)(\].*).*/g, "$1"+i1+"$3");
                            }


                            _t.attr('name',aux1);
                        })


                        //console.info(_c1.find('.admin-dzspgb-container'));

                        for(i2=0;i2 < _c1.find('.admin-dzspgb-container').length;i2++){
                            var _c2 =  _c1.find('.admin-dzspgb-container').eq(i2);



                            _c2.find('input,select').each(function(){
                                var _t = $(this);

                                //console.info(_t);

                                var aux2 = _t.attr('name');
                                if(_t.hasClass('btn-delete-itm')){

                                }

                                if(aux2){

                                    aux2 = aux2.replace(/(dzspgb\[.*?\]\[)(.*?)(\].*)/g, "$1"+i2+"$3")
                                }


                                _t.attr('name',aux2);
                            })




                            for(i3=0;i3 < _c2.find('.admin-dzspgb-row').length;i3++){
                                var _c3 =  _c2.find('.admin-dzspgb-row').eq(i3);



                                _c3.find('input').each(function(){
                                    var _t = $(this);

                                    var aux2 = _t.attr('name');

                                    if(aux2){

                                        aux2 = aux2.replace(/(dzspgb\[.*?\]\[.*?\]\[)(.*?)(\].*)/g, "$1"+i3+"$3")
                                    }


                                    _t.attr('name',aux2);
                                })


                                for(i4=0;i4 < _c3.find('.admin-dzspgb-row-part-con').length;i4++){
                                    var _c4 =  _c3.find('.admin-dzspgb-row-part-con').eq(i4);


                                    //console.info(_c4);

                                    _c4.find('input').each(function(){
                                        var _t = $(this);

                                        var aux3 = _t.attr('name');

                                        //console.info(aux3);
                                        if(aux3){

                                            aux3 = aux3.replace(/(dzspgb\[.*?\]\[.*?\]\[.*?\]\[)(.*?)(\].*)/g, "$1"+i4+"$3");
                                        }
                                        //console.log(aux3);


                                        _t.attr('name',aux3);
                                    })


                                    //console.info(_c4,_c4.find('.elements-area > .admin-dzspgb-row-part-con'));
                                    for(i5=0;i5 < _c4.find('.elements-area > .dzspgb-element-con').length;i5++){
                                        var _c5 =  _c4.find('.elements-area > .dzspgb-element-con').eq(i5);


                                        //console.info(_c5, _c5.find('input,textarea,select'), window._zoombox_maincon);


                                        _c5.find('.dzspgb-multiple-items-con').data('itemindex',0);



                                        //var _findin = _c5;

                                        _c5.find('input,textarea,select').each(function(){
                                            var _t5 = $(this);

                                            var aux5 = _t5.attr('name');

                                            //console.log("HAS", _t5, _t5.hasClass('dzspgb-item--field--typer'), aux5_regex_r);

                                            if(_t5.hasClass('btn_upl')){
                                                return;
                                            }

                                            var aux5_regex = /\[[a-z].*?\]/g;
                                            if(_t5.hasClass('dzspgb-item--field')){
                                                var aux5_regex_r = aux5_regex.exec(aux5);

                                                if(_t5.parent().hasClass('for-clone-item')){
                                                    return;
                                                }


                                                if(_t5.hasClass('dzspgb-item--field') ){

                                                    if(aux5_regex_r){

                                                        aux5_regex_r = aux5_regex_r[0];
                                                    }

                                                    //var aux23 = 'dzspgb['+i1+']['+i2+']['+i3+']['+i4+']['+i5+']'+aux5_regex_r+'';

                                                    var aux23 = '';

                                                    if(_t5.parent().parent().hasClass('dzspgb-multiple-items-con')){
                                                        aux23 = _t5.parent().parent().attr('data-startname') + '['+( Number(_t5.parent().parent().children('.dzspgb-item').index(_t5.parent()))-1) + ']' + '[' + _t5.attr('data-actuallabel') + ']' ;
                                                    }

                                                    //console.info('here in hidden content -> ',_t5, _t5.hasClass('dzspgb-item--field'), aux5);
                                                    //console.log(aux23);

                                                    _t5.attr('name',aux23);


                                                }




                                            }else{
                                                if(aux5){
                                                    var aux5_regex_r = aux5_regex.exec(aux5);
                                                    //console.log("DOES NOT HAVE ITEM FIELD", _t5, _t5.hasClass('dzspgb-item--field--typer'), aux5_regex_r);

                                                    if(aux5_regex_r && aux5_regex_r[0]){
                                                        aux5_regex_r = aux5_regex_r[0];


                                                        var aux24 = 'dzspgb['+i1+']['+i2+']['+i3+']['+i4+']['+i5+']'+aux5_regex_r+'';

                                                        if(_t5.hasClass('dzspgb-item--field--typer')){
                                                            aux24+='[type]';
                                                        }

                                                        _t5.attr('name',aux24);


                                                        if(_t5.hasClass('dzspgb-item--field')){

                                                            //console.log(_t5);
                                                            var _ccon = null;
                                                            //console.info(_t5);

                                                            if(_t5.parent().parent().hasClass('dzspgb-multiple-items-con')){
                                                                _ccon=_t5.parent().parent();
                                                            }


                                                            if(_ccon){

                                                                var auxind = _c5.find('.dzspgb-multiple-items-con').data('itemindex');

                                                                _t5.attr('name','dzspgb['+i1+']['+i2+']['+i3+']['+i4+']['+i5+']'+aux5_regex_r+'['+auxind+']'+'['+_t5.attr('data-actuallabel')+']');

                                                                auxind++;

                                                                _c5.find('.dzspgb-multiple-items-con').data('itemindex',auxind);
                                                            }
                                                        }

                                                    }




                                                }

                                            }


                                            //console.log(aux5);


                                        })


                                        if(_c5.children('.hidden-content').length==0){
                                            if(_zoombox_maincon){

                                                _zoombox_maincon.find('.hidden-content').eq(0).find('input,textarea,select').each(function(){
                                                    var _t5 = $(this);

                                                    var aux5 = _t5.attr('name');


                                                    if(_t5.hasClass('btn_upl')){
                                                        return;
                                                    }

                                                    var aux5_regex = /\[[a-z].*?\]/g;
                                                    if(_t5.hasClass('dzspgb-item--field')){
                                                        var aux5_regex_r = aux5_regex.exec(aux5);

                                                        if(_t5.parent().hasClass('for-clone-item')){
                                                            return;
                                                        }


                                                        if(_t5.hasClass('dzspgb-item--field') ){

                                                            if(aux5_regex_r){

                                                                aux5_regex_r = aux5_regex_r[0];
                                                            }

                                                            //var aux23 = 'dzspgb['+i1+']['+i2+']['+i3+']['+i4+']['+i5+']'+aux5_regex_r+'';

                                                            var aux23 = '';

                                                            if(_t5.parent().parent().hasClass('dzspgb-multiple-items-con')){
                                                                aux23 = _t5.parent().parent().attr('data-startname') + '['+( Number(_t5.parent().parent().children('.dzspgb-item').index(_t5.parent()))-1) + ']' + '[' + _t5.attr('data-actuallabel') + ']' ;
                                                            }

                                                            //console.info('here in hidden content -> ',_t5, _t5.hasClass('dzspgb-item--field'), aux5);
                                                            //console.log(aux23);

                                                            _t5.attr('name',aux23);


                                                        }




                                                    }else{
                                                        if(aux5){
                                                            var aux5_regex_r = aux5_regex.exec(aux5);

                                                            if(aux5_regex_r && aux5_regex_r[0]){
                                                                aux5_regex_r = aux5_regex_r[0];


                                                                var aux24 = 'dzspgb['+i1+']['+i2+']['+i3+']['+i4+']['+i5+']'+aux5_regex_r+'';

                                                                if(_t5.hasClass('dzspgb-item--field--typer')){
                                                                    aux24+='[type]';
                                                                }

                                                                _t5.attr('name',aux24);

                                                                if(_t5.hasClass('dzspgb-item--field')){

                                                                    //console.log(_t5);
                                                                    var _ccon = null;
                                                                    //console.info(_t5);

                                                                    if(_t5.parent().parent().hasClass('dzspgb-multiple-items-con')){
                                                                        _ccon=_t5.parent().parent();
                                                                    }


                                                                    if(_ccon){

                                                                        var auxind = _c5.find('.dzspgb-multiple-items-con').data('itemindex');

                                                                        _t5.attr('name','dzspgb['+i1+']['+i2+']['+i3+']['+i4+']['+i5+']'+aux5_regex_r+'['+auxind+']'+'['+_t5.attr('data-actuallabel')+']');

                                                                        auxind++;

                                                                        _c5.find('.dzspgb-multiple-items-con').data('itemindex',auxind);
                                                                    }
                                                                }

                                                            }




                                                        }

                                                    }


                                                    //console.log(aux5);


                                                })


                                            }
                                        }
                                    }

                                }
                            }
                        }
                    }
                }
                if(o.mode=='Row'){


                    var i1=0
                    ,i2=0
                        ,i5=0
                    ;


                    for(i1=0;i1 < _theForm.find('.admin-dzspgb-row').length;i1++){
                        var _c1 =  _theForm.find('.admin-dzspgb-row').eq(i1);



                        _c1.find('input').each(function(){
                            var _t = $(this);

                            var aux1 = _t.attr('name');




                            var aux1_regex = /\[[a-z].*?\]/g;
                            var aux_regex_r = null;
                            var  aux23= aux1_regex.exec(aux1);
                            if(aux23 && aux23[0]){
                                aux1_regex_r = aux23[0];
                            }


                            if(_t.hasClass('btn_upl')){
                                return;
                            }



                            if(aux1_regex_r){
                                _t.attr('name','dzspgb['+i1+']'+aux1_regex_r+'');
                            }

                        })


                        //console.info(_c1.find('.admin-dzspgb-container'));

                        for(i2=0;i2 < _c1.find('.admin-dzspgb-row-part').length;i2++){
                            var _c2 =  _c1.find('.admin-dzspgb-row-part').eq(i2);



                            _c2.find('input').each(function(){
                                var _t = $(this);

                                var aux2 = _t.attr('name');
                                if(_t.hasClass('btn-delete-itm')){

                                }


                                if(_t.hasClass('btn_upl')){
                                    return;
                                }

                                var aux2_regex = /\[[a-z].*?\]/g;
                                var aux2_regex_r = aux2_regex.exec(aux2)[0];

                                //console.info();



                                aux2 = aux2.replace(/(dzspgb\[.*?\]\[)(.*?)(\].*)/g, "$1"+i2+"$3")


                                if(aux2_regex_r){
                                    _t.attr('name','dzspgb['+i1+']['+i2+']'+aux2_regex_r+'');
                                }
                            })




                            for(i5=0;i5 < _c2.find('.elements-area > .dzspgb-element-con').length;i5++){
                                var _c5 =  _c2.find('.elements-area > .dzspgb-element-con').eq(i5);


                                //console.info(_c4);

                                _c5.find('input,textarea,select').each(function(){
                                    var _t5 = $(this);

                                    var aux5 = _t5.attr('name');



                                    //console.log("ELEMENT CHECK", _t5, _t5.hasClass('dzspgb-item--field--typer'), aux5_regex_r);

                                    //console.info("ELEMENT CHECK 2 ",_t5, aux5, _t5.hasClass('btn_upl'), _t5.parent());

                                    if(_t5.hasClass('btn_upl') || _t5.hasClass('dzspgb-item--field') || _t5.parent().hasClass('single-uploader-wrap')){
                                        return;
                                    }


                                    var aux5_regex = /\[[a-z].*?\]/g;
                                    var aux5_regex_r = aux5_regex.exec(aux5)[0];


                                    if(aux5_regex_r){
                                        _t5.attr('name','dzspgb['+i1+']['+i2+']['+i5+']'+aux5_regex_r+'');
                                    }

                                    //console.log('dzspgb['+i1+']['+i2+']['+i5+']'+aux5_regex_r);


                                })
                            }

                        }
                    }
                }



                $('.btn-delete-element').each(function(){
                    var _t = $(this);

                    if(!_t.data('delete_target')){

                        if(_t.parent().parent().parent().hasClass('hidden-content')){

                            //console.info(_t);

                            _t.data('delete_target', _t.parent().parent().parent().parent());
                            //console.info(_t.data('delete_target'));
                        }
                        if(_t.parent().parent().hasClass('hidden-content')){

                            //console.info(_t);

                            _t.data('delete_target', _t.parent().parent().parent());
                            //console.info(_t.data('delete_target'));
                        }
                    }

                    //console.info(_t);
                });




            }

            function update_pb(){

                // console.log('update_pb() ---- feedcontent:', ce_content);


                var aux_lastindex = 0;

                if(_theTextarea){
                    ce_content = _theTextarea.val();
                }

                if(o.is_wp=='on'){
                    ce_content = wp_read_tinymce();
                }

                var feedstr = ce_content;
                // console.info(feedstr);

                //console.info(dzspgb_templates);










                // -- row mode
                if(o.mode=='Row'){



                    var regex_r = /\[dzspgb_row(.*?)\]([\S\s]*?)\[\/dzspgb_row\]/gm;
                    var aux3 = null;
                    //console.log(aux2[1]);



                    while(aux3 = regex_r.exec(feedstr)) {
                        //console.log(aux3);


                        var regex_aux1 = /extra_classes="(.*?)"/gm;
                        var regex_aux1_a = regex_aux1.exec(aux3[1]);


                        var args = {
                            append_to_the_form : true
                        }
                        if (regex_aux1_a) {
                            args.extra_classes = regex_aux1_a[1];
                        }

                        regex_aux1 = /hide_when_logged_in="(.*?)"/gm;
                        regex_aux1_a = regex_aux1.exec(aux3[1]);


                        if (regex_aux1_a) {


                            args.hide_when_logged_in = regex_aux1_a[1];
                        }

                        regex_aux1 = /hide_when_not_logged_in="(.*?)"/gm;
                        regex_aux1_a = regex_aux1.exec(aux3[1]);


                        if (regex_aux1_a) {
                            args.hide_when_not_logged_in = regex_aux1_a[1];
                        }

                        regex_aux1 = /column_padding="(.*?)"/gm;
                        regex_aux1_a = regex_aux1.exec(aux3[1]);


                        if (regex_aux1_a) {
                            args.column_padding = regex_aux1_a[1];
                        }


                        // -- console.info(args);


                        args.call_from='update_pb';
                        add_row_empty($('.admin-dzspgb-container').last(), args);


                        if (aux3[2] != '') {
                            var regex_rp = /\[dzspgb_row_part.*?\]([\S\s]*?)\[\/dzspgb_row_part\]/gm;
                            var aux4 = null;
                            //console.log(aux3[1]);
                            while (aux4 = regex_rp.exec(aux3[2])) {
                                //console.log(aux4);

                                var args = {
                                    'part': '1.1'
                                }
                                //console.log(args);


                                var regex_aux1 = /\part="(.*?)"/gm;
                                var regex_aux1_a = regex_aux1.exec(aux4);

                                if (regex_aux1_a) {
                                    args.part = regex_aux1_a[1];
                                }

                                args.call_from='update_pb';
                                add_row_part($('.admin-dzspgb-row').last(), args);

                                if (aux4[1]) {

                                    var regex_el = /\[dzspgb_element([\S\s]*?)\]([\S\s]*?)\[\/dzspgb_element\]/gm;
                                    var aux5 = null;
                                    //console.log(aux3[1]);
                                    while (aux5 = regex_el.exec(aux4[1])) {
                                        //console.log(aux5);

                                        var args = {
                                            'part': '1.1'
                                        }


                                        var regex_aux2 = /(\w*?)="([\s|\S]*?)"/gm;


                                        while (regex_aux2_a = regex_aux2.exec(aux5[1])) {
                                            //console.info(regex_aux2_a[2]);

                                            if(String(regex_aux2_a[2]).indexOf('{replacequotquot}')){

                                                regex_aux2_a[2] = String(regex_aux2_a[2]).replace(/\{replacequotquot\}/g, '"');
                                            }

                                            //console.info(regex_aux2_a);
                                            args[regex_aux2_a[1]] = regex_aux2_a[2];


                                        }

                                        //console.log(args);

                                        add_element($('.admin-dzspgb-row-part').last(), args);

                                        // console.log(aux5[2]);

                                        if (aux5[2]) {

                                            var regex_it = /\[dzspgb_item([\s\S]*?)\]([\S\s]*?)\[\/dzspgb_item\]/gm;
                                            var aux6 = null;
                                            // console.log(aux3[1]);

                                            // console.log(aux5[2]);
                                            while (aux6 = regex_it.exec(aux5[2])) {

                                                // console.log(aux6);
                                                var auxlab = get_shortcode_attr('label', aux6[1]);
                                                //console.log(aux6[1], auxlab, $('.elements-area .dzspgb-element-con').last(), $('.elements-area .dzspgb-element-con').last().find('.dzspgb-multiple-items-con[data-actuallabelcon="'+auxlab+'"]'));

                                                var args2 = {}


                                                var regex_aux22 = /(\w*?)="([\s|\S]*?)"/gm;
                                                var regex_aux22_a;


                                                while (regex_aux22_a = regex_aux22.exec(aux6[1])) {
                                                    //console.info(regex_aux2_a);
                                                    if (regex_aux22_a[1] == 'label') {
                                                        continue;
                                                    }
                                                    args2[regex_aux22_a[1]] = regex_aux22_a[2];
                                                }


                                                //console.info(args2);
                                                add_item($('.elements-area .dzspgb-element-con').last().find('.dzspgb-multiple-items-con[data-actuallabelcon="' + auxlab + '"]'), args2);
                                            }


                                        }
                                    }
                                }
                            }
                        }
                    }



                    //console.info(aux4);







                    generates_non_actives();

                    if(aux_lastindex<feedstr.length){
                        //raw
                    }
                }


            }


            function update_ce(pargs){


                var margs ={

                    'call_from': 'default'
                };
                if(pargs){

                    margs = $.extend(margs, pargs);
                }


                console.info('update_ce',o.mode, margs);

                var auxval = '';
                var i1=0
                    ,i2=0
                    ,i3=0
                    ,i4=0
                    ,i5=0
                    ;


                if(o.mode=='Full'){
                    for(i1=0;i1 < _theForm.find('.admin-dzspgb-section').length;i1++){
                        var _c1 =  _theForm.find('.admin-dzspgb-section').eq(i1);



                        auxval+='[dzspgb_section';
                        //console.info(_c1.find('.admin-dzspgb-container'));


                        //console.info(_c1.find('input[name*="[extra_classes]"]').eq(0), _c1.find('input[name*="[extra_classes]"]').eq(0).val());
                        if(_c1.find('input[name*="[extra_classes]"]').eq(0).val()){
                            auxval+=' extra_classes="'+_c1.find('input[name*="[extra_classes]"]').eq(0).val()+'"';
                        }

                        auxval+=']';

                        for(i2=0;i2 < _c1.find('.admin-dzspgb-container').length;i2++){
                            var _c2 =  _c1.find('.admin-dzspgb-container').eq(i2);


                            auxval+='[dzspgb_container';


                            if(_c2.find('input[name*="[extra_classes]"]').eq(0).val()){
                                auxval+=' extra_classes="'+_c2.find('input[name*="[extra_classes]"]').eq(0).val()+'"';
                            }

                            //console.info(_c2.find('select[name*="[use_template]"]').eq(0));
                            if(_c2.find('select[name*="[use_template]"]').eq(0).val()){
                                auxval+=' use_template="'+_c2.find('select[name*="[use_template]"]').eq(0).val()+'"';
                            }

                            auxval+=']';


                            for(i3=0;i3 < _c2.find('.admin-dzspgb-row').length;i3++){
                                var _c3 =  _c2.find('.admin-dzspgb-row').eq(i3);


                                auxval+='[dzspgb_row';


                                //console.info(_c3,_c3.find('input[name*="[extra_classes]"]').eq(0))
                                if(_c3.find('input[name*="[extra_classes]"]').eq(0).val()){
                                    auxval+=' extra_classes="'+_c3.find('input[name*="[extra_classes]"]').eq(0).val()+'"';
                                }

                                auxval+=']';


                                for(i4=0;i4 < _c3.find('.admin-dzspgb-row-part').length;i4++){
                                    var _c4 =  _c3.find('.admin-dzspgb-row-part').eq(i4);


                                    if(_c4.find('input[name*="[part]"]').eq(0).val()!='nonactive'){
                                        auxval+='[dzspgb_row_part part="'+_c4.find('input[name*="[part]"]').eq(0).val()+'"]';


                                        //console.info(_c4, _c4.find('.elements-area .dzspgb-element-con'));
                                        for(i5=0;i5 < _c4.find('.elements-area .dzspgb-element-con').length;i5++) {
                                            var _c5 = _c4.find('.elements-area .dzspgb-element-con').eq(i5);

                                            //console.info(_c5,_c5.parent());
                                            if(_c5.parent().hasClass('element-type-selector-con')){
                                                continue;
                                            }
                                            auxval+='[dzspgb_element';
                                            _c5.find('textarea,input,select').each(function(){
                                                var _t3 = $(this);



                                                if(_t3.hasClass('dzspgb-item--field')==false){
                                                    var aux5 = _t3.attr('name');

                                                    if(aux5){
                                                        var aux5_val = _t3.val();
                                                        var aux5_regex = /\[([a-z].*?)\]/g;
                                                        var aux5_regex_r = aux5_regex.exec(aux5);

                                                        if(aux5_regex_r && aux5_regex_r[1]){
                                                            aux5_regex_r = aux5_regex_r[1];


                                                            aux5_val = aux5_val.replace(/"/g,'&quot;');


                                                            auxval+=' '+aux5_regex_r+'="'+aux5_val+'"';

                                                        }

                                                    }
                                                }



                                                //console.info(_t3,aux5_regex_r);
                                            });
                                            auxval+=']';

                                            _c5.find('.dzspgb-item').each(function(){
                                                var _t3 = $(this);


                                                var _ccon = null;

                                                if(_t3.parent().hasClass('dzspgb-multiple-items-con')){
                                                    _ccon=_t3.parent();
                                                }

                                                //console.info(_t3,_t3.hasClass('for-clone-item'))
                                                if(_t3.hasClass('for-clone-item')){
                                                    return;
                                                }


                                                //console.info(_t3.hasClass('for-clone-item'))
                                                if(_ccon){

                                                    var aux_label_con = (_ccon.attr('data-actuallabelcon'));
                                                    auxval+='[dzspgb_item label="'+aux_label_con+'"';



                                                    _t3.find('textarea,input,select').each(function(){
                                                        var _t31 = $(this);

                                                        //console.info(_t31);

                                                        var aux5 = _t31.attr('data-actuallabel');

                                                        //console.info(aux5);

                                                        if(aux5){
                                                            var aux5_val = _t31.val();



                                                            if(_t3.attr('type')=='checkbox'){
                                                                if(_t3.prop('checked')){
                                                                    aux5_val = _t3.val();
                                                                }else{
                                                                    aux5_val = '';
                                                                }
                                                            }

                                                            aux5_val = aux5_val.replace(/"/g,'&quot;');


                                                            auxval+=' '+aux5+'="'+aux5_val+'"';

                                                        }

                                                        //console.info(_t3,aux5_regex_r);
                                                    });

                                                    auxval+=']';

                                                    auxval+='[/dzspgb_item]'

                                                }




                                                //console.info(_t3,aux5_regex_r);
                                            });


                                            auxval+='[/dzspgb_element]';
                                        }

                                        auxval+='[/dzspgb_row_part]';
                                    }

                                }

                                auxval+='[/dzspgb_row]';
                            }


                            auxval+='[/dzspgb_container]';
                        }
                        auxval+='[/dzspgb_section]';
                    }

                }


                if(o.mode=="Row"){




                    // -- update ce

                    for(i3=0;i3 < _theForm.find('.admin-dzspgb-row').length;i3++){
                        var _c3 =  _theForm.find('.admin-dzspgb-row').eq(i3);


                        auxval+='[dzspgb_row';


                        //console.info(_c3,_c3.find('input[name*="[extra_classes]"]').eq(0))

                        var lab = 'extra_classes';
                        if(_c3.find('input[name*="['+lab+']"]').eq(0).val()){
                            auxval+=' '+lab+'="'+_c3.find('input[name*="['+lab+']"]').eq(0).val()+'"';
                        }
                        var lab = 'column_padding';
                        _c3.find('input[name*="['+lab+']"]').each(function(){
                            var _t3 = $(this);


                            if(_t3.prop('checked')){
                                auxval+=' '+lab+'="'+_t3.val()+'"';
                            }

                        });


                        lab = 'hide_when_logged_in';
                        if(_c3.find('*[name*="['+lab+']"]').eq(0)){
                            if(_c3.find('*[name*="['+lab+']"]').eq(0).prop('checked')){
                                auxval+=' '+lab+'="on"';
                            }

                        }
                        lab = 'hide_when_not_logged_in';
                        if(_c3.find('*[name*="['+lab+']"]').eq(0)){

                            // console.info('hide_when_not_logged_in - ',_c3.find('*[name*="['+lab+']"]').eq(0), _c3.find('*[name*="['+lab+']"]').eq(0).prop('checked'));
                            if(_c3.find('*[name*="['+lab+']"]').eq(0).prop('checked')){
                                auxval+=' '+lab+'="on"';
                            }

                        }

                        auxval+=']';


                        for(i4=0;i4 < _c3.find('.admin-dzspgb-row-part').length;i4++){
                            var _c4 =  _c3.find('.admin-dzspgb-row-part').eq(i4);


                            if(_c4.find('input[name*="[part]"]').eq(0).val()!='nonactive'){
                                auxval+='[dzspgb_row_part part="'+_c4.find('input[name*="[part]"]').eq(0).val()+'"]';


                                //console.info(_c4, _c4.find('.elements-area .dzspgb-element-con'));


                                //console.log(_c4.find('.elements-area .dzspgb-element-con'))

                                for(i5=0;i5 < _c4.find('.elements-area .dzspgb-element-con').length;i5++) {
                                    var _c5 = _c4.find('.elements-area .dzspgb-element-con').eq(i5);

                                    //console.info(_c5,_c5.parent());
                                    if(_c5.parent().hasClass('element-type-selector-con')){
                                        continue;
                                    }
                                    auxval+='[dzspgb_element';
                                    //console.info('START HIER', _c5, _c5.find('textarea,input,select'));
                                    _c5.find('textarea,input,select').each(function(){
                                        var _t3 = $(this);

                                        // console.info(_t3);
                                        if(_t3[0].nodeName=="TEXTAREA"){

                                            //console.log(_t3, _t3.attr('type'), _t3.hasClass('dzspgb-item--field'), _t3.html(), _t3.html());
                                        }

                                        // || _t3.hasClass('btn_upl')==false
                                        if(_t3.hasClass('dzspgb-item--field')==false ){
                                            var aux5 = _t3.attr('name');

                                            // console.warn(aux5);

                                            if(aux5){
                                                var aux5_val = _t3.val();



                                                //console.info(aux5, _t3);

                                                if(_t3.parent().hasClass('single-uploader-wrap')){
                                                    return;
                                                }

                                                if(_t3.attr('type')=='checkbox'){
                                                    if(_t3.prop('checked')){
                                                        aux5_val = _t3.val();
                                                    }else{
                                                        aux5_val = '';
                                                    }
                                                }

                                                if(_t3.hasClass('tinymce-me')){

                                                    if(o.is_wp=='on'){

                                                        var ed = tinyMCE.get(_t3.attr('id'));

                                                        // console.info(ed, ed.getContent());

                                                        if(ed){

                                                            aux5_val = ed.getContent();
                                                        }
                                                    }

                                                }







                                                if(aux5_val && aux5_val.indexOf('"')>-1){

                                                    console.info('foundt', aux5_val);
                                                    aux5_val = String(aux5_val).replace(/"/g, '{replacequotquot}');

                                                    setTimeout(function(){

                                                        //console.info(_t3, aux5_val);



                                                        aux5_val = String(aux5_val).replace(/\{replacequotquot\}/g, '"');

                                                        _t3.val(aux5_val);

                                                    },1000);
                                                }




                                                var aux5_regex = /\[([a-z].*?)\]/g;
                                                var aux5_regex_r = aux5_regex.exec(aux5);


                                                // console.info(aux5_regex_r, aux5_val);

                                                if(aux5_val && aux5_regex_r && aux5_regex_r[1]){
                                                    aux5_regex_r = aux5_regex_r[1];


                                                    aux5_val = aux5_val.replace(/"/g,'&quot;');

                                                    // console.log(_t3,' '+aux5_regex_r+'="'+aux5_val+'"');

                                                    auxval+=' '+aux5_regex_r+'="'+aux5_val+'"';

                                                }

                                            }
                                        }



                                        //console.info(_t3,aux5_regex_r);
                                    });
                                    auxval+=']';

                                    _c5.find('.dzspgb-item').each(function(){
                                        var _t3 = $(this);


                                        var _ccon = null;

                                        if(_t3.parent().hasClass('dzspgb-multiple-items-con')){
                                            _ccon=_t3.parent();
                                        }

                                        //console.info(_t3,_t3.hasClass('for-clone-item'))
                                        if(_t3.hasClass('for-clone-item')){
                                            return;
                                        }


                                        //console.info(_t3.hasClass('for-clone-item'))
                                        if(_ccon){

                                            var aux_label_con = (_ccon.attr('data-actuallabelcon'));
                                            auxval+='[dzspgb_item label="'+aux_label_con+'"';



                                            _t3.find('textarea,input,select').each(function(){
                                                var _t31 = $(this);

                                                //console.info(_t31);

                                                var aux5 = _t31.attr('data-actuallabel');

                                                //console.info(aux5, _t31.val());

                                                if(aux5){
                                                    var aux5_val = _t31.val();

                                                    //aux5_val = aux5_val.replace(/"/g,'&quot;');




                                                    if(aux5_val.indexOf('"')>-1){

                                                        aux5_val = String(aux5_val).replace(/"/g, '{replacequotquot}');

                                                    }


                                                    auxval+=' '+aux5+'="'+aux5_val+'"';

                                                }

                                                //console.info(_t3,aux5_regex_r);
                                            });

                                            auxval+=']';

                                            auxval+='[/dzspgb_item]'

                                        }




                                        //console.info(_t3,aux5_regex_r);
                                    });


                                    auxval+='[/dzspgb_element]';
                                }

                                auxval+='[/dzspgb_row_part]';
                            }

                        }

                        auxval+='[/dzspgb_row]';
                    }


                }



                // console.log('from update_ce()', _theTextarea, auxval, o.is_wp,o.mode);


                if(o.is_wp=='on'){
                    window.wp_update_tinymce(auxval);
                }else{
                    if(_theTextarea){

                        _theTextarea.val(auxval);
                    }else{
                        console.warn("textarea does not exist")
                    }
                }




            }

            function switch_ce(){

            }

            function switch_pb(){

            }


            //console.info(cthis);
            return this;
        })
    }

})(jQuery);



/* @projectDescription jQuery Serialize Anything - Serialize anything (and not just forms!)
 * @author Bramus! (Bram Van Damme)
 * @version 1.0
 * @website: http://www.bram.us/
 * @license : BSD
 */




(function($) {

    $.fn.serializeAnything = function() {

        var toReturn    = [];
        var els         = $(this).find(':input').get();

        $.each(els, function() {
            if (this.name && !this.disabled && (this.checked || /select|textarea/i.test(this.nodeName) || /text|hidden|password/i.test(this.type))) {
                var val = $(this).val();
                toReturn.push( encodeURIComponent(this.name) + "=" + encodeURIComponent( val ) );
            }
        });

        return toReturn.join("&").replace(/%20/g, "+");

    }

})(jQuery);




window.wp_read_tinymce = function(){

    var aux = '';


    aux = jQuery('textarea#content').val();
    if(window.tinyMCE){

        var ed = tinyMCE.get('content');


        // console.info(ed);
        if(ed){
            aux = ed.getContent({format : 'raw'});
        }
    }


    // console.info("READ CONTENT", aux);
    return aux;
}




window.wp_update_tinymce = function(arg){

    // console.info('updating content ',jQuery('textarea#content'));
    jQuery('textarea#content').val(arg);

    // console.info(window.tinyMCE);
    if(window.tinyMCE) {
        var ed = tinyMCE.get('content');


        // console.info(ed);
        if (ed) {
            ed.setContent(arg);
        }
    }
}

