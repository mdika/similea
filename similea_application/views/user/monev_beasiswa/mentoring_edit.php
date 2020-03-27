        <!-- DataTables Example -->
        <div class="col-lg-13 card mb-3">
		  <div class="card-header">
            <i class="fas fa-table"></i>
            Data Mentoring
		  </div>
          
		  <div class="card-body">

			<form action="<?php base_url('user/monev_beasiswa/mentoring/edit') ?>" method="post" enctype="multipart/form-data">
			
				<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

				<input type="hidden" name="id" value="<?php echo $monev->id_monev?>" />

				<div class="form-group">
					<label for="name">Aktif Mentoring*</label><br>
								
					<?php foreach ($skam_nilai as $skam_nilai): ?>					
						<input type="radio" name="nilai_skam" value="<?php echo $skam_nilai->nilai_skam ?>" required> <?php echo $skam_nilai->ket_nilai_skam ?> <br>
					<?php endforeach; ?>
								
					<div class="invalid-feedback">
						<?php echo form_error('nilai_skam') ?>
					</div>
				</div>

				<div class="form-group">
					<label for="name">File SKAM (.pdf)</label>
					<input class="form-control-file <?php echo form_error('file_skam') ? 'is-invalid':'' ?>"
						type="file" name="file_skam" />
					<input type="hidden" name="old_file_skam" value="<?php echo $monev->file_skam ?>" />
					<div class="invalid-feedback">
						<?php echo form_error('file_skam') ?>
					</div>
				</div>

				<div class="form-group">
					<label for="name">Keterangan</label>
					<textarea class="form-control <?php echo form_error('ket_skam') ? 'is-invalid':'' ?>"
						name="ket_skam" placeholder="Keterangan"><?php echo $monev->ket_skam ?></textarea>
					<div class="invalid-feedback">
						<?php echo form_error('ket_skam') ?>
					</div>
				</div>

				<input class="btn btn-success" type="submit" name="btn" value="Save" />
                
            </form>
			
		  </div>
		          
		</div>