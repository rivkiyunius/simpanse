<div class="panel-flat">
	<div class="text-right">
		<div>
			<a href="<?= base_url() ?>pasien/tambah" class="btn btn-info">
				+ Tambah
			</a>
		</div>

	</div>
</div>
<div class="panel panel-flat">


	<div class="panel-body">

		<div class="table-responsive">
			<table class="table">
				<thead>
				<tr class="success">
					<th>No</th>
					<th>Kode Pasien</th>
					<th>Nama</th>
					<th>Jenis kelamin</th>
					<th>Umur</th>
					<th>Berat Badan</th>
					<th>Riwayat Diabetes</th>
					<th>Action</th>
				</tr>
				</thead>
				<tbody>
				<?php
				$no = 1;
				foreach ($pasien as $p) {
					?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $p->kode_pasien ?></td>
						<td><?= $p->nama ?></td>
						<td><?= $p->jk ?></td>
						<td><?= $p->umur ?></td>
						<td><?= $p->berat_badan ?></td>
						<td><?= $p->riwayat_diabetes ?></td>
						<td>
							<a href="<?=base_url()?>pasien/edit/<?=$p->id?>" type="button" class="btn btn-info btn-icon btn-rounded">
								<i class="icon-pen"></i>
							</a>
							<a href="#" type="button" class="btn btn-danger btn-icon btn-rounded">
								<i class="icon-trash"></i>
							</a>
						</td>
					</tr>
					<?php
				}
				?>
				</tbody>
			</table>
		</div>
	</div>
</div>
