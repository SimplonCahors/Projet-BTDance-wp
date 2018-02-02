


// console.info("CEVA");
jQuery(document).ready(function($) {
    // console.info($('.iconselector .iconselector-waiter'));


    // console.info("$('.wrap').eq(0) - ", $('.wrap').eq(0), $('.wrap').eq(0).hasClass('wrap-for-antfarm_shortcode_generator_button'));

    if ($('.wrap').eq(0).hasClass('wrap-for-antfarm_shortcode_generator_button')) {
        // -- is main options page


        // console.info("ceva HIDE FEEDBACKER");




        $(document).delegate('.wrap-for-antfarm_shortcode_generator_button .insert-shortcode', 'click', handle_mouse);

        $('.feedbacker').fadeOut("slow");


        // $('.dzsvg-mo-save-mainoptions').bind('click', mo_saveall);
    }

    if ($('.wrap').eq(0).hasClass('wrap-for-antfarm_shortcode_generator_divider')) {
        // -- is main options page


        console.info("ceva");

        $(document).delegate('.wrap *[name=style]', 'change', handle_submit);
        $(document).delegate('.wrap *[name=padding]', 'change', handle_submit);
        $(document).delegate('.wrap .insert-shortcode', 'click', handle_mouse);

        $('.feedbacker').fadeOut("slow");


        // $('.dzsvg-mo-save-mainoptions').bind('click', mo_saveall);
    }






    function handle_submit(e) {

    }


    function handle_mouse(e) {
        var _t = $(this);
        var _con = null;


        if (e.type == 'click') {
            if (_t.hasClass('insert-shortcode')) {

                prepare_fout();
                tinymce_add_content(fout);
                return false;
            }
        }
    }





    function prepare_fout(){



        fout='';





        if($('.wrap').eq(0).hasClass('wrap-for-antfarm_shortcode_generator_divider')){
            fout+='[antfarm_divider';
            var _c,
                _c2
                ,lab = ''
            ;
            /*
             _c = $('input[name=settings_width]');
             if(_c.val()!=''){
             fout+=' width=' + _c.val() + '';
             }
             _c = $('input[name=settings_height]');
             if(_c.val()!=''){
             fout+=' height=' + _c.val() + '';
             }
             */


            lab = 'height';
            _c = $('*[name="'+lab+'"]');

            if(1){
                fout+=' '+lab+'="' + _c.val() + '"';
            }

            lab = 'style';
            _c = $('*[name="'+lab+'"]');

            if(1){
                fout+=' '+lab+'="' + _c.val() + '"';
            }

            lab = 'color';
            _c = $('*[name="'+lab+'"]');

            if(_c.val()){
                fout+=' '+lab+'="' + _c.val() + '"';
            }



            fout+=']';
            fout+='[/antfarm_divider]';
        }


        if($('.wrap').eq(0).hasClass('wrap-for-antfarm_shortcode_generator_button')){
            fout+='[antfarm_button';
            var _c,
                _c2
                ,lab = ''
            ;
            /*
             _c = $('input[name=settings_width]');
             if(_c.val()!=''){
             fout+=' width=' + _c.val() + '';
             }
             _c = $('input[name=settings_height]');
             if(_c.val()!=''){
             fout+=' height=' + _c.val() + '';
             }
             */
            lab = 'style';
            _c = $('*[name="'+lab+'"]');

            if(1==1){
                fout+=' '+lab+'="' + _c.val() + '"';
            }


            lab = 'padding';
            _c = $('*[name="'+lab+'"]');

            if(1==1){
                fout+=' '+lab+'="' + _c.val() + '"';
            }



            lab = 'rounded';
            _c = $('*[name="'+lab+'"]');

            if(1==1){
                fout+=' '+lab+'="' + _c.val() + '"';
            }



            lab = 'the_icon';
            _c = $('*[name="'+lab+'"]');

            if(1==1){
                fout+=' '+lab+'="' + _c.val() + '"';
            }


            lab = 'link';
            _c = $('*[name="'+lab+'"]');

            if(_c.val()){
                fout+=' '+lab+'="' + _c.val() + '"';
            }



            lab = 'link_target';
            _c = $('*[name="'+lab+'"]');

            if(_c.val()){
                fout+=' '+lab+'="' + _c.val() + '"';
            }



            fout+=']';
            lab = 'content';
            _c = $('*[name="'+lab+'"]');

            if(1==1){
                fout+='' + _c.val() + '';
            }
            fout+='[/antfarm_button]';
        }

    }




    function tinymce_add_content(arg){
        console.log('tinymce_add_content()', arg);

        if(window==top){
            $('.shortcode-output').text(arg);
        }

        if(typeof(parent.antfarm_receiver)=='function'){
            parent.antfarm_receiver(arg);
        }
    }



});