jQuery.noConflict();	
	jQuery(document).ready(function()
	{	
			jQuery.noticeAdd({
				text: 'This is an error notification!',
				stay: true,
				type: 'error'
			});
			
			
			jQuery.noticeAdd({
				text: 'This is a success notification!',
				stay: true,
				type: 'success'
			});

		
		jQuery('.remove').click(function()
		{
			jQuery.noticeRemove($('.notice-item-wrapper'), 400);
		});
	});