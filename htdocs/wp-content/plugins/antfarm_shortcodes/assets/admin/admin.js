

function htmlEncode(arg){
    return jQuery('<div/>').text(arg).html();
}

function htmlDecode(value){
    return jQuery('<div/>').html(arg).text();
}

function get_shortcode_attr(arg, argtext){

    var regex_aattr = new RegExp(arg+'="(.*?)"');

    //console.log(regex_aattr, argtext);

    var aux = regex_aattr.exec(argtext);

    if(aux){
        var foutobj = {'full' : aux[0], 'val' : aux[1]};
        return foutobj;
    }



    return false;
}
window.antfarm_button_customizer_init = function(){
    jQuery('.the-button-style-json').each(function(){
        var _c = jQuery(this);


        // console.log('_c - ',_c, _c.val())

        if(_c.val()){


            var arr_style = {};

            try{
                arr_style = JSON.parse(_c.val());


                for(var lab in arr_style){
                    var _c3 = _c.next().find('*[name='+lab+']');

                    _c3.val(arr_style[lab]);

                    console.info('_c3 - ',_c3);

                    if(_c3.get(0) && _c3.get(0).api_recheck_value_from_input){
                        _c3.get(0).api_recheck_value_from_input();
                    }

                    _c3.trigger('change');
                }

            }catch(err){
                console.error(_c.val());
            }



            console.info(arr_style);
        }

        return false;
    })

}

function get_query_arg(purl, key){
        //console.log(purl, key)
    if (purl.indexOf(key + '=') > -1) {
        //faconsole.log('testtt');
        var regexS = "[?&]" + key + "(.+?)(?=&|$)";
        var regex = new RegExp(regexS);
        var regtest = regex.exec(purl);


        //console.info(regex, regtest);
        if (regtest != null) {
            //var splitterS = regtest;


            if (regtest[1]) {
                var aux = regtest[1].replace(/=/g, '');
                return aux;
            } else {
                return '';
            }


        }
        //$('.zoombox').eq
    }
}




function get_query_arg_nr(purl){
        //console.log(purl, key)

    var nr = 0;
    if (purl.indexOf( '=') > -1) {
        //faconsole.log('testtt');
        var regexS = "[?&]";
        var regex = new RegExp(/[?&]/g);
        var regtest = null;


        var ibreaker = 10;
        while( regtest = regex.exec(purl)){
            // console.info(regtest);
            ibreaker--;
            if(ibreaker<0){
                break;
            }

            nr++;
        }



    }

    return nr;
}




window.htmleditor_sel = 'notset';
window.mceeditor_sel = 'notset';




