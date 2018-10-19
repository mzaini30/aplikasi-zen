<div class="panel panel-default">
	<div class="panel-heading">
		<?= $data[0]->judul ?>
		&nbsp;
		<div class="badge"><?= $data[0]->kategori ?></div>
	</div>
	<div class="panel-body isi-postingan">
		<?= $this->markdown->parse($data[0]->isi) ?>
		<hr>
		<p><small>Dibuat: <?= $data[0]->created_at ?></small></p>
		<p><small>Diupdate: <?= $data[0]->updated_at ?></small></p>
		<hr>
		<a href="/blog/edit/<?= $data[0]->id ?>" class="btn btn-warning btn-sm">edit</a>		
		&nbsp;
		<a href="/blog/hapus/<?= $data[0]->id ?>" class="btn btn-danger btn-sm">hapus</a>		
	</div>
</div>