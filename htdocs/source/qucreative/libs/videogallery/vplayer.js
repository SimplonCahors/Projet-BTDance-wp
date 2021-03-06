
/*
 * Author: Digital Zoom Studio
 * Website: http://digitalzoomstudio.net/
 * Portfolio: http://codecanyon.net/user/ZoomIt/portfolio?ref=ZoomIt
 * This is not free software.
 * Video Gallery
 * Version: 9.14
 */

"use strict";

var vgsettings = {
    protocol: 'https'
    , vimeoprotocol: 'https:'
};

var youtubeid_array = []; // -- an array to hold inited youtube videos
var dzsvp_players_arr = []; // -- an array to hold video players
var dzsvp_yt_iframe_settoload = false;
var _global_youtubeIframeAPIReady  = false;


window.backup_onYouTubePlayerReady = null;
var backup_onYouTubePlayerReady = null;

window.dzsvg_self_options = {};
window.dzsvp_self_options = {};

//VIDEO GALLERY
(function($) {




})(jQuery);








//-------VIDEO PLAYER
var ytplayer;
(function($) {
    $.fn.vPlayer = function(o) {

        var defaults = {
            type: 'normal'
            ,autoplay: "off"
            ,videoWidth: 0
            ,videoHeight: 0
            ,design_scrubbarWidth: 'default'
            ,gallery_object: null
            ,design_skin: 'skin_default'
            , design_background_offsetw: 0
            , settings_youtube_usecustomskin: 'on'
            , settings_ios_usecustomskin: 'on'
            , cueVideo: 'on'
            , settings_disableControls: 'off'
            , is_ad: 'off'
            , settings_hideControls: 'off'
            , ad_link: ''
            , settings_suggestedQuality: 'hd720'
            , design_enableProgScrubBox: 'default'
            , settings_enableTags: 'on'
            , settings_disableVideoArray: 'off'
            , settings_makeFunctional: false
            ,settings_video_overlay: "off" // == an overlay over the video that you can press for pause / unpause
            , htmlContent: ''
            , settings_swfPath: 'preview.swf'
            ,settings_disable_mouse_out:'off'  // -- disable the normal mouse-is-out behaviour when mouse leaves the player
            ,settings_disable_mouse_out_for_fullscreen:'off'  // -- disable the normal mouse-is-out behaviour when mouse is in the player / fullscreen
            , controls_fscanvas_bg: '#aaa'
            , controls_fscanvas_hover_bg: '#ddd'
            , fpc_background: ''
            , fpc_controls_background: ''
            , fpc_scrub_background: ''
            , fpc_scrub_buffer: ''
            , fpc_controls_color: ''
            , fpc_controls_hover_color: ''
            , fpc_controls_highlight_color: ''
            , fpc_thumbs_bg: ''
            , fpc_thumbs_active_bg: ''
            , fpc_thumbs_text_color: ''
            , google_analytics_send_play_event: 'off'
            , settings_video_end_reset_time: 'on' // -- when the video has ended, reset the time to 0
            ,settings_mouse_out_delay: 100
            ,settings_mouse_out_delay_for_fullscreen: 1100
            ,rtmp_streamServer : '' // -- only for rtmp use ( advanced ) if you have a rtmp server
            ,playfrom : 'default' // play from a index , default means that this will be decided by the data-playfrom
            ,settings_subtitle_file : '' // -- set a subtitle file
            ,responsive_ratio : 'default' // -- set a responsive ratio height/ratio 0.5 means that the player height will resize to 0.5 of the gallery width
            ,action_video_play: null
            ,action_video_view: null // -- an external function that you can set to record a view of the video - will be only cast once on play
            ,action_video_contor_10secs: null
        }


        if(typeof o =='undefined'){
            if(typeof $(this).attr('data-options')!='undefined' && $(this).attr('data-options')!=''){
                var aux = $(this).attr('data-options');
                try{
                    o = $.extend({},JSON.parse(aux) );

                }catch(err){

                    o = defaults;
                }
            }
        }


        o = $.extend(defaults, o);
        //console.info(o);

        /*
         * the way the plugin works is.
         * first the markup is analyzed
         * then the init function
         * then the init_readyVideo function
         *
         */
        this.each(function() {

            var cthis
                ,cid = ''
            ;
            var the_player_id = ''; // -- this is set only if the player actually has an id

            var controlsDiv;
            var videoWidth
                , videoHeight
                , totalWidth
                , totalHeight;
            var video;
            var aux = 0;
            var aux2 = 0;
            var is_fullscreen = 0;
            var inter_videoReadyState // interval to check for time
                ,inter_checkytadend // interval to check on when the youtube video ad has ended
                ,inter_removeFsControls // interval to remove fullscreen controls when no action is detected
            ;
            var lastVolume;
            var defaultVolume;
            var infoPosX;
            var infoPosY;
            var wasPlaying = false;
            var autoplay = "off";
            var fScreenControls
                , playcontrols
                , _volumeControls
                , _volumeControls_real
                , info
                , infotext
                , scrubbar
                , _scrubBg
                , _timetext
                , _btnhd
                , _adSkipCon = null
                , _controlsBackground = null
                , _muteControls = null

            ;
            var paused = true
                ,played = false
                ,initial_played = false
                ,google_analytics_sent_play_event = false
                ,volume_mouse_down = false
                ,scrub_mouse_down = false
                ,controls_are_hovered = false
                ,view_sent = false
                ,fullscreen_just_pressed = false
            ;
            var ie8paused = true;
            var totalDuration = 0;
            var time_curr = 0;
            var dataType = '';
            var dataFlash = '';
            var dataSrc = '';
            var dataVideoDesc = '';

            var video_title = '';

            var dash_player = null
                ,dash_context = null
                ,dash_inter_check_sizes = 0
            ;
            //responsive vars
            var conw
                , conh
                , newconh
                , _rparent
                , _vgparent
                , currScale = 1
            ;
            var ww
                , wh
            ;
            var yt_qualArray = []
                , yt_qualCurr
                , hasHD = false
            ;

            var arrTags = [];

            var bufferedLength = -1
                , bufferedWidthOffset = 0
                , volumeLength = 0
                , volumeWidthOffset = 0
            ;
            var time_counter_skipad = 0;
            var inter_time_counter_skipad = 0
                ,inter_check_yt_iframe_ready = 0
                ,inter_clear_playpause_mistake = 0
            ;


            var busy_playpause_mistake = false
            ;

            var _controls_fs_canvas;

            var vimeo_data, vimeo_url;


            var dzsvg_translate_youcanskipto = 'you can skip to video in ';
            var translate_skipad = 'Skip Ad';

            var inter_10_secs_contor = 0
            ;



            var str_fpc_background = '';

            var str_fpc_controls_background = '';
            var str_fpc_scrub_background = '';
            var str_fpc_scrub_buffer = '';
            var str_fpc_controls_color = '';
            var str_fpc_controls_hover_color = '';
            var str_fpc_controls_highlight_color = '';
            var str_fpc_thumbs_bg = '';
            var str_fpc_thumbs_active_bg = '';
            var str_fpc_thumbs_text_color = '';

            var original_scrubwidth = 0;


            if(window.dzsvg_translate_youcanskipto!=undefined){ dzsvg_translate_youcanskipto = window.dzsvg_translate_youcanskipto;  }
            if(window.dzsvg_translate_skipad){ translate_skipad = window.dzsvg_translate_skipad; }

            cthis = $(this);


            if(typeof(cthis.attr('id'))!='undefined'){
                the_player_id = cthis.attr('id');
            }

            if(typeof cthis.attr('id')!='undefined' && cthis.attr('id')!=''){
                cid = cthis.attr('id');
            }else{
                cid = 'dzsvp'+parseInt(Math.random()*1000,10)
            }




            if (cthis.parent().parent().parent().hasClass('videogallery')) {
                _vgparent = cthis.parent().parent().parent();
            }


            //console.log(cthis, cthis.css('width'));

            autoplay = o.autoplay;

            //console.log(o);

            //==some sanitizing of the videoWidth and videoHeight parameters





            if (o.videoWidth == 0) {
                videoWidth = cthis.width();
            } else {
                videoWidth = o.videoWidth;
            }

            if (o.videoHeight == 0) {
                videoHeight = cthis.height();
            } else {
                videoHeight = o.videoHeight;
            }
            if (o.autoplay == 'on') {

            }

            if(is_ios() || is_android()){
                autoplay = 'off';
                o.autoplay='off';

            }


            //console.info(cthis, o.responsive_ratio);

//            console.info(Number(o.playfrom));
            if(o.playfrom=='default'){
                if(typeof cthis.attr('data-playfrom')!='undefined' && cthis.attr('data-playfrom')!=''){
                    o.playfrom = cthis.attr('data-playfrom');
                }
            }
            if(isNaN(Number(o.playfrom))==false){
                o.playfrom = Number(o.playfrom);
            }

            if(o.is_ad=='on'){
//                console.info(cthis);

                if(o.type=='youtube'){

                }
            }


            init();
            function init() {
                //console.info('init()', cthis);

                if (cthis.hasClass('vplayer-tobe')) {

                    //alert('ceva');
                    var _c = cthis;
                    _c.removeClass('vplayer-tobe');
                    _c.addClass('vplayer');

                    //console.log(autoplay, cthis);


                    if(_global_youtubeIframeAPIReady==false && dzsvp_yt_iframe_settoload==false){
                        var head= document.getElementsByTagName('head')[0];
                        var script= document.createElement('script');
                        script.type= 'text/javascript';
                        script.src= 'https://www.youtube.com/iframe_api';
                        head.appendChild(script);
                        dzsvp_yt_iframe_settoload=true;
                    }

                    if(o.settings_disableVideoArray!='on'){
                        dzsvp_players_arr.push(cthis);
                    }


                    var mainClass = '';
                    if (typeof(cthis.attr('class')) == 'string') {
                        mainClass = cthis.attr('class');
                    } else {
                        mainClass = cthis.get(0).className;
                    }

                    if (mainClass.indexOf('skin_') == -1) {
                        cthis.addClass(o.design_skin);
                        mainClass += ' ' + o.design_skin;
                    }


                    //console.info('scrubbar width - ',cthis, o.design_scrubbarWidth);
                    //-setting skin specific vars
                    if (mainClass.indexOf('skin_aurora') > -1) {
                        o.design_skin = 'skin_aurora';
                        bufferedWidthOffset = 0;
                        volumeWidthOffset = -2;
                        if (o.design_enableProgScrubBox == 'default') {
                            o.design_enableProgScrubBox = 'on';
                        }
                        if (o.design_scrubbarWidth == 'default') {
                            o.design_scrubbarWidth = -113;
                        }
                    }
                    if (mainClass.indexOf('skin_pro') > -1) {
                        o.design_skin = 'skin_pro';
                        bufferedWidthOffset = 0;
                        volumeWidthOffset = -2;
                        if (o.design_enableProgScrubBox == 'default') {
                            o.design_enableProgScrubBox = 'off';
                        }
                        if (o.design_scrubbarWidth == 'default') {
                            o.design_scrubbarWidth = 0;
                        }
                    }
                    if (mainClass.indexOf('skin_bigplay') > -1) {
                        o.design_skin = 'skin_bigplay';
                    }
                    if (mainClass.indexOf('skin_bigplay_pro') > -1) {
                        o.design_skin = 'skin_bigplay_pro';
                    }
                    if (mainClass.indexOf('skin_bluescrubtop') > -1) {
                        o.design_skin = 'skin_bluescrubtop';

                        if (o.design_scrubbarWidth == 'default') {
                            o.design_scrubbarWidth = 0;
                        }
                    }
                    if (mainClass.indexOf('skin_avanti') > -1) {
                        o.design_skin = 'skin_avanti';

                        if (o.design_scrubbarWidth == 'default') {
                            o.design_scrubbarWidth = -125;
                        }
                    }
                    if (mainClass.indexOf('skin_noskin') > -1) {
                        o.design_skin = 'skin_noskin';
                    }



                    if(cthis.hasClass('skin_white')){
                        o.design_skin='skin_white';
                    }
                    if(cthis.hasClass('skin_reborn')){
                        o.design_skin='skin_reborn';
                        if (o.design_scrubbarWidth == 'default') {
                            o.design_scrubbarWidth = -312;
                        }
                    }

//                    console.info(o.design_scrubbarWidth);
                    if (o.design_scrubbarWidth == 'default') {
                        o.design_scrubbarWidth = -201;
                    }

                    if(is_android() || is_ios()){
                        cthis.addClass('disable-volume');

                        if(o.design_skin=='skin_aurora'){
                            o.design_scrubbarWidth+=50;
                        }
                    }

                    original_scrubwidth = o.design_scrubbarWidth;




                    if (typeof _c.attr('data-src') == 'undefined' && typeof _c.attr('data-source') != 'undefined' && _c.attr('data-source') != '') {
                        _c.attr('data-src', _c.attr('data-source'));
                    }



                    if(typeof _c.attr('data-type')=='undefined' || _c.attr('data-type')==''){
                        if(typeof _c.attr('data-src')){
                            if(String(_c.attr('data-src')).indexOf('youtube.com/watch?')>-1){
                                _c.attr('data-type','youtube');



                            }

                            if(String(_c.attr('data-src')).indexOf('youtube.com/embed')>-1){
                                _c.attr('data-type','youtube');



                            }
                            if(String(_c.attr('data-src')).indexOf('vimeo.com/')>-1){
                                _c.attr('data-type','vimeo');



                            }
                            if(String(_c.attr('data-src')).indexOf('.mp4')>-1){
                                _c.attr('data-type','normal');

                            }


                        }
                    }



                    //console.info('type is ',_c.attr('data-type'));

                    if (_c.attr('data-type') == 'youtube') {
                        o.type = 'youtube';
                    }
                    if (_c.attr('data-type') == 'video') {
                        o.type = 'normal';
                    }
                    if (_c.attr('data-type') == 'dash') {
                        o.type = 'normal';
                    }
                    if (_c.attr('data-type') == 'vimeo') {
                        o.type = 'vimeo';
                    }
                    if (_c.attr('data-type') == 'image') {
                        o.type = 'image';
                    }
                    if (_c.attr('data-type') == 'audio') {
                        o.type = 'audio';
                    }
                    if (_c.attr('data-type') == 'inline') {
                        o.type = 'inline';
                    }
                    if (_c.attr('data-adlink') != undefined && _c.attr('data-adlink') != '') {
                        o.ad_link = _c.attr('data-adlink');
                        //console.log(o.ad_link);
                    }
                    _rparent = cthis.parent();

//                    console.info(cthis, o, o.settings_disableControls);

                    if (o.type == 'inline') {

                        //console.info(o);
                        if (o.htmlContent != '') {
                            cthis.html(o.htmlContent);
                        }

                        if (cthis.children().length > 0) {
                            var _cach = cthis.children().eq(0);
                            if (_cach.get(0) != undefined) {
                                if (_cach.get(0).nodeName == 'IFRAME') {
                                    _cach.attr('width', '100%');
                                    _cach.attr('height', '100%');
                                }
                            }
                        }
                    }


                    if(o.is_ad=='on'){
//                console.info(cthis);

                        if(o.type=='youtube' && is_touch_device() && $(window).width()<700){

                            cthis.addClass('is-touch-device type-youtube');

                        }
                    }

                    var aux33= '<div class="controls"></div>';

                    if(cthis.children('.cover-image').length>0){
                        //console.info('ceva',aux33);
                        cthis.children('.cover-image').eq(0).before(aux33);
                    }else{

                        cthis.append(aux33);
                    }

                    controlsDiv = cthis.find('.controls');


                    if(o.design_skin == 'skin_aurora'){
                        //console.info('ceva');


                        if(is_touch_device()){

                            //cthis.append('<div class="touch-play-btn"></div>');
                        }

                    }

                    //console.log('ceva');



                    //console.log(videoWidth);
                    totalWidth = videoWidth;
                    totalHeight = videoHeight;

                    //console.log(cthis, videoWidth);
                    cthis.css({
                        //'width': videoWidth,
                        //'height': videoHeight
                    })

                    if(videoWidth=='100%'){

                    }

                    if (cthis.attr('data-videoTitle')) {
                        cthis.append('<div class="video-description"></div>')
                        cthis.children('.video-description').append('<div class="video-title">' + cthis.attr('data-videoTitle') + '</div>');
                        if (dataVideoDesc != '') {
                            cthis.children('.video-description').append('<div class="video-subdescription">' + dataVideoDesc + '</div>');
                        }
                        cthis.find('.video-subdescription').css('width', (0.7 * videoWidth));

                        video_title = cthis.attr('data-videoTitle');
                    }

                    if(video_title==''){

                        //console.warn(cthis.children());
                    }

                    //console.warn(video_title);

                    //if (cthis.css('position') != 'absolute' && cthis.css('position') != 'fixed') {
                    //    cthis.css('position', 'relative')
                    //}

                    //console.log(o.type);


                    if (o.type != 'vimeo' && o.type != 'image' && o.type != 'inline') {
                        var aux34 = '<div class="background"></div><div class="playcontrols"></div><div class="scrubbar"></div><div class="timetext"><span class="curr-timetext"></span><span class="total-timetext"></span></div><div class="volumecontrols"></div><div class="fscreencontrols"></div>';
                        controlsDiv.append(aux34);

                        if(o.design_skin=='skin_avanti'){
                            controlsDiv.append('<div class="mutecontrols-con"><div class="btn-mute"></div><div class="btn-mute-hover"></div><div class="btn-unmute"></div><div class="btn-unmute-hover"></div></div>');

                            _muteControls = controlsDiv.find('.mutecontrols-con').eq(0);
                        }
                    }


                    _controlsBackground = controlsDiv.find('.background').eq(0);

                    if (o.type == 'image') {
                        cthis.attr('data-img', cthis.attr('data-src'));


                    }


                    if (typeof cthis.attr('data-img') != 'undefined' && cthis.attr('data-img')!='') {
                        cthis.prepend('<div class="cover-image"><div class="the-div-image" style="background-image:url(' + cthis.attr('data-img') + ');"/></div>');
                    }


                    if (o.type == 'image') {

                        cthis.addClass('dzsvp-loaded');


                        if (o.ad_link != '') {

                            var _c = cthis.children().eq(0);
                            _c.css({'cursor': 'pointer'})
                            _c.bind('click', function() {
                                if(cthis.find('.controls').eq(0).css('pointer-events')!='none'){

                                    window.open(o.ad_link);
                                }
                            })
                        }
                        setup_skipad();
                        return;
                    }


                    if (o.type == 'inline') {

                        if (o.settings_disableControls == 'on') {
                            if (o.ad_link != '') {

                                var _c = cthis.children().eq(0);
                                _c.css({'cursor': 'pointer'})
                                _c.bind('click', function() {
                                    window.open(o.ad_link);
                                })
                            }

                        }
                        cthis.find('.cover-image').bind('click',function(){
                            $(this).fadeOut('slow');
                        });
                        cthis.addClass('dzsvp-loaded');
                        setup_skipad();
                        return;
                    }



                    if (o.type == 'youtube') {
                        if (o.settings_disableControls == 'on') {
                            // -- for youtube ads we force enable the custom skin because we need to know when the video ended
                            o.cueVideo = 'on';
                            o.settings_youtube_usecustomskin='on';
                            o.autoplay='off';
                        }


                        if (o.ad_link != '') {

                            if(cthis.parent().hasClass('videogallery--adSpace')){
                                cthis.parent().css({'cursor': 'pointer'});
                                cthis.parent().unbind('click');
//                                console.info(cthis.parent());
                                cthis.parent().bind('click', function(e) {
                                    if(cthis.find('.controls').eq(0).css('pointer-events')!='none') {
                                        if($(e.target).hasClass('skipad')){

                                            return ;

                                        }

                                        if($(e.target).parent().hasClass('volumecontrols')){
                                            return;
                                        }

                                        //console.log(e.target);
                                        window.open(o.ad_link);
                                    }
                                })
                            }

                        }


                        setup_skipad();
                    }
                    info = cthis.find('.info');
                    infotext = cthis.find('.infoText');

                    ////info



                    var aux = '';
                    playcontrols = cthis.find('.playcontrols');



                    aux = '<div class="playSimple">';



                    aux+='</div><div class="playHover"></div><div class="pauseSimple">';




                    aux+='</div><div class="pauseHover"></div>';

                    playcontrols.append(aux);




                    var aux_scrub = '<div class="scrub-bg"></div><div class="scrub-buffer"></div><div class="scrub">';





                    aux_scrub+='</div><div class="scrubBox"></div><div class="scrubBox-prog"></div>';


                    scrubbar = cthis.find('.scrubbar');
                    scrubbar.append(aux_scrub);

                    _scrubBg = scrubbar.children('.scrub-bg');
//                    console.info(scrubbar, _scrubBg);

                    _timetext = cthis.find('.timetext').eq(0);




                    _volumeControls = cthis.find('.volumecontrols');
                    _volumeControls_real = cthis.find('.volumecontrols');

                    aux = '<div class="volumeicon">';






                    aux+='</div><div class="volume_static">';


                    if(o.design_skin=='skin_reborn'){
                        for(var i2=0;i2<10;i2++){
                            aux+='<div class="volbar"></div>';
                        }
                    }


                    aux+='</div><div class="volume_active">';






                    aux+='</div><div class="volume_cut"></div>';


                    if(o.design_skin=='skin_reborn') {
                        aux+='<div class="volume-tooltip">VOLUME: 100</div>';
                    }

                    _volumeControls.append(aux);

                    fScreenControls = cthis.find('.fscreencontrols');

                    aux = '<div class="full">';



                    if(o.design_skin=='skin_rebornTRYDIFFERENT') {
                        aux += '<svg class="for-fullscreen-inactive" version="1.1" baseProfile="tiny" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="14px" height="14px" viewBox="0 0 14 14" overflow="auto" xml:space="preserve"> <path fill-rule="evenodd" fill="none" d="M14,14V9h-1v4H9v1H14z M0,14h5v-1H1V9H0V14z M14,0H9v1h4v4h1V0z M0,0v5h1V1h4V0H0z"/> </svg>';

                        aux+='<svg class="for-fullscreen-active" version="1.1" baseProfile="tiny" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="14px" height="14px" viewBox="0 0 14 14" xml:space="preserve"> <path fill-rule="evenodd" fill="none" d="M5,5V0H4v4H0v1H5z M9,5h5V4h-4V0H9V5z M5,9H0v1h4v4h1V9z M9,9v5h1v-4h4V9H9z"/> </svg>';
                    }

                    if(o.design_skin=='skin_aurora') {
                        aux += '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 16 16" enable-background="new 0 0 16 16" xml:space="preserve"> <g id="Layer_3"> <polygon fill="#FFFFFF" points="2.404,2.404 0.057,4.809 0.057,0 4.751,0 "/> <polygon fill="#FFFFFF" points="13.435,2.404 11.03,0.057 15.839,0.057 15.839,4.751 "/> <polygon fill="#FFFFFF" points="2.404,13.446 4.809,15.794 0,15.794 0,11.1 "/> <polygon fill="#FFFFFF" points="13.435,13.446 15.781,11.042 15.781,15.851 11.087,15.851 "/> </g> <g id="Layer_2"> <rect x="4.255" y="4.274" fill="#FFFFFF" width="7.366" height="7.442"/> </g> </svg>';

                    }


                    aux+='</div><div class="fullHover"></div>';



                    if(o.design_skin=='skin_reborn') {
                        aux+='<div class="full-tooltip">FULLSCREEN</div>';
                    }


                    fScreenControls.append(aux);


                    if (o.design_skin == 'skin_pro' || o.design_skin == 'skin_bigplay') {
                        playcontrols.find('.pauseSimple').eq(0).append('<div class="pause-part-1"></div><div class="pause-part-2"></div>');
                        fScreenControls.find('.full').eq(0).append('<canvas width="15" height="15" class="fullscreen-button"></canvas>');


                        //console.log(fScreenControls.find('.full').eq(0));

                        _controls_fs_canvas=fScreenControls.find('.full').eq(0).find('canvas.fullscreen-button').eq(0)[0];
                        if( (!is_ie() || (is_ie() && version_ie()>8)) && _controls_fs_canvas!=undefined){
//                            console.info(o.controls_fscanvas_bg);
                            draw_fs_canvas(o.controls_fscanvas_bg);
                            $(_controls_fs_canvas).bind('mouseover', handleMouseover);
                            $(_controls_fs_canvas).bind('mouseout', handleMouseout);
                        }
                    }




                    if (_c.find('.videoDescription').length > 0) {
                        dataVideoDesc = _c.find('.videoDescription').html();
                        _c.find('.videoDescription').remove();
                    }

                    if (is_ie8() || o.type=='vimeo') {
                        o.cueVideo='on';
                    }


                    if(cthis.get(0)!=undefined){
                        //cthis.get(0).fn_change_mainColor = fn_change_mainColor; cthis.get(0).fn_change_mainColor('#aaa');
                        cthis.get(0).fn_change_color_highlight = fn_change_color_highlight; //cthis.get(0).fn_change_mainColor('#aaa');

                        cthis.get(0).api_handleResize = handleResize;
                        cthis.get(0).api_seek_to_perc = seek_to_perc;

                        cthis.get(0).api_currVideo_refresh_fsbutton = draw_fs_canvas;
                        cthis.get(0).api_reinit_cover_image = reinit_cover_image;
                        cthis.get(0).api_restart_video = restart_video();



                        //console.log('ceva');
                    }









                    //===setup player colors

                    if(o.fpc_background!=''){
                        str_fpc_background = '&player_controls_background='+String(o.fpc_controls_background).substr(1);
                    }

                    if(o.fpc_controls_background!=''){
                        str_fpc_controls_background = '&player_controls_background='+String(o.fpc_controls_background).substr(1);
                    }
                    if(o.fpc_scrub_background!=''){
                        str_fpc_scrub_background = '&player_scrub_background='+String(o.fpc_scrub_background).substr(1);
                    }
                    if(o.fpc_scrub_buffer!=''){
                        str_fpc_scrub_buffer = '&player_scrub_buffer='+String(o.fpc_scrub_buffer).substr(1);
                    }
                    if(o.fpc_controls_color!=''){
                        str_fpc_controls_color = '&player_controls_color='+String(o.fpc_controls_color).substr(1);
                    }
                    if(o.fpc_controls_hover_color!=''){
                        str_fpc_controls_hover_color = '&player_controls_hover_color='+String(o.fpc_controls_hover_color).substr(1);
                    }
                    if(o.fpc_controls_highlight_color!=''){
                        str_fpc_controls_highlight_color = '&player_controls_highlight_color='+String(o.fpc_controls_highlight_color).substr(1);
                    }
                    if(o.fpc_thumbs_bg!=''){
                        str_fpc_thumbs_bg = '&player_thumbs_bg='+String(o.fpc_thumbs_bg).substr(1);
                    }
                    if(o.fpc_thumbs_active_bg!=''){
                        str_fpc_thumbs_active_bg = '&player_thumbs_active_bg='+String(o.fpc_thumbs_active_bg).substr(1);
                    }
                    if(o.fpc_thumbs_text_color!=''){
                        str_fpc_thumbs_text_color = '&player_thumbs_text_color='+String(o.fpc_thumbs_text_color).substr(1);
                    }




                    //console.log(cthis, o.cueVideo, o.type);

                    //===if cueVideo is not on then, init_readyControls on click


                    //console.log("FIREFOX YOU BASTARD");
                    if(o.cueVideo=='on' || (!is_ie8() && ( !is_ios() || o.settings_ios_usecustomskin=='on') && (o.type=='normal'||o.type=='youtube') )){

                        if(o.type=='youtube'){
                            inter_check_yt_iframe_ready = setInterval(check_if_yt_iframe_ready, 100);
                        }else{
                            init_readyControls();
                        }
                    }else{

                        resizePlayer(videoWidth, videoHeight);
                        cthis.bind('click', init_readyControls);

                        cthis.addClass('dzsvp-loaded');

                    }

                    if (o.cueVideo != 'on') {


                        //--------------normal
                        if (!is_ie8() && ( !is_ios() || o.settings_ios_usecustomskin=='on')) {
                        }


                    } else {
                        //console.log(o.type);

                    }



                    if (o.settings_enableTags == 'on') {
                        setInterval(check_tags, 1000);
                    }



                    handleResize();
                }

                if(inter_10_secs_contor==0 && o.action_video_contor_10secs){
                    inter_10_secs_contor = setInterval(count_10secs, 10000);
                }


                //console.info(cthis, autoplay, o.autoplay);
            }

            function count_10secs(){
                if(o.action_video_contor_10secs && cthis.hasClass('is-playing')){
                    o.action_video_contor_10secs(cthis,video_title);
                }
            }

            function restart_video(){


                //console.info(o.type);
                if(o.type=='video'){
                    seek_to_perc(0);
                }
                if(o.type=='vimeo'){

                    seek_to_perc(0);
                }
                if(o.type=='youtube'){



                    if (video && video.pauseVideo) {
                        //console.info(dataSrc);
                    }

                }

                reinit_cover_image();
            }

            function check_if_yt_iframe_ready(){

//                console.info(o.type);
                if( (window.YT && window.YT.Player ) || _global_youtubeIframeAPIReady){
                    init_readyControls();
                    clearInterval(inter_check_yt_iframe_ready);
                }
            }

            function setup_skipad(){
                //console.info('setup_skipad()');
                if (o.settings_disableControls == 'on') {
                    var skipad_timer = 0;

                    if(o.type=='image' || o.type=='inline'){
                        skipad_timer=0;
                    }
                    if(o.type=='normal' || o.type=='youtube'){
                        skipad_timer=1001;
                    }

                    cthis.appendOnce('<div class="skipad-con"></div>', '.skinad-con');
                    _adSkipCon = cthis.find('.skipad-con').eq(0);

                    if(typeof cthis.attr('data-adskip_delay')!='undefined'){
                        skipad_timer = Number(cthis.attr('data-adskip_delay')) ;
                    }
                    //console.info(skipad_timer);

//                    console.info(cthis, cthis.attr('data-adskip_delay'), skipad_timer);
                    time_counter_skipad = skipad_timer;
//                    console.info(cthis, time_counter_skipad);
                    if(skipad_timer!=1001){
                        setTimeout(function(){
//                            console.info(cthis.find('.skipad-con').eq(0))
                            time_counter_skipad=0;
                            _adSkipCon.html('<div class="skipad">'+translate_skipad+'</div>');
                            _adSkipCon.children('.skipad').bind('click', function() {
                                handleVideoEnd();
                            })
                        }, skipad_timer*1000);

                        if(skipad_timer>0){
                            inter_time_counter_skipad = setInterval(tick_counter_skipad, 1000);
                        }
                    }


                }
            }
            function tick_counter_skipad(){

//                console.info(cthis, time_counter_skipad);
                if(time_counter_skipad>0){
                    time_counter_skipad= time_counter_skipad-1;
                    if(_adSkipCon){
                        _adSkipCon.html(dzsvg_translate_youcanskipto + time_counter_skipad);
                    }

                }else{
                    clearInterval(inter_time_counter_skipad);
                }
            }
            function draw_fs_canvas(argcol){

//                console.info(o.design_skin, argcol);
                if(o.design_skin!='skin_pro'){
                    return;
                }
                var ctx=_controls_fs_canvas.getContext("2d");
                var ctx_w = _controls_fs_canvas.width;
                var ctx_h = _controls_fs_canvas.height;
                var ctx_pw = ctx_w/100;
                var ctx_ph = ctx_w/100;
                //console.log(ctx_pw, c.width);
                ctx.fillStyle= argcol;
                var borderw = 30;
                ctx.fillRect(25*ctx_pw,25*ctx_ph,50*ctx_pw,50*ctx_ph);
                ctx.beginPath();
                ctx.moveTo(0*ctx_pw,0*ctx_ph);
                ctx.lineTo(0*ctx_pw,borderw*ctx_ph);
                ctx.lineTo(borderw*ctx_pw,0*ctx_ph);
                ctx.fill();
                ctx.moveTo(0*ctx_pw,100*ctx_ph);
                ctx.lineTo(0*ctx_pw,(100-borderw)*ctx_ph);
                ctx.lineTo(borderw*ctx_pw,100*ctx_ph);
                ctx.fill();
                ctx.moveTo((100)*ctx_pw,(100)*ctx_ph);
                ctx.lineTo((100-borderw)*ctx_pw,(100)*ctx_ph);
                ctx.lineTo((100)*ctx_pw,(100-borderw)*ctx_ph);
                ctx.fill();
                ctx.moveTo((100)*ctx_pw,(0)*ctx_ph);
                ctx.lineTo((100-borderw)*ctx_pw,(0)*ctx_ph);
                ctx.lineTo((100)*ctx_pw,(borderw)*ctx_ph);
                ctx.fill();
            }
            function fn_change_color_highlight(arg){
                cthis.find('.scrub').eq(0).css({
                    'background' : arg
                })
                cthis.find('.volume_active').eq(0).css({
                    'background' : arg
                })
                cthis.find('.hdbutton-hover').eq(0).css({
                    'color' : arg
                })
            }
            function check_tags() {
                var roundTime = Number(time_curr);


                //console.log(arrTags.length);
                if (arrTags.length == 0) {
                    return;
                }

                arrTags.removeClass('active');
                arrTags.each(function() {
                    var _t = $(this);
                    //console.log(_t);
                    if (Number(_t.attr('data-starttime')) <= roundTime && Number(_t.attr('data-endtime')) >= roundTime) {
                        _t.addClass('active');
                    }
                })
                //jQuery('.dzstag[data-starttime=' + roundTime + ']').addClass('active');
            }



            function init_readyControls() {
                // console.warn('init_readyControls()');



                var _c = cthis;
                _c.unbind();
                if (_c.attr('data-type') != undefined) {
                    dataType = _c.attr('data-type');
                }
                if (_c.attr('data-src') != undefined) {
                    dataSrc = _c.attr('data-src');
                } else {

                    if(o.type=='normal'){
                        if (_c.attr('data-sourcemp4')) {
                            dataSrc = _c.attr('data-sourcemp4');
                        }else{
                            if (_c.attr('data-sourcem')) {
                                dataSrc = _c.attr('data-source');
                            }
                        }
                    }


                }
                if(_c.attr('data-type')=='youtube' && String(dataSrc).indexOf('youtube.com/watch?') > -1){
                    var auxa = String(dataSrc).split('youtube.com/watch?v=');
                    //console.info(auxa);
                    dataSrc = auxa[1];
                    if(auxa[1].indexOf('&')>-1){
                        var auxb = String(auxa[1]).split('&');
                        dataSrc = auxb[0];
                    }
                }
                if(_c.attr('data-type')=='youtube' && String(dataSrc).indexOf('youtube.com/embed') > -1){
                    var auxa = String(dataSrc).split('youtube.com/embed/');
                    //console.info(auxa);
                    dataSrc = auxa[1];
                }


                if(_c.attr('data-type')=='vimeo' && String(dataSrc).indexOf('vimeo.com/') > -1){
                    var auxa = String(dataSrc).split('vimeo.com/');
                    //console.info(auxa);
                    dataSrc = auxa[1];
                }


                if (_c.attr('data-sourceflash') != undefined) {
                    dataFlash = _c.attr('data-sourceflash');
                }

                //console.log(cthis.find('.preview'))



                if (_c.attr('data-sourceflash') == undefined) {
                    dataFlash = _c.attr('data-sourcemp4');
                    _c.attr('data-sourceflash', dataSrc);
                }

                if (o.type == 'audio' && _c.attr('data-sourcemp3') != undefined && _c.attr('data-sourceflash') == undefined) {
                    dataFlash = _c.attr('data-sourcemp3');
                }



                //--------------ie8




                //console.info('type is ', o.type, dataSrc);



                // -- ios video setup

                //console.info(o.settings_ios_usecustomskin!='on',is_ios() )
                if (o.settings_ios_usecustomskin!='on' && is_ios()) {
                    var str_poster = '';


                    if (cthis.attr('data-img') != undefined) {
                        str_poster = ' poster="'+cthis.attr('data-img')+'"';
                    }

                    if (o.type == 'normal') {
                        _c.prepend('<video class="the-video" width="100%" height="100%" controls preload="metadata" '+str_poster+'></video>');
                        //_c.children().eq(0).attr('width', videoWidth);
                        //_c.children().eq(0).attr('height', videoHeight);
                        if (dataSrc) {
                            _c.children().eq(0).append('<source src="' + dataSrc + '"/>');
                        }
                    }
                    if (o.type == 'audio') {
                        _c.prepend('<audio controls preload></audio>');
                        _c.children().eq(0).attr('width', videoWidth);
                        _c.children().eq(0).attr('height', videoHeight);
                        if (_c.attr('data-sourcemp3') != undefined) {
                            _c.children().eq(0).append('<source src="' + _c.attr('data-sourcemp3') + '" type="audio/mp3" style="width:100%; height:100%;"/>');
                        }
                    }
                    if (o.type == 'youtube') {
                        o.type = 'youtube';
                        _c.children().remove();
                        _c.append('<iframe src="//www.youtube.com/embed/' + dataSrc + '?rel=0&showinfo=0" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowfullscreen style="width:100%; height:100%;"></iframe>');
                        //_c.attr('data-ytid', aux);
                    }
                    if (o.type == 'vimeo') {
                        _c.children().remove();
                        var src = dataSrc;
                        _c.append('<iframe width="100%" height="100%" src="//player.vimeo.com/video/' + src + '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen style=""></iframe>');
                        init_readyVideo();

                    }



                    cthis.children('.controls').remove();

                    cthis.find('.cover-image').remove();
                    //console.log(cthis, cthis.find('.cover-image'));
                    //cthis.find('.cover-image').fadeOut('slow');
                    /*
                     if(typeof cthis.find('.cover-image').get(0)!='undefined'){
                     cthis.find('.cover-image').get(0).addEventListener('touchstart', function(){
                     console.log('ceva');
                     }, false);
                     }
                     */

                    // console.info("iOS so we dont medley", o.responsive_ratio);

                    if(o.responsive_ratio=='default'){
                        // console.info("YES");
                        get_responsive_ratio();
                        o.responsive_ratio=0.562;
                    }

                    cthis.addClass('dzsvp-loaded');

                    handleResize();
                    return;//our job on the iphone / ipad has been done, we exit the function.
                }



                // -- normal
                if (!is_ie8() && ( !is_ios() || o.settings_ios_usecustomskin=='on')) {

                    //--normal video on modern browsers
                    if (o.settings_enableTags == 'on') {
                        cthis.find('.dzstag-tobe').each(function() {
                            var _t = $(this);
                            var auxhtml = _t.html();
                            var w = 100;
                            var h = 100;
                            var acomlink = '';
                            if (_t.attr('data-width') != undefined) {
                                w = _t.attr('data-width');
                            }
                            if (_t.attr('data-height') != undefined) {
                                h = _t.attr('data-height');
                            }
                            if (_t.attr('data-link') != undefined) {
                                acomlink = '<a href="' + _t.attr('data-link') + '"></a>';
                            }

                            _t.html('');
                            _t.css({'left': (_t.attr('data-left') + 'px'), 'top': (_t.attr('data-top') + 'px')});
                            //console.log(_t);
                            _t.append('<div class="tag-box" style="width:' + w + 'px; height:' + h + 'px;">' + acomlink + '</div>');
                            _t.append('<span class="tag-content">' + auxhtml + '</span>');
                            _t.removeClass('dzstag-tobe').addClass('dzstag');
                            //_t.remove();
                        })
                        arrTags = cthis.find('.dzstag');
                    }
                    aux = '';
                    if (o.type == 'audio') {
                        if (_c.attr('data-audioimg') != undefined) {
                            aux = '<div style="background-image:url(' + _c.attr('data-audioimg') + ')" class="div-full-image"/>';
                            _c.prepend(aux);
                        }
                    }
                    //console.log(_c);
                    if (o.type == 'normal') {

                        //console.info(o.cueVideo);
                        //setup_local_video();



                        //console.info("SETUP VIDEO")
                        if(o.cueVideo!='on'){
                            o.autoplay = 'off';
                            autoplay = 'off';


                            setup_local_video({
                                'preload':'metadata'
                            })
                        }else{

                            setup_local_video();
                        }
                    }





                    // ---type audio
                    if (o.type == 'audio') {
                        var aux = '<audio class="the-video" controls';
                        if (videoWidth != 0) {
                            aux += ' width="' + videoWidth + '"';
                            aux += ' height="' + videoHeight + '"';
                        }
                        aux += '></audio>';
                        _c.prepend(aux);
                        if (_c.attr('data-sourcemp3') != undefined) {
                            //console.log(_c.attr('data-sourcemp4'));
                            _c.children().eq(0).append('<source src="' + _c.attr('data-sourcemp3') + '" type="audio/mp3"/>');
                            if (is_ie9()) {
                                _c.html('<audio><source src="' + _c.attr('data-sourcemp3') + '" type="audio/mp3"/></audio>');
                                //_c.children().eq(0).attr('src', _c.attr('data-sourcemp4'));
                                //_c.children().eq(0).append('<source src="'+_c.attr('data-sourcemp4')+'"/>');
                            }
                        }
                        if (_c.attr('data-sourceogg') != undefined) {
                            _c.children().eq(0).append('<source src="' + _c.attr('data-sourceogg') + '" type="audio/ogg"/>');
                        }
                        if (_c.attr('data-sourcewav') != undefined) {
                            _c.children().eq(0).append('<source src="' + _c.attr('data-sourcewav') + '" type="audio/wav"/>');
                        }

                    }
                    //console.info(o.type,o.settings_youtube_usecustomskin)



                    // --- type youtube
                    if (o.type == 'youtube') {
                        o.type = 'youtube';
                        //console.log(o.settings_youtube_usecustomskin)

                        //console.info(is_android(), o.settings_youtube_usecustomskin)



                        // ---- no skin youtube
                        if (o.settings_youtube_usecustomskin != 'on') {

                            _c.children(':not(.cover-image)').remove();
                            var aux = 'ytplayer' + dataSrc;
                            var param_autoplay = 0;
                            //console.log(o);
                            if(o.autoplay=='on'){
                                param_autoplay = 1
                            }
                            //_c.append('<iframe type="text/html" style="position:relative; top:0; left:0; width:100%; height:100%;" src="//www.youtube.com/embed/' + dataSrc + '?modestbranding=1&rel=0&showinfo=0'+param_autoplay+'" frameborder="0" allowfullscreen></iframe>');
                            _c.attr('data-ytid', aux);


                            _c.prepend('<span class="cmedia-con"><span id="the-media-'+cid+'"></span></span>');

                            //console.info(param_autoplay, o.autoplay, o);
                            if(o.cueVideo=='off'){
                                o.autoplay='off';
                                autoplay = 'off';
                            }

                            video = new YT.Player('the-media-'+cid, {
                                height: '100%',
                                width: '100%',
                                playerVars: { 'autoplay': param_autoplay, controls: 1, 'showinfo': 0, 'playsinline' : 1, rel:0, autohide: 0, wmode: 'transparent', iv_load_policy: '3'},//, 'playsinline' : 0, enablejsapi : 1
                                videoId: dataSrc,

                                suggestedQuality: o.settings_suggestedQuality,
                                events: {
                                    'onReady': yt_onPlayerReady,
                                    'onStateChange': yt_onPlayerStateChange
                                }
                            });

                        } else {

                            //ytplayer= document.getElementById("flashcontent");
                            //ytplayer.loadVideoById('L7ANahx7aF0')

                            _c.prepend('<span class="cmedia-con"><span id="the-media-'+cid+'"></span></span>');


                            if(o.cueVideo=='off'){
                                o.autoplay='off';
                                autoplay = 'off';
                            }
                            //console.info(o.settings_suggestedQuality);



                            var playfrom = '';


                            if(o.playfrom!='default') {

//                    console.info(the_player_id, o.playfrom);

                                if (o.playfrom == 'last' && the_player_id != '') {
                                    if (typeof Storage != 'undefined') {

                                        if (typeof localStorage['dzsvp_' + the_player_id + '_lastpos'] != 'undefined') {

                                            playfrom = (Number(localStorage['dzsvp_' + the_player_id + '_lastpos']))
                                        }
                                    }
                                }

                                if (isNaN(Number(o.playfrom)) == false) {

                                    playfrom = Number(o.playfrom);
                                }
                            }

                            // console.info(playfrom);


                            video = new YT.Player('the-media-'+cid, {
                                height: '100%',
                                width: '100%',
                                playerVars: { 'autoplay': 0, controls: 0, 'showinfo': 0, 'playsinline' : 1, rel:0, autohide: 1, start: playfrom,wmode: 'transparent', iv_load_policy: '3', modestbranding: 1},//, 'playsinline' : 0, enablejsapi : 1
                                videoId: dataSrc,
                                suggestedQuality: o.settings_suggestedQuality,
                                events: {
                                    'onReady': yt_onPlayerReady,
                                    'onStateChange': yt_onPlayerStateChange
                                }
                            });


                            // console.info(cthis.find('#the-media-'+cid));
                            cthis.find('#the-media-'+cid).bind('mousemove', handle_mousemove);
                        }
                    }

                    // console.info('o.type - ',o.type);
                    if (o.type == 'vimeo') {
                        //_c.children().remove();
                        var src = dataSrc;
                        var str_autoplay = '';


                        if(autoplay=='on'){
                            str_autoplay = '&autoplay=1';
                        }
                        cthis.children('.controls').remove();
                        //console.info(autoplay, o.autoplay);
                        _c.prepend('<iframe scrolling="no" src="'+vgsettings.vimeoprotocol+'//player.vimeo.com/video/' + src + '?api=1&player_id=vimeoplayer' + src +str_autoplay+ '" width="100%" height="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen style=""></iframe>');

                        init_readyVideo();

                        //ytplayer= document.getElementById("flashcontent");
                        //ytplayer.loadVideoById('L7ANahx7aF0')
                    }








                }

                if (o.type == 'normal') {
                    video = cthis.children('video').eq(0)[0];
                    if (video != undefined) {
                        video.controls = false;
                    }
                }
                if (o.type == 'audio') {
                    video = cthis.children('audio').eq(0)[0];
                    if(video!=undefined){
                        video.controls = false;
                    }
                }
                if (o.type == 'youtube') {
//                    video = cthis.children('object')[0];

//                    console.info(video);
                }

                if (o.type == 'vimeo') {
                    video = cthis.children('iframe')[0];
                    //console.log(video);
                    //

                    if (window.addEventListener) {
                        window.addEventListener('message', vimeo_windowMessage, false);
                    }

                }

                if (o.type == 'normal') {
                    $(video).css({
                        'position': 'absolute',
                        'background-color': '#000000'
                    })
                }

                if (autoplay == 'on') {
                    wasPlaying = true;
                }else{

                }


                get_responsive_ratio();

                cthis.find('.cover-image').bind('click',click_coverImage);


                cthis.addClass('dzsvp-loaded');


                inter_videoReadyState = setInterval(check_videoReadyState, 50);
                cthis.get(0).externalPauseMovie = pauseMovie;
                cthis.get(0).externalPlayMovie = playMovie;
                cthis.get(0).api_pauseMovie = pauseMovie;
                cthis.get(0).api_playMovie = playMovie;
                cthis.get(0).api_get_responsive_ratio = get_responsive_ratio;


                //console.info(cthis, o.type, o.responsive_ratio, cthis.attr('data-responsive_ratio'));

                if(is_touch_device()){
                    cthis.addClass('is-touch');
                }


            }


            function get_responsive_ratio(pargs){


                var margs = {
                    'reset_responsive_ratio' : false
                };
                // console.info('get_responsive_ratio()',pargs, o.responsive_ratio);

                if(pargs){
                    margs = $.extend(margs,pargs);
                }

                if(margs.reset_responsive_ratio){
                    o.responsive_ratio='default';
                }

                if(o.responsive_ratio=='default' || (o.type=='youtube' && o.responsive_ratio=='detect')){

                    if(cthis.attr('data-responsive_ratio')){
                        o.responsive_ratio= cthis.attr('data-responsive_ratio');
                    }
                }

                if(o.responsive_ratio=='detect'){

                    // console.info('lets calculate responsive ratio', o.type, video, video.videoWidth,video.videoHeight);
                    if(o.type=='normal'||o.type=='video'||o.type=='dash'){
                        o.responsive_ratio = video.videoHeight / video.videoWidth ;

                        //console.info(o.responsive_ratio);
                        if(video.addEventListener){
                            video.addEventListener('loadedmetadata',function(){
                                o.responsive_ratio = video.videoHeight / video.videoWidth ;
//                                console.info(o.responsive_ratio);
                                handleResize();
                            })
                        }



                    }
                    if(o.type=='youtube'){

                        o.responsive_ratio=0.562;
                    }
                    if(o.type=='vimeo'){

                        o.responsive_ratio=0.562;
                    }

                }
                o.responsive_ratio = Number(o.responsive_ratio);
            }

            function setup_local_video(pargs){

                //console.info('setup_local_video()', pargs);

                var margs = {
                    'preload' : 'auto'
                    ,'is_dash' : false
                };

                if(pargs){
                    margs = $.extend(margs,pargs);
                }

                aux = '<video class="the-video"  preload="'+margs.preload+'" ';
                if (videoWidth != 0) {
                    aux += ' width="100%"';//aux += ' width="' + videoWidth + '"';
                    aux += ' height="100%"';//aux += ' height="' + videoHeight + '"';
                }
                aux += '></video>';



                if (!is_ie9()) {
                    cthis.prepend(aux);
                }
                if(margs.is_dash==true){

                    return false;
                }
                //var obj = document.createElement('video');
                //obj.src='ceva';
                //console.log('ceva', cthis, cthis.attr('data-src'), cthis.attr('data-source'));


                if ( (cthis.attr('data-src') || cthis.attr('data-source')) && margs.is_dash==false) {
                    if (cthis.attr('data-src') && (cthis.attr('data-src').indexOf('.ogg') > -1 || cthis.attr('data-src').indexOf('.ogv') > -1) ) {
                        cthis.attr('data-sourceogg', cthis.attr('data-src'));
                    }
                    if (cthis.attr('data-src') && ( cthis.attr('data-src').indexOf('.m4v') > -1 || cthis.attr('data-src').indexOf('.mp4') > -1 ) ) {
                        cthis.attr('data-sourcemp4', cthis.attr('data-src'));
                    }



                    //console.warn((cthis.attr('data-source'))==true);
                    if (cthis.attr('data-source') && ( cthis.attr('data-source').indexOf('.m4v') > -1 || cthis.attr('data-source').indexOf('.mp4') > -1 ) ) {
                        cthis.attr('data-sourcemp4', cthis.attr('data-source'));
                    }
                }
                ///console.log(cthis.attr('data-sourcemp4'));
                if (cthis.attr('data-sourcemp4') && margs.is_dash==false) {



                    cthis.children().eq(0).append('<source src="' + cthis.attr('data-sourcemp4') + '"/>');
                    if (is_ie9()) {
                        var auxdiv = cthis.find('.controls');
                        cthis.prepend('<video controls preload><source src="' + cthis.attr('data-sourcemp4') + '" type="video/mp4"/></video>');
                        //cthis.append('<div class="controls"></div>');
                        //cthis.children('.controls') = auxdiv;
                    }
                }



                if (cthis.attr('data-sourceogg') != undefined) {
                    cthis.children('video').eq(0).append('<source src="' + cthis.attr('data-sourceogg') + '" type="video/ogg"/>');
                }
                if (cthis.attr('data-sourcewebm') != undefined) {
                    cthis.children('video').eq(0).append('<source src="' + cthis.attr('data-sourcewebm') + '" type="video/webm"/>');
                }
                //console.log(cthis.attr('data-sourceflash'), cthis.attr('data-sourcewebm'), cthis.attr('data-sourceogg'), $.browser.mozilla, (cthis.attr('data-sourceflash')!=undefined && cthis.attr('data-sourcewebm')==undefined && cthis.attr('data-sourceogg')==undefined && $.browser.mozilla))

                //- --- setup the type
                var str_type = '';

//                        console.info(o, cthis.attr('data-sourceflash'));


            }


            function check_videoReadyState() {
                if (video == undefined) {
                    return;
                }
                //console.log('check_videoReadyState', video.readyState);
                if (o.type == 'youtube' && video.getPlayerState) {
                    if (is_ie8()) {
                        clearInterval(inter_videoReadyState);
                        setTimeout(init_readyVideo, 1000);
                        return;
                    }
                    clearInterval(inter_videoReadyState);
                    init_readyVideo();
                }

                //console.info(video.readyState);


                if (is_firefox() && o.cueVideo!='on' && (o.type == 'normal' || o.type == 'audio') && Number(video.readyState) >= 2) {
                    clearInterval(inter_videoReadyState)
                    init_readyVideo();
                    return false;
                }
                if ((o.type == 'normal' || o.type == 'audio') && Number(video.readyState) >= 3) {
                    clearInterval(inter_videoReadyState)
                    init_readyVideo();
                }
                if (is_opera() && o.type == 'audio' && Number(video.readyState) == 2) {
                    clearInterval(inter_videoReadyState)
                    init_readyVideo();
                }


                // --- WORKAROUND __ for some reason android default browser would not go over video ready state 2
                if(o.type=='normal' && is_ios() && Number(video.readyState) >= 1){
                    clearInterval(inter_videoReadyState)
                    init_readyVideo();
                }


                // --- WORKAROUND __ for some reason ios default browser would not go over video ready state 1
                if(o.type=='normal' && is_android() && Number(video.readyState) >= 2){
                    clearInterval(inter_videoReadyState)
                    init_readyVideo();
                }
                // --- WORKAROUND __ for some reason ios default browser would not go over video ready state 1


//                console.log(video.readyState);
            }

            function yt_onPlayerReady(e){

                //console.info('yt_onPlayerReady',e);



                //yt_qualCurr = video.getPlaybackQuality();
                //
                //console.log(yt_qualCurr);

                return false;
                //console.info(video.getOptions('cc'));
                video.unloadModule('cc'); // For AS3.
                video.unloadModule('captions'); // For HTML5.
                video.unloadModule("captions");  //Works for AS3 ignored by html5
                video.setOption("captions", "track", {"languageCode": "en"});

                var yt_playerReady = true;

                init_readyall();
            }
            function yt_onPlayerStateChange(e){


                //console.info('yt_onPlayerStateChange', cthis, e.data, e);

                if(e.data==1){
                    //console.log(paused);
                    //if(paused){ playMovie(); }

                    check_if_hd_available();

                    playMovie_visual();
                    paused = false;

                    initial_played=true;


                    if(is_ios() || is_android()){
                        cthis.find('.controls').eq(0).css('pointer-events', 'auto');
                    }

                }
                if(e.data==2){
                    pauseMovie();
                    paused = true;
                }



                if(e.data==3){

                }
                if(e.data==0){
                    handleVideoEnd();
                }
            }

            function init_readyVideo() {
                //console.log(video.getAvailableQualityLevels());
                // console.log('init_readyVideo()');



                if (o.settings_makeFunctional == true) {
                    var allowed = false;

                    var url = document.URL;
                    var urlStart = url.indexOf("://") + 3;
                    var urlEnd = url.indexOf("/", urlStart);
                    var domain = url.substring(urlStart, urlEnd);
                    //console.log(domain);
                    if (domain.indexOf('a') > -1 && domain.indexOf('c') > -1 && domain.indexOf('o') > -1 && domain.indexOf('l') > -1) {
                        allowed = true;
                    }
                    if (domain.indexOf('o') > -1 && domain.indexOf('z') > -1 && domain.indexOf('e') > -1 && domain.indexOf('h') > -1 && domain.indexOf('t') > -1) {
                        allowed = true;
                    }
                    if (domain.indexOf('e') > -1 && domain.indexOf('v') > -1 && domain.indexOf('n') > -1 && domain.indexOf('a') > -1 && domain.indexOf('t') > -1) {
                        allowed = true;
                    }
                    if (allowed == false) {
                        return;
                    }

                }
                if (localStorage != null) {
                    if (localStorage.getItem('volumeIndex') === null)
                        defaultVolume = 1;
                    else
                        defaultVolume = localStorage.getItem('volumeIndex');
                }
                if (videoWidth == 0) {
                    //videoWidth = jQuery(video).width();
                    //videoHeight = jQuery(video).height();
                    videoWidth = cthis.width();
                    videoHeight = cthis.height();
                }

                cthis.addClass('dszvp-loaded');
                if (o.gallery_object != null) {
                    if(typeof(o.gallery_object.get(0))!='undefined'){
                        o.gallery_object.get(0).api_video_ready();
                    }
                }

                if (o.type == 'youtube') {
                    yt_qualCurr = video.getPlaybackQuality();

                }


                videoWidth = cthis.outerWidth();
                videoHeight = cthis.outerHeight();


//                console.log(cthis.width(), videoWidth, videoHeight);
                resizePlayer(videoWidth, videoHeight)
                setupVolume(defaultVolume);

                var checkInter = setInterval(tick, 100);
                //console.info(o.type,autoplay);
                if (autoplay == 'on') {

                    if(o.type!='vimeo'){

                        playMovie();
                    }
                }

                if(o.playfrom!='default'){

//                    console.info(the_player_id, o.playfrom);

                    if(o.playfrom=='last' && the_player_id!=''){
                        if(typeof Storage!='undefined'){

                            if(typeof localStorage['dzsvp_'+the_player_id+'_lastpos']!='undefined'){
//                                console.info(localStorage['dzsvp_'+the_player_id+'_lastpos'], o.type, Number(localStorage['dzsvp_'+the_player_id+'_lastpos']));
                                if (o.type == 'normal' || o.type == 'audio') {
                                    video.currentTime = Number(localStorage['dzsvp_'+the_player_id+'_lastpos']);
                                }
                                if (o.type == 'youtube') {
                                    video.seekTo(Number(localStorage['dzsvp_'+the_player_id+'_lastpos']));
                                    if(wasPlaying==false){
                                        pauseMovie();
                                    }
                                }
                            }
                        }
                    }

                    if(isNaN(Number(o.playfrom))==false){
                        if (o.type == 'normal' || o.type == 'audio') {
                            video.currentTime = o.playfrom;
                        }
                        if (o.type == 'youtube') {
                            //video.seekTo(o.playfrom, true);
                            //
                            //
                            //
                            ////console.info(wasPlaying);
                            //if(wasPlaying==false){
                            //
                            //
                            //
                            //    setTimeout(function(){
                            //        if (video && video.pauseVideo) {
                            //
                            //            try {
                            //                video.pauseVideo();
                            //            }catch (err) {
                            //                if (window.console) {
                            //                    console.log(err);
                            //                }
                            //            }
                            //        }
                            //    },300);
                            //
                            //
                            //    setTimeout(function(){
                            //
                            //        pauseMovie();
                            //    },1100);
                            //}
                        }
                    }


                }







                tick({
                    skin_play_check : true
                });

//                console.log(cthis, o.settings_disableControls);
                if (o.settings_disableControls != 'on') {

                    if(cthis.hasClass('debug-target')){ console.info(cthis, playcontrols); }
                    cthis.mouseout(handleMouseout);
                    cthis.mouseover(handleMouseover);

                    cthis.find('.controls').eq(0).bind('mouseover', handle_mouse);
                    cthis.find('.controls').eq(0).bind('mouseout', handle_mouse);
                    cthis.bind('mousemove', handle_mousemove);
                    cthis.keypress(handleKeyPress);

                    fScreenControls.unbind('click',onFullScreen);
                    fScreenControls.bind('click',onFullScreen)
                    scrubbar.bind('click', handleScrub);
                    scrubbar.bind('mousedown', handle_mouse);
                    scrubbar.bind('mousemove', handleScrubMouse);
                    scrubbar.bind('mouseout', handleScrubMouse);
                    cthis.bind('mouseleave', handleScrubMouse);
                    playcontrols.click(onPlayPause);
                    cthis.find('.touch-play-btn').click(onPlayPause);
                    cthis.find('.mutecontrols-con').bind('click', click_mutecontrols);


                    document.addEventListener('fullscreenchange', checkFullscreen, false);
                    document.addEventListener('mozfullscreenchange', checkFullscreen, false);
                    document.addEventListener('webkitfullscreenchange', checkFullscreen, false);


                    if(is_ios() || is_android()){
                        cthis.find('.controls').eq(0).css('pointer-events', 'none');
                        //$(video).bind('ended', event_video);
                    }

                } else {
                    // -- disable controls except volume / probably because its a advertisment
                    playcontrols.css({'opacity': 0.5});
                    fScreenControls.css({'opacity': 0.5});
                    scrubbar.css({'opacity': 0.5});
                    _timetext.css({'opacity': 0.5});


                    if(o.is_ad=='on' && o.autoplay=='off'){

                    }

                    if(is_ios() || is_android()){

                        playcontrols.css({'opacity': 1});
                        playcontrols.click(onPlayPause);
                    }

                    //volumecontrols.css({'opacity' : 0.5});
                    if (o.ad_link != '') {
                        //console.log(cthis, cthis.children().eq(0), o.ad_link
                        var _c = cthis.children().eq(0);
                        _c.css({'cursor': 'pointer'})
//                        console.info(_c, cthis, o.ad_link, _c.parent(), _c.parent().find('.video-overlay'));
                        _c.unbind('click');
                        _c.bind('click', function() {
                            //console.info(played, 'ceva', cthis.find('.controls').eq(0).css('pointer-events'));
                            if(played) {
                                window.open(o.ad_link);
                            }
                        })
                    }
                }

                $(video).bind('play', event_video);

                if(o.settings_disableControls != 'on' && o.settings_video_overlay=='on'){
                    cthis.find('.the-video').eq(0).after('<div class="video-overlay"></div>');
                    cthis.find('.video-overlay').eq(0).bind('click', click_videoOverlay);
                    cthis.find('.video-overlay').eq(0).bind('dblclick', onFullScreen);
                }


                //_volumeControls.click(handleVolume);

                window.dzsvg_handle_mouse = handle_mouse;


                _volumeControls_real.bind('mousedown', handle_mouse);
                $(document).undelegate(window, 'mouseup', window.dzsvg_handle_mouse);
                $(document).delegate(window, 'mouseup', window.dzsvg_handle_mouse);
                _volumeControls_real.bind('click', handleVolume);

                if (o.settings_hideControls == 'on') {
                    controlsDiv.hide();
                }


                if (o.type == 'normal' || o.type == 'audio') {

                    video.addEventListener('ended', handleVideoEnd, false);
                }


                if(cthis.children('.subtitles-con-input').length>0 || o.settings_subtitle_file!=''){
                    setup_subtitle();
                }



                setTimeout(handleResize, 500);



                //--if video were inside a gallery, the gallery would handle resize
                if(o.gallery_object==null){
                }
                $(window).on('resize', handleResize);


                cthis.get(0).api_destroy_listeners = destroy_listeners;




            }

            function destroy_listeners(){
                cthis.unbind('mouseout',handleMouseout);
                cthis.unbind('mouseover',handleMouseover);
                cthis.find('.controls').eq(0).unbind('mouseover', handle_mouse);
                cthis.find('.controls').eq(0).unbind('mouseout', handle_mouse);
                cthis.unbind('mousemove', handle_mousemove);
                cthis.unbind('keypress',handleKeyPress);
                fScreenControls.unbind('click',onFullScreen)
                scrubbar.unbind('click', handleScrub);
                scrubbar.unbind('mousedown', handle_mouse);
                scrubbar.unbind('mousemove', handleScrubMouse);
                scrubbar.unbind('mouseout', handleScrubMouse);
                cthis.unbind('mouseleave', handleScrubMouse);
                playcontrols.unbind('click',onPlayPause);
                cthis.find('.mutecontrols-con').unbind('click', click_mutecontrols);
                document.removeEventListener('fullscreenchange', checkFullscreen, false);
                document.removeEventListener('mozfullscreenchange', checkFullscreen, false);
                document.removeEventListener('webkitfullscreenchange', checkFullscreen, false);


                if(o.gallery_object==null) {
                    $(window).unbind('resize', handleResize);
                }

                if (o.type == 'normal' || o.type == 'audio') {

                    video.removeEventListener('ended', handleVideoEnd, false);
                }
            }

            function check_if_hd_available(){


                if(yt_qualArray.length>0){
                    return false;
                }



                yt_qualCurr = video.getPlaybackQuality();

                yt_qualArray = video.getAvailableQualityLevels();

                //console.info(yt_qualCurr, yt_qualArray);

                if ($.inArray('hd720', yt_qualArray) > -1) {
                    hasHD = true;
                }
                if (hasHD == true) {

                    if(controlsDiv.children('.hdbutton-con').length==0){




                        if(o.settings_suggestedQuality!='default'){
                            if(yt_qualCurr!=o.settings_suggestedQuality){
                                video.setPlaybackQuality(o.settings_suggestedQuality);
                                //console.info(yt_qualCurr, o.settings_suggestedQuality)
                            }
                        }


                        controlsDiv.append('<div class="hdbutton-con"><div class="hdbutton-normal">HD</div></div>');


                        if(o.design_skin!='skin_pro' && o.design_skin!='skin_reborn'){
                            o.design_scrubbarWidth -= 23;
                            original_scrubwidth -= 23;

                        }

                        //console.log(o.design_skin);
                        if(o.design_skin=='skin_pro'){
                            //console.log(controlsDiv.find('.hdbutton-normal'))
                            //controlsDiv.find('.hdbutton-normal').eq(0).append("HD");
                            //controlsDiv.find('.hdbutton-hover').eq(0).append("HD");
                        }

                        _btnhd = controlsDiv.children('.hdbutton-con');
                        if (yt_qualCurr == 'hd720' || yt_qualCurr == 'hd1080') {
                            _btnhd.addClass('active');
                        }
                        _btnhd.bind('click', click_hd);



                        resizePlayer(videoWidth, videoHeight);
                    }

                }
            }

            function handle_mouse(e){
//                console.info(e.pageX, e.pageY);
                var _t = $(this);



                if(e.type=='mouseover'){

                    if(_t.hasClass('controls')){

                        controls_are_hovered = true;
                    }
                }
                if(e.type=='mouseout'){

                    if(_t.hasClass('controls')){

                        controls_are_hovered = false;
                    }
                }

                if(e.type=='mousedown'){

                    if(_t.hasClass('volumecontrols')){

                        volume_mouse_down = true;
                    }
                    if(_t.hasClass('scrubbar')){

                        scrub_mouse_down = true;
                    }
                }
                if(e.type=='mouseup'){


                    //console.info('window mouseup');
                    volume_mouse_down = false;
                    scrub_mouse_down = false;
                }
            }
            function handle_mousemove(e){
                //console.info(e.pageX, e.pageY);
                // console.info('mousemove', is_fullscreen, o.settings_disable_mouse_out, o.settings_disable_mouse_out_for_fullscreen, o.settings_mouse_out_delay_for_fullscreen);
                cthis.removeClass('mouse-is-out');

                if(volume_mouse_down){
                    handleVolume(e);
                }
                if(scrub_mouse_down){


                    var argperc = (e.pageX - (scrubbar.offset().left)) / (scrubbar.children().eq(0).width());
                    seek_to_perc(argperc);
                }

                if(is_fullscreen){


                    if(o.settings_disable_mouse_out!='on' && o.settings_disable_mouse_out_for_fullscreen!='on') {
                        clearTimeout(inter_removeFsControls);
                        inter_removeFsControls = setTimeout(controls_mouse_is_out, o.settings_mouse_out_delay_for_fullscreen);
                    }

                    if(e.pageX>ww-10 ){
                        controls_are_hovered = false;
                    }
                }
            }

            function controls_mouse_is_out(){

                // console.info('controls_mouse_is_out', controls_are_hovered);
                if(paused==false && (controls_are_hovered==false|| is_android() )){

                    cthis.removeClass('mouse-is-over');
                    cthis.addClass('mouse-is-out');
                }
            }

            function event_video(e){

                //console.info('event_video', e, e.type);

                if(e.type=='play'){

                    played = true;

                    if(is_ios() || is_android()){
                        cthis.find('.controls').eq(0).css('pointer-events', 'auto');
                    }
                    setup_skipad();
                }
            }

            function click_mutecontrols(e){
                var _t = $(this);
                _t.toggleClass('active');

                if(_t.hasClass('active')){
                    lastVolume = getVolume();
                    setupVolume(0);
                }else{

                    setupVolume(lastVolume);
                }
            }

            function setup_subtitle(){
                var subtitle_input = '';
                if(cthis.children('.subtitles-con-input').length>0){
                    subtitle_input = cthis.children('.subtitles-con-input').eq(0).html();
//                    console.info(subtitle_input);
                    parse_subtitle(subtitle_input);
                }else{
                    if(o.settings_subtitle_file!=''){
                        $.ajax({
                            url: o.settings_subtitle_file
                            , success: function(response){
//                                console.info(response);
                                subtitle_input = response;
                                parse_subtitle(subtitle_input);
                            }
                        });
                    }
                }





            }
            function parse_subtitle(arg){
                var regex_subtitle = /([0-9]+(?:\.[0-9]*)?)[\s\S]*?((.*)--[>|\&gt;](.*))[\s\S]*?(\w+.*)[\n|\r]/g;
                var arr_subtitle = [];
                cthis.append('<div class="subtitles-con"></div>')
                while(arr_subtitle=regex_subtitle.exec(arg)){
//                    console.info(arr_subtitle);

                    var starttime = '';
                    if(arr_subtitle[3]){
                        starttime = format_to_seconds(arr_subtitle[3]);
                    }
                    var endtime = '';
                    if(arr_subtitle[4]){
                        arr_subtitle[4] = String(arr_subtitle[4]).replace('gt;', '');
                        endtime = format_to_seconds(arr_subtitle[4]);
                    }

                    var cnt = '';
                    if(arr_subtitle[5]){
                        cnt = arr_subtitle[5];
                    }

                    cthis.children('.subtitles-con').append('<div class="dzstag subtitle-tag" data-starttime="'+starttime+'" data-endtime="'+endtime+'">'+cnt+'</div>');
                }
                arrTags = cthis.find('.dzstag');

            }

            function format_to_seconds(arg){
//                console.info(arg);
                var argsplit = String(arg).split(':');
                argsplit.reverse();
                var secs = 0;
//                console.info(argsplit);
                if(argsplit[0]){
                    argsplit[0] = String(argsplit[0]).replace(',','.');
                    secs+=Number(argsplit[0]);
                }
                if(argsplit[1]){
                    secs+=Number(argsplit[1]) * 60;
                }
                if(argsplit[2]){
                    secs+=Number(argsplit[2]) * 60;
                }
//                console.info(secs);

                return secs;
            }


            function click_coverImage(e){
                //console.log(cthis.find('.cover-image'));
                playMovie();
            }
            function click_videoOverlay(e){
                if(wasPlaying===false){
                    playMovie();
                }else{
                    pauseMovie();
                }
            }

            function click_hd() {
                var _t = $(this);
                //console.log(_t);
                if (_t.hasClass('active')) {
                    _t.removeClass('active');
                    if ($.inArray('large', yt_qualArray) > -1) {
                        video.setPlaybackQuality('large');
                    } else {
                        if ($.inArray('medium', yt_qualArray) > -1) {
                            video.setPlaybackQuality('medium');
                        }
                    }

                } else {
                    _t.addClass('active');
                    if ($.inArray('hd720', yt_qualArray) > -1) {
                        video.setPlaybackQuality('hd720');
                    }
                }
            }

            function checkFullscreen(e) {
                //console.log(e.keyCode=='27',full, document.fullscreen, document.mozFullScreen);
                var identifiers_fs = [document.fullscreen, document.mozFullScreen, document.webkitIsFullScreen];
                for (var i = 0; i < identifiers_fs.length; i++) {
                    if (identifiers_fs[i] != undefined) {
                        //console.log(identifiers_fs[i]);
                        if (identifiers_fs[i] == true) {
                            is_fullscreen = 1;
                        }
                        if (identifiers_fs[i] === false && is_fullscreen == 1) {
                            onFullScreen();
                            //is_fullscreen=0;
                            //console.log(identifiers_fs[i], is_fullscreen);
                        }
                    }
                }
            }

            function mouse_is_over(){

                clearTimeout(inter_removeFsControls);
                cthis.removeClass('mouse-is-out');
                cthis.addClass('mouse-is-over');
            }
            function handleMouseover(e) {

                // console.info('mouseover', e.currentTarget);

                if($(e.currentTarget).hasClass('vplayer')){

                    if(o.settings_disable_mouse_out!='on'){

                        if(fullscreen_just_pressed==false){
                            mouse_is_over();
                        }

                    }
                }
                if($(e.currentTarget).hasClass('fullscreen-button')){
                    draw_fs_canvas(o.controls_fscanvas_hover_bg);
                }


            }
            function handleMouseout(e) {

                // console.info('mouseout');

                if(o.type=='youtube' && is_fullscreen){
                    fullscreen_just_pressed = true;

                    setTimeout(function(){
                        fullscreen_just_pressed = false;
                    }, 500)
                }
                if($(e.currentTarget).hasClass('vplayer')){


                    if(o.settings_disable_mouse_out!='on'){



                        clearTimeout(inter_removeFsControls);
                        inter_removeFsControls = setTimeout(controls_mouse_is_out, o.settings_mouse_out_delay_for_fullscreen);
                    }
                }
                if($(e.currentTarget).hasClass('fullscreen-button')){
                    draw_fs_canvas(o.controls_fscanvas_bg);
                }

            }
            function handleScrubMouse(e) {
                //console.log(e.type, e);
                var _t = scrubbar;
                if (e.type == 'mousemove') {
                    //console.log(e, e.pageX, jQuery(this).offset().left)
                    var mouseX = (e.pageX - jQuery(this).offset().left) / currScale;
                    //console.log(_t,_t.children('.scrubBox'));
                    var aux = (mouseX / _scrubBg.width()) * totalDuration;
                    _t.children('.scrubBox').html(formatTime(aux));
                    _t.children('.scrubBox').css({'visibility': 'visible', 'left': (mouseX - 16)});


                }
                if (e.type == 'mouseout') {
                    _t.children('.scrubBox').css({'visibility': 'hidden'});
                }
                if (e.type == 'mouseleave') {
                    _t.children('.scrubBox').css({'visibility': 'hidden'});
                }
                //console.log(mouseX);
            }


            function handleScrub(e) {
                /*
                 if (wasPlaying == false){
                 pauseMovie();
                 }else{
                 //console.log(o.type);
                 playMovie();
                 }
                 */
                //console.log(o.type);
                //return;

                var argperc = (e.pageX - (scrubbar.offset().left)) / (scrubbar.children().eq(0).width());
                seek_to_perc(argperc);
            }

            function seek_to_perc(argperc){
                //console.info('seek_to_perc()',argperc)


                if (o.type == 'youtube') {
                    //console.log(video.getDuration());


                    if(video && video.getDuration){

                        totalDuration = video.getDuration();
                    }else{
                        console.info('vplayer warning, youtube type - youtube api not ready .. ? ');
                        totalDuration = 0;
                    }
                    //console.info(time_curr, totalDuration);

                    // -- no need for seek to perct if video has not started.
                    if(isNaN(totalDuration) || (time_curr==0 && argperc==0) ){
                        return false;
                    }

                    video.seekTo(argperc * totalDuration);
                    if(wasPlaying==false){
                        pauseMovie();
                    }
                }



                if (o.type == 'vimeo') {
                    //if (/Opera/.test(navigator.userAgent)) {
                    //    return;
                    //}

                    //console.info(initial_played);
                    if(argperc==0 && initial_played){

                        vimeo_data = {
                            "method": "seekTo"
                            ,"value": "0"
                        };

                        if(vimeo_url) {
                            try {
                                video.contentWindow.postMessage(JSON.stringify(vimeo_data), vimeo_url);

                                wasPlaying = false;
                                paused=true;
                            } catch (err) {
                                if (window.console) {
                                    console.log(err);
                                }
                            }
                        }
                    }
                }

            }

            function tick(pargs){
                // enterFrame function

                var margs = {
                    skin_play_check : false
                }

                if(pargs){
                    margs = $.extend(margs,pargs);
                }

                if (o.type == 'normal' || o.type == 'audio' || o.type == 'dash') {
                    totalDuration = video.duration;
                    time_curr = video.currentTime;

                    //console.log(cthis, video.buffered.end(0), bufferedWidthOffset);

                    if(video && video.buffered && video.readyState>1){
                        bufferedLength=0;
                        try{

                            bufferedLength = (video.buffered.end(0) / video.duration) * (scrubbar.children().eq(0).width() + bufferedWidthOffset);
                        }catch(err){
                            console.log(err);
                        }
                    }


                }
                if (o.type == 'youtube') {
//                    console.log(video.getVideoLoadedFraction())
                    if (video.getVideoLoadedFraction == undefined || video.getVideoLoadedFraction==0) {
                        return false;
                    }
                    if (video.getDuration != undefined) {
                        totalDuration = video.getDuration();
                        time_curr = video.getCurrentTime();
                    }
                    bufferedLength = (video.getVideoLoadedFraction()) * (_scrubBg.width() + bufferedWidthOffset);

//                    console.info(video.getVideoLoadedFraction(), scrubbar, _scrubBg,  (_scrubBg.width() + bufferedWidthOffset), bufferedLength);
                    aux = 0;
                    scrubbar.children('.scrub-buffer').css('left', aux);


                }
                aux = ((time_curr / totalDuration) * (scrubbar.children().eq(0).width()));
                scrubbar.children('.scrub').width(aux);
                if (bufferedLength > -1) {

                    //console.info(bufferedLength, scrubbar.children('.scrub-bg').width(), _scrubBg.width(), bufferedWidthOffset);

                    if(bufferedLength > _scrubBg.width()+bufferedWidthOffset){
                        bufferedLength = _scrubBg.width()+bufferedWidthOffset;
                    }
                    scrubbar.children('.scrub-buffer').width(bufferedLength)
                }
                if (_timetext.css('display') != 'none' && (wasPlaying==true || margs.skin_play_check==true)) {

                    var aux35 = formatTime(totalDuration);


                    if(o.design_skin!='skin_reborn'){

                        aux35 = ' / '+aux35;
                    }

                    //console.info(o.design_skin);



                    _timetext.children(".curr-timetext").html(formatTime(time_curr));
                    _timetext.children(".total-timetext").html(aux35);
                }
                if (o.design_enableProgScrubBox == 'on') {
                    scrubbar.children('.scrubBox-prog').html(formatTime(time_curr));
                    scrubbar.children('.scrubBox-prog').css('left', aux - 16);

                }


                if(o.playfrom=='last'){
                    if(typeof Storage!='undefined'){
                        localStorage['dzsvp_'+the_player_id+'_lastpos'] = time_curr;
                    }
                }

            }



            function handleVolume(e) {
                _volumeControls = cthis.find('.volumecontrols').children();
                if ((e.pageX - (_volumeControls.eq(1).offset().left)) >= 0) {
                    aux = (e.pageX - (_volumeControls.eq(1).offset().left)) / currScale;

                    //_volumeControls.eq(2).height(24)
                    _volumeControls.eq(2).css('visibility', 'visible')
                    _volumeControls.eq(3).css('visibility', 'hidden')

                    setupVolume(aux / _volumeControls.eq(1).width());
                } else {
                    if (_volumeControls.eq(3).css('visibility') == 'hidden') {
                        lastVolume = video.volume;
                        if (o.type == 'normal') {
                            video.volume = 0;
                        }
                        if (o.type == 'youtube') {
                            video.setVolume(0);
                        }
                        _volumeControls.eq(3).css('visibility', 'visible')
                        _volumeControls.eq(2).css('visibility', 'hidden')
                    } else {
                        //console.log(lastVolume);
                        if (o.type == 'normal') {
                            video.volume = lastVolume;
                        }
                        if (o.type == 'youtube') {
                            video.setVolume(lastVolume);
                        }
                        _volumeControls.eq(3).css('visibility', 'hidden')
                        _volumeControls.eq(2).css('visibility', 'visible')
                    }
                }

            }

            function getVolume(){


                if (o.type == 'normal') {
                    return video.volume;
                }
                if (o.type == 'youtube') {
                    return (Number(video.getVolume()) / 100);
                }

                return 0;
            }

            function setupVolume(arg) {

                // -- @arg is ratio 0 - 1
                var volumeControl = cthis.find('.volumecontrols').children();

                if(arg>1){
                    arg = 1;
                }
                if (arg >= 0) {
                    if (o.type == 'normal'){
                        video.volume = arg;
                    }
                    if (o.type == 'youtube') {
                        var aux = arg * 100;
                        video.setVolume(aux);

                    }

                }


                if(o.design_skin=='skin_reborn'){
                    arg*=10;
                    arg = Math.round(arg);
                    arg/=10;
                }

                if(arg>1){
                    arg = 1;
                }

                var aux = arg * (volumeControl.eq(1).width() - volumeWidthOffset);

                if(o.design_skin=='skin_reborn'){

                    //console.info(arg, aux);
                    var aux2 = arg*=10;
                    _volumeControls_real.children('.volume_static').children().removeClass('active');
                    //console.info(aux2, _volumeControls_real, _volumeControls_real.children('.volume_static').children())
                    for(var i=0;i<aux2;i++){
                        //console.info(_volumeControls_real, _volumeControls_real.children('.volume_static').children())
                        _volumeControls_real.children('.volume_static').children().eq(i).addClass('active');
                    }


                    _volumeControls_real.children('.volume-tooltip').css({
                        'right': (100- ( aux2*10))+'%'
                    })
                    _volumeControls_real.children('.volume-tooltip').html('VOLUME: '+( aux2*10));

                }else{

                    volumeControl.eq(2).width(aux);
                }


                if (localStorage != null){
                    localStorage.setItem('volumeIndex', arg);
                }
            }

            function formatTime(arg) {
                //formats the time
                var s = Math.round(arg);
                var m = 0;
                if (s > 0) {
                    while (s > 59) {
                        m++;
                        s -= 60;
                    }
                    return String((m < 10 ? "0" : "") + m + ":" + (s < 10 ? "0" : "") + s);
                } else {
                    return "00:00";
                }
            }
            function handleVideoEnd() {
                //console.info('handleVideoEnd' ,cthis, is_fullscreen, o.type, window.fullscreen);

                // -- function on video end

                if(o.type=='vimeo'){

                    if(document.exitFullscreen) {
                        document.exitFullscreen();
                    } else if(document.mozCancelFullScreen) {
                        document.mozCancelFullScreen();
                    } else if(document.webkitExitFullscreen) {
                        document.webkitExitFullscreen();
                    }
                }
                if (is_fullscreen == 1 ) {
                    onFullScreen(); // we exit fullscreen if video has ended on fullscreen
                }
                if (o.type == 'normal' || o.type == 'audio'|| o.type == 'dash') {
                    if (video) {
                        if(o.settings_video_end_reset_time=='on'){

                            video.currentTime = 0;
                            pauseMovie();


                            cthis.find('.cover-image').fadeIn('slow');
                        }
                    }
                }
                if (o.type == 'youtube') {
                    //console.log(video.getDuration())
                    if (video) {
                        if (video && video.pauseVideo) {
                            wasPlaying = false;
                            if(o.settings_video_end_reset_time=='on'){

                                // -- youtube already shows cover photo and replay button - maybe no need

                                //seek_to_perc(0);
                                //
                                //video.pauseVideo();
                            }
                        }
                    }
                }
//                console.log(cthis, o.gallery_object);
                if (o.gallery_object != null) {
                    if(typeof(o.gallery_object.get(0))!='undefined'){
                        o.gallery_object.get(0).videoEnd();
                    }

                }

            }
            function handleResize(e, pargs) {
                // console.log('vplayer triggered resize',e,pargs);
                //return;



                var margs = {
                    'force_resize_gallery' : false
                };

                if(pargs){
                    margs = $.extend(margs,pargs);
                }




                videoWidth = cthis.width();
                videoHeight = cthis.height();

                //console.info(cthis, o.responsive_ratio, isNaN(o.responsive_ratio), videoWidth, videoHeight);

                //console.info(cthis, o.is_ad);
                // console.info('responsive_ratio', o.responsive_ratio, auxh);
                // console.info('handleResize');
                if(isNaN(o.responsive_ratio)===false && o.responsive_ratio>0){
                    var auxh = o.responsive_ratio * videoWidth;


                    // console.warn(o.gallery_object, (cthis.hasClass('currItem') && o.is_ad!='on'), margs.force_resize_gallery)
                    if(o.gallery_object && ( (cthis.hasClass('currItem') && o.is_ad!='on') || margs.force_resize_gallery)  ){
                        //console.error("RESIZE IT!",cthis);
                        if(o.gallery_object.get(0) && o.gallery_object.get(0).api_responsive_ratio_resize_h){
                            o.gallery_object.addClass('responsive-ratio-smooth');
                            o.gallery_object.get(0).api_responsive_ratio_resize_h(auxh, {
                                caller: cthis
                            });
                        }
                    }else{
                        //console.info('single player', o.responsive_ratio);

                        //console.warn(o);

                        if(o.is_ad!='on'){

                            cthis.height(o.responsive_ratio * cthis.width());
                        }
                    }
                }
                if (is_ios()) {
                    //ios has a nasty bug wbhen the parent is scaled - iframes scale too
                    if (undefined != _vgparent) {
                        var aux = (_vgparent.get(0).var_scale);
                        //console.log(cthis);
                        //cthis.children('iframe').width((1/aux) * videoWidth); cthis.children('iframe').height((1/aux) * videoHeight);

                    }
                }



                if(videoWidth<421){
                    cthis.addClass('under-420');

                    if(o.design_skin=='skin_aurora'){
                        o.design_scrubbarWidth = original_scrubwidth - 10;
                    }
                }else{
                    cthis.removeClass('under-420');
                    if(o.design_skin=='skin_aurora'){
                        o.design_scrubbarWidth = original_scrubwidth ;
                    }
                }



                if (is_fullscreen === 1) {
                    ww = $(window).width();
                    wh = $(window).height();
                    resizePlayer(ww, wh);


                    cthis.css('transform', '');
                    currScale = 1;
                } else {

                    //console.info(cthis, videoWidth,videoHeight);
                    resizePlayer(videoWidth, videoHeight);
                }

            }
            function handleKeyPress(e) {
                //-check if space is pressed for pause
                if (e.charCode == 32) {
                    onPlayPause();
                }
            }

            function vimeo_windowMessage(e) {
                //--- we receive iframe messages from vimeo here
                var data, method;
                //console.log(e);

                if (e.origin != 'https://player.vimeo.com' && e.origin != 'http://player.vimeo.com') {
                    return;
                }
                vimeo_url = '';
                vimeo_url = $(video).attr('src').split('?')[0];

                if(String(vimeo_url).indexOf('http')!=0){
                    vimeo_url = 'https:'+vimeo_url;
                }

                //console.info('vimeo_url',vimeo_url);
                try {
                    data = JSON.parse(e.data);
                    method = data.event || data.method;
                }
                catch (e) {
                    //fail silently... like a ninja!
                }


                //if(cthis.attr)
                if (dataSrc != data.player_id.substr(11)) {
                    return;
                }

                if (data != undefined) {
                    if (data.event == 'ready') {
                        //console.log(cthis);
                        if (o.autoplay == 'on') {
                            // -- we don't force play Movie because we already set autoplay to 1 on the iframe
                            //playMovie();
                        }
                        vimeo_data = {
                            "method": "addEventListener",
                            "value": "finish"
                        };

                        //console.info(vimeo_url);
                        if(video && video.contentWindow&&vimeo_url){

                            video.contentWindow.postMessage(JSON.stringify(vimeo_data), vimeo_url);
                        }
                        vimeo_data = {
                            "method": "addEventListener",
                            "value": "playProgress"
                        };

                        //console.info(vimeo_url);
                        if(video && video.contentWindow&&vimeo_url){

                            video.contentWindow.postMessage(JSON.stringify(vimeo_data), vimeo_url);
                        }

                        //if(video){
                        //
                        //    video.addEvent('pause', function(){
                        //        console.info('paUSE!!!');
                        //    });
                        //}


                        cthis.addClass('dzsvp-loaded');
                        if (o.gallery_object != null) {
                            if (typeof(o.gallery_object.get(0)) != 'undefined') {
                                o.gallery_object.get(0).api_video_ready();
                            }
                        }


                    }
                    if (data.event == 'playProgress') {
                        initial_played = true;


                    }
                    if (data.event == 'finish') {
                        handleVideoEnd();
                    }
                }
            }
            function onPlayPause() {

                //console.log(busy_playpause_mistake, 'onPlayPause', paused);
                if(busy_playpause_mistake){
                    return false;
                }


                busy_playpause_mistake=true;

                if(inter_clear_playpause_mistake){
                    clearTimeout(inter_clear_playpause_mistake);
                }
                inter_clear_playpause_mistake = setTimeout(function(){
                    busy_playpause_mistake = false;
                }, 300);
                //return;

                if (o.type == 'youtube' && video.getPlayerState && (video.getPlayerState() == 2||video.getPlayerState() == -1)) {
                    paused = true;
                }

                if (is_ie8()) {
                    if (ie8paused) {
                        playMovie();
                        ie8paused = false;
                    } else {
                        pauseMovie();
                        ie8paused = true;
                    }
                } else {
//                    console.info('playpause', paused);
                    if (paused) {
                        playMovie();
                    } else {
                        pauseMovie();
                    }
                }

            }



            function onFullScreen(e) {
                // -- is_fullscreenscreen trigger event
                // console.info('click fullscreen');


                var aux = cthis.get(0);
                var _t = $(this);
                //totalWidth= $(window).width()
                //totalHeight= $(window).height()

                videoWidth = cthis.outerWidth();
                videoHeight = cthis.outerHeight();

                // console.info(e, is_fullscreen);
                //console.log(_t, _t.parent().parent().parent().parent().parent())

                // console.info(is_fullscreen, document.fullscreenEnabled, document.msFullscreenEnabled);
                // if (document.fullscreenEnabled) {
                //     is_fullscreen = 1;
                // } else if (document.mozFullscreenEnabled) {
                //     is_fullscreen = 1;
                // } else if (document.webkitFullscreenEnabled) {
                //     is_fullscreen = 1;
                // }else if (document.msFullscreenEnabled) {
                //     is_fullscreen = 1;
                // }

                console.info(is_fullscreen);


                if (is_fullscreen == 0) {
                    is_fullscreen = 1;
                    cthis.addClass('is_fullscreen');

                    var elem = aux;
                    // console.info(elem, elem.requestFullScreen, elem.msRequestFullscreen);
                    if (elem.requestFullScreen) {
                        elem.requestFullScreen();
                    } else if (elem.mozRequestFullScreen) {
                        elem.mozRequestFullScreen();
                    } else if (elem.webkitRequestFullScreen) {
                        elem.webkitRequestFullScreen();
                    }else if (elem.msRequestFullscreen) {
                        elem.msRequestFullscreen();
                    } else {
                        if(o.gallery_object){
                            o.gallery_object.find('.the-logo').hide();
                            o.gallery_object.find('.gallery-buttons').hide();
                        }

                    }
                    //jQuery('body').css('overflow', 'hidden');
                    totalWidth= window.screen.width;
                    totalHeight= window.screen.height;
                    //console.log(totalWidth, totalHeight);

                    resizePlayer(totalWidth,totalHeight);
                    /*
                     cthis.css({
                     'position' : 'fixed',
                     'z-index' : 9999,
                     'left' : '0px',
                     'top' : '0px'
                     //,'width': totalWidth
                     //,'height': totalHeight
                     })
                     if(cthis.find('.audioImg').length>0){
                     cthis.find('.audioImg').css({
                     'width' : totalWidth
                     ,'height' : totalHeight
                     })
                     }
                     */

                    if(is_ie()){
                        setTimeout(handleResize, 300);
                    }



                    if(o.design_skin=='skin_reborn') {
                        cthis.find('.full-tooltip').eq(0).html('EXIT FULLSCREEN');
                    }




                    fullscreen_just_pressed = true;

                    setTimeout(function(){
                        fullscreen_just_pressed = false
                    },700)

                    // console.info(o.settings_disable_mouse_out, o.settings_disable_mouse_out_for_fullscreen, o.settings_mouse_out_delay_for_fullscreen)
                    if(o.settings_disable_mouse_out!='on' && o.settings_disable_mouse_out_for_fullscreen!='on') {

                        clearTimeout(inter_removeFsControls);
                        inter_removeFsControls = setTimeout(controls_mouse_is_out, o.settings_mouse_out_delay_for_fullscreen);
                    }

                    if (o.gallery_object) {
                        //dispatchEvent('goFullscreen');
                        //_t.parent().parent().parent().parent().parent().turnFullscreen();

                        if (o.gallery_object != null) {
                            //o.videoGalleryCon.turnFullscreen();
                        }
                    }

                } else {

                    //console.info('ceva');
                    is_fullscreen = 0;
                    cthis.addClass('remove_fullscreen');
                    cthis.removeClass('is_fullscreen');
                    var elem = document;
                    if (elem.cancelFullScreen) {
                        elem.cancelFullScreen();
                    } else if (elem.exitFullscreen) {
                        elem.exitFullscreen();
                    }else if (elem.mozCancelFullScreen) {
                        elem.mozCancelFullScreen();
                    } else if (elem.webkitCancelFullScreen) {
                        elem.webkitCancelFullScreen();
                    } else if (elem.msExitFullscreen) {
                        elem.msExitFullscreen();
                    }

                    if(o.design_skin=='skin_reborn') {
                        cthis.find('.full-tooltip').eq(0).html('FULLSCREEN');
                    }



                    //console.info(cthis, videoWidth,videoHeight);
                    resizePlayer(videoWidth, videoHeight);


                    if(is_ie() || is_firefox()){
                        setTimeout(handleResize, 300);
                    }
                    if(is_ie() ){
                        setTimeout(handleResize, 1000);
                    }


                }
            }

            function resizePlayer(warg, harg) {
                //console.log(cthis);


                calculateDims(warg, harg);

                //console.log(warg);

//                console.log(_scrubBg, warg, o.design_scrubbarWidth, (warg + o.design_scrubbarWidth));

                if(the_player_id=='debug-video'){

                    //console.info(cthis, the_player_id, warg, o.design_scrubbarWidth);
                }

                //console.info(cthis, warg, o.design_scrubbarWidth);
                _scrubBg.css({
                    'width' : (warg + o.design_scrubbarWidth)
                });


                infoPosX = parseInt(controlsDiv.find('.infoText').css('left'));
                infoPosY = parseInt(controlsDiv.find('.infoText').css('top'));
            }
            function calculateDims(warg, harg){

                // console.info('vplayer calculateDims()', warg, harg, o.design_skin);
                if(o.design_skin!='skin_bigplay'){
                    /*
                     controlsDiv.find('.background').css({
                     'width': warg + parseInt(o.design_background_offsetw)
                     })
                     */
                }

                if(o.design_skin=='skin_white'){
                    cthis.find('.controls .background').css({
                        'width' : (warg - 95)
                    })
                }

                /*
                 controlsDiv.css({
                 'width': warg
                 });
                 */
            }


            function playMovie() {
                //console.info('playMovie()');
                //console.info(o.type);



                cthis.find('.cover-image').fadeOut('fast');




                if(o.settings_disableVideoArray!='on'){
                    for(var i=0;i< dzsvp_players_arr.length;i++){
//                        console.info(dzsvp_players_arr);
                        if(dzsvp_players_arr[i].get(0).externalPauseMovie!=undefined){
                            dzsvp_players_arr[i].get(0).externalPauseMovie();
                        }
                    }
                }


                if(cthis.attr('data-adsource') && cthis.data('adplayed')!='on'){

                    //console.info(o.gallery_object);

                    if(o.gallery_object.get(0) && o.gallery_object.get(0).api_setup_ad){

                        o.gallery_object.get(0).api_setup_ad(cthis);

                        cthis.data('adplayed','on');


                        return false;
                    }

                }

                //console.info(cthis, cthis.data('adplayed'))

                if (o.type == 'vimeo') {
                    vimeo_data = {
                        "method": "play"
                    };
                    //console.info('ceva',vimeo_url);

                    if(video&&video.contentWindow&&vimeo_url){

                        video.contentWindow.postMessage(JSON.stringify(vimeo_data), vimeo_url);
                    }


                }
                //return;

                playMovie_visual();
//                console.info(cthis, 'playmovie', video, o.type);;

                if (o.type == 'normal' || o.type == 'audio'|| o.type == 'dash'){
                    video.play();
                }
                if (o.type == 'youtube'){



                    //yt_qualCurr = video.getPlaybackQuality();
                    //
                    //console.info(yt_qualCurr);


                    if(paused==false){
                        return false;
                    }

                    if(video.playVideo!=undefined && video.getPlayerState && video.getPlayerState!=1){
                        video.playVideo();
                    }
                }



                wasPlaying = true;
                paused=false;
                initial_played=true;
                //console.log(wasPlaying);

                cthis.trigger('videoPlay');


                //console.info(o.action_video_view);
                if(o.action_video_view){
                    if(view_sent == false){
                        o.action_video_view(cthis,video_title);
                        view_sent = true;
                    }
                }


            }

            function playMovie_visual(){

                //console.warn("playMovie_visual()");

                playcontrols.children().eq(0).css('visibility', 'hidden');
                playcontrols.children().eq(1).css('visibility', 'hidden');
                playcontrols.children().eq(2).css('visibility', 'visible');
                playcontrols.children().eq(3).css('visibility', 'visible');

                cthis.addClass('first-played');



                if (o.settings_disableControls != 'on') {
                    cthis.children('.video-description').animate({
                        'opacity': 0
                    }, 500);
                }

                if(o.google_analytics_send_play_event=='on' && window._gaq && google_analytics_sent_play_event==false){
                    //if(window.console){ console.info( 'sent event'); }
                    window._gaq.push(['_trackEvent', 'Video Gallery Play', 'Play', 'video gallery play - '+cthis.attr('data-source')]);
                    google_analytics_sent_play_event = true;
                }


                if(o.settings_disable_mouse_out!='on'){



                    if(is_android()){
                        clearTimeout(inter_removeFsControls);
                        inter_removeFsControls = setTimeout(controls_mouse_is_out, o.settings_mouse_out_delay_for_fullscreen);
                    }

                }


                cthis.addClass('is-playing');
            }

            function pauseMovie() {
                //console.info('pauseMovie()', cthis, o.type,paused, initial_played);

                //console.info(o.type, paused);
                //if(o.type!='vimeo' && paused==true){
                //    return;
                //}

                //console.info('initial_played', initial_played);

                if(initial_played==false){
                    return false;
                }

                //console.info(initial_played);

                playcontrols.children().eq(0).css('visibility', 'visible');
                playcontrols.children().eq(1).css('visibility', 'visible');
                playcontrols.children().eq(2).css('visibility', 'hidden');
                playcontrols.children().eq(3).css('visibility', 'hidden');


                if (o.type == 'normal' || o.type == 'audio' || o.type=='dash') {
                    if(video!=undefined){
                        video.pause();
                    }else{
                        if(window.console != undefined){ console.info('warning: video undefined') };
                    }
                }
                if (o.type == 'youtube') {
                    //return false;

                    //console.info('pause YOUTUBE',video ,video.pauseVideo);

                    if (video && video.pauseVideo) {

                        try {
                            video.pauseVideo();
                        } catch (err) {
                            if (window.console) {
                                console.log(err);
                            }
                        }
//                        console.info('pauseMovie',video, video.pauseVideo, paused);
                    }
                }

                if (o.type == 'vimeo') {
                    //if (/Opera/.test(navigator.userAgent)) {
                    //    return;
                    //}
                    vimeo_data = {
                        "method": "pause"
                    };

                    if(vimeo_url) {
                        try {
                            video.contentWindow.postMessage(JSON.stringify(vimeo_data), vimeo_url);

                            //console.info(vimeo_data, vimeo_url);
                            wasPlaying = false;
                            paused=true;
                        } catch (err) {
                            if (window.console) {
                                console.log(err);
                            }
                        }
                    }
                    return;
                }


                cthis.children('.video-description').animate({
                    'opacity': 1
                }, 500);

                wasPlaying = false;
                paused=true;

                mouse_is_over();

                cthis.removeClass('is-playing');
            }

            function reinit_cover_image(){

                cthis.find('.cover-image').fadeIn('fast');
            }

            //console.log(cthis);
            try {
                cthis.get(0).checkYoutubeState = function() {
                    if (o.type == 'youtube' && video.getPlayerState != undefined) {
                        //console.log("ceva", cthis, video.getPlayerState());
                        if (video.getPlayerState && video.getPlayerState() == 0) {
                            handleVideoEnd();
                        }
                    }
                }

            } catch (err) {
                if (window.console)
                    console.log(err);
            }
            /*
             window.checkYoutubeState=function(){
             // - we check if video youtube has ended so we can go to the next one

             }
             */

        }); // end each

    }


    window.dzsvp_init = function(selector, settings) {
        //console.info($(selector), settings);


        if(typeof(settings)!="undefined" && typeof(settings.init_each)!="undefined" && settings.init_each==true ){
            var element_count = 0;
            for (var e in settings) { element_count++; }
            if(element_count==1){
                settings = undefined;
            }

            $(selector).each(function(){
                var _t = $(this);
                _t.vPlayer(settings)
            });
        }else{
            $(selector).vPlayer(settings);
        }


    };


})(jQuery);




