$(document).ready(() => {
	const $container = $('.masonry-container');
	$container.imagesLoaded( () => {
		$container.masonry({
			columnWidth: '.item',
			itemSelector: '.item'
		});
	});
	const username = $("#register-username");
	const register_username_result = $("#username-result");
	const register_username_help = $("#register-username-help");
	const register_username_field = $("#register-username-field");
	username.change(() => {
		if( username.val() === "" )
		{
			register_username_result.removeClass("glyphicon-ok").addClass("glyphicon-remove");
			register_username_field.removeClass("has-success").addClass("has-error");
		}
		else {
			if( /^\w+$/.test(username.val()) === false) {
				register_username_result.removeClass("glyphicon-ok").addClass("glyphicon-remove");
				register_username_field.removeClass("has-success").addClass("has-error");
			}
			else {
				$.ajax({
					url: "action_check_username.php",
					data: "username=" + username.val(),
					type: "POST",
					success: function(data) {
						if(data == "true") {
							register_username_result.removeClass("glyphicon-remove").addClass("glyphicon-ok");
							register_username_field.removeClass("has-error").addClass("has-success");
							register_username_help.removeClass("with-error").html("")
						}
						else {
							register_username_result.removeClass("glyphicon-ok").addClass("glyphicon-remove");
							register_username_field.removeClass("has-success").addClass("has-error");
							register_username_help.addClass("with-error").html("This username has already taken!");
						}
					},
				});
			}
		}
	});
});