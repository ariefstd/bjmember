<?php $category = $this->uri->segment(1); $category=strtolower($category); ?>
<?php $key=$this->uri->segment(3); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<section class="content" style="background:#ffffff">
		<div class="row">
			<div class="col-lg-9">
			
			<div class="container top">
			  <div class="col-md-10">
			  <ul class="breadcrumb">
				<li>
				  <a href="<?php echo site_url("Gallery"); ?>">
					<?php echo ucfirst($this->uri->segment(1));?>
				  </a>
				</li>
				<li>
				  <a href="<?php echo site_url("Gallery").'/'.$this->uri->segment(2); ?>">
					<?php echo ucfirst($this->uri->segment(2));?>
				  </a>
				</li>
				<li class="active">
				  <a href="#">New</a>
				</li>
			  </ul>
			  </div><br /><br />
			  
			  <div class="page-header-">
			  <h2>
				<i class="fa fa-tachometer" aria-hidden="true"></i> <?php echo ucfirst($this->uri->segment(2));?>
				<small>Gallery <?php echo ucfirst($this->uri->segment(1));?></small>
			  </h2>
			  </div>
				<br /><br />
			  <?php
			  //flash messages
			  if(isset($flash_message)){
				if($flash_message == TRUE)
				{
				  echo '<div class="alert alert-success">';
					echo '<a class="close" data-dismiss="alert">×</a>';
					echo '<strong>Well done!</strong> new manufacturer created with success.';
				  echo '</div>';       
				}else{
				  echo '<div class="alert alert-error">';
					echo '<a class="close" data-dismiss="alert">×</a>';
					echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
				  echo '</div>';          
				}
			  }
			  ?>			  
			  			
			<div class="col-md-8">
				<div class="box box-primary-">
                    
					<div id="upload">
						<div class="form-group">
                            <label>Upload Gambar</label>
						</div>
						<?php
							echo form_open_multipart(site_url('Gallery/index'));
							echo form_upload('userfile');
						?>
						<br /><br />
							<?php
								$arr=explode('-',$key);
								$imp=implode(' ',$arr);
								$title=ucwords($imp);
								$sqlStr  = $this->db->query("select*from tbl_artikel where article_key='".$key."'");
								foreach($sqlStr->result() as $row){
									$cate = $row->category;
									$pos = $row->position;
									
									if(empty($cate)){
										$cate="0";
									}
								}
							?>
							<div class="form-group">
                            <label>Judul Berita</label>
								<input type="text" class="form-control" id="judul" placeholder="Judul artikel" name="judul" value="<?php echo $title; ?>" maxlength="225" disabled>
								<input type="hidden" value="<?php echo $title; ?>" name="judul" id="judul" />
							</div>
							<div class="form-group">
                            <label>Key</label>
								<input type="text" class="form-control" id="key" placeholder="<?php echo $key ?>" name="key" value="<?php echo $key ?>" maxlength="225" disabled>
								<input type="hidden" class="form-control" id="key" placeholder="<?php echo $key ?>" name="key" value="<?php echo $key ?>" maxlength="225">
								<input type="hidden" class="form-control" id="position" name="position" value="<?php echo $pos ?>" maxlength="225">
								<input type="hidden" class="form-control" id="category" name="category" value="<?php echo $cate ?>" maxlength="225">
								
							</div>
							
							<div class="form-group">
                                <label>Penulis Berita</label>
                                <input type="text" class="form-control" id="author" placeholder="Nama Penulis" name="author" value="<?php echo $name; ?>" maxlength="10" disabled>
								<input type="hidden" class="form-control" id="author" placeholder="Nama Penulis" name="author" value="<?php echo $name; ?>" maxlength="10">										
                            </div>
							<input type="hidden" name="update" value="<?php //echo $update; ?>" />
							<input type="hidden" name="imgId" value="<?php //echo $idImage; ?>" />
							<input type="hidden" name="title" value="<?php //echo $artikel[0]['article_title']; ?>" />
							<input type="submit" class="btn btn-primary" name="upload" value="Simpan" />
						<?php
						//echo form_submit('upload', 'Upload');
						echo form_close();
						?>		
					</div>
                    
                </div>
			</div>
				
			  
			</div>
			<br /><br />
			</div>
		</div>
	</section>
    
</div>

	
     