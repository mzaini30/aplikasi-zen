<!DOCTYPE html>
<html>
<head>
	<title>Blog</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/bin/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/bin/style.css">
</head>
<body>
	<div class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="/blog/tampilkan">Blog</a>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 theia">
				<div class="theiaStickySidebar">
					<?php $this->load->view($isi); ?>
				</div>
			</div>
			<div class="col-sm-4 theia">
				<div class="theiaStickySidebar">
					<form action="/blog/cari">
						<div class="form-group"><input type="text" class="form-control" placeholder="Apa yang kamu cari?" name="cari"></div>
					</form>
					<div class="panel panel-default">
						<div class="panel-heading">Menu Blog</div>
						<div class="list-group">
							<a class="list-group-item" href="/blog/tambah">Tambah Baru</a>
						</div>
					</div>
					<?php $this->load->view('elemen/sidebar'); ?>
					<form action="/blog/tambahkan_kategori" method="post">
						<div class="form-group"><input type="text" class="form-control" name="kategori" placeholder="Tambahkan kategori"></div>
					</form>
					<div class="panel panel-default">
						<div class="panel-heading">Kategori</div>
						<div class="list-group">
							<?php $kategori = $this->db->order_by('kategori')->get('kategori_blog')->result(); ?>
							<?php foreach($kategori as $d) { ?>
								<a href="/blog/kategori/<?= $d->id ?>" class="list-group-item"><?= ucwords($d->kategori) ?></a>
							<?php } ?>
						</div>
					</div>
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