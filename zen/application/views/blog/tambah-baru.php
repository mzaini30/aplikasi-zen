<form action="/blog/tambah_upload" method="post">
	<div class="form-group"><input type="text" class="form-control" placeholder="Masukkan judul" name="judul"></div>
	<div class="row">
		<div class="col-sm-6 theia">
			<div class="theiaStickySidebar">
				<div class="form-group">
					<textarea name="isi" id="" rows="10" class="input-markdown form-control" placeholder="Isi tulisan di sini. Gunakan Markdown"></textarea>
				</div>
				<div class="form-group">
					<select name="kategori-blog-id" id="" class="form-control">
						<?php foreach($kategori as $k) { ?>
							<option value="<?= $k->id ?>"><?= $k->kategori ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<input type="submit" value="Posting" class="btn btn-success">
				</div>
			</div>
		</div>
		<div class="col-sm-6 theia">
			<div class="theiaStickySidebar">
				<div class="output-markdown isi-postingan"></div>
			</div>
		</div>
	</div>
</form>