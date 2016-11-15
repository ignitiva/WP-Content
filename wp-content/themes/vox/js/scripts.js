$(function() {
	/*
	 * Notifications
	 */
	$('.notifications').each(function() {
		$(this).fadeIn();

		$('> div', $(this)).click(function() {
			if ($('> div', $(this).parent()).length <= 1) {
				$(this).parent().remove();
			} else {
				$(this).remove();
			}
		});
	});

	/*
	| Fields
	*/
	$('label').click(function() {
		var field = $(this).parent().find('[name=' + $(this).attr('for') + ']');
		
		if(field.length == false)
			field = $('[name=' + $(this).attr('for') + ']');

		if (field.attr('type') == 'radio' || field.attr('type') == 'checkbox') {
			if (field.is(':checked')) {
				field.prop('checked', false);
			} else {
				field.prop('checked', true);
			}
		} else if (field.attr('type') == 'file') {
			field.click();
		} else {
			field.select();
		}
	});
});
