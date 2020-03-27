        <!-- DataTables Example -->
        <div class="col-lg-13 card mb-3">
		  <div class="card-header">
            <i class="fas fa-table"></i>
            Data IP
		  </div>
          
		  <div class="card-body">
		  
            <form action="<?php base_url('user/monev_beasiswa/ip/edit') ?>" method="post" enctype="multipart/form-data">
			
				<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

				<input type="hidden" name="id" value="<?php echo $monev->id_monev?>" />
				
				<div class="form-group">
					<label for="name">IP*</label>
                    <input class="form-control <?php echo form_error('nilai_khs') ? 'is-invalid':'' ?>"
						type="number" name="nilai_khs" min="0.00" max="4.00" step="any" placeholder="IP" value="<?php echo $monev->nilai_khs ?>" required/>
					<div class="invalid-feedback">
						<?php echo form_error('nilai_khs') ?>
					</div>
                </div>

				<div class="form-group">
                    <label for="name">File KHS (.pdf)</label>
					<input class="form-control-file <?php echo form_error('file_khs') ? 'is-invalid':'' ?>"
						type="file" name="file_khs" />
					<input type="hidden" name="old_file_khs" value="<?php echo $monev->file_khs ?>" />
					<div class="invalid-feedback">
						<?php echo form_error('file_khs') ?>
					</div>
				</div>

                <div class="form-group">
					<label for="name">Keterangan</label>
					<textarea class="form-control <?php echo form_error('ket_khs') ? 'is-invalid':'' ?>"
						name="ket_khs" placeholder="Keterangan"><?php echo $monev->ket_khs ?></textarea>
					<div class="invalid-feedback">
						<?php echo form_error('ket_khs') ?>
					</div>
				</div>

				<input class="btn btn-success" type="submit" name="btn" value="Save" />
                
            </form>
			
		  </div>
		  
		</div>