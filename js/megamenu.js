

	jQuery('.dropdown-submenu>a').click(function(e){

		e.preventDefault();

		jQuery(this).parent('.dropdown-submenu').toggleClass('open');

		return false;
	});
