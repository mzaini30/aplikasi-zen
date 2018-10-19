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
		<?php $this->load->view($isi); ?>
		<hr>
		<center>
			<p>&copy; <a href="http://muhammadzaini.com">Zen</a> <?= date('Y') ?></p>
		</center>
	</div>

	<script type="text/javascript" src="/bin/jquery.min.js"></script>
	<script type="text/javascript" src="/bin/ResizeSensor.min.js"></script>
	<script type="text/javascript" src="/bin/theia-sticky-sidebar.min.js"></script>
	<script type="text/javascript" src="/bin/marked.min.js"></script>

	<script type="text/javascript">
		$('.theia').theiaStickySidebar({
			additionalMarginTop: 20,
			additionalMarginBottom: 20
		})
		mulai_markdown = function(){
			$('.output-markdown').html(marked($('.input-markdown').val()))
		}
		mulai_markdown()
		$('.input-markdown').on('keyup', function(){
			mulai_markdown()
		})
	</script>
</body>
</html>