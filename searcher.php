<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>hims</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />

 <link rel="stylesheet" href="4/w3.css">

<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script> 
    <link href="css/.css" rel="stylesheet">
    <link href="css/.css" rel="stylesheet">
     <link href="css/moodal.css" rel="stylesheet">
      <link href="css/.css" rel="stylesheet">
	<link href="date/htmlDatepicker.css" rel="stylesheet" />
	<script language="JavaScript" src="date/htmlDatepicker.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/boxOver.js"></script>

  <script src="js/stopusers.js"></script>
   <script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
  <link rel="stylesheet" href="vendor/boostrap/css/boostrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/moodal.css">

  <script>
function showResult(str) {
  if (str.length < 1) {
    $('#livesearch').empty();
  }
  else{
    $.ajax({
      url: "livesearch.php",
      method: "GET",
      data: {q:str}
      success: function(result) {
        $('#livesearch').html(result);
        alert("We here");
      }
    })
  }
}
</script>


 <script type="text/javascript">
  $('.w3-block').click(function() {
    var text = $(this).text();

    $('.cs').hide();
    $('#'+text).show();
    //changing color of button
    $('.w3-block').removeClass('w3-red').removeClass('w3-light-grey');
    $(this).removeClass('w3-light-grey').addClass('w3-red');
    //showing the div
    
  });
</script> 

<body>
</body>