if(typeof window.onYouTubePlayerReady=='function'){
    window.backup_onYouTubePlayerReady = window.onYouTubePlayerReady;
}
window.onYouTubePlayerReady = function onYouTubePlayerReady(playerId) {
    //alert('ytready')
    //alert(playerId)




//    console.info('ytready', playerId);

    var aux_objectid = playerId;
    var aux_videoid = playerId.substr(8);

//        console.info(youtubeid_array);

//        console.info(auxerid, document.getElementById(aux_objectid), aux_videoid);
    for(var i=0;i<youtubeid_array.length;i++){
        if(youtubeid_array[i].id == aux_videoid){
            if(youtubeid_array[i].nrtimes>0){
                aux_objectid+='_clone'+youtubeid_array[i].nrtimes;
            }
        }
    }

//        console.info(aux_objectid, document.getElementById(aux_objectid))


    ytplayer = document.getElementById(aux_objectid);


    var _t = jQuery(ytplayer);
    if(_t.hasClass('treated')){
        return;
    }
    _t.addClass('treated');

    //console.log(ytplayer);
    ytplayer.addEventListener("onStateChange", "onytplayerStateChange");
    var aux2 = _t.attr('data-suggestedquality');
    //console.log(aux2);
    ytplayer.loadVideoById(aux_videoid, 0, aux2);
    ytplayer.pauseVideo();




};


