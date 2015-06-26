$(document).ready(function() {

	$("a.back-to-top").click(function() {
		$("html, body").animate({
			scrollTop: $($(this).attr("href")).offset().top + "px"
		}, {
			duration: 400,
			easing: "swing"
		});
		return false;
	});


	$('#login-trigger').click(function(){
		$(this).next('#login-content').slideToggle();
		$(this).toggleClass('active');

		if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
			else $(this).find('span').html('&#x25BC;')
		})

	$('#signup-trigger').click(function(){
		$(this).next('#signup-content').slideToggle();
		$(this).toggleClass('active');

		if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
			else $(this).find('span').html('&#x25BC;')
		})

	$('#post-trigger').click(function(){
		$(this).next('#postform-content').slideToggle();
		$(this).toggleClass('active');

		if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
			else $(this).find('span').html('&#x25BC;')
		})

	$('#logout').click(function(){
		console.log("logout clicked");
		window.location='logout.php';
		})



});
