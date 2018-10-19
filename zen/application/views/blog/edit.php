<form action="/blog/edit_upload/<?= $data[0]->id ?>" method="post">
	<div class="form-group"><input type="text" class="form-control" placeholder="Masukkan judul" name="judul" value="<?= $data[0]->judul ?>"></div>
	<div class="row">
		<div class="col-sm-6 theia">
			<div class="theiaStickySidebar">
				<div class="form-group">
					<textarea name="isi" id="" rows="10" class="input-markdown form-control"><?= $data[0]->isi ?></textarea>
				</div>
				<div class="form-group">
					<select name="kategori-blog-id" id="" class="form-control">
						<?php foreach($kategori as $k) { ?>
							<option value="<?= $k->id ?>" <?php if ($data[0]->kategori_blog_id == $k->id) { ?> selected <?php } ?> ><?= $k->kategori ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<input type="submit" value="Update" class="btn btn-success">
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