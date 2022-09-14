<!DOCTYPE html>
<html>
<head>
	<title>ajax</title>
</head>
<body>
	<form id="OurForm">
		<input type="text" name="name" placeholder="name">
		<input type="text" name="age" placeholder="age">
		<input type="submit" name="go" value="Submit">
		<input type="reset" id="choka" style="display: none;">

		
	</form>
	<div id="result"></div>
</body>
<script type="text/javascript" src="../vendor/jquery/jquery.min.js"></script>

<script type="text/javascript">
	$('#OurForm').on('submit', function(event){
		event.preventDefault();

		var formdata=$('#OurForm').serialize();

		$.ajax({ 
			url: "kaya_db.php",
			method: "POST",

			data : formdata,
			success : function(result){
				$('#result').html(result);
				$('#choka').click();
			}
		})
	})
</script>
</html>