<!DOCTYPE html>
<html>
<head>
	<title>Load sample</title>
	<script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
</head>
<body>

	<button onclick="refreshFunction();">Click here</button>

	<div id="result">content will be here!</div>

</body>
<script type="text/javascript">

	function refreshOnline()
    {
        x = 0.5;  // 5 Seconds
    
        // Do your thing here
        $("#result").load("get_data.php");
    
        setTimeout(refreshOnline, x*1000);
    }
    
    refreshOnline();
</script>
</html>