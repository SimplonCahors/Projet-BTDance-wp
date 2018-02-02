

jQuery(document).ready(function($){




    if(window.dzsvp_init){

        dzsvp_init('.vplayer-tobe.auto-init', {init_each: true});
    }




    if(window.dzsap_init) {
        $('.audioplayer,.audioplayer-tobe').each(function () {
            var _t2 = $(this);

            if (_t2.hasClass('auto-init')) {
                if (_t2.hasClass('audioplayer-tobe') == true) {
                    dzsap_init(_t2, {
                        init_each: true
                    });
                }
            }

        });
    }


    if(window.dzsas_init) {
        dzsas_init('.advancedscroller.auto-init', {init_each: true})
    }

});