
		</div>
        <!-- start: MAIN JAVASCRIPTS -->
		<script src="<?php echo $this->config->item('plugins')?>jquery/jquery.min.js"></script>
		<script src="<?php echo $this->config->item('plugins')?>bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo $this->config->item('plugins')?>modernizr/modernizr.js"></script>
		<script src="<?php echo $this->config->item('plugins')?>jquery-cookie/jquery.cookie.js"></script>
		<script src="<?php echo $this->config->item('plugins')?>perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="<?php echo $this->config->item('plugins')?>switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="<?php echo $this->config->item('plugins')?>select2/select2.min.js"></script>
		<script src="<?php echo $this->config->item('plugins')?>DataTables/jquery.dataTables.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="<?php echo $this->config->item('vendor')?>js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="<?php echo $this->config->item('vendor')?>js/table-data.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				TableData.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
