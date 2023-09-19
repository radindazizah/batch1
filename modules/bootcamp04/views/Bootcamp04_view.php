<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Bootcamp04</title>
    <link rel="stylesheet" href="<?= base_url() ?>modules/bootcamp04/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>modules/bootcamp04/css/jquery-ui.css">
    <link rel="stylesheet" href="<?= base_url() ?>modules/bootcamp04/css/ui.jqgrid.css">
    <!-- Add any additional CSS here -->
</head>
<body>
    <div id="content">
        <?php echo "Username: " . $user; ?>
        <table id="userKaryawan"></table>
        <div id="userKaryawanPager"></div>
    </div>
	<!--<div class="button-wrapper">
		<button type="button" class="btn btn-primary" id="show-add">Add</button>
		<button type="button" class="btn btn-warning">Edit</button>
		<button type="button" class="btn btn-danger">Delete</button>
    </div>-->
    <script>
        var USER_ID = '<?= $user ?>';
    </script>

    <!-- Load JavaScript from external files -->
    <script src="https://code.jquery.com/jquery-2.0.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="<?= base_url() ?>modules/bootcamp04/js/jqGrid/jquery.jqGrid.js"></script>
    <script src="<?= base_url() ?>modules/bootcamp04/js/jqGrid/i18n/grid.locale-en.js"></script>
    <script src="<?= base_url() ?>modules/bootcamp04/js/Bootcamp04.js?v=<?= time(); ?>"></script>
	
    <!-- Add any additional JavaScript files here -->
</body>
</html>