jQuery(document).ready(function($){

    // console.info('window.antfarm_settings - ',window.antfarm_settings);



    var _feedbacker = $('.feedbacker').eq(0);

    _feedbacker.fadeOut("fast");




        if(window.dzsas_init){

            dzsas_init('.advancedscroller.auto-init-from-q-admin', {init_each: true})
        }


    if(window.dzszfl_init){

         dzszfl_init('.zfolio.auto-init-from-q-admin', {init_each: true});
    }


    if(get_query_arg(window.location.href, 'post_type')=='antfarm_contact_form'){


        console.info('\'.dzs-tabs.auto-init-from-q-admin\' - ',$('.dzs-tabs.auto-init-from-q-admin'));
        if(window.dzstaa_init) {


            //zfolio-portfolio-expandable
            //console.info($('.vplayer-tobe.auto-init-from-q:not(".zfolio-portfolio-expandable .vplayer-tobe.auto-init-from-q")'));

            dzstaa_init('.dzs-tabs.auto-init-from-q-admin', {
                'init_each': true
            });
        }

    }


    function append_shortcode_button(){


        jQuery('.wp-media-buttons').each(function(){
            var _t = $(this);


            if(_t.children('#antfarm_shortcode').length==0){
                _t.append('<a class="shortcode_opener" id="antfarm_shortcode" style="cursor:pointer; display: inline-block; vertical-align: middle;width:auto; height:28px; margin-right: 5px; background-color: #ffffff; color: #726b6b; padding-right: 10px; border: 1px solid rgba(0,0,0,0.3); border-radius:3px; line-height: 1; font-size:13px; padding-left:0;"><i class="" style="  background-size:cover; background-repeat: no-repeat; background-position: center center; width:16px; height: 16px; padding-left: 8px; padding-top:6px; display:inline-block;  vertical-align: middle; margin-right: 5px; " ><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%" height="100%" viewBox="0 0 140.25 140.25" enable-background="new 0 0 140.25 140.25" xml:space="preserve"> <g> <g> <g> <g> <path fill="#5A5B5D" d="M80.08,140.25c-1.053,0-2-0.663-2.355-1.664L46.003,49.195c-0.323-0.908-0.094-1.922,0.588-2.604 s1.695-0.91,2.604-0.589l89.391,31.723c1.041,0.37,1.716,1.378,1.661,2.481c-0.055,1.103-0.827,2.039-1.899,2.303l-20.244,4.982 c-1.342,0.324-2.695-0.49-3.025-1.83c-0.33-1.341,0.49-2.695,1.83-3.025l12.144-2.988L52.471,52.472l27.175,76.578l5.872-23.872 c0.109-0.443,0.337-0.849,0.66-1.171c0.975-0.978,2.561-0.979,3.537-0.002l29.142,29.142l14.29-14.289l-19.885-19.884 c-0.977-0.976-0.977-2.559,0-3.535c0.977-0.977,2.559-0.977,3.536,0l21.653,21.651c0.469,0.469,0.732,1.104,0.732,1.768 s-0.263,1.299-0.732,1.768l-17.825,17.824c-0.976,0.977-2.56,0.977-3.535,0l-27.774-27.774l-6.807,27.672 c-0.264,1.073-1.2,1.845-2.303,1.9C80.164,140.249,80.122,140.25,80.08,140.25z"/> </g> </g> <g> <g> <path fill="#5A5B5D" d="M48.359,96.719C21.694,96.719,0,75.024,0,48.359S21.694,0,48.359,0s48.359,21.694,48.359,48.359 c0,1.381-1.119,2.5-2.5,2.5s-2.5-1.119-2.5-2.5C91.719,24.451,72.268,5,48.359,5S5,24.451,5,48.359s19.451,43.359,43.359,43.359 c1.381,0,2.5,1.119,2.5,2.5S49.74,96.719,48.359,96.719z"/> </g> </g> </g> </g> </svg></i> <span style="display: inline-block; vertical-align: middle; font-size: 12px; font-weight: bold; position:relative; top: 3px;">'+window.antfarm_settings.translate_add_shortcode_button+'</span></a>');
            }


            if(_t.children('#antfarm_shortcode_divider').length==0){
                _t.append('<a class="shortcode_opener_divider" id="antfarm_shortcode_divider" style="cursor:pointer; display: inline-block; vertical-align: middle;width:auto; height:28px; margin-right: 5px; background-color: #ffffff; color: #726b6b; padding-right: 10px; border: 1px solid rgba(0,0,0,0.3); border-radius:3px; line-height: 1; font-size:13px; padding-left:0;"><i class="" style="  background-size:cover; background-repeat: no-repeat; background-position: center center; width:16px; height: 16px; padding-left: 8px; padding-top:6px; display:inline-block;  vertical-align: middle; margin-right: 5px; " ><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%" height="100%" viewBox="0 0 140.25 140.25" enable-background="new 0 0 140.25 140.25" xml:space="preserve"> <g> <g> <g> <g> <path fill="#5A5B5D" d="M80.08,140.25c-1.053,0-2-0.663-2.355-1.664L46.003,49.195c-0.323-0.908-0.094-1.922,0.588-2.604 s1.695-0.91,2.604-0.589l89.391,31.723c1.041,0.37,1.716,1.378,1.661,2.481c-0.055,1.103-0.827,2.039-1.899,2.303l-20.244,4.982 c-1.342,0.324-2.695-0.49-3.025-1.83c-0.33-1.341,0.49-2.695,1.83-3.025l12.144-2.988L52.471,52.472l27.175,76.578l5.872-23.872 c0.109-0.443,0.337-0.849,0.66-1.171c0.975-0.978,2.561-0.979,3.537-0.002l29.142,29.142l14.29-14.289l-19.885-19.884 c-0.977-0.976-0.977-2.559,0-3.535c0.977-0.977,2.559-0.977,3.536,0l21.653,21.651c0.469,0.469,0.732,1.104,0.732,1.768 s-0.263,1.299-0.732,1.768l-17.825,17.824c-0.976,0.977-2.56,0.977-3.535,0l-27.774-27.774l-6.807,27.672 c-0.264,1.073-1.2,1.845-2.303,1.9C80.164,140.249,80.122,140.25,80.08,140.25z"/> </g> </g> <g> <g> <path fill="#5A5B5D" d="M48.359,96.719C21.694,96.719,0,75.024,0,48.359S21.694,0,48.359,0s48.359,21.694,48.359,48.359 c0,1.381-1.119,2.5-2.5,2.5s-2.5-1.119-2.5-2.5C91.719,24.451,72.268,5,48.359,5S5,24.451,5,48.359s19.451,43.359,43.359,43.359 c1.381,0,2.5,1.119,2.5,2.5S49.74,96.719,48.359,96.719z"/> </g> </g> </g> </g> </svg></i> <span style="display: inline-block; vertical-align: middle; font-size: 12px; font-weight: bold; position:relative; top: 3px;">'+window.antfarm_settings.translate_add_shortcode_divider+'</span></a>');
            }




        })






    }



    if(window.dzspgb_settings && window.dzspgb_settings.is_admin){

        $("#postdivrich").dzspgb({
                mode:"Row"
                ,append_after_cthis: "on"
                ,is_wp: "on"
                ,init_first_content: window.wp_read_tinymce()
                ,edit_in_zoombox: "off"
            }
        );
        $("#postdivrich").hide();
        $("#postdivrich").after('<p><button class="button-secondary btn-show-classic-editor">'+'Show Classic Editor'+'</button></p>');
    }




    // console.info('window.antfarm_settings - ',window.antfarm_settings);
    if(window.antfarm_settings && window.antfarm_settings.post_type && window.antfarm_settings.post_type=='zfolio_grid'){

        // $("#postdivrich").dzspgb({
        //         mode:"Row"
        //         ,append_after_cthis: "on"
        //         ,is_wp: "on"
        //         ,init_first_content: window.wp_read_tinymce()
        //         ,edit_in_zoombox: "off"
        //     }
        // );
        $("#postdivrich").hide();
        $("#postdivrich").before('<p><button class="button-secondary btn-show-classic-editor">'+'Show Classic Editor'+'</button></p>');
        $("#postdivrich").after($('#grid0').eq(0));




        setTimeout(function(){

            $('#grid0').dzsgridbuilder({
                grid: 'detect'
                ,input: '#content'
            });
        },100)






    }



    // $("#postimagediv h2 > span").text(antfarm_settings.translate_background_image);
    // -- q admin functionality END


    append_shortcode_button();
    setInterval(function(){
        // -- tbc for now , we'll need a vc event
        append_shortcode_button();
    },2000);


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


    setInterval(function(){

        $('.farb').each(function(){
            var _t = $(this);

            if(_t.hasClass('treated')){
                return;
            }

            var _target = _t.parent().parent().parent().find('.wpb-textinput').get(0);

            _t.farbtastic(_target, function(a,b){
                console.info(a,b);
            });
            //.linkTo(_target)
            console.info('farb - ', _t, '_target - ',_target);

            _t.addClass('treated');
        })
    },2000);






    $(document).delegate('#antfarm_shortcode','click', function(){
        //tb_show('ZSVG Shortcodes', dzsvg_settings.thepath + 'tinymce/popupiframe.php?width=630&height=800');


        var parsel = '';
        if(jQuery('#wp-content-wrap').hasClass('tmce-active') && window.tinyMCE && window.tinyMCE.activeEditor==null){

            //console.log(window.tinyMCE.activeEditor);
            var ed = window.tinyMCE.activeEditor;
            var sel=ed.selection.getContent();

            if(sel!=''){
                parsel+='&sel=' + encodeURIComponent(sel);
                window.mceeditor_sel = sel;
            }else{
                window.mceeditor_sel = '';
            }
            //console.log(aux);


            window.htmleditor_sel = 'notset';


        }else{




            var textarea = document.getElementById("content");
            var start = textarea.selectionStart;
            var end = textarea.selectionEnd;
            var sel = textarea.value.substring(start, end);

            //console.log(sel);

            //textarea.value = 'ceva';
            if(sel!=''){
                parsel+='&sel=' + encodeURIComponent(sel);
                window.htmleditor_sel = sel;
            }else{
                window.htmleditor_sel = '';
            }

            window.mceeditor_sel = 'notset';
        }


        window.dzszb_open(antfarm_settings.shortcode_generator_button_url, 'iframe', {bigwidth: 1200, bigheight: 700,forcenodeeplink: 'on', dims_scaling: 'fill'});
    })

    $(document).delegate('#antfarm_shortcode_divider','click', function(){
        //tb_show('ZSVG Shortcodes', dzsvg_settings.thepath + 'tinymce/popupiframe.php?width=630&height=800');


        var parsel = '';
        if(jQuery('#wp-content-wrap').hasClass('tmce-active') && window.tinyMCE && window.tinyMCE.activeEditor==null){

            //console.log(window.tinyMCE.activeEditor);
            var ed = window.tinyMCE.activeEditor;
            var sel=ed.selection.getContent();

            if(sel!=''){
                parsel+='&sel=' + encodeURIComponent(sel);
                window.mceeditor_sel = sel;
            }else{
                window.mceeditor_sel = '';
            }
            //console.log(aux);


            window.htmleditor_sel = 'notset';


        }else{




            var textarea = document.getElementById("content");
            var start = textarea.selectionStart;
            var end = textarea.selectionEnd;
            var sel = textarea.value.substring(start, end);

            //console.log(sel);

            //textarea.value = 'ceva';
            if(sel!=''){
                parsel+='&sel=' + encodeURIComponent(sel);
                window.htmleditor_sel = sel;
            }else{
                window.htmleditor_sel = '';
            }

            window.mceeditor_sel = 'notset';
        }


        window.dzszb_open(antfarm_settings.shortcode_generator_divider_url, 'iframe', {bigwidth: 1200, bigheight: 700,forcenodeeplink: 'on', dims_scaling: 'fill'});
    })






    // -- global
    var i = 0;
    $(document).delegate(".input-big-image", "change", change_big_image);
    $(".input-big-image").trigger('change');
    if(window.reskin_select){

        setTimeout(reskin_select, 10);
    }







    /*
     ///======builder init CODE
     var _ahtml = $('a#content-html');
     var _atmce = $('a#content-tmce');
     $('#wp-content-editor-tools').prepend('<a onclick="switchEditors.switchto(this);" class="wp-switch-editor switch-builder" id="content-builder">Builder</a>')


     $('a#content-builder').bind('click', click_builder_initer);

     _ahtml.bind('click', click_ahtml);
     _atmce.bind('click', click_atmce);

     ///======builder init CODE END
     */






    $(document).on('click.import-cloe','.dzspgb-add-row', function(){


        import_form_close();
    })


    $(document).on('click', '.import-dzscfs-sample, .import-form--head > .option, .colorpicker-con .color-spectrum', handle_mouse);





    var aux =window.location.href;


    if(aux.indexOf('plugins.php')>-1){



        setTimeout(function(){
//            jQuery.get( "http://zoomthe.me/cronjobs/cache/dzstln_get_version.static.html", function( data ) {
//
////            console.info(data);
//                var newvrs = Number(data);
//                if(newvrs > Number(dzstln_settings.version)){
//                    jQuery('.version-number').append('<span class="new-version info-con" style="width: auto;"> <span class="new-version-text">/ new version '+data+'</span><div class="sidenote">Download the new version by going to your CodeCanyon accound and accessing the Downloads tab.</div></div> </span>')
//
//                    if($('#the-list > #dzs-zoomfolio-wordpress-portfolio').next().hasClass('plugin-update-tr')==false){
//                        $('#the-list > #dzs-zoomfolio-wordpress-portfolio').addClass('update');
//                        $('#the-list > #dzs-zoomfolio-wordpress-portfolio').after('<tr class="plugin-update-tr"><td colspan="3" class="plugin-update colspanchange"><div class="update-message">There is a new version of DZS Parallaxer available. <form action="admin.php?page=dzstln-autoupdater" class="mainsettings" method="post"> &nbsp; <br> <button class="button-primary" name="action" value="dzstln_update_request">Update</button></form></td></tr>');
//                    }
//                }
//            });
        }, 300);
    }


    ///======item gallery CODE
    var _gallery = $('.dzs_item_gallery_list');

    $('.dzs-add-gallery-item').unbind('click', window.click_add_gallery_item);
    $('.dzs-add-gallery-item').bind('click', window.click_add_gallery_item);
    $(document).undelegate('li .ui-delete', 'click');
    $(document).delegate('li .ui-delete', 'click', click_item_delete);

    $(document).delegate('.vc_antfarm_multiple_checkbox-checkbox', 'change', handle_submit);


    if($.fn.sortable){

        _gallery.each(function(){

            var _g = $(this);

            _g.sortable({
                items: 'li',
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

        })

    }


    

    $(document).on('click','.btn-show-classic-editor', handle_mouse);



    function click_item_delete(){
        var _t = $(this);
        //console.info(_t);
        var _con = _t.parent().parent();
        _t.parent().remove();
        window.update_dzs_item_gallery_metafield(_con);
    }

    // -- item gallery CODE END



    function click_ahtml(){
        $('#wp-content-wrap').removeClass('builder-active');

    }

    function click_atmce(){
        $('#wp-content-wrap').removeClass('builder-active');

    }
    function click_builder_initer(){
        //switchEditors.switchto(_ahtml[0]);
        $('#wp-content-wrap').removeClass('tmce-active').removeClass('html-active').addClass('builder-active');
    }


    function change_big_image(){
        var _t = jQuery(this);
        var _it = _t.parent();
        //console.log(_t);
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


    $('.dzs-wordpress-uploader').unbind('click');
    $('.dzs-wordpress-uploader').bind('click', function(e){
        var _t = $(this);
        frame = wp.media.frames.dzstln_addimage = wp.media({
            // Set the title of the modal.
            title: "Insert Media",

            // Tell the modal to show only images.
            library: {
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
        frame.on( 'select', function() {
            // Grab the selected attachment.
            var attachment = frame.state().get('selection').first();

            //console.log(attachment.attributes.url);
            var arg = attachment.attributes.url;
            _t.prev().val(arg);
            _t.prev().trigger('change');




            _t.prev().css({
                'background-color':''
                ,'color':''
            })


            frame.close();
        });

        // Finally, open the modal.
        frame.open();

        e.stopPropagation();
        e.preventDefault();
        return false;
    });


    // extra_skin_hiddenselect();






    $(document).delegate('.antfarm-btn-add-media', 'click', function(){
        var _t = $(this);

        item_gallery_frame = wp.media.frames.downloadable_file = wp.media({
            title: 'Insert Media',
            button: {
                text: 'Insert Media'
            },
            multiple: false
        });

        item_gallery_frame.on( 'select', function() {

            var selection = item_gallery_frame.state().get('selection');
            selection = selection.toJSON();

            var ik=0;
            for(ik=0;ik<selection.length;ik++){

                var _c = selection[ik];
                //console.info(_c);
                if(_c.id==undefined){
                    continue;
                }

                _t.parent().parent().find('input').eq(0).val(_c.url);
                _t.parent().parent().find('input').eq(0).trigger('change');



                _t.parent().parent().find('input').css({
                    'background-color':''
                    ,'color':''
                })

            }
        });



        // Finally, open the modal.
        item_gallery_frame.open();

        return false;
    });


    $(document).on( 'click', '.antfarm-btn-add-media-att',function(){
        var _t = $(this);

        var args = {
            title: 'Add Item',
            button: {
                text: 'Select'
            },
            multiple: false
        };

        if(_t.attr('data-library_type')){
            args.library = {
                'type':_t.attr('data-library_type')
            }
        }

        var item_gallery_frame = wp.media.frames.downloadable_file = wp.media(args);

        item_gallery_frame.on( 'select', function() {

            var selection = item_gallery_frame.state().get('selection');
            selection = selection.toJSON();

            var ik=0;
            for(ik=0;ik<selection.length;ik++){

                var _c = selection[ik];
                //console.info(_c);
                if(_c.id==undefined){
                    continue;
                }

                if(_t.hasClass('button-setting-input-url')){

                    _t.parent().parent().find('input').eq(0).val(_c.url);
                }else{

                    _t.parent().parent().find('input').eq(0).val(_c.id);
                }


                _t.parent().parent().find('input').eq(0).trigger('change');


                _t.parent().parent().find('input').css({
                    'background-color':''
                    ,'color':''
                })

            }
        });



        // Finally, open the modal.
        item_gallery_frame.open();

        return false;
    });
    $(document).delegate('.antfarm-preview-changer', 'change', function(){
        var _t = $(this);

        _t.parent().parent().find('.preview-media-con-left').eq(0).addClass('hasimage').css('background-image', 'url('+_t.val()+')')
        return false;
    })



    $(document).on('change','.wrap-for-antfarm_shortcode_generator_button *[name=style],.wrap-for-antfarm_shortcode_generator_button *[name=padding],.wrap-for-antfarm_shortcode_generator_button *[name=rounded], .wpb_vc_param_value[name=skin]',handle_change_button_customizer);







    window.antfarm_button_customizer_init();



    function handle_change_button_customizer(e){

        var _t = $(this);


        if (e.type == 'change') {

            var _target_input = $('.the-button-style-json').eq(0);
            var _con = $(document).eq(0);

            var val = _t.val();

            if(_t.parent().parent().parent().hasClass('wrap-for-antfarm_shortcode_generator_button')){
                _con = _t.parent().parent().parent();
            }
            if(_t.parent().parent().parent().prev().hasClass('the-button-style-json')){
                _target_input = _t.parent().parent().parent().prev();
            }

            if(_t.attr('name')=='style'){
                // console.info("CEVA");

                var _c = $('.wrap-for-antfarm_shortcode_generator_button .setting-padding .btn-read-more,.wrap-for-antfarm_shortcode_generator_button .setting-rounded .btn-read-more');

                _c.removeClass('style-default style-black color-highlight style-highlight-dark style-hallowred style-hallowblack');
                _c.addClass(_t.val())
            }
            if(_t.attr('name')=='padding'){
                // console.info("CEVA");

                var _c = $('.wrap-for-antfarm_shortcode_generator_button .setting-rounded .btn-read-more');

                _c.removeClass('padding-small padding-medium');
                _c.addClass(_t.val())




            }
            if(_t.attr('name')=='skin'){
                // console.info("CEVA");



                if(val=='skin-qucreative zfolio-portfolio-expandable'){

                    $('option.item_excerpt').prop('disabled',false);

                    // $('.testa').css({
                    //     'height':'0px'
                    //     ,'width':'0px'
                    //     ,'visibility':'hidden'
                    // })

                }else{
                    $('option.item_excerpt').prop('disabled',true);
                    $('.testa').css({
                        'height':''
                        ,'width':''
                        ,'visibility':''
                    })

                }

            }


            var json = '';

            var arr = {
                style:_con.find('select[name=style]').eq(0).val()
                ,padding:_con.find('select[name=padding]').eq(0).val()
                ,rounded:_con.find('select[name=rounded]').eq(0).val()
            }

            // console.warn(arr);

            _target_input.val(JSON.stringify(arr));


        }
    }




    function mo_saveall(){
        jQuery('#save-ajax-loading').css('visibility', 'visible');
        var mainarray = jQuery('form.mainsettings').serialize();
        var data = {
            action: 'antfarm_ajax_mo',
            postdata: mainarray
        };



        _feedbacker.html('Options saved.');
        _feedbacker.fadeIn('fast').delay(2000).fadeOut('fast');
        jQuery.post(ajaxurl, data, function(response) {
            if(window.console !=undefined ){
                console.log('Got this from the server: ' + response);
            }
            jQuery('#save-ajax-loading').css('visibility', 'hidden');
        });

        return false;
    }


    function handle_submit(e){
        var _t = $(this);


        if(e.type=='change'){


            if(_t.hasClass('vc_antfarm_multiple_checkbox-checkbox')){
                console.info(_t);

                var _con = null;

                if(_t.parent().parent().parent().parent().hasClass('vc_antfarm_multiple_checkbox-con')){
                    _con = _t.parent().parent().parent().parent();
                }


                if(_con){

                    var aux = '';

                    var i3 = 0;

                    _con.find('.vc_antfarm_multiple_checkbox-checkbox').each(function(){
                        var _t2 = $(this);

                        if(_t2.prop('checked')){
                            if(i3>0){
                                aux+=',';
                            }
                            aux+=_t2.val();
                            i3++;
                        }
                    })

                    _con.find('.vc_antfarm_multiple_checkbox-input').eq(0).val(aux);
                }
            }
        }
    }
    function handle_mouse(e){
        var _t = $(this);
        var _con = null;


        if(e.type=='click'){
            if(_t.hasClass('insert-shortcode')){

                prepare_fout();
                tinymce_add_content(fout);
                return false;
            }
            if(_t.hasClass('btn-show-classic-editor')){

                $('#postdivrich').fadeIn("fast");

                setTimeout(function(){
                    $(window).trigger('resize');
                },100);
                return false;
            }

            if(_t.hasClass('color-spectrum')){



                _t.parent().toggleClass('active');

                if(_t.parent().parent().find('input').eq(0).val()==''){

                    _t.parent().parent().find('input').eq(0).val(' ');
                }

                return false;
            }





            if(_t.hasClass('option')){

                var ind = _t.parent().children().index(_t);

                if(_t.parent().parent().hasClass('import-form-con')){
                    _con = _t.parent().parent();
                }

                _t.parent().children().removeClass('active');
                _t.addClass('active');

                console.info(_con);

                if(_con){
                    var _c2 = _con.find('.import-form--body').eq(0);

                    _c2.addClass('animating');


                    var _ct = _c2.children().eq(ind);


                    _ct.show();
                    _ct.css('opacity','0');

                    if(_ct.find('.dzs-tabs').get(0) && _ct.find('.dzs-tabs').get(0).api_handle_resize){


                        console.error("HMM");
                        _ct.find('.dzs-tabs').get(0).api_handle_resize();
                    }



                    _c2.animate({
                        'height': '0'
                        ,opacity: 0
                    },{
                        queue:false
                        ,duration: 300
                        ,complete: function(arg1,arg2,arg3){



                            _c2.children().hide();



                            _ct.show();
                            _ct.css('opacity','1');






                            setTimeout(function(){




                                _c2.css('height', 'auto');
                                // _ct.css('height', 'auto');



                                _c2.css('height', '0');

                                console.warn(_ct.height());

                            },100);
                            setTimeout(function(){


                                if(_ct.height()>1){

                                    setTimeout(function(){

                                        _c2.removeClass('animating');
                                    },50);
                                    // console.info(_ct, _ct.height());
                                    _c2.animate({
                                        'height': _ct.height()
                                        ,opacity: 1
                                    },{
                                        queue:false
                                        ,duration: 300
                                        ,complete: function(arg1,arg2,arg3){



                                        }
                                    });


                                }
                            },500);




                        }
                    })
                }
            }



            if(_t.hasClass('import-dzscfs-sample')){



                if(_t.hasClass('import-dzscfs-sample-1')){
                    wp_update_tinymce('[dzspgb_row extra_classes="style-cosco element-form-style-sharp for-contact" column_padding="10"][dzspgb_row_part part="1.2"][dzspgb_element input_type="input" input_label_name="Name..." input_name="name" is_required="on" type_element="input"][/dzspgb_element][/dzspgb_row_part][dzspgb_row_part part="1.2"][dzspgb_element input_type="input" input_label_name="Email..." input_name="email" is_required="on" type_element="input"][/dzspgb_element][/dzspgb_row_part][/dzspgb_row][dzspgb_row column_padding="10"][dzspgb_row_part part="1.1"][dzspgb_element input_type="input" input_label_name="Subject..." input_name="subject" type_element="input"][/dzspgb_element][/dzspgb_row_part][/dzspgb_row][dzspgb_row column_padding="10"][dzspgb_row_part part="1.1"][dzspgb_element input_type="textarea" input_label_name="Comment..." input_name="message" is_required="on" type_element="input"][/dzspgb_element][/dzspgb_row_part][/dzspgb_row][dzspgb_row column_padding="default"][dzspgb_row_part part="1.1"][dzspgb_element button_content="SEND MESSAGE" type_element="button"][/dzspgb_element][dzspgb_element success_text="Thank you for your feedback" type_element="feedback_text"][/dzspgb_element][/dzspgb_row_part][/dzspgb_row]');
                }



                console.info("CEVA");


                $('.dzspgb-builder--wrap').eq(0).get(0).api_update_pb();
                import_form_close();

                return false;


            }
        }
    }


    function import_form_close(){
        var _c2 = $('.import-form-con').eq(0);

        $('.import-form-con--label').fadeOut("fast");

        // console.info(_c2);

        _c2.css('height', _c2.height());
        _c2.animate({
            'height':'0'
            ,'opacity' : '0'
        },{
            duration: 300
            ,queue:false
        });
    }


    if($('.wrap').eq(0).hasClass('wrap-for-antfarm-mo')){
        // -- is main options page


        console.info("ceva");

        $('.saveconfirmer').fadeOut("slow");


        $('.antfarm-mo-save-mainoptions').bind('click', mo_saveall);
    }
})



















function antfarm_receiver(arg){
    var aux = '';
    var bigaux = '';
    //console.log(arg);
    if(window.console) { console.info(arg); };

    //console.log(jQuery('#dzspb-pagebuilder-con'), jQuery('#dzspb-pagebuilder-con').css);
    if(jQuery('#dzspb-pagebuilder-con').length > 0 && jQuery('#dzspb-pagebuilder-con').eq(0).css('display')=='block' && typeof top.dzspb_lastfocused!='undefined'){
        jQuery(top.dzspb_lastfocused).val(arg);
        jQuery(top.dzspb_lastfocused).trigger('change');
    }else{


        console.info(window.mceeditor_sel, ' --- ', window.htmleditor_sel,jQuery('#wp-content-wrap').hasClass('tmce-active'));
        if(jQuery('#wp-content-wrap').hasClass('tmce-active') && window.tinyMCE.activeEditor!=null && jQuery('#content_parent').css('display')!='none'){

            // console.info('ed - ',ed);
            console.info('editors - ',window.tinyMCE.editors)


            var ed = window.tinyMCE.get('content');

            if(window.tinyMCE.get('wpb_tinymce_content')){
                ed = window.tinyMCE.get('wpb_tinymce_content');
            }

            console.info('ed - ', ed);


            // console.info("TEST ED -> ",window.tinyMCE.get('content213213'));
            // console.info("TEST ED -> ",window.tinyMCE.get('content'));


            if(window.mceeditor_sel!='notset'){
                if(typeof window.tinyMCE!='undefined'){
                    if(typeof window.tinyMCE.activeEditor!='undefined') {
                        // window.tinyMCE.activeEditor.selection.moveToBookmark(window.tinymce_cursor);
                    }


                    // -- get content
                    // var ed = window.tinyMCE.get('content')

;

                    // console.info("CEVA");
                    if(typeof ed.execInstanceCommand!='undefined') {
                        // console.info("CEVA1");
                        ed.execInstanceCommand('content', 'mceInsertContent', false, arg);
                    }else{

                        // console.info("CEVA2", ed, ed.selection, ed.selection.getContent());
                        if(ed && ed.execCommand) {
                            // console.info("CEVA21");
                            ed.execCommand('mceReplaceContent',false, arg);

                            if(window.remember_sel){

                                // ed.dom.remove(ed.dom.select('div')[0])
                                ed.dom.remove(window.remember_sel);

                                window.remember_sel = null;
                            }
                            // window.tinyMCE.get('content').execCommand('mceInsertContent', false, arg);
                        }else{

                            console.info("CEVA22");
                            ed.execCommand('mceReplaceContent',false, arg);
                        }
                    }
                }


            }else{

                ed.execCommand('mceReplaceContent',false, arg);
            }
        }else{
            aux = jQuery("#content").val();
            console.log('here -->'+arg+'<-- ',aux);


            if(aux){

                bigaux = aux+arg;
                //console.log('here -->'+arg+'<-- ',bigaux,'here -->'+window.htmleditor_sel+'<-- ');
                if(window.htmleditor_sel){
                    bigaux = aux.replace(window.htmleditor_sel,arg);
                }
                //console.log('here -->'+arg+'<-- ',bigaux);
                jQuery("#content").val( bigaux );
            }
        }
    }
    //console.log(bigaux);
    jQuery.fn.zoomBox.close();
}
window.close_zoombox=function(){
    jQuery.fn.zoomBox.close();

}





