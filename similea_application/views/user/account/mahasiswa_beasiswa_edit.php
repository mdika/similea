        <!-- DataTables Example -->
        <div class="col-lg-13 card mb-3">
		  <div class="card-header">
            <i class="fas fa-table"></i>
            Data Beasiswa Mahasiswa
		  </div>
          
		  <div class="card-body">
		  
            <form action="<?php base_url('admin/mahasiswa/mahasiswa_beasiswa/edit') ?>" method="post">
			
				<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

				<input type="hidden" name="id" value="<?php echo $mahasiswa_beasiswa->nim?>" />

				<div class="form-group">
					<label for="name">Nama Lengkap*</label>
                    <input class="form-control <?php echo form_error('nama_lengkap') ? 'is-invalid':'' ?>"
						type="text" name="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $mahasiswa_beasiswa->nama_lengkap ?>" readonly/>
					<div class="invalid-feedback">
						<?php echo form_error('nama_lengkap') ?>
					</div>
                </div>
				
				<div class="form-group">
					<label for="name">Nama Beasiswa*</label><br>
					<select name="id_beasiswa">
					
					<?php foreach ($beasiswa_jenis as $beasiswa_jenis): ?>						
						  <option value="<?php echo $beasiswa_jenis->id_beasiswa ?>"> <?php echo $beasiswa_jenis->nama_beasiswa ?> </option>					
					<?php endforeach; ?>
					
					</select>
					<div class="invalid-feedback">
						<?php echo form_error('id_beasiswa') ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="name">Nomor Rekening*</label>
                    <input class="form-control <?php echo form_error('no_rek') ? 'is-invalid':'' ?>"
						type="text" name="no_rek" placeholder="Nomor Rekening" value="<?php echo $mahasiswa_beasiswa->no_rek ?>" required/>
					<div class="invalid-feedback">
						<?php echo form_error('no_rek') ?>
					</div>
                </div>

				<input class="btn btn-success" type="submit" name="btn" value="Save" />
                
            </form>
			
		  </div>
		  
		</div>