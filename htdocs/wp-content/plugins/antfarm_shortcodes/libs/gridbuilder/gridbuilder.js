
(function($) {
    $.fn.dzsgridbuilder = function(o) {
        var defaults = {
            settings_slideshowTime: '5' //in seconds
            , settings_preloadall: 'on'
            , settings_dummy_items_nr: 10
            , grid: 'dzs-layout--5-cols'
            , input: ''

        }
        o = $.extend(defaults, o);
        this.each(function() {
            var cthis = $(this);

            var _theClip
                ,_inner
                ,_dummyItems
            ;

            var tw//clip width
                ,th
                ,cw//total width
                ,ch
                ,iw = 300 // item width
                ,ih = 300 // item height
                ,grid_unit_perc = 33.33 // -- pixels grid unit
                ,grid_unit_pixels = 0 // -- pixels grid unit
            ;
            var loaded_nr_target = 0
                ,loaded_nr_aux=0
            ;
            var mousex
                ,mousey
            ;
            var loaded=false
                ,mouseover=false
                ,animating='idle'
                ,lastanimating='down'
                ;


            var _input = null;



            var init_arr = {};

            var ip = 10; // -- item padding

            var settings_dummy_items_nr = 0;

            settings_dummy_items_nr = parseInt(o.settings_dummy_items_nr, 10);

            init();
            function init(){









                if(o.input){

                    if($(o.input).length){

                        _input = $(o.input).eq(0);
                    }
                }







                init_arr = {
                    "grid_cols":"5"
                    ,"items_arr":[{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"}]
                    ,"loop":"on"
                };


                if(_input){
                    var arr = {};

                    try{
                        arr = JSON.parse(_input.val());
                        init_arr = $.extend(init_arr,arr);
                    }catch(err){
                        console.info('cannot parse - ',arr);
                    }
                }




                if(o.grid=='detect'){
                    o.grid='dzs-layout--'+init_arr.grid_cols+'-cols';
                }






                if(o.grid=='dzs-layout--2-cols'){

                    grid_unit_perc = 50;
                }

                if(o.grid=='dzs-layout--3-cols'){

                    grid_unit_perc = 33.33;
                }
                if(o.grid=='dzs-layout--4-cols'){

                    grid_unit_perc = 25;
                }
                if(o.grid=='dzs-layout--5-cols'){

                    grid_unit_perc = 20;
                }
                if(o.grid=='dzs-layout--6-cols'){

                    grid_unit_perc = 100/6;
                }



                setup_structure();

                //calculateDims();


                cthis.on('click','.grid-add-item, .arrows-con >div[class^="arrow-"], > .layout-choosers > button,.delete-item-btn',handle_mouse);
                cthis.on('change','*[name="grid_loop"]',handle_change);
                $(window).on('resize', handle_resize);

                $(window).trigger('resize');


                _dummyItems.addClass('isotope-inited');


                var args = {
                    // set itemSelector so .grid-sizer is not used in layout
                    itemSelector: '.dummy-item'
                    ,percentPosition: true
                    ,masonry: {
                        // use element for option
                        columnWidth: '.grid-sizer'
                    }
                    ,packery: {
                        // use element for option
                        columnWidth: '.grid-sizer'
                    }
                    ,layoutMode: 'packery'
                };


                // console.log('args - ',args);

                _dummyItems.isotope(args)

                setTimeout(init_loaded, 500);



                _dummyItems.children().each(function(){
                    var _t = $(this);


                    increase_grid_unit_item_size(_t,{

                        'increase_dimension':'width'
                        ,'call_from':'init_call'
                    });
                })


                cthis.addClass(o.grid);
            }

            function handle_resize(){


                tw = _dummyItems.width();
                th = cthis.height();
                //cw = _inner.width();
                //ch = _inner.height();
                //_theClip.css({
                //    'width' : tw
                //    ,'height' : th
                //});
                grid_unit_pixels = tw/(100/grid_unit_perc);

                iw = tw/(100/grid_unit_perc);
                ih = iw;


                calculateDims();
            }

            function update_to_editor(){

                // console.info('_input - ',_input);

                if(_input){


                    var final_arr = {};


                    final_arr.grid_cols = cthis.find('.dzs-layout-btn.active').attr('data-cols');

                    var arr = [];
                    _dummyItems.children('*:not(.grid-sizer)').each(function(){
                        var _t = $(this);


                        // console.info(_t);

                        var obj = {
                            'w':_t.attr('data-wexpand')
                            ,'h':_t.attr('data-hexpand')

                        }

                        arr.push(obj);
                    })

                    final_arr.items_arr = arr;
                    final_arr.loop = cthis.find('*[name=grid_loop]').eq(0).val();



                    console.info(_input, ' final val - ',JSON.stringify(final_arr), final_arr);
                    _input.val(JSON.stringify(final_arr));

                    try{

                        window.tinyMCE.get('content').setContent(JSON.stringify(final_arr));
                    }catch(err){
                        console.log('tinymce not inited');
                    }
                }
            }

            function handle_change(e) {

                var _t = $(this);

                // console.info(_t);

                if (e.type == 'change') {


                    update_to_editor();
                }
            }


            function rename_dummy_items() {

                var i = 0;
                _dummyItems.children('.dummy-item').each(function(){
                    var _t = $(this);

                    _t.find('.big-number').html((++i));


                })
            }

            function handle_mouse(e){

                var _t = $(this);

                // console.info(_t);

                if(e.type=='click'){


                    if(_t.hasClass('grid-add-item')) {

                        _dummyItems.append('<div class="dummy-item gridwidthx1 gridheightx1" data-wexpand="1" data-hexpand="1"><div class="dummy-item--aux"><div class="dummy-item--inner"><span class="big-number">'+1+'</span></div><div class="arrows-con"><div class="arrow-top"></div><div class="arrow-right"></div><div class="arrow-bottom"></div><div class="arrow-left"></div></div> <i class="fa fa-times-circle delete-item-btn" aria-hidden="true"></i> </div></div>');



                        var elem = _dummyItems.children().last();
                        increase_grid_unit_item_size(elem, {

                            'increase_dimension': 'width'
                            , 'call_from': 'init_call'
                        });

                        setTimeout(function(){

                            _dummyItems.isotope( 'appended', elem ).isotope('layout');



                            rename_dummy_items();
                            calculateDims();
                            update_to_editor();
                        },100)



                        return false;
                    }


                    if(_t.hasClass('delete-item-btn')) {

                        console.info(_t);

                        _t.parent().parent().remove();

                        rename_dummy_items();
                        if(_dummyItems.hasClass('isotope-inited')) {
                            _dummyItems.isotope('layout');
                        }
                        update_to_editor();
                    }

                    if(_t.hasClass('dzs-layout-btn')){

                        console.info(_t);


                        cthis.removeClass('dzs-layout--6-cols dzs-layout--5-cols dzs-layout--4-cols dzs-layout--3-cols dzs-layout--2-cols')

                        grid_unit_perc = 100/Number(_t.attr('data-cols'));

                        cthis.addClass('dzs-layout--'+_t.attr('data-cols')+'-cols');



                        _t.parent().children().removeClass('active');

                        _t.addClass('active');





                        _dummyItems.children().each(function() {
                            var _t = $(this);

                            increase_grid_unit_item_size(_t, {

                                'increase_dimension': 'width'
                                , 'call_from': 'init_call'
                            });
                        });

                        update_to_editor();

                        setTimeout(function(){
                            calculateDims();
                        },100);

                        return false;

                    }
                    if(_t.hasClass('arrow-right')){



                        var _con = _t.parent().parent().parent();



                        increase_grid_unit_item_size(_con,{
                            'call_from':'arrow-right'
                            ,'increase_dimension':'width'
                        });

                        update_to_editor();


                    }
                    if(_t.hasClass('arrow-left')){



                        var _con = _t.parent().parent().parent();



                        increase_grid_unit_item_size(_con,{
                            'call_from':'arrow-left'
                            ,'increase_dimension':'width'
                        });

                        update_to_editor();


                    }
                    if(_t.hasClass('arrow-bottom')){



                        var _con = _t.parent().parent().parent();
                        increase_grid_unit_item_size(_con,{
                            'call_from':'arrow-bottom'
                            ,'increase_dimension':'height'
                        });

                        update_to_editor();
                    }
                    if(_t.hasClass('arrow-top')){



                        var _con = _t.parent().parent().parent();

                        increase_grid_unit_item_size(_con,{
                            'call_from':'arrow-top'
                            ,'increase_dimension':'height'
                        });
                        update_to_editor();
                    }
                }
            }


            function increase_grid_unit_item_size(_arg, pargs){
                var margs = {

                    'increase_dimension':'width'
                    ,'call_from':'default'
                };

                if(pargs){
                    margs = $.extend(margs,pargs);
                }



                if(_arg.hasClass('grid-sizer')){
                    return false;
                }



                var new_grid_width = 1;
                var new_grid_height = 1;






                var str_class = _arg.attr('class');

                var regex_w = /gridwidthx([1-9]*)/g;

                var aux = regex_w.exec(str_class);


                if(aux){

                    new_grid_width = Number(aux[1]);
                }
                var regex_h = /gridheightx([1-9]*)/g;

                var aux2 = regex_h.exec(str_class);


                if(aux2){

                    new_grid_height = Number(aux2[1]);
                }


                if(margs.call_from=='init_call'){
                    if(_arg.attr('data-wexpand')){
                        new_grid_width = Number(_arg.attr('data-wexpand'));
                        // console.info('new_grid_width2 - ',new_grid_width);
                        // console.info('new_grid_width2 - ',new_grid_width);
                    }
                    if(_arg.attr('data-hexpand')){
                        new_grid_height = Number(_arg.attr('data-hexpand'));
                    }
                }


                console.warn(_arg, str_class,aux,margs);
                console.info('new_grid_width - ',new_grid_width);
                console.info('new_grid_height - ',new_grid_height);
                // console.info('_arg.attr(\'data-wexpand\') - ',_arg.attr('data-wexpand'));
                // console.info('_arg.attr(\'data-hexpand\') - ',_arg.attr('data-hexpand'));


                _arg.removeClass('gridwidthx1 gridwidthx2 gridwidthx3 gridwidthx4 gridwidthx5 gridheightx1 gridheightx2 gridheightx3 gridheightx4 gridheightx5')


                if(margs.call_from=='arrow-right'){
                    new_grid_width++;
                }
                if(margs.call_from=='arrow-left'){
                    new_grid_width--;
                }
                if(margs.call_from=='arrow-bottom'){
                    new_grid_height++;
                }
                if(margs.call_from=='arrow-top'){
                    new_grid_height--;
                }

                if(new_grid_width<1){
                    new_grid_width=1;
                }
                if(new_grid_height<1){
                    new_grid_height=1;
                }

                _arg.addClass('gridwidthx'+new_grid_width);
                _arg.addClass('gridheightx'+new_grid_height);


                _arg.attr('data-wexpand',new_grid_width);
                _arg.attr('data-hexpand',new_grid_height);

                _arg.removeClass('disable-arrow-left disable-arrow-right disable-arrow-top disable-arrow-bottom' )
                if(new_grid_width==1){
                    _arg.addClass('disable-arrow-left');
                }
                if(new_grid_height==1){
                    _arg.addClass('disable-arrow-top');
                }
                if(new_grid_width>Math.ceil(100/grid_unit_perc)-1){
                    _arg.addClass('disable-arrow-right');
                }
                if(new_grid_height>Math.ceil(100/grid_unit_perc)-1){
                    _arg.addClass('disable-arrow-bottom');
                }

                console.warn(_arg);

                if(margs.increase_dimension=='width'){

                    var auxw = (grid_unit_perc * new_grid_width);
                    var auxwpx = tw*(grid_unit_perc * 0.01 * new_grid_width);

                    if(auxw>100){
                        auxw = 100;
                    }
                    if(auxwpx>tw){
                        auxwpx = tw;
                    }


                    _arg.css({
                        'width': auxw + '%'
                    });
                    _arg.children('.dummy-item--aux').css({
                        'width': auxwpx
                    })

                    //- ip*2
                }

                if(margs.increase_dimension=='width' || margs.increase_dimension=='height' || margs.call_from=='init_call'){

                    console.info('new_grid_height  32 - ',new_grid_height, grid_unit_pixels,grid_unit_pixels * new_grid_height, ip);

                    // _arg.css({
                    //     'height': parseInt(grid_unit_pixels * new_grid_height,10) + 'px'
                    // })
                    // _arg.children('.dummy-item--aux').css({
                    //     'height': parseInt(grid_unit_pixels * new_grid_height,10) - ip*2
                    // })



                    _arg.css({
                        'height': 'auto'
                    })
                    _arg.children('.dummy-item--aux').css({
                        'padding-top': (new_grid_height / new_grid_width) * 100 + '%'
                    })

                }




                if(margs.call_from!='default') {

                    if(_dummyItems.hasClass('isotope-inited')){

                        _dummyItems.isotope('layout');
                    }
                }
            }


            function imageLoaded(){
                loaded_nr_aux++;
                //console.log(this, this.naturalWidth, this.naturalHeight, this.complete, loaded_nr_aux, loaded_nr_target);
                if(loaded_nr_aux>=loaded_nr_target){
                    //==leave some time for the width to be set in the items
                    setTimeout(init_loaded, 1000);
                    //handle_loaded();
                }
            }
            function setup_structure(){

                var already_setuped = false;
                if(cthis.children('.dummy-items').length==0){

                    cthis.append('<div class="dummy-items"><div class="grid-sizer"></div></div>');
                }
                _dummyItems=cthis.children('.dummy-items').eq(0);


                cthis.find('.dzs-layout-btn').removeClass('active');
                cthis.find('.dzs-layout-btn[data-cols="'+init_arr.grid_cols+'"]').addClass('active');

                console.info('init_arr.loop - ',init_arr.loop);
                cthis.find('*[name=grid_loop]').val(init_arr.loop);
                cthis.find('*[name=grid_loop]').trigger('change');
                setTimeout(function(){

                    cthis.find('*[name=grid_loop]').val(init_arr.loop);
                    cthis.find('*[name=grid_loop]').trigger('change');


                    setTimeout(function(){

                        var _c = cthis.find('*[name=grid_loop]').eq(0);

                        // _c.val('youtube');
                        // _c.trigger('change');

                        // console.info(_c, _c.val(), _c.get(0));

//                                    _c.get(0).api_reinit();

                        if(_c && _c.get(0) && _c.get(0).api_recheck_value_from_input){

                            _c.get(0).api_recheck_value_from_input();
                        }
                    },100);
                },500);



                if(_dummyItems.children('.dummy-item').length==0){

                    console.info('settings_dummy_items_nr - ',settings_dummy_items_nr);



                    if(init_arr.items_arr &&init_arr.items_arr.length){

                        var i = 0;

                        for(var lab in init_arr.items_arr){
                            var cach = init_arr.items_arr[lab];
                            _dummyItems.append('<div class="dummy-item" data-wexpand="'+cach.w+'" data-hexpand="'+cach.h+'"><div class="dummy-item--aux"><div class="dummy-item--inner"><span class="big-number">'+(++i)+'</span></div><div class="arrows-con"><div class="arrow-top"></div><div class="arrow-right"></div><div class="arrow-bottom"></div><div class="arrow-left"></div></div> <i class="fa fa-times-circle delete-item-btn" aria-hidden="true"></i> </div></div>');
                        }
                    }else{
                        for(var i=0;i<settings_dummy_items_nr;i++){
                            _dummyItems.append('<div class="dummy-item"><div class="dummy-item--aux"><div class="dummy-item--inner"><span class="big-number">'+(i+1)+'</span></div><div class="arrows-con"><div class="arrow-top"></div><div class="arrow-right"></div><div class="arrow-bottom"></div><div class="arrow-left"></div></div></div></div>');
                        }
                    }


                }else{
                    already_setuped = true;
                }

                if(already_setuped){
                    update_to_editor();
                }


            }



            function init_loaded(){
                if(loaded){
                    return;
                }
                calculateDims();

                cthis.bind('mousemove', handle_mousemove);
                cthis.bind('mouseleave', handle_mouseleave);

                loaded=true;



                //requestAnimFrame(handle_frame);

            }
            function handle_frame(){


            }


            function handle_mousemove(e){

            }
            function handle_mouseleave(){
                mouseover = false;
            }
            function calculateDims(){
                tw = _dummyItems.width();
                th = cthis.height();
                //cw = _inner.width();
                //ch = _inner.height();
                //_theClip.css({
                //    'width' : tw
                //    ,'height' : th
                //});
                grid_unit_pixels = tw/(100/grid_unit_perc);

                iw = tw/(100/grid_unit_perc);
                ih = iw;

                //_dummyItems.children().width(iw);

                _dummyItems.children('.dummy-item').each(function(){
                    var _t = $(this);

                    // _t.outerHeight(ih);


                    // console.info(iw,ih);



                    var wexpand = Number(_t.attr('data-wexpand'));
                    var hexpand = Number(_t.attr('data-hexpand'));



                    // console.info(wexpand,hexpand);


                    //_t.children('.dummy-item--aux').outerWidth(_t.width());
                    //_t.children('.dummy-item--aux').outerHeight(_t.height());
                    //_t.children('.dummy-item--aux').outerWidth(iw - ip*2);
                })

                if(_dummyItems.hasClass('isotope-inited')) {
                    _dummyItems.isotope('layout');
                }


            }
            return this;
        })
    }
})(jQuery);

jQuery(document).ready(function($){
    $('.dzs-grid-builder.auto-init').dzsgridbuilder();
})