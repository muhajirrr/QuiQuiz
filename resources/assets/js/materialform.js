$('.material-input').each(function () {
	check($(this));
});

$('.material-input').on('focusout', function () {
	check($(this));
});

function check($input) {
	if ($input.val().length > 0) {
		$input.addClass('has-value');
	} else {
		$input.removeClass('has-value');
	}
}