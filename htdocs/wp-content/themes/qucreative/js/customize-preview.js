/**
 * Live-update changed settings in real time in the Customizer preview.
 *
 *  -- this is in the theme not the admin
 */

( function( $ ) {







	var api = wp.customize;



	wp.customize( 'social_icons', function( value ) {
		value.bind( function( newval ) {


			var aux = '';

			try{
				var arr = JSON.parse(newval);

				for(var i in arr){
					aux+='<a href="'+arr[i].link+'"><i class="fa fa-'+arr[i].icon+'"></i></a>';
				}
			}catch(err){
				console.log(err);
			}

			if($('.social-icons').length==0){
				if($('body').eq(0).hasClass('menu-type-1')){
				}
                $('.nav-social-con').prepend('<p class="social-icons"></p>');
			}else{

			}
            $('.social-icons').eq(0).html(aux);
		} );
	} );


	function replace_font(newval, selector){
        $(selector).each(function(){
            var _t = $(this);


            var oldNode = _t.get(0),
                newNode = null,
                node,
                nextNode;

            if(newval=='h-group-1' || newval=='h-group-2'){

                newNode = document.createElement('h3');
            }else{
                newNode = document.createElement(newval);
            }

            node = oldNode.firstChild;
            while (node) {
                nextNode = node.nextSibling;
                newNode.appendChild(node);
                node = nextNode;
            }

            var newClass = '';
            if(newval=='h-group-1' || newval=='h-group-2'){

                newClass = 'the-variable-heading widget-title '+newval;
            }else{
                newClass = oldNode.className;
                newClass = newClass.replace('h-group-1','');
                newClass = newClass.replace('h-group-2','');
            }

            newNode.className = newClass;
			// -- Do attributes too if you need to
            newNode.id = oldNode.id; // -- (Not invalid, they're not both in the tree at the same time)
            oldNode.parentNode.replaceChild(newNode, oldNode);
        })

    }

	wp.customize( 'typography_sidebar_heading_style', function( value ) {
		value.bind( function( newval ) {
			console.warn('newval - ',newval);
			replace_font(newval,'.sidebar-main .widget-title');



		} );
	} );

	wp.customize( 'typography_footer_heading_style', function( value ) {
		value.bind( function( newval ) {
			console.warn('newval - ',newval);
			replace_font(newval,'.upper-footer .widget-title');



		} );
	} );


	// -- Site title.
	api( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );

	// -- Site tagline.
	api( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// -- Color Scheme CSS.
	api.bind( 'preview-ready', function() {

	} );

} )( jQuery );


jQuery(document).ready(function($){

})