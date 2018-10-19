<!DOCTYPE html>
<html>
<head>
	<title>Planner</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/bin/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/bin/style.css">
</head>
<body>
	<div class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="/planner/beranda">Planner</a>
			</div>
		</div>
	</div>
	<div class="container">
		<form action="/planner/edit_upload/<?= $data[0]->id ?>" method='post'>
			<div class="form-group"><input type="text" name="plan" class="form-control" value="<?= $data[0]->plan ?>" autofocus></div>
		</form>
		<hr>
		<center>
			<p>&copy; <a href="http://muhammadzaini.com">Zen</a> <?= date('Y') ?></p>
		</center>
	</div>

	<script type="text/javascript" src="/bin/jquery.min.js"></script>
	<script type="text/javascript" src="/bin/ResizeSensor.min.js"></script>
	<script type="text/javascript" src="/bin/theia-sticky-sidebar.min.js"></script>

	<script type="text/javascript">
		$('.theia').theiaStickySidebar({
			additionalMarginTop: 20,
			additionalMarginBottom: 20
		})
	</script>
</body>
</html>