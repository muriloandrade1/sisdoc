jQuery.noConflict();
		jQuery(document).ready(function() {
			
			jQuery("#menu2 li a").wrapInner( '<span class="out"></span>' );
			
			jQuery("#menu2 li a").each(function() {
				jQuery( '<span class="over">' +  jQuery(this).text() + '</span>' ).appendTo( this );
			});

			jQuery("#menu2 li a").hover(function() {
				jQuery(".out",	this).stop().animate({'top':	'45px'},	200); // move down - hide
				jQuery(".over",	this).stop().animate({'top':	'0px'},		200); // move down - show

			}, function() {
				jQuery(".out",	this).stop().animate({'top':	'0px'},		200); // move up - show
				jQuery(".over",	this).stop().animate({'top':	'-45px'},	200); // move up - hide
			});

		});