<!DOCTYPE html>
<html>
<head>
	<title>Membaca Buku</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/bin/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/bin/style.css">
</head>
<body>
	<div class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="/membaca_buku/beranda">Membaca Buku</a>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6 theia">
				<div class="theiaStickySidebar">
					<div id="grafik"></div>
				</div>
			</div>
			<div class="col-sm-4 theia">
				<div class="theiaStickySidebar">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>tanggal</th>
								<th>banyaknya</th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($data_desc as $d){ ?>
								<tr>
									<td><?= $d->tanggal ?></td>
									<td><?= $d->jumlah_halaman ?></td>
									<td><a href="/membaca_buku/edit/<?= $d->id ?>" class="btn btn-warning btn-sm">edit</a></td>
									<td><a href="/membaca_buku/hapus/<?= $d->id ?>" class="btn btn-danger btn-sm">hapus</a></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
					<center>
						<?= $this->pagination->create_links() ?>
					</center>
				</div>
			</div>
			<div class="col-sm-2 theia">
				<div class="theiaStickySidebar">
					<form action="/membaca_buku/tambah_upload" method="post">
						<p><strong>Tambahkan Baru</strong></p>
						<div class="form-group"><input type="date" name="tanggal" class="form-control"></div>
						<div class="form-group"><input type="text" name="jumlah-halaman" class="form-control" placeholder="Masukkan jumlah halaman"></div>
						<hr>
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

	<script type="text/javascript" src="/bin/highcharts/code/highcharts.js"></script>

	<script type="text/javascript">
		$('.theia').theiaStickySidebar({
			additionalMarginTop: 20,
			additionalMarginBottom: 20
		})
	</script>

	<script type="text/javascript">

		Highcharts.chart('grafik', {

			chart: {
				height: 300
			},

		    title: {
		        text: 'Grafik Membaca Buku'
		    },

		    subtitle: {
		        text: ''
		    },

		    xAxis: {
		        // categories: ['12', '13']
		        categories: [
		        	<?php foreach(array_reverse($data_desc) as $d) { ?>
		        		'<?= $d->tanggal ?>',
		        	<?php } ?>
		        ]
		    },

		    yAxis: {
		        title: {
		            text: 'Jumlah Halaman'
		        }
		    },

		    legend: {
		        layout: 'vertical',
		        align: 'right',
		        verticalAlign: 'middle'
		    },

		    plotOptions: {
		        series: {
		            label: {
		                connectorAllowed: false
		            }
		            // pointStart: 1
		        }
		    },

		    series: [{
		        name: 'Membaca Buku',
		        // data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
		        data: [
			    	<?php foreach(array_reverse($data_desc) as $d) { ?>
			    		<?= $d->jumlah_halaman ?>,
			    	<?php } ?>
		        ]
		    }, {
		    	name: 'Rata-rata',
		    	data: [
		    		<?php foreach(array_reverse($data_desc) as $d) { ?>
			    		<?= $rata_rata[0]->jumlah_halaman ?>,
			    	<?php } ?>
		    	]
		    }, {
		    	name: 'Tertinggi',
		    	data: [
		    		<?php foreach(array_reverse($data_desc) as $d) { ?>
			    		<?= $tertinggi[0]->jumlah_halaman ?>,
			    	<?php } ?>
		    	]
		    }],

		    responsive: {
		        rules: [{
		            condition: {
		                maxWidth: 500
		            },
		            chartOptions: {
		                legend: {
		                    layout: 'horizontal',
		                    align: 'center',
		                    verticalAlign: 'bottom'
		                }
		            }
		        }]
		    }

		});

	</script>
</body>
</html>