window.requestAnimFrame = (function(){
    return  window.requestAnimationFrame       ||
        window.webkitRequestAnimationFrame ||
        window.mozRequestAnimationFrame    ||
        function( callback ){
            window.setTimeout(callback, 1000 / 60);
        };
})();


jQuery(document).ready(function($){
//    --- mega conflict with mediaelement.js, well workaround by treating untreated flash items

    var inter_check_treat = 0;

    clearTimeout(inter_check_treat);
    inter_check_treat = setTimeout(workaround_treatuntretreadItems, 2000);

    function workaround_treatuntretreadItems(){


        jQuery('.js-api-player:not(.treated)').each(function(){
            var _t = jQuery(this);
            var __t = _t.get(0);
//            console.info(_t, __t);

            var playerId = _t.attr('id');

            var aux = playerId.substr(8);
            var aux2 = _t.attr('data-suggestedquality');
            //console.log(aux2);

            if(typeof __t.loadVideoById !='undefined'){
                __t.loadVideoById(aux, 0, aux2);
                __t.pauseVideo();
            }else{

                inter_check_treat = setTimeout(workaround_treatuntretreadItems, 2000);
            }


        })

    }

    if(typeof window.onYouTubePlayerReady=='function' && typeof backup_onYouTubePlayerReady == 'undefined'){
        backup_onYouTubePlayerReady = window.onYouTubePlayerReady;
    }

    window.onYouTubePlayerReady = function onYouTubePlayerReady(playerId) {
        //alert('ytready')
        //alert(playerId)


        //console.info('ytready', playerId);

        var aux_objectid = playerId;
        var aux_videoid = playerId.substr(8);

//        console.info(youtubeid_array);

//        console.info(auxerid, document.getElementById(aux_objectid), aux_videoid);
        for(var i=0;i<youtubeid_array.length;i++){
            if(youtubeid_array[i].id == aux_videoid){
                if(youtubeid_array[i].nrtimes>0){
                    aux_objectid+='_clone'+youtubeid_array[i].nrtimes;
                }
            }
        }

//        console.info(aux_objectid, document.getElementById(aux_objectid))


        ytplayer = document.getElementById(aux_objectid);


        var _t = jQuery(ytplayer);

        if(_t.hasClass('treated')){
            return;
        }
        _t.addClass('treated');

        //console.log(ytplayer);
        ytplayer.addEventListener("onStateChange", "onytplayerStateChange");
        var aux2 = _t.attr('data-suggestedquality');
//        console.log(aux2, ytplayer);
        ytplayer.loadVideoById(aux_videoid, 0, aux2);
        ytplayer.pauseVideo();

        if(typeof backup_onYouTubePlayerReady=='function'){
            backup_onYouTubePlayerReady(playerId);
        }

    };


    $('.videogallery--navigation-outer').each(function(){
        var _t = $(this);
        var _tar = $(_t.attr('data-vgtarget')).eq(0);
        var _clip =_t.find('.videogallery--navigation-outer--clip').eq(0);
        var _clipmover =_t.find('.videogallery--navigation-outer--clipmover').eq(0);

        var currPage = 0;
        var _block_active = _t.find('.videogallery--navigation-outer--bigblock.active').eq(0);
//        console.info(_tar);

        var _navOuterBullets = _t.find('.navigation-outer--bullet');
        var _navOuterBlocks = _t.find('.videogallery--navigation-outer--block');

        setTimeout(function(){
            _t.addClass('active');
            _block_active = _t.find('.videogallery--navigation-outer--bigblock.active').eq(0);
            _clip.height(_block_active.height());
        },500)

        _navOuterBlocks.bind('click', function(){
            var _t2 = $(this);
            var ind = _navOuterBlocks.index(_t2);


//            console.info(ind);

            if(_tar.get(0) && _tar.get(0).api_gotoItem){
                if(_tar.get(0).api_gotoItem(ind)){
                }
            }
        });

        _navOuterBullets.bind('click',function(){
            var _t2 = $(this);
            var ind = _navOuterBullets.index(_t2);

            gotoPage(ind);

        })

        function gotoPage(arg){
            var auxl = -(Number(arg)*100) + '%';

            _navOuterBullets.removeClass('active');
            _navOuterBullets.eq(arg).addClass('active');

            _t.find('.videogallery--navigation-outer--bigblock.active').removeClass('active');
            _t.find('.videogallery--navigation-outer--bigblock').eq(arg).addClass('active');


            _clip.height(_t.find('.videogallery--navigation-outer--bigblock').eq(arg).height());

            _clipmover.css('left',auxl);

        }


    })
});




