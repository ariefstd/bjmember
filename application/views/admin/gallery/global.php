<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Management Gallery
        <small>Add, Edit, Delete</small>
      </h1>
    </section>
    <section class="content">
	<!--
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php //echo base_url(); ?><?php //echo $category ?>/adds"><i class="fa fa-plus"></i> Tambah Gambar</a>
                </div>
            </div>
        </div>
	-->
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Gallery List</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>Gallery" method="POST" id="searchList">
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
                      <!-- <th>Id</th> -->
                      <th width="25%">Gambar</th>
                      <th>Judul Artikel</th>
                      <th>Artikel Kunci</th>
                      <th>Kategori</th>
                      <th class="text-center">Actions</th>
                    </tr>
                    <?php
                    if(!empty($userRecords))
                    {
                        foreach($userRecords as $record)
                        {
                    ?>
                    <tr>
                      <!-- <td><?php echo $record->id ?></td> -->
                      <td>
						<img width="40%" height="4%" src="<?php echo base_url(); ?>images/thumbs/<?php echo $record->image ?>" />
					  </td>
                      <td><?php echo $record->article_title ?></td>
                      <td><?php echo $record->article_key ?></td>
                      <td><?php echo $record->category ?></td>
                      <td class="text-center">
						  <?php
							//echo '<a class="btn btn-sm btn-info" href="'.site_url("Gallery").'/update/'.$record->id.'" ><i class="fa fa-pencil"></i></a>';
						  ?>
                          <a class="btn btn-sm btn-danger deleteGalery" href="#" data-galleryid="<?php echo $record->id; ?>"><i class="fa fa-trash"></i></a>
                      </td>
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
            jQuery("#searchList").attr("action", baseURL + "Gallery/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
