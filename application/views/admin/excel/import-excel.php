<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> User Management Bahan
        <small>Add, Edit, Delete</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <?= form_open_multipart(base_url('download'))?>
                <div class="padd-top-20">
					<select name='category'>
					<?php
						foreach($kategori as $kat){
							$test = $kat->tipe_jenis;
					?>					
						<option value='<?php echo $test ?>'><?php echo $test ?></option>
						<?php } ?>					
					</select>
                    <?= form_submit(array('name' => 'btnSubmit', 'value' => 'Export Data'))?>
                    <?//= anchor(site_url(), 'Kembali')?>
                </div>
                <?= form_close()?>
				<br /><br />
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List Bahan</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>Download/" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>Id</th>
                      <th>Kode Bahan</th>
                      <th>Kelompok Bahan</th>
                      <th>Tipe Jenis</th>
                      <th>Spesifikasi Bahan</th>
                      <!-- <th>Actions</th> -->
                    </tr>
                    <?php
                    if(!empty($userRecords))
                    {
                        foreach($userRecords as $record)
                        {
                    ?>
                    <tr>
                      <td><?php echo $record->id ?></td>
                      <td>
						<?php echo $record->no_kode_lengkap ?>
					  </td>
                      <td><?php echo $record->klp ?></td>
                      <td><?php echo $record->tipe_jenis ?></td>
                      <td><?php echo $record->spesifikasi  ?></td>
					  <!--
                      <td class="text-center">
						  <?php
							//echo '<a class="btn btn-sm btn-info" href="'.site_url("Gallery").'/update/'.$record->id.'" ><i class="fa fa-pencil"></i></a>';
						  ?>
						  <!--
                          <a class="btn btn-sm btn-danger deleteGalery" href="#" data-galleryid="<?php //echo $record->id; ?>"><i class="fa fa-trash"></i></a>
						  
                      </td>
					  -->
                    </tr>
                    <?php
                        }
                    }
                    ?>
                  </table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/gallery.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "Download/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