jQuery(document).ready(function($){
    //console.info($('.zoomvideogallery.auto-init'));
    // dzsvp_init('.vplayer-tobe.auto-init', {init_each: true});
    // dzsvg_init('.videogallery.auto-init', {init_each: true});

    //if (typeof window.onYouTubeIframeAPIReady!='undefined' && typeof backup_yt_iframe_ready=='undefined'){
    //    backup_yt_iframe_ready = window.onYouTubeIframeAPIReady;
    //}
    //
    //window.onYouTubeIframeAPIReady = function() {
    //
    //    dzszvp_yt_iframe_ready();
    //    if(backup_yt_iframe_ready){
    //        backup_yt_iframe_ready();
    //    }
    //}



});


function onytplayerStateChange(newState) {
//    console.log(jQuery(ytplayer).parent().get(0), "Player's new state: " + newState, ytplayer.getAvailableQualityLevels());
    if(typeof(jQuery(ytplayer).parent().get(0))!='undefined'){
        try {
            jQuery(ytplayer).parent().get(0).checkYoutubeState();
        } catch (err) {
            if (window.console){
                console.log(err);
            }
        }
    }

    //console.log(newState);
    //window.checkYoutubeState();
    //- we send the on end event to the gallery if it has one
    newState = parseInt(newState, 10);
    if (newState == 0) {
        //console.log(jQuery(ytplayer))
        //jQuery(ytplayer).parent().get(0).handleVideoEnd();
    }

    window.onYouTubeIframeAPIReady = function() {
        dzsvp_yt_iframe_ready();
    }
}

