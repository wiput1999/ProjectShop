$(document).ready(() => {
	const $container = $('.masonry-container');
	$container.imagesLoaded( () => {
		$container.masonry({
			columnWidth: '.item',
			itemSelector: '.item'
		});
	});
	// Register Username Availability Check
	const username = $("#register-username");
	const register_username_result = $("#username-result");
	const register_username_help = $("#register-username-help");
	const register_username_field = $("#register-username-field");
	username.change(() => {
		if( username.val() === "" ) {
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
							register_username_help.removeClass("with-error").html("");
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
	const m_pattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	const email = $("#register-email");
	const register_email_result = $("#email-result");
	const register_email_help = $("#register-email-help");
	const register_email_field = $("#register-email-field");
	email.change(() => {
		if ( email.val() == "" )
		{
			register_email_result.removeClass("glyphicon-ok").addClass("glyphicon-remove");
			register_email_field.removeClass("has-success").addClass("has-error");
			register_email_help.addClass("with-error").html("This field can't blank!");
		}
		else {
			if( m_pattern.test(email.val()) == false ) {
				register_email_result.removeClass("glyphicon-ok").addClass("glyphicon-remove");
				register_email_field.removeClass("has-success").addClass("has-error");
				register_email_help.addClass("with-error").html("This email is invalid!");
			}
			else {
				$.ajax({
					url: "action_check_email.php",
					data: "email=" + email.val(),
					type: "POST",
					success: function(data) {
						console.log(data);
						if(data == "true") {
							register_email_result.removeClass("glyphicon-remove").addClass("glyphicon-ok");
							register_email_field.removeClass("has-error").addClass("has-success");
							register_email_help.removeClass("with-error").html("");
						}
						else {
							register_email_result.removeClass("glyphicon-ok").addClass("glyphicon-remove");
							register_email_field.removeClass("has-success").addClass("has-error");
							register_email_help.addClass("with-error").html("This email has already taken!");	
						}
					}
				});
			}
		}
	});
});