<form action="/murajaah/edit_upload/<?= $data[0]->id ?>" method="post">
	<div class="form-group"><input type="date" name="tanggal" class="form-control" value="<?= $data[0]->tanggal ?>"></div>
	<div class="form-group"><input type="text" name="jumlah-halaman" class="form-control" placeholder="Masukkan jumlah halaman" value="<?= $data[0]->jumlah_halaman ?>"></div>
	<div class="form-group"><input type="submit" value="Ubah" class="btn btn-success"></div>
</form>