function dzsvp_yt_iframe_ready(){

    _global_youtubeIframeAPIReady = true;
}

window.onYouTubeIframeAPIReady = function() {
    dzsvp_yt_iframe_ready();
}

function onYouTubeIframeAPIReady() {
}


function can_translate() {
    if (is_chrome() || is_safari()) {
        return true;
    }
    if (is_firefox() && version_firefox() > 10) {
        return true;
    }
    return false;
}

function can_history_api() {
    return !!(window.history && history.pushState);
}
function is_ios() {
    //return true;
    return ((navigator.platform.indexOf("iPhone") != -1) || (navigator.platform.indexOf("iPod") != -1) || (navigator.platform.indexOf("iPad") != -1)
    );
}

function is_android() {
    //return true;
    var ua = navigator.userAgent.toLowerCase();    return (ua.indexOf("android") > -1);
}

function is_ie() {
    if (navigator.appVersion.indexOf("MSIE") != -1) {
        return true;    }; return false;
}
;
function is_firefox() {
    if (navigator.userAgent.indexOf("Firefox") != -1) {        return true;    };
    return false;
}
;
function is_opera() {
    if (navigator.userAgent.indexOf("Opera") != -1) {        return true;    };
    return false;
}
;
function is_chrome() {
    return navigator.userAgent.toLowerCase().indexOf('chrome') > -1;
}
;
function is_safari() {
    return navigator.userAgent.toLowerCase().indexOf('safari') > -1;
}
;
function version_ie() {
    return parseFloat(navigator.appVersion.split("MSIE")[1]);
}
;
function version_firefox() {
    if (/Firefox[\/\s](\d+\.\d+)/.test(navigator.userAgent)) {
        var aversion = new Number(RegExp.$1); return(aversion);
    }
    ;
}
;
function version_opera() {
    if (/Opera[\/\s](\d+\.\d+)/.test(navigator.userAgent)) {
        var aversion = new Number(RegExp.$1); return(aversion);
    }
    ;
}
;
function is_ie8() {
    if (is_ie() && version_ie() < 9) {  return true;  };
    return false;
}
function is_ie9() {
    if (is_ie() && version_ie() == 9) {
        return true;
    }
    return false;
}

