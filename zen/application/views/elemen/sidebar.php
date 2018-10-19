<?php
$belum_selesai = count($this->db->get_where('planner', array(
	'status' => 'belum selesai'
))->result());

$murajaah = $this->db->order_by('tanggal', 'desc')->limit(1)->get('murajaah')->result();
$rata_rata_murajaah = $this->db->select_avg('jumlah_halaman')->get('murajaah')->result();
$selisih_murajaah = 0;
if ($rata_rata_murajaah[0]->jumlah_halaman > $murajaah[0]->jumlah_halaman){
	$selisih_murajaah = round($rata_rata_murajaah[0]->jumlah_halaman);
}

$membaca_buku = $this->db->order_by('tanggal', 'desc')->limit(1)->get('membaca_buku')->result();
$rata_rata_membaca_buku = $this->db->select_avg('jumlah_halaman')->get('membaca_buku')->result();
$selisih_membaca_buku = 0;
if ($rata_rata_membaca_buku[0]->jumlah_halaman > $membaca_buku[0]->jumlah_halaman){
	$selisih_membaca_buku = round($rata_rata_membaca_buku[0]->jumlah_halaman);
}
?>

<div class="panel panel-default">
	<div class="panel-heading">My Apps</div>
	<div class="list-group">
		<a href="/blog" class="list-group-item">Blog</a>
		<a href="/murajaah" class="list-group-item">Murajaah <?php if ($selisih_murajaah != 0) { ?><span class="badge"><?= $selisih_murajaah ?></span><?php } ?></a>
		<a href="/membaca_buku" class="list-group-item">Membaca <?php if ($selisih_membaca_buku != 0) { ?><span class="badge"><?= $selisih_membaca_buku ?></span><?php } ?></a>
		<a href="/planner" class="list-group-item">Planner <?php if ($belum_selesai != 0) { ?><span class="badge"><?= $belum_selesai ?></span><?php } ?></a>
	</div>
</div>