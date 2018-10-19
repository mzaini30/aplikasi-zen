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
		<div class="row">
			<div class="col-sm-8 theia">
				<div class="theiaStickySidebar">
					<div class="progress">
						<div class="progress-bar progress-bar-<?= $warna ?>" style="width: <?= $persentase ?>%"><?= $persentase ?>%</div>
					</div>
					<table class="table table-hover">
						<tbody>
							<?php foreach($data as $d) { ?>
								<tr>
									<?php if ($d->status == 'selesai') { ?>
										<td style="width: 80%"><div class="badge"><?= ucwords($d->plan) ?></div></td>
										<td><a href="/planner/batalkan/<?= $d->id ?>" class="btn btn-danger">batalkan</a></td>
										<td><a href="/planner/edit/<?= $d->id ?>" class="btn btn-warning">edit</a></td>
										<td><a href="/planner/hapus/<?= $d->id ?>" class="btn btn-danger">hapus</a></td>
									<?php } else { ?>
										<td style="width: 80%"><?= ucwords($d->plan) ?></td>
										<td><a href="/planner/selesai/<?= $d->id ?>" class="btn btn-success">selesai</a></td>
										<td><a href="/planner/edit/<?= $d->id ?>" class="btn btn-warning">edit</a></td>
										<td><a href="/planner/hapus/<?= $d->id ?>" class="btn btn-danger">hapus</a></td>
									<?php } ?>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-sm-4 theia">
				<div class="theiaStickySidebar">
					<form action="/planner/buat" method="post">
						<div class="form-group"><input type="text" class="form-control" placeholder="Buat plan baru" name="plan"></div>
					</form>
					<?php $this->load->view('elemen/sidebar'); ?>
				</div>
			</div>
		</div>
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