$(window).load(function(){
	$("#validationIn").hide();
	$("#validationUp").hide();
	$("myCarousel").carousel();
});
function myFunction(){
	$('#myModalUp').modal('hide');
	$('#myModalUp').on('hidden.bs.modal', function () {
	  // Load up a new modal...
	  $('#myModalIn').modal('show');
	});

}

 $(document).on('submit', '#loginAdmin-form', function(e){
 	e.preventDefault();
 	$.ajax({
 		method: 'POST',
 		url: window.location.origin + '/CIT-UEventCalendar/admins/ajax_adminlogin',
 		data: 'username=' + $('#loginAdmin-form input[name="username"]').val() + '&password=' + $('#loginAdmin-form input[name="password"]').val(),
 		success: function(data) {
 			switch ( data )
 			{
 				case '0':
 					$('#validationIn').show();
 					$('#validationIn .alert').removeClass('alert-success');
 					$('#validationIn .alert').addClass('alert-danger');
 					$('#validationIn .alert').text( 'Sorry your account was not found.' );
 					break;
 				case '1':
 					$('#validationIn').show();
 					$('#session-menu li:nth-child(1)').addClass('hidden');
 					$('#session-menu li:nth-child(2)').addClass('hidden');
 					$('#session-menu li:nth-child(3)').removeClass('hidden');
 					$('#session-menu li:nth-child(4)').removeClass('hidden');
 					$('#session-username').text( $('#login-form input[name="username"]').val() );
 					$('#validationIn .alert').removeClass('alert-danger');
 					$('#validationIn .alert').addClass('alert-success');
 					$('#validationIn .alert').text( 'Account verified. Please wait a moment.' );
 					$('#loginBtn').addClass('disabled');
 					setTimeout(function() {
					  window.location.href = "/CIT-UEventCalendar/users";
					}, 1000);
					$( '#loginAdmin-form' ).each(function(){
					    this.reset();
					});
 					break;
 				case '2':
 					$('#validationIn').show();
 					$('#validationIn .alert').removeClass('alert-success');
 					$('#validationIn .alert').addClass('alert-danger');
 					$('#validationIn .alert').text( 'The password you entered is invalid!' );
 					break;
 				case '3':
 					$('#validationIn').show();
 					$('#validationIn .alert').removeClass('alert-success');
 					$('#validationIn .alert').addClass('alert-danger');
 					$('#validationIn .alert').text( 'Sorry your account has been blocked!' );
 					break;
 				case '4':
 					$('#validationIn').show();
 					$('#session-menu li:nth-child(1)').addClass('hidden');
 					$('#session-menu li:nth-child(2)').addClass('hidden');
 					$('#session-menu li:nth-child(3)').removeClass('hidden');
 					$('#session-menu li:nth-child(4)').removeClass('hidden');
 					$('#session-username').text( $('#login-form input[name="username"]').val() );
 					$('#validationIn .alert').removeClass('alert-danger');
 					$('#validationIn .alert').addClass('alert-success');
 					$('#validationIn .alert').text( 'Account verified. Please wait a moment.' );
 					$('#loginBtn').addClass('disabled');
 					setTimeout(function() {
					  window.location.href = "/CIT-UEventCalendar/admins";
					}, 1000);
					$( '#loginAdmin-form' ).each(function(){
					    this.reset();
					});
 					break;
 			}
 			
 		}
 	});
 });
function logoutAdmin()
{
	$.ajax({
 		method: 'POST',
 		url: window.location.origin + '/CIT-UEventCalendar/admins/ajax_logout',
 		success: function(data) {
 			$('#session-menu li:nth-child(1)').removeClass('hidden');
 			$('#session-menu li:nth-child(2)').removeClass('hidden');
 			$('#session-menu li:nth-child(3)').addClass('hidden');
 			$('#session-menu li:nth-child(4)').addClass('hidden');
 			setTimeout(function() {
			  window.location.href = "/CIT-UEventCalendar/adminLogin";
			}, 1000);
 		}
 	});
}