function get_query_arg(purl, key){
    if(purl.indexOf(key+'=')>-1){
        //faconsole.log('testtt');
        var regexS = "[?&]"+key + "=.+";
        var regex = new RegExp(regexS);
        var regtest = regex.exec(purl);
        //console.info(regtest);

        if(regtest != null){
            var splitterS = regtest[0];
            if(splitterS.indexOf('&')>-1){
                var aux = splitterS.split('&');
                splitterS = aux[1];
            }
            //console.log(splitterS);
            var splitter = splitterS.split('=');
            //console.log(splitter[1]);
            //var tempNr = ;

            return splitter[1];

        }
        //$('.zoombox').eq
    }
}

function add_query_arg(purl, key,value){
    key = encodeURIComponent(key); value = encodeURIComponent(value);

    var s = purl;
    var pair = key+"="+value;

    var r = new RegExp("(&|\\?)"+key+"=[^\&]*");

    s = s.replace(r,"$1"+pair);
    //console.log(s, pair);
    if(s.indexOf(key + '=')>-1){


    }else{
        if(s.indexOf('?')>-1){
            s+='&'+pair;
        }else{
            s+='?'+pair;
        }
    }
    //if(!RegExp.$1) {s += (s.length>0 ? '&' : '?') + kvp;};


    //if value NaN we remove this field from the url
    if(value=='NaN'){
        var regex_attr = new RegExp('[\?|\&]'+key+'='+value);
        s=s.replace(regex_attr, '');
    }

    return s;
}

