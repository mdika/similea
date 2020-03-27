        <!-- DataTables Example -->
        <div class="col-lg-13 card mb-3">
		  <div class="card-header">
            <i class="fas fa-table"></i>
            Data Prestasi
		  </div>
          
		  <div class="card-body">

			<form action="<?php base_url('user/monev/sert/edit') ?>" method="post" enctype="multipart/form-data">
			
				<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

				<input type="hidden" name="id" value="<?php echo $monev->id_monev?>" />

				<div class="form-group">
					<label for="name">Prestasi*</label><br>
								
					<?php foreach ($sert_nilai as $sert_nilai): ?>					
						<input type="radio" name="nilai_sert" value="<?php echo $sert_nilai->nilai_sert ?>" required> <?php echo $sert_nilai->ket_nilai_sert ?> <br>
					<?php endforeach; ?>
								
					<div class="invalid-feedback">
						<?php echo form_error('nilai_sert') ?>
					</div>
				</div>
						
				<div class="form-group">
					<label for="name">Tingkat Internasional*</label>
					<input class="form-control <?php echo form_error('internasional') ? 'is-invalid':'' ?>"
						type="number" name="internasional" min="0" max="99" placeholder="Tingkat Internasional" value="<?php echo $monev->internasional ?>" />
					<div class="invalid-feedback">
						<?php echo form_error('internasional') ?>
					</div>
				</div>
							
				<div class="form-group">
					<label for="name">Tingkat Nasional*</label>
					<input class="form-control <?php echo form_error('nasional') ? 'is-invalid':'' ?>"
						type="number" name="nasional" min="0" max="99" placeholder="Tingkat Nasional" value="<?php echo $monev->nasional ?>" />
					<div class="invalid-feedback">
						<?php echo form_error('nasional') ?>
					</div>
				</div>
							
				<div class="form-group">
					<label for="name">Tingkat Provinsi*</label>
					<input class="form-control <?php echo form_error('provinsi') ? 'is-invalid':'' ?>"
						type="number" name="provinsi" min="0" max="99" placeholder="Tingkat Provinsi" value="<?php echo $monev->provinsi ?>" />
					<div class="invalid-feedback">
						<?php echo form_error('provinsi') ?>
					</div>
				</div>
							
				<div class="form-group">
					<label for="name">Tingkat Kabupaten*</label>
					<input class="form-control <?php echo form_error('kabupaten') ? 'is-invalid':'' ?>"
						type="number" name="kabupaten" min="0" max="99" placeholder="Tingkat Kabupaten" value="<?php echo $monev->kabupaten ?>" />
					<div class="invalid-feedback">
						<?php echo form_error('kabupaten') ?>
					</div>
				</div>

				<div class="form-group">
					<label for="name">File Sertifikat (.pdf)</label>
					<input class="form-control-file <?php echo form_error('file_sert') ? 'is-invalid':'' ?>"
						type="file" name="file_sert" />
					<input type="hidden" name="old_file_sert" value="<?php echo $monev->file_sert ?>" />
					<div class="invalid-feedback">
						<?php echo form_error('file_sert') ?>
					</div>
				</div>

				<div class="form-group">
					<label for="name">Keterangan</label>
					<textarea class="form-control <?php echo form_error('ket_sert') ? 'is-invalid':'' ?>"
						name="ket_sert" placeholder="Keterangan"><?php echo $monev->ket_sert ?></textarea>
					<div class="invalid-feedback">
						<?php echo form_error('ket_sert') ?>
					</div>
				</div>

				<input class="btn btn-success" type="submit" name="btn" value="Save" />
                
            </form>
			
		  </div>
		          
		</div>