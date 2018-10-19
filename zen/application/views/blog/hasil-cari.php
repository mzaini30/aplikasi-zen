<div class="panel panel-default">
	<div class="panel-body">
		<?php if($jumlah > 0){ ?>
			Hasil pencarian untuk: <?= $cari ?>
		<?php } else { ?>
			Tidak ditemukan kata kunci: <?= $cari ?>
		<?php } ?>
	</div>
</div>
<?php foreach($data as $d){ ?>
	<div class="panel panel-default">
		<div class="panel-heading"><?= $d->judul ?></div>
		<div class="panel-body isi-postingan">
			<?= $this->markdown->parse($d->isi) ?>
			<hr>
			<a href="/blog/full/<?= $d->id ?>" class="btn btn-default btn-sm">lihat full</a>		
			&nbsp;
			<a href="/blog/edit/<?= $d->id ?>" class="btn btn-warning btn-sm">edit</a>		
			&nbsp;
			<a href="/blog/hapus/<?= $d->id ?>" class="btn btn-danger btn-sm">hapus</a>		
		</div>
	</div>
<?php } ?>