function can_play_mp3(){
    var a = document.createElement('audio');
    return !!(a.canPlayType && a.canPlayType('audio/mpeg;').replace(/no/, ''));
}
function can_play_mp4(){
    var a = document.createElement('video');
    return !!(a.canPlayType && a.canPlayType('video/mp4;').replace(/no/, ''));
}


//time, begin, change( f-b ), duration
function global_ease_in(t, b, c, d) {

    return -c *(t/=d)*(t-2) + b;

};
function is_touch_device() {
    //return true;
    return !!('ontouchstart' in window);
}


jQuery.fn.urlParam = function (arg, name) {
    var results = new RegExp('[\\?&]' + name + '=([^&#]*)').exec(arg);
    return (results !== null) ? results[1] : 0;
}


window.dzsvg_wp_send_view = function(argcthis, argtitle){
    //console.info(argcthis, argtitle);



    var data = {
        video_title: argtitle
        ,dzsvg_curr_user: window.dzsvg_curr_user
    };

    var theajaxurl = 'index.php?action=ajax_dzsvg_submit_view';

    if(window.dzsvg_site_url){

        theajaxurl = dzsvg_settings.dzsvg_site_url + theajaxurl;
    }


    jQuery.ajax({
        type: "POST",
        url: theajaxurl,
        data: data,
        success: function(response) {
            if(typeof window.console != "undefined" ){ console.log('Ajax - submit view - ' + response); }



        },
        error:function(arg){
            if(typeof window.console != "undefined" ){ console.warn('Got this from the server: ' + arg); };
        }
    });


}
window.dzsvg_wp_send_contor_10_secs = function(argcthis, argtitle){

    var data = {
        video_title: argtitle
        ,dzsvg_curr_user: window.dzsvg_curr_user
    };
    var theajaxurl = 'index.php?action=ajax_dzsvg_submit_view';

    if(window.dzsvg_site_url){

        theajaxurl = dzsvg_settings.dzsvg_site_url + theajaxurl;
    }



    jQuery.ajax({
        type: "POST",
        url: theajaxurl,
        data: data,
        success: function(response) {
            if(typeof window.console != "undefined" ){ console.log('Ajax - submit view - ' + response); }



        },
        error:function(arg){
            if(typeof window.console != "undefined" ){ console.warn('Got this from the server: ' + arg); };
        }
    });
}


window.dzsvg_open_social_link = function(arg){
    var leftPosition, topPosition;
    var w = 500, h= 500;

    arg = arg.replace("{{replacewithcurrurl}}",encodeURIComponent(window.location.href));
    //Allow for borders.
    leftPosition = (window.screen.width / 2) - ((w / 2) + 10);
    //Allow for title and status bars.
    topPosition = (window.screen.height / 2) - ((h / 2) + 50);
    var windowFeatures = "status=no,height=" + h + ",width=" + w + ",resizable=yes,left=" + leftPosition + ",top=" + topPosition + ",screenX=" + leftPosition + ",screenY=" + topPosition + ",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no";
    window.open(arg,"sharer", windowFeatures);
}