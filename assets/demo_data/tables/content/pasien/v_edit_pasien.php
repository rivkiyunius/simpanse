<div class="panel panel-flat">
	<div class="panel-body">
		<form method="post" class="form-horizontal" action="#">
			<fieldset class="content-group">

				<div class="form-group">
					<label class="control-label col-lg-2 text-size-large">Kode Pasien</label>
					<div class="col-lg-10">
						<input type="text" name="kode_pasien" value="<?= $pasien->kode_pasien ?>"
							   class="form-control border-lg">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-lg-2 text-size-large">Nama Pasien</label>
					<div class="col-lg-10">
						<input type="text" name="nama" value="<?= $pasien->nama ?>" class="form-control border-lg">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-lg-2 text-size-large">Jenis Kelamin</label>
					<div class="col-lg-10">
						<select name="jk" class="form-control border-lg">
							<option value="L">Laki-laki</option>
							<option value="P">Perempuan</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-lg-2 text-size-large">Umur</label>
					<div class="col-lg-10">
						<input type="number" name="umur" value="<?= $pasien->umur ?>>" class="form-control border-lg">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-lg-2 text-size-large">Berat Badan</label>
					<div class="col-lg-10">
						<input type="number" name="berat_badan" value="<?= $pasien->berat_badan ?>"
							   class="form-control border-lg">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-lg-2 text-size-large">Riwayat Diabetes</label>
					<div class="col-lg-10">
						<input type="number" name="riwayat_diabetes" value="<?= $pasien->riwayat_diabetes ?>"
							   class="form-control border-lg">
					</div>
				</div>
			</fieldset>

			<div class="form-group text-center">
				<a href="<?= base_url() ?>pasien" class="btn btn-info">Batal</a>
				<input type="submit" class="btn btn-success" name="submit" value="Simpan">
			</div>

		</form>
	</div>
</div>
