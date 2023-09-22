<html>
<head>
<title>Bootcamp01</title>
<link href="<?=base_url()?>modules/bootcamp01/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?=base_url()?>modules/bootcamp01/css/jquery-ui.css" />
<link rel="stylesheet" href="<?=base_url()?>modules/bootcamp01/css/ui.jqgrid.css" />
</head>
<body>

<?php
echo "username : ".$user;
?>
<a href="<?=base_url()?>index.php/bootcamp01/?id=<?=$user?>" style="position:relative;float:right;margin-right:20px;">jqgrid</a>

<form name="formcheck" id="formcheck">
<input type="text" name="nik" id="nik">&nbsp;<input type="button" name="btncheck" id="btncheck" value="Check">
</form>
<div id="tampilan_data"></div>

<script type="text/javascript">
	var USER_ID='<?=$user?>';
	var BASE_URL='<?=base_url()?>';
	var SITE_URL='<?=site_url()?>';
</script>
<script src='<?=base_url()?>modules/bootcamp01/js/jquery-2.0.3.min.js'></script>
<script src="<?=base_url()?>modules/bootcamp01/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>modules/bootcamp01/js/jquery-ui.js"></script>
<script src="<?=base_url()?>modules/bootcamp01/js/Ajaxform.js"></script>
</body>
</body>
