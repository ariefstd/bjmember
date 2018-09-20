

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Administrator</b> Admin System
        </div>
        <strong>Copyright &copy; 2017-2018 <a href="<?php echo base_url(); ?>">Edolanan</a>.</strong> All rights reserved.
    </footer>
    
    <!-- jQuery UI 1.11.2 -->
    <!-- <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script> -->
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/app.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/validation.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.min-.js" type="text/javascript"></script>
	
    <script type="text/javascript">
        var windowURL = window.location.href;
        pageURL = windowURL.substring(0, windowURL.lastIndexOf('/'));
        var x= $('a[href="'+pageURL+'"]');
            x.addClass('active');
            x.parent().addClass('active');
        var y= $('a[href="'+windowURL+'"]');
            y.addClass('active');
            y.parent().addClass('active');
    </script>
	<script>

			// This call can be placed at any point after the
			// <textarea>, or inside a <head><script> in a
			// window.onload event handler.

			CKEDITOR.replace( 'beritas', {
				extraPlugins: 'magicline',	// Ensure that magicline plugin, which is required for this sample, is loaded.
				allowedContent: true		// Switch off the ACF, so very complex content created to
											// show magicline's power isn't filtered.
			} );

		</script>	
<script type="text/javascript">
function insert(el,ins) {
window.lstText={};
    if (el.setSelectionRange){
        el.value = el.value.substring(0,el.selectionStart) + ins + el.value.substring(el.selectionStart,el.selectionEnd) + el.value.substring(el.selectionEnd,el.value.length);
    }
    else if (document.selection && document.selection.createRange) {
        el.focus();
        var range = document.selection.createRange();
        range.text = ins + range.text;
    }
}
</script
  </body>
</html>