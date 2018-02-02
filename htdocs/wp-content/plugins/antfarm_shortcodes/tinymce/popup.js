
//top.dzsp_startinit = '[zoomfolio settings_mode="simple" skin="skin-clean" settings_specialgrid="special-grid-3" settings_lightboxlibrary="zoombox" design_item_width="280" fullscreen="off" sort_order="ASC" settings_disablecats="off" disable_itemmeta="off" settings_preloadall="off" design_categories_style="normal" design_pageContent_pos="top" settings_specialgrid_chooser_enabled="off" design_categories_pos="bottom" settings_biggalleryall="off" orderby="date" settings_ajax="on" settings_ajax_loadmoremethod="button" bgcolor="transparent" settings_mode_masonry_layout="masonry" design_total_height_full="off" settings_mode_masonry_layout_straightacross_setitemsoncenter="off"]';

//console.info('startinit is '+top.dzsp_startinit);

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

jQuery(document).ready(function($){


    var _feedbacker = $('.feedbacker').eq(0);
    if(typeof(dzstln_settings)!='undefined' && dzstln_settings.startSetup!=''){
        top.dzstln_startinit = dzstln_settings.startSetup;
    }

    console.info('startinit is '+top.dzstln_startinit);

    var coll_buffer=0;
    var fout='';





    // ---- some custom code for initing the generator ( previous values )
    if(typeof top.dzstln_startinit!='undefined' && top.dzstln_startinit!=''){


        var regex_initmarkup_isshortcode = /\[dzs_pricingtable.*?\][\s\S]*?\[\/dzs_pricingtable]/g;


        var arr_settings = ['mode', 'skin', 'post_type', 'date_format', 'cat', 'desc_length', 'strip_shortcodes', 'strip_html'];

        $('.dzstln-admin').append('<div class="misc-initSetup"><h5>Start Setup</h5></h5><p>'+htmlEncode(top.dzstln_startinit)+'</p></div>');


        var res;
        var lab='';
        for(key in arr_settings){

            lab = arr_settings[key];
            res = get_shortcode_attr(lab, top.dzstln_startinit);
//            console.info(res, lab, top.dzstln_startinit);
            if(res){
                $('*[name="'+lab+'"]').val(res['val']);
                $('*[name="'+lab+'"]').trigger('change');
            }
        }







    }

    reskin_select();









    $('select[name=post_type]').bind('change', handle_change);
    $('.btn-insert-shortcode,.btn-install-example-1, .btn-delete-sample-data').bind('click', handle_mouse);




    $('select[name=post_type]').trigger('change');




    function handle_change(e){



        var _t = $(this);



        if(e.type=='change'){
            if(_t.attr('name')=='post_type'){
                //console.info(_t);





                var data = {
                    action: 'dzstln_get_categories',
                    postdata:  _t.val()
                };




                jQuery.post(ajaxurl, data, function(response) {
                    //console.log(response);
                    if(window.console !=undefined ){
                        console.log(response);
                    }


                    if(response.indexOf('error -') == 0 || response==''){
                        //console.log('ceva');
                        show_feedback(response);
//                jQuery('.import-error').html(response.substr(7));
//                jQuery('.import-error').fadeIn('fast').delay(5000).fadeOut('slow');
                        return false;
                    }

                    $('select[name=cat]').html(response);


                    setTimeout(function(){
                        $('select[name=cat]').trigger('change');
                    },500);










                });




            }

        }
    }

    function handle_mouse(e) {


        var _t = $(this);


        if (e.type == 'click') {

            if(_t.hasClass('btn-insert-shortcode')){
                var arg = prepare_fout();
                tinymce_add_content(arg);
            }
            if(_t.hasClass('btn-install-example-1')){



                var data = {
                    action: 'dzstln_install_example_1'
                };


                jQuery.post(ajaxurl, data, function(response) {
                    if(response.charAt(response.length-1) == '0'){
                        response = response.slice(0,response.length-1);
                    }
                    if(window.console !=undefined ){
                        console.log('Got this from the server: ' + response);
                    }
                    show_feedback(response);
                    //jQuery('#save-ajax-loading').css('visibility', 'hidden');

                    tinymce_add_content(response);
                });

            }
            if(_t.hasClass('btn-delete-sample-data')){



                var data = {
                    action: 'dzstln_delete_sample_data'
                };


                jQuery.post(ajaxurl, data, function(response) {
                    if(response.charAt(response.length-1) == '0'){
                        response = response.slice(0,response.length-1);
                    }
                    if(window.console !=undefined ){
                        console.log('Got this from the server: ' + response);
                    }
                    show_feedback(response);
                    //jQuery('#save-ajax-loading').css('visibility', 'hidden');
                });

            }
        }
    }




















    function prepare_fout(){
        fout='';
        fout+='[zoomtimeline';
        var _c,
            _c2
            ;


        var lab = '';


        lab = 'mode';
        _c = $('*[name='+lab+']');
        if(_c.val()!=''){
            fout+=' '+lab+'="' + _c.val() + '"';
        }


        lab = 'post_type';
        _c = $('*[name='+lab+']');
        if(_c.val()!=''){
            fout+=' '+lab+'="' + _c.val() + '"';
        }

        lab = 'cat';
        _c = $('*[name='+lab+']');
        if(_c.val()!=''){
            fout+=' '+lab+'="' + _c.val() + '"';
        }

        lab = 'date_format';
        _c = $('*[name='+lab+']');
        if(_c.val()!=''){
            fout+=' '+lab+'="' + _c.val() + '"';
        }

        lab = 'skin';
        _c = $('*[name='+lab+']');
        if(_c.val()!=''){
            fout+=' '+lab+'="' + _c.val() + '"';
        }

        lab = 'desc_length';
        _c = $('*[name='+lab+']');
        if(_c.val()!=''){
            fout+=' '+lab+'="' + _c.val() + '"';
        }

        lab = 'strip_shortcodes';
        _c = $('*[name='+lab+']');
        if(_c.val()!=''){
            fout+=' '+lab+'="' + _c.val() + '"';
        }

        lab = 'strip_html';
        _c = $('*[name='+lab+']');
        if(_c.val()!=''){
            fout+=' '+lab+'="' + _c.val() + '"';
        }




        fout+=']';

        return fout;
    }
    function prepare_preview(){
        prepare_fout();
        var data = {
            action: 'dzstln_preparePreview',
            postdata: fout
        };


        jQuery.post(ajaxurl, data, function(response) {
            if(response.charAt(response.length-1) == '0'){
                response = response.slice(0,response.length-1);
            }
            if(window.console !=undefined ){
                //console.log('Got this from the server: ' + response);
            }
            $('.preview-inner').html(response);
            //jQuery('#save-ajax-loading').css('visibility', 'hidden');
        });

    }


    function show_feedback(arg,pargs){


        var margs = {
            extra_class : ''
        }


        if(pargs){
            margs = $.extend(margs,pargs);
        }



        var theclass = 'feedbacker '+margs.extra_class;

        if(margs.extra_class==''){
            //console.info(arg.indexOf('success - '));
            if(arg.indexOf('success - ')==0){
                arg = arg.substr(10);
            }
            if(arg.indexOf('error - ')==0){
                arg = arg.substr(8);
                theclass = 'feedbacker is-error';
            }
        }

        _feedbacker.attr('class', theclass);

        _feedbacker.html(arg);
        _feedbacker.fadeIn('fast');


        setTimeout(function(){

            _feedbacker.fadeOut('slow');
        },2000);

    }

})



function tinymce_add_content(arg){
	
    if(typeof(top.dzstln_receiver)=='function'){
        top.dzstln_receiver(arg);
    }else{
        jQuery('.testoutput').eq(0).html(arg);
    }
}
function reskin_select(){
	for(i=0;i<jQuery('select').length;i++){
		var $cache = jQuery('select').eq(i);
		//console.log($cache.parent().attr('class'));
		
		if($cache.hasClass('styleme')==false || $cache.parent().hasClass('select_wrapper') || $cache.parent().hasClass('select-wrapper')){
		continue;
		}
		var sel = ($cache.find(':selected'));
		$cache.wrap('<div class="select-wrapper"></div>')
		$cache.parent().prepend('<span>' + sel.text() + '</span>')
	}
//	jQuery(document).undelegate('.select-wrapper select', 'change',change_select);
    jQuery('.select-wrapper select').unbind('change',change_select);
    jQuery('.select-wrapper select').bind('change',change_select);
        
    function change_select(){
            var selval = (jQuery(this).find(':selected').text());
            jQuery(this).parent().children('span').text(selval);
    }
}
