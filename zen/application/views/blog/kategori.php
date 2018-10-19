<div class="form-group">
	<a href="/blog/hapus_kategori/<?= $this->uri->segment(3) ?>" class="btn btn-danger">hapus kategori</a>
</div>
<?php foreach($data as $d){ ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<?= $d->judul ?>
		</div>
		<div class="panel-body isi-postingan">
			<?= $this->markdown->parse($d->isi) ?>
			<hr>
			<p><small>Dibuat: <?= $d->created_at ?></small></p>
			<p><small>Diupdate: <?= $d->updated_at ?></small></p>
			<hr>
			<a href="/blog/full/<?= $d->id ?>" class="btn btn-default btn-sm">lihat full</a>		
			&nbsp;
			<a href="/blog/edit/<?= $d->id ?>" class="btn btn-warning btn-sm">edit</a>		
			&nbsp;
			<a href="/blog/hapus/<?= $d->id ?>" class="btn btn-danger btn-sm">hapus</a>		
		</div>
	</div>
<?php } ?>