/*$(document).on('submit', '#signup-user', function(e){
 	e.preventDefault();
 	//alert($('#signup-user input[name="id_no"]').val() + $('#signup-user input[name="username"]').val()+ $('#signup-user input[name="fname"]').val()+ $('#signup-user input[name="lname"]').val()+ $('#signup-user input[name="course"]').val() + $('#signup-user input[name="year"]').val()+ $('#signup-user input[name="email"]').val() + $('#signup-user input[name="password"]').val());
 	$.ajax({
 		method: 'POST',
 		url: window.location.origin + '/CIT-UEventCalendar/users/ajax_signup',
 		data: 'id_no=' + $('#signup-user input[name="id_no"]').val() +'&username=' + $('#signup-user input[name="username"]').val() +'&fname=' + $('#signup-user input[name="fname"]').val() +'&lname=' + $('#signup-user input[name="lname"]').val() +'&course=' + $('#signup-user input[name="course"]').val() +'&year=' + $('#signup-user input[name="year"]').val() +'&email=' + $('#signup-user input[name="email"]').val() +'&password=' + $('#signup-user input[name="password"]').val(),
 		success: function(data) {

 			switch (data)
 			{
 				case '0':
 					$('.message').fadeIn(200);
 					$('.message').html('Error Saving.');
 					$('.message').fadeOut(3000);
 					break;
 				case '1':
 					$('.message').fadeIn(200);
 					$('.message').html('Successfully Saved!');
 					$('.message').fadeOut(3000);
 					break;
 			}
 			$( '#signup-user' ).each(function(){
			    this.reset();
			});
 		}
 	});
 });*/

$(document).on('submit', '#signup-admin', function(e){
 	e.preventDefault();
 	$.ajax({
 		method: 'POST',
 		url: window.location.origin + '/CIT-UEventCalendar/admins/ajax_signup',
 		data: 'admin_id=' + $('#signup-admin input[name="admin_id"]').val() +'&username=' + $('#signup-admin input[name="username"]').val() +'&email=' + $('#signup-admin input[name="email"]').val() +'&password=' + $('#signup-admin input[name="password"]').val(),
 		success: function(data) {

 			switch (data)
 			{
 				case '0':
 					$('.message').fadeIn(200);
 					$('.message').html('Error Saving.');
 					$('.message').fadeOut(5000);
 					break;
 				case '1':
 					$('.message').fadeIn(200);
 					$('.message').html('Successfully Saved!');
 					$('.message').fadeOut(5000);
 					$( '#signup-admin' ).each(function(){
					    this.reset();
					});
 					break;
 				case '2':
 					$('.message').fadeIn(200);
 					$('.message').html('Username must contain at least 6 characters!');
 					$('.message').fadeOut(5000);
 					break;
 				case '3':
 					$('.message').fadeIn(200);
 					$('.message').html('Invalid email!');
 					$('.message').fadeOut(5000);
 					break;
 				case '4':
 					$('.message').fadeIn(200);
 					$('.message').html('Password combination invalid!');
 					$('.message').fadeOut(5000);
 					break;
 				case '5':
 					$('.message').fadeIn(200);
 					$('.message').html('Username already exists.');
 					$('.message').fadeOut(5000);
 					break;
 			}
 			
 		}
 	});
 });

$(document).on('submit', '#add-event', function(e){
 	e.preventDefault();
 	$.ajax({
 		method: 'POST',
 		url: window.location.origin + '/CIT-UEventCalendar/events/ajax_addevent',
 		data: 'event_id=' + $('#add-event input[name="event_id"]').val() +'&event_title=' + $('#add-event input[name="event_title"]').val() +'&event_description=' + $('#add-event textarea[name="event_description"]').val() +'&event_type=' + $('#add-event select[name="event_type"]').val() +'&event_start_date=' + $('#add-event input[name="event_start_date"]').val() +'&event_end_date=' + $('#add-event input[name="event_end_date"]').val(),
 		success: function(data) {

 			switch (data)
 			{
 				case '0':
 					$('.message').fadeIn(200);
 					$('.message').html('Error Saving.');
 					$('.message').fadeOut(3000);
 					break;
 				case '1':
 					$('.message').fadeIn(200);
 					$('.message').html('Successfully Saved!');
 					$('.message').fadeOut(3000);
 					$( '#add-event' ).each(function(){
					    this.reset();
					});
 					break;
 				case '2':
 					$('.message').fadeIn(200);
 					$('.message').html('Event title/description too short!');
 					$('.message').fadeOut(5000);
 					
 					break;
 				case '3':
 					$('.message').fadeIn(200);
 					$('.message').html('Invalid input dates.');
 					$('.message').fadeOut(5000);
 					
 					break;
 				case '4':
 					$('.message').fadeIn(200);
 					$('.message').html('Event title already exists.');
 					$('.message').fadeOut(5000);
 					
 					break;
 			}
 			
 		}
 	});
 });