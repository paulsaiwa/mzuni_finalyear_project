<!DOCTYPE html>
<html>
<head>
	<title>saiwa</title>

	<script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
	<link rel="stylesheet" href="vendor/boostrap/css/boostrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/moodal.css">
</head>
<body>
	<div class="w3-row">
		<div class="w3-col m1">&nbsp;</div>
		<div class="w3-col m2">
			Menu
			<button class="w3-btn w3-light-grey w3-block">Home</button>
			<button class="w3-btn w3-light-grey w3-block">News</button>
			<button class="w3-btn w3-light-grey w3-block">About</button>
		</div>
		<div class="w3-col m8 w3-border-left">

			<div class="w3-padding cs" id="Home">
				<h3>Tab content 1</h3>
			</div>

			<div class="w3-padding cs" id="News" style="display: none;">
				<h3>Tab content 2</h3>jdlkdsld
			</div>

			<div class="w3-padding cs" id="About" style="display: none;">
				<h3>Tab content 3</h3>
			</div>

		</div>
</body>
<script type="text/javascript">
	$('.w3-block').click(function() {
		var text = $(this).text();
		//changing color of button
		$('.w3-block').removeClass('w3-red').removeClass('w3-light-grey');
		$(this).addClass('w3-red');
		//showing the div
		$('.cs').hide();
		$('#'+text).fadeIn();
	})
</script>
</html>