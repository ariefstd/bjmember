<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> User Management Gallery Artikel
        <small>Add, Edit, Delete</small>
      </h1>
    </section>
	<br />
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-left">
                <div class="form-group" style="float:left">
				<?= form_open_multipart(base_url('upload'))?>
                <div>
                    <label> Export File</label>
                    <?= form_upload(array('id' => 'txtFileImport', 'name' => 'fileImport', 'accept' => '.csv, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'))?>
					<?= form_submit(array('class'=>"btn btn-primary", 'name' => 'btnSubmit', 'value' => 'Upload'))?>
                </div>				
				<?= form_close()?>                    
                </div>
                
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List Bahan Mentah</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>Excel/" method="POST" id="searchList">
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
					  <th>No</th>
                      <th>Id Web</th>
                      <th>Key Id </th>
                      <th>Nama barang</th>
                      <th>Qty</th>
                      <th>Harga</th>
                      <!-- <th>Actions</th> -->
                    </tr>
                    <?php
                    if(!empty($userRecords))
                    {
                        foreach($userRecords as $record)
                        {
                    ?>
                    <tr>
					  <td><?php echo $record->serial ?></td>
                      <td><?php echo $record->web ?></td>
                      <td>
						<?php echo $record->id_key ?>
					  </td>
                      <td><?php echo $record->name ?></td>
                      <td><?php echo $record->qty ?></td>
                      <td><?php echo $record->price  ?></td>
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
            jQuery("#searchList").attr("action", baseURL + "Excel/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
