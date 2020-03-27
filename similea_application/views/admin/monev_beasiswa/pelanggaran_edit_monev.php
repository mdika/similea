        <!-- DataTables Example -->
        <div class="col-lg-13 card mb-3">
          
		  <div class="card-body">

			<form action="<?php base_url('admin/monev_beasiswa/mentoring_monev/edit') ?>" method="post" enctype="multipart/form-data">
			
				<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

				<input type="hidden" name="id" value="<?php echo $monev_pelanggaran->id_monev?>" />

				<div class="form-group">
					<label for="name">Pelanggaran*</label><br>
								
					<?php foreach ($pelanggaran_nilai as $pelanggaran_nilai): ?>					
						<input type="radio" name="nilai_pelanggaran" value="<?php echo $pelanggaran_nilai->nilai_pelanggaran ?>" required> <?php echo $pelanggaran_nilai->ket_nilai_pelanggaran ?> <br>
					<?php endforeach; ?>
								
					<div class="invalid-feedback">
						<?php echo form_error('nilai_pelanggaran') ?>
					</div>
				</div>

				<div class="form-group">
					<label for="name">Skor Pelanggaran*</label>
                    <input class="form-control <?php echo form_error('skor_pelanggaran') ? 'is-invalid':'' ?>"
						type="number" name="skor_pelanggaran" min="0" max="100" placeholder="Skor Pelanggaran" value="<?php echo $monev_pelanggaran->skor_pelanggaran ?>" required/>
					<div class="invalid-feedback">
						<?php echo form_error('skor_pelanggaran') ?>
					</div>
                </div>

				<div class="form-group">
					<label for="name">Keterangan</label>
					<textarea class="form-control <?php echo form_error('ket_pelanggaran') ? 'is-invalid':'' ?>"
						name="ket_pelanggaran" placeholder="Keterangan"><?php echo $monev_pelanggaran->ket_pelanggaran ?></textarea>
					<div class="invalid-feedback">
						<?php echo form_error('ket_pelanggaran') ?>
					</div>
				</div>

				<input class="btn btn-success" type="submit" name="btn" value="Save" />
                
            </form>
			
		  </div>
        
		</div>