<!DOCTYPE html>
<html>
<head>
	<title>Conntent management system</title>
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../w3css/w3.css">
	<link rel="stylesheet" type="text/css" href="../w3css/w3-theme-red.css">
	<link rel="stylesheet" type="text/css" href="../font-awesome/font-awesome/css/font-awesome.min.css">
	<script type="text/javascript" src="../vendor/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.bundle.js"></script>
</head>
<body>

	<div class="w3-row">
		<div class="w3-col m3 w3-padding-large">
			<div class="card">
				<div class="card-header">Controls</div>
				<div class="card-body">
					<div class="w3-padding w3-border-bottom">
						<i class="fa fa-upload-cloud"></i> Upload files
					</div>
				</div>
			</div>
		</div>
		<div class="w3-col m6">
			<h5>List files and folders</h5>
			<div class="w3-row w3-padding w3-border-bottom">
				<div class="w3-half">
					index.php 

				</div>
				<div class="w3-half">
					<i class="fa fa-pencil w3-hover-text-blue pointer w3-padding" title="Edit"></i> <i class="fa fa-trash w3-hover-text-blue pointer w3-padding" title="Delete"></i> <i class="fa fa-remove w3-hover-text-blue pointer w3-padding" title="Cut"></i> <i class="fa fa-copy w3-hover-text-blue pointer w3-padding" title="Cut"></i>
				</div>
			</div>
			<?php
				$dir = "../";

				// Open a known directory, and proceed to read its contents
				if (is_dir($dir)) {
				    if ($dh = opendir($dir)) {
				        while (($file = readdir($dh)) !== false) {
				            if (filetype($dir . $file) == "dir") {
				            	echo "<div class='w3-padding w3-border-bottom pointer w3-hover-light-grey'><i class='fa fa-folder-o'></i> &nbsp;".$file."</div>";
				            }
				        }
				        closedir($dh);
				    }
				}
				if (is_dir($dir)) {
				    if ($dh = opendir($dir)) {
				        while (($file = readdir($dh)) !== false) {
				            if (filetype($dir . $file) == "file") {
				            	echo "<div class='w3-padding w3-border-bottom pointer w3-hover-light-grey tq' data='$file'><i class='fa fa-file-o'></i> &nbsp;".$file."</div>";
				            }
				        }
				        closedir($dh);
				    }
				}
			?> 
		</div>
	</div>

	<div class="w3-modal" id="editor">
		<div class="w3-modal-content" style="width: 800px;">
			<div class="w3-padding w3-light-grey">Edit files</div>
			<div class="w3-padding">
				<textarea id="cont" class="form-control" rows="10"></textarea>
				<input type="hidden" id="fname">
				<div id="min"></div>

				<div class="clearfix">
					<button class="btn btn-sm btn-secondary float-left" onclick="save();">Save</button> <div id="saveResult" class="float-left"></div>
					<button class="btn btn-sm btn-danger float-right" onclick="$('#editor').fadeOut();">Close</button>
				</div>
			</div>
		</div>
	</div>
				
</body>
<script type="text/javascript">
	$('.tq').click(function(event) {
		event.preventDefault();
		var text = $(this).attr('data');
		$.ajax({
			url: "opener.php",
			method: "POST",
			data: {file:text},
			success: function(result) {
				$('#fname').val(text);
				$('#editor').show();
				$('#cont').val(result);
			}
		})
	});

	function hid() {
		$('#saveResult').html('');
	}

	function save() {
		var text = $('#cont').val();
		var fname = $('#fname').val();
		$.ajax({
			url: "opener.php",
			method: "POST",
			data: {text:text, fname:fname},
			success: function(result) {
				$('#saveResult').html(result);
				setTimeout(hid, 2000);
			}
		})
	}
</script>
</html>