        <!-- DataTables Example -->
        <div class="col-lg-13 card mb-3">
		  <div class="card-header">
            <i class="fas fa-table"></i>
            Data Organisasi
		  </div>
          
		  <div class="card-body">

			<form action="<?php base_url('user/monev/skao/edit') ?>" method="post" enctype="multipart/form-data">
			
				<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

				<input type="hidden" name="id" value="<?php echo $monev->id_monev?>" />

				<div class="form-group">
					<label for="name">Aktif Organisasi*</label><br>
						
					<?php foreach ($skao_nilai as $skao_nilai): ?>					
						<input type="radio" name="nilai_skao" value="<?php echo $skao_nilai->nilai_skao ?>" required> <?php echo $skao_nilai->ket_nilai_skao ?> <br>
					<?php endforeach; ?>
								
					<div class="invalid-feedback">
						<?php echo form_error('nilai_skao') ?>
					</div>
				</div>
						
				<div class="form-group">
					<label for="name">Nama Organisasi*</label><br>
					<select name="id_ormawa">
					
					<?php foreach ($ormawa as $ormawa): ?>
						<option value="<?php echo $ormawa->id_ormawa ?>"> <?php echo $ormawa->nama_ormawa ?> </option>
					<?php endforeach; ?>
					
					</select>
					<div class="invalid-feedback">
						<?php echo form_error('id_ormawa') ?>
					</div>
				</div>
							
				<div class="form-group">
					<label for="name">Jabatan*</label><br>
					<select name="id_jabatan">
					
					<?php foreach ($jabatan as $jabatan): ?>						
						  <option value="<?php echo $jabatan->id_jabatan ?>"> <?php echo $jabatan->nama_jabatan ?> </option>					
					<?php endforeach; ?>
					
					</select>
					<div class="invalid-feedback">
						<?php echo form_error('id_jabatan') ?>
					</div>
				</div>

				<div class="form-group">
					<label for="name">File skao (.pdf)</label>
					<input class="form-control-file <?php echo form_error('file_skao') ? 'is-invalid':'' ?>"
					 	type="file" name="file_skao" />
					<input type="hidden" name="old_file_skao" value="<?php echo $monev->file_skao ?>" />
					<div class="invalid-feedback">
						<?php echo form_error('file_skao') ?>
					</div>
				</div>

				<div class="form-group">
					<label for="name">Keterangan</label>
					<textarea class="form-control <?php echo form_error('ket_skao') ? 'is-invalid':'' ?>"
						name="ket_skao" placeholder="Keterangan"><?php echo $monev->ket_skao ?></textarea>
					<div class="invalid-feedback">
						<?php echo form_error('ket_skao') ?>
					</div>
				</div>

				<input class="btn btn-success" type="submit" name="btn" value="Save" />
                
            </form>
			
		  </div>
		          